<?php
$servername = "localhost";
$username = "peterbif";
$password = "Pe12te34@r";
$dbname = "son";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
