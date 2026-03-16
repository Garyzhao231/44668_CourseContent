<!DOCTYPE html>
<html>
	<head>
		<title>Student Lookup</title>
		<link rel="stylesheet" type="text/css" href="css/my_styles.css" media="screen, print" />
	</head>
	<body>
		<h1>Student Lookup</h1> 
		<div id='searchBox'>
			<form action='show_student.php' method="post">
				<label for="s_id">Student Record#:</label>
  				<input type="number" required id="s_id" name="s_id" /><br>
  				<input type="submit" value="Submit" />
			</form>	
		</div>
		<p>
			<?php 
				include "data_handler.php";
				
				if ($_SERVER["REQUEST_METHOD"] == "POST") 
				{ 	
					$s_id = filter_var($_POST["s_id"],FILTER_SANITIZE_STRING); 
		
					$dh = new DataHandler();
				    $results = $dh->get_student($s_id);
				    
				    if($results != null)
					{
				    	echo "<table class='fullborder'><tr><th>First Name</th><th>MI</th><th>Last Name</th><th>Photo ID Number</th></tr><tr>";
				    	echo "<td>".$results['first_name']."</td>";
				    	echo "<td>".$results['mi']."</td>";
				    	echo "<td>".$results['last_name']."</td>";
				    	echo "<td>".$results['photo_id_number']."</td>";
				    	echo "</tr></table>";
				    }
				    else
				    {
				    	echo "<p>No Records Found</p>";
				    }
				}
			?> 
		</p>
	</body>
</html>