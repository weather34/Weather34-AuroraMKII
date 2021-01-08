<?php  include('livedata.php');
date_default_timezone_set($TZ);
    #########################################################
    #	CREATED FOR Weather34                               										  
    # https://weather34.com/homeweatherstation/index.html 
    # 	Revised: October 2020   				  	            
    # 	                                          
    #   https://www.weather34.com 	                                                                  
    ########################################################
    //luftdaten air quality	SCRIPT 
    // Purple Air Sensor data revised November 2020
//\"v\":1.07, // Real time or current PM2.5 Value
//\"v1\":1.3988595758168765, // Short term (10 minute average)
//\"v2\":10.938131480857114, // 30 minute average
//\"v3\":15.028685608345926, // 1 hour average
//\"v4\":6.290537580116773, // 6 hour average
//\"v5\":1.8393146177050788, // 24 hour average
$json  = file_get_contents("jsondata/purpleair.txt");
$array = json_decode( $json, true );for ( $i = 0; $i < sizeof( $array['results'] ); $i++ ) {$array['results'][ $i ]['Stats'] = json_decode( $array['results'][ $i ]['Stats'], true );}
$aqiweather["voc"]=$array['results'][1]['Voc']; 
?>

<div class="sunblock">
<div class="indoordesc5">VOC</div>
<div class="button button-dial-small">      
<div class="button-dial-top-small"></div>
<div class="button-dial-label-small">   
<?php //voc
if($aqiweather["voc"] >=400){ echo "<red>".$aqiweather["voc"]."</red>";}
else if($aqiweather["voc"] >=201){ echo "<orange>".$aqiweather["voc"]."</orange>";}
else if($aqiweather["voc"] >=101){ echo "<yellow>".$aqiweather["voc"]."</yellow>";}
else if($aqiweather["voc"] >0){ echo "<green>".$aqiweather["voc"]."</green>";}
else { echo "<orange>N/A</orange>";}
echo "  <pm25>  </pm25>";?>



<?php //AQI
echo "<indoorpm2 style='margin-left:-3px'>VOC</indoorpm2>";?>
</div>

<div class="indoortempa-mod2aqi" > 
<valuetextheadingindoor>
<?php // weather34 simple css indoor temp scale 
if ($aqiweather["voc"]>=400 ){echo "0 50 100 200 <red>".number_format($aqiweather["voc"],1)."</red> ";}
else if ($aqiweather["voc"]>=201 ){echo "0 50 100 <orange>".number_format($aqiweather["voc"],1)."</orange> ";}
else if ($aqiweather["voc"]>=101){echo "0 50 <yellow>".number_format($aqiweather["voc"],1)."</yellow> 200 250 300+ ";}
else if ($aqiweather["voc"]>0 ){echo "<green>".number_format($aqiweather["voc"],1)."</green> 90 ";}
else echo "<orange>Not Avalaible</orange>";


?>
</valuetextheadingindoor>
<div class=sunratebar>
<div class="weather34sunratebar" 
style="width:
<?php echo $aqiweather["voc"]*0.20;?>px;
background:
<?php 
if ($aqiweather["voc"] >=400 ){echo '#d35f50';}
elseif ($aqiweather["voc"]>201){echo ' #d87040';}
elseif ($aqiweather["voc"]>101){echo '#e6a241';}
elseif ($aqiweather["voc"]>0 ){echo '#9bbc2f';}
?>;"> 
</div></div></div>
<div class="indoortempa-mod3aqi" >  

<?php 
//air description
echo '';
if ($aqiweather["voc"] >=500){echo "Unhealthy";}
else if ($aqiweather["voc"] >=500){echo "Becoming Unhealthy";}
else if ($aqiweather["voc"] >=101){echo "Moderate Risk";}
else if ($aqiweather["voc"] >0){echo "Good No Risk";}

?></div>
<div class=aqiid-brand><a href='weather34-aqi-info.php' data-lity data-title="Purple Air VOC"><?php echo  $aqilinks?>&nbsp; Extra Info</a></div></div>
</div>