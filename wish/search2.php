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
        
$user = $_SESSION['sess_username'];        
$conn=new mysqli("localhost","root","","project");
        
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$teacher=$_POST['teacher'];
$slot=$_POST['slot'];
$c_id=$_POST['c_id'];
$status=$_POST['status'];

$sql = "insert into registered values('$user', '$c_id', '$teacher' , '$slot', '$status')";
$result = mysqli_query($conn, $sql);
if($status='Registered'){
    $sql1 = "update faculty set seats = seats - 1 where teacher='$teacher' and c_id='$c_id' and slot='$slot'";
}
    else{
        $sql1 = "update faculty set seats = seats - 1 where teacher='$teacher' and c_id='$c_id' and slot='$slot'";
    }
    mysqli_query($conn, $sql1);
    echo "<br><br><h1 align='center'>The course $c_id is registered successfully</h1>";
}
else{
$search=$_GET['search'];
$sql = "SELECT * FROM courses where (c_id not in (select c_id from registered where user_id='$user')) and (c_id LIKE '%".$search."%' or c_name LIKE '%".$search."%')";

	$result = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($result) > 0) {
        echo "<table><tr><th>COURSE_ID</th><th>Course name</th><th>VIEW</th></tr>";
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            
			echo "<tr><td>" . $row["c_id"]. "</td><td>" . $row["c_name"] . "</td><td>
            <form method='post' action='search.php'>
            <input type='hidden' name='c_id' value='".$row["c_id"]."'>
            <input type='submit' name='submit' value='Register' class='submit'>
            </form><br></td></tr>";}
    echo "</table>";
    }
        else{echo "<h1 align='center'>no courses found</h1>";}}
        
        mysqli_close($conn);
?>
    </body>
</html>