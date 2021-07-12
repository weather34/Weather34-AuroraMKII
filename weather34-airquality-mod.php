<?php  include('livedata.php');
date_default_timezone_set($TZ);
    #################################################################
    #	CREATED FOR WEATHER34 AURORA MKII									   
    # https://weather34.com/homeweatherstation/index.html 											   
    # 	                                                                                               
    # 	Revised: DECEMEBER 2020					Air Quality Purple Air        
    #   https://www.weather34.com 	                                                                  
    ###################################################################

    $json  = file_get_contents("jsondata/purpleair.txt");
    $array = json_decode( $json, true );for ( $i = 0; $i < sizeof( $array['results'] ); $i++ ) {$array['results'][ $i ]['Stats'] = json_decode( $array['results'][ $i ]['Stats'], true );}
    $weather34pm25a    = $array['results'][0]['pm2_5_cf_1'];
    $weather34pm25b    = $array['results'][1]['pm2_5_cf_1'];
    $aqiweather["pm10"]      = $array['results'][1]['pm10_0_atm'];
    $aqiweather["pm25"]      = $array['results'][1]['pm2_5_atm'];
    $humidity = $array['results'][0]['humidity']; 
    $aqiweather["label"] = $array['results'][0]['Label'];
    $aqiweather["positioned"] = $array['results'][0]['DEVICE_LOCATIONTYPE'];//indoor or outside
    $aqiweather["voc"]=$array['results'][1]['Voc']; 
    $sensor24h  = $array['results'][0]['Stats']['v5'];
    $sensor1h  = $array['results'][0]['Stats']['v3'];
    $sensor6h  = $array['results'][0]['Stats']['v4'];
    $aqiweather["aqi1h"]= number_format($sensor1h,1);
    $aqiweather["aqi6h"]= number_format($sensor6h,1);
    $aqiweather["time2"]=$array['results'][1]['LastSeen']; 
    $aqiweather["time"]= date($timeformat, $aqiweather["time2"]);     
    $aqiweather["aqi"]      = number_format(pm25_to_aqi(($weather34pm25a + $weather34pm25b ) / 2), 1);
    $aqiweather["aqi24h"]      = number_format(pm25_to_aqi(($sensor24h )),1);
    $a=""; if ($aqiweather["aqi"] ==$a) {$aqiweather["aqi"] = "0" ;}

?>
<div class="modulecaption2">Purple Air </div>
<uvheading style="margin-left:-35px">PM2.5 (EPA)</uvheading>
<div class="button button-dialrain">               
 <div class="button-dial-toprain"></div>
<div class="button-dial-label"> 
<?php echo "<uvreadings style='opacity:0.8;background:";
if ($aqiweather["aqi"]>=300 ){echo 'var(--purple)';}
elseif ($aqiweather["aqi"]>=250 ){echo 'var(--red)';}
elseif ($aqiweather["aqi"]>=150 ){echo 'var(--red)';}
elseif ($aqiweather["aqi"]>=100 ){echo 'var(--orange)';}
elseif ($aqiweather["aqi"]>=50 ){echo 'var(--yellow)';}
elseif ($aqiweather["aqi"]>0 ){echo 'var(--green)';}
echo "'>";
echo "<uvopacity>".number_format($aqiweather["aqi"],1)."</uvopacity></uvreadings";
?>  
</div></div></div>

<div class="weather34i-rairate-bar2" >
<div id="raincontainer2">
<div id="weather34rainbeaker2">
  <?php //scale
  echo "<volume>300+ <br>250 <br>200 <br>150 <br>100 <br> </volume>";  
  ?>
<div id="weather34rainwater2" style="height:<?php 

if ($aqiweather["aqi"]>200){echo $aqiweather["aqi"]*0.16;}
else if ($aqiweather["aqi24h"]>150){echo $aqiweather["aqi"]*0.15;}
else if ($aqiweather["aqi"]>100){echo $aqiweather["aqi"]*0.14;}
else echo $aqiweather["aqi"]*0.10;?>pt;
opacity:0.7;background:
<?php //color
if ($aqiweather["aqi"]>=300 ){echo 'var(--purple)';}
elseif ($aqiweather["aqi"]>=250 ){echo 'var(--red)';}
elseif ($aqiweather["aqi"]>=150 ){echo 'var(--red)';}
elseif ($aqiweather["aqi"]>=100 ){echo 'var(--orange)';}
elseif ($aqiweather["aqi"]>=50 ){echo 'var(--yellow)';}
elseif ($aqiweather["aqi"]>0 ){echo 'var(--green)';}
?>">        
</div></div></div>

<div class="second24hourguage">
  <?php echo "<solarheading style='margin-left:-35px'>24H Average</solarheading>";?>
<div class="button button-dialrain">               
 <div class="button-dial-toprain"></div>
<div class="button-dial-label"> 
<?php echo "<uvreadings style='opacity:0.8;background:";
if ($aqiweather["aqi24h"]>=300 ){echo 'var(--purple)';}
elseif ($aqiweather["aqi24h"]>=250 ){echo 'var(--red)';}
elseif ($aqiweather["aqi24h"]>=150 ){echo 'var(--red)';}
elseif ($aqiweather["aqi24h"]>=100 ){echo 'var(--orange)';}
elseif ($aqiweather["aqi24h"]>=50 ){echo 'var(--yellow)';}
elseif ($aqiweather["aqi24h"]>0 ){echo 'var(--green)';}
echo "'>";
echo "<uvopacity>".number_format($aqiweather["aqi24h"],1)."</uvopacity></uvreadings";
?>  
</div></div></div>
<div class="weather34i-rairate-bar2">
<div id="raincontainer2">
<div id="weather34rainbeaker2">
  <?php //relative scale
  echo "<volume>300+ <br>250 <br>200 <br>150 <br>100 <br> </volume>";  
  ?>
<div id="weather34rainwater2" style="height:<?php 
if ($aqiweather["aqi24h"]>200){echo $aqiweather["aqi24h"]*0.16;}
else if ($aqiweather["aqi24h"]>150){echo $aqiweather["aqi24h"]*0.15;}
else if ($aqiweather["aqi24h"]>100){echo $aqiweather["aqi24h"]*0.14;}
else echo $aqiweather["aqi24h"]*0.10;
?>pt;opacity:0.7;background:
<?php //color
if ($aqiweather["aqi24h"]>=300 ){echo 'var(--purple)';}
elseif ($aqiweather["aqi24h"]>=250 ){echo 'var(--red)';}
elseif ($aqiweather["aqi24h"]>=150 ){echo 'var(--red)';}
elseif ($aqiweather["aqi24h"]>=100 ){echo 'var(--orange)';}
elseif ($aqiweather["aqi24h"]>=50 ){echo 'var(--yellow)';}
elseif ($aqiweather["aqi24h"]>0 ){echo 'var(--green)';}?>">        
</div></div></div></div></div></div></div>

<div class="rainrateextra1">
<div class=extrainfo2 style="margin-top:15px"><a href='weather34-aqi-info.php' data-lity data-title="Air Quality Data"><?php echo  "Extra Data&nbsp;".$chartlinks?></a></div></div>
<div class="weather-tempicon-identity"></div></div>
