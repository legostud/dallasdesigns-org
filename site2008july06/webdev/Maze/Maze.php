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
		$roomID = $newArray['RoomID'];
		echo $roomID;
		$imgNorth[$roomID] = $newArray['imgNorth'];
		$imgSouth[$roomID] = $newArray['imgSouth'];
		$imgEast[$roomID] = $newArray['imgEast'];
		$imgWest[$roomID] = $newArray['imgWest'];
		$imgFloor[$roomID] = $newArray['imgFloor'];
		$roomNorth[$roomID] = $newArray['roomNorth'];
		$roomEast[$roomID] = $newArray['roomEast'];
		$roomSouth[$roomID] = $newArray['roomSouth'];
		$roomWest[$roomID] = $newArray['roomWest'];
	}
	
if(!isset($room)) {
	$room = 1; 
}

echo "
<html>
<head>
<title>Maze $mazeID</title>
</head>

<body bgcolor=\"#000000\" text=\"#FFFFFF\">
<table>
	<tr>
		<td>&nbsp;</td>
		<td><img src=\"MazeImages/$imgNorth[$room]\" /></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><img src=\"MazeImages/$imgWest[$room]\" /></td>
    	<td><img src=\"MazeImages/$imgFloor[$room]\" /></td>
		<td><img src=\"MazeImages/$imgEast[$room]\" /></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><img src=\"MazeImages/$imgSouth[$room]\" /></td>
		<td>&nbsp;</td>
	</tr>
</table></body>
</html>"
?>