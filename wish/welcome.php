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
$student = $_SESSION['sess_username'];   
include('../wish/common1.html');
        
        $conn=new mysqli("localhost","root","","project");

        $sql = "SELECT * FROM user where user_id='$student'";
        
	   $result = mysqli_query($conn, $sql);
	   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        
        echo "<br><h2 align='center'>WELCOME&emsp;".$row["fname"]."&ensp;".$row["mname"]."</h2>" ;
        echo "<br><br><h3 align='center'>This is student login choose from the menu of options what you want to do</h3>";
        mysqli_close($conn);
?>
    </body>
</html>