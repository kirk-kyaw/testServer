<?php

$host = "192.168.0.30";
$username = "testServer";
$password = "userpassword";
$db_name = "testServer";

$conn = new mysqli($host, $username, $password, $db_name); // Establishing the connection

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // Error handling
}