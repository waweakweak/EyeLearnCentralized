<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] != 1 || $_SESSION['role'] !== 'admin') {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Unauthorized access']);
    exit;
}

if (!isset($_GET['part_id']) || !is_numeric($_GET['part_id'])) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Invalid module part ID']);
    exit;
}

$conn = new mysqli('localhost', 'root', '', 'elearn_db');
if ($conn->connect_error) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Database connection error']);
    exit;
}

$part_id = (int) $_GET['part_id'];

// Get sections for this module part
$sections_query = "SELECT id, subtitle, content, has_quiz FROM module_sections WHERE module_part_id = ? ORDER BY section_order";
$sections_stmt = $conn->prepare($sections_query);
$sections_stmt->bind_param("i", $part_id);
$sections_stmt->execute();
$sections_result = $sections_stmt->get_result();

$sections = [];
while ($section = $sections_result->fetch_assoc()) {
    // Get quiz questions for this section if it has a quiz
    $section['quiz_questions'] = [];
    if ($section['has_quiz']) {
        $questions_query = "SELECT id, question_text, option1, option2, option3, option4, correct_answer 
                           FROM section_quiz_questions 
                           WHERE section_id = ? 
                           ORDER BY question_order";
        $questions_stmt = $conn->prepare($questions_query);
        $questions_stmt->bind_param("i", $section['id']);
        $questions_stmt->execute();
        $questions_result = $questions_stmt->get_result();
        
        while ($question = $questions_result->fetch_assoc()) {
            $section['quiz_questions'][] = [
                'id' => $question['id'],
                'question_text' => $question['question_text'],
                'options' => [
                    $question['option1'],
                    $question['option2'],
                    $question['option3'],
                    $question['option4']
                ],
                'correct_answer' => $question['correct_answer']
            ];
        }
        $questions_stmt->close();
    }
    $sections[] = $section;
}

$sections_stmt->close();
$conn->close();

header('Content-Type: application/json');
echo json_encode($sections);
?>