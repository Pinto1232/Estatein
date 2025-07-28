<?php
// Emergency WordPress Admin Reset Script
// Place this file in your WordPress root directory and access via browser

// Database configuration from wp-config.php
$db_host = 'localhost';
$db_name = 'estateinDb';
$db_user = 'root';
$db_pass = '';

try {
    // Connect to database
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "<h2>WordPress Admin Reset Tool</h2>";
    
    // Check if form was submitted
    if (isset($_POST['create_user'])) {
        $username = 'admin';
        $password = 'admin123';
        $email = 'admin@estatein.local';
        $hashed_password = '$P$B' . md5($password); // Simple WordPress hash
        
        // Check if user exists
        $stmt = $pdo->prepare("SELECT ID FROM wp_users WHERE user_login = ?");
        $stmt->execute([$username]);
        
        if ($stmt->rowCount() > 0) {
            echo "<p style='color: red;'>User 'admin' already exists!</p>";
            
            // Update existing user password
            $stmt = $pdo->prepare("UPDATE wp_users SET user_pass = ? WHERE user_login = ?");
            $stmt->execute([$hashed_password, $username]);
            echo "<p style='color: green;'>Password updated for existing admin user!</p>";
        } else {
            // Create new user
            $stmt = $pdo->prepare("INSERT INTO wp_users (user_login, user_pass, user_nicename, user_email, user_registered, user_status, display_name) VALUES (?, ?, ?, ?, NOW(), 0, ?)");
            $stmt->execute([$username, $hashed_password, $username, $email, 'Admin User']);
            
            $user_id = $pdo->lastInsertId();
            
            // Add user meta for admin capabilities
            $stmt = $pdo->prepare("INSERT INTO wp_usermeta (user_id, meta_key, meta_value) VALUES (?, 'wp_capabilities', ?)");
            $stmt->execute([$user_id, 'a:1:{s:13:"administrator";b:1;}']);
            
            $stmt = $pdo->prepare("INSERT INTO wp_usermeta (user_id, meta_key, meta_value) VALUES (?, 'wp_user_level', '10')");
            $stmt->execute([$user_id]);
            
            echo "<div style='background: #d4edda; border: 1px solid #c3e6cb; color: #155724; padding: 15px; border-radius: 5px; margin: 20px 0;'>";
            echo "<h3>✅ Admin User Created Successfully!</h3>";
            echo "<p><strong>Username:</strong> admin</p>";
            echo "<p><strong>Password:</strong> admin123</p>";
            echo "<p><strong>Email:</strong> admin@estatein.local</p>";
            echo "</div>";
        }
    }
    
    // Show existing users
    echo "<h3>Current Users in Database:</h3>";
    $stmt = $pdo->query("SELECT user_login, user_email, user_registered FROM wp_users ORDER BY user_registered DESC");
    $users = $stmt->fetchAll();
    
    if ($users) {
        echo "<table border='1' style='border-collapse: collapse; width: 100%; margin: 20px 0;'>";
        echo "<tr style='background: #f1f1f1;'><th style='padding: 10px;'>Username</th><th style='padding: 10px;'>Email</th><th style='padding: 10px;'>Registered</th></tr>";
        foreach ($users as $user) {
            echo "<tr>";
            echo "<td style='padding: 10px;'>" . htmlspecialchars($user['user_login']) . "</td>";
            echo "<td style='padding: 10px;'>" . htmlspecialchars($user['user_email']) . "</td>";
            echo "<td style='padding: 10px;'>" . htmlspecialchars($user['user_registered']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No users found in database.</p>";
    }
    
} catch(PDOException $e) {
    echo "<p style='color: red;'>Database connection failed: " . $e->getMessage() . "</p>";
    echo "<p>Please check your database is running and the credentials in wp-config.php are correct.</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>WordPress Admin Reset</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #f9f9f9;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h2, h3 {
            color: #333;
        }
        .button {
            background: #0073aa;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
        }
        .button:hover {
            background: #005a87;
        }
        .login-info {
            background: #e7f3ff;
            border: 1px solid #b3d9ff;
            padding: 15px;
            border-radius: 4px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="post">
            <h3>Create/Reset Admin User</h3>
            <p>This will create a new admin user or reset the password if the user already exists.</p>
            <button type="submit" name="create_user" class="button">Create Admin User</button>
        </form>
        
        <div class="login-info">
            <h4>WordPress Login Information:</h4>
            <p><strong>Admin URL:</strong> <a href="http://localhost/Estatein/wp-admin/" target="_blank">http://localhost/Estatein/wp-admin/</a></p>
            <p><strong>Username:</strong> admin</p>
            <p><strong>Password:</strong> admin123</p>
        </div>
        
        <p style="color: #666; font-size: 14px; margin-top: 30px;">
            <strong>Security Note:</strong> Delete this file after regaining access to your WordPress admin.
        </p>
    </div>
</body>
</html>