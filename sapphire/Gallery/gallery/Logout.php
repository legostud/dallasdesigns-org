<?php
session_start();

$_SESSION['login'] = false;
?>
<html>
<head>
<title>Logout</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
	<?php include ('Top.php'); ?><br /><br />
	<strong>You are now logged off.</strong>
</body>
</html>
