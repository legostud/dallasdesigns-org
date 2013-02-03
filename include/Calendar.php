<?php
	include("/usr/local/lib/php/Smarty/Smarty.class.php");
	$smarty = new smarty();
	
	$month = "01";
	$date = date("m\/$month\/Y");
	//$date = "11/01/2005"; //October 01, 2005
	$week_days = array("Sun"=>1, "Mon"=>2, "Tue"=>3, "Wed"=>4, "Thu"=>5, "Fri"=>6, "Sat"=>7);
	
	$total_day_of_month = get_total_day($date);
	$starting_day = $week_days[Date("D",strtotime($date))]-1;
	//header row is the name of the day (Sun, Mon, Tue ...)
	foreach (array_keys($week_days) as $day)
		$days [] = $day;
	//add blank days to the beginning of the month
	for ($i=0; $i < $starting_day; $i++)
		$days[]="&nbsp;";
	//add the days to the month
	for ($i=1; $i < ($total_day_of_month + 1); $i++)
		$days[] = $i;
	
	$title = date("F d, Y");
	$smarty->assign("title",$title);
	$smarty->assign("special_days",$days);
	$smarty->display('calendar.tpl');
	
function get_total_day($date)
{
	$time_stamp = strtotime($date);
	$month_ar = split("/", $date);
	$month = $month_ar[0];
	$year = Date("Y",$time_stamp);
	for ($i=28; $i<33; $i++)
	{
		if (!checkdate($month, $i, $year)) {
			return ($i - 1);
		}
	}
}

?>