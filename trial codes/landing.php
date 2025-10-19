<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EyeLearn - Online Learning Platform</title>
    <link href="src/output.css" rel="stylesheet">
    <style>
        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 50;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }
        
        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 20px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }
        
        .sidenav a:hover {
            color: #f1f1f1;
        }
        
        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Side Navigation -->
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Login</a>
    </div>

    <!-- Main Content -->
    <div id="main">
        <!-- Navigation Bar -->
        <nav class="bg-blue-600 text-white shadow-lg">
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                            <span class="text-2xl font-bold">Eye<span class="text-yellow-300">Learn</span></span>
                        </div>
                        <!-- Desktop Navigation -->
                        <div class="hidden md:ml-6 md:flex md:items-center md:space-x-4">
                            <a href="#" class="px-3 py-2 rounded-md text-sm font-medium text-white hover:bg-blue-700">Home</a>
                            <a href="#" class="px-3 py-2 rounded-md text-sm font-medium text-white hover:bg-blue-700">About</a>
                            <a href="#" class="px-3 py-2 rounded-md text-sm font-medium text-white hover:bg-blue-700">Login</a>
                        </div>
                    </div>
                    <!-- Mobile menu button -->
                    <div class="md:hidden flex items-center">
                        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="relative bg-blue-500">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                    <div class="text-center md:text-left">
                        <h1 class="text-4xl tracking-tight font-extrabold text-white sm:text-5xl md:text-6xl">
                            Learning Made <span class="text-yellow-300">Visual</span>
                        </h1>
                        <p class="mt-3 text-lg text-white sm:mt-5 sm:text-xl lg:text-lg xl:text-xl">
                            Transform your learning experience with interactive courses, expert instructors, and a supportive community.
                        </p>
                        <div class="mt-8 flex flex-col sm:flex-row justify-center md:justify-start gap-3">
                            <a href="#" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-blue-700 bg-white hover:bg-gray-100">
                                Get Started
                            </a>
                            <a href="#" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-700 hover:bg-blue-800">
                                Explore Courses
                            </a>
                        </div>
                    </div>
                    <div class="mt-10 md:mt-0 flex justify-center">
                        <img class="h-64 w-auto" src="/api/placeholder/400/320" alt="Student learning online">
                    </div>
                </div>
            </div>
            <svg class="hidden lg:block absolute bottom-0 inset-x-0 text-white" viewBox="0 0 1160 111">
                <path fill="currentColor" d="M0,0 C173.33,111 336.67,111 500,0 C663.33,111 826.67,111 990,0 C1070,0 1130,0 1160,0 L1160,111 L0,111 L0,0 Z"></path>
            </svg>
        </div>

        <!-- Features Section -->
        <div class="py-12 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-base text-blue-600 font-semibold tracking-wide uppercase">Features</h2>
                    <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        Why Choose EyeLearn?
                    </p>
                </div>

                <div class="mt-10">
                    <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                        <div class="pt-6">
                            <div class="flow-root bg-gray-50 rounded-lg px-6 pb-8">
                                <div class="-mt-6">
                                    <div>
                                        <span class="inline-flex items-center justify-center p-3 bg-blue-500 rounded-md shadow-lg">
                                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </span>
                                    </div>
                                    <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">Interactive Content</h3>
                                    <p class="mt-5 text-base text-gray-500">
                                        Engage with dynamic content designed to enhance your understanding and retention.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="pt-6">
                            <div class="flow-root bg-gray-50 rounded-lg px-6 pb-8">
                                <div class="-mt-6">
                                    <div>
                                        <span class="inline-flex items-center justify-center p-3 bg-blue-500 rounded-md shadow-lg">
                                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </span>
                                    </div>
                                    <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">Learn at Your Pace</h3>
                                    <p class="mt-5 text-base text-gray-500">
                                        Access course materials anytime, anywhere. Learn on your schedule.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="pt-6">
                            <div class="flow-root bg-gray-50 rounded-lg px-6 pb-8">
                                <div class="-mt-6">
                                    <div>
                                        <span class="inline-flex items-center justify-center p-3 bg-blue-500 rounded-md shadow-lg">
                                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </span>
                                    </div>
                                    <h3 class="mt-8 text-lg font-medium text-gray-900 tracking-tight">Expert Instructors</h3>
                                    <p class="mt-5 text-base text-gray-500">
                                        Learn from industry professionals with real-world experience and insights.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Testimonials -->
        <div class="bg-gray-50 py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-base text-blue-600 font-semibold tracking-wide uppercase">Testimonials</h2>
                    <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        What Our Students Say
                    </p>
                </div>
                <div class="mt-10 grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <div class="flex items-center">
                            <img class="h-12 w-12 rounded-full" src="/api/placeholder/100/100" alt="User avatar">
                            <div class="ml-4">
                                <h4 class="text-lg font-bold text-gray-900">Sarah Johnson</h4>
                                <p class="text-gray-600">Software Developer</p>
                            </div>
                        </div>
                        <p class="mt-4 text-gray-500">"EyeLearn's interactive courses helped me advance my career in tech. The visual learning approach made complex concepts easy to understand."</p>
                    </div>
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <div class="flex items-center">
                            <img class="h-12 w-12 rounded-full" src="/api/placeholder/100/100" alt="User avatar">
                            <div class="ml-4">
                                <h4 class="text-lg font-bold text-gray-900">Michael Chen</h4>
                                <p class="text-gray-600">Data Scientist</p>
                            </div>
                        </div>
                        <p class="mt-4 text-gray-500">"The flexibility to learn at my own pace while having access to expert instructors was exactly what I needed to transition into data science."</p>
                    </div>
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <div class="flex items-center">
                            <img class="h-12 w-12 rounded-full" src="/api/placeholder/100/100" alt="User avatar">
                            <div class="ml-4">
                                <h4 class="text-lg font-bold text-gray-900">Lisa Rodriguez</h4>
                                <p class="text-gray-600">UX Designer</p>
                            </div>
                        </div>
                        <p class="mt-4 text-gray-500">"The community support and feedback from instructors helped me build a professional portfolio that landed me my dream job."</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="bg-blue-600">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8 lg:py-16">
                <div class="lg:grid lg:grid-cols-2 lg:gap-8 items-center">
                    <div>
                        <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                            Ready to transform your learning?
                        </h2>
                        <p class="mt-3 max-w-3xl text-lg text-blue-100">
                            Join thousands of students who are already advancing their careers with EyeLearn's innovative platform.
                        </p>
                        <div class="mt-8">
                            <div class="inline-flex rounded-md shadow">
                                <a href="#" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-blue-600 bg-white hover:bg-blue-50">
                                    Get started for free
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-8 lg:mt-0">
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                            <div class="px-6 py-8 sm:p-10">
                                <h3 class="text-2xl font-medium text-gray-900">Pro Membership</h3>
                                <div class="mt-4 flex items-baseline text-6xl font-extrabold text-gray-900">
                                    $15<span class="ml-1 text-2xl font-medium text-gray-500">/mo</span>
                                </div>
                                <p class="mt-5 text-lg text-gray-500">Everything you need to accelerate your learning</p>
                                <div class="mt-6">
                                    <ul class="space-y-4">
                                        <li class="flex items-start">
                                            <div class="flex-shrink-0">
                                                <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                            </div>
                                            <p class="ml-3 text-base text-gray-700">Unlimited access to all courses</p>
                                        </li>
                                        <li class="flex items-start">
                                            <div class="flex-shrink-0">
                                                <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                            </div>
                                            <p class="ml-3 text-base text-gray-700">1-on-1 mentoring sessions</p>
                                        </li>
                                        <li class="flex items-start">
                                            <div class="flex-shrink-0">
                                                <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                </svg>
                                            </div>
                                            <p class="ml-3 text-base text-gray-700">Certificate of completion</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="px-6 py-4 bg-gray-50 sm:p-6">
                                <a href="#" class="block w-full bg-blue-600 border border-transparent rounded-md py-3 px-4 text-center font-medium text-white hover:bg-blue-700">Start your free trial</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-gray-800">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <div class="md:col-span-1">
                        <span class="text-2xl font-bold text-white">Eye<span class="text-yellow-300">Learn</span></span>
                        <p class="mt-2 text-sm text-gray-300">
                            Transform your learning experience with our interactive platform.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Resources</h3>
                        <ul class="mt-4 space-y-4">
                            <li><a href="#" class="text-base text-gray-300 hover:text-white">Courses</a></li>
                            <li><a href="#" class="text-base text-gray-300 hover:text-white">Blog</a></li>
                            <li><a href="#" class="text-base text-gray-300 hover:text-white">Tutorials</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Company</h3>
                        <ul class="mt-4 space-y-4">
                            <li><a href="#" class="text-base text-gray-300 hover:text-white">About</a></li>
                            <li><a href="#" class="text-base text-gray-300 hover:text-white">Careers</a></li>
                            <li><a href="#" class="text-base text-gray-300 hover:text-white">Contact</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-400 uppercase tracking-wider">Legal</h3>
                        <ul class="mt-4 space-y-4">
                            <li><a href="#" class="text-base text-gray-300 hover:text-white">Privacy</a></li>
                            <li><a href="#" class="text-base text-gray-300 hover:text-white">Terms</a></li>
                            <li><a href="#" class="text-base text-gray-300 hover:text-white">Cookie Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="mt-8 border-t border-gray-700 pt-8 md:flex md:items-center md:justify-between">
                    <div class="flex space-x-6 md:order-2">
                        <a href="#" class="text-gray-400 hover:text-gray-300">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-300">
                            <span class="sr-only">Instagram</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-300">
                            <span class="sr-only">Twitter</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                            </svg>
                        </a>
                    </div>
                    <p class="mt-8 text-base text-gray-400 md:mt-0 md:order-1">
                        &copy; 2025 EyeLearn. All rights reserved.
                    </p>
                </div>
            </div>
        </footer>
    </div>

    <!-- JavaScript for Side Navigation -->
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }
        
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
</body>
</html>