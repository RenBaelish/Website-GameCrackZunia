<?php
// Get user's theme preference
$theme = getUserTheme();
$themeClass = ($theme === 'light') ? 'light-mode' : 'dark-mode';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? htmlspecialchars($pageTitle) : 'GAMEZUNIA'; ?></title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/library-styles.css">
    <link rel="stylesheet" href="assets/css/faq-discord.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;600;700&family=Orbitron:wght@400;500;700;900&family=Exo+2:wght@300;400;600;700&display=swap"
        rel="stylesheet">
</head>

<body class="<?php echo $themeClass; ?>">
    <!-- Header Section -->
    <header>
        <div class="container">
            <div class="logo">
                <img src="assets/images/logo.png" alt="GAMEZUNIA Logo">
                <h1>GAMEZUNIA</h1>
            </div>
            <nav>
                <ul class="main-menu">
                    <li><a href="index.php" class="<?php echo isCurrentPage('index.php') ? 'active' : ''; ?>">Home</a>
                    </li>
                    <li class="dropdown">
                        <a href="#">Library <i class="fas fa-chevron-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="games.php?type=all">All Games</a></li>
                            <li><a href="genres.php">Genres</a></li>
                            <li><a href="top-rated.php">Top Rated</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#">Explore <i class="fas fa-chevron-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="games.php?type=new">New Releases</a></li>
                            <li><a href="games.php?type=indie">Indie Picks</a></li>
                            <li><a href="games.php?type=retro">Retro Vault</a></li>
                        </ul>
                    </li>
                    <li><a href="updates.php"
                            class="<?php echo isCurrentPage('updates.php') ? 'active' : ''; ?>">Updates</a></li>
                    <li class="dropdown">
                        <a href="#">Connect <i class="fas fa-chevron-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="faq.php">FAQ</a></li>
                            <li><a href="discord.php">Discord</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div class="header-icons">
                <button class="icon-btn search-btn"><i class="fas fa-search"></i></button>
                <button class="icon-btn theme-toggle" id="theme-toggle">
                    <i class="fas <?php echo ($theme === 'light') ? 'fa-sun' : 'fa-moon'; ?>"></i>
                </button>
                <?php if (isset($_SESSION['user_id'])): ?>
                <div class="profile-avatar">
                    <img src="assets/images/avatar.png" alt="Profile">
                </div>
                <?php else: ?>
                <a href="login.php" class="btn btn-secondary btn-sm">Login</a>
                <?php endif; ?>
                <button class="mobile-menu-btn" id="mobile-menu-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </header>
