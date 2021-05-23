<?php 
	####################################################################################################
	#	HOME WEATHER STATION TEMPLATE by BRIAN UNDERDOWN 2015-2020			                           #
	#	CREATED FOR HOMEWEATHERSTATION TEMPLATE at 													   #
	#   https://weather34.com/homeweatherstation/index.html 										   # 
	# 	WEATHER STATION TEMPLATE 2015-2020                 										       #
	# 	      Standalone Version Revised June 2020							                   		   #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################
//original weather34 script original css/svg/php by weather34 2015-2020 clearly marked as original by weather34//
include('livedata.php');header('Content-type: text/html; charset=utf-8');error_reporting(0); date_default_timezone_set($TZ);	?>
<?php 
//start the wu output
$json='jsondata/wuforecast.txt';
$weather34wuurl=file_get_contents($json);
$parsed_weather34wujson = json_decode($weather34wuurl,false);
{    if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==null){
	 $wuskydayIcon=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[1];
	 $wuskydayTime = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[1];	
	 $wuskydayTempHigh = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[1];
	 $wuskydayTempLow = $parsed_weather34wujson->{'temperatureMin'}[1];	 
	 $wuskydayWindGust = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[1];
	 $wuskydayWinddir = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[1];
	 $wuskydayWinddircardinal = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[1];
	 $wuskydayacumm = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[1];
	 $wuskydayPrecipType = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[1];
	 $wuskydayprecipIntensity = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[1];
	 $wuskydayPrecipProb = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[1];
	 $wuskydayUV = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[1];
	 $wuskydayUVdesc = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[1];
	 $wuskydaysnow = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[1];
	 $wuskydaysummary = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[1];
	 $wuskydaynight = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[1];
	 $wuskydesc = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[1];
	 $wuskythunder = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[1];
	 $wuskyhumidity = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[1];
	 $wuskyheatindex = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[1];
	 }	 
	 else {
	 $wuskydayIcon=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0];
	 $wuskydayTime = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[0];	
	 $wuskydayTempHigh = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[0];
	 $wuskydayTempLow = $parsed_weather34wujson->{'temperatureMin'}[0];	 
	 $wuskydayWindGust = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[0];
	 $wuskydayWinddir = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[0];
	 $wuskydayWinddircardinal = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[0];
	 $wuskydayacumm = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[0];
	 $wuskydayPrecipType = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[0];
	 $wuskydayprecipIntensity = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[0];
	 $wuskydayPrecipProb = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[0];
	 $wuskydayUV = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[0];
	 $wuskydayUVdesc = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[0];
	 $wuskydaysnow = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[0];
	 $wuskydaysummary = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[0];
	 $wuskydaynight = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[0];
	 $wuskydesc = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[0];
	 $wuskythunder = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[0];
	 $wuskyhumidity = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[0];
	 $wuskyheatindex = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[0];	 
	 }
	 $wuskydaynight1 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[1];
	 $wuskydaynight2 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[2];	 
	 //thunder
	 $wuskythunder = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[0];
	 $wuskythunder1 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[1];
	 $wuskythunder2 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[2];
	 $wuskythunder3 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[3];
	 $wuskythunder4 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[4];
	 $wuskythunder5 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[5];
	 $wuskythunder6 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[6];
	 $wuskythunder7 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[7];
	 $wuskythunder8 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[8];
	 $wuskythunder9 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[9];
	 $wuskythunder10 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[10];
	 //period
	 $wuskydayTime1 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[1];
	 $wuskydayTime2 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[2];
	 $wuskydayTime3 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[3];
	 $wuskydayTime4 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[4];
	 $wuskydayTime5 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[5];
	 $wuskydayTime6 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[6];
	 $wuskydayTime7 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[7];
	 $wuskydayTime8 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[8];
	 $wuskydayTime9 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[9];
	 $wuskydayTime10 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[10];
	 //rain
	 $wuskyrain1 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[1];
	 $wuskyrain2 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[2];
	 $wuskyrain3 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[3];
	 $wuskyrain4 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[4];
	 $wuskyrain5 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[5];
	 $wuskyrain6 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[6];
	 $wuskyrain7 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[7];
	 $wuskyrain8 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[8];
	 $wuskyrain9 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[9];
	 $wuskyrain10 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[10];			 
	 //snow
	 $wuskysnow1 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[1];
	 $wuskysnow2 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[2];
	 $wuskysnow3 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[3];
	 $wuskysnow4 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[4];
	 $wuskysnow5 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[5];
	 $wuskysnow6 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[6];
	 $wuskysnow7 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[7]; 
	 $wuskysnow8 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[8];
	 $wuskysnow9 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[9];
	 $wuskysnow10 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[10];
	  //heatindex
	 $wuskyheatindex1 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[1];
	 $wuskyheatindex2 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[2];
	 $wuskyheatindex3 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[3];
	 $wuskyheatindex4 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[4];
	 $wuskyheatindex5 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[5];
	 $wuskyheatindex6 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[6];
	 $wuskyheatindex7 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[7];	
	  //uv index
	 $wuskydayUV1 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[1];
	 $wuskydayUV2 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[2];
	 $wuskydayUV3 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[3];
	 $wuskydayUV4 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[4];
	 $wuskydayUV5 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[5];
	 $wuskydayUV6 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[6];
	 $wuskydayUV7 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[7];
	 $wuskydayUV8 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[8];	 
	 $wuskydayTempHigh2=$parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[2];	 
	 }?>

