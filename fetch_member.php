<?php
// Start with output buffering and clean any previous output
ob_start();
ob_clean();

// Set headers before any output
header('Content-Type: application/json');

// Disable error display in production
ini_set('display_errors', 0);
error_reporting(0);

include 'db_config.php';

// Verify connection
if ($conn->connect_error) {
    http_response_code(500);
    die(json_encode([
        'status' => 'error',
        'message' => 'Database connection failed'
    ]));
}

try {
    $sql = "SELECT id, name, designation, bio, image, 
            DATE_FORMAT(added_at, '%Y-%m-%d %H:%i:%s') as formatted_date 
            FROM members ORDER BY added_at DESC";
    
    $result = $conn->query($sql);
    
    if (!$result) {
        throw new Exception("Query failed");
    }

    $members = [];
    while ($row = $result->fetch_assoc()) {
        $members[] = [
            'id' => (int)$row['id'],
            'name' => $row['name'],
            'position' => $row['designation'],
            'bio' => $row['bio'],
            'image' => $row['image'] ?? 'default.jpg',
            'added_at' => $row['formatted_date']
        ];
    }

    // Clear the output buffer completely
    ob_end_clean();
    
    // Send only JSON
    echo json_encode([
        'status' => 'success',
        'data' => $members
    ]);
    
} catch (Exception $e) {
    ob_end_clean();
    http_response_code(500);
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}

// Ensure no further output
exit();
?>