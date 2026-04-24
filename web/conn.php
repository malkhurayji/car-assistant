<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

// Supports both local XAMPP and Docker environments
$server   = getenv('DB_HOST')     ?: "localhost";
$username = getenv('DB_USER')     ?: "root";
$password = getenv('DB_PASSWORD') ?: "";
$dbname   = getenv('DB_NAME')     ?: "car_assistant";

$db = mysqli_connect($server, $username, $password, $dbname);

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
