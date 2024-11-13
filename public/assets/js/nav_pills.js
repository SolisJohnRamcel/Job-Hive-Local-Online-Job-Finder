document.addEventListener('DOMContentLoaded', function() {
  const navLinks = document.querySelectorAll('.nav-link');
  
  navLinks.forEach(link => {
      link.addEventListener('click', function(e) {
          // Remove active class from all links
          navLinks.forEach(l => {
              l.classList.remove('active');
              l.setAttribute('aria-current', 'false');
          });
          
          // Add active class to clicked link
          this.classList.add('active');
          this.setAttribute('aria-current', 'page');
          
          // Store active link in localStorage
          localStorage.setItem('activeLink', this.getAttribute('href'));
      });
  });
  
  // Check for active link on page load
  const currentPath = window.location.pathname;
  const activeLink = document.querySelector(`.nav-link[href="${currentPath}"]`);
  if (activeLink) {
      activeLink.classList.add('active');
      activeLink.setAttribute('aria-current', 'page');
  }
});
