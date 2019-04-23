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
$count=0;
$name='';
include('common.html');
        
$conn=new mysqli("localhost","root","","project");

$sql = "SELECT r.user_id,u.fname,u.mname,u.lname,r.status FROM registered r,user u where teacher='$teacher' and slot='$slot' and c_id='$c_id' and r.user_id=u.user_id";

	$result = mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($result) > 0) {
        echo "<h1>Registered students for the COURSE '$c_id' under '$slot' slot :-</h1>";
        echo "<table><tr><th>S.No</th><th>REG_no</th><th>Name</th><th>Status</th></tr>";
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $count=$count+1;
            $name = $row['fname']."&ensp;".$row['mname']."&ensp;".$row['lname'];
			echo "<tr><td>" . $count. "</td><td>" . $row["user_id"] . "</td><td>".$name."</td><td>".$row["status"]."</td></tr>";}
    echo "</table>";
    }

    mysqli_close($conn);
?>
    
    
    
    </body>
</html>