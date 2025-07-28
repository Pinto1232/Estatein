// Estatein Theme JavaScript

// Function to close promotional banner
function closePromoBanner() {
    const promoBanner = document.getElementById('promoBanner');
    const siteHeader = document.querySelector('.site-header');
    const heroSection = document.querySelector('.hero-section');
    
    if (promoBanner) {
        promoBanner.classList.add('hidden');
        
        // Update header and hero section positions
        setTimeout(() => {
            if (siteHeader) {
                siteHeader.classList.add('promo-closed');
            }
            if (heroSection) {
                heroSection.classList.add('promo-closed');
            }
        }, 300);
    }
}

document.addEventListener('DOMContentLoaded', function() {
    // Navigation active state management
    const navLinks = document.querySelectorAll('.main-navigation a');
    
    // Function to set active navigation link
    function setActiveNavLink(clickedLink) {
        // Remove active class from all links
        navLinks.forEach(link => {
            link.classList.remove('active');
        });
        
        // Add active class to clicked link
        clickedLink.classList.add('active');
        
        // Store active link in localStorage for persistence
        localStorage.setItem('activeNavLink', clickedLink.getAttribute('href'));
    }
    
    // Check for stored active link on page load
    const storedActiveLink = localStorage.getItem('activeNavLink');
    if (storedActiveLink) {
        const linkToActivate = document.querySelector(`.main-navigation a[href="${storedActiveLink}"]`);
        if (linkToActivate) {
            linkToActivate.classList.add('active');
        }
    }
    
    // Add click event listeners to navigation links
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            setActiveNavLink(this);
        });
    });
    
    // Smooth scrolling for anchor links
    const links = document.querySelectorAll('a[href^="#"]');
    
    links.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            
            // Skip if href is just '#' or empty
            if (!targetId || targetId === '#' || targetId.length <= 1) {
                return;
            }
            
            const targetSection = document.querySelector(targetId);
            
            if (targetSection) {
                targetSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Mobile menu toggle
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const navigation = document.querySelector('.main-navigation');
    
    if (mobileMenuToggle && navigation) {
        // Set initial aria-expanded state
        mobileMenuToggle.setAttribute('aria-expanded', 'false');
        
        mobileMenuToggle.addEventListener('click', function() {
            navigation.classList.toggle('active');
            
            // Toggle aria-expanded for accessibility
            const isExpanded = navigation.classList.contains('active');
            mobileMenuToggle.setAttribute('aria-expanded', isExpanded);
        });
        
        // Close mobile menu when clicking on a link
        const navLinks = navigation.querySelectorAll('a');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                navigation.classList.remove('active');
                mobileMenuToggle.setAttribute('aria-expanded', 'false');
            });
        });
        
        // Close mobile menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!navigation.contains(e.target) && !mobileMenuToggle.contains(e.target)) {
                navigation.classList.remove('active');
                mobileMenuToggle.setAttribute('aria-expanded', 'false');
            }
        });
        
        // Close mobile menu on window resize if screen becomes larger
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                navigation.classList.remove('active');
                mobileMenuToggle.setAttribute('aria-expanded', 'false');
            }
        });
    }
    
    // Property card hover effects
    const propertyCards = document.querySelectorAll('.property-card');
    
    propertyCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
    
    // Contact form validation (basic)
    const contactForm = document.querySelector('.contact-form');
    
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            const requiredFields = this.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.style.borderColor = '#e74c3c';
                } else {
                    field.style.borderColor = '#ecf0f1';
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                alert('Please fill in all required fields.');
            }
        });
    }
});