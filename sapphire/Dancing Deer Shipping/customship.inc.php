<?php
include_once (FREEPORTWAY_LIB_PATH . "ups.class.php");
include_once (FREEPORTWAY_LIB_PATH . "cart.inc.php");

define ('SHIP_FROM_ZIP', '02119');
define ('CARRIER', 'UPS');
define ('UPS_PICKUP_TIME', '2:00 PM');
define ('CARRIER_PICKUP_TIME', UPS_PICKUP_TIME);

//$from_zip = "02119";		// shipping FROM this zip code.

//UG - UPS Ground
//U2 - Second Day Air
//U1 - Next Afternoon

function CustomShip ($shopcartid, $shopcartlineid, $s_state, $s_country, $from_zip, $s_zip, $iWeight, &$ship_when, &$arrival_date, &$service, &$offerdesc, $dCombinedCost = 0.00)
{
	$ug = "UG - UPS Ground";
	$u1 = "U1 - Next Afternoon";   
	$u2 = "U2 - Second Day Air";
	
	// make sure we want to do this.
	if ($s_zip && $s_state)
	{
	
		$sameday_upcharge = 0.00; //2.95;
		
		if ($service == "ground" || $service == "")
		{
			$service = $ug;
		}
		
		$service = trim(urldecode ($service));
		// set the UPS specific service codes based on our service name.
		if ($service == "ground" || $service == $ug)
		{
			$UPSProduct = "GND";
		}		  
		if ($service == $u1)
		{
			$UPSProduct = "1DA";
		}
		if ($service == $u2)
		{
			$UPSProduct = "2DA";
		}	
	
		$upcharges = 0.00;
		$cost = 0.00;
		$akhicharges = 0.00;
		
		$akhi = array ("AK", "HI");
		if (in_array ($s_state,$akhi))
		{
			// surcharge 10.00
			$upcharges = 0.00; //10.00;
		}

		//New logic 03-28-2007 JWD
		//to do same day shipping -> remove "Fri" from non business day and change Ship_when from tomorrow to today.
		$ship_day_of_week = date ("D", strtotime("now"));  //get the day of week for today
		$isholiday = getHolidayDate( date ("Y-m-d", strtotime("now") ) );  //check if today is a holiday
		if($ship_day_of_week == "Fri" || $ship_day_of_week == "Sat" || $ship_day_of_week == "Sun" || $isholiday)
		{
			$business_day = false; //not a standard business day - no cut off time
		}
		else
		{
			$business_day = true; //standard business day - apply cutoff time
		}
		$ship_when = date ("Y-m-d", strtotime ("tomorrow"));  //ship_when is never the same day
		$keep_checking = true;
		while($keep_checking)
		{
			$ship_day_of_week = date ("D", strtotime($ship_when));  //get the day of week for ship_when
			$isholiday = getHolidayDate( date ("Y-m-d", strtotime($ship_when) ) );  //check if ship_when is a holiday
			//invalid ship dates
			if ($ship_day_of_week == "Sat" || $ship_day_of_week == "Sun" || $isholiday)
			{
				$ship_when = date ("Y-m-d", strtotime ($ship_when . " +1 days"));  //increment ship_when and check again
			}
			elseif ($business_day) 
			{
				$business_day = false;  //only check once
				//is the current time before or after the cutoff (pickup time)
				$IsPastPickupTime = IsPastPickupTime(CARRIER, CARRIER_PICKUP_TIME);
				if ($IsPastPickupTime)
				{
					$ship_when = date ("Y-m-d", strtotime ($ship_when . " +1 days"));  	
				}
				else
				{
					$keep_checking = false;
				}
			}
			else
			{
				$keep_checking = false;
			}
		}
					
		//JWD //Sameday from Friday to Monday 2pm (added to test weekend sales)
		//$ship_when = date ("Y-m-d", strtotime('2007-03-26'));										
				

// JWD - old logic		
		//JWD if the order is past the cutoff add a day to the $ship_when date
		//$IsPastPickupTime = IsPastPickupTime(CARRIER, CARRIER_PICKUP_TIME);
		//if ($IsPastPickupTime)
		//{
//			$ship_when = date ("Y-m-d", strtotime ($ship_when . " +1 days"));  	
//		}
//		if ( getHolidayDate( date ("Y-m-d", strtotime($ship_when) ) ) ) //quick fix for Thanksgiving
//		{
//			$ship_when = date ("Y-m-d", strtotime ($ship_when . " +2 days"));  
//		}
//
		//JWD - Is the ship_when a holiday or a weekend
		//Check for weekends
//		$ship_day_of_week = date ("D", strtotime($ship_when));  //JWD - Saturday change to Monday
//		if ($ship_day_of_week == "Sat")
//		{
//			$ship_when = date ("Y-m-d", strtotime ($ship_when . " +2 days"));
//		}
//		else if ($ship_day_of_week == "Sun")  //JWD - Sunday - Change to Tuesday or Wednesday
//		{
//			$ship_when = date ("Y-m-d", strtotime ($ship_when . " +1 days"));
			//JWD - is Monday a holiday
//			if ( getHolidayDate( date ("Y-m-d", strtotime($ship_when) ) ) )
//			{
//				$ship_when = date ("Y-m-d", strtotime ($ship_when . " +2 days"));  //Wednesday
//			}
//			else
//			{
//				$ship_when = date ("Y-m-d", strtotime ($ship_when . " +1 days"));  //Tuesday
//			}
//		}
		//Check for holidays 
//		while ( getHolidayDate( date ("Y-m-d", strtotime($ship_when) ) ) ) 
//		{
//			$ship_when = date ("Y-m-d", strtotime ($ship_when . " +1 days"));
//		}
		
/////////////////////////////////////////////////////////////////////////////////////////////////////////////	
		// no arrival date, lets get one.
		if ($arrival_date == "" || $arrival_date == "ASAP")
		{
			//JWD - set the arrival date as the same as the ship_when date
			$arrival_date = $ship_when;
			
			//JWD - set the initial arrival date. 		
			if ($service == $u2)
			{
				$arrival_date = date ("Y-m-d", strtotime ($ship_when . " +2 days"));					
			}
			
			if ($service == $u1)
			{
				$arrival_date = date ("Y-m-d", strtotime ($ship_when . " +1 days"));
			}
			if ($service == $ug)
			{
				// get the transit time.
				$time_in_transit = GetTimeInTransitDefault (CARRIER, $s_state);
				$arrival_date = date ("Y-m-d", strtotime ($ship_when . " +" . $time_in_transit . " days"));
			}
			
			//JWD - Check for weekends and holidays
			$ship_when_save = $ship_when;
			while(strtotime($ship_when_save) <= strtotime($arrival_date)) {
				$ship_day_of_week = date ("D", strtotime($ship_when_save));  //JWD - find the day of week 
				if ($ship_day_of_week == "Sat" || $ship_day_of_week == "Sun")  //JWD - If it is a weekend
				{
					$arrival_date = date ("Y-m-d", strtotime($arrival_date . " +1 days"));  //JWD - add a day to the arrival date
				}
				else if ( getHolidayDate( date ("Y-m-d", strtotime($ship_when_save) ) ) )
				{
					$arrival_date = date ("Y-m-d", strtotime($arrival_date . " +1 days"));  //JWD - add a day to the arrival date
				}
				$ship_when_save = date ("Y-m-d", strtotime ($ship_when_save . " +1 days"));  //JWD - increment and check again
			}
			

//////////////////////////////////////////////////////////////////////////////////////			
		} else {  ///// Arrival date was choosen
		
			//JWD - save the current ship_when date since it is the earliest possible date.
			$ship_when_save = $ship_when;  //JWD

			//JWD set the initial arrival date.
			if ($service == $u2)
			{
				$ship_when_save = date ("Y-m-d", strtotime ($arrival_date . " -2 days"));
			}
			if ($service == $u1)
			{
				$ship_when_save = date ("Y-m-d", strtotime ($arrival_date . " -1 days"));
			}
			if ($service == $ug)
			{
				// get the transit time.
				$time_in_transit = GetTimeInTransitDefault (CARRIER, $s_state);
				$ship_when_save = date ("Y-m-d", strtotime ($arrival_date . " -" . $time_in_transit . " days"));
			}
			
			//JWD - Check for weekends and holidays
			$arrival_date_save = $arrival_date;
			while(strtotime($ship_when_save) <= strtotime($arrival_date_save)) {
				$ship_day_of_week = date ("D", strtotime($arrival_date_save));  //JWD - find the day of week 
				if ($ship_day_of_week == "Sat" || $ship_day_of_week == "Sun")  //JWD - If it is a weekend
				{
					$ship_when_save = date ("Y-m-d", strtotime($ship_when_save . " -1 days"));  //JWD - subtract a day from the ship_when_save
				}
				else if (getHolidayDate( date ("Y-m-d", strtotime($arrival_date_save) ) ) )
				{
					$ship_when_save = date ("Y-m-d", strtotime($ship_when_save . " -1 days"));  //JWD - subtract a day from the ship_when_save
				}
				$arrival_date_save = date ("Y-m-d", strtotime ($arrival_date_save . " -1 days"));  //JWD - decrement and check again
			}

			//JWD - is the ship_when date too early
			if (strtotime($ship_when_save) < strtotime ($ship_when))
			{
				$service = "";
				$ship_when = "";
			}
			else
			{
				$ship_when = $ship_when_save;
			}
		}
	
////////////////////////////////////////////////////////////////////////////////////
	// Check to see if this package is shipping today.
	
		if (!$IsPastPickupTime)
		{ 
			 $upcharges = $upcharges + $sameday_upcharge;
		} 
		
		// alaska hi upcharges.
		$upcharges += $akhicharges;


		// gjm: 08-23-06
		// ignore cost, but make sure we do the shipping method adjustment check.
		// product specific shipping adjustment.		
		$cost = ProductShippingAdjustment ($shopcartlineid, $shopcartid, $time_in_transit, $service);
		if ($dCombinedCost > 0.01)
		{
			// use the cost of the combined cost instread.
			$cost = $dCombinedCost;
		}
		$quote = 0;
	
/*				
		$rate = new Ups;
		$rate->upsProduct($UPSProduct);   // See upsProduct() function for codes
		$rate->origin($from_zip, "US"); // Use ISO country codes!
		$rate->dest($s_zip, "US");   // Use ISO country codes!
		$rate->rate("RDP");     // See the rate() function for codes
		$rate->container("CP"); // See the container() function for codes
		$rate->weight($iWeight);
		$rate->rescom("RES");   // See the rescom() function for codes
		$quote = $rate->getQuote();
*/		
	
	
/* Rate table
		                  UG	   U2	      U1
 $0.01 	     $20.00 	 $5.95 	 $9.95 	     $19.95 
 $20.01 	 $24.94 	 $7.95 	 $11.95 	 $21.95 
 $24.95 	 $30.00 	 $7.95 	 $11.95 	 $21.95 
 $30.01 	 $50.00 	 $9.50 	 $14.95 	 $24.95 
 $50.01 	 $100.00 	 $9.95 	 $16.95 	 $26.95 
 $100.01 	 No max 	10% of order	17% of order	25% of order

*/	

		if ($cost > 0 && $cost < 20.00)
		{
			if ($ug == $service)
			{
				$quote = 5.95;
			}
			if ($u2 == $service)
			{
				$quote = 9.95;
			}
			if ($u1 == $service)
			{
				$quote = 19.95;
			}
		}
		if ($cost >= 20.01 && $cost <= 24.94)
		{
	
			if ($ug == $service)
			{
				$quote = 7.95;
			}
			if ($u2 == $service)
			{
				$quote = 11.95;
			}
			if ($u1 == $service)
			{
				$quote = 21.95;
			}			
		}
		if ($cost >= 24.95 && $cost <= 30.00)
		{	
					
			if ($ug == $service)
			{
				$quote = 7.95;
			}
			if ($u2 == $service)
			{
				$quote = 11.95;
			}
			if ($u1 == $service)
			{
				$quote = 21.95;
			}			
			
		}
		if ($cost >= 30.01 && $cost <= 50.00)
		{
			if ($ug == $service)
			{
				$quote = 9.50;
			}
			if ($u2 == $service)
			{
				$quote = 14.95;
			}
			if ($u1 == $service)
			{
				$quote = 24.95;
			}			
			
		}
		if ($cost >= 50.01 && $cost <= 100.00)
		{
			if ($ug == $service)
			{
				$quote = 9.95;
			}
			if ($u2 == $service)
			{
				$quote = 16.95;
			}
			if ($u1 == $service)
			{
				$quote = 26.95;
			}			
			
		}
		if ($cost >= 100.01)
		{
			if ($ug == $service)
			{
				$quote = ($cost*0.10);
			}
			if ($u2 == $service)
			{
				$quote = ($cost*0.17);
			}
			if ($u1 == $service)
			{
				$quote = ($cost*0.27);
			}
		}
		if ( ($ug == $service) && ($promocode == "PENNYSHIP"))
		{
			$quote = 0.00;
		}
		// catalog id is only used for free item discounts.
		RedeemOffer ($shopcartid, $catalogid, $offerdesc, $discount, $dollardiscount, $shipdiscountpct);
		
		if ($shipdiscountpct > 0)
		{
			$quote = ($quote-($quote*$shipdiscountpct/100));
		} 
		$quote += $upcharges;
		$dShipping = $quote;
		//print ("service: " . $service . "|ship_when: " . $ship_when . "<br>");	
		return $dShipping;
	} else {
		return -1;
	}
}

