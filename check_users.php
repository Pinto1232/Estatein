<?php
// Check existing WordPress users
$mysqli = new mysqli('localhost', 'root', '', 'estateinDb');

if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

$result = $mysqli->query('SELECT user_login, user_email, user_registered FROM wp_users');

if ($result->num_rows > 0) {
    echo "Existing users:\n";
    while($row = $result->fetch_assoc()) {
        echo "Username: " . $row['user_login'] . ", Email: " . $row['user_email'] . ", Registered: " . $row['user_registered'] . "\n";
    }
} else {
    echo "No users found in database.\n";
}

$mysqli->close();
?>