<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Record Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/main.min.css' rel='stylesheet' />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js"></script>
        
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
    <aside class="w-20 hover:w-64 group flex-shrink-0 bg-white shadow-lg flex flex-col hidden lg:flex transition-all duration-300 ease-in-out **overflow-hidden**">
        <div class="mt-10 text-black p-4 flex items-center justify-center group-hover:justify-start">

    <!-- Smaller background + smaller icon -->
    <div class="bg-white rounded-lg mr-3 flex items-center justify-center shrink-0 p-2">
        <a href="{{ route('dashboard') }}" class="block cursor-pointer">
            <svg width="55" height="60" viewBox="0 0 89 81" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="89" height="80.3592" rx="11" fill="url(#paint0_linear_32_135)"/>
                <path d="M22.466 24.1942V50.1165C22.466 51.4915 22.992 52.8102 23.9283 53.7825C24.8645 54.7547 26.1344 55.301 27.4585 55.301H62.4056C63.7297 55.301 64.9995 54.7547 65.9358 53.7825C66.8721 52.8102 67.3981 51.4915 67.3981 50.1165V29.3786C67.3981 28.0036 66.8721 26.6849 65.9358 25.7127C64.9995 24.7404 63.7297 24.1942 62.4056 24.1942H47.4283L42.4358 19.0097H27.4585C26.1344 19.0097 24.8645 19.5559 23.9283 20.5282C22.992 21.5005 22.466 22.8192 22.466 24.1942Z"
                      stroke="white" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                <defs>
                    <linearGradient id="paint0_linear_32_135" x1="0" y1="40.1796" x2="89" y2="40.1796" gradientUnits="userSpaceOnUse">
                        <stop offset="0.211538" stop-color="#0E2461"/>
                        <stop offset="0.826923" stop-color="#1D49C7"/>
                    </linearGradient>
                </defs>
            </svg>
        </a>
    </div>

    <!-- Text (same as before) -->
    <div class="hidden opacity-0 group-hover:block group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
        <p class="text-xl font-bold leading-tight">Student Record</p>
        <p class="text-xl font-bold leading-tight">System</p>
        <p class="text-xs opacity-90 leading-tight mt-0.5">Ateneo de Zamboanga</p>
        <p class="text-xs opacity-90 leading-tight">University</p>
    </div>

