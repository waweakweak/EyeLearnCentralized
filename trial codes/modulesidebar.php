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
            width: 0; /* Change to 0 instead of 64px to completely hide */
            overflow: hidden; /* Hide the content when collapsed */
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
            margin-left: 0; /* Change to 0 instead of 64px to use full width */
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
            <a href="dashboard.php" class="text-gray-700 hover:text-primary flex items-center mr-2">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                <span class="hidden md:inline">Dashboard</span>
            </a>

            <!-- Notifications -->
            <button class="text-gray-500 hover:text-gray-700 p-2 relative">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                </svg>
                <span class="absolute top-0 right-0 h-2 w-2 rounded-full bg-red-500"></span>
            </button>
            
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
                <h2 class="text-xl font-bold text-gray-800">Web Development Basics</h2>
                <div class="mt-3 w-full bg-gray-200 rounded-full h-2">
                    <div class="bg-primary h-2 rounded-full" style="width: 100%"></div>
                </div>
                <p class="text-xs mt-1 text-gray-500 font-medium">100% COMPLETE</p>
            </div>

            <div class="module-content">
                <!-- Course design section -->
                <div class="module-section">
                    <div class="p-4 flex items-center justify-between text-gray-700 hover:bg-gray-50 cursor-pointer">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                            <span class="font-medium sidebar-text">Course design</span>
                        </div>
                        <span class="bg-primary text-white rounded-full p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </span>
                    </div>
                </div>

                <!-- Module 1 -->
                <div class="module-section">
                    <div class="bg-gray-100 p-4">
                        <button class="flex items-center justify-between w-full text-left">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                                <span class="font-medium text-sm text-gray-700 sidebar-text">MODULE 1: HOW DOES A COMPUTER WORK?</span>
                            </div>
                        </button>
                    </div>

                    <div class="module-lessons">
                        <div class="lesson-item flex items-center justify-between text-gray-600">
                            <span class="sidebar-text">About this module</span>
                            <span class="bg-primary text-white rounded-full p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                        </div>
                        <div class="lesson-item flex items-center justify-between text-gray-600">
                            <span class="sidebar-text">An overview of the basic computer functions</span>
                            <span class="bg-primary text-white rounded-full p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                        </div>
                        <div class="lesson-item flex items-center justify-between text-gray-600">
                            <span class="sidebar-text">The layers of computer architecture</span>
                            <span class="bg-primary text-white rounded-full p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                        </div>
                        <div class="lesson-item active flex items-center justify-between">
                            <span class="sidebar-text">Connecting computers and web development</span>
                            <span class="bg-primary text-white rounded-full p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                        </div>
                        <div class="lesson-item flex items-center justify-between text-gray-600">
                            <span class="sidebar-text">Quiz</span>
                            <span class="bg-primary text-white rounded-full p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Module 2 -->
                <div class="module-section">
                    <div class="bg-gray-100 p-4">
                        <button class="flex items-center justify-between w-full text-left">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                                <span class="font-medium text-sm text-gray-700 sidebar-text">MODULE 2: SPEAKING CODE</span>
                            </div>
                        </button>
                    </div>

                    <div class="module-lessons">
                        <div class="lesson-item flex items-center justify-between text-gray-600">
                            <span class="sidebar-text">About this module</span>
                            <span class="bg-primary text-white rounded-full p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                        </div>
                        <div class="lesson-item flex items-center justify-between text-gray-600">
                            <span class="sidebar-text">An introduction to abstraction</span>
                            <span class="bg-primary text-white rounded-full p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                        </div>
                        <div class="lesson-item flex items-center justify-between text-gray-600">
                            <span class="sidebar-text">Types of programming languages</span>
                            <span class="bg-primary text-white rounded-full p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                        </div>
                        <div class="lesson-item flex items-center justify-between text-gray-600">
                            <span class="sidebar-text">How does a computer read code?</span>
                            <span class="bg-primary text-white rounded-full p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Main Content Area -->
        <main id="main-content" class="main-content flex-1 p-6 md:p-8 transition-all duration-300 mt-16">
            <!-- Main content here -->
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Connecting Computers and Web Development</h2>
                    <div class="flex space-x-2">
                        <button class="px-4 py-2 bg-gray-100 text-gray-700 rounded hover:bg-gray-200 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                            Previous
                        </button>
                        <button class="px-4 py-2 bg-primary text-white rounded hover:bg-blue-600 flex items-center">
                            Next
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                
                <div class="prose max-w-none">
                    <p class="text-gray-600 mb-4">This lesson explores how computers communicate over networks and how this forms the foundation of web development.</p>
                    
                    <h3 class="text-xl font-semibold text-gray-800 mt-6 mb-3">Network Communication</h3>
                    <p class="text-gray-700">Computers communicate with each other through networks using standardized protocols. The most fundamental of these is the Internet Protocol (IP), which provides addressing mechanisms that allow data to be routed between devices.</p>
                    
                    <h3 class="text-xl font-semibold text-gray-800 mt-6 mb-3">The Client-Server Model</h3>
                    <p class="text-gray-700">Web development is built on the client-server model, where:</p>
                    <ul class="list-disc pl-6 mt-2 mb-4 text-gray-700">
                        <li>Clients (browsers) request resources</li>
                        <li>Servers process these requests and send back responses</li>
                        <li>Communication happens through HTTP/HTTPS protocols</li>
                    </ul>
                    
                    <div class="bg-gray-50 p-4 rounded-md border border-gray-200 my-6">
                        <h4 class="font-medium text-gray-800 mb-2">Key Concept: HTTP Requests</h4>
                        <p class="text-gray-700">HTTP requests include methods like GET, POST, PUT, and DELETE that define what action the client wants to perform on a resource.</p>
                    </div>
                </div>
                
                <!-- Interactive element -->
                <div class="mt-8 p-5 bg-blue-50 rounded-lg border border-blue-100">
                    <h3 class="text-lg font-medium text-blue-800 mb-3">Interactive Exercise</h3>
                    <p class="text-gray-700 mb-4">Try to match the following HTTP methods with their purposes:</p>
                    
                    <div class="space-y-2">
                        <!-- Simplified interactive element placeholder -->
                        <div class="flex items-center p-2 bg-white rounded border border-gray-200">
                            <span class="font-medium mr-2">GET</span>
                            <span class="text-gray-600">→</span>
                            <span class="ml-2">Retrieve data from server</span>
                        </div>
                        
                        <div class="flex items-center p-2 bg-white rounded border border-gray-200">
                            <span class="font-medium mr-2">POST</span>
                            <span class="text-gray-600">→</span>
                            <span class="ml-2">Submit data to be processed</span>
                        </div>
                    </div>
                </div>
            </div>
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
            
            // Update the hamburger icon to indicate sidebar state
            updateMenuIcon();
        }
    });
    
    // Function to update the hamburger icon based on sidebar state
    function updateMenuIcon() {
        const iconSvg = toggleSidebarBtn.querySelector('svg');
        
        if (sidebarVisible) {
            // Show hamburger icon when sidebar is visible
            iconSvg.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>`;
        } else {
            // Show a different icon when sidebar is hidden (menu icon)
            iconSvg.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>`;
            // Note: You could use a different icon here if you prefer
        }
    }
    
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
</script>
</body>
</html>