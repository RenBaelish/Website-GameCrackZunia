<?php
// Start session
session_start();

// Include configuration file
require_once 'config.php';

// Include functions file
require_once 'functions.php';

// Page title
$pageTitle = "Retro Vault - GAMEZUNIA";

// Get current page for pagination
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$games_per_page = 12;

// Get sort option if exists
$sort_by = isset($_GET['sort']) ? $_GET['sort'] : 'popular';

// Get era filter if exists
$era = isset($_GET['era']) ? $_GET['era'] : 'all';

// Get platform filter if exists
$platform = isset($_GET['platform']) ? $_GET['platform'] : 'all';

// Mock database of retro games (in a real app, this would come from a database)
$retro_games = [
    [
        'id' => 43,
        'title' => 'Super Mario Bros.',
        'description' => 'The classic platformer that defined a generation of gaming.',
        'image' => 'assets/images/game1.jpg',
        'genre' => 'Platformer',
        'year' => 1985,
        'era' => '80s',
        'platform' => 'NES',
        'developer' => 'Nintendo',
        'rating' => 4.9,
        'downloads' => 15000,
        'popular' => true
    ],
    [
        'id' => 44,
        'title' => 'The Legend of Zelda',
        'description' => 'The first entry in the legendary action-adventure series.',
        'image' => 'assets/images/game2.jpg',
        'genre' => 'Action-Adventure',
        'year' => 1986,
        'era' => '80s',
        'platform' => 'NES',
        'developer' => 'Nintendo',
        'rating' => 4.8,
        'downloads' => 12000,
        'popular' => true
    ],
    [
        'id' => 45,
        'title' => 'Pac-Man',
        'description' => 'The iconic maze game that took the world by storm.',
        'image' => 'assets/images/game3.jpg',
        'genre' => 'Arcade',
        'year' => 1980,
        'era' => '80s',
        'platform' => 'Arcade',
        'developer' => 'Namco',
        'rating' => 4.7,
        'downloads' => 18000,
        'popular' => true
    ],
    [
        'id' => 46,
        'title' => 'Tetris',
        'description' => 'The addictive puzzle game that has stood the test of time.',
        'image' => 'assets/images/game4.jpg',
        'genre' => 'Puzzle',
        'year' => 1984,
        'era' => '80s',
        'platform' => 'Various',
        'developer' => 'Alexey Pajitnov',
        'rating' => 4.9,
        'downloads' => 20000,
        'popular' => true
    ],
    [
        'id' => 47,
        'title' => 'Donkey Kong',
        'description' => 'The arcade classic that introduced Mario to the world.',
        'image' => 'assets/images/game5.jpg',
        'genre' => 'Arcade',
        'year' => 1981,
        'era' => '80s',
        'platform' => 'Arcade',
        'developer' => 'Nintendo',
        'rating' => 4.6,
        'downloads' => 10000,
        'popular' => false
    ],
    [
        'id' => 48,
        'title' => 'Space Invaders',
        'description' => 'The shoot \'em up that helped establish the video game industry.',
        'image' => 'assets/images/game6.jpg',
        'genre' => 'Shoot \'em up',
        'year' => 1978,
        'era' => '70s',
        'platform' => 'Arcade',
        'developer' => 'Taito',
        'rating' => 4.5,
        'downloads' => 9000,
        'popular' => false
    ],
    [
        'id' => 49,
        'title' => 'Sonic the Hedgehog',
        'description' => 'SEGA\'s speedy mascot\'s debut on the Genesis.',
        'image' => 'assets/images/game7.jpg',
        'genre' => 'Platformer',
        'year' => 1991,
        'era' => '90s',
        'platform' => 'Genesis',
        'developer' => 'Sonic Team',
        'rating' => 4.8,
        'downloads' => 14000,
        'popular' => true
    ],
    [
        'id' => 50,
        'title' => 'Street Fighter II',
        'description' => 'The fighting game that revolutionized the genre.',
        'image' => 'assets/images/game8.jpg',
        'genre' => 'Fighting',
        'year' => 1991,
        'era' => '90s',
        'platform' => 'Arcade',
        'developer' => 'Capcom',
        'rating' => 4.9,
        'downloads' => 16000,
        'popular' => true
    ],
    [
        'id' => 51,
        'title' => 'Final Fantasy VII',
        'description' => 'The RPG masterpiece that brought the genre to mainstream popularity.',
        'image' => 'assets/images/game9.jpg',
        'genre' => 'RPG',
        'year' => 1997,
        'era' => '90s',
        'platform' => 'PlayStation',
        'developer' => 'Square',
        'rating' => 4.9,
        'downloads' => 17000,
        'popular' => true
    ],
    [
        'id' => 52,
        'title' => 'Doom',
        'description' => 'The first-person shooter that defined the genre.',
        'image' => 'assets/images/game10.jpg',
        'genre' => 'FPS',
        'year' => 1993,
        'era' => '90s',
        'platform' => 'PC',
        'developer' => 'id Software',
        'rating' => 4.8,
        'downloads' => 15000,
        'popular' => true
    ],
    [
        'id' => 53,
        'title' => 'Super Mario 64',
        'description' => 'The groundbreaking 3D platformer that set the standard for 3D gaming.',
        'image' => 'assets/images/game1.jpg',
        'genre' => 'Platformer',
        'year' => 1996,
        'era' => '90s',
        'platform' => 'Nintendo 64',
        'developer' => 'Nintendo',
        'rating' => 4.9,
        'downloads' => 18000,
        'popular' => true
    ],
    [
        'id' => 54,
        'title' => 'The Legend of Zelda: Ocarina of Time',
        'description' => 'The adventure that brought Zelda into 3D and is considered one of the greatest games ever made.',
        'image' => 'assets/images/game2.jpg',
        'genre' => 'Action-Adventure',
        'year' => 1998,
        'era' => '90s',
        'platform' => 'Nintendo 64',
        'developer' => 'Nintendo',
        'rating' => 4.9,
        'downloads' => 19000,
        'popular' => true
    ],
    [
        'id' => 55,
        'title' => 'Metal Gear Solid',
        'description' => 'The stealth action game that combined cinematic storytelling with innovative gameplay.',
        'image' => 'assets/images/game3.jpg',
        'genre' => 'Stealth',
        'year' => 1998,
        'era' => '90s',
        'platform' => 'PlayStation',
        'developer' => 'Konami',
        'rating' => 4.8,
        'downloads' => 14000,
        'popular' => true
    ],
    [
        'id' => 56,
        'title' => 'Resident Evil',
        'description' => 'The survival horror game that defined the genre.',
        'image' => 'assets/images/game4.jpg',
        'genre' => 'Survival Horror',
        'year' => 1996,
        'era' => '90s',
        'platform' => 'PlayStation',
        'developer' => 'Capcom',
        'rating' => 4.7,
        'downloads' => 13000,
        'popular' => false
    ],
    [
        'id' => 57,
        'title' => 'Castlevania: Symphony of the Night',
        'description' => 'The gothic action-adventure that helped define the Metroidvania genre.',
        'image' => 'assets/images/game5.jpg',
        'genre' => 'Metroidvania',
        'year' => 1997,
        'era' => '90s',
        'platform' => 'PlayStation',
        'developer' => 'Konami',
        'rating' => 4.9,
        'downloads' => 12000,
        'popular' => true
    ],
    [
        'id' => 58,
        'title' => 'Chrono Trigger',
        'description' => 'The time-traveling RPG masterpiece with multiple endings.',
        'image' => 'assets/images/game6.jpg',
        'genre' => 'RPG',
        'year' => 1995,
        'era' => '90s',
        'platform' => 'SNES',
        'developer' => 'Square',
        'rating' => 4.9,
        'downloads' => 11000,
        'popular' => true
    ],
    [
        'id' => 59,
        'title' => 'Mega Man 2',
        'description' => 'The challenging action platformer that perfected the Mega Man formula.',
        'image' => 'assets/images/game7.jpg',
        'genre' => 'Platformer',
        'year' => 1988,
        'era' => '80s',
        'platform' => 'NES',
        'developer' => 'Capcom',
        'rating' => 4.8,
        'downloads' => 9000,
        'popular' => false
    ],
    [
        'id' => 60,
        'title' => 'Contra',
        'description' => 'The run-and-gun action game known for its difficulty and co-op gameplay.',
        'image' => 'assets/images/game8.jpg',
        'genre' => 'Run and Gun',
        'year' => 1987,
        'era' => '80s',
        'platform' => 'NES',
        'developer' => 'Konami',
        'rating' => 4.7,
        'downloads' => 8000,
        'popular' => false
    ],
    [
        'id' => 61,
        'title' => 'Mortal Kombat',
        'description' => 'The controversial fighting game known for its digitized graphics and fatalities.',
        'image' => 'assets/images/game9.jpg',
        'genre' => 'Fighting',
        'year' => 1992,
        'era' => '90s',
        'platform' => 'Arcade',
        'developer' => 'Midway',
        'rating' => 4.6,
        'downloads' => 10000,
        'popular' => false
    ],
    [
        'id' => 62,
        'title' => 'Diablo',
        'description' => 'The dark fantasy action RPG that pioneered the hack-and-slash genre.',
        'image' => 'assets/images/game10.jpg',
        'genre' => 'Action RPG',
        'year' => 1996,
        'era' => '90s',
        'platform' => 'PC',
        'developer' => 'Blizzard',
        'rating' => 4.8,
        'downloads' => 11000,
        'popular' => false
    ],
    [
        'id' => 63,
        'title' => 'Galaga',
        'description' => 'The space shooter that improved upon the Space Invaders formula.',
        'image' => 'assets/images/game1.jpg',
        'genre' => 'Shoot \'em up',
        'year' => 1981,
        'era' => '80s',
        'platform' => 'Arcade',
        'developer' => 'Namco',
        'rating' => 4.6,
        'downloads' => 7000,
        'popular' => false
    ],
    [
        'id' => 64,
        'title' => 'Pong',
        'description' => 'The table tennis simulation that was one of the earliest arcade video games.',
        'image' => 'assets/images/game2.jpg',
        'genre' => 'Sports',
        'year' => 1972,
        'era' => '70s',
        'platform' => 'Arcade',
        'developer' => 'Atari',
        'rating' => 4.3,
        'downloads' => 5000,
        'popular' => false
    ],
    [
        'id' => 65,
        'title' => 'Asteroids',
        'description' => 'The space shooter where players control a spaceship in an asteroid field.',
        'image' => 'assets/images/game3.jpg',
        'genre' => 'Shoot \'em up',
        'year' => 1979,
        'era' => '70s',
        'platform' => 'Arcade',
        'developer' => 'Atari',
        'rating' => 4.4,
        'downloads' => 6000,
        'popular' => false
    ],
    [
        'id' => 66,
        'title' => 'Frogger',
        'description' => 'The arcade game where players guide a frog across a busy road and river.',
        'image' => 'assets/images/game4.jpg',
        'genre' => 'Arcade',
        'year' => 1981,
        'era' => '80s',
        'platform' => 'Arcade',
        'developer' => 'Konami',
        'rating' => 4.5,
        'downloads' => 7000,
        'popular' => false
    ]
];

