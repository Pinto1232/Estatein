/**
 * Testimonials Carousel JavaScript
 * Handles the carousel functionality for the "What Our Clients Say" section
 */


class TestimonialsCarousel {
    constructor() {
        this.carousel = document.querySelector('.testimonials-carousel');
        this.track = document.querySelector('.testimonials-track');
        this.cards = document.querySelectorAll('.testimonial-card');
        this.prevBtn = document.querySelector('.testimonials-prev-btn');
        this.nextBtn = document.querySelector('.testimonials-next-btn');
        this.paginationText = document.querySelector('.testimonials-pagination-text');
        
        this.currentIndex = 0;
        this.totalCards = this.cards.length;
        this.cardsPerView = this.getCardsPerView();
        this.maxIndex = Math.max(0, this.totalCards - this.cardsPerView);
        
        console.log('Carousel constructor values:', {
            currentIndex: this.currentIndex,
            totalCards: this.totalCards,
            cardsPerView: this.cardsPerView,
            maxIndex: this.maxIndex,
            windowWidth: window.innerWidth
        });
        
        this.init();
    }

    init() {
        if (!this.carousel || !this.track || this.cards.length === 0) {
            console.warn('Testimonials carousel elements not found');
            return;
        }

        this.setupEventListeners();
        this.updateCarousel(); // Set initial layout
        
        // Handle window resize
        window.addEventListener('resize', this.handleResize.bind(this));
        
        // Add keyboard navigation
        this.setupKeyboardNavigation();
        
        // Add touch/swipe support
        this.setupTouchNavigation();
    }

    getCardsPerView() {
        const width = window.innerWidth;
        if (width <= 768) return 1;
        if (width <= 1024) return 2;
        return 3;
    }

    setupEventListeners() {
        console.log('=== SETTING UP EVENT LISTENERS ===');
        console.log('prevBtn:', this.prevBtn);
        console.log('nextBtn:', this.nextBtn);
        console.log('prevBtn classes:', this.prevBtn?.className);
        console.log('nextBtn classes:', this.nextBtn?.className);
        
        if (this.prevBtn) {
            console.log('✅ Adding click listener to prev button');
            this.prevBtn.addEventListener('click', (e) => {
                console.log('🔥 PREVIOUS BUTTON CLICKED - CLASS METHOD');
                console.log('Event details:', e);
                console.log('Button that was clicked:', e.target);
                console.log('Current button:', this.prevBtn);
                e.preventDefault();
                e.stopPropagation();
                console.log('About to call goToPrevious()...');
                this.goToPrevious();
            });
            
            // Test if button is clickable
            console.log('Testing if prev button is clickable...');
            console.log('Button disabled?', this.prevBtn.disabled);
            console.log('Button style display:', getComputedStyle(this.prevBtn).display);
            console.log('Button style visibility:', getComputedStyle(this.prevBtn).visibility);
        } else {
            console.error('❌ prevBtn not found!');
        }
        
        if (this.nextBtn) {
            console.log('✅ Adding click listener to next button');
            this.nextBtn.addEventListener('click', (e) => {
                console.log('🔥 NEXT BUTTON CLICKED - CLASS METHOD');
                console.log('Event details:', e);
                console.log('Button that was clicked:', e.target);
                console.log('Current button:', this.nextBtn);
                e.preventDefault();
                e.stopPropagation();
                console.log('About to call goToNext()...');
                this.goToNext();
            });
            
            // Test if button is clickable
            console.log('Testing if next button is clickable...');
            console.log('Button disabled?', this.nextBtn.disabled);
            console.log('Button style display:', getComputedStyle(this.nextBtn).display);
            console.log('Button style visibility:', getComputedStyle(this.nextBtn).visibility);
        } else {
            console.error('❌ nextBtn not found!');
        }
        
        console.log('=== EVENT LISTENERS SETUP COMPLETE ===');
    }

