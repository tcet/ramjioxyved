// Custom JavaScript for Ramji Oxyved website
// This script currently implements smooth scrolling for anchor links
// and can be extended for additional interactivity as needed.

document.addEventListener('DOMContentLoaded', function () {
  // Smooth scroll for anchor links with the class 'scroll-link'
  const links = document.querySelectorAll('a.scroll-link');
  links.forEach(link => {
    link.addEventListener('click', function (e) {
      e.preventDefault();
      const targetId = this.getAttribute('href');
      const targetEl = document.querySelector(targetId);
      if (targetEl) {
        targetEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });
});