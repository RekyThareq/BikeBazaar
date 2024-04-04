<?php
$servername = "localhost";
$database = "motosewa_express";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Close connection (this is optional since PHP will automatically close it at the end of script execution)
mysqli_close($conn);
?>
