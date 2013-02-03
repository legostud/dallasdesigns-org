<% if session("storeclosed")="1" then
		response.redirect("closed.asp")
	end if
	if session("referral")="0" then
		session("referral")=request.servervariables("HTTP_REFERER")
	end if
%>