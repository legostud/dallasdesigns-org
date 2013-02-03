// JavaScript Document
function validate_form(thisform)
{
	var required = new Array();
	required[0] = new Array("name","Please enter your name");
	required[1] = new Array("email","Please enter your email address");
	required[2] = new Array("url","Please enter the URL of the site");
	required[3] = new Array("task_date","Please enter the completion date of the task");
	//test these as an either or statement based on selected task
	required[4] = new Array("task","Please select a task");
	required[5] = new Array("site","Please enter a description of the site");
	required[6] = new Array("change","Please enter the changes you would like to make");

	for (i = 0; i < 5; i++)
	{
		//validation based on which task selected
		if (required[i][0] == "task" )
		//if( i == 4 )
		{
			//if launch selected
			if ( thisform[required[i][0]][0].checked == true) 
			{
				i = 5;
			}
			//if re-launch selected
			else
			{
				i = 6;
			}			
		}
		if (thisform[required[i][0]].value==null||thisform[required[i][0]].value==""||thisform[required[i][0]].value==0)
		{
			thisform[required[i][0]].focus();
			alert(required[i][1]);
			return false;
		}
	}
	return true;
}
