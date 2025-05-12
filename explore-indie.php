<?php
// Start session
session_start();

// Include configuration file
require_once 'config.php';

// Include functions file
require_once 'functions.php';

// Page title
$pageTitle = "Indie Picks - GAMEZUNIA";

// Get current page for pagination
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$games_per_page = 9;

// Get sort option if exists
$sort_by = isset($_GET['sort']) ? $_GET['sort'] : 'featured';

// Get filter if exists
$filter = isset($_GET['filter']) ? $_GET['filter'] : 'all';

// Mock database of indie games (in a real app, this would come from a database)
$indie_games = [
    [
        'id' => 25,
        'title' => 'Pixel Dungeon',
        'description' => 'A roguelike dungeon crawler with charming pixel art and challenging gameplay.',
        'image' => 'assets/images/game5.jpg',
        'genre' => 'Roguelike',
        'rating' => 4.7,
        'release_date' => '2023-03-15',
        'developer' => 'Pixel Dreams',
        'featured' => true,
        'price' => 9.99,
        'tags' => ['Pixel Art', 'Roguelike', 'Dungeon Crawler']
    ],
    [
        'id' => 26,
        'title' => 'Neon Abyss',
        'description' => 'Dive into a colorful cyberpunk world filled with neon lights and challenging platforming.',
        'image' => 'assets/images/game2.jpg',
        'genre' => 'Platformer',
        'rating' => 4.6,
        'release_date' => '2023-02-28',
        'developer' => 'Neon Studios',
        'featured' => false,
        'price' => 14.99,
        'tags' => ['Cyberpunk', 'Platformer', 'Neon']
    ],
    [
        'id' => 27,
        'title' => 'Starbound',
        'description' => 'Explore a procedurally generated universe in this space sandbox adventure.',
        'image' => 'assets/images/game3.jpg',
        'genre' => 'Sandbox',
        'rating' => 4.8,
        'release_date' => '2023-04-10',
        'developer' => 'Stellar Games',
        'featured' => true,
        'price' => 19.99,
        'tags' => ['Space', 'Sandbox', 'Exploration']
    ],
    [
        'id' => 28,
        'title' => 'Hollow Knight',
        'description' => 'Journey through a haunting underground kingdom in this atmospheric metroidvania.',
        'image' => 'assets/images/game6.jpg',
        'genre' => 'Metroidvania',
        'rating' => 4.9,
        'release_date' => '2023-01-20',
        'developer' => 'Team Cherry',
        'featured' => true,
        'price' => 15.99,
        'tags' => ['Metroidvania', 'Atmospheric', 'Challenging']
    ],
    [
        'id' => 29,
        'title' => 'Stardew Valley',
        'description' => 'Build your dream farm and connect with the local community in this relaxing simulation.',
        'image' => 'assets/images/game8.jpg',
        'genre' => 'Simulation',
        'rating' => 4.8,
        'release_date' => '2023-05-05',
        'developer' => 'ConcernedApe',
        'featured' => false,
        'price' => 14.99,
        'tags' => ['Farming', 'Life Sim', 'Relaxing']
    ],
    [
        'id' => 30,
        'title' => 'Celeste',
        'description' => 'Help Madeline climb Celeste Mountain in this challenging platformer with a touching story.',
        'image' => 'assets/images/game7.jpg',
        'genre' => 'Platformer',
        'rating' => 4.9,
        'release_date' => '2023-02-10',
        'developer' => 'Extremely OK Games',
        'featured' => true,
        'price' => 19.99,
        'tags' => ['Platformer', 'Story-Rich', 'Challenging']
    ],
    [
        'id' => 31,
        'title' => 'Hades',
        'description' => 'Battle your way out of the underworld in this action roguelike with Greek mythology themes.',
        'image' => 'assets/images/game9.jpg',
        'genre' => 'Action Roguelike',
        'rating' => 4.9,
        'release_date' => '2023-03-20',
        'developer' => 'Supergiant Games',
        'featured' => true,
        'price' => 24.99,
        'tags' => ['Roguelike', 'Action', 'Mythology']
    ],
    [
        'id' => 32,
        'title' => 'Undertale',
        'description' => 'Experience a unique RPG where you don\'t have to kill anyone, with a memorable story and characters.',
        'image' => 'assets/images/game10.jpg',
        'genre' => 'RPG',
        'rating' => 4.8,
        'release_date' => '2023-01-15',
        'developer' => 'Toby Fox',
        'featured' => false,
        'price' => 9.99,
        'tags' => ['RPG', 'Story-Rich', 'Unique']
    ],
    [
        'id' => 33,
        'title' => 'Ori and the Blind Forest',
        'description' => 'Guide Ori through a visually stunning forest in this emotional platformer adventure.',
        'image' => 'assets/images/game1.jpg',
        'genre' => 'Platformer',
        'rating' => 4.8,
        'release_date' => '2023-04-25',
        'developer' => 'Moon Studios',
        'featured' => true,
        'price' => 19.99,
        'tags' => ['Platformer', 'Beautiful', 'Emotional']
    ],
    [
        'id' => 34,
        'title' => 'Cuphead',
        'description' => 'Run and gun your way through this visually stunning game inspired by 1930s cartoons.',
        'image' => 'assets/images/game4.jpg',
        'genre' => 'Run and Gun',
        'rating' => 4.7,
        'release_date' => '2023-02-05',
        'developer' => 'Studio MDHR',
        'featured' => false,
        'price' => 19.99,
        'tags' => ['Difficult', 'Hand-Drawn', 'Boss Battles']
    ],
    [
        'id' => 35,
        'title' => 'Slay the Spire',
        'description' => 'Build a unique deck and battle your way up the Spire in this roguelike card game.',
        'image' => 'assets/images/game5.jpg',
        'genre' => 'Card Game',
        'rating' => 4.8,
        'release_date' => '2023-03-10',
        'developer' => 'Mega Crit Games',
        'featured' => false,
        'price' => 24.99,
        'tags' => ['Card Game', 'Roguelike', 'Strategy']
    ],
    [
        'id' => 36,
        'title' => 'Shovel Knight',
        'description' => 'Dig your way through this retro-inspired platformer with modern gameplay mechanics.',
        'image' => 'assets/images/game2.jpg',
        'genre' => 'Platformer',
        'rating' => 4.7,
        'release_date' => '2023-05-20',
        'developer' => 'Yacht Club Games',
        'featured' => false,
        'price' => 14.99,
        'tags' => ['Retro', 'Platformer', '8-bit']
    ],
    [
        'id' => 37,
        'title' => 'Dead Cells',
        'description' => 'Fight your way through an ever-changing castle in this fast-paced roguelike metroidvania.',
        'image' => 'assets/images/game3.jpg',
        'genre' => 'Roguelike',
        'rating' => 4.8,
        'release_date' => '2023-04-15',
        'developer' => 'Motion Twin',
        'featured' => true,
        'price' => 24.99,
        'tags' => ['Roguelike', 'Metroidvania', 'Action']
    ],
    [
        'id' => 38,
        'title' => 'Hyper Light Drifter',
        'description' => 'Explore a beautiful, ruined world in this action RPG with stunning pixel art.',
        'image' => 'assets/images/game6.jpg',
        'genre' => 'Action RPG',
        'rating' => 4.7,
        'release_date' => '2023-01-30',
        'developer' => 'Heart Machine',
        'featured' => false,
        'price' => 19.99,
        'tags' => ['Pixel Art', 'Action', 'Atmospheric']
    ],
    [
        'id' => 39,
        'title' => 'Terraria',
        'description' => 'Dig, fight, and build in this 2D sandbox adventure with endless possibilities.',
        'image' => 'assets/images/game8.jpg',
        'genre' => 'Sandbox',
        'rating' => 4.8,
        'release_date' => '2023-03-25',
        'developer' => 'Re-Logic',
        'featured' => false,
        'price' => 9.99,
        'tags' => ['Sandbox', '2D', 'Exploration']
    ],
    [
        'id' => 40,
        'title' => 'Bastion',
        'description' => 'Rebuild the world after the Calamity in this action RPG with a dynamic narrator.',
        'image' => 'assets/images/game7.jpg',
        'genre' => 'Action RPG',
        'rating' => 4.7,
        'release_date' => '2023-02-15',
        'developer' => 'Supergiant Games',
        'featured' => false,
        'price' => 14.99,
        'tags' => ['Action', 'Narration', 'Isometric']
    ],
    [
        'id' => 41,
        'title' => 'Limbo',
        'description' => 'Guide a boy through a dark, atmospheric world filled with puzzles and dangers.',
        'image' => 'assets/images/game9.jpg',
        'genre' => 'Puzzle Platformer',
        'rating' => 4.7,
        'release_date' => '2023-01-10',
        'developer' => 'Playdead',
        'featured' => false,
        'price' => 9.99,
        'tags' => ['Atmospheric', 'Dark', 'Puzzle']
    ],
    [
        'id' => 42,
        'title' => 'Factorio',
        'description' => 'Build and maintain factories in this complex automation simulation game.',
        'image' => 'assets/images/game10.jpg',
        'genre' => 'Simulation',
        'rating' => 4.9,
        'release_date' => '2023-05-15',
        'developer' => 'Wube Software',
        'featured' => true,
        'price' => 30.00,
        'tags' => ['Automation', 'Strategy', 'Building']
    ]
];

