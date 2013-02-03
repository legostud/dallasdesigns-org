<!-- 
*************************************************************************
* usfilter.asp                                                          *
*************************************************************************
* Purpose:                                                              *
*          This page belongs to USFilter. This is the ASP portion of    *
*          the process. usfilter_credit2.html will send this script it's *
*          form data to be formatted for transmission and delivery to   *
*          Authorize.Net.						*
*************************************************************************
* Modifications:                                                        *
*                                                                       *
* Mod# Date     Modifier Modification                                   * 
* ---- -------- -------- ---------------------------------------------- * 
* 000  04/24/00 MHS      Initial Installation.                          * 
************************************************************************* -->
<%
'Create the COM object
Dim MyObj
Set MyObj = Server.CreateObject("AuthNetSSLConnect.SSLPost")

'Create the transaction info string
Dim Login, last_name, first_name, custid, company, address, city, state
Dim zip, phone, email, invoice_num, descript, country
Dim card_num, exp_date, amount, tax, freight, purchase_order, PostData

Login = "usfion"

last_name = Request.Form("x_last_name")
first_name = Request.Form("x_first_name")
custid = Request.Form("x_cust_id")
company = Request.Form("x_company")
address = Request.Form("x_address")
city = Request.Form("x_city")
state = Request.Form("x_state")
zip = Request.Form("x_zip")
country = Request.Form("x_country")
phone = Request.Form("x_phone")
email = Request.Form("x_email")
invoice_num = Request.Form("x_invoice_num")
descript = Request.Form("x_description")
card_num = Request.Form("x_card_num")
exp_date = Request.Form("x_exp_date")
amount=Request.Form("x_amount")
tax=Request.Form("x_tax")
freight=Request.Form("x_freight")
purchase_order=Request.Form("x_po_num")
ttype = "AUTH_ONLY"

PostData = "x_Login=" & Login & ",x_ADC_URL=false,x_ADC_Delim_Data=true" 
PostData = PostData & ",x_last_name=" & last_name & ",x_first_name=" & first_name
PostData = PostData & ",x_cust_id=" & custid
PostData = PostData & ",x_company=" & company
PostData = PostData & ",x_address=" & address
PostData = PostData & ",x_city=" & city
PostData = PostData & ",x_state=" & state
PostData = PostData & ",x_zip=" & zip
PostData = PostData & ",x_phone=" & phone
PostData = PostData & ",x_email=" & email
PostData = PostData & ",x_invoice_num=" & invoice_num
PostData = PostData & ",x_description=" & descript
PostData = PostData & ",x_card_num=" & card_num
PostData = PostData & ",x_exp_date=" & exp_date
PostData = PostData & ",x_amount=" & amount
PostData = PostData & ",x_tax=" & tax
PostData = PostData & ",x_freight=" & freight
PostData = PostData & ",x_po_num=" & purchase_number

PostData = PostData & ",x_type=" & ttype

'Send the transaction info string
MyObj.doSSLPost PostData
%>

<HTML>
<HEAD>
<title>Receipt Page</title>
<SCRIPT LANGUAGE=JAVASCRIPT TYPE="TEXT/JAVASCRIPT">
<!-- Hide script for old browsers
				
  if (document.images)  {
    backhomeNormal  = new Image;
    backhomeLight   = new Image;
    backhomeNormal.src="chrome_back.gif";
    backhomeLight.src="red_back.gif";
 }
  else  {
    backhomeNormal  = "";
    backhomeLight   = "";
    document.back_home_tag   = "";
 }

// End hiding JavaScript -->
</SCRIPT>

