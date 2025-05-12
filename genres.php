<?php
// Start session
session_start();

// Include configuration file
require_once 'config.php';

// Include functions file
require_once 'functions.php';

// Page title
$pageTitle = "Game Genres - GAMEZUNIA";

// Get selected genre if exists
$selected_genre = isset($_GET['genre']) ? $_GET['genre'] : '';

// Mock database of genres (in a real app, this would come from a database)
$genres = [
    'Action' => [
        'description' => 'Fast-paced games focused on combat, reflexes, and movement.',
        'icon' => 'fa-gun',
        'color' => '#e74c3c',
        'count' => 24
    ],
    'Adventure' => [
        'description' => 'Story-driven games with exploration and puzzle-solving elements.',
        'icon' => 'fa-map',
        'color' => '#3498db',
        'count' => 18
    ],
    'RPG' => [
        'description' => 'Role-playing games with character development and immersive worlds.',
        'icon' => 'fa-dragon',
        'color' => '#9b59b6',
        'count' => 15
    ],
    'Strategy' => [
        'description' => 'Games that emphasize tactical thinking and planning.',
        'icon' => 'fa-chess',
        'color' => '#2ecc71',
        'count' => 20
    ],
    'Simulation' => [
        'description' => 'Games that simulate real-world activities or systems.',
        'icon' => 'fa-city',
        'color' => '#f39c12',
        'count' => 12
    ],
    'Sports' => [
        'description' => 'Games based on real-world sports and athletic competitions.',
        'icon' => 'fa-futbol',
        'color' => '#1abc9c',
        'count' => 10
    ],
    'Racing' => [
        'description' => 'Games focused on driving vehicles in competitive environments.',
        'icon' => 'fa-flag-checkered',
        'color' => '#e67e22',
        'count' => 8
    ],
    'Puzzle' => [
        'description' => 'Games that challenge the player\'s problem-solving abilities.',
        'icon' => 'fa-puzzle-piece',
        'color' => '#3498db',
        'count' => 14
    ],
    'Horror' => [
        'description' => 'Games designed to frighten players with tense atmospheres and scares.',
        'icon' => 'fa-ghost',
        'color' => '#8e44ad',
        'count' => 9
    ],
    'Open World' => [
        'description' => 'Games with large, explorable environments and non-linear gameplay.',
        'icon' => 'fa-earth-americas',
        'color' => '#27ae60',
        'count' => 11
    ],
    'Survival' => [
        'description' => 'Games where players must gather resources and stay alive in hostile environments.',
        'icon' => 'fa-campground',
        'color' => '#d35400',
        'count' => 7
    ],
    'Fighting' => [
        'description' => 'Games focused on one-on-one combat between characters.',
        'icon' => 'fa-hand-fist',
        'color' => '#c0392b',
        'count' => 6
    ]
];

