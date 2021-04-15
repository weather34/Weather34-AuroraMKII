<?php 
	#########################################################
	#	Aurora MKII Moon phase data by BRIAN UNDERDOWN 2015-21       
	#	CREATED FOR HOMEWEATHERSTATION TEMPLATE at 
  # https://weather34.com/homeweatherstation/index.html  
	# 	1st Release 25TH JANUARY 2018 			                                                           
	# 	   revised March 2020                                                                          
	#   https://www.weather34.com 	                                                                   
	########################################################
include('livedata.php');
include('updater-almanac.php');
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
//get moon data rise/set
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
  function phase_name(){$names=array('&nbsp;New <br>Moon','Waxing <br>Crescent','First <br>Quarter','Waxing <br>Gibbous','&nbsp;Full <br>Moon','Waning <br>Gibbous','Third <br>Quarter','Waning <br>Crescent','New <br>Moon');
    //return $names[ floor(($this->phase + 0.0625)* 8)];} } 
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
else $darkminutes=$darkminutes;$thehour=date('H');$theminute=date('i');  
  ?>
  <?php 
  //weather34 next lunar event..
  $lunar_nextevent="No Lunar Event<br>s";
  //2021
  $lunar_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 12, 14, 20),"event_title"=>"<br><large>Lunar Total <blue>Eclipse</large></blue>
  <div class=date>Event Visible <br><blue> May 26th 2021<br>
  </div></div>","event_end"=>mktime(23, 59, 59, 5, 26, 21),);
  $lunar_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 5, 26, 21),"event_title"=>"<br><large>Annular Solar <blue>Eclipse</large></blue>
  <div class=date>Event Visible <br><blue> June 10th 2021<br>
  </div></div>","event_end"=>mktime(23, 59, 59, 6, 10, 21),);
  $lunar_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 6, 10, 21),"event_title"=>"<br><large>Partial Lunar <blue>Eclipse</large></blue>
  <div class=date>Event Visible <br><blue> Nov 18-19th 2021<br>
  </div></div>","event_end"=>mktime(23, 59, 59, 11, 19, 21),);
  $lunar_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 112, 19, 21),"event_title"=>"<br><large>Total Solar <blue>Eclipse</large></blue>
  <div class=date>Event Visible <br><blue> Dec 4th 2021</blue><br>
  </div></div>","event_end"=>mktime(23, 59, 59, 12, 4, 21),);
  $lunarNext=time();$lunarOP=false;
  foreach ($lunar_eventsnext as $lunar_check) {if ($lunar_check["event_start"]<=$lunarNext&&$lunarNext<=$lunar_check["event_end"]) {$lunarOP=true;$lunar_nextevent=$lunar_check["event_title"];}};
  //end meteor nevt event
  $lunarinfo3='<svg width="80" viewBox="0 0 512 512" id="weather34 svg eclipse"><g id="weather34eclipse"><path fill="#49545b" opacity=".5" d=" M 162.82 68.68 C 217.22 42.05 283.43 41.17 338.48 66.45 C 356.45 74.61 373.20 85.40 388.08 98.34 C 411.02 118.31 429.61 143.30 441.71 171.21 C 461.45 216.04 464.30 267.98 449.86 314.76 C 439.41 349.21 419.54 380.72 393.08 405.11 C 360.92 435.22 318.71 454.36 274.88 458.76 C 227.90 463.90 179.25 452.31 139.80 426.23 C 96.19 397.68 64.01 352.07 52.47 301.18 C 41.60 254.95 47.17 205.00 68.34 162.46 C 88.32 121.92 122.13 88.36 162.82 68.68 M 241.61 70.93 C 205.47 73.17 170.04 86.26 141.37 108.41 C 113.46 129.68 91.96 159.22 80.24 192.29 C 72.92 212.99 69.23 235.01 69.62 256.96 C 70.21 300.95 87.26 344.52 116.92 377.05 C 136.12 398.29 160.36 414.99 187.13 425.19 C 223.20 439.09 263.68 441.22 300.98 431.01 C 339.57 420.78 374.47 397.34 398.64 365.58 C 426.37 329.66 439.83 283.09 435.67 237.92 C 431.92 192.52 410.38 148.90 376.56 118.36 C 340.47 85.10 290.54 67.71 241.61 70.93 Z" /></g><g id="weather34pass"><path fill="#01a4b5" opacity="1.00" d=" M 338.48 66.45 C 344.19 58.84 353.31 53.45 363.03 53.96 C 378.55 53.20 392.86 67.55 392.04 83.07 C 392.30 88.44 390.64 93.68 388.08 98.34 C 373.20 85.40 356.45 74.61 338.48 66.45 Z" /></g>
  </svg>';
  ?>
  
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Weather34 Aurora MKII Sun Moon Position Information</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="console-dark.css?version=<?php echo filemtime('console-dark.css') ?>" rel="stylesheet prefetch">
    <style>
    
    .grida{display:grid;grid-template-columns:repeat(3,1fr);grid-column-gap:3px;grid-row-gap:3px;color:#afb7c0;margin-top:5px;font-family:verb}
  .grida>article{padding:5px;font-size:9px;border-radius:4px;-webkit-border-radius:4px;background:0;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;border:1px solid hsla(217,15%,17%,.5);border-bottom:10px solid hsla(217,15%,17%,.5);height:160px}
  .grid2{display:grid;grid-template-columns:repeat(2,1fr);grid-column-gap:3px;grid-row-gap:3px;color:#afb7c0;overflow:hidden;margin-top:5px}
  .grid2>article{padding:5px;font-size:.8em;border-radius:4px;-webkit-border-radius:4px;background:0;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;height:160px;border:1px solid hsla(217,15%,17%,.5);border-bottom:10px solid hsla(217,15%,17%,.5);font-family:verb}
  .grid2>article2{padding:5px;font-size:8px;border-radius:4px;-webkit-border-radius:4px;background:0;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;height:15px;border:1px solid hsla(217,15%,17%,.5);border-bottom:1px solid hsla(217,15%,17%,.5);font-family:verb;width:max-content}
  a{color:var(--blue);text-decoration:none}
  .weather34darkbrowser{position:relative;background:0;width:96%;height:30px;margin:auto;margin-top:-5px;margin-left:0;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:10px;font-family:verb}
  .weather34darkbrowser[url]:after{content:attr(url);color:#afb7c0;font-size:10px;position:absolute;left:0;right:0;top:0;padding:4px 15px;margin:11px 10px 0 auto;border-radius:3px;background:hsla(233,12%,13%,.5);height:20px;box-sizing:border-box}
  credit{position:relative;font-size:.7em;top:10%}
  .actualt{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:rgba(74,99,111,.1);padding:5px;font-family:verb,Arial,Helvetica,sans-serif;width:100px;height:.8em;font-size:.8rem;padding-top:2px;color:#afb7c0;align-items:center;justify-content:center;margin-bottom:10px;top:0}
  .actualw{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:rgba(74,99,111,.1);padding:5px;font-family:verb,Arial,Helvetica,sans-serif;width:100px;height:.8em;font-size:.8rem;padding-top:2px;color:#afb7c0;align-items:center;justify-content:center;margin-bottom:10px;top:0}
  .mbsmartlogo{position:relative;float:right;left:10px;top:70px}
  small{font-size:8px}
  large{position:relative;top:-5px;left:15px;font-size:12px;width:80px}
  .date{position:relative;top:-85px;left:110px;font-size:11px;width:120px}
  .date2{position:relative;top:-5px;left:5px;font-size:11px;width:160px}
  .weather34-container-clock{width:120px;height:120px;position:relative;top:-45px;left:-45px}
  .weather34-large-clock{width:130px;height:130px;border-radius:50%;background:hsla(214,29%,91%,.1);position:absolute;top:50px;left:50px;box-shadow:var(--button-shadow);transform:rotate(var(--rotation));border:4px solid hsla(204,31%,21%,.2);-webkit-transform:rotate(var(--rotation));-moz-transform:rotate(var(--rotation));-ms-transform:rotate(var(--rotation));-o-transform:rotate(var(--rotation))}
  .weather34-small-clock{width:100px;height:100px;border-radius:50%;background-color:rgba(0,0,0,.4);position:absolute;top:15px;left:15px;box-shadow:var(--button-shadow);background-image:linear-gradient(hsla(0,0%,33%,.3) 1px,transparent 1px),linear-gradient(to right,hsla(0,0%,33%,.3) 1px,transparent 1px);background-size:5px 5px}
  .circle{background-color:var(--blue);width:10px;height:10px;border-radius:50%;position:absolute;left:45px;top:40px;z-index:1}
  .hour-indicator{width:0;height:25px;background-color:#b7c5d3;border-radius:5px;position:absolute}
  .twelve{top:0;left:60px}
  .twelve::after{content:"12";font-size:12px;color:hsla(214,29%,91%,.8);font-family:verb,Arial,Helvetica,sans-serif}
  .three{right:11px;top:53px}
  .three::after{content:"3";font-size:12px;color:hsla(214,29%,91%,.8);font-family:verb,Arial,Helvetica,sans-serif}
  .weather34brand{left:40px;bottom:15px}
  .weather34brand::after{content:"weather34";font-size:9px;color:hsla(214,29%,91%,.8);font-family:verb,Arial,Helvetica,sans-serif}
  .six{left:62px;bottom:-10px}
  .six::after{content:"6";font-size:12px;color:hsla(214,29%,91%,.8);font-family:verb,Arial,Helvetica,sans-serif}
  .nine{left:5px;top:53px;height:3px;width:0}
  .nine::after{content:"9";font-size:12px;color:hsla(214,29%,91%,.8);font-family:verb,Arial,Helvetica,sans-serif}
  .hand{--rotation:0;height:50px;width:5px;border-radius:2px;position:absolute;left:63px;top:10px;transform-origin:bottom;transform:rotate(calc(var(--rotation) * 1deg))}
  .hour{background-color:#888989;height:35px;top:25px}
  .minute{background-color:#ec5113;width:4px}
  .second{background-color:var(--blue);width:1px}
  .clock34{box-shadow:var(--button-shadow);background-color:#1d2124;
  display:flex;font-family:clock;border-radius:3px;-webkit-border-radius:3px;-moz-border-radius:3px;-ms-border-radius:3px;-o-border-radius:3px;left:0;
  text-align:center;position:relative;color:#99B1C9;font-size:12px;text-transform:none;padding:4px;padding-top:6px;top:-147px;
  z-index:20;width:5.5em;background-image:linear-gradient(hsla(0,0%,33%,.1) 1px,transparent 1px),linear-gradient(to right,hsla(0,0%,33%,.1) 1px,transparent 1px);
  background-size:5px 5px;justify-content:center;align-items:center}
  .gridcal{display:grid;grid-template-columns:repeat(7,minmax(14px,1fr));grid-gap:.75em;color:hsla(214,29%,91%,.6)}
  .day{background:hsla(214,29%,91%,.1);display:flex;justify-content:center;align-items:center;border-radius:2px;color:#fff;-webkit-border-radius:2px;-moz-border-radius:2px;-ms-border-radius:2px;-o-border-radius:2px;height:14px;font-family:verb,Arial,Helvetica,sans-serif}
  .wrapper{width:calc(250px + 1.12em);margin:auto;margin-top:5px;margin-left:20px;font-family:verb,Arial,Helvetica,sans-serif;overflow:hidden;padding:7px;padding-right:10px;background-image:linear-gradient(hsla(0,0%,33%,.1) 1px,transparent 1px),linear-gradient(to right,hsla(0,0%,33%,.1) 1px,transparent 1px);background-size:2px 2px;border-radius:5px}
  .days{display:none;display:grid;grid-template-columns:repeat(7,30px);grid-gap:.75em;background:0}
  .curr_date{color:hsla(214,29%,91%,.8)}
  .weather34weekdays{position:relative;text-transform:uppercase;font-size:.8rem;display:grid;grid-template-columns:repeat(7,35px);grid-gap:.25em;list-style:none;left:6px;top:-70px;margin-bottom:-145px}
  .weather34weekdays todayorange{color:#fff;background:var(--green);border-radius:2px;-webkit-border-radius:2px;-moz-border-radius:2px;-ms-border-radius:2px;-o-border-radius:2px;line-height:14px;padding:0 2px 0 2px}
  grey{color:#ccc}
  blue{color:#01a4b4}
  orange{color:#d87040}
  orange1{position:relative;color:#009bb4;margin:0 auto;text-align:center;margin-left:5%;font-size:1.1rem}
  green{color:#afb7c0}
  red{color:#f37867}
  red6{color:#d65b4a}
  value{color:#fff}
  yellow{color:#df9741}
  purple{color:#916392}
  .actualt{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:rgba(74,99,111,0);padding:5px;font-family:verb,Arial,Helvetica,sans-serif;width:190px;height:.8em;font-size:.8rem;padding-top:2px;color:#afb7c0;align-items:center;justify-content:center;margin-bottom:10px;top:0}
  .actualups{position:relative;left:35px;background:rgba(74,99,111,0);padding:5px;font-family:verb,Arial,Helvetica,sans-serif;width:140px;height:.8em;font-size:.8rem;align-items:center;justify-content:center;top:-30px;margin-bottom:-10px}
  actualt34{display:none}
  .actualtlocal{position:relative;left:145px;background:rgba(74,99,111,0);padding:5px;font-family:verb,Arial,Helvetica,sans-serif;width:190px;height:.8em;font-size:.8rem;padding-top:2px;color:#afb7c0;align-items:center;justify-content:center;margin-bottom:10px;top:0}
  .weather34logosvg{position:absolute;display:flex;right:40px;margin-top:-60px;width:4rem}
  .weather34-image{position:absolute;display:flex;right:70px;margin-top:20px;width:10rem;opacity:.9}
  .info2a{position:absolute;margin-top:40px;font-size:.8em;margin-left:5px;width:200px}
  li{background:0 0;font-size:10px;margin-left:-150px;margin-top:-20px;border:0}
    
    
    </style>
  <div class="weather34darkbrowser" url="Moon Phase and Relative Information"></div>
  <main class="grida">
    
  <article>
  <?php echo $info;?> Moonphase | Sun Position <br>
  <div style="position:relative;margin-left:175px;margin-top:70px"> <div id="sunpos"></div></div>
  <br>
  </article>
  
  <article>
  <moonphaseriseset>
      <?php echo $info;?> <blue>Moon Information</blue><br>    
    <?php echo $info;?>
    Next Full Moon:<blue> &nbsp;<?php  // homeweatherstation new/fullmoon info output 18th Aug
    $now1 =time();$moon1 = new MoonPhase();
    echo "";if ($now1 < $moon1->full_moon()){echo date('l jS M', $moon1->full_moon() );}else echo date('l jS M', $moon1->next_full_moon() );
    ?></blue><br>
    <?php echo $info;?>  Next New Moon:<blue> <?php $moon=new MoonPhase();$nextnewmoon=date('l jS M',$moon->next_new_moon());echo $nextnewmoon;?>
    </blue>
    <br><br />
  
  <?php echo $info;?> Luminance:<blue><?php $moon=new MoonPhase();$lum=$moon->illumination();echo number_format($lum,1);?></blue>%<br>
  <?php echo $info;?> Distance:<blue><?php $moon=new MoonPhase();$distance=$moon->distance();echo number_format($distance,0);?></blue> km<br>
  <?php echo $info;?> Cycle:<blue><?php $moon = new MoonPhase();$moonage =round($moon->age(),2);echo round($moonage,2)?></blue> Days<br>
  <br>
  <?php echo $moonrisehalf?> Moon Rise: <?php echo $weather['moonrise']," ";?>
  <br>
  <?php echo $moonsethalf?> Moon Set:  <?php echo $weather['moonset']," ";?>
  
  
  </article>
  
  <article>
  
  <?php echo $info;?> <blue>Lunar Event Information</blue>
  <br>
  <?php 
  $lunayear=date('Y');		
   if($lunayear==2020 || $lunayear==2021 || $lunayear==2022 ){  
    echo $info." Total Lunar <blue>Eclipse</blue> 26 May 2021<br>";
    echo $info." Annular Solar <blue>Eclipse</blue> 10 Jun 2021<br>	";
    echo $info." Partial Lunar <blue>Eclipse </blue> 18-19 Nov 2021<br>	";
    echo $info." Total <blue>Eclipse </blue> 4 Dec 2021<br>"; 
    }	?>	
  
  
    <?php if ($lunar_nextevent)  {echo $lunarinfo3 ,$lunar_nextevent ;} ?>  
  </article>
  </main>
  
  
  
  <main class="grid2">
    <article>   <div style="font-size:9px;">  
    <script>$( document ).ready( function() {
    $('.day').remove();
    var start = new Date(new Date().getTime()+offset);
    current_date(start);
    let days = numDays(start.getMonth(), start.getYear());
    displayDays(start, days);
    let currDay = start.getDate();
    console.log(currDay);
    $('.day:nth-of-type('+currDay+')').css('background', ' var(--green)').css('box-shadow','none'); 
   
  });
  var d = new Date(new Date().getTime()+offset);
  var weekday = new Array(7);
  weekday[0] = "Sunday";
  weekday[1] = "Monday";
  weekday[2] = "Tuesday";
  weekday[3] = "Wednesday";
  weekday[4] = "Thursday";
  weekday[5] = "Friday";
  weekday[6] = "Saturday";
  var n = weekday[d.getDay()];
  // Formatting current date
  function current_date(curr_date) {
    var string = weekday[d.getDay()]+ " " + currMonth(curr_date) + ", " + curr_date.getDate() + ", " + curr_date.getFullYear();
    $(".curr_date").text(string);
  }
  function currMonth(date) {
    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    return months[date.getMonth()];
  }
  
  function currDay(date) {
    var months = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    return months[date.getDay()];
  }
  // input month and year, return number of days in month
  function numDays(month, year) {
    if (month == 1) {
      if(leapYear(year)) {
        return 29;
      } else {
        return 28;
      }
    }
    if(month == 0 || month == 2 || month == 4 || month == 6 || month == 7 || month == 9 || month == 11) {
      return 31;
    } else {
      return 30;
    }
  }
  // input - year, returns true if leap year, otherwise - false
  function leapYear(year) {
    if(year % 4 == 0) {
        if(year % 100 == 0) {
          if(year % 400 == 0) {
            return true;
          } else {
            return false;
          }  
        } else {
          return true;
        }
    } else {
      return false;
    } 
  }
  
  function setMonth(start, dir) {
    var newDate = start.setMonth(start.getMonth() + dir);
    return newDate;
  }
  
  function displayDays(date, days) {
    for(i = 0; i < days; i++) {
      $("<div></div>")
        .addClass("day")
        .text(i+1)
        .appendTo($('.days'));
    }
    
    $('.day:first-of-type').addClass("day_1");
    // day_1 is ... day of the week
    var day_1 = new Date(date.getFullYear(), date.getMonth(), 1);
    var start_col = day_1.getDay() + 1;
  
    $('.day:first-of-type').css('grid-column-start', start_col.toString());
    $('h1').text(currMonth(date) + " " + date.getFullYear());
  }
  </script>
    <div class="curr_date"></div></div>
      <div class="wrapper">
      <ul class="weather34weekdays" >
          <?php $datecolor=date('D');?>
           <li><?php if ($datecolor=='Sun'){echo '<todayorange>Sun</todayorange>';}else echo 'Sun';?></li>
           <li><?php if ($datecolor=='Mon'){echo '<todayorange>Mon</todayorange>';}else echo 'Mon';?></li>
           <li><?php if ($datecolor=='Tue'){echo '<todayorange>Tue</todayorange>';}else echo 'Tue';?></li>
           <li><?php if ($datecolor=='Wed'){echo '<todayorange>Wed</todayorange>';}else echo 'Wed';?></li>
           <li><?php if ($datecolor=='Thu'){echo '<todayorange>Thu</todayorange>';}else echo 'Thu';?></li>
           <li>&nbsp;<?php if ($datecolor=='Fri'){echo '<todayorange>Fri</todayorange>';}else echo 'Fri';?></li>
           <li><?php if ($datecolor=='Sat'){echo '<todayorange>Sat</todayorange>';}else echo 'Sat';?></li>
         </ul>  
      <div class="gridcal">          
        <div class="days">
          <div class="day day_1">1</div>
          <div class="day">2</div>
          <div class="day">3</div>
          <div class="day">4</div>
          <div class="day">5</div>
          <div class="day">6</div>
          <div class="day">7</div>
          <div class="day">8</div>
          <div class="day">9</div>
          <div class="day">10</div>
          <div class="day">11</div>
          <div class="day">12</div>
          <div class="day">13</div>
          <div class="day">14</div>
          <div class="day">15</div> 
          <div class="day">16</div>
          <div class="day">17</div>
          <div class="day">18</div>
          <div class="day">19</div>
          <div class="day">20</div>
          <div class="day">21</div>
          <div class="day">22</div>
          <div class="day">23</div>
          <div class="day">24</div>
          <div class="day">25</div>
          <div class="day">26</div>
          <div class="day">27</div>
          <div class="day">28</div>
          <div class="day">29</div>
          </div> 
        </div>      
      </div>
   
    
    </article>
    
  
  
  <article>  <div style="font-size:9px;"><?php echo $info;?> Local Time</div>
      <div class="weather34-container-clock">
          <div class="weather34-large-clock">
              <div class="hour-indicator twelve"></div>
              <div class="hour-indicator three"></div>
              <div class="hour-indicator six"></div>
              <div class="hour-indicator weather34brand"></div>
              <div class="hour-indicator nine"></div>
              <div class="weather34-small-clock">
              <div class="circle"></div>
              </div>
              <div class="hand hour" id="hour"></div>
              <div class="hand minute" id="minute"></div>
              <div class="hand second" id="second"></div>
          </div>
      </div>
      <script>
  // Based on Dribbble design adapted by weather34 with time based on your settings 
  // https://dribbble.com/shots/8200836-Skeuomorph-Clock-App
  var secondHand = document.getElementById("second");
  var minuteHand = document.getElementById("minute");
  var hourHand = document.getElementById("hour");
  var offset=<?php echo $UTC;?>;
  setInterval(setClock, 1000);
  function setClock() {  
    var e=new Date(new Date().getTime()+offset);
    var c=e.getHours();
    var a=e.getMinutes();
    var g=e.getSeconds();
    var f=e.getFullYear();
    var h=e.getMonth();
    var b=e.getDate();
    var b=e.getDate();
    var secondsRatio = e.getSeconds() / 60;
    var minutesRatio = (secondsRatio + e.getMinutes()) / 60;
    var hoursRatio = (minutesRatio + e.getHours()) / 12;
      setRotation(secondHand, secondsRatio);
      setRotation(minuteHand, minutesRatio);
      setRotation(hourHand, hoursRatio);}
  function setRotation(element, rotationRatio) {
      element.style.setProperty('--rotation', rotationRatio * 360) 
  }
  setClock();
    </script>
    
  <div style="font-family:verb;position:absolute;width:140px;margin-top:-75px;font-size:10px;margin-left:155px;text-align:center;background:#242A32;border-radius:3px;padding:3px;">
  <?php 
  if ($txt=='Sunrise'){echo $sunrisesicon; echo " <yellow>Sun</yellow> comes up in <br>";}
  if ($txt=='Sunset'){echo $sunsetsicon; echo " <orange>Sun</orange> goes down in <br>";}?>
  <?php echo $hrs." hrs : ". $min." min" ?>
  <?php if ($txt=='Sunrise'){echo " (<yellow>".$nextrise."</yellow>)";}
  if ($txt=='Sunset'){echo " (<orange>".$nextset."</orange>)";}?> 
  </div>
  
  <div style="font-family:verb;position:absolute;width:140px;margin-top:-35px;font-size:10px;margin-left:155px;text-align:center;background:#242A32;border-radius:3px;padding:3px;">
  Timezone <br><blue><?php $TZ	=str_replace('/', ' ', $TZ);$TZ	=str_replace('_', ' ', $TZ);echo $TZ;?> </blue>
  </div>
  
  <script type="text/javascript">
  var clockID;var yourTimeZoneFrom='<?php echo $UTC?>';var d=new Date();
  var weekdays=[];
  var months=[];
  //calculte the weather34 date-time UTC
  var tzDifference=yourTimeZoneFrom*60+d.getTimezoneOffset();
  var offset=tzDifference*60*1000;
  function UpdateClock(){
  var e=new Date(new Date().getTime()+offset);
  var a=e.getMinutes();
  var g=e.getSeconds();
  var f=e.getFullYear();
  var h=e.getMonth();
  var b=e.getDate();
  <?php if($clockformat=='12') {echo "if(e.getHours()<12){amorpm=' am'}else{amorpm=' pm'}";} else {echo "amorpm='';";}?>
  // add the weather34 date prefix
  var suffix = "";switch(b) {case 1: case 21: case 31: suffix = 'st'; break;case 2: case 22: suffix = 'nd'; break;case 3: case 23: suffix = 'rd'; break;default: suffix = 'th';}
  var i=weekdays[e.getDay()];if(a<10){a="0"+a}if(g<10){g="0"+g}if(c<10){c="0"+c}
  //weather34 option to use 24/12 hour format
  var c=e.getHours()
  <?php if ($clockformat == '12') { echo '% 12 || 12';} else { echo '% 24 || 00';}?>;
  document.getElementById("weather34clock2").innerHTML="<div class='clock34'>"+c+":"+a+":"+g+
  "<?php if($clockformat=='12') {echo "&nbsp;".date('a')."";} else {echo "&nbsp;";}?>"}
  function StartClock(){clockID=setInterval(UpdateClock,500)}
  function KillClock(){clearTimeout(clockID)}window.onload=function(){StartClock()}(jQuery);</script>
  </div></div>
  <div style="margin-top:15px;margin-left:200px;" id="weather34clock2"></div>
  
  </article> 
  
  <article2>  
    CSS/SVG/PHP scripts were developed by 
    <a href="https://weather34.com/homeweatherstation" target="_blank" title="https://weather34.com" alt="https://weather34.com">weather34.com</a> © 2015-<?php echo date('Y');?>
    <?php echo $weather34version ?> 
    </article2>
  
  
  </main>
  
  
  
  
  <script src="js/jquery.js"></script>
  
  