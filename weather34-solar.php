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
	$this->sunrise=$sunrise;$this->transit=$transit;$this->sunset=$sunset;$isDay=0;$isMorning=0;$isNoon=0;$isAfternoon=0;$isEvening=0;$now=$this->date->format('H:i:s');
	if($now>$sunrise and $now<$sunset)$isDay=1;
	if($isDay==1){if($now<='12:00:00')$isMorning=1;
	if($now>'12:00:00' and $now<'14:00:00')$isNoon=1;if($isMorning==0 and $isNoon==0){$sunrise=new DateTime($sunrise);$transit=new DateTime($transit);
	$sunset=new DateTime($sunset);$nowTime=new DateTime($now);$dayLenght=date_diff($sunset,$sunrise);$dayLenght=$dayLenght->h * 60 + $dayLenght->i;$sunsetDelta=date_diff($sunset,$nowTime);$sunsetDelta=$sunsetDelta->h * 60 + $sunsetDelta->i;$portion=pow($dayLenght / 12,2)/ 40;if($sunsetDelta<$portion)$isEvening=1;
	else $isAfternoon=1;}}$this->isDay=$isDay;$this->isMorning=$isMorning;$this->isNoon=$isNoon;$this->isAfternoon=$isAfternoon;$this->isEvening=$isEvening;}public function isSunny($from=0,$to=0){if(is_null($this->azimuth)){$sunspotpostion=$this->getSunPos();$this->elevation=$sunspotpostion['elevation'];$this->azimuth=$sunspotpostion['azimuth'];}if($to<$from){if($this->azimuth<$to)$this->azimuth+=360;$to+=360;}if($this->azimuth>$from and $this->azimuth<$to)return true;return false;}public function getSunPosition($lat,$long,$year,$month,$day,$hour,$min){$jd=gregoriantojd($month,$day,$year);$dayfrac=$hour / 24 - .5;$frac=$dayfrac + $min / 60 / 24;$jd=$jd + $frac;$time=($jd - 2451545);$mnlong=(280.460 + 0.9856474 * $time);$mnlong=fmod($mnlong,360);if($mnlong<0)$mnlong=($mnlong + 360);$mnanom=(357.528 + 0.9856003 * $time);$mnanom=fmod($mnanom,360);if($mnanom<0)$mnanom=($mnanom + 360);$mnanom=deg2rad($mnanom);$eclong=($mnlong + 1.915 * sin($mnanom)+ 0.020 * sin(2 * $mnanom));$eclong=fmod($eclong,360);if($eclong<0)$eclong=($eclong + 360);$oblqec=(23.439 - 0.0000004 * $time);$eclong=deg2rad($eclong);$oblqec=deg2rad($oblqec);$num=(cos($oblqec)* sin($eclong));$den=(cos($eclong));$ra=(atan($num / $den));if($den<0)$ra=($ra + pi());if($den>=0&&$num<0)$ra=($ra + 2*pi());$dec=(asin(sin($oblqec)* sin($eclong)));$h=$hour + $min / 60;$gmst=(6.697375 + .0657098242 * $time + $h);$gmst=fmod($gmst,24);if($gmst<0)$gmst=($gmst + 24);$lmst=($gmst + $long / 15);$lmst=fmod($lmst,24);if($lmst<0)$lmst=($lmst + 24);$lmst=deg2rad($lmst * 15);$ha=($lmst - $ra);if($ha<pi())$ha=($ha + 2*pi());if($ha>pi())$ha=($ha - 2*pi());$lat=deg2rad($lat);$el=(asin(sin($dec)* sin($lat)+ cos($dec)* cos($lat)* cos($ha)));$az=(asin(-cos($dec)* sin($ha)/ cos($el)));if((sin($dec)- sin($el)* sin($lat))>00){if(sin($az)<0)$az=($az + 2*pi());}else{$az=(pi()- $az);}$el=rad2deg($el);$az=rad2deg($az);$lat=rad2deg($lat);return array(number_format($el,2),number_format($az,2));}public $latitude=null;public $longitude=null;public $date=null;public $timezone=null;public $elevation=null;public $azimuth=null;public $sunrise=null;public $transit=null;public $sunset=null;public $isDay=null;public $isMorning=null;public $isNoon=null;public $isAfternoon=null;public $isEvening=null;protected $dateFormat='Y-m-d';function __construct($latitude=0,$longitude=0,$timezone=false,$date=false,$time=false){$this->latitude=$latitude;$this->longitude=$longitude;if($timezone){$this->timezone=$timezone;date_default_timezone_set($timezone);}else $this->timezone=date_default_timezone_get();if($date)$this->date=DateTime::createFromFormat($this->dateFormat,$date);else $this->date=new DateTime('NOW',new DateTimeZone($this->timezone));if($time){$var=explode(':',$time);$this->date->setTime($var[0],$var[1]);}$this->getSunPos();$this->getDayPeriod();}}$lati=$lat;$long=$lon;$timezone=$TZ;$_SunPos=new sunPos($lati,$long,$timezone);$azimuth=$_SunPos->azimuth ;$elev=$_SunPos->elevation ;
	//use meteobridge daylight with some improvements by Josh(milehighweather)
	$light =$weather["daylight"]; $daylight = ltrim($light, '0'); $dark = 24 - str_replace(':','.',$daylight);$lighthours = substr($daylight, 0, 2); 
	$lightmins = substr($daylight, -2);
	$darkhours = 23 - $lighthours; $darkminutes = 60 - $lightmins;if ($darkminutes<10) $darkminutes= '0' .$darkminutes;
	else $darkminutes=$darkminutes;$thehour=date('H');$theminute=date('i');
	$test=5;?>

