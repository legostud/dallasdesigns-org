<?php echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Video :: Dallas Designs</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link rel="stylesheet" href="include/Menu.css" type="text/css" media="screen" />
<link rel="stylesheet" href="include/DallasDesigns.css" type="text/css" media="screen" />

<script src="include/ShowHide.js"></script>

<script language="JavaScript" type="text/JavaScript">
<!--

function message()
{
	setTimeout("show('message')",1200);
}
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
	text-align:center; 
	z-index:6; 
}
#rickroll {
	width:100%;
}
#message {
	display:none;
}
</style>
</head>

<body background="images/parchment.gif" onload="javascript:message();">
<div id="mainText">
	<div id="rickroll">
		<p><span id="message">You've been Rick Rolled :-)<br/><br/></span>
			<object width="425" height="344">
			    <param name="movie" value="http://www.youtube.com/v/3AdFA6WWJ7E&hl=en&fs=1"></param>
			    <param name="allowFullScreen" value="true"></param>
			    <param name="autoplay" value="true"></param>
  			    <param name="autoStart" value="true"></param>
			    <embed src="http://www.youtube.com/v/3AdFA6WWJ7E&hl=en&fs=1&autoplay=1" type="application/x-shockwave-flash" allowfullscreen="true" width="425" height="344"></embed>
		</object>
		</p>
		<p>&nbsp;	</p>
	</div>
</div>

  <?php include("include/Top.php"); ?>

</body>
</html>
