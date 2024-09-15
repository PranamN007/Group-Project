<?php
// Include database connection
require '../db.php'; // Adjust the path to your database connection

// Handle DELETE request for user deletion
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    parse_str(file_get_contents("php://input"), $data);
    $userId = $data['id'];

    if (isset($userId)) {
        // Prepare and execute the delete statement
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param('i', $userId);
        if ($stmt->execute()) {
            echo json_encode(['message' => 'User deleted successfully.']);
        } else {
            echo json_encode(['message' => 'Failed to delete user.']);
        }
        $stmt->close();
    } else {
        echo json_encode(['message' => 'User ID not provided.']);
    }
    $conn->close();
    exit();
}

// Handle POST request for user update (editing username, email, role)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    if (isset($userId, $username, $email, $role)) {
        // Prepare and execute the update statement
        $stmt = $conn->prepare("UPDATE users SET username = ?, email = ?, role = ? WHERE id = ?");
        $stmt->bind_param('sssi', $username, $email, $role, $userId);
        if ($stmt->execute()) {
            echo json_encode(['message' => 'User updated successfully.']);
        } else {
            echo json_encode(['message' => 'Failed to update user.']);
        }
        $stmt->close();
    } else {
        echo json_encode(['message' => 'Incomplete data provided.']);
    }
    $conn->close();
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Setting</title>
    <link rel="stylesheet" href="./style/users-settings.css">
</head>
<body>
    <div class="users-setting-container">
        <h1>Users Setting</h1>
        <table id="users-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch users from the database
                $sql = "SELECT id, username, email, role FROM users";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['username']}</td>";
                        echo "<td>{$row['email']}</td>";
                        echo "<td>{$row['role']}</td>";
                        echo "<td>";
                        echo "<button class='action-button' onclick='editUser({$row['id']}, \"{$row['username']}\", \"{$row['email']}\", \"{$row['role']}\")'>Edit</button>";
                        echo "<button class='action-button' onclick='deleteUser({$row['id']})'>Delete</button>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No users found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- Edit Modal -->
    <div id="edit-modal" style="display:none;">
        <h2>Edit User</h2>
        <form id="edit-form">
            <input type="hidden" id="edit-id" name="id">
            <label for="username">Username:</label>
            <input type="text" id="edit-username" name="username" required><br>
            <label for="email">Email:</label>
            <input type="email" id="edit-email" name="email" required><br>
            <label for="role">Role:</label>
            <input type="text" id="edit-role" name="role" required><br>
            <button type="button" onclick="saveUser()">Save</button>
            <button type="button" onclick="closeModal()">Cancel</button>
        </form>
    </div>

    <script>
    // Function to open the edit modal and populate with user data
    function editUser(id, username, email, role) {
        document.getElementById('edit-id').value = id;
        document.getElementById('edit-username').value = username;
        document.getElementById('edit-email').value = email;
        document.getElementById('edit-role').value = role;
        document.getElementById('edit-modal').style.display = 'block';
    }

    // Function to close the edit modal
    function closeModal() {
        document.getElementById('edit-modal').style.display = 'none';
    }

    // Function to save the edited user data
    function saveUser() {
        const formData = new FormData(document.getElementById('edit-form'));

        fetch('php/usersettings.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(result => {
            alert(result.message);
            location.reload();  // Reload the page to show updated data
        })
        .catch(error => {
            console.error('Error updating user:', error);
        });
    }
    </script>
</body>
</html>
