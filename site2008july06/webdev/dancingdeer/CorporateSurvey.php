<?php echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Corporate Survey :: Dallas Designs</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<style>
#menu
{
	height: 168px;
}
#message
{
	font-weight: bold;
	width: 700px;
}
#code
{
	width: 700px;
	height: 400px;
	overflow: auto;
}
#msgcodebehind
{
	font-weight: bold;
	margin-top: 10px;
	width: 700px;
}
#codebehind
{
	width: 700px;
	height: 400px;
	overflow: auto;
}
</style>
</head>

<body background="../../images/parchment.gif">
<div id="menu">
<?php include("../../templates/Top.html"); ?>
<?php include("../include/TopSubMenu.php"); ?>  
</div>
<div id="message">Since my site is not able to display ASP pages, I have included the code used 
  below.<p><strong>This is the code for the Corporate Survey</strong></p></div><br>
<div id="code">
  <p>&lt;!DOCTYPE HTML PUBLIC &quot;-//W3C//DTD HTML 4.01 Transitional//EN&quot;&gt;<br />
    &lt;!--#INCLUDE file = &quot;include/momapp.asp&quot; --&gt;<br />
    &lt;html&gt;<br />
    &lt;head&gt;<br />
    &lt;title&gt;Dancing Deer Corporate Survey&lt;/title&gt;<br />
    &lt;meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=iso-8859-1&quot;&gt;<br />
    &lt;link rel=&quot;stylesheet&quot; href=&quot;include/deerstyle.css&quot; 
    type=&quot;text/css&quot;&gt;<br />
    &lt;script language=&quot;JavaScript&quot; type=&quot;text/JavaScript&quot;&gt;<br />
    &lt;!--<br />
    function MM_reloadPage(init) { //reloads the window if Nav4 resized<br />
    if (init==true) with (navigator) {if ((appName==&quot;Netscape&quot;)&amp;&amp;(parseInt(appVersion)==4)) 
    {<br />
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; 
    }}<br />
    else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();<br />
    }<br />
    MM_reloadPage(true);<br />
    //--&gt;</p>
  <p>function handleEnter (field, event) {<br />
    var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : 
    event.charCode;<br />
    if (keyCode == 13) {<br />
    var i;<br />
    for (i = 0; i &lt; field.form.elements.length; i++)<br />
    if (field == field.form.elements[i])<br />
    break;<br />
    i = (i + 1) % field.form.elements.length;<br />
    field.form.elements[i].focus();<br />
    return false;<br />
    } <br />
    else<br />
    return true;<br />
    } </p>
  <p>function surveypopup() {<br />
    window.open('../PopupThanks.htm', 'survey', 'width=450, height=200, scrollbars=no, 
    resizable=yes, status=no, address=no')<br />
    }<br />
    &lt;/script&gt;<br />
    &lt;/head&gt;</p>
  <p>&lt;body bgcolor=&quot;#FFCC33&quot; text=&quot;#663333&quot;&gt;<br />
    &lt;center&gt;<br />
    &lt;!--#INCLUDE FILE = &quot;include/top.asp&quot; --&gt;<br />
    &lt;form action=&quot;surveys/0602CorporateSurvey-init.asp&quot; method=&quot;get&quot;&gt;<br />
    &lt;table width=&quot;600&quot; border=&quot;0&quot; cellpadding=&quot;0&quot; 
    cellspacing=&quot;0&quot;&gt;<br />
    &lt;tr&gt; <br />
    &lt;td width=&quot;100%&quot; height=&quot;120&quot; valign=&quot;top&quot; 
    class=&quot;bodytext&quot;&gt; <br />
    &lt;p&gt;&lt;span class=&quot;producttitle&quot;&gt;&lt;font size=&quot;+1&quot;&gt;&lt;font 
    color=&quot;#663333&quot;&gt;&lt;img src=&quot;images/surveybaker.jpg&quot; 
    width=&quot;120&quot; height=&quot;120&quot; align=&quot;left&quot;&gt;Thank 
    <br />
    you for your business! Can you also take 60 seconds to tell us how we're <br />
    doing?&lt;/font&gt;&lt;br&gt;<br />
    &lt;/font&gt;&lt;/span&gt;&lt;br&gt;<br />
    &lt;font color=&quot;#663333&quot;&gt;This survey is anonymous unless you 
    choose to <br />
    tell us who you are (which will earn you cookie love!) at the end of <br />
    the survey.&lt;/font&gt;&lt;/p&gt;&lt;/td&gt;<br />
    &lt;/tr&gt;<br />
    &lt;tr&gt; <br />
    &lt;td height=&quot;10&quot; class=&quot;bodytext&quot;&gt;&lt;table width=&quot;100%&quot; 
    border=&quot;0&quot;&gt;<br />
    &lt;tr&gt; <br />
    &lt;td class=&quot;bodytext&quot;&gt;&amp;nbsp;&lt;/td&gt;<br />
    &lt;td width=&quot;12%&quot; align=&quot;center&quot; class=&quot;bodytext&quot;&gt;Excellent&lt;/td&gt;<br />
    &lt;td width=&quot;12%&quot; align=&quot;center&quot; class=&quot;bodytext&quot;&gt;Very 
    Good&lt;/td&gt;<br />
    &lt;td width=&quot;12%&quot; align=&quot;center&quot; class=&quot;bodytext&quot;&gt;Just 
    OK&lt;/td&gt;<br />
    &lt;td align=&quot;center&quot; class=&quot;bodytext&quot;&gt;Poor&lt;/td&gt;<br />
    &lt;td align=&quot;center&quot; class=&quot;bodytext&quot;&gt;&amp;nbsp;&lt;/td&gt;<br />
    &lt;/tr&gt;<br />
    &lt;tr&gt; <br />
    &lt;td width=&quot;30%&quot; class=&quot;bodytext&quot;&gt;&amp;nbsp;&lt;/td&gt;<br />
    &lt;td align=&quot;center&quot; class=&quot;bodytext&quot;&gt;&lt;font size=&quot;-2&quot;&gt;(Yeah!)&lt;/font&gt;&lt;/td&gt;<br />
    &lt;td colspan=&quot;4&quot; align=&quot;left&quot; class=&quot;bodytext&quot;&gt;&lt;font 
    size=&quot;-2&quot;&gt;(Oh <br />
    no! Not excellent? That's our goal. Please tell us more below.)&lt;/font&gt;&lt;/td&gt;<br />
    &lt;/tr&gt;<br />
    &lt;tr&gt; <br />
    &lt;td height=&quot;25&quot; class=&quot;bodytext&quot;&gt; &lt;label&gt;Your 
    gift recipients' feedback&lt;/label&gt;&lt;/td&gt;<br />
    &lt;td align=&quot;center&quot;&gt; &lt;input type=&quot;radio&quot; name=&quot;value1&quot; 
    value=&quot;Excellent&quot;&gt; <br />
    &lt;/td&gt;<br />
    &lt;td align=&quot;center&quot;&gt; &lt;input type=&quot;radio&quot; name=&quot;value1&quot; 
    value=&quot;Good&quot;&gt; <br />
    &lt;/td&gt;<br />
    &lt;td align=&quot;center&quot;&gt; &lt;input type=&quot;radio&quot; name=&quot;value1&quot; 
    value=&quot;OK&quot;&gt; <br />
    &lt;/td&gt;<br />
    &lt;td align=&quot;center&quot;&gt; &lt;input type=&quot;radio&quot; name=&quot;value1&quot; 
    value=&quot;Poor&quot;&gt; <br />
    &lt;/td&gt;<br />
    &lt;td align=&quot;left&quot;&gt;&amp;nbsp;&lt;/td&gt;<br />
    &lt;/tr&gt;<br />
    &lt;tr&gt; <br />
    &lt;td height=&quot;25&quot; class=&quot;bodytext&quot;&gt; &lt;label&gt; 
    Overall experience&lt;/label&gt;&lt;/td&gt;<br />
    &lt;td align=&quot;center&quot;&gt; &lt;input type=&quot;radio&quot; name=&quot;value2&quot; 
    value=&quot;Excellent&quot;&gt; <br />
    &lt;/td&gt;<br />
    &lt;td align=&quot;center&quot;&gt; &lt;input type=&quot;radio&quot; name=&quot;value2&quot; 
    value=&quot;Good&quot;&gt; <br />
    &lt;/td&gt;<br />
    &lt;td align=&quot;center&quot;&gt; &lt;input type=&quot;radio&quot; name=&quot;value2&quot; 
    value=&quot;OK&quot;&gt; <br />
    &lt;/td&gt;<br />
    &lt;td align=&quot;center&quot;&gt; &lt;input type=&quot;radio&quot; name=&quot;value2&quot; 
    value=&quot;Poor&quot;&gt; <br />
    &lt;/td&gt;<br />
    &lt;td align=&quot;left&quot;&gt;&amp;nbsp;&lt;/td&gt;<br />
    &lt;/tr&gt;<br />
    &lt;tr&gt; <br />
    &lt;td height=&quot;25&quot; class=&quot;bodytext&quot;&gt; Quality of product&lt;/td&gt;<br />
    &lt;td align=&quot;center&quot;&gt; &lt;input type=&quot;radio&quot; name=&quot;value3&quot; 
    value=&quot;Excellent&quot;&gt; <br />
    &lt;/td&gt;<br />
    &lt;td align=&quot;center&quot;&gt; &lt;input type=&quot;radio&quot; name=&quot;value3&quot; 
    value=&quot;Good&quot;&gt; <br />
    &lt;/td&gt;<br />
    &lt;td align=&quot;center&quot;&gt; &lt;input type=&quot;radio&quot; name=&quot;value3&quot; 
    value=&quot;OK&quot;&gt; <br />
    &lt;/td&gt;<br />
    &lt;td align=&quot;center&quot;&gt; &lt;input type=&quot;radio&quot; name=&quot;value3&quot; 
    value=&quot;Poor&quot;&gt; <br />
    &lt;/td&gt;<br />
    &lt;td align=&quot;left&quot;&gt;&amp;nbsp;&lt;/td&gt;<br />
    &lt;/tr&gt;<br />
    &lt;tr&gt; <br />
    &lt;td width=&quot;30%&quot; height=&quot;25&quot; class=&quot;bodytext&quot;&gt; 
    &lt;label&gt; Customer service&lt;/label&gt;&lt;/td&gt;<br />
    &lt;td align=&quot;center&quot;&gt; &lt;input type=&quot;radio&quot; name=&quot;value4&quot; 
    value=&quot;Excellent&quot;&gt; <br />
    &lt;/td&gt;<br />
    &lt;td align=&quot;center&quot;&gt; &lt;input type=&quot;radio&quot; name=&quot;value4&quot; 
    value=&quot;Good&quot;&gt; <br />
    &lt;/td&gt;<br />
    &lt;td align=&quot;center&quot;&gt; &lt;input type=&quot;radio&quot; name=&quot;value4&quot; 
    value=&quot;OK&quot;&gt; <br />
    &lt;/td&gt;<br />
    &lt;td width=&quot;12%&quot; align=&quot;center&quot;&gt; &lt;input type=&quot;radio&quot; 
    name=&quot;value4&quot; value=&quot;Poor&quot;&gt; <br />
    &lt;/td&gt;<br />
    &lt;td width=&quot;22%&quot; align=&quot;left&quot;&gt;&amp;nbsp;&lt;/td&gt;<br />
    &lt;/tr&gt;<br />
    &lt;tr&gt; <br />
    &lt;td width=&quot;30%&quot; height=&quot;25&quot; class=&quot;bodytext&quot;&gt; 
    &lt;label&gt; Value for your <br />
    $$&lt;/label&gt;&lt;/td&gt;<br />
    &lt;td align=&quot;center&quot;&gt; &lt;input type=&quot;radio&quot; name=&quot;value5&quot; 
    value=&quot;Excellent&quot;&gt; <br />
    &lt;/td&gt;<br />
    &lt;td align=&quot;center&quot;&gt; &lt;input type=&quot;radio&quot; name=&quot;value5&quot; 
    value=&quot;Good&quot;&gt; <br />
    &lt;/td&gt;<br />
    &lt;td align=&quot;center&quot;&gt; &lt;input type=&quot;radio&quot; name=&quot;value5&quot; 
    value=&quot;OK&quot;&gt; <br />
    &lt;/td&gt;<br />
    &lt;td align=&quot;center&quot;&gt; &lt;input type=&quot;radio&quot; name=&quot;value5&quot; 
    value=&quot;Poor&quot;&gt; <br />
    &lt;/td&gt;<br />
    &lt;td align=&quot;left&quot;&gt;&amp;nbsp;&lt;/td&gt;<br />
    &lt;/tr&gt;<br />
    &lt;tr&gt; <br />
    &lt;td width=&quot;30%&quot; height=&quot;25&quot; class=&quot;bodytext&quot;&gt; 
    Presentation &amp;amp; packaging&lt;/td&gt;<br />
    &lt;td align=&quot;center&quot;&gt; &lt;input type=&quot;radio&quot; name=&quot;value6&quot; 
    value=&quot;Excellent&quot;&gt; <br />
    &lt;/td&gt;<br />
    &lt;td align=&quot;center&quot;&gt; &lt;input type=&quot;radio&quot; name=&quot;value6&quot; 
    value=&quot;Good&quot;&gt; <br />
    &lt;/td&gt;<br />
    &lt;td align=&quot;center&quot;&gt; &lt;input type=&quot;radio&quot; name=&quot;value6&quot; 
    value=&quot;OK&quot;&gt; <br />
    &lt;/td&gt;<br />
    &lt;td align=&quot;center&quot;&gt; &lt;input type=&quot;radio&quot; name=&quot;value6&quot; 
    value=&quot;Poor&quot;&gt; <br />
    &lt;/td&gt;<br />
    &lt;td align=&quot;left&quot;&gt;&amp;nbsp;&lt;/td&gt;<br />
    &lt;/tr&gt;<br />
    &lt;tr&gt; <br />
    &lt;td width=&quot;30%&quot; height=&quot;25&quot; class=&quot;bodytext&quot;&gt; 
    &lt;label&gt; Follow-through&lt;/label&gt;&lt;/td&gt;<br />
    &lt;td align=&quot;center&quot;&gt; &lt;input type=&quot;radio&quot; name=&quot;value7&quot; 
    value=&quot;Excellent&quot;&gt; <br />
    &lt;/td&gt;<br />
    &lt;td align=&quot;center&quot;&gt; &lt;input type=&quot;radio&quot; name=&quot;value7&quot; 
    value=&quot;Good&quot;&gt; <br />
    &lt;/td&gt;<br />
    &lt;td align=&quot;center&quot;&gt; &lt;input type=&quot;radio&quot; name=&quot;value7&quot; 
    value=&quot;OK&quot;&gt; <br />
    &lt;/td&gt;<br />
    &lt;td align=&quot;center&quot;&gt; &lt;input type=&quot;radio&quot; name=&quot;value7&quot; 
    value=&quot;Poor&quot;&gt; <br />
    &lt;/td&gt;<br />
    &lt;td align=&quot;left&quot;&gt;&amp;nbsp;&lt;/td&gt;<br />
    &lt;/tr&gt;<br />
    &lt;/table&gt;&lt;/td&gt;<br />
    &lt;/tr&gt;<br />
    &lt;tr&gt; <br />
    &lt;td height=&quot;10&quot; class=&quot;bodytext&quot;&gt; &lt;table width=&quot;100%&quot; 
    border=&quot;0&quot; cellpadding=&quot;0&quot;&gt;<br />
    &lt;tr&gt; <br />
    &lt;td height=&quot;25&quot; valign=&quot;bottom&quot; class=&quot;bodytext&quot;&gt;I've 
    been a &amp;#8220;deer <br />
    customer&amp;#8221; for:&lt;/td&gt;<br />
    &lt;/tr&gt;<br />
    &lt;tr&gt; <br />
    &lt;td class=&quot;bodytext&quot;&gt; &lt;table width=&quot;88%&quot; height=&quot;25&quot; 
    border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;0&quot;&gt;<br />
    &lt;tr&gt; <br />
    &lt;td width=&quot;20%&quot; class=&quot;bodytext&quot;&gt;&lt;input type=&quot;radio&quot; 
    name=&quot;customer&quot; value=&quot;one&quot;&gt;<br />
    One <br />
    &lt;label&gt; &lt;/label&gt;&lt;/td&gt;<br />
    &lt;td width=&quot;20%&quot; class=&quot;bodytext&quot;&gt;&lt;input type=&quot;radio&quot; 
    name=&quot;customer&quot; value=&quot;two&quot;&gt;<br />
    Two&lt;/td&gt;<br />
    &lt;td width=&quot;20%&quot; class=&quot;bodytext&quot;&gt;&lt;input type=&quot;radio&quot; 
    name=&quot;customer&quot; value=&quot;three&quot;&gt;<br />
    Three&lt;/td&gt;<br />
    &lt;td width=&quot;20%&quot; class=&quot;bodytext&quot;&gt;&lt;label&gt; <br />
    &lt;input type=&quot;radio&quot; name=&quot;customer&quot; value=&quot;four&quot;&gt;<br />
    Four&lt;/label&gt;&lt;/td&gt;<br />
    &lt;td width=&quot;25%&quot; class=&quot;bodytext&quot;&gt; &lt;input type=&quot;radio&quot; 
    name=&quot;customer&quot; value=&quot;five&quot;&gt;<br />
    Five Years&lt;/td&gt;<br />
    &lt;/tr&gt;<br />
    &lt;/table&gt;&lt;/td&gt;<br />
    &lt;/tr&gt;<br />
    &lt;tr&gt; <br />
    &lt;td height=&quot;25&quot; valign=&quot;bottom&quot; class=&quot;bodytext&quot;&gt;I 
    heard about Dancing <br />
    Deer through:&lt;/td&gt;<br />
    &lt;/tr&gt;<br />
    &lt;tr&gt; <br />
    &lt;td height=&quot;10&quot; class=&quot;bodytext&quot;&gt; &lt;label&gt; 
    &lt;/label&gt; &lt;table width=&quot;100%&quot; height=&quot;25&quot; border=&quot;0&quot; 
    cellpadding=&quot;0&quot; cellspacing=&quot;0&quot;&gt;<br />
    &lt;tr&gt; <br />
    &lt;td width=&quot;30%&quot; height=&quot;25&quot; class=&quot;bodytext&quot;&gt; 
    &lt;label&gt; <br />
    &lt;input type=&quot;checkbox&quot; name=&quot;heard1&quot; value=&quot;checkbox&quot;&gt;<br />
    &lt;/label&gt;<br />
    Internet&lt;/td&gt;<br />
    &lt;td width=&quot;30%&quot; class=&quot;bodytext&quot;&gt; &lt;input type=&quot;checkbox&quot; 
    name=&quot;heard2&quot; value=&quot;checkbox&quot;&gt; Trish&lt;/td&gt;<br />
    &lt;td width=&quot;40%&quot; class=&quot;bodytext&quot;&gt; &lt;input type=&quot;checkbox&quot; 
    name=&quot;heard3&quot; value=&quot;checkbox&quot;&gt;Received a Gift&lt;/td&gt;<br />
    &lt;/tr&gt;<br />
    &lt;tr&gt; <br />
    &lt;td height=&quot;25&quot; class=&quot;bodytext&quot;&gt;&lt;input type=&quot;checkbox&quot; 
    name=&quot;heard4&quot; value=&quot;checkbox&quot;&gt;Press&lt;/td&gt;<br />
    &lt;td class=&quot;bodytext&quot;&gt;&lt;input type=&quot;checkbox&quot; name=&quot;heard5&quot; 
    value=&quot;checkbox&quot;&gt;Word of Mouth&lt;/td&gt;<br />
    &lt;td class=&quot;bodytext&quot;&gt;&lt;input type=&quot;checkbox&quot; name=&quot;heard6&quot; 
    value=&quot;checkbox&quot;&gt; Bought at store&lt;/td&gt;<br />
    &lt;/tr&gt;<br />
    &lt;/table&gt;&lt;/td&gt;<br />
    &lt;/tr&gt;<br />
    &lt;/table&gt;&lt;/td&gt;<br />
    &lt;/tr&gt;<br />
    &lt;tr&gt; <br />
    &lt;td height=&quot;35&quot; valign=&quot;bottom&quot; class=&quot;producttitle&quot;&gt;&lt;font 
    color=&quot;#663333&quot;&gt;How <br />
    else can we be of service to your organization? &lt;/font&gt; &lt;/td&gt;<br />
    &lt;/tr&gt;<br />
    &lt;tr&gt; <br />
    &lt;td height=&quot;35&quot; class=&quot;bodytext&quot;&gt; &lt;label&gt; 
    <br />
    &lt;input type=&quot;checkbox&quot; name=&quot;service1&quot; value=&quot;checkbox&quot;&gt;<br />
    &lt;/label&gt;<br />
    Retention Marketing <br />
    &lt;input type=&quot;checkbox&quot; name=&quot;service2&quot; value=&quot;checkbox&quot;&gt;<br />
    Thank you's <br />
    &lt;input type=&quot;checkbox&quot; name=&quot;service3&quot; value=&quot;checkbox&quot;&gt;<br />
    Promotions <br />
    &lt;input type=&quot;checkbox&quot; name=&quot;service4&quot; value=&quot;checkbox&quot;&gt;<br />
    Trade Shows <br />
    &lt;input type=&quot;checkbox&quot; name=&quot;service42&quot; value=&quot;checkbox&quot;&gt;<br />
    Other &lt;/td&gt;<br />
    &lt;/tr&gt;<br />
    &lt;tr&gt; <br />
    &lt;td height=&quot;35&quot; valign=&quot;bottom&quot; class=&quot;producttitle&quot;&gt;&lt;font 
    color=&quot;#663333&quot;&gt;Finally, <br />
    we love &amp;amp; need feedback please tell us more.&lt;/font&gt;&lt;/td&gt;<br />
    &lt;/tr&gt;<br />
    &lt;tr&gt; <br />
    &lt;td height=&quot;10&quot; valign=&quot;top&quot; class=&quot;bodytext&quot;&gt;&lt;textarea 
    name=&quot;feedback&quot; cols=&quot;75&quot; rows=&quot;5&quot; id=&quot;textarea&quot; 
    onKeyPress=&quot;return handleEnter(this, event)&quot;&gt;&lt;/textarea&gt;&lt;/td&gt;<br />
    &lt;/tr&gt;<br />
    &lt;tr&gt; <br />
    &lt;td height=&quot;35&quot; valign=&quot;bottom&quot; class=&quot;producttitle&quot;&gt;&lt;font 
    color=&quot;#663333&quot;&gt;Talk <br />
    to a Deer. &lt;/font&gt; &lt;/td&gt;<br />
    &lt;/tr&gt;<br />
    &lt;tr&gt; <br />
    &lt;td height=&quot;40&quot; valign=&quot;bottom&quot; class=&quot;bodytext&quot;&gt; 
    &lt;p&gt;Call Meg 888.699.DEER <br />
    x222 or &lt;a href=&quot;mailto:meg.strobl@dancingdeer.com&quot;&gt;&lt;font 
    color=&quot;#663333&quot;&gt;meg.strobl@dancingdeer.com&lt;/font&gt;&lt;/a&gt;.&lt;/p&gt;<br />
    &lt;p&gt;Meg Strobl, Manager, Corporate Sales Division&lt;/p&gt;&lt;/td&gt;<br />
    &lt;/tr&gt;<br />
    &lt;tr&gt; <br />
    &lt;td height=&quot;35&quot; valign=&quot;bottom&quot; class=&quot;smallwhitetext&quot;&gt;&lt;font 
    color=&quot;#663333&quot;&gt;This <br />
    survey is anonymous unless you choose to tell us who you are (which will <br />
    earn you cookie love!)&lt;/font&gt;.&lt;/td&gt;<br />
    &lt;/tr&gt;<br />
    &lt;tr&gt; <br />
    &lt;td height=&quot;10&quot; valign=&quot;bottom&quot;&gt;&lt;table width=&quot;100%&quot; 
    border=&quot;0&quot; cellspacing=&quot;0&quot; cellpadding=&quot;4&quot;&gt;<br />
    &lt;tr&gt; <br />
    &lt;td align=&quot;right&quot; class=&quot;bodytext&quot;&gt;Email&amp;nbsp;&lt;/td&gt;<br />
    &lt;td&gt;&lt;input name=&quot;email&quot; type=&quot;text&quot; size=&quot;50&quot; 
    maxlength=&quot;50&quot;&gt; &lt;/td&gt;<br />
    &lt;/tr&gt;<br />
    &lt;tr&gt; <br />
    &lt;td width=&quot;16%&quot; align=&quot;right&quot; class=&quot;bodytext&quot;&gt;Name&amp;nbsp;&lt;/td&gt;<br />
    &lt;td width=&quot;84%&quot;&gt;&lt;input name=&quot;name&quot; type=&quot;text&quot; 
    size=&quot;50&quot; maxlength=&quot;35&quot;&gt; <br />
    &lt;span class=&quot;smallwhitetext&quot;&gt;&lt;/span&gt;&lt;/td&gt;<br />
    &lt;/tr&gt;<br />
    &lt;tr&gt; <br />
    &lt;td align=&quot;right&quot; class=&quot;bodytext&quot;&gt;Company&amp;nbsp;&lt;/td&gt;<br />
    &lt;td&gt;&lt;input name=&quot;company&quot; type=&quot;text&quot; size=&quot;50&quot; 
    maxlength=&quot;35&quot;&gt; &lt;/td&gt;<br />
    &lt;/tr&gt;<br />
    &lt;/table&gt;&lt;/td&gt;<br />
    &lt;/tr&gt;<br />
    &lt;tr&gt; <br />
    &lt;td height=&quot;10&quot; valign=&quot;bottom&quot;&gt;&amp;nbsp;&lt;/td&gt;<br />
    &lt;/tr&gt;<br />
    &lt;tr&gt; <br />
    &lt;td height=&quot;40&quot; valign=&quot;bottom&quot; class=&quot;producttitle&quot;&gt;&lt;font 
    color=&quot;#FFFFFF&quot;&gt; <br />
    &lt;input type=&quot;Image&quot; name=&quot;Submit&quot; value=&quot;submit&quot; 
    src=&quot;images/btn-submit.gif&quot; border=&quot;0&quot; alt=&quot;submit&quot; 
    width=&quot;49&quot; height=&quot;20&quot; onKeyPress=&quot;return handleEnter(this, 
    event)&quot; onClick=&quot;return surveypopup()&quot;&gt;<br />
    &lt;font color=&quot;#663333&quot;&gt;Thank you very much!!&lt;/font&gt;&lt;/font&gt;&lt;/td&gt;<br />
    &lt;/tr&gt;<br />
    &lt;tr&gt; <br />
    &lt;td height=&quot;10&quot; valign=&quot;bottom&quot; class=&quot;producttitle&quot;&gt;&amp;nbsp; 
    &lt;/td&gt;<br />
    &lt;/tr&gt;<br />
    &lt;/table&gt;<br />
    &lt;/form&gt;<br />
    &lt;/center&gt;<br />
    &lt;/body&gt;<br />
    &lt;/html&gt;</p>
</div><br />
<div id=msgcodebehind>This is the code behind page the saves the data, CorporateSurvey-int.asp</div><br />
<div id="codebehind">
<p>&lt;%on error resume next%&gt;<br />
  &lt;!--#INCLUDE file = &quot;../include/momapp.asp&quot; --&gt;<br />
  &lt;%<br />
  ' create a line of data seperated by |<br />
  SurveyLog=cstr(REQUEST(&quot;value1&quot;))<br />
  SurveyLog=SurveyLog &amp; &quot;|&quot; &amp; cstr(REQUEST(&quot;value2&quot;))<br />
  SurveyLog=SurveyLog &amp; &quot;|&quot; &amp; cstr(REQUEST(&quot;value3&quot;))<br />
  SurveyLog=SurveyLog &amp; &quot;|&quot; &amp; cstr(REQUEST(&quot;value4&quot;))<br />
  SurveyLog=SurveyLog &amp; &quot;|&quot; &amp; cstr(REQUEST(&quot;value5&quot;))<br />
  SurveyLog=SurveyLog &amp; &quot;|&quot; &amp; cstr(REQUEST(&quot;value6&quot;))<br />
  SurveyLog=SurveyLog &amp; &quot;|&quot; &amp; cstr(REQUEST(&quot;value7&quot;))<br />
  SurveyLog=SurveyLog &amp; &quot;|&quot; &amp; cstr(REQUEST(&quot;customer&quot;))	
  <br />
  SurveyLog=SurveyLog &amp; &quot;|&quot; &amp; cstr(REQUEST(&quot;heard1&quot;))<br />
  SurveyLog=SurveyLog &amp; &quot;|&quot; &amp; cstr(REQUEST(&quot;heard2&quot;))<br />
  SurveyLog=SurveyLog &amp; &quot;|&quot; &amp; cstr(REQUEST(&quot;heard3&quot;))<br />
  SurveyLog=SurveyLog &amp; &quot;|&quot; &amp; cstr(REQUEST(&quot;heard4&quot;))<br />
  SurveyLog=SurveyLog &amp; &quot;|&quot; &amp; cstr(REQUEST(&quot;heard5&quot;))<br />
  SurveyLog=SurveyLog &amp; &quot;|&quot; &amp; cstr(REQUEST(&quot;heard6&quot;))<br />
  SurveyLog=SurveyLog &amp; &quot;|&quot; &amp; cstr(REQUEST(&quot;service1&quot;))	
  <br />
  SurveyLog=SurveyLog &amp; &quot;|&quot; &amp; cstr(REQUEST(&quot;service2&quot;))	
  <br />
  SurveyLog=SurveyLog &amp; &quot;|&quot; &amp; cstr(REQUEST(&quot;service3&quot;))	
  <br />
  SurveyLog=SurveyLog &amp; &quot;|&quot; &amp; cstr(REQUEST(&quot;service4&quot;))	
  <br />
  SurveyLog=SurveyLog &amp; &quot;|&quot; &amp; cstr(REQUEST(&quot;service5&quot;))	
  <br />
  SurveyLog=SurveyLog &amp; &quot;|&quot; &amp; cstr(REQUEST(&quot;feedback&quot;))<br />
  SurveyLog=SurveyLog &amp; &quot;|&quot; &amp; cstr(REQUEST(&quot;name&quot;))<br />
  SurveyLog=SurveyLog &amp; &quot;|&quot; &amp; cstr(REQUEST(&quot;company&quot;))<br />
  SurveyLog=SurveyLog &amp; &quot;|&quot; &amp; cstr(REQUEST(&quot;email&quot;))<br />
  <br />
  ' Save the data to a text file<br />
  StrFileName = &quot;../text/0602corporatesurvey.txt&quot;<br />
  StrPhysicalPath = Server.MapPath(StrFileName)<br />
  Set fs=Server.CreateObject(&quot;Scripting.FileSystemObject&quot;)<br />
  set ts = fs.OpenTextFile(StrPhysicalPath , 8)<br />
  ts.write(SurveyLog)<br />
  ts.writeline()<br />
  ts.close<br />
  set ts=nothing<br />
  set fs=nothing<br />
  response.Redirect(&quot;../default.asp&quot;)<br />
  %&gt; </p>
  </div>
</body>
</html>
