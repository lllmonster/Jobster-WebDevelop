<!DOCTYPE html>
<html>
<head>
	<title>Student Login</title>
	<link rel="stylesheet" type="text/css" href="..\css\styleLogSign.css">
</head>
<body>
    <div class="studentlogin">
		<h1>Student Login</h1>
	    <form method="post" action="slog.php">
	    	<p>Your username
	    		<input id="username" name="username" required="required" type="text" placeholder="username" />
	    	</p>
	    	<p>Your password
	    		<input id="password" name="password" required="required" type="password" placeholder="ll123" />
	    	</p>
	    	<p class="login button">
	    		<input type="submit" name="login" value="Login" />
	    	</p>
	    	<p class="change_link">Not a member yet ?
	    		<a href="studentSignup.php" class="tosignup">Join us</a>
	    	</p>
	    </form>
	</div>

</body>
</html>