//JWD check if date falls on a holiday
function getHolidayDate( $date ) {
//   $holiday = array();
   $year = date ("Y", strtotime($date));
    
   // First off, the simple ones
   if ($date == date( 'Y-m-d', strtotime($year . '-12-31'))) //New Year's Eve
   { return true; }
   if ($date == date( 'Y-m-d', strtotime($year . '-01-01'))) //New Year's Day
   { return true; }
   if ($date == date( 'Y-m-d', strtotime($year . '-07-04'))) //Independence Day
   { return true; }
   if ($date == date( 'Y-m-d', strtotime($year . '-12-25'))) //Christmas
   { return true; }

   //test
   //if ($date == date( 'Y-m-d', strtotime($year . '-06-04'))) //test
   //{ return true; }
	
  
   // and now, the more complex ones

   // Easter
   // the Sunday after the first full moon which falls on or after the Spring Equinox
   // thank god PHP has a function for that...
   if ($date == date( 'Y-m-d', easter_date( $year ) + 43200 ))
   { return true; }
     
   // Memorial Day
   // last Monday in May
   if ($date == date( 'Y-m-d', strtotime( '-1 week monday', strtotime( "June 1, $year" ) ) + 43200 ))
   { 
   		return true; 
   }
  
   // Labor Day
   // first Monday in September
   if ($date == date( 'Y-m-d', strtotime( 'monday', strtotime( "September 1, $year" ) ) + 43200 ))
    { 
		return true; 
	}
 
   // Thanksgiving
   // fourth Thursday in November
   if ($date == date( 'Y-m-d', strtotime( '3 weeks thursday', strtotime( "November 1, $year" ) ) + 43200 ))
   { return true; }
  
    // Day after Thanksgiving
   if ($date == date( 'Y-m-d', strtotime( '3 weeks friday', strtotime( "November 1, $year" ) ) + 43200 ))
   { return true; }
 
    return false;
}