<style type="text/css">
<!--
td{font-family:Arial; font-size: 10pt; color:#ffffff;}
input{font-family:Arial; font-size: 10pt; color:#000000;}
h1{font-family:Arial; font-size: 14pt; color:#ffffff;}
h3{font-family:Arial; font-size: 12pt; color:#ffffff;}
-->
</style>
</HEAD>
 
<BODY BACKGROUND="background.jpg" LINK="BLUE" VLINK="PURPLE" ALINK="RED">

<MAP NAME="back_home_map"><AREA SHAPE="rect" COORDS="0,0,112,28"
  HREF="usfilter_credit2.html"   onMouseover="document.back_home_tag.src=backhomeLight.src; window.status=('Go Back Home'); return true"
          onMouseout="document.back_home_tag.src=backhomeNormal.src; window.status=(''); return true"></MAP>

<TABLE border="0">
<TR>
<TD valign="top" align="left">
<IMG WIDTH="90" HEIGHT="107" SRC="logo.gif"></TD>
<TD valign="top" align="center">
<IMG WIDTH="500" HEIGHT="125" SRC="authorize logo.gif"></TD>
<TD valign="bottom" align="right">
<img SRC="chrome_back.gif" alt="Back To Form" usemap="#back_home_map" BORDER=0 height="28" width="112" name="back_home_tag"></TD>
</TR>
</TABLE>

<TABLE ALIGN="LEFT" CELLPADDING="0" CELLSPACING="0" WIDTH="100%" HEIGHT="100%" BORDER="0">

<TR BGCOLOR="#000000" HEIGHT="13"><TD ALIGN="LEFT" VALIGN="TOP"></TD></TR> 

<TR>
<TD WIDTH="100%" ALIGN="CENTER" VALIGN="TOP">

<p><p>
<div align="center">
<TABLE align="center" border="0" width="491" cellpadding="0" cellspacing="0">
<TR><TD align="left">&nbsp;<p>
<FONT SIZE="4" FACE="arial, helvetica" COLOR="#122E9C"><b>Transaction Result:</b><FONT><br><br>
<FONT SIZE="3" FACE="arial, helvetica" COLOR="RED"><b>

<%
' Check the ErrorCode to make sure that the component was able to talk to the authorization network
If MyObj.ErrorCode = 0 Then
  'Make sure that there was a delimited response
  If MyObj.NumFields > 1 Then
     ResponseCode = MyObj.GetField(1)
     ResponseReasonText = MyObj.GetField(4)
     If ResponseCode = 1 Then
       Response.Write "<h3>The transaction was approved.</h3><p>" 
       Response.Write "Your authorization code is " & MyObj.GetField(5) & "<p>"
     Else 
       if ResponseCode = 2 then
         Response.Write "The transaction was declined. <p>"
       else
         Response.Write "<h3> An error occurred for this transaction. </h3><p>"
         Response.Write "<h4>Error: " & ResponseReasonText & "</h4><p>"
       end if
     End If
  Else
    Response.Write("I am sorry but the transaction could not be approved: " & MyObj.Response )
  End If
Else
  Select Case MyObj.ErrorCode
     Case -1
       strErrorMessage = "Sorry, a connection could not be established with the authorization network.  Please try again later."
     Case -2
       strErrorMessage = "Sorry, a connection could not be established with the authorization network.  Please try again later."
     Case -3
       strErrorMessage = "Sorry, a connection could not be established with the authorization network.  Please try again later."
     Case Else
       strErrorMessage = "An error occured during processing, please contact the merchant to see whether or not your transaction was processed."
  End Select
  Response.Write(strErrorMessage)
End If

Dim code
if ResponseCode = 1 then
	code = "approved"
else
	code = "declined"
end if

if MyObj.GetField(12) = "AUTH_ONLY" or MyObj.GetField(12) = "auth_only" then
   Response.Write "<h4>This transaction was " & code & " for Authorization Only.</h4><p>"
else 
   Response.Write "<h4>This transaction was approved for Automatic Capture.</h4><p>"
end if 

if MyObj.GetField(14) <> " " or MyObj.GetField(15) <> " " then
   Response.Write "<h4>Customer Name: " & MyObj.GetField(14) & " " & MyObj.GetField(15) & "</h4><p>"
end if
%>

</b></FONT></TD></TR></TABLE>
</DIV>
</FONT>
</TD></TR>
<TR><TD WIDTH="100%" VALIGN="BOTTOM" ALIGN="CENTER"><br>
<FONT SIZE="2" FACE="arial, helvetica" COLOR="#122E9C">
<p><a href="usfilter_credit2.html">[Back]</A><p>
E-mail Help Desk: <A HREF="mailto:helpdeskpwg@usfilter.com">Help Desk</A><BR><BR></FONT>
<a href="http://www.vivendi.com" target="targetarea"><IMG SRC="vivendi.gif" WIDTH="173" HEIGHT="19" ALT="Vivendi"></a><BR><BR>
<FONT face="Arial" size="0" color="#122E9C">Copyright &#169 2001 - 2002 USFilter All Rights Reserved - Last Updated 04/24/2001
Webmaster: <A HREF="mailto:serafinm@usfilter.com">Mike Serafin</A></FONT></TD></TR>
</TABLE>

</body>
</html>

<!-- Copyright @ 2001 - 2002 USFilter All Rights Reserved -->	
