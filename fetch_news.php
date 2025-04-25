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
    $sql = "SELECT id, title, content, image, 
            DATE_FORMAT(created_at, '%Y-%m-%d %H:%i:%s') as formatted_date 
            FROM news ORDER BY created_at DESC LIMIT 6";
    
    $result = $conn->query($sql);
    
    if (!$result) {
        throw new Exception("Query failed");
    }

    $news = [];
    while ($row = $result->fetch_assoc()) {
        $news[] = [
            'id' => (int)$row['id'],
            'title' => $row['title'],
            'content' => $row['content'],
            'image' => $row['image'] ?? 'default.jpg',
            'date' => $row['formatted_date']
        ];
    }

    // Clear the output buffer completely
    ob_end_clean();
    
    // Send only JSON
    echo json_encode([
        'status' => 'success',
        'data' => $news
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