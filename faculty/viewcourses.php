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
        
$conn=new mysqli("localhost","root","","project");
        
$teacher = $_SESSION['sess_username'];

$sql = "SELECT * FROM faculty where teacher='$teacher'";

	$result = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($result) > 0) {
        echo "<table><tr><th>COURSE</th><th>SLOT</th><th>VIEW</th></tr>";
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            
			echo "<tr><td>" . $row["c_id"]. "</td><td>" . $row["slot"] . "</td><td><form method='post' action='coursedetails.php'>
            <input type='hidden' name='c_id' value='".$row["c_id"]."'>
            <input type='hidden' name='teacher' value='".$row["teacher"]."'>
            <input type='hidden' name='slot' value='".$row["slot"]."'>
            <input type='submit' name='submit' value='View Students' class='submit'>
            </form><br></td></tr>";}
    echo "</table>";
    }
        
        mysqli_close($conn);
?>
    </body>
</html>