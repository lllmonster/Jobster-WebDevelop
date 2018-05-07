<?php
include 'connectDB.php';

$sid = $_POST['sid'];
$fid = $_POST['fid'];

echo "Hello, ".$sid;
$finalSid = $sid;
$finalFid = $fid;

$conn = connectDB();
$sql = "Select * from FriendMessage 	
		where (sid='$sid' and fid='$fid') or (sid='$fid' and fid='$sid')
		order by mdate";
$result = $conn->query($sql);

if ($result->num_rows > 0) { // output data of each row
    while($row = $result->fetch_assoc()) {
    	$sid = $row['sid'];
    	$fid = $row['fid'];
        $message = $row["message"];
        $mdate = $row['mdate'];
		echo "<br> Time: ".$mdate."<br>";
		echo "<br>".$sid." talk to ".$fid." : ".$message."<br>";
    }
	echo "<br> New Message: <br>";
    // set the button
    echo "<form method='post' action='addMessage.php'>";
    echo "<p><textarea name='message' rows='10' cols='80' required='required'></textarea>";
    // mark the current time
    $now = new DateTime(null, new DateTimeZone('America/New_York'));
	$currdate = $now->format('Y-m-d H:i:s');    // MySQL datetime format
	echo "<br> Current Time: ".$currdate."<br>";

    $_SESSION['sid'] = $finalSid;
    $_SESSION['fid'] = $finalFid;
    echo "<input type='hidden' name = 'mdate' value='$currdate'>";
	echo "<p><input type='submit' value='Send'>";
	echo "</form>";
} else {
    echo "Add more Friends!";
}

?>