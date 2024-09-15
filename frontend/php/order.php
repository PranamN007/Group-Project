<?php
require '../db.php'; // Include the database connection file

// Check if there is an error with the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch orders and corresponding user details from the database
$query = "
    SELECT orders.*, users.username 
    FROM orders 
    INNER JOIN users ON orders.user_id = users.id
";

$orders = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #28a745;
            color: white;
        }

        table tr:hover {
            background-color: #f5f5f5;
        }

        p {
            text-align: center;
            color: #28a745;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Order List</h1>

        <table>
            <thead>
                <tr>
                    <th>Order Name</th>
                    <th>Order Description</th>
                    <th>Delivery Status</th>
                    <th>Ordered By</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($orders->num_rows > 0): ?>
                    <?php while ($row = $orders->fetch_assoc()): 
                        // Calculate the delivery date based on the order date and delivery days
                        $orderDate = new DateTime($row['order_date']);
                        $deliveryDays = $row['delivery_days'];
                        $deliveryDate = clone $orderDate;
                        $deliveryDate->modify("+{$deliveryDays} days");

                        $currentDate = new DateTime(); // Current date
                        $daysRemaining = $currentDate->diff($deliveryDate)->days;
                        $deliveryStatus = ($deliveryDate > $currentDate) 
                            ? "Should be delivered in {$daysRemaining} days" 
                            : "Delivery date passed";
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['order_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['order_description']); ?></td>
                        <td><?php echo htmlspecialchars($deliveryStatus); ?></td>
                        <td><?php echo htmlspecialchars($row['username']); ?></td> <!-- Display the username -->
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" style="text-align: center;">No orders found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
