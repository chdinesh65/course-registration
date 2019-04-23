<!DOCTYPE html>

<html>
    
    <head><title>View courses</title> 
    </head>
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
$teacher = $_SESSION['sess_username'];
        
include('common1.html');
        
        $conn=new mysqli("localhost","root","","project");

        $sql = "SELECT * FROM user where user_id='$teacher'";
        
	   $result = mysqli_query($conn, $sql);
	   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        
        echo "<br><h2 align='center'>Hi &emsp;".$row["fname"]."&ensp;".$row["mname"]."</h2>" ;
        echo "<br><br><h3 align='center'>This is WISH LIST faculty login. Your are done with your work for TODAY<br>bye..bye..<br>Have a GOOD DAY...</h3>";
        
?>
    </body>
</html>