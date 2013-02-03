<?php 	
	//connect to the database - database host, username, password
	$conn=mysql_connect("db50d.pair.com","guigui","Database1") or die(mysql_error());
	// connect to database - name
	mysql_select_db("guigui_dancingdeer",$conn) or die(mysql_error());
 ?>