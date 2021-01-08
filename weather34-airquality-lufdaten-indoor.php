<?php  include('livedata.php');
 ######################################################
    # https://weather34.com/homeweatherstation/index.html 
    # 	 Luftdaten Indoor                                                                                              
    # 	Released November 2020					  	          
    #   https://www.weather34.com 	                                                                   
    ######################################################
//luftdaten air quality	
$url = 'jsondata/luftdaten.txt'; // luftdaten JSON file
$data = file_get_contents($url); // put the contents of the file into a variable
$weather34luftdaten = json_decode($data,true); // decode the JSON feed
foreach ($weather34luftdaten as $weather34luftdatenaqi) {}
$aqiweather["aqi10"]= $weather34luftdatenaqi['sensordatavalues'][0]['value'];
$aqiweather["aqi25"]=$weather34luftdatenaqi['sensordatavalues'][1]['value'];
$aqiweather["temp"]     = $weather["temp"] ;
$aqiweather["humidity"] = $weather["humidity"] ;
$aqiweather["aqi-type-1"]= $weather34luftdatenaqi['sensordatavalues'][0]['value_type'];
$aqiweather["aqi-type"]=$weather34luftdatenaqi['sensordatavalues'][1]['value_type'];
$aqiweather["aqi-hardware-name"]=$weather34luftdatenaqi['sensor']['sensor_type']['name'];
$aqiweather["aqi-hardware"]=$weather34luftdatenaqi['sensor']['sensor_type']['manufacturer'];
$aqiweather["label"]= $luftdatenID;
if ($aqiweather["aqi-type"]=="P1"){$aqiweather["aqi-type"]="PM 10";}
if ($aqiweather["aqi-type"]=="P2"){$aqiweather["aqi-type"]="PM 2.5";}
if ($aqiweather["aqi-type-1"]=="P2"){$aqiweather["aqi-type-1"]="PM 2.5";}
if ($aqiweather["aqi-type-1"]=="P1"){$aqiweather["aqi-type-1"]="PM 10";}
//$aqiweather["aqi"]= number_format(pm25_to_aqi($aqiweather["aqi"]), 1);
//$aqiweather["aqi2"]= number_format(pm25_to_aqi($aqiweather["aqi2"]), 1);
$aqiweather["aqindex"]= number_format(pm25_to_aqi($aqiweather["aqi25"]), 1);
$a=""; if ($aqiweather["aqi25"]==$a) {$aqiweather["aqi25"] = "N/A" ;}
if ($aqiweather["aqi10"]==$a) {$aqiweather["aqi10"] = "N/A" ;}
$aqiweather["updatedtime"]=$weather34luftdatenaqi['timestamp'];
$aqitime=$weather34luftdatenaqi['timestamp'];
//weather34 convert the UTC to local for Luftdaten timestamp 
$weather34aqitime = strtotime($aqitime .' UTC');
$weather34localtime = date($timeformat,$weather34aqitime);
$aqiupdatetime= $weather34localtime;
?>

<div class="sunblock">
<div class="indoordesc5"> Indoor Air Quality</div> 
<div class="button button-dial-small">      
<div class="button-dial-top-small"></div>
<div class="button-dial-label-small">          
<?php 
if ($aqiweather["aqindex"] >=300){ echo "<purple>".number_format($aqiweather["aqindex"] ,1)."</purple>";}   
else if ($aqiweather["aqindex"] >=200){ echo "<deepred>".number_format($aqiweather["aqindex"] ,1)."</deepred>";}  
else if ($aqiweather["aqindex"] >=150){ echo "<red>".number_format($aqiweather["aqindex"] ,1)."</red>";}  
else if ($aqiweather["aqindex"] >=100){ echo "<orange>".number_format($aqiweather["aqindex"] ,1)."</orange>";}  
else if ($aqiweather["aqindex"] >=50){ echo "<yellow>".number_format($aqiweather["aqindex"] ,1)."</yellow>";}   
else if ($aqiweather["aqindex"] >0){ echo "<green>".number_format($aqiweather["aqindex"] ,1)."</green>";}  
else echo "<red>N/A</red>";  
echo "<smalltempunit2>AQI(US)</smalltempunit2>"
?>  
