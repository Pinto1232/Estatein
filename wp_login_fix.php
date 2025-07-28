<?php
/**
 * WordPress Login Fix - Uses WordPress native functions
 * This loads WordPress core to ensure proper password hashing
 */

// Load WordPress
define('WP_USE_THEMES', false);
require_once('./wp-load.php');

echo "<!DOCTYPE html>
<html>
<head>
    <title>WordPress Login Fix</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 50px auto; padding: 20px; background: #f1f1f1; }
        .container { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .success { background: #d4edda; border: 1px solid #c3e6cb; color: #155724; padding: 15px; border-radius: 5px; margin: 20px 0; }
        .error { background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; padding: 15px; border-radius: 5px; margin: 20px 0; }
        .button { background: #0073aa; color: white; padding: 12px 24px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; text-decoration: none; display: inline-block; }
        .button:hover { background: #005a87; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background: #f8f9fa; }
    </style>
</head>
<body>
<div class='container'>
<h2>🔧 WordPress Login Fix Tool</h2>";

try {
    // Check if WordPress is loaded
    if (!function_exists('wp_create_user')) {
        throw new Exception("WordPress core not loaded properly");
    }
    
    echo "<p>✅ WordPress core loaded successfully!</p>";
    echo "<p>✅ Site URL: " . get_site_url() . "</p>";
    echo "<p>✅ WordPress Version: " . get_bloginfo('version') . "</p>";
    
    // Handle form submissions
    if (isset($_POST['action'])) {
        
        if ($_POST['action'] == 'create_new_admin') {
            $username = 'admin';
            $password = 'admin123';
            $email = 'admin@localhost.local';
            
            // Check if user exists
            if (username_exists($username)) {
                // Update existing user
                $user = get_user_by('login', $username);
                wp_set_password($password, $user->ID);
                
                // Ensure user is administrator
                $user = new WP_User($user->ID);
                $user->set_role('administrator');
                
                echo "<div class='success'>
                    <h3>✅ Admin User Password Reset!</h3>
                    <p><strong>Username:</strong> $username</p>
                    <p><strong>New Password:</strong> $password</p>
                    <p><strong>Email:</strong> $email</p>
                    <p>User role set to Administrator</p>
                </div>";
            } else {
                // Create new user
                $user_id = wp_create_user($username, $password, $email);
                
                if (is_wp_error($user_id)) {
                    echo "<div class='error'>❌ Error creating user: " . $user_id->get_error_message() . "</div>";
                } else {
                    // Set user role to administrator
                    $user = new WP_User($user_id);
                    $user->set_role('administrator');
                    
                    echo "<div class='success'>
                        <h3>✅ New Admin User Created!</h3>
                        <p><strong>Username:</strong> $username</p>
                        <p><strong>Password:</strong> $password</p>
                        <p><strong>Email:</strong> $email</p>
                        <p><strong>User ID:</strong> $user_id</p>
                        <p>User role set to Administrator</p>
                    </div>";
                }
            }
        }
        
        if ($_POST['action'] == 'fix_emergency_admin') {
            $username = 'emergency_admin';
            $password = 'temp123456';
            
            $user = get_user_by('login', $username);
            if ($user) {
                // Reset password using WordPress function
                wp_set_password($password, $user->ID);
                
                // Ensure user is administrator
                $user = new WP_User($user->ID);
                $user->set_role('administrator');
                
                echo "<div class='success'>
                    <h3>✅ Emergency Admin Fixed!</h3>
                    <p><strong>Username:</strong> $username</p>
                    <p><strong>Password:</strong> $password</p>
                    <p>Password properly hashed and role set to Administrator</p>
                </div>";
            } else {
                echo "<div class='error'>❌ Emergency admin user not found</div>";
            }
        }
        
        if ($_POST['action'] == 'test_login') {
            $test_username = $_POST['test_username'];
            $test_password = $_POST['test_password'];
            
            $user = wp_authenticate($test_username, $test_password);
            
            if (is_wp_error($user)) {
                echo "<div class='error'>❌ Login Test Failed: " . $user->get_error_message() . "</div>";
            } else {
                echo "<div class='success'>✅ Login Test Successful! User: " . $user->user_login . " (ID: " . $user->ID . ")</div>";
            }
        }
    }
    
    // Show all users
    echo "<h3>Current WordPress Users:</h3>";
    $users = get_users();
    
    if ($users) {
        echo "<table>
            <tr><th>Username</th><th>Email</th><th>Role</th><th>Registered</th></tr>";
        
        foreach ($users as $user) {
            $user_roles = implode(', ', $user->roles);
            echo "<tr>
                <td>" . esc_html($user->user_login) . "</td>
                <td>" . esc_html($user->user_email) . "</td>
                <td>" . esc_html($user_roles) . "</td>
                <td>" . esc_html($user->user_registered) . "</td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>❌ No users found</p>";
    }
    
} catch (Exception $e) {
    echo "<div class='error'>❌ Error: " . $e->getMessage() . "</div>";
}

echo "
<hr>
<h3>🔧 Fix Actions:</h3>

<form method='post' style='margin: 20px 0;'>
    <input type='hidden' name='action' value='create_new_admin'>
    <button type='submit' class='button'>Create/Reset Admin User</button>
    <p style='font-size: 14px; color: #666;'>Username: admin, Password: admin123</p>
</form>

<form method='post' style='margin: 20px 0;'>
    <input type='hidden' name='action' value='fix_emergency_admin'>
    <button type='submit' class='button'>Fix Emergency Admin</button>
    <p style='font-size: 14px; color: #666;'>Properly hash the emergency_admin password</p>
</form>

<h4>🧪 Test Login:</h4>
<form method='post' style='margin: 20px 0;'>
    <input type='hidden' name='action' value='test_login'>
    <input type='text' name='test_username' placeholder='Username' required style='padding: 8px; margin: 5px;'>
    <input type='password' name='test_password' placeholder='Password' required style='padding: 8px; margin: 5px;'>
    <button type='submit' class='button'>Test Login</button>
</form>

<div style='background: #e7f3ff; border: 1px solid #b3d9ff; padding: 15px; border-radius: 4px; margin: 20px 0;'>
    <h4>🔗 WordPress Login:</h4>
    <p><a href='" . wp_login_url() . "' target='_blank' class='button'>Go to WordPress Login</a></p>
    <p><a href='" . admin_url() . "' target='_blank' class='button'>Go to WordPress Admin</a></p>
</div>

<div style='background: #fff3cd; border: 1px solid #ffeaa7; padding: 15px; border-radius: 4px; margin: 20px 0;'>
    <h4>⚠️ Troubleshooting:</h4>
    <ul>
        <li>Clear browser cache and cookies</li>
        <li>Try incognito/private browsing mode</li>
        <li>Check if WordPress URL settings are correct</li>
        <li>Verify .htaccess file isn't blocking access</li>
    </ul>
</div>

</div>
</body>
</html>";
?>