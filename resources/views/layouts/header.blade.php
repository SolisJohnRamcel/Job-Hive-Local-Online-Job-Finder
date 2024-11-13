<header class="navbar navbar-expand-lg py-2 border-bottom">
    <div class="container">
        <!-- Logo -->
        <a href="/" class="navbar-brand d-flex align-items-center">
            <img src="{{ URL('assets/img/Job Hive_icon.png')}}" width="50" height="50" alt="Job Hive Logo">
            <strong class="text-dark ms-2">Job Hive</strong>
        </a>

        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible Content -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <!-- Search Form -->
            <form class="d-flex mx-lg-3 my-2 my-lg-0 flex-grow-1" style="max-width: 500px;" role="search">
                <input class="form-control me-2" type="search" placeholder="Find Jobs" aria-label="Search">
                <button class="btn" style="background-color: #f7c15d;" type="submit">
                    <img src="{{ URL('assets/img/search_icon.png') }}" width="16" height="16" alt="Search Icon">
                </button>
            </form>

            <!-- Navigation Links -->
            <nav class="ms-lg-auto">
                <div class="navbar-nav">
                    <x-navlink href="/">Home</x-navlink>
                    <x-navlink href="/about">About</x-navlink>
                    <x-navlink href="/contact">Contact</x-navlink>
                    <x-navlink2 href="/signin">Sign in</x-navlink2>
                </div>
            </nav>
        </div>
    </div>
</header>
