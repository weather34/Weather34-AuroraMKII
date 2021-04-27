<?php 
  	##########################################################	
	#	CREATED FOR WEATHER34 Aurora MKII TEMPLATE 											                      
	# https://weather34.com/homeweatherstation/index.html 											    
	# 	                                                                                               
	# 	1st Release: December 2020 Revised March 2021				  	                                                   
	# 	                                                                                               
	#   https://www.weather34.com 	                                                                   
	###########################################################
include('livedata.php');
include('console-settings.php');
header('Content-type: text/html; charset=utf-8');
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
	class Moon{ public static function calculateMoonTimes($month,$day,$year,$lat,$lon){$utrise=$utset=0;$timezone=(int)($lon / 15);
	$date=self::modifiedJulianDate($month,$day,$year);$date-=$timezone / 24;$latRad=deg2rad($lat);$sinho=0.0023271056;
	$sglat=sin($latRad);$cglat=cos($latRad);$rise=false;$set=false;$above=false;$hour=0;$ym=self::sinAlt($date,$hour ,$lon,$cglat,$sglat)- $sinho;$above=$ym>0;
	while($hour<25&&(false==$set||false==$rise)){$yz=self::sinAlt($date,$hour,$lon,$cglat,$sglat)- $sinho;$yp=self::sinAlt($date,$hour + 1,$lon,$cglat,$sglat)- $sinho;
	$quadout=self::quad($ym,$yz,$yp);$nz=$quadout[0];$z1=$quadout[1];$z2=$quadout[2];$xe=$quadout[3];$ye=$quadout[4];
	if($nz==1){if($ym<0){$utrise=$hour + $z1;$rise=true;}else{$utset=$hour + $z1;$set=true;}}if($nz==2){if($ye<0){$utrise=$hour + $z2;$utset=$hour + $z1;}
	else{$utrise=$hour + $z1;$utset=$hour + $z2;}}$ym=$yp;$hour+=2.0;}$retVal=new stdClass();
	$utrise=self::convertTime($utrise);$utset=self::convertTime($utset);$retVal->moonrise=$rise?mktime($utrise['hrs'],$utrise['min'],0,$month,$day,$year):mktime(0,0,0,$month,$day + 1,$year);
	$retVal->moonset=$set?mktime($utset['hrs'],$utset['min'],0,$month,$day,$year):mktime(0,0,0,$month,$day + 1,$year);return $retVal;} 
	private static function quad($ym,$yz,$yp){$nz=$z1=$z2=0;$a=0.5 *($ym + $yp)- $yz;$b=0.5 *($yp - $ym);$c=$yz;$xe=-$b /(2 * $a);$ye=($a * $xe + $b)* $xe + $c;$dis=$b * $b - 4 * $a * $c;
	if($dis>0){$dx=0.5 * sqrt($dis)/ abs($a);$z1=$xe - $dx;$z2=$xe + $dx;$nz=abs($z1)<1?$nz + 1:$nz;$nz=abs($z2)<1?$nz + 1:$nz;$z1=$z1<-1?$z2:$z1;}return array($nz,$z1,$z2,$xe,$ye);} 
	private static function sinAlt($mjd,$hour,$glon,$cglat,$sglat){$mjd+=$hour / 24;$t=($mjd - 51544.5)/ 36525;$objpos=self::minimoon($t);$ra=$objpos[1];$dec=$objpos[0];$decRad=deg2rad($dec);
	$tau=15 *(self::lmst($mjd,$glon)- $ra);return $sglat * sin($decRad)+ $cglat * cos($decRad)* cos(deg2rad($tau));} 
	private static function degRange($x){$b=$x / 360;$a=360 *($b -(int)$b);$retVal=$a<0?$a + 360:$a;return $retVal;} 
	private static function lmst($mjd,$glon){$d=$mjd - 51544.5;$t=$d / 36525;$lst=self::degRange(280.46061839 + 360.98564736629 * $d + 0.000387933 * $t * $t - $t * $t * $t / 38710000);
	return $lst / 15 + $glon / 15;} private static function minimoon($t){$p2=6.283185307;$arc=206264.8062;$coseps=0.91748;$sineps=0.39778;
	$lo=self::frac(0.606433 + 1336.855225 * $t);$l=$p2 * self::frac(0.374897 + 1325.552410 * $t);$l2=$l * 2;$ls=$p2 * self::frac(0.993133 + 99.997361 * $t);
	$d=$p2 * self::frac(0.827361 + 1236.853086 * $t);$d2=$d * 2;$f=$p2 * self::frac(0.259086 + 1342.227825 * $t);$f2=$f * 2;$sinls=sin($ls);$sinf2=sin($f2);$dl=22640 * sin($l);$dl+=-4586 * sin($l - $d2);$dl+=2370 * sin($d2);$dl+=769 * sin($l2);$dl+=-668 * $sinls;$dl+=-412 * $sinf2;$dl+=-212 * sin($l2 - $d2);$dl+=-206 * sin($l + $ls - $d2);$dl+=192 * sin($l + $d2);$dl+=-165 * sin($ls - $d2);$dl+=-125 * sin($d);$dl+=-110 * sin($l + $ls);$dl+=148 * sin($l - $ls);$dl+=-55 * sin($f2 - $d2);$s=$f +($dl + 412 * $sinf2 + 541 * $sinls)/ $arc;$h=$f - $d2;$n=-526 * sin($h);$n+=44 * sin($l + $h);$n+=-31 * sin(-$l + $h);$n+=-23 * sin($ls + $h);$n+=11 * sin(-$ls + $h);$n+=-25 * sin(-$l2 + $f);$n+=21 * sin(-$l + $f);$L_moon=$p2 * self::frac($lo + $dl / 1296000);$B_moon=(18520.0 * sin($s)+ $n)/ $arc;$cb=cos($B_moon);$x=$cb * cos($L_moon);$v=$cb * sin($L_moon);$w=sin($B_moon);$y=$coseps * $v - $sineps * $w;$z=$sineps * $v + $coseps * $w;$rho=sqrt(1 - $z * $z);$dec=(360 / $p2)* atan($z / $rho);$ra=(48 / $p2)* atan($y /($x + $rho));$ra=$ra<0?$ra + 24:$ra;return array($dec,$ra);} private static function frac($x){$x-=(int)$x;return $x<0?$x + 1:$x;} private static function modifiedJulianDate($month,$day,$year){if($month<=2){$month+=12;$year--;}$a=10000 * $year + 100 * $month + $day;$b=0;if($a<=15821004.1){$b=-2 *(int)(($year + 4716)/ 4)- 1179;}else{$b=(int)($year / 400)-(int)($year / 100)+(int)($year / 4);}$a=365 * $year - 679004;return $a + $b +(int)(30.6001 *($month + 1))+ $day;} private static function convertTime($hours){include('settings.php');$hrs=(int)($hours * 60 + 0.5)/ 60.0;$h=(int)($hrs);$m=(int)(60 *($hrs - $h)+ 0.5);return array('hrs'=>$h + $moonadj,'min'=>$m);} } $Moon=Moon::calculateMoonTimes($months,$days,$years,$lat,$lon); $MoonRise=$Moon->moonrise; $MoonSet=$Moon->moonset; $MoonRise=date($MoonRise); $MoonSet=date($MoonSet); class MoonPhase{ private $timestamp; private $phase; private $illum; private $age; private $dist; private $angdia; private $sundist; private $sunangdia; private $synmonth; private $quarters=null; function __construct($pdate=null){if(is_null($pdate))$pdate=time();$epoch=2444238.5;$elonge=278.833540;$elongp=282.596403;$eccent=0.016718;$sunsmax=1.495985e8;$sunangsiz=0.533128;$mmlong=64.975464;$mmlongp=349.383063;$mlnode=151.950429;$minc=5.145396;$mecc=0.054900;$mangsiz=0.5181;$msmax=384401;$mparallax=0.9507;$synmonth=29.53058868;$zenith=90+(50/60);$this->synmonth=$synmonth;$lunatbase=2423436.0;$this->timestamp=$pdate;$pdate=$pdate / 86400 + 2440587.5;$Day=$pdate - $epoch;$N=$this->fixangle((360 / 365.2422)* $Day);$M=$this->fixangle($N + $elonge - $elongp);$Ec=$this->kepler($M,$eccent);$Ec=sqrt((1 + $eccent)/(1 - $eccent))* tan($Ec / 2);$Ec=2 * rad2deg(atan($Ec));$Lambdasun=$this->fixangle($Ec + $elongp);$F=((1 + $eccent * cos(deg2rad($Ec)))/(1 - $eccent * $eccent));$SunDist=$sunsmax / $F;$SunAng=$F * $sunangsiz;$ml=$this->fixangle(13.1763966 * $Day + $mmlong);$MM=$this->fixangle($ml - 0.1114041 * $Day - $mmlongp);$MN=$this->fixangle($mlnode - 0.0529539 * $Day);$Ev=1.2739 * sin(deg2rad(2 *($ml - $Lambdasun)- $MM));$Ae=0.1858 * sin(deg2rad($M));$A3=0.37 * sin(deg2rad($M));$MmP=$MM + $Ev - $Ae - $A3;$mEc=6.2886 * sin(deg2rad($MmP));$A4=0.214 * sin(deg2rad(2 * $MmP));$lP=$ml + $Ev + $mEc - $Ae + $A4;$V=0.6583 * sin(deg2rad(2 *($lP - $Lambdasun)));$lPP=$lP + $V;$NP=$MN - 0.16 * sin(deg2rad($M));$y=sin(deg2rad($lPP - $NP))* cos(deg2rad($minc));$x=cos(deg2rad($lPP - $NP));$Lambdamoon=rad2deg(atan2($y,$x))+ $NP;$BetaM=rad2deg(asin(sin(deg2rad($lPP - $NP))* sin(deg2rad($minc))));$MoonAge=$lPP - $Lambdasun;$MoonPhase=(1 - cos(deg2rad($MoonAge)))/ 2;$MoonDist=($msmax *(1 - $mecc * $mecc))/(1 + $mecc * cos(deg2rad($MmP + $mEc)));$MoonDFrac=$MoonDist / $msmax;$MoonAng=$mangsiz / $MoonDFrac;$this->phase=$this->fixangle($MoonAge)/ 360;$this->illum=$MoonPhase;$this->age=$synmonth * $this->phase;$this->dist=$MoonDist;$this->angdia=$MoonAng;$this->sundist=$SunDist;$this->sunangdia=$SunAng;} private function fixangle($a){return($a - 360 * floor($a / 360));} private function kepler($m,$ecc){$epsilon=0.000001;$e=$m=deg2rad($m);do{$delta=$e - $ecc * sin($e)- $m;$e-=$delta /(1 - $ecc * cos($e));}while(abs($delta)>$epsilon);return $e;} private function meanphase($sdate,$k){$t=($sdate - 2415020.0)/ 36525;$t2=$t * $t;$t3=$t2 * $t;$nt1=2415020.75933 + $this->synmonth * $k + 0.0001178 * $t2 - 0.000000155 * $t3 + 0.00033 * sin(deg2rad(166.56 + 132.87 * $t - 0.009173 * $t2));return $nt1;} private function truephase($k,$phase){$apcor=false;$k+=$phase;$t=$k / 1236.85;$t2=$t * $t;$t3=$t2 * $t;$pt=2415020.75933 + $this->synmonth * $k + 0.0001178 * $t2 - 0.000000155 * $t3 + 0.00033 * sin(deg2rad(166.56 + 132.87 * $t - 0.009173 * $t2));$m=359.2242 + 29.10535608 * $k - 0.0000333 * $t2 - 0.00000347 * $t3;$mprime=306.0253 + 385.81691806 * $k + 0.0107306 * $t2 + 0.00001236 * $t3;$f=21.2964 + 390.67050646 * $k - 0.0016528 * $t2 - 0.00000239 * $t3;if($phase<0.01||abs($phase - 0.5)<0.01){$pt+=(0.1734 - 0.000393 * $t)* sin(deg2rad($m))+ 0.0021 * sin(deg2rad(2 * $m))- 0.4068 * sin(deg2rad($mprime))+ 0.0161 * sin(deg2rad(2 * $mprime))- 0.0004 * sin(deg2rad(3 * $mprime))+ 0.0104 * sin(deg2rad(2 * $f))- 0.0051 * sin(deg2rad($m + $mprime))- 0.0074 * sin(deg2rad($m - $mprime))+ 0.0004 * sin(deg2rad(2 * $f + $m))- 0.0004 * sin(deg2rad(2 * $f - $m))- 0.0006 * sin(deg2rad(2 * $f + $mprime))+ 0.0010 * sin(deg2rad(2 * $f - $mprime))+ 0.0005 * sin(deg2rad($m + 2 * $mprime));$apcor=true;}else if(abs($phase - 0.25)<0.01||abs($phase - 0.75)<0.01){$pt+=(0.1721 - 0.0004 * $t)* sin(deg2rad($m))+ 0.0021 * sin(deg2rad(2 * $m))- 0.6280 * sin(deg2rad($mprime))+ 0.0089 * sin(deg2rad(2 * $mprime))- 0.0004 * sin(deg2rad(3 * $mprime))+ 0.0079 * sin(deg2rad(2 * $f))- 0.0119 * sin(deg2rad($m + $mprime))- 0.0047 * sin(deg2rad($m - $mprime))+ 0.0003 * sin(deg2rad(2 * $f + $m))- 0.0004 * sin(deg2rad(2 * $f - $m))- 0.0006 * sin(deg2rad(2 * $f + $mprime))+ 0.0021 * sin(deg2rad(2 * $f - $mprime))+ 0.0003 * sin(deg2rad($m + 2 * $mprime))+ 0.0004 * sin(deg2rad($m - 2 * $mprime))- 0.0003 * sin(deg2rad(2 * $m + $mprime));if($phase<0.5)$pt+=0.0028 - 0.0004 * cos(deg2rad($m))+ 0.0003 * cos(deg2rad($mprime));else $pt+=-0.0028 + 0.0004 * cos(deg2rad($m))- 0.0003 * cos(deg2rad($mprime));$apcor=true;}if(!$apcor)return false;return $pt;} private function phasehunt(){$sdate=$this->utctojulian($this->timestamp);$adate=$sdate - 45;$ats=$this->timestamp - 86400 * 45;$yy=(int)gmdate('Y',$ats);$mm=(int)gmdate('n',$ats);$k1=floor(($yy +(($mm - 1)*(1 / 12))- 1900)* 12.3685);$adate=$nt1=$this->meanphase($adate,$k1);while(true){$adate+=$this->synmonth;$k2=$k1 + 1;$nt2=$this->meanphase($adate,$k2);if(abs($nt2 - $sdate)<0.75)$nt2=$this->truephase($k2,0.0);if($nt1<=$sdate&&$nt2>$sdate)break;$nt1=$nt2;$k1=$k2;}$data=array($this->truephase($k1,0.0),$this->truephase($k1,0.25),$this->truephase($k1,0.5),$this->truephase($k1,0.75),$this->truephase($k2,0.0),$this->truephase($k2,0.25),$this->truephase($k2,0.5),$this->truephase($k2,0.75));$this->quarters=array();foreach($data as $v)$this->quarters[]=($v - 2440587.5)* 86400;}private function utctojulian($ts){return $ts / 86400 + 2440587.5;} private function get_phase($n){if(is_null($this->quarters))$this->phasehunt();return $this->quarters[$n];} 
	function phase(){return $this->phase;}
	function illumination(){return $this->illum*100;} 
	function age(){return $this->age;} 
	function distance(){return $this->dist;} 
	function diameter(){return $this->angdia;} 
	function sundistance(){return $this->sundist;} 
	function sundiameter(){return $this->sunangdia;} 
	function new_moon(){return $this->get_phase(0);} 
	function first_quarter(){return $this->get_phase(1);} 
	function full_moon(){return $this->get_phase(2);} 
	function last_quarter(){return $this->get_phase(3);} 
	function next_new_moon(){return $this->get_phase(4);} 
	function next_first_quarter(){return $this->get_phase(5);} 
	function next_full_moon(){return $this->get_phase(6);} 
	function next_last_quarter(){return $this->get_phase(7);} 
	function phase_name(){$names=array('New<br>Moon','Waxing<br>Crescent','First<br>Quarter',
		'Waxing<br>Gibbous','Full<br>Moon','Waning<br>Gibbous','Third<br>Quarter','Waning<br>Crescent','New<br>Moon');
		return $names[ floor(($this->phase + 0.070)* 8)];} } 
	

