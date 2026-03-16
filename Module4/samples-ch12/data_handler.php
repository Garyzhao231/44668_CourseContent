<?php
	class DataHandler { 
		// Properties  
		private $db_conn; 
		
		// Methods
		public function __construct() { 
			//Create the database connection
			$this->db_conn = MySQLi_connect(
   				"localhost", //Server Name
   				"taus_web_user", //Username
   				"p89k3W42rDmI-1*e", //Password
   				"taus_data" //Database Name
			);  
			//Test the connection
			if (MySQLi_connect_errno()) {
				die("Connection failed: " . MySQLi_connect_error());
			}
		}
		
		public function get_student($s_id) 
		{
				//Stored procedure to run
   				$query = "CALL sp_get_student('".$s_id."')";
   				
				//Stored procedure preparation
   				$exec_query = MySQLi_query($this->db_conn, $query);
   	
   				//Fetching result from database
   				$q_results = MySQLi_fetch_array($exec_query);
   				
				return $q_results;
		}
		
		public function get_students($photo_id, $last_name) 
		{
				// check to see if the photo id is empty 
				// assign it the default value 0 if it is
				// this is necessary because this stored procedure
				// requires a value for the integer input parameter
				if($photo_id=='') 
				{
					$photo_id = 0;
				}
				
				//declare the array variable
				$my_arr = array();
				
				//stored procedure to run
   				$query = "CALL sp_get_students('".$photo_id."','".$last_name."')";
   				
				//stored procedure preparation
   				$exec_query = MySQLi_query($this->db_conn, $query);
   				
   				//loop through the results, building the array of associative arrays
   				while($row = mysqli_fetch_array($exec_query)) 
   				{
   					$my_arr[] = $row;
   				}
   					
				return $my_arr;
		}
		
		public function add_student($first_name, $mi, $last_name, $photo_id)
		{	
			$message = ""; 
			
			//build query
   			$query = "CALL sp_insert_student('".$first_name."','".$mi."','".$last_name."','".$photo_id."')";
   				
			//query execution
   			$ExecQuery = MySQLi_query($this->db_conn, $query);
   					
   			if($ExecQuery == '1') 
   			{
   				$message = "Success!";
   			}
   			else 
   			{
   				$message = "Save Operation Failed";
   			}
   			return $message;
		}
		
		public function update_student($s_id, $first_name, $mi, $last_name, $photo_id)
		{	
			$message = ""; 
			
			//build query
   			$query = "CALL sp_update_student('".$s_id."','".$first_name."','".$mi."','".$last_name."','".$photo_id."')";
   			echo $query;	
			//query execution
   			$ExecQuery = MySQLi_query($this->db_conn, $query)  						
   			if($ExecQuery == '1') 
   			{
   				$message = "Success!";
   			}
   			else 
   			{
   				$message = "Save Operation Failed";
   			}
   			return $message;
		}

		public function delete_student($s_id)
		{
			
			$message = ""; 
			
			//build query
   			$query = "CALL sp_delete_student('".$s_id."')";

			//query execution
   			$ExecQuery = MySQLi_query($this->db_conn, $query)  						
   			if($ExecQuery == '1') 
   			{
   				$message = "Success!";
   			}
   			else 
   			{
   				$message = "Delete Failed";
   			}
   			return $message;
		}
		
		/* class functions from here to there */
		public function get_one_class($c_id) 
		{
				//stored procedure to run
   				$query = "CALL sp_get_class('".$c_id."')";
   				
				//stored procedure preparation
   				$exec_query = MySQLi_query($this->db_conn, $query);
   	
   				//fetching result from database
   				$q_results = MySQLi_fetch_array($exec_query);
   				
				return $q_results;
		}
		
		public function get_classes($class_number, $class_name) 
		{
				// check to see if the class number is empty 
				// assign it the default value 0 if it is
				// this is necessary because this stored procedure
				// requires a value for the integer input parameter
				if($class_number=='') {
					$class_number = 0;
				}
				
				//declare the array variable
				$my_arr = array();
				
				//stored procedure to run
   				$query = "CALL sp_get_classes('".$class_number."','".$class_name."')";
   				
				//stored procedure preparation
   				$exec_query = MySQLi_query($this->db_conn, $query);
   				
   				//loop through the results, building the array of associative arrays
   				while($row = mysqli_fetch_array($exec_query)) 
   				{
   					$my_arr[] = $row;
   				}
   					
				return $my_arr;
		}
		
		public function add_class($class_name, $start_dt, $end_dt, $class_number)
		{	
			$message=""; 
			
			//build query
   			$query = "CALL sp_insert_class('".$class_name."','".$start_dt."','".$end_dt."','".$class_number."')";
   				
			//query execution
   			$ExecQuery = MySQLi_query($this->db_conn, $query);
   					
   			if($ExecQuery == '1') 
   			{
   				$message = "Success!";
   			}
   			else 
   			{
   				$message = "Save Operation Failed";
   			}
   			return $message;
		}
		
		public function update_class($c_id, $class_name, $start_dt, $end_dt, $class_number)
		{
			$message=""; 
			
			//build query
   			$query = "CALL sp_update_class('".$c_id."','".$class_name."','".$start_dt."','".$end_dt."','".$class_number."')";
   				
			//query execution
   			$ExecQuery = MySQLi_query($this->db_conn, $query);
   						
   			if($ExecQuery == '1') 
   			{
   				$message = "Success!";
   			}
   			else 
   			{
   				$message = "Save Operation Failed";
   			}
   			return $message;
		}

		public function delete_class($c_id)
		{
			$message=""; 
			
			//build query
   			$query = "CALL sp_delete_class('".$c_id."')";

			//query execution
   			$ExecQuery = MySQLi_query($this->db_conn, $query);
   						
   			if($ExecQuery == '1') 
   			{
   				$message = "Success!";
   			}
   			else 
   			{
   				$message = "Delete Failed";
   			}
   			return $message;
		}
		/* end of class manipulation functions */
		
	}
	
?>