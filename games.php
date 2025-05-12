<?php
// Start session
session_start();

// Include configuration file
require_once 'config.php';

// Include functions file
require_once 'functions.php';

// Page title
$pageTitle = "Game Library - GAMEZUNIA";

// Get current page for pagination
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$games_per_page = 12;

// Get search query if exists
$search_query = isset($_GET['search']) ? trim($_GET['search']) : '';

// Get sort option if exists
$sort_by = isset($_GET['sort']) ? $_GET['sort'] : 'newest';

// Get type filter if exists
$type = isset($_GET['type']) ? $_GET['type'] : 'all';

// Mock database of games (in a real app, this would come from a database)
$all_games = [
    [
        'id' => 1,
        'title' => 'Neon Override',
        'description' => 'Enter a cyberpunk world where neon lights illuminate the path to digital revolution.',
        'image' => 'assets/images/game1.jpg',
        'genre' => 'Action',
        'rating' => 4.8,
        'release_date' => '2023-05-15',
        'developer' => 'Cyber Studios',
        'type' => 'new'
    ],
    [
        'id' => 2,
        'title' => 'Echo Frontier',
        'description' => 'Explore the uncharted territories of a procedurally generated universe.',
        'image' => 'assets/images/game2.jpg',
        'genre' => 'Adventure',
        'rating' => 4.5,
        'release_date' => '2023-02-10',
        'developer' => 'Stellar Games',
        'type' => 'indie'
    ],
    [
        'id' => 3,
        'title' => 'Ironloop Genesis',
        'description' => 'Team up with friends in this cooperative mech-building adventure.',
        'image' => 'assets/images/game3.jpg',
        'genre' => 'Strategy',
        'rating' => 4.7,
        'release_date' => '2022-11-22',
        'developer' => 'Mech Works',
        'type' => 'top'
    ],
    [
        'id' => 4,
        'title' => 'Synth Warz: Omega',
        'description' => 'Command your synthetic army in this futuristic real-time strategy game.',
        'image' => 'assets/images/game4.jpg',
        'genre' => 'Strategy',
        'rating' => 4.3,
        'release_date' => '2023-01-05',
        'developer' => 'Omega Interactive',
        'type' => 'new'
    ],
    [
        'id' => 5,
        'title' => 'Pixel Fangs',
        'description' => 'A retro-style vampire survival game with modern roguelike elements.',
        'image' => 'assets/images/game5.jpg',
        'genre' => 'Horror',
        'rating' => 4.6,
        'release_date' => '2022-10-31',
        'developer' => 'Midnight Pixels',
        'type' => 'indie'
    ],
    [
        'id' => 6,
        'title' => 'Chrono Splicer',
        'description' => 'Manipulate time to solve puzzles and defeat enemies in this mind-bending adventure.',
        'image' => 'assets/images/game6.jpg',
        'genre' => 'Puzzle',
        'rating' => 4.9,
        'release_date' => '2023-03-17',
        'developer' => 'Temporal Games',
        'type' => 'top'
    ],
    [
        'id' => 7,
        'title' => 'Mechanoid Rush',
        'description' => 'Race through futuristic tracks with customizable robot vehicles.',
        'image' => 'assets/images/game7.jpg',
        'genre' => 'Racing',
        'rating' => 4.2,
        'release_date' => '2022-08-12',
        'developer' => 'Speed Mechanics',
        'type' => 'new'
    ],
    [
        'id' => 8,
        'title' => 'Aether Bloom',
        'description' => 'Cultivate magical plants in this relaxing yet strategic gardening simulator.',
        'image' => 'assets/images/game8.jpg',
        'genre' => 'Simulation',
        'rating' => 4.4,
        'release_date' => '2023-04-22',
        'developer' => 'Bloom Studios',
        'type' => 'indie'
    ],
    [
        'id' => 9,
        'title' => 'Void Hacker',
        'description' => 'Hack into corporate systems and expose corruption in this cyberpunk RPG.',
        'image' => 'assets/images/game9.jpg',
        'genre' => 'RPG',
        'rating' => 4.7,
        'release_date' => '2022-12-01',
        'developer' => 'Digital Rebels',
        'type' => 'top'
    ],
    [
        'id' => 10,
        'title' => 'Cyber Nomad: Redux',
        'description' => 'An enhanced edition of the classic open-world cyberpunk adventure.',
        'image' => 'assets/images/game10.jpg',
        'genre' => 'Open World',
        'rating' => 4.8,
        'release_date' => '2023-06-05',
        'developer' => 'Future Punk Games',
        'type' => 'new'
    ],
    [
        'id' => 11,
        'title' => 'Stellar Conquest',
        'description' => 'Build your galactic empire and conquer the stars in this 4X strategy game.',
        'image' => 'assets/images/game1.jpg',
        'genre' => 'Strategy',
        'rating' => 4.5,
        'release_date' => '2022-09-15',
        'developer' => 'Galactic Studios',
        'type' => 'top'
    ],
    [
        'id' => 12,
        'title' => 'Neon Drift',
        'description' => 'Master the art of drifting in this neon-soaked arcade racing game.',
        'image' => 'assets/images/game2.jpg',
        'genre' => 'Racing',
        'rating' => 4.3,
        'release_date' => '2023-01-20',
        'developer' => 'Drift Kings',
        'type' => 'indie'
    ],
    [
        'id' => 13,
        'title' => 'Phantom Protocol',
        'description' => 'Lead a team of elite agents in this tactical stealth action game.',
        'image' => 'assets/images/game3.jpg',
        'genre' => 'Action',
        'rating' => 4.6,
        'release_date' => '2022-11-08',
        'developer' => 'Shadow Ops',
        'type' => 'new'
    ],
    [
        'id' => 14,
        'title' => 'Quantum Break',
        'description' => 'Solve physics-based puzzles by manipulating quantum mechanics.',
        'image' => 'assets/images/game4.jpg',
        'genre' => 'Puzzle',
        'rating' => 4.4,
        'release_date' => '2023-02-28',
        'developer' => 'Quantum Labs',
        'type' => 'indie'
    ],
    [
        'id' => 15,
        'title' => 'Dragon\'s Legacy',
        'description' => 'Embark on an epic journey in this fantasy RPG with dragon companions.',
        'image' => 'assets/images/game5.jpg',
        'genre' => 'RPG',
        'rating' => 4.9,
        'release_date' => '2022-12-25',
        'developer' => 'Dragon Forge',
        'type' => 'top'
    ],
    [
        'id' => 16,
        'title' => 'Urban Legends',
        'description' => 'Investigate supernatural occurrences in this atmospheric horror adventure.',
        'image' => 'assets/images/game6.jpg',
        'genre' => 'Horror',
        'rating' => 4.7,
        'release_date' => '2023-04-13',
        'developer' => 'Midnight Tales',
        'type' => 'new'
    ],
    [
        'id' => 17,
        'title' => 'Starlight Colonies',
        'description' => 'Build and manage your own space colony in this detailed simulation.',
        'image' => 'assets/images/game7.jpg',
        'genre' => 'Simulation',
        'rating' => 4.5,
        'release_date' => '2022-10-10',
        'developer' => 'Stellar Sims',
        'type' => 'indie'
    ],
    [
        'id' => 18,
        'title' => 'Wasteland Warriors',
        'description' => 'Survive in a post-apocalyptic world filled with danger and opportunity.',
        'image' => 'assets/images/game8.jpg',
        'genre' => 'Survival',
        'rating' => 4.6,
        'release_date' => '2023-03-03',
        'developer' => 'Apocalypse Games',
        'type' => 'top'
    ]
];

