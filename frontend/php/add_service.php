<?php
require '../db.php'; // Include database connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission to add a new service and upload an image
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $service_name = $_POST['service_name'];
    $description = $_POST['description'];
    $price = (float)$_POST['price'];

    // Handle image upload
    $imagePath = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $imageName = basename($_FILES['image']['name']);
        $imagePath = 'php/uploads' . $imageName; // Updated to save inside 'php/uploads/'
        $imageType = strtolower(pathinfo($imagePath, PATHINFO_EXTENSION));

        // Check if it's a valid image file
        $validExtensions = array('jpg', 'jpeg', 'png', 'gif');
        if (in_array($imageType, $validExtensions)) {
            // Move the uploaded file to the uploads directory
            if (!file_exists('php/uploads')) {
                mkdir('/uploads', 0777, true); // Create the directory if it doesn't exist
            }
            move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
        } else {
            echo "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
            exit;
        }
    }

    // Insert service details into the database
    $stmt = $conn->prepare("INSERT INTO services (service_name, description, price, image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $service_name, $description, $price, $imagePath);

    if ($stmt->execute()) {
        // Redirect to the same page to avoid form resubmission
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "Error adding service: " . $stmt->error;
    }

    $stmt->close();
}

// Fetch all services from the database
$services = $conn->query("SELECT * FROM services");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Services</title>
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

        h1, h2 {
            text-align: center;
            color: #333;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="text"], input[type="number"], textarea {
            width: 100%;
            max-width: 500px;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        input[type="file"] {
            margin-top: 10px;
        }

        button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
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

        img {
            width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Services</h1>

        <!-- Form to add a new service -->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <label for="service_name">Service Name:</label>
            <input type="text" id="service_name" name="service_name" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="5" required></textarea>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" step="0.01" required>

            <label for="image">Upload Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>

            <button type="submit">Add Service</button>
        </form>

        <!-- Display all services -->
        <h2>Available Services</h2>
        <table>
            <thead>
                <tr>
                    <th>Service Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $services->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['service_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['description']); ?></td>
                        <td><?php echo htmlspecialchars($row['price']); ?></td>
                        <td>
                            <?php if (!empty($row['image'])): ?>
                                <!-- Updated to reflect that the uploads folder is inside the php folder -->
                                <img src="php/uploads/<?php echo htmlspecialchars(basename($row['image'])); ?>" alt="Service Image">
                            <?php else: ?>
                                No image
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
