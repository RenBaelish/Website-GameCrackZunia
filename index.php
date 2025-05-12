<?php
// Start session if needed for user authentication later
session_start();

// Include configuration file
require_once 'config.php';

// Include functions file
require_once 'functions.php';

// Page title
$pageTitle = "GAMEZUNIA - Free PC Game Distribution";

// Featured games data (could come from database in a real application)
$featuredGames = [
    [
        'title' => 'Neon Override',
        'version' => 'v1.5.2',
        'status' => 'Unlocked',
        'status_class' => 'unlocked',
        'platform' => 'PC / Windows',
        'image' => 'assets/images/game1.jpg',
        'description' => 'Enter a cyberpunk world where neon lights illuminate the path to digital revolution.'
    ],
    [
        'title' => 'Echo Frontier',
        'version' => 'v0.9.8',
        'status' => 'Beta Access',
        'status_class' => 'beta',
        'platform' => 'PC / Windows',
        'image' => 'assets/images/game2.jpg',
        'description' => 'Explore the uncharted territories of a procedurally generated universe.'
    ],
    [
        'title' => 'Ironloop Genesis',
        'version' => 'v0.9.11',
        'status' => 'Co-op',
        'status_class' => 'coop',
        'platform' => 'PC / ISO',
        'image' => 'assets/images/game3.jpg',
        'description' => 'Team up with friends in this cooperative mech-building adventure.'
    ],
    [
        'title' => 'Synth Warz: Omega',
        'version' => 'v0.7.3',
        'status' => 'Early Access',
        'status_class' => 'early',
        'platform' => 'PC / Windows',
        'image' => 'assets/images/game4.jpg',
        'description' => 'Command your synthetic army in this futuristic real-time strategy game.'
    ]
];

// Genre games data (could come from database in a real application)
$genreGames = [
    [
        'title' => 'Pixel Fangs',
        'version' => 'v2.1.0',
        'version_class' => 'orange',
        'platform' => 'PC',
        'image' => 'assets/images/game5.jpg'
    ],
    [
        'title' => 'Chrono Splicer',
        'version' => 'v1.3.7',
        'version_class' => 'blue',
        'platform' => 'Windows',
        'image' => 'assets/images/game6.jpg'
    ],
    [
        'title' => 'Mechanoid Rush',
        'version' => 'v3.0.2',
        'version_class' => 'orange',
        'platform' => 'PC',
        'image' => 'assets/images/game7.jpg'
    ],
    [
        'title' => 'Aether Bloom',
        'version' => 'v1.8.5',
        'version_class' => 'blue',
        'platform' => 'ISO',
        'image' => 'assets/images/game8.jpg'
    ],
    [
        'title' => 'Void Hacker',
        'version' => 'v2.4.1',
        'version_class' => 'orange',
        'platform' => 'PC',
        'image' => 'assets/images/game9.jpg'
    ],
    [
        'title' => 'Cyber Nomad: Redux',
        'version' => 'v1.0.9',
        'version_class' => 'blue',
        'platform' => 'Windows',
        'image' => 'assets/images/game10.jpg'
    ]
];

// Include header
include 'includes/header.php';
?>

<!-- Hero Carousel Section -->
<section class="hero-carousel">
    <div class="carousel-container">
        <div class="carousel-track" id="carousel-track">
            <?php foreach ($featuredGames as $index => $game): ?>
            <div class="carousel-item <?php echo ($index === 0) ? 'active' : ''; ?>">
                <div class="carousel-content">
                    <div class="game-info">
                        <div class="platform-label"><?php echo htmlspecialchars($game['platform']); ?></div>
                        <h2><?php echo htmlspecialchars($game['title']); ?></h2>
                        <div class="game-meta">
                            <span class="version"><?php echo htmlspecialchars($game['version']); ?></span>
                            <span
                                class="status <?php echo $game['status_class']; ?>"><?php echo htmlspecialchars($game['status']); ?></span>
                        </div>
                        <p><?php echo htmlspecialchars($game['description']); ?></p>
                        <div class="cta-buttons">
                            <a href="#" class="btn btn-primary">Download Now</a>
                            <a href="#" class="btn btn-secondary">View Details</a>
                        </div>
                    </div>
                    <div class="game-cover">
                        <img src="<?php echo htmlspecialchars($game['image']); ?>"
                            alt="<?php echo htmlspecialchars($game['title']); ?>">
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Carousel Navigation -->
        <button class="carousel-nav prev" id="prev-btn"><i class="fas fa-chevron-left"></i></button>
        <button class="carousel-nav next" id="next-btn"><i class="fas fa-chevron-right"></i></button>

        <!-- Carousel Indicators -->
        <div class="carousel-indicators" id="carousel-indicators">
            <?php foreach ($featuredGames as $index => $game): ?>
            <span class="indicator <?php echo ($index === 0) ? 'active' : ''; ?>"
                data-index="<?php echo $index; ?>"></span>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Genre Section -->
<section class="genre-section">
    <div class="container">
        <div class="section-header">
            <h2>Genres & Picks</h2>
            <div class="genre-tabs">
                <button class="tab-btn active" data-genre="action">Arcade & Action</button>
                <button class="tab-btn" data-genre="strategy">Strategy</button>
                <button class="tab-btn" data-genre="horror">Horror</button>
                <button class="tab-btn" data-genre="racing">Racing</button>
                <button class="tab-btn" data-genre="puzzle">Puzzle</button>
            </div>
        </div>

        <div class="game-grid" id="game-grid">
            <?php foreach ($genreGames as $game): ?>
            <div class="game-card">
                <div class="game-card-img">
                    <img src="<?php echo htmlspecialchars($game['image']); ?>"
                        alt="<?php echo htmlspecialchars($game['title']); ?>">
                    <div class="platform-badge"><?php echo htmlspecialchars($game['platform']); ?></div>
                    <div class="hover-info">
                        <div class="download-btn"><i class="fas fa-download"></i></div>
                        <div class="details-btn"><i class="fas fa-info-circle"></i></div>
                    </div>
                </div>
                <div class="game-card-info">
                    <h3><?php echo htmlspecialchars($game['title']); ?></h3>
                    <div class="game-meta">
                        <span
                            class="version <?php echo $game['version_class']; ?>"><?php echo htmlspecialchars($game['version']); ?></span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="load-more">
            <button class="btn btn-outline">Load More Action Games</button>
        </div>
    </div>
</section>

<?php
// Include footer
include 'includes/footer.php';
?>
