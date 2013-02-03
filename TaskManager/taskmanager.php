<?php
//connect to the database
$conn=mysql_connect("db65b.pair.com","guigui_2","8Usweet!") or die(mysql_error());
mysql_select_db("guigui_Projects",$conn) or die(mysql_error());

if ($_GET[task]) {
	$sql_ET = "update task_manager set end_time = now() where end_time = 0";
	mysql_query($sql_ET,$conn) or die(mysql_error());

	$sql_ST = "insert into task_manager values ('','$_GET[task]',now(),'')";
	mysql_query($sql_ST,$conn) or die(mysql_error());
}

?>
<html>
<head>
<title>Dancing Deer Task Manager</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="include/deerstyle.css" type="text/css">

</head>

<body bgcolor="#75A4D2" text="#FFCC00">
<table width="75" border="0">
  <tr align="center"> 
    <? if ($_GET[task] == "reseller") { ?>
    	<td width="75" height="75" class="bodytext">
			<strong><img src="images/smalldeerleft.gif" width="45" height="39"><br>
      		Reseller </strong>
		</td>
    <? } else { ?>
    	<td width="75" height="75" class="bodytext">
			<a href="taskmanager.php?task=reseller">
			<img src="images/jonswork-blank.gif" width="45" height="39" border="0"><br>
    		Reseller</a>
		</td>
    <? } ?>
  </tr>
  <tr align="center"> 
    <? if ($_GET[task] == "DTC") { ?>
    	<td height="75" class="bodytext">
			<strong><img src="images/smalldeerleft.gif" width="45" height="39"><br>
      		DTC</strong>
		</td>
    <? } else { ?>
    	<td height="75" class="bodytext">
			<a href="taskmanager.php?task=DTC">
			<img src="images/jonswork-blank.gif" width="45" height="39" border="0"><br>
      		DTC</a>
		</td>
    <? } ?>
  </tr>
  <tr align="center"> 
    <? if ($_GET[task] == "corporate") { ?>
    	<td height="75" class="bodytext">
			<strong><img src="images/smalldeerleft.gif" width="45" height="39"><br>
      		Corporate</strong>
		</td>
    <? } else { ?>
    	<td height="75" class="bodytext">
			<a href="taskmanager.php?task=corporate">
			<img src="images/jonswork-blank.gif" width="45" height="39" border="0"><br>
      		Corporate</a>
		</td>
    <? } ?>
  </tr>
  <tr align="center"> 
    <? if ($_GET[task] == "IT") { ?>
    	<td height="75" class="bodytext">
			<strong><img src="images/smalldeerleft.gif" width="45" height="39"><br>
      		Help Desk</strong>
		</td>
    <? } else { ?>
    	<td height="75" class="bodytext">
			<a href="taskmanager.php?task=IT">
			<img src="images/jonswork-blank.gif" width="45" height="39" border="0"><br>
      		Help Desk</a>
		</td>
    <? } ?>
  </tr>
  <tr align="center"> 
    <? if ($_GET[task] == "web" || $_GET[task] == "newsletter") { ?>
    	<td height="90" class="bodytext">
			<strong><img src="images/smalldeerleft.gif" width="45" height="39"><br>
      		Web <font size="-2"><br> 
      	<? if ($_GET[task] == "newsletter") { ?>
      		Email | <a href="taskmanager.php?task=web">Site</a> 
      	<? } else { ?>
      		<a href="taskmanager.php?task=newsletter">Email</a> | Site 
      	<? } ?>
      	</font></strong></td>
    <? } else { ?>
    	<td height="90" class="bodytext">
			<font color="#FFFFFF">
			<img src="images/jonswork-blank.gif" width="45" height="39" border="0"><br> 
      		Web<br>
      		<font size="-2"><a href="taskmanager.php?task=newsletter">Email</a> 
      		| <a href="taskmanager.php?task=web">Site</a></font></font>
		</td>
    <? } ?>
  </tr>
  <tr align="center"> 
    <? if ($_GET[task] == "phone") { ?>
    	<td height="75" class="bodytext">
			<strong><img src="images/smalldeerleft.gif" width="45" height="39"><br>
      		CSR</strong>
		</td>
    <? } else { ?>
    	<td height="75" class="bodytext">
			<a href="taskmanager.php?task=phone">
			<img src="images/jonswork-blank.gif" width="45" height="39" border="0"><br>
      		CSR</a>
		</td>
    <? } ?>
  </tr>
  <tr align="center"> 
    <? if ($_GET[task] == "break") { ?>
    	<td height="75" class="bodytext">
			<strong><img src="images/smalldeerleft.gif" width="45" height="39"><br>
      		Break </strong>
		</td>
    <? } else { ?>
    	<td height="75" class="bodytext">
			<a href="taskmanager.php?task=break">
			<img src="images/jonswork-blank.gif" width="45" height="39" border="0"><br>
      		Break</a></td>
    <? } ?>
  </tr>
  <tr align="center"> 
    <? if ($_GET[task] == "other") { ?>
    	<td height="75" class="bodytext">
			<strong><img src="images/smalldeerleft.gif" width="45" height="39"><br>
      		Other </strong>
		</td>
    <? } else { ?>
    	<td height="75" class="bodytext">
			<a href="taskmanager.php?task=other">
			<img src="images/jonswork-blank.gif" width="45" height="39" border="0"><br>
      		Other</a>
		</td>
    <? } ?>
  </tr>
</table>
</body>
</html>
