<?php 
include('connectDB.php');
$sid = $_POST['sid'];
$sname = $_POST['sname'];
$spassword = $_POST['spassword'];

$conn = connectDB();

$sql = "INSERT INTO `Student` VALUES('$sid','$sname','$spassword');";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("Location: ..\studentLogin.html");
} else {
    echo "You need change a different username";
}
?>