<?php
	include 'connectDB.php';
	session_start();
	$jid = $_POST['apply'];
	$sid = $_POST['sid'];


	$conn = connectDB();

	$query1 = "select cid from JobInfo where jid='".$jid."'";
	$result1 = mysqli_query($conn, $query1) or die('Query failed: ' . mysqli_error($conn));
	$row1 = mysqli_fetch_assoc($result1);

 	$query = "insert into JobApply (`sid`,`jid`,`cid`) VALUES ('".$sid."','".$jid."','".$row1["cid"]."')";
	$result = mysqli_query($conn, $query) or die('Query failed: ' . mysqli_error($conn));
	
	if ($result === TRUE) {
		header("Location: ViewJob.php");
	}
	else {
		echo "Error updating record: " . $conn->error;
	}
?>