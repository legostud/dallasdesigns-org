<a href="Album.php">Manage Categories</a> - <a href="Upload.php">Upload a photo</a> 
- <a href="EditGallery.php">Manage your photos</a> - 
<?php 
if($_SESSION['login']) {
	echo "<a href=\"Logout.php\">Logout</a>";
}
else {
	echo "<a href=\"Login.php\">Login</a>";
}
?>