    setupKeyboardNavigation() {
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') {
                e.preventDefault();
                this.goToPrevious();
            } else if (e.key === 'ArrowRight') {
                e.preventDefault();
                this.goToNext();
            }
        });
    }

    setupTouchNavigation() {
        let startX = 0;
        let endX = 0;
        const minSwipeDistance = 50;

        this.track.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
        }, { passive: true });

        this.track.addEventListener('touchend', (e) => {
            endX = e.changedTouches[0].clientX;
            const swipeDistance = Math.abs(endX - startX);
            
            if (swipeDistance > minSwipeDistance) {
                if (endX < startX) {
                    // Swipe left - go to next
                    this.goToNext();
                } else {
                    // Swipe right - go to previous
                    this.goToPrevious();
                }
            }
        }, { passive: true });
    }

    goToNext() {
        console.log('goToNext called - current state:', {
            currentIndex: this.currentIndex,
            maxIndex: this.maxIndex,
            totalCards: this.totalCards
        });
        
        // Continuous scrolling: loop back to start when reaching the end
        if (this.currentIndex < this.maxIndex) {
            this.currentIndex++;
        } else {
            this.currentIndex = 0; // Loop back to beginning
        }
        
        console.log('Moving to slide:', this.currentIndex);
        this.updateCarousel();
    }

    goToPrevious() {
        console.log('goToPrevious called - current state:', {
            currentIndex: this.currentIndex,
            maxIndex: this.maxIndex,
            totalCards: this.totalCards
        });
        
        // Continuous scrolling: loop to end when at beginning
        if (this.currentIndex > 0) {
            this.currentIndex--;
        } else {
            this.currentIndex = this.maxIndex; // Loop to end
        }
        
        console.log('Moving to slide:', this.currentIndex);
        this.updateCarousel();
    }

    goToSlide(index) {
        if (index >= 0 && index <= this.maxIndex) {
            this.currentIndex = index;
            this.updateCarousel();
        }
    }

    updateCarousel() {
        console.log('🎠 === UPDATE CAROUSEL CALLED ===');
        
        if (this.cards.length === 0) {
            console.log('❌ No cards found, returning early');
            return;
        }
        
        console.log('📏 Getting container dimensions...');
        const containerWidth = this.carousel.offsetWidth;
        const gap = 32;
        
        console.log('Container width:', containerWidth);
        console.log('Gap:', gap);
        console.log('Cards per view:', this.cardsPerView);
        
        // Calculate card width based on container and cards per view
        const cardWidth = (containerWidth - (gap * (this.cardsPerView - 1))) / this.cardsPerView;
        console.log('Calculated card width:', cardWidth);
        
        // Set the actual card widths
        console.log('🎯 Setting card widths...');
        this.cards.forEach((card, index) => {
            const oldWidth = card.style.width;
            card.style.width = `${cardWidth}px`;
            card.style.flexShrink = '0';
            console.log(`Card ${index}: ${oldWidth} → ${cardWidth}px`);
        });
        
        // Calculate the translate distance
        const translateX = -(this.currentIndex * (cardWidth + gap));
        
        console.log('🚀 CAROUSEL UPDATE DETAILS:', {
            currentIndex: this.currentIndex,
            cardsPerView: this.cardsPerView,
            containerWidth: containerWidth,
            cardWidth: cardWidth,
            gap: gap,
            translateX: translateX,
            calculation: `-(${this.currentIndex} * (${cardWidth} + ${gap})) = ${translateX}`
        });
        
        // Check current transform before changing
        const currentTransform = this.track.style.transform;
        console.log('Current transform:', currentTransform);
        
        // Apply the transform
        console.log('🎯 Applying transform:', `translateX(${translateX}px)`);
        this.track.style.transform = `translateX(${translateX}px)`;
        
        // Verify the transform was applied
        setTimeout(() => {
            const newTransform = this.track.style.transform;
            console.log('Transform after setting:', newTransform);
            console.log('Transform applied successfully?', newTransform === `translateX(${translateX}px)`);
            
            // Check computed style too
            const computedTransform = getComputedStyle(this.track).transform;
            console.log('Computed transform:', computedTransform);
        }, 10);
        
        console.log('📊 Updating pagination and button states...');
        this.updatePagination();
        this.updateButtonStates();
        this.updateCardVisibility();
        
        console.log('🎠 === UPDATE CAROUSEL COMPLETE ===');
    }

    updatePagination() {
        if (this.paginationText) {
            // Calculate which cards are currently visible
            const firstVisibleCard = this.currentIndex + 1;
            const lastVisibleCard = Math.min(this.currentIndex + this.cardsPerView, this.totalCards);
            
            console.log('📊 Pagination update:', {
                currentIndex: this.currentIndex,
                cardsPerView: this.cardsPerView,
                totalCards: this.totalCards,
                firstVisibleCard: firstVisibleCard,
                lastVisibleCard: lastVisibleCard
            });
            
            // Display format: "1-3 of 6" or "4-6 of 6" etc.
            if (firstVisibleCard === lastVisibleCard) {
                // Only one card visible
                this.paginationText.textContent = `${firstVisibleCard} of ${this.totalCards}`;
            } else {
                // Multiple cards visible
                this.paginationText.textContent = `${firstVisibleCard}-${lastVisibleCard} of ${this.totalCards}`;
            }
            
            console.log('📊 Pagination text set to:', this.paginationText.textContent);
        }
    }

    updateButtonStates() {
        // With continuous scrolling, buttons are always enabled
        if (this.prevBtn) {
            this.prevBtn.disabled = false;
            this.prevBtn.style.opacity = '1';
        }
        
        if (this.nextBtn) {
            this.nextBtn.disabled = false;
            this.nextBtn.style.opacity = '1';
        }
    }

    updateCardVisibility() {
        this.cards.forEach((card, index) => {
            const isVisible = index >= this.currentIndex && 
                            index < this.currentIndex + this.cardsPerView;
            
            // Add/remove active class for animations
            if (isVisible) {
                card.classList.add('active');
            } else {
                card.classList.remove('active');
            }
        });
    }

    handleResize() {
        const newCardsPerView = this.getCardsPerView();
        
        if (newCardsPerView !== this.cardsPerView) {
            this.cardsPerView = newCardsPerView;
            this.maxIndex = Math.max(0, this.totalCards - this.cardsPerView);
            
            // Adjust current index if needed
            if (this.currentIndex > this.maxIndex) {
                this.currentIndex = this.maxIndex;
            }
            
            this.updateCarousel();
        }
    }

    // Auto-play functionality (optional)
    startAutoPlay(interval = 5000) {
        this.autoPlayInterval = setInterval(() => {
            this.goToNext(); // Use continuous scrolling
        }, interval);
    }

    stopAutoPlay() {
        if (this.autoPlayInterval) {
            clearInterval(this.autoPlayInterval);
            this.autoPlayInterval = null;
        }
    }

    // Pause auto-play on hover
    setupAutoPlayPause() {
        this.carousel.addEventListener('mouseenter', () => this.stopAutoPlay());
        this.carousel.addEventListener('mouseleave', () => this.startAutoPlay());
    }

    // Public method to refresh carousel (useful for dynamic content)
    refresh() {
        this.cards = document.querySelectorAll('.testimonial-card');
        this.totalCards = this.cards.length;
        this.cardsPerView = this.getCardsPerView();
        this.maxIndex = Math.max(0, this.totalCards - this.cardsPerView);
        
        if (this.currentIndex > this.maxIndex) {
            this.currentIndex = this.maxIndex;
        }
        
        this.updateCarousel();
    }
}

