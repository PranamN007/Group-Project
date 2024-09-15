<?php
include '../db.php';

// Function to sanitize input
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Check if form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data from POST array (not JSON)
    $firstname = isset($_POST['firstname']) ? sanitize_input($_POST['firstname']) : '';
    $lastname = isset($_POST['lastname']) ? sanitize_input($_POST['lastname']) : '';
    $email = isset($_POST['email']) ? sanitize_input($_POST['email']) : '';
    $username = isset($_POST['username']) ? sanitize_input($_POST['username']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirm_password = isset($_POST['confirm-password']) ? $_POST['confirm-password'] : '';

    // Validate input
    if (empty($firstname) || empty($lastname) || empty($email) || empty($username) || empty($password) || empty($confirm_password)) {
        die("Error: All fields are required.");
    }

    if ($password !== $confirm_password) {
        die("Error: Passwords do not match.");
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Prepare SQL query
    $sql = "INSERT INTO users (firstname, lastname, email, username, password, role) VALUES (?, ?, ?, ?, ?, 'user')";

    // Prepare and execute statement
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssss", $firstname, $lastname, $email, $username, $hashed_password);

        if ($stmt->execute()) {
            // Redirect to login page after successful registration
            header("Location: ../login.html");
            exit(); // Terminate the script after redirection
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
