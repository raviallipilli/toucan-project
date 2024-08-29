<?php
// /config/db.php

// Database connection configuration
$host = 'localhost';
$dbname = 'toucan-tech';
$user = 'root';
$pass = '';

try {
    // Create a new PDO instance to establish a connection to the database
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);

    // Set PDO to throw exceptions on errors
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // If the connection fails, output a detailed error message and terminate the script
    die("Connection failed: " . $e->getMessage());
}
?>
