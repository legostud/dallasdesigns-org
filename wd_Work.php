<?php 
	//This is a secure page
	//Check if the vistor has not logged in
	session_start(); 
	if(!$_SESSION['weblogin']) {
		//send him to the login.php page with the page variable set to this pages name so he can be sent back
		header('Location: Login.php?page=Work');
	}
?>
<html>
<head>
<title>Education :: Dallas Designs</title>
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
</head>
<body background="images/parchment.gif">
<div id="bodytext" style="position:absolute; width:700px; height:115px; z-index:6; left: 22px; top: 168px;"> 
  <p>Work Experience: <br />
    Under construction</p>
  </div>
<?php include("include/Top.php"); ?>
<?php include("include/WebMenu.php"); ?>  
</body>
</html>
