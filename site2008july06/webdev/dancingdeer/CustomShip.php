<?php echo "<?xml version=\"1.0\" encoding=\"iso-8859-1\"?".">"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Custom Ship :: Dallas Designs</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<style>
#menu
{
	height: 168px;
}
#message
{
	font-weight: bold;
	width: 700px;
}
#code
{
	width: 100%;
}
</style>
</head>

<body background="../../images/parchment.gif">
<div id="menu">
<?php include("../../templates/Top.html"); ?>
<?php include("../include/TopSubMenu.php"); ?>  
</div>
<div id="message">
  <p>Below is the code used by Dancing Deer's second site to calculate the ship 
    date and arrival of a customers order.</p>
  </div><br>
<div id="code"> 
  <p>&lt;?php<br />
    include_once (FREEPORTWAY_LIB_PATH . &quot;ups.class.php&quot;);<br />
    include_once (FREEPORTWAY_LIB_PATH . &quot;cart.inc.php&quot;);</p>
  <p>define ('SHIP_FROM_ZIP', '02119');<br />
    define ('CARRIER', 'UPS');<br />
    define ('UPS_PICKUP_TIME', '2:00 PM');<br />
    define ('CARRIER_PICKUP_TIME', UPS_PICKUP_TIME);</p>
  <p>//$from_zip = &quot;02119&quot;; // shipping FROM this zip code.</p>
  <p>//UG - UPS Ground<br />
    //U2 - Second Day Air<br />
    //U1 - Next Afternoon</p>
  <p>function CustomShip ($shopcartid, $shopcartlineid, $s_state, $s_country, 
    $from_zip, $s_zip, $iWeight, &amp;$ship_when, &amp;$arrival_date, &amp;$service, 
    &amp;$offerdesc, $dCombinedCost = 0.00)<br />
    {<br />
    $ug = &quot;UG - UPS Ground&quot;;<br />
    $u1 = &quot;U1 - Next Afternoon&quot;; <br />
    $u2 = &quot;U2 - Second Day Air&quot;;<br />
    <br />
    // make sure we want to do this.<br />
    if ($s_zip &amp;&amp; $s_state)<br />
    {<br />
    <br />
    $sameday_upcharge = 0.00; //2.95;<br />
    <br />
    if ($service == &quot;ground&quot; || $service == &quot;&quot;)<br />
    {<br />
    $service = $ug;<br />
    }<br />
    <br />
    $service = trim(urldecode ($service));<br />
    // set the UPS specific service codes based on our service name.<br />
    if ($service == &quot;ground&quot; || $service == $ug)<br />
    {<br />
    $UPSProduct = &quot;GND&quot;;<br />
    } <br />
    if ($service == $u1)<br />
    {<br />
    $UPSProduct = &quot;1DA&quot;;<br />
    }<br />
    if ($service == $u2)<br />
    {<br />
    $UPSProduct = &quot;2DA&quot;;<br />
    } <br />
    <br />
    $upcharges = 0.00;<br />
    $cost = 0.00;<br />
    $akhicharges = 0.00;<br />
    <br />
    $akhi = array (&quot;AK&quot;, &quot;HI&quot;);<br />
    if (in_array ($s_state,$akhi))<br />
    {<br />
    // surcharge 10.00<br />
    $upcharges = 0.00; //10.00;<br />
    }</p>
  <p> //New logic 03-28-2007 JWD<br />
    //to do same day shipping -&gt; remove &quot;Fri&quot; from non business day 
    and change Ship_when from tomorrow to today.<br />
    $ship_day_of_week = date (&quot;D&quot;, strtotime(&quot;now&quot;)); //get 
    the day of week for today<br />
    $isholiday = getHolidayDate( date (&quot;Y-m-d&quot;, strtotime(&quot;now&quot;) 
    ) ); //check if today is a holiday<br />
    if($ship_day_of_week == &quot;Fri&quot; || $ship_day_of_week == &quot;Sat&quot; 
    || $ship_day_of_week == &quot;Sun&quot; || $isholiday)<br />
    {<br />
    $business_day = false; //not a standard business day - no cut off time<br />
    }<br />
    else<br />
    {<br />
    $business_day = true; //standard business day - apply cutoff time<br />
    }<br />
    $ship_when = date (&quot;Y-m-d&quot;, strtotime (&quot;tomorrow&quot;)); //ship_when 
    is never the same day<br />
    $keep_checking = true;<br />
    while($keep_checking)<br />
    {<br />
    $ship_day_of_week = date (&quot;D&quot;, strtotime($ship_when)); //get the 
    day of week for ship_when<br />
    $isholiday = getHolidayDate( date (&quot;Y-m-d&quot;, strtotime($ship_when) 
    ) ); //check if ship_when is a holiday<br />
    //invalid ship dates<br />
    if ($ship_day_of_week == &quot;Sat&quot; || $ship_day_of_week == &quot;Sun&quot; 
    || $isholiday)<br />
    {<br />
    $ship_when = date (&quot;Y-m-d&quot;, strtotime ($ship_when . &quot; +1 days&quot;)); 
    //increment ship_when and check again<br />
    }<br />
    elseif ($business_day) <br />
    {<br />
    $business_day = false; //only check once<br />
    //is the current time before or after the cutoff (pickup time)<br />
    $IsPastPickupTime = IsPastPickupTime(CARRIER, CARRIER_PICKUP_TIME);<br />
    if ($IsPastPickupTime)<br />
    {<br />
    $ship_when = date (&quot;Y-m-d&quot;, strtotime ($ship_when . &quot; +1 days&quot;)); 
    <br />
    }<br />
    else<br />
    {<br />
    $keep_checking = false;<br />
    }<br />
    }<br />
    else<br />
    {<br />
    $keep_checking = false;<br />
    }<br />
    }<br />
    <br />
    //JWD //Sameday from Friday to Monday 2pm (added to test weekend sales)<br />
    //$ship_when = date (&quot;Y-m-d&quot;, strtotime('2007-03-26')); <br />
  </p>
  <p>// JWD - old logic <br />
    //JWD if the order is past the cutoff add a day to the $ship_when date<br />
    //$IsPastPickupTime = IsPastPickupTime(CARRIER, CARRIER_PICKUP_TIME);<br />
    //if ($IsPastPickupTime)<br />
    //{<br />
    // $ship_when = date (&quot;Y-m-d&quot;, strtotime ($ship_when . &quot; +1 
    days&quot;)); <br />
    // }<br />
    // if ( getHolidayDate( date (&quot;Y-m-d&quot;, strtotime($ship_when) ) ) 
    ) //quick fix for Thanksgiving<br />
    // {<br />
    // $ship_when = date (&quot;Y-m-d&quot;, strtotime ($ship_when . &quot; +2 
    days&quot;)); <br />
    // }<br />
    //<br />
    //JWD - Is the ship_when a holiday or a weekend<br />
    //Check for weekends<br />
    // $ship_day_of_week = date (&quot;D&quot;, strtotime($ship_when)); //JWD 
    - Saturday change to Monday<br />
    // if ($ship_day_of_week == &quot;Sat&quot;)<br />
    // {<br />
    // $ship_when = date (&quot;Y-m-d&quot;, strtotime ($ship_when . &quot; +2 
    days&quot;));<br />
    // }<br />
    // else if ($ship_day_of_week == &quot;Sun&quot;) //JWD - Sunday - Change 
    to Tuesday or Wednesday<br />
    // {<br />
    // $ship_when = date (&quot;Y-m-d&quot;, strtotime ($ship_when . &quot; +1 
    days&quot;));<br />
    //JWD - is Monday a holiday<br />
    // if ( getHolidayDate( date (&quot;Y-m-d&quot;, strtotime($ship_when) ) ) 
    )<br />
    // {<br />
    // $ship_when = date (&quot;Y-m-d&quot;, strtotime ($ship_when . &quot; +2 
    days&quot;)); //Wednesday<br />
    // }<br />
    // else<br />
    // {<br />
    // $ship_when = date (&quot;Y-m-d&quot;, strtotime ($ship_when . &quot; +1 
    days&quot;)); //Tuesday<br />
    // }<br />
    // }<br />
    //Check for holidays <br />
    // while ( getHolidayDate( date (&quot;Y-m-d&quot;, strtotime($ship_when) 
    ) ) ) <br />
    // {<br />
    // $ship_when = date (&quot;Y-m-d&quot;, strtotime ($ship_when . &quot; +1 
    days&quot;));<br />
    // }<br />
    <br />
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////	
    <br />
    // no arrival date, lets get one.<br />
    if ($arrival_date == &quot;&quot; || $arrival_date == &quot;ASAP&quot;)<br />
    {<br />
    //JWD - set the arrival date as the same as the ship_when date<br />
    $arrival_date = $ship_when;<br />
    <br />
    //JWD - set the initial arrival date. <br />
    if ($service == $u2)<br />
    {<br />
    $arrival_date = date (&quot;Y-m-d&quot;, strtotime ($ship_when . &quot; +2 
    days&quot;)); <br />
    }<br />
    <br />
    if ($service == $u1)<br />
    {<br />
    $arrival_date = date (&quot;Y-m-d&quot;, strtotime ($ship_when . &quot; +1 
    days&quot;));<br />
    }<br />
    if ($service == $ug)<br />
    {<br />
    // get the transit time.<br />
    $time_in_transit = GetTimeInTransitDefault (CARRIER, $s_state);<br />
    $arrival_date = date (&quot;Y-m-d&quot;, strtotime ($ship_when . &quot; +&quot; 
    . $time_in_transit . &quot; days&quot;));<br />
    }<br />
    <br />
    //JWD - Check for weekends and holidays<br />
    $ship_when_save = $ship_when;<br />
    while(strtotime($ship_when_save) &lt;= strtotime($arrival_date)) {<br />
    $ship_day_of_week = date (&quot;D&quot;, strtotime($ship_when_save)); //JWD 
    - find the day of week <br />
    if ($ship_day_of_week == &quot;Sat&quot; || $ship_day_of_week == &quot;Sun&quot;) 
    //JWD - If it is a weekend<br />
    {<br />
    $arrival_date = date (&quot;Y-m-d&quot;, strtotime($arrival_date . &quot; 
    +1 days&quot;)); //JWD - add a day to the arrival date<br />
    }<br />
    else if ( getHolidayDate( date (&quot;Y-m-d&quot;, strtotime($ship_when_save) 
    ) ) )<br />
    {<br />
    $arrival_date = date (&quot;Y-m-d&quot;, strtotime($arrival_date . &quot; 
    +1 days&quot;)); //JWD - add a day to the arrival date<br />
    }<br />
    $ship_when_save = date (&quot;Y-m-d&quot;, strtotime ($ship_when_save . &quot; 
    +1 days&quot;)); //JWD - increment and check again<br />
    }<br />
  </p>
  <p>//////////////////////////////////////////////////////////////////////////////////////	
    <br />
    } else { ///// Arrival date was choosen<br />
    <br />
    //JWD - save the current ship_when date since it is the earliest possible 
    date.<br />
    $ship_when_save = $ship_when; //JWD</p>
  <p> //JWD set the initial arrival date.<br />
    if ($service == $u2)<br />
    {<br />
    $ship_when_save = date (&quot;Y-m-d&quot;, strtotime ($arrival_date . &quot; 
    -2 days&quot;));<br />
    }<br />
    if ($service == $u1)<br />
    {<br />
    $ship_when_save = date (&quot;Y-m-d&quot;, strtotime ($arrival_date . &quot; 
    -1 days&quot;));<br />
    }<br />
    if ($service == $ug)<br />
    {<br />
    // get the transit time.<br />
    $time_in_transit = GetTimeInTransitDefault (CARRIER, $s_state);<br />
    $ship_when_save = date (&quot;Y-m-d&quot;, strtotime ($arrival_date . &quot; 
    -&quot; . $time_in_transit . &quot; days&quot;));<br />
    }<br />
    <br />
    //JWD - Check for weekends and holidays<br />
    $arrival_date_save = $arrival_date;<br />
    while(strtotime($ship_when_save) &lt;= strtotime($arrival_date_save)) {<br />
    $ship_day_of_week = date (&quot;D&quot;, strtotime($arrival_date_save)); //JWD 
    - find the day of week <br />
    if ($ship_day_of_week == &quot;Sat&quot; || $ship_day_of_week == &quot;Sun&quot;) 
    //JWD - If it is a weekend<br />
    {<br />
    $ship_when_save = date (&quot;Y-m-d&quot;, strtotime($ship_when_save . &quot; 
    -1 days&quot;)); //JWD - subtract a day from the ship_when_save<br />
    }<br />
    else if (getHolidayDate( date (&quot;Y-m-d&quot;, strtotime($arrival_date_save) 
    ) ) )<br />
    {<br />
    $ship_when_save = date (&quot;Y-m-d&quot;, strtotime($ship_when_save . &quot; 
    -1 days&quot;)); //JWD - subtract a day from the ship_when_save<br />
    }<br />
    $arrival_date_save = date (&quot;Y-m-d&quot;, strtotime ($arrival_date_save 
    . &quot; -1 days&quot;)); //JWD - decrement and check again<br />
    }</p>
  <p> //JWD - is the ship_when date too early<br />
    if (strtotime($ship_when_save) &lt; strtotime ($ship_when))<br />
    {<br />
    $service = &quot;&quot;;<br />
    $ship_when = &quot;&quot;;<br />
    }<br />
    else<br />
    {<br />
    $ship_when = $ship_when_save;<br />
    }<br />
    }<br />
    <br />
    ////////////////////////////////////////////////////////////////////////////////////<br />
    // Check to see if this package is shipping today.<br />
    <br />
    if (!$IsPastPickupTime)<br />
    { <br />
    $upcharges = $upcharges + $sameday_upcharge;<br />
    } <br />
    <br />
    // alaska hi upcharges.<br />
    $upcharges += $akhicharges;</p>
  <p><br />
    // gjm: 08-23-06<br />
    // ignore cost, but make sure we do the shipping method adjustment check.<br />
    // product specific shipping adjustment. <br />
    $cost = ProductShippingAdjustment ($shopcartlineid, $shopcartid, $time_in_transit, 
    $service);<br />
    if ($dCombinedCost &gt; 0.01)<br />
    {<br />
    // use the cost of the combined cost instread.<br />
    $cost = $dCombinedCost;<br />
    }<br />
    $quote = 0;<br />
    <br />
    /* <br />
    $rate = new Ups;<br />
    $rate-&gt;upsProduct($UPSProduct); // See upsProduct() function for codes<br />
    $rate-&gt;origin($from_zip, &quot;US&quot;); // Use ISO country codes!<br />
    $rate-&gt;dest($s_zip, &quot;US&quot;); // Use ISO country codes!<br />
    $rate-&gt;rate(&quot;RDP&quot;); // See the rate() function for codes<br />
    $rate-&gt;container(&quot;CP&quot;); // See the container() function for codes<br />
    $rate-&gt;weight($iWeight);<br />
    $rate-&gt;rescom(&quot;RES&quot;); // See the rescom() function for codes<br />
    $quote = $rate-&gt;getQuote();<br />
    */ <br />
    <br />
    <br />
    /* Rate table<br />
    UG U2 U1<br />
    $0.01 $20.00 $5.95 $9.95 $19.95 <br />
    $20.01 $24.94 $7.95 $11.95 $21.95 <br />
    $24.95 $30.00 $7.95 $11.95 $21.95 <br />
    $30.01 $50.00 $9.50 $14.95 $24.95 <br />
    $50.01 $100.00 $9.95 $16.95 $26.95 <br />
    $100.01 No max 10% of order 17% of order 25% of order</p>
  <p>*/ </p>
  <p> if ($cost &gt; 0 &amp;&amp; $cost &lt; 20.00)<br />
    {<br />
    if ($ug == $service)<br />
    {<br />
    $quote = 5.95;<br />
    }<br />
    if ($u2 == $service)<br />
    {<br />
    $quote = 9.95;<br />
    }<br />
    if ($u1 == $service)<br />
    {<br />
    $quote = 19.95;<br />
    }<br />
    }<br />
    if ($cost &gt;= 20.01 &amp;&amp; $cost &lt;= 24.94)<br />
    {<br />
    <br />
    if ($ug == $service)<br />
    {<br />
    $quote = 7.95;<br />
    }<br />
    if ($u2 == $service)<br />
    {<br />
    $quote = 11.95;<br />
    }<br />
    if ($u1 == $service)<br />
    {<br />
    $quote = 21.95;<br />
    } <br />
    }<br />
    if ($cost &gt;= 24.95 &amp;&amp; $cost &lt;= 30.00)<br />
    { <br />
    <br />
    if ($ug == $service)<br />
    {<br />
    $quote = 7.95;<br />
    }<br />
    if ($u2 == $service)<br />
    {<br />
    $quote = 11.95;<br />
    }<br />
    if ($u1 == $service)<br />
    {<br />
    $quote = 21.95;<br />
    } <br />
    <br />
    }<br />
    if ($cost &gt;= 30.01 &amp;&amp; $cost &lt;= 50.00)<br />
    {<br />
    if ($ug == $service)<br />
    {<br />
    $quote = 9.50;<br />
    }<br />
    if ($u2 == $service)<br />
    {<br />
    $quote = 14.95;<br />
    }<br />
    if ($u1 == $service)<br />
    {<br />
    $quote = 24.95;<br />
    } <br />
    <br />
    }<br />
    if ($cost &gt;= 50.01 &amp;&amp; $cost &lt;= 100.00)<br />
    {<br />
    if ($ug == $service)<br />
    {<br />
    $quote = 9.95;<br />
    }<br />
    if ($u2 == $service)<br />
    {<br />
    $quote = 16.95;<br />
    }<br />
    if ($u1 == $service)<br />
    {<br />
    $quote = 26.95;<br />
    } <br />
    <br />
    }<br />
    if ($cost &gt;= 100.01)<br />
    {<br />
    if ($ug == $service)<br />
    {<br />
    $quote = ($cost*0.10);<br />
    }<br />
    if ($u2 == $service)<br />
    {<br />
    $quote = ($cost*0.17);<br />
    }<br />
    if ($u1 == $service)<br />
    {<br />
    $quote = ($cost*0.27);<br />
    }<br />
    }<br />
    if ( ($ug == $service) &amp;&amp; ($promocode == &quot;PENNYSHIP&quot;))<br />
    {<br />
    $quote = 0.00;<br />
    }<br />
    // catalog id is only used for free item discounts.<br />
    RedeemOffer ($shopcartid, $catalogid, $offerdesc, $discount, $dollardiscount, 
    $shipdiscountpct);<br />
    <br />
    if ($shipdiscountpct &gt; 0)<br />
    {<br />
    $quote = ($quote-($quote*$shipdiscountpct/100));<br />
    } <br />
    $quote += $upcharges;<br />
    $dShipping = $quote;<br />
    //print (&quot;service: &quot; . $service . &quot;|ship_when: &quot; . $ship_when 
    . &quot;&lt;br&gt;&quot;); <br />
    return $dShipping;<br />
    } else {<br />
    return -1;<br />
    }<br />
    }</p>
  <p>//JWD check if date falls on a holiday<br />
    function getHolidayDate( $date ) {<br />
    // $holiday = array();<br />
    $year = date (&quot;Y&quot;, strtotime($date));<br />
    <br />
    // First off, the simple ones<br />
    if ($date == date( 'Y-m-d', strtotime($year . '-12-31'))) //New Year's Eve<br />
    { return true; }<br />
    if ($date == date( 'Y-m-d', strtotime($year . '-01-01'))) //New Year's Day<br />
    { return true; }<br />
    if ($date == date( 'Y-m-d', strtotime($year . '-07-04'))) //Independence Day<br />
    { return true; }<br />
    if ($date == date( 'Y-m-d', strtotime($year . '-12-25'))) //Christmas<br />
    { return true; }</p>
  <p> //test<br />
    //if ($date == date( 'Y-m-d', strtotime($year . '-06-04'))) //test<br />
    //{ return true; }<br />
    <br />
    <br />
    // and now, the more complex ones</p>
  <p> // Easter<br />
    // the Sunday after the first full moon which falls on or after the Spring 
    Equinox<br />
    // thank god PHP has a function for that...<br />
    if ($date == date( 'Y-m-d', easter_date( $year ) + 43200 ))<br />
    { return true; }<br />
    <br />
    // Memorial Day<br />
    // last Monday in May<br />
    if ($date == date( 'Y-m-d', strtotime( '-1 week monday', strtotime( &quot;June 
    1, $year&quot; ) ) + 43200 ))<br />
    { <br />
    return true; <br />
    }<br />
    <br />
    // Labor Day<br />
    // first Monday in September<br />
    if ($date == date( 'Y-m-d', strtotime( 'monday', strtotime( &quot;September 
    1, $year&quot; ) ) + 43200 ))<br />
    { <br />
    return true; <br />
    }<br />
    <br />
    // Thanksgiving<br />
    // fourth Thursday in November<br />
    if ($date == date( 'Y-m-d', strtotime( '3 weeks thursday', strtotime( &quot;November 
    1, $year&quot; ) ) + 43200 ))<br />
    { return true; }<br />
    <br />
    // Day after Thanksgiving<br />
    if ($date == date( 'Y-m-d', strtotime( '3 weeks friday', strtotime( &quot;November 
    1, $year&quot; ) ) + 43200 ))<br />
    { return true; }<br />
    <br />
    return false;<br />
    }</p>
  <p><br />
    function IsPastPickupTime($carrier, $time)<br />
    {<br />
    if ($carrier == 'UPS')<br />
    {<br />
    // cutoff time.<br />
    $cutofftime = strtotime(&quot;today &quot; . $time);<br />
    $now = strtotime (&quot;now&quot;);<br />
    if ( $now &gt;= $cutofftime ) //&amp;&amp; strtotime(&quot;now&quot;) &lt;= 
    $endtime )<br />
    { <br />
    return true;<br />
    } else { <br />
    return false;<br />
    }</p>
  <p> } else {<br />
    die (&quot;ERROR: Carrier not supported.&quot;);<br />
    }<br />
    } </p>
  <p></p>
  <p>function IsDateOnWeekend (&amp;$date, $adjust_forward = true)<br />
    {<br />
    $ship_days = 0;<br />
    <br />
    $ship_day_of_week = date (&quot;D&quot;, strtotime($date));<br />
    if ($ship_day_of_week == &quot;Sat&quot;) <br />
    {<br />
    if ($adjust_forward)<br />
    { <br />
    $ship_days = 2;<br />
    } else {<br />
    $ship_days = 1;<br />
    }<br />
    }<br />
    if ($ship_day_of_week == &quot;Sun&quot;) <br />
    {<br />
    if ($adjust_forward)<br />
    { <br />
    $ship_days = 1;<br />
    } else {<br />
    $ship_days = 2;<br />
    }<br />
    }<br />
    <br />
    if ($ship_days &gt; 0 )<br />
    {<br />
    if ($adjust_forward)<br />
    {<br />
    $date = date (&quot;Y-m-d&quot;, strtotime($date . &quot; +&quot; . $ship_days 
    . &quot; days&quot;));<br />
    } else {<br />
    $date = date (&quot;Y-m-d&quot;, strtotime($date . &quot; -&quot; . $ship_days 
    . &quot; days&quot;));<br />
    }<br />
    }<br />
    return $ship_days;<br />
    }</p>
  <p><br />
    function IsDateOnHoliday (&amp;$date, $adjustby = 1, $adjust_forward = true)<br />
    {<br />
    $bHoliday = false;<br />
    <br />
    $year = date (&quot;Y&quot;, strtotime($date)); <br />
    // check for a holiday as an arrival.<br />
    $holidays = getHolidays( $year );<br />
    foreach ($holidays as $key=&gt;$value)<br />
    {<br />
    $holiday_dates[$i] = $key;<br />
    $i++;<br />
    }<br />
    if (in_array ($date, $holiday_dates))<br />
    {<br />
    if ($adjust_forward)<br />
    {<br />
    $date = date (&quot;Y-m-d&quot;, strtotime($date . &quot; +&quot; . $adjustby 
    . &quot; days&quot;));<br />
    } else {<br />
    $date = date (&quot;Y-m-d&quot;, strtotime($date . &quot; -&quot; . $adjustby 
    . &quot; days&quot;));<br />
    }<br />
    $bHoliday = true;<br />
    } else {<br />
    $bHoliday = false;<br />
    } <br />
    return $bHoliday;<br />
    }</p>
  <p>function GetNextAvailableValidDate (&amp;$date, $service)<br />
    {<br />
    $ug = &quot;UPS Ground&quot;;<br />
    $u1 = &quot;UPS Next Day Air&quot;; <br />
    $u2 = &quot;UPS 2nd Day Air&quot;;</p>
  <p> $bWeekend = false;<br />
    $bHoliday = false;<br />
    while (1)<br />
    {<br />
    // does the date fall on a weekend day, if so, adjust.<br />
    $days = 0;<br />
    $ship_day_of_week = date (&quot;D&quot;, strtotime($date));<br />
    if ($ship_day_of_week == &quot;Sat&quot;) <br />
    {<br />
    $days = 1;<br />
    }<br />
    if ($ship_day_of_week == &quot;Sun&quot;) <br />
    {<br />
    $days = 2;<br />
    }<br />
    <br />
    if ($days &gt; 0 )<br />
    {<br />
    <br />
    // if ($service == $u1)<br />
    // $days += 1;<br />
    // <br />
    if ($service == $u2) <br />
    $days += 1;<br />
    <br />
    $date = date (&quot;Y-m-d&quot;, strtotime($date . &quot; -&quot; . $days 
    . &quot; days&quot;));<br />
    <br />
    $bWeekend = true;<br />
    } else {<br />
    $bWeekend = false;<br />
    }<br />
    <br />
    // is the arrival_date on a holiday? If so, adjust back.<br />
    $year = date (&quot;Y&quot;, strtotime($date)); <br />
    // check for a holiday as an arrival.<br />
    $holidays = getHolidays( $year );<br />
    foreach ($holidays as $key=&gt;$value)<br />
    {<br />
    $holiday_dates[$i] = $key;<br />
    $i++;<br />
    }<br />
    if (in_array ($date, $holiday_dates))<br />
    {<br />
    $date = date (&quot;Y-m-d&quot;, strtotime($date . &quot; -1 days&quot;));<br />
    $bHoliday = true;<br />
    } else {<br />
    $bHoliday = false;<br />
    } <br />
    <br />
    if (!$bWeekend &amp;&amp; !$bHoliday)<br />
    {<br />
    break;<br />
    }<br />
    <br />
    }</p>
  <p> return $date;<br />
    }</p>
  <p></p>
  <p>///////////////////////////////////////////////////////////////////////////////////////////////<br />
    // AdjustDate <br />
    ///////////////////////////////////////////////////////////////////////////////////////////////<br />
    function AdjustDate (&amp;$arrival_date, &amp;$ship_date, $service, $time_in_transit, 
    $asap = false)<br />
    {<br />
    $days = 0;<br />
    $ship_days = 0;<br />
    $day = &quot;&quot;;<br />
    <br />
    $ug = &quot;UPS Ground&quot;;<br />
    $u1 = &quot;UPS Next Day Air&quot;; <br />
    $u2 = &quot;UPS 2nd Day Air&quot;; <br />
    <br />
    <br />
    $bHoliday = false;<br />
    $bWeekend = false;<br />
    $bAdjusted = false;<br />
    <br />
    $todays_date = date (&quot;Y-m-d&quot;, strtotime (&quot;now&quot;)); <br />
    <br />
    <br />
    $IsPastPickupTime = IsPastPickupTime(CARRIER, CARRIER_PICKUP_TIME);<br />
    <br />
    $i=0;</p>
  <p><br />
    ////////////////////////////////////////////////////////////////////////////////////<br />
    // Adjust arrival_date<br />
    ////////////////////////////////////////////////////////////////////////////////////<br />
    if ($asap)<br />
    {<br />
    while (1)<br />
    {<br />
    <br />
    $bWeekend = IsDateOnWeekend ($arrival_date);<br />
    $bHoliday = IsDateOnHoliday ($arrival_date, 1, true, $asap);<br />
    <br />
    <br />
    if (!$bHoliday &amp;&amp; !$bWeekend &amp;&amp; !$bAdjusted)<br />
    {<br />
    break;<br />
    }<br />
    <br />
    $day = &quot;&quot;;<br />
    $days = 0;<br />
    <br />
    $bHoliday = false;<br />
    $bWeekend = false;<br />
    $bAdjusted = false;<br />
    <br />
    // safety valve<br />
    if ($i==356)<br />
    {<br />
    break;<br />
    }<br />
    $i++;<br />
    <br />
    }<br />
    }<br />
    <br />
    <br />
    // reset.<br />
    <br />
    $bHoliday = false;<br />
    $bWeekend = false;<br />
    $bAdjusted = false; <br />
    $i=0;</p>
  <p> ////////////////////////////////////////////////////////////////////////////////////<br />
    // Adjust ship_date<br />
    ////////////////////////////////////////////////////////////////////////////////////	
    <br />
    while (1)<br />
    {<br />
    // if we're passing a ship_date thats empty, lets initialize one <br />
    if ($asap)<br />
    {<br />
    if ($ship_date == &quot;&quot;)<br />
    {<br />
    $ship_date = $todays_date;<br />
    $bAdjusted = true;<br />
    }<br />
    <br />
    // past ship cutoff time and we're an asap, not on the weekend.<br />
    <br />
    if ($IsPastPickupTime)<br />
    {<br />
    AdjustDateByDays ($ship_date, 1, true);<br />
    }<br />
    <br />
    if ($service == $ug)<br />
    {<br />
    $todays_date = date (&quot;Y-m-d&quot;, strtotime (&quot;today&quot;));<br />
    $weekend_days = count_weekend_days (strtotime($todays_date), strtotime($arrival_date));<br />
    <br />
    <br />
    $days = $holiday_days + $weekend_days + $time_in_transit;<br />
    <br />
    $ship_date = date (&quot;Y-m-d&quot;, strtotime($arrival_date . &quot; -&quot; 
    . $days . &quot; days&quot;)); <br />
    }<br />
    if ($service == $u1)<br />
    { <br />
    $ship_date = date (&quot;Y-m-d&quot;, strtotime($arrival_date . &quot; -1 
    days&quot;)); <br />
    } <br />
    if ($service == $u2)<br />
    {<br />
    $ship_date = date (&quot;Y-m-d&quot;, strtotime($arrival_date . &quot; -2 
    days&quot;)); <br />
    }<br />
    <br />
    $bHoliday = IsDateOnHoliday ($ship_date, 1, true, true);<br />
    $bWeekend = IsDateOnWeekend ($ship_date);<br />
    <br />
    } else {<br />
  </p>
  <p> if ($IsPastPickupTime &amp;&amp; (strtotime ($ship_date) == strtotime ($todays_date)))<br />
    {<br />
    $ship_date = date (&quot;Y-m-d&quot;, strtotime($ship_date . &quot; +1 days&quot;));<br />
    }<br />
    <br />
    if ($service == $ug) // adjust for ground.<br />
    {<br />
    $days = $time_in_transit; // always count the current day as a shipping day.<br />
    if (strtotime($ship_date) &gt; strtotime($todays_date))<br />
    { <br />
    $ship_date = date (&quot;Y-m-d&quot;, strtotime($ship_date . &quot; -&quot; 
    . $days . &quot; days&quot;));<br />
    }<br />
    }</p>
  <p> if ($service == $u2) // adjust for 2nd day.<br />
    {<br />
    $days = 2; // always count the current day as a shipping day. <br />
    if (strtotime($ship_date) &gt; strtotime($todays_date))<br />
    { <br />
    $ship_date = date (&quot;Y-m-d&quot;, strtotime($ship_date . &quot; -&quot; 
    . $days . &quot; days&quot;));<br />
    }<br />
    }</p>
  <p><br />
    if ($service == $u1) // adjust for overnight.<br />
    {<br />
    $days = 1; // always count the current day as a shipping day.<br />
    if (strtotime($ship_date) &gt; strtotime($todays_date))<br />
    { <br />
    $ship_date = date (&quot;Y-m-d&quot;, strtotime($ship_date . &quot; -&quot; 
    . $days . &quot; days&quot;));<br />
    }<br />
    }<br />
    <br />
    $bHoliday = IsDateOnHoliday ($ship_date, 1, false, true); <br />
    $bWeekend = IsDateOnWeekend ($ship_date, $service); </p>
  <p> } </p>
  <p> if (!$bHoliday &amp;&amp; !$bWeekend)<br />
    {<br />
    break;<br />
    }<br />
    if ($i==356)<br />
    {<br />
    break;<br />
    }</p>
  <p> $i++;<br />
    } </p>
  <p> <br />
    }</p>
  <p>// given a time, give back the amount of days<br />
    function count_days ($start_date, $end_date)<br />
    {<br />
    $days = 0;<br />
    while($start_date &lt; $end_date)<br />
    {<br />
    $start_date = strtotime(date(&quot;Y-m-d&quot;, $start_date) . &quot; +1 days&quot;);<br />
    $days++;<br />
    <br />
    }<br />
    return $days;<br />
    }</p>
  <p></p>
  <p>// given a time, give back the amount of days<br />
    function count_holiday_days ($start_date, $end_date)<br />
    {<br />
    $days = 1;<br />
    $today = strtotime (date (&quot;Y-m-d&quot;));<br />
    while($start_date &lt;= $end_date)<br />
    { <br />
    $year = date (&quot;Y&quot;, strtotime($start_date)); <br />
    // check for a holiday as an arrival.<br />
    $holidays = getHolidays( $year );<br />
    foreach ($holidays as $key=&gt;$value)<br />
    {<br />
    $holiday_dates[$i] = $key;<br />
    $i++;<br />
    }<br />
    if (in_array ($start_date, $holiday_dates))<br />
    {<br />
    $days++;<br />
    } <br />
    $start_date = strtotime(date(&quot;Y-m-d&quot;, $start_date) . &quot; + 1 
    days&quot;);<br />
    }<br />
    return $days;<br />
    }</p>
  <p>// given a time, give back the amount of weekend days that are <br />
    // between the dates.<br />
    function count_weekend_days ($start_date, $end_date)<br />
    {<br />
    $weekend_days = 0;</p>
  <p> while($start_date &lt;= $end_date)<br />
    {<br />
    $day_of_week = date (&quot;D&quot;, $start_date);<br />
    <br />
    if ($day_of_week == &quot;Sat&quot; || $day_of_week == &quot;Sun&quot;)<br />
    {<br />
    $weekend_days++;<br />
    }<br />
    <br />
    $start_date = strtotime(date(&quot;Y-m-d&quot;, $start_date) . &quot; + 1 
    days&quot;);<br />
    }<br />
    return $weekend_days;<br />
    }</p>
  <p><br />
    /* Function : getHolidays()<br />
    ** Parameters :<br />
    ** $year -- the year in question<br />
    ** Return : an associative array containing the holidays occuring in the given 
    year<br />
    ** they key is a date stamp of the form Y-m-d, the value is the name of the 
    corresponding holiday<br />
    */<br />
    function getHolidays( $year ) {<br />
    $return = array();<br />
    <br />
    <br />
    // First off, the simple ones<br />
    <br />
    $return[$year . '-01-01'] = 'New Year`s Day';<br />
    $return[$year . '-01-02'] = 'New Year`s Day After';<br />
    $return[$year . '-02-14'] = 'Valentine`s Day';<br />
    $return[$year . '-06-14'] = 'Flag Day';<br />
    $return[$year . '-07-04'] = 'Independence Day';<br />
    $return[$year . '-11-11'] = 'Veteran`s Day';<br />
    $return[$year . '-12-25'] = 'Christmas';<br />
    $return[$year . '-12-26'] = 'Christmas Day After'; <br />
    <br />
    <br />
    // and now, the more complex ones<br />
    <br />
    // Martin Luther King, Jr. Day<br />
    // third Monday in January<br />
    $return[date( 'Y-m-d', strtotime( '2 weeks monday', strtotime( &quot;January 
    1, $year&quot; ) ) + 43200 )] = 'Martin Luther King, Jr. Day';<br />
    <br />
    // Presidents` Day<br />
    // third Monday in February<br />
    $return[date( 'Y-m-d', strtotime( '2 weeks monday', strtotime( &quot;February 
    1, $year&quot; ) ) + 43200 )] = 'Presidents` Day';<br />
    <br />
    // Mardi Gras<br />
    // Tuesday ~47 days before Easter<br />
    $return[date( 'Y-m-d', strtotime( 'last tuesday 46 days ago', easter_date( 
    $year ) ) + 43200 )] = 'Mardi Gras';<br />
    <br />
    // Easter<br />
    // the Sunday after the first full moon which falls on or after the Spring 
    Equinox<br />
    // thank god PHP has a function for that...<br />
    $return[date( 'Y-m-d', easter_date( $year ) + 43200 )] = 'Easter';<br />
    <br />
    // Memorial Day<br />
    // last Monday in May<br />
    $return[date( 'Y-m-d', strtotime( '-1 week monday', strtotime( &quot;June 
    1, $year&quot; ) ) + 43200 )] = 'Memorial Day';<br />
    <br />
    // Labor Day<br />
    // first Monday in September<br />
    $return[date( 'Y-m-d', strtotime( 'monday', strtotime( &quot;September 1, 
    $year&quot; ) ) + 43200 )] = 'Labor Day';<br />
    <br />
    // Columbus Day<br />
    // second Monday in October<br />
    $return[date( 'Y-m-d', strtotime( '1 week monday', strtotime( &quot;October 
    1, $year&quot; ) ) + 43200 )] = 'Columbus Day';<br />
    <br />
    // Thanksgiving<br />
    // fourth Thursday in November<br />
    $return[date( 'Y-m-d', strtotime( '3 weeks thursday', strtotime( &quot;November 
    1, $year&quot; ) ) + 43200 )] = 'Thanksgiving';<br />
    <br />
    // Day after Thanksgiving<br />
    $return[date( 'Y-m-d', strtotime( '3 weeks friday', strtotime( &quot;November 
    1, $year&quot; ) ) + 43200 )] = 'Day after Thanksgiving';<br />
    <br />
    <br />
    ksort( $return );<br />
    return $return;<br />
    }</p>
  <p><br />
    function ProductShippingAdjustment ($shopcartlineid, $shopcartid, $time_in_transit, 
    &amp;$service)<br />
    {<br />
    $ug = &quot;UG - UPS Ground&quot;;<br />
    $u1 = &quot;U1 - Next Afternoon&quot;; <br />
    $u2 = &quot;U2 - Second Day Air&quot;;<br />
    <br />
    if ($shopcartlineid != &quot;&quot;)<br />
    {<br />
    $cartline = GetCartline ($shopcartlineid);<br />
    $itemid = $cartline[0]['itemid_fk'];<br />
    $price = $cartline[0]['priceeach'];<br />
    $quantity = $cartline[0]['quantity'];<br />
    <br />
    $cost = (double)ExtractDoubleFromMoney($price);<br />
    $cost = $cost * $quantity;<br />
    $sql = &quot;select vendoritemid from items where itemid = &quot; . $itemid;<br />
    $rs = ExecuteSelect ($sql);<br />
    $cake = substr ($rs[0]['vendoritemid'], 0, 2);<br />
    if ($cake === &quot;CA&quot;)<br />
    {<br />
    if ($service == $ug &amp;&amp; $time_in_transit &gt; 2)<br />
    {<br />
    // ground service not allowed for cakes.'<br />
    $service = &quot;&quot;;<br />
    }<br />
    }<br />
    return $cost;<br />
    }<br />
    }</p>
  <p><br />
    function GetTimeInTransitDefault ($carrier, $s_state)<br />
    {</p>
  <p> $time_in_transit = 0;</p>
  <p> if ($carrier == 'UPS')<br />
    {<br />
    <br />
    $max_ground_transit = 5;<br />
    // $ZoneCharges = array (&quot;AK&quot;, &quot;HI&quot;); <br />
    // $ZoneCharges2 = array (&quot;BC&quot;,&quot;AB&quot;,&quot;MB&quot;,&quot;NB&quot;,&quot;NS&quot;,&quot;NT&quot;,&quot;PE&quot;,&quot;NF&quot;,&quot;QC&quot;,&quot;SK&quot;,&quot;YT&quot;,&quot;ON&quot;); 
    <br />
    <br />
    //JWD - updated 03/16/2006<br />
    $day1 = array (&quot;CT&quot;,&quot;MA&quot;,&quot;ME&quot;,&quot;NH&quot;,&quot;NY&quot;,&quot;RI&quot;,&quot;VT&quot;);<br />
    $day2 = array (&quot;DC&quot;,&quot;DE&quot;,&quot;IN&quot;,&quot;KY&quot;,&quot;MD&quot;,&quot;NC&quot;,&quot;NJ&quot;,&quot;OH&quot;,&quot;PA&quot;,&quot;SC&quot;,&quot;VA&quot;,&quot;WV&quot;);<br />
    $day3 = array (&quot;AL&quot;,&quot;FL&quot;,&quot;GA&quot;,&quot;IA&quot;,&quot;IL&quot;,&quot;MI&quot;,&quot;MN&quot;,&quot;MO&quot;,&quot;TN&quot;,&quot;WI&quot;);<br />
    $day4 = array (&quot;AR&quot;,&quot;KS&quot;,&quot;LA&quot;,&quot;MS&quot;,&quot;ND&quot;,&quot;NE&quot;,&quot;OK&quot;,&quot;SD&quot;); 
    <br />
    $day5 = array (&quot;AK&quot;,&quot;AZ&quot;,&quot;CA&quot;,&quot;CO&quot;,&quot;HI&quot;,&quot;ID&quot;,&quot;MT&quot;,&quot;NM&quot;,&quot;NV&quot;,&quot;OR&quot;,&quot;TX&quot;,&quot;UT&quot;,&quot;WA&quot;,&quot;WY&quot;);<br />
    <br />
    $days = 1;<br />
    // based on ground service, how many days will it take to get this product 
    to the customer<br />
    if (in_array ($s_state, $day1))<br />
    {<br />
    $time_in_transit = 1;<br />
    }<br />
    if (in_array ($s_state, $day2))<br />
    $time_in_transit = 2;<br />
    <br />
    if (in_array ($s_state, $day3))<br />
    $time_in_transit = 3;<br />
    <br />
    if (in_array ($s_state, $day4))<br />
    $time_in_transit = 4;<br />
    <br />
    if (in_array ($s_state, $day5))<br />
    $time_in_transit = $max_ground_transit; <br />
    }<br />
    <br />
    if ($carrier == USPS)<br />
    {<br />
    die (&quot;ERROR: Carrier unsupported.&quot;);<br />
    }</p>
  <p> if ($carrier == FEDEX)<br />
    {<br />
    die (&quot;ERROR: Carrier unsupported.&quot;);<br />
    }<br />
    return $time_in_transit;<br />
    <br />
    }</p>
  <p><br />
    function AdjustDateByDays (&amp;$date, $adjustby, $adjust_forward = true)<br />
    {<br />
    if ($adjust_forward)<br />
    {<br />
    $newdate = $date . &quot; +&quot; . $adjustby . &quot; days&quot;;<br />
    } else {<br />
    $newdate = $date . &quot; -&quot; . $adjustby . &quot; days&quot;;<br />
    }<br />
    $date = date (&quot;Y-m-d&quot;, strtotime ($newdate));<br />
    <br />
    return true;<br />
    }</p>
  <p></p>
  <p>?&gt;</p>
</div>
</body>
</html>
