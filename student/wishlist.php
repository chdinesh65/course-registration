<!DOCTYPE html>

<html>
    
    <head><title>wishlist</title> 
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
    if($status=='wishlist'){
    $sql1 = "update faculty set seats = seats - 1 where teacher='$teacher' and c_id='$c_id' and slot='$slot'";}
    else{
        $sql1 = "update faculty set waiting = waiting - 1 where teacher='$teacher' and c_id='$c_id' and slot='$slot'";}
    mysqli_query($conn, $sql1);
    }

$sql = "sELECT * FROM wishlist w,courses c where w.reg_no='$user' and w.c_id=c.c_id and c.c_id not in (select c_id from registered where user_id='$user')";

	$result = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($result) > 0) {
        echo "<table><tr><th>c_id</th><th>Course name</th><th>VIEW</th></tr>";
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            
			echo "<tr><td>" . $row["c_id"]. "</td><td>" . $row["c_name"] . "</td><td>
            <form method='post' action='selecteacher.php'>
            <input type='hidden' name='c_id' value='".$row["c_id"]."'>
			<input type='hidden' name='wish' value='wish'>
            <input type='submit' name='submit' value='Register' class='submit'>
            </form><br></td></tr>";}
    echo "</table>";
    }
        else{echo "<br><br><h1 align='center'>You already registered all courses in wishlist</h1>";}
        
        mysqli_close($conn);
?>
    </body>
</html>