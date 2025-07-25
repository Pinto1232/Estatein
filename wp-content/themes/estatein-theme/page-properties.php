<main class="site-main">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <div class="hero-layout">
                <!-- Left Side -->
                <div class="hero-left">
                    <div class="container">
                        <h1 class="hero-title">Find Your Perfect Property</h1>
                        <p class="hero-subtitle">Explore our extensive collection of premium properties. From luxury homes to commercial spaces, we have something for everyone.</p>
                        <div class="hero-cta-buttons">
                            <a href="#search" class="cta-button primary">Search Properties</a>
                            <a href="<?php echo home_url('/contact'); ?>" class="cta-button secondary">Schedule Viewing</a>
                        </div>
                        
                        <div class="hero-cards-section">
                            <div class="hero-card">
                                <div class="hero-card-content">
                                    <h3>1000+</h3>
                                    <p>Available Properties</p>
                                </div>
                            </div>
                            <div class="hero-card">
                                <div class="hero-card-content">
                                    <h3>50+</h3>
                                    <p>Prime Locations</p>
                                </div>
                            </div>
                            <div class="hero-card">
                                <div class="hero-card-content">
                                    <h3>24/7</h3>
                                    <p>Support Available</p>
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