function IsPastPickupTime($carrier, $time)
{
	if ($carrier == 'UPS')
	{
	// cutoff time.
	  $cutofftime = strtotime("today " . $time);
	  $now = strtotime ("now");
	  if ( $now >= $cutofftime ) //&& strtotime("now") <= $endtime )
	  {	
		return true;
	 } else { 
		return false;
	  }

	 } else {
		die ("ERROR: Carrier not supported.");
	 }
}  



function IsDateOnWeekend (&$date, $adjust_forward = true)
{
	$ship_days = 0;
				
	$ship_day_of_week = date ("D", strtotime($date));
	if ($ship_day_of_week == "Sat") 
	{
		if ($adjust_forward)
		{	
			$ship_days = 2;
		} else {
			$ship_days = 1;
		}
	}
	if ($ship_day_of_week == "Sun") 
	{
		if ($adjust_forward)
		{	
			$ship_days = 1;
		} else {
			$ship_days = 2;
		}
	}
		
	if ($ship_days > 0 )
	{
		if ($adjust_forward)
		{
			$date = date ("Y-m-d", strtotime($date . " +" . $ship_days . " days"));
		} else {
			$date = date ("Y-m-d", strtotime($date . " -" . $ship_days . " days"));
		}
	}
  	return $ship_days;
}


