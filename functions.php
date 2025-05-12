<?php
/**
 * Functions file for GAMEZUNIA
 */

/**
 * Check if the current page matches the given page
 *
 * @param string $page The page to check
 * @return bool True if current page matches, false otherwise
 */
function isCurrentPage($page) {
    $currentPage = basename($_SERVER['PHP_SELF']);
    return $currentPage == $page;
}

/**
 * Get user's preferred theme
 *
 * @return string 'dark' or 'light'
 */
function getUserTheme() {
    if (isset($_COOKIE['theme'])) {
        return $_COOKIE['theme'];
    }
    return DEFAULT_THEME;
}

/**
 * Format game version with appropriate styling class
 *
 * @param string $version The version number
 * @param string $class The CSS class to apply
 * @return string Formatted HTML for the version
 */
function formatGameVersion($version, $class = '') {
    $classAttr = !empty($class) ? " {$class}" : '';
    return "<span class=\"version{$classAttr}\">{$version}</span>";
}

/**
 * Get games by genre (placeholder function - would connect to database in real app)
 *
 * @param string $genre The genre to filter by
 * @param int $limit Maximum number of games to return
 * @return array Array of game data
 */
function getGamesByGenre($genre, $limit = 6) {
    // In a real application, this would query a database
    // For now, we'll return placeholder data

    // Sample data structure - would come from database in real app
    $allGames = [
        'action' => [
            // Action games would be here
        ],
        'strategy' => [
            // Strategy games would be here
        ],
        // Other genres...
    ];

    if (isset($allGames[$genre])) {
        return array_slice($allGames[$genre], 0, $limit);
    }

    return [];
}

/**
 * Sanitize output to prevent XSS
 *
 * @param string $data The data to sanitize
 * @return string Sanitized data
 */
function sanitizeOutput($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

/**
 * Generate pagination links
 *
 * @param int $currentPage Current page number
 * @param int $totalPages Total number of pages
 * @param string $baseUrl Base URL for pagination links
 * @return string HTML for pagination links
 */
function generatePagination($currentPage, $totalPages, $baseUrl) {
    $html = '<div class="pagination">';

    // Previous page link
    if ($currentPage > 1) {
        $html .= '<a href="' . $baseUrl . '?page=' . ($currentPage - 1) . '" class="page-link prev">&laquo; Previous</a>';
    } else {
        $html .= '<span class="page-link prev disabled">&laquo; Previous</span>';
    }

    // Page numbers
    for ($i = 1; $i <= $totalPages; $i++) {
        if ($i == $currentPage) {
            $html .= '<span class="page-link current">' . $i . '</span>';
        } else {
            $html .= '<a href="' . $baseUrl . '?page=' . $i . '" class="page-link">' . $i . '</a>';
        }
    }

    // Next page link
    if ($currentPage < $totalPages) {
        $html .= '<a href="' . $baseUrl . '?page=' . ($currentPage + 1) . '" class="page-link next">Next &raquo;</a>';
    } else {
        $html .= '<span class="page-link next disabled">Next &raquo;</span>';
    }

    $html .= '</div>';
    return $html;
}
