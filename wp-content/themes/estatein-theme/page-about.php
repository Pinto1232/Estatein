<main class="site-main">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <div class="hero-layout">
                <!-- Left Side -->
                <div class="hero-left">
                    <div class="container">
                        <h1 class="hero-title">About Estatein</h1>
                        <p class="hero-subtitle">Your trusted partner in real estate. We're committed to helping you find the perfect property and making your real estate dreams come true.</p>
                        <div class="hero-cta-buttons">
                            <a href="#team" class="cta-button primary">Meet Our Team</a>
                            <a href="<?php echo home_url('/contact'); ?>" class="cta-button secondary">Contact Us</a>
                        </div>
                        
                        <div class="hero-cards-section">
                            <div class="hero-card">
                                <div class="hero-card-content">
                                    <h3>15+</h3>
                                    <p>Years Experience</p>
                                </div>
                            </div>
                            <div class="hero-card">
                                <div class="hero-card-content">
                                    <h3>500+</h3>
                                    <p>Properties Sold</p>
                                </div>
                            </div>
                            <div class="hero-card">
                                <div class="hero-card-content">
                                    <h3>98%</h3>
                                    <p>Client Satisfaction</p>
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
            </div>
        </div>
    </section>

    <!-- Include Four Cards Section -->
    <?php include(get_template_directory() . '/template-parts/four-cards-section.php'); ?>
    
    </main>