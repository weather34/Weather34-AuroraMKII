<?php 
	####################################################################################################
	#	HOME WEATHER STATION TEMPLATE by BRIAN UNDERDOWN 2015-2016-2017                                #
	#	CREATED FOR WEATHER34 TEMPLATE at 													   		   #
	#   https://weather34.com/homeweatherstation/index.html 										   # 
	# 	WEATHER STATION TEMPLATE 2015-2020                 										       #
	# 	     Version Revised April 2020				 								                   #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################
//original weather34 script original css/svg/php by weather34 2015-2020 clearly marked as original by weather34//
include('livedata.php');header('Content-type: text/html; charset=utf-8');
$aqiweather["aqi"]      = number_format(pm25_to_aqi($weather["airquality-davispm25"]), 1);	
?>
<div class="aqblock">
<div class="indoordesc2">Air Quality</div>
<div class="button button-dial-small-aq">      
<div class="button-dial-top-small-aq"></div>
<div class="button-dial-label-small-aq">          
<?php 
if ($aqiweather["aqi"]>=300){ echo "<purple>".number_format($aqiweather["aqi"],1)."</purple>";}   
else if ($aqiweather["aqi"]>=200){ echo "<deepred>".number_format($aqiweather["aqi"],1)."</deepred>";}  
else if ($aqiweather["aqi"]>=150){ echo "<red>".number_format($aqiweather["aqi"],1)."</red>";}  
else if ($aqiweather["aqi"]>=100){ echo "<orange>".number_format($aqiweather["aqi"],1)."</orange>";}  
else if ($aqiweather["aqi"]>=50){ echo "<yellow>".number_format($aqiweather["aqi"],1)."</yellow>";}   
else if ($aqiweather["aqi"]>=0){ echo "<green>".number_format($aqiweather["aqi"],1)."</green>";}  
echo "";
?>  

<?php //location
echo "<indoorpm style='font-size:.7em;line-height:1'>";?>
<?php 
//air description
echo '';
if ($aqiweather["aqi"] >=300){echo "Hazordous &nbsp;".$aqalert;}
else if ($aqiweather["aqi"] >=250){echo "Very Unhealthy &nbsp;".$aqalertsmall;}
else if ($aqiweather["aqi"] >=200){echo "Very Unhealthy &nbsp;".$aqalertsmall;}
else if ($aqiweather["aqi"] >=150){echo "Unhealthy &nbsp;".$aqalertsmall;}
else if ($aqiweather["aqi"] >=100){echo "Unhealthy For Some";}
else if ($aqiweather["aqi"] >=50){echo "Moderate Risk";}
else if ($aqiweather["aqi"] >0){echo "Good No Risk";}
else echo "<red>N/A</red>";?></indoorpm>
</div>





<div class="weather-aqi-identity">    
<?php //indoor temperature id
//aqi icon
if($aqiweather["aqi"]>=300){ echo "<img src=aqi/hazair.svg width='80px'>";}
else if($aqiweather["aqi"]>=200){ echo "<img src=aqi/vhair.svg width='80px'>";}
else if($aqiweather["aqi"]>=150){ echo "<img src=aqi/uhair.svg width='80px'>";}
else if($aqiweather["aqi"]>=100){ echo "<img src=aqi/uhfsair.svg width='80px'>";}
else if($aqiweather["aqi"]>=50){ echo "<img src=aqi/modair.svg width='80px'>";}
else if($aqiweather["aqi"]>=0){ echo "<img src=aqi/goodair.svg width='80px'>";}

 ?>
</div>


