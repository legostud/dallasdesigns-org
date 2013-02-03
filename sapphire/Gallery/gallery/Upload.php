<?php 
//check if the user has logged in
session_start();

$fdir = "images/";   // Path To Images Directory 
$tdir = "images/thumbs/";   // Path To Thumbnails Directory 
$tempdir = "images/temp/";  //Temporary bucket for uploaded images
$twidth = "120";   // Maximum Width For Thumbnail Images 
$theight = "120";   // Maximum Height For Thumbnail Images 
$fwidth = "640";  //Maximum Width for main images
$fheight = "640";  //Maximum height for main images

if(!$_SESSION['login']) {
	//send the user to the login page
	header('Location: Login.php');
}

if ($_GET['cmd'] == "bulk")
{
	$pic = directory($tempdir,'jpg,JPG,JPEG,jpeg,png,PNG,gif,GIF');
//	$pics=ditchtn($pics,'tn_');
	if ($pic[0] != '')
	{
		foreach ($pic as $p)
		{
			buildGallery($p,$tempdir);
		}
		$message = 'Images uploaded successfully.';   // Resize successful 
	}
	else {
		$message = 'No images found.';   // Resize unsuccessful 
	}
}
//make sure an image and category have been selected otherwise display the form
if ( trim($_FILES['imagefile']['name']) != '' && $_POST['category'] != 0) 
{     

	$test = $_FILES['imagefile']['name']; 
	//page only works for jpg and gif files  
	if ( preg_match ( '/jpg/i', $test) || preg_match ( '/jpeg/i', $test) || preg_match ( '/gif/i', $test) || preg_match ( '/png/i', $test)) {
	
		$filename = getFilename($test);
		//copy the image to the thumbs folder => thumbnail image
		$tcopy = copy($_FILES['imagefile']['tmp_name'], $tdir . $filename );   // Move Image From Temporary Location To Permanent Location 
		//copy the image to the images folder => main image
		$fcopy = copy($_FILES['imagefile']['tmp_name'], $fdir . $filename);  // Move Image From Temporary Location To Permanent Location 
		
		if (!$tcopy || !$fcopy || $filename == false) {   // If The Script Was Able To Copy The Image To It's Permanent Location 
      		print 'Image uploaded not successful.<br />';   // Was unable To Successfully Upload Image 
		}
		//create the thumbnail and full size images
		if (createImage ( $filename, $theight, $twidth, $tdir) && createImage ( $filename, $fheight, $fwidth, $fdir)) {
			$message = 'Image uploaded successfully.';   // Resize successful 
			updateXML($filename);
		}
		else {
			$message = 'Image failed to upload.';
		}
	}
	else { 
    	$message = 'ERROR: Wrong filetype has to be a .jpg, .jpeg. or gif';   // Error Message If Filetype Is Wrong 
	} 
} 
function getFilename($file)
{
	//delay by one second to ensure a unique file name
	sleep (1);
	//create a new file name using the current date and time
	if ( preg_match ( '/png/i', $file) ) {
		$fname = preg_replace("/[^a-zA-Z0-9s]/", "", Date(c)).".png"; 
		return $fname;
	}
	else if ( preg_match ( '/gif/i', $file) ) {
		$fname = preg_replace("/[^a-zA-Z0-9s]/", "", Date(c)).".gif"; 
		return $fname;
	}
	else {
		$fname = preg_replace("/[^a-zA-Z0-9s]/", "", Date(c)).".jpg"; 
		return $fname;
	}
	return false;
}

function buildGallery($file,$dir)
{
	global $theight;
	global $twidth;
	global $fheight;
	global $fwidth;
	global $tdir;
	global $fdir;
	global $message;
	
	//create a file name
	$filename = getFilename($file);
	if ($filename == false)
	{
		$message = 'Upload Failed - Wrong file type';
		return false;
	}
	$sourceFile = $dir.$file;
	//copy the image to the main folder
	copy($sourceFile, $tdir . $filename );
	//copu the image to the thumbs folder
	copy($sourceFile, $fdir . $filename );
	//resize the main image
	createImage ( $filename, $fheight, $fwidth, $fdir);
	//resize the thumbnail image
	createImage ( $filename, $theight, $twidth, $tdir);
	//update the XML file
	updateXML($filename);
	//delete the original file
	unlink($sourceFile);
	return true;
}

function directory($dir,$filters)
{
	$handle=opendir($dir);
	$files=array();
	if ($filters == "all"){while(($file = readdir($handle))!==false){$files[] = $file;}}
	if ($filters != "all")
	{
		$filters=explode(",",$filters);
		while (($file = readdir($handle))!== false)
		{
			for ($f=0;$f<sizeof($filters);$f++):
				$system=explode(".",$file);
				if ($system[1] == $filters[$f]){$files[] = $file;}
			endfor;
		}
	}
	closedir($handle);
	return $files;
}

function getCategories()
{
	//load the Album XML file
	$xmlFile = '../include/Albums.xml';
	if (file_exists($xmlFile)) {
   		$xml = simplexml_load_file($xmlFile);
	}
	//if the file is not found
	else {
   		exit('Failed to open Album.xml.');
	}
	//create a variable to hold the html options code and set it to null
	$options = '';
	//build the html code for the options pull down
	$album = $xml->album;
	$i = 0;
	foreach ($album as $data){
		//create a string of html code 
		$options .= '<option value="';
		$options .= $data[$i]->category;
		$options .= '">';
		$options .= $data[$i]->name;
		$options .= '</options>';
		//increment to the next data set
		$i++;
	}
	//return the html code
	echo $options;
}

