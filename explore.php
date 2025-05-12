<?php
// Start session
session_start();

// Include configuration file
require_once 'config.php';

// Include functions file
require_once 'functions.php';

// Page title
$pageTitle = "Explore Games - GAMEZUNIA";

// Include header
include 'includes/header.php';
?>

<div class="explore-header">
    <div class="container">
        <h1>Explore Games</h1>
        <p>Discover new releases, indie gems, and classic retro titles in our curated collections</p>
    </div>
</div>

<section class="explore-categories">
    <div class="container">
        <div class="explore-grid">
            <a href="explore-new.php" class="explore-card new-releases">
                <div class="explore-card-overlay"></div>
                <div class="explore-card-content">
                    <div class="explore-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h2>New Releases</h2>
                    <p>Check out the latest and hottest game releases</p>
                    <span class="explore-count">24 Games</span>
                    <div class="explore-btn">Browse New Releases <i class="fas fa-arrow-right"></i></div>
                </div>
            </a>

            <a href="explore-indie.php" class="explore-card indie-picks">
                <div class="explore-card-overlay"></div>
                <div class="explore-card-content">
                    <div class="explore-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h2>Indie Picks</h2>
                    <p>Discover amazing games from independent developers</p>
                    <span class="explore-count">18 Games</span>
                    <div class="explore-btn">Browse Indie Picks <i class="fas fa-arrow-right"></i></div>
                </div>
            </a>

            <a href="explore-retro.php" class="explore-card retro-vault">
                <div class="explore-card-overlay"></div>
                <div class="explore-card-content">
                    <div class="explore-icon">
                        <i class="fas fa-gamepad"></i>
                    </div>
                    <h2>Retro Vault</h2>
                    <p>Revisit classic games from the golden era of gaming</p>
                    <span class="explore-count">32 Games</span>
                    <div class="explore-btn">Browse Retro Vault <i class="fas fa-arrow-right"></i></div>
                </div>
            </a>
        </div>
    </div>
</section>

<section class="explore-featured">
    <div class="container">
        <div class="section-header">
            <h2>Featured Collections</h2>
            <p>Handpicked game collections for every type of gamer</p>
        </div>

        <div class="collections-grid">
            <div class="collection-card">
                <div class="collection-image">
                    <img src="assets/images/game1.jpg" alt="Multiplayer Games">
                    <div class="collection-overlay"></div>
                </div>
                <div class="collection-info">
                    <h3>Multiplayer Mayhem</h3>
                    <p>Games best enjoyed with friends</p>
                    <span class="collection-count">16 Games</span>
                </div>
            </div>

            <div class="collection-card">
                <div class="collection-image">
                    <img src="assets/images/game2.jpg" alt="Story-Driven Games">
                    <div class="collection-overlay"></div>
                </div>
                <div class="collection-info">
                    <h3>Story-Driven Adventures</h3>
                    <p>Immersive narratives and rich worlds</p>
                    <span class="collection-count">12 Games</span>
                </div>
            </div>

            <div class="collection-card">
                <div class="collection-image">
                    <img src="assets/images/game3.jpg" alt="Pixel Art Games">
                    <div class="collection-overlay"></div>
                </div>
                <div class="collection-info">
                    <h3>Pixel Art Perfection</h3>
                    <p>Beautiful games with retro-inspired visuals</p>
                    <span class="collection-count">20 Games</span>
                </div>
            </div>

            <div class="collection-card">
                <div class="collection-image">
                    <img src="assets/images/game4.jpg" alt="Roguelike Games">
                    <div class="collection-overlay"></div>
                </div>
                <div class="collection-info">
                    <h3>Roguelike Challenges</h3>
                    <p>Procedurally generated adventures</p>
                    <span class="collection-count">14 Games</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="explore-trending">
    <div class="container">
        <div class="section-header">
            <h2>Trending Now</h2>
            <p>What gamers are playing this week</p>
            <a href="games.php?sort=trending" class="view-all">View All <i class="fas fa-arrow-right"></i></a>
        </div>

        <div class="trending-slider">
            <div class="trending-card">
                <div class="trending-rank">#1</div>
                <div class="trending-image">
                    <img src="assets/images/game5.jpg" alt="Trending Game 1">
                    <div class="trending-overlay"></div>
                </div>
                <div class="trending-info">
                    <h3>Cyber Nomad: Redux</h3>
                    <div class="trending-meta">
                        <span class="trending-genre">Open World</span>
                        <span class="trending-rating"><i class="fas fa-star"></i> 4.8</span>
                    </div>
                </div>
            </div>

            <div class="trending-card">
                <div class="trending-rank">#2</div>
                <div class="trending-image">
                    <img src="assets/images/game6.jpg" alt="Trending Game 2">
                    <div class="trending-overlay"></div>
                </div>
                <div class="trending-info">
                    <h3>Chrono Splicer</h3>
                    <div class="trending-meta">
                        <span class="trending-genre">Puzzle</span>
                        <span class="trending-rating"><i class="fas fa-star"></i> 4.9</span>
                    </div>
                </div>
            </div>

            <div class="trending-card">
                <div class="trending-rank">#3</div>
                <div class="trending-image">
                    <img src="assets/images/game7.jpg" alt="Trending Game 3">
                    <div class="trending-overlay"></div>
                </div>
                <div class="trending-info">
                    <h3>Mechanoid Rush</h3>
                    <div class="trending-meta">
                        <span class="trending-genre">Racing</span>
                        <span class="trending-rating"><i class="fas fa-star"></i> 4.2</span>
                    </div>
                </div>
            </div>

            <div class="trending-card">
                <div class="trending-rank">#4</div>
                <div class="trending-image">
                    <img src="assets/images/game8.jpg" alt="Trending Game 4">
                    <div class="trending-overlay"></div>
                </div>
                <div class="trending-info">
                    <h3>Aether Bloom</h3>
                    <div class="trending-meta">
                        <span class="trending-genre">Simulation</span>
                        <span class="trending-rating"><i class="fas fa-star"></i> 4.4</span>
                    </div>
                </div>
            </div>

            <div class="trending-card">
                <div class="trending-rank">#5</div>
                <div class="trending-image">
                    <img src="assets/images/game9.jpg" alt="Trending Game 5">
                    <div class="trending-overlay"></div>
                </div>
                <div class="trending-info">
                    <h3>Void Hacker</h3>
                    <div class="trending-meta">
                        <span class="trending-genre">RPG</span>
                        <span class="trending-rating"><i class="fas fa-star"></i> 4.7</span>
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
