<?php
session_start();
include '../db.php';

// Function to sanitize input
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Check if form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST['email']) ? sanitize_input($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Validate input
    if (empty($email) || empty($password)) {
        header("Location: ../html/login.html?error=empty_fields");
        exit();
    }

    // Prepare SQL query to get user data
    $sql = "SELECT id, username, password, role FROM users WHERE email = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        // Check if user exists
        if ($stmt->num_rows === 1) {
            $stmt->bind_result($user_id, $username, $hashed_password, $role);
            $stmt->fetch();

            // Verify password
            if (password_verify($password, $hashed_password)) {
                // Start session and set user data
                $_SESSION['user_id'] = $user_id;
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $role;

                // Redirect based on role
                if ($role === 'admin') {
                    header("Location: ../Dashboard.php");
                } else if ($role === 'user') {
                    header("Location: ../index.php");
                }
                exit(); // Terminate the script after redirection
            } else {
                header("Location: ../html/login.html?error=invalid_password");
                exit();
            }
        } else {
            header("Location: ../html/login.html?error=user_not_found");
            exit();
        }

        $stmt->close();
    } else {
        header("Location: ../html/login.html?error=database_error");
        exit();
    }

    $conn->close();
}
?>