function createImage ( $image, $height, $width, $path)
{ 
	$photo = $path . $image;
	if ( preg_match ( '/jpg/i', $photo) || preg_match ( '/jpeg/i', $photo) )
	{
		$simg = imagecreatefromjpeg($photo); // Make A New Temporary Image 
	}
	else if ( preg_match ( '/gif/i', $photo) )
	{
		$simg = imagecreatefromgif($photo);
	}
	else if ( preg_match('/png/i',$photo) ) {
		$simg = imagecreatefrompng($photo);
	}
	else
	{
		return false;
	}
    $currwidth = imagesx($simg);   // Current Image Width 
    $currheight = imagesy($simg);   // Current Image Height 
	//Does the image need to be resized, if not skip the rest
	if ($currheight < $height && $currwidth < $width) {
		return true;
	}
   	//check if the image is portrait
	if ($currheight > $currwidth) {   
       	$newheight = $height;   // Height Is Equal To Max Height 
       	$newwidth = $currwidth * ($height / $currheight);   // Creates The New Width 
   	}
	//check if the image is landscape
	else if ($currwidth > $currheight) {
       	$newwidth = $width;   // Width Is Equal To Max Width 
       	$newheight = $currheight * ($width / $currwidth);   // Creates The New Height 
	}
	//images must be equal
	else {
		$newheight = $height;
		$newwidth = $width;
	}
    $dimg = imagecreatetruecolor($newwidth, $newheight);   // Make New Image 
    imagecopyresampled($dimg,$simg,0,0,0,0,$newwidth,$newheight,$currwidth,$currheight); 

	if (preg_match("/png/i",$photo) )
	{
		imagepng($dimg,$photo); 
	} 
	else if (preg_match('/gif/i',$photo) ) 
	{
		imagegif($dimg,$photo); 
	}
	else
	{
		imagejpeg($dimg,$photo); 	
	} 
	imagedestroy($dimg); 
	imagedestroy($simg); 
    return true;
}

function updateXML($file)
{
	//create a string to hold the new XML code
	$stringXML = "<picture>\n";
	//record the code for the filename
	$stringXML .= "<name>$file</name>\n";
	//record the code for the caption without '&'
	$caption = trim( stripslashes( $_POST['caption'] ) );
	//if the caption is missing make it blank
	if ($caption == '&nbsp;' || strlen($caption) == 0 ) { 
		$stringXML .= "<caption />\n";
	}
	else {
		$caption = str_replace( "&" , "and" , $caption );
		$stringXML .= "<caption>$caption</caption>\n";
	}
	//record the code for the category
	$category = $_POST['category'];
	$stringXML .= "<category>$category</category>\n";
	//record the end tag and final tag
	$stringXML .= "</picture>\n</pictures>";
	//open the Pictures.xml file for reading
	$openFile = "../include/Pictures.xml";
	$fileXML = fopen($openFile,'r') or exit("Unable to open file!");
	//read the data from the file
	$theData = fread($fileXML, filesize($openFile));
	//replace the end tag </pictures> with the new XML code
	$pattern = '/<\/pictures>/';
	$theData = preg_replace($pattern,$stringXML,$theData);
	//close the file
	fclose($fileXML);
	//open the file for writing
	$fileXML = fopen($openFile,'w') or exit("Unable to open file!");
	//write the data to the file
	fwrite($fileXML,$theData);
	//close the file
	fclose($fileXML);
}
?>
<html>
<head>
<title>File Upload</title>
<script type="text/javascript">
	//<!--
	function validate_required(field,alerttxt)
	{
		with (field)
		{
			if (value==null||value==""||value==0)
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
			if (validate_required(imagefile,"Please select an image to upload.")==false)
			{
				imagefile.focus();
				return false;
			}
			else
			//check file type
			{
				if ( !imagefile.value.match(/jpg/i) && !imagefile.value.match(/jpeg/i) && !imagefile.value.match(/gif/i) )
				{
					alert("file type must be a jpg, jpeg or gif file");
					imagefile.focus();
					return false;
				}
			}
			if (validate_required(category,"Please select a category.")==false)
			{
				category.focus();
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
<form method="post" action="Upload.php?cmd=single" onsubmit="return validate_form(this)" enctype="multipart/form-data"> 
	File:<br /> 
	<input type="file" name="imagefile" class="form"> 
	<br /><br />
  	Caption:<br />
  	<input name="caption" type="text" /><br /><br />
  	Category:<br />
  	<select name="category">
		<option value="0" selected>-please select-</option>
		<?php getCategories(); ?>
	</select>
	<br /><br />
	<input name="submit" type="submit" value="Sumbit" class="form" />  <input type="reset" value="Clear" class="form" /> 
</form>
<hr />
<!-- bulk upload option -->
<form method="post" action="Upload.php?cmd=bulk" enctype="multipart/form-data"> 
	Bulk generation of images from the /temp folder on this site<br />
	<input name="submit" type="submit" value="Generate" class="form" />
	<input type="hidden" name="category" value="0" />
	<input type="hidden" name="caption" value="" />
</form>
</body>
</html>