<?php
    	session_start();
    	if (!isset($_SESSION['userid'])) {
        	header("Location: index.php");
        	exit();
    	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
	    	<meta charset="UTF-8">
	    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	    	<title>Dashboard - Student Management System</title>
	    	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
	    	<link rel="stylesheet" href="../css/menu.css" type="text/css">	
	</head>
	
	<body>
		<div class="navbar">
		
		    	<div class="header-container">
				<div class="college-name">Model Polytechnic College Vadakara</div>
				<div class="system-name">Student Management System</div>
		    	</div>
		    
		    	<ul class="menu-list">
		    	
				<li class="menu-item">
			    		<a class="menu-link" onclick="toggleSubmenu('studentSub')">Student ▾</a>
			    		<ul id="studentSub" class="submenu">
						<li><a href="student.php">Add New Student</a></li>
						<li><a href="search.html">Search Student</a></li>
			    		</ul>
				</li>
				
				<li class="menu-item">
			    		<a class="menu-link" onclick="toggleSubmenu('reportSub')">Reports ▾</a>
			    		<ul id="reportSub" class="submenu">
						<li><a href="report.php">Student Report</a></li>
			    		</ul>
				</li>
				
				<li class="menu-item">
			    		<a class="menu-link" onclick="toggleSubmenu('updateSub')">Update ▾</a>
			    		<ul id="updateSub" class="submenu">
						<li><a href="update.php">Edit Records</a></li>
						<li><a href="delete.php">Delete Records</a></li>
			    		</ul>
				</li>
				
				<li class="menu-item">
			    		<a href="logout.php" class="menu-link logout-btn">Logout</a>
				</li>
				
		    	</ul>
		</div>

		<div class="main-content">
		    	<div class="welcome-card">
				<h1>Welcome 
					<span>
						<?php 
							echo htmlspecialchars($_SESSION['userid']); 
						?>
					</span>
				</h1>
				<h3>Access and manage student information efficiently using the navigation above.</p>
		    	</div>
		</div>

		<script src="../js/script.js"></script>
	</body>
</html>
