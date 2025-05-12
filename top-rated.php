<?php
// Start session
session_start();

// Include configuration file
require_once 'config.php';

// Include functions file
require_once 'functions.php';

// Page title
$pageTitle = "Top Rated Games - GAMEZUNIA";

// Mock database of games (in a real app, this would come from a database)
// Reusing the same game data from games.php but filtering for top rated
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
        'reviews' => 1245,
        'features' => ['Open World', 'Single Player', 'Controller Support'],
        'screenshots' => ['assets/images/game1.jpg', 'assets/images/game2.jpg', 'assets/images/game3.jpg']
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
        'reviews' => 987,
        'features' => ['Puzzle Solving', 'Time Manipulation', 'Story Rich'],
        'screenshots' => ['assets/images/game6.jpg', 'assets/images/game7.jpg', 'assets/images/game8.jpg']
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
        'reviews' => 1567,
        'features' => ['Open World', 'RPG', 'Fantasy', 'Dragons'],
        'screenshots' => ['assets/images/game5.jpg', 'assets/images/game9.jpg', 'assets/images/game10.jpg']
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
        'reviews' => 1102,
        'features' => ['Open World', 'Cyberpunk', 'Enhanced Edition'],
        'screenshots' => ['assets/images/game10.jpg', 'assets/images/game1.jpg', 'assets/images/game4.jpg']
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
        'reviews' => 876,
        'features' => ['Co-op', 'Strategy', 'Mech Building'],
        'screenshots' => ['assets/images/game3.jpg', 'assets/images/game7.jpg', 'assets/images/game2.jpg']
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
        'reviews' => 932,
        'features' => ['Hacking', 'RPG', 'Cyberpunk'],
        'screenshots' => ['assets/images/game9.jpg', 'assets/images/game1.jpg', 'assets/images/game10.jpg']
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
        'reviews' => 754,
        'features' => ['Horror', 'Investigation', 'Supernatural'],
        'screenshots' => ['assets/images/game6.jpg', 'assets/images/game5.jpg', 'assets/images/game8.jpg']
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
        'reviews' => 689,
        'features' => ['Retro', 'Roguelike', 'Vampire', 'Survival'],
        'screenshots' => ['assets/images/game5.jpg', 'assets/images/game9.jpg', 'assets/images/game7.jpg']
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
        'reviews' => 812,
        'features' => ['Tactical', 'Stealth', 'Action'],
        'screenshots' => ['assets/images/game3.jpg', 'assets/images/game1.jpg', 'assets/images/game4.jpg']
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
        'reviews' => 723,
        'features' => ['Survival', 'Post-Apocalyptic', 'Open World'],
        'screenshots' => ['assets/images/game8.jpg', 'assets/images/game3.jpg', 'assets/images/game5.jpg']
    ]
];

// Sort games by rating (highest first)
usort($all_games, function($a, $b) {
    if ($a['rating'] == $b['rating']) {
        return $b['reviews'] <=> $a['reviews']; // If ratings are equal, sort by number of reviews
    }
    return $b['rating'] <=> $a['rating'];
});

// Include header
include 'includes/header.php';
?>

<div class="top-rated-header">
    <div class="container">
        <h1>Top Rated Games</h1>
        <p>The highest-rated games on GAMEZUNIA, as voted by our community</p>
    </div>
</div>

