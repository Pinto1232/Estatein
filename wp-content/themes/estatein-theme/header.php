<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Promotional Banner -->
<div class="promo-banner" id="promoBanner">
    <div class="promo-content">
        <span class="promo-text">✨ Discover Your Dream Property with Estatein</span>
        <a href="<?php echo home_url(); ?>#about" class="promo-link">Learn More</a>
    </div>
    <button class="promo-close" onclick="closePromoBanner()" aria-label="Close banner">
        <span>&times;</span>
    </button>
</div>

<header class="site-header">
    <div class="header-container">
        <div class="site-logo">
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo wp_upload_dir()['baseurl']; ?>/2025/07/Logo.png" alt="<?php bloginfo('name'); ?>" class="logo-image">
            </a>
        </div>
        
        <!-- Mobile Menu Toggle -->
        <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Toggle mobile menu">
            <img src="<?php echo wp_upload_dir()['baseurl']; ?>/2025/07/hamburger.png" alt="Menu" class="hamburger-icon">
        </button>
        
        <nav class="main-navigation" id="mainNavigation">
            <ul>
                <li><a href="<?php echo home_url(); ?>" <?php echo (is_home() || is_front_page()) && !isset($_GET['page']) ? 'class="active"' : ''; ?>>Home</a></li>
                <li><a href="<?php echo home_url('?page=about'); ?>" <?php echo (isset($_GET['page']) && $_GET['page'] == 'about') ? 'class="active"' : ''; ?>>About Us</a></li>
                <li><a href="<?php echo home_url('?page=properties'); ?>" <?php echo (isset($_GET['page']) && $_GET['page'] == 'properties') ? 'class="active"' : ''; ?>>Properties</a></li>
                <li><a href="<?php echo home_url('?page=services'); ?>" <?php echo (isset($_GET['page']) && $_GET['page'] == 'services') ? 'class="active"' : ''; ?>>Services</a></li>
            </ul>
        </nav>
        
        <!-- Contact Us Button (Desktop Only) -->
        <div class="header-cta">
            <a href="<?php echo home_url(); ?>#contact" class="contact-button">Contact Us</a>
        </div>
    </div>
</header>