<?php 
	#################################################################
	#	WEATHER STATION TEMPLATE by BRIAN UNDERDOWN 2015-2016-2017                                	   
	#	CREATED FOR WEATHER34 AURORA TEMPLATE at 													   
	#   https://weather34.com/homeweatherstation/index.html 										    
	# 	WEATHER STATION TEMPLATE 2015-2020                 										       
	# 	     Revised November 2020													                   
	#   https://www.weather34.com 	                                                                   
	#################################################################
//original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
include('livedata.php');header('Content-type: text/html; charset=utf-8');	?>
<div class="moonblock">
<div class="consoledesc">24-72 Hour Outlook</div>
<div class="consoleforecast">
<?php  //weather34 script Davis forecast outlook

$weather["vpforecasttext"]	=str_replace('within', '', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('ending', '', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('likely', '', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('with', '', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('possible', '', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('and warmer.', '<oorange>Warmer </oorange>period expected .', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('and cooler.', '<deepblue>Cooler </deepblue>period expected.', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('and ending', 'for', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('to the', '', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('shift', 'becoming', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('wind shifting', 'shifting', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('wind becoming', 'becoming', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('Windy', '<oorange>Windy</oorange>', $weather["vpforecasttext"]);
if (anyToC($weather["temp"])<-1){$weather["vpforecasttext"]	=str_replace('Precipitation',  'Risk of <deepblue>Snow</deepblue>.', $weather["vpforecasttext"]);}
else if (anyToC($weather["temp"])<1){$weather["vpforecasttext"]	=str_replace('Precipitation',  'Possibility of <deepblue>Rain</deepblue> & <deepblue>Sleet</deepblue>.', $weather["vpforecasttext"]);}
$weather["vpforecasttext"]	=str_replace('Precipitation',  'Possibility of <deepblue>Rain</deepblue>', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('Increasing clouds', 'Periods of <deepblue>Scattered Clouds</deepblue>.', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('and windy', '<oorange>Windy</oorange>', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('Mostly clear', '<oorange>Mostly Clear </oorange> Conditions.', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('Partly cloudy', '<deepblue>Partly Cloudy</deepblue> Conditions.', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('Mostly cloudy', '<deepblue>Mostly Cloudy </deepblue> Conditions.', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('24 to 48 hours', '', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('6 to 12 hours', '', $weather["vpforecasttext"]); 
$weather["vpforecasttext"]	=str_replace('12 to 24 hours', '', $weather["vpforecasttext"]);  
$weather["vpforecasttext"]	=str_replace('48 to 72 hours', '', $weather["vpforecasttext"]); 
$weather["vpforecasttext"]	=str_replace('12 hours', '', $weather["vpforecasttext"]); 
$weather["vpforecasttext"]	=str_replace('6 hours', '', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('South West', 'SW', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('South East', 'SE', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('W, NW, or N', 'W,NW,to N', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('little temperature change.', 'No Significant change in temperature.', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace(', possibly heavy at times', '', $weather["vpforecasttext"]);
$weather["vpforecasttext"]	=str_replace('becoming', '', $weather["vpforecasttext"]);echo $weather["vpforecasttext"]; 
echo "</div>";

//weather34 console vue-vp2 Davis forecast icon
if (preg_match("/Snow/i", $weather["vpforecasttext"]) && anyToC($weather["temp"])<-1)  {echo '<a href="forecastcharts/chartforecast.php" data-title="forecast snow"><img rel="prefetch" src="wuicons/snow.svg" class="consoleicon"  alt="forecast snow">';} 
else if (preg_match("/Sleet/i", $weather["vpforecasttext"]) && anyToC($weather["temp"])<1)  {echo '<a href="forecastcharts/chartforecast.php" data-title="forecast sleet"><img rel="prefetch" src="wuicons/sleet.svg" class="consoleicon" alt="forecast sleet">';} 
else if (preg_match("/Rain/i", $weather["vpforecasttext"])) {echo '<a href="forecastcharts/chartforecast.php" data-title="forecast rain"><img rel="prefetch" src="wuicons/rainvp.svg" class="consoleicon" alt="rain"';} 
else if (preg_match("/Precipitation/i", $weather["vpforecasttext"])) {echo '<a href="forecastcharts/chartforecast.php" data-title="forecast rain"><img rel="prefetch" src="wuicons/rainvp.svg" class="consoleicon" alt="rain">';} 
else if (preg_match("/Windy/i", $weather["vpforecasttext"])) {echo '<a href="forecastcharts/chartforecast.php" data-title="forecast windy"><img rel="prefetch" src="wuicons/windy.svg" class="consoleicon" alt="windy" >';} 
else if (preg_match("/clear/i", $weather["vpforecasttext"])) {echo '<a href="forecastcharts/chartforecast.php" data-title="forecast clear"><img rel="prefetch" src="wuicons/clear.svg" class="consoleicon" alt="clear" >';}
else if (preg_match("/Partly/i", $weather["vpforecasttext"])) {echo '<a href="forecastcharts/chartforecast.php" data-title="forecast partly cloudy"><img rel="prefetch" src="wuicons/partly-cloudy-day.svg" class="consoleicon" alt="partly cloudy" ></a>';} 
else if (preg_match("/Mostly cloudy/i", $weather["vpforecasttext"])) {echo '<a href="forecastcharts/chartforecast.php" data-title="forecast mostly cloudy"><img rel="prefetch" src="wuicons/mostlycloudy.svg" class="consoleicon" alt="mostly cloudy" >';} 
else if (preg_match("/Scattered/i", $weather["vpforecasttext"])) {echo '<a href="forecastcharts/chartforecast.php" data-title="forecast scattered clouds"><img rel="prefetch" src="wuicons/scatteredclouds.svg" class="consoleicon" alt="scattered clouds" >';} 

?></div></div>