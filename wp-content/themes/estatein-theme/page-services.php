<main class="site-main">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <div class="hero-layout">
                <!-- Left Side -->
                <div class="hero-left">
                    <div class="container">
                        <h1 class="hero-title">Our Real Estate Services</h1>
                        <p class="hero-subtitle">Comprehensive real estate solutions tailored to your needs. From buying and selling to property management, we've got you covered.</p>
                        <div class="hero-cta-buttons">
                            <a href="#services" class="cta-button primary">Explore Services</a>
                            <a href="<?php echo home_url('/contact'); ?>" class="cta-button secondary">Get Quote</a>
                        </div>
                        
                        <div class="hero-cards-section">
                            <div class="hero-card">
                                <div class="hero-card-content">
                                    <h3>10+</h3>
                                    <p>Service Categories</p>
                                </div>
                            </div>
                            <div class="hero-card">
                                <div class="hero-card-content">
                                    <h3>24/7</h3>
                                    <p>Customer Support</p>
                                </div>
                            </div>
                            <div class="hero-card">
                                <div class="hero-card-content">
                                    <h3>100%</h3>
                                    <p>Satisfaction Guarantee</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Center Image (Large Screens Only) -->
                <div class="hero-center">
                    <img src="<?php echo wp_upload_dir()['baseurl']; ?>/2025/07/round-logo.png" 
                         alt="Estatein Logo" 
                         class="center-logo">
                </div>
                
                <!-- Right Side -->
                <div class="hero-right">
                    <div class="mobile-round-logo">
                        <img src="<?php echo wp_upload_dir()['baseurl']; ?>/2025/07/round-logo.png" alt="Estatein Logo" class="mobile-logo-image">
                    </div>
                </div>
            </div</div>
    </section>

    <!-- Include Four Cards Section -->
    <?php include(get_template_directory() . '/template-parts/four-cards-section.php'); ?>

    </main>