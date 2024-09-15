<?php
$servername = "localhost";
$username = "root";  // Default username in XAMPP is 'root'
$password = "";      // Default password is empty in XAMPP
$dbname = "digitalyeti";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>