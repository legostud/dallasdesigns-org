<?php
//loads opens an XML file
include ('include/openXML.php');

//global variables
$category; //which category is being displayed
$catname; //Name of the category being displayed
$images; //xml array of images in this category
$index; //the requested image
$caption; //holds the selected images caption

setCategory();
setImages();

//set the global category values
function setCategory() {
	global $category;
	global $catname;
	//open the Ablums.xml file
	$album = openXML('Albums.xml')->album;
	//find the category requested
	if( isset($_GET['cat']) && $_GET['cat'] > 0) {
		$category = (int)trim(strip_tags($_GET['cat']));
	}
	//if a category is not requested load the first one
	else {
		$category = (int)$album[0]->category;
	} 
	//find the name of the category
	$catname = "<font color=\"#FF0000\">invalid category</font>";
	foreach ($album as $data)
	{
		//check if the current category equals the requested
		$tempCategory = (int)$data->category;
		if( $tempCategory == $category ) {
			//record the name
			$catname = $data->name;
		} 
	}  
}
//set the global Inage values
function setImages()
{
	//declare global variable
	global $images;
	global $category;
	global $index;
	global $caption;
	
	//open the Pictures.xnl file
	$xml = openXML('Pictures.xml')->picture;
	//find all objects in the requested category
	foreach ($xml as $data)
	{
		if ($data->category == $category) {
			$images[] = $data;
		}
	}
	//Retrieve the requested image
	if ( isset($_GET['image'])  && $_GET['image'] > 0) {
		$index = $_GET['image'];
	}
	//or get the first image in the stored category
	else {
		$index = 0;
	}
	$caption = $images[$index]->caption;
}
		
//build the naviagtion menu
function getNav()
{
	//First Previous 1 2 3 4 5 6 7 8 9 10 Next Last
	global $images;
	global $category;
	global $index;
	//determine the number of images in the requested category
	$length = sizeof($images);
	//determine position of the requested image
	//determine if there is an image before the requested image
	if ($index > 0) { $showPrevious = true; }
	else { $showPrevious = false; }
	//determine if there is an image after the requested
	if ($index < $length-1 ) { $showNext = true; }
	else { $showNext = false; }
	//find the ten images around the requested image (5 up / 5 down ideal)
	for ($start = $index; $start > 0; $start--) {
		if ($start == $index-4) { break; }
	}
	for ($end = $index; $end < $length; $end++) {
		if ($end == $index+5) { break; }
	}
	//echo the naviagation html
	//echo the 'first' link
	if ($showPrevious) {
		$previous = $index-1;
		echo "<a href=\"lg_Gallery.php?image=0&cat=$category\">First</a> <a href=\"lg_Gallery.php?image=$previous&cat=$category\">Previous</a> ";
	}
	//build the href for the 10 images (skip for current image)
	for ($i = $start; $i < $end; $i++)
	{
		$page = $i+1;
		if ($i == $index) {
			echo "$page ";
		}
		else {	
			echo "<a href=\"lg_Gallery.php?image=$i&cat=$category\">$page</a> ";
		}
	}
	//build the last link
	if ($showNext) {
		$next = $index+1;
		$last = $length-1;
		echo "<a href=\"lg_Gallery.php?image=$next&cat=$category\">Next</a> <a href=\"lg_Gallery.php?image=$last&cat=$category\">Last</a> ";
	}		
}
//get the image to display
function getImage()
{
	global $images;
	global $index;
	//get the name of the requested image
	$name = $images[$index]->name;
	//get the caption of the requested image
	$caption = $images[$index]->caption;
	//if a image was found display it
	if (strlen($name) > 0 ) {
		//echo the requested image
		echo "<img src=\"gallery/images/$name\" />"; //<br /><span id=\"caption\">$caption</span>";
	}
	//otherwise say no images
	else {
		echo "No image found";
	}
}
//display the images caption
function getCaption() {
	global $images;
	global $index;
	//get the caption of the requested image
	$caption = $images[$index]->caption;
	//if a image was found display it
	if (strlen($name) > 0 ) {
		//echo the requested image
		echo "<img src=\"gallery/images/$name\" /><br /><span id=\"caption\">$caption</span>";
	}
	//otherwise say no images
	else {
		echo "No image found";
	}
}
//Build the category list
function buildCategories()
{
	//Load the Albums xml file to get the categories
	$album = openXML('Albums.xml')->album;
	foreach ($album as $data)
	{
		//get the name of the category
		$name = $data->name;
		//get the index of the category
		$index = $data->category;
		//return the 'A' tag 
		//href reloads this page and passes the number of thumbs and which category to show
		echo "<a href=\"lg_Gallery.php?count=5&cat=$index\">$name</a><br />";
	}
}

