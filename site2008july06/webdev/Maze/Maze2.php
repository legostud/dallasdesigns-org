<?php
	//open the connection to the database server
	$conn = mysql_connect("db124a.pair.com","guigui_4_r","qbYivnxr");
	//connect to the Database
	mysql_select_db("guigui_Maze",$conn);
	//retrieve the maze data
	$mazeID = 1; //which maze to pull
	$sql = "SELECT * FROM `Rooms`"; // WHERE 'MazeID'=$mazeID";
	echo $sql;
	echo "<br>";
	$result = mysql_query($sql, $conn) or die(mysql_error());
	echo $result;
	echo "<br>";
	echo mysql_num_rows($result);
	while ($newArray = mysql_fetch_array($result)) {
		$room = $newArray['RoomID'];
		echo $room;
		$imgNorth[$room] = $newArray['imgNorth'];
		$imgSouth[$room] = $newArray['imgSouth'];
		$imgEast[$room] = $newArray['imgEast'];
		$imgWest[$room] = $newArray['imgWest'];
		$imgFloor[$room] = $newArray['imgFloor'];
		$roomNorth[$room] = $newArray['roomNorth'];
		$roomEast[$room] = $newArray['roomEast'];
		$roomSouth[$room] = $newArray['roomSouth'];
		$roomWest[$room] = $newArray['roomWest'];
	}
$room = 1;

?>
<html>
<head>
<title>Maze <?php $mazeID ?></title>
</head>

<body bgcolor="#000000" text="#FFFFFF">
<table>
	<tr>
		<td>&nbsp;</td>
		<td><img src="MazeImages/<?php $imgNorth[$room] ?>"></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><img src="MazeImages/<?php $imgWest[$room] ?>"></td>
    	<td><img src="MazeImages/<?php $imgFloor[$room] ?>"></td>
		<td><img src="MazeImages/<?php $imgEast[$room] ?>"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><img src="MazeImages/<?php $imgSouth[$room] ?>"></td>
		<td>&nbsp;</td>
	</tr>
</table>
</body>
</html>