<?php
// Start session
session_start();

// Include configuration file
require_once 'config.php';

// Include functions file
require_once 'functions.php';

// Get game ID from URL
$gameId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// In a real application, you would fetch game details from a database
// For demo purposes, we'll use
