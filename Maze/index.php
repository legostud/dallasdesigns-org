<?php
	//Room has five images with potential links to other rooms
	class Labrynth {
		//this is the image of the rooms floor 
		public $floorImg;
		//each of these variables contains an <img tag within a <href tag
		public $northTag; //
		public $eastTag;
		public $westTag;
		public $southTag;
		
		//CreateTag returns either a linked image tag or just an image tag
		public function CreateTag($image,$room){
			//create just an image tag if the room argument is null
			if($room == NULL) {
				return "<img src=\"MazeImages/$image\" />";
			} //else create a linked image tag
			else {
				$room *= 314;
				return "<a href=\"index.php?room=$room\"><img src=\"MazeImages/$image\" border=\"0\" /></a>";
			}
		}
	}

	//we are using a session varible to store the array of rooms in this maze.
	session_start(); 
	
	if(!isset($_SESSION['maze'])) {
		//open the connection to the database server
		$conn = mysql_connect("db124a.pair.com","guigui_4_r","qbYivnxr");
		//connect to the Database
		mysql_select_db("guigui_Maze",$conn);
		//retrieve the maze data
		$mazeID = 1; //which maze to pull
		$sql = "SELECT * FROM `Rooms`"; // WHERE 'MazeID'=$mazeID";
		$result = mysql_query($sql, $conn) or die(mysql_error());

		$Maze = new Labrynth;
		//loop through the returned data and assign to the Maze class
		while ($newArray = mysql_fetch_array($result)) {
			$roomID = $newArray['RoomID'];
			$Maze->northTag[$roomID] = $Maze->CreateTag($newArray['imgNorth'],$newArray['roomNorth']);
			$Maze->eastTag[$roomID] = $Maze->CreateTag($newArray['imgEast'],$newArray['roomEast']);
			$Maze->southTag[$roomID] = $Maze->CreateTag($newArray['imgSouth'],$newArray['roomSouth']);
			$Maze->westTag[$roomID] = $Maze->CreateTag($newArray['imgWest'],$newArray['roomWest']);
			$Maze->floorTag[$roomID] = $Maze->CreateTag($newArray['imgFloor'],NULL);
		}
		$_SESSION['maze'] = $Maze;
	}
	else {
		$Maze = $_SESSION['maze'];
	}
	
	//if a room number is not passed to the page set the room number to the starting room (defualt is 1)
	if(!isset($room)) {
		$room = 1; 
	}
	else {
		$room /= 314;
	}
	$north = (string)$Maze->northTag[$room];
	$west = (string)$Maze->westTag[$room];
    $floor = (string)$Maze->floorTag[$room];
	$east = (string)$Maze->eastTag[$room];
	$south = (string)$Maze->southTag[$room];
	
?>
<html>
<head>
<title>Maze <?php echo $mazeID; ?></title>
</head>

<body bgcolor="#000000" text="#666666">
<!-- a href="MazeCode.html" target="_blank">View Code</a> <br -->
<table>
	<tr>
		<td colspan="3">
			<center><a href="index.php"><img src="MazeImages/Mazed_Confused_Logo.jpg" border="0" /></a></center>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><?php echo $north; ?></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><?php echo $west; ?></td>
    	<td><?php echo $floor; ?></td>
		<td><?php echo $east; ?></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><?php echo $south ?></td>
		<td>&nbsp;</td>
	</tr>
</table></body>
</html>

