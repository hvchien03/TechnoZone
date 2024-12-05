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
    <title>TECHNOZONE</title>

    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="{{ asset('assets/admin/assets/images/favicon.ico') }}">

    <!-- Style Css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/assets/css/style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />

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
                        <a class='main-logo w-full flex justify-center items-center' href='index.html'>
                            TECHNOZONE
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
                                </a>
                            </li>
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
                                        <span class="pl-1.5">Quản trị</span>
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
                                    <li><a href='{{ route('products.index') }}'>Sản phẩm</a></li>
                                    <li><a href='{{ route('promotions.index') }}'>Giảm giá</a></li>
                                    <li><a href='{{ route('suppliers.index') }}'>Nhà cung cấp</a></li>
                                    <li><a href='{{ route('categories.index') }}'>Loại sản phẩm</a></li>
                                    <li><a href='{{ route('orders.index') }}'>Đơn hàng</a></li>
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
                                        <span class="pl-1.5">Khách hàng</span>
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
                                    <li><a href='{{ route('customer.index') }}'>Danh sách</a></li>
                                    <li><a href='{{ route('customer.create') }}'>Thêm mới</a></li>
                                </ul>
                            </li>
                            <li class="menu nav-item">
                                <a href="javaScript:;" class="nav-link group items-center justify-between"
                                    :class="{ 'active': activeMenu === 'requests' }"
                                    @click="activeMenu === 'requests' ? activeMenu = null : activeMenu = 'requests'">
                                    <div class="flex items-center">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle opacity="0.3" cx="12" cy="6" r="4"
                                                fill="currentColor" />
                                            <ellipse cx="12" cy="17" rx="7" ry="4"
                                                fill="currentColor" />
                                        </svg>
                                        <span class="pl-1.5">Đơn yêu cầu</span>
                                    </div>
                                    <div class="w-4 h-4 flex items-center justify-center dropdown-icon"
                                        :class="{ '!rotate-180': activeMenu === 'requests' }">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6">
                                            <path
                                                d="M11.9997 13.1714L16.9495 8.22168L18.3637 9.63589L11.9997 15.9999L5.63574 9.63589L7.04996 8.22168L11.9997 13.1714Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </div>
                                </a>
                                <ul x-cloak x-show="activeMenu === 'requests'" x-collapse
                                    class="sub-menu flex flex-col gap-1">
                                    <li><a href='{{ route('admin.service.index') }}'>Danh sách</a></li>
                                    <li><a href='{{ route('admin.service.create') }}'>Thêm mới</a></li>
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
                            <form class="hidden min-[420px]:block w-full search-form" action="{{ url()->current() }}"
                                method="GET">
                                <div class="relative">
                                    <input type="text" id="search" name="key"
                                        value="{{ request('key', '') }}"
                                        class="form-input ps-10 h-[42px] dark:border-lightgray/20 dark:text-white dark:bg-lightgray/10 border-2 border-gray/10 bg-gray/[8%] rounded-full text-sm text-dark placeholder:text-lightgray/80 focus:ring-0 focus:border-primary/80 focus:outline-0"
                                        placeholder="Tìm kiếm..." required="">
                                    <button type="submit" class="absolute inset-y-0 left-3 flex items-center">
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
                        <div class="profile z-10" x-data="dropdown" @click.outside="open = false">
                            <button type="button" class="flex items-center gap-2.5" @click="toggle()">
                                <img class="h-[38px] w-[38px] rounded-full"
                                    src="{{ asset('assets/admin/assets/images/user.png') }}" alt="Header Avatar">
                                <div class="text-start">
                                    <div class="flex items-center gap-1">
                                        <span class="hidden xl:block text-sm font-semibold">@auth
                                                {{ Auth::User()->name }}
                                            @endauth
                                        </span>
                                        <svg width="12" height="13" viewBox="0 0 12 13" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.29241 5.20759C0.901881 4.81707 0.90188 4.18391 1.29241 3.79338C1.68293 3.40286 2.31609 3.40286 2.70662 3.79338L5.99951 7.08627L9.2924 3.79338C9.68293 3.40286 10.3161 3.40286 10.7066 3.79338C11.0971 4.18391 11.0971 4.81707 10.7066 5.20759L6.70662 9.2076C6.31609 9.59812 5.68293 9.59812 5.2924 9.2076L1.29241 5.20759Z"
                                                fill="currentColor" />
                                        </svg>
                                    </div>
                                </div>
                            </button>
                            <ul x-show="open" x-transition="" x-transition.duration.300ms=""
                                style="display: none;">
                                <li>
                                    <a href="{{ route('logout') }}" class="!text-danger flex items-center gap-2">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd"
                                                d="M10.3564 1.6665C9.42824 1.6665 8.58294 2.16709 6.89234 3.16827L6.32055 3.50688C4.62995 4.50806 3.78465 5.00865 3.32055 5.83317C2.85645 6.6577 2.85645 7.65887 2.85645 9.66122V10.3385C2.85645 12.3408 2.85645 13.342 3.32055 14.1665C3.78465 14.991 4.62995 15.4916 6.32055 16.4928L6.89234 16.8314C8.58294 17.8326 9.42824 18.3332 10.3564 18.3332C11.2846 18.3332 12.1299 17.8326 13.8205 16.8314L14.3923 16.4928C16.0829 15.4916 16.9282 14.991 17.3923 14.1665C17.8564 13.342 17.8564 12.3408 17.8564 10.3385V9.66122C17.8564 7.65887 17.8564 6.6577 17.3923 5.83317C16.9282 5.00865 16.0829 4.50806 14.3923 3.50688L13.8205 3.16827C12.1299 2.16709 11.2846 1.6665 10.3564 1.6665Z"
                                                fill="currentColor" />
                                            <path
                                                d="M10.3564 6.875C8.63056 6.875 7.23145 8.27411 7.23145 10C7.23145 11.7259 8.63056 13.125 10.3564 13.125C12.0823 13.125 13.4814 11.7259 13.4814 10C13.4814 8.27411 12.0823 6.875 10.3564 6.875Z"
                                                fill="currentColor" />
                                        </svg>
                                        Đăng xuất
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
    @stack('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
</body>

</html>
