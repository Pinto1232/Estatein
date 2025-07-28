<?php
// Estatein Theme Functions

// Theme setup
function estatein_theme_setup() {
    // Add theme support for various features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => 'Primary Menu',
        'footer' => 'Footer Menu'
    ));
}
add_action('after_setup_theme', 'estatein_theme_setup');

// Enqueue styles and scripts
function estatein_enqueue_scripts() {
    // Enqueue Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');
    
    wp_enqueue_style('estatein-style', get_stylesheet_uri(), array('font-awesome'), '1.0.0');
    
    // Enqueue Featured Properties Section CSS
    wp_enqueue_style('featured-properties-section', get_template_directory_uri() . '/css/featured-properties-section.css', array('estatein-style'), '1.0.1');
    
    // Enqueue What Our Clients Say Section CSS
    wp_enqueue_style('what-our-clients-say-section', get_template_directory_uri() . '/css/what-our-clients-say-section.css', array('estatein-style'), '1.0.1');
    
    // Enqueue Start Journey Section CSS
    wp_enqueue_style('start-journey-section', get_template_directory_uri() . '/css/start-journey-section.css', array('estatein-style'), '1.0.1');
    
    // Enqueue Start Real Estate Journey Section CSS
    wp_enqueue_style('start-real-estate-journey-section', get_template_directory_uri() . '/css/start-real-estate-journey-section.css', array('estatein-style'), '1.0.1');
    
    // Enqueue Pagination Fix CSS
    wp_enqueue_style('pagination-fix', get_template_directory_uri() . '/css/pagination-fix.css', array('estatein-style'), '1.0.1');
    
    // Enqueue Footer CSS
    wp_enqueue_style('footer-css', get_template_directory_uri() . '/css/footer.css', array('estatein-style'), '1.0.1');
    
    // Enqueue Pages CSS
    wp_enqueue_style('pages-css', get_template_directory_uri() . '/css/pages.css', array('estatein-style'), '1.0.1');
    
    // Enqueue Properties Page CSS
    wp_enqueue_style('properties-page-css', get_template_directory_uri() . '/css/properties-page.css', array('estatein-style'), '1.0.1');
    
    // Enqueue Section Alignment CSS
    wp_enqueue_style('section-alignment', get_template_directory_uri() . '/css/section-alignment.css', array('estatein-style'), '1.0.1');
    
    // Enqueue Pages Responsive CSS
    wp_enqueue_style('pages-responsive-css', get_template_directory_uri() . '/css/pages-responsive.css', array('estatein-style'), '1.0.1');
    
    // Enqueue Page Enhancements CSS
    wp_enqueue_style('page-enhancements-css', get_template_directory_uri() . '/css/page-enhancements.css', array('estatein-style'), '1.0.1');
    
    // Enqueue Contact Page Fix CSS
    wp_enqueue_style('contact-page-fix-css', get_template_directory_uri() . '/css/contact-page-fix.css', array('estatein-style'), '1.0.1');
    
    // Enqueue Contact Button Fix CSS
    wp_enqueue_style('contact-button-fix-css', get_template_directory_uri() . '/css/contact-button-fix.css', array('estatein-style'), '1.0.1');
    
    // Enqueue About Page CSS
    wp_enqueue_style('about-page-css', get_template_directory_uri() . '/css/about-page.css', array('estatein-style'), '1.0.1');
    
    // Enqueue Services Page CSS
    wp_enqueue_style('services-page-css', get_template_directory_uri() . '/css/services-page.css', array('estatein-style'), '1.0.1');
    
    wp_enqueue_script('estatein-script', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
    
    // Add inline CSS for promo banner and hero right background images
    $promo_bg_image = wp_upload_dir()['baseurl'] . '/2025/07/top-menu.png';
    $hero_bg_image = wp_upload_dir()['baseurl'] . '/2025/07/Container.png';
    $custom_css = "
        .promo-banner {
            background-image: linear-gradient(rgba(44, 62, 80, 0.8), rgba(44, 62, 80, 0.8)), url('{$promo_bg_image}') !important;
        }
        .hero-right {
            background-image: url('{$hero_bg_image}') !important;
        }
    ";
    wp_add_inline_style('estatein-style', $custom_css);
}
add_action('wp_enqueue_scripts', 'estatein_enqueue_scripts');

// Remove unnecessary WordPress features for real estate site
function estatein_remove_unnecessary_features() {
    // Remove blog-related features
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_generator');
    
    // Remove comments support
    add_filter('comments_open', '__return_false', 20, 2);
    add_filter('pings_open', '__return_false', 20, 2);
    
    // Hide comments metabox from dashboard
    add_action('admin_init', function () {
        remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
        remove_meta_box('commentsdiv', 'post', 'normal');
        remove_meta_box('commentstatusdiv', 'post', 'normal');
        remove_meta_box('trackbacksdiv', 'post', 'normal');
    });
}
add_action('init', 'estatein_remove_unnecessary_features');

// Custom post type for Properties
function create_property_post_type() {
    register_post_type('property',
        array(
            'labels' => array(
                'name' => 'Properties',
                'singular_name' => 'Property',
                'add_new' => 'Add New Property',
                'add_new_item' => 'Add New Property',
                'edit_item' => 'Edit Property',
                'new_item' => 'New Property',
                'view_item' => 'View Property',
                'search_items' => 'Search Properties',
                'not_found' => 'No properties found',
                'not_found_in_trash' => 'No properties found in trash'
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'properties'),
            'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
            'menu_icon' => 'dashicons-admin-home',
            'show_in_rest' => true
        )
    );
}
add_action('init', 'create_property_post_type');

// Custom post type for Agents
function create_agent_post_type() {
    register_post_type('agent',
        array(
            'labels' => array(
                'name' => 'Agents',
                'singular_name' => 'Agent',
                'add_new' => 'Add New Agent',
                'add_new_item' => 'Add New Agent',
                'edit_item' => 'Edit Agent',
                'new_item' => 'New Agent',
                'view_item' => 'View Agent',
                'search_items' => 'Search Agents',
                'not_found' => 'No agents found',
                'not_found_in_trash' => 'No agents found in trash'
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'agents'),
            'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
            'menu_icon' => 'dashicons-businessman',
            'show_in_rest' => true
        )
    );
}
add_action('init', 'create_agent_post_type');

// Remove default posts from admin menu
function remove_default_post_type() {
    remove_menu_page('edit.php');
}
add_action('admin_menu', 'remove_default_post_type');

// Redirect single post pages to home (since we don't want blog functionality)
function redirect_single_post() {
    if (is_single() && get_post_type() == 'post') {
        wp_redirect(home_url(), 301);
        exit;
    }
}
add_action('template_redirect', 'redirect_single_post');

// Custom dashboard widget for real estate
function estatein_dashboard_widget() {
    wp_add_dashboard_widget(
        'estatein_dashboard_widget',
        'Estatein Real Estate Dashboard',
        'estatein_dashboard_widget_content'
    );
}

function estatein_dashboard_widget_content() {
    echo '<p>Welcome to your Estatein Real Estate website dashboard!</p>';
    echo '<ul>';
    echo '<li><strong>Properties:</strong> ' . wp_count_posts('property')->publish . ' published</li>';
    echo '<li><strong>Agents:</strong> ' . wp_count_posts('agent')->publish . ' active</li>';
    echo '</ul>';
    echo '<p><a href="' . admin_url('post-new.php?post_type=property') . '" class="button button-primary">Add New Property</a></p>';
}
add_action('wp_dashboard_setup', 'estatein_dashboard_widget');
?>