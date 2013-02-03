<?php 
	//This is a secure page
	session_start(); 
	
	//Get to see if a login Variable has been passed to this page
	//$user = ;
	if($_GET[user])
	{
		//If it has 
		//then set the weblogin session variable to true
		$_SESSION['weblogin'] = True;
		
		//and record the user name to the log file
		$data = "username: ";
		$data .= $_GET[user];
		$data .= "\t date: ";
		$data .= date("r");
		$data .= "\n";
		// Does the file exist and is writable first.
		$filename = '../log/login.txt';
		if (is_writable($filename)) {
    		// open the file as appendable
    		if (!$handle = fopen($filename, 'a')) {
        		echo "Cannot open file ($filename)";
         		exit;
    		}
	    	// record the username and time stamp to the login.txt file.
 		   	if (fwrite($handle, $data) == FALSE) {
				echo "Cannot write to file ($filename)";
    		}
	    	fclose($handle);
		} else {
    		echo "The file $filename is not writable";
		}
	}	
	
	//Check if the vistor has not logged in
	//weblogin should be set as true if the visit has succesfully logged in.
	if(!$_SESSION['weblogin']) {
		//send him to the login.php page with the page variable set to this pages name so he can be sent back
		header('Location: Login.php?page=Resume');
	}
?>
<html>
<head>
<title>Resume :: Dallas Designs</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>

<style type="text/css">
	p.leftmargin {
		margin-left: 100px;
		margin-top: px;
	}
#bodytext {
	position:absolute;
	top: 168px;
	width: 718px;
	height: 86px;
	left: 22px; 
	width:710px; 
	z-index:6; 
}
#print {
	height: 20px;
}
#row {
	width:100%;
	margin-left: 50px;
}
#title {
	text-align: center;
	font-size: 25px;
	text-transform: uppercase;
	width: 100%;
	padding: 10px;
}
#contact {
	width: 100%;
	text-align: center;
}
#section{
	width: 100%;
	text-transform: uppercase;	
	height: 20px;
	margin-top: 10px;
	margin-bottom: 10px;
}
#objective {
	margin-left: 50px;
}
#skilltype {
	width: 150px;
	float: left;
	height: 20px
}
#skill {

}
#timeframe {
	float:left;
	width:20%;
}
#company {
	float:left;
	width:60%;
	text-align:center;
	font-weight: bold;
}
#location {
	float:right;
	width:20%;
	text-align:right;
}
#jobtitle {
	width:100%;
	margin-left:50px;
	font-style:italic;
}
#jobdesc {
	width: 100%;
	margin-left: 50px;
	margin-bottom: 15px;
}
</style>
</head>
<body background="../images/parchment.gif">
<div id="bodytext"> 
	<div id="print"><a href="include/Resume.pdf" target="_blank">Print friendly PDF</a></div>
	<div id="print"><a href="include/Resume.doc" target="_blank">Print friendly Word Document</a></div>
	<div id="title">Jonathan Dallas</div>
	<div id="contact">63 Everet St -o- Arlington, MA 02474 -o- 781.526.6237 -o- <a href="mailto:jobs@dallasdesigns.org">jobs@dallasdesigns.org</a> -o- <a href="http://www.dallasdesigns.org">www.dallasdesigns.org</a></div>
	<div id="section">Objective</div>
	<div id="Objective">My objective is to become a senior web developer building large scale intranet &amp; internet sites</div>
	<div id="section">Technical Skills</div>
	<div id="row">
		<div id="skilltype">Languages</div>
		<div id="skill">PHP, Javascript, DOM, CSS, HTML, XHTML, Perl, OOP, XML</div>
	</div>
	<div id="row">
	    <div id="skilltype">Tools</div>
    	<div id="skill">Dreamweaver MX, Fireworks MX, Illustrator CS2</div>
	</div>
	<div id="row">
	    <div id="skilltype">Database</div>
		<div id="skill">MySQL, Crystal Reports 10, Access 2003, SQL</div>
	</div>
	<div id="row">
	    <div id="skilltype">Operating Systems</div>
		<div id="skill">PFreeBSD (Unix), KDE, Server 2003, Windows XP &amp; Vista</div>
	</div>
	<div id="row">
	    <div id="skilltype">Studing</div>
	    <div id="skill">ASP.NET</div>
	</div>
	<div id="section">Experience</div>
	<div id="row">
		<div id="timeframe">June 2007 - Present</div>
		<div id="company">Jonathan Dallas</div>
		<div id="location">Arlington, MA</div>
	</div>
	<div id="jobtitle">Freelance Developer</div>
	<div id="jobdesc">
    	<li>Developed and designed the www.kickasscupcakes.com website</li>
		<li>Added an XML based Press page for Kickass Cupcakes www.kickasscupcakes.com/Press.php</li>
		<li>Performed general MS Access system design and development for Paul McWade Systems</li>
		<li>Worked on general IT projects for Dancing Deer</li>
		<li>Built an MS Access System to convert and validate an excel datafeed into a csv datafeed for Dancing Deer's Mailorder Management applicaton</li>
	</div>
	<div id="row">
	    <div id="timeframe">2001-2008</div>
	    <div id="company">Dancing Deek Baking Comapny, Inc.</div>
	    <div id="location">Boston, MA</div>
	</div>
	<div id="jobtitle">Webmaster, IT coordinator and Order Processing Manager</div>
	<div id="jobdesc"> 
    	<li>Build, enhance and maintain the company`s three e-commerce sties:<br>
      	&nbsp;&nbsp;<a href="http://www.dancingdeer.com" target="_blank">www.dancingdeer.com</a> -o- <a href="http://www.sendmunchies.com" target="_blank">www.sendmunchies.com</a> -o- <a href="http://www.breakthecursecookie.com" target="_blank">www.breakthecursecookie.com</a></li>
	    <li>Provide 24x7 support for all web systems, on-site &amp; off-site sales offices and IT infrastructure</li>
	    <li>Use Electronic Data Interchange principles for 25 external Reseller websites to process orders</li><br />
    	<em>Accomplishments</em> 
    	<li>Optimized the site to increase it`s ranking from last to first on Google and Yahoo</li>
    	<li>Improved the site`s business logic to include holidays in the calculation of ship &amp; arrival dates</li>
	  	<li>Replaced the framed navigation with Javascript based pull down menus</li>
		<li>Optimized the site to increase it`s ranking from last to first on Google and Yahoo</li>
		<li>Improved the site`s business logic to include holidays in the calculation of ship &amp; arrival dates</li>
		<li>Replaced the framed navigation with Javascript based pull down menus</li>
		<li>Modified the confirmation page to be a printable receipt page</li>
		<li>Created and sent monthly HTML marketing newsletters</li>
		<li>Managed up to six order processing assistants during our busy holiday season each year</li>
		<li>Wrote custom Perl scripts to create UPS import files from reseller EDI feeds</li>
		<li>Developed an MS Access system to improve our Vendor packaging price negotiations</li>
		<li>Determined and set up the IT infrastructure needed for an off-site sales office with 17 users</li>
  	</div>
	<div id="row">
		<div id="timeframe">Jan 2001 - Apr 2001</div>
		<div id="company">Pinpoint Corporation</div>
		<div id="location">Billerica, MA</div>
	</div>
	<div id="jobtitle">Test Software Developer</div>
	<div id="jobdesc">
    	<li>Built a C program to record testing data from microwave tag locators into a SQL Server 7 database and
		 then display the recorded data based on built in and user entered SQL queries.</li>
	</div>  
</div>
<?php include("../templates/Top.html"); ?>
<?php include("include/TopSubMenu.php"); ?>  
</body>
</html>
