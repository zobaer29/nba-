<?php
session_start();
include 'db_config.php';

$name = $_POST['name'];
$designation = $_POST['designation'];
$bio = $_POST['bio'];

$imageName = $_FILES['image']['name'];
$imageTmp = $_FILES['image']['tmp_name'];
$imageType = $_FILES['image']['type'];

$allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
if (!in_array($imageType, $allowedTypes)) {
    echo "Only JPG and PNG images are allowed.";
    exit;
}

$uploadDir = 'uploads/';
$uniqueName = uniqid() . "_" . basename($imageName);
$imagePath = $uploadDir . $uniqueName;

if (move_uploaded_file($imageTmp, $imagePath)) {
    $stmt = $conn->prepare("INSERT INTO members (name, designation, image, bio) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $designation, $uniqueName, $bio);

    if ($stmt->execute()) {
        header("Location: admin.php");
    } else {
        echo "Error: " . $stmt->error;
    }
} else {
    echo "Failed to upload image.";
}

$conn->close();
?>