// Filter games based on filter
if ($filter !== 'all') {
    $filtered_games = array_filter($indie_games, function($game) use ($filter) {
        return strtolower($game['genre']) === strtolower($filter);
    });
} else {
    $filtered_games = $indie_games;
}

// Sort games based on sort option
switch ($sort_by) {
    case 'rating':
        usort($filtered_games, function($a, $b) {
            return $b['rating'] <=> $a['rating'];
        });
        break;
    case 'price_low':
        usort($filtered_games, function($a, $b) {
            return $a['price'] <=> $b['price'];
        });
        break;
    case 'price_high':
        usort($filtered_games, function($a, $b) {
            return $b['price'] <=> $a['price'];
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
    case 'newest':
        usort($filtered_games, function($a, $b) {
            return strtotime($b['release_date']) <=> strtotime($a['release_date']);
        });
        break;
    case 'featured':
    default:
        usort($filtered_games, function($a, $b) {
            if ($a['featured'] && !$b['featured']) return -1;
            if (!$a['featured'] && $b['featured']) return 1;
            return $b['rating'] <=> $a['rating']; // If both are featured or not featured, sort by rating
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
}, $indie_games));
sort($genres);

// Include header
include 'includes/header.php';
?>

<div class="explore-header indie-header">
    <div class="container">
        <div class="explore-breadcrumb">
            <a href="explore.php">Explore</a> <i class="fas fa-chevron-right"></i> <span>Indie Picks</span>
        </div>
        <h1>Indie Picks</h1>
        <p>Discover amazing games from independent developers</p>
    </div>
</div>

<section class="indie-spotlight">
    <div class="container">
        <div class="section-header">
            <h2>Indie Spotlight</h2>
            <p>Our handpicked selection of outstanding indie games</p>
        </div>

        <div class="spotlight-game">
            <?php
            // Get the highest rated featured indie game
            usort($indie_games, function($a, $b) {
                if ($a['featured'] && !$b['featured']) return -1;
                if (!$a['featured'] && $b['featured']) return 1;
                return $b['rating'] <=> $a['rating'];
            });
            $spotlight_game = $indie_games[0];
            ?>

            <div class="spotlight-image">
                <img src="<?php echo htmlspecialchars($spotlight_game['image']); ?>"
                    alt="<?php echo htmlspecialchars($spotlight_game['title']); ?>">
                <div class="spotlight-overlay"></div>
                <div class="indie-badge">FEATURED INDIE</div>
            </div>
            <div class="spotlight-info">
                <div class="spotlight-rating">
                    <div class="rating-stars">
                        <?php
                        $full_stars = floor($spotlight_game['rating']);
                        $half_star = ($spotlight_game['rating'] - $full_stars) >= 0.5;

                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $full_stars) {
                                echo '<i class="fas fa-star"></i>';
                            } elseif ($i == $full_stars + 1 && $half_star) {
                                echo '<i class="fas fa-star-half-alt"></i>';
                            } else {
                                echo '<i class="far fa-star"></i>';
                            }
                        }
                        ?>
                        <span class="rating-number"><?php echo number_format($spotlight_game['rating'], 1); ?></span>
                    </div>
                </div>
                <h2><?php echo htmlspecialchars($spotlight_game['title']); ?></h2>
                <p class="spotlight-description"><?php echo htmlspecialchars($spotlight_game['description']); ?></p>
                <div class="spotlight-meta">
                    <div class="meta-item">
                        <span class="meta-label">Developer:</span>
                        <span class="meta-value"><?php echo htmlspecialchars($spotlight_game['developer']); ?></span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Genre:</span>
                        <span class="meta-value"><?php echo htmlspecialchars($spotlight_game['genre']); ?></span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Release Date:</span>
                        <span
                            class="meta-value"><?php echo date('F j, Y', strtotime($spotlight_game['release_date'])); ?></span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Price:</span>
                        <span class="meta-value">$<?php echo number_format($spotlight_game['price'], 2); ?></span>
                    </div>
                </div>
                <div class="spotlight-tags">
                    <?php foreach ($spotlight_game['tags'] as $tag): ?>
                    <span class="indie-tag"><?php echo htmlspecialchars($tag); ?></span>
                    <?php endforeach; ?>
                </div>
                <div class="spotlight-actions">
                    <a href="game-detail.php?id=<?php echo $spotlight_game['id']; ?>" class="btn btn-primary">View
                        Details</a>
                    <a href="#" class="btn btn-secondary">Download Now</a>
                    <a href="#" class="btn btn-outline"><i class="far fa-heart"></i> Add to Wishlist</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="indie-content">
    <div class="container">
        <div class="explore-filters">
            <div class="filter-wrapper">
                <div class="filter-group">
                    <label>Filter by Genre:</label>
                    <select id="genre-filter" onchange="window.location.href=this.value">
                        <option value="explore-indie.php?filter=all&sort=<?php echo urlencode($sort_by); ?>"
                            <?php echo $filter === 'all' ? 'selected' : ''; ?>>All Genres</option>
                        <?php foreach ($genres as $genre): ?>
                        <option
                            value="explore-indie.php?filter=<?php echo urlencode(strtolower($genre)); ?>&sort=<?php echo urlencode($sort_by); ?>"
                            <?php echo strtolower($filter) === strtolower($genre) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($genre); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="filter-group">
                    <label>Sort By:</label>
                    <select id="sort-select" onchange="window.location.href=this.value">
                        <option value="explore-indie.php?filter=<?php echo urlencode($filter); ?>&sort=featured"
                            <?php echo $sort_by === 'featured' ? 'selected' : ''; ?>>Featured</option>
                        <option value="explore-indie.php?filter=<?php echo urlencode($filter); ?>&sort=rating"
                            <?php echo $sort_by === 'rating' ? 'selected' : ''; ?>>Highest Rating</option>
                        <option value="explore-indie.php?filter=<?php echo urlencode($filter); ?>&sort=newest"
                            <?php echo $sort_by === 'newest' ? 'selected' : ''; ?>>Newest First</option>
                        <option value="explore-indie.php?filter=<?php echo urlencode($filter); ?>&sort=price_low"
                            <?php echo $sort_by === 'price_low' ? 'selected' : ''; ?>>Price: Low to High</option>
                        <option value="explore-indie.php?filter=<?php echo urlencode($filter); ?>&sort=price_high"
                            <?php echo $sort_by === 'price_high' ? 'selected' : ''; ?>>Price: High to Low</option>
                        <option value="explore-indie.php?filter=<?php echo urlencode($filter); ?>&sort=title_asc"
                            <?php echo $sort_by === 'title_asc' ? 'selected' : ''; ?>>Title (A-Z)</option>
                        <option value="explore-indie.php?filter=<?php echo urlencode($filter); ?>&sort=title_desc"
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
        <div class="indie-games-grid">
            <?php foreach ($current_games as $game): ?>
            <div class="indie-game-card">
                <div class="indie-game-image">
                    <img src="<?php echo htmlspecialchars($game['image']); ?>"
                        alt="<?php echo htmlspecialchars($game['title']); ?>">
                    <?php if ($game['featured']): ?>
                    <div class="featured-tag">FEATURED</div>
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
                <div class="indie-game-info">
                    <h3><a
                            href="game-detail.php?id=<?php echo $game['id']; ?>"><?php echo htmlspecialchars($game['title']); ?></a>
                    </h3>
                    <div class="game-meta">
                        <span class="game-genre"><?php echo htmlspecialchars($game['genre']); ?></span>
                        <span class="game-price">$<?php echo number_format($game['price'], 2); ?></span>
                    </div>
                    <p><?php echo htmlspecialchars($game['description']); ?></p>
                    <div class="game-tags">
                        <?php foreach (array_slice($game['tags'], 0, 3) as $tag): ?>
                        <span class="indie-tag-small"><?php echo htmlspecialchars($tag); ?></span>
                        <?php endforeach; ?>
                    </div>
                    <div class="game-developer">
                        <span>By:</span> <?php echo htmlspecialchars($game['developer']); ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <?php if ($total_pages > 1): ?>
        <div class="pagination">
            <?php if ($current_page > 1): ?>
            <a href="explore-indie.php?filter=<?php echo urlencode($filter); ?>&sort=<?php echo urlencode($sort_by); ?>&page=<?php echo $current_page - 1; ?>"
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
                        echo '<a href="explore-indie.php?filter=' . urlencode($filter) . '&sort=' . urlencode($sort_by) . '&page=1" class="page-link">1</a>';
                        if ($start_page > 2) {
                            echo '<span class="page-ellipsis">...</span>';
                        }
                    }

                    // Show page numbers
                    for ($i = $start_page; $i <= $end_page; $i++) {
                        if ($i == $current_page) {
                            echo '<span class="page-link current">' . $i . '</span>';
                        } else {
                            echo '<a href="explore-indie.php?filter=' . urlencode($filter) . '&sort=' . urlencode($sort_by) . '&page=' . $i . '" class="page-link">' . $i . '</a>';
                        }
                    }

                    // Always show last page
                    if ($end_page < $total_pages) {
                        if ($end_page < $total_pages - 1) {
                            echo '<span class="page-ellipsis">...</span>';
                        }
                        echo '<a href="explore-indie.php?filter=' . urlencode($filter) . '&sort=' . urlencode($sort_by) . '&page=' . $total_pages . '" class="page-link">' . $total_pages . '</a>';
                    }
                    ?>

            <?php if ($current_page < $total_pages): ?>
            <a href="explore-indie.php?filter=<?php echo urlencode($filter); ?>&sort=<?php echo urlencode($sort_by); ?>&page=<?php echo $current_page + 1; ?>"
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

