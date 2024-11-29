<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('assets/img/Job Hive_icon.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet" />
    <link href="{{ asset('assets/css/navpills_gold.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/user_mobile.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/sidebar_stay.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">
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
                        <li><a href="{{ route('index_user') }}" class="nav-link text-white"><i class="bi bi-house-door-fill me-2"></i>Home</a></li>
                        <li><a href="{{ route('resume') }}" class="nav-link text-white"><i class="bi bi-file-earmark-text-fill me-2"></i>Resume</a></li>
                        <li><a href="{{route('application')}}" class="nav-link text-white"><i class="bi bi-file-earmark-text me-2"></i>Application</a></li>
                 
                       
                    </ul>
                    
                    <div class="dropdown mt-auto">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="" width="32" height="32" class="rounded-circle me-2">
                            <strong>{{ Auth::user()->name }}</strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Settings</a></li>
                            <li><a class="dropdown-item" href="profile_page">Profile</a></li>
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
            <div class="offcanvas offcanvas-start bg-dark text-white d-lg-none" id="sidebar" tabindex="-1" aria-labelledby="sidebarLabel" style="width: 270px;">
                <div class="offcanvas-body d-flex flex-column p-3">
                    <!-- Same sidebar content as desktop -->
                    <a href="{{ route('index_user') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <img src="{{ URL('assets/img/Job Hive_icon.png')}}" width="40" height="32" alt="Job Hive Logo" class="me-2">
                        <strong class="fs-4">JobHive</strong>
                    </a>
                    <hr class="my-3">
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li><a href="{{ route('index_user') }}" class="nav-link text-white"><i class="bi bi-house-door-fill me-2"></i>Home</a></li>
                        <li><a href="{{ route('resume') }}" class="nav-link text-white"><i class="bi bi-file-earmark-text-fill me-2"></i>Resume</a></li>
                        <li><a href="{{route('application')}}" class="nav-link text-white"><i class="bi bi-file-earmark-text me-2"></i>Application</a></li>
        
                    </ul>
                    <div class="dropdown mt-auto">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="" width="32" height="32" class="rounded-circle me-2">
                            <strong>{{ Auth::user()->name }}</strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Settings</a></li>
                            <li><a class="dropdown-item" href="profile_page">Profile</a></li>
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
    <script src="{{ asset('assets/js/nav_pills.js') }}"></script>
    <script src="{{ asset('assets/js/preview_image.js') }}"></script>


</body>
</html>
