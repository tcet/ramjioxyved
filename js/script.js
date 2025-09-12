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

  // Initialize animal chamber carousel if present
  if (document.querySelector('.animal-swiper')) {
    new Swiper('.animal-swiper', {
      slidesPerView: 3,
      spaceBetween: 20,
      loop: true,
      autoplay: {
        delay: 0,
        disableOnInteraction: false,
        pauseOnMouseEnter: true
      },
      speed: 3000,
      breakpoints: {
        0: { slidesPerView: 1 },
        576: { slidesPerView: 2 },
        992: { slidesPerView: 3 }
      }
    });
  }

  // Animate timeline items on scroll
  const timelineItems = document.querySelectorAll('.timeline-item');
  if (timelineItems.length) {
    const observer = new IntersectionObserver(
      entries => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('show');
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.2 }
    );

    timelineItems.forEach(item => observer.observe(item));
  }

  // Parallax effect for page banners
  document.querySelectorAll('.page-banner').forEach(banner => {
    banner.addEventListener('mousemove', e => {
      const rect = banner.getBoundingClientRect();
      const x = ((e.clientX - rect.left) / rect.width - 0.5) * 10;
      const y = ((e.clientY - rect.top) / rect.height - 0.5) * 10;
      banner.style.backgroundPosition = `${50 + x}% ${50 + y}%`;
    });
    banner.addEventListener('mouseleave', () => {
      banner.style.backgroundPosition = '';
    });
  });


  // Solidify navigation bar on scroll for readability
  const navbar = document.querySelector('.navbar-custom');
  if (navbar) {
    window.addEventListener('scroll', () => {
      if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    });
  }

});
