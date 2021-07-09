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


  //sun position based on https://github.com/KiboOst/php-sunPos
  class sunPos{public function getSunPos(){$date=clone $this->date;$date->setTimezone(new DateTimeZone('UTC'));
	$year=$date->format("Y");$month=$date->format("m");$day=$date->format("d");$hour=$date->format("H");$min=$date->format("i");
	$sunspotpostion=$this->getSunPosition($this->latitude,$this->longitude,$year,$month,$day,$hour,$min);
	$this->elevation=$sunspotpostion[0];$this->azimuth=$sunspotpostion[1];return array('elevation'=>$sunspotpostion[0],'azimuth'=>$sunspotpostion[1]);}
	public function getDayPeriod(){$ts=$this->date->getTimestamp();
	$sun_info=date_sun_info($ts,$this->latitude,$this->longitude);
	$sunrise=date("H:i:s",$sun_info["sunrise"]);$transit=date("H:i:s",$sun_info["transit"]);$sunset=date("H:i:s",$sun_info["sunset"]);
	$this->sunrise=$sunrise;$this->transit=$transit;$this->sunset=$sunset;$isDay=0;$isMorning=0;$isNoon=0;$isAfternoon=0;$isEvening=0;
	$now=$this->date->format('H:i:s');
	if($now>$sunrise and $now<$sunset)$isDay=1;
	if($isDay==1){if($now<='12:00:00')$isMorning=1;
	if($now>'12:00:00' and $now<'14:00:00')$isNoon=1;if($isMorning==0 and $isNoon==0){$sunrise=new DateTime($sunrise);$transit=new DateTime($transit);
	$sunset=new DateTime($sunset);$nowTime=new DateTime($now);$dayLenght=date_diff($sunset,$sunrise);$dayLenght=$dayLenght->h * 60 + $dayLenght->i;
	$sunsetDelta=date_diff($sunset,$nowTime);$sunsetDelta=$sunsetDelta->h * 60 + $sunsetDelta->i;$portion=pow($dayLenght / 12,2)/ 40;
	if($sunsetDelta<$portion)$isEvening=1;
	else $isAfternoon=1;}}$this->isDay=$isDay;$this->isMorning=$isMorning;$this->isNoon=$isNoon;$this->isAfternoon=$isAfternoon;
	$this->isEvening=$isEvening;}public function isSunny($from=0,$to=0){if(is_null($this->azimuth)){$sunspotpostion=$this->getSunPos();
	$this->elevation=$sunspotpostion['elevation'];$this->azimuth=$sunspotpostion['azimuth'];}if($to<$from){if($this->azimuth<$to)
	$this->azimuth+=360;$to+=360;}if($this->azimuth>$from and $this->azimuth<$to)return true;return false;}
	public function getSunPosition($lat,$long,$year,$month,$day,$hour,$min){$jd=gregoriantojd($month,$day,$year);$dayfrac=$hour / 24 - .5;$frac=$dayfrac + $min / 60 / 24;$jd=$jd + $frac;$time=($jd - 2451545);$mnlong=(280.460 + 0.9856474 * $time);$mnlong=fmod($mnlong,360);if($mnlong<0)$mnlong=($mnlong + 360);$mnanom=(357.528 + 0.9856003 * $time);$mnanom=fmod($mnanom,360);if($mnanom<0)$mnanom=($mnanom + 360);$mnanom=deg2rad($mnanom);$eclong=($mnlong + 1.915 * sin($mnanom)+ 0.020 * sin(2 * $mnanom));$eclong=fmod($eclong,360);if($eclong<0)$eclong=($eclong + 360);$oblqec=(23.439 - 0.0000004 * $time);$eclong=deg2rad($eclong);$oblqec=deg2rad($oblqec);$num=(cos($oblqec)* sin($eclong));$den=(cos($eclong));$ra=(atan($num / $den));if($den<0)$ra=($ra + pi());if($den>=0&&$num<0)$ra=($ra + 2*pi());$dec=(asin(sin($oblqec)* sin($eclong)));$h=$hour + $min / 60;$gmst=(6.697375 + .0657098242 * $time + $h);$gmst=fmod($gmst,24);if($gmst<0)$gmst=($gmst + 24);$lmst=($gmst + $long / 15);$lmst=fmod($lmst,24);if($lmst<0)$lmst=($lmst + 24);$lmst=deg2rad($lmst * 15);$ha=($lmst - $ra);if($ha<pi())$ha=($ha + 2*pi());if($ha>pi())$ha=($ha - 2*pi());$lat=deg2rad($lat);$el=(asin(sin($dec)* sin($lat)+ cos($dec)* cos($lat)* cos($ha)));$az=(asin(-cos($dec)* sin($ha)/ cos($el)));if((sin($dec)- sin($el)* sin($lat))>00){if(sin($az)<0)$az=($az + 2*pi());}else{$az=(pi()- $az);}$el=rad2deg($el);$az=rad2deg($az);$lat=rad2deg($lat);return array(number_format($el,2),number_format($az,2));}public $latitude=null;public $longitude=null;public $date=null;public $timezone=null;public $elevation=null;public $azimuth=null;public $sunrise=null;public $transit=null;public $sunset=null;public $isDay=null;public $isMorning=null;public $isNoon=null;public $isAfternoon=null;public $isEvening=null;protected $dateFormat='Y-m-d';function __construct($latitude=0,$longitude=0,$timezone=false,$date=false,$time=false){$this->latitude=$latitude;$this->longitude=$longitude;if($timezone){$this->timezone=$timezone;date_default_timezone_set($timezone);}else $this->timezone=date_default_timezone_get();if($date)$this->date=DateTime::createFromFormat($this->dateFormat,$date);else $this->date=new DateTime('NOW',new DateTimeZone($this->timezone));if($time){$var=explode(':',$time);$this->date->setTime($var[0],$var[1]);}$this->getSunPos();$this->getDayPeriod();}}$lati=$lat;$long=$lon;$timezone=$TZ;$_SunPos=new sunPos($lati,$long,$timezone);$azimuth=$_SunPos->azimuth ;$elev=$_SunPos->elevation ;
	 //sun elevation-azimuth
	$weather['sunelevation']=$elev;
	
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

