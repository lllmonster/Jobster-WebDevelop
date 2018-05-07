<?php 
session_start();
$sid = $_SESSION['sid'];
echo "Hello, "."$sid"."<br>";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Jobster</title>
</head>
<body>
	<div class="MainPage">
		<h1>Job Search</h1>

		<?php $_SESSION['sid']   = $sid; ?>
		<form method="post" action="viewProfile.php">
			<input type="submit" value="View Your Profile">
		</form>

		<form method="post" action="viewFriends.php">
			<input type="submit" value="View Your Friends">
		</form>

	    	<!-- <p class="jobsearch">Job Search 
	    		<input class="jobsearch" type="text" />
	    	</p> -->
    	<p class = change_link>
    		<a href="..\studentLogin.html" class="tologin">Sign out</a>
    	</p>
	</div>
</body>
</html>