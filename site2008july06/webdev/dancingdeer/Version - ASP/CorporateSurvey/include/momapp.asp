
<% 


	if session("storeclosed")="1" then		
		response.redirect("closed.asp")
	end if

	set sitelink=createobject("sitelnet.sitelink")	
	call sitelink.setdata(session("datapath"),cstr(request.servervariables("HTTP_USER_AGENT")))

	if session("referral")="0" then
		session("referral")=request.servervariables("HTTP_REFERER")
	end if
	
	
	
%>


<!--#INCLUDE FILE = "../text/adminPref.asp" -->
<!--#INCLUDE FILE = "../text/storetext.asp" -->
<%
  
 
  SL_BasketCount = sitelink.getdata("BASKETCOUNT",session("ordernumber"))
  SL_BasketSubTotal = sitelink.getdata("BASKETSUBTOTAL",session("ordernumber")) 
  		
%>