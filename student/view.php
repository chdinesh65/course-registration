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
include('common.html');
$student = $_SESSION['sess_username'];
$conn=new mysqli("localhost","root","","project");


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$teacher=$_POST['teacher'];
$slot=$_POST['slot'];
$c_id=$_POST['c_id'];
$status=$_POST['status'];

$sql= "update registered set teacher='$teacher',slot='$slot',status='$status' where user_id='$student' and c_id='$c_id'";
$result = mysqli_query($conn, $sql);
if($status=='Registered'){
    $sql1 = "update faculty set seats = seats - 1 where teacher='$teacher' and c_id='$c_id' and slot='$slot'";
}
    else{
        $sql1 = "update faculty set waiting = waiting - 1 where teacher='$teacher' and c_id='$c_id' and slot='$slot'";
    }
    mysqli_query($conn, $sql1);
}        
        
$count=0;
$name='';
$sql = "SELECT c.c_name,c.c_id,u.fname,u.mname,u.lname,r.slot,r.status,u.user_id FROM registered r,user u,courses c where r.user_id='$student' and u.user_id=r.teacher and r.c_id=c.c_id";

	$result = mysqli_query($conn, $sql);
        

	if (mysqli_num_rows($result) > 0) {
        echo "<table><tr><th>S_no</th><th>COURSE_ID</th><th>Course name</th><th>TEACHER</th><th>SLOT</th><th>STATUS</th><th>ACTION</th></tr>";
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $count=$count+1;
            $name = $row['fname']."&ensp;".$row['mname']."&ensp;".$row['lname'];
			echo "<tr><td>" . $count. "</td><td>" . $row["c_id"]. "</td><td>" . $row["c_name"] . "</td><td>" . $name. "</td><td>" . $row["slot"] . "</td><td>" . $row["status"] . "</td><td>
            <form method='post' action='modify.php'>
            <input type='hidden' name='c_id' value='".$row["c_id"]."'>
            <input type='hidden' name='teacher' value='".$row["user_id"]."'>
            <input type='hidden' name='slot' value='".$row["slot"]."'>
            <input type='hidden' name='status' value='".$row["status"]."'>
            <input type='submit' value='modify' class='submit'/></form>
            <form method='post' action='delete.php'>
            <input type='hidden' name='c_id' value='".$row["c_id"]."'>
            <input type='hidden' name='teacher' value='".$row["user_id"]."'>
            <input type='hidden' name='slot' value='".$row["slot"]."'>
            <input type='hidden' name='status' value='".$row["status"]."'>
            <input type='submit' value='delete' class='submit'/></form>
            </td></tr>";}
    echo "</table>";
    }
        else{echo "<br><br><h1 align='center'>You didn't registered any courses</h1>";}
        
        mysqli_close($conn);
?>
    </body>
</html>