<section class="top-rated-content">
    <div class="container">
        <div class="top-rated-featured">
            <?php if (!empty($all_games)): ?>
            <?php $featured_game = $all_games[0]; // Get the highest rated game ?>
            <div class="featured-game">
                <div class="featured-game-image">
                    <img src="<?php echo htmlspecialchars($featured_game['image']); ?>"
                        alt="<?php echo htmlspecialchars($featured_game['title']); ?>">
                    <div class="featured-game-overlay">
                        <div class="featured-badge">
                            <i class="fas fa-trophy"></i> #1 Top Rated
                        </div>
                    </div>
                </div>
                <div class="featured-game-info">
                    <div class="featured-game-rating">
                        <div class="rating-number"><?php echo number_format($featured_game['rating'], 1); ?></div>
                        <div class="rating-stars">
                            <?php
                                $full_stars = floor($featured_game['rating']);
                                $half_star = ($featured_game['rating'] - $full_stars) >= 0.5;

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
                            <span class="rating-count">(<?php echo number_format($featured_game['reviews']); ?>
                                reviews)</span>
                        </div>
                    </div>
                    <h2><?php echo htmlspecialchars($featured_game['title']); ?></h2>
                    <p class="featured-game-description"><?php echo htmlspecialchars($featured_game['description']); ?>
                    </p>
                    <div class="featured-game-meta">
                        <div class="meta-item">
                            <span class="meta-label">Developer:</span>
                            <span class="meta-value"><?php echo htmlspecialchars($featured_game['developer']); ?></span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">Genre:</span>
                            <span class="meta-value"><?php echo htmlspecialchars($featured_game['genre']); ?></span>
                        </div>
                        <div class="meta-item">
                            <span class="meta-label">Release Date:</span>
                            <span
                                class="meta-value"><?php echo date('F j, Y', strtotime($featured_game['release_date'])); ?></span>
                        </div>
                    </div>
                    <div class="featured-game-features">
                        <?php foreach ($featured_game['features'] as $feature): ?>
                        <span class="feature-tag"><?php echo htmlspecialchars($feature); ?></span>
                        <?php endforeach; ?>
                    </div>
                    <div class="featured-game-screenshots">
                        <?php foreach (array_slice($featured_game['screenshots'], 0, 3) as $screenshot): ?>
                        <div class="screenshot-thumbnail">
                            <img src="<?php echo htmlspecialchars($screenshot); ?>" alt="Screenshot">
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="featured-game-actions">
                        <a href="game-detail.php?id=<?php echo $featured_game['id']; ?>" class="btn btn-primary">View
                            Details</a>
                        <a href="#" class="btn btn-secondary">Download Now</a>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <div class="top-rated-list">
            <h2>More Top Rated Games</h2>

            <div class="top-games-grid">
                <?php foreach (array_slice($all_games, 1) as $index => $game): ?>
                <div class="top-game-card">
                    <div class="top-game-rank">#<?php echo $index + 2; ?></div>
                    <div class="top-game-image">
                        <img src="<?php echo htmlspecialchars($game['image']); ?>"
                            alt="<?php echo htmlspecialchars($game['title']); ?>">
                        <div class="top-game-rating">
                            <i class="fas fa-star"></i> <?php echo number_format($game['rating'], 1); ?>
                        </div>
                    </div>
                    <div class="top-game-info">
                        <h3><a
                                href="game-detail.php?id=<?php echo $game['id']; ?>"><?php echo htmlspecialchars($game['title']); ?></a>
                        </h3>
                        <div class="top-game-meta">
                            <span class="game-genre"><?php echo htmlspecialchars($game['genre']); ?></span>
                            <span class="review-count"><?php echo number_format($game['reviews']); ?> reviews</span>
                        </div>
                        <p><?php echo htmlspecialchars($game['description']); ?></p>
                        <div class="top-game-features">
                            <?php foreach (array_slice($game['features'], 0, 3) as $feature): ?>
                            <span class="feature-tag-small"><?php echo htmlspecialchars($feature); ?></span>
                            <?php endforeach; ?>
                        </div>
                        <div class="top-game-actions">
                            <a href="game-detail.php?id=<?php echo $game['id']; ?>" class="view-details-link">View
                                Details</a>
                            <div class="action-buttons">
                                <button class="action-btn download-btn"><i class="fas fa-download"></i></button>
                                <button class="action-btn wishlist-btn"><i class="fas fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<?php
// Include footer
include 'includes/footer.php';
?>
