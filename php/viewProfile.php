<?php 

include 'connectDB.php';

session_start();
$sid = $_SESSION['sid'];
echo "$sid";

$conn = connectDB();
$sql = "select * from StudentInfo where sid = '$sid'";
$result = $conn->query($sql);



// echo "<p><b>View Your Profile</b><br><br>";
// echo "<table border='1' cellpadding='10'>";
// //echo "<tr> <th>ID</th> <th>First Name</th> <th>Last Name</th> <th></th> <th></th></tr>";
// echo "<tr> <th>Your Name</th></tr>";
// echo "<tr> <th>Your University</th></tr>";
// echo "<tr> <th>Your Degree</th></tr>";
// echo "<tr> <th>Your Major</th></tr>";
// echo "<tr> <th>Your GPA</th></tr>";
// echo "<tr> <th>Your Name</th></tr>";
// echo "<tr> <th>Your Name</th></tr>";

if ($result->num_rows > 0 ) {

} else {
	echo "You need to create your profile";
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
		<h1><?php echo "$result"; ?></h1>
	    <form method="post" action="php\sprofile.php">
	    	<p id="suniversity">Your University
	    	<input id="suniversity" required="required" type="text" />
	    	</p>
	    	<p id="sdegree">Your Degree
	    	<input id="sdegree" required="required" type="text" />
	    	</p>
	    	<p id="smajor">Your Major
	    	<input id="smajor" required="required" type="text" />
	    	</p>
	    	<p id="sgpa">Your GPA
	    	<input id="sgpa" required="required" type="text" />
	    	</p>
	    	<p id="sinfo">Your Information</p>
	    	<p>
	    		<textarea id="sinfo" rows="5" cols="80"></textarea>
	    		<!-- <input id="sinfo" required="required" type="text" /> -->
	    	</p>

	    	<p id="sgpa">Your Resume
	    	<input id="sresume" type="file" />
	    	</p>

	    	<p id="srestriction">If your profile is only visible to your fiends and to companies you applied.
	    	<select id="srestriction">
	    		<option value="Y">Yes</option>
	    		<option value="N">No</option>
	    	</select>
	    	</p>
	    	<p class="save button">
	    		<input type="submit" name="save" value="Save" />
	    	</p>

	    	


	    </form>
	</div>



</body>
</html>


