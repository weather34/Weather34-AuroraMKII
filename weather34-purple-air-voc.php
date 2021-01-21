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
if($aqiweather["voc"] >=5000){ echo "<red>".$aqiweather["voc"]."</red>";}
else if($aqiweather["voc"] >=2000){ echo "<orange>".$aqiweather["voc"]."</orange>";}
else if($aqiweather["voc"] >=1500){ echo "<yellow>".$aqiweather["voc"]."</yellow>";}
else if($aqiweather["voc"] >0){ echo "<green>".$aqiweather["voc"]."</green>";}
else if($aqiweather["voc"] ==''){echo "<orange>N/A</orange>";}
echo "  <pm25>  </pm25>";?>



<?php //AQI
echo "<indoorpm2 style='margin-left:-3px'>VOC</indoorpm2>";?>
</div>

<div class="indoortempa-mod2aqi" > 
<valuetextheadingindoor>
<?php // weather34 simple css indoor temp scale 
if ($aqiweather["voc"]>=5000 ){echo "0 1000 2000 3000 4000 <red>".round($aqiweather["voc"],1)."</red> ";}
else if ($aqiweather["voc"]>=2000 ){echo "0 100 500 1000 1500 <orange>".round($aqiweather["voc"],1)."</orange> ";}
else if ($aqiweather["voc"]>=1500){echo "0 100 500 1000 1200 <yellow>".round($aqiweather["voc"],1)."</yellow> ";}
else if ($aqiweather["voc"]>1000 ){echo "0 200 500 700 800 <green>".round($aqiweather["voc"],0)."</green> ";}
else if ($aqiweather["voc"]>500 ){echo "0 200 500 <green>".number_format($aqiweather["voc"],1)."</green> 1000 1500";}
else if ($aqiweather["voc"]>300 ){echo "0 200 <green>".number_format($aqiweather["voc"],1)."</green> 500 1000 1500";}
else if ($aqiweather["voc"]>200 ){echo "0 50 <green>".number_format($aqiweather["voc"],1)."</green> 200 300 400 ";}
else if ($aqiweather["voc"]>100 ){echo "0 50 <green>".number_format($aqiweather["voc"],1)."</green> 200 300 400 ";}
else if ($aqiweather["voc"]>0 ){echo "<green>".number_format($aqiweather["voc"],1)."</green> 100 200 300 400 ";}
else echo "<orange>Not Avalaible</orange>";


?>
</valuetextheadingindoor>
<div class=sunratebar>
<div class="weather34sunratebar" 
style="width:
<?php echo $aqiweather["voc"]*0.090;?>px;
background:
<?php 
if ($aqiweather["voc"] >=5000 ){echo '#d35f50';}
elseif ($aqiweather["voc"]>2000){echo ' #d87040';}
elseif ($aqiweather["voc"]>1500){echo '#e6a241';}
elseif ($aqiweather["voc"]>0 ){echo '#9bbc2f';}
?>;"> 
</div></div></div>
<div class="indoortempa-mod3aqi" >  

<?php 
//air description
echo '';
if ($aqiweather["voc"] >=5000){echo "Warning Unhealthy ";}
else if ($aqiweather["voc"] >=2000){echo "Unhealthy Situation";}
else if ($aqiweather["voc"] >=1500){echo "Moderate Risk";}
else if ($aqiweather["voc"] >0){echo "No Risk";}

?></div>
<div class=aqiid-brand><a href='weather34-aqi-info.php' data-lity data-title="Purple Air VOC"><?php echo  $aqilinks?>&nbsp; Extra Info</a></div></div>
</div>