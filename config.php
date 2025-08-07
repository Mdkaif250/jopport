<?php
// config.php - Database Configuration

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root'); // Your MySQL username (default is root for XAMPP)
define('DB_PASSWORD', '');     // Your MySQL password (default is empty for XAMPP)
define('DB_NAME', 'job_port_db'); // Your database name

// Attempt to connect to the database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check the connection
if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
}
?>
