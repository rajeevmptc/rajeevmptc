<?php
	/************************************************************************************************/
	function dbOpen(){
		$host = "localhost";
		$username = "test"; 
		$password = "Mptc@2026";  
		$dbname = "test";

		$conn = new mysqli($host, $username, $password, $dbname);

		if ($conn->connect_error) {
    			die("Connection failed: " . $conn->connect_error);
		}
		
		$conn->set_charset("utf8mb4");
    		return $conn;
	}
	/************************************************************************************************/
?>
