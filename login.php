<?php
// Start session
session_start();

// Include configuration file
require_once 'config.php';

// Include functions file
require_once 'functions.php';

// Page title
$pageTitle = "Login - GAMEZUNIA";

// Initialize variables
$email = '';
$error = '';
$success = '';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Validate form data
    if (empty($email)) {
        $error = 'Please enter your email address.';
    } elseif (empty($password)) {
        $error = 'Please enter your password.';
    } else {
        // In a real application, you would validate against a database
        // For demo purposes, we'll use a hardcoded check
        if ($email === 'demo@gamezunia.com' && $password === 'password123') {
            // Set session variables
            $_SESSION['user_id'] = 1;
            $_SESSION['user_email'] = $email;
            $_SESSION['user_name'] = 'Demo User';

            // Redirect to home page
            $success = 'Login successful! Redirecting...';
            header('Refresh: 2; URL=index.php');
            exit;
        } else {
            $error = 'Invalid email or password.';
        }
    }
}

// Include header
include 'includes/header.php';
?>

<div class="container" style="margin-top: 120px; margin-bottom: 60px;">
    <div class="form-container">
        <h2 class="text-center mb-4" style="margin-bottom: 30px; font-family: 'Orbitron', sans-serif;">Login to
            GAMEZUNIA</h2>

        <?php if (!empty($error)): ?>
        <div class="alert alert-danger">
            <?php echo htmlspecialchars($error); ?>
        </div>
        <?php endif; ?>

        <?php if (!empty($success)): ?>
        <div class="alert alert-success">
            <?php echo htmlspecialchars($success); ?>
        </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" id="email" name="email" class="form-control"
                    value="<?php echo htmlspecialchars($email); ?>" required>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <div class="form-check">
                <input type="checkbox" id="remember" name="remember" class="form-check-input">
                <label for="remember" class="form-check-label">Remember me</label>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%;">Login</button>

            <div style="text-align: center; margin-top: 20px;">
                <p>Don't have an account? <a href="register.php" style="color: var(--primary-light);">Register</a></p>
                <p><a href="forgot-password.php" style="color: var(--primary-light);">Forgot Password?</a></p>
            </div>
        </form>
    </div>
</div>

<?php
// Include footer
include 'includes/footer.php';
?>
