<?php 
function nextCategory()
{
	//load the XML file
	$xmlFile = '../include/Album.xml';
	if (file_exists($xmlFile)) {
   		$xml = simplexml_load_file($xmlFile);
	}
	//if the file is not found
	else {
   		exit('Failed to open Album.xml.');
	}
	//set the default category to zero
	$category = 0;
	//search the XML file for the highest category number
	$album = $xml->album;
	$i = 0;
	foreach ($album as $data){
		//record the returned category if it is greater than the stored category 
		$tempCategory = $data[$i]->category;
		if( $tempCategory > $category)
		{
			$category = $tempCategory;
		}
		$i++;
	}
	//increment the category to get the next category
	$category++;
	//return the highest category number
	return $category;
}

if ( !$_POST['name'] == '' )
{
	//create a string to hold the new XML code
	$stringXML = "<album>\n";
	//record the code for the name
	$name = $_POST['name'];
	$stringXML .= "<name>$name</name>\n";
	//determine the category
	$category = nextCategory();
	//record the code for the category
	$stringXML .= "<category>$category</category>\n";
	//record the code for the name
	$caption = $_POST['caption'];
	$stringXML .= "<caption><![CDATA[$caption]]></caption>\n";
	//record the code for the name
	$theme = $_POST['theme'];
	$stringXML .= "<theme>$theme</theme>\n";
	//record the end tag and final tag
	$stringXML .= "</album>\n</albums>";
	//open the Album.xml file for reading
	$openFile = "../include/Album.xml";
	$fileXML = fopen($openFile,'r') or exit("Unable to open file!");
	//read the data from the file
	$theData = fread($fileXML, filesize($openFile));
	//replace the end tag </albums> with the new XML code
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
	
	echo '<font color="#FF0000">Category ';
	echo $name;
	echo ' successfully created</font><br /><br />';
?>
<?php include ('Admin.php'); ?>

<?php
} 
else 
{ 
?>
<html>
<head>
<title>New Category</title>
<script type="text/javascript">
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
</script>
</head>
<body>
<form method="post" action="Category.php" onSubmit="return validate_form(this)" enctype="multipart/form-data"> 
  	Category Name:<br />
  	<input name="name" type="text" /><br /><br />
  	Category Caption:<br />
  	<input name="caption" type="text" /><br /><br />
  	Keywords:<br />
  	<input name="keyword" type="text" /><br /><br />
	<input name="submit" type="submit" value="Sumbit" class="form">  <input type="reset" value="Clear" class="form"> 
</form>
</body>
</html> 
<?php } ?>