<%on error resume next%>
<!--#INCLUDE file = "../include/momapp.asp" -->

<%	
	task = cstr(REQUEST.QUERYSTRING("task"))
	record = date & "," & time & "," & task 
	
	' Save the data to a text file
	StrFileName = "../text/jonswork.txt"
	StrPhysicalPath = Server.MapPath(StrFileName)
	Set fs=Server.CreateObject("Scripting.FileSystemObject")
	set ts = fs.OpenTextFile(StrPhysicalPath , 8)
	ts.write(record)
	ts.writeline()
	ts.close
	set ts=nothing
	set fs=nothing

	page = "jonswork.asp?task=" & task
	response.Redirect(page)
 %>