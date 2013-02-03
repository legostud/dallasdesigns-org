<%on error resume next%>
<!--#INCLUDE file = "../include/momapp.asp" -->
<%
	' create a line of data seperated by |
	SurveyLog=cstr(REQUEST("value1"))
	SurveyLog=SurveyLog & "|" & cstr(REQUEST("value2"))
	SurveyLog=SurveyLog & "|" & cstr(REQUEST("value3"))
	SurveyLog=SurveyLog & "|" & cstr(REQUEST("value4"))
	SurveyLog=SurveyLog & "|" & cstr(REQUEST("value5"))
	SurveyLog=SurveyLog & "|" & cstr(REQUEST("value6"))
	SurveyLog=SurveyLog & "|" & cstr(REQUEST("value7"))
	SurveyLog=SurveyLog & "|" & cstr(REQUEST("customer"))	
	SurveyLog=SurveyLog & "|" & cstr(REQUEST("heard1"))
	SurveyLog=SurveyLog & "|" & cstr(REQUEST("heard2"))
	SurveyLog=SurveyLog & "|" & cstr(REQUEST("heard3"))
	SurveyLog=SurveyLog & "|" & cstr(REQUEST("heard4"))
	SurveyLog=SurveyLog & "|" & cstr(REQUEST("heard5"))
	SurveyLog=SurveyLog & "|" & cstr(REQUEST("heard6"))
	SurveyLog=SurveyLog & "|" & cstr(REQUEST("service1"))	
	SurveyLog=SurveyLog & "|" & cstr(REQUEST("service2"))	
	SurveyLog=SurveyLog & "|" & cstr(REQUEST("service3"))	
	SurveyLog=SurveyLog & "|" & cstr(REQUEST("service4"))	
	SurveyLog=SurveyLog & "|" & cstr(REQUEST("service5"))	
	SurveyLog=SurveyLog & "|" & cstr(REQUEST("feedback"))
	SurveyLog=SurveyLog & "|" & cstr(REQUEST("name"))
	SurveyLog=SurveyLog & "|" & cstr(REQUEST("company"))
	SurveyLog=SurveyLog & "|" & cstr(REQUEST("email"))
	
	' Save the data to a text file
	StrFileName = "../text/0602corporatesurvey.txt"
	StrPhysicalPath = Server.MapPath(StrFileName)
	Set fs=Server.CreateObject("Scripting.FileSystemObject")
	set ts = fs.OpenTextFile(StrPhysicalPath , 8)
	ts.write(SurveyLog)
	ts.writeline()
	ts.close
	set ts=nothing
	set fs=nothing
 	response.Redirect("../default.asp")
%>