function IsDateOnHoliday (&$date, $adjustby = 1, $adjust_forward = true)
{
	$bHoliday = false;
	
    $year = date ("Y", strtotime($date));   
    // check for a holiday as an arrival.
    $holidays = getHolidays( $year );
	foreach ($holidays as $key=>$value)
	{
		$holiday_dates[$i] = $key;
		$i++;
	}
	if (in_array ($date, $holiday_dates))
	{
		if ($adjust_forward)
		{
			$date = date ("Y-m-d", strtotime($date . " +" . $adjustby . " days"));
		} else {
			$date = date ("Y-m-d", strtotime($date . " -" . $adjustby . " days"));
		}
		$bHoliday = true;
	} else {
		$bHoliday = false;
	}  	
	return $bHoliday;
}

function GetNextAvailableValidDate (&$date, $service)
{
	$ug = "UPS Ground";
	$u1 = "UPS Next Day Air";   
	$u2 = "UPS 2nd Day Air";

	$bWeekend = false;
	$bHoliday = false;
	while (1)
	{
		// does the date fall on a weekend day, if so, adjust.
		$days = 0;
		$ship_day_of_week = date ("D", strtotime($date));
		if ($ship_day_of_week == "Sat") 
		{
			$days = 1;
		}
		if ($ship_day_of_week == "Sun") 
		{
			$days = 2;
		}
			
		if ($days > 0 )
		{
	
//			if ($service == $u1)
//				$days += 1;
//				
			if ($service == $u2)			
				$days += 1;
								
			$date = date ("Y-m-d", strtotime($date . " -" . $days . " days"));
				
			$bWeekend = true;
		} else {
			$bWeekend = false;
		}
		
		// is the arrival_date on a holiday? If so, adjust back.
		$year = date ("Y", strtotime($date));   
		// check for a holiday as an arrival.
		$holidays = getHolidays( $year );
		foreach ($holidays as $key=>$value)
		{
			$holiday_dates[$i] = $key;
			$i++;
		}
		if (in_array ($date, $holiday_dates))
		{
			$date = date ("Y-m-d", strtotime($date . " -1 days"));
			$bHoliday = true;
		} else {
			$bHoliday = false;
		}					
		
		if (!$bWeekend && !$bHoliday)
		{
			break;
		}
		
	}

	return $date;
}