<?php //begin wu stuff 

//wu convert temps-rain-wind
//metric to F
if ($weather["temp_units"]=='F' && $wuapiunit=='m' ){$wuskydayTempHigh=($wuskydayTempHigh*9/5)+32;}
if ($weather["temp_units"]=='F' && $wuapiunit=='m' ){$wuskydayTempLow=($wuskydayTempLow*9/5)+32;}
if ($weather["temp_units"]=='F' && $wuapiunit=='m' ){$wuskyheatindex=($wuskyheatindex*9/5)+32;}
if ($weather["temp_units"]=='F' && $wuapiunit=='m' ){$wuskywindchill=($wuskywindchill*9/5)+32;}
if ($weather["temp_units"]=='F' && $wuapiunit=='m' ){$wuskydayTempHigh1=($wuskydayTempHigh1*9/5)+32;}
if ($weather["temp_units"]=='F' && $wuapiunit=='m' ){$wuskyheatindex1=($wuskyheatindex1*9/5)+32;}
if ($weather["temp_units"]=='F' && $wuapiunit=='m' ){$wuskywindchill1=($wuskywindchill1*9/5)+32;}
if ($weather["temp_units"]=='F' && $wuapiunit=='m' ){$wuskydayTempHigh2=($wuskydayTempHigh2*9/5)+32;}
if ($weather["temp_units"]=='F' && $wuapiunit=='m' ){$wuskyheatindex2=($wuskyheatindex2*9/5)+32;}
if ($weather["temp_units"]=='F' && $wuapiunit=='m' ){$wuskywindchill2=($wuskywindchill2*9/5)+32;}

// metric to F UK
if ($weather["temp_units"]=='F' && $wuapiunit=='h' ){$wuskydayTempHigh=($wuskydayTempHigh*9/5)+32;}
if ($weather["temp_units"]=='F' && $wuapiunit=='h' ){$wuskydayTempLow=($wuskydayTempLow*9/5)+32;}
if ($weather["temp_units"]=='F' && $wuapiunit=='h' ){$wuskyheatindex=($wuskyheatindex*9/5)+32;}
if ($weather["temp_units"]=='F' && $wuapiunit=='h' ){$wuskywindchill=($wuskywindchill*9/5)+32;}
if ($weather["temp_units"]=='F' && $wuapiunit=='h' ){$wuskydayTempHigh1=($wuskydayTempHigh1*9/5)+32;}
if ($weather["temp_units"]=='F' && $wuapiunit=='h' ){$wuskyheatindex1=($wuskyheatindex1*9/5)+32;}
if ($weather["temp_units"]=='F' && $wuapiunit=='h' ){$wuskywindchill1=($wuskywindchill1*9/5)+32;}
if ($weather["temp_units"]=='F' && $wuapiunit=='h' ){$wuskydayTempHigh2=($wuskydayTempHigh2*9/5)+32;}
if ($weather["temp_units"]=='F' && $wuapiunit=='h' ){$wuskyheatindex2=($wuskyheatindex2*9/5)+32;}
if ($weather["temp_units"]=='F' && $wuapiunit=='h' ){$wuskywindchill2=($wuskywindchill2*9/5)+32;}