<div class="weather34i-rairate-bar2" >
<div id="raincontainer2">
<div id="weather34rainbeaker2">
  <?php //relative scale
  echo "<volume>UVI <br>10 <br>8 <br>5 <br>3 <br>0 </volume>";  
  ?>
<div id="weather34rainwater2" style="height:<?php echo $weather["uv"]*4;?>pt;
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





<div class="rainrateextra1" style="width:500px">
<valuetextheading5>
<?php
$weather["lux1"]  = number_format($weather['solar']*126.7,0, '.', '');
$weather["lux"]  = round($weather["lux1"],0);
if ($weather["lux"]>80000){echo "0<smalltempunit2>&nbsp;&nbsp;Luminance Lux</smalltempunit2><barometerspacinghpa></barometerspacinghpa>";}
else if ($weather["lux"]>=10000){echo "0<barometerspacinghpa><orange>100k</orange></barometerspacinghpa><smalltempunit2>&nbsp;Lux</smalltempunit2>";}
else if ($weather["lux"]>=0){echo "<barometerspacinghpa><orange>100k</orange></barometerspacinghpa><smalltempunit2>&nbsp;Lux</smalltempunit2>";}

?></smalltempunit2>
<style>
.weather34sunratebar12::before{
position:absolute;
content:"<?php echo number_format($weather["lux"]/1000,0)?>k";
font-size:9px;
padding-left:<?php 
if ($weather["lux"]>70000){echo $weather["lux"]/1150;}else if ($weather["lux"]>=0){echo $weather["lux"]/1100;}?>px;
top:0px;
color:<?php if ($weather["lux"]>80000){echo "var(--orange);";}if ($weather["lux"]>0){echo "var(--temp15-20);";}else echo "var(--body);";?>;}	
</style>
</valuetextheading5>

<div class=sunratebar>
<div class="weather34sunratebar12" style="width:<?php echo $weather["lux"]/1000;?>px;background:<?php if ($weather["lux"]>80000){echo "var(--orange);";}
else echo "var(--temp15-20);";?>">
</div></div>







<div class=extrainfo2 style="margin-top:-5px"><a href='uv-almanac2.php' data-lity data-title="Almanac Data"><?php echo  $aqilinks?>&nbsp;Extra Info</a></div></div>

<div class="weather-tempicon-identity">
<?php if ($elev<0){echo $moonsetuv;}else echo "<icon-16-20>".$weather34_sun_icon."</icon-16-20>"; ?>
</div></div>
