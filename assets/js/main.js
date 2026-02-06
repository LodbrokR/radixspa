/**
 * Mobile Menu Toggle and Custom Interactions
 */

document.addEventListener('DOMContentLoaded', function () {
    // Mobile Menu Toggle
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuToggle && mobileMenu) {
        // Toggle menu
        mobileMenuToggle.addEventListener('click', function (e) {
            e.stopPropagation(); // Prevent event bubbling
            mobileMenu.classList.toggle('hidden');

            // Toggle icon
            const icon = this.querySelector('.material-symbols-outlined');
            if (icon) {
                icon.textContent = mobileMenu.classList.contains('hidden') ? 'menu' : 'close';
            }
        });

        // Close menu when clicking outside
        document.addEventListener('click', function (e) {
            if (!mobileMenu.contains(e.target) && !mobileMenuToggle.contains(e.target) && !mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('hidden');
                // Reset icon
                const icon = mobileMenuToggle.querySelector('.material-symbols-outlined');
                if (icon) {
                    icon.textContent = 'menu';
                }
            }
        });

        // Close menu when clicking a link inside it
        const mobileLinks = mobileMenu.querySelectorAll('a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', function () {
                mobileMenu.classList.add('hidden');
                // Reset icon
                const icon = mobileMenuToggle.querySelector('.material-symbols-outlined');
                if (icon) {
                    icon.textContent = 'menu';
                }
            });
        });
    }

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href !== '#' && href.length > 1) {
                // Only prevent default if target exists on page
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });

    // Add animation on scroll (optional enhancement)
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function (entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in-up');
            }
        });
    }, observerOptions);

    // Observe service cards and other elements
    document.querySelectorAll('.group, .prose, h2, h3').forEach(el => {
        observer.observe(el);
    });

    // Fix image loading opacity issue
    document.querySelectorAll('img').forEach(img => {
        img.classList.add('loaded');
        if (img.complete) {
            img.classList.add('loaded');
        } else {
            img.addEventListener('load', function () {
                this.classList.add('loaded');
            });
        }
    });
});
