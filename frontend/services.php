<?php
require './db.php'; // Include your database connection here

// Fetch all services from the database
$services = $conn->query("SELECT * FROM services");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services - Yeti Tech Pvt. Ltd</title>
    <link rel="stylesheet" href="./style/style.css">

    <style>
        .footer {
    background-color: #24262b;
    color: white;
    padding: 40px 0;
}

.footer-col {
    width: 25%;
    padding: 0 15px;
}

.footer-col h4 {
    font-size: 18px;
    color: white;
    margin-bottom: 20px;
    font-weight: 600;
    position: relative;
}

.footer-col ul {
    list-style: none;
    padding-left: 0;
}

.footer-col ul li {
    margin-bottom: 10px;
}

.footer-col ul li a {
    color: #bbbbbb;
    text-decoration: none;
}

.footer-col ul li a:hover {
    color: #ffffff;
}

.social-links {
    margin-top: 20px;
}

.social-links a {
    display: inline-block;
    margin-right: 10px;
    color: #bbbbbb;
}

.social-links a:hover {
    color: #ffffff;
}

.text-center {
    background-color: #24262b;
    padding: 20px;
    color: white;
}

    </style>

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

    <!-- Services Section -->
    <section class="services" id="services">
        <div class="container">
            <h1 class="heading text-center mt-5">Our Services</h1>
            <div class="row">
                <?php while ($row = $services->fetch_assoc()): ?>
                    <div class="col-md-4 mt-4">
                        <div class="service-box">
                        <img src="./php/<?php echo $row['image']; ?>" alt="Service Image" class="img-fluid">                            
                        <h3><?php echo $row['service_name']; ?></h3>
                            <p><?php echo $row['description']; ?></p>
                            <strong>Price: $<?php echo $row['price']; ?></strong>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
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