// ms non metric to c Scandinavia 
if ($weather["temp_units"]=='F' && $wuapiunit=='s'){$wuskydayTempHigh=($wuskydayTempHigh*30);}
if ($weather["temp_units"]=='F' && $wuapiunit=='s'){$wuskydayTempLow=($wuskydayTempLow*30);}
if ($weather["temp_units"]=='F' && $wuapiunit=='s'){$wuskyheatindex=($wuskyheatindex*30);}
if ($weather["temp_units"]=='F' && $wuapiunit=='s'){$wuskywindchill=($wuskywindchill*30);}
if ($weather["temp_units"]=='F' && $wuapiunit=='s'){$wuskydayTempHigh1=($wuskydayTempHigh1*30);}
if ($weather["temp_units"]=='F' && $wuapiunit=='s'){$wuskyheatindex1=($wuskyheatindex1*30);}
if ($weather["temp_units"]=='F' && $wuapiunit=='s'){$wuskywindchill1=($wuskywindchill1*30);}
if ($weather["temp_units"]=='F' && $wuapiunit=='s'){$wuskydayTempHigh2=($wuskydayTempHigh2*30);}
if ($weather["temp_units"]=='F' && $wuapiunit=='s'){$wuskyheatindex2=($wuskyheatindex2*30);}
if ($weather["temp_units"]=='F' && $wuapiunit=='s'){$wuskywindchill2=($wuskywindchill2*30);}

// non metric to c US
if ($weather["temp_units"]=='C' && $wuapiunit=='e' ){$wuskydayTempHigh=($wuskydayTempHigh-32)/1.8;}
if ($weather["temp_units"]=='C' && $wuapiunit=='e' ){$wuskydayTempLow=($wuskydayTempLow-32)/1.8;}
if ($weather["temp_units"]=='C' && $wuapiunit=='e' ){$wuskyheatindex=($wuskyheatindex-32)/1.8;}
if ($weather["temp_units"]=='C' && $wuapiunit=='e' ){$wuskywindchill=($wuskywindchill-32)/1.8;}
if ($weather["temp_units"]=='C' && $wuapiunit=='e' ){$wuskydayTempHigh1=($wuskydayTempHigh1-32)/1.8;}
if ($weather["temp_units"]=='C' && $wuapiunit=='e' ){$wuskyheatindex1=($wuskyheatindex1-32)/1.8;}
if ($weather["temp_units"]=='C' && $wuapiunit=='e' ){$wuskywindchill1=($wuskywindchill1-32)/1.8;}
if ($weather["temp_units"]=='C' && $wuapiunit=='e' ){$wuskydayTempHigh2=($wuskydayTempHigh2-32)/1.8;}
if ($weather["temp_units"]=='C' && $wuapiunit=='e' ){$wuskyheatindex2=($wuskyheatindex2-32)/1.8;}
if ($weather["temp_units"]=='C' && $wuapiunit=='e' ){$wuskywindchill2=($wuskywindchill2-32)/1.8;}

//wind
// mph to kmh US
if ($windunit=='km/h' && $wuapiunit=='e' ){$wuskydayWindGust=(number_format($wuskydayWindGust,1)*1.60934);}
// mph to kmh UK
if ($windunit=='km/h' && $wuapiunit=='h' ){$wuskydayWindGust=(number_format($wuskydayWindGust,1)*1.60934);}
//mph to ms US
if ($windunit=='m/s' && $wuapiunit=='e' ){$wuskydayWindGust=(number_format($wuskydayWindGust,1)*0.44704);}
//mph to ms uk
if ($windunit=='m/s' && $wuapiunit=='h' ){$wuskydayWindGust=(number_format($wuskydayWindGust,1)*0.44704);}
//kmh to ms
if ($windunit=='m/s' && $wuapiunit=='m' ){$wuskydayWindGust=(number_format($wuskydayWindGust,1)*0.277778);}
//kmh to mph
if ($windunit=='mph' && $wuapiunit=='m' ){$wuskydayWindGust=(number_format($wuskydayWindGust,1)*0.621371);}	
//kmh to kts
if ($windunit=='kts' && $wuapiunit=='m' ){$wuskydayWindGust=(number_format($wuskydayWindGust,1)*0.539957);}	
//kmh to kts
if ($windunit=='kts' && $wuapiunit=='e' ){$wuskydayWindGust=(number_format($wuskydayWindGust,1)*0.539957);}	

