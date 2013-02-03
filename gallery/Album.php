<?php
//check if the user has logged in
session_start();

if(!$_SESSION['login']) {
	//send the user to the login page
	header('Location: Login.php');
}
//global variable to store the XML data
$xml; 
//load the XML data
getXML();

//check if the submit button was clicked
if (isset($_GET['cmd'])) {

//check if the user wants to add a category
if ( !$_POST['name'] == '' && $_GET['cmd'] == 'new')
{
	//create a string to hold the new XML code
	$stringXML = "<album>\n";
	//record the code for the name
	$name = trim(strip_tags($_POST['name']));
	//replace & with and
	$name = str_replace("&","and",$name);
	$stringXML .= "<name>$name</name>\n";
	//determine the category
	$category = nextCategory();
	//record the code for the category
	$stringXML .= "<category>$category</category>\n";
	//record the end tag and final tag
	$stringXML .= "</album>\n</albums>";
	//open the Albums.xml file for reading
	$openFile = "../include/Albums.xml";
	$fileXML = fopen($openFile,'r') or exit("Unable to open file!");
	//read the data from the file
	$theData = fread($fileXML, filesize($openFile));
	//replace the end tag </pictures> with the new XML code
	$pattern = '/<\/albums>/';
	$theData = preg_replace($pattern,$stringXML,$theData);
	//close the file
	fclose($fileXML);
	//open the file for writing
	$fileXML = fopen($openFile,'w') or exit("Unable to open file!");
	//write the data to the file
	fwrite($fileXML,$theData);
	//close the file
	fclose($fileXML);
	
	//update the global XML variable
	getXML();
	//record the message to display to the user
	$message = "Category $name successfully created";
}

//check to see if the user wants to edit a category
if ($_GET['cmd'] == 'edit') {
	//retireve the existing data from the Albums.xml file
	global $xml;
	$album = $xml->album;
	//update the category names from the cat fields
	$i = 1;
	$sort;
	foreach ($album as $data) {
		$catname = "cat" . $i;
		$data->name = str_replace ("&","and",trim(strip_tags($_POST[$catname])));

		//resort the data using the sort fields
		//put the sort order data into an array
		$sortname = "sort" . $i;
		$sort[] = trim(strip_tags($_POST[$sortname]));
		$i++;
	}
	//perform an asort on the array
	asort($sort);
	//do a foreach on the array to get the key index
	$i=0;
	foreach ($sort as $key => $value) {	
		//use the key to retrieve the category from the xml data.
		$name[$i] = (string)$album[$key]->name;
		$category[$i] = (string)$album[$key]->category;
		$i++;
	}
	//update the global XML data 
	for( $j=0; $j < $i; $j++) {
		$xml->album[$j]->name = (string)$name[$j];
		$xml->album[$j]->category = (string)$category[$j];
	}
	//write the albums.xml file
	//create a string to hold the new XML code
	$stringXML = "<albums>\n";
	foreach ($album as $data) {
		//only record categories with names
		if(strlen(trim($data->name)) > 0) {
			$stringXML .= "<album>\n";
			//record the code for the name
			$name = $data->name;
			$stringXML .= "<name>$name</name>\n";
			//record the code for the category
			$category = $data->category;
			$stringXML .= "<category>$category</category>\n";
			//record the end tag
			$stringXML .= "</album>\n";
		}
	}
	//record the final tag
	$stringXML .= "</albums>";
	
	//find the XML file to open
	$openFile = "../include/Albums.xml";
	//open the file for writing
	$fileXML = fopen($openFile,'w') or exit("Unable to open file!");
	//write the data to the file
	fwrite($fileXML,$stringXML);
	//close the file
	fclose($fileXML);

	//update the global XML variable
	getXML();	
	//display a message to the user
	$message = "Categories succesfully updated";
}

//end isset
}
//return the XML data
function getXML() {
	global $xml;
	$xmlFile = "../include/Albums.xml";
	if (file_exists($xmlFile)) {
   		$xml = simplexml_load_file($xmlFile);
	}
	//if the file is not found
	else {
   		exit("Failed to open $file.");
	}
}

//Find the number of the next category 
function nextCategory()
{
	//retriece the xml data from Albums.xml
	global $xml;
	$album = $xml->album;
	//set the default category to zero
	$category = 0;
	//search the XML file for the highest category number
	foreach ($album as $data){
		//record the returned category if it is greater than the stored category 
		$tempCategory = $data->category;
		if( (int)$tempCategory > (int)$category)
		{
			$category = $tempCategory;
		}
	}
	//increment the category to get the next category
	$category += 1;
	//return the highest category number
	return $category;
}
//retrieve and display existing categories
function getCategory() {
	//retriece the xml data from Albums.xml
	global $xml;
	$album = $xml->album;
	//echo the input form tags for each category
	$i = 1;
	foreach ($album as $data) {
		//record the category name
		$name = $data->name;
		//set the field name
		$sortname = "sort". $i;
		$catname = "cat" . $i;
		//echo the html
		echo "<input type=\"text\" name=\"$sortname\" size=\"3\" value=\"$i\" /> <input type=\"text\" name=\"$catname\" value=\"$name\" /><br />
		";
		$i++;
	}
}
?>

<html>
<head>
<title>New Category</title>
<script type="text/javascript">
	//<!--
	function validate_required(field,alerttxt)
	{
		with (field)
		{
			if (value==null||value=="")
			{
				alert(alerttxt);
				return false;
			}
			else {return true}
		}
	}
	function validate_form(thisform)
	{
		with (thisform)
		{
			if (validate_required(name,"Please select a name for the category.")==false)
			{
				name.focus();
				return false;
			}
		}
	}
	//-->
</script>
</head>
<body>
<?php include ('Top.php'); ?><br />
<font color="#FF0000"><?php echo $message; ?></font>
<form method="post" action="Album.php?cmd=new" onsubmit="return validate_form(this)" enctype="multipart/form-data"> 
<strong>Create a new Category</strong><br /><br />
  	Category Name:<br />
  	<input name="name" type="text" /><br /><br />
	<input name="submit" type="submit" value="Sumbit" class="form">  <input type="reset" value="Clear" class="form"> 
</form>
<p><br />
  <strong>Edit an Existing Category</strong><br>
  To delete a category, delete the name and click submit</p>
<form method="post" action="Album.php?cmd=edit" enctype="multipart/form-data">
	<!--display existing categories
	fields => sort order, name -->
	Sort Order: Category Name<br />
	<div style="margin-left:25px;">
		<?php getCategory(); ?>
	</div>
	<br /><br />
	<input name="submit" type="submit" value="Sumbit" class="form">  <input type="reset" value="Clear" class="form"> 
</form>
</body>
</html> 