<!DOCTYPE html>

<html>
    
    <head><title>View courses</title> 
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
include('common1.html');
$student = $_SESSION['sess_username'];
$conn=new mysqli("localhost","root","","project");


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$c_id=$_POST['c_id'];
$sql= "delete from wishlist where reg_no='$student' and c_id='$c_id'";
mysqli_query($conn, $sql);
}        
        
$count=0;
$name='';
$sql = "select c.c_name,w.c_id from courses c,wishlist w where c.c_id=w.c_id and reg_no='$student'";

	$result = mysqli_query($conn, $sql);
        

	if (mysqli_num_rows($result) > 0){
        echo "<table><tr><th>S_NO</th><th>COURSE_ID</th><th>COURSE NAME</th><th>ACTION</th></tr>";
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $count=$count+1;
			echo "<tr><td>" . $count. "</td><td>" . $row["c_id"]. "</td><td>" . $row["c_name"] . "</td><td>
            <form method='post' action='view.php'>
            <input type='hidden' name='c_id' value='".$row["c_id"]."'>
            <input type='submit' value='delete' class='submit'/></form>
            </td></tr>";}
    echo "</table>";
    }
        else{echo "<br><br><h1 align='center'>You didn't registered any courses</h1>";}
        
        mysqli_close($conn);
?>
    </body>
</html>