//rain inches to mm
if ($rainunit=='mm' && $wuapiunit=='e' ){$wuskydayprecipIntensity=$wuskydayprecipIntensity*25.4;}
//rain mm to inches scandinavia
if ($rainunit=='in' && $wuapiunit=='s' ){$wuskydayprecipIntensity=$wuskydayprecipIntensity*0.0393701;}
//rain mm to inches uk
if ($rainunit=='in' && $wuapiunit=='h' ){$wuskydayprecipIntensity2=$wuskydayprecipIntensity2*0.0393701;}
//rain mm to inches metric                  
if ($rainunit=='in' && $wuapiunit=='m' ){$wuskydayprecipIntensity=$wuskydayprecipIntensity*0.0393701;}
//icon + day wu
echo '<div class="lightningblock">';
echo '<div class="wudesc">Forecast '.$wuskydayTime.'</div>

<div class="wuicon">';
if ($wuskydaynight=='D'){echo '<img src="wuicons/'.$wuskydayIcon.'.svg" width="55" height="45" alt="'.$wuskydesc.'" title="'.$wuskydesc.'"></img>';}
if ($wuskydaynight=='N'){echo '<img src="wuicons/nt_'.$wuskydayIcon.'.svg" width="55" height="45 alt="'.$wuskydesc.'" title="'.$wuskydesc.'"></img>';}
// icon description
$wuskydesc	=str_replace('Wind','Windy '. "Conditions", $wuskydesc);
$wuskydesc	=str_replace('/', ' ', $wuskydesc);
echo '</div>
<div class="wuicondesc">'.$wuskydesc.'</div><br>

