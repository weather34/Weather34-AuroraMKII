<?php include_once('livedata.php');
 date_default_timezone_set($TZ);
	####################################################################################################
	#	CREATED FOR WEATHER34 TEMPLATE 											                       #
	# https://weather34.com/homeweatherstation/index.html 											   # 
	# 	                                                                                               #
	# 	Release: September 2020 				  	                                                   #
	# 	                                                                                               #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################

$result = date_sun_info(time(), $lat, $lon);time(); 
$nextday = time() + 86400; 
$result2 = date_sun_info($nextday,$lat, $lon);
if ($clockformat=='12'){$timeformat= 'g:i' ;}
if ($clockformat=='24'){$timeformat= 'H:i' ;}

//weather34 sunrise 
$nextrise = $result['sunrise']; $now = time(); 
if ($now > $nextrise) { $nextrise = date($timeformat,$result2['sunrise']);
$nextrisetxt ='Tomorrow'  ;} 
else { $nextrisetxt = 'Today';$nextrise = date($timeformat,$nextrise);} 
//weather34 sunset
$nextset = $result['sunset'];if ($now > $nextset) { $nextset = date($timeformat,$result2['sunset']);
	$nextsettxt ='Tomorrow';}else { $nextsettxt = 'Today'; $nextset = date($timeformat,$nextset);} 
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
	
	<style>
	
	.weather34sunclock {
	-webkit-transform:rotate(<?php echo ((($thehour*15)+($theminute/3))-90)?>deg);
	transform:rotate(<?php echo ((($thehour*15)+($theminute/3))-90)?>deg);
	border:5px solid rgba(255, 255,255,0);
	width:110px; 
	height:110px;
	top:0px;
	margin-left:104px;
	z-index:100;
	}
	.weather34sunclock #poscircircle {
	top: 50%;
	left:calc(52% - 53%);
	height:8px;
	width:8px;
	border:0;
	-webkit-border-radius:50%;
	border-radius:50%;
	background:<?php if ($elev<=-2.0){echo "hsla(4, 40%, 48%,.5)";}	
	else echo "#ec5732"?>;
	}
	.weather34sunclock :before{
	content:"<?php echo date($timeformat)?>";	
	  position: absolute;
	  font-family: clock;
	  color: var(--body-text-dark);
	  font-size:8.5px;
	  transform: rotate(-95deg);
	  -webkit-transform: rotate(-95deg);
	  -moz-transform: rotate(-95deg);
	  -ms-transform: rotate(-95deg);
	  -o-transform: rotate(-95deg);
	  transform-origin: 0% 100%;
	  -webkit-transform-origin: 0% 100%;
	  top: 2px;
	  left:22px;
	  z-index:100	 	 
	}
	
	</style>
	
	<?php 
	$fullday = 720;
	function fullcircle ($integer){global $fullday ;$h= (int) date ('H',$integer);$m = (int) date ('i',$integer);
	$calc = $m + $h*60; $calc= (float) 0.5 + ($calc / $fullday );
	if ($calc > 2.0) { $calc = $calc - 2;}return round ($calc,5);}
	$daybegins  = fullcircle ($result['sunrise']);
	$endofday   = fullcircle ($result['sunset']);
	$sunspotpostion    = fullcircle ($now);
	if ($now > $result['sunset'] || $now < $result['sunrise'] ){$sunspot = 'rgba(86,95,103,0)';}
	else {$sunspot = 'rgba(255, 112,50,1)';}
	?>
	
	<script>
	//weather34 complete rework clean up very confusing code of the original by Wim Van de Kuil this code attempts to make it somewhat relative to what is supposed todo
	var c = document.getElementById("weather34sundialsolar");
	var dpi = window.devicePixelRatio;	
	var weather34sundial = c.getContext("2d");	
