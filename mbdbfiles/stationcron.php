<?php include('../settings.php');?>

<?php
// weather34 weather underground  curl based
$url4c = 'https://api.weather.com/v3/wx/forecast/daily/5day?geocode='.$lat.','.$lon.'&language='.$wulanguage.'&format=json&units='.$wuapiunit.'&apiKey='.$wuapikey ;
$ch4c = curl_init($url4c);
$filename4c = '../jsondata/wuforecast.txt';
$complete_save_loc4c = $filename4c;
$fp4c = fopen($complete_save_loc4c, 'wb');
curl_setopt($ch4c, CURLOPT_FILE, $fp4c);
curl_setopt($ch4c, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch4c, CURLOPT_HEADER, 0);
curl_exec($ch4c);
curl_close($ch4c);
fclose($fp4c);?>

<?php // weather34 purple air quality  curl based
if($purpleairhardware=='yes'){
$url4 = 'https://www.purpleair.com/json?show='.$purpleairID.'';
$ch4 = curl_init($url4);
$filename4 = '../jsondata/purpleair.txt';
$complete_save_loc4 = $filename4;
$fp4 = fopen($complete_save_loc4, 'wb');
curl_setopt($ch4, CURLOPT_FILE, $fp4);
curl_setopt($ch4, CURLOPT_HEADER, 0);
curl_exec($ch4);
curl_close($ch4);
fclose($fp4);}
?>

<?php // weather34 luftdaten air quality  curl based
if($luftdatenhardware=='yes'){
//$url9 = 'https://api.luftdaten.info/v1/sensor/'.$luftdatenID.'/';
$url9 = 'https://data.sensor.community/airrohr/v1/sensor/'.$luftdatenID.'/';
$ch9 = curl_init($url9);
$filename9 = '../jsondata/luftdaten.txt';
$complete_save_loc9 = $filename9;
$fp9 = fopen($complete_save_loc9, 'wb');
curl_setopt($ch9, CURLOPT_FILE, $fp9);
curl_setopt($ch9, CURLOPT_HEADER, 0);
curl_exec($ch9);
curl_close($ch9);
fclose($fp9);}
?>

<?php 
if ($metar=='yes'){
// extras added march 23rd 2016 //
date_default_timezone_set($TZ);
$date = date_create();
$w34header= array(
            "X-API-KEY:".$metarapikey."",);
$ch = curl_init();
$filename2 = '../jsondata/metar34.txt';
$complete_save_loc2 = $filename2;
$fp2 = fopen($complete_save_loc2, 'wb');
curl_setopt($ch, CURLOPT_URL,"https://api.checkwx.com/metar/".$icao1."/decoded");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER,$w34header);
curl_setopt($ch, CURLOPT_FILE, $fp2);
$result = curl_exec ($ch);
curl_close ($ch);}
?>



<?php 
//earthquake
$json5 =file_get_contents('https://www.seismicportal.eu/fdsnws/event/1/query?limit=10&lat='.$lat.'&lon='.$lon.'&maxradius=10&format=json&minmag=2');
$file5 = '../jsondata/eqnotification.txt';file_put_contents($file5, $json5);
?>