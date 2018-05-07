<?php  
	function connectDB() {
		// connect to the database
		$conn = new mysqli('localhost','root','','jobster');
		// check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}// echo "Access into system successfully"."<br>"."<br>";
		return $conn;
	}
?>