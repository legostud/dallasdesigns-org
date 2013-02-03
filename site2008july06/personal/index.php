<?php
	session_start(); 
	$filename = '../log/login.txt';
	
	if (($_POST[username] != "") && ($_POST[password] == "curious")) {
		$_SESSION['login'] = True; // login successful
		//create username and time stamp.
		$data = "\nusername: ";
		$data .=$_POST[username];
		$data .="\t date: ";
		$data .=date("r");
		//echo $data;
		
		// Does the file exist and is writable first.
		if (is_writable($filename)) {
    		// open the file as appendable
    		if (!$handle = fopen($filename, 'a')) {
        		echo "Cannot open file ($filename)";
         		exit;
    		}
	    	// record the username and time stamp to the login.txt file.
 		   	if (fwrite($handle, $data) == FALSE) {
				echo "Cannot write to file ($filename)";
    		}
	    	fclose($handle);
		} else {
    		echo "The file $filename is not writable";
		}
	}
?>

<html>
<head>
<title>Personal :: Dallas Designs</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
</head>

<body background="../images/parchment.gif">
<?php include("../templates/Top.html"); ?>
<?php if (!$_SESSION['login']){ ?>
	<div id="Login" style="position:absolute; width:700px; height:115px; z-index:6; left: 26px; top: 151px;">
  	<p>This page contains personal information. Please login in to access this page.</p>
  	<form name="login" method="post" action="<?php ($_SERVER['PHP_SELF']);?>">
  		<p id="username">Username: <input type="text" name="username"></p>
  		<p id="password">Password: <input name="password" type="password"></p>
  		<p><input type="image" src="../images/button_login.gif" width="75" height="25"></p>
  	</form>
  	<p>If you do not have an account, please send us an <a href="mailto:contact@dallasdesigns.org">email</a></p>
</div>	
<?php } else { ?>
<div id="Body" style="position:absolute; width:700px; height:115px; z-index:6; left: 26px; top: 151px;">
	Thank you for logging in.
</div>
<?php } ?>
</body>
</html>
