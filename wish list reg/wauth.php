<?php
session_start();
	$user_name = $_POST["username"];
	$pass_word = $_POST["password"];

	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";

	if(empty($_POST["username"]) || empty($_POST["password"])){
		header('Location: index.html');
	}
	
	$conn = mysqli_connect($servername, $dbusername, $dbpassword,'project');
	
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	//echo "Connected successfully";	
	
	$sql = "SELECT * FROM login WHERE user_id='$user_name'";
	echo $sql;
	$result = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($result) > 0) {
    // output data of each row
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
				
				if($pass_word != $row['password'])
                {
				  header('Location:index.html');
       		    } 	
			else 
			{
				 
				 if($row['type']=='admin') {
					  echo "admin page";
					 echo "Please Register the New Courses";
					  header('Location:../admin/welcome.php');
				 } 
                else if($row['type']=='faculty'){
				    echo "faculty";
					session_regenerate_id();
					$_SESSION['sess_username'] = $user_name;
					session_write_close();
					header('Location:../faculty/wishwelcome.php');
                  }
                else {
				    echo "student";
					session_regenerate_id();
					$_SESSION['sess_username'] = $user_name;
					session_write_close();
					header('Location:welcome.php');
                  }
			}
	} else {
		header('Location:indexw.html');
	}
	
	session_write_close();

?>