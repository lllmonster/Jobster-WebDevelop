<?php 
include('connectDB.php');
session_start();
$sid = $_SESSION["sid"];
$suniversity = $_POST['suniversity'];
$sdegree = $_POST['sdegree'];
$smajor = $_POST['smajor'];
$sgpa = $_POST['sgpa'];
$sinfo = $_POST['sinfo'];
$srestriction = $_POST['srestriction'];
$sresumeaddr = $_POST['sresumeaddr'];
echo "$suniversity";
echo "<br>";
echo "$smajor";
$conn = connectDB();

$sql = "update studentinfo 
		set suniversity='$suniversity',sdegree='$sdegree', smajor='$smajor',sgpa='$sgpa',
			sinfo='$sinfo',srestriction='$srestriction',sresumeaddr='$sresumeaddr'
		where sid='$sid'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    $_SESSION['sid']   = $sid;
    header("Location: viewProfile.php");
} else {
    echo "Error updating record: " . $conn->error;
}
?>