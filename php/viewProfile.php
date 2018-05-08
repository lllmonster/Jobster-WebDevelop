<?php 

include 'connectDB.php';

session_start();
$sid = $_SESSION['sid'];
echo "Hello, "."$sid"."<br>";

$conn = connectDB();
$sql = "select * from StudentInfo where sid = '$sid'";
$result = $conn->query($sql);

if ($result->num_rows > 0 ) {
	$row = $result->fetch_assoc();
	$suniversity = $row['suniversity'];
	$sdegree = $row['sdegree'];
	$smajor = $row['smajor'];
	$sgpa = $row['sgpa'];
	$sinfo = $row['sinfo'];
	$srestriction = $row['srestriction'];
	$sresumeaddr = $row['sresumeaddr'];

	$_SESSION['suniversity']   = $suniversity;
	$_SESSION['sdegree']   = $sdegree;
	$_SESSION['smajor']   = $smajor;
	$_SESSION['sgpa']   = $sgpa;
	$_SESSION['sinfo']   = $sinfo;
	$_SESSION['srestriction']   = $srestriction;
	$_SESSION['sresumeaddr']   = $sresumeaddr;
} else {
	echo "You need to create your profile";
	$suniversity = " ";
	$sdegree = " ";
	$smajor = " ";
	$sgpa = " ";
	$sinfo = " ";
	$srestriction = " ";
	$sresumeaddr = " ";

	$_SESSION['suniversity']   = $suniversity;
	$_SESSION['sdegree']   = $sdegree;
	$_SESSION['smajor']   = $smajor;
	$_SESSION['sgpa']   = $sgpa;
	$_SESSION['sinfo']   = $sinfo;
	$_SESSION['srestriction']   = $srestriction;
	$_SESSION['sresumeaddr']   = $sresumeaddr;
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Profile</title>
	<!-- <link rel="stylesheet" type="text/css" href="css\styleLogSign.css"> -->
</head>
<body>
    <div class="studentprofile">
		<h1>Student Profile</h1>
		<p>User Name: <?php echo $sid ?></p>
		<form method="post" action="editProfile.php">
			<ul>
				<li>Your University: <?php echo $suniversity ?></li>
				<li>Your Degree: <?php echo $sdegree ?></li>
				<li>Your Major: <?php echo $smajor ?></li>
				<li>Your GPA: <?php echo $sgpa ?></li>
				<li>Your Information: <?php echo $sinfo ?></li>
				<li>Your Restriction: <?php echo $srestriction ?></li>
				<li>Your Resume: <a href="<?php echo($sresumeaddr) ?>">Your Resume</a></li>
			</ul>
			<input type="submit" value="Edit">
			<p class="change_link">
	    		<a href="mainPage.php" class="tosignup">Return to the main page</a>
	    	</p>
		</form>
	</div>



</body>
</html>


