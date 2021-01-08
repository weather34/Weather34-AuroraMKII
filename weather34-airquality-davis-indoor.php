<?php  include('livedata.php');
    ####################################################################################################
    #			Davis Air Quality 									                                   #
    # https://weather34.com/homeweatherstation/index.html 											   #
    # 	                                                                                               #
    # 	Released September 2020					  	                                                   #
    # 	                                                                                               #
    #   https://www.weather34.com 	                                                                   #
    ####################################################################################################
    $aqiweather["aqindex"]      = number_format(pm25_to_aqi($weather["airquality-davispm25"]), 1);	
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