///////////////////////////////////////////////////////////////////////////////////////////////
// AdjustDate 
///////////////////////////////////////////////////////////////////////////////////////////////
function AdjustDate (&$arrival_date, &$ship_date, $service, $time_in_transit, $asap = false)
{
	$days = 0;
	$ship_days = 0;
	$day = "";
	
	$ug = "UPS Ground";
	$u1 = "UPS Next Day Air";   
	$u2 = "UPS 2nd Day Air"; 
		
		
	$bHoliday = false;
	$bWeekend = false;
	$bAdjusted = false;
	
	$todays_date = date ("Y-m-d", strtotime ("now"));	
	
		
	$IsPastPickupTime = IsPastPickupTime(CARRIER, CARRIER_PICKUP_TIME);
	
	$i=0;


	////////////////////////////////////////////////////////////////////////////////////
	// Adjust arrival_date
	////////////////////////////////////////////////////////////////////////////////////
	if ($asap)
	{
		while (1)
		{
	
			$bWeekend = IsDateOnWeekend ($arrival_date);
			$bHoliday = IsDateOnHoliday ($arrival_date, 1, true, $asap);
		
			
			if (!$bHoliday && !$bWeekend && !$bAdjusted)
			{
				break;
			}
			
			$day = "";
			$days = 0;
			
			$bHoliday = false;
			$bWeekend = false;
			$bAdjusted = false;
	
			// safety valve
			if ($i==356)
			{
				break;
			}
			$i++;
					
		}
	}
	
	
 // reset.
 	
	$bHoliday = false;
	$bWeekend = false;
	$bAdjusted = false;	
	$i=0;

	////////////////////////////////////////////////////////////////////////////////////
	// Adjust ship_date
	////////////////////////////////////////////////////////////////////////////////////	
	while (1)
	{
		// if we're passing a ship_date thats empty, lets initialize one	
		if ($asap)
		{
			if ($ship_date == "")
			{
				$ship_date = $todays_date;
				$bAdjusted = true;
			}
	
			// past ship cutoff time and we're an asap, not on the weekend.
		
			if ($IsPastPickupTime)
			{
				AdjustDateByDays ($ship_date, 1, true);
			}
	
			if ($service == $ug)
			{
				$todays_date = date ("Y-m-d", strtotime ("today"));
				$weekend_days = count_weekend_days (strtotime($todays_date), strtotime($arrival_date));
				
				
				$days = $holiday_days + $weekend_days + $time_in_transit;
								
				$ship_date = date ("Y-m-d", strtotime($arrival_date . " -" . $days . " days"));							
			}
			if ($service == $u1)
			{		
				$ship_date = date ("Y-m-d", strtotime($arrival_date . " -1 days"));		
			} 
			if ($service == $u2)
			{
				$ship_date = date ("Y-m-d", strtotime($arrival_date . " -2 days"));			
			}
			
			$bHoliday = IsDateOnHoliday ($ship_date, 1, true, true);
			$bWeekend = IsDateOnWeekend ($ship_date);
	
		} else {
		

			if ($IsPastPickupTime  && (strtotime ($ship_date) == strtotime ($todays_date)))
			{
				$ship_date = date ("Y-m-d", strtotime($ship_date . " +1 days"));
			}
			
			if ($service == $ug)  // adjust for ground.
			{
				$days = $time_in_transit; // always count the current day as a shipping day.
				if (strtotime($ship_date) > strtotime($todays_date))
				{							
					$ship_date = date ("Y-m-d", strtotime($ship_date . " -" . $days . " days"));
				}
			}

			if ($service == $u2)  // adjust for 2nd day.
			{
				$days = 2; // always count the current day as a shipping day.							
				if (strtotime($ship_date) > strtotime($todays_date))
				{							
					$ship_date = date ("Y-m-d", strtotime($ship_date . " -" . $days . " days"));
				}
			}


			if ($service == $u1)  // adjust for overnight.
			{
				$days = 1; // always count the current day as a shipping day.
				if (strtotime($ship_date) > strtotime($todays_date))
				{							
					$ship_date = date ("Y-m-d", strtotime($ship_date . " -" . $days . " days"));
				}
			}
			
			$bHoliday = IsDateOnHoliday ($ship_date, 1, false, true);			
			$bWeekend = IsDateOnWeekend ($ship_date, $service);	

		}		

		if (!$bHoliday && !$bWeekend)
		{
			break;
		}
		if ($i==356)
		{
			break;
		}

		$i++;
	} 

	
}

