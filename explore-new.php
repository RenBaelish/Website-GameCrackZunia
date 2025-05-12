<?php
// Start session
session_start();

// Include configuration file
require_once 'config.php';

// Include functions file
require_once 'functions.php';

// Page title
$pageTitle = "New Releases - GAMEZUNIA";

// Get current page for pagination
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$games_per_page = 12;

// Get sort option if exists
$sort_by = isset($_GET['sort']) ? $_GET['sort'] : 'newest';

// Get filter if exists
$filter = isset($_GET['filter']) ? $_GET['filter'] : 'all';

// Mock database of new release games (in a real app, this would come from a database)
$new_games = [
    [
        'id' => 1,
        'title' => 'Neon Override',
        'description' => 'Enter a cyberpunk world where neon lights illuminate the path to digital revolution.',
        'image' => 'assets/images/game1.jpg',
        'genre' => 'Action',
        'rating' => 4.8,
        'release_date' => '2023-05-15',
        'developer' => 'Cyber Studios',
        'days_ago' => 3,
        'features' => ['Open World', 'Single Player', 'Controller Support']
    ],
    [
        'id' => 4,
        'title' => 'Synth Warz: Omega',
        'description' => 'Command your synthetic army in this futuristic real-time strategy game.',
        'image' => 'assets/images/game4.jpg',
        'genre' => 'Strategy',
        'rating' => 4.3,
        'release_date' => '2023-06-05',
        'developer' => 'Omega Interactive',
        'days_ago' => 5,
        'features' => ['RTS', 'Multiplayer', 'Futuristic']
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
        'days_ago' => 5,
        'features' => ['Open World', 'Cyberpunk', 'Enhanced Edition']
    ],
    [
        'id' => 16,
        'title' => 'Urban Legends',
        'description' => 'Investigate supernatural occurrences in this atmospheric horror adventure.',
        'image' => 'assets/images/game6.jpg',
        'genre' => 'Horror',
        'rating' => 4.7,
        'release_date' => '2023-06-01',
        'developer' => 'Midnight Tales',
        'days_ago' => 9,
        'features' => ['Horror', 'Investigation', 'Supernatural']
    ],
    [
        'id' => 8,
        'title' => 'Aether Bloom',
        'description' => 'Cultivate magical plants in this relaxing yet strategic gardening simulator.',
        'image' => 'assets/images/game8.jpg',
        'genre' => 'Simulation',
        'rating' => 4.4,
        'release_date' => '2023-05-22',
        'developer' => 'Bloom Studios',
        'days_ago' => 19,
        'features' => ['Simulation', 'Relaxing', 'Strategy']
    ],
    [
        'id' => 6,
        'title' => 'Chrono Splicer',
        'description' => 'Manipulate time to solve puzzles and defeat enemies in this mind-bending adventure.',
        'image' => 'assets/images/game6.jpg',
        'genre' => 'Puzzle',
        'rating' => 4.9,
        'release_date' => '2023-05-17',
        'developer' => 'Temporal Games',
        'days_ago' => 24,
        'features' => ['Puzzle Solving', 'Time Manipulation', 'Story Rich']
    ],
    [
        'id' => 19,
        'title' => 'Neon Drift Racers',
        'description' => 'Race through neon-lit streets in this high-octane arcade racing game.',
        'image' => 'assets/images/game2.jpg',
        'genre' => 'Racing',
        'rating' => 4.5,
        'release_date' => '2023-05-10',
        'developer' => 'Speed Demons',
        'days_ago' => 31,
        'features' => ['Racing', 'Arcade', 'Multiplayer']
    ],
    [
        'id' => 20,
        'title' => 'Quantum Breach',
        'description' => 'Hack into secure systems and uncover a global conspiracy in this cyberpunk thriller.',
        'image' => 'assets/images/game3.jpg',
        'genre' => 'Action',
        'rating' => 4.6,
        'release_date' => '2023-05-05',
        'developer' => 'Digital Nexus',
        'days_ago' => 36,
        'features' => ['Hacking', 'Cyberpunk', 'Story-Driven']
    ],
    [
        'id' => 21,
        'title' => 'Stellar Odyssey',
        'description' => 'Explore the vast reaches of space in this epic sci-fi adventure.',
        'image' => 'assets/images/game5.jpg',
        'genre' => 'Adventure',
        'rating' => 4.7,
        'release_date' => '2023-04-28',
        'developer' => 'Cosmic Games',
        'days_ago' => 43,
        'features' => ['Space', 'Exploration', 'Sci-Fi']
    ],
    [
        'id' => 22,
        'title' => 'Mystic Realms',
        'description' => 'Embark on a magical journey through enchanted lands in this fantasy RPG.',
        'image' => 'assets/images/game7.jpg',
        'genre' => 'RPG',
        'rating' => 4.8,
        'release_date' => '2023-04-20',
        'developer' => 'Enchanted Studios',
        'days_ago' => 51,
        'features' => ['Fantasy', 'RPG', 'Magic']
    ],
    [
        'id' => 23,
        'title' => 'Zombie Apocalypse: Survival',
        'description' => 'Fight for your life in a world overrun by the undead in this survival horror game.',
        'image' => 'assets/images/game9.jpg',
        'genre' => 'Survival',
        'rating' => 4.4,
        'release_date' => '2023-04-15',
        'developer' => 'Undead Games',
        'days_ago' => 56,
        'features' => ['Zombies', 'Survival', 'Horror']
    ],
    [
        'id' => 24,
        'title' => 'Mech Warriors: Titanfall',
        'description' => 'Pilot massive mechs in epic battles across futuristic landscapes.',
        'image' => 'assets/images/game10.jpg',
        'genre' => 'Action',
        'rating' => 4.6,
        'release_date' => '2023-04-10',
        'developer' => 'Titan Studios',
        'days_ago' => 61,
        'features' => ['Mechs', 'Action', 'Sci-Fi']
    ]
];

