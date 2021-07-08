<?php include('livedata.php');
    #######################################################
	#	CREATED FOR Aurora MKII version								   							   
	# https://weather34.com/homeweatherstation/index.html 	
	# 	     Creates and adds month and year  csv data  
	# 	Updated Release: Revised January 2021		
	# 	                                                                                               
	#   https://www.weather34.com 	                                                                   
	#######################################################
//0 (date-month-0)),
//1 MAX(yesterday Temp-1-$meteobridgeapi[82]) 
//2 MIN(yesterday Temp-2-$meteobridgeapi[84])
//3 MAX(yesterday Dewpoint-3-$meteobridgeapi[52]) 
//4 MIN(yesterday Dewpoint-4-$meteobridgeapi[120])
// 5 TOTAL(yesterday Rain total-5-$meteobridgeapi[100])
// 6 MAX(yesterday Windspeed-6-$meteobridgeapi[94])
// 7 AVG(yesterday WindSpeed-7-$meteobridgeapi[123])
// 8 not currently used $meteobridgeapi[--] * reserved 
// 9 MAX(yesterday Barometer-9-$meteobridgeapi[135])
// 10 MIN(yesterday Barometer-10-$meteobridgeapi[137])
//11 Max( yesterday UV-11-$meteobridgeapi[114])
//12 Max( yesterday SOLAR-12-$meteobridgeapi[107])
//13 Purple Air(13-$aqiweather["aqi24h"]) *if yes 
//14 AIRQ 24H(14-$meteobridgeapi[184]) * Davis Airlink 
//15 yesterday Wind DIRECTION average (15-$meteobridgeapi[171])

date_default_timezone_set($TZ);
$date = date_create();
$year=date('Y');
//disable error logging if you get server errors
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);ini_set("display_errors","off");
// with PURPLE AIR additional conversion script included by Andrew Billits 24 April 2018 charts
if($purpleairhardware=='yes'){
// Purple Air Sensor data revised November 2020
$json  = file_get_contents("jsondata/purpleair.txt");
$array = json_decode( $json, true ); 
for ( $i = 0; $i < sizeof( $array['results'] ); $i++ ) {$array['results'][ $i ]['Stats'] = json_decode( $array['results'][ $i ]['Stats'], true );}
$sensor24h  = $array['results'][0]['Stats']['v5'];
$aqiweather["aqi24h"]      = number_format(pm25_to_aqi(($sensor24h )),1);}
$meteobridgeapi[184] = number_format(pm25_to_aqi(($meteobridgeapi[184])),1);

//create the current month file example folder/file path = weather34charts/2021/July.csv

// [DD][MM] , [th0temp-ydmax:--] , [th0temp-ydmin:--] , [th0dew-ydmax:--] , [th0dew-ydmin:--] , [rain0total-ydmax:--] , [wind0wind-ydmax:--] , [wind0wind-ydavg:—] , [position 8 not used] ,  [thb0seapress-ydmax:--] , [thb0seapress-ydmin:--] ,  [uv0index-ydmax:--] , [sol0rad-ydmax:--] , [air0pm-ydavg:—] , [air1pm-ydavg:—] , [wind0dir-ydavg:--]
$weatherchartfilemonth ="weather34charts/".$year."/".date('F').".csv";
$weather34chartdata = date('j M',strtotime("-1 day")).",".$meteobridgeapi[82].",".$meteobridgeapi[84].",".$meteobridgeapi[52].",".$meteobridgeapi[120].",".$meteobridgeapi[100].",".$meteobridgeapi[94].",".$meteobridgeapi[123].",".$meteobridgeapi[123].",".$meteobridgeapi[135].",".$meteobridgeapi[137].",".$meteobridgeapi[114].",".$meteobridgeapi[107].",".$aqiweather["aqi24h"].",".$meteobridgeapi[184].",".$meteobridgeapi[171].""."\r\n";
//$output=$weatherchartfilemonth;
$fp = fopen($weatherchartfilemonth, 'a+'); 
fwrite($fp,$weather34chartdata); 
fclose($fp);
//create the year file example folder/file path = weather34charts/2021.csv
$weatherchartfileyear = "weather34charts/".date('Y').".csv";
$weather34chartdata1  = date('j M',strtotime("-1 day")).",".$meteobridgeapi[82].",".$meteobridgeapi[84].",".$meteobridgeapi[52].",".$meteobridgeapi[120].",".$meteobridgeapi[100].",".$meteobridgeapi[94].",".$meteobridgeapi[123].",".$meteobridgeapi[123].",".$meteobridgeapi[135].",".$meteobridgeapi[137].",".$meteobridgeapi[114].",".$meteobridgeapi[107].",".$aqiweather["aqi24h"].",".$meteobridgeapi[184].",".$meteobridgeapi[171].""."\r\n";
//$output1=$weatherchartfileyear;
$fp1 = fopen($weatherchartfileyear, 'a+'); 
fwrite($fp1,$weather34chartdata1); 
fclose($fp1);
?>



