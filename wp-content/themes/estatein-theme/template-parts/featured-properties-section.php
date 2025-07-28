<?php
/**
 * Featured Properties Section Template
 */
?>

<!-- Featured Properties Section -->
<section class="featured-properties-section">
    <div class="container">
        <!-- Section Header -->
        <div class="section-header">
            <img src="<?php echo wp_upload_dir()['baseurl']; ?>/2025/07/Abstract-Design.png" alt="Abstract Design" class="section-header-image" loading="lazy">
            <h2 class="section-title">Featured Properties</h2>
            <div class="section-header-content">
                <p class="section-description">Explore our handpicked selection of featured properties. Each listing offers a glimpse into exceptional homes and investments available through Estatein. Click "View Details" for more information.</p>
                <a href="<?php echo home_url('/?page=properties'); ?>" class="view-properties-btn">View Properties</a>
            </div>
        </div>

        <!-- Properties Grid -->
        <div class="properties-grid">
            <!-- Property 1 -->
            <div class="property-card">
                <div class="property-image">
                    <img src="<?php echo wp_upload_dir()['baseurl']; ?>/2025/07/Image-1.png" alt="Seaside Serenity Villa" loading="lazy">
                </div>
                <div class="property-content">
                    <h3 class="property-title">Seaside Serenity Villa</h3>
                    <p class="property-description">A stunning 4-bedroom, 3-bathroom villa in a peaceful suburban neighborhood... <span class="read-more">Read More</span></p>
                    
                    <div class="property-features">
                        <div class="feature">
                            <span class="feature-icon">🛏️</span>
                            <span class="feature-text">4-Bedroom</span>
                        </div>
                        <div class="feature">
                            <span class="feature-icon">🚿</span>
                            <span class="feature-text">3-Bathroom</span>
                        </div>
                        <div class="feature">
                            <span class="feature-icon">🏠</span>
                            <span class="feature-text">Villa</span>
                        </div>
                    </div>

                    <div class="property-footer">
                        <div class="property-price">
                            <span class="price-label">Price</span>
                            <span class="price">$550,000</span>
                        </div>
                        <a href="#" class="view-details-btn">View Property Details</a>
                    </div>
                </div>
            </div>

            <!-- Property 2 -->
            <div class="property-card">
                <div class="property-image">
                    <img src="<?php echo wp_upload_dir()['baseurl']; ?>/2025/07/Image-2.png" alt="Metropolitan Haven" loading="lazy">
                </div>
                <div class="property-content">
                    <h3 class="property-title">Metropolitan Haven</h3>
                    <p class="property-description">A chic and fully-furnished 2-bedroom apartment with panoramic city views... <span class="read-more">Read More</span></p>
                    
                    <div class="property-features">
                        <div class="feature">
                            <span class="feature-icon">🛏️</span>
                            <span class="feature-text">2-Bedroom</span>
                        </div>
                        <div class="feature">
                            <span class="feature-icon">🚿</span>
                            <span class="feature-text">2-Bathroom</span>
                        </div>
                        <div class="feature">
                            <span class="feature-icon">🏢</span>
                            <span class="feature-text">Apartment</span>
                        </div>
                    </div>

                    <div class="property-footer">
                        <div class="property-price">
                            <span class="price-label">Price</span>
                            <span class="price">$750,000</span>
                        </div>
                        <a href="#" class="view-details-btn">View Property Details</a>
                    </div>
                </div>
            </div>

            <!-- Property 3 -->
            <div class="property-card">
                <div class="property-image">
                    <img src="<?php echo wp_upload_dir()['baseurl']; ?>/2025/07/Image-3.png" alt="Rustic Retreat Cottage" loading="lazy">
                </div>
                <div class="property-content">
                    <h3 class="property-title">Rustic Retreat Cottage</h3>
                    <p class="property-description">An elegant 3-bedroom, 2.5-bathroom townhouse in a gated community... <span class="read-more">Read More</span></p>
                    
                    <div class="property-features">
                        <div class="feature">
                            <span class="feature-icon">🛏️</span>
                            <span class="feature-text">3-Bedroom</span>
                        </div>
                        <div class="feature">
                            <span class="feature-icon">🚿</span>
                            <span class="feature-text">2-Bathroom</span>
                        </div>
                        <div class="feature">
                            <span class="feature-icon">🏡</span>
                            <span class="feature-text">Cottage</span>
                        </div>
                    </div>

                    <div class="property-footer">
                        <div class="property-price">
                            <span class="price-label">Price</span>
                            <span class="price">$425,000</span>
                        </div>
                        <a href="#" class="view-details-btn">View Property Details</a>
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