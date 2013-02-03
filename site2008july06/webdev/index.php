<html>
<head>
<title>Website :: Dallas Designs</title>
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
#BodyText
{
	 position:absolute; 
	 width:700px; 
	 height:115px; 
	 z-index:6; 
	 left: 22px; 
	 top: 168px;
}
#Calendar
{
	position:absolute;
	width:150px; 
	height:150px; 
	z-index:10; 
	left: 732px; 
	top: 9px;
}
</style>
</head>
<body background="../images/parchment.gif">
<div id="BodyText"> 
  <p><a href="http://www.kickasscupcakes.com" target="_blank"><strong>Kickass 
    Cupcakes</strong></a><br>
    Sara, a co-worker, asked if I could help her with a new website she was trying 
    to have built for her cupcake business. She was having trouble with the current 
    designer to determine the look and feel of the site. At first, I just gave 
    Sara a few suggestion, but it soon became clear that her designer wasn't up 
    to the challenge. After a month of design and development, her new site was 
    launched.</p>
  <p><a href="Maze/index.php" target="_blank"><strong>Maze</strong></a><br>
    As a child, I use to love drawing mazes and having my family and friends try 
    them. This project is way for me to again design mazes and share them with 
    my friends and family wo are now farther away.</p>
  <p>The Maze uses a MySQL database to store the data for each Maze. This data 
    is then retrieved using PHP and stored in class object. This class object 
    is then stored in a Session variable (still working this) to limit the number 
    of calls to the database. The PHP then uses that data to write the html code 
    to display the first room. When you click on a door the page is reloaded and 
    the PHP rewrites the page and displays the new room.</p>
  <p><a href="DrawPoker/index.html" target="_blank"><strong>Draw Poker</strong></a><br>
    One of the Chapters in the book <em>Teach yourself Javascript in 24hours</em> 
    was a project to create a Draw Poker game. The chapter shows how to use a 
    class oject to store data, how to change images using the DOM and how to manipulate 
    an array using for loops and the random function.</p>
  <p> When the page is first loaded, the Javascript creates the deck for the game 
    using a for loop to populate a class object with the card number and the suit 
    (2s, 10h, 12c...). The deck is then shuffled using a for loop that runs for 
    a random number of times and randomly swaps two cards. Using the DOM, the 
    deck is dealt by changing the 2nd through 7th images on the page to be the 
    first 6 cards in the deck.</p>
  <p> The game is then played by clicking the hold button to keep certain cards 
    and a draw button to get new cards. When you click the hold button, the card 
    is added to the held array and the button image is changed. When you click 
    draw button, the Javascript code replaces the cards that aren't in the held 
    array with the next cards in the deck. It then compares the dealt cards against 
    a series of if statements to determine the score for that hand. </p>
  <p><strong>Task Manager -&gt; version 1, <a href="TaskManager/taskmanager.php" target="_blank">version 
    2</a></strong><br>
    This application was built to help me quickly record what I was working on 
    during the day. At the time I was processing orders for three of the sales 
    channels, providing helpdesk support for the entire company, updating the 
    company's websites, creating html email newsletters and a few other tasks. 
    At the end of the day, I was always finding myself behind on projects. I needed 
    to know where my time was being spent.</p>
  <p>The first Task Manager version I created, was designed to sit on the right 
    side of my screen and always be left visible. On the page, I listed the different 
    types of tasks that I would normally work on. When I clicked on one of these 
    tasks, the page would refresh and record the current time and the task I clicked 
    on to a text file. From this text file, I was able to calculate the time spent 
    on each task..</p>
  <p>The second Task Manager version was created when Dancing Deer launched it's 
    second site. Since the first version was written in ASP and the new site was 
    written in PHP, I could no longer run Task Manager on the site. I rebuilt 
    the Task Manager using PHP and a MySQL database. The database replaces the 
    text file to record the activities and make it easier to determine how much 
    time was spent on each task.</p>
  <p><strong>Dancing Deer Baking Company</strong><br>
    When I started working for Dancing Deer they had just launched there first 
    e-commerce website. Since then the company has upgraded their site to two 
    a newer versions. The first site from 2001 - 2006 was written in ASP. The 
    second site from 2006-2007 was written in PHP and the third site from 2007 
    - present is written in Cold Fusion. </p>
  <p>For the first site, I improved many pages and created a few new pages. One 
    of the pages that I created was an ASP based <a href="dancingdeer/CorporateSurvey.php">Corporate 
    Survey Page</a> to determine how our Corporate Sales Team performed during 
    the holiday. The page is mainly a collection of radio button groups, but there 
    is also space for feedback and optional customer information. When the page 
    is submitted, a code behind page is used to save the data entered into a text 
    file.</p>
  <p>During testing I discovered that the user was hitting the enter key between 
    some of the questons and accidentally submitting the form prematurely. To 
    counter this, I added Javascript code that would block the use of the Enter 
    key. </p>
  <p>For the second site, I spent most of my time working with the hosting provider 
    to debug errors and finish implementing functionality, but the calculation 
    of ship dates and arrival dates was so complex that I had to code it myself. 
    Dancing Deer allows their customers to choose to have their orders arrive 
    on a desired arrival date or to have it ship as soon as possible. In either 
    case the customer is told the ship date and arrival date of their order.</p>
  <p>There are a few rules that are used to determine these dates since the products 
    are fresh baked. Orders placed before 2pm can ship the next business day. 
    Orders placed from Thursday at 2pm through Sunday night can ship on Monday. 
    Weekends and Holidays do not count as transit days, ship dates or arrival 
    dates. Using these rules I modified this PHP <a href="dancingdeer/CustomShip.php">code</a> 
    to determine the next available ship date, the transit time, the arrival date 
    and determined which shipping methods would deliver the order on time. Most 
    of my new code includes JWD comments.</p>
</div>
<div id="Calendar"> 
  <?php include("Calendar.php")?>
</div>
<?php include("../templates/Top.html"); ?>
<?php include("include/TopSubMenu.php"); ?>  
</body>
</html>
