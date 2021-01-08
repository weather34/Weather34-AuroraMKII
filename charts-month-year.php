<?php include('livedata.php');
########################################################
#	CREATED FOR WEATHER34 Aurora MKII TEMPLATE  		              						                
# https://weather34.com/homeweatherstation/index.html 											                        
# 	                                                                                               
# 	Release: December 2020 Version Aurora MKII   
#   Revised: January 2021			  	                                           
########################################################
// weather34 pure csv without mysql original compiled September 2018 //

//(date month-year-0)),
//MAX(Temp-1-$meteobridgeapi[26])
//MIN(Temp-2-$meteobridgeapi[28])
//MAX(Dewpoint-3-$meteobridgeapi[63])
//MIN(Dewpoint-4-$meteobridgeapi[65])
//TOTAL(Raintoday-5-$meteobridgeapi[9])
//MAX(Windspeed-6-$meteobridgeapi[32])
//AVG(Day WindSpeed-7-$meteobridgeapi[158])
//AVG(Temp-8-$meteobridgeapi[123])
//MAX(Barometer-9-$meteobridgeapi[34])
//MIN(Barometer-10-$meteobridgeapi[36])
//Max(UV-11-$meteobridgeapi[58])
//Max(SOLAR-12-$meteobridgeapi[105])
//Purple Air(13-$aqiweather["aqi24h"]) *if yes 
//AIRQ 24H(14-$meteobridgeapi[184])
//Wind DIRECTION AVG(15-$meteobridgeapi[188])

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
for ( $i = 0; $i < sizeof( $array['results'] ); $i++ ) {
$array['results'][ $i ]['Stats'] = json_decode( $array['results'][ $i ]['Stats'], true );}
$sensor24h  = $array['results'][0]['Stats']['v5'];
$aqiweather["aqi24h"]      = number_format(pm25_to_aqi(($sensor24h )),1);
}
$meteobridgeapi[184] = number_format(pm25_to_aqi(($meteobridgeapi[184])),1);

//create the current month file example folder/file path = weathercharts/2019/July.csv
$weatherchartfilemonth ="weather34charts/".$year."/".date('F').".csv";
$weather34chartdata = date('j M').",".$meteobridgeapi[26].",".$meteobridgeapi[28].",".$meteobridgeapi[63].",".$meteobridgeapi[65].",".$meteobridgeapi[9].",".$meteobridgeapi[32].",".$meteobridgeapi[158].",".$meteobridgeapi[123].",".$meteobridgeapi[34].",".$meteobridgeapi[36].",".$meteobridgeapi[58].",".$meteobridgeapi[105].",".$aqiweather["aqi24h"].",".$meteobridgeapi[184].",".$meteobridgeapi[188].""."\r\n";
//$output=$weatherchartfilemonth;
$fp = fopen($weatherchartfilemonth, 'a+'); 
fwrite($fp,$weather34chartdata); 
fclose($fp);

//create the year file example folder/file path = weather34charts/2019.csv
$weatherchartfileyear = "weather34charts/".date('Y').".csv";
$weather34chartdata1  = date('j M').",".$meteobridgeapi[26].",".$meteobridgeapi[28].",".$meteobridgeapi[63].",".$meteobridgeapi[65].",".$meteobridgeapi[9].",".$meteobridgeapi[32].",".$meteobridgeapi[158].",".$meteobridgeapi[123].",".$meteobridgeapi[34].",".$meteobridgeapi[36].",".$meteobridgeapi[58].",".$meteobridgeapi[105].",".$aqiweather["aqi24h"].",".$meteobridgeapi[184].",".$meteobridgeapi[188].""."\r\n";
//$output1=$weatherchartfileyear;
$fp1 = fopen($weatherchartfileyear, 'a+'); 
fwrite($fp1,$weather34chartdata1); 
fclose($fp1);
?>



