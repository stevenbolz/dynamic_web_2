<?php
require_once 'includes/constants.php';

// Create connection
$conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

?>