// given a time, give back the amount of days
function count_days ($start_date, $end_date)
{
   $days = 0;
   while($start_date < $end_date)
   {
       $start_date = strtotime(date("Y-m-d", $start_date) . " +1 days");
	   $days++;
	   	   
	}
	return $days;
}



// given a time, give back the amount of days
function count_holiday_days ($start_date, $end_date)
{
   $days = 1;
   $today = strtotime (date ("Y-m-d"));
   while($start_date <= $end_date)
   {	
		$year = date ("Y", strtotime($start_date));   
		// check for a holiday as an arrival.
		$holidays = getHolidays( $year );
		foreach ($holidays as $key=>$value)
		{
			$holiday_dates[$i] = $key;
			$i++;
		}
		if (in_array ($start_date, $holiday_dates))
		{
			$days++;
		}  	
		$start_date = strtotime(date("Y-m-d", $start_date) . " + 1 days");
	}
	return $days;
}

// given a time, give back the amount of weekend days that are 
// between the dates.
function count_weekend_days ($start_date, $end_date)
{
   $weekend_days = 0;

   while($start_date <= $end_date)
   {
		$day_of_week = date ("D", $start_date);
				
		if ($day_of_week == "Sat" || $day_of_week == "Sun")
		{
		   $weekend_days++;
		}
	
		$start_date = strtotime(date("Y-m-d", $start_date) . " + 1 days");
	}
	return $weekend_days;
}


