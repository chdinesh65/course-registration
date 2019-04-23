<!DOCTYPE html>

<html>
    
    <head><title>View courses</title> 
        <link rel="stylesheet" href="style2.css"></head>    
    <body>
        
<?php
include('common.html');
$teacher=$_POST['teacher'];     
$c_id=$_POST['course'];
$slot=$_POST['slot'];
        
$conn=new mysqli("localhost","root","","project");

        
if($teacher=='All'){
    $sql="delete from courses where c_id='$c_id'";
    mysqli_query($conn, $sql);
    
    $sql1="delete from faculty where c_id='$c_id' and slot='$slot'";
    mysqli_query($conn, $sql1);
    
    $sql2 = "delete from registered where c_id='$c_id' and slot='$slot'";
    mysqli_query($conn, $sql2); 
}
        
else{
$sql="delete from faculty where teacher='$teacher' and c_id='$c_id' and slot='$slot'";
mysqli_query($conn, $sql);

$sql1="delete from registered where teacher='$teacher' and c_id='$c_id' and slot='$slot'";
mysqli_query($conn, $sql1);

}
        mysqli_close($conn);
?>
        <h1 align="center"><br>requested course is deleted sucessfully<br>
            <br>Click <a href="delete.php">here</a> to delete more courses
        </h1>
</body>    
</html>    