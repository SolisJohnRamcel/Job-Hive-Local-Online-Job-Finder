 // Select all nav links
 const navLinks = document.querySelectorAll('.nav-link');

 // Add click event listener to each nav link
 navLinks.forEach(link => {
   link.addEventListener('click', function() {
     // Remove active and text-white class from all links
     navLinks.forEach(link => link.classList.remove('active'));
     
     // Add active and text-white class to the clicked link
     this.classList.add('active');
   });
 });