/* Function  : getHolidays()
** Parameters :
**    $year -- the year in question
** Return    : an associative array containing the holidays occuring in the given year
**    they key is a date stamp of the form Y-m-d, the value is the name of the corresponding holiday
*/
function getHolidays( $year ) {
   $return = array();
  
  
   // First off, the simple ones
  
   $return[$year . '-01-01'] = 'New Year`s Day';
   $return[$year . '-01-02'] = 'New Year`s Day After';
   $return[$year . '-02-14'] = 'Valentine`s Day';
   $return[$year . '-06-14'] = 'Flag Day';
   $return[$year . '-07-04'] = 'Independence Day';
   $return[$year . '-11-11'] = 'Veteran`s Day';
   $return[$year . '-12-25'] = 'Christmas';
   $return[$year . '-12-26'] = 'Christmas Day After';   
  
  
   // and now, the more complex ones
  
   // Martin Luther King, Jr. Day
   // third Monday in January
   $return[date( 'Y-m-d', strtotime( '2 weeks monday', strtotime( "January 1, $year" ) ) + 43200 )] = 'Martin Luther King, Jr. Day';
  
   // Presidents` Day
   // third Monday in February
   $return[date( 'Y-m-d', strtotime( '2 weeks monday', strtotime( "February 1, $year" ) ) + 43200 )] = 'Presidents` Day';
  
   // Mardi Gras
   // Tuesday ~47 days before Easter
   $return[date( 'Y-m-d', strtotime( 'last tuesday 46 days ago', easter_date( $year ) ) + 43200 )] = 'Mardi Gras';
  
   // Easter
   // the Sunday after the first full moon which falls on or after the Spring Equinox
   // thank god PHP has a function for that...
   $return[date( 'Y-m-d', easter_date( $year ) + 43200 )] = 'Easter';
  
   // Memorial Day
   // last Monday in May
   $return[date( 'Y-m-d', strtotime( '-1 week monday', strtotime( "June 1, $year" ) ) + 43200 )] = 'Memorial Day';
  
   // Labor Day
   // first Monday in September
   $return[date( 'Y-m-d', strtotime( 'monday', strtotime( "September 1, $year" ) ) + 43200 )] = 'Labor Day';
  
   // Columbus Day
   // second Monday in October
   $return[date( 'Y-m-d', strtotime( '1 week monday', strtotime( "October 1, $year" ) ) + 43200 )] = 'Columbus Day';
  
   // Thanksgiving
   // fourth Thursday in November
   $return[date( 'Y-m-d', strtotime( '3 weeks thursday', strtotime( "November 1, $year" ) ) + 43200 )] = 'Thanksgiving';
  
    // Day after Thanksgiving
   $return[date( 'Y-m-d', strtotime( '3 weeks friday', strtotime( "November 1, $year" ) ) + 43200 )] = 'Day after Thanksgiving';
 
  
   ksort( $return );
   return $return;
}


