<?php include('livedata.php');
########################################################
#	CREATED FOR WEATHER34 Aurora MKII TEMPLATE  		              						                
# https://weather34.com/homeweatherstation/index.html 											                        
# 	                                                                                               
# 	Release: December 2020 Version Aurora MKII   
#   Revised: January 2021			  	                                           
########################################################
// weather34 pure csv without mysql extras built September 2018 finished June 2019//
date_default_timezone_set($TZ);
$date = date_create();
$id=00;
$aqiweather["aqindex"]      = number_format(pm25_to_aqi($weather["airquality-davispm25"]), 1);	
//disable error logging if you get server errors
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);ini_set("display_errors","off");
//path is weather34charts/year/day.csv (eg: weathercharts/2019/24Jun2019.csv )
$weatherchartfile = "weather34charts/".date('Y')."/".date('jMY').".csv";
//ID-0,time(1),outsideTemp(2),barometer(3),raintoday(4),UV(5),windgustmph(6),windSpeedAvg(7),radiation(8),dewpoint(9),rainrate(10),direction(11),indoortemp(12),indoorhumidity(13),date(14),dewpoint(15),wetbulb(16),humidity(17),airquality(18)
if ($meteobridgeapi[43]=='--'){$meteobridgeapi[43]=0;}
if ($meteobridgeapi[45]=='--'){$meteobridgeapi[45]=0;}
$weather34chartdata   = $id.",".date('H:i').",".$meteobridgeapi[2].",".$meteobridgeapi[10].",".$meteobridgeapi[9].",".$meteobridgeapi[43].",".$meteobridgeapi[40].",".$meteobridgeapi[17].",".$meteobridgeapi[45].",".$meteobridgeapi[4].",".$meteobridgeapi[8].",".$meteobridgeapi[7].",".$meteobridgeapi[22].",".$meteobridgeapi[23].",".date('j M').",".$weather['realfeel'].",".$weather['wetbulb'].",".$weather["humidity"].",".$aqiweather['aqindex'].""."\r\n";
$output=$weatherchartfile;
$fp = fopen($weatherchartfile, 'a+'); 
fwrite($fp,$weather34chartdata); 
fclose($fp);
?>

<?php  // with PURPLE AIR additional conversion script included by Andrew Billits 24 April 2018 charts
if($purpleairhardware=='yes'){
// Purple Air Sensor data revised November 2020
$json  = file_get_contents("jsondata/purpleair.txt");
$array = json_decode( $json, true );
for ( $i = 0; $i < sizeof( $array['results'] ); $i++ ) {
$array['results'][ $i ]['Stats'] = json_decode( $array['results'][ $i ]['Stats'], true );}
$weather34pm25a    = $array['results'][0]['pm2_5_cf_1'];
$weather34pm25b    = $array['results'][1]['pm2_5_cf_1'];
$aqiweather["pm10"]      = $array['results'][1]['pm10_0_atm'];
$aqiweather["pm25"]      = $array['results'][1]['pm2_5_atm'];
$sensor24h  = $array['results'][0]['Stats']['v5'];
$aqiweather["aqindex"]      = number_format(pm25_to_aqi(($weather34pm25a + $weather34pm25b ) / 2), 1);
$aqiweather["aqi24h"]      = number_format(pm25_to_aqi(($sensor24h )),1);
$aqiweather["pm25"]=number_format($aqiweather["pm25"],1);
$aqiweather["pm10"]=number_format($aqiweather["pm10"],1);

$airchartfile = "weather34charts/".date('Y')."/".date('jMY')."airquality.csv";
$airchartdata   = $id.",".date('H:i').",".$aqiweather["aqindex"].""."\r\n";
$output=$airchartfile;
$fp2 = fopen($airchartfile, 'a+'); 
fwrite($fp2,$airchartdata); 
fclose($fp2);
}
else "do nothing";
?>

<?php  // with AIR additional conversion script included by Andrew Billits 24 April 2018 charts
if($luftdatenhardware=='yes'){
$url = 'jsondata/luftdaten.txt'; // luftdaten JSON file
$data = file_get_contents($url); // put the contents of the file into a variable
$weather34luftdaten = json_decode($data,true); // decode the JSON feed
foreach ($weather34luftdaten as $weather34luftdatenaqi) {}
$aqiweather["aqi25"]     = $weather34luftdatenaqi['sensordatavalues'][1]['value'];
$aqiweather["aqindex"]= number_format(pm25_to_aqi($aqiweather["aqi25"]), 1);
$airchartfile1 = "weather34charts/".date('Y')."/".date('jMY')."airquality-luftdaten.csv";
$airchartdata1   = $id.",".date('H:i').",".$aqiweather["aqindex"].""."\r\n";
$output=$airchartfile1;
$fp23 = fopen($airchartfile1, 'a+'); 
fwrite($fp23,$airchartdata1); 
fclose($fp23);
}
else "do nothing";
?>