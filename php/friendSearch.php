<?php 
include 'connectDB.php';

session_start();
$sid = $_SESSION['sid'];
if (isset($_POST['friendsname'])) {
	$keyword = $_POST['friendsname'];
}
if (isset($_SESSION['friendsname'])) {
	$rid = $_SESSION['friendsname'];
	$keyword = $_SESSION['keyword'];
}


$conn = connectDB();

$sql = "select sid from Student where sid like '%$keyword%' and sid != '$sid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$user = $row['sid'];
		$ifFriend = ifFriends($conn, $sid, $user);
		if ($ifFriend) {
			echo "<form>"."<br>"."Username: ".$user." Friend"."</form>";
		} else {
	        // No friend relationship, need to add
		    echo "<form method='post' action='friendRequest.php'>";
		    echo "<input type='hidden' name = 'sid' value='$sid'>";
		    echo "<input type='hidden' name = 'rid' value='$user'>";
		    echo "<input type='hidden' name = 'keyword' value='$keyword'>";
			echo "<br>"."Username: ".$user." <input type='submit' value='Add'>";
			echo "</form>";
		}
	}
} else {
	echo "No Results";
}
echo "<br>"."<p class='change_link'>
	   <a href='mainPage.php' class='tosignup'>Return to the main page</a>
	  </p>";

function ifFriends($conn, $sid, $user) {
	$sql0 = "select * from Friends where (sid='$sid' and fid='$user') or (sid='$user' and fid='$sid')";
	$result0 = $conn->query($sql0);
	if($result0->num_rows > 0) {
		return True;
	} else {
		return False;
	}
}

?>