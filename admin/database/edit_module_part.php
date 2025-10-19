<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] != 1 || $_SESSION['role'] !== 'admin') {
    header("Location: ../loginpage.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['module_part_id'])) {
    header("Location: ../Amodule.php?tab=module-parts&edit=error&message=Invalid request");
    exit;
}

$conn = new mysqli('localhost', 'root', '', 'elearn_db');
if ($conn->connect_error) {
    header("Location: ../Amodule.php?tab=module-parts&edit=error&message=Database connection failed");
    exit;
}

try {
    // Start transaction
    $conn->begin_transaction();

    $module_part_id = (int)$_POST['module_part_id'];
    $module_id = (int)$_POST['module_id'];
    $part_title = $conn->real_escape_string($_POST['part_title']);

    // Update module part
    $stmt = $conn->prepare("UPDATE module_parts SET module_id = ?, title = ? WHERE id = ?");
    $stmt->bind_param("isi", $module_id, $part_title, $module_part_id);
    if (!$stmt->execute()) {
        throw new Exception("Failed to update module part");
    }
    $stmt->close();

    // Process sections
    if (!empty($_POST['sections']) && is_array($_POST['sections'])) {
        foreach ($_POST['sections'] as $section_id => $section_data) {
            $subtitle = $conn->real_escape_string($section_data['subtitle']);
            $content = $conn->real_escape_string($section_data['content']);
            $has_quiz = isset($section_data['has_subquiz']) ? 1 : 0;

            // Update section
            $stmt = $conn->prepare("UPDATE module_sections SET subtitle = ?, content = ?, has_quiz = ? WHERE id = ? AND module_part_id = ?");
            $stmt->bind_param("ssiii", $subtitle, $content, $has_quiz, $section_id, $module_part_id);
            if (!$stmt->execute()) {
                throw new Exception("Failed to update section");
            }
            $stmt->close();

            // Handle quiz questions if section has quiz
            if ($has_quiz && !empty($section_data['quiz_questions']) && is_array($section_data['quiz_questions'])) {
                foreach ($section_data['quiz_questions'] as $question_id => $question_data) {
                    // Validate required fields
                    $required = ['question_text', 'option1', 'option2', 'option3', 'option4', 'correct_answer'];
                    foreach ($required as $field) {
                        if (!isset($question_data[$field]) || trim($question_data[$field]) === '') {
                            throw new Exception("Missing required field for question: $field");
                        }
                    }

                    $question_text = $conn->real_escape_string($question_data['question_text']);
                    $option1 = $conn->real_escape_string($question_data['option1']);
                    $option2 = $conn->real_escape_string($question_data['option2']);
                    $option3 = $conn->real_escape_string($question_data['option3']);
                    $option4 = $conn->real_escape_string($question_data['option4']);
                    $correct_answer = (int)$question_data['correct_answer'];

                    // Update quiz question
                    $stmt = $conn->prepare("UPDATE section_quiz_questions SET 
                        question_text = ?, 
                        option1 = ?, 
                        option2 = ?, 
                        option3 = ?, 
                        option4 = ?, 
                        correct_answer = ? 
                        WHERE id = ? AND section_id = ?");
                    $stmt->bind_param("ssssssii", 
                        $question_text, 
                        $option1, 
                        $option2, 
                        $option3, 
                        $option4, 
                        $correct_answer, 
                        $question_id, 
                        $section_id
                    );
                    if (!$stmt->execute()) {
                        throw new Exception("Failed to update quiz question");
                    }
                    $stmt->close();
                }
            }
        }
    }

    // Commit transaction
    $conn->commit();
    header("Location: ../Amodule.php?tab=module-parts&edit=success&message=Module part updated successfully");
} catch (Exception $e) {
    // Rollback on error
    $conn->rollback();
    header("Location: ../Amodule.php?tab=module-parts&edit=error&message=" . urlencode($e->getMessage()));
} finally {
    $conn->close();
}
?>