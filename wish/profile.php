<!DOCTYPE html>

<html>
    
    <head><title>STUDENT PROFILE</title> 
        <link rel="stylesheet" href="style2.css"></head>
    
    <body>
    
<?php    
session_start();
?>

<?php
if(!isset($_SESSION['sess_username'])) {
  header("location: ../index.html");
  exit();
}
?>

<?php
include('common.html');
$student = $_SESSION['sess_username'];
$conn=new mysqli("localhost","root","","project");

$sql = "SELECT * FROM user where user_id='$student'";

	$result = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($result) > 0) {
        echo "<h1><u>STUDENT PROFILE</u>:</h1>
        <table><tr><th>TYPE</th><th>DETAILS</th></tr>";
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);    
			echo "<tr><td><b>Reg no</b></td><td>".$row["user_id"]. "</td></tr>
            <tr><td><b>Name</b></td><td>".$row["fname"]."&ensp;".$row["mname"]."&ensp;".$row["lname"]. "</td></tr>
            <tr><td><b>Phone No</b></td><td>".$row["phone"]. "</td></tr>
            <tr><td><b>E-mail Address</b></td><td>".$row["email"]. "</td></tr>
            <tr><td><b>School</b></td><td>".$row["school"]. "</td></tr>
            <tr><td><b>Branch</b></td><td>".$row["branch"]. "</td></tr>
            <table>";}
        
        mysqli_close($conn);
?>
    </body>
</html>