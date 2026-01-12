<?php
	require_once("config.php");
	$conn=dbOpen();

	if (isset($_POST['register'])) {
	    	$uid = $_POST['userid'];
	    	$uname = $_POST['username'];
	    	$mob = $_POST['mobile'];
	    	$email = $_POST['emailid'];
	    	$pass = $_POST['password'];
	    	$conf_pass = $_POST['conf_password']; 

	    	if ($pass !== $conf_pass) {
			header("Location: index.php?error=Passwords do not match");
			exit();
	    	}

	    	$check = $conn->query("SELECT * FROM user WHERE userid='$uid'");
	    	if ($check->num_rows > 0) {
			header("Location: index.php?error=UserID already taken");
			exit();
	    	} 
	    	else {
			$sql = "INSERT INTO user (userid, username, mobile, emailid, password) 
		        		VALUES ('$uid', '$uname', '$mob', '$email', '$pass')";
		
			if ($conn->query($sql) === TRUE) {
		  		header("Location: index.php?success=Account created! Please login.");
			} 
			else {
		    		header("Location: index.php?error=Registration failed: " . $conn->error);
			}
	    	}
	}
	
	if (isset($_POST['login'])) {
	    	$uid = $_POST['userid'];
	    	$pass = $_POST['password'];

	    	$result = $conn->query("SELECT * FROM user WHERE userid='$uid' AND password='$pass'");
	    	
		if ($result->num_rows > 0) {
    			session_start();
    			$_SESSION['userid'] = $uid; 
    			header("Location: menu.php"); 
    			exit();
		}
	}
?>
