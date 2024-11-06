<header class="d-flex flex-wrap align-items-center justify-content-between py-2 mb-4 border-bottom">
            <div class="d-flex align-items-center me-2">
                <a href="/" class="ps-lg-3 d-flex align-items-center mb-3 mb-md-0 me-md-3 link-body-emphasis text-decoration-none">
                <img src="{{ URL('assets/img/Job Hive_icon.png')}}" width="50" height="50" alt="Job Hive Logo">
                <strong class="text-dark">Job Hive</strong>
                </a>
            </div>      
            <form class="d-flex flex-grow-1 me-2" style="max-width: 500px;" role="search">
                <input class="form-control me-2 flex-grow-1" type="search" placeholder="Find Jobs" aria-label="Search">
                <button class="btn" style="background-color: #f7c15d;" type="submit me-2">
                <img src="{{ URL('assets/img/search_icon.png') }}" width="16" height="16" alt="Search Icon">
                </button>
            </form>
            <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
                <x-layout.navlink href="/">Home</x-layout.navlink>
                <x-layout.navlink href="/about">About</x-layout.navlink>
                <x-layout.navlink href="/contact">Contact</x-layout.navlink>
                <x-layout.navlink2 href="/signin">Sign in</x-layout.navlink2>
            </nav>
</header>