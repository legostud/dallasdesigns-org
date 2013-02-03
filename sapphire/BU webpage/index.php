<?php require_once ('file:///C|/Users/jwdallas/AppData/Local/Temp/Temp1_BU_Job.zip/BU%20Job/BU%20website/include/logic.php'); ?>
<?php echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>BU applicaton</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<script src="file:///C|/Users/jwdallas/AppData/Local/Temp/Temp1_BU_Job.zip/BU%20Job/BU%20website/include/toggle.js"></script>
<script src="file:///C|/Users/jwdallas/AppData/Local/Temp/Temp1_BU_Job.zip/BU%20Job/BU%20website/include/validate.js"></script>

<style type="text/css" media="screen">
#message
{
	color:red;
	font-size:20px;
	font-weight:bold;
}
</style>
</head>

<body background="file:///C|/Users/jwdallas/AppData/Local/Temp/Temp1_BU_Job.zip/BU%20Job/BU%20website/images/parchment.gif">
<a href="/index.php"><img src="file:///C|/Users/jwdallas/AppData/Local/Temp/Temp1_BU_Job.zip/BU%20Job/BU%20website/images/DallasDesignsLogo.gif" border="0" /></a> 
<span id="message"><?php echo $message; ?></span><br />

<form action="file:///C|/Users/jwdallas/AppData/Local/Temp/Temp1_BU_Job.zip/BU%20Job/BU%20website/index.php" method="post" onsubmit="return validate_form(this)">
	<p>Name: 
		<br />
		<input type="text" name="name" size="35" maxlength="255" value="<?php echo $name; ?>" />
*    </p>
	<p>		
	E-mail: 
		<br />
		<input type="text" name="email" size="35" maxlength="255" value="<?php echo $email; ?>" />
*    </p>
	<p>		
	Phone: 
		<br />
		<input type="text" name="phone" size="35" maxlength="14" value="<?php echo $phone; ?>" />
    </p>
	<p>		
	URL: 
	    <br />
		<input type="text" name="url" size="35" maxlength="255" value="<?php echo $url; ?>" />
*    </p>
	<p>		
	Date task completed 
		<br />
		<input type="text" name="task_date" size="35" maxlength="10" value="<?php echo $task_date; ?>" />
*		 (yyyy-mm-dd)</p>
	<p>
	Notes: 
		<br />
		<input type="text" name="notes" size="35" maxlength="255" value="<?php echo $notes; ?>" />
    </p>
	<p>	
	Task:<br />
	    <input type="radio" name="task" value="launch" onClick="javascript:toggle('launch')" <?php echo $launch; ?> />
		 Launch *<br/>
	    <input type="radio" name="task" value="re-launch" onClick="javascript:toggle('re-launch')" <?php echo $re_launch; ?>/>
		 Re-Launch *</p>
	<div id="launch" style="display: <?php echo $sl; ?> ;" >
		Description of site: <br />
		<input type="text" name="site" size="35" maxlength="255" value="<?php echo $site; ?>" />
*	</div>
	<div id="re-launch" style="display: <?php echo $sr; ?> ;" >
		<p>Date site was originally launched: <br />
		    <input type="text" name="launch_date" size="35" maxlength="10" value="<?php echo $launch_date; ?>" />
*	(yyyy-mm-dd)	</p>
		<p>Description of changes: <br />
		    <input type="text" name="change" size="35" maxlength="255" value="<?php echo $change; ?>" />
	</p>
	</div>
	<br />
	<input name="hidden" type="hidden" value="1" />
	<input name="submit" type="submit" value="Sumbit" class="form" /> 
</form>
</body>
</html>
