<?php  include('livedata.php');
date_default_timezone_set($TZ);
    ####################################################################################################
    #	CREATED FOR WEATHER34 AURORA MKII TEMPLATE 											   #
    # https://weather34.com/homeweatherstation/index.html 											   #
    # 	                                                                                               #
    # 	Revised: April 2020					  	                                                   #
    # 	                                                                                               #
    #   https://www.weather34.com 	                                                                   #
    ####################################################################################################


// Purple Air Sensor data revised November 2020
$json  = file_get_contents("jsondata/purpleair.txt");
$array = json_decode( $json, true );
for ( $i = 0; $i < sizeof( $array['results'] ); $i++ ) {
$array['results'][ $i ]['Stats'] = json_decode( $array['results'][ $i ]['Stats'], true );}
$weather34pm25a    = $array['results'][0]['pm2_5_cf_1'];
$weather34pm25b    = $array['results'][1]['pm2_5_cf_1'];
$aqiweather["pm10"]      = $array['results'][1]['pm10_0_atm'];
$aqiweather["pm25"]      = $array['results'][1]['pm2_5_atm'];
$humidity = $array['results'][0]['humidity']; 
$aqiweather["label"] = $array['results'][0]['Label'];
$aqiweather["city"] = $array['results'][0]['DEVICE_LOCATIONTYPE'];
$aqiweather["voc"]=$array['results'][1]['Voc']; 
$sensor24h  = $array['results'][0]['Stats']['v5'];
$aqiweather["time2"]=$array['results'][1]['LastSeen']; 
$aqiweather["time"]      = date('H:i a', $aqiweather["time2"]);
$aqiweather["aqindex"]      = number_format(pm25_to_aqi(($weather34pm25a + $weather34pm25b ) / 2), 1);
$aqiweather["aqi24h"]      = number_format(pm25_to_aqi(($sensor24h )),1);
$a=""; if ($aqiweather["aqindex"] ==$a) {$aqiweather["aqindex"] = "0" ;}
$aqiweather["pm25"]=number_format($aqiweather["pm25"],1);
$aqiweather["pm10"]=number_format($aqiweather["pm10"],1);

?>
<div class="sunblock">
<div class="indoordesc5">Purple Air</div>
<div class="button button-dial-small">      
<div class="button-dial-top-small"></div>
<div class="button-dial-label-small">          
<?php 
if ($aqiweather["aqindex"] >=300){ echo "<purple>".number_format($aqiweather["aqindex"] ,1)."</purple>";}   
else if ($aqiweather["aqindex"] >=200){ echo "<deepred>".number_format($aqiweather["aqindex"] ,1)."</deepred>";}  
else if ($aqiweather["aqindex"] >=150){ echo "<red>".number_format($aqiweather["aqindex"] ,1)."</red>";}  
else if ($aqiweather["aqindex"] >=100){ echo "<orange>".number_format($aqiweather["aqindex"] ,1)."</orange>";}  
else if ($aqiweather["aqindex"] >=50){ echo "<yellow>".number_format($aqiweather["aqindex"] ,1)."</yellow>";}   
else if ($aqiweather["aqindex"] >=0){ echo "<green>".number_format($aqiweather["aqindex"] ,1)."</green>";}  
?>  

<?php //id index
echo "<indoorpm2>AQI</indoorpm2>";?>
</div>

<div class="indoortempa-mod2aqi" > 
<valuetextheadingindoor>
<?php // weather34 simple css indoor temp scale 
if ($aqiweather["aqindex"] >=300 ){echo "0 50 100 150 200 250 <purple>".$aqiweather["aqindex"] ."</purple>+ ";}
else if ($aqiweather["aqindex"] >=250 ){echo "0 50 100 150 200 <deepred>".$aqiweather["aqindex"] ."</deepred> 300+ ";}
else if ($aqiweather["aqindex"] >=200 ){echo "0 50 100 150 <red>".$aqiweather["aqindex"] ."</red> 250 300+ ";}
else if ($aqiweather["aqindex"] >=150 ){echo "0 50 100 <red>".$aqiweather["aqindex"] ."</red> 150 200 250 300+ ";}
else if ($aqiweather["aqindex"] >=100){echo "0 50 <orange>".$aqiweather["aqindex"] ."</orange> 150 200 250 300+ ";}
else if ($aqiweather["aqindex"] >=50 ){echo "0 <yellow>".$aqiweather["aqindex"] ."</yellow> 100 150 200 250 300+ ";}
else if ($aqiweather["aqindex"] >=0 ){echo "<green>".$aqiweather["aqindex"] ."</green> 50 100 150 200 250 300+ ";}
echo "";
?>
</valuetextheadingindoor>
<div class=sunratebar>
<div class="weather34sunratebar" 
style="width:
<?php echo $aqiweather["aqindex"] *0.30;?>px;
background:
<?php 
if ($aqiweather["aqindex"] >=300 ){echo '#8680bc';}
elseif ($aqiweather["aqindex"] >=200 ){echo '#d87040';}
elseif ($aqiweather["aqindex"] >=150 ){echo '#d87040';}
elseif ($aqiweather["aqindex"] >100 ){echo '#d87040';} 
elseif ($aqiweather["aqindex"] >50){echo '#e6a241';}
elseif ($aqiweather["aqindex"] >0 ){echo '#9bbc2f';}
?>;">
</div></div></div>

<div class="indoortempa-mod3aqi" >  
<?php 
//air description
if ($aqiweather["aqindex"] >=300){echo "Hazordous &nbsp;".$aqalert;}
else if ($aqiweather["aqindex"] >=250){echo "Very Unhealthy &nbsp;".$aqalertsmall;}
else if ($aqiweather["aqindex"] >=200){echo "Very Unhealthy &nbsp;".$aqalertsmall;}
else if ($aqiweather["aqindex"] >=150){echo "Unhealthy &nbsp;".$aqalertsmall;}
else if ($aqiweather["aqindex"] >=100){echo "Unhealthy For Some";}
else if ($aqiweather["aqindex"] >=50){echo "Moderate Risk";}
else if ($aqiweather["aqindex"] >0){echo "Good No Risk";}
?></div>
<div class=aqiid-brand><a href='weather34-aqi-info.php' data-lity data-title="Purple Air Quality"><?php echo  "Extra Data&nbsp;".$chartlinks?></a></div></div>