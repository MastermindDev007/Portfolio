<?php
// Prevent direct access
if (!defined('ABSPATH') && !defined('PORTFOLIO_LOADED')) {
    define('PORTFOLIO_LOADED', true);
}

// ========================
// Directory Paths
// ========================
define('BASE_PATH', dirname(__DIR__));
define('INCLUDES_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'includes');
define('DATA_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'data');
define('ASSETS_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'assets');
define('CONFIG_PATH', BASE_PATH . DIRECTORY_SEPARATOR . 'config');

// ========================
// URL Paths (Relative)
// ========================
define('ASSETS_URL', 'assets');
define('IMAGES_URL', ASSETS_URL . '/images');
define('CSS_URL', ASSETS_URL . '/css');
define('JS_URL', ASSETS_URL . '/js');

// ========================
// Data Files
// ========================
define('PROJECTS_JSON', DATA_PATH . DIRECTORY_SEPARATOR . 'projects.json');

// ========================
// Project Categories
// ========================
define('PROJECT_CATEGORIES', [
    'all' => 'All',
    'web design' => 'Web design',
    'web development' => 'Web development',
    'applications' => 'Applications'
]);

// ========================
// Default Project Image
// ========================
define('DEFAULT_PROJECT_IMAGE', IMAGES_URL . '/project-1.jpg');

// ========================
// Site Configuration
// ========================
define('SITE_NAME', 'vCard - Personal Portfolio');
define(
    'SITE_DESCRIPTION',
    'A modern, responsive portfolio website showcasing professional work, skills, and achievements.'
);
