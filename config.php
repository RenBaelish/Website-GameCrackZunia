<?php
/**
 * Configuration file for GAMEZUNIA
 */

// Error reporting (turn off in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Site configuration
define('SITE_NAME', 'GAMEZUNIA');
define('SITE_URL', 'http://localhost/gamezunia'); // Change to your actual URL

// Database configuration (if needed)
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'gamezunia_db');

// Theme settings
define('DEFAULT_THEME', 'dark'); // 'dark' or 'light'

// Game categories
$gameCategories = [
    'action' => 'Arcade & Action',
    'strategy' => 'Strategy',
    'horror' => 'Horror',
    'racing' => 'Racing',
    'puzzle' => 'Puzzle'
];

// Social media links
$socialLinks = [
    'discord' => '#',
    'github' => '#',
    'youtube' => '#',
    'telegram' => '#'
];
