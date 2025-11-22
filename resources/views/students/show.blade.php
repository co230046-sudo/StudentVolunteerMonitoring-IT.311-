<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details - {{ $student->full_name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap');
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #FAFAFA; 
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-dark': '#0E2461',
                        'primary-active': '#1D49C7',
                        'metric-green': '#0D9A70',
                        'metric-purple': '#B019C4',
                    },
                    backgroundImage:{
                        'nav-active': 'linear-gradient(to right, #0E2461, #1D49C7)'
                    }
                }
            }
        }
    </script>
</head>
<body class="min-h-screen flex">
    <aside class="w-20 hover:w-64 group flex-shrink-0 bg-white shadow-lg flex flex-col hidden lg:flex transition-all duration-300 ease-in-out overflow-hidden">
        <div class="mt-10 text-black p-4 flex items-center justify-center group-hover:justify-start">
            <div class="bg-white rounded-lg mr-3 flex items-center justify-center shrink-0">
            <svg width="40" height="40" viewBox="0 0 89 81" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="89" height="80.3592" rx="11" fill="url(#paint0_linear_32_135)"/>
                <path d="M22.466 24.1942V50.1165C22.466 51.4915 22.992 52.8102 23.9283 53.7825C24.8645 54.7547 26.1344 55.301 27.4585 55.301H62.4056C63.7297 55.301 64.9995 54.7547 65.9358 53.7825C66.8721 52.8102 67.3981 51.4915 67.3981 50.1165V29.3786C67.3981 28.0036 66.8721 26.6849 65.9358 25.7127C64.9995 24.7404 63.7297 24.1942 62.4056 24.1942H47.4283L42.4358 19.0097H27.4585C26.1344 19.0097 24.8645 19.5559 23.9283 20.5282C22.992 21.5005 22.466 22.8192 22.466 24.1942Z" stroke="white" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                <defs>
                <linearGradient id="paint0_linear_32_135" x1="0" y1="40.1796" x2="89" y2="40.1796" gradientUnits="userSpaceOnUse">
                    <stop offset="0.211538" stop-color="#0E2461"/>
                    <stop offset="01.826923" stop-color="#1D49C7"/>
                </linearGradient>
                </defs>
            </svg>
            </div>
            
            <div class="hidden opacity-0 group-hover:block group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
            <p class="text-xl font-bold leading-tight">Student Record</p>
            <p class="text-xl font-bold leading-tight">System</p>
            <p class="text-xs opacity-90 leading-tight mt-0.5">Ateneo de Zamboanga</p>
            <p class="text-xs opacity-90 leading-tight">University</p>
            </div>
        </div>

        <nav class="p-4 flex-grow w-full">
            <h3 class="text-m font-bold uppercase text-gray-500 mb-3 mt-2 hidden opacity-0 group-hover:block group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">MENU</h3>
            
            <ul class="space-y-1">
            
            <li>
                <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-md font-medium transition duration-150 gap-2 overflow-hidden">
                <svg class="shrink-0" width="18" height="18" viewBox="0 0 27 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.50002 12.5556L4.16668 10.0988M4.16668 10.0988L13.5 1.5L22.8333 10.0988M4.16668 10.0988V22.3827C4.16668 22.7085 4.30716 23.021 4.55721 23.2513C4.80726 23.4817 5.14639 23.6111 5.50002 23.6111H9.50002M22.8333 10.0988L25.5 12.5556M22.8333 10.0988V22.3827C22.8333 22.7085 22.6929 23.021 22.4428 23.2513C22.1928 23.4817 21.8536 23.6111 21.5 23.6111H17.5M9.50002 23.6111C9.85364 23.6111 10.1928 23.4817 10.4428 23.2513C10.6929 23.021 10.8333 22.7085 10.8333 22.3827V17.4691C10.8333 17.1433 10.9738 16.8309 11.2239 16.6005C11.4739 16.3702 11.8131 16.2407 12.1667 16.2407H14.8333C15.187 16.2407 15.5261 16.3702 15.7762 16.6005C16.0262 16.8309 16.1667 17.1433 16.1667 17.4691V22.3827C16.1667 22.7085 16.3072 23.021 16.5572 23.2513C16.8073 23.4817 17.1464 23.6111 17.5 23.6111M9.50002 23.6111H17.5" stroke="#292626" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                </svg> 
                <span class="hidden opacity-0 group-hover:block group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
                    Dashboard
                </span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('students.create') }}" class="flex items-center px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-md font-medium transition duration-150 gap-2 overflow-hidden">
                <svg class="shrink-0" width="18" height="18" viewBox="0 0 27 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21.5 8.87037V12.5556M21.5 12.5556V16.2407M21.5 12.5556H25.5M21.5 12.5556H17.5M14.8333 6.41358C14.8333 7.71674 14.2714 8.96653 13.2712 9.88801C12.271 10.8095 10.9145 11.3272 9.5 11.3272C8.08551 11.3272 6.72896 10.8095 5.72876 9.88801C4.72857 8.96653 4.16667 7.71674 4.16667 6.41358C4.16667 5.11042 4.72857 3.86063 5.72876 2.93915C6.72896 2.01768 8.08551 1.5 9.5 1.5C10.9145 1.5 12.271 2.01768 13.2712 2.93915C14.2714 3.86063 14.8333 5.11042 14.8333 6.41358ZM1.5 22.3827C1.5 20.428 2.34286 18.5533 3.84315 17.1711C5.34344 15.7889 7.37827 15.0123 9.5 15.0123C11.6217 15.0123 13.6566 15.7889 15.1569 17.1711C16.6571 18.5533 17.5 20.428 17.5 22.3827V23.6111H1.5V22.3827Z" stroke="#292626" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span class="hidden opacity-0 group-hover:block group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
                    Add Student
                </span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('students.index') }}" class="flex items-center px-3 py-2 text-white bg-nav-active rounded-md font-medium transition duration-150 gap-2 overflow-hidden">
                <svg class="shrink-0" width="18" height="18" viewBox="0 0 27 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.2667 3.1178C11.8347 0.960735 15.1653 0.960735 15.7333 3.1178C15.8186 3.44185 15.9856 3.74278 16.2209 3.9961C16.4563 4.24942 16.7532 4.44797 17.0875 4.57559C17.4219 4.70321 17.7842 4.75629 18.145 4.73052C18.5059 4.70474 18.855 4.60084 19.164 4.42727C21.2213 3.27257 23.5773 5.44192 22.324 7.33856C22.1359 7.62313 22.0233 7.94457 21.9954 8.27678C21.9674 8.60898 22.025 8.94256 22.1634 9.25041C22.3017 9.55826 22.517 9.83168 22.7916 10.0485C23.0663 10.2652 23.3926 10.4193 23.744 10.498C26.0853 11.0213 26.0853 14.0898 23.744 14.6131C23.3923 14.6916 23.0656 14.8456 22.7907 15.0624C22.5157 15.2792 22.3002 15.5527 22.1617 15.8607C22.0232 16.1688 21.9655 16.5026 21.9935 16.835C22.0215 17.1674 22.1343 17.4891 22.3227 17.7738C23.576 19.6692 21.2213 21.8398 19.1627 20.6851C18.8538 20.5117 18.5049 20.408 18.1443 20.3823C17.7837 20.3566 17.4216 20.4096 17.0875 20.5371C16.7533 20.6646 16.4566 20.8629 16.2213 21.1159C15.986 21.3689 15.8188 21.6696 15.7333 21.9933C15.1653 24.1504 11.8347 24.1504 11.2667 21.9933C11.1814 21.6693 11.0144 21.3683 10.7791 21.115C10.5437 20.8617 10.2468 20.6631 9.91246 20.5355C9.57811 20.4079 9.21578 20.3548 8.85495 20.3806C8.49413 20.4064 8.145 20.5103 7.836 20.6838C5.77867 21.8385 3.42267 19.6692 4.676 17.7725C4.86414 17.488 4.97673 17.1665 5.00465 16.8343C5.03256 16.5021 4.97499 16.1685 4.83663 15.8607C4.69827 15.5529 4.48301 15.2794 4.20836 15.0626C3.93371 14.8459 3.60742 14.6918 3.256 14.6131C0.914667 14.0898 0.914667 11.0213 3.256 10.498C3.60773 10.4195 3.93437 10.2656 4.20933 10.0488C4.48429 9.83196 4.69981 9.55841 4.83833 9.25037C4.97685 8.94234 5.03447 8.60852 5.00649 8.27609C4.97852 7.94366 4.86574 7.62202 4.67733 7.33733C3.424 5.44192 5.77867 3.27135 7.83733 4.42604C9.16533 5.1729 10.8987 4.51202 11.2667 3.1178Z" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M16.75 12.2101C16.75 13.0959 16.3681 13.9453 15.6883 14.5716C15.0084 15.198 14.0864 15.5498 13.125 15.5498C12.1636 15.5498 11.2416 15.198 10.5617 14.5716C9.88192 13.9453 9.5 13.0959 9.5 12.2101C9.5 11.3244 9.88192 10.4749 10.5617 9.8486C11.2416 9.22228 12.1636 8.87042 13.125 8.87042C14.0864 8.87042 15.0084 9.22228 15.6883 9.8486C16.3681 10.4749 16.75 11.3244 16.75 12.2101Z" stroke="white" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span class="hidden opacity-0 group-hover:block group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
                    Records
                </span>
                </a>
            </li>
            </ul>
        </nav>

        <div class="p-4 border-t border-gray-200 flex items-center justify-center group-hover:justify-between">
            <div class="flex items-center gap-2 w-full">
            <svg class="shrink-0" width="30" height="30" viewBox="0 0 52 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M51.8281 26.5192C51.8047 33.5268 49.0521 40.2372 44.1758 45.1741C39.2994 50.111 32.6988 52.8701 25.826 52.8444C18.9532 52.8187 12.3711 50.0103 7.52784 45.037C2.68456 40.0637 -0.023232 33.3329 0.000149624 26.3254C0.0235313 19.3178 2.77617 12.6074 7.65252 7.67051C12.5289 2.73358 19.1295 -0.0255132 26.0023 0.000196057C32.8751 0.0259053 39.4571 2.83431 44.3004 7.8076C49.1437 12.7809 51.8515 19.5117 51.8281 26.5192ZM32.4257 16.5382C32.4198 18.2901 31.7317 19.9677 30.5126 21.202C29.2935 22.4362 27.6434 23.126 25.9252 23.1195C24.2069 23.1131 22.5614 22.411 21.3506 21.1677C20.1398 19.9244 19.4629 18.2417 19.4687 16.4898C19.4745 14.7379 20.1627 13.0603 21.3818 11.8261C22.6009 10.5918 24.251 9.90206 25.9692 9.90848C27.6874 9.91491 29.3329 10.617 30.5438 11.8603C31.7546 13.1037 32.4315 14.7864 32.4257 16.5382ZM25.9031 29.7251C22.8019 29.7128 19.7626 30.6087 17.1465 32.3062C14.5304 34.0036 12.4475 36.4314 11.1454 39.3008C12.9608 41.4696 15.2147 43.2126 17.7525 44.4101C20.2903 45.6077 23.0519 46.2315 25.848 46.2389C28.6441 46.2525 31.4098 45.6493 33.9556 44.4708C36.5013 43.2922 38.7667 41.5662 40.5966 39.411C39.3136 36.5319 37.2469 34.0886 34.6423 32.3716C32.0376 30.6546 29.0044 29.736 25.9031 29.7251Z" fill="#00008B"/>
            </svg>
            
            <div class="hidden opacity-0 group-hover:block group-hover:opacity-100 transition-opacity duration-300 py-2 whitespace-nowrap">
                <p class="text-sm font-bold text-gray-800 leading-tight">David De Jesus</p>
                <p class="text-xs text-gray-500 leading-tight mt-0.5">Admin</p>
            </div>
            </div>
            
            <button class="text-red-500 hover:text-red-700 transition duration-150 shrink-0 hidden group-hover:block" aria-label="Logout">
            <svg width="35" height="35" viewBox="0 0 46 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="35" y="35" width="46" height="39" rx="6" transform="rotate(180 46 39)" fill="#00000"/>
                <path d="M24.9167 13L32.5833 19.5M32.5833 19.5L24.9167 26M32.5833 19.5H5.75M15.3333 13V11.375C15.3333 10.0821 15.9391 8.8421 17.0175 7.92786C18.0958 7.01362 19.5583 6.5 21.0833 6.5H34.5C36.025 6.5 37.4875 7.01362 38.5659 7.92786C39.6442 8.8421 40.25 10.0821 40.25 11.375V27.625C40.25 28.9179 39.6442 30.1579 38.5659 31.0721C37.4875 31.9864 36.025 32.5 34.5 32.5H21.0833C19.5583 32.5 18.0958 31.9864 17.0175 31.0721C15.9391 30.1579 15.3333 28.9179 15.3333 27.625V26" stroke="#D22424" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            </button>
        </div>
    </aside>

    <main class="flex-grow p-6 overflow-y-auto">
        <header class="mb-6 flex justify-between items-center">
            <div>
                <h1 class="text-4xl font-bold text-gray-900">Student Details</h1>
                <p class="text-gray-600 text-sm mt-1">Complete information for {{ $student->full_name }}</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('students.index') }}" class="text-gray-600 hover:text-gray-800 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Records
                </a>
                <a href="{{ route('students.edit', $student) }}" class="bg-primary-active text-white px-4 py-2 rounded-md hover:bg-primary-dark transition">
                    Edit Student
                </a>
            </div>
        </header>
        
        @if(session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Student Photo and Basic Info -->
            <div class="lg:col-span-1">
                <div class="bg-white p-6 rounded-2xl shadow-md">
                    <div class="text-center">
                        <div class="mx-auto h-32 w-32 rounded-full overflow-hidden bg-gray-200 mb-4">
                            @if($student->photo_path)
                                <img class="h-full w-full object-cover" src="{{ asset('storage/' . $student->photo_path) }}" alt="{{ $student->full_name }}">
                            @else
                                <div class="h-full w-full flex items-center justify-center text-2xl font-bold text-gray-500">
                                    {{ substr($student->first_name, 0, 1) }}{{ substr($student->last_name, 0, 1) }}
                                </div>
                            @endif
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ $student->full_name }}</h2>
                        <p class="text-lg text-gray-600 mb-1">{{ $student->course }}</p>
                        <p class="text-md text-gray-500 mb-4">{{ $student->year_level }}</p>
                        <div class="flex justify-center space-x-2 mb-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium 
                                @if($student->academic_status == 'Regular') bg-green-100 text-green-800
                                @elseif($student->academic_status == 'Probationary') bg-yellow-100 text-yellow-800
                                @else bg-red-100 text-red-800
                                @endif">
                                {{ $student->academic_status }}
                            </span>
                        </div>
                        <div class="border-t pt-4">
                            <dl class="text-sm">
                                <div class="flex justify-between py-1">
                                    <dt class="text-gray-500">Student ID</dt>
                                    <dd class="font-medium">{{ $student->student_id }}</dd>
                                </div>
                                <div class="flex justify-between py-1">
                                    <dt class="text-gray-500">Age</dt>
                                    <dd class="font-medium">{{ \Carbon\Carbon::parse($student->date_of_birth)->age }} years</dd>
                                </div>
                                <div class="flex justify-between py-1">
                                    <dt class="text-gray-500">Gender</dt>
                                    <dd class="font-medium">{{ $student->gender }}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Information -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Personal Information -->
                <div class="bg-white p-6 rounded-2xl shadow-md">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-primary-active" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Personal Information
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">First Name</label>
                            <p class="mt-1 text-gray-900">{{ $student->first_name }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Last Name</label>
                            <p class="mt-1 text-gray-900">{{ $student->last_name }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Date of Birth</label>
                            <p class="mt-1 text-gray-900">{{ $student->date_of_birth->format('F j, Y') }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nationality</label>
                            <p class="mt-1 text-gray-900">{{ $student->nationality }}</p>
                        </div>
                    </div>
                </div>

                <!-- Academic Information -->
                <div class="bg-white p-6 rounded-2xl shadow-md">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-primary-active" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                        Academic Information
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Course</label>
                            <p class="mt-1 text-gray-900">{{ $student->course }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Year Level</label>
                            <p class="mt-1 text-gray-900">{{ $student->year_level }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Academic Status</label>
                            <p class="mt-1 text-gray-900">{{ $student->academic_status }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Academic Advisor</label>
                            <p class="mt-1 text-gray-900">{{ $student->academic_advisor ?: 'Not assigned' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Start Date</label>
                            <p class="mt-1 text-gray-900">{{ $student->start_date->format('F j, Y') }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Expected Graduation</label>
                            <p class="mt-1 text-gray-900">{{ $student->expected_graduation_date ? $student->expected_graduation_date->format('F j, Y') : 'Not set' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="bg-white p-6 rounded-2xl shadow-md">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-primary-active" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Contact Information
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Email Address</label>
                            <p class="mt-1 text-gray-900">
                                <a href="mailto:{{ $student->email }}" class="text-primary-active hover:underline">{{ $student->email }}</a>
                            </p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                            <p class="mt-1 text-gray-900">
                                <a href="tel:{{ $student->phone }}" class="text-primary-active hover:underline">{{ $student->phone }}</a>
                            </p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Address</label>
                            <p class="mt-1 text-gray-900">{{ $student->address }}</p>
                        </div>
                    </div>
                </div>

                <!-- Emergency Contact Information -->
                <div class="bg-white p-6 rounded-2xl shadow-md">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.954-.833-2.724 0L4.088 15.5c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                        Emergency Contact
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Contact Name</label>
                            <p class="mt-1 text-gray-900">{{ $student->emergency_contact_name }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Contact Number</label>
                            <p class="mt-1 text-gray-900">
                                <a href="tel:{{ $student->emergency_contact_phone }}" class="text-red-500 hover:underline">{{ $student->emergency_contact_phone }}</a>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Timestamps -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-600">
                        <div>
                            <label class="block font-medium">Record Created</label>
                            <p>{{ $student->created_at->format('F j, Y \a\t g:i A') }}</p>
                        </div>
                        <div>
                            <label class="block font-medium">Last Updated</label>
                            <p>{{ $student->updated_at->format('F j, Y \a\t g:i A') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="mt-8 flex flex-col sm:flex-row gap-4">
            <a href="{{ route('students.edit', $student) }}" class="flex-1 bg-primary-active text-white text-center py-3 px-6 rounded-lg font-medium hover:bg-primary-dark transition">
                Edit Student Information
            </a>
            <button type="button" onclick="showDeleteConfirmation('{{ $student->id }}', '{{ $student->full_name }}')" class="flex-1 bg-red-500 text-white py-3 px-6 rounded-lg font-medium hover:bg-red-600 transition">
                Delete Student Record
            </button>
            <a href="{{ route('students.index') }}" class="flex-1 bg-gray-500 text-white text-center py-3 px-6 rounded-lg font-medium hover:bg-gray-600 transition">
                Back to All Records
            </a>
        </div>
    </main>

    <!-- Delete Student Confirmation Modal -->
    <div id="deleteConfirmationModal" class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center z-50 hidden">
        <div class="bg-white p-6 rounded-xl shadow-xl max-w-md w-full mx-4">
            <div class="flex items-center mb-4">
                <div class="flex-shrink-0">
                    <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.954-.833-2.724 0L4.088 15.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-lg font-medium text-gray-900">Delete Student Record</h3>
                    <p class="text-sm text-gray-500">Are you sure you want to delete <strong id="studentNameToDelete">{{ $student->full_name }}</strong>? This action cannot be undone.</p>
                </div>
            </div>
            <div class="flex justify-end space-x-3">
                <button type="button" onclick="hideDeleteConfirmation()" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 transition">Cancel</button>
                <button type="button" onclick="confirmDeleteStudent()" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition">Yes, Delete</button>
            </div>
        </div>
    </div>

    <!-- Hidden form for delete submission -->
    <form id="deleteForm" action="{{ route('students.destroy', $student) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <script>
        function showDeleteConfirmation(studentId, studentName) {
            document.getElementById('deleteConfirmationModal').classList.remove('hidden');
            document.getElementById('deleteConfirmationModal').classList.add('flex');
        }
        
        function hideDeleteConfirmation() {
            document.getElementById('deleteConfirmationModal').classList.add('hidden');
            document.getElementById('deleteConfirmationModal').classList.remove('flex');
        }
        
        function confirmDeleteStudent() {
            document.getElementById('deleteForm').submit();
        }
    </script>

</body>
</html>