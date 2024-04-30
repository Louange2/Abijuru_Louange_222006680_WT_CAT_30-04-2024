<?php
// Connection details
$host = "localhost";
$user = "louange";
$pass = "Abijuru;
$database = "onlinerealestatecommission";

// Creating connection
$connection = new mysqli($host, $user, $pass, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}