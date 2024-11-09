<header class="navbar navbar-expand-lg py-2 mb-4 border-bottom">
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
            <!-- Navigation Links -->
            <nav class="navbar-nav ms-auto">
                <x-layout.navlink href="/">Home</x-layout.navlink>
                <x-layout.navlink href="/about">About</x-layout.navlink>
                <x-layout.navlink href="/contact">Contact</x-layout.navlink>
                <x-layout.navlink2 href="/signin">Sign in</x-layout.navlink2>
            </nav>
        </div>
    </div>
</header>
