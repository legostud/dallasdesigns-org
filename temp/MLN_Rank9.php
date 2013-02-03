<?php 

$hawks = 0;
$lions = 0;
$owls = 0;
$rabbits = 0;
$snakes = 0;
$turtles =0;
$wolves =0;

?>

<?php echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Rank 9 Spreadsheet</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<style type="text/css" media="screen">
body {
	background-color: black;
}
#body {
	width:100%;
}
#content {
	width: 800px;
	min-height:600px;
	margin: auto 0px;
	background-color: white;
}	
.row {
	clear: both;
	float: left;
}
.header {
	font-size:20px;
	font-weight:bold;
}
</style>
</head>

<body>
<div id="body">
<div id="content">
<form action="MLN_Rank9.php">
<div class="header">Animals Built</div>
<div class="row">
<strong>Eric</strong><br />
Turtles: <input type="text" value="<?php echo $turtles ?>" name="turtles" /><br />
Snakes: <input type="text" value="<?php echo $snakes ?>" name="snakes" /><br />
</div>
<div class="row">
<strong>Joel</strong><br />
Lions: <input type="text" value="<?php echo $lions ?>" name="lions" /><br />
Rabbits: <input type="text" value="<?php echo $rabbits ?>" name="rabbits" /><br />
Wolves: <input type="text" value="<?php echo $wolves ?>" name="wolves" /><br />
</div>
<div class="row">
<strong>Jon</strong><br />
Hawks: <input type="text" value="<?php echo $hawks ?>" name="hawks" /><br />
Owls: <input type="text" value="<?php echo $owls ?>" name="owls" /><br />
</div>
<div class="row"><input type="button" value="submit" name="submit" /></div>
</form>
</div>
</div>
</body>
</html>
