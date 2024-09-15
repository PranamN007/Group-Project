<?php
session_start(); // Start the session
include "db.php";
// Check if the user is logged in, if not redirect to the login page
if (!isset($_SESSION['user_id'])) {
    header("Location: ./html/login.html?redirect=" . urlencode($_SERVER['REQUEST_URI']));
    exit();
}
if ($_SESSION['role'] !== 'admin') {
    // If the user is not an admin, redirect to index or another page
    header("Location: ./html/login.html?redirect=" . urlencode($_SERVER['REQUEST_URI']));
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./style/dashboard.css">
</head> 
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>My Dashboard</h2>
            </div>
            <ul class="sidebar-menu">
                <li><a href="#" data-content="overview">Overview</a></li>
                <li><a href="#" data-content="services">Services</a></li>
                <li><a href="#" data-content="order">Orders</a></li>
                <li><a href="#" data-content="usersettings">Users Setting</a></li>
                <li><a href="#" data-content="profile">Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Navbar -->
            <nav class="navbar">
                <div class="account-info">
                    <span class="account-name">
                        <?php 
                        // Optionally, you can use PHP to show dynamic user information here.
                        echo "John Doe"; // Example static user name
                        ?>
                    </span>
                </div>
            </nav>

            <!-- Page Content -->
            <section class="content" id="content">
                <h1>Welcome to Your Dashboard</h1>
                <p>This is an overview of your dashboard.</p>
            </section>
        </div>
    </div>

    <script src="./javascript/dashboard.js"></script>
</body>
</html>
