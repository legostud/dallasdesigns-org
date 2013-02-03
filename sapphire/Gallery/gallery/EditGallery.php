<?php
//check if the user has logged in
session_start();

if( !$_SESSION['login'] ) {
	//send the user to the login page
	header('Location: Login.php');
}

//load the Albums.xml file
loadCategories();
//Store the Album's data for future use
$xmlAblum;

if ($_GET['cmd'] == "edit") {
	//read the data from the Pictures.xml file
	$xmlFile = '../include/Pictures.xml';
	if (file_exists($xmlFile)) {
   		$xml = simplexml_load_file($xmlFile);
	}
	//if the file is not found
	else {
   		exit("Failed to open $xmlFile.");
	}
	$picture = $xml->picture;
	//retrieve the updataed data
	$i=1;
	$j=0;
	//determine which category to update
	$selectedCategory = $_POST['category'];
	foreach ($picture as $data) {
		$dataCategory =	$data->category;
		if( categoryMatch( $selectedCategory, $dataCategory) ) {
		//if((int)$selectedCategory == (int)$dataCategory) {
			//update the captions
			$capname = "caption" . $i;
			$caption = (string)trim(strip_tags($_POST[$capname]));
			//replace & from with "and" in the caption
			$caption = str_replace("&","and",$caption);
			$data->caption = $caption;
			//update the category
			$catname = "category" . $i;
			$data->category = (string)$_POST[$catname];
			$i++;
			
			//record location of record
			$location[] = $j;
			$sortname = "sort" . $j;
			$sort[$j] = trim(strip_tags($_POST[$sortname]));
		}
		$j++;
	}
	//sort the images
	asort($sort);
	//do a foreach on the array to get the key index
	foreach ($sort as $key => $value) {	
		//use the key to retrieve the category from the xml data.
		$arrayName[] = (string)$picture[$key]->name;
		$arrayCategory[] = (string)$picture[$key]->category;
		$arrayCaption[] = (string)$picture[$key]->caption;
	}
	//update the global XML data 
	$i=0;
	foreach ($location as $data) {
		$picture[$data]->name = (string)$arrayName[$i];
		$picture[$data]->category = (string)$arrayCategory[$i];
		$picture[$data]->caption = (string)$arrayCaption[$i];
		$i++;
	}
	
	//save the data to the XML file
	$stringXML = "<pictures>\n";
	foreach ($picture as $data) {
		//record the start tag
		$stringXML .= "<picture>\n";
		//record the name of the image
		$name = $data->name;
		$stringXML .= "<name>$name</name>\n";
		//record the caption
		$caption = $data->caption;
		//if caption is empty record a <caption /> tag
		if (strlen($caption) == 0) {
			$stringXML .= "<caption />\n";
		}
		else {
			$stringXML .= "<caption>$caption</caption>\n";
		}
		//record the category
		$category = $data->category;
		//if category is zero or null record a <category /> tag
		if(strlen($category) > 0 && (int)$category != 0) {
			$stringXML .= "<category>$category</category>\n";
		}
		else {
			$stringXML .= "<category />\n";
		}
		//record the end tag
		$stringXML .= "</picture>\n";
	}
	$stringXML .= "</pictures>";
	//find the XML file to open
	$openFile = "../include/Pictures.xml";
	//open the file for writing
	$fileXML = fopen($openFile,'w') or exit("Unable to open file!");
	//write the data to the file
	fwrite($fileXML,$stringXML);
	//close the file
	fclose($fileXML);
	
	$message = "<font color=\"#FF0000\">Gallery was successfully updated</font>";
}
function categoryMatch($selectedCategory , $match) {
	//get the global list of categories
	global $xmlAlbum;
	$album = $xmlAlbum->album;
	//check if the category is the unassigned category
	if ( (int)$selectedCategory == 0 ) {
		//check if the passed value is not equal to an existing category
		foreach ($album as $data) {
			$category = $data->category;
			if ( (int)$match == (int)$category ) {
				return false;
			}
		}
		return true;
	}
	//check if the passed category matches the selected category
	if ( (int)$selectedCategory == (int)$match ) {
		return true;
	}
	else {
		return false;
	}
}

function loadCategories() {
	global $xmlAlbum;
	//load the Album XML file
	$xmlFile = '../include/Albums.xml';
	if (file_exists($xmlFile)) {
		$xmlAlbum = simplexml_load_file($xmlFile);
	}
	//if the file is not found
	else {
		exit('Failed to open Albums.xml.');
	}
}

