<?php
// Database connection parameters
$host = "localhost";
$username = "root";       // Default for XAMPP
$password = "Sourav@4152";           // Default is empty
$dbname = "main_flow";    // Suggested DB name

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}
?>
