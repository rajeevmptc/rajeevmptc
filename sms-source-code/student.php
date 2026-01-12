<?php
	require_once("config.php");
	$conn=dbOpen();

	$message = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	    $stmt = $conn->prepare("INSERT INTO student (regno, name, branch, semester, gender, dob, nationality, bloodgroup, address, fathername, mothername, email, mobile) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	    
	    $stmt->bind_param("issssssssssss", $_POST['regno'], $_POST['name'],  $_POST['branch'], $_POST['semester'], $_POST['gender'], $_POST['dob'], $_POST['nationality'], $_POST['bloodgroup'], $_POST['address'], $_POST['fathername'], $_POST['mothername'], $_POST['email'], $_POST['mobile']);

	    if ($stmt->execute()) {
		$message = "<div class='alert success'>Record saved successfully!</div>";
	    } else {
		$message = "<div class='alert error'>Error: " . $conn->error . "</div>";
	    }
	    $stmt->close();
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
	    	<meta charset="UTF-8">
	    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	    	<title>Student Registration</title>
	    	 <link rel="stylesheet" href="../css/student.css" type="text/css">
	</head>
	
	<body>
	
		<div class="container">
	    		<h2>Student Registration Form</h2>
	    		<?php echo $message; ?>

	    		<form action="" method="POST" id="regForm">
				<div class="form-grid">
			
		      		<div class="form-group">
					<label>Reg No :</label>
					<input type="text" name="regno" required>
			    	</div>
			    
			    	<div class="form-group">
					<label>Name :</label>
					<input type="text" name="name" required>
			    	</div>

			    	<div class="form-group">
					<label>Branch :</label>
					<select name="branch" required>
					    	<option value="">Select Branch</option>
					    	<option value="BME">BioMedical Engineering</option>
					    	<option value="CE">Computer Engineering</option>
				    		<option value="CHE">Computer Hardware Engineering</option>
					    	<option value="ELE">Electronics Engineering</option>
					    	<option value="EEE">Electrical & Electronics Engineering</option>
					</select>
			    	</div>
		    
			    	<div class="form-group">
					<label>Semester :</label>
					<select name="semester" required>
					    	<option value="">Select Semester</option>
					    	<option value="First">First</option>
					    	<option value="Second">Second</option>
					    	<option value="Third">Third</option>
					    	<option value="Fourth">Fourth</option>
					    	<option value="Fifth">Fifth</option>
					    	<option value="Sixth">Sixth</option>
					</select>
			    	</div>

			    	<div class="form-group">
					<label>Gender :</label>
					<div class="radio-group">
					    	<label><input type="radio" name="gender" value="Male" required> Male</label>
					    	<label><input type="radio" name="gender" value="Female"> Female</label>
					    	<label><input type="radio" name="gender" value="Other"> Other</label>
					</div>
			    	</div>
			    
			    	<div class="form-group">
					<label>Date of Birth :</label>
					<input type="date" name="dob" required>
			    	</div>

			    	<div class="form-group">
					<label>Nationality :</label>
					<div class="radio-group">
					    	<label><input type="radio" name="nationality" value="Indian" required> Indian</label>
					    	<label><input type="radio" name="nationality" value="Non Indian"> Non Indian</label>
					</div>
			    	</div>
			    	
			    	<div class="form-group">
					<label>Blood Group :</label>
					<input type="text" name="bloodgroup">
			    	</div>

			    	<div class="form-group full-width">
					<label>Address :</label>
					<textarea name="address" rows="3"></textarea>
			    	</div>

			    	<div class="form-group">
					<label>Father's Name :</label>
					<input type="text" name="fathername">
			    	</div>
			    	
			    	<div class="form-group">
					<label>Mother's Name :</label>
					<input type="text" name="mothername">
			    	</div>

			    	<div class="form-group">
					<label>Email ID :</label>
					<input type="email" name="email" required>
			    	</div>
			    	
			    	<div class="form-group">
					<label>Mobile Number :</label>
					<input type="tel" name="mobile" required>
			    	</div>
		    	
			</div>

			<div class="btn-container">
			    	<button type="submit">Submit</button>
			    	<button type="reset">Clear Form</button>
			    	<button type="button" onclick="window.location.href='menu.php'">Home</button>
			</div>
    		</form>
	</div>

</body>
</html>