<section class="indie-developers">
    <div class="container">
        <div class="section-header">
            <h2>Featured Indie Developers</h2>
            <p>Meet the creative minds behind these amazing games</p>
        </div>

        <div class="developers-grid">
            <div class="developer-card">
                <div class="developer-image">
                    <img src="assets/images/dev1.jpg" alt="Developer 1">
                </div>
                <div class="developer-info">
                    <h3>Supergiant Games</h3>
                    <p>Known for critically acclaimed titles like Hades, Bastion, and Transistor.</p>
                    <div class="developer-games">
                        <span>Popular Games:</span> Hades, Bastion
                    </div>
                    <a href="#" class="developer-link">View All Games <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="developer-card">
                <div class="developer-image">
                    <img src="assets/images/dev2.jpg" alt="Developer 2">
                </div>
                <div class="developer  alt=" Developer 2">
                </div>
                <div class="developer-info">
                    <h3>Team Cherry</h3>
                    <p>A small team that created the beloved metroidvania Hollow Knight.</p>
                    <div class="developer-games">
                        <span>Popular Games:</span> Hollow Knight
                    </div>
                    <a href="#" class="developer-link">View All Games <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="developer-card">
                <div class="developer-image">
                    <img src="assets/images/dev3.jpg" alt="Developer 3">
                </div>
                <div class="developer-info">
                    <h3>ConcernedApe</h3>
                    <p>Solo developer behind the farming simulation phenomenon Stardew Valley.</p>
                    <div class="developer-games">
                        <span>Popular Games:</span> Stardew Valley
                    </div>
                    <a href="#" class="developer-link">View All Games <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="developer-card">
                <div class="developer-image">
                    <img src="assets/images/dev4.jpg" alt="Developer 4">
                </div>
                <div class="developer-info">
                    <h3>Motion Twin</h3>
                    <p>Creators of the acclaimed roguelike metroidvania Dead Cells.</p>
                    <div class="developer-games">
                        <span>Popular Games:</span> Dead Cells
                    </div>
                    <a href="#" class="developer-link">View All Games <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
// Include footer
include 'includes/footer.php';
?>
