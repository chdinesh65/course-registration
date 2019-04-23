<!DOCTYPE html>

<html>
    
    <head><title>Register courses</title> 
        <link rel="stylesheet" href="style2.css">
	<style>
		div{position: absolute;
		z-index: 1;
		top: 400px;
		left: 150px;
		background-color:cornflowerblue;
		color: white;
		border-radius: 50px;
		padding: 50px;}
		</style>
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
    if($status=='Registered')
	{
    $sql1 = "update faculty set seats = seats - 1 where teacher='$teacher' and c_id='$c_id' and slot='$slot'";}
    else{
        $sql1 = "update faculty seats waitig = waiting - 1 where teacher='$teacher' and c_id='$c_id' and slot='$slot'";}
    mysqli_query($conn, $sql1);
    }

$sql = "sELECT * FROM courses where c_id not in (select c_id from registered where user_id='$user')";

	$result = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($result) > 0) {
        echo "<table><tr><th>COURSE ID</th><th>COURSE NAME</th><th>VIEW</th></tr>";
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            
			echo "<tr><td onmouseover=\"foc('$row[c_id]')\" onmouseout=\"foco('$row[c_id]')\">" . $row["c_id"]. "</td><td>" . $row["c_name"] . "</td><td>
            <form method='post' action='selecteacher.php'>
			<input type='hidden' name='wish' value='nope'>
            <input type='hidden' name='c_id' value='".$row["c_id"]."'>
            <input type='submit' name='submit' value='Register' class='submit'>
            </form><br></td></tr><div id='$row[c_id]' class='hider' hidden><b>SYLLABUS</b><br>$row[description]</div>";}
    echo "</table>";
    }
        else{echo "<br><br><h1 align='center'>You have no courses left to register</h1>";}
        
        mysqli_close($conn);
?>
	<script>
		function foc(i){
			var x = document.getElementById(i);
			x.style.display = "block";
		}
		function foco(i){
			var x = document.getElementById(i);
			x.style.display = "none";
		}
		</script>
    </body>
</html>