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
       
        .event-day {
            background-color: #10b981;
            color: white;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 0.65rem;
            line-height: 1;
            font-weight: 500;
        }
        .main-blue { background-color: #0E2461; } 
        .primary-green { color: #0D9A70; } 
        .primary-purple { color: #B019C4; } 
        .calendar-cell {
            min-height: 60px;
            font-size: 0.75rem;
        }
        

        #calendar {
            max-height: 500px;
            font-family: 'Roboto', sans-serif;
            width: 100%;
            overflow: hidden;
        }
        
        .fc {
            border: none !important;
            width: 100% !important;
        }
        
        .fc .fc-view-harness {
            overflow: hidden !important;
        }
        
        .fc .fc-toolbar {
            padding: 0 0 12px 0 !important;
            margin-bottom: 8px !important;
            flex-wrap: wrap !important;
        }
        
        .fc .fc-toolbar-title {
            font-size: 1rem !important;
            font-weight: 600 !important;
            color: #1f2937 !important;
        }
        
        .fc .fc-button {
            background-color: white !important;
            border: 1px solid #d1d5db !important;
            color: #374151 !important;
            font-size: 0.75rem !important;
            font-weight: 500 !important;
            padding: 6px 12px !important;
            border-radius: 0.375rem !important;
            text-transform: lowercase !important;
            transition: all 0.15s !important;
            box-shadow: none !important;
        }
        
        .fc .fc-button:hover {
            background-color: #f9fafb !important;
        }
        
        .fc .fc-button:focus {
            box-shadow: none !important;
        }
        
        .fc .fc-button-active {
            background-color: #f3f4f6 !important;
            color: #111827 !important;
        }
        
        .fc .fc-col-header-cell {
            background-color: white !important;
            border-color: #e5e7eb !important;
            padding: 8px 4px !important;
        }
        
        .fc .fc-col-header-cell-cushion {
            color: #6b7280 !important;
            font-size: 0.75rem !important;
            font-weight: 600 !important;
            text-transform: uppercase !important;
        }
        
        .fc .fc-daygrid-day {
            border-color: #e5e7eb !important;
        }
        
        .fc .fc-daygrid-day-number {
            color: #1f2937 !important;
            font-size: 0.75rem !important;
            padding: 6px !important;
        }
        
        .fc .fc-daygrid-day.fc-day-other .fc-daygrid-day-number {
            color: #9ca3af !important;
        }
        
        .fc .fc-daygrid-day.fc-day-today {
            background-color: #eff6ff !important;
        }
        
        .fc .fc-daygrid-day.fc-day-today .fc-daygrid-day-number {
            color: #2563eb !important;
            font-weight: 600 !important;
        }
        
        .fc-event {
            background-color: #10b981 !important;
            border: none !important;
            border-radius: 4px !important;
            padding: 2px 6px !important;
            font-size: 0.65rem !important;
            font-weight: 500 !important;
            cursor: pointer !important;
            white-space: nowrap !important;
            overflow: hidden !important;
            text-overflow: ellipsis !important;
        }
        
        .fc-event:hover {
            background-color: #059669 !important;
        }
        
        .fc .fc-event-title {
            color: white !important;
        }
        
        .fc .fc-scroller {
            overflow: hidden !important;
        }
        
        .fc .fc-scroller-harness {
            overflow: hidden !important;
        }
        
        .fc .fc-daygrid-body {
            width: 100% !important;
        }
        
        .fc-daygrid-event-harness {
            margin: 2px 2px !important;
        }
        
        .fc table {
            width: 100% !important;
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
    <aside class="w-75 flex-shrink-0 bg-white shadow-lg flex flex-col hidden lg:flex">
        <div class="mt-10 text-black p-4 flex items-center">
            <div class="bg-white rounded-lg mr-3 flex items-center justify-center">
                <svg width="75" height="81" viewBox="0 0 89 81" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="89" height="80.3592" rx="11" fill="url(#paint0_linear_32_135)"/>
                    <path d="M22.466 24.1942V50.1165C22.466 51.4915 22.992 52.8102 23.9283 53.7825C24.8645 54.7547 26.1344 55.301 27.4585 55.301H62.4056C63.7297 55.301 64.9995 54.7547 65.9358 53.7825C66.8721 52.8102 67.3981 51.4915 67.3981 50.1165V29.3786C67.3981 28.0036 66.8721 26.6849 65.9358 25.7127C64.9995 24.7404 63.7297 24.1942 62.4056 24.1942H47.4283L42.4358 19.0097H27.4585C26.1344 19.0097 24.8645 19.5559 23.9283 20.5282C22.992 21.5005 22.466 22.8192 22.466 24.1942Z" stroke="white" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                    <defs>
                    <linearGradient id="paint0_linear_32_135" x1="0" y1="40.1796" x2="89" y2="40.1796" gradientUnits="userSpaceOnUse">
                    <stop offset="0.211538" stop-color="#0E2461"/>
                    <stop offset="0.826923" stop-color="#1D49C7"/>
                    </linearGradient>
                    </defs>
                </svg>
            </div>
            <div>
                <p class="text-xl font-bold leading-tight">Student Record</p>
                <p class="text-xl font-bold leading-tight">System</p>
                <p class="text-xs opacity-90 leading-tight mt-0.5">Ateneo de Zamboanga</p>
                <p class="text-xs opacity-90 leading-tight">University</p>
            </div>
        </div>

        <nav class="p-4 flex-grow">
            <h3 class="text-m font-bold uppercase text-gray-500 mb-3 mt-2">MENU</h3>
            <ul class="space-y-1">
                <li>
                    <a href="#" class="flex items-center px-3 py-2 text-white bg-nav-active rounded-md font-medium transition duration-150 gap-2">
                        <svg width="18" height="18" viewBox="0 0 27 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.50002 12.5556L4.16668 10.0988M4.16668 10.0988L13.5 1.5L22.8333 10.0988M4.16668 10.0988V22.3827C4.16668 22.7085 4.30716 23.021 4.55721 23.2513C4.80726 23.4817 5.14639 23.6111 5.50002 23.6111H9.50002M22.8333 10.0988L25.5 12.5556M22.8333 10.0988V22.3827C22.8333 22.7085 22.6929 23.021 22.4428 23.2513C22.1928 23.4817 21.8536 23.6111 21.5 23.6111H17.5M9.50002 23.6111C9.85364 23.6111 10.1928 23.4817 10.4428 23.2513C10.6929 23.021 10.8333 22.7085 10.8333 22.3827V17.4691C10.8333 17.1433 10.9738 16.8309 11.2239 16.6005C11.4739 16.3702 11.8131 16.2407 12.1667 16.2407H14.8333C15.187 16.2407 15.5261 16.3702 15.7762 16.6005C16.0262 16.8309 16.1667 17.1433 16.1667 17.4691V22.3827C16.1667 22.7085 16.3072 23.021 16.5572 23.2513C16.8073 23.4817 17.1464 23.6111 17.5 23.6111M9.50002 23.6111H17.5" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg> 
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('addStudent') }}" class="flex items-center px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-md font-medium transition duration-150 gap-2">
                        <svg width="18" height="18" viewBox="0 0 27 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21.5 8.87037V12.5556M21.5 12.5556V16.2407M21.5 12.5556H25.5M21.5 12.5556H17.5M14.8333 6.41358C14.8333 7.71674 14.2714 8.96653 13.2712 9.88801C12.271 10.8095 10.9145 11.3272 9.5 11.3272C8.08551 11.3272 6.72896 10.8095 5.72876 9.88801C4.72857 8.96653 4.16667 7.71674 4.16667 6.41358C4.16667 5.11042 4.72857 3.86063 5.72876 2.93915C6.72896 2.01768 8.08551 1.5 9.5 1.5C10.9145 1.5 12.271 2.01768 13.2712 2.93915C14.2714 3.86063 14.8333 5.11042 14.8333 6.41358ZM1.5 22.3827C1.5 20.428 2.34286 18.5533 3.84315 17.1711C5.34344 15.7889 7.37827 15.0123 9.5 15.0123C11.6217 15.0123 13.6566 15.7889 15.1569 17.1711C16.6571 18.5533 17.5 20.428 17.5 22.3827V23.6111H1.5V22.3827Z" stroke="#292626" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Add Student
                    </a>
                </li>
                <li>
                    <a href="{{ route('studentRecord') }}" class="flex items-center px-3 py-2 text-gray-700 hover:bg-gray-100 rounded-md font-medium transition duration-150 gap-2">
                        <svg width="18" height="18" viewBox="0 0 27 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.2667 3.1178C11.8347 0.960735 15.1653 0.960735 15.7333 3.1178C15.8186 3.44185 15.9856 3.74278 16.2209 3.9961C16.4563 4.24942 16.7532 4.44797 17.0875 4.57559C17.4219 4.70321 17.7842 4.75629 18.145 4.73052C18.5059 4.70474 18.855 4.60084 19.164 4.42727C21.2213 3.27257 23.5773 5.44192 22.324 7.33856C22.1359 7.62313 22.0233 7.94457 21.9954 8.27678C21.9674 8.60898 22.025 8.94256 22.1634 9.25041C22.3017 9.55826 22.517 9.83168 22.7916 10.0485C23.0663 10.2652 23.3926 10.4193 23.744 10.498C26.0853 11.0213 26.0853 14.0898 23.744 14.6131C23.3923 14.6916 23.0656 14.8456 22.7907 15.0624C22.5157 15.2792 22.3002 15.5527 22.1617 15.8607C22.0232 16.1688 21.9655 16.5026 21.9935 16.835C22.0215 17.1674 22.1343 17.4891 22.3227 17.7738C23.576 19.6692 21.2213 21.8398 19.1627 20.6851C18.8538 20.5117 18.5049 20.408 18.1443 20.3823C17.7837 20.3566 17.4216 20.4096 17.0875 20.5371C16.7533 20.6646 16.4566 20.8629 16.2213 21.1159C15.986 21.3689 15.8188 21.6696 15.7333 21.9933C15.1653 24.1504 11.8347 24.1504 11.2667 21.9933C11.1814 21.6693 11.0144 21.3683 10.7791 21.115C10.5437 20.8617 10.2468 20.6631 9.91246 20.5355C9.57811 20.4079 9.21578 20.3548 8.85495 20.3806C8.49413 20.4064 8.145 20.5103 7.836 20.6838C5.77867 21.8385 3.42267 19.6692 4.676 17.7725C4.86414 17.488 4.97673 17.1665 5.00465 16.8343C5.03256 16.5021 4.97499 16.1685 4.83663 15.8607C4.69827 15.5529 4.48301 15.2794 4.20836 15.0626C3.93371 14.8459 3.60742 14.6918 3.256 14.6131C0.914667 14.0898 0.914667 11.0213 3.256 10.498C3.60773 10.4195 3.93437 10.2656 4.20933 10.0488C4.48429 9.83196 4.69981 9.55841 4.83833 9.25037C4.97685 8.94234 5.03447 8.60852 5.00649 8.27609C4.97852 7.94366 4.86574 7.62202 4.67733 7.33733C3.424 5.44192 5.77867 3.27135 7.83733 4.42604C9.16533 5.1729 10.8987 4.51202 11.2667 3.1178Z" stroke="#292626" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M16.75 12.2101C16.75 13.0959 16.3681 13.9453 15.6883 14.5716C15.0084 15.198 14.0864 15.5498 13.125 15.5498C12.1636 15.5498 11.2416 15.198 10.5617 14.5716C9.88192 13.9453 9.5 13.0959 9.5 12.2101C9.5 11.3244 9.88192 10.4749 10.5617 9.8486C11.2416 9.22228 12.1636 8.87042 13.125 8.87042C14.0864 8.87042 15.0084 9.22228 15.6883 9.8486C16.3681 10.4749 16.75 11.3244 16.75 12.2101Z" stroke="#292626" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Records
                    </a>
                </li>
            </ul>
        </nav>

        <div class="p-4 border-t border-gray-200 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <svg width="30" height="30" viewBox="0 0 52 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M51.8281 26.5192C51.8047 33.5268 49.0521 40.2372 44.1758 45.1741C39.2994 50.111 32.6988 52.8701 25.826 52.8444C18.9532 52.8187 12.3711 50.0103 7.52784 45.037C2.68456 40.0637 -0.023232 33.3329 0.000149624 26.3254C0.0235313 19.3178 2.77617 12.6074 7.65252 7.67051C12.5289 2.73358 19.1295 -0.0255132 26.0023 0.000196057C32.8751 0.0259053 39.4571 2.83431 44.3004 7.8076C49.1437 12.7809 51.8515 19.5117 51.8281 26.5192ZM32.4257 16.5382C32.4198 18.2901 31.7317 19.9677 30.5126 21.202C29.2935 22.4362 27.6434 23.126 25.9252 23.1195C24.2069 23.1131 22.5614 22.411 21.3506 21.1677C20.1398 19.9244 19.4629 18.2417 19.4687 16.4898C19.4745 14.7379 20.1627 13.0603 21.3818 11.8261C22.6009 10.5918 24.251 9.90206 25.9692 9.90848C27.6874 9.91491 29.3329 10.617 30.5438 11.8603C31.7546 13.1037 32.4315 14.7864 32.4257 16.5382ZM25.9031 29.7251C22.8019 29.7128 19.7626 30.6087 17.1465 32.3062C14.5304 34.0036 12.4475 36.4314 11.1454 39.3008C12.9608 41.4696 15.2147 43.2126 17.7525 44.4101C20.2903 45.6077 23.0519 46.2315 25.848 46.2389C28.6441 46.2525 31.4098 45.6493 33.9556 44.4708C36.5013 43.2922 38.7667 41.5662 40.5966 39.411C39.3136 36.5319 37.2469 34.0886 34.6423 32.3716C32.0376 30.6546 29.0044 29.736 25.9031 29.7251Z" fill="#00008B"/>
                </svg>    
                <div>
                    <p class="text-sm font-bold text-gray-800 leading-tight">
                        {{ auth()->user()->full_name }}
                    </p>
                    <p class="text-xs text-gray-500 leading-tight mt-0.5">Admin</p>
                </div>

            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="text-red-500 hover:text-red-700 transition duration-150"
                    aria-label="Logout">
                    <svg width="35" height="35" viewBox="0 0 46 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="35" y="35" width="46" height="39" rx="6" transform="rotate(180 46 39)" fill="#00000"/>
                        <path d="M24.9167 13L32.5833 19.5M32.5833 19.5L24.9167 26M32.5833 19.5H5.75M15.3333 13V11.375C15.3333 10.0821 15.9391 8.8421 17.0175 7.92786C18.0958 7.01362 19.5583 6.5 21.0833 6.5H34.5C36.025 6.5 37.4875 7.01362 38.5659 7.92786C39.6442 8.8421 40.25 10.0821 40.25 11.375V27.625C40.25 28.9179 39.6442 30.1579 38.5659 31.0721C37.4875 31.9864 36.025 32.5 34.5 32.5H21.0833C19.5583 32.5 18.0958 31.9864 17.0175 31.0721C15.9391 30.1579 15.3333 28.9179 15.3333 27.625V26"
                            stroke="#D22424" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-grow p-6 overflow-y-auto">
        <header class="mb-6">
            <h1 class="text-4xl font-bold text-gray-900">Student Record Dashboard</h1>
            <p class="text-gray-600 text-sm mt-1">Student Record Management Overview</p>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
            <div class="bg-white p-5 rounded-lg shadow flex items-center justify-between">
                <div>
                    <p class="text-5xl font-bold primary-green">3,096</p>
                    <p class="text-base font-semibold text-gray-700 mt-1">Students</p>
                </div>
                <div class="w-13 h-13 flex items-center justify-center">
                    <svg width="125" height="125" viewBox="0 0 125 125" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M64.8282 21.3854C64.1053 21.0242 63.3082 20.8361 62.5 20.8361C61.6919 20.8361 60.8948 21.0242 60.1719 21.3854L14.4271 44.2552L62.448 67.1198L109.375 43.6563L64.8282 21.3854Z" fill="#63BFA3"/>
                        <path d="M26.0417 89.6979V61.3229L60.2604 77.6198C60.9753 77.9596 61.7582 78.132 62.5497 78.1238C63.3412 78.1157 64.1204 77.9273 64.8281 77.5729L98.9584 60.5104V89.6979C98.9584 91.1875 98.3177 92.6042 97.2083 93.5938L97.1927 93.6094L97.1719 93.625L97.1198 93.6771L97.0573 93.7292L96.9636 93.8021L96.4584 94.2084C96.0417 94.5417 95.4514 94.9653 94.6875 95.4792C92.5813 96.867 90.3616 98.0744 88.0521 99.0886C82.2448 101.667 73.7136 104.167 62.5 104.167C51.2865 104.167 42.7604 101.667 36.9479 99.0886C34.6384 98.0744 32.4188 96.867 30.3125 95.4792C29.473 94.9164 28.6613 94.3133 27.8802 93.6719L27.8281 93.625L27.8073 93.6042L27.7969 93.599L27.849 93.5365L27.7917 93.5938C27.2412 93.1049 26.8007 92.505 26.499 91.8335C26.1974 91.1619 26.0415 90.4341 26.0417 89.6979ZM10.4167 53.8854L20.8334 58.8438V88.5417C20.8334 89.923 20.2846 91.2478 19.3079 92.2245C18.3311 93.2013 17.0064 93.75 15.625 93.75C14.2437 93.75 12.9189 93.2013 11.9422 92.2245C10.9654 91.2478 10.4167 89.923 10.4167 88.5417V53.8854Z" fill="#63BFA3"/>
                    </svg>
                </div>
            </div>

            <div class="bg-white p-5 rounded-lg shadow flex items-center justify-between">
                <div>
                    <p class="text-5xl font-bold primary-purple">3,096</p>
                    <p class="text-base font-semibold text-gray-700 mt-1">Teachers</p>
                </div>
                <div class="w-13 h-13 flex items-center justify-center">
                    <svg width="108" height="91" viewBox="0 0 108 91" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M72 18.2C72 23.0269 70.1036 27.6562 66.7279 31.0693C63.3523 34.4825 58.7739 36.4 54 36.4C49.2261 36.4 44.6477 34.4825 41.2721 31.0693C37.8964 27.6562 36 23.0269 36 18.2C36 13.3731 37.8964 8.74382 41.2721 5.33066C44.6477 1.9175 49.2261 0 54 0C58.7739 0 63.3523 1.9175 66.7279 5.33066C70.1036 8.74382 72 13.3731 72 18.2ZM102 30.3333C102 33.5513 100.736 36.6375 98.4853 38.9129C96.2348 41.1883 93.1826 42.4667 90 42.4667C86.8174 42.4667 83.7652 41.1883 81.5147 38.9129C79.2643 36.6375 78 33.5513 78 30.3333C78 27.1154 79.2643 24.0292 81.5147 21.7538C83.7652 19.4783 86.8174 18.2 90 18.2C93.1826 18.2 96.2348 19.4783 98.4853 21.7538C100.736 24.0292 102 27.1154 102 30.3333ZM78 72.8C78 66.3641 75.4714 60.1918 70.9706 55.6409C66.4697 51.09 60.3652 48.5333 54 48.5333C47.6348 48.5333 41.5303 51.09 37.0294 55.6409C32.5286 60.1918 30 66.3641 30 72.8V91H78V72.8ZM30 30.3333C30 33.5513 28.7357 36.6375 26.4853 38.9129C24.2348 41.1883 21.1826 42.4667 18 42.4667C14.8174 42.4667 11.7652 41.1883 9.51472 38.9129C7.26428 36.6375 6 33.5513 6 30.3333C6 27.1154 7.26428 24.0292 9.51472 21.7538C11.7652 19.4783 14.8174 18.2 18 18.2C21.1826 18.2 24.2348 19.4783 26.4853 21.7538C28.7357 24.0292 30 27.1154 30 30.3333ZM90 91V72.8C90.0087 66.6319 88.4598 60.5637 85.5 55.1703C88.1601 54.482 90.9405 54.417 93.6292 54.9805C96.3178 55.5439 98.8437 56.7209 101.014 58.4215C103.185 60.1221 104.942 62.3014 106.153 64.7933C107.363 67.2851 107.995 70.0237 108 72.8V91H90ZM22.5 55.1703C19.5405 60.5638 17.9916 66.632 18 72.8V91H1.59432e-06V72.8C-0.00115481 70.0217 0.62678 67.28 1.83568 64.7851C3.04458 62.2901 4.80236 60.1081 6.9743 58.4063C9.14624 56.7045 11.6747 55.5281 14.3659 54.9671C17.057 54.4062 19.8395 54.4757 22.5 55.1703Z" fill="#E27EE4"/>
                    </svg>
                </div>
            </div>
            
            <div class="bg-white p-5 rounded-lg shadow">
                <p class="text-base font-bold text-gray-800 mb-3">Quick Shortcuts</p>
                <div class="space-y-2">
                    <button class="w-full flex items-center justify-center bg-blue-700 hover:bg-nav-active text-white font-semibold py-2.5 px-4 rounded-md transition duration-150">
                        <svg width="24" height="20" viewBox="0 0 32 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g filter="url(#filter0_d_35_423)">
                            <path d="M6.66663 16H25.3333M16 25.3333V6.66666" stroke="#FAFAFA" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                            <filter id="filter0_d_35_423" x="-4" y="0" width="40" height="40" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                            <feOffset dy="4"/>
                            <feGaussianBlur stdDeviation="2"/>
                            <feComposite in2="hardAlpha" operator="out"/>
                            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_35_423"/>
                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_35_423" result="shape"/>
                            </filter>
                            </defs>
                        </svg>
                        <a href="{{ route('addStudent') }}">
                        Add Student Record</a>
                    </button>
                    <button class="w-full flex items-center justify-center bg-blue-700 hover:bg-nav-active text-white font-semibold py-2.5 px-4 rounded-md transition duration-150 gap-2">
                        <svg width="15" height="20" viewBox="0 0 28 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 3.4C0 2.49826 0.358213 1.63346 0.995837 0.995837C1.63346 0.358213 2.49826 0 3.4 0H11.9L15.3 3.4H23.8C24.7017 3.4 25.5665 3.75821 26.2042 4.39584C26.8418 5.03346 27.2 5.89826 27.2 6.8V17C27.2 17.9017 26.8418 18.7665 26.2042 19.4042C25.5665 20.0418 24.7017 20.4 23.8 20.4H3.4C2.49826 20.4 1.63346 20.0418 0.995837 19.4042C0.358213 18.7665 0 17.9017 0 17V3.4Z" fill="white"/>
                        </svg>
                        <a href="{{ route('studentRecord') }}">
                        View Student Records</a>
                    </button>
                </div>
            </div>

            <div class="bg-white p-5 rounded-lg shadow col-span-1 lg:col-span-2">
                <p class="text-base font-bold text-gray-800 mb-3">School Calendar</p>
                <div id="calendar"></div>
            </div>
            <div class="bg-white p-5 rounded-lg shadow flex flex-col">
                <p class="text-base font-bold text-gray-800 mb-3">Male-Female Proportion</p>
                
                <div class="flex-grow flex items-center justify-center">
                    <canvas id="genderChart" class="max-w-[200px] max-h-[200px]"></canvas>
                </div>

                <div class="flex justify-center gap-8 mt-4">
                    <div class="flex items-center">
                        <span class="w-3 h-3 rounded-full bg-[#7BB7DC] mr-2"></span>
                        <div class="text-center">
                            <p class="text-sm font-bold text-gray-800" id="maleCount">45,414</p>
                            <p class="text-xs text-gray-500">Male</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <span class="w-3 h-3 rounded-full bg-[#E27EE4] mr-2"></span>
                        <div class="text-center">
                            <p class="text-sm font-bold text-gray-800" id="femaleCount">40,270</p>
                            <p class="text-xs text-gray-500">Female</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');
            
            if (!calendarEl) {
                console.error('Calendar element not found');
                return;
            }
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,dayGridWeek'
                },
                height: 'auto',
                contentHeight: 'auto',
                aspectRatio: 1.8,
                fixedWeekCount: false,
                dayMaxEvents: true,
                buttonText: {
                    today: 'today',
                    month: 'month',
                    week: 'week'
                },
                events: [
                    {
                        title: "All Souls' Day",
                        start: '2025-11-01',
                        color: '#10b981'
                    },
                    {
                        title: 'Reformation Day',
                        start: '2025-11-05',
                        color: '#10b981'
                    },
                    {
                        title: 'Admin Day',
                        start: '2025-11-18',
                        color: '#10b981'
                    },
                    {
                        title: 'X-Mas Day',
                        start: '2025-12-25',
                        color: '#10b981'
                    }
                ],
                eventClick: function(info) {
                    alert('Event: ' + info.event.title + '\nDate: ' + info.event.start.toLocaleDateString());
                }
            });
            
            calendar.render();
            console.log('FullCalendar initialized successfully');
            
        });
        document.addEventListener('DOMContentLoaded', function() {
            const canvas = document.getElementById('genderChart');
            
            if (!canvas) {
                console.error('Chart canvas element not found');
                return;
            }
            const ctx = canvas.getContext('2d');
            if (!ctx) {
                console.error('Could not get 2d context');
                return;
            }
            
            console.log('Initializing Chart.js pie chart...');
            const maleCount = 45414;
            const femaleCount = 40270;
            const genderChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Male', 'Female'],
                    datasets: [{
                        data: [maleCount, femaleCount],
                        backgroundColor: [
                            '#7BB7DC',
                            '#E27EE4'  
                        ],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            display: false 
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const label = context.label || '';
                                    const value = context.parsed || 0;
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const percentage = ((value / total) * 100).toFixed(1);
                                    return label + ': ' + value.toLocaleString() + ' (' + percentage + '%)';
                                }
                            }
                        }
                    }
                }
            });
            console.log('Chart.js pie chart rendered successfully'); 
        });
    </script>
</body>
</html>
    
   