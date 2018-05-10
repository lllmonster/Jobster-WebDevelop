<?php 
include 'connectDB.php';
include 'friendTrigger.php';
session_start();
$sid = $_SESSION['sid'];

$conn = connectDB();
$row_trigger = friendTrigger($conn,$sid);
$fmt = $row_trigger['fmesTrigger'];
$fmtFrom = $row_trigger['fmesFrom'];
$frt = $row_trigger['freqTrigger'];
$frtFrom = $row_trigger['freqFrom'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Jobster</title>
	<link rel="stylesheet" type="text/css" href="..\css\style.css">
</head>
<body>
	<div class="mainpage">
		<h1>Welcome to Jobster, <?php echo "$sid"."<br>"; ?></h1>

		<?php $_SESSION['sid']   = $sid; ?>
		<form class="view1" method="post" action="viewProfile.php">
			<input type="submit" value="View Your Profile">
		</form>

		<form class="view2" method="post" action="viewFriends.php">
			<input type="submit" value="Talk To Your Friends">
			<?php  
				if($fmt == True){ echo "You have a new message:)";}
				$_SESSION['newMessageFrom'] = $fmtFrom;
			?>
		</form>
		<br></br>
		<form class="notify" method="post" action="friendNotifications.php">
			<input type="submit" value="Friend Notifications">
			<?php  
				if($frt == True){ echo "You have a new Request:)";}
				$_SESSION['newRequestFrom'] = $frtFrom;
			?>
		</form>
		<br>

		<form class="notify" method="post" action="jobNotifications.php">
			<input type="submit" value="Job Notifications">
		</form>
		<br></br>

		<form class="search" method="post" action="companySearch.php">
			<p>Search Company
				<input id="companyname" name="companyname" required="required" type="text" >
			<input type="submit" value="Search Company">
			</p>
		</form>

		<form class="search" method="post" action="friendSearch.php">
			<p>Search Friends&nbsp;&nbsp;
				<input id="friendsname" name="friendsname" required="required" type="text">
			<input type="submit" value="Search Friends">
			</p>
		</form>

		<form class="search" method="post" action="jobSearch.php">
			<p>Search Job&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input id="jobsname" name="jobname" required="required" type="text" >
			<input type="submit" value="Search Job">
			</p>
		</form>
	    	<!-- <p class="jobsearch">Job Search 
	    		<input class="jobsearch" type="text" />
	    	</p> -->
    	<p class = change_link>
    		<a href="studentLogin.php" class="tologin">Sign out</a>
    	</p>
	</div>
</body>
</html>