// Mock database of games (in a real app, this would come from a database)
// Reusing the same game data from games.php
$all_games = [
    [
        'id' => 1,
        'title' => 'Neon Override',
        'description' => 'Enter a cyberpunk world where neon lights illuminate the path to digital revolution.',
        'image' => 'assets/images/game1.jpg',
        'genre' => 'Action',
        'rating' => 4.8,
        'release_date' => '2023-05-15',
        'developer' => 'Cyber Studios'
    ],
    [
        'id' => 2,
        'title' => 'Echo Frontier',
        'description' => 'Explore the uncharted territories of a procedurally generated universe.',
        'image' => 'assets/images/game2.jpg',
        'genre' => 'Adventure',
        'rating' => 4.5,
        'release_date' => '2023-02-10',
        'developer' => 'Stellar Games'
    ],
    [
        'id' => 3,
        'title' => 'Ironloop Genesis',
        'description' => 'Team up with friends in this cooperative mech-building adventure.',
        'image' => 'assets/images/game3.jpg',
        'genre' => 'Strategy',
        'rating' => 4.7,
        'release_date' => '2022-11-22',
        'developer' => 'Mech Works'
    ],
    [
        'id' => 4,
        'title' => 'Synth Warz: Omega',
        'description' => 'Command your synthetic army in this futuristic real-time strategy game.',
        'image' => 'assets/images/game4.jpg',
        'genre' => 'Strategy',
        'rating' => 4.3,
        'release_date' => '2023-01-05',
        'developer' => 'Omega Interactive'
    ],
    [
        'id' => 5,
        'title' => 'Pixel Fangs',
        'description' => 'A retro-style vampire survival game with modern roguelike elements.',
        'image' => 'assets/images/game5.jpg',
        'genre' => 'Horror',
        'rating' => 4.6,
        'release_date' => '2022-10-31',
        'developer' => 'Midnight Pixels'
    ],
    [
        'id' => 6,
        'title' => 'Chrono Splicer',
        'description' => 'Manipulate time to solve puzzles and defeat enemies in this mind-bending adventure.',
        'image' => 'assets/images/game6.jpg',
        'genre' => 'Puzzle',
        'rating' => 4.9,
        'release_date' => '2023-03-17',
        'developer' => 'Temporal Games'
    ],
    [
        'id' => 7,
        'title' => 'Mechanoid Rush',
        'description' => 'Race through futuristic tracks with customizable robot vehicles.',
        'image' => 'assets/images/game7.jpg',
        'genre' => 'Racing',
        'rating' => 4.2,
        'release_date' => '2022-08-12',
        'developer' => 'Speed Mechanics'
    ],
    [
        'id' => 8,
        'title' => 'Aether Bloom',
        'description' => 'Cultivate magical plants in this relaxing yet strategic gardening simulator.',
        'image' => 'assets/images/game8.jpg',
        'genre' => 'Simulation',
        'rating' => 4.4,
        'release_date' => '2023-04-22',
        'developer' => 'Bloom Studios'
    ],
    [
        'id' => 9,
        'title' => 'Void Hacker',
        'description' => 'Hack into corporate systems and expose corruption in this cyberpunk RPG.',
        'image' => 'assets/images/game9.jpg',
        'genre' => 'RPG',
        'rating' => 4.7,
        'release_date' => '2022-12-01',
        'developer' => 'Digital Rebels'
    ],
    [
        'id' => 10,
        'title' => 'Cyber Nomad: Redux',
        'description' => 'An enhanced edition of the classic open-world cyberpunk adventure.',
        'image' => 'assets/images/game10.jpg',
        'genre' => 'Open World',
        'rating' => 4.8,
        'release_date' => '2023-06-05',
        'developer' => 'Future Punk Games'
    ],
    [
        'id' => 11,
        'title' => 'Stellar Conquest',
        'description' => 'Build your galactic empire and conquer the stars in this 4X strategy game.',
        'image' => 'assets/images/game1.jpg',
        'genre' => 'Strategy',
        'rating' => 4.5,
        'release_date' => '2022-09-15',
        'developer' => 'Galactic Studios'
    ],
    [
        'id' => 12,
        'title' => 'Neon Drift',
        'description' => 'Master the art of drifting in this neon-soaked arcade racing game.',
        'image' => 'assets/images/game2.jpg',
        'genre' => 'Racing',
        'rating' => 4.3,
        'release_date' => '2023-01-20',
        'developer' => 'Drift Kings'
    ],
    [
        'id' => 13,
        'title' => 'Phantom Protocol',
        'description' => 'Lead a team of elite agents in this tactical stealth action game.',
        'image' => 'assets/images/game3.jpg',
        'genre' => 'Action',
        'rating' => 4.6,
        'release_date' => '2022-11-08',
        'developer' => 'Shadow Ops'
    ],
    [
        'id' => 14,
        'title' => 'Quantum Break',
        'description' => 'Solve physics-based puzzles by manipulating quantum mechanics.',
        'image' => 'assets/images/game4.jpg',
        'genre' => 'Puzzle',
        'rating' => 4.4,
        'release_date' => '2023-02-28',
        'developer' => 'Quantum Labs'
    ],
    [
        'id' => 15,
        'title' => 'Dragon\'s Legacy',
        'description' => 'Embark on an epic journey in this fantasy RPG with dragon companions.',
        'image' => 'assets/images/game5.jpg',
        'genre' => 'RPG',
        'rating' => 4.9,
        'release_date' => '2022-12-25',
        'developer' => 'Dragon Forge'
    ],
    [
        'id' => 16,
        'title' => 'Urban Legends',
        'description' => 'Investigate supernatural occurrences in this atmospheric horror adventure.',
        'image' => 'assets/images/game6.jpg',
        'genre' => 'Horror',
        'rating' => 4.7,
        'release_date' => '2023-04-13',
        'developer' => 'Midnight Tales'
    ],
    [
        'id' => 17,
        'title' => 'Starlight Colonies',
        'description' => 'Build and manage your own space colony in this detailed simulation.',
        'image' => 'assets/images/game7.jpg',
        'genre' => 'Simulation',
        'rating' => 4.5,
        'release_date' => '2022-10-10',
        'developer' => 'Stellar Sims'
    ],
    [
        'id' => 18,
        'title' => 'Wasteland Warriors',
        'description' => 'Survive in a post-apocalyptic world filled with danger and opportunity.',
        'image' => 'assets/images/game8.jpg',
        'genre' => 'Survival',
        'rating' => 4.6,
        'release_date' => '2023-03-03',
        'developer' => 'Apocalypse Games'
    ]
];

