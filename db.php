<?php
$host = "localhost";
$user = "root";
$password = "YOUR_MARIADB_PASSWORD";
$database = "campusconnect";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
