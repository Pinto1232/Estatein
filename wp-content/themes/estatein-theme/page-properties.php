<?php get_header(); ?>

<main class="properties-page">
    <!-- Hero Section -->
    <section class="properties-hero">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">Our Properties</h1>
                <p class="hero-description">Discover your perfect home from our extensive collection of premium properties in prime locations.</p>
            </div>
        </div>
    </section>

    <!-- Filters Section -->
    <section class="properties-filters-section">
        <div class="container">
            <div class="filters-container">
                <div class="filter-group">
                    <label for="property-type">Property Type</label>
                    <select id="property-type" class="filter-select">
                        <option value="">All Types</option>
                        <option value="house">House</option>
                        <option value="apartment">Apartment</option>
                        <option value="condo">Condo</option>
                        <option value="villa">Villa</option>
                        <option value="townhouse">Townhouse</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label for="price-range">Price Range</label>
                    <select id="price-range" class="filter-select">
                        <option value="">Any Price</option>
                        <option value="0-500000">Under $500K</option>
                        <option value="500000-1000000">$500K - $1M</option>
                        <option value="1000000-2000000">$1M - $2M</option>
                        <option value="2000000+">$2M+</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label for="bedrooms">Bedrooms</label>
                    <select id="bedrooms" class="filter-select">
                        <option value="">Any</option>
                        <option value="1">1 Bedroom</option>
                        <option value="2">2 Bedrooms</option>
                        <option value="3">3 Bedrooms</option>
                        <option value="4">4+ Bedrooms</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label for="location">Location</label>
                    <select id="location" class="filter-select">
                        <option value="">All Locations</option>
                        <option value="downtown">Downtown</option>
                        <option value="suburbs">Suburbs</option>
                        <option value="waterfront">Waterfront</option>
                        <option value="hills">Hills</option>
                    </select>
                </div>
                
                <button class="filter-btn">
                    <i class="fas fa-search"></i>
                    Search Properties
                </button>
            </div>
        </div>
    </section>

    <!-- Properties Grid Section -->
    <section class="properties-grid-section">
        <div class="container">
            <div class="properties-section-header">
                <div class="results-info">
                    <h2 class="results-title">Featured Properties</h2>
                    <p class="results-count">Showing 12 of 156 properties</p>
                </div>
                <div class="view-options">
                    <button class="view-btn active" data-view="grid">
                        <i class="fas fa-th-large"></i>
                    </button>
                    <button class="view-btn" data-view="list">
                        <i class="fas fa-list"></i>
                    </button>
                </div>
            </div>
            
            <div class="properties-grid">
                <!-- Property 1 -->
                <div class="property-card">
                    <div class="property-image">
                        <img src="<?php echo wp_upload_dir()['baseurl']; ?>/2025/07/property-1.jpg" alt="Modern Villa">
                        <div class="property-badge">For Sale</div>
                        <div class="property-actions">
                            <button class="action-btn favorite-btn" title="Add to Favorites">
                                <i class="far fa-heart"></i>
                            </button>
                            <button class="action-btn share-btn" title="Share Property">
                                <i class="fas fa-share-alt"></i>
                            </button>
                        </div>
                    </div>
                    <div class="property-content">
                        <div class="property-price">$1,250,000</div>
                        <h3 class="property-title">Modern Luxury Villa</h3>
                        <p class="property-location">
                            <i class="fas fa-map-marker-alt"></i>
                            Beverly Hills, CA
                        </p>
                        <div class="property-features">
                            <div class="feature">
                                <i class="fas fa-bed"></i>
                                <span>4 Beds</span>
                            </div>
                            <div class="feature">
                                <i class="fas fa-bath"></i>
                                <span>3 Baths</span>
                            </div>
                            <div class="feature">
                                <i class="fas fa-ruler-combined"></i>
                                <span>3,200 sq ft</span>
                            </div>
                        </div>
                        <div class="property-footer">
                            <div class="agent-info">
                                <img src="<?php echo wp_upload_dir()['baseurl']; ?>/2025/07/agent-1.jpg" alt="Agent" class="agent-avatar">
                                <span class="agent-name">Sarah Johnson</span>
                            </div>
                            <a href="#" class="view-details-btn">View Details</a>
                        </div>
                    </div>
                </div>

                <!-- Property 2 -->
                <div class="property-card">
                    <div class="property-image">
                        <img src="<?php echo wp_upload_dir()['baseurl']; ?>/2025/07/property-2.jpg" alt="Downtown Apartment">
                        <div class="property-badge">For Rent</div>
                        <div class="property-actions">
                            <button class="action-btn favorite-btn" title="Add to Favorites">
                                <i class="far fa-heart"></i>
                            </button>
                            <button class="action-btn share-btn" title="Share Property">
                                <i class="fas fa-share-alt"></i>
                            </button>
                        </div>
                    </div>
                    <div class="property-content">
                        <div class="property-price">$3,500/month</div>
                        <h3 class="property-title">Downtown Luxury Apartment</h3>
                        <p class="property-location">
                            <i class="fas fa-map-marker-alt"></i>
                            Manhattan, NY
                        </p>
                        <div class="property-features">
                            <div class="feature">
                                <i class="fas fa-bed"></i>
                                <span>2 Beds</span>
                            </div>
                            <div class="feature">
                                <i class="fas fa-bath"></i>
                                <span>2 Baths</span>
                            </div>
                            <div class="feature">
                                <i class="fas fa-ruler-combined"></i>
                                <span>1,800 sq ft</span>
                            </div>
                        </div>
                        <div class="property-footer">
                            <div class="agent-info">
                                <img src="<?php echo wp_upload_dir()['baseurl']; ?>/2025/07/agent-2.jpg" alt="Agent" class="agent-avatar">
                                <span class="agent-name">John Smith</span>
                            </div>
                            <a href="#" class="view-details-btn">View Details</a>
                        </div>
                    </div>
                </div>

                <!-- Property 3 -->
                <div class="property-card">
                    <div class="property-image">
                        <img src="<?php echo wp_upload_dir()['baseurl']; ?>/2025/07/property-3.jpg" alt="Waterfront Condo">
                        <div class="property-badge">For Sale</div>
                        <div class="property-actions">
                            <button class="action-btn favorite-btn" title="Add to Favorites">
                                <i class="far fa-heart"></i>
                            </button>
                            <button class="action-btn share-btn" title="Share Property">
                                <i class="fas fa-share-alt"></i>
                            </button>
                        </div>
                    </div>
                    <div class="property-content">
                        <div class="property-price">$850,000</div>
                        <h3 class="property-title">Waterfront Condo</h3>
                        <p class="property-location">
                            <i class="fas fa-map-marker-alt"></i>
                            Miami Beach, FL
                        </p>
                        <div class="property-features">
                            <div class="feature">
                                <i class="fas fa-bed"></i>
                                <span>3 Beds</span>
                            </div>
                            <div class="feature">
                                <i class="fas fa-bath"></i>
                                <span>2 Baths</span>
                            </div>
                            <div class="feature">
                                <i class="fas fa-ruler-combined"></i>
                                <span>2,100 sq ft</span>
                            </div>
                        </div>
                        <div class="property-footer">
                            <div class="agent-info">
                                <img src="<?php echo wp_upload_dir()['baseurl']; ?>/2025/07/agent-3.jpg" alt="Agent" class="agent-avatar">
                                <span class="agent-name">Michael Brown</span>
                            </div>
                            <a href="#" class="view-details-btn">View Details</a>
                        </div>
                    </div>
                </div>

                <!-- Property 4 -->
                <div class="property-card">
                    <div class="property-image">
                        <img src="<?php echo wp_upload_dir()['baseurl']; ?>/2025/07/property-4.jpg" alt="Family House">
                        <div class="property-badge">For Sale</div>
                        <div class="property-actions">
                            <button class="action-btn favorite-btn" title="Add to Favorites">
                                <i class="far fa-heart"></i>
                            </button>
                            <button class="action-btn share-btn" title="Share Property">
                                <i class="fas fa-share-alt"></i>
                            </button>
                        </div>
                    </div>
                    <div class="property-content">
                        <div class="property-price">$675,000</div>
                        <h3 class="property-title">Suburban Family House</h3>
                        <p class="property-location">
                            <i class="fas fa-map-marker-alt"></i>
                            Austin, TX
                        </p>
                        <div class="property-features">
                            <div class="feature">
                                <i class="fas fa-bed"></i>
                                <span>4 Beds</span>
                            </div>
                            <div class="feature">
                                <i class="fas fa-bath"></i>
                                <span>3 Baths</span>
                            </div>
                            <div class="feature">
                                <i class="fas fa-ruler-combined"></i>
                                <span>2,800 sq ft</span>
                            </div>
                        </div>
                        <div class="property-footer">
                            <div class="agent-info">
                                <img src="<?php echo wp_upload_dir()['baseurl']; ?>/2025/07/agent-4.jpg" alt="Agent" class="agent-avatar">
                                <span class="agent-name">Emily Davis</span>
                            </div>
                            <a href="#" class="view-details-btn">View Details</a>
                        </div>
                    </div>
                </div>

                <!-- Property 5 -->
                <div class="property-card">
                    <div class="property-image">
                        <img src="<?php echo wp_upload_dir()['baseurl']; ?>/2025/07/property-5.jpg" alt="Modern Townhouse">
                        <div class="property-badge">For Rent</div>
                        <div class="property-actions">
                            <button class="action-btn favorite-btn" title="Add to Favorites">
                                <i class="far fa-heart"></i>
                            </button>
                            <button class="action-btn share-btn" title="Share Property">
                                <i class="fas fa-share-alt"></i>
                            </button>
                        </div>
                    </div>
                    <div class="property-content">
                        <div class="property-price">$2,800/month</div>
                        <h3 class="property-title">Modern Townhouse</h3>
                        <p class="property-location">
                            <i class="fas fa-map-marker-alt"></i>
                            Seattle, WA
                        </p>
                        <div class="property-features">
                            <div class="feature">
                                <i class="fas fa-bed"></i>
                                <span>3 Beds</span>
                            </div>
                            <div class="feature">
                                <i class="fas fa-bath"></i>
                                <span>2.5 Baths</span>
                            </div>
                            <div class="feature">
                                <i class="fas fa-ruler-combined"></i>
                                <span>2,200 sq ft</span>
                            </div>
                        </div>
                        <div class="property-footer">
                            <div class="agent-info">
                                <img src="<?php echo wp_upload_dir()['baseurl']; ?>/2025/07/agent-1.jpg" alt="Agent" class="agent-avatar">
                                <span class="agent-name">Sarah Johnson</span>
                            </div>
                            <a href="#" class="view-details-btn">View Details</a>
                        </div>
                    </div>
                </div>

                <!-- Property 6 -->
                <div class="property-card">
                    <div class="property-image">
                        <img src="<?php echo wp_upload_dir()['baseurl']; ?>/2025/07/property-6.jpg" alt="Penthouse">
                        <div class="property-badge">For Sale</div>
                        <div class="property-actions">
                            <button class="action-btn favorite-btn" title="Add to Favorites">
                                <i class="far fa-heart"></i>
                            </button>
                            <button class="action-btn share-btn" title="Share Property">
                                <i class="fas fa-share-alt"></i>
                            </button>
                        </div>
                    </div>
                    <div class="property-content">
                        <div class="property-price">$2,100,000</div>
                        <h3 class="property-title">Luxury Penthouse</h3>
                        <p class="property-location">
                            <i class="fas fa-map-marker-alt"></i>
                            Chicago, IL
                        </p>
                        <div class="property-features">
                            <div class="feature">
                                <i class="fas fa-bed"></i>
                                <span>3 Beds</span>
                            </div>
                            <div class="feature">
                                <i class="fas fa-bath"></i>
                                <span>3 Baths</span>
                            </div>
                            <div class="feature">
                                <i class="fas fa-ruler-combined"></i>
                                <span>2,500 sq ft</span>
                            </div>
                        </div>
                        <div class="property-footer">
                            <div class="agent-info">
                                <img src="<?php echo wp_upload_dir()['baseurl']; ?>/2025/07/agent-2.jpg" alt="Agent" class="agent-avatar">
                                <span class="agent-name">John Smith</span>
                            </div>
                            <a href="#" class="view-details-btn">View Details</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Load More Button -->
            <div class="load-more-container">
                <button class="load-more-btn">
                    <span>Load More Properties</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Featured Neighborhoods -->
    <section class="neighborhoods-section">
        <div class="container">
            <div class="properties-section-header">
                <h2 class="properties-section-title">Popular Neighborhoods</h2>
                <p class="properties-section-description">Explore properties in the most sought-after neighborhoods.</p>
            </div>
            
            <div class="neighborhoods-grid">
                <div class="neighborhood-card">
                    <div class="neighborhood-image">
                        <img src="<?php echo wp_upload_dir()['baseurl']; ?>/2025/07/neighborhood-1.jpg" alt="Beverly Hills">
                    </div>
                    <div class="neighborhood-content">
                        <h3 class="neighborhood-name">Beverly Hills</h3>
                        <p class="neighborhood-properties">45 Properties Available</p>
                        <p class="neighborhood-price">Avg. Price: $1.2M</p>
                    </div>
                </div>

                <div class="neighborhood-card">
                    <div class="neighborhood-image">
                        <img src="<?php echo wp_upload_dir()['baseurl']; ?>/2025/07/neighborhood-2.jpg" alt="Manhattan">
                    </div>
                    <div class="neighborhood-content">
                        <h3 class="neighborhood-name">Manhattan</h3>
                        <p class="neighborhood-properties">78 Properties Available</p>
                        <p class="neighborhood-price">Avg. Price: $950K</p>
                    </div>
                </div>

                <div class="neighborhood-card">
                    <div class="neighborhood-image">
                        <img src="<?php echo wp_upload_dir()['baseurl']; ?>/2025/07/neighborhood-3.jpg" alt="Miami Beach">
                    </div>
                    <div class="neighborhood-content">
                        <h3 class="neighborhood-name">Miami Beach</h3>
                        <p class="neighborhood-properties">32 Properties Available</p>
                        <p class="neighborhood-price">Avg. Price: $750K</p>
                    </div>
                </div>

                <div class="neighborhood-card">
                    <div class="neighborhood-image">
                        <img src="<?php echo wp_upload_dir()['baseurl']; ?>/2025/07/neighborhood-4.jpg" alt="Downtown Austin">
                    </div>
                    <div class="neighborhood-content">
                        <h3 class="neighborhood-name">Downtown Austin</h3>
                        <p class="neighborhood-properties">56 Properties Available</p>
                        <p class="neighborhood-price">Avg. Price: $650K</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>