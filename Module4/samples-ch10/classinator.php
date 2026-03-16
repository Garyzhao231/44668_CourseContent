<html>
	<head>
		<title>Classinator</title>
	</head>
	<body>
		<h1>Class Demo</h1> 	
		<p>
			<?php 
				class Student { 
					// Properties (also known as variables) 
  					private $name; 
  					private $gpa; 

  					// Methods (also known as functions) 
					function set_name($name) { 
    					$this->name = $name; 
					} 
  					function get_name() { 
  						return $this->name; 
  					} 
   					function set_gpa($gpa) { 
    					$this->gpa = $gpa; 
  					} 
  					function get_gpa() { 
    					return $this->gpa; 
  					} 
  					function __construct($name, $gpa) { 
    					$this->name = $name; 
    					$this->gpa = $gpa; 
					}
					function printMe() {
						echo $this->name." has a GPA of ".$this->gpa;
					}
				} 
				//create an instance of the Student class
				$aStudent = new Student("Roberto Saunders",4.0); 
				//print the properties of the Student object on the screen
				$aStudent->printMe();
			?>
		</p>
	</body>
</html>