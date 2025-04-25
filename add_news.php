<?php
session_start();
include 'db_config.php'; // Connect to your database

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);

    // Handle the uploaded file
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        // Get the file info
        $imageName = $_FILES['image']['name'];
        $imageTmp = $_FILES['image']['tmp_name'];
        $imageType = $_FILES['image']['type'];
        $imageSize = $_FILES['image']['size'];

        // Allowed image types
        $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];

        // Check if the uploaded file type is allowed
        if (!in_array($imageType, $allowedTypes)) {
            echo "Only JPG and PNG images are allowed.";
            exit;
        }

        // Check if the image size is within the allowed limit (2MB max)
        if ($imageSize > 2 * 1024 * 1024) {
            echo "Image is too large. Max 2MB allowed.";
            exit;
        }

        // Set the upload directory and create a unique file name
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Create the directory if it doesn't exist
        }

        $uniqueName = uniqid() . "_" . basename($imageName);
        $imagePath = $uploadDir . $uniqueName;

        // Move the uploaded file to the upload directory
        if (move_uploaded_file($imageTmp, $imagePath)) {
            // Prepare the SQL query
            $stmt = $conn->prepare("INSERT INTO news (title, content, image) VALUES (?, ?, ?)");

            // Check if the statement preparation was successful
            if ($stmt === false) {
                // If there was an error preparing the statement, output it
                echo "Error preparing the SQL statement: " . $conn->error;
                exit;
            }

            // Bind the parameters to the SQL query
            $stmt->bind_param("sss", $title, $content, $uniqueName);

            // Execute the query and check for success
            if ($stmt->execute()) {
                header("Location: admin.php");
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close the prepared statement
            $stmt->close();
        } else {
            echo "Failed to upload image.";
        }
    } else {
        echo "No image uploaded or there was an upload error.";
    }

    // Close the database connection
    $conn->close();
}
?>
