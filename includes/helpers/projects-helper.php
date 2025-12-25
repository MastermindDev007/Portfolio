<?php
/**
 * Projects Helper Functions
 * 
 * Utility functions for loading and managing projects from JSON.
 * 
 * @package Portfolio
 * @version 1.0.0
 */

// Load constants
require_once dirname(__DIR__, 2) . '/config/constants.php';

/**
 * Load projects from JSON file
 * 
 * @return array Array of project objects or empty array on error
 */
function load_projects() {
    $projects_file = PROJECTS_JSON;
    
    // Check if file exists
    if (!file_exists($projects_file)) {
        error_log("Projects JSON file not found: {$projects_file}");
        return [];
    }
    
    // Read and decode JSON
    $json_content = file_get_contents($projects_file);
    
    if ($json_content === false) {
        error_log("Failed to read projects JSON file: {$projects_file}");
        return [];
    }
    
    $projects = json_decode($json_content, true);
    
    // Validate JSON
    if (json_last_error() !== JSON_ERROR_NONE) {
        error_log("Invalid JSON in projects file: " . json_last_error_msg());
        return [];
    }
    
    // Validate structure
    if (!is_array($projects)) {
        error_log("Projects JSON must be an array");
        return [];
    }
    
    return $projects;
}

/**
 * Get unique categories from projects
 * 
 * @param array $projects Array of project objects
 * @return array Array of unique category names (preserves original capitalization)
 */
function get_project_categories($projects) {
    $categories = [];
    $category_map = []; // Map lowercase to original
    
    foreach ($projects as $project) {
        if (isset($project['category']) && !empty($project['category'])) {
            $category_original = trim($project['category']);
            $category_lower = strtolower($category_original);
            
            // Store original capitalization
            if (!isset($category_map[$category_lower])) {
                $category_map[$category_lower] = $category_original;
                $categories[] = $category_original;
            }
        }
    }
    
    // Sort categories alphabetically (case-insensitive)
    usort($categories, function($a, $b) {
        return strcasecmp($a, $b);
    });
    
    return $categories;
}

/**
 * Filter projects by category
 * 
 * @param array $projects Array of project objects
 * @param string $category Category to filter by (use 'all' for all projects)
 * @return array Filtered array of projects
 */
function filter_projects_by_category($projects, $category = 'all') {
    if ($category === 'all' || empty($category)) {
        return $projects;
    }
    
    $category = strtolower(trim($category));
    $filtered = [];
    
    foreach ($projects as $project) {
        if (isset($project['category'])) {
            $project_category = strtolower(trim($project['category']));
            if ($project_category === $category) {
                $filtered[] = $project;
            }
        }
    }
    
    return $filtered;
}

/**
 * Sanitize project data for output
 * 
 * @param array $project Project data array
 * @return array Sanitized project data
 */
function sanitize_project($project) {
    $sanitized = [
        'id' => isset($project['id']) ? intval($project['id']) : 0,
        'title' => isset($project['title']) ? htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8') : '',
        'category' => isset($project['category']) ? htmlspecialchars($project['category'], ENT_QUOTES, 'UTF-8') : '',
        'image' => isset($project['image']) ? htmlspecialchars($project['image'], ENT_QUOTES, 'UTF-8') : DEFAULT_PROJECT_IMAGE,
        'alt' => isset($project['alt']) ? htmlspecialchars($project['alt'], ENT_QUOTES, 'UTF-8') : '',
        'link' => isset($project['link']) ? htmlspecialchars($project['link'], ENT_QUOTES, 'UTF-8') : '#',
        'description' => isset($project['description']) ? htmlspecialchars($project['description'], ENT_QUOTES, 'UTF-8') : '',
    ];
    
    return $sanitized;
}

