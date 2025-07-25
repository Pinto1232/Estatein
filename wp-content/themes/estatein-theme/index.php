<?php 
get_header(); 

// Check if a specific page is requested via query parameter
$requested_page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Include the appropriate page template based on the request
switch($requested_page) {
    case 'about':
        include(get_template_directory() . '/page-about.php');
        break;
    case 'properties':
        include(get_template_directory() . '/page-properties.php');
        break;
    case 'services':
        include(get_template_directory() . '/page-services.php');
        break;
    default:
        // Default home page content
        ?>
        <main class="site-main">
            <!-- Hero Section -->
            <section class="hero-section">
                <div class="hero-overlay"></div>
                <div class="hero-content">
                    <div class="hero-layout">
                        <!-- Left Side -->
                        <div class="hero-left">
                            <div class="container">
                                <h1 class="hero-title">Discover Your Dream Property with Estatein</h1>
                                <p class="hero-subtitle">Your journey to finding the perfect property begins here. Explore our listings to find the home that matches your dreams.</p>
                                <div class="hero-cta-buttons">
                                    <a href="#properties" class="cta-button primary">Learn More</a>
                                    <a href="<?php echo home_url('/contact'); ?>" class="cta-button secondary">Browse Properties</a>
                                </div>
                                
                                <div class="hero-cards-section">
                                    <div class="hero-card">
                                        <div class="hero-card-content">
                                            <h3>200+</h3>
                                            <p>Happy Customers</p>
                                        </div>
                                    </div>
                                    <div class="hero-card">
                                        <div class="hero-card-content">
                                            <h3>10k+</h3>
                                            <p>Properties For Clients</p>
                                        </div>
                                    </div>
                                    <div class="hero-card">
                                        <div class="hero-card-content">
                                            <h3>16+</h3>
                                            <p>Years of Experience</p>
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
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <?php
        break;
}

get_footer(); 
?>