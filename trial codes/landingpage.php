<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EyeLearn - Smart E-Learning Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary': '#4F46E5',
                        'secondary': '#10B981',
                        'accent': '#F97316',
                        'background': '#F9FAFB'
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-background">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div id="sidebar"
            class="w-72 bg-white shadow-lg fixed left-0 top-0 h-full transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out z-40">
            <div class="p-5 border-b flex items-center justify-between">
                <div class="flex items-center">
                    <i class="fas fa-eye text-primary text-2xl mr-2"></i>
                    <h1 class="text-2xl font-bold text-primary">EyeLearn</h1>
                </div>
                <button id="close-sidebar" class="md:hidden text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            <!-- User Profile -->
            <div class="p-5 border-b">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 rounded-full bg-primary flex items-center justify-center text-white">
                        <span class="text-lg font-semibold">JS</span>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-900">John Smith</p>
                        <p class="text-xs text-gray-500">Computer Science - Year 2</p>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="text-xs text-gray-500 uppercase font-semibold">Learning Progress</div>
                    <div class="mt-2 w-full bg-gray-200 rounded-full h-2.5">
                        <div class="bg-secondary h-2.5 rounded-full" style="width: 75%"></div>
                    </div>
                </div>
            </div>
            <nav class="mt-2">
                <ul>
                    <!-- Dashboard -->
                    <li class="px-3 py-1">
                        <a href="#"
                            class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-blue-50 hover:text-primary transition-colors duration-200"
                            id="dashboard-link">
                            <i class="fas fa-home w-5 mr-3 text-center"></i>
                            <span class="font-medium">Dashboard</span>
                        </a>
                    </li>

                    <!-- Modules -->
                    <li class="px-3 py-1">
                        <a href="#"
                            class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-blue-50 hover:text-primary transition-colors duration-200"
                            id="modules-link">
                            <i class="fas fa-book w-5 mr-3 text-center"></i>
                            <span class="font-medium">Modules</span>
                        </a>
                    </li>

                    <!-- Assessments -->
                    <li class="px-3 py-1">
                        <a href="#"
                            class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-blue-50 hover:text-primary transition-colors duration-200"
                            id="assessments-link">
                            <i class="fas fa-tasks w-5 mr-3 text-center"></i>
                            <span class="font-medium">Assessments</span>
                        </a>
                    </li>

                    <!-- Analytics -->
                    <li class="px-3 py-1">
                        <a href="#"
                            class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-blue-50 hover:text-primary transition-colors duration-200"
                            id="analytics-link">
                            <i class="fas fa-chart-line w-5 mr-3 text-center"></i>
                            <span class="font-medium">My Analytics</span>
                        </a>
                    </li>

                    <!-- Learning Path -->
                    <li class="px-3 py-1">
                        <a href="#"
                            class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-blue-50 hover:text-primary transition-colors duration-200"
                            id="path-link">
                            <i class="fas fa-road w-5 mr-3 text-center"></i>
                            <span class="font-medium">Learning Path</span>
                        </a>
                    </li>

                    <!-- Settings -->
                    <li class="px-3 py-1">
                        <a href="#"
                            class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-blue-50 hover:text-primary transition-colors duration-200"
                            id="settings-link">
                            <i class="fas fa-cog w-5 mr-3 text-center"></i>
                            <span class="font-medium">Settings</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="absolute bottom-0 left-0 right-0 p-4 border-t">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <i class="fas fa-eye-slash text-primary mr-2"></i>
                        <span class="text-sm font-medium">Eye Tracking:</span>
                    </div>
                    <div class="relative inline-block w-10 mr-2 align-middle select-none">
                        <input type="checkbox" name="toggle" id="tracking-toggle"
                            class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer" />
                        <label for="tracking-toggle"
                            class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Header -->
        <div class="md:hidden fixed top-0 left-0 right-0 bg-white shadow-md z-30 flex items-center justify-between p-4">
            <button id="mobile-menu-toggle" class="text-gray-700">
                <svg id="hamburger-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
            <div class="flex items-center">
                <i class="fas fa-eye text-primary text-xl mr-2"></i>
                <h1 class="text-xl font-bold text-primary">EyeLearn</h1>
            </div>
            <div class="relative">
                <button class="w-8 h-8">
                    <i class="fas fa-bell text-gray-600"></i>
                    <span class="absolute top-0 right-0 h-2 w-2 bg-accent rounded-full"></span>
                </button>
            </div>
        </div>

        <!-- Main Content -->
        <main class="flex-1 md:ml-72 pt-16 md:pt-0 min-h-screen">
            <div class="p-6">
                <!-- Welcome Section -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-2xl font-bold text-gray-800">Welcome back, John!</h2>
                        <div class="flex items-center bg-blue-50 text-primary px-3 py-1 rounded-full">
                            <i class="fas fa-eye mr-2"></i>
                            <span class="text-sm font-medium">Eye tracking active</span>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">Your personalized learning journey continues. Based on your eye
                        tracking data, we've tailored your content to optimize your comprehension.</p>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-500">Weekly Focus Score</p>
                                    <p class="text-2xl font-bold text-primary">87%</p>
                                </div>
                                <i class="fas fa-eye text-primary text-xl"></i>
                            </div>
                            <div class="mt-2">
                                <div class="text-xs text-green-600">▲ 5% from last week</div>
                            </div>
                        </div>
                        <div class="bg-green-50 p-4 rounded-lg">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-500">Comprehension Level</p>
                                    <p class="text-2xl font-bold text-secondary">Advanced</p>
                                </div>
                                <i class="fas fa-brain text-secondary text-xl"></i>
                            </div>
                            <div class="mt-2">
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-secondary h-2 rounded-full" style="width: 85%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-orange-50 p-4 rounded-lg">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-gray-500">Upcoming Deadlines</p>
                                    <p class="text-2xl font-bold text-accent">2</p>
                                </div>
                                <i class="fas fa-clock text-accent text-xl"></i>
                            </div>
                            <div class="mt-2">
                                <a href="#" class="text-xs text-accent underline">View all deadlines</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recommended Modules -->
                <div class="mb-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800">Personalized Recommendations</h3>
                        <div class="text-primary text-sm">Based on your learning patterns</div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- Module 1 -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <div class="relative h-40 bg-gray-200">
                                <img src="/api/placeholder/400/320" alt="Data Structures"
                                    class="w-full h-full object-cover" />
                                <div class="absolute top-2 right-2 bg-green-500 text-white px-2 py-1 rounded text-xs">
                                    Matches your learning style
                                </div>
                            </div>
                            <div class="p-4">
                                <h4 class="font-bold text-gray-800 mb-2">Advanced Data Structures</h4>
                                <p class="text-gray-600 text-sm mb-4">Learn how to implement and utilize complex data
                                    structures.</p>
                                <div class="flex items-center justify-between text-sm">
                                    <div class="flex items-center">
                                        <i class="fas fa-clock text-gray-400 mr-1"></i>
                                        <span>2.5 hours</span>
                                    </div>
                                    <div>
                                        <span
                                            class="bg-blue-100 text-primary px-2 py-1 rounded-full text-xs">Interactive</span>
                                    </div>
                                </div>
                                <button
                                    class="w-full mt-4 bg-primary text-white py-2 rounded-lg hover:bg-indigo-600 transition-colors">
                                    Continue Learning
                                </button>
                            </div>
                        </div>

                        <!-- Module 2 -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <div class="relative h-40 bg-gray-200">
                                <img src="/api/placeholder/400/320" alt="Algorithm Design"
                                    class="w-full h-full object-cover" />
                                <div class="absolute top-2 right-2 bg-orange-500 text-white px-2 py-1 rounded text-xs">
                                    High engagement potential
                                </div>
                            </div>
                            <div class="p-4">
                                <h4 class="font-bold text-gray-800 mb-2">Algorithm Design Fundamentals</h4>
                                <p class="text-gray-600 text-sm mb-4">Master the art of designing efficient algorithms.
                                </p>
                                <div class="flex items-center justify-between text-sm">
                                    <div class="flex items-center">
                                        <i class="fas fa-clock text-gray-400 mr-1"></i>
                                        <span>3 hours</span>
                                    </div>
                                    <div>
                                        <span class="bg-green-100 text-secondary px-2 py-1 rounded-full text-xs">Visual
                                            learning</span>
                                    </div>
                                </div>
                                <button
                                    class="w-full mt-4 bg-primary text-white py-2 rounded-lg hover:bg-indigo-600 transition-colors">
                                    Start Module
                                </button>
                            </div>
                        </div>

                        <!-- Module 3 -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <div class="relative h-40 bg-gray-200">
                                <img src="/api/placeholder/400/320" alt="Database Design"
                                    class="w-full h-full object-cover" />
                                <div class="absolute top-2 right-2 bg-blue-500 text-white px-2 py-1 rounded text-xs">
                                    Recommended for you
                                </div>
                            </div>
                            <div class="p-4">
                                <h4 class="font-bold text-gray-800 mb-2">Database Design Principles</h4>
                                <p class="text-gray-600 text-sm mb-4">Learn the fundamentals of relational database
                                    design.</p>
                                <div class="flex items-center justify-between text-sm">
                                    <div class="flex items-center">
                                        <i class="fas fa-clock text-gray-400 mr-1"></i>
                                        <span>2 hours</span>
                                    </div>
                                    <div>
                                        <span
                                            class="bg-purple-100 text-purple-600 px-2 py-1 rounded-full text-xs">Hands-on</span>
                                    </div>
                                </div>
                                <button
                                    class="w-full mt-4 bg-primary text-white py-2 rounded-lg hover:bg-indigo-600 transition-colors">
                                    Explore Module
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Eye-Tracking Analytics -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800">Your Learning Analytics</h3>
                        <a href="#" class="text-primary hover:underline text-sm">View detailed report</a>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <div class="mb-4">
                                <h4 class="font-medium text-gray-800 mb-2">Your Focus Pattern</h4>
                                <div class="h-48 bg-gray-100 rounded-lg flex items-center justify-center">
                                    <img src="/api/placeholder/400/320" alt="Focus heatmap"
                                        class="w-full h-full object-contain" />
                                </div>
                            </div>
                            <div class="bg-blue-50 p-4 rounded-lg">
                                <p class="text-gray-700 text-sm">
                                    <i class="fas fa-lightbulb text-primary mr-2"></i>
                                    Based on your eye movement data, you tend to focus better on visual content with
                                    interactive elements. We've adjusted your upcoming modules to match this learning
                                    style.
                                </p>
                            </div>
                        </div>
                        <div>
                            <div class="mb-2">
                                <h4 class="font-medium text-gray-800 mb-2">Comprehension Metrics</h4>
                                <div class="grid grid-cols-2 gap-3">
                                    <div class="bg-gray-50 p-3 rounded-lg">
                                        <div class="text-sm text-gray-500">Reading Speed</div>
                                        <div class="text-lg font-bold text-gray-800">240 wpm</div>
                                        <div class="text-xs text-green-600">Above average</div>
                                    </div>
                                    <div class="bg-gray-50 p-3 rounded-lg">
                                        <div class="text-sm text-gray-500">Retention Rate</div>
                                        <div class="text-lg font-bold text-gray-800">83%</div>
                                        <div class="text-xs text-green-600">▲ 7% improvement</div>
                                    </div>
                                    <div class="bg-gray-50 p-3 rounded-lg">
                                        <div class="text-sm text-gray-500">Re-read Pattern</div>
                                        <div class="text-lg font-bold text-gray-800">Low</div>
                                        <div class="text-xs text-green-600">Good comprehension</div>
                                    </div>
                                    <div class="bg-gray-50 p-3 rounded-lg">
                                        <div class="text-sm text-gray-500">Focus Duration</div>
                                        <div class="text-lg font-bold text-gray-800">18 min</div>
                                        <div class="text-xs text-orange-600">Consider breaks</div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <h4 class="font-medium text-gray-800 mb-2">Learning Insights</h4>
                                <ul class="space-y-2">
                                    <li class="flex items-start">
                                        <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                        <span class="text-sm text-gray-700">You perform best with visual diagrams and
                                            interactive exercises</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                        <span class="text-sm text-gray-700">Your comprehension increases 22% when
                                            content includes practical examples</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-exclamation-circle text-orange-500 mt-1 mr-2"></i>
                                        <span class="text-sm text-gray-700">Consider taking more breaks during extended
                                            study sessions</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Next Assessments -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Upcoming Assessments</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Assessment</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Due Date</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Estimated Time</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">Data Structures Quiz</div>
                                        <div class="text-sm text-gray-500">Module 3</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">April 25, 2025</div>
                                        <div class="text-sm text-gray-500">11:59 PM</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">30 minutes</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            Not Started
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <button class="text-primary hover:text-indigo-700">Start Now</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">Algorithm Analysis Assignment
                                        </div>
                                        <div class="text-sm text-gray-500">Module 2</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">April 28, 2025</div>
                                        <div class="text-sm text-gray-500">11:59 PM</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">2 hours</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            In Progress (30%)
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <button class="text-primary hover:text-indigo-700">Continue</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Eye tracking calibration modal (hidden by default) -->
    <div id="eye-tracking-modal"
        class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg p-6 max-w-md w-full">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-800">Calibrate Eye Tracking</h3>
                <button id="close-modal" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>
            <p class="text-gray-600 mb-4">Please look at each circle as it appears on the screen to calibrate the eye
                tracking system.</p>
            <div class="bg-gray-100 h-48 relative rounded-lg mb-4 flex items-center justify-center">
                <div class="text-gray-400">Eye tracking visualization area</div>
                <div id="calibration-point" class="absolute w-4 h-4 bg-primary rounded-full"
                    style="top: 50%; left: 50%"></div>
            </div>
            <div class="flex justify-between">
                <button id="cancel-calibration"
                    class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">Cancel</button>
                <button id="start-calibration"
                    class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-indigo-600">Start Calibration</button>
            </div>
        </div>
    </div>

    <script>
        // Mobile sidebar toggle
        const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
        const closeSidebarBtn = document.getElementById('close-sidebar');
        const sidebar = document.getElementById('sidebar');

        // Navigation links
        const dashboardLink = document.getElementById('dashboard-link');
        const modulesLink = document.getElementById('modules-link');
        const assessmentsLink = document.getElementById('assessments-link');
        const analyticsLink = document.getElementById('analytics-link');
        const pathLink = document.getElementById('path-link');
        const settingsLink = document.getElementById('settings-link');

        // Modal elements
        const eyeTrackingModal = document.getElementById('eye-tracking-modal');
        const closeModal = document.getElementById('close-modal');
        const startCalibration = document.getElementById('start-calibration');
        const cancelCalibration = document.getElementById('cancel-calibration');
        const calibrationPoint = document.getElementById('calibration-point');
        const trackingToggle = document.getElementById('tracking-toggle');

        // Function to handle active page styling
        function setActivePage(activeElement) {
            // Reset all links
            [dashboardLink, modulesLink, assessmentsLink, analyticsLink, pathLink, settingsLink].forEach(link => {
                link.classList.remove('bg-primary', 'text-white');
                link.classList.add('text-gray-700');
            });

            // Set active link
            activeElement.classList.remove('text-gray-700');
            activeElement.classList.add('bg-primary', 'text-white');
        }

        // Set dashboard as default active page
        setActivePage(dashboardLink);

        // Add click events for navigation
        dashboardLink.addEventListener('click', (e) => {
            e.preventDefault();
            setActivePage(dashboardLink);
            // On mobile, close sidebar after selection
            if (window.innerWidth < 768) {
                sidebar.classList.add('-translate-x-full');
            }
        });

        modulesLink.addEventListener('click', (e) => {
            e.preventDefault();
            setActivePage(modulesLink);
            // On mobile, close sidebar after selection
            if (window.innerWidth < 768) {
                sidebar.classList.add('-translate-x-full');
            }
        });

        assessmentsLink.addEventListener('click', (e) => {
            e.preventDefault();
            setActivePage(assessmentsLink);
            // On mobile, close sidebar after selection
            if (window.innerWidth < 768) {
                sidebar.classList.add('-translate-x-full');
            }
        });

        analyticsLink.addEventListener('click', (e) => {
            e.preventDefault();
            setActivePage(analyticsLink);
            // On mobile, close sidebar after selection
            if (window.innerWidth < 768) {
                sidebar.classList.add('-translate-x-full');
            }
        });

        pathLink.addEventListener('click', (e) => {
            e.preventDefault();
            setActivePage(pathLink);
            // On mobile, close sidebar after selection
            if (window.innerWidth < 768) {
                sidebar.classList.add('-translate-x-full');
            }
        });

        settingsLink.addEventListener('click', (e) => {
            e.preventDefault();
            setActivePage(settingsLink);
            // On mobile, close sidebar after selection
            if (window.innerWidth < 768) {
                sidebar.classList.add('-translate-x-full');
            }
        });

        // Mobile sidebar toggle functionality
        mobileMenuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });

        closeSidebarBtn.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
        });

        // Eye tracking toggle functionality
        trackingToggle.addEventListener('change', (e) => {
            if (e.target.checked) {
                eyeTrackingModal.classList.remove('hidden');
            }
        });

        // Modal functionality
        closeModal.addEventListener('click', () => {
            eyeTrackingModal.classList.add('hidden');
            trackingToggle.checked = false;
        });

        cancelCalibration.addEventListener('click', () => {
            eyeTrackingModal.classList.add('hidden');
            trackingToggle.checked = false;
        });

        // Calibration simulation
        startCalibration.addEventListener('click', () => {
            startCalibration.textContent = 'Calibrating...';
            startCalibration.disabled = true;

            // Simulate calibration points moving around the screen
            const positions = [
                { top: '20%', left: '20%' },
                { top: '20%', left: '80%' },
                { top: '80%', left: '20%' },
                { top: '80%', left: '80%' },
                { top: '50%', left: '50%' }
            ];

            let currentPosition = 0;

            function moveCalibrationPoint() {
                if (currentPosition < positions.length) {
                    calibrationPoint.style.top = positions[currentPosition].top;
                    calibrationPoint.style.left = positions[currentPosition].left;
                    currentPosition++;
                    setTimeout(moveCalibrationPoint, 1000);
                } else {
                    // Calibration complete
                    eyeTrackingModal.classList.add('hidden');
                    startCalibration.textContent = 'Start Calibration';
                    startCalibration.disabled = false;

                    // Show success message
                    setTimeout(() => {
                        alert('Eye tracking calibration completed successfully!');
                    }, 300);
                }
            }

            moveCalibrationPoint();
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', (e) => {
            if (window.innerWidth < 768 && !sidebar.contains(e.target)) {
                if (e.target !== mobileMenuToggle && !mobileMenuToggle.contains(e.target)) {
                    sidebar.classList.add('-translate-x-full');
                }
            }
        });

        // Responsive behavior - show/hide sidebar based on screen size
        function handleResponsive() {
            if (window.innerWidth >= 768) {
                sidebar.classList.remove('-translate-x-full');
            } else {
                sidebar.classList.add('-translate-x-full');
            }
        }

        window.addEventListener('resize', handleResponsive);
        handleResponsive(); // Initial check
    </script>
</body>

</html>