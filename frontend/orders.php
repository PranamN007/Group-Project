<?php
session_start(); // Start the session to track logged-in user
require './db.php'; // Include your database connection here

// Assuming the user's ID is stored in the session after login
$user_id = $_SESSION['user_id'];

// Handle form submission to add an order
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_name = $_POST['order_name'];
    $order_description = $_POST['order_description'];
    $delivery_days = (int)$_POST['delivery_days'];

    // Insert order details into the database
    $stmt = $conn->prepare("INSERT INTO orders (order_name, order_description, delivery_days, order_date, user_id) VALUES (?, ?, ?, NOW(), ?)");
    $stmt->bind_param("ssii", $order_name, $order_description, $delivery_days, $user_id);

    if ($stmt->execute()) {
        $success_message = "Order placed successfully!";
    } else {
        $error_message = "Error placing order: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place an Order - Yeti Tech Pvt. Ltd</title>
    <link rel="stylesheet" href="./style/style.css">

    <!-- Font Awesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Bootstrap CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar" style="position: sticky;">
        <label for="check">
            <i class="fas fa-bars" id="btn"></i>
            <i class="fas fa-times" id="cancel"></i>
        </label>
        <a class="logo" href="index.php"><img src="logo.png" alt="Yeti Tech Logo"></a>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Teams</a></li>
            <li><a href="#">Gallery</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="orders.php">Orders</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>

    <!-- Order Form Section -->
    <section class="order" id="order">
        <div class="container">
            <h1 class="heading text-center mt-5">Place Your Order</h1>

            <!-- Display Success or Error Message -->
            <?php if (isset($success_message)): ?>
                <div class="alert alert-success"><?php echo $success_message; ?></div>
            <?php elseif (isset($error_message)): ?>
                <div class="alert alert-danger"><?php echo $error_message; ?></div>
            <?php endif; ?>

            <!-- Order Form -->
            <form action="orders.php" method="POST" class="mt-4">
                <div class="form-group">
                    <label for="order_name">Order Name</label>
                    <input type="text" class="form-control" id="order_name" name="order_name" required>
                </div>

                <div class="form-group">
                    <label for="order_description">Order Description</label>
                    <textarea class="form-control" id="order_description" name="order_description" rows="3" required></textarea>
                </div>

                <div class="form-group">
                    <label for="delivery_days">Delivery Days</label>
                    <input type="number" class="form-control" id="delivery_days" name="delivery_days" min="1" required>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Place Order</button>
            </form>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>Company</h4>
                    <ul>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Our Services</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Get Help</h4>
                    <ul>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">FAQs</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#gallery">Gallery</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Follow us</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center" style="background-color: #24262b; color: white; padding: 20px 0;">
            © 2024 Copyright:
            <a class="text-reset fw-bold" href="https://digitalyeti.com/">YetiTech.com</a>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>

</body>
</html>
