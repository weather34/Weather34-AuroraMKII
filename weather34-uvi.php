<?php 
  #################################################
	#	CREATED FOR Weather34	Aurora			
	# December 2020 	 	                                                                                               
	# https://www.weather34.com/homeweatherstation/ 	                                                                   
	#################################################
include('livedata.php');date_default_timezone_set($TZ);

$result = date_sun_info(time(), $lat, $lon);time(); 
$nextday = time() + 86400; 
$result2 = date_sun_info($nextday,$lat, $lon);
if ($clockformat=='12'){$timeformat= 'g:i' ;}
if ($clockformat=='24'){$timeformat= 'H:i' ;}
 

//weather34 sunrise 
$nextrise = $result['sunrise']; $now = time(); 
if ($now > $nextrise) { $nextrise = date($timeformat,$result2['sunrise']);
$nextrisetxt = 'Tomorrow' ;} 
else { $nextrisetxt = 'Today';$nextrise = date($timeformat,$nextrise);} 
//weather34 sunset
$nextset = $result['sunset'];if ($now > $nextset) { $nextset = date($timeformat,$result2['sunset']);
	$nextsettxt = 'Tomorrow';}else { $nextsettxt = 'Today'; $nextset = date($timeformat,$nextset);} 
	$firstrise = $result['sunrise']; $secondrise = $result2['sunrise']; $firstset = $result ['sunset'];
	if ($now < $firstrise) { $time = $firstrise - $now; $hrs = gmdate ('G',$time); $min = gmdate ('i',$time);$txt = 'Sunrise';} 
	elseif ($now < $firstset) { $time = $firstset - $now; $hrs = gmdate ('G',$time); $min = gmdate ('i',$time);$txt = 'Sunset';} 
	else { $time = $secondrise - $now; $hrs = gmdate ('G',$time); $min = gmdate ('i',$time); $txt = 'Sunrise';}echo "";
?>
<div class="modulecaptionb">UVINDEX | W/m&#178;</div>

<div class="maxuvindex">
<?php echo $max1 ." UVI ";
if ($weather["uvdmax"]>=10) {echo "<purple>".$weather["uvdmax"]."</purple>";}
else if ($weather["uvdmax"]>=8) {echo "<red>".$weather["uvdmax"]."</red>";}
else if ($weather["uvdmax"]>=5) {echo "<orange>".$weather["uvdmax"]."</orange>";}
else if ($weather["uvdmax"]>=3) {echo "<yellow>".$weather["uvdmax"]."</yellow>";}
else if ($weather["uvdmax"]>0) {echo "<green>".$weather["uvdmax"]."</green>";}
else if ($weather["uvdmax"]==0) {echo "<white>".number_format($weather["uvdmax"],0)."</white>";}
echo " ".$maxclock." ".$weather["uvdmaxtime"];?></div>

<div class="maxwm2">
<?php echo $max1 ." W/m&#178; ";
if ($weather["solardmax"]>=800) {echo "<red>".$weather["solardmax"]."</red>";}
else if ($weather["solardmax"]>=500) {echo "<orange>".$weather["solardmax"]."</orange>";}
else if ($weather["solardmax"]>0) {echo "<yellow>".$weather["solardmax"]."</yellow>";}
else if ($weather["solardmax"]==0) {echo "<white>".number_format($weather["solardmax"],0)."</white>";}
echo " ".$maxclock." ".$weather["solardmaxtime"];?></div>

<uvheading>UVINDEX</uvheading>
<div class="button button-dialrain">               
 <div class="button-dial-toprain"></div>