// Filter games based on type
if ($type !== 'all') {
    $filtered_games = array_filter($all_games, function($game) use ($type) {
        return $game['type'] === $type;
    });
} else {
    $filtered_games = $all_games;
}

// Filter games based on search query
if (!empty($search_query)) {
    $filtered_games = array_filter($filtered_games, function($game) use ($search_query) {
        return (stripos($game['title'], $search_query) !== false ||
                stripos($game['description'], $search_query) !== false ||
                stripos($game['genre'], $search_query) !== false ||
                stripos($game['developer'], $search_query) !== false);
    });
}

// Sort games based on sort option
switch ($sort_by) {
    case 'title_asc':
        usort($filtered_games, function($a, $b) {
            return strcmp($a['title'], $b['title']);
        });
        break;
    case 'title_desc':
        usort($filtered_games, function($a, $b) {
            return strcmp($b['title'], $a['title']);
        });
        break;
    case 'rating':
        usort($filtered_games, function($a, $b) {
            return $b['rating'] <=> $a['rating'];
        });
        break;
    case 'oldest':
        usort($filtered_games, function($a, $b) {
            return strtotime($a['release_date']) <=> strtotime($b['release_date']);
        });
        break;
    case 'newest':
    default:
        usort($filtered_games, function($a, $b) {
            return strtotime($b['release_date']) <=> strtotime($a['release_date']);
        });
        break;
}

