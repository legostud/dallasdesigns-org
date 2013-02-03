<?php
// Is this the first time loading the page
if ($_POST['hidden'] == "1") {
	echo('<span style="color:red">Validating data</span><br />');
	//capture the entered data so it can redisplayed or added to the database
	$brewery_name = trim($_POST['brewery_name']); //Name of the brewery
	$brewery_photo;
	$beer_name = trim($_POST['beer_name']); //Name of the beer
	$beer_photo;

	//validate the data - check if required fields have been filled in
	if ($brewery_name && $beer_name) {
		echo('<span style="color:red">saving data</span><br />');
		//Connect to the database
		include("Jason_include/Jason_Connect.php");
		
		//write brewery data
		$sql_brewery = "insert into brewery values ('$brewery_name','$brewery_photo')";
		mysql_query($sql_brewery,$conn) or die(mysql_error());
		
		//write beer data
		$sql_beer = "insert into beer values ('$beer_name','$brewery_name','$beer_photo')";
		mysql_query($sql_beer,$conn) or die(mysql_error());
		
		//close the connection to the database
		mysql_close($conn);
	}
}
echo('<span style="color:red">Starting HTML</span><br />');
?>
<?php echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body>
<!-- more information about forms - http://www.w3schools.com/html/html_forms.asp -->
<form name="input" action="Jason_Admin.php" method="post">
Brewery Name: <input type="text" name="brewery_name" />
<hr />
Beer Name: <input type="text" name="beer_name" />

<!-- hidden field is used to determine if this is first time the page has been viewed -->
<input name="hidden" type="hidden" value="1" />
<input name="submit" type="submit" value="Submit" />
</form>
</body>
</html>