// Filter games based on filter
if ($filter !== 'all') {
    $filtered_games = array_filter($new_games, function($game) use ($filter) {
        return strtolower($game['genre']) === strtolower($filter);
    });
} else {
    $filtered_games = $new_games;
}

// Sort games based on sort option
switch ($sort_by) {
    case 'rating':
        usort($filtered_games, function($a, $b) {
            return $b['rating'] <=> $a['rating'];
        });
        break;
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

// Get unique genres for filter
$genres = array_unique(array_map(function($game) {
    return $game['genre'];
}, $new_games));
sort($genres);

// Include header
include 'includes/header.php';
?>

<div class="explore-header new-releases-header">
    <div class="container">
        <div class="explore-breadcrumb">
            <a href="explore.php">Explore</a> <i class="fas fa-chevron-right"></i> <span>New Releases</span>
        </div>
        <h1>New Releases</h1>
        <p>The latest games to hit GAMEZUNIA, fresh from the developers</p>
    </div>
</div>

<section class="new-releases-content">
    <div class="container">
        <div class="explore-filters">
            <div class="filter-wrapper">
                <div class="filter-group">
                    <label>Filter by Genre:</label>
                    <select id="genre-filter" onchange="window.location.href=this.value">
                        <option value="explore-new.php?filter=all&sort=<?php echo urlencode($sort_by); ?>"
                            <?php echo $filter === 'all' ? 'selected' : ''; ?>>All Genres</option>
                        <?php foreach ($genres as $genre): ?>
                        <option
                            value="explore-new.php?filter=<?php echo urlencode(strtolower($genre)); ?>&sort=<?php echo urlencode($sort_by); ?>"
                            <?php echo strtolower($filter) === strtolower($genre) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($genre); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="filter-group">
                    <label>Sort By:</label>
                    <select id="sort-select" onchange="window.location.href=this.value">
                        <option value="explore-new.php?filter=<?php echo urlencode($filter); ?>&sort=newest"
                            <?php echo $sort_by === 'newest' ? 'selected' : ''; ?>>Newest First</option>
                        <option value="explore-new.php?filter=<?php echo urlencode($filter); ?>&sort=oldest"
                            <?php echo $sort_by === 'oldest' ? 'selected' : ''; ?>>Oldest First</option>
                        <option value="explore-new.php?filter=<?php echo urlencode($filter); ?>&sort=rating"
                            <?php echo $sort_by === 'rating' ? 'selected' : ''; ?>>Highest Rating</option>
                        <option value="explore-new.php?filter=<?php echo urlencode($filter); ?>&sort=title_asc"
                            <?php echo $sort_by === 'title_asc' ? 'selected' : ''; ?>>Title (A-Z)</option>
                        <option value="explore-new.php?filter=<?php echo urlencode($filter); ?>&sort=title_desc"
                            <?php echo $sort_by === 'title_desc' ? 'selected' : ''; ?>>Title (Z-A)</option>
                    </select>
                </div>
            </div>

            <div class="results-count">
                Showing <?php echo count($current_games); ?> of <?php echo $total_games; ?> games
            </div>
        </div>

        <?php if (empty($current_games)): ?>
        <div class="no-games">
            <h3>No games found</h3>
            <p>Try adjusting your filters to find what you're looking for.</p>
        </div>
        <?php else: ?>
        <div class="new-releases-grid">
            <?php foreach ($current_games as $game): ?>
            <div class="new-game-card">
                <div class="new-game-image">
                    <img src="<?php echo htmlspecialchars($game['image']); ?>"
                        alt="<?php echo htmlspecialchars($game['title']); ?>">
                    <div class="new-badge">NEW</div>
                    <?php if ($game['days_ago'] <= 7): ?>
                    <div class="days-badge">Just Released</div>
                    <?php elseif ($game['days_ago'] <= 30): ?>
                    <div class="days-badge">This Month</div>
                    <?php else: ?>
                    <div class="days-badge">Recent</div>
                    <?php endif; ?>
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
                <div class="new-game-info">
                    <h3><a
                            href="game-detail.php?id=<?php echo $game['id']; ?>"><?php echo htmlspecialchars($game['title']); ?></a>
                    </h3>
                    <div class="game-meta">
                        <span class="game-genre"><?php echo htmlspecialchars($game['genre']); ?></span>
                        <span class="game-date"><?php echo date('M d, Y', strtotime($game['release_date'])); ?></span>
                    </div>
                    <p><?php echo htmlspecialchars($game['description']); ?></p>
                    <div class="game-features">
                        <?php foreach ($game['features'] as $feature): ?>
                        <span class="feature-tag"><?php echo htmlspecialchars($feature); ?></span>
                        <?php endforeach; ?>
                    </div>
                    <div class="game-developer">
                        <span>Developer:</span> <?php echo htmlspecialchars($game['developer']); ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <?php if ($total_pages > 1): ?>
        <div class="pagination">
            <?php if ($current_page > 1): ?>
            <a href="explore-new.php?filter=<?php echo urlencode($filter); ?>&sort=<?php echo urlencode($sort_by); ?>&page=<?php echo $current_page - 1; ?>"
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
                        echo '<a href="explore-new.php?filter=' . urlencode($filter) . '&sort=' . urlencode($sort_by) . '&page=1" class="page-link">1</a>';
                        if ($start_page > 2) {
                            echo '<span class="page-ellipsis">...</span>';
                        }
                    }

                    // Show page numbers
                    for ($i = $start_page; $i <= $end_page; $i++) {
                        if ($i == $current_page) {
                            echo '<span class="page-link current">' . $i . '</span>';
                        } else {
                            echo '<a href="explore-new.php?filter=' . urlencode($filter) . '&sort=' . urlencode($sort_by) . '&page=' . $i . '" class="page-link">' . $i . '</a>';
                        }
                    }

                    // Always show last page
                    if ($end_page < $total_pages) {
                        if ($end_page < $total_pages - 1) {
                            echo '<span class="page-ellipsis">...</span>';
                        }
                        echo '<a href="explore-new.php?filter=' . urlencode($filter) . '&sort=' . urlencode($sort_by) . '&page=' . $total_pages . '" class="page-link">' . $total_pages . '</a>';
                    }
                    ?>

            <?php if ($current_page < $total_pages): ?>
            <a href="explore-new.php?filter=<?php echo urlencode($filter); ?>&sort=<?php echo urlencode($sort_by); ?>&page=<?php echo $current_page + 1; ?>"
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