// Add immediate debug log
console.log('Testimonials carousel script file loaded');

// Initialize carousel when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    console.log('DOM Content Loaded - Starting carousel initialization');
    
    // Wait a bit for all elements to be rendered
    setTimeout(() => {
        console.log('Delayed initialization starting...');
        
        // Check if elements exist
        const carousel = document.querySelector('.testimonials-carousel');
        const track = document.querySelector('.testimonials-track');
        const cards = document.querySelectorAll('.testimonial-card');
        const prevBtn = document.querySelector('.testimonials-prev-btn');
        const nextBtn = document.querySelector('.testimonials-next-btn');
        const paginationText = document.querySelector('.testimonials-pagination-text');
        
        console.log('Detailed element check:', {
            carousel: carousel,
            track: track,
            cards: cards,
            prevBtn: prevBtn,
            nextBtn: nextBtn,
            paginationText: paginationText
        });
        
        console.log('Element existence:', {
            carousel: !!carousel,
            track: !!track,
            cards: cards.length,
            prevBtn: !!prevBtn,
            nextBtn: !!nextBtn,
            paginationText: !!paginationText
        });
        
        // Check if the section exists at all
        const section = document.querySelector('.what-our-clients-say-section');
        console.log('Section exists:', !!section);
        
        if (section) {
            console.log('Section HTML:', section.innerHTML.substring(0, 200) + '...');
        }
        
        if (carousel && track && cards.length > 0 && prevBtn && nextBtn) {
            try {
                const carouselInstance = new TestimonialsCarousel();
                console.log('Carousel initialized successfully');
                
                // Make carousel globally accessible for debugging or external control
                window.testimonialsCarousel = carouselInstance;
                
                // Test button clicks manually
                console.log('Adding test click listeners...');
                prevBtn.addEventListener('click', (e) => {
                    console.log('MANUAL: Previous button clicked', e);
                    console.log('Button element:', prevBtn);
                    console.log('Event target:', e.target);
                });
                nextBtn.addEventListener('click', (e) => {
                    console.log('MANUAL: Next button clicked', e);
                    console.log('Button element:', nextBtn);
                    console.log('Event target:', e.target);
                });
                
                // Also test if we can manually trigger the carousel
                console.log('Testing manual carousel trigger...');
                setTimeout(() => {
                    console.log('Manually calling goToNext...');
                    carouselInstance.goToNext();
                }, 2000);
                
            } catch (error) {
                console.error('Error initializing carousel:', error);
            }
        } else {
            console.error('Carousel initialization failed - missing elements');
            console.error('Missing elements details:', {
                carousel: !carousel ? 'MISSING' : 'OK',
                track: !track ? 'MISSING' : 'OK',
                cards: cards.length === 0 ? 'NO CARDS' : `${cards.length} cards`,
                prevBtn: !prevBtn ? 'MISSING' : 'OK',
                nextBtn: !nextBtn ? 'MISSING' : 'OK'
            });
        }
    }, 1000); // Wait 1 second
});

// Also try immediate initialization
console.log('Trying immediate initialization...');
if (document.readyState === 'loading') {
    console.log('Document still loading...');
} else {
    console.log('Document already loaded, trying immediate init...');
    // Document already loaded, try immediate initialization
    setTimeout(() => {
        const carousel = document.querySelector('.testimonials-carousel');
        console.log('Immediate check - carousel found:', !!carousel);
    }, 100);
}

// Export for module systems
if (typeof module !== 'undefined' && module.exports) {
    module.exports = TestimonialsCarousel;
}