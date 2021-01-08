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
	  font-size: 8.5px;
	  transform: rotate(-95deg);
	  -webkit-transform: rotate(-95deg);
	  -moz-transform: rotate(-95deg);
	  -ms-transform: rotate(-95deg);
	  -o-transform: rotate(-95deg);
	  transform-origin: 0% 100%;
	  -webkit-transform-origin: 0% 100%;
	  top: 2px;
	  left:23px;
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
	if ($now > $result['sunset'] || $now < $result['sunrise']){$sunspot = 'rgba(86,95,103,0)';}
	else {$sunspot = 'rgba(255, 112,50,1)';}
	?>
	
	<script>
	//weather34 complete rework clean up very confusing code of the original by Wim Van de Kuil this code attempts to make it somewhat relative to what is supposed todo
	var c = document.getElementById("weather34sundialuv");	
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
	<div class="almanac-word-sun">UV Index-Sun</div>
	<div class="daylightmoduleposition" > 
	<div class="circleborderouter"></div>
	<div class="circleborderinner"></div>	
	<div class="sundialcontainerdiv2" >
	<canvas id="weather34sundialuv" class="suncanvasstyle"></canvas>
	<div class="weather34sunclock"><div id="poscircircle"></div></div></div>

<div class="theuvindex"><uvword>UVINDEX</uvword>
<?php //uv value
if ($weather['uv']>=10) {echo "<purple>".$weather['uv']."</purple>";}
else if ($weather['uv']>=8) {echo "<red>".$weather['uv']."</red>";}
else if ($weather['uv']>=5) {echo "<orange>".$weather['uv']."</orange>";}
else if ($weather['uv']>=3) {echo "<yellow>".$weather['uv']."</yellow>";}
else if ($weather['uv']>0) {echo "<green>".$weather['uv']."</green>";}
else if ($weather['uv']==0) {echo "<white>".number_format($weather['uv'],0)."</white>";}
?><uvi>UVI</uvi></div>

<div class=wm><?php //uv phrase
if ($weather['uv']>=10) {echo 'Extreme Caution';}
else if ($weather['uv']>=6) {echo 'High Caution';}
else if ($weather['uv']>=3) {echo 'Moderate Caution';}
else if ($weather['uv']>=0.6) {echo 'Low Caution';}
else if ($weather['uv']<=0.5) {echo 'No Caution';}
?></div></div></div></div>

<div class="maxuvi2">
<?php echo $max1 ." ";
if ($weather["uvdmax"]>=10) {echo "<purple>".$weather["uvdmax"]."</purple>";}
else if ($weather["uvdmax"]>=8) {echo "<red>".$weather["uvdmax"]."</red>";}
else if ($weather["uvdmax"]>=5) {echo "<orange>".$weather["uvdmax"]."</orange>";}
else if ($weather["uvdmax"]>=3) {echo "<yellow>".$weather["uvdmax"]."</yellow>";}
else if ($weather["uvdmax"]>0) {echo "<green>".$weather["uvdmax"]."</green>";}
else if ($weather["uvdmax"]==0) {echo "<white>".number_format($weather["uvdmax"],0)."</white>";}
echo " UVI  ".$maxclock." ".$weather["uvdmaxtime"];?></div>

<div class="maxsolar2">
<?php echo $max1 ." ";
if ($weather["solardmax"]>=800) {echo "<red>".$weather["solardmax"]."</red>";}
else if ($weather["solardmax"]>=500) {echo "<orange>".$weather["solardmax"]."</orange>";}
else if ($weather["solardmax"]>0) {echo "<yellow>".$weather["solardmax"]."</yellow>";}
else if ($weather["solardmax"]==0) {echo "<white>".number_format($weather["solardmax"],0)."</white>";}
echo " W/m2  ".$maxclock." ".$weather["solardmaxtime"];?></div>

<div class="daylight4">
<?php 
if ($txt=='Sunrise'){echo $sunrisesicon;}if ($txt=='Sunset'){echo $sunsetsicon;}?>&nbsp;
<?php echo $hrs."<smallminutes1>hrs</smallminutes1>&nbsp;: ". $min."<smallminutes1> min</smallminutes1>" ?>
<?php if ($txt=='Sunrise'){echo "&nbsp;(<orange>".$nextrise."</orange>)";}if ($txt=='Sunset'){echo "&nbsp;(<red>".$nextset."</red>)";}?> 
</div> 

<div class="heatcircle">
<div class="heatcircle-contentsolar1">
  <div class="rainrateextra">
  <valuetextheadingsolar>
