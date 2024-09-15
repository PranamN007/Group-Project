<?php
include '../db.php'; // Ensure this includes the correct path to your db.php

header('Content-Type: application/json');

// Get user ID from query parameter
$id = $_GET['id'];

// Validate ID
if (!isset($id) || !is_numeric($id)) {
    echo json_encode(['message' => 'Invalid user ID']);
    exit;
}

// Delete user from the database
$sql = "DELETE FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id);

if ($stmt->execute()) {
    echo json_encode(['message' => 'User deleted successfully']);
} else {
    echo json_encode(['message' => 'Error deleting user']);
}

$stmt->close();
$conn->close();
?>
