<?php
require '../db.php'; // Adjust the path to your database connection

// Get total number of users
$result = $conn->query("SELECT COUNT(*) AS totalUsers FROM users");
$totalUsers = $result->fetch_assoc()['totalUsers'];

// Count today's signups
$today = date('Y-m-d');
$stmt = $conn->prepare("SELECT COUNT(*) AS todaysSignups FROM users WHERE DATE(created_at) = ?");
$stmt->bind_param('s', $today);
$stmt->execute();
$result = $stmt->get_result();
$todaysSignups = $result->fetch_assoc()['todaysSignups'];

// Fetch all latest signups (no date restriction)
$result = $conn->query("SELECT username, email FROM users ORDER BY created_at DESC");
$latestUsers = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overview</title>
    <link rel="stylesheet" href="./style/overview.css">
</head>
<body>
    <div class="overview-container">
        <h1>Overview</h1>

        <div class="stats">
            <div class="stat-box">
                <h2 id="total-users">Total Users: <?php echo $totalUsers; ?></h2>
            </div>
            <div class="stat-box">
                <h2 id="todays-signups">Today's Signups: <?php echo $todaysSignups; ?></h2>
            </div>
        </div>

        <h3>Latest Signups</h3>
        <table id="latest-signups-table">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($latestUsers as $user): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['username']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