function ProductShippingAdjustment ($shopcartlineid, $shopcartid, $time_in_transit, &$service)
{
	$ug = "UG - UPS Ground";
	$u1 = "U1 - Next Afternoon";   
	$u2 = "U2 - Second Day Air";
	
	if ($shopcartlineid != "")
	{
		$cartline = GetCartline ($shopcartlineid);
		$itemid = $cartline[0]['itemid_fk'];
		$price = $cartline[0]['priceeach'];
		$quantity = $cartline[0]['quantity'];
		
		$cost = (double)ExtractDoubleFromMoney($price);
		$cost = $cost * $quantity;
		$sql = "select vendoritemid from items where itemid = "  . $itemid;
		$rs = ExecuteSelect ($sql);
		$cake = substr ($rs[0]['vendoritemid'], 0, 2);
		if ($cake === "CA")
		{
			if ($service == $ug && $time_in_transit > 2)
			{
				// ground service not allowed for cakes.'
				$service = "";
			}
		}
		return $cost;
	}
}


function GetTimeInTransitDefault ($carrier, $s_state)
{

	$time_in_transit = 0;

   if ($carrier == 'UPS')
   {
   
   	   $max_ground_transit = 5;
	//   $ZoneCharges = array ("AK", "HI");   
	//   $ZoneCharges2 = array ("BC","AB","MB","NB","NS","NT","PE","NF","QC","SK","YT","ON"); 
	
	//JWD - updated 03/16/2006
	   $day1 = array ("CT","MA","ME","NH","NY","RI","VT");
	   $day2 = array ("DC","DE","IN","KY","MD","NC","NJ","OH","PA","SC","VA","WV");
	   $day3 = array ("AL","FL","GA","IA","IL","MI","MN","MO","TN","WI");
	   $day4 = array ("AR","KS","LA","MS","ND","NE","OK","SD");                       
	   $day5 = array ("AK","AZ","CA","CO","HI","ID","MT","NM","NV","OR","TX","UT","WA","WY");
	
	   $days = 1;
	// based on ground service, how many days will it take to get this product to the customer
	   if (in_array ($s_state, $day1))
	   {
		   $time_in_transit = 1;
	   }
	   if (in_array ($s_state, $day2))
		   $time_in_transit = 2;
	  
	   if (in_array ($s_state, $day3))
		   $time_in_transit = 3;
	
	   if (in_array ($s_state, $day4))
		   $time_in_transit = 4;
	
	   if (in_array ($s_state, $day5))
		   $time_in_transit = $max_ground_transit;   
	}
	
	if ($carrier == USPS)
	{
		die ("ERROR: Carrier unsupported.");
	}

	if ($carrier == FEDEX)
	{
		die ("ERROR: Carrier unsupported.");
	}
	return $time_in_transit;
	
}


function AdjustDateByDays (&$date, $adjustby, $adjust_forward = true)
{
	if ($adjust_forward)
	{
		$newdate = $date . " +" . $adjustby . " days";
	} else {
		$newdate = $date . " -" . $adjustby . " days";
	}
	$date = date ("Y-m-d", strtotime ($newdate));
	
	return true;
}



?>