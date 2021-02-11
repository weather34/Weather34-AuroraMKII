<?php 
	####################################################################################################
	#	HOME WEATHER STATION TEMPLATE by BRIAN UNDERDOWN 2015-2020			                           #
	#	CREATED FOR HOMEWEATHERSTATION TEMPLATE at 													   #
	#   https://weather34.com/homeweatherstation/index.html 										   # 
	# 	WEATHER STATION TEMPLATE 2015-2020                 										       #
	# 	      MB SMART Console Version Revised FEB 2020								                   #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################
//original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
include('livedata.php');include('console-settings.php');header('Content-type: text/html; charset=utf-8');

if ($clockformat=='12'){$timeformat= 'g:i' ;}
if ($clockformat=='24'){$timeformat= 'H:i' ;}
$TZconf = $TZ; 
$rise_zenith = 90+ 40/60;  
$set_zenith = 90+ 36/60; 
date_default_timezone_set($TZ);
$result = date_sun_info(time(), $lat, $lon);time();
$sunrisetoday= date_sunrise(time(), SUNFUNCS_RET_STRING, $lat, $lon, $rise_zenith, $UTC);
$sunsetoday= date_sunset(time(), SUNFUNCS_RET_STRING, $lat, $lon, $rise_zenith, $UTC);
$nextday = time() + 24*60*60;$result2 = date_sun_info($nextday,$lat, $lon);

//weather34 sunrise 
$nextrise = $result['sunrise']; $now = time(); 
if ($now > $nextrise) { $nextrise = date($timeformat,$result2['sunrise']);
$nextrisetxt = 'Tomorrow'  ;} 
else { $nextrisetxt = 'Today';$nextrise = date($timeformat,$nextrise);} 
//weather34 sunset
$nextset = $result['sunset'];if ($now > $nextset) { $nextset = date($timeformat,$result2['sunset']);
	$nextsettxt = 'Tomorrow';}else { $nextsettxt = 'Today'; $nextset = date($timeformat,$nextset);} 
	$firstrise = $result['sunrise']; $secondrise = $result2['sunrise']; $firstset = $result ['sunset'];
	if ($now < $firstrise) { $time = $firstrise - $now; $hrs = gmdate ('G',$time); $min = gmdate ('i',$time);$txt = 'Sunrise';} 
	elseif ($now < $firstset) { $time = $firstset - $now; $hrs = gmdate ('G',$time); $min = gmdate ('i',$time);$txt = 'Sunset';} 
	else { $time = $secondrise - $now; $hrs = gmdate ('G',$time); $min = gmdate ('i',$time); $txt = 'Sunrise';}echo "";


