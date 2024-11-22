document.addEventListener('DOMContentLoaded', function () {
    const navLinks = document.querySelectorAll('.nav.nav-pills.flex-column.mb-auto .nav-link');
    const dropdownLinks = document.querySelectorAll('.dropdown-menu .dropdown-item');

    // Set initial home active state
    const homeLink = navLinks[0];
    if (homeLink) {
        homeLink.classList.add('active');
        homeLink.setAttribute('aria-current', 'page');
    }

    // Handle nav pill clicks
    navLinks.forEach(link => {
        link.addEventListener('click', function () {
            // Remove active state from all nav links
            navLinks.forEach(l => {
                l.classList.remove('active');
                l.removeAttribute('aria-current');
            });

            // Add active state to clicked link
            this.classList.add('active');
            this.setAttribute('aria-current', 'page');
        });
    });

    // Handle dropdown item clicks and clear active states
    dropdownLinks.forEach(link => {
        link.addEventListener('click', function () {
            // Remove active state from all nav links
            navLinks.forEach(l => {
                l.classList.remove('active');
                l.removeAttribute('aria-current');
            });

            // Optional: Add a specific behavior for dropdown items if needed
        });
    });

    // Ensure dropdown toggle does not affect active state
    const dropdownToggle = document.querySelectorAll('.dropdown-toggle');
    dropdownToggle.forEach(toggle => {
        toggle.addEventListener('click', function (e) {
            // Prevent toggling from interfering with active state
            e.stopPropagation();
        });
    });
});
