<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('assets/img/Job Hive_icon.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://bootstrapmade.com/assets/img/icons.svg#search.">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet" />
    <link href="{{ asset('assets/css/navpills_gold.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/user_mobile.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/sidebar_stay.css') }}" rel="stylesheet">
    <title>Job Hive Job Finder</title>
</head>
<body>
    <div class="d-flex min-vh-100 overflow-hidden">
        
        <!-- Sidebar -->
        <div class="offcanvas-lg offcanvas-start text-bg-dark" tabindex="-1" id="sidebar" style="width: 250px;">
            <div class="offcanvas-body d-flex flex-column p-3 h-100">
                <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <img src="{{ URL('assets/img/Job Hive_icon.png')}}" width="40" height="32" alt="Job Hive Logo" class="me-2">
                    <strong class="fs-4">JobHive</strong>
                </a>
                
                <hr class="my-3">
                
                <ul class="nav nav-pills flex-column mb-auto">
                    <li><a href="{{ route('dashboard') }}" class="nav-link text-white">Dashboard</a></li>
                    <li><a href="#" class="nav-link text-white">=</a></li>
                    <li><a href="#" class="nav-link text-white">=</a></li>
                    <li><a href="#" class="nav-link text-white">=</a></li>
                    <li><a href="#" class="nav-link text-white">=</a></li>
                    <li><a href="#" class="nav-link text-white">=</a></li>
                    <li><a href="#" class="nav-link text-white">=</a></li>
                    <li><a href="#" class="nav-link text-white">=</a></li>
                    <li><a href="#" class="nav-link text-white">=</a></li>
                </ul>
                
                <div class="dropdown dropup mt-auto">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                        <img src="{{ URL('assets/img/Job Hive_icon.png')}}" alt="" width="32" height="32" class="rounded-circle me-2">
                        <strong>{{ Auth::user()->name }}</strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end text-small shadow">
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

        <!-- Main Content and Header -->
        <div class="flex-grow-1">
            <!-- Mobile Header -->
            <div class="bg-dark d-lg-none w-100 position-fixed top-0 start-0 p-1 d-flex align-items-center" style="z-index: 1030;">
                <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar">
                    <i class="bi bi-list"></i>
                </button>
            </div>

            <!-- Main Content Area -->
            <div class="container p-4">
                    @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/nav_pills.js')}}"></script>
</body>
</html>
