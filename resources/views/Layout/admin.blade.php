<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from dashhub-html.netlify.app/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 11 Oct 2024 12:16:46 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Premium Tailwind CSS Admin & Dashboard Template" />
    <meta name="author" content="Webonzer" />

    <!-- Site Tiltle -->
    <title>DashHub - Tailwind CSS Admin & Dashboard Template</title>

    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="{{ asset('assets/admin/assets/images/favicon.ico') }}">

    <!-- Style Css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/css/style.css') }}">

    <title>@yield('title')</title>

</head>

<body x-data="main" class="font-inter text-base antialiased font-medium relative vertical"
    :class="[$store.app.sidebar ? 'toggle-sidebar' : '', $store.app.fullscreen ? 'full' : '', $store.app.mode]">

    <!-- Start Layout -->
    <div class="bg-white dark:bg-dark text-dark dark:text-white">

        <!-- Start Menu Sidebar Olverlay -->
        <div x-cloak class="fixed inset-0 bg-dark/90 dark:bg-white/5 backdrop-blur-sm z-40 lg:hidden"
            :class="{ 'hidden': !$store.app.sidebar }" @click="$store.app.toggleSidebar()"></div>
        <!-- End Menu Sidebar Olverlay -->

        <!-- Start Main Content -->
        <div class="main-container flex mx-auto">
            <!-- Start Sidebar -->
            <nav
                class="sidebar fixed z-50 flex-none w-[226px] border-r-2 border-lightgray/[8%] dark:border-gray/20 transition-all duration-300">
                <div class="bg-white dark:bg-dark h-full">
                    <div class="p-3.5">
                        <a class='main-logo w-full' href='index.html'>
                            <img src="{{ asset('assets/admin/assets/images/logo-dark.svg') }}"
                                class="mx-auto dark-logo h-8 logo dark:hidden" alt="logo" />
                            <img src="{{ asset('assets/admin/assets/images/logo-light.svg') }}"
                                class="mx-auto light-logo h-8 logo hidden dark:block" alt="logo" />
                            <img src="{{ asset('assets/admin/assets/images/logo-icon.svg') }}"
                                class="logo-icon h-8 mx-auto hidden" alt="">
                        </a>
                    </div>
                    <div class="flex items-center gap-2.5 py-2.5 pe-2.5">
                        <div class="h-[2px] bg-lightgray/10 dark:bg-gray/50 block flex-1"></div>
                        <button type="button" class="shrink-0 btn-toggle hover:text-primary duration-300"
                            @click="$store.app.toggleSidebar()">
                            <svg class="w-3.5" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.2"
                                    d="M5.46133 6.00002L11.1623 12L12.4613 10.633L8.05922 6.00002L12.4613 1.36702L11.1623 0L5.46133 6.00002Z"
                                    fill="currentColor" />
                                <path d="M0 6.00002L5.70101 12L7 10.633L2.59782 6.00002L7 1.36702L5.70101 0L0 6.00002Z"
                                    fill="currentColor" />
                            </svg>
                        </button>
                    </div>
                    <div class="h-[calc(100vh-93px)] overflow-y-auto overflow-x-hidden space-y-16 px-4 pt-2 pb-4">
                        <ul class="relative flex flex-col gap-1 text-sm" x-data="{ activeMenu: 'dashboard' }">
                            <li class="menu nav-item">
                                <a href="javaScript:;" class="nav-link group items-center justify-between"
                                    :class="{ 'active': activeMenu === 'dashboard' }"
                                    @click="activeMenu === 'dashboard' ? activeMenu = null : activeMenu = 'dashboard'">
                                    <div class="flex items-center">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3"
                                                d="M10.8939 22H13.1061C16.5526 22 18.2759 22 19.451 20.9882C20.626 19.9764 20.8697 18.2827 21.3572 14.8952L21.6359 12.9579C22.0154 10.3208 22.2051 9.00229 21.6646 7.87495C21.1242 6.7476 19.9738 6.06234 17.6731 4.69182L17.6731 4.69181L16.2882 3.86687C14.199 2.62229 13.1543 2 12 2C10.8457 2 9.80104 2.62229 7.71175 3.86687L6.32691 4.69181L6.32691 4.69181C4.02619 6.06234 2.87583 6.7476 2.33537 7.87495C1.79491 9.00229 1.98463 10.3208 2.36407 12.9579L2.64284 14.8952C3.13025 18.2827 3.37396 19.9764 4.54903 20.9882C5.72409 22 7.44737 22 10.8939 22Z"
                                                fill="currentColor" />
                                            <path
                                                d="M9.44666 15.397C9.11389 15.1504 8.64418 15.2202 8.39752 15.5529C8.15086 15.8857 8.22067 16.3554 8.55343 16.6021C9.52585 17.3229 10.7151 17.7496 12 17.7496C13.285 17.7496 14.4742 17.3229 15.4467 16.6021C15.7794 16.3554 15.8492 15.8857 15.6026 15.5529C15.3559 15.2202 14.8862 15.1504 14.5534 15.397C13.8251 15.9369 12.9459 16.2496 12 16.2496C11.0541 16.2496 10.175 15.9369 9.44666 15.397Z"
                                                fill="currentColor" />
                                        </svg>
                                        <span class="pl-1.5">Dashboard</span>
                                    </div>
                                    <div class="w-4 h-4 flex items-center justify-center dropdown-icon"
                                        :class="{ '!rotate-180': activeMenu === 'dashboard' }">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6">
                                            <path
                                                d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </div>
                                </a>
                                <ul x-cloak x-show="activeMenu === 'dashboard'" x-collapse
                                    class="sub-menu flex flex-col gap-1">
                                    <li><a class='active' href='index.html'>Analysis</a></li>
                                    <li><a href='ecommerce.html'>eCommerce</a></li>
                                </ul>
                            </li>
                            <h2 class="pt-3.5 pb-2.5 text-gray text-xs">Apps</h2>
                            <li class="menu nav-item">
                                <a href="javaScript:;" class="nav-link group items-center justify-between"
                                    :class="{ 'active': activeMenu === 'social' }"
                                    @click="activeMenu === 'social' ? activeMenu = null : activeMenu = 'social'">
                                    <div class="flex items-center">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M18 14C18 18.4183 14.4183 22 10 22C8.76449 22 7.5944 21.7199 6.54976 21.2198C6.19071 21.0479 5.78393 20.9876 5.39939 21.0904L4.17335 21.4185C3.20701 21.677 2.32295 20.793 2.58151 19.8267L2.90955 18.6006C3.01245 18.2161 2.95209 17.8093 2.7802 17.4502C2.28008 16.4056 2 15.2355 2 14C2 9.58172 5.58172 6 10 6C14.4183 6 18 9.58172 18 14ZM6.5 15C7.05228 15 7.5 14.5523 7.5 14C7.5 13.4477 7.05228 13 6.5 13C5.94772 13 5.5 13.4477 5.5 14C5.5 14.5523 5.94772 15 6.5 15ZM10 15C10.5523 15 11 14.5523 11 14C11 13.4477 10.5523 13 10 13C9.44772 13 9 13.4477 9 14C9 14.5523 9.44772 15 10 15ZM13.5 15C14.0523 15 14.5 14.5523 14.5 14C14.5 13.4477 14.0523 13 13.5 13C12.9477 13 12.5 13.4477 12.5 14C12.5 14.5523 12.9477 15 13.5 15Z"
                                                fill="currentColor" />
                                            <path opacity="0.3"
                                                d="M17.9841 14.5084C18.092 14.4638 18.1985 14.4163 18.3033 14.3661C18.5951 14.2264 18.9256 14.1774 19.238 14.261L20.2342 14.5275C21.0193 14.7376 21.7376 14.0193 21.5275 13.2342L21.261 12.238C21.1774 11.9256 21.2264 11.595 21.3661 11.3033C21.7725 10.4545 22 9.50385 22 8.5C22 4.91015 19.0899 2 15.5 2C12.79 2 10.4673 3.6585 9.49158 6.0159C9.6597 6.00535 9.82924 6 10 6C14.4183 6 18 9.58172 18 14C18 14.1708 17.9947 14.3403 17.9841 14.5084Z"
                                                fill="currentColor" />
                                        </svg>
                                        <span class="pl-1.5">Social Apps</span>
                                    </div>
                                    <div class="w-4 h-4 flex items-center justify-center dropdown-icon"
                                        :class="{ '!rotate-180': activeMenu === 'social' }">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6">
                                            <path
                                                d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </div>
                                </a>
                                <ul x-cloak x-show="activeMenu === 'social'" x-collapse
                                    class="sub-menu flex flex-col gap-1">
                                    <li><a href='compose.html'>Compose</a></li>
                                    <li><a href='inbox.html'>Inbox</a></li>
                                    <li><a href='chat.html'>Chat</a></li>
                                </ul>
                            </li>
                            <li class="menu nav-item">
                                <a :class='{'active\' : activeMenu===\'contact\'}' class='nav-link group'
                                    href='contact.html'>
                                    <div class="flex items-center">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.2"
                                                d="M21 12C21.0013 13.2621 20.7365 14.5104 20.2228 15.6633C19.7091 16.8162 18.9581 17.8479 18.0188 18.6909C17.454 17.5801 16.5927 16.6472 15.5304 15.9958C14.4681 15.3443 13.2462 14.9996 12 15C12.7417 15 13.4667 14.78 14.0834 14.368C14.7001 13.9559 15.1807 13.3702 15.4646 12.685C15.7484 11.9998 15.8226 11.2458 15.6779 10.5184C15.5333 9.79094 15.1761 9.12276 14.6517 8.59831C14.1272 8.07387 13.459 7.71671 12.7316 7.57202C12.0042 7.42732 11.2502 7.50159 10.5649 7.78541C9.87972 8.06924 9.29405 8.54989 8.88199 9.16657C8.46994 9.78326 8.25 10.5083 8.25 11.25C8.25 12.2445 8.64509 13.1984 9.34835 13.9016C10.0516 14.6049 11.0054 15 12 15C10.7538 14.9996 9.5319 15.3443 8.46958 15.9958C7.40725 16.6472 6.54601 17.5801 5.98125 18.6909C4.86586 17.6876 4.01896 16.4215 3.51756 15.0075C3.01615 13.5936 2.87615 12.0767 3.11028 10.5949C3.34442 9.11308 3.94526 7.71329 4.85817 6.52281C5.77108 5.33234 6.9671 4.38896 8.33747 3.77845C9.70784 3.16794 11.2091 2.90968 12.7047 3.02714C14.2003 3.14461 15.6428 3.63408 16.9011 4.45103C18.1593 5.26799 19.1934 6.38653 19.9093 7.70492C20.6251 9.02332 21.0001 10.4998 21 12Z"
                                                fill="currentColor" />
                                            <path
                                                d="M12 2.25C10.0716 2.25 8.18657 2.82183 6.58319 3.89317C4.97982 4.96452 3.73013 6.48726 2.99218 8.26884C2.25422 10.0504 2.06114 12.0108 2.43735 13.9021C2.81355 15.7934 3.74215 17.5307 5.10571 18.8943C6.46928 20.2579 8.20656 21.1865 10.0979 21.5627C11.9892 21.9389 13.9496 21.7458 15.7312 21.0078C17.5127 20.2699 19.0355 19.0202 20.1068 17.4168C21.1782 15.8134 21.75 13.9284 21.75 12C21.7473 9.41498 20.7192 6.93661 18.8913 5.10872C17.0634 3.28084 14.585 2.25273 12 2.25ZM6.945 18.5156C7.48757 17.6671 8.23501 16.9688 9.11843 16.4851C10.0019 16.0013 10.9928 15.7478 12 15.7478C13.0072 15.7478 13.9982 16.0013 14.8816 16.4851C15.765 16.9688 16.5124 17.6671 17.055 18.5156C15.6097 19.6397 13.831 20.2499 12 20.2499C10.169 20.2499 8.39031 19.6397 6.945 18.5156ZM9 11.25C9 10.6567 9.17595 10.0766 9.5056 9.58329C9.83524 9.08994 10.3038 8.70542 10.852 8.47836C11.4001 8.2513 12.0033 8.19189 12.5853 8.30764C13.1672 8.4234 13.7018 8.70912 14.1213 9.12868C14.5409 9.54824 14.8266 10.0828 14.9424 10.6647C15.0581 11.2467 14.9987 11.8499 14.7716 12.398C14.5446 12.9462 14.1601 13.4148 13.6667 13.7444C13.1734 14.0741 12.5933 14.25 12 14.25C11.2044 14.25 10.4413 13.9339 9.87868 13.3713C9.31607 12.8087 9 12.0456 9 11.25ZM18.165 17.4759C17.3285 16.2638 16.1524 15.3261 14.7844 14.7806C15.5192 14.2019 16.0554 13.4085 16.3184 12.5108C16.5815 11.6132 16.5582 10.6559 16.252 9.77207C15.9457 8.88825 15.3716 8.12183 14.6096 7.5794C13.8475 7.03696 12.9354 6.74548 12 6.74548C11.0646 6.74548 10.1525 7.03696 9.39044 7.5794C8.62839 8.12183 8.05432 8.88825 7.74805 9.77207C7.44179 10.6559 7.41855 11.6132 7.68157 12.5108C7.94459 13.4085 8.4808 14.2019 9.21563 14.7806C7.84765 15.3261 6.67147 16.2638 5.835 17.4759C4.77804 16.2873 4.0872 14.8185 3.84567 13.2464C3.60415 11.6743 3.82224 10.0658 4.47368 8.61478C5.12512 7.16372 6.18213 5.93192 7.51745 5.06769C8.85276 4.20346 10.4094 3.74367 12 3.74367C13.5906 3.74367 15.1473 4.20346 16.4826 5.06769C17.8179 5.93192 18.8749 7.16372 19.5263 8.61478C20.1778 10.0658 20.3959 11.6743 20.1543 13.2464C19.9128 14.8185 19.222 16.2873 18.165 17.4759Z"
                                                fill="currentColor" />
                                        </svg>
                                        <span class="pl-1.5">Contacts</span>
                                    </div>
                                </a>
                            </li>
                            <h2 class="pt-3.5 pb-2.5 text-gray text-xs">More</h2>
                            <li class="menu nav-item">
                                <a href="javaScript:;" class="nav-link group items-center justify-between"
                                    :class="{ 'active': activeMenu === 'tabels' }"
                                    @click="activeMenu === 'tabels' ? activeMenu = null : activeMenu = 'tabels'">
                                    <div class="flex items-center">
                                        <svg width="24" height="24" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.2"
                                                d="M17.5001 2.5C17.9603 2.5 18.3334 2.8731 18.3334 3.33333V16.6667C18.3334 17.1269 17.9603 17.5 17.5001 17.5H2.50008C2.03985 17.5 1.66675 17.1269 1.66675 16.6667V3.33333C1.66675 2.8731 2.03985 2.5 2.50008 2.5H17.5001Z"
                                                fill="currentColor" />
                                            <path
                                                d="M17.5001 2.5C17.9603 2.5 18.3334 2.8731 18.3334 3.33333V16.6667C18.3334 17.1269 17.9603 17.5 17.5001 17.5H2.50008C2.03985 17.5 1.66675 17.1269 1.66675 16.6667V3.33333C1.66675 2.8731 2.03985 2.5 2.50008 2.5H17.5001ZM16.6667 13.3333H3.33341V15.8333H16.6667V13.3333ZM6.66675 4.16667H3.33341V11.6667H6.66675V4.16667ZM11.6667 4.16667H8.33341V11.6667H11.6667V4.16667ZM16.6667 4.16667H13.3334V11.6667H16.6667V4.16667Z"
                                                fill="currentColor" />
                                        </svg>
                                        <span class="pl-1.5">Tables</span>
                                    </div>
                                    <div class="w-4 h-4 flex items-center justify-center dropdown-icon"
                                        :class="{ '!rotate-180': activeMenu === 'tabels' }">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6">
                                            <path
                                                d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </div>
                                </a>
                                <ul x-cloak x-show="activeMenu === 'tabels'" x-collapse
                                    class="sub-menu flex flex-col gap-1">
                                    <li><a href='#'>Product Table</a></li>
                                    <li><a href='{{ route('suppliers.index') }}'>Supplier Table</a></li>
                                    <li><a href='#'>Category Table</a></li>
                                    <li><a href='{{ route('promotions.index') }}'>Promotion Table</a></li>
                                </ul>
                            </li>
                            <li class="menu nav-item">
                                <a href="javaScript:;" class="nav-link group items-center justify-between"
                                    :class="{ 'active': activeMenu === 'userprofile' }"
                                    @click="activeMenu === 'userprofile' ? activeMenu = null : activeMenu = 'userprofile'">
                                    <div class="flex items-center">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle opacity="0.3" cx="12" cy="6" r="4"
                                                fill="currentColor" />
                                            <ellipse cx="12" cy="17" rx="7" ry="4"
                                                fill="currentColor" />
                                        </svg>
                                        <span class="pl-1.5">User Profile</span>
                                    </div>
                                    <div class="w-4 h-4 flex items-center justify-center dropdown-icon"
                                        :class="{ '!rotate-180': activeMenu === 'userprofile' }">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6">
                                            <path
                                                d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </div>
                                </a>
                                <ul x-cloak x-show="activeMenu === 'userprofile'" x-collapse
                                    class="sub-menu flex flex-col gap-1">
                                    <li><a href='settings.html'>Profile Setting</a></li>
                                </ul>
                            </li>
                            <li class="menu nav-item">
                                <a href="javaScript:;" class="nav-link group items-center justify-between"
                                    :class="{ 'active': activeMenu === 'pages' }"
                                    @click="activeMenu === 'pages' ? activeMenu = null : activeMenu = 'pages'">
                                    <div class="flex items-center">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3"
                                                d="M3 10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H13C16.7712 2 18.6569 2 19.8284 3.17157C21 4.34315 21 6.22876 21 10V14C21 17.7712 21 19.6569 19.8284 20.8284C18.6569 22 16.7712 22 13 22H11C7.22876 22 5.34315 22 4.17157 20.8284C3 19.6569 3 17.7712 3 14V10Z"
                                                fill="currentColor" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7.25 12C7.25 11.5858 7.58579 11.25 8 11.25H16C16.4142 11.25 16.75 11.5858 16.75 12C16.75 12.4142 16.4142 12.75 16 12.75H8C7.58579 12.75 7.25 12.4142 7.25 12Z"
                                                fill="currentColor" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7.25 8C7.25 7.58579 7.58579 7.25 8 7.25H16C16.4142 7.25 16.75 7.58579 16.75 8C16.75 8.41421 16.4142 8.75 16 8.75H8C7.58579 8.75 7.25 8.41421 7.25 8Z"
                                                fill="currentColor" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7.25 16C7.25 15.5858 7.58579 15.25 8 15.25H13C13.4142 15.25 13.75 15.5858 13.75 16C13.75 16.4142 13.4142 16.75 13 16.75H8C7.58579 16.75 7.25 16.4142 7.25 16Z"
                                                fill="currentColor" />
                                        </svg>
                                        <span class="pl-1.5">Pages</span>
                                    </div>
                                    <div class="w-4 h-4 flex items-center justify-center dropdown-icon"
                                        :class="{ '!rotate-180': activeMenu === 'pages' }">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6">
                                            <path
                                                d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </div>
                                </a>
                                <ul x-cloak x-show="activeMenu === 'pages'" x-collapse
                                    class="sub-menu flex flex-col gap-1">
                                    <li><a href='blank.html'>Starter Page</a></li>
                                    <li><a href='pricing.html'>Pricing</a></li>
                                    <li><a href='coming-soon.html'>Coming Soon</a></li>
                                    <li><a href='maintenance.html'>Maintenance</a></li>
                                    <li><a href='404.html'>404 Error</a></li>
                                    <li><a href='500.html'>500 Error</a></li>
                                    <li><a href='503.html'>503 Error</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End sidebar -->

            <!-- Start Content Area -->
            <div class="main-content flex-1">
                <!-- Start Topbar -->
                <div
                    class="h-[60px] bg-white dark:bg-dark dark:border-gray/20 border-b-2 border-lightgray/10 flex items-center justify-between gap-2.5 px-7">
                    <div class="flex-auto flex items-center gap-2.5">
                        <div class="lg:hidden">
                            <button type="button" class="hover:text-primary" @click="$store.app.toggleSidebar()">
                                <svg width="13" height="12" class="rotate-180" viewBox="0 0 13 12"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.2"
                                        d="M5.46133 6.00002L11.1623 12L12.4613 10.633L8.05922 6.00002L12.4613 1.36702L11.1623 0L5.46133 6.00002Z"
                                        fill="currentColor" />
                                    <path
                                        d="M0 6.00002L5.70101 12L7 10.633L2.59782 6.00002L7 1.36702L5.70101 0L0 6.00002Z"
                                        fill="currentColor" />
                                </svg>
                            </button>
                        </div>
                        <div class="max-w-[180px] md:max-w-[350px] flex-1">
                            <form class="hidden min-[420px]:block w-full">
                                <div class="relative">
                                    <input type="text" id="search"
                                        class="form-input ps-10 h-[42px] dark:border-lightgray/20 dark:text-white dark:bg-lightgray/10 border-2 border-gray/10 bg-gray/[8%] rounded-full text-sm text-dark placeholder:text-lightgray/80 focus:ring-0 focus:border-primary/80 focus:outline-0"
                                        placeholder="Search..." required="">
                                    <button type="button" class="absolute inset-y-0 left-3 flex items-center">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_87_857)">
                                                <circle cx="8.625" cy="8.625" r="7.125" stroke="#267DFF"
                                                    stroke-width="2" />
                                                <path opacity="0.3" d="M15 15L16.5 16.5" stroke="#267DFF"
                                                    stroke-width="2" stroke-linecap="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_87_857">
                                                    <rect width="18" height="18" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="sm:block hidden flex-auto">
                        <ul class="flex items-center gap-[30px]">
                            <li>
                                <a class='flex items-center gap-2.5 text-lightgray hover:text-primary duration-300 text-sm font-semibold'
                                    href='inbox.html'>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M22 5C22 6.65685 20.6569 8 19 8C17.3431 8 16 6.65685 16 5C16 3.34315 17.3431 2 19 2C20.6569 2 22 3.34315 22 5Z"
                                            fill="currentColor" />
                                        <path opacity="0.3"
                                            d="M15.612 2.03826C14.59 2 13.3988 2 12 2C7.28595 2 4.92893 2 3.46447 3.46447C2 4.92893 2 7.28595 2 12C2 16.714 2 19.0711 3.46447 20.5355C4.92893 22 7.28595 22 12 22C16.714 22 19.0711 22 20.5355 20.5355C22 19.0711 22 16.714 22 12C22 10.6012 22 9.41 21.9617 8.38802C21.1703 9.08042 20.1342 9.5 19 9.5C16.5147 9.5 14.5 7.48528 14.5 5C14.5 3.86584 14.9196 2.82967 15.612 2.03826Z"
                                            fill="currentColor" />
                                        <path
                                            d="M3.46451 20.5355C4.92902 22 7.28611 22 12.0003 22C16.7145 22 19.0716 22 20.5361 20.5355C21.8931 19.1785 21.9927 17.0551 22 13H18.8402C17.935 13 17.4824 13 17.0846 13.183C16.6868 13.3659 16.3922 13.7096 15.8031 14.3968L15.1977 15.1032C14.6086 15.7904 14.314 16.1341 13.9162 16.317C13.5183 16.5 13.0658 16.5 12.1606 16.5H11.84C10.9348 16.5 10.4822 16.5 10.0844 16.317C9.68655 16.1341 9.392 15.7904 8.80291 15.1032L8.19747 14.3968C7.60837 13.7096 7.31382 13.3659 6.91599 13.183C6.51815 13 6.06555 13 5.16035 13H2C2.0073 17.0551 2.10744 19.1785 3.46451 20.5355Z"
                                            fill="currentColor" />
                                    </svg>
                                    <span class="lg:block hidden">Inbox</span>
                                </a>
                            </li>
                            <li>
                                <a class='flex items-center gap-2.5 text-lightgray hover:text-primary duration-300 text-sm font-semibold'
                                    href='chat.html'>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M18 14C18 18.4183 14.4183 22 10 22C8.76449 22 7.5944 21.7199 6.54976 21.2198C6.19071 21.0479 5.78393 20.9876 5.39939 21.0904L4.17335 21.4185C3.20701 21.677 2.32295 20.793 2.58151 19.8267L2.90955 18.6006C3.01245 18.2161 2.95209 17.8093 2.7802 17.4502C2.28008 16.4056 2 15.2355 2 14C2 9.58172 5.58172 6 10 6C14.4183 6 18 9.58172 18 14ZM6.5 15C7.05228 15 7.5 14.5523 7.5 14C7.5 13.4477 7.05228 13 6.5 13C5.94772 13 5.5 13.4477 5.5 14C5.5 14.5523 5.94772 15 6.5 15ZM10 15C10.5523 15 11 14.5523 11 14C11 13.4477 10.5523 13 10 13C9.44772 13 9 13.4477 9 14C9 14.5523 9.44772 15 10 15ZM13.5 15C14.0523 15 14.5 14.5523 14.5 14C14.5 13.4477 14.0523 13 13.5 13C12.9477 13 12.5 13.4477 12.5 14C12.5 14.5523 12.9477 15 13.5 15Z"
                                            fill="currentColor" />
                                        <path opacity="0.3"
                                            d="M17.9841 14.5084C18.092 14.4638 18.1984 14.4163 18.3033 14.3661C18.5951 14.2264 18.9256 14.1774 19.238 14.261L20.2342 14.5275C21.0193 14.7376 21.7376 14.0193 21.5275 13.2342L21.261 12.238C21.1774 11.9256 21.2264 11.595 21.3661 11.3033C21.7724 10.4545 22 9.50385 22 8.5C22 4.91015 19.0899 2 15.5 2C12.79 2 10.4673 3.6585 9.49156 6.0159C9.65969 6.00535 9.82922 6 10 6C14.4183 6 18 9.58172 18 14C18 14.1708 17.9946 14.3403 17.9841 14.5084Z"
                                            fill="currentColor" />
                                    </svg>
                                    <span class="lg:block hidden">Chat</span>
                                </a>
                            </li>
                            <li>
                                <a class='flex items-center gap-2.5 text-lightgray hover:text-primary duration-300 text-sm font-semibold'
                                    href='settings.html'>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12.4277 2C11.3139 2 10.2995 2.6007 8.27081 3.80211L7.58466 4.20846C5.55594 5.40987 4.54158 6.01057 3.98466 7C3.42773 7.98943 3.42773 9.19084 3.42773 11.5937V12.4063C3.42773 14.8092 3.42773 16.0106 3.98466 17C4.54158 17.9894 5.55594 18.5901 7.58466 19.7915L8.27081 20.1979C10.2995 21.3993 11.3139 22 12.4277 22C13.5416 22 14.5559 21.3993 16.5847 20.1979L17.2708 19.7915C19.2995 18.5901 20.3139 17.9894 20.8708 17C21.4277 16.0106 21.4277 14.8092 21.4277 12.4063V11.5937C21.4277 9.19084 21.4277 7.98943 20.8708 7C20.3139 6.01057 19.2995 5.40987 17.2708 4.20846L16.5847 3.80211C14.5559 2.6007 13.5416 2 12.4277 2Z"
                                            fill="currentColor" />
                                        <path
                                            d="M12.4277 8.25C10.3567 8.25 8.67773 9.92893 8.67773 12C8.67773 14.0711 10.3567 15.75 12.4277 15.75C14.4988 15.75 16.1777 14.0711 16.1777 12C16.1777 9.92893 14.4988 8.25 12.4277 8.25Z"
                                            fill="currentColor" />
                                    </svg>
                                    <span class="lg:block hidden">Setting</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="flex items-center gap-5">
                        <div x-data="{ fullScreen: false }">
                            <button class="text-lightgray hover:text-primary block"
                                x-bind:class="{ 'hidden': fullScreen, 'block': !fullScreen }"
                                x-on:click="fullScreen = !fullScreen" @click="$store.app.toggleFullScreen()">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.4">
                                        <path d="M19 7V1H13" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M19 1L11.5 8.5" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                    <path d="M1 13V19H7" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M8.5 11.5L1 19" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                            </button>
                            <button class="text-lightgray hidden"
                                x-bind:class="{ 'block': fullScreen, 'hidden': !fullScreen }"
                                x-on:click="fullScreen = !fullScreen" @click="$store.app.toggleFullScreen()">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g opacity="0.4">
                                        <path d="M11.5 2.5V8.5H17.5" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M11.5 8.5L19 1" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                    <path d="M8.5 17.5V11.5H2.5" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M1 19L8.5 11.5" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                        <div class="text-lightgray hover:text-primary duration-300">
                            <a href="javascript:;" x-show="$store.app.mode === 'light'"
                                @click="$store.app.toggleMode('dark')" style="display: none;">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M22 11.9999C22 17.5228 17.5228 21.9999 12 21.9999C10.8358 21.9999 9.71801 21.801 8.67887 21.4352C8.24138 20.3767 8 19.2165 8 17.9999C8 15.7787 8.80467 13.7454 10.1384 12.1757C11.31 13.8813 13.2744 14.9999 15.5 14.9999C17.8615 14.9999 19.9289 13.7405 21.0672 11.8568C21.3065 11.4607 22 11.5372 22 11.9999Z"
                                        fill="currentColor" />
                                    <path
                                        d="M2 12C2 16.3586 4.78852 20.0659 8.67887 21.4353C8.24138 20.3768 8 19.2166 8 18C8 15.7788 8.80467 13.7455 10.1384 12.1758C9.42027 11.1303 9 9.86422 9 8.5C9 6.13845 10.2594 4.07105 12.1432 2.93276C12.5392 2.69347 12.4627 2 12 2C6.47715 2 2 6.47715 2 12Z"
                                        fill="currentColor" />
                                </svg>
                            </a>
                            <a href="javascript:;" x-show="$store.app.mode === 'dark'"
                                @click="$store.app.toggleMode('light')">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M18 12C18 15.3137 15.3137 18 12 18C8.68629 18 6 15.3137 6 12C6 8.68629 8.68629 6 12 6C15.3137 6 18 8.68629 18 12Z"
                                        fill="currentColor" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M12 1.25C12.4142 1.25 12.75 1.58579 12.75 2V3C12.75 3.41421 12.4142 3.75 12 3.75C11.5858 3.75 11.25 3.41421 11.25 3V2C11.25 1.58579 11.5858 1.25 12 1.25ZM1.25 12C1.25 11.5858 1.58579 11.25 2 11.25H3C3.41421 11.25 3.75 11.5858 3.75 12C3.75 12.4142 3.41421 12.75 3 12.75H2C1.58579 12.75 1.25 12.4142 1.25 12ZM20.25 12C20.25 11.5858 20.5858 11.25 21 11.25H22C22.4142 11.25 22.75 11.5858 22.75 12C22.75 12.4142 22.4142 12.75 22 12.75H21C20.5858 12.75 20.25 12.4142 20.25 12ZM12 20.25C12.4142 20.25 12.75 20.5858 12.75 21V22C12.75 22.4142 12.4142 22.75 12 22.75C11.5858 22.75 11.25 22.4142 11.25 22V21C11.25 20.5858 11.5858 20.25 12 20.25Z"
                                        fill="currentColor" />
                                    <g opacity="0.3">
                                        <path
                                            d="M4.39838 4.39838C4.69127 4.10549 5.16615 4.10549 5.45904 4.39838L5.85188 4.79122C6.14477 5.08411 6.14477 5.55898 5.85188 5.85188C5.55898 6.14477 5.08411 6.14477 4.79122 5.85188L4.39838 5.45904C4.10549 5.16615 4.10549 4.69127 4.39838 4.39838Z"
                                            fill="currentColor" />
                                        <path
                                            d="M19.6009 4.39864C19.8938 4.69153 19.8938 5.16641 19.6009 5.4593L19.2081 5.85214C18.9152 6.14503 18.4403 6.14503 18.1474 5.85214C17.8545 5.55924 17.8545 5.08437 18.1474 4.79148L18.5402 4.39864C18.8331 4.10575 19.308 4.10575 19.6009 4.39864Z"
                                            fill="currentColor" />
                                        <path
                                            d="M18.1474 18.1474C18.4403 17.8545 18.9152 17.8545 19.2081 18.1474L19.6009 18.5402C19.8938 18.8331 19.8938 19.308 19.6009 19.6009C19.308 19.8938 18.8331 19.8938 18.5402 19.6009L18.1474 19.2081C17.8545 18.9152 17.8545 18.4403 18.1474 18.1474Z"
                                            fill="currentColor" />
                                        <path
                                            d="M5.85188 18.1477C6.14477 18.4406 6.14477 18.9154 5.85188 19.2083L5.45904 19.6012C5.16615 19.8941 4.69127 19.8941 4.39838 19.6012C4.10549 19.3083 4.10549 18.8334 4.39838 18.5405L4.79122 18.1477C5.08411 17.8548 5.55898 17.8548 5.85188 18.1477Z"
                                            fill="currentColor" />
                                    </g>
                                </svg>
                            </a>
                        </div>
                        <div class="notification h-6" x-data="dropdown" @click.outside="open = false">
                            <button type="button" class="text-lightgray hover:text-primary" @click="toggle()">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3"
                                        d="M18.7491 9V9.7041C18.7491 10.5491 18.9903 11.3752 19.4422 12.0782L20.5496 13.8012C21.5612 15.3749 20.789 17.5139 19.0296 18.0116C14.4273 19.3134 9.57274 19.3134 4.97036 18.0116C3.21105 17.5139 2.43882 15.3749 3.45036 13.8012L4.5578 12.0782C5.00972 11.3752 5.25087 10.5491 5.25087 9.7041V9C5.25087 5.13401 8.27256 2 12 2C15.7274 2 18.7491 5.13401 18.7491 9Z"
                                        fill="currentColor" />
                                    <path
                                        d="M12.75 6C12.75 5.58579 12.4142 5.25 12 5.25C11.5858 5.25 11.25 5.58579 11.25 6V10C11.25 10.4142 11.5858 10.75 12 10.75C12.4142 10.75 12.75 10.4142 12.75 10V6Z"
                                        fill="currentColor" />
                                    <path
                                        d="M7.24316 18.5449C7.8941 20.5501 9.77767 21.9997 11.9998 21.9997C14.222 21.9997 16.1055 20.5501 16.7565 18.5449C13.611 19.1352 10.3886 19.1352 7.24316 18.5449Z"
                                        fill="currentColor" />
                                </svg>
                            </button>
                            <div class="noti-area space-y-[22px]" x-show="open" x-transition=""
                                x-transition.duration.300ms="" style="display: none;">
                                <div class="flex items-center gap-2">
                                    <h4 class="font-semibold text-dark dark:text-white">Notifications</h4>
                                    <div x-data="{ dropdown: false }" class="dropdown ml-auto">
                                        <a href="javaScript:;"
                                            class="text-lightgray h-3 flex items-center justify-center"
                                            @click="dropdown = !dropdown" @keydown.escape="dropdown = false">
                                            <svg width="18" height="4" viewBox="0 0 18 4" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="2" cy="2" r="2" fill="currentColor" />
                                                <circle cx="9" cy="2" r="2" fill="currentColor" />
                                                <circle cx="16" cy="2" r="2" fill="currentColor" />
                                            </svg>
                                        </a>
                                        <ul x-show="dropdown" @click.away="dropdown = false" x-transition=""
                                            x-transition.duration.300ms="" class="right-0 whitespace-nowrap">
                                            <li><a href="javascript:;">All</a></li>
                                            <li><a href="javascript:;">Read</a></li>
                                            <li><a href="javascript:;">Unread</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <ul class="mt-5 space-y-[22px]">
                                    <li>
                                        <a href="#" class="flex items-center gap-2.5">
                                            <div
                                                class="w-9 h-9 bg-primary/10 rounded-full flex items-center justify-center shrink-0">
                                                <svg width="20" height="20" viewBox="0 0 20 20"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M15.8333 9.94775V12.4998C15.8333 15.5104 13.5528 17.9882 10.625 18.3001V12.4998C10.625 12.1547 10.3452 11.8748 10 11.8748C9.65483 11.8748 9.37501 12.1547 9.37501 12.4998V18.3001C6.44724 17.9882 4.16668 15.5104 4.16668 12.4998V9.94775C4.16668 8.55831 5.03029 7.37058 6.25001 6.89204C6.62112 6.74645 7.02519 6.6665 7.44793 6.6665L12.5521 6.6665C12.9748 6.6665 13.3789 6.74645 13.75 6.89204C14.9697 7.37058 15.8333 8.55831 15.8333 9.94775Z"
                                                        fill="#267DFF" />
                                                    <path
                                                        d="M15.8333 12.2918V11.0418H18.3333C18.6785 11.0418 18.9583 11.3216 18.9583 11.6668C18.9583 12.012 18.6785 12.2918 18.3333 12.2918H15.8333Z"
                                                        fill="#267DFF" />
                                                    <path
                                                        d="M14.5796 16.1137C14.8386 15.7859 15.0632 15.4296 15.2479 15.0503L17.3629 16.108C17.6716 16.2623 17.7967 16.6378 17.6423 16.9465C17.488 17.2552 17.1125 17.3804 16.8038 17.226L14.5796 16.1137Z"
                                                        fill="#267DFF" />
                                                    <path
                                                        d="M4.75217 15.0503C4.93683 15.4296 5.1614 15.7859 5.42042 16.1137L3.19622 17.226C2.88749 17.3804 2.51206 17.2552 2.35768 16.9465C2.20329 16.6378 2.32841 16.2623 2.63714 16.108L4.75217 15.0503Z"
                                                        fill="#267DFF" />
                                                    <path
                                                        d="M4.16668 11.0418H1.66668C1.3215 11.0418 1.04168 11.3216 1.04168 11.6668C1.04168 12.012 1.3215 12.2918 1.66668 12.2918H4.16668V11.0418Z"
                                                        fill="#267DFF" />
                                                    <path
                                                        d="M14.4612 7.27908L16.8038 6.10764C17.1125 5.95325 17.488 6.07837 17.6423 6.3871C17.7967 6.69583 17.6716 7.07126 17.3629 7.22564L15.3496 8.2324C15.1198 7.85843 14.8171 7.53406 14.4612 7.27908Z"
                                                        fill="#267DFF" />
                                                    <path
                                                        d="M5.53879 7.27908C5.18297 7.53406 4.88024 7.85843 4.6504 8.2324L2.63714 7.22564C2.32841 7.07126 2.20329 6.69583 2.35768 6.3871C2.51206 6.07837 2.88749 5.95325 3.19622 6.10764L5.53879 7.27908Z"
                                                        fill="#267DFF" />
                                                    <path
                                                        d="M13.75 6.89221V6.25C13.75 4.17893 12.0711 2.5 10 2.5C7.92895 2.5 6.25002 4.17893 6.25002 6.25V6.89221C6.62112 6.74661 7.02519 6.66667 7.44793 6.66667H12.5521C12.9748 6.66667 13.3789 6.74661 13.75 6.89221Z"
                                                        fill="#267DFF" />
                                                    <g opacity="0.5">
                                                        <path
                                                            d="M5.31339 1.31988C5.12192 1.60709 5.19952 1.99513 5.48673 2.1866L7.45307 3.49749C7.7877 3.18769 8.17893 2.93816 8.60951 2.76614L6.18011 1.14654C5.8929 0.955069 5.50486 1.03268 5.31339 1.31988Z"
                                                            fill="#267DFF" />
                                                        <path
                                                            d="M12.547 3.49755C12.2124 3.18774 11.8212 2.9382 11.3906 2.76618L13.8201 1.14654C14.1073 0.955069 14.4953 1.03268 14.6868 1.31988C14.8783 1.60709 14.8006 1.99513 14.5134 2.1866L12.547 3.49755Z"
                                                            fill="#267DFF" />
                                                    </g>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M10 11.875C10.3452 11.875 10.625 12.1548 10.625 12.5V18.3333H9.37502V12.5C9.37502 12.1548 9.65484 11.875 10 11.875Z"
                                                        fill="#267DFF" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-sm text-dark dark:text-white">You have a bug that needs
                                                </p>
                                                <p class="text-xs text-gray mt-0.5">Just now</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center gap-2.5">
                                            <div
                                                class="w-9 h-9 bg-purple/10 rounded-full flex items-center justify-center shrink-0">
                                                <svg width="20" height="21" viewBox="0 0 20 21"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="10" cy="5.49984" r="3.33333"
                                                        fill="#7B6AFE" />
                                                    <ellipse opacity="0.5" cx="10" cy="14.6668"
                                                        rx="5.83333" ry="3.33333" fill="#7B6AFE" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-sm text-dark dark:text-white">New user registered</p>
                                                <p class="text-xs text-gray mt-0.5">59 minutes ago</p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="flex items-center gap-2.5">
                                            <div
                                                class="w-9 h-9 bg-primary/10 rounded-full flex items-center justify-center shrink-0">
                                                <svg width="20" height="20" viewBox="0 0 20 20"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M15.8333 9.94775V12.4998C15.8333 15.5104 13.5528 17.9882 10.625 18.3001V12.4998C10.625 12.1547 10.3452 11.8748 10 11.8748C9.65483 11.8748 9.37501 12.1547 9.37501 12.4998V18.3001C6.44724 17.9882 4.16668 15.5104 4.16668 12.4998V9.94775C4.16668 8.55831 5.03029 7.37058 6.25001 6.89204C6.62112 6.74645 7.02519 6.6665 7.44793 6.6665L12.5521 6.6665C12.9748 6.6665 13.3789 6.74645 13.75 6.89204C14.9697 7.37058 15.8333 8.55831 15.8333 9.94775Z"
                                                        fill="#267DFF" />
                                                    <path
                                                        d="M15.8333 12.2918V11.0418H18.3333C18.6785 11.0418 18.9583 11.3216 18.9583 11.6668C18.9583 12.012 18.6785 12.2918 18.3333 12.2918H15.8333Z"
                                                        fill="#267DFF" />
                                                    <path
                                                        d="M14.5796 16.1137C14.8386 15.7859 15.0632 15.4296 15.2479 15.0503L17.3629 16.108C17.6716 16.2623 17.7967 16.6378 17.6423 16.9465C17.488 17.2552 17.1125 17.3804 16.8038 17.226L14.5796 16.1137Z"
                                                        fill="#267DFF" />
                                                    <path
                                                        d="M4.75217 15.0503C4.93683 15.4296 5.1614 15.7859 5.42042 16.1137L3.19622 17.226C2.88749 17.3804 2.51206 17.2552 2.35768 16.9465C2.20329 16.6378 2.32841 16.2623 2.63714 16.108L4.75217 15.0503Z"
                                                        fill="#267DFF" />
                                                    <path
                                                        d="M4.16668 11.0418H1.66668C1.3215 11.0418 1.04168 11.3216 1.04168 11.6668C1.04168 12.012 1.3215 12.2918 1.66668 12.2918H4.16668V11.0418Z"
                                                        fill="#267DFF" />
                                                    <path
                                                        d="M14.4612 7.27908L16.8038 6.10764C17.1125 5.95325 17.488 6.07837 17.6423 6.3871C17.7967 6.69583 17.6716 7.07126 17.3629 7.22564L15.3496 8.2324C15.1198 7.85843 14.8171 7.53406 14.4612 7.27908Z"
                                                        fill="#267DFF" />
                                                    <path
                                                        d="M5.53879 7.27908C5.18297 7.53406 4.88024 7.85843 4.6504 8.2324L2.63714 7.22564C2.32841 7.07126 2.20329 6.69583 2.35768 6.3871C2.51206 6.07837 2.88749 5.95325 3.19622 6.10764L5.53879 7.27908Z"
                                                        fill="#267DFF" />
                                                    <path
                                                        d="M13.75 6.89221V6.25C13.75 4.17893 12.0711 2.5 10 2.5C7.92895 2.5 6.25002 4.17893 6.25002 6.25V6.89221C6.62112 6.74661 7.02519 6.66667 7.44793 6.66667H12.5521C12.9748 6.66667 13.3789 6.74661 13.75 6.89221Z"
                                                        fill="#267DFF" />
                                                    <g opacity="0.5">
                                                        <path
                                                            d="M5.31339 1.31988C5.12192 1.60709 5.19952 1.99513 5.48673 2.1866L7.45307 3.49749C7.7877 3.18769 8.17893 2.93816 8.60951 2.76614L6.18011 1.14654C5.8929 0.955069 5.50486 1.03268 5.31339 1.31988Z"
                                                            fill="#267DFF" />
                                                        <path
                                                            d="M12.547 3.49755C12.2124 3.18774 11.8212 2.9382 11.3906 2.76618L13.8201 1.14654C14.1073 0.955069 14.4953 1.03268 14.6868 1.31988C14.8783 1.60709 14.8006 1.99513 14.5134 2.1866L12.547 3.49755Z"
                                                            fill="#267DFF" />
                                                    </g>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M10 11.875C10.3452 11.875 10.625 12.1548 10.625 12.5V18.3333H9.37502V12.5C9.37502 12.1548 9.65484 11.875 10 11.875Z"
                                                        fill="#267DFF" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-sm text-dark dark:text-white">You have a bug that needs
                                                </p>
                                                <p class="text-xs text-gray mt-0.5">5 hours ago</p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <div class="text-end">
                                    <a href="javascript:;"
                                        class="text-gray font-semibold text-sm hover:text-primary duration-300">View
                                        More</a>
                                </div>
                            </div>
                        </div>
                        <div class="profile z-10" x-data="dropdown" @click.outside="open = false">
                            <button type="button" class="flex items-center gap-2.5" @click="toggle()">
                                <img class="h-[38px] w-[38px] rounded-full"
                                    src="{{ asset('assets/admin/assets/images/user.png') }}" alt="Header Avatar">
                                <div class="text-start">
                                    <div class="flex items-center gap-1">
                                        <span class="hidden xl:block text-sm font-semibold">William Robbie</span>
                                        <svg width="12" height="13" viewBox="0 0 12 13" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.29241 5.20759C0.901881 4.81707 0.90188 4.18391 1.29241 3.79338C1.68293 3.40286 2.31609 3.40286 2.70662 3.79338L5.99951 7.08627L9.2924 3.79338C9.68293 3.40286 10.3161 3.40286 10.7066 3.79338C11.0971 4.18391 11.0971 4.81707 10.7066 5.20759L6.70662 9.2076C6.31609 9.59812 5.68293 9.59812 5.2924 9.2076L1.29241 5.20759Z"
                                                fill="currentColor" />
                                        </svg>
                                    </div>
                                    <span class="hidden xl:block text-xs text-lightgray">CEO & Founder</span>
                                </div>
                            </button>
                            <ul x-show="open" x-transition="" x-transition.duration.300ms=""
                                style="display: none;">
                                <li>
                                    <a href="javaScript:;" class="flex items-center gap-2">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="9.99996" cy="4.99984" r="3.33333" fill="currentColor" />
                                            <ellipse opacity="0.33" cx="9.99996" cy="14.1668" rx="5.83333"
                                                ry="3.33333" fill="currentColor" />
                                        </svg>
                                        Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="javaScript:;" class="flex items-center gap-2">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd"
                                                d="M10.3564 1.6665C9.42824 1.6665 8.58294 2.16709 6.89234 3.16827L6.32055 3.50688C4.62995 4.50806 3.78465 5.00865 3.32055 5.83317C2.85645 6.6577 2.85645 7.65887 2.85645 9.66122V10.3385C2.85645 12.3408 2.85645 13.342 3.32055 14.1665C3.78465 14.991 4.62995 15.4916 6.32055 16.4928L6.89234 16.8314C8.58294 17.8326 9.42824 18.3332 10.3564 18.3332C11.2846 18.3332 12.1299 17.8326 13.8205 16.8314L14.3923 16.4928C16.0829 15.4916 16.9282 14.991 17.3923 14.1665C17.8564 13.342 17.8564 12.3408 17.8564 10.3385V9.66122C17.8564 7.65887 17.8564 6.6577 17.3923 5.83317C16.9282 5.00865 16.0829 4.50806 14.3923 3.50688L13.8205 3.16827C12.1299 2.16709 11.2846 1.6665 10.3564 1.6665Z"
                                                fill="currentColor" />
                                            <path
                                                d="M10.3564 6.875C8.63056 6.875 7.23145 8.27411 7.23145 10C7.23145 11.7259 8.63056 13.125 10.3564 13.125C12.0823 13.125 13.4814 11.7259 13.4814 10C13.4814 8.27411 12.0823 6.875 10.3564 6.875Z"
                                                fill="currentColor" />
                                        </svg>
                                        Setting
                                    </a>
                                </li>
                                <li>
                                    <a href="javaScript:;" class="flex items-center gap-2">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M15 11.6667C15 15.3486 12.0152 18.3333 8.33329 18.3333C7.3037 18.3333 6.32863 18.0999 5.45809 17.6832C5.15888 17.5399 4.8199 17.4896 4.49945 17.5754L3.47775 17.8487C2.67247 18.0642 1.93575 17.3275 2.15122 16.5222L2.42459 15.5005C2.51033 15.1801 2.46004 14.8411 2.31679 14.5419C1.90002 13.6713 1.66663 12.6963 1.66663 11.6667C1.66663 7.98477 4.65139 5 8.33329 5C12.0152 5 15 7.98477 15 11.6667ZM5.41663 12.5C5.87686 12.5 6.24996 12.1269 6.24996 11.6667C6.24996 11.2064 5.87686 10.8333 5.41663 10.8333C4.95639 10.8333 4.58329 11.2064 4.58329 11.6667C4.58329 12.1269 4.95639 12.5 5.41663 12.5ZM8.33329 12.5C8.79353 12.5 9.16663 12.1269 9.16663 11.6667C9.16663 11.2064 8.79353 10.8333 8.33329 10.8333C7.87306 10.8333 7.49996 11.2064 7.49996 11.6667C7.49996 12.1269 7.87306 12.5 8.33329 12.5ZM11.25 12.5C11.7102 12.5 12.0833 12.1269 12.0833 11.6667C12.0833 11.2064 11.7102 10.8333 11.25 10.8333C10.7897 10.8333 10.4166 11.2064 10.4166 11.6667C10.4166 12.1269 10.7897 12.5 11.25 12.5Z"
                                                fill="currentColor" />
                                            <path opacity="0.3"
                                                d="M14.9868 12.0902C15.0767 12.053 15.1654 12.0134 15.2528 11.9716C15.4959 11.8552 15.7713 11.8143 16.0317 11.884L16.8618 12.1061C17.5161 12.2812 18.1147 11.6826 17.9396 11.0283L17.7175 10.1982C17.6479 9.9378 17.6887 9.66238 17.8051 9.41927C18.1437 8.71196 18.3334 7.91971 18.3334 7.08317C18.3334 4.09163 15.9082 1.6665 12.9167 1.6665C10.6583 1.6665 8.72276 3.04859 7.90967 5.01309C8.04977 5.0043 8.19105 4.99984 8.33337 4.99984C12.0153 4.99984 15 7.98461 15 11.6665C15 11.8088 14.9956 11.9501 14.9868 12.0902Z"
                                                fill="currentColor" />
                                        </svg>
                                        Message
                                    </a>
                                </li>
                                <li>
                                    <a href="javaScript:;" class="flex items-center gap-2">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd"
                                                d="M1.87496 10C1.87496 5.51269 5.51265 1.875 9.99996 1.875C14.4873 1.875 18.125 5.51269 18.125 10V12.3272C18.1901 12.3042 18.2602 12.2917 18.3333 12.2917C18.6785 12.2917 18.9583 12.5715 18.9583 12.9167V14.5833C18.9583 14.9285 18.6785 15.2083 18.3333 15.2083C17.9881 15.2083 17.7083 14.9285 17.7083 14.5833V14.1667H16.875V10C16.875 6.20304 13.7969 3.125 9.99996 3.125C6.203 3.125 3.12496 6.20304 3.12496 10V14.1667H2.29163V14.5833C2.29163 14.9285 2.0118 15.2083 1.66663 15.2083C1.32145 15.2083 1.04163 14.9285 1.04163 14.5833V12.9167C1.04163 12.5715 1.32145 12.2917 1.66663 12.2917C1.73968 12.2917 1.8098 12.3042 1.87496 12.3272V10Z"
                                                fill="currentColor" />
                                            <path
                                                d="M6.66663 11.708C6.66663 11.0002 6.66663 10.6463 6.49189 10.4002C6.40396 10.2764 6.28724 10.1741 6.15102 10.1014C5.88034 9.95697 5.51475 9.99034 4.78357 10.0571C3.5515 10.1696 2.93546 10.2258 2.494 10.5337C2.27057 10.6896 2.083 10.8883 1.94308 11.1173C1.66663 11.5699 1.66663 12.1662 1.66663 13.3589V14.8086C1.66663 15.9894 1.66663 16.5798 1.9486 17.0357C2.05415 17.2064 2.18644 17.3603 2.34078 17.492C2.75315 17.8438 3.35507 17.9538 4.5589 18.1736C5.40606 18.3283 5.82965 18.4056 6.14226 18.2427C6.25762 18.1826 6.35958 18.1012 6.44235 18.0032C6.66663 17.7375 6.66663 17.322 6.66663 16.4911V11.708Z"
                                                fill="currentColor" />
                                            <path
                                                d="M13.3333 11.708C13.3333 11.0002 13.3333 10.6463 13.508 10.4002C13.596 10.2764 13.7127 10.1741 13.8489 10.1014C14.1196 9.95697 14.4852 9.99034 15.2164 10.0571C16.4484 10.1696 17.0645 10.2258 17.5059 10.5337C17.7294 10.6896 17.9169 10.8883 18.0568 11.1173C18.3333 11.5699 18.3333 12.1662 18.3333 13.3589V14.8086C18.3333 15.9894 18.3333 16.5798 18.0513 17.0357C17.9458 17.2064 17.8135 17.3603 17.6591 17.492C17.2468 17.8438 16.6449 17.9538 15.441 18.1736C14.5939 18.3283 14.1703 18.4056 13.8577 18.2427C13.7423 18.1826 13.6403 18.1012 13.5576 18.0032C13.3333 17.7375 13.3333 17.322 13.3333 16.4911V11.708Z"
                                                fill="currentColor" />
                                        </svg>
                                        Support
                                    </a>
                                </li>
                                <li>
                                    <a href="javaScript:;" class="!text-danger flex items-center gap-2">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd"
                                                d="M10.3564 1.6665C9.42824 1.6665 8.58294 2.16709 6.89234 3.16827L6.32055 3.50688C4.62995 4.50806 3.78465 5.00865 3.32055 5.83317C2.85645 6.6577 2.85645 7.65887 2.85645 9.66122V10.3385C2.85645 12.3408 2.85645 13.342 3.32055 14.1665C3.78465 14.991 4.62995 15.4916 6.32055 16.4928L6.89234 16.8314C8.58294 17.8326 9.42824 18.3332 10.3564 18.3332C11.2846 18.3332 12.1299 17.8326 13.8205 16.8314L14.3923 16.4928C16.0829 15.4916 16.9282 14.991 17.3923 14.1665C17.8564 13.342 17.8564 12.3408 17.8564 10.3385V9.66122C17.8564 7.65887 17.8564 6.6577 17.3923 5.83317C16.9282 5.00865 16.0829 4.50806 14.3923 3.50688L13.8205 3.16827C12.1299 2.16709 11.2846 1.6665 10.3564 1.6665Z"
                                                fill="currentColor" />
                                            <path
                                                d="M10.3564 6.875C8.63056 6.875 7.23145 8.27411 7.23145 10C7.23145 11.7259 8.63056 13.125 10.3564 13.125C12.0823 13.125 13.4814 11.7259 13.4814 10C13.4814 8.27411 12.0823 6.875 10.3564 6.875Z"
                                                fill="currentColor" />
                                        </svg>
                                        Sign Out
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Topbar -->

                <!-- Start Content -->
                <div class="h-[calc(100vh-60px)] relative overflow-y-auto overflow-x-hidden p-5 sm:p-7 space-y-5">
                    <!-- Start All Card -->
                    @yield('content')
                    <!-- End All Card -->
                </div>
                <!-- End Content -->
            </div>
            <!-- End Content Area -->
        </div>
    </div>
    <!-- End Layout -->

    <!-- All javascirpt -->
    <!-- Alpine js -->
    <script src="{{ asset('assets/admin/assets/js/alpine-collaspe.min.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/js/alpine-persist.min.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/js/alpine.min.js') }}" defer></script>
    <!-- ApexCharts js -->
    <script src="{{ asset('assets/admin/assets/js/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/js/apex-analytics.js') }}"></script>

    <!-- Custom js -->
    <script src="{{ asset('assets/admin/assets/js/custom.js') }}"></script>

    {{-- js ajax --}}
    <!-- Thêm jQuery từ CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
