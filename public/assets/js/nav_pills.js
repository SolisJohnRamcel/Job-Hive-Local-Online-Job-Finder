document.addEventListener('DOMContentLoaded', function () {
    const navLinks = document.querySelectorAll('.nav.nav-pills.flex-column.mb-auto .nav-link');
    const currentPath = window.location.pathname.replace(/\/$/, ''); // Normalize the current path by removing trailing slash

    // Set initial active state based on current URL
    navLinks.forEach(link => {
        const linkPath = link.getAttribute('href').replace(/\/$/, ''); // Normalize href paths
        if (linkPath === currentPath) {
            link.classList.add('active');
            link.setAttribute('aria-current', 'page');
        }
    });

    // Handle nav pill clicks
    navLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault(); // Prevent default navigation if applicable

            // Store active link in localStorage
            localStorage.setItem('activeNavLink', this.getAttribute('href'));

            // Remove active state from all nav links
            navLinks.forEach(l => {
                l.classList.remove('active');
                l.removeAttribute('aria-current');
            });

            // Add active state to clicked link
            this.classList.add('active');
            this.setAttribute('aria-current', 'page');

            // Optionally navigate to the new link (if needed)
            window.location.href = this.getAttribute('href');
        });
    });

    // Check localStorage for active link on page load
    const storedActiveLink = localStorage.getItem('activeNavLink');
    if (storedActiveLink) {
        navLinks.forEach(link => {
            const linkPath = link.getAttribute('href').replace(/\/$/, ''); // Normalize href paths
            if (linkPath === storedActiveLink.replace(/\/$/, '')) {
                link.classList.add('active');
                link.setAttribute('aria-current', 'page');
            }
        });
    }

    // Debugging (Optional): Log the stored active link
    console.log('Stored active link from localStorage:', storedActiveLink);
});
