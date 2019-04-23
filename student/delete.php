<!DOCTYPE html>

<html>
    
    <head><title>Student Details</title> 
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
$c_id=$_POST['c_id'];
$teacher=$_POST['teacher'];
$slot=$_POST['slot'];
$status=$_POST['status'];
$count=0;
$name='';
include('common.html');
$user = $_SESSION['sess_username'];
        
$conn=new mysqli("localhost","root","","project");

$sql = "select * from faculty f,user u where f.c_id='$c_id' and f.teacher=u.user_id";

	$result = mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($result) > 0) {
        if($status=='Registered'){
        $sql1 = "update faculty set seats = seats + 1 where teacher='$teacher' and c_id='$c_id' and slot='$slot'";}
        else{
            $sql1 = "update faculty set waiting = waiting + 1 where teacher='$teacher' and c_id='$c_id' and slot='$slot'";
        }
        mysqli_query($conn, $sql1);
        
$sql= "delete from registered where user_id='$user' and c_id='$c_id'";
$result = mysqli_query($conn, $sql);
            }else{echo "<br><h1 align='center'>Invalid request</h1>";}
    mysqli_close($conn);
?>
    
    
    
    </body>
</html>