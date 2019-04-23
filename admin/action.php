<!DOCTYPE html>

<html>
    
    <head><title>View courses</title> 
        <link rel="stylesheet" href="style2.css"></head>
    <body>
        
<?php
$c_id=$_POST['c_id'];
$c_name=$_POST['c_name'];
$school=$_POST['school'];        
$sem=$_POST['sem'];
$slot=$_POST['slot'];
$description=$_POST['description'];
include('common.html');
        
$conn=new mysqli("localhost","root","","project");

$sql1="select user_id from login where type = 'faculty'";
$result1 = mysqli_query($conn, $sql1);
        
        if (mysqli_num_rows($result1) > 0){
$sql = "insert into courses values('$c_id','$c_name', '$school', '$sem', '$description')";
$result = mysqli_query($conn, $sql);

echo "<h1 align='center'>Select faculty and details for '$slot' slot<h1>";
            ?>
        <form action='addcourse.php' method='post'>
        <div class='row'>
        <div class='col-25'>
        <label>Faculty</label></div><div class='col-75'>
                    <select name='teacher'>
				    <option disable selected value>---select an option---</option>
		    <?php
            while($row = mysqli_fetch_array($result1,MYSQLI_ASSOC)){
            echo "<option>".$row["user_id"]."</option>";}
            ?>
            </select></div></div>
            <?php
            echo "<input type='hidden' name='c_id' value='".$c_id."'>
            <input type='hidden' name='slot' value='".$slot."'>";
            ?>
        
    <div class="row">
      <div class="col-25">
        <label>No of seats</label>
      </div>
      <div class="col-75">
        <input type="text" name="seats" placeholder="enter a number...">
      </div>
    </div>
            
    <div class="row">
      <div class="col-25">
        <label>Waiting seats</label>
      </div>
      <div class="col-75">
        <input type="text" name="waiting" placeholder="enter a number...">
      </div>
    </div>
            
             <div class="row">
      <input type="submit" value="Submit" class="submit2">
    </div>
        
        </form>
    </body>
</html>

<?php
        }
        else{
            echo "<h1>slot is not available for faculties<br><br>click<a href='addcourse.php'>here</a> to add course with diffrent slot</h1>";
        }
        mysqli_close($conn);
?>