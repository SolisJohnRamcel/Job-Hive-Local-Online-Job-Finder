<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('assets/img/Job Hive_icon.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{ asset('assets/css/navpills_gold.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/user_mobile.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/sidebar_stay.css') }}" rel="stylesheet">
    <!-- tail wind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="dash/css/tailwind.css" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@0.5.x/dist/component.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
    
    <title>Job Hive Job Finder</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar (desktop version) -->
            <div class="col-auto px-0 sidebar d-none d-lg-block">
                <div class="d-flex flex-column vh-100 flex-shrink-0 p-3 text-white bg-dark sidebar-height" style="width: 250px;">
                    <a href="{{ route('index_user') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <img src="{{ URL('assets/img/Job Hive_icon.png')}}" width="40" height="32" alt="Job Hive Logo" class="me-2">
                        <strong class="fs-4">JobHive</strong>
                    </a>
                    
                    <hr class="my-3">
                    
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li><a href="{{ route('dashboard') }}" class="nav-link text-white">Dashboard</a></li>
                        <li><a href="#" class="nav-link text-white">List of users</a></li>
                        <li><a href="#" class="nav-link text-white">Reports</a></li>
                        <li><a href="#" class="nav-link text-white">Job List</a></li>
                    </ul>
                    
                    <div class="dropdown mt-auto">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="{{ URL('assets/img/Job Hive_icon.png')}}" alt="" width="32" height="32" class="rounded-circle me-2">
                            <strong>{{ Auth::user()->name }}</strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="{{ route('adminprofile.edit') }}">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Sign out</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Sidebar (mobile version using offcanvas) -->
            <div class="offcanvas offcanvas-start bg-dark text-white d-lg-none" id="sidebar" tabindex="-1" aria-labelledby="sidebarLabel" style="width: 250px;">
                <div class="offcanvas-body d-flex flex-column p-3">
                    <!-- Same sidebar content as desktop -->
                    <a href="{{ route('index_user') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <img src="{{ URL('assets/img/Job Hive_icon.png')}}" width="40" height="32" alt="Job Hive Logo" class="me-2">
                        <strong class="fs-4">JobHive</strong>
                    </a>
                    <hr class="my-3">
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li><a href="{{ route('dashboard') }}" class="nav-link text-white">Dashboard</a></li>
                        <li><a href="#" class="nav-link text-white">List of users</a></li>
                        <li><a href="#" class="nav-link text-white">Reports</a></li>
                        <li><a href="#" class="nav-link text-white">Job List</a></li>
                    </ul>
                    <div class="dropdown mt-auto">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="{{ URL('assets/img/Job Hive_icon.png')}}" alt="" width="32" height="32" class="rounded-circle me-2">
                            <strong>{{ Auth::user()->name }}</strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="{{ route('adminprofile.edit') }}">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Sign out</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="col ps-0">
                <!-- Mobile Header -->
                <div class="bg-dark d-lg-none w-100 position-fixed top-0 start-0 p-2 d-flex align-items-center" style="z-index: 1030;">
                    <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar">
                        <i class="bi bi-list"></i>
                    </button>
                </div>

                <!-- Main Content -->
                <div class="p-4 content mt-5 mt-lg-0">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.bundle.min.js"></script>
    <script src="dash/js/script.js"></script>
    <script src="{{ asset('assets/js/nav_pills.js') }}"></script>
    <script src="{{ asset('assets/js/edit_profile.js') }}"></script>
    <script src="{{ asset('assets/js/preview_image.js') }}"></script>
    <script src="{{ asset('assets/js/libs/apex-charts/apexcharts.js') }}"></script>
</body>
</html>
