<?php

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";

// Create connection
$conn = mysqli_connect($servername, $dbusername, $dbpassword,'project');

$email = $_GET["email"];

$result = mysqli_query($conn,"SELECT email from user where email = '$email'");

if (mysqli_num_rows($result) > 0){
	echo "1";
} else {
	echo "0";
}	
?>