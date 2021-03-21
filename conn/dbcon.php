<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbuser = "like";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbuser);
// school_hishab
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";

?>