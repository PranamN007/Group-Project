<?php
session_start(); // Start the session

// Destroy all session data
session_unset(); // Remove all session variables
session_destroy(); // Destroy the session itself

// Redirect the user to the login page after logout
header("Location: ./html/login.html");
exit();
?>