<div class="button-dial-label"> 
<?php echo "<uvreadings style='opacity:0.8;background:";
if ($weather['uv']>=10 ){echo 'var(--purple)';}
elseif ($weather['uv']>=8 ){echo 'var(--red)';}
elseif ($weather['uv']>=5 ){echo 'var(--orange)';}
elseif ($weather['uv']>=3 ){echo 'var(--yellow)';}
elseif ($weather['uv']>0 ){echo 'var(--green)';}
echo "'>";
echo "<uvopacity>".number_format($weather["uv"],1)." <uvunits>UVI</uvunits></uvopacity></uvreadings";
?>  
</div></div></div>
<?php if ($weather["stationtype"]=="GW1000" || $weather["stationtype"]=="gw1000" || $weather["stationtype"]=="GW1001" || 
$weather["stationtype"]=="gw1001" || $weather["stationtype"]=="GW1002" || $weather["stationtype"]=="gw1002" || $weather["stationtype"]=="GW1003" || 
$weather["stationtype"]=="gw1003" || $weather["stationtype"]=="DP1500"){echo'
<section id="weather34warning" class="weather34-warning-proof">
<div class="weather34-hardwarenotifications"><div class="weather34-hardwarenotifications-container">
<div class="weather34-hardwarenotifications-image-wrapper">'.$hardwarealertnotif.'</div>
 <div class="weather34-hardwarenotifications-content-wrapper">
<p class="weather34-hardwarenotifications-content">Your Weather Station Hardware <br>Is Not Compatible <br>with this Weather<blue>34</blue> Template </p>
</div></div></div></section>
';}?>

<div class="weather34i-rairate-bar2" >
<div id="raincontainer2">
<div id="weather34rainbeaker2">
  <?php //relative scale
  echo "<volume>UVI <br>10 <br>8 <br>5 <br>3 <br>0 </volume>";  
  ?>
<div id="weather34rainwater2" style="height:<?php echo $weather["uv"]*4.2;?>pt;
opacity:0.7;background:
<?php //uv color
if ($weather['uv']>=10 ){echo 'var(--purple)';}
elseif ($weather['uv']>=8 ){echo 'var(--red)';}
elseif ($weather['uv']>=5 ){echo 'var(--orange)';}
elseif ($weather['uv']>=3 ){echo 'var(--yellow)';}
elseif ($weather['uv']>0 ){echo 'var(--green)';}
?>">        
</div></div></div>

<div class="second24hourguage">
  <?php echo "<solarheading>Solar Radiation</solarheading>";?>
<div class="button button-dialrain">               
 <div class="button-dial-toprain"></div>
<div class="button-dial-label"> 
<?php echo "<uvreadings style='opacity:0.8;background:";
if ($weather['solar']>=1000 ){echo 'var(--red)';}
elseif ($weather['solar']>=600 ){echo 'var(--orange)';}
elseif ($weather['solar']>0 ){echo 'var(--yellow)';}
echo "'>";
if ($weather['solar']>=1000 ){echo "<uvopacity>".round($weather["solar"],0)."<uvunits>W/m&#178;</uvunits></uvopacity></uvreadings";}
else echo "<uvopacity>".round($weather["solar"],1)." <uvunits>W/m&#178;</uvunits></uvopacity></uvreadings";
?>  
</div></div></div>
<div class="weather34i-rairate-bar2">
<div id="raincontainer2">
<div id="weather34rainbeaker2">
  <?php //relative 24 hour 50mm/2in scale
  echo "<volume>W/m&#178; <br>-- <br>-- <br>-- <br>-- <br>100 </volume>";
  ?>
<div id="weather34rainwater2" style="height:<?php echo $weather["solar"]/23;?>pt;opacity:0.7;background:
<?php //solar color
if ($weather['solar']>=1000 ){echo 'var(--red)';}
elseif ($weather['solar']>=600 ){echo 'var(--orange)';}
elseif ($weather['solar']>=0 ){echo 'var(--yellow)';}?>">        
</div></div></div></div></div></div>


<div class="rainrateextra1">
<valuetextheading5>
<?php echo $sunrisesicon2." Sunrise ". $nextrisetxt.' (<orange>'.$nextrise.'</orange>)';?><br>
<?php echo $sunsetsicon2." Sunset ". $nextsettxt.' (<blue>'.$nextset.'</blue>)';?>
</valuetextheading5>



<div class=extrainfo2 style="margin-top:-5px"><a href='uv-almanac2.php' data-lity data-title="Almanac Data"><?php echo  $aqilinks?>&nbsp;Extra Info</a></div></div>

<div class="weather-tempicon-identity">
<?php if ($elev<0){echo "<grey>".$weather34_sun_icon."</grey>";}else echo "<icon-16-20>".$weather34_sun_icon."</icon-16-20>"; ?>
</div></div>
