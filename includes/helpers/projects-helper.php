<?php

/**
 * Projects Helper Functions - UPDATED
 * 
 * Utility functions for loading and managing projects from JSON.
 */

// Load constants
require_once dirname(__DIR__, 2) . '/config/constants.php';

/**
 * Load projects from JSON file
 */
function load_projects()
{
    $projects_file = PROJECTS_JSON;

    if (!file_exists($projects_file)) {
        error_log("Projects JSON file not found: {$projects_file}");
        return [];
    }

    $json_content = file_get_contents($projects_file);

    if ($json_content === false) {
        error_log("Failed to read projects JSON file: {$projects_file}");
        return [];
    }

    $projects = json_decode($json_content, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        error_log("Invalid JSON in projects file: " . json_last_error_msg());
        return [];
    }

    if (!is_array($projects)) {
        error_log("Projects JSON must be an array");
        return [];
    }

    return $projects;
}

/**
 * Get unique categories from projects
 */
function get_project_categories($projects)
{
    $categories = [];
    $category_map = [];

    foreach ($projects as $project) {
        if (isset($project['category']) && !empty($project['category'])) {
            $category_original = trim($project['category']);
            $category_lower = strtolower($category_original);

            if (!isset($category_map[$category_lower])) {
                $category_map[$category_lower] = $category_original;
                $categories[] = $category_original;
            }
        }
    }

    usort($categories, function ($a, $b) {
        return strcasecmp($a, $b);
    });

    return $categories;
}

/**
 * Filter projects by category
 */
function filter_projects_by_category($projects, $category = 'all')
{
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
 * Sanitize project data for output - UPDATED
 */
function sanitize_project($project)
{
    // Get first image from images array or fallback
    $firstImage = DEFAULT_PROJECT_IMAGE;
    if (isset($project['images']) && is_array($project['images']) && count($project['images']) > 0) {
        $firstImage = $project['images'][0];
    } elseif (isset($project['image'])) {
        $firstImage = $project['image'];
    }

    $sanitized = [
        'id' => isset($project['id']) ? intval($project['id']) : 0,
        'title' => isset($project['title']) ? htmlspecialchars($project['title'], ENT_QUOTES, 'UTF-8') : '',
        'category' => isset($project['category']) ? htmlspecialchars($project['category'], ENT_QUOTES, 'UTF-8') : '',
        'image' => htmlspecialchars($firstImage, ENT_QUOTES, 'UTF-8'),
        'images' => isset($project['images']) ? $project['images'] : [$firstImage],
        'alt' => isset($project['alt']) ? htmlspecialchars($project['alt'], ENT_QUOTES, 'UTF-8') : '',
        'link' => isset($project['link']) ? htmlspecialchars($project['link'], ENT_QUOTES, 'UTF-8') : '#',
        'description' => isset($project['description']) ? htmlspecialchars($project['description'], ENT_QUOTES, 'UTF-8') : '',
        'technologies' => isset($project['technologies']) ? $project['technologies'] : [],
        'demoUrl' => isset($project['demoUrl']) ? htmlspecialchars($project['demoUrl'], ENT_QUOTES, 'UTF-8') : '#',
    ];

    return $sanitized;
}
