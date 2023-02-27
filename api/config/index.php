<?php
$servername = "localhost";
$username = "u986737120_cliurches";
$password = "0:Yx2@:xnji";
$db = "u986737120_cliurches";

// Create connection
$mysqli = mysqli_connect($servername, $username, $password, $db);
// Check connection
$mysqli->set_charset('utf8mb4');
if (!$mysqli) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
