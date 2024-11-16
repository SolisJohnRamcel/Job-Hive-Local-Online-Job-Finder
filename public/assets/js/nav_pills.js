document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('.nav-link');
    
    function setActiveState() {
        const currentPath = window.location.pathname;
        navLinks.forEach(link => {
            if (link.getAttribute('href') === currentPath) {
                link.classList.add('active');
                link.setAttribute('aria-current', 'page');
                localStorage.setItem('activeLink', currentPath);
            } else {
                link.classList.remove('active');
                link.setAttribute('aria-current', 'false');
            }
        });
    }

    // Set initial state
    setActiveState();

    // Handle clicks
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            localStorage.setItem('lastClicked', this.getAttribute('href'));
        });
    });

    // Check localStorage on page load
    const lastClicked = localStorage.getItem('lastClicked');
    if (lastClicked) {
        const savedLink = document.querySelector(`.nav-link[href="${lastClicked}"]`);
        if (savedLink) {
            navLinks.forEach(l => {
                l.classList.remove('active');
                l.setAttribute('aria-current', 'false');
            });
            savedLink.classList.add('active');
            savedLink.setAttribute('aria-current', 'page');
        }
    }
});
