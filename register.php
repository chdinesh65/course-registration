<?php
session_start();
$fname=$_POST["fname"];
$mname=$_POST["mname"];
$lname=$_POST["lname"];
$username=$_POST["username"];
$phone=$_POST["phone"];
$email=$_POST["email"];
$school=$_POST["school"];
$branch=$_POST["branch"];
$type=$_POST["type"];
$password=$_POST["password"];

$conn = new mysqli("localhost","root","","project");

$result = mysqli_query($conn,"SELECT user_id from login where user_id = '$username'");

if (mysqli_num_rows($result) == 0) {
	
	$result1 = mysqli_query($conn,"SELECT phone from user where email = '$email'");
	echo $email;
	if (mysqli_num_rows($result1) == 0) {
			echo "About to insert";
		$sql="INSERT INTO `user` VALUES('$fname', '$mname', '$lname', '$username',$phone, '$email', '$school', '$branch', '$type')";

			$sql1="INSERT INTO `login` VALUES('$username', '$password', '$type')";

			if(!mysqli_query($conn,$sql) || !mysqli_query($conn,$sql1)){
				header('Location: index2.html');
			} 
        else if($type=='faculty'){session_regenerate_id();
				$_SESSION['sess_username'] = $username;
				session_write_close();
				header('Location: faculty/welcome.php');
        }
        
        else {
				session_regenerate_id();
				$_SESSION['sess_username'] = $username;
				session_write_close();
				header('Location: student/welcome.php');
			}
	} else {
			header('Location: index2.html');
	}
} else {
	header('Location: index2.html');
}

mysqli_close($mysqli);				  
?>