<?php 
	//This is a secure page
	//Check if the vistor has not logged in
	session_start(); 
	if(!$_SESSION['weblogin']) {
		//send him to the login.php page with the page variable set to this pages name so he can be sent back
		header('Location: Login.php?page=Education');
	}
?>
<html>
<head>
<title>Education :: Dallas Designs</title>
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
</head>
<body background="../images/parchment.gif">
<div id="bodytext" style="position:absolute; width:700px; height:115px; z-index:6; left: 22px; top: 168px;"> 
  <p>As a child, I thought I would make an excellent Architect because I use to 
    build wonderful cities with my LEGO. After three and half years of Architecture 
    classes, I took my first programming class in Qbasic. When I aced the class 
    with my eyes closed, I realized that building with LEGO made me an excellent 
    programmer instead.</p>
  <p> <strong>Schools Attended:<br>
    Franklin Institute of Boston</strong> (<strong>1993 - 1995)</strong><br>
    - Associate Degree for Architectural Stuructural Drafting Technology<br>
    - Dean's list two semesters</p>
  <p><strong>Boston Architectural Center (1995 - 1996)</strong></p>
  <p> <strong>Wentworth Instutite of Technology</strong> (<strong>1997 - 2002)</strong><br>
    - Bachelor Degree for Computer Science<br>
    - Certificate for Web Development<br>
    - 3.8 GPA</p>
  <p><strong>Books Read:<br>
    </strong>SAMS Teach yourself PHP, MySQL and Apache in 24 hours (2004)<br>
    SAMS Teach yourself Adobe Creative Suite 2 in 24 hours (2005)<br>
    <em>PackT Publishing</em> -&gt; Smarty (2006)<br>
    SAMS Teach yourself Javascript in 24 hours (2007)<br>
    SAMS Teach yourself CSS in 24 hours (2007)<br>
    SAMS Teach yourself Access 2003 in 24 hours (2008)<br>
    SAMS Teach yourself ASP.NET in 24 hours (2008)</p>
  <p><strong>Classes Taken:<br>
    <em>Computer Science<br>
    </em></strong>- Algorithm Design and Analysis<br>
    - Assembly Language &amp; Operating Systems<br>
    - Computer Architecture I<br>
    - Computer Architecture II<br>
    - Computer Graphics Using Java<br>
    - Computer Programming with Java<br>
    - Computer Science I Using C<br>
    - Computer Science II Using C<br>
    - Data Base Applicatons<br>
    - Data Base Management Systems<br>
    - Introduction to Artificial Intelligence<br>
    - Introduction to Programming Languages<br>
    - Local and Wide Area Networks<br>
    - Object Oriented Data Structures Using C++<br>
    - Object Oriented Programming Using C++<br>
    - Operating Systems <br>
    - Software Design and Development<br>
    - Systems Analysis &amp; Business Applications<br>
    - Technical Communications<br>
    - Web Development I Using HTML and Java<br>
    - Windows Programming</p>
  <p><strong><em>Architecture</em></strong></p>
</div>
<?php include("../templates/Top.html"); ?>
<?php include("include/TopSubMenu.php"); ?>  
</body>
</html>