</div>


        <nav class="p-4 flex-grow w-full">
            <h3 class="text-m font-bold uppercase text-gray-500 mb-3 mt-2 hidden opacity-0 group-hover:block group-hover:opacity-100 transition-opacity duration-300 **whitespace-nowrap**">MENU</h3>
            
            <ul class="space-y-1">
            
            <li>
                <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2 text-gray-700 rounded-md font-medium transition duration-150 gap-2 **overflow-hidden**">
                <svg class="shrink-0" width="18" height="18" viewBox="0 0 27 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.50002 12.5556L4.16668 10.0988M4.16668 10.0988L13.5 1.5L22.8333 10.0988M4.16668 10.0988V22.3827C4.16668 22.7085 4.30716 23.021 4.55721 23.2513C4.80726 23.4817 5.14639 23.6111 5.50002 23.6111H9.50002M22.8333 10.0988L25.5 12.5556M22.8333 10.0988V22.3827C22.8333 22.7085 22.6929 23.021 22.4428 23.2513C22.1928 23.4817 21.8536 23.6111 21.5 23.6111H17.5M9.50002 23.6111C9.85364 23.6111 10.1928 23.4817 10.4428 23.2513C10.6929 23.021 10.8333 22.7085 10.8333 22.3827V17.4691C10.8333 17.1433 10.9738 16.8309 11.2239 16.6005C11.4739 16.3702 11.8131 16.2407 12.1667 16.2407H14.8333C15.187 16.2407 15.5261 16.3702 15.7762 16.6005C16.0262 16.8309 16.1667 17.1433 16.1667 17.4691V22.3827C16.1667 22.7085 16.3072 23.021 16.5572 23.2513C16.8073 23.4817 17.1464 23.6111 17.5 23.6111M9.50002 23.6111H17.5" stroke="#292626" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                </svg> 
                <span class="hidden opacity-0 group-hover:block group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
                    Dashboard
                </span>
                </a>
            </li>
            
            <li>
                <a href="#" class="flex items-center px-3 py-2 text-white bg-nav-active rounded-md font-medium transition duration-150 gap-2 **overflow-hidden**">
                <svg class="shrink-0" width="18" height="18" viewBox="0 0 27 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21.5 8.87037V12.5556M21.5 12.5556V16.2407M21.5 12.5556H25.5M21.5 12.5556H17.5M14.8333 6.41358C14.8333 7.71674 14.2714 8.96653 13.2712 9.88801C12.271 10.8095 10.9145 11.3272 9.5 11.3272C8.08551 11.3272 6.72896 10.8095 5.72876 9.88801C4.72857 8.96653 4.16667 7.71674 4.16667 6.41358C4.16667 5.11042 4.72857 3.86063 5.72876 2.93915C6.72896 2.01768 8.08551 1.5 9.5 1.5C10.9145 1.5 12.271 2.01768 13.2712 2.93915C14.2714 3.86063 14.8333 5.11042 14.8333 6.41358ZM1.5 22.3827C1.5 20.428 2.34286 18.5533 3.84315 17.1711C5.34344 15.7889 7.37827 15.0123 9.5 15.0123C11.6217 15.0123 13.6566 15.7889 15.1569 17.1711C16.6571 18.5533 17.5 20.428 17.5 22.3827V23.6111H1.5V22.3827Z" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span class="hidden opacity-0 group-hover:block group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
                    Add Students
                </span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('studentRecord') }}" class="flex items-center px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-md font-medium transition duration-150 gap-2 **overflow-hidden**">
                <svg class="shrink-0" width="18" height="18" viewBox="0 0 27 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.2667 3.1178C11.8347 0.960735 15.1653 0.960735 15.7333 3.1178C15.8186 3.44185 15.9856 3.74278 16.2209 3.9961C16.4563 4.24942 16.7532 4.44797 17.0875 4.57559C17.4219 4.70321 17.7842 4.75629 18.145 4.73052C18.5059 4.70474 18.855 4.60084 19.164 4.42727C21.2213 3.27257 23.5773 5.44192 22.324 7.33856C22.1359 7.62313 22.0233 7.94457 21.9954 8.27678C21.9674 8.60898 22.025 8.94256 22.1634 9.25041C22.3017 9.55826 22.517 9.83168 22.7916 10.0485C23.0663 10.2652 23.3926 10.4193 23.744 10.498C26.0853 11.0213 26.0853 14.0898 23.744 14.6131C23.3923 14.6916 23.0656 14.8456 22.7907 15.0624C22.5157 15.2792 22.3002 15.5527 22.1617 15.8607C22.0232 16.1688 21.9655 16.5026 21.9935 16.835C22.0215 17.1674 22.1343 17.4891 22.3227 17.7738C23.576 19.6692 21.2213 21.8398 19.1627 20.6851C18.8538 20.5117 18.5049 20.408 18.1443 20.3823C17.7837 20.3566 17.4216 20.4096 17.0875 20.5371C16.7533 20.6646 16.4566 20.8629 16.2213 21.1159C15.986 21.3689 15.8188 21.6696 15.7333 21.9933C15.1653 24.1504 11.8347 24.1504 11.2667 21.9933C11.1814 21.6693 11.0144 21.3683 10.7791 21.115C10.5437 20.8617 10.2468 20.6631 9.91246 20.5355C9.57811 20.4079 9.21578 20.3548 8.85495 20.3806C8.49413 20.4064 8.145 20.5103 7.836 20.6838C5.77867 21.8385 3.42267 19.6692 4.676 17.7725C4.86414 17.488 4.97673 17.1665 5.00465 16.8343C5.03256 16.5021 4.97499 16.1685 4.83663 15.8607C4.69827 15.5529 4.48301 15.2794 4.20836 15.0626C3.93371 14.8459 3.60742 14.6918 3.256 14.6131C0.914667 14.0898 0.914667 11.0213 3.256 10.498C3.60773 10.4195 3.93437 10.2656 4.20933 10.0488C4.48429 9.83196 4.69981 9.55841 4.83833 9.25037C4.97685 8.94234 5.03447 8.60852 5.00649 8.27609C4.97852 7.94366 4.86574 7.62202 4.67733 7.33733C3.424 5.44192 5.77867 3.27135 7.83733 4.42604C9.16533 5.1729 10.8987 4.51202 11.2667 3.1178Z" stroke="#292626" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M16.75 12.2101C16.75 13.0959 16.3681 13.9453 15.6883 14.5716C15.0084 15.198 14.0864 15.5498 13.125 15.5498C12.1636 15.5498 11.2416 15.198 10.5617 14.5716C9.88192 13.9453 9.5 13.0959 9.5 12.2101C9.5 11.3244 9.88192 10.4749 10.5617 9.8486C11.2416 9.22228 12.1636 8.87042 13.125 8.87042C14.0864 8.87042 15.0084 9.22228 15.6883 9.8486C16.3681 10.4749 16.75 11.3244 16.75 12.2101Z" stroke="#292626" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span class="hidden opacity-0 group-hover:block group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap">
                    Records
                </span>
                </a>
            </li>
            </ul>
        </nav>

        <div class="p-4 border-t border-gray-200 flex items-center **justify-center** group-hover:justify-between">
            <div class="flex items-center gap-2 **w-full**">
            <svg class="shrink-0" width="30" height="30" viewBox="0 0 52 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M51.8281 26.5192C51.8047 33.5268 49.0521 40.2372 44.1758 45.1741C39.2994 50.111 32.6988 52.8701 25.826 52.8444C18.9532 52.8187 12.3711 50.0103 7.52784 45.037C2.68456 40.0637 -0.023232 33.3329 0.000149624 26.3254C0.0235313 19.3178 2.77617 12.6074 7.65252 7.67051C12.5289 2.73358 19.1295 -0.0255132 26.0023 0.000196057C32.8751 0.0259053 39.4571 2.83431 44.3004 7.8076C49.1437 12.7809 51.8515 19.5117 51.8281 26.5192ZM32.4257 16.5382C32.4198 18.2901 31.7317 19.9677 30.5126 21.202C29.2935 22.4362 27.6434 23.126 25.9252 23.1195C24.2069 23.1131 22.5614 22.411 21.3506 21.1677C20.1398 19.9244 19.4629 18.2417 19.4687 16.4898C19.4745 14.7379 20.1627 13.0603 21.3818 11.8261C22.6009 10.5918 24.251 9.90206 25.9692 9.90848C27.6874 9.91491 29.3329 10.617 30.5438 11.8603C31.7546 13.1037 32.4315 14.7864 32.4257 16.5382ZM25.9031 29.7251C22.8019 29.7128 19.7626 30.6087 17.1465 32.3062C14.5304 34.0036 12.4475 36.4314 11.1454 39.3008C12.9608 41.4696 15.2147 43.2126 17.7525 44.4101C20.2903 45.6077 23.0519 46.2315 25.848 46.2389C28.6441 46.2525 31.4098 45.6493 33.9556 44.4708C36.5013 43.2922 38.7667 41.5662 40.5966 39.411C39.3136 36.5319 37.2469 34.0886 34.6423 32.3716C32.0376 30.6546 29.0044 29.736 25.9031 29.7251Z" fill="#00008B"/>
            </svg>
            
            <div class="hidden opacity-0 group-hover:block group-hover:opacity-100 transition-opacity duration-300 py-2 whitespace-nowrap">
                <p class="text-sm font-bold text-gray-800 leading-tight">
                    {{ auth()->user()->full_name }}
                </p>
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
        <header class="mb-6">
            <h1 class="text-4xl font-bold text-gray-900">Add Student</h1>
            <p class="text-gray-600 text-sm mt-1">Complete the multi-step intake form.</p>
        </header>
        
        <div class="bg-white p-8 rounded-2xl shadow-md">
            <div class="flex items-center mb-6 space-x-4">
                <div>
                    <p class="text-xs uppercase tracking-wide text-gray-500">Step</p>
                    <p class="text-2xl font-semibold text-primary-dark"><span id="currentStepLabel">1</span> / 4</p>
                </div>
                <div class="flex-1">
                    <div class="h-2 rounded-full bg-gray-200">
                        <div id="progressBar" class="h-2 rounded-full bg-primary-active transition-all duration-300" style="width:25%"></div>
                    </div>
                </div>
            </div>

            <form id="multiStepForm" class="space-y-6">
                <section class="form-step block" data-step="1">
                    <div class="flex flex-col lg:flex-row gap-6">
                        <div class="flex flex-col items-center justify-center border-2 border-dashed border-gray-300 rounded-xl px-10 py-8 text-center bg-gray-50">
                            <div class="w-32 h-32 rounded-xl bg-white flex items-center justify-center text-gray-400 text-xs uppercase tracking-wide">Upload Photo</div>
                            <p class="mt-4 text-sm text-gray-500">Drag & drop or browse</p>
                            <input type="file" class="hidden" id="photoUpload" accept="image/*">
                            <button type="button" class="mt-3 text-primary-active text-sm font-medium" onclick="document.getElementById('photoUpload').click()">Choose File</button>
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl font-semibold text-gray-900 mb-4">Personal Information</h2>
                            <p class="text-sm text-gray-500 mb-6">Specify the student's personal information for record keeping.</p>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="text-sm font-medium text-gray-700">First Name</label>
                                    <input type="text" name="firstName" required class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-active focus:border-primary-active">
                                </div>
                                <div>
                                    <label class="text-sm font-medium text-gray-700">Last Name</label>
                                    <input type="text" name="lastName" required class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-active focus:border-primary-active">
                                </div>
                                <div>
                                    <label class="text-sm font-medium text-gray-700">Student ID</label>
                                    <input type="text" name="studentId" required class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-active focus:border-primary-active">
                                </div>
                                <div>
                                    <label class="text-sm font-medium text-gray-700">Gender</label>
                                    <select name="gender" required class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-active focus:border-primary-active">
                                        <option value="">Select gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Prefer not to say</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="text-sm font-medium text-gray-700">Date of Birth</label>
                                    <input type="date" name="dob" required class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-active focus:border-primary-active">
                                </div>
                                <div>
                                    <label class="text-sm font-medium text-gray-700">Nationality</label>
                                    <input type="text" name="nationality" required class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-active focus:border-primary-active">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="form-step hidden" data-step="2">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-2">Academic & Enrollment Information</h2>
                    <p class="text-sm text-gray-500 mb-6">Provide the student's academic background and enrollment details.</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="text-sm font-medium text-gray-700">Course / Department</label>
                            <select name="course" required class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-active focus:border-primary-active">
                                <option value="">Select course</option>
                                <option>BS Information Technology</option>
                                <option>BS Computer Science</option>
                                <option>BS Education</option>
                            </select>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-700">Academic Advisor</label>
                            <input type="text" name="advisor" class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-active focus:border-primary-active">
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-700">Year Level</label>
                            <select name="yearLevel" required class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-active focus:border-primary-active">
                                <option value="">Select year</option>
                                <option>1st Year</option>
                                <option>2nd Year</option>
                                <option>3rd Year</option>
                                <option>4th Year</option>
                            </select>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-700">Academic Status</label>
                            <select name="academicStatus" required class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-active focus:border-primary-active">
                                <option value="">Select status</option>
                                <option>Regular</option>
                                <option>Probationary</option>
                                <option>Leave of Absence</option>
                            </select>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-700">Start Date</label>
                            <input type="date" name="startDate" required class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-active focus:border-primary-active">
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-700">Expected Graduation Date</label>
                            <input type="date" name="expectedGrad" class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-active focus:border-primary-active">
                        </div>
                    </div>
                </section>

                <section class="form-step hidden" data-step="3">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-2">Contact Information</h2>
                    <p class="text-sm text-gray-500 mb-6">Maintain the student's contact information for announcements and notices.</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label class="text-sm font-medium text-gray-700">Email Address</label>
                            <input type="email" name="email" required class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-active focus:border-primary-active">
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-700">Phone Number</label>
                            <input type="tel" name="phone" required class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-active focus:border-primary-active">
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-700">Address</label>
                            <input type="text" name="address" required class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-active focus:border-primary-active">
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-700">Emergency Contact Name</label>
                            <input type="text" name="emergencyName" required class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-active focus:border-primary-active">
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-700">Emergency Contact Number</label>
                            <input type="tel" name="emergencyPhone" required class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-primary-active focus:border-primary-active">
                        </div>
                    </div>
                </section>

                <section class="form-step hidden" data-step="4">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-2">Review and Submit</h2>
                    <p class="text-sm text-gray-500 mb-6">Review the student's information before submitting.</p>
                    <div id="reviewContent" class="space-y-4">
                        <!-- Populated dynamically -->
                    </div>
                </section>

                <div class="flex flex-col md:flex-row justify-between gap-4 pt-4 border-t border-gray-100">
                    <button type="button" id="prevBtn" class="px-6 py-3 rounded-lg border border-gray-300 text-gray-700 font-medium hover:bg-gray-50 disabled:opacity-40 disabled:cursor-not-allowed">Previous</button>
                    <div class="flex gap-3">
                        <button type="button" id="cancelBtn" class="px-6 py-3 rounded-lg bg-gray-200 text-gray-800 font-semibold hover:bg-gray-300">Cancel</button>
                        <button type="button" id="nextBtn" class="px-6 py-3 rounded-lg bg-primary-active text-white font-semibold hover:bg-primary-dark transition">Save &amp; Next Section</button>
                        <button type="submit" id="submitBtn" class="hidden px-6 py-3 rounded-lg bg-primary-active text-white font-semibold hover:bg-primary-dark transition">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <script>
        const form = document.getElementById('multiStepForm');
        const formSteps = Array.from(document.querySelectorAll('.form-step'));
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const submitBtn = document.getElementById('submitBtn');
        const cancelBtn = document.getElementById('cancelBtn');
        const currentStepLabel = document.getElementById('currentStepLabel');
        const progressBar = document.getElementById('progressBar');
        const reviewContent = document.getElementById('reviewContent');
        const totalSteps = formSteps.length;
        let currentStep = 1;
        const formData = {};

        function updateProgress() {
            currentStepLabel.textContent = currentStep;
            progressBar.style.width = `${(currentStep / totalSteps) * 100}%`;
            prevBtn.disabled = currentStep === 1;
            nextBtn.classList.toggle('hidden', currentStep === totalSteps);
            submitBtn.classList.toggle('hidden', currentStep !== totalSteps);
        }

        function showStep(step) {
            formSteps.forEach(section => {
                section.classList.toggle('hidden', Number(section.dataset.step) !== step);
                section.classList.toggle('block', Number(section.dataset.step) === step);
            });
            updateProgress();
            if (step === totalSteps) {
                populateReview();
            }
        }

        function captureStepData(step) {
            const inputs = formSteps[step - 1].querySelectorAll('input, select');
            for (const input of inputs) {
                if (input.required && !input.value.trim()) {
                    input.focus();
                    input.classList.add('ring-2', 'ring-red-400');
                    setTimeout(() => input.classList.remove('ring-2', 'ring-red-400'), 1500);
                    return false;
                }
                formData[input.name] = input.value;
            }
            return true;
        }

        function populateReview() {
            const sections = [
                {
                    title: 'Personal Information',
                    fields: [
                        ['First Name', 'firstName'],
                        ['Last Name', 'lastName'],
                        ['Student ID', 'studentId'],
                        ['Gender', 'gender'],
                        ['Date of Birth', 'dob'],
                        ['Nationality', 'nationality']
                    ]
                },
                {
                    title: 'Academic & Enrollment',
                    fields: [
                        ['Course / Department', 'course'],
                        ['Academic Advisor', 'advisor'],
                        ['Year Level', 'yearLevel'],
                        ['Academic Status', 'academicStatus'],
                        ['Start Date', 'startDate'],
                        ['Expected Graduation Date', 'expectedGrad']
                    ]
                },
                {
                    title: 'Contact Information',
                    fields: [
                        ['Email Address', 'email'],
                        ['Phone Number', 'phone'],
                        ['Address', 'address'],
                        ['Emergency Contact', 'emergencyName'],
                        ['Emergency Phone', 'emergencyPhone']
                    ]
                }
            ];

            reviewContent.innerHTML = sections.map((section, idx) => `
                <div class="border border-gray-200 rounded-xl p-4">
                    <div class="flex items-center justify-between mb-3">
                        <div>
                            <p class="text-xs uppercase text-gray-500">Step ${idx + 1}</p>
                            <h3 class="text-lg font-semibold text-gray-900">${section.title}</h3>
                        </div>
                        <button type="button" data-edit-step="${idx + 1}" class="text-primary-active text-sm font-medium hover:underline">
                            Edit
                        </button>
                    </div>
                    <dl class="grid grid-cols-1 md:grid-cols-2 gap-3 text-sm text-gray-600">
                        ${section.fields.map(([label, key]) => `
                            <div>
                                <dt class="font-medium text-gray-700">${label}</dt>
                                <dd class="text-gray-900">${formData[key] || '—'}</dd>
                            </div>
                        `).join('')}
                    </dl>
                </div>
            `).join('');

            reviewContent.querySelectorAll('[data-edit-step]').forEach(button => {
                button.addEventListener('click', (event) => {
                    const step = Number(event.currentTarget.dataset.editStep);
                    currentStep = step;
                    showStep(currentStep);
                });
            });
        }

        nextBtn.addEventListener('click', () => {
            if (!captureStepData(currentStep)) return;
            if (currentStep < totalSteps) {
                currentStep += 1;
                showStep(currentStep);
            }
        });

        prevBtn.addEventListener('click', () => {
            if (currentStep > 1) {
                currentStep -= 1;
                showStep(currentStep);
            }
        });

        cancelBtn.addEventListener('click', () => {
            form.reset();
            Object.keys(formData).forEach(key => delete formData[key]);
            currentStep = 1;
            showStep(currentStep);
        });

        form.addEventListener('submit', (event) => {
            event.preventDefault();
            alert('Student record submitted!');
            form.reset();
            Object.keys(formData).forEach(key => delete formData[key]);
            currentStep = 1;
            showStep(currentStep);
        });

        showStep(currentStep);
    </script>

</body>
</html>
    