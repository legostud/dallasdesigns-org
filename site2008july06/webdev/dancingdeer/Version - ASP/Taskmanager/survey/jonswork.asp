<%on error resume next%>
<!--#INCLUDE file = "../include/momapp.asp" -->
<html>
<head>
<title>Jon's workload recorder</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../include/deerstyle.css" type="text/css">
</head>

<% 
	task="break"
	task=cstr(REQUEST.QUERYSTRING("task"))
%>

<script language="JavaScript">
	
</script>

<body bgcolor="#75A4D2">
<table width="75" border="0">
  <tr align="center">
    <%if task = "reseller" then%>
	<td width="75" height="75" class="bodytext"><font color="#FFCC00"><strong><img src="../newsletters/images/smalldeerleft.gif" width="45" height="39"><br>
  Reseller                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       </strong></font></td>
    <%else%>
	<td width="75" height="75" class="bodytext"><a href="jonswork-init.asp?task=reseller"><img src="jonswork-blank.gif" width="45" height="39" border="0"><br>
  Reseller                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       </a></td>
	<%end if%>
  </tr>
  <tr align="center">
    <%if task="DTC" then%>
    <td height="75" class="bodytext"><strong><font color="#FFCC00"><img src="../newsletters/images/smalldeerleft.gif" width="45" height="39"><br>
    DTC </font></strong></td>
    <%else%>
    <td height="75" class="bodytext"><a href="jonswork-init.asp?task=DTC"><img src="jonswork-blank.gif" width="45" height="39" border="0"><br>
    </a><a href="jonswork-init.asp?task=DTC">DTC</a></td>
    <%end if%>
  </tr>
  <tr align="center">
    <%if task="corporate" then%>
    <td height="75" class="bodytext"><strong><font color="#FFCC00"> <img src="../newsletters/images/smalldeerleft.gif" width="45" height="39"><br>
    Corporate</font></strong></td>
    <%else%>
    <td height="75" class="bodytext"><a href="jonswork-init.asp?task=corporate"><img src="jonswork-blank.gif" width="45" height="39" border="0"><br>
      Corporate</a></td>
    <%end if%>
  </tr>
  <tr align="center">
    <%if task="IT" then%>
    <td height="75" class="bodytext"><strong><font color="#FFCC00"><img src="../newsletters/images/smalldeerleft.gif" width="45" height="39"><br>
    Help Desk</font></strong></td>
    <%else%>
    <td height="75" class="bodytext"><a href="jonswork-init.asp?task=IT"><img src="jonswork-blank.gif" width="45" height="39" border="0"><br>
    Help Desk</a></td>
    <%end if%>
  </tr>
  <tr align="center">
    <%if task="web" or task="newsletter" then%>
    <td height="90" class="bodytext">	<strong><font color="#FFCC00">	<img src="../newsletters/images/smalldeerleft.gif" width="45" height="39"><br>
    Web
    <font size="-2">
	<%if task="newsletter" then%>
	<br> Email | <a href="jonswork-init.asp?task=web">Site</a>
	<%else%>
	<br> <a href="jonswork-init.asp?task=newsletter">Email</a> | Site
	<%end if%>
	</font></font></strong></td>
    <%else%>
    <td height="90" class="bodytext"><img src="jonswork-blank.gif" width="45" height="39" border="0"><br>
      <font color="#FFFFFF">Web<br>
      <font size="-2"><a href="jonswork-init.asp?task=newsletter">Email</a> | 
    <a href="jonswork-init.asp?task=web">Site</a></font></font></td>
    <%end if%>
  </tr>
  <tr align="center">
    <%if task="phone" then%>
	<td height="75" class="bodytext"><strong><font color="#FFCC00"><img src="../newsletters/images/smalldeerleft.gif" width="45" height="39"><br>
  CSR</font></strong></td>
    <%else%>
	<td height="75" class="bodytext"><a href="jonswork-init.asp?task=phone"><img src="jonswork-blank.gif" width="45" height="39" border="0"><br>
	</a><a href="jonswork-init.asp?task=phone">CSR</a></td>
	<%end if%>
  </tr>
  <tr align="center">
    <%if task="break" then%>
	<td height="75" class="bodytext"><strong><font color="#FFCC00"><img src="../newsletters/images/smalldeerleft.gif" width="45" height="39"><br>
  Break                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       </font></strong></td>
    <%else%>
	<td height="75" class="bodytext"><a href="jonswork-init.asp?task=break"><img src="jonswork-blank.gif" width="45" height="39" border="0"><br>
	</a><a href="jonswork-init.asp?task=break">Break</a></td>
	<%end if%>
  </tr>
  <tr align="center">
    <%if task="other" then%>
	<td height="75" class="bodytext"><strong><font color="#FFCC00"><img src="../newsletters/images/smalldeerleft.gif" width="45" height="39"><br>
  Other                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       </font></strong></td>
	<%else%>
    <td height="75" class="bodytext"><a href="jonswork-init.asp?task=other"><img src="jonswork-blank.gif" width="45" height="39" border="0"><br>
    </a><a href="jonswork-init.asp?task=other">Other</a></td>
	<%end if%>
  </tr>
</table>
</body>
</html>