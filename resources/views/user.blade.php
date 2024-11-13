@extends('layouts.app')
@section('content')
    <div class="d-flex min-vh-100">
        <!-- Mobile Header -->
        <div class="bg-dark d-lg-none w-100 position-fixed top-0 start-0 p-2 d-flex align-items-center" style="z-index: 1030;">
            <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar">
                <i class="bi bi-list"></i>
            </button>
        </div>

        <div class="d-flex min-vh-100" style="margin-top: 0px;">

        <!-- Sidebar -->
        <div class="offcanvas-lg offcanvas-start text-bg-dark" tabindex="-1" id="sidebar" style="width: 220px; max-width: 100%;">
            <div class="offcanvas-body d-flex flex-column p-3 h-100">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <img src="{{ URL('assets/img/Job Hive_icon.png')}}" width="40" height="32" alt="Job Hive Logo" class="me-2">
                    <strong class="fs-4">JobHive</strong>
                </a>
                
                <hr class="my-3">
                
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                    <a href="#" class="nav-link {{ Request::is('/') ? 'active' : '' }} text-white">
                            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }} text-white">
                            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                            Jobs
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                            Resume
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-white">
                            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                            Profile
                        </a>
                    </li>
                </ul>
                
                <div class="dropdown dropup mt-auto">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                        <img src="{{ URL('assets/img/Job Hive_icon.png')}}" alt="" width="32" height="32" class="rounded-circle me-2">
                        <strong>{{ Auth::user()->name }}</strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end text-small shadow" style="bottom: 100%; top: auto;">
                        <li><a class="dropdown-item" href="">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    Sign out
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Main Content Area with conditional margin -->
        <div class="flex-grow-1 p-4 d-lg-block" style="margin-top: var(--content-margin, 0);">
            @yield('button-content')
        </div>
    </div>




@endsection