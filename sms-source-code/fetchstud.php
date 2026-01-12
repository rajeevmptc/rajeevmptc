<?php
	require_once("config.php");
	header('Content-Type: application/json');

	$conn = dbOpen();

	if (!$conn) {
    		echo json_encode(['error' => 'Database connection failed']);
    		exit;
	}

	$regno = $_POST['regno'] ?? '';

	if (empty($regno)) {
    		echo json_encode(['error' => 'Registration number is required']);
    		exit;
	}

	$query = "SELECT regno, name, branch, semester, gender, DATE_FORMAT(dob, '%d/%m/%Y') AS dob, nationality,"; 
	$query.="bloodgroup, address, fathername, mothername, email, mobile FROM student WHERE regno = ?";

	$stmt = $conn->prepare($query);
	$stmt->bind_param("i", $regno);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($row = $result->fetch_assoc()) {
    		echo json_encode($row);
	} 
	else {
    		echo json_encode(['error' => 'No student found with this Registration Number.']);
	}

	$stmt->close();
	$conn->close();
?>
