<?php
	session_start(); 
	//the variable $page is passed to this page in the URL
	if($_POST[failedattempt] != 1) {
		$_SESSION['page'] = "$page.php";
	} 

	$filename = 'log/login.txt';
	
	// Check if the login data was successful
	if (($_POST[username] != "") && (strtolower($_POST[password]) == "jonathan123")) {
		//record the username and time so we can save it to a log file.
		$data = "username: ";
		$data .= $_POST[username];
		$data .= "\t date: ";
		$data .= date("r");
		$data .= "\n";
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
		//set the weblogin to true so the restricted pages in the webdev folder can be seen
		$_SESSION['weblogin'] = True;
	}
	//If the page has already been loaded once display a failed login message
	if ($_POST[failedattempt] == 1) {
		if($_SESSION['weblogin']) {
			$page = $_SESSION['page'];
			$messagetext = "<strong>You are now logged in. <a href=\"$page\">Click here</a> to continue</strong>";
		}
		else {
			$messagetext = "The page you are tring to access is a restricted to protect personal data.  Please enter your username and password.<br /><font color=\"#FF0000\"><strong>Invalid Login. Please try again.</strong></font>";
		}
	}
	else {
		$messagetext = "The page you are tring to access is a restricted to protect personal data.  Please enter your username and password.";
	}
?>

<html>
<head>
<title>Login :: Dallas Designs</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

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
</head>

<body background="images/parchment.gif">
	<div id="Login" style="position:absolute; width:700px; height:115px; z-index:6; left: 26px; top: 160px;">
    <?php echo $messagetext ?>
	<form name="login" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  		<p id="username">Username: <input type="text" name="username" /></p>
  		<p id="password">Password: <input name="password" type="password" /></p>
  		<p><input type="image" src="images/button_login.gif" width="75" height="25" /></p>
		<input type="hidden" name="failedattempt" value="1" />
  	</form>
  	<p>If you do not have an account, please send us an <a href="mailto:contact@dallasdesigns.org">email</a></p>
</div>	
<?php include("include/Top.php"); ?>
<?php include("include/WebMenu.php"); ?>
</body>
</html>
