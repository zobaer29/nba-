<?php
$host = "localhost";
$user = "root";
$password = ""; // Your password
$db = "nba_database";

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
} else {
    echo "Successfully connected to the database!";
}
?>
