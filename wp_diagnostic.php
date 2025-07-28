<?php
/**
 * WordPress Diagnostic Tool
 * Checks common login issues
 */

// Load WordPress
define('WP_USE_THEMES', false);
require_once('./wp-load.php');

echo "<!DOCTYPE html>
<html>
<head>
    <title>WordPress Diagnostic</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 50px auto; padding: 20px; background: #f1f1f1; }
        .container { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .success { color: #155724; background: #d4edda; border: 1px solid #c3e6cb; padding: 10px; border-radius: 4px; margin: 5px 0; }
        .error { color: #721c24; background: #f8d7da; border: 1px solid #f5c6cb; padding: 10px; border-radius: 4px; margin: 5px 0; }
        .warning { color: #856404; background: #fff3cd; border: 1px solid #ffeaa7; padding: 10px; border-radius: 4px; margin: 5px 0; }
        .info { color: #0c5460; background: #d1ecf1; border: 1px solid #bee5eb; padding: 10px; border-radius: 4px; margin: 5px 0; }
        h3 { color: #333; border-bottom: 2px solid #0073aa; padding-bottom: 5px; }
    </style>
</head>
<body>
<div class='container'>
<h2>🔍 WordPress Diagnostic Report</h2>";

// Test 1: WordPress Core
echo "<h3>1. WordPress Core Status</h3>";
try {
    echo "<div class='success'>✅ WordPress Version: " . get_bloginfo('version') . "</div>";
    echo "<div class='success'>✅ WordPress loaded successfully</div>";
    echo "<div class='info'>📍 WordPress Directory: " . ABSPATH . "</div>";
} catch (Exception $e) {
    echo "<div class='error'>❌ WordPress core issue: " . $e->getMessage() . "</div>";
}

// Test 2: URL Configuration
echo "<h3>2. URL Configuration</h3>";
$site_url = get_option('siteurl');
$home_url = get_option('home');
$current_url = "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']);

echo "<div class='info'>🌐 Site URL (siteurl): " . $site_url . "</div>";
echo "<div class='info'>🏠 Home URL (home): " . $home_url . "</div>";
echo "<div class='info'>📍 Current URL: " . $current_url . "</div>";

if ($site_url !== $home_url) {
    echo "<div class='warning'>⚠️ Site URL and Home URL are different - this might cause login issues</div>";
}

// Check if URLs match current location
$expected_url = "http://localhost/Estatein";
if ($site_url !== $expected_url || $home_url !== $expected_url) {
    echo "<div class='error'>❌ URL mismatch detected! Expected: $expected_url</div>";
    echo "<div class='warning'>This is likely causing your login issues. URLs need to be fixed.</div>";
} else {
    echo "<div class='success'>✅ URLs are correctly configured</div>";
}

// Test 3: Database Connection
echo "<h3>3. Database Status</h3>";
global $wpdb;
try {
    $users_count = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->users}");
    echo "<div class='success'>✅ Database connection working</div>";
    echo "<div class='info'>👥 Total users in database: " . $users_count . "</div>";
    
    // Check for admin users
    $admin_users = $wpdb->get_results("
        SELECT u.user_login, u.user_email 
        FROM {$wpdb->users} u 
        INNER JOIN {$wpdb->usermeta} um ON u.ID = um.user_id 
        WHERE um.meta_key = 'wp_capabilities' 
        AND um.meta_value LIKE '%administrator%'
    ");
    
    if ($admin_users) {
        echo "<div class='success'>✅ Administrator users found:</div>";
        foreach ($admin_users as $admin) {
            echo "<div class='info'>👤 " . $admin->user_login . " (" . $admin->user_email . ")</div>";
        }
    } else {
        echo "<div class='error'>❌ No administrator users found!</div>";
    }
    
} catch (Exception $e) {
    echo "<div class='error'>❌ Database error: " . $e->getMessage() . "</div>";
}

// Test 4: Login URL
echo "<h3>4. Login System</h3>";
$login_url = wp_login_url();
$admin_url = admin_url();

echo "<div class='info'>🔐 Login URL: <a href='$login_url' target='_blank'>$login_url</a></div>";
echo "<div class='info'>⚙️ Admin URL: <a href='$admin_url' target='_blank'>$admin_url</a></div>";

// Test 5: File Permissions
echo "<h3>5. File System</h3>";
$wp_config_writable = is_writable('./wp-config.php');
$uploads_dir = wp_upload_dir();

echo "<div class='" . ($wp_config_writable ? 'warning' : 'success') . "'>";
echo ($wp_config_writable ? '⚠️' : '✅') . " wp-config.php " . ($wp_config_writable ? 'is writable (security risk)' : 'is not writable (good)');
echo "</div>";

echo "<div class='info'>📁 Uploads directory: " . $uploads_dir['basedir'] . "</div>";
echo "<div class='" . (is_writable($uploads_dir['basedir']) ? 'success' : 'error') . "'>";
echo (is_writable($uploads_dir['basedir']) ? '✅' : '❌') . " Uploads directory " . (is_writable($uploads_dir['basedir']) ? 'is writable' : 'is not writable');
echo "</div>";

// Test 6: Active Plugins
echo "<h3>6. Active Plugins</h3>";
$active_plugins = get_option('active_plugins');
if (empty($active_plugins)) {
    echo "<div class='success'>✅ No active plugins (good for troubleshooting)</div>";
} else {
    echo "<div class='warning'>⚠️ Active plugins found:</div>";
    foreach ($active_plugins as $plugin) {
        echo "<div class='info'>🔌 " . $plugin . "</div>";
    }
    echo "<div class='warning'>Consider deactivating plugins if login issues persist</div>";
}

// Test 7: Theme
echo "<h3>7. Active Theme</h3>";
$current_theme = wp_get_theme();
echo "<div class='info'>🎨 Active Theme: " . $current_theme->get('Name') . " v" . $current_theme->get('Version') . "</div>";
echo "<div class='info'>📁 Theme Directory: " . $current_theme->get_stylesheet_directory() . "</div>";

echo "
<hr>
<h3>🔧 Quick Fixes</h3>
<p><strong>If URLs are wrong:</strong></p>
<ol>
    <li>Go to: <a href='http://localhost/phpmyadmin/' target='_blank'>phpMyAdmin</a></li>
    <li>Select database: <code>estateinDb</code></li>
    <li>Find table: <code>wp_options</code></li>
    <li>Edit rows where <code>option_name</code> is 'siteurl' and 'home'</li>
    <li>Set both <code>option_value</code> to: <code>http://localhost/Estatein</code></li>
</ol>

<p><strong>Alternative URL Fix:</strong></p>
<p>Add these lines to your wp-config.php file (before 'That's all, stop editing!'):</p>
<pre style='background: #f8f9fa; padding: 15px; border-radius: 4px;'>
define('WP_HOME','http://localhost/Estatein');
define('WP_SITEURL','http://localhost/Estatein');
</pre>

</div>
</body>
</html>";
?>