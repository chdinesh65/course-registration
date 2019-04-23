<!DOCTYPE html>
<html>
    <head><title>Add Faculty</title></head>
<body><center>
<?php
    include('common.html');
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$teacher=$_POST['teacher'];
$slot=$_POST['slot'];
$c_id=$_POST['c_id'];
$seats=$_POST['seats'];
$waiting=$_POST['waiting'];

    $conn=new mysqli("localhost","root","","project");

$sql = "insert into faculty values('$teacher', '$c_id', '$slot', $seats, $waiting)";
$result = mysqli_query($conn, $sql);
        
        echo "<h1 align='center'>ENTER NEXT COURSE TEACHER DETAILS</h1>"  ;  
        mysqli_close($conn);
    }
    else{
    echo "<h2 align='center'>ENTER DETAILS</h2>"   ; 
    }
    ?>
    
    <div class="container">
  <form action="action2.php" method="post">
      
          <div class='row'>
        <div class='col-25'>
        <label>Courses</label></div><div class='col-75'>
                    <select name='course' required>
				    <option disable selected value>---select an option---</option>
		    <?php
            $conn=new mysqli("localhost","root","","project");
            $sql1="select c_id,c_name from courses";
            $result1 = mysqli_query($conn, $sql1);
            while($row = mysqli_fetch_array($result1,MYSQLI_ASSOC)){
            echo "<option>".$row["c_id"]."</option>";}
            ?>
            </select></div></div> 
      
      
      <div class="row">
      <div class="col-25">
        <label>SLOT</label>
      </div>
      <div class="col-75">
        <input type="text" name="slot" placeholder="slot" required>
      </div>
    </div><br>
      
    <div class="row">
      <input type="submit" value="Submit" class="submit2">
    </div>
      
  </form>
</div>
	</center>
</body>
</html>