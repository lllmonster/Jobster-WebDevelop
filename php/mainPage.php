<?php 
session_start();
$sid = $_SESSION['sid'];
echo "$sid";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Jobster</title>
</head>
<body>
	<div class="MainPage">
		<h1>Job Search</h1>

		<form method="post" action="viewProfile.php">
			<?php $_SESSION['sid']   = $sid; ?>
			<input type="submit" value="View Your Profile">
		</form>

<!-- 		<form method="post" action="ssign.php">

	    	<p class="jobsearch">Job Search 
	    		<input class="jobsearch" type="text" />
	    	</p>

	    	<p class="friendsearch">Friend Search 
	    		<input class="friendsearch" type="text" />
	    	</p>

	    	<p class = change_link>
	    		<a href="studentLogin.html" class="tologin">Sign out</a>
	    	</p>
		</form> -->
	</div>
</body>
</html>