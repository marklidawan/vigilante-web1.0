<?php
$servername = "18.139.15.242";
$username = "remdbtest";
$password = "londonfoster@db@test";
$dbname = "vigilante";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>