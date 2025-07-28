<?php
// Test database connection and WordPress setup

echo "<h2>WordPress Connection Test</h2>";

// Test 1: Check if wp-config.php exists and is readable
echo "<h3>1. WordPress Configuration Test</h3>";
if (file_exists('wp-config.php')) {
    echo "✅ wp-config.php found<br>";
    include_once('wp-config.php');
    echo "✅ wp-config.php loaded successfully<br>";
    echo "Database Name: " . DB_NAME . "<br>";
    echo "Database Host: " . DB_HOST . "<br>";
    echo "Database User: " . DB_USER . "<br>";
} else {
    echo "❌ wp-config.php not found<br>";
}

// Test 2: Database connection
echo "<h3>2. Database Connection Test</h3>";
try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ Database connection successful<br>";
    
    // Check if WordPress tables exist
    $stmt = $pdo->query("SHOW TABLES LIKE 'wp_users'");
    if ($stmt->rowCount() > 0) {
        echo "✅ WordPress tables found<br>";
        
        // Count users
        $stmt = $pdo->query("SELECT COUNT(*) as count FROM wp_users");
        $result = $stmt->fetch();
        echo "Users in database: " . $result['count'] . "<br>";
    } else {
        echo "❌ WordPress tables not found - WordPress may not be installed<br>";
    }
    
} catch(PDOException $e) {
    echo "❌ Database connection failed: " . $e->getMessage() . "<br>";
}

// Test 3: WordPress core files
echo "<h3>3. WordPress Core Files Test</h3>";
$core_files = ['wp-load.php', 'wp-admin/index.php', 'wp-includes/version.php'];
foreach ($core_files as $file) {
    if (file_exists($file)) {
        echo "✅ $file exists<br>";
    } else {
        echo "❌ $file missing<br>";
    }
}

// Test 4: Server information
echo "<h3>4. Server Information</h3>";
echo "PHP Version: " . phpversion() . "<br>";
echo "Server: " . $_SERVER['SERVER_SOFTWARE'] . "<br>";
echo "Document Root: " . $_SERVER['DOCUMENT_ROOT'] . "<br>";

?>

<style>
body {
    font-family: Arial, sans-serif;
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background: #f9f9f9;
}
h2, h3 {
    color: #333;
}
</style>