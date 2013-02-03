<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<!--#INCLUDE file = "include/momapp.asp" -->
<html>
<head>
<title>Dancing Deer Corporate Survey</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="include/deerstyle.css" type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->

function handleEnter (field, event) {
		var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
		if (keyCode == 13) {
			var i;
			for (i = 0; i < field.form.elements.length; i++)
				if (field == field.form.elements[i])
					break;
			i = (i + 1) % field.form.elements.length;
			field.form.elements[i].focus();
			return false;
		} 
		else
		return true;
	}      

function surveypopup() {
window.open('../PopupThanks.htm', 'survey', 'width=450, height=200, scrollbars=no, resizable=yes, status=no, address=no')
}
</script>
</head>

<body bgcolor="#FFCC33" text="#663333">
<center>
<!--#INCLUDE FILE = "include/top.asp" -->
<form action="surveys/0602CorporateSurvey-init.asp" method="get">
  <table width="600" border="0" cellpadding="0" cellspacing="0">
    <tr> 
      <td width="100%" height="120" valign="top" class="bodytext"> 
        <p><span class="producttitle"><font size="+1"><font color="#663333"><img src="images/surveybaker.jpg" width="120" height="120" align="left">Thank 
          you for your business! Can you also take 60 seconds to tell us how we're 
          doing?</font><br>
          </font></span><br>
          <font color="#663333">This survey is anonymous unless you choose to 
          tell us who you are (which will earn you cookie love!) at the end of 
          the survey.</font></p></td>
    </tr>
    <tr> 
      <td height="10" class="bodytext"><table width="100%" border="0">
          <tr> 
            <td class="bodytext">&nbsp;</td>
            <td width="12%" align="center" class="bodytext">Excellent</td>
            <td width="12%" align="center" class="bodytext">Very Good</td>
            <td width="12%" align="center" class="bodytext">Just OK</td>
            <td align="center" class="bodytext">Poor</td>
            <td align="center" class="bodytext">&nbsp;</td>
          </tr>
          <tr> 
            <td width="30%" class="bodytext">&nbsp;</td>
            <td align="center" class="bodytext"><font size="-2">(Yeah!)</font></td>
            <td colspan="4" align="left" class="bodytext"><font size="-2">(Oh 
              no! Not excellent? That's our goal. Please tell us more below.)</font></td>
          </tr>
          <tr> 
            <td height="25" class="bodytext"> <label>Your gift recipients' feedback</label></td>
            <td align="center"> <input type="radio" name="value1" value="Excellent"> 
            </td>
            <td align="center"> <input type="radio" name="value1" value="Good"> 
            </td>
            <td align="center"> <input type="radio" name="value1" value="OK"> 
            </td>
            <td align="center"> <input type="radio" name="value1" value="Poor"> 
            </td>
            <td align="left">&nbsp;</td>
          </tr>
          <tr> 
            <td height="25" class="bodytext"> <label> Overall experience</label></td>
            <td align="center"> <input type="radio" name="value2" value="Excellent"> 
            </td>
            <td align="center"> <input type="radio" name="value2" value="Good"> 
            </td>
            <td align="center"> <input type="radio" name="value2" value="OK"> 
            </td>
            <td align="center"> <input type="radio" name="value2" value="Poor"> 
            </td>
            <td align="left">&nbsp;</td>
          </tr>
          <tr> 
            <td height="25" class="bodytext"> Quality of product</td>
            <td align="center"> <input type="radio" name="value3" value="Excellent"> 
            </td>
            <td align="center"> <input type="radio" name="value3" value="Good"> 
            </td>
            <td align="center"> <input type="radio" name="value3" value="OK"> 
            </td>
            <td align="center"> <input type="radio" name="value3" value="Poor"> 
            </td>
            <td align="left">&nbsp;</td>
          </tr>
          <tr> 
            <td width="30%" height="25" class="bodytext"> <label> Customer service</label></td>
            <td align="center"> <input type="radio" name="value4" value="Excellent"> 
            </td>
            <td align="center"> <input type="radio" name="value4" value="Good"> 
            </td>
            <td align="center"> <input type="radio" name="value4" value="OK"> 
            </td>
            <td width="12%" align="center"> <input type="radio" name="value4" value="Poor"> 
            </td>
            <td width="22%" align="left">&nbsp;</td>
          </tr>
          <tr> 
            <td width="30%" height="25" class="bodytext"> <label> Value for your 
              $$</label></td>
            <td align="center"> <input type="radio" name="value5" value="Excellent"> 
            </td>
            <td align="center"> <input type="radio" name="value5" value="Good"> 
            </td>
            <td align="center"> <input type="radio" name="value5" value="OK"> 
            </td>
            <td align="center"> <input type="radio" name="value5" value="Poor"> 
            </td>
            <td align="left">&nbsp;</td>
          </tr>
          <tr> 
            <td width="30%" height="25" class="bodytext"> Presentation &amp; packaging</td>
            <td align="center"> <input type="radio" name="value6" value="Excellent"> 
            </td>
            <td align="center"> <input type="radio" name="value6" value="Good"> 
            </td>
            <td align="center"> <input type="radio" name="value6" value="OK"> 
            </td>
            <td align="center"> <input type="radio" name="value6" value="Poor"> 
            </td>
            <td align="left">&nbsp;</td>
          </tr>
          <tr> 
            <td width="30%" height="25" class="bodytext"> <label> Follow-through</label></td>
            <td align="center"> <input type="radio" name="value7" value="Excellent"> 
            </td>
            <td align="center"> <input type="radio" name="value7" value="Good"> 
            </td>
            <td align="center"> <input type="radio" name="value7" value="OK"> 
            </td>
            <td align="center"> <input type="radio" name="value7" value="Poor"> 
            </td>
            <td align="left">&nbsp;</td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="10" class="bodytext"> <table width="100%" border="0" cellpadding="0">
          <tr> 
            <td height="25" valign="bottom" class="bodytext">I've been a &#8220;deer 
              customer&#8221; for:</td>
          </tr>
          <tr> 
            <td class="bodytext"> <table width="88%" height="25" border="0" cellpadding="0" cellspacing="0">
                <tr> 
                  <td width="20%" class="bodytext"><input type="radio" name="customer" value="one">
                    One 
                    <label> </label></td>
                  <td width="20%" class="bodytext"><input type="radio" name="customer" value="two">
                    Two</td>
                  <td width="20%" class="bodytext"><input type="radio" name="customer" value="three">
                    Three</td>
                  <td width="20%" class="bodytext"><label> 
                    <input type="radio" name="customer" value="four">
                    Four</label></td>
                  <td width="25%" class="bodytext"> <input type="radio" name="customer" value="five">
                    Five Years</td>
                </tr>
              </table></td>
          </tr>
          <tr> 
            <td height="25" valign="bottom" class="bodytext">I heard about Dancing 
              Deer through:</td>
          </tr>
          <tr> 
            <td height="10" class="bodytext"> <label> </label> <table width="100%" height="25" border="0" cellpadding="0" cellspacing="0">
                <tr> 
                  <td width="30%" height="25" class="bodytext"> <label> 
                    <input type="checkbox" name="heard1" value="checkbox">
                    </label>
                    Internet</td>
                  <td width="30%" class="bodytext"> <input type="checkbox" name="heard2" value="checkbox">
                    Trish</td>
                  <td width="40%" class="bodytext"> <input type="checkbox" name="heard3" value="checkbox">
                    Received a gift</td>
                </tr>
                <tr> 
                  <td height="25" class="bodytext"><input type="checkbox" name="heard4" value="checkbox">
                    Press</td>
                  <td class="bodytext"><input type="checkbox" name="heard5" value="checkbox">
                    Word of Mouth</td>
                  <td class="bodytext"><input type="checkbox" name="heard6" value="checkbox">
                    Bought at store</td>
                </tr>
              </table></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="35" valign="bottom" class="producttitle"><font color="#663333">How 
        else can we be of service to your organization? </font> </td>
    </tr>
    <tr> 
      <td height="35" class="bodytext"> <label> 
        <input type="checkbox" name="service1" value="checkbox">
        </label>
        Retention Marketing 
        <input type="checkbox" name="service2" value="checkbox">
        Thank you's 
        <input type="checkbox" name="service3" value="checkbox">
        Promotions 
        <input type="checkbox" name="service4" value="checkbox">
        Trade Shows 
        <input type="checkbox" name="service42" value="checkbox">
        Other </td>
    </tr>
    <tr> 
      <td height="35" valign="bottom" class="producttitle"><font color="#663333">Finally, 
        we love &amp; need feedback please tell us more.</font></td>
    </tr>
    <tr> 
      <td height="10" valign="top" class="bodytext"><textarea name="feedback" cols="75" rows="5" id="textarea" onKeyPress="return handleEnter(this, event)"></textarea></td>
    </tr>
    <tr> 
      <td height="35" valign="bottom" class="producttitle"><font color="#663333">Talk 
        to a Deer. </font> </td>
    </tr>
    <tr> 
      <td height="40" valign="bottom" class="bodytext"> <p>Call Meg 888.699.DEER 
          x222 or <a href="mailto:meg.strobl@dancingdeer.com"><font color="#663333">meg.strobl@dancingdeer.com</font></a>.</p>
        <p>Meg Strobl, Manager, Corporate Sales Division</p></td>
    </tr>
    <tr> 
      <td height="35" valign="bottom" class="smallwhitetext"><font color="#663333">This 
        survey is anonymous unless you choose to tell us who you are (which will 
        earn you cookie love!)</font>.</td>
    </tr>
    <tr> 
      <td height="10" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="4">
          <tr> 
            <td align="right" class="bodytext">Email&nbsp;</td>
            <td><input name="email" type="text" size="50" maxlength="50"> </td>
          </tr>
          <tr> 
            <td width="16%" align="right" class="bodytext">Name&nbsp;</td>
            <td width="84%"><input name="name" type="text" size="50" maxlength="35"> 
              <span class="smallwhitetext"></span></td>
          </tr>
          <tr> 
            <td align="right" class="bodytext">Company&nbsp;</td>
            <td><input name="company" type="text" size="50" maxlength="35"> </td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="10" valign="bottom">&nbsp;</td>
    </tr>
    <tr> 
      <td height="40" valign="bottom" class="producttitle"><font color="#FFFFFF"> 
        <input type="Image" name="Submit" value="submit" src="images/btn-submit.gif" border="0" alt="submit" width="49" height="20" onKeyPress="return handleEnter(this, event)" onClick="return surveypopup()">
        <font color="#663333">Thank you very much!!</font></font></td>
    </tr>
    <tr> 
      <td height="10" valign="bottom" class="producttitle">&nbsp; </td>
    </tr>
  </table>
</form>
</center>
</body>
</html>