<?php // weather34 simple css lux scale 
$weather['lux1']=$weather['lux']/1000;
if ($weather['lux']>=100000 ){echo "0 20k 40k 60k 80k <red>".number_format($weather['lux1'],0)."k</red>";}
else if ($weather['lux']>=80000 ){echo "0 20k 40k 60k <orange>".number_format($weather['lux1'],0)."k</orange> 100k ";}
else if ($weather['lux']>=60000 ){echo "0  20k 40k <orange>".number_format($weather['lux1'],0)."k</orange> 80k 100k ";}
else if ($weather['lux']>=40000 ){echo "0  20k <orange>".number_format($weather['lux1'],0)."k</orange> 60k 80k 100k ";}
else if ($weather['lux']>=20000 ){echo "0 <yellow>".number_format($weather['lux1'],0)."k</yellow> 40k 60k 80k 100k ";}
else if ($weather['lux']>0 ){echo "<yellow>".number_format($weather['lux1'],0)."k</yellow> 20k 40k 60k 80k 100k ";}
else if ($weather['lux']==0 ){echo "".number_format($weather['lux1'],0)."k 20k 40k 60k 80k 100k ";}
echo "<smalltempunit2>Lux</smalltempunit2>";
?></valuetextheadingsolar>
<div class=sunratebar>
<div class="weather34sunratebar" 
style="width:
<?php echo $weather['lux']/1100;?>px;background:
<?php //lux color
if ($weather['lux']>=100000 ){echo 'var(--red)';}
elseif ($weather['lux']>=40000 ){echo 'var(--orange)';}
elseif ($weather['lux']>=0 ){echo 'var(--yellow)';}
?>;">
</div></div></div></div>

<div class="heatcircle2" >
  <div class="heatcircle-contentsolar2">
  <div class="rainrateextra">
  <valuetextheadingsolar>
<?php // weather34 simple css solar scale  
if ($weather['solar']>=1000 ){echo "0 200 400 600 800 <red>".$weather['solar']."</red>";}
else if ($weather['solar']>=800 ){echo "0 200 400 600 <orange>".$weather['solar']."</orange> 1k ";}
else if ($weather['solar']>=600 ){echo "0 200 400 <orange>".$weather['solar']."</orange>  800 1k ";}
else if ($weather['solar']>=400 ){echo "0 200 <yellow>".$weather['solar']."</yellow> 600 800 1k ";}
else if ($weather['solar']>=200 ){echo "0 <yellow>".$weather['solar']."</yellow> 400 600 800 1k ";}
else if ($weather['solar']>0 ){echo "<yellow>".$weather['solar']."</yellow> 200 400  600 800 1k ";}
else if ($weather['solar']==0 ){echo "".$weather['solar']." 200 400  600 800 1k ";}
echo "<smalltempunit2>W/m2</smalltempunit2>";
?></smalltempunit2></valuetextheadingsolar>
<div class=sunratebar>
<div class="weather34sunratebar" 
style="width:
<?php echo $weather['solar']*0.085;?>px;
background:
<?php //solar color
if ($weather['solar']>=1000 ){echo 'var(--red)';}
elseif ($weather['solar']>=600 ){echo 'var(--orange)';}
elseif ($weather['solar']>=0 ){echo 'var(--yellow)';}

?>;"></div></div></div></div>

<div class="heatcircle2" >
<div class="heatcircle-contentsolar3">
  <div class="rainrateextra">
<valuetextheadinguv>
<?php // weather34 simple css uv scale 
$weather['uv']=number_format($weather['uv'],1);
if ($weather['uv']>=11 ){echo "0  1  2  3  4  5  6  7  8  9  10 <purple>".$weather['uv']."</purple> ";}
else if ($weather['uv']>=10 ){echo "0  1  2  3  4  5  6  7  8  9  <purple>".$weather['uv']."</purple> 11";}
else if ($weather['uv']>=9 ){echo "0  1  2  3  4  5  6  7  8   <red>".$weather['uv']."</red> 10 11";}
else if ($weather['uv']>=8 ){echo "0  1  2  3  4  5  6  7  <red>".$weather['uv']."</red>  9 10 11";}
else if ($weather['uv']>=7 ){echo "0  1  2  3  4  5  6  <orange>".$weather['uv']."</orange>  8  9 10 11";}
else if ($weather['uv']>=6 ){echo "0  1  2  3  4  5  <orange>".$weather['uv']."</orange>  7  8  9 10 11";}
else if ($weather['uv']>=5 ){echo "0  1  2  3  4  <orange>".$weather['uv']."</orange>  6  7  8  9 10 11";}
else if ($weather['uv']>=4 ){echo "0  1  2  3  <yellow>".$weather['uv']."</yellow>  5  6  7  8  9 10 11";}
else if ($weather['uv']>=3 ){echo "0  1  2  <yellow>".$weather['uv']."</yellow>  4  5  6  7  8  9 10 11";}
else if ($weather['uv']>=2 ){echo "0  1  <green>".$weather['uv']."</green>  3  4  5  6  7  8  9  10 11";}
else if ($weather['uv']>=1 ){echo "0  <green>".$weather['uv']."</green>  2  3  4  5  6  7  8  9  10 11";}
else if ($weather['uv']>0 ){echo "<green>".$weather['uv']."</green>  1  2  3  4  5  6  7  8  9  10 11";}
else if ($weather['uv']==0 ){echo number_format($weather['uv'],0)." 1  2  3  4  5  6  7  8  9  10 11 12";}
echo "<smalltempunituv> UVINDEX</smalltempunituv>";
?></smalltempunit2>
</valuetextheadinguv>
<div class=sunratebar>
<div class="weather34sunratebar" 
style="width:
<?php echo $weather['uv']*9.5;?>px;
background:
<?php //uv color
if ($weather['uv']>=10 ){echo 'var(--purple)';}
elseif ($weather['uv']>=8 ){echo 'var(--red)';}
elseif ($weather['uv']>=5 ){echo 'var(--orange)';}
elseif ($weather['uv']>=3 ){echo 'var(--yellow)';}
elseif ($weather['uv']>0 ){echo 'var(--green)';}
?>;"></div></div></div></div>
