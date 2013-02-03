<?php
	session_start(); 
	$filename = 'log/login.txt';
	
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

<?php echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Personal :: Dallas Designs</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link rel="stylesheet" href="include/Menu.css" type="text/css" media="screen" />
<link rel="stylesheet" href="include/DallasDesigns.css" type="text/css" media="screen" />

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

<style type="text/css" media="screen">
#mainText {
	position:absolute;
	top:160px;
	left:10px; 
	width:700px;
	z-index:6; 
}
#Login {
	width:100%;
}
</style>
</head>

<body background="images/parchment.gif">
<div id="mainText">
	<?php if (!$_SESSION['login']){ ?>
	<div id="Login">
		<p>This page contains personal information. Please login in to access this page.</p>
		<form name="login" method="post" action="Personal.php">
			<p id="username">Username: <input type="text" name="username"></p>
			<p id="password">Password: <input name="password" type="password"></p>
			<p><input type="image" src="images/button_login.gif" width="75" height="25"></p>
		</form>
		<p>If you do not have an account, please send us an <a href="mailto:contact@dallasdesigns.org">email</a></p>
	</div>	
	<?php } else { ?>
	<div id="Login">
		Thank you for logging in.
	</div>
<?php } ?>
</div>

  	<?php include("include/Top.php"); ?>
	<?php include("include/PersonalMenu.php"); ?>  
</body>
</html>
