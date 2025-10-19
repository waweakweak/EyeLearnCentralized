<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../loginpage.php");
    exit;
}

$conn = new mysqli('localhost', 'root', '', 'elearn_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get all modules
$modules_result = $conn->query("SELECT id, title FROM modules ORDER BY created_at");

// Get selected module part ID from URL parameter or default to first available
$selected_part_id = isset($_GET['part_id']) ? intval($_GET['part_id']) : null;

// If no part_id is specified, try to get the first module part
if (!$selected_part_id) {
    $first_part = $conn->query("SELECT id FROM module_parts LIMIT 1");
    if ($first_part && $first_part->num_rows > 0) {
        $first_part_data = $first_part->fetch_assoc();
        $selected_part_id = $first_part_data['id'];
    }
}

// Get selected part content if a part is selected
$selected_part = null;
$quiz_questions = [];

if ($selected_part_id) {
    $part_result = $conn->query("SELECT mp.id, mp.module_id, m.title AS module_title, mp.title AS part_title, 
                                mp.content, mp.has_subquiz 
                                FROM module_parts mp 
                                JOIN modules m ON mp.module_id = m.id 
                                WHERE mp.id = $selected_part_id");
    
    if ($part_result && $part_result->num_rows > 0) {
        $selected_part = $part_result->fetch_assoc();
        
        // If this part has a sub-quiz, fetch the questions
        if ($selected_part['has_subquiz']) {
            $quiz_result = $conn->query("SELECT id, question_text, option1, option2, option3, option4, correct_answer 
                                        FROM quiz_questions 
                                        WHERE module_part_id = $selected_part_id");
            
            if ($quiz_result && $quiz_result->num_rows > 0) {
                while ($question = $quiz_result->fetch_assoc()) {
                    $quiz_questions[] = $question;
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EyeLearn - Module View</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/src/output.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#3B82F6',
                        'secondary': '#10B981',
                        'background': '#F9FAFB',
                        'ibm-blue': '#0f62fe'
                    }
                }
            }
        }
    </script>
    <style>
        /* Sidebar styling */
        .sidebar {
            width: 280px;
            background-color: white;
            transition: all 0.3s ease;
            border-right: 1px solid #e5e7eb;
            overflow-y: auto;
        }
        
        .sidebar-collapsed {
            width: 0;
            overflow: hidden;
        }
        
        /* Module sidebar specific */
        .module-item.active {
            background-color: #F0F7FF;
        }

        .module-completed .check-icon {
            color: #3B82F6;
        }

        .module-section {
            border-bottom: 1px solid #e5e7eb;
        }

        .lesson-item {
            padding: 0.75rem 1rem;
            padding-left: 2.5rem;
            transition: background-color 0.2s ease;
        }

        .lesson-item:hover {
            background-color: #F9FAFB;
        }

        .lesson-item.active {
            background-color: #F0F7FF;
            font-weight: 500;
        }
        
        /* Content area */
        .main-content {
            margin-left: 280px;
            transition: margin-left 0.3s ease;
        }
        
        .main-content-collapsed {
            margin-left: 0;
        }
        
        /* Profile dropdown */
        .profile-dropdown {
            display: none;
            position: absolute;
            right: 1rem;
            top: 4.5rem;
            width: 240px;
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            z-index: 50;
        }
        
        .profile-dropdown.show {
            display: block;
        }
        
        /* Quiz styling */
        .quiz-container {
            background-color: #f0f9ff;
            border-left: 4px solid #3B82F6;
            margin-top: 2rem;
        }
        
        .quiz-option {
            border: 1px solid #e5e7eb;
            transition: all 0.2s ease;
        }
        
        .quiz-option:hover {
            border-color: #3B82F6;
            background-color: #f0f7ff;
        }
        
        .quiz-option.selected {
            border-color: #3B82F6;
            background-color: #e0f2fe;
        }
        
        /* Responsive behavior */
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                z-index: 50;
                height: 100%;
                transform: translateX(-100%);
            }
            
            .sidebar.mobile-visible {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0 !important;
            }
            
            .backdrop {
                background-color: rgba(0, 0, 0, 0.5);
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                z-index: 40;
                display: none;
            }
            
            .backdrop.active {
                display: block;
            }
        }
    </style>
</head>
<body class="bg-background">
    <!-- Top Navigation Bar -->
    <nav class="fixed top-0 left-0 right-0 h-16 bg-white shadow-md z-30 flex items-center justify-between px-4">
        <!-- Left side - Menu toggle and title -->
        <div class="flex items-center">
            <button id="toggle-sidebar" class="text-gray-500 hover:text-gray-700 p-2 mr-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            <h1 class="text-xl font-bold text-primary">EyeLearn</h1>
        </div>
        
        <!-- Right side - Notifications and Profile -->
        <div class="flex items-center space-x-4">
            <!-- Back to Dashboard -->
            <a href="Sdashboard.php" class="text-gray-700 hover:text-primary flex items-center mr-2">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                <span class="hidden md:inline">Dashboard</span>
            </a>
            
            <!-- Profile dropdown -->
            <div class="profile-container relative">
                <button id="profile-toggle" class="flex items-center space-x-2 focus:outline-none">
                    <div class="bg-primary rounded-full w-8 h-8 flex items-center justify-center text-white font-medium text-sm">
                        US
                    </div>
                    <span class="hidden md:inline-block font-medium text-gray-700">User Student</span>
                </button>
                
                <!-- Dropdown menu -->
                <div id="profile-dropdown" class="profile-dropdown">
                    <div class="p-4 border-b">
                        <p class="font-medium text-gray-800">User Student</p>
                        <p class="text-sm text-gray-500">student@example.com</p>
                    </div>
                    <div class="p-2">
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded">Your Profile</a>
                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded">Settings</a>
                        <a href="logout.php" class="block px-4 py-2 text-red-600 hover:bg-red-50 rounded">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    
    <div class="flex min-h-screen pt-16">
        <!-- Mobile backdrop -->
        <div id="backdrop" class="backdrop"></div>
        
        <!-- Module Sidebar (Replacing the main navigation sidebar) -->
        <div id="sidebar" class="sidebar fixed left-0 top-16 h-full shadow-lg z-40 flex flex-col transition-all duration-300 ease-in-out">
            <div class="p-6 border-b border-gray-200">
                <h2 class="text-xl font-bold text-gray-800">Course Modules</h2>
                <div class="mt-3 w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-primary h-2 rounded-full" style="width: 60%"></div>
                </div>
                <p class="text-xs mt-1 text-gray-500 font-medium">60% COMPLETE</p>
            </div>

            <div class="module-content overflow-y-auto">
                <?php
                // Loop through all modules and display them with their parts
                if ($modules_result && $modules_result->num_rows > 0) {
                    $module_count = 0;
                    while ($module = $modules_result->fetch_assoc()) {
                        $module_count++;
                        $module_id = $module['id'];
                        
                        // Get all parts for this module
                        $parts_result = $conn->query("SELECT id, title, has_subquiz FROM module_parts WHERE module_id = $module_id ORDER BY created_at");
                        
                        // Only show the module if it has parts
                        if ($parts_result && $parts_result->num_rows > 0) {
                ?>
                <!-- Module Section -->
                <div class="module-section">
                    <div class="bg-gray-100 p-4">
                        <button class="flex items-center justify-between w-full text-left">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                                <span class="font-medium text-sm text-gray-700 sidebar-text">MODULE <?php echo $module_count; ?>: <?php echo htmlspecialchars(strtoupper($module['title'])); ?></span>
                            </div>
                        </button>
                    </div>

                    <div class="module-lessons">
                        <?php
                        // Loop through all parts for this module
                        while ($part = $parts_result->fetch_assoc()) {
                            $is_active = ($selected_part_id == $part['id']);
                            $has_subquiz = $part['has_subquiz'] ? true : false;
                        ?>
                        <a href="?part_id=<?php echo $part['id']; ?>" class="lesson-item flex items-center justify-between <?php echo $is_active ? 'active text-primary' : 'text-gray-600'; ?>">
                            <span class="sidebar-text"><?php echo htmlspecialchars($part['title']); ?></span>
                            <?php if ($is_active) { ?>
                            <span class="bg-primary text-white rounded-full p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                            <?php } ?>
                        </a>
                        <?php
                            // If this part has a quiz and is active, show the quiz link
                            if ($has_subquiz) {
                        ?>
                        <a href="?part_id=<?php echo $part['id']; ?>#quiz" class="lesson-item flex items-center justify-between text-gray-600">
                            <span class="sidebar-text pl-4">→ Quiz</span>
                        </a>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
        
        <!-- Main Content Area -->
        <main id="main-content" class="main-content flex-1 p-6 md:p-8 transition-all duration-300 mt-16">
            <?php if ($selected_part) { ?>
            <!-- Module part content -->
            <div class="max-w-4xl mx-auto">
                <!-- Module part header with navigation -->
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm text-blue-600 font-medium"><?php echo htmlspecialchars($selected_part['module_title']); ?></span>
                </div>
                
                <!-- Module part title -->
                <h1 class="text-3xl font-bold mb-8 text-gray-800"><?php echo htmlspecialchars($selected_part['part_title']); ?></h1>
                
                <!-- Module part content -->
                <div class="prose prose-blue max-w-none">
                    <?php echo $selected_part['content']; ?>
                </div>
                
                <!-- Quiz section if available -->
                <?php if ($selected_part['has_subquiz'] && !empty($quiz_questions)) { ?>
                <div id="quiz" class="quiz-container mt-12 p-6 rounded-lg">
                    <h2 class="text-xl font-bold mb-6 text-gray-800">Quiz: Test Your Knowledge</h2>
                    
                    <form id="quiz-form" class="space-y-6">
                        <?php foreach ($quiz_questions as $index => $question) { ?>
                        <div class="quiz-question" data-question-id="<?php echo $question['id']; ?>">
                            <h3 class="font-medium text-lg mb-3"><?php echo ($index + 1) . '. ' . htmlspecialchars($question['question_text']); ?></h3>
                            
                            <div class="space-y-2">
                                <?php for ($i = 1; $i <= 4; $i++) { ?>
                                <div class="quiz-option flex items-center p-3 rounded-md cursor-pointer" data-option="<?php echo $i; ?>">
                                    <input type="radio" id="q<?php echo $question['id']; ?>_opt<?php echo $i; ?>" 
                                           name="question_<?php echo $question['id']; ?>" 
                                           value="<?php echo $i; ?>" 
                                           class="mr-3 h-4 w-4 text-blue-600 focus:ring-blue-500">
                                    <label for="q<?php echo $question['id']; ?>_opt<?php echo $i; ?>" class="flex-1 cursor-pointer">
                                        <?php echo htmlspecialchars($question['option' . $i]); ?>
                                    </label>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        
                        <div class="mt-8">
                            <button type="button" id="submit-quiz" class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Submit Answers
                            </button>
                        </div>
                    </form>
                    
                    <!-- Quiz results will be displayed here -->
                    <div id="quiz-results" class="hidden mt-8 p-4 rounded-md border"></div>
                </div>
                <?php } ?>
                
                <!-- Navigation buttons -->
                <div class="flex justify-between items-center mt-12 pt-6 border-t border-gray-200">
                    <?php
                    // Get previous and next parts
                    if ($selected_part_id) {
                        $prev_part = $conn->query("SELECT id FROM module_parts WHERE id < $selected_part_id ORDER BY id DESC LIMIT 1");
                        $next_part = $conn->query("SELECT id FROM module_parts WHERE id > $selected_part_id ORDER BY id ASC LIMIT 1");
                        
                        $prev_id = ($prev_part && $prev_part->num_rows > 0) ? $prev_part->fetch_assoc()['id'] : null;
                        $next_id = ($next_part && $next_part->num_rows > 0) ? $next_part->fetch_assoc()['id'] : null;
                    ?>
                    
                    <div>
                        <?php if ($prev_id) { ?>
                        <a href="?part_id=<?php echo $prev_id; ?>" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 inline-flex items-center">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                            Previous
                        </a>
                        <?php } ?>
                    </div>
                    
                    <div>
                        <?php if ($next_id) { ?>
                        <a href="?part_id=<?php echo $next_id; ?>" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 inline-flex items-center">
                            Next
                            <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                        <?php } ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php } else { ?>
            <div class="flex flex-col items-center justify-center h-full text-center p-8">
                <svg class="w-16 h-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                <h2 class="text-xl font-bold text-gray-800 mb-2">No Module Content Selected</h2>
                <p class="text-gray-600 mb-4">Please select a module part from the sidebar to view content.</p>
            </div>
            <?php } ?>
        </main>
    </div>
    
    <script>
    // DOM Elements
    const toggleSidebarBtn = document.getElementById('toggle-sidebar');
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('main-content');
    const sidebarTexts = document.querySelectorAll('.sidebar-text');
    const backdrop = document.getElementById('backdrop');
    
    // Profile dropdown elements
    const profileToggle = document.getElementById('profile-toggle');
    const profileDropdown = document.getElementById('profile-dropdown');
    
    // Variable to track sidebar state
    let sidebarVisible = true;
    
    // Toggle profile dropdown on click
    profileToggle.addEventListener('click', function(e) {
        e.stopPropagation();
        profileDropdown.classList.toggle('show');
    });
    
    // Close dropdown when clicking elsewhere on the page
    document.addEventListener('click', function(e) {
        if (!profileToggle.contains(e.target) && !profileDropdown.contains(e.target)) {
            profileDropdown.classList.remove('show');
        }
    });
    
    // Toggle sidebar for both mobile and desktop
    toggleSidebarBtn.addEventListener('click', () => {
        if (window.innerWidth < 768) {
            // Mobile behavior
            sidebar.classList.toggle('mobile-visible');
            backdrop.classList.toggle('active');
        } else {
            // Desktop behavior - completely hide or show the sidebar
            sidebarVisible = !sidebarVisible;
            
            if (sidebarVisible) {
                // Show sidebar
                sidebar.classList.remove('sidebar-collapsed');
                mainContent.classList.remove('main-content-collapsed');
                
                // Wait a bit for the animation to start before showing text
                setTimeout(() => {
                    sidebarTexts.forEach(text => text.classList.remove('hidden'));
                }, 150);
            } else {
                // Hide sidebar
                sidebarTexts.forEach(text => text.classList.add('hidden'));
                sidebar.classList.add('sidebar-collapsed');
                mainContent.classList.add('main-content-collapsed');
            }
        }
    });
    
    // Close sidebar when clicking on backdrop (mobile only)
    backdrop.addEventListener('click', () => {
        sidebar.classList.remove('mobile-visible');
        backdrop.classList.remove('active');
    });
    
    // Handle window resize events
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768) {
            // Reset mobile-specific classes when returning to desktop
            sidebar.classList.remove('mobile-visible');
            backdrop.classList.remove('active');
            
            // Restore desktop sidebar state
            if (!sidebarVisible) {
                sidebar.classList.add('sidebar-collapsed');
                mainContent.classList.add('main-content-collapsed');
                sidebarTexts.forEach(text => text.classList.add('hidden'));
            }
        } else {
            // Reset desktop-specific classes when going to mobile
            sidebar.classList.remove('sidebar-collapsed');
            mainContent.classList.remove('main-content-collapsed');
            sidebarTexts.forEach(text => text.classList.remove('hidden'));
        }
    });
    
    // Expand/collapse module sections
    const moduleHeaders = document.querySelectorAll('.bg-gray-100 button');
    moduleHeaders.forEach(header => {
        header.addEventListener('click', () => {
            const parent = header.closest('.module-section');
            const lessons = parent.querySelector('.module-lessons');
            
            if (lessons.style.display === 'none') {
                lessons.style.display = 'block';
                // Change icon from + to -
                const icon = header.querySelector('svg');
                icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />`;
            } else {
                lessons.style.display = 'none';
                // Change icon from - to +
                const icon = header.querySelector('svg');
                icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />`;
            }
        });
    });
    
    // Quiz functionality
    if (document.getElementById('submit-quiz')) {
        const quizOptions = document.querySelectorAll('.quiz-option');
        const submitQuizBtn = document.getElementById('submit-quiz');
        const quizResults = document.getElementById('quiz-results');
        
        // Make entire option clickable, not just the radio button
        quizOptions.forEach(option => {
            option.addEventListener('click', () => {
                const radioInput = option.querySelector('input[type="radio"]');
                radioInput.checked = true;
                
                // Remove selected class from all options in the same question
                const questionDiv = option.closest('.quiz-question');
                const options = questionDiv.querySelectorAll('.quiz-option');
                options.forEach(opt => opt.classList.remove('selected'));
                
                // Add selected class to this option
                option.classList.add('selected');
            });
        });
        
        // Submit quiz button functionality
        submitQuizBtn.addEventListener('click', () => {
            const questions = document.querySelectorAll('.quiz-question');
            let correctAnswers = 0;
            let totalQuestions = questions.length;
            
            questions.forEach(question => {
                const questionId = question.dataset.questionId;
                const selectedOption = document.querySelector(`input[name="question_${questionId}"]:checked`);
                
                if (selectedOption) {
                    // In a real implementation, you would check against the correct answer from the server
                    // For now, we'll just use the value stored in the data attribute
                    const correctOption = <?php 
                        // Output JavaScript object with correct answers
                        $correctAnswers = [];
                        foreach ($quiz_questions as $q) {
                            $correctAnswers[$q['id']] = intval($q['correct_answer']);
                        }
                        echo json_encode($correctAnswers);
                    ?>;
                    
                    const selectedValue = parseInt(selectedOption.value);
                    if (selectedValue === correctOption[questionId]) {
                        correctAnswers++;
                        
                        // Highlight correct answer
                        const optionDiv = selectedOption.closest('.quiz-option');
                        optionDiv.classList.add('bg-green-100', 'border-green-500');
                    } else {
                        // Highlight incorrect answer
                        const optionDiv = selectedOption.closest('.quiz-option');
                        optionDiv.classList.add('bg-red-100', 'border-red-500');
                        
                        // Highlight the correct answer
                        const correctOptionDiv = question.querySelector(`.quiz-option[data-option="${correctOption[questionId]}"]`);
                        if (correctOptionDiv) {
                            correctOptionDiv.classList.add('bg-green-100', 'border-green-500');
                        }
                    }
                }
            });
            
            // Display results
            const percentageScore = Math.round((correctAnswers / totalQuestions) * 100);
            quizResults.innerHTML = `
                <div class="text-lg font-medium mb-2">Quiz Results</div>
                <p>You answered ${correctAnswers} out of ${totalQuestions} questions correctly.</p>
                <p class="font-bold mt-2">Score: ${percentageScore}%</p>
            `;
            
            // Add appropriate class based on score
            if (percentageScore >= 80) {
                quizResults.classList.add('bg-green-50', 'text-green-800', 'border-green-500');
            } else if (percentageScore >= 60) {
                quizResults.classList.add('bg-yellow-50', 'text-yellow-800', 'border-yellow-500');
            } else {
                quizResults.classList.add('bg-red-50', 'text-red-800', 'border-red-500');
            }
            
            quizResults.classList.remove('hidden');
            
            // Disable form after submission
            submitQuizBtn.disabled = true;
            submitQuizBtn.classList.add('opacity-50', 'cursor-not-allowed');
            
            // Disable all radio buttons
            const allRadios = document.querySelectorAll('input[type="radio"]');
            allRadios.forEach(radio => {
                radio.disabled = true;
            });
            
            // Remove clickable style from options
            quizOptions.forEach(option => {
                option.classList.remove('cursor-pointer');
                option.classList.add('cursor-default');
            });
        });
    }

    
</script>
</body>
</html>