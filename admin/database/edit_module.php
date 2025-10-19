<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../loginpage.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['module_id'])) {
    $moduleId = $_POST['module_id'];
    $title = $_POST['module_title'];
    $description = $_POST['module_description'];
    $imagePath = $_POST['existing_image']; // Default to the existing image

    // Handle file upload if a new image is provided
    if (isset($_FILES['module_image']) && $_FILES['module_image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../../modulephotoshow/'; // Changed to modulephotoshow
        $uploadedFileName = basename($_FILES['module_image']['name']);
        $fullImagePath = $uploadDir . $uploadedFileName;

        // Move the uploaded file to the uploads directory
        if (!move_uploaded_file($_FILES['module_image']['tmp_name'], $fullImagePath)) {
            echo "Error uploading the file.";
            exit;
        }

        // Update the image path to be relative for use in the application
        $imagePath = 'modulephotoshow/' . $uploadedFileName; // Updated path
    }

    // Update the database
    $conn = new mysqli('localhost', 'root', '', 'elearn_db');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("UPDATE modules SET title = ?, description = ?, image_path = ? WHERE id = ?");
    $stmt->bind_param("sssi", $title, $description, $imagePath, $moduleId);

    if ($stmt->execute()) {
        // Redirect back to the module management page with a success message
        header("Location: ../Amodule.php?update=success");
    } else {
        echo "Error updating module: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    exit();
} else {
    echo "Invalid request.";
    exit();
}
?>