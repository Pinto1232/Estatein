<?php
/**
 * Emergency WordPress Login Reset
 * Place this in your WordPress root and access via browser
 * URL: http://localhost/Estatein/emergency_login.php
 */

// WordPress database configuration
define('DB_NAME', 'estateinDb');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');

echo "<!DOCTYPE html>
<html>
<head>
    <title>Emergency WordPress Login Reset</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 600px; margin: 50px auto; padding: 20px; background: #f1f1f1; }
        .container { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .success { background: #d4edda; border: 1px solid #c3e6cb; color: #155724; padding: 15px; border-radius: 5px; margin: 20px 0; }
        .error { background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; padding: 15px; border-radius: 5px; margin: 20px 0; }
        .button { background: #0073aa; color: white; padding: 12px 24px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; }
        .button:hover { background: #005a87; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background: #f8f9fa; }
    </style>
</head>
<body>
<div class='container'>
<h2>🚨 Emergency WordPress Login Reset</h2>";

try {
    // Connect to database
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
    if ($mysqli->connect_error) {
        throw new Exception("Connection failed: " . $mysqli->connect_error);
    }
    
    echo "<p>✅ Database connection successful!</p>";
    
    // Check if action is requested
    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'create_admin') {
            // Create new admin user
            $username = 'emergency_admin';
            $password = 'temp123456';
            $email = 'admin@localhost.local';
            
            // WordPress password hash
            $hashed_password = wp_hash_password($password);
            
            // Check if user exists
            $check_user = $mysqli->prepare("SELECT ID FROM wp_users WHERE user_login = ?");
            $check_user->bind_param("s", $username);
            $check_user->execute();
            $result = $check_user->get_result();
            
            if ($result->num_rows > 0) {
                // Update existing user
                $update_user = $mysqli->prepare("UPDATE wp_users SET user_pass = ?, user_email = ? WHERE user_login = ?");
                $update_user->bind_param("sss", $hashed_password, $email, $username);
                $update_user->execute();
                
                echo "<div class='success'>
                    <h3>✅ User Updated Successfully!</h3>
                    <p><strong>Username:</strong> $username</p>
                    <p><strong>Password:</strong> $password</p>
                    <p><strong>Email:</strong> $email</p>
                </div>";
            } else {
                // Create new user
                $insert_user = $mysqli->prepare("INSERT INTO wp_users (user_login, user_pass, user_nicename, user_email, user_registered, user_status, display_name) VALUES (?, ?, ?, ?, NOW(), 0, ?)");
                $display_name = 'Emergency Admin';
                $insert_user->bind_param("sssss", $username, $hashed_password, $username, $email, $display_name);
                $insert_user->execute();
                
                $user_id = $mysqli->insert_id;
                
                // Add admin capabilities
                $capabilities = 'a:1:{s:13:"administrator";b:1;}';
                $insert_meta1 = $mysqli->prepare("INSERT INTO wp_usermeta (user_id, meta_key, meta_value) VALUES (?, 'wp_capabilities', ?)");
                $insert_meta1->bind_param("is", $user_id, $capabilities);
                $insert_meta1->execute();
                
                $insert_meta2 = $mysqli->prepare("INSERT INTO wp_usermeta (user_id, meta_key, meta_value) VALUES (?, 'wp_user_level', '10')");
                $insert_meta2->bind_param("i", $user_id);
                $insert_meta2->execute();
                
                echo "<div class='success'>
                    <h3>✅ Emergency Admin Created Successfully!</h3>
                    <p><strong>Username:</strong> $username</p>
                    <p><strong>Password:</strong> $password</p>
                    <p><strong>Email:</strong> $email</p>
                    <p><strong>User ID:</strong> $user_id</p>
                </div>";
            }
        }
        
        if ($_POST['action'] == 'reset_existing') {
            $reset_username = $_POST['reset_username'];
            $new_password = 'newpass123';
            $hashed_password = wp_hash_password($new_password);
            
            $update_user = $mysqli->prepare("UPDATE wp_users SET user_pass = ? WHERE user_login = ?");
            $update_user->bind_param("ss", $hashed_password, $reset_username);
            $update_user->execute();
            
            if ($update_user->affected_rows > 0) {
                echo "<div class='success'>
                    <h3>✅ Password Reset Successfully!</h3>
                    <p><strong>Username:</strong> $reset_username</p>
                    <p><strong>New Password:</strong> $new_password</p>
                </div>";
            } else {
                echo "<div class='error'>❌ User not found or password not updated.</div>";
            }
        }
    }
    
    // Show existing users
    echo "<h3>Current Users in Database:</h3>";
    $users_result = $mysqli->query("SELECT user_login, user_email, user_registered FROM wp_users ORDER BY user_registered DESC");
    
    if ($users_result && $users_result->num_rows > 0) {
        echo "<table>
            <tr><th>Username</th><th>Email</th><th>Registered</th><th>Action</th></tr>";
        
        while ($user = $users_result->fetch_assoc()) {
            echo "<tr>
                <td>" . htmlspecialchars($user['user_login']) . "</td>
                <td>" . htmlspecialchars($user['user_email']) . "</td>
                <td>" . htmlspecialchars($user['user_registered']) . "</td>
                <td>
                    <form method='post' style='display:inline;'>
                        <input type='hidden' name='action' value='reset_existing'>
                        <input type='hidden' name='reset_username' value='" . htmlspecialchars($user['user_login']) . "'>
                        <button type='submit' class='button' style='font-size:12px; padding:5px 10px;'>Reset Password</button>
                    </form>
                </td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>❌ No users found in database. WordPress may not be properly installed.</p>";
    }
    
    $mysqli->close();
    
} catch (Exception $e) {
    echo "<div class='error'>❌ Error: " . $e->getMessage() . "</div>";
    echo "<p>Possible solutions:</p>
    <ul>
        <li>Make sure WAMP is running (green icon in system tray)</li>
        <li>Check if MySQL service is started</li>
        <li>Verify database 'estateinDb' exists in phpMyAdmin</li>
        <li>Check wp-config.php database credentials</li>
    </ul>";
}

// WordPress password hashing function
function wp_hash_password($password) {
    // Simple MD5 hash for emergency use (WordPress will rehash on login)
    return '$P$B' . md5($password . 'wp');
}

echo "
<hr>
<h3>🔧 Emergency Actions:</h3>

<form method='post' style='margin: 20px 0;'>
    <input type='hidden' name='action' value='create_admin'>
    <button type='submit' class='button'>Create Emergency Admin User</button>
    <p style='font-size: 14px; color: #666;'>This will create a user 'emergency_admin' with password 'temp123456'</p>
</form>

<div style='background: #e7f3ff; border: 1px solid #b3d9ff; padding: 15px; border-radius: 4px; margin: 20px 0;'>
    <h4>🔗 WordPress Login Links:</h4>
    <p><strong>Admin Dashboard:</strong> <a href='http://localhost/Estatein/wp-admin/' target='_blank'>http://localhost/Estatein/wp-admin/</a></p>
    <p><strong>Direct Login:</strong> <a href='http://localhost/Estatein/wp-login.php' target='_blank'>http://localhost/Estatein/wp-login.php</a></p>
</div>

<div style='background: #fff3cd; border: 1px solid #ffeaa7; padding: 15px; border-radius: 4px; margin: 20px 0;'>
    <h4>⚠️ Security Warning:</h4>
    <p>Delete this file immediately after regaining access to your WordPress admin!</p>
    <p>File location: <code>c:\\wamp64\\www\\Estatein\\emergency_login.php</code></p>
</div>

</div>
</body>
</html>";
?>