// Calculate pagination
$total_games = count($filtered_games);
$total_pages = ceil($total_games / $games_per_page);

// Ensure current page is within valid range
if ($current_page < 1) $current_page = 1;
if ($current_page > $total_pages && $total_pages > 0) $current_page = $total_pages;

// Get games for current page
$offset = ($current_page - 1) * $games_per_page;
$current_games = array_slice($filtered_games, $offset, $games_per_page);

// Include header
include 'includes/header.php';
?>

<div class="library-header">
    <div class="container">
        <h1>Game Library</h1>

        <div class="library-filters">
            <div class="search-box">
                <form action="games.php" method="GET">
                    <input type="hidden" name="type" value="<?php echo htmlspecialchars($type); ?>">
                    <input type="hidden" name="sort" value="<?php echo htmlspecialchars($sort_by); ?>">
                    <input type="text" name="search" placeholder="Search games..."
                        value="<?php echo htmlspecialchars($search_query); ?>">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>

            <div class="filter-options">
                <div class="filter-group">
                    <label>View:</label>
                    <div class="filter-buttons">
                        <a href="games.php?type=all<?php echo !empty($search_query) ? '&search='.urlencode($search_query) : ''; ?><?php echo !empty($sort_by) ? '&sort='.urlencode($sort_by) : ''; ?>"
                            class="filter-btn <?php echo $type === 'all' ? 'active' : ''; ?>">All Games</a>
                        <a href="games.php?type=new<?php echo !empty($search_query) ? '&search='.urlencode($search_query) : ''; ?><?php echo !empty($sort_by) ? '&sort='.urlencode($sort_by) : ''; ?>"
                            class="filter-btn <?php echo $type === 'new' ? 'active' : ''; ?>">New Releases</a>
                        <a href="games.php?type=top<?php echo !empty($search_query) ? '&search='.urlencode($search_query) : ''; ?><?php echo !empty($sort_by) ? '&sort='.urlencode($sort_by) : ''; ?>"
                            class="filter-btn <?php echo $type === 'top' ? 'active' : ''; ?>">Top Rated</a>
                        <a href="games.php?type=indie<?php echo !empty($search_query) ? '&search='.urlencode($search_query) : ''; ?><?php echo !empty($sort_by) ? '&sort='.urlencode($sort_by) : ''; ?>"
                            class="filter-btn <?php echo $type === 'indie' ? 'active' : ''; ?>">Indie Picks</a>
                    </div>
                </div>

                <div class="filter-group">
                    <label>Sort By:</label>
                    <select id="sort-select" onchange="window.location.href=this.value">
                        <option
                            value="games.php?type=<?php echo urlencode($type); ?><?php echo !empty($search_query) ? '&search='.urlencode($search_query) : ''; ?>&sort=newest"
                            <?php echo $sort_by === 'newest' ? 'selected' : ''; ?>>Newest First</option>
                        <option
                            value="games.php?type=<?php echo urlencode($type); ?><?php echo !empty($search_query) ? '&search='.urlencode($search_query) : ''; ?>&sort=oldest"
                            <?php echo $sort_by === 'oldest' ? 'selected' : ''; ?>>Oldest First</option>
                        <option
                            value="games.php?type=<?php echo urlencode($type); ?><?php echo !empty($search_query) ? '&search='.urlencode($search_query) : ''; ?>&sort=rating"
                            <?php echo $sort_by === 'rating' ? 'selected' : ''; ?>>Highest Rating</option>
                        <option
                            value="games.php?type=<?php echo urlencode($type); ?><?php echo !empty($search_query) ? '&search='.urlencode($search_query) : ''; ?>&sort=title_asc"
                            <?php echo $sort_by === 'title_asc' ? 'selected' : ''; ?>>Title (A-Z)</option>
                        <option
                            value="games.php?type=<?php echo urlencode($type); ?><?php echo !empty($search_query) ? '&search='.urlencode($search_query) : ''; ?>&sort=title_desc"
                            <?php echo $sort_by === 'title_desc' ? 'selected' : ''; ?>>Title (Z-A)</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="library-content">
    <div class="container">
        <?php if (!empty($search_query)): ?>
        <div class="search-results">
            <h2>Search Results for "<?php echo htmlspecialchars($search_query); ?>"</h2>
            <p><?php echo count($filtered_games); ?> games found</p>
            <a href="games.php?type=<?php echo urlencode($type); ?>&sort=<?php echo urlencode($sort_by); ?>"
                class="clear-search">Clear Search</a>
        </div>
        <?php endif; ?>

        <?php if (empty($current_games)): ?>
        <div class="no-games">
            <h3>No games found</h3>
            <p>Try adjusting your search or filters to find what you're looking for.</p>
        </div>
        <?php else: ?>
        <div class="games-grid">
            <?php foreach ($current_games as $game): ?>
            <div class="game-card">
                <div class="game-card-img">
                    <img src="<?php echo htmlspecialchars($game['image']); ?>"
                        alt="<?php echo htmlspecialchars($game['title']); ?>">
                    <div class="game-genre"><?php echo htmlspecialchars($game['genre']); ?></div>
                    <div class="game-rating">
                        <i class="fas fa-star"></i> <?php echo number_format($game['rating'], 1); ?>
                    </div>
                    <div class="hover-info">
                        <a href="game-detail.php?id=<?php echo $game['id']; ?>" class="view-details">View Details</a>
                        <div class="quick-actions">
                            <div class="download-btn"><i class="fas fa-download"></i></div>
                            <div class="wishlist-btn"><i class="fas fa-heart"></i></div>
                        </div>
                    </div>
                </div>
                <div class="game-card-info">
                    <h3><a
                            href="game-detail.php?id=<?php echo $game['id']; ?>"><?php echo htmlspecialchars($game['title']); ?></a>
                    </h3>
                    <p><?php echo htmlspecialchars($game['description']); ?></p>
                    <div class="game-meta">
                        <span class="game-developer"><?php echo htmlspecialchars($game['developer']); ?></span>
                        <span class="game-date"><?php echo date('M Y', strtotime($game['release_date'])); ?></span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <?php if ($total_pages > 1): ?>
        <div class="pagination">
            <?php if ($current_page > 1): ?>
            <a href="games.php?type=<?php echo urlencode($type); ?>&sort=<?php echo urlencode($sort_by); ?><?php echo !empty($search_query) ? '&search='.urlencode($search_query) : ''; ?>&page=<?php echo $current_page - 1; ?>"
                class="page-link prev">
                <i class="fas fa-chevron-left"></i> Previous
            </a>
            <?php else: ?>
            <span class="page-link prev disabled"><i class="fas fa-chevron-left"></i> Previous</span>
            <?php endif; ?>

            <?php
                    // Determine range of page numbers to show
                    $range = 2; // Show 2 pages before and after current page
                    $start_page = max(1, $current_page - $range);
                    $end_page = min($total_pages, $current_page + $range);

                    // Always show first page
                    if ($start_page > 1) {
                        echo '<a href="games.php?type=' . urlencode($type) . '&sort=' . urlencode($sort_by) . (!empty($search_query) ? '&search='.urlencode($search_query) : '') . '&page=1" class="page-link">1</a>';
                        if ($start_page > 2) {
                            echo '<span class="page-ellipsis">...</span>';
                        }
                    }

                    // Show page numbers
                    for ($i = $start_page; $i <= $end_page; $i++) {
                        if ($i == $current_page) {
                            echo '<span class="page-link current">' . $i . '</span>';
                        } else {
                            echo '<a href="games.php?type=' . urlencode($type) . '&sort=' . urlencode($sort_by) . (!empty($search_query) ? '&search='.urlencode($search_query) : '') . '&page=' . $i . '" class="page-link">' . $i . '</a>';
                        }
                    }

                    // Always show last page
                    if ($end_page < $total_pages) {
                        if ($end_page < $total_pages - 1) {
                            echo '<span class="page-ellipsis">...</span>';
                        }
                        echo '<a href="games.php?type=' . urlencode($type) . '&sort=' . urlencode($sort_by) . (!empty($search_query) ? '&search='.urlencode($search_query) : '') . '&page=' . $total_pages . '" class="page-link">' . $total_pages . '</a>';
                    }
                    ?>

            <?php if ($current_page < $total_pages): ?>
            <a href="games.php?type=<?php echo urlencode($type); ?>&sort=<?php echo urlencode($sort_by); ?><?php echo !empty($search_query) ? '&search='.urlencode($search_query) : ''; ?>&page=<?php echo $current_page + 1; ?>"
                class="page-link next">
                Next <i class="fas fa-chevron-right"></i>
            </a>
            <?php else: ?>
            <span class="page-link next disabled">Next <i class="fas fa-chevron-right"></i></span>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        <?php endif; ?>
    </div>
</section>

<?php
// Include footer
include 'includes/footer.php';
?>
