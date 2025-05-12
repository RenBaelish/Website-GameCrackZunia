<!-- Footer -->
<footer>
    <div class="container">
        <div class="footer-grid">
            <div class="footer-col">
                <h3>About Gamezunia</h3>
                <p>A community-driven platform dedicated to providing free access to PC games. Our mission is to create
                    a space where gamers can discover and enjoy games without barriers.</p>
                <p>We adhere to strict content policies to ensure a safe and enjoyable experience for all users.</p>
            </div>

            <div class="footer-col">
                <h3>Explore More</h3>
                <ul>
                    <li><a href="games.php?type=indie">Indie Games</a></li>
                    <li><a href="games.php?type=trending">Trending Now</a></li>
                    <li><a href="games.php?type=popular">Most Downloaded</a></li>
                    <li><a href="games.php?type=multiplayer">Multiplayer Games</a></li>
                    <li><a href="games.php?type=new">New Additions</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h3>Connect With Us</h3>
                <div class="social-icons">
                    <?php foreach ($socialLinks as $platform => $url): ?>
                    <a href="<?php echo htmlspecialchars($url); ?>" class="social-icon">
                        <i class="fab fa-<?php echo $platform; ?>"></i>
                    </a>
                    <?php endforeach; ?>
                </div>
                <p>Join our community to stay updated with the latest releases and connect with fellow gamers.</p>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> Gamezunia. Powered by Gamers for Gamers.</p>
        </div>
    </div>
</footer>

<script src="assets/js/script.js"></script>
</body>

</html>
