<?php
$servername = "sql1.pcextreme.nl";
$username = "23540gm7products";
$password = "D1tiseenwachtwoord";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>
