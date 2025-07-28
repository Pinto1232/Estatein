<?php
// WordPress User Manager - Run this through your web browser
// URL: http://localhost/Estatein/wp_user_manager.php

// Load WordPress
require_once('wp-config.php');
require_once('wp-includes/wp-db.php');
require_once('wp-includes/functions.php');
require_once('wp-includes/pluggable.php');

// Check if action is specified
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

echo "<h2>WordPress User Manager</h2>";

if ($action == 'list') {
    echo "<h3>Existing Users:</h3>";
    
    global $wpdb;
    $users = $wpdb->get_results("SELECT user_login, user_email, user_registered FROM {$wpdb->users}");
    
    if ($users) {
        echo "<table border='1' style='border-collapse: collapse; margin: 20px 0;'>";
        echo "<tr><th style='padding: 10px;'>Username</th><th style='padding: 10px;'>Email</th><th style='padding: 10px;'>Registered</th></tr>";
        foreach ($users as $user) {
            echo "<tr>";
            echo "<td style='padding: 10px;'>" . esc_html($user->user_login) . "</td>";
            echo "<td style='padding: 10px;'>" . esc_html($user->user_email) . "</td>";
            echo "<td style='padding: 10px;'>" . esc_html($user->user_registered) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No users found in database.</p>";
    }
    
    echo "<hr>";
    echo "<h3>Create New Admin User:</h3>";
    echo "<p><a href='?action=create_admin' style='background: #0073aa; color: white; padding: 10px 20px; text-decoration: none; border-radius: 3px;'>Create Admin User</a></p>";
    
} elseif ($action == 'create_admin') {
    // Create a new admin user
    $username = 'admin';
    $password = 'admin123';
    $email = 'admin@estatein.local';
    
    // Check if user already exists
    if (username_exists($username)) {
        echo "<p style='color: red;'>User 'admin' already exists!</p>";
    } else {
        $user_id = wp_create_user($username, $password, $email);
        
        if (is_wp_error($user_id)) {
            echo "<p style='color: red;'>Error creating user: " . $user_id->get_error_message() . "</p>";
        } else {
            // Make the user an administrator
            $user = new WP_User($user_id);
            $user->set_role('administrator');
            
            echo "<div style='background: #d4edda; border: 1px solid #c3e6cb; color: #155724; padding: 15px; border-radius: 5px; margin: 20px 0;'>";
            echo "<h3>✅ Admin User Created Successfully!</h3>";
            echo "<p><strong>Username:</strong> admin</p>";
            echo "<p><strong>Password:</strong> admin123</p>";
            echo "<p><strong>Email:</strong> admin@estatein.local</p>";
            echo "<p>You can now login to WordPress admin with these credentials.</p>";
            echo "</div>";
        }
    }
    
    echo "<p><a href='?action=list'>← Back to User List</a></p>";
}

echo "<hr>";
echo "<p><strong>WordPress Admin URL:</strong> <a href='/Estatein/wp-admin/' target='_blank'>http://localhost/Estatein/wp-admin/</a></p>";
?>

<style>
body {
    font-family: Arial, sans-serif;
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background: #f1f1f1;
}
h2, h3 {
    color: #333;
}
table {
    background: white;
    width: 100%;
}
th {
    background: #0073aa;
    color: white;
}
</style>