function getCategories($selected)
{
	//build the html code for the options pull down
	global $xmlAlbum;
	$album = $xmlAlbum->album;
	//first option is for unassigned images (those without a valid category)
	if ((int)$selected == 0) {
		echo "<option selected=\"selected\" value=\"0\">unassigned</option>
		";
	}
	else {
		echo "<option value=\"0\">unassigned</option>
		";
	}
	//Create options for each category
	foreach ($album as $data) {
		//create a string of html code 
		$category = $data->category;
		$name = $data->name;
		if ((int)$category == (int)$selected) {
			echo "<option selected=\"selected\" value=\"$category\">$name</options>
			";
		}
		else {
			echo "<option value=\"$category\">$name</options>
			";
		}
	}
}
function getCategory($index, $selected) {
	//build the html code for the options pull down
	echo "<select name=\"category$index\">
	";
	getCategories($selected);
	echo "</select>
	";
}

//echo the html code to display thumbs for the requested category
function getGallery() {		
	if ($_GET['cmd'] == "refresh") {
		//get the requested category
		$selectedCategory = $_POST['category'];
		//open the Pictures.xml file
		$xmlFile = '../include/Pictures.xml';
		if (file_exists($xmlFile)) {
	   		$xml = simplexml_load_file($xmlFile);
		}
		//if the file is not found
		else {
	   		exit("Failed to open $xmlFile.");
		}
		$picture = $xml->picture;
		//Create the html
		//store the selected category in the form
		echo "<input type=\"hidden\" name=\"category\" value=\"$selectedCategory\">
		";
		$i=1;
		$j=0;
		foreach ($picture as $data) {
			$category = $data->category;
			if ( categoryMatch($selectedCategory,$category) ) {
				//record the images file name
				$name = $data->name;
				//record the images caption
				$caption = $data->caption;
				//set the sort field name
				$sortname = "sort" . $j;
				//set the remove field name;
				$captionname = "caption" . $i;
				//echo the row DIV layer
				echo "<div id=\"row\">
				";
					//echo the caption DIV layer
					echo "<div id=\"caption\">Sort Order: <br />Caption: <br />Category: <br/></div>
					";
					//echo the data DIV layer
					echo "<div id=\"data\">
					";
						//echo the sort order, catption and category data
						echo "<input type=\"text\" name=\"$sortname\" size=\"3\" value=\"$i\" /><br />
						<input type=\"text\" name=\"$captionname\" value=\"$caption\" /><br /> 
						";
						getCategory($i,$selectedCategory);
					//echo the end data DIV layer
					echo "</div>
					";
					//echo the image DIV layer
					echo "<div id=\"image\"><img src=\"images/thumbs/$name\" /></div>
					";
				//echo the end row DIV layer
				echo "</div><br />
				";
				$i++;
			} //end if $category
			$j++;
		} //end foreach $picture
		//echo the Command buttons if results were returned
		if ($i > 1 ) {
			echo "<div id=\"row\"><input name=\"submit\" type=\"submit\" value=\"Update\" class=\"form\" />  <input type=\"reset\" value=\"Clear\" class=\"form\" /></div>
			";
		}
		else {
			echo "<font color=\"#FF0000\">No results found</font>";
		}
	} //end $_get if statement
}// end function
?>
<html>
<head>
<title>Manage Photos</title>
<style type="text/css" media="screen">
#row {
	width: 100%;
	clear: both;
}
#caption {
	float: left;
	text-align: right;
	margin-top: 10px;
	line-height: 17pt;
}
#data {
	float: left;
	margin-top: 10px;
}
#image {
	float: left;
	padding: 10px;
}
</style>
</head>
<body>
<?php include ('Top.php'); ?><br />
<!--display pull down of existing categories plus an unassigned option-->
<form method="post" action="EditGallery.php?cmd=refresh" enctype="multipart/form-data">
  	Select a Category<br />
	<select name="category">
		<?php getCategories(0); ?>
	</select>
	<input name="refresh" type="submit" value="Refresh" class="form" />
</form>
<hr />
<form method="post" action="EditGallery.php?cmd=edit" enctype="multipart/form-data">
<!--display images for the selected category-->
<!--include a field for sorting, one for the caption, one for category and a check box to remove-->
<?php echo $message; ?>
<?php getGallery(); ?>
</form>
</body>
</html> 