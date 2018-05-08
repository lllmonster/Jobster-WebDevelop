<?php 
include 'connectDB.php';

session_start();
$sid = $_SESSION['sid'];
echo "Hello, "."$sid"."<br>";
$newFid = NULL;
if (isset($_SESSION['newMessageFrom'])) {
    $newFid = $_SESSION['newMessageFrom'];
}

$conn = connectDB();
$sql = "select * from Friends where sid = '$sid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) { // output data of each row
    while($row = $result->fetch_assoc()) {
        $fid = $row['fid'];
    	echo "<br> Your Friend's username: ".$fid;
        //if new message
        if ($fid == $newFid) {
            echo " (New!!!) ";
        }
        // set the button
	    echo "<form method='post' action='friendMessage.php'>";
	    echo "<input type='hidden' name = 'sid' value='$sid'>";
	    echo "<input type='hidden' name = 'fid' value='$fid'>";
		echo "<p><input type='submit' value='Send Message'>";
		echo "</form>";
    }
} else {
    echo "Add more Friends!";
}
$conn->query("update friendTrigger set fmesTrigger=False,fmesFrom='' where sid='$sid'");
echo "<br></br>"."<a href='mainPage.php' class='tosignup'>Return to the main page</a>";
 ?>