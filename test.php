<?php
$servername = "localhost";
$username = "tworntcx_newwsho";
$password = "k8iS7e#A3e";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?> 