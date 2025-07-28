<?php
/**
 * What Our Clients Say Section Template
 */
?>

<!-- What Our Clients Say Section -->
<section class="what-our-clients-say-section">
    <div class="container">
        <!-- Section Header -->
        <div class="section-header">
            <img src="<?php echo wp_upload_dir()['baseurl']; ?>/2025/07/Abstract-Design.png" alt="Abstract Design" class="section-header-image" loading="lazy">
            <h2 class="section-title">What Our Clients Say</h2>
            <div class="section-header-content">
                <p class="section-description">Read the success stories and heartfelt testimonials from our valued clients. Discover why they chose Estatein for their real estate needs.</p>
                <a href="#" class="view-testimonials-btn">View All Testimonials</a>
            </div>
        </div>

        <!-- Testimonials Grid -->
        <div class="testimonials-grid">
            <!-- Testimonial 1 -->
            <div class="testimonial-card">
                <div class="testimonial-content">
                    <div class="testimonial-rating">
                        <span class="star">⭐</span>
                        <span class="star">⭐</span>
                        <span class="star">⭐</span>
                        <span class="star">⭐</span>
                        <span class="star">⭐</span>
                    </div>
                    <h3 class="testimonial-title">Exceptional Service!</h3>
                    <p class="testimonial-description">Our experience with Estatein was outstanding. Their team's dedication and professionalism made finding our dream home a breeze. Highly recommended!</p>
                    
                    <div class="testimonial-footer">
                        <div class="client-info">
                            <div class="client-avatar">
                                <img src="<?php echo wp_upload_dir()['baseurl']; ?>/2025/07/client-1.png" alt="Wade Warren" loading="lazy">
                            </div>
                            <div class="client-details">
                                <span class="client-name">Wade Warren</span>
                                <span class="client-location">USA, California</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="testimonial-card">
                <div class="testimonial-content">
                    <div class="testimonial-rating">
                        <span class="star">⭐</span>
                        <span class="star">⭐</span>
                        <span class="star">⭐</span>
                        <span class="star">⭐</span>
                        <span class="star">⭐</span>
                    </div>
                    <h3 class="testimonial-title">Efficient and Reliable</h3>
                    <p class="testimonial-description">Estatein provided us with top-notch service. They helped us sell our property quickly and at a great price. We couldn't be happier with the results.</p>
                    
                    <div class="testimonial-footer">
                        <div class="client-info">
                            <div class="client-avatar">
                                <img src="<?php echo wp_upload_dir()['baseurl']; ?>/2025/07/client-2.png" alt="Emelie Thomson" loading="lazy">
                            </div>
                            <div class="client-details">
                                <span class="client-name">Emelie Thomson</span>
                                <span class="client-location">USA, Florida</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="testimonial-card">
                <div class="testimonial-content">
                    <div class="testimonial-rating">
                        <span class="star">⭐</span>
                        <span class="star">⭐</span>
                        <span class="star">⭐</span>
                        <span class="star">⭐</span>
                        <span class="star">⭐</span>
                    </div>
                    <h3 class="testimonial-title">Trusted Advisors</h3>
                    <p class="testimonial-description">The Estatein team guided us through the entire buying process. Their knowledge and commitment to our needs were impressive. Thank you for your support!</p>
                    
                    <div class="testimonial-footer">
                        <div class="client-info">
                            <div class="client-avatar">
                                <img src="<?php echo wp_upload_dir()['baseurl']; ?>/2025/07/client-3.png" alt="John Mans" loading="lazy">
                            </div>
                            <div class="client-details">
                                <span class="client-name">John Mans</span>
                                <span class="client-location">USA, Nevada</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="pagination-container">
            <div class="pagination-info">
                <span class="pagination-text">10 of 60</span>
            </div>
            <div class="pagination-controls">
                <button class="pagination-btn prev-btn" aria-label="Previous page">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 12H5M12 19L5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <button class="pagination-btn next-btn" aria-label="Next page">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 12H19M12 5L19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
        </div>

    </div>
</section>