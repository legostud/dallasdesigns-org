<?php include ('include/Gallery.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Lego Gallery</title>

<script language="JavaScript" type="text/JavaScript">
//<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>

<link rel="stylesheet" href="include/Menu.css" type="text/css" media="screen" />
<link rel="stylesheet" href="include/DallasDesigns.css" type="text/css" media="screen" />
<link rel="stylesheet" href="include/Gallery.css" type="text/css" media="screen" />

</head>
<body background="images/parchment.gif">
<div id="categories" class="bodytext"> 
  <?php buildCategories(); ?>
</div>
<div id="Main" class="bodytext"> 
  	<div id="navigation"> 
    	<div id="title"><?php echo $catname; ?></div>
    	<div id="controls" style="float:right;"><?php getNav(); ?></div>
  	</div>
	<div id="picture">
		<?php getImage(); ?>
	</div>
  	<div id="caption"><?php echo $caption; ?></div>
</div>
<div id="gallery" class="bodytext"> 
  <?php buildThumbs(); ?>
</div>
<div id="pictureFrame"><?php getPictureFrame(); ?></div>

<?php include ('include/Top.php'); ?>

<?php include ('include/LegoMenu.php'); ?>
</body>
</html>
