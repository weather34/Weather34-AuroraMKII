<?php  include('livedata.php');
    ##########################################################
    #			Davis Air Quality 									              
    # https://weather34.com/homeweatherstation/index.html 
    # 	Released September 2020					  	               
    #   https://www.weather34.com 
    ##########################################################   
    $aqiweather["aqi"]      = number_format(pm25_to_aqi($weather["airquality-davispm25"]), 1);
    $aqiweather["aqindex25"]      = number_format(pm25_to_aqi($meteobridgeapi[184]), 1);	
if ($weather["airquality-davispm25"]=='--'){$aqiweather["aqi"] ='<smalltempunit2><orange>NO DATA</orange></smalltempunit2>';}
?>
<div class="modulecaption2">Davis Air Quality</div>
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
else if ($aqiweather["aqi"]>150){echo $aqiweather["aqi"]*0.15;}
else if ($aqiweather["aqi"]>100){echo $aqiweather["aqi"]*0.14;}
else echo $aqiweather["aqi"]*0.10;
?>pt;
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
  <?php echo "<solarheading>&nbsp;&nbsp;24H Average&nbsp;&nbsp;</solarheading>";?>
<div class="button button-dialrain">               
 <div class="button-dial-toprain"></div>
<div class="button-dial-label"> 
<?php echo "<uvreadings style='opacity:0.8;background:";
if ($aqiweather["aqindex25"]>=300 ){echo 'var(--purple)';}
elseif ($aqiweather["aqindex25"]>=250 ){echo 'var(--red)';}
elseif ($aqiweather["aqindex25"]>=150 ){echo 'var(--red)';}
elseif ($aqiweather["aqindex25"]>=100 ){echo 'var(--orange)';}
elseif ($aqiweather["aqindex25"]>=50 ){echo 'var(--yellow)';}
elseif ($aqiweather["aqindex25"]>0 ){echo 'var(--green)';}
echo "'>";
echo "<uvopacity>".number_format($aqiweather["aqindex25"],1)."</uvopacity></uvreadings";
?>  
</div></div></div>
<div class="weather34i-rairate-bar2">
<div id="raincontainer2">
<div id="weather34rainbeaker2">
  <?php //relative scale
  echo "<volume>300+ <br>250 <br>200 <br>150 <br>100 <br> </volume>";  
  ?>
<div id="weather34rainwater2" style="height:<?php 
if ($aqiweather["aqindex25"]>200){echo $aqiweather["aqindex25"]*0.16;}
else if ($aqiweather["aqindex25"]>150){echo $aqiweather["aqindex25"]*0.15;}
else if ($aqiweather["aqindex25"]>100){echo $aqiweather["aqindex25"]*0.14;}
else echo $aqiweather["aqindex25"]*0.10;

?>pt;opacity:0.7;background:
<?php //color
if ($aqiweather["aqindex25"]>=300 ){echo 'var(--purple)';}
elseif ($aqiweather["aqindex25"]>=250 ){echo 'var(--red)';}
elseif ($aqiweather["aqindex25"]>=150 ){echo 'var(--red)';}
elseif ($aqiweather["aqindex25"]>=100 ){echo 'var(--orange)';}
elseif ($aqiweather["aqindex25"]>=50 ){echo 'var(--yellow)';}
elseif ($aqiweather["aqindex25"]>0 ){echo 'var(--green)';}?>">        
</div></div></div></div></div></div></div>

<div class="rainrateextra1">
<div class=extrainfo2 style="margin-top:15px"><a href='weather34-aqi-info-davis.php' data-lity data-title="Air Quality Data"><?php echo  $aqilinks?>&nbsp;Extra Info</a></div></div>
<div class="weather-tempicon-identity"></div></div>
