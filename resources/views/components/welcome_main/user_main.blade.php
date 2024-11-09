<main class="d-flex min-vh-100">
    <!-- Mobile Toggle Button -->
    <button class="btn btn-dark d-lg-none position-fixed start-0 top-0 mt-2 ms-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar">
        <i class="bi bi-list"></i>
    </button>

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
                    <a href="#" class="nav-link active text-white" aria-current="page">
                        <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                        Home
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
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
                  <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                  <strong>{{ Auth::user()->name }}</strong>
              </a>
              <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end text-small shadow" style="bottom: 100%; top: auto;">
                  <li><a class="dropdown-item" href="#">Settings</a></li>
                  <li><a class="dropdown-item" href="#">Profile</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="/">Sign out</a></li>
              </ul>
          </div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="flex-grow-1 p-3">
        <div class="container-fluid">
            <!-- Your main content goes here -->
        </div>
    </div>
</main>
