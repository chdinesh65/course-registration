<!DOCTYPE html>

<html>
    
    <head><title>View courses</title> 
        <link rel="stylesheet" href="style2.css"></head>
    <body><center>
        
<?php
include('common.html');
        
$conn=new mysqli("localhost","root","","project");

$sql="select user_id from login where type='faculty'";
$result = mysqli_query($conn, $sql);

$sql1="select c_id,c_name from courses";
$result1 = mysqli_query($conn, $sql1);
            ?>
        
        <form action='action3.php' method='post'>
          
          <div class='row'>
        <div class='col-25'>
        <label>Courses</label></div><div class='col-75'>
                    <select name='course' required>
				    <option disable selected value>---select an option---</option>
		    <?php
            while($row = mysqli_fetch_array($result1,MYSQLI_ASSOC)){
            echo "<option>".$row["c_id"]."</option>";}
            ?>
            </select></div></div>  
            
        <div class='row'>
        <div class='col-25'>
        <label>Faculty</label></div><div class='col-75'>
                    <select name='teacher' required>
				    <option>All</option>
		    <?php
            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            echo "<option>".$row["user_id"]."</option>";}
            ?>
            </select></div></div>
        
    <div class="row">
      <div class="col-25">
        <label>Slot</label>
      </div>
      <div class="col-75">
        <input type="text" name="slot" placeholder="enter slot" required>
      </div>
    </div><br>
            
            
             <div class="row">
      <input type="submit" value="Submit" class="submit2">
    </div>
        
		</form></center>
    </body>
</html>

<?php
mysqli_close($conn);
?>