<section class="upcoming-releases">
    <div class="container">
        <div class="section-header">
            <h2>Coming Soon</h2>
            <p>Exciting games on the horizon</p>
        </div>

        <div class="upcoming-grid">
            <div class="upcoming-card">
                <div class="upcoming-image">
                    <img src="assets/images/game1.jpg" alt="Upcoming Game 1">
                    <div class="upcoming-overlay"></div>
                    <div class="release-date">
                        <div class="date-day">15</div>
                        <div class="date-month">JUL</div>
                    </div>
                </div>
                <div class="upcoming-info">
                    <h3>Galaxy Commander</h3>
                    <p>Command your fleet in this epic space strategy game.</p>
                    <div class="upcoming-meta">
                        <span class="upcoming-genre">Strategy</span>
                        <a href="#" class="wishlist-link"><i class="far fa-heart"></i> Add to Wishlist</a>
                    </div>
                </div>
            </div>

            <div class="upcoming-card">
                <div class="upcoming-image">
                    <img src="assets/images/game2.jpg" alt="Upcoming Game 2">
                    <div class="upcoming-overlay"></div>
                    <div class="release-date">
                        <div class="date-day">22</div>
                        <div class="date-month">JUL</div>
                    </div>
                </div>
                <div class="upcoming-info">
                    <h3>Shadow Protocol</h3>
                    <p>Infiltrate enemy bases in this stealth action game.</p>
                    <div class="upcoming-meta">
                        <span class="upcoming-genre">Action</span>
                        <a href="#" class="wishlist-link"><i class="far fa-heart"></i> Add to Wishlist</a>
                    </div>
                </div>
            </div>

            <div class="upcoming-card">
                <div class="upcoming-image">
                    <img src="assets/images/game3.jpg" alt="Upcoming Game 3">
                    <div class="upcoming-overlay"></div>
                    <div class="release-date">
                        <div class="date-day">05</div>
                        <div class="date-month">AUG</div>
                    </div>
                </div>
                <div class="upcoming-info">
                    <h3>Mystic Legends</h3>
                    <p>Embark on a magical journey in this fantasy RPG.</p>
                    <div class="upcoming-meta">
                        <span class="upcoming-genre">RPG</span>
                        <a href="#" class="wishlist-link"><i class="far fa-heart"></i> Add to Wishlist</a>
                    </div>
                </div>
            </div>

            <div class="upcoming-card">
                <div class="upcoming-image">
                    <img src="assets/images/game4.jpg" alt="Upcoming Game 4">
                    <div class="upcoming-overlay"></div>
                    <div class="release-date">
                        <div class="date-day">18</div>
                        <div class="date-month">AUG</div>
                    </div>
                </div>
                <div class="upcoming-info">
                    <h3>Velocity Drift</h3>
                    <p>Race through neon-lit streets in this arcade racing game.</p>
                    <div class="upcoming-meta">
                        <span class="upcoming-genre">Racing</span>
                        <a href="#" class="wishlist-link"><i class="far fa-heart"></i> Add to Wishlist</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
// Include footer
include 'includes/footer.php';
?>