//sun position based on https://github.com/KiboOst/php-sunPos
class sunPos{public function getSunPos(){$date=clone $this->date;$date->setTimezone(new DateTimeZone('UTC'));$year=$date->format("Y");$month=$date->format("m");$day=$date->format("d");$hour=$date->format("H");$min=$date->format("i");$pos=$this->getSunPosition($this->latitude,$this->longitude,$year,$month,$day,$hour,$min);$this->elevation=$pos[0];$this->azimuth=$pos[1];return array('elevation'=>$pos[0],'azimuth'=>$pos[1]);}public function getDayPeriod(){$ts=$this->date->getTimestamp();$sun_info=date_sun_info($ts,$this->latitude,$this->longitude);$sunrise=date("H:i:s",$sun_info["sunrise"]);$transit=date("H:i:s",$sun_info["transit"]);$sunset=date("H:i:s",$sun_info["sunset"]);$this->sunrise=$sunrise;$this->transit=$transit;$this->sunset=$sunset;$isDay=0;$isMorning=0;$isNoon=0;$isAfternoon=0;$isEvening=0;$now=$this->date->format('H:i:s');if($now>$sunrise and $now<$sunset)$isDay=1;if($isDay==1){if($now<='12:00:00')$isMorning=1;if($now>'12:00:00' and $now<'14:00:00')$isNoon=1;if($isMorning==0 and $isNoon==0){$sunrise=new DateTime($sunrise);$transit=new DateTime($transit);$sunset=new DateTime($sunset);$nowTime=new DateTime($now);$dayLenght=date_diff($sunset,$sunrise);$dayLenght=$dayLenght->h * 60 + $dayLenght->i;$sunsetDelta=date_diff($sunset,$nowTime);$sunsetDelta=$sunsetDelta->h * 60 + $sunsetDelta->i;$portion=pow($dayLenght / 12,2)/ 40;if($sunsetDelta<$portion)$isEvening=1;else $isAfternoon=1;}}$this->isDay=$isDay;$this->isMorning=$isMorning;$this->isNoon=$isNoon;$this->isAfternoon=$isAfternoon;$this->isEvening=$isEvening;}public function isSunny($from=0,$to=0){if(is_null($this->azimuth)){$pos=$this->getSunPos();$this->elevation=$pos['elevation'];$this->azimuth=$pos['azimuth'];}if($to<$from){if($this->azimuth<$to)$this->azimuth+=360;$to+=360;}if($this->azimuth>$from and $this->azimuth<$to)return true;return false;}public function getSunPosition($lat,$long,$year,$month,$day,$hour,$min){$jd=gregoriantojd($month,$day,$year);$dayfrac=$hour / 24 - .5;$frac=$dayfrac + $min / 60 / 24;$jd=$jd + $frac;$time=($jd - 2451545);$mnlong=(280.460 + 0.9856474 * $time);$mnlong=fmod($mnlong,360);if($mnlong<0)$mnlong=($mnlong + 360);$mnanom=(357.528 + 0.9856003 * $time);$mnanom=fmod($mnanom,360);if($mnanom<0)$mnanom=($mnanom + 360);$mnanom=deg2rad($mnanom);$eclong=($mnlong + 1.915 * sin($mnanom)+ 0.020 * sin(2 * $mnanom));$eclong=fmod($eclong,360);if($eclong<0)$eclong=($eclong + 360);$oblqec=(23.439 - 0.0000004 * $time);$eclong=deg2rad($eclong);$oblqec=deg2rad($oblqec);$num=(cos($oblqec)* sin($eclong));$den=(cos($eclong));$ra=(atan($num / $den));if($den<0)$ra=($ra + pi());if($den>=0&&$num<0)$ra=($ra + 2*pi());$dec=(asin(sin($oblqec)* sin($eclong)));$h=$hour + $min / 60;$gmst=(6.697375 + .0657098242 * $time + $h);$gmst=fmod($gmst,24);if($gmst<0)$gmst=($gmst + 24);$lmst=($gmst + $long / 15);$lmst=fmod($lmst,24);if($lmst<0)$lmst=($lmst + 24);$lmst=deg2rad($lmst * 15);$ha=($lmst - $ra);if($ha<pi())$ha=($ha + 2*pi());if($ha>pi())$ha=($ha - 2*pi());$lat=deg2rad($lat);$el=(asin(sin($dec)* sin($lat)+ cos($dec)* cos($lat)* cos($ha)));$az=(asin(-cos($dec)* sin($ha)/ cos($el)));if((sin($dec)- sin($el)* sin($lat))>00){if(sin($az)<0)$az=($az + 2*pi());}else{$az=(pi()- $az);}$el=rad2deg($el);$az=rad2deg($az);$lat=rad2deg($lat);return array(number_format($el,2),number_format($az,2));}public $latitude=null;public $longitude=null;public $date=null;public $timezone=null;public $elevation=null;public $azimuth=null;public $sunrise=null;public $transit=null;public $sunset=null;public $isDay=null;public $isMorning=null;public $isNoon=null;public $isAfternoon=null;public $isEvening=null;protected $dateFormat='Y-m-d';function __construct($latitude=0,$longitude=0,$timezone=false,$date=false,$time=false){$this->latitude=$latitude;$this->longitude=$longitude;if($timezone){$this->timezone=$timezone;date_default_timezone_set($timezone);}else $this->timezone=date_default_timezone_get();if($date)$this->date=DateTime::createFromFormat($this->dateFormat,$date);else $this->date=new DateTime('NOW',new DateTimeZone($this->timezone));if($time){$var=explode(':',$time);$this->date->setTime($var[0],$var[1]);}$this->getSunPos();$this->getDayPeriod();}}$lati=$lat;$long=$lon;$timezone=$TZ;$_SunPos=new sunPos($lati,$long,$timezone);$azimuth=$_SunPos->azimuth ;$elev=$_SunPos->elevation ;
//use meteobridge daylight with some improvements by Josh(milehighweather)
$light =$weather["daylight"]; $daylight = ltrim($light, '0'); $dark = 24 - str_replace(':','.',$daylight);
$lighthours = substr($daylight, 0, 2); $lightmins = substr($daylight, -2);
$darkhours = 23 - $lighthours; $darkminutes = 60 - $lightmins;if ($darkminutes<10) $darkminutes= '0' .$darkminutes;
else $darkminutes=$darkminutes;$thehour=date('H');$theminute=date('i');?>
	
	<style>
	
	.weather34sunclock {
	-webkit-transform:rotate(<?php echo ((($thehour*15)+($theminute/3))-87)?>deg);
	transform:rotate(<?php echo ((($thehour*15)+($theminute/3))-87)?>deg);
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
	background:<?php if ($elev<=0){echo "hsla(4, 40%, 48%,.5)";}else echo "#ec5732"?>;
	
	}
	.weather34sunclock :before{
	content:"<?php echo date('G:i')?>";	
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
	if ($now > $result['sunset'] || $now < $result['sunrise'] ){$sunspot = 'rgba(86,95,103,0)';}
	else {$sunspot = 'rgba(255, 112,50,1)';}
	?>	
		<script>
	//weather34 complete rework clean up very confusing code of the original by Wim Van de Kuil this code attempts to make it somewhat relative to what is supposed todo
	var c = document.getElementById("weather34sundial");
	var color= "hsla(206, 12%, 27%, .4)";
	var dpi = window.devicePixelRatio;	
	var daycolor= '<?php //weather34 make the daylight change as intensity of lux increases
	if ($weather['lux']>=100000 ){echo 'hsla(7, 60%, 57%,0.9)';}	
	elseif ($weather['lux']>=40000 ){echo 'hsla(19, 66%, 55%,.7)';}
	elseif ($weather['lux']>=20000 ){echo ' hsla(35, 77%, 58%, 0.8)';}
	elseif ($weather['lux']>=10000 ){echo ' hsla(35, 77%, 58%, 0.6)';}
	elseif ($weather['lux']>0 ){echo ' hsla(35, 77%, 58%, 0.6)';}
	else echo 'hsla(35, 77%, 58%, 0.6)';
	?>';
	var weather34sundial = c.getContext("2d");	
//weather34 daylight gradient
var gradient = weather34sundial.createLinearGradient(0, 0, c.width, 0);
gradient.addColorStop("0", "hsl(35, 77%, 58%)");
gradient.addColorStop("0.20", " hsla(19, 66%, 55%,.8)");
//weather34 dark gradient
var gradient2 = weather34sundial.createLinearGradient(0, 0, c.width, 0);
gradient2.addColorStop("0", "hsla(202, 8%, 46%,.5)");
gradient2.addColorStop("0.20", "hsla(206, 12%, 27%,.6)");
// weather34 Dark Fill
	weather34sundial.beginPath();
	weather34sundial.arc(63, 65, 55, 0, 2 * Math.PI);
	weather34sundial.lineWidth = 15;
	weather34sundial.strokeStyle = gradient2;
	weather34sundial.stroke();
	weather34sundial.closePath();
    //weather34 daylight fill
	weather34sundial.beginPath();
	weather34sundial.arc(63, 65, 55, '<?php echo $daybegins?>' * Math.PI, '<?php echo $endofday?>' * Math.PI);
	weather34sundial.lineWidth = 15;	
	weather34sundial.strokeStyle = gradient;
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
	<div class="almanac-word-sun">Sun-Moon</div>
	

	<div class="daylightmoduleposition" > 

	<div class="circleborderouter"></div><div class="circleborderinner"></div>	
	<div class="sundialcontainerdiv2" >
	
	<div id="sundialcontainer" class=sundialcontainer >
	<canvas id="weather34sundial" class="suncanvasstyle"></canvas>
	<div class="weather34sunclock"><div id="poscircircle"></div>


</div>
	
</div>
	

</div>
	
<div class="weather34moonphasesvg1">
<svg id="weather34moonsvg"  viewBox="0 0 200 200"  version="1.1"></svg>
<script type="text/javascript" charset="UTF-8"> 
//moonphase june 2020 based on original by http://www.ben-daglish.net/moon.shtml  
function moon_day(today) {    
    var thisJD = today.getJulian();
    var year = today.getFullYear();
    var degToRad = 3.14159265 / 180;
    var K0, T, T2, T3, J0, F0, M0, M1, B1, oldJ;
    K0 = Math.floor((year - 1900) * 12.3685);
    T = (year - 1899.5) / 100;
    T2 = T * T;
    T3 = T * T * T;
    J0 = 2415020 + 29 * K0;
    F0 = 0.0001178 * T2 - 0.000000155 * T3 + (0.75933 + 0.53058868 * K0) - (0.000837 * T + 0.000335 * T2);
    M0 = 360 * (GetFrac(K0 * 0.08084821133)) + 359.2242 - 0.0000333 * T2 - 0.00000347 * T3;
    M1 = 360 * (GetFrac(K0 * 0.07171366128)) + 306.0253 + 0.0107306 * T2 + 0.00001236 * T3;
    B1 = 360 * (GetFrac(K0 * 0.08519585128)) + 21.2964 - (0.0016528 * T2) - (0.00000239 * T3);
    var phase = 0;
    var jday = 0;
    while (jday < thisJD) {
        var F = F0 + 1.530588 * phase;
        var M5 = (M0 + phase * 29.10535608) * degToRad;
        var M6 = (M1 + phase * 385.81691806) * degToRad;
        var B6 = (B1 + phase * 390.67050646) * degToRad;
        F -= 0.4068 * Math.sin(M6) + (0.1734 - 0.000393 * T) * Math.sin(M5);
        F += 0.0161 * Math.sin(2 * M6) + 0.0104 * Math.sin(2 * B6);
        F -= 0.0074 * Math.sin(M5 - M6) - 0.0051 * Math.sin(M5 + M6);
        F += 0.0021 * Math.sin(2 * M5) + 0.0010 * Math.sin(2 * B6 - M6);
        F += 0.5 / 1440;        
        oldJ = jday;
         //jday = J0 + 28 * phase + Math.floor(F);
         jday = J0 + 28 * phase + Math.floor(F);
        phase++;
    }
    // 29.53059 days per lunar month
    return (thisJD - oldJ) /29.53059;
	function GetFrac(fr) {	return (fr - Math.floor(fr));}
}
function phase_junk(e){var t,n,a=[];e<=.25?(a=[1,0],t=20-20*e*4):e<=.5?(a=[0,0],t=20*(e-.25)*4):e<=.75?(a=[1,1],t=20-20*(e-.5)*4):e<=1?(a=[0,1],t=20*(e-.75)*4):exit;
var o=document.getElementById("weather34moonsvg");
if(0!=o&&null!=o)
if(document.createElementNS&&document.createElementNS("http://www.w3.org/2000/svg","svg")
.createSVGRect){
var r="m100,0 ";r=(r=r+"a"+t+",18 0 1,"+a[0]+" 0,150 ")+"a20,20 0 1,"+a[1]+" 0,-150";
var i="http://www.w3.org/2000/svg",
s=document.createElementNS(i,"path"),
d=document.createElementNS(i,"path");
d.setAttribute("class","weather34moonsvgmoonback"),
d.setAttribute("d","m100,0 a20,20 0 1,1 0,150 a20,20 0 1,1 0,-150"),
s.setAttribute("class","weather34moonsvgmoon"),
s.setAttribute("d",r),
o.setAttribute("height",80),
o.setAttribute("width",80),
o.appendChild(d),
o.appendChild(s)}
else!function(){
if(void 0===supportsVml.supported){
var e=document.body.appendChild(document.createElement("div"));e.innerHTML='<v:shape id="vml_flag1" adj="1" />';
var t=e.firstChild;t.style.behavior="url(#default#VML)",supportsVml.supported=!t||"object"==typeof t.adj,e.parentNode.removeChild(e)}supportsVml.supported}()}
Date.prototype.getJulian=function(){
	return ((this / 86400000) - (this.getTimezoneOffset() / 1440) + 2440587.8)};
  phase_junk(moon_day(new Date)); 
</script>
<?php 
// calculate lunar phase (1900 - 2199)
$year = date('Y');$month = date('n');$day = date('j');
if ($month < 4) {$year = $year - 1; $month = $month + 12;}
$days_y = 365.25 * $year;$days_m = 30.6 * $month;
$weather34julian = $days_y + $days_m + $day - 694039.09;
$weather34julian = $weather34julian / 29.5305882;
$weather34phase = intval($weather34julian);
$weather34julian = $weather34julian - $weather34phase;
$weather34phase = round($weather34julian * 8 + 0.5);
if ($weather34phase == 8) {$weather34phase = 0;}
$weather34phase_array = array('New <br>Moon', 'Waxing <br>Crescent', 'First <br>Quarter', 'Waxing <br>Gibbous', 'Full <br>Moon', 'Waning <br>Gibbous', 'Third <br>Quarter', 'Waning <br>Crescent');
$weather34lunar_phase = $weather34phase_array[$weather34phase];?>
<newphase><?php echo $weather34lunar_phase;?></newphase>
</div></div></div></div>
<div class="daylight4">
<?php 
if ($txt=='Sunrise'){echo $sunrisesicon;}if ($txt=='Sunset'){echo $sunsetsicon;}?>&nbsp;
<?php echo $hrs."<smallminutes1>hrs</smallminutes1>&nbsp;: ". $min."<smallminutes1> min</smallminutes1>" ?>
<?php if ($txt=='Sunrise'){echo "&nbsp;(<orange>".$nextrise."</orange>)";}if ($txt=='Sunset'){echo "&nbsp;(<red>".$nextset."</red>)";}?> 
</div> 

<div class="sunposition-block-sun">
<?php if ($elev<=0){echo $sundownhalf1;}else if ($elev>0){echo $sunuphalf1;};echo ' Azimuth';?> 
<deepblue><?php echo $azimuth ?>&deg;</deepblue>
<br>
<?php 
if ($elev<=0){echo $sundownhalf1;}else if ($elev>0){echo $sunuphalf1;};echo ' Elevation';?>  
<deepblue><?php echo $elev ?>&deg;</deepblue>  
</div>

<div class="sunrise-block-sun"> <?php echo $sunuphalf1.' Sunrise';?> 
<?php echo $nextrisetxt.' (<orange>'.$nextrise.'</orange>)<br>'.$sunuphalf.' Daylight (<deepblue>'.$light.'</deepblue> Hours)';?>
</div>

<div class="sunset-block-sun"><?php echo $sundownhalf1.' Sunset';?> 
<?php echo $nextsettxt.' (<red>'.$nextset.'</red>)<br>'.$sundownhalf.' Darkness ('.$darkhours,":".$darkminutes.' Hours)';?>
</div>

<div class="sunposition-block-sun" style="margin-top:25px;">
<?php echo $moonrisehalf.' Moonrise';?>: <?php echo $weather['moonrise']," ";?>
<br>
<?php echo $moonsethalf.' Moonset';?>: <?php echo $weather['moonset']," ";?>
</div>