// Filter games by selected genre
$filtered_games = [];
if (!empty($selected_genre) && isset($genres[$selected_genre])) {
    $filtered_games = array_filter($all_games, function($game) use ($selected_genre) {
        return $game['genre'] === $selected_genre;
    });
}

// Include header
include 'includes/header.php';
?>

<div class="genre-header">
    <div class="container">
        <h1>Game Genres</h1>
        <p>Browse our collection of games by genre to find your next favorite title</p>
    </div>
</div>

<section class="genre-content">
    <div class="container">
        <?php if (empty($selected_genre)): ?>
        <div class="genres-grid">
            <?php foreach ($genres as $genre_name => $genre_data): ?>
            <a href="genres.php?genre=<?php echo urlencode($genre_name); ?>" class="genre-card"
                style="--genre-color: <?php echo $genre_data['color']; ?>">
                <div class="genre-icon">
                    <i class="fas <?php echo $genre_data['icon']; ?>"></i>
                </div>
                <div class="genre-info">
                    <h3><?php echo htmlspecialchars($genre_name); ?></h3>
                    <p><?php echo htmlspecialchars($genre_data['description']); ?></p>
                    <span class="genre-count"><?php echo $genre_data['count']; ?> Games</span>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <div class="genre-detail">
            <div class="genre-header-detail" style="--genre-color: <?php echo $genres[$selected_genre]['color']; ?>">
                <div class="genre-icon-large">
                    <i class="fas <?php echo $genres[$selected_genre]['icon']; ?>"></i>
                </div>
                <div class="genre-info-large">
                    <h2><?php echo htmlspecialchars($selected_genre); ?> Games</h2>
                    <p><?php echo htmlspecialchars($genres[$selected_genre]['description']); ?></p>
                    <div class="genre-meta">
                        <span class="genre-count-large"><?php echo count($filtered_games); ?> Games Available</span>
                        <a href="genres.php" class="back-to-genres"><i class="fas fa-arrow-left"></i> Back to All
                            Genres</a>
                    </div>
                </div>
            </div>

            <?php if (empty($filtered_games)): ?>
            <div class="no-games">
                <h3>No games found in this genre</h3>
                <p>Check back later for new additions or explore other genres.</p>
            </div>
            <?php else: ?>
            <div class="games-grid">
                <?php foreach ($filtered_games as $game): ?>
                <div class="game-card">
                    <div class="game-card-img">
                        <img src="<?php echo htmlspecialchars($game['image']); ?>"
                            alt="<?php echo htmlspecialchars($game['title']); ?>">
                        <div class="game-rating">
                            <i class="fas fa-star"></i> <?php echo number_format($game['rating'], 1); ?>
                        </div>
                        <div class="hover-info">
                            <a href="game-detail.php?id=<?php echo $game['id']; ?>" class="view-details">View
                                Details</a>
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
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php
// Include footer
include 'includes/footer.php';
?>
