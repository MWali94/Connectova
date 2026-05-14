<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "connectova";

// Create connection
$conn = mysqli_connect($host, $username, $password, $database);

// Checking the main connection
if (!$conn) {
    die("Database connection is failed: " . mysqli_connect_error());
}

// Success message
echo "Database connected successfully";

?>