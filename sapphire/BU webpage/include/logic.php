<?php
//set the radio button task default to launch
$launch = "checked";
//set the default message to blank
$message = "";

$sl = "block";
$sr = "none";

//is this in not the first time the page has been loaded
if ($_POST['hidden'] == "1")
{
	//capture the entered data so it can redisplayed or added to the database
	$name = trim($_POST['name']); //Name of person submitting form
	$email = trim($_POST['email']); //E-mail address of person submitting form
	$phone = trim($_POST['phone']); //Phone number of person submitting form
	$url = trim($_POST['url']); //URL of site being launched/re-launched
	$task_date = trim($_POST['task_date']); //Date site was launched/re-launched
	$notes = trim($_POST['notes']); //Notes
	$site = trim($_POST['site']); //Description of site
	$change = trim($_POST['change']); //Description of changes
	$launch_date = trim($_POST['launch_date']); //Date site was originally launched
	$task = trim($_POST['task']); //Launch or relaunch (pick one)
	
	//detemine the state of the radio buttons
	if($_POST['task'] == "launch")
	{
		//set which radio button was checked
		$launch = "checked";
		$re_launch = "";
		//set which layer to display
		$sr = "none";
		$sl = "block";
		
	}
	else
	{
		//set which radio button was checked
		$launch = "";
		$re_launch = "checked";
		//set which layer to display
		$sr = "block";
		$sl = "none";
	}
	
	//store the reguired field names and error messages
	$required = array();
	$required[0] = array("name","Please enter your name");
	$required[1] = array("email","Please enter your email address");
	$required[2] = array("url","Please enter the URL of the site");
	$required[3] = array("task_date","Please enter the completion date of the task");
	//test these based on selected task
	$required[4] = array("task","Please select a task"); 
	$required[5] = array("site","Please enter a description of the site");
	$required[6] = array("change","Please enter the changes you would like to make");
	
	//check for required fields
	for ($i = 0; $i < 5; $i++)
	{
		//check which task selected
		if ( $required[$i][0] == "task" )
		{
			if ($_POST[$required[$i][0]] == "launch")
			{
				//clear the re-launch data
				$launch_date = "";
				$changes = "";
				//set $i so site is checked
				$i = 5;
			}
			else
			{
				//clear the launch data
				$site = "";
				//check if the launch date was entered correctly (yyy-mm-dd)
				$pattern = "/^(19|20)\d\d-(0[1-9]|1[012])-(0[1-9]|[12][0-9]|3[01])/";
				if ( !preg_match($pattern, $launch_date) ) 
				{
					$message = "Please enter a valid date for the original launch date of the site";
					break;
				}	
				//set $i so change is checked
				$i = 6;
			}
		}
		//was data entered
		if ( strlen( trim($_POST[$required[$i][0]]) ) == 0 ) 
		{
			$message = $required[$i][1];
			break;
		}
	}
	//validate launch_date for proper format
	$pattern = "/^(19|20)\d\d-(0[1-9]|1[012])-(0[1-9]|[12][0-9]|3[01])/";
	if ( !preg_match($pattern, $task_date) && !$message ) 
	{
		$message = "Please enter a valid completion date of the task";
	}
	//only record the data if there were no error messages
	if (!$message)
	{
	//open connection to database
	$conn = getDBCconnection();	
	//write the sql statement
	$sql = "INSERT INTO BU_exercise VALUES ('$name','$email','$phone','$url','$site','$task','$launch_date','$task_date','$notes','$change')";
	//write data
	mysql_query($sql,$conn) or die(mysql_error());
	//close connection to database
	mysql_close($conn);
	//update message to display success
	$message = "Your data has been successfully saved.";
	
	//reset default values for the form
	$name = "";
	$email = "";
	$phone = "";
	$url = "";
	$task_date = "";
	$notes = "";
	$site = "";
	$change = "";
	$launch_date = "";
	$task = "";
	$launch = "checked";
	$re_launch = "";
	$sl = "block";
	$sr = "none";
	}
}
//connect to the database
function getDBCconnection ()
{
	//open the connection to the database server
	$conn = mysql_connect("host","user","password");  //data has been hidden
	if (!$conn) {
    	die('Could not connect: ' . mysql_error());
	}
	//connect to the Database
	mysql_select_db("database",$conn); //data has been hidden
	//return the connection
	return $conn;
}	
?>
