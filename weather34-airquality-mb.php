<?php  include('livedata.php');
date_default_timezone_set($TZ);
    ####################################################################################################
    #	CREATED FOR HOMEWEATHERSTATION MB SMART TEMPLATE 											   #
    # https://weather34.com/homeweatherstation/index.html 											   #
    # 	                                                                                               #
    # 	Revised: October 2020       			  	                                                   #
    # 	                                                                                               #
    #   https://www.weather34.com 	                                                                   #
    ####################################################################################################
// AIR QUALITY based on original additional conversion script by Andrew Billits 24 April 2018

$aqiweather["aqindex"]     = number_format(pm25_to_aqi($meteobridgeapi[175]), 1);
//$aqiweather["aqindex"]     = $meteobridgeapi[175];
?>

<div class="sunblock">
<div class="indoordesc3">AQI</div>
<div class="button button-dial-small">      
<div class="button-dial-top-small"></div>
<div class="button-dial-label-small">          
<?php 
if ($aqiweather["aqindex"]>=300){ echo "<purple>".number_format($aqiweather["aqindex"],1)."</purple>";}   
else if ($aqiweather["aqindex"]>=200){ echo "<deepred>".number_format($aqiweather["aqindex"],1)."</deepred>";}  
else if ($aqiweather["aqindex"]>=150){ echo "<red>".number_format($aqiweather["aqindex"],1)."</red>";}  
else if ($aqiweather["aqindex"]>=100){ echo "<orange>".number_format($aqiweather["aqindex"],1)."</orange>";}  
else if ($aqiweather["aqindex"]>=50){ echo "<yellow>".number_format($aqiweather["aqindex"],1)."</yellow>";}   
else if ($aqiweather["aqindex"]>=0){ echo "<green>".number_format($aqiweather["aqindex"],1)."</green>";}  
?>  

<?php //feels like man
echo "<indoorpm2>AQI</indoorpm2>";?>
</div>

<div class="indoortempa-mod2aqi" > 
<valuetextheadingindoor>
<?php // weather34 simple css indoor temp scale 
if ($aqiweather["aqindex"]>=300 ){echo "0 50 100 150 200 250 <purple>300</purple>+ ";}
else if ($aqiweather["aqindex"]>=250 ){echo "0 50 100 150 200 <deepred>250</deepred> 300+ ";}
else if ($aqiweather["aqindex"]>=200 ){echo "0 50 100 150 <red>200</red> 250 300+ ";}
else if ($aqiweather["aqindex"]>=150 ){echo "0 50 100 <red>150</red> 150 200 250 300+ ";}
else if ($aqiweather["aqindex"]>=100){echo "0 50 <orange>100</orange> 150 200 250 300+ ";}
else if ($aqiweather["aqindex"]>=50 ){echo "0 <yellow>50</yellow> 100 150 200 250 300+ ";}
else if ($aqiweather["aqindex"]>=0 ){echo "<green>0</green> 50 100 150 200 250 300+ ";}
echo "";
?>
</valuetextheadingindoor>
<div class=sunratebar>
<div class="weather34sunratebar" 
style="width:
<?php echo $aqiweather["aqindex"]*0.30;?>px;
background:
<?php 
if ($aqiweather["aqindex"] >=300 ){echo '#8680bc';}
elseif ($aqiweather["aqindex"] >=200 ){echo '#d35f50';}
elseif ($aqiweather["aqindex"] >=150 ){echo '#d35f50';}
elseif ($aqiweather["aqindex"] >=100 ){echo '#d87040';} 
elseif ($aqiweather["aqindex"]>50){echo '#e6a241';}
elseif ($aqiweather["aqindex"]>0 ){echo '#9bbc2f';}
?>;">
</div></div></div>

<div class="indoortempa-mod3aqi" >  

<?php 
//air description
echo '';
if ($aqiweather["aqindex"] >=300){echo "Hazordous &nbsp;".$aqalert;}
else if ($aqiweather["aqindex"] >=250){echo "Very Unhealthy &nbsp;".$aqalertsmall;}
else if ($aqiweather["aqindex"] >=200){echo "Very Unhealthy &nbsp;".$aqalertsmall;}
else if ($aqiweather["aqindex"] >=150){echo "Unhealthy &nbsp;".$aqalertsmall;}
else if ($aqiweather["aqindex"] >=100){echo "Unhealthy For Some";}
else if ($aqiweather["aqindex"] >=50){echo "Moderate Risk";}
else if ($aqiweather["aqindex"] >0){echo "Good No Risk";}

?>

</div></div>