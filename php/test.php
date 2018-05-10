<?php
include 'connectDB.php';

session_start();
$sid = $_SESSION['sid'];
echo "Hello, ".$sid;
$jid = $_POST['job'];
echo "Job, ".$jid;
?>