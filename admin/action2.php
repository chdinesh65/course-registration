<!DOCTYPE html>

<html>
    
    <head><title>View courses</title> 
        <link rel="stylesheet" href="style2.css"></head>
    <body>
        
<?php
$c_id=$_POST['course'];
$slot=$_POST['slot'];
include('common.html');
        
$conn=new mysqli("localhost","root","","project");

$sql="select user_id from login where type = 'faculty'";
$result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0){

echo "<h1 align='center'>Select faculty and details for '$slot' slot for '$c_id' course<h1>";
            ?><center>
        <form action='addfaculty.php' method='post'>
        <div class='row'>
        <div class='col-25'>
        <label>Faculty</label></div><div class='col-75'>
                    <select name='teacher'>
				    <option disable selected value>---select an option---</option>
		    <?php
            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
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
    </div><br>
            
             <div class="row">
      <input type="submit" value="Submit" class="submit2">
    </div>
        
        </form></center>
    </body>
</html>

<?php
        }
        else{
            echo "<h1 align='center'><br>check the course id for available slot and faculty<br><br>click <a href='addfaculty.php'>here</a> to add course with diffrent slot</h1>";
        }
        mysqli_close($conn);
?>