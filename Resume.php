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
		$filename = 'log/login.txt';
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
		header('Location: wd_Login.php?page=wd_Resume');
	}
?>
<html>
<head>
<title>Resume :: Dallas Designs</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="include/Menu.css" type="text/css" media="screen" />
<link rel="stylesheet" href="include/DallasDesigns.css" type="text/css" media="screen" />
<link rel="stylesheet" href="include/Resume.css" type="text/css" media="screen" />

</head>
<body>
<div id="bodytext"> 
	<div class="print"><a href="include/Resume.pdf" target="_blank">Print friendly PDF</a></div>
	<div class="print"><a href="include/Resume.doc" target="_blank">Print friendly Word Document</a></div>
	<div class="title">Jonathan Dallas</div>
	<div class="contact">63 Everet St -o- Arlington, MA 02474 -o- 781.526.6237 -o- <a href="mailto:dallas.designs@gmail.com">dallas.designs@gmail.com</a> -o- <a href="http://www.dallasdesigns.org">www.dallasdesigns.org</a></div>
	<div class="section">Objective</div>
	<div class="Objective">My objective is to become a senior level web developer in charge of a team of developers building large scale intranet &amp; internet sites</div>
	<div class="section">Technical Skills</div>
	<div class="row">
		<div class="skilltype">Languages</div>
		<div class="skill">CSS, DHTML, DOM, HTML, Javascript, Jquery, PHP, Perl, Python, XHTML, XML</div>
	</div>
	<div class="row">
	    <div class="skilltype">Tools</div>
    	<div class="skill">Dreamweaver, Fireworks, Illustrator, Notepad++, Photoshop</div>
	</div>
	<div class="row">
	    <div class="skilltype">Source Control</div>
	    <div class="skill">Mercurial, Perforce, Subversion</div>
	</div>
	<div class="section">Experience</div>
		<div class="row">
		    <div class="timeframe">Sept 2008 - Present</div>
			<div class="company">Cambridge Interactive Development Co.</div>
			<div class="location">Cambridge, MA</div>
		</div>
		<div class="jobtitle">Lead Front End Web Developer</div>
		<div class="jobdesc"> 
   			<li>Manage three front end web developers</li>
            <li>Maintain the company's 15+ websites built on Plone, Perl Mason and Wordpress frameworks</li>
            <li>Develop new features and pages for the sites</li>
            <li>Convert Photoshop files into working website pages and sites</li>
            <li>Create localized versions of the sites for 15 different languages</li>
            <li>Work with stakeholders and other departments to gather requirements</li>
            <li>Meet with project managers to dicuss the status of projects</li>
            <li>Help the marketing team create content for the CMS sites</li>
		</div>
		<div class="row">
		    <div class="timeframe">June 2007 - Present</div>
			<div class="company">Freelance Web Developer</div>
			<div class="location">Arlington, MA</div>
		</div>
		<div class="jobtitle">American Chronic Pain Association - 2009 to present</div>
		<div class="jobdesc"> 
   			<li>Designed and built their website - <a href="http://www.arlingtonacpa.org">www.arlingtonacpa.org</a></li>
            <li>Added a <a href="http://www.arlingtonacpa.org/directions.php">Google Map</a> to the site
            <li>Responsible for content changes to the site</li>
		</div>
		<div class="jobtitle">Kickass Cupcakes - 2007 to Present</div>
		<div class="jobdesc"> 
   			<li>Designed and built their website - <a href="http://www.kickasscupcakes.com">www.kickasscupcakes.com</a></li>
			<li>Built a dynamic <a href="http://www.kickasscupcakes.com/Press.php">Press page</a> using PHP and XML data</li>
			<li>Built a <a href="http://www.kickasscupcakes.com/Gallery.php">Photo Gallery</a> module with an admin interface using PHP and XML data</li>
            <li>Responsible for frequent content changes to the site including the addition of new pages</li>
		</div>
		<div class="jobtitle">Culture Counts - 2008</div>
		<div class="jobdesc"> 
   			<li>Designed and built their website - <a href="http://www.culturecounts.com">www.culturecounts.com</a></li>
			<li>Added a PHP based <a href="http://www.culturecounts.com/blog/">Blog</a> their the site
		</div>
	<div class="row">
	    <div class="timeframe">2001-2008</div>
	    <div class="company">Dancing Deer Baking Comapny, Inc.</div>
	    <div class="location">Boston, MA</div>
	</div>
	<div class="jobtitle">Webmaster, IT Support, Creative Services and Order Processing Manager</div>
	<div class="jobdesc"> 
    	<li>Maintained the company's three websites built on ASP and PHP Smarty frameworks</li>
    	<li>Optimized the Dancing Deer site to increase its organic ranking from last to first on Google and Yahoo</li>
		<li>Created and sent monthly HTML marketing newsletters</li>
		<li>Wrote custom Perl scripts to help automate the processing of orders</li>
        <li>Managed six holiday order processing clerks</li>
        <li>Worked with creative to update and add pages to the site</li>
        <li>Implemented new packaging labels for the company's product line</li>
  	</div>
	<div class="row">
		<div class="timeframe">Jan 2001 - Apr 2001</div>
		<div class="company">Pinpoint Corporation</div>
		<div class="location">Billerica, MA</div>
	</div>
	<div class="jobtitle">Test Software Developer (co-op)</div>
	<div class="jobdesc">
    	<li>Built a C program to record testing data from microwave tag locators into a SQL Server 7 database and
		 then display the recorded data based on built in and user entered SQL queries.</li>
	</div> 
	<div class="section">Hobbies</div>
	<div class="row">
	    <div class="timeframe">2001-Present</div>
	    <div class="company">New England Lego Users Group .org, Inc.</div>
	    <div class="location">New England</div>
	</div>
	<div class="jobtitle">President - 2008 to present</div>
	<div class="jobtitle">Active Member since 2001</div>
	<div class="section">Education</div>
	<div class="row">
	    <div class="timeframe">2010</div>
	    <div class="company">American Management Association</div>
	    <div class="location">New York, NY</div>
	</div>
	<div class="jobdesc">
    	<li>Continuing Education Credits - Leadership and People Management</li>
	</div> 
	<div class="row">
	    <div class="timeframe">1997-2002</div>
	    <div class="company">Wentworth Institute of Technology</div>
	    <div class="location">Boston, MA</div>
	</div>
	<div class="jobdesc">
    	<li>B.S. in Computer Science</li>
		<li>Web Development Certificate</li>
		<li>Graduated summa cum laude with a 3.8 GPA</li>
	</div> 
	<div class="row">
	    <div class="timeframe">1993-1995</div>
	    <div class="company">Franklin Institute of Boston</div>
	    <div class="location">Boston, MA</div>
	</div>
	<div class="jobdesc">
    	<li>A.S., Architectural Structural Drafting Technology</li>
		<li>Dean’s list for two semesters</li>
	</div> 
</div>
<?php include("include/Top.php"); ?>
<?php include("include/WebMenu.php"); ?>  
</body>
</html>
