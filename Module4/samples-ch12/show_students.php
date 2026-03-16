<!DOCTYPE html>
<html>
	<head>
		<title>Student Lookup</title>
		<link rel="stylesheet" type="text/css" href="css/my_styles.css" media="screen, print" />
	</head>
	<body>
		<h3><a href="show_students.php">Student Enrollment Management</a> &middot; <a href="show_classes.php">Class Management</a></h3>
		<div id='banner'>
			<span id='searchBox'>
				<p>Search for a student by:</p>
				<form action='show_students.php' method="post">
					<label for="photo_id">Photo ID#:</label>
					<input type="number" id="photo_id" name="photo_id" /> -or-<br/>
					<label for="last_name">Last Name Starts With:</label>
					<input type="text" id="last_name" name="last_name" maxlength='10'/><br/>
					<input type="submit" value="Submit" />
				</form>	
			</span>
			<span id='menuOptions'>
				<a href="add_student2.php" target="_new">
					<figure>
						<img src="images/student.png" alt="add student"/>
						<figcaption>Add Student</figcaption>
					</figure>
				</a>
			</span>
		</div>
		<p>
			<?php 
				include "data_handler.php";
				
				if ($_SERVER["REQUEST_METHOD"] == "POST") 
				{ 	
					$photo_id = filter_var($_POST["photo_id"],FILTER_SANITIZE_STRING);
					$last_name = filter_var($_POST["last_name"],FILTER_SANITIZE_STRING);  
		
					$dh = new DataHandler();
				    $results_arr = $dh->get_students($photo_id,$last_name);
				    
				    if(count($results_arr)>0) {
				    	$results = "<table class='fullborder'><tr><th>First Name</th><th>MI</th><th>Last Name</th><th>Photo ID Number</th></tr><tr>";
				    	foreach($results_arr as $row){
				    		$results .= "<tr>";
				    		$results .= "<td>".$row['first_name']."</td>";
				    		$results .= "<td>".$row['mi']."</td>";
				    		$results .= "<td>".$row['last_name']."</td>";
				    		$results .= "<td><a href='add_student2.php?s_id=".$row['id']."' target='_new'>".$row['photo_id_number']."</a></td>";
				    		$results .= "</tr>";
				    	}
				    	$results .= "</table>";
				    }
				    else {
				    	$results = "No Records Found";
				    }
				    echo $results;
				}
			?> 
		</p>
	</body>
</html>