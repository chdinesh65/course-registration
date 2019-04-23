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
$count=0;
$name='';
include('common.html');
$user = $_SESSION['sess_username'];
        
$conn=new mysqli("localhost","root","","project");

$sql = "select * from faculty f,user u where f.c_id='$c_id' and f.teacher=u.user_id";

	$result = mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($result) > 0) {
        echo "<h1>Teachers and slots for the COURSE '$c_id':-</h1>";
        echo "<table><tr><th>S.No</th><th>Teacher</th><th>slot</th><th>seats</th><th>Waiting seats</th><th>Action</th></tr>";
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $count=$count+1;
            $name = $row['fname']."&ensp;".$row['mname']."&ensp;".$row['lname'];
			echo "<tr><td>" . $count. "</td><td>" . $name . "</td><td>".$row["slot"]."</td><td>".$row["seats"]."</td><td>".$row["waiting"]."</td><td>
            <form method='post' action='register.php'>
            <input type='hidden' name='c_id' value='".$row["c_id"]."'>
            <input type='hidden' name='teacher' value='".$row["teacher"]."'>
            <input type='hidden' name='slot' value='".$row["slot"]."'>";
            if($row["seats"] > 0){
            echo "<input type='hidden' name='status' value='Registered'>
            <input type='submit' name='submit' value='Register' class='submit'></form>";}
            else if($row["waiting"] > 0){
            echo "<input type='hidden' name='status' value='waiting'>
            <input type='submit' name='submit' value='Wait list' class='submit'>
            </form>";
            } 
            else{echo "Over";}
            echo "</td></tr>";
        }
    echo "</table>";
    }
    mysqli_close($conn);
?>
    
    
    
    </body>
</html>