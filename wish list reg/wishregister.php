<!DOCTYPE html>

<html>
    
    <head><title>wishlist registration</title> 
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
        
$user = $_SESSION['sess_username'];        
$conn=new mysqli("localhost","root","","project");
        
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$c_id=$_POST['c_id'];


$sql = "insert into wishlist values('$user', '$c_id')";
mysqli_query($conn, $sql);
}
$sql = "sELECT * FROM courses where c_id not in (select c_id from wishlist where reg_no='$user')";

	$result = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($result) > 0) {
        echo "<table><tr><th>COURSE ID</th><th>COURSE NAME</th><th>VIEW</th></tr>";
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            
			echo "<tr><td>" . $row["c_id"]. "</td><td>" . $row["c_name"] . "</td><td>
            <form method='post' action='wishregister.php'>
            <input type='hidden' name='c_id' value='".$row["c_id"]."'>
            <input type='submit' name='submit' value='Register' class='submit'>
            </form><br></td></tr>";}
    echo "</table>";
    }
        else{echo "<br><br><h1 align='center'>You have no courses left to register</h1>";}
        
        mysqli_close($conn);
?>
    </body>
</html>