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
define('SITE_NAME', 'Dev Davda Portfolio');
define(
    'SITE_DESCRIPTION',
    'A modern, responsive portfolio website showcasing professional work, skills, and achievements.'
);

// ========================
// Integrations
// ========================
define('DEV_GITHUB_USERNAME', 'MastermindDev007');
define('DEV_GITHUB_URL', 'https://github.com/' . DEV_GITHUB_USERNAME);
define('DEV_LINKEDIN_URL', 'https://linkedin.com/in/dev-davda-ab8378239');
define('VISITOR_COUNTER_NAMESPACE', 'dev-davda-portfolio');
define('CONTACT_RECEIVER_EMAIL', 'devndavda59425@gmail.com');
// Set these in environment variables for secure EmailJS form delivery.
define('EMAILJS_SERVICE_ID', getenv('EMAILJS_SERVICE_ID') ?: '');
define('EMAILJS_TEMPLATE_ID', getenv('EMAILJS_TEMPLATE_ID') ?: '');
define('EMAILJS_PUBLIC_KEY', getenv('EMAILJS_PUBLIC_KEY') ?: '');
define('GA4_MEASUREMENT_ID', '');

// ========================
// Admin Panel
// ========================
define('ADMIN_USERNAME', 'admin');
define('ADMIN_PASSWORD', 'ChangeThisAdmin123!');
