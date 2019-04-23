<!DOCTYPE html>
<html>
    <head><title>Add course</title></head>
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
        
        echo "<h1 align='center'>ENTER NEXT COURSE DETAILS</h1>"  ;  
        mysqli_close($conn);
    }
    else{
    echo "<h1 align='center'>ENTER COURSE DETAILS</h1>"   ; 
    }
    ?>
    
    <div class="container">
        
  <form action="action.php" method="post">
    <div class="row">
      <div class="col-25">
        <label>Course Id</label>
      </div>
      <div class="col-75">
        <input type="text" name="c_id" placeholder="course id..." required>
      </div>
    </div>
      
    <div class="row">
      <div class="col-25">
        <label>Course Name</label>
      </div>
      <div class="col-75">
        <input type="text" name="c_name" placeholder="course name.." required>
      </div>
    </div>
      
    <div class="row">
    <div class="col-25">
        <label>SCHOOL</label></div> 
        <div class="col-75">
					<select name="school" required>
                    <option disable selected value>---select an option---</option>
					<option value="SCOPE">SCOPE</option>
					<option value="SENSE">SENSE</option>
					<option value="SMEC">SMEC</option>
					<option value="SELECT">SELECT</option>
					<option value="SBST">SBST</option>
					</select></div></div>
      
    <div class="row">
      <div class="col-25">
          <label>semester</label></div><div class="col-75">
                    <select name="sem" required>
				    <option disable selected value>---select an option---</option>
					<option value="winter">winter(18-19)</option>
					<option value="fall">fall(18-19)</option>
					<option value="winter">winter(17-18)</option>
					<option value="fall">fall(17-18)</option>
					</select></div></div>
      
      <div class="row">
      <div class="col-25">
        <label>SLOT</label>
      </div>
      <div class="col-75">
        <input type="text" name="slot" placeholder="slot" required>
      </div>
    </div>
      
    <div class="row">
      <div class="col-25">
        <label>Course description:</label>
      </div>
      <div class="col-75">
        <textarea name="description" placeholder="Write about course..." style="height:150px" required></textarea>
      </div>
    </div>
      <br>
      
    <div class="row">
      <input type="submit" value="Submit" class="submit2">
    </div>
      
  </form>
</div>
	</center>
</body>
</html>