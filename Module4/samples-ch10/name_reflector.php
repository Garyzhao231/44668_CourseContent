<html>
	<head>
		<title>Name Reflector</title>
	</head>
	<body>
		<h1>Name Reflector</h1> 	
		<p>
			<?php 
				if ($_SERVER["REQUEST_METHOD"] == "POST") 
				{ 	
					$fname = $_POST["fname"]; 
					$lname = $_POST["lname"];
					
					/*
					$fname = filter_var($_POST["fname"],FILTER_SANITIZE_STRING); 
					$lname = filter_var($_POST["lname"],FILTER_SANITIZE_STRING);
					*/
				}
  				echo "<h2>Hello ".$fname." ".$lname."!</h2>"; 
			?>
		</p>
	</body>
</html>