//weather34 sunrise 
$nextrise = $result['sunrise']; $now = time(); 
if ($now > $nextrise) { $nextrise = date($timeformat,$result2['sunrise']);
$nextrisetxt = ' Tomorrow'  ;} 
else { $nextrisetxt = ' Today';$nextrise = date($timeformat,$nextrise);} 
//weather34 sunset
$nextset = $result['sunset'];if ($now > $nextset) { $nextset = date($timeformat,$result2['sunset']);
$nextsettxt = ' Tomorrow';}else { $nextsettxt = ' Today'; $nextset = date($timeformat,$nextset);} 
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
<div class="newphase"><?php $moon=new MoonPhase();$phases=$moon->phase_name();echo $phases;?></div>
<?php // lets rotate for those in the souther hemisphere 
if ($hemisphere==180){echo '<style>.weather34moonphasesvg1{-webkit-transform: rotate('.$hemisphere.'deg);transform: rotate('.$hemisphere.'deg);margin-top:32px;}
newphase{transform: rotate(180deg);</style>';}
?>
<svg id="weather34moonsvg"  viewBox="0 0 200 200"  version="1.1"></svg>
<script type="text/javascript" charset="UTF-8"> 
//moonphase revised March 2021 based on original by http://www.ben-daglish.net/moon.shtml  
Date.prototype.getJulian = function() {
    return Math.floor((this / 86400000) - (this.getTimezoneOffset()/1440) + 2440587.5);
}
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
         jday = J0 + 28.3 * phase + Math.floor(F);
        phase++;
    }
    // 29.53059 days per lunar month
    return (thisJD - oldJ) / 29.53059;
    function GetFrac(fr) {	return (fr - Math.floor(fr));}
}
function phase_junk(e){var t,n,a=[];e<=.25?(a=[1,0],t=20-20*e*4):e<=.5?(a=[0,0],t=20*(e-.25)*4):e<=.75?(a=[1,1],t=20-20*(e-.5)*4):e<=1?(a=[0,1],t=20*(e-.75)*4):exit;
var o=document.getElementById("weather34moonsvg");
if(0!=o&&null!=o)
if(document.createElementNS&&document.createElementNS("http://www.w3.org/2000/svg","svg")
.createSVGRect){
var r="m100,0 ";r=(r=r+"a"+t+",20 0 1,"+a[0]+" 0,150 ")+"a20,20 0 1,"+a[1]+" 0,-150";
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
//return ((this / 86400000) - (this.getTimezoneOffset() / 1440) + 2440587.5)};
return ((this / 86400000) - (this.getTimezoneOffset() / 1440) + 2440587.5)};
phase_junk(moon_day(new Date)); 
</script>
</div></div>
</div></div></div></div>