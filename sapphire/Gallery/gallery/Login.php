<?php
session_start();

// Check if the login data was successful
if ( ($_POST[username] == "********") && ($_POST[password] == "********") ) {
	//set the weblogin to true so the restricted pages in the webdev folder can be seen
	$_SESSION['login'] = true;
}

if ($_POST[failedattempt] == 1) {
	if($_SESSION['login']) {
		$messagetext = "<strong>You are now logged in.</strong>";
	}
	else {
		$messagetext = "Please enter your username and password.<br /><font color=\"#FF0000\"><strong>Invalid Login. Please try again.</strong></font>";
	}
}
else {
	$messagetext = "Please enter your username and password.";
}
?>
<html>
<head>
<title>Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
	<?php include ('Top.php'); ?><br /><br />
	<?php echo $messagetext ?>
	<form name="login" method="post" action="Login.php">
  		<p id="username">Username: <input type="text" name="username" /></p>
  		<p id="password">Password: <input name="password" type="password" /></p>
  		<p><input type="submit" name="submit" value="Login" /></p>
		<input type="hidden" name="failedattempt" value="1" />
  	</form>

</body>
</html>