// Filter games based on era
if ($era !== 'all') {
    $filtered_games = array_filter($retro_games, function($game) use ($era) {
        return strtolower($game['era']) === strtolower($era);
    });
} else {
    $filtered_games = $retro_games;
}

// Further filter games based on platform
if ($platform !== 'all') {
    $filtered_games = array_filter($filtered_games, function($game) use ($platform) {
        return strtolower($game['platform']) === strtolower($platform);
    });
}

// Sort games based on sort option
switch ($sort_by) {
    case 'year_asc':
        usort($filtered_games, function($a, $b) {
            return $a['year'] <=> $b['year'];
        });
        break;
    case 'year_desc':
        usort($filtered_games, function($a, $b) {
            return $b['year'] <=> $a['year'];
        });
        break;
    case 'rating':
        usort($filtered_games, function($a, $b) {
            return $b['rating'] <=> $a['rating'];
        });
        break;
    case 'downloads':
        usort($filtered_games, function($a, $b) {
            return $b['downloads'] <=> $a['downloads'];
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
    case 'popular':
    default:
        usort($filtered_games, function($a, $b) {
            if ($a['popular'] && !$b['popular']) return -1;
            if (!$a['popular'] && $b['popular']) return 1;
            return $b['downloads'] <=> $a['downloads']; // If both are popular or not popular, sort by downloads
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

// Get unique platforms for filter
$platforms = array_unique(array_map(function($game) {
    return $game['platform'];
}, $retro_games));
sort($platforms);

// Include header
include 'includes/header.php';
?>

<div class="explore-header retro-header">
    <div class="container">
        <div class="explore-breadcrumb">
            <a href="explore.php">Explore</a> <i class="fas fa-chevron-right"></i> <span>Retro Vault</span>
        </div>
        <h1>Retro Vault</h1>
        <p>Revisit the classics from gaming's golden eras</p>
    </div>
</div>

<section class="retro-eras">
    <div class="container">
        <div class="era-tabs">
            <a href="explore-retro.php?era=all&platform=<?php echo urlencode($platform); ?>&sort=<?php echo urlencode($sort_by); ?>"
                class="era-tab <?php echo $era === 'all' ? 'active' : ''; ?>">
                <div class="era-icon"><i class="fas fa-gamepad"></i></div>
                <span>All Eras</span>
            </a>
            <a href="explore-retro.php?era=70s&platform=<?php echo urlencode($platform); ?>&sort=<?php echo urlencode($sort_by); ?>"
                class="era-tab <?php echo $era === '70s' ? 'active' : ''; ?>">
                <div class="era-icon"><i class="fas fa-compact-disc"></i></div>
                <span>70's</span>
            </a>
            <a href="explore-retro.php?era=80s&platform=<?php echo urlencode($platform); ?>&sort=<?php echo urlencode($sort_by); ?>"
                class="era-tab <?php echo $era === '80s' ? 'active' : ''; ?>">
                <div class="era-icon"><i class="fas fa-cassette-tape"></i></div>
                <span>80's</span>
            </a>
            <a href="explore-retro.php?era=90s&platform=<?php echo urlencode($platform); ?>&sort=<?php echo urlencode($sort_by); ?>"
                class="era-tab <?php echo $era === '90s' ? 'active' : ''; ?>">
                <div class="era-icon"><i class="fas fa-vhs"></i></div>
                <span>90's</span>
            </a>
        </div>
    </div>
</section>

<section class="retro-content">
    <div class="container">
        <div class="explore-filters">
            <div class="filter-wrapper">
                <div class="filter-group">
                    <label>Platform:</label>
                    <select id="platform-filter" onchange="window.location.href=this.value">
                        <option
                            value="explore-retro.php?era=<?php echo urlencode($era); ?>&platform=all&sort=<?php echo urlencode($sort_by); ?>"
                            <?php echo $platform === 'all' ? 'selected' : ''; ?>>All Platforms</option>
                        <?php foreach ($platforms as $plat): ?>
                        <option
                            value="explore-retro.php?era=<?php echo urlencode($era); ?>&platform=<?php echo urlencode(strtolower($plat)); ?>&sort=<?php echo urlencode($sort_by); ?>"
                            <?php echo strtolower($platform) === strtolower($plat) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($plat); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="filter-group">
                    <label>Sort By:</label>
                    <select id="sort-select" onchange="window.location.href=this.value">
                        <option
                            value="explore-retro.php?era=<?php echo urlencode($era); ?>&platform=<?php echo urlencode($platform); ?>&sort=popular"
                            <?php echo $sort_by === 'popular' ? 'selected' : ''; ?>>Most Popular</option>
                        <option
                            value="explore-retro.php?era=<?php echo urlencode($era); ?>&platform=<?php echo urlencode($platform); ?>&sort=year_asc"
                            <?php echo $sort_by === 'year_asc' ? 'selected' : ''; ?>>Year (Oldest First)</option>
                        <option
                            value="explore-retro.php?era=<?php echo urlencode($era); ?>&platform=<?php echo urlencode($platform); ?>&sort=year_desc"
                            <?php echo $sort_by === 'year_desc' ? 'selected' : ''; ?>>Year (Newest First)</option>
                        <option
                            value="explore-retro.php?era=<?php echo urlencode($era); ?>&platform=<?php echo urlencode($platform); ?>&sort=rating"
                            <?php echo $sort_by === 'rating' ? 'selected' : ''; ?>>Highest Rating</option>
                        <option
                            value="explore-retro.php?era=<?php echo urlencode($era); ?>&platform=<?php echo urlencode($platform); ?>&sort=downloads"
                            <?php echo $sort_by === 'downloads' ? 'selected' : ''; ?>>Most Downloads</option>
                        <option
                            value="explore-retro.php?era=<?php echo urlencode($era); ?>&platform=<?php echo urlencode($platform); ?>&sort=title_asc"
                            <?php echo $sort_by === 'title_asc' ? 'selected' : ''; ?>>Title (A-Z)</option>
                        <option
                            value="explore-retro.php?era=<?php echo urlencode($era); ?>&platform=<?php echo urlencode($platform); ?>&sort=title_desc"
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
        <div class="retro-games-grid">
            <?php foreach ($current_games as $game): ?>
            <div class="retro-game-card">
                <div class="retro-game-image">
                    <img src="<?php echo htmlspecialchars($game['image']); ?>"
                        alt="<?php echo htmlspecialchars($game['title']); ?>">
                    <div class="retro-overlay"></div>
                    <div class="retro-era-badge"><?php echo htmlspecialchars($game['era']); ?></div>
                    <div class="retro-year"><?php echo $game['year']; ?></div>
                    <?php if ($game['popular']): ?>
                    <div class="retro-popular-badge">CLASSIC</div>
                    <?php endif; ?>
                    <div class="hover-info">
                        <a href="game-detail.php?id=<?php echo $game['id']; ?>" class="view-details">View Details</a>
                        <div class="quick-actions">
                            <div class="download-btn"><i class="fas fa-download"></i></div>
                            <div class="play-btn"><i class="fas fa-play"></i></div>
                        </div>
                    </div>
                </div>
                <div class="retro-game-info">
                    <h3><a
                            href="game-detail.php?id=<?php echo $game['id']; ?>"><?php echo htmlspecialchars($game['title']); ?></a>
                    </h3>
                    <div class="retro-meta">
                        <span class="retro-platform"><?php echo htmlspecialchars($game['platform']); ?></span>
                        <span class="retro-rating"><i class="fas fa-star"></i>
                            <?php echo number_format($game['rating'], 1); ?></span>
                    </div>
                    <p><?php echo htmlspecialchars($game['description']); ?></p>
                    <div class="retro-details">
                        <div class="retro-detail">
                            <span class="detail-label">Genre:</span>
                            <span class="detail-value"><?php echo htmlspecialchars($game['genre']); ?></span>
                        </div>
                        <div class="retro-detail">
                            <span class="detail-label">Developer:</span>
                            <span class="detail-value"><?php echo htmlspecialchars($game['developer']); ?></span>
                        </div>
                        <div class="retro-detail">
                            <span class="detail-label">Downloads:</span>
                            <span class="detail-value"><?php echo number_format($game['downloads']); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <?php if ($total_pages > 1): ?>
        <div class="pagination">
            <?php if ($current_page > 1): ?>
            <a href="explore-retro.php?era=<?php echo urlencode($era); ?>&platform=<?php echo urlencode($platform); ?>&sort=<?php echo urlencode($sort_by); ?>&page=<?php echo $current_page - 1; ?>"
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
                        echo '<a href="explore-retro.php?era=' . urlencode($era) . '&platform=' . urlencode($platform) . '&sort=' . urlencode($sort_by) . '&page=1" class="page-link">1</a>';
                        if ($start_page > 2) {
                            echo '<span class="page-ellipsis">...</span>';
                        }
                    }

                    // Show page numbers
                    for ($i = $start_page; $i <= $end_page; $i++) {
                        if ($i == $current_page) {
                            echo '<span class="page-link current">' . $i . '</span>';
                        } else {
                            echo '<a href="explore-retro.php?era=' . urlencode($era) . '&platform=' . urlencode($platform) . '&sort=' . urlencode($sort_by) . '&page=' . $i . '" class="page-link">' . $i . '</a>';
                        }
                    }

                    // Always show last page
                    if ($end_page < $total_pages) {
                        if ($end_page < $total_pages - 1) {
                            echo '<span class="page-ellipsis">...</span>';
                        }
                        echo '<a href="explore-retro.php?era=' . urlencode($era) . '&platform=' . urlencode($platform) . '&sort=' . urlencode($sort_by) . '&page=' . $total_pages . '" class="page-link">' . $total_pages . '</a>';
                    }
                    ?>

            <?php if ($current_page < $total_pages): ?>
            <a href="explore-retro.php?era=<?php echo urlencode($era); ?>&platform=<?php echo urlencode($platform); ?>&sort=<?php echo urlencode($sort_by); ?>&page=<?php echo $current_page + 1; ?>"
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

<section class="retro-emulation">
    <div class="container">
        <div class="section-header">
            <h2>Play Retro Games Online</h2>
            <p>Experience the classics directly in your browser with our emulation service</p>
        </div>

        <div class="emulation-info">
            <div class="emulation-image">
                <img src="assets/images/emulation.jpg" alt="Retro Game Emulation">
            </div>
            <div class="emulation-content">
                <h3>GAMEZUNIA Emulation Service</h3>
                <p>Our built-in emulation service allows you to play classic games directly in your browser without any
                    additional software. Relive the golden age of gaming with authentic controls and gameplay.</p>

                <div class="emulation-features">
                    <div class="emulation-feature">
                        <div class="feature-icon"><i class="fas fa-save"></i></div>
                        <div class="feature-text">
                            <h4>Save States</h4>
                            <p>Save your progress at any point and continue later</p>
                        </div>
                    </div>

                    <div class="emulation-feature">
                        <div class="feature-icon"><i class="fas fa-gamepad"></i></div>
                        <div class="feature-text">
                            <h4>Controller Support</h4>
                            <p>Use your gamepad for an authentic experience</p>
                        </div>
                    </div>

                    <div class="emulation-feature">
                        <div class="feature-icon"><i class="fas fa-desktop"></i></div>
                        <div class="feature-text">
                            <h4>Fullscreen Mode</h4>
                            <p>Play games in fullscreen for maximum immersion</p>
                        </div>
                    </div>

                    <div class="emulation-feature">
                        <div class="feature-icon"><i class="fas fa-keyboard"></i></div>
                        <div class="feature-text">
                            <h4>Customizable Controls</h4>
                            <p>Remap keyboard controls to your preference</p>
                        </div>
                    </div>
                </div>

                <a href="#" class="btn btn-primary">Try Emulation Now</a>
            </div>
        </div>
    </div>
</section>

<?php
// Include footer
include 'includes/footer.php';
?>
