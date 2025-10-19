<?php
session_start();

// Enable CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Credentials: true");

// Check if user is authenticated
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    http_response_code(403);
    die(json_encode(['error' => 'Access denied']));
}

// Set upload directory (relative to this script)
$upload_dir = __DIR__ . '/../modulephotos/';
$allowed_ext = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
$max_size = 5 * 1024 * 1024; // 5MB

// Create directory if it doesn't exist
if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0755, true);
}

header('Content-Type: application/json');

try {
    // Check if file was uploaded
    if (empty($_FILES['file'])) {
        throw new Exception('No file uploaded');
    }

    $file = $_FILES['file'];

    // Check for upload errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
        throw new Exception('Upload failed with error code: ' . $file['error']);
    }

    // Validate file size
    if ($file['size'] > $max_size) {
        throw new Exception('File size exceeds maximum limit of 5MB');
    }

    // Validate file extension
    $file_ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($file_ext, $allowed_ext)) {
        throw new Exception('Invalid file type. Allowed types: ' . implode(', ', $allowed_ext));
    }

    // Generate unique filename
    $filename = uniqid('img_', true) . '.' . $file_ext;
    $filepath = $upload_dir . $filename;

    // Move uploaded file
    if (!move_uploaded_file($file['tmp_name'], $filepath)) {
        throw new Exception('Failed to move uploaded file');
    }

    // Return the URL of the uploaded file
    echo json_encode([
        'location' => '/admin/modulephotos/' . $filename
    ]);

} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        'error' => $e->getMessage()
    ]);
}
// In upload_image.php, log the paths:
error_log("Upload dir: " . $upload_dir);
error_log("Returning URL: /admin/modulephotos/" . $filename);
?>
