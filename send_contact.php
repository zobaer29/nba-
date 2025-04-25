<?php
// Start with output buffering and clean any previous output
ob_start();
if (ob_get_length()) ob_clean();

// Set headers before any output
header('Content-Type: application/json');

// Database configuration
require_once 'db_config.php';

// Initialize response array
$response = [
    'success' => false,
    'message' => 'An error occurred',
    'debug' => null // Remove this in production
];

try {
    // Validate required fields
    $required = ['name', 'email', 'message'];
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            throw new Exception("The $field field is required");
        }
    }

    // Validate email format
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Invalid email format');
    }

    // Sanitize inputs
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO sms (name, email, message) VALUES (?, ?, ?)");
    if (!$stmt) {
        throw new Exception('Database preparation failed: ' . $conn->error);
    }

    $stmt->bind_param("sss", $name, $email, $message);
    
    if ($stmt->execute()) {
        $response = [
            'success' => true,
            'message' => 'Message sent successfully!'
        ];
    } else {
        throw new Exception('Failed to save message: ' . $stmt->error);
    }
} catch (Exception $e) {
    $response['message'] = $e->getMessage();
    $response['debug'] = $e->getMessage(); // Remove in production
} finally {
    // Ensure only JSON is output
    echo json_encode($response);
    
    // Close connections
    if (isset($stmt)) $stmt->close();
    if (isset($conn)) $conn->close();
    
    // Prevent any additional output
    exit;
}