<div class="modulecaptionb">Solar</div>


<div class="maxuvindex">
<?php echo $max1 ." Max W/m2 ";
if ($weather["solardmax"]>=800) {echo "<red>".$weather["solardmax"]."</red>";}
else if ($weather["solardmax"]>=500) {echo "<orange>".$weather["solardmax"]."</orange>";}
else if ($weather["solardmax"]>0) {echo "<yellow>".$weather["solardmax"]."</yellow>";}
else if ($weather["solardmax"]==0) {echo "<white>".number_format($weather["solardmax"],0)."</white>";}
echo " ".$maxclock." ".$weather["solardmaxtime"];?></div>

<div class="maxwm2">
<?php 
if ($txt=='Sunrise'){echo $sunrisesicon2;}if ($txt=='Sunset'){echo $sunsetsicon2;}?>&nbsp;
<?php echo $hrs."<smallminutes1>hrs</smallminutes1>&nbsp;: ". $min."<smallminutes1> min</smallminutes1>" ?>
<?php if ($txt=='Sunrise'){echo "&nbsp;(<orange>".$nextrise."</orange>)";}if ($txt=='Sunset'){echo "&nbsp;(<red>".$nextset."</red>)";}?> 
</div>

<uvheading style='margin-left:-40px;'>Solar Wm/2</uvheading>
<div class="button button-dialrain">               
 <div class="button-dial-toprain"></div>
<div class="button-dial-label"> 
<?php echo "<uvreadings style='opacity:0.8;background:";
if ($weather['solar']>=1000 ){echo 'var(--red)';}
elseif ($weather['solar']>=600 ){echo 'var(--orange)';}
elseif ($weather['solar']>0 ){echo 'var(--yellow)';}
echo "'>";
echo "<uvopacity>".number_format($weather['solar'],0)."</uvopacity></uvreadings";
?>  
</div></div></div>

<div class="weather34i-rairate-bar2" >
<div id="raincontainer2">
<div id="weather34rainbeaker2">
  <?php //relative scale
  echo "<volume>1k <br>800 <br>600 <br>400 <br>200 <br>0 </volume>";
  ?>
<div id="weather34rainwater2" style="height:<?php echo $weather["solar"]*0.052;?>pt;
opacity:0.7;background:
<?php //uv color
if ($weather['solar']>=1000 ){echo 'var(--red)';}
elseif ($weather['solar']>=600 ){echo 'var(--orange)';}
elseif ($weather['solar']>0 ){echo 'var(--yellow)';}
?>">        
</div></div></div> 

<div class="second24hourguage">
  <?php echo "<solarheading style='margin-left:-52px;'>  Luminanace (Lux)</solarheading>";?>
<div class="button button-dialrain">               
 <div class="button-dial-toprain"></div>
<div class="button-dial-label"> 
<?php echo "<uvreadings style='opacity:0.8;background:";
if ($weather['lux']>=100000 ){echo 'var(--red)';}
elseif ($weather['lux']>=40000 ){echo 'var(--orange)';}
elseif ($weather['lux']>0 ){echo 'var(--yellow)';}
echo "'>";
echo "<uvopacity>".round($weather["lux"],0)."</uvopacity></uvreadings";
?>  
</div></div></div>


<div class="weather34i-rairate-bar2">
<div id="raincontainer2">
<div id="weather34rainbeaker2">
  <?php //relative scale
  echo "<volume>100k <br>80k <br>60k <br>40k <br>20k <br>0 </volume>";
  ?>
<div id="weather34rainwater2" style="height:<?php echo $weather["solar"]*0.052;?>pt;opacity:0.7;background:
<?php //solar color
if ($weather['lux']>=100000 ){echo 'var(--red)';}
elseif ($weather['lux']>=40000 ){echo 'var(--orange)';}
elseif ($weather['lux']>=0 ){echo 'var(--yellow)';}?>">        
</div></div></div></div></div></div>


<div class="rainrateextra1">
<valuetextheading5>
<?php echo $sunrisesicon2." Sunrise ". $nextrisetxt.' (<orange>'.$nextrise.'</orange>)';?><br>
<?php echo $sunsetsicon2." Sunset ". $nextsettxt.' (<blue>'.$nextset.'</blue>)';?>
</valuetextheading5>



<div class=extrainfo2 style="margin-top:-5px"><a href='solar-almanac2.php' data-lity data-title="Solar Almanac"><?php echo  $aqilinks?>&nbsp;Extra Info</a></div></div>

<div class="weather-tempicon-identity">
<?php if ($weather['solar']<=0){echo "<grey>".$weather34_sun_icon."</grey>";}else echo "<icon-16-20>".$weather34_sun_icon."</icon-16-20>"; ?>
</div></div>
