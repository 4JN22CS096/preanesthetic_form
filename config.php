<?php
// config.php

// Database connection credentials
$servername = "localhost"; // Localhost (XAMPP's MySQL is hosted locally)
$username = "root";        // Default MySQL username for XAMPP
$password = "";            // Default password is empty for MySQL in XAMPP
$dbname = "preanesthetic_evaluation"; // The database you created in phpMyAdmin

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