//Build the thumbs gallery for
//the number of thumbs requested or 9 if not requested
//the category requested or 1 if not requested
function buildThumbs()
{			
	//Load the Pictures.xml file to get the images
	$picture = openXML('Pictures.xml')->picture;
	
	//Record the requested category or set it to 1
	if ( isset($_GET['cat']) ) {
		$category = (int)trim(strip_tags($_GET['cat']));
	}
	else {
		//load the Albums.xml file to get the first category
		$album = openXML('Albums.xml')->album;
		$category = $album[0]->category;
	}
	//testing
	//echo $category;
	//Record the requested number of thumbs	or make it equal to 5
	if ( isset($_GET['count']) )  {
		$numImages = (int)trim(strip_tags($_GET['count']));
	}
	else {
		$numImages = 5;
	}
	//testing
	//echo $numIamges;
	//check if the view more pictures link was clicked => count = 0
	if ($numImages == 0) {
		$numImages = sizeof($picture); 
	}
	$cnt = -1; //count the number of found thumbs
	//loop through the array until we reach the length or 9 images for the given category.
	foreach ($picture as $data)
	{
		//look for thumbs matching the stored category
		if((int)$data->category == (int)$category) {
			//record that we found an image
			$cnt++;
			//If we've found the requested amount of thumbs, stop checking
			if ($cnt >= $numImages ) {
				//record that we found more thumbs
				break;
			}
			//otherwise Echo the HTML
			else {
				//store the image name
				$image = trim($data->name);
				//echo the thumbnail tag
				echo "<div id=\"thumb\"><a href=\"lg_Gallery.php?image=$cnt&cat=$category&count=0\"><img src=\"gallery/images/thumbs/$image\" border=\"0\" /></a></div>
				";
			}
		} 
	}
	//create the more DIV layer
	//If there are more thumbs than requested make the more DIV layer visible
	if ($cnt >= $numImages ) {
		$display = block;
	}
	//Otherwise hide the layer
	else  {
		$display = none;
	}
	echo "<div id=\"more\" class=\"bodytext\" style=\"display:$display;\"><a href=\"lg_Gallery.php?count=0&cat=$category\">view more pictures</a></div>
	";	
}
function getPictureFrame()
{
	global $images;
	global $index;
	
	//find the photo being displayed
	$path = "gallery/images/";
	$name = $images[$index]->name;
	$filename = $path . $name;
	//convert the photo into an image
	if ( preg_match ( '/jpg/i', $filename) )
	{
		$simg = imagecreatefromjpeg($filename); // Make A New Temporary Image 
	}
	else if ( preg_match ( '/gif/i', $filename) )
	{
		$simg = imagecreatefromgif($filename);
	}
	else if ( preg_match('/png/i',$filename) ) 
	{
		$simg = imagecreatefrompng($filename);
	}
	else
	{
		return false;
	}
	//determine the width and height of the photo
    $currwidth = imagesx($simg);   // Current Image Width 
    $currheight = imagesy($simg);   // Current Image Height 
	//set the width and height of the picutre frame (add 10px)
	$width = $currwidth + 10;
	$height = $currheight + 10;
	//display the picture frame;
	echo "<img src=\"images/picture_frame.gif\" width=\"$width\" height=\"$height\" />";
}
?>
