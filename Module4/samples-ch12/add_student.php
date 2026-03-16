<!DOCTYPE html>
<html>
	<head>
		<title>Add/Update Student</title>
		<link rel="stylesheet" type="text/css" href="css/my_styles.css" media="screen, print" />
	</head>
	<body>
		<h1>Add/Update Student</h1> 
		<div id='searchBox'>
			<form action='add_student.php' method="post">
				<label for="fname">First Name:</label>
  				<input type="text" required id="fname" name="fname" /><br/>
  				<label for="mi">Middle Initial</label>
  				<input type="text" id="mi" name="mi" /><br/>
  				<label for="lname">Last Name:</label>
  				<input type="text" required id="lname" name="lname" /><br/>
  				<label for="student_id"">Student ID Num:</label>
  				<input type="text" required id="student_id" name="student_id" /><br/>
  				<input type="hidden" id="s_id" name = "s_id" />
  				<input type="submit" value="Submit" />
			</form>	
		</div>
		<p>
			<?php 
				include "data_handler.php";
				
				if ($_SERVER["REQUEST_METHOD"] == "POST") 
				{ 
					
					$fname = filter_var($_POST["fname"],FILTER_SANITIZE_STRING);
					$mi = filter_var($_POST["mi"],FILTER_SANITIZE_STRING);
					$lname = filter_var($_POST["lname"],FILTER_SANITIZE_STRING);
					$student_id = filter_var($_POST["student_id"],FILTER_SANITIZE_STRING);
					$s_id = filter_var($_POST["s_id"],FILTER_SANITIZE_STRING);
					
					$dh = new DataHandler();
				    $message = $dh->add_student($fname, $mi, $lname, $student_id);
		   			
		   			echo $message;		
				}
			?> 
		</p>
	</body>
</html>