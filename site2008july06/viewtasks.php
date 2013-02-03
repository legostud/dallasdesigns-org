<?php
//connect to the database
$conn=mysql_connect("db65b.pair.com","guigui_2","8Usweet!") or die(mysql_error());
mysql_select_db("guigui_Projects",$conn) or die(mysql_error());

$sql = "select * from task_manager";
print mysql_query($sql,$conn) or die(mysql_error());
?>
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

</body>
</html>
