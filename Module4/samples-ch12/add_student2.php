<!DOCTYPE html>
<html>
	<head>
		<title>Add/Update Student</title>
		<link rel="stylesheet" type="text/css" href="css/my_styles.css" media="screen, print" />
	</head>
	<body>
		<h3>Add/Update Student</h3> 
		<?php
			include "data_handler.php";
			
			$first_name = "";
			$mi = "";
			$last_name = "";
			$photo_id = "";
			$s_id = "";
			$message = "";
			$dh = "";
			$delete_button = "";
			
			if ($_SERVER["REQUEST_METHOD"] == "GET") 
			{
				if (isset($_GET["s_id"]))
				{
					$s_id = filter_var($_GET["s_id"],FILTER_SANITIZE_STRING);
		
					$dh = new DataHandler();
					$results = $dh->get_student($s_id);	
					$first_name = $results['first_name'];
					$mi = $results['mi'];
					$last_name = $results['last_name'];
					$photo_id = $results['photo_id_number'];
					$delete_button = <<< END_BUTTON
					<button type="submit" name="deleteMe" onclick="return confirm('Do you really want to delete $first_name $last_name?');">Delete</button>
END_BUTTON;
				}
			}
			else if ($_SERVER["REQUEST_METHOD"] == "POST") { 
			
				$dh = new DataHandler();
				$s_id = filter_var($_POST["s_id"],FILTER_SANITIZE_STRING);
				
				if(isset($_POST['deleteMe']))
				{
					$message = $dh->delete_student($s_id);
				}
				else
				{
					$first_name = filter_var($_POST["first_name"],FILTER_SANITIZE_STRING);
					$mi = filter_var($_POST["mi"],FILTER_SANITIZE_STRING);
					$last_name = filter_var($_POST["last_name"],FILTER_SANITIZE_STRING);
					$photo_id = filter_var($_POST["photo_id"],FILTER_SANITIZE_STRING);
					
					if($s_id != '') {
						$message = $dh->update_student($s_id, $first_name, $mi, $last_name, $photo_id);
					}
					else {
						$message = $dh->add_student($first_name, $mi, $last_name, $photo_id);
					}
				}	
			}
			echo <<< THE_END
			<div id='searchBox'>
				<form id='studentData' action='add_student2.php' method="post">
					<label for="first_name">First Name:</label>
					<input type="text" required id="first_name" name="first_name" value="$first_name" /><br/>
					<label for="mi">Middle Initial:</label>
					<input type="text" id="mi" name="mi" value="$mi" /><br/>
					<label for="last_name">Last Name:</label>
					<input type="text" required id="last_name" name="last_name" value="$last_name" /><br/>
					<label for="photo_id"">Photo ID Number:</label>
					<input type="text" required id="photo_id" name="photo_id" value="$photo_id" /><br/>
					<input type="hidden" id="s_id" name = "s_id" value="$s_id" />
					<button type="submit">Save</button>
					$delete_button
				</form>				
			</div>
			<p>
				$message
			</p>
THE_END;
		?>
	</body>
</html>