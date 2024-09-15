<?php
// Include the database connection file
include '../db.php';

// If connection is successful, output a message
if ($conn) {
    echo "Database connection successful!";
} else {
    echo "Database connection failed!";
}
?>
