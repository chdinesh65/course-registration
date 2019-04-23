<?php


$conn = mysqli_connect('localhost','root','','project');

$user_id = $_GET["username"];

$result = mysqli_query($conn,"SELECT * from login where user_id = '$user_id'");

if (mysqli_num_rows($result) > 0) {
	echo "1";
} else {
	echo "0";
}
?>