//weather34 daylight gradient
var weather34gradient = weather34sundial.createLinearGradient(0, 0, c.width, 0);
weather34gradient.addColorStop("0", "hsl(35, 77%, 58%)");
weather34gradient.addColorStop("0.20", " hsla(19, 66%, 55%,.8)");
//weather34 dark gradient
var weather34gradient2 = weather34sundial.createLinearGradient(0, 0, c.width, 0);
weather34gradient2.addColorStop("0", "hsla(202, 8%, 46%,.5)");
weather34gradient2.addColorStop("0.20", "hsla(206, 12%, 27%,.6)");
// weather34 Dark Fill
	weather34sundial.beginPath();
	weather34sundial.arc(63, 65, 55, 0, 2 * Math.PI);
	weather34sundial.lineWidth = 13;
	weather34sundial.strokeStyle = weather34gradient2;
	weather34sundial.stroke();
	weather34sundial.closePath();
    //weather34 daylight fill
	weather34sundial.beginPath();
	weather34sundial.arc(63, 65, 55, '<?php echo $daybegins?>' * Math.PI, '<?php echo $endofday?>' * Math.PI);
	weather34sundial.lineWidth = 13;	
	weather34sundial.strokeStyle = weather34gradient;
	weather34sundial.stroke();
	weather34sundial.closePath();
    //sunspot 
	weather34sundial.beginPath();
	weather34sundial.arc(63, 65, 55, '<?php echo $sunimage?>'* Math.PI, '<?php echo $sunimage?>' * Math.PI);
	weather34sundial.lineWidth = 0;
	weather34sundial.strokeStyle = "<?php echo  $sunspot?>";
	weather34sundial.closePath();
	weather34sundial.stroke();
	</script> 
	<div class="almanac-word-sun">Solar-Sun</div>
	<div class="daylightmoduleposition" >  
	<div class="circleborderouter"></div>
	<div class="circleborderinner"></div>	
	<div class="sundialcontainerdiv2" >
	<canvas id="weather34sundialsolar" class="suncanvasstyle"></canvas>
	<div class="weather34sunclock"><div id="poscircircle" style="z-index:900"></div></div></div>


<div class="theuvindex"> <uvword>SOLAR</uvword>	
<?php //solar value
if ($weather['solar']>=400) {echo "<orange>".$weather['solar']."</orange>";}
else if ($weather['solar']>=100) {echo "<yellow>".$weather['solar']."</yellow>";}
else if ($weather['solar']>0) {echo "<green>".$weather['solar']."</green>";}
else if ($weather['solar']==0) {echo "<white>".number_format($weather['solar'],0)."</white>";}
?><uvi>W/m2</uvi></div>

<div class=wm><?php //uv phrase
if ($weather['solar']>=700) {echo 'Good';}
else if ($weather['solar']>=300) {echo 'Moderate';}
else if ($weather['solar']>=0) {echo'Low';}
?></div></div></div></div></div>

<div class="maxuvi2"> 
<?php echo $max1 ." ";
if ($weather["solardmax"]>=800) {echo "<red>".$weather["solardmax"]."</red>";}
else if ($weather["solardmax"]>=500) {echo "<orange>".$weather["solardmax"]."</orange>";}
else if ($weather["solardmax"]>0) {echo "<yellow>".$weather["solardmax"]."</yellow>";}
else if ($weather["solardmax"]==0) {echo "<white>".number_format($weather["solardmax"],0)."</white>";}
echo " W/m2  ".$maxclock." ".$weather["solardmaxtime"];?></div>

<div class="daylight5">
<?php 
if ($txt=='Sunrise'){echo  $sunrisesicon;}
if ($txt=='Sunset'){echo $sunsetsicon;}?>

&nbsp;
<?php echo $hrs."<smallminutes1>hrs</smallminutes1>&nbsp;: ". $min."<smallminutes1> min</smallminutes1>" ?>
<?php 
if ($txt=='Sunrise'){echo "&nbsp;(<orange>".$nextrise."</orange>)";}
if ($txt=='Sunset'){echo "&nbsp;(<red>".$nextset."</red>)";}?> 
</div> 


<div class="heatcircle" style="margin-left:-10px;margin-top:-50px"><div class="heatcircle-content">
<?php  //solar year
echo "<valuetextheading1>".date('Y')." Max <blue>".$weather["solarymaxtime"]."</blue></valuetextheading1><br>";
echo "<div class=tempconverter1><div class=tempmodulehome0-5c >".$weather["solarymax"]."<smalltempunit2>&nbsp;W/m2";
?><smalltempunit2></div></div></div>

<div class="heatcircle2"><div class="heatcircle-content"><valuetextheading1>&nbsp;Luminance Lux</valuetextheading1>
<?php //lux
echo "<div class=tempconverter1><div class=tempmodulehome0-5c>". $weather["lux"]."<smalltempunit2> &nbsp;Lux";
?>
</smalltempunit2></div></div></div>

<div class="heatcircleindoor"><div class="heatcircle-content">&nbsp;&nbsp;&nbsp;<?php echo date('F')?> <orange>Max</orange> <deepblue><?php echo $weather["solarmmaxtime"]?> </deepblue></valuetextheading1>
<?php //SOLAR max month
    echo "<div class=tempconverter1><div class=tempmodulehome0-5c>". $weather["solarmmax"]."<smalltempunit2> &nbsp;W/m2</smalltempunit2>";
?>
</div></div></div><div>