<div class="button button-dial-small-home"><wutemp>';
//temp non metric wu
if ($weather["temp_units"]=='F'){
if($wuskydayTempHigh<44.6){echo '<blue>'.number_format($wuskydayTempHigh,0).'°</red>';}
else if($wuskydayTempHigh>104){echo '<purple>'.number_format($wuskydayTempHigh,0).'°</purple>';}
else if($wuskydayTempHigh>80.6){echo '<red>'.number_format($wuskydayTempHigh,0).'°</red>';}
else if($wuskydayTempHigh>66.2){echo '<orange>'.number_format($wuskydayTempHigh,0).'°</orange>';}
else if($wuskydayTempHigh>55){echo '<yellow>'.number_format($wuskydayTempHigh,0).'°</yellow>';}
else if($wuskydayTempHigh>=44.6){echo '<green>'.number_format($wuskydayTempHigh,0).'°</green>';}}
//temp metric wu
if ($weather["temp_units"]=='C'){
if($wuskydayTempHigh<7 && $weather["temp_units"]=='C'){echo '<blue>'.number_format($wuskydayTempHigh,0).'°</blue>';}
else if($wuskydayTempHigh>40){echo '<purple>'.number_format($wuskydayTempHigh,0).'°</purple>';}
else if($wuskydayTempHigh>27){echo '<red>'.number_format($wuskydayTempHigh,0).'°</red>';}
else if($wuskydayTempHigh>19){echo '<orange>'.number_format($wuskydayTempHigh,0).'°</orange>';}
else if($wuskydayTempHigh>12.7){echo '<yellow>'.number_format($wuskydayTempHigh,0).'°</yellow>';}
else if( $wuskydayTempHigh>=7){echo '<green>'.number_format($wuskydayTempHigh,0).'°</green>';}}
echo '</wutemp><div class="button-dial-top-small-home"></div><br>';
//lightning wu
echo '<div class=wuahead>';
if ($wuskythunder>0 )  {echo 'Thunderstorms expected '.$wuskydayTime.'';}
else if ($wuskythunder1>0 )  {echo ' <orange>Thunderstorms</orange>	 '.$wuskydayTime1. '&nbsp;'.$lightningalert8.'';}
else if ($wuskythunder2>0 )  {echo ' <orange>Thunderstorms</orange>	 '.$wuskydayTime2. '&nbsp;'.$lightningalert8.'';}
else if ($wuskythunder3>0 )  {echo ' <orange>Thunderstorms</orange>	 '.$wuskydayTime3. '&nbsp;'.$lightningalert8.'';}
else if ($wuskythunder4>0 )  {echo ' <orange>Thunderstorms</orange>	 '.$wuskydayTime4. '&nbsp;'.$lightningalert8.'';}
else if ($wuskythunder5>0 )  {echo ' <orange>Thunderstorms</orange>	 '.$wuskydayTime5. '&nbsp;'.$lightningalert8.'';}
else if ($wuskythunder6>0 )  {echo ' <orange>Thunderstorms</orange>	 '.$wuskydayTime6. '&nbsp;'.$lightningalert8.'';}
else if ($wuskythunder7>0 )  {echo ' <orange>Thunderstorms</orange>	 '.$wuskydayTime7. '&nbsp;'.$lightningalert8.'';}
else if ($wuskythunder8>0 )  {echo ' <orange>Thunderstorms</orange>	 '.$wuskydayTime8. '&nbsp;'.$lightningalert8.'';}
else if ($wuskythunder9>0 )  {echo ' <orange>Thunderstorms</orange>	 '.$wuskydayTime9. '&nbsp;'.$lightningalert8.'';}
else if ($wuskythunder10>0 )  {echo ' <orange>Thunderstorms</orange> '.$wuskydayTime10. '&nbsp;'.$lightningalert8.'';}
//snowfall wu
else if ($wuskysnow>0 )  {echo ' <blue>Snow</blue>	'.$wuskydayTime. '&nbsp;'.$freezing.'';}
else if ($wuskysnow1>0 )  {echo ' <blue>Snow</blue>	'.$wuskydayTime1. '&nbsp;'.$freezing.'';}
else if ($wuskysnow2>0 )  {echo ' <blue>Snow</blue>	'.$wuskydayTime2. '&nbsp;'.$freezing.'';}
else if ($wuskysnow3>0 )  {echo ' <blue>Snow</blue>	'.$wuskydayTime3. '&nbsp;'.$freezing.'';}
else if ($wuskysnow4>0 )  {echo ' <blue>Snow</blue>	'.$wuskydayTime4. '&nbsp;'.$freezing.'';}
else if ($wuskysnow5>0 )  {echo ' <blue>Snow</blue>	'.$wuskydayTime5. '&nbsp;'.$freezing.'';}
else if ($wuskysnow6>0 )  {echo ' <blue>Snow</blue>	'.$wuskydayTime6. '&nbsp;'.$freezing.'';}
else if ($wuskysnow7>0 )  {echo ' <blue>Snow</blue>	'.$wuskydayTime7. '&nbsp;'.$freezing.'';}
else if ($wuskysnow8>0 )  {echo ' <blue>Snow</blue>	'.$wuskydayTime8. '&nbsp;'.$freezing.'';}
else if ($wuskysnow9>0 )  {echo ' <blue>Snow</blue>	'.$wuskydayTime9. '&nbsp;'.$freezing.'';}
else if ($wuskysnow10>0 )  {echo ' <blue>Snow</blue>	'.$wuskydayTime10. '&nbsp;'.$freezing.'';}
//rainfall wu
else if ($wuskyrain>0 )  {echo ' <blue>Rain</blue>	'.$wuskydayTime. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain1>0 )  {echo ' <blue>Rain</blue>	'.$wuskydayTime1.'&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain2>0 )  {echo ' <blue>Rain</blue>	'.$wuskydayTime2.'&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain3>0 )  {echo ' <blue>Rain</blue>	'.$wuskydayTime3. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain4>0 )  {echo ' <blue>Rain</blue>	'.$wuskydayTime4. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain5>0 )  {echo ' <blue>Rain</blue>	'.$wuskydayTime5. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain6>0 )  {echo ' <blue>Rain</blue>	'.$wuskydayTime6. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain7>0 )  {echo ' <blue>Rain</blue>	'.$wuskydayTime7. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain8>0 )  {echo ' <blue>Rain</blue>	'.$wuskydayTime8. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain9>0 )  {echo ' <blue>Rain</blue>	'.$wuskydayTime9. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain10>0 )  {echo ' <blue>Rain</blue>	'.$wuskydayTime10. '&nbsp;'.$rainfallalert8.'';}
//metric heat index wu
else if ($weather["temp_units"]=='C'){
if ($wuskyheatindex>=30 )  {echo "<red>High</red>&nbsp";echo ' Heat Index&nbsp; '.$wuskydayTime. '&nbsp;'.$heatindexwu2.'';}
else if ($wuskyheatindex1>=30 )  {echo "<red>High</red>&nbsp";echo ' Heat Index&nbsp; '.$wuskydayTime1. '&nbsp;'.$heatindexwu2.'';}
else if ($wuskyheatindex2>=30 )  {echo "<red>High</red>&nbsp";echo ' Heat Index&nbsp; '.$wuskydayTime2. '&nbsp;'.$heatindexwu2.'';}
else if ($wuskyheatindex3>=30 )  {echo "<red>High</red>&nbsp";echo ' Heat Index&nbsp; '.$wuskydayTime3. '&nbsp;'.$heatindexwu2.'';}
else if ($wuskyheatindex4>=30 )  {echo "<red>High</red>&nbsp";echo ' Heat Index&nbsp; '.$wuskydayTime4. '&nbsp;'.$heatindexwu2.'';}
}
//non metric heat index wu
else if ($weather["temp_units"]=='F'){	
if ($wuskyheatindex>=86 )  {echo "<red>High</red>&nbsp";echo ' Heat Index&nbsp; '.$wuskydayTime. '&nbsp;'.$heatindexwu2.'';}
	else if ($wuskyheatindex1>=86 )  {echo "<red>High</red>&nbsp";echo ' Heat Index&nbsp; '.$wuskydayTime1. '&nbsp;'.$heatindexwu2.'';}
	else if ($wuskyheatindex2>=86 )  {echo "<red>High</red>&nbsp";echo ' Heat Index&nbsp; '.$wuskydayTime2. '&nbsp;'.$heatindexwu2.'';}
	else if ($wuskyheatindex3>=86 )  {echo "<red>High</red>&nbsp";echo ' Heat Index&nbsp; '.$wuskydayTime3. '&nbsp;'.$heatindexwu2.'';}
	else if ($wuskyheatindex4>=86 )  {echo "<red>High</red>&nbsp";echo ' Heat Index&nbsp; '.$wuskydayTime4. '&nbsp;'.$heatindexwu2.'';}
}
//tomorrow temperature 
//imperial
else if ($weather["temp_units"]=='F'){
if ($wuskydayTempHigh2>80.6 ){  echo "<red>".number_format($wuskydayTempHigh2,0). "°".$weather['temp_units']."</red>&nbsp;", $wuskydayTime2."";}
else if ($wuskydayTempHigh2>66.2 ){  echo "<orange>".number_format($wuskydayTempHigh2,0). "°".$weather['temp_units']."</orange>&nbsp;", $wuskydayTime2."";}
else if ($wuskydayTempHigh2>=55 ){  echo "<yellow>".number_format($wuskydayTempHigh2,0). "°".$weather['temp_units']."</yellow>&nbsp;", $wuskydayTime2."";}
else if ($wuskydayTempHigh2>=44.6 ){  echo "<green>".number_format($wuskydayTempHigh2,0). "°".$weather['temp_units']."</green>&nbsp;", $wuskydayTime2."";}
else if ($wuskydayTempHigh2>-50 ){  echo "<blue>".number_format($wuskydayTempHigh2,0). "°".$weather['temp_units']."</blue>&nbsp;", $wuskydayTime2."";}}
//metric
else if ($weather["temp_units"]=='C'){
if ($wuskydayTempHigh2>27 ){  echo "<red>".number_format($wuskydayTempHigh2,0). "°".$weather['temp_units']."</red>&nbsp;", $wuskydayTime2."";}
else if ($wuskydayTempHigh2>=19 ){  echo "<orange>".number_format($wuskydayTempHigh2,0). "°".$weather['temp_units']."</orange>&nbsp;", $wuskydayTime2."";}
else if ($wuskydayTempHigh2>=12.7 ){  echo "<yellow>".number_format($wuskydayTempHigh2,0). "°".$weather['temp_units']."</yellow>&nbsp;", $wuskydayTime2."";}
else if ($wuskydayTempHigh2>=7 ){  echo "<green>".number_format($wuskydayTempHigh2,0). "°".$weather['temp_units']."</green>&nbsp;", $wuskydayTime2."";}
else if ($wuskydayTempHigh2>-50 ){  echo "<blue>".number_format($wuskydayTempHigh2,0). "°".$weather['temp_units']."</blue>&nbsp;", $wuskydayTime2."";}}
?></div></div></div></div>