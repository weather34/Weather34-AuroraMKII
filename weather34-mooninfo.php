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
function phase_name(){$names=array('New Moon','Waxing Crescent','First Quarter','Waxing Gibbous','Full Moon','Waning Gibbous','Third Quarter','Waning Crescent','New Moon');return $names[ floor(($this->phase + 0.0625)* 8)];} } 

$meteor_default="No Meteor";
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 1, 3),"event_title"=>"Quadrantids Meteor","event_end"=>mktime(23, 59, 59, 1, 4),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 1, 5),"event_title"=>"Quadrantids Meteor","event_end"=>mktime(23, 59, 59, 1, 12),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 12, 28,2021),"event_title"=>"Quadrantids Meteor","event_end"=>mktime(23, 59, 59, 1, 2,2022),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 12, 28,2022),"event_title"=>"Quadrantids Meteor","event_end"=>mktime(23, 59, 59, 1, 2,2023),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 12, 28,2023),"event_title"=>"Quadrantids Meteor","event_end"=>mktime(23, 59, 59, 1, 2,2024),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 12, 28,2024),"event_title"=>"Quadrantids Meteor","event_end"=>mktime(23, 59, 59, 1, 2,2025),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 4, 9),"event_title"=>"Lyrids Meteor","event_end"=>mktime(20, 59, 59, 4, 20),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 4, 21),"event_title"=>"Lyrids Meteor","event_end"=>mktime(23, 59, 59, 4, 22),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 3, 5),"event_title"=>"ETA Aquarids","event_end"=>mktime(23, 59, 59, 5, 6),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 7, 20),"event_title"=>"Delta Aquarids","event_end"=>mktime(23, 59, 59, 7, 28),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 7, 29),"event_title"=>"Delta Aquarids","event_end"=>mktime(23, 59, 59, 7, 30),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 8, 1),"event_title"=>"Perseids Meteor","event_end"=>mktime(23, 59, 59, 8, 10),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 8, 11),"event_title"=>"Perseids Meteor <br><peak>".$info." For Next Two Days Peak Viewing Period</peak>","event_end"=>mktime(23, 59, 59, 8, 13),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 8, 14),"event_title"=>"Perseids Meteor","event_end"=>mktime(23, 59, 59, 8, 18),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 10, 6),"event_title"=>"Draconids","event_end"=>mktime(23, 59, 59, 10, 7),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 10, 20),"event_title"=>"Orionids Meteor","event_end"=>mktime(23, 59, 59, 10, 21),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 11, 4),"event_title"=>"South Taurids","event_end"=>mktime(23, 59, 59, 11, 5),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 11, 11),"event_title"=>"North Taurids","event_end"=>mktime(23, 59, 59, 11, 13),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 11, 13),"event_title"=>"Leonids Meteor","event_end"=>mktime(23, 59, 59, 11, 16),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 11, 17),"event_title"=>"Leonids Meteor","event_end"=>mktime(23, 59, 59, 11, 18),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 11, 19),"event_title"=>"Leonids Meteor","event_end"=>mktime(23, 59, 59, 11, 29),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 11, 30),"event_title"=>"Geminids Meteor","event_end"=>mktime(23, 59, 59, 12, 12),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 12, 13),"event_title"=>"Geminids Meteor","event_end"=>mktime(23, 59, 59, 12, 14),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 12, 16),"event_title"=>"Ursids Meteor","event_end"=>mktime(23, 59, 59, 12, 20),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 12, 21),"event_title"=>"Ursids Meteor","event_end"=>mktime(23, 59, 59, 12, 22),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 12, 23),"event_title"=>"Ursids Meteor","event_end"=>mktime(23, 59, 59, 12, 25),);
$meteor_events[]=array("event_start"=>mktime(0, 0, 0, 7, 3,2020),"event_title"=>"Comet Neowise","event_end"=>mktime(23, 59, 59, 7, 23,2020),);
$meteorNow=time();
$meteorOP=false;
foreach ($meteor_events as $meteor_check) {if ($meteor_check["event_start"]<=$meteorNow&&$meteorNow<=$meteor_check["event_end"]) {$meteorOP=true;$meteor_default=$meteor_check["event_title"];}};
//end meteor
//weather34 next meteor event original idea betejuice of cumulus forum..
$meteor_nextevent="No Meteor Shower<br>";
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 12, 18,23),"event_title"=>"Meteor Shower<br> <orange1>Quadrantids</orange1><div class=date2><br>Active Dec 28th-Jan 12th
<br><green>Estimated ZHR: </green><blue>120 <br> Peaks <blue>Jan 3rd-4th</blue></div></div>","event_end"=>mktime(23, 59, 59, 1, 2,24),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 12, 18,22),"event_title"=>"Meteor Shower<br> <orange1>Quadrantids</orange1><div class=date2><br>Active Dec 28th-Jan 12th
<br><green>Estimated ZHR: </green><blue>120 <br> Peaks <blue>Jan 3rd-4th</blue></div></div>","event_end"=>mktime(23, 59, 59, 1, 2,23),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 12, 18,21),"event_title"=>"Meteor Shower<br> <orange1>Quadrantids</orange1><div class=date2><br>Active Dec 28th-Jan 12th
<br><green>Estimated ZHR: </green><blue>120 <br> Peaks <blue>Jan 3rd-4th</blue></div></div>","event_end"=>mktime(23, 59, 59, 1, 2,22),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 12, 18,20),"event_title"=>"Meteor Shower<br> <orange1>Quadrantids</orange1><div class=date2><br>Active Dec 28th-Jan 12th
<br><green>Estimated ZHR: </green><blue>120 <br> Peaks <blue>Jan 3rd-4th</blue></div></div>","event_end"=>mktime(23, 59, 59, 1, 2,21),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 12, 18,19),"event_title"=>"Meteor Shower<br> <orange1>Quadrantids</orange1><div class=date2><br>Active Dec 28th-Jan 12th
<br><green>Estimated ZHR: </green><blue>120 <br> Peaks <blue>Jan 3rd-4th</blue></div></div>","event_end"=>mktime(23, 59, 59, 1, 2,20),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 12, 24),"event_title"=>"Meteor Shower<br> <orange1>Quadrantids</orange1><div class=date2><br>Active Dec 28th-Jan 12th
<br><green>Estimated ZHR: </green><blue>120 <br>Peaks <blue>Jan 3rd-4th</blue></div></div>","event_end"=>mktime(23, 59, 59, 1, 2),);
$meteor_eventsnext[]=array("event_start"=>mktime(0, 0, 0, 1, 3),"event_title"=>"Meteor Shower<br> <orange1>Quadrantids</orange1><div class=date2><br>Peak Viewing Now<br><div class=date2>
<br><green>Estimated ZHR: </green><blue>120</div></div>","event_end"=>mktime(23, 59, 59, 1, 4),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 1, 2),"event_title"=>"Meteor Shower<br> <orange1>&nbsp; &nbsp;Lyrids</orange1><div class=date2><br>Active Apr 18th-Apr 25th<br>
<green>Estimated ZHR: </green><blue>18</blue><br>Peaks <blue>Apr 23rd</blue></div></div>","event_end"=>mktime(23, 59, 59, 4, 20),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 4, 20),"event_title"=>"Meteor Shower<br> <orange1>Lyrids</orange1> <div class=date2><br>Peak Viewing Now<br>
<green>Estimated ZHR: </green><blue>18</blue><br>Peaks <blue>Apr 23rd</blue></div></div>","event_end"=>mktime(23, 59, 59, 4, 22),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 4, 22),"event_title"=>"Meteor Shower<br> <orange1>&nbsp; &nbsp;ETA Aquarids </orange1><br><div class=date2><br>Active Apr 24th-May 19th
<br><green>Estimated ZHR: </green><blue>55 </blue><br> Peaks <blue>May 6th</blue></div></div>","event_end"=>mktime(23, 59, 59, 5, 6),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 5, 6),"event_title"=>"Meteor Shower<br> <orange1>&nbsp; &nbsp;Delta Aquarids</orange1><div class=date2><br>Active Jul 21st-Aug 23rd<br><green>Estimated ZHR: </green><blue>16</blue><br> Peaks <blue>Jul 28th</blue></div></div>","event_end"=>mktime(23, 59, 59, 7, 27),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 7, 27),"event_title"=>"Meteor Shower<br> <orange1> &nbsp; &nbsp;Perseids</orange1><div class=date2><br>Active Jul 13th-Aug 26th<br>
<green>Estimated ZHR: </green><blue>100</blue><br> Peaks <blue>Aug 11th-13th</blue></div>","event_end"=>mktime(23, 59, 59, 8, 10),);
$meteor_eventsnext[]=array("event_start"=>mktime(0, 0, 0, 8, 11),"event_title"=>"Meteor Shower<br><orange1> &nbsp; &nbsp;Perseids</orange1> <br><div class=date2><br>
<green>Estimated ZHR: </green><blue>100</blue><br> Peaks <blue>Aug 11th-13th</blue><br>Visible till 26th August</div></div>","event_end"=>mktime(23, 59, 59, 8, 26),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 8, 26),"event_title"=>"Meteor Shower<br> <orange1> &nbsp; &nbsp;Draconids</orange1><div class=date2><br>Active October 6th-10th<br>
<green>Estimated ZHR: </green><blue>5</blue><br> Peaks <blue>Oct 9th</blue></div></div>","event_end"=>mktime(23, 59, 59, 10, 7),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 10, 7),"event_title"=>"Meteor Shower<br> <orange1> &nbsp; &nbsp;Orionids</orange1><div class=date2><br>Active Oct 21st-Oct 22nd<br>
<green>Estimated ZHR: </green><blue>25</blue><br> Peaks <blue>Oct 22nd</blue></div></div>","event_end"=>mktime(23, 59, 59, 10, 21),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 10, 21),"event_title"=>"Meteor Shower<br> <orange1> &nbsp; &nbsp;South Taurids</orange1><div class=date2><br>Active Nov 4th- Nov 5th<br><green>Estimated ZHR: </green><blue>5</blue><br> Peaks <blue>Nov 5th</blue></div></div>","event_end"=>mktime(23, 59, 59, 11, 5),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 11, 5),"event_title"=>"Meteor Shower<br> <orange1> &nbsp; &nbsp;North Taurids</orange1><div class=date2><br>Active Nov 11th<br>
<green>Estimated ZHR: </green><blue>5</blue><br> Peaks <blue>Nov 12-13th</blue></div></div>","event_end"=>mktime(23, 59, 59, 11, 13),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 11, 13),"event_title"=>"Meteor Shower<br> <orange1> &nbsp; &nbsp;Leonids</orange1><div class=date2><br>Active Nov 5th-Dec 3rd<br>
<green>Estimated ZHR: </green><blue>15</blue><br> Peaks <blue>Nov 18th</blue></div></div>","event_end"=>mktime(23, 59, 59, 11, 18),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 11, 18),"event_title"=>"Meteor Shower<br> <orange1> &nbsp; &nbsp;Geminids</orange1><div class=date2><br>Active Nov 30th-Dec 17th<br>
<green>Estimated ZHR: </green><blue>120</blue><br> Peaks <blue>Dec 14th</blue></div></div>","event_end"=>mktime(23, 59, 59, 12, 14),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 12, 14),"event_title"=>"Meteor Shower<br> <orange1> &nbsp; &nbsp;Ursids</orange1><div class=date2><br>Active Dec 17th-Dec 24th<br>
<green>Estimated ZHR: </green><blue>5-10</blue><br> Peaks <blue>Dec 23rd</blue></div></div>","event_end"=>mktime(23, 59, 59, 12, 18),);

$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 7, 3 , 2020),"event_title"=>"Comet Visible<br> <orange1> &nbsp; &nbsp;Neowise</orange1><div class=date2><br>Active Jul 7th-Jul 24th<br>
<green>North West: </green><blue></blue><br>Visible 1-2 Hours after <blue>Sunset</blue></div></div>","event_end"=>mktime(23, 59, 59, 7, 24, 2020),);


$meteorNext=time();$meteorOP=false;
foreach ($meteor_eventsnext as $meteor_check) {if ($meteor_check["event_start"]<=$meteorNext&&$meteorNext<=$meteor_check["event_end"]) {$meteorOP=true;$meteor_nextevent=$meteor_check["event_title"];}};
//end meteor nevt event
$meteorinfo3="<svg width='22px' height='22px' viewBox='0 0 16 16'><path fill='#aaa' d='M0 0l14.527 13.615s.274.382-.081.764c-.355.382-.82.055-.82.055L0 0zm4.315 1.364l11.277 10.368s.274.382-.081.764c-.355.382-.82.055-.82.055L4.315 1.364zm-3.032 2.92l11.278 10.368s.273.382-.082.764c-.355.382-.819.054-.819.054L1.283 4.284zm6.679-1.747l7.88 7.244s.19.267-.058.534-.572.038-.572.038l-7.25-7.816zm-5.68 5.13l7.88 7.244s.19.266-.058.533-.572.038-.572.038l-7.25-7.815zm9.406-3.438l3.597 3.285s.094.125-.029.25c-.122.125-.283.018-.283.018L11.688 4.23zm-7.592 7.04l3.597 3.285s.095.125-.028.25-.283.018-.283.018l-3.286-3.553z'/></svg>";
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
$lunarinfo3='<svg width="110" viewBox="0 0 512 512" id="weather34 svg eclipse"><g id="weather34eclipse"><path fill="#49545b" opacity=".5" d=" M 162.82 68.68 C 217.22 42.05 283.43 41.17 338.48 66.45 C 356.45 74.61 373.20 85.40 388.08 98.34 C 411.02 118.31 429.61 143.30 441.71 171.21 C 461.45 216.04 464.30 267.98 449.86 314.76 C 439.41 349.21 419.54 380.72 393.08 405.11 C 360.92 435.22 318.71 454.36 274.88 458.76 C 227.90 463.90 179.25 452.31 139.80 426.23 C 96.19 397.68 64.01 352.07 52.47 301.18 C 41.60 254.95 47.17 205.00 68.34 162.46 C 88.32 121.92 122.13 88.36 162.82 68.68 M 241.61 70.93 C 205.47 73.17 170.04 86.26 141.37 108.41 C 113.46 129.68 91.96 159.22 80.24 192.29 C 72.92 212.99 69.23 235.01 69.62 256.96 C 70.21 300.95 87.26 344.52 116.92 377.05 C 136.12 398.29 160.36 414.99 187.13 425.19 C 223.20 439.09 263.68 441.22 300.98 431.01 C 339.57 420.78 374.47 397.34 398.64 365.58 C 426.37 329.66 439.83 283.09 435.67 237.92 C 431.92 192.52 410.38 148.90 376.56 118.36 C 340.47 85.10 290.54 67.71 241.61 70.93 Z" /></g><g id="weather34pass"><path fill="#01a4b5" opacity="1.00" d=" M 338.48 66.45 C 344.19 58.84 353.31 53.45 363.03 53.96 C 378.55 53.20 392.86 67.55 392.04 83.07 C 392.30 88.44 390.64 93.68 388.08 98.34 C 373.20 85.40 356.45 74.61 338.48 66.45 Z" /></g>
</svg>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weather34 MB-SMART Moon Phase Information</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
  :root {
    --white: #ffffff;
    --light: #f5f5f5;
    --dark: #07090a;
    --dark-light: hsla(0, 0%, 0%, 0.251);
    --dark-toggle: #35393b;
    --dark-caption: rgba(66, 70, 72, 0.429);
    --black: #000000;
    --deepblue: #00adbd;
    --blue: #00adbd;
    --rainblue: #00adbd;
    --darkred: #703232;
    --deepred: #703232;
    --red: #d35f50;
    --yellow: #e6a241;
    --green: #90b22a;
    --orange: rgb(236, 81, 19);
    --purple: #8680bc;
    --silver: #ecf0f3;
    --border-dark: #3d464d;
    --body-text-dark: #afb7c0;
    --body-text-light: #545454;
    --blocks: #e6e8ef;
    --modules: #1e1f26;
    --blocks-background: rgba(82, 92, 97, 0.19);
    --temp-5-10: #7face6;
    --temp-0-5: #00adbd;
    --temp0-5: #00adbd;
    --temp5-10: #9bbc2f;
    --temp10-15: #e6a241;
    --temp15-20: #f78d03;
    --temp20-25: #d87040;
    --temp25-30: #e64b24;
    --temp30-35: #cc504c;
    --temp35-40: hsl(4, 40%, 48%);
    --temp40-45: #be5285;
    --temp45-50: #b95c95;
    --font-color: grey;
    --bg-color: hsla(198, 14%, 14%, 0.19);
    --button-bg-color: hsla(198, 14%, 14%, 0.19);
    --button-shadow: inset 5px 5px 20px #0c0b0b,
      inset -5px -5px 20px hsla(198, 14%, 14%, 0.19);
  }
  
  @font-face {
    font-family: weathertext2;
    src: url(fonts/verbatim-regular.woff2) format("woff2");
  }
  @font-face {
    font-family: clock;
    src: url(fonts/clock3-webfont.woff2) format("woff2");
  }

  @font-face {
    font-family: verb;
    src: url(fonts/verbatim-bold.woff2) format("woff2");
  }
  html,
  body {
    font-size: 13px;
    font-family: 'verb',weathertext2,Arial, Helvetica, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    color: #AFB7C0;
  }
  .grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-column-gap: 5px;
    grid-row-gap: 5px;
    color: #AFB7C0;
    margin-top: 5px;
  }
  
  .grid > article {
   
    padding: 5px;
    font-size: 0.8em;
    border-radius: 4px;
    -webkit-border-radius: 4px;
    background: 0;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    border: 1px solid hsla(217, 15%, 17%, .5);
      border-bottom: 15px solid hsla(217, 15%, 17%, .5);
    height: 155px;
    
  }
  
  .grid > article2 {
   
    padding: 5px;
    font-size: 0.8em;
    border-radius: 4px;
    -webkit-border-radius: 4px;
    background: 0;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    border: 1px solid hsla(217, 15%, 17%, .5);
      border-bottom: 15px solid hsla(217, 15%, 17%, .5);
    height: 170px;  
  }
  .grid2 {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-column-gap: 5px;
    grid-row-gap: 5px;
    color: #afb7c0;
    overflow: hidden;
    margin-top: 5px;
  }
  .grid2 > article {
   
    padding: 5px;
    font-size: 0.8em;
    border-radius: 4px;
    -webkit-border-radius: 4px;
    background: 0;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    max-height: 120px;
    border: 1px solid hsla(217, 15%, 17%, .5);
      border-bottom: 15px solid hsla(217, 15%, 17%, .5);
      font-family:verb
  }
  
  .gridfooter {
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    grid-column-gap: 5px;
    grid-row-gap: 5px;
    color: #afb7c0;
    overflow: hidden;
    margin-top: 5px;
  }
  .gridfooter > article {
   
    padding: 5px;
    font-size: 0.8em;
    border-radius: 4px;
    -webkit-border-radius: 4px;
    background: 0;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    font-family:verb
  }
  
  a {
    color: var(--blue);
    text-decoration: none;
  }
  .weather34darkbrowser {
    position: relative;
    background: 0;
    width: 96%;
    height: 30px;
    margin: auto;
    margin-top: -5px;
    margin-left: 0px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    padding-top: 10px;
  }
  .weather34darkbrowser[url]:after {
    content: attr(url);
    color: #afb7c0;
    font-size: 10px;
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    padding: 4px 15px;
    margin: 11px 10px 0 auto;
    border-radius: 3px;
    background: hsla(233, 12%, 13%, 0.5);
    height: 20px;
    box-sizing: border-box;
  }
  
  .moonphasesvg {
    align-items: right;
    justify-content: center;
    display: flex;
    max-height: 120px; 
  }
  .moonphasetext {
    font-size: 0.7rem;
    color: #AFB7C0;
    position: absolute;
    display: inline;
    left: 110px;
    top: 100px;
    font-family:verb
  }
  moonphaseriseset {
    font-size: 0.7rem;
    font-family:verb;
    color: #AFB7C0;
  }
  credit {
    position: relative;
    font-size: 0.7em;
    top: 10%;
  }
  .actualt {
    position: relative;
    left: 5px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -o-border-radius: 3px;
    border-radius: 3px;
    background: rgba(74, 99, 111, 0.1);
    padding: 5px;
    font-family: 'verb',Arial, Helvetica, sans-serif;
    width: 100px;
    height: 0.8em;
    font-size: 0.8rem;
    padding-top: 2px;
    color: #afb7c0;
    align-items: center;
    justify-content: center;
    margin-bottom: 10px;
    top: 0;
  }
  .actualw {
    position: relative;
    left: 5px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -o-border-radius: 3px;
    border-radius: 3px;
    background: rgba(74, 99, 111, 0.1);
    padding: 5px;
    font-family: 'verb',Arial, Helvetica, sans-serif;
    width: 100px;
    height: 0.8em;
    font-size: 0.8rem;
    padding-top: 2px;
    color: #afb7c0;
    align-items: center;
    justify-content: center;
    margin-bottom: 10px;
    top: 0;
  }
  .moonphaseing {
    width: 110px;
    padding-bottom: 50px;
    margin-top: -10px;
  }
  .weather34moonforeground {
    fill: rgba(230, 232, 239, 0.3);
    stroke: rgba(86, 95, 103, 0.8);
    stroke-width: 0;
    max-height: 100px;
  }
  .weather34moonbackground {
    fill: rgba(86, 95, 103, 0.8);
    stroke: rgba(230, 232, 239, 0.3);
    stroke-width: 0;
  }
  .mbsmartlogo {
    position: relative;
    float: right;
    left: 10px;
    top: 70px;
  }
  small {
    font-size: 8px;
  }
  large {
    position: relative;
    top: -5px;
    left: 15px;
    font-size: 12px;
    width: 80px;
  }
  .date {
    position: relative;
    top: -85px;
    left: 110px;
    font-size: 11px;
    width: 120px;
  }
  
  .date2 {
    position: relative;
    top: -5px;
    left: 5px;
    font-size: 11px;
    width: 160px;
  }
  .weather34moonsvgmoon {
    fill: rgba(145, 157, 163, 0.7);
    stroke: rgba(230, 232, 239, 0.1);
    stroke-width: 0; overflow:hidden
  }
  .weather34moonsvgmoonback {
    fill: #0D1115;
    stroke: rgba(230, 232, 239, 0.1);
    stroke-width: 0;overflow:hidden
  }
  .weather34moonphasesvg {
    position: relative;
    display: flex;
    max-width: 130px;
    overflow:hidden
  }
  .moonphaseposition {
    position: relative;
    margin-left: -5px;
    top: 15px;
    display: flex;
    max-width: 100px;
    width: 100px;
    height: 100px;
    overflow:hidden
  }
  .weather34-container-clock {
    width: 120px;
    height: 120px;
    position: relative;
    top: -50px;
    left: -5px;
  }
  .weather34-large-clock {
    width: 130px;
    height: 130px;
    border-radius: 50%;
    background: hsla(214, 29%, 91%, 0.1);
    position: absolute;
    top: 50px;
    left: 50px;
    box-shadow: var(--button-shadow);
    transform: rotate(var(--rotation));
    border: 4px solid hsla(204, 31%, 21%, 0.2);
    -webkit-transform: rotate(var(--rotation));
    -moz-transform: rotate(var(--rotation));
    -ms-transform: rotate(var(--rotation));
    -o-transform: rotate(var(--rotation));
  }
  .weather34-small-clock {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background-color: rgba(0, 0, 0, 0.4);
    position: absolute;
    top: 15px;
    left: 15px;
    box-shadow: var(--button-shadow);
    background-image: linear-gradient(hsla(0, 0%, 33%, 0.3) 1px, transparent 1px),
      linear-gradient(to right, hsla(0, 0%, 33%, 0.3) 1px, transparent 1px);
    background-size: 5px 5px;
  }
  .circle {
    background-color: var(--blue);
    width: 10px;
    height: 10px;
    border-radius: 50%;
    position: absolute;
    left: 45px;
    top: 40px;
    z-index: 1;
  }
  .hour-indicator {
    width: 0;
    height: 25px;
    background-color: #b7c5d3;
    border-radius: 5px;
    position: absolute;
  }
  .twelve {
    top: 0;
    left: 60px;
  }
  .twelve::after {
    content: "12";
    font-size: 12px;
    color: hsla(214, 29%, 91%, 0.8);
    font-family: 'verb',Arial, Helvetica, sans-serif;
  }
  .three {
    right: 11px;
    top: 53px;
  }
  .three::after {
    content: "3";
    font-size: 12px;
    color: hsla(214, 29%, 91%, 0.8);
    font-family: 'verb',Arial, Helvetica, sans-serif;
  }
  .weather34brand {
    left: 40px;
    bottom: 15px;
  }
  .weather34brand::after {
    content: "weather34";
    font-size: 9px;
    color: hsla(214, 29%, 91%, 0.8);
    font-family: 'verb',Arial, Helvetica, sans-serif;
  }
  .six {
    left: 62px;
    bottom: -10px;
  }
  .six::after {
    content: "6";
    font-size: 12px;
    color: hsla(214, 29%, 91%, 0.8);
    font-family: 'verb',Arial, Helvetica, sans-serif;
  }
  .nine {
    left: 5px;
    top: 53px;
    height: 3px;
    width: 0;
  }
  .nine::after {
    content: "9";
    font-size: 12px;
    color: hsla(214, 29%, 91%, 0.8);
    font-family: 'verb',Arial, Helvetica, sans-serif;
  }
  .hand {
    --rotation: 0;
    height: 50px;
    width: 5px;
    border-radius: 2px;
    position: absolute;
    left: 63px;
    top: 10px;
    transform-origin: bottom;
    transform: rotate(calc(var(--rotation) * 1deg));
  }
  .hour {
    background-color: #888989;
    height: 35px;
    top: 25px;
  }
  .minute {
    background-color: #ec5113;
    width: 4px;
  }
  .second {
    background-color: var(--blue);
    width: 1px;
  }
  .clock34 {
    box-shadow: var(--button-shadow);
    background-color: #1d2124;
    display: flex;
    font-family: clock;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -ms-border-radius: 3px;
    -o-border-radius: 3px;
    left: 0px;
    text-align: center;
    position: relative;
    color: hsla(214, 29%, 91%, 0.6);
    font-size: 1rem;
    text-transform: none;
    padding: 4px;
    padding-top: 6px;
    top: -147px;
    font-family: clock;
    z-index: 20;
    width: 5.5em;
    background-image: linear-gradient(hsla(0, 0%, 33%, 0.1) 1px, transparent 1px),
      linear-gradient(to right, hsla(0, 0%, 33%, 0.1) 1px, transparent 1px);
    background-size: 5px 5px;
    justify-content: center;
    align-items: center;
  }
  
  .gridcal{display:grid;grid-template-columns:repeat(7,minmax(14px,1fr));
  grid-gap:.75em;color:hsla(214,29%,91%,.6);}
.day{background:hsla(214,29%,91%,.1);display:flex;justify-content:center;align-items:center;border-radius:2px;color:#fff;
-webkit-border-radius:2px;-moz-border-radius:2px;-ms-border-radius:2px;-o-border-radius:2px;height:14px;font-family: 'verb',Arial, Helvetica, sans-serif;}
.wrapper{width:calc(240px + 1.12em);margin:auto;margin-top:0px;margin-left:0;font-family: 'verb',Arial, Helvetica, sans-serif;overflow:hidden;padding:7px;padding-right:10px;
background-image:linear-gradient(hsla(0,0%,33%,.1) 1px,transparent 1px),linear-gradient(to right,hsla(0,0%,33%,.1) 1px,transparent 1px);background-size:2px 2px;border-radius:5px}
.days{display:grid;grid-template-columns:repeat(7,30px);grid-gap:.75em;}
.curr_date{color:hsla(214,29%,91%,.8)}
.weather34weekdays{position:relative;text-transform:uppercase;font-size:.8rem;display:grid;grid-template-columns:repeat(7,30px);grid-gap:.75em;list-style:none;left:-36px;top:-10px;margin-bottom:-5px}
.weather34weekdays todayorange{color:#fff;background:var(--orange);border-radius:2px;-webkit-border-radius:2px;-moz-border-radius:2px;-ms-border-radius:2px;-o-border-radius:2px;line-height:14px;padding:0 2px 0 2px}
grey{color:#ccc}
  blue {
    color: #01a4b4;
  }
  orange {
    color: #d87040;
  }
  orange1 {
    position: relative;
    color: #009bb4;
    margin: 0 auto;
    text-align: center;
    margin-left: 5%;
    font-size: 1.1rem;
  }
  green {
    color: #afb7c0;
  }
  red {
    color: #f37867;
  }
  red6 {
    color: #d65b4a;
  }
  value {
    color: #fff;
  }
  yellow {
    color: #cc0;
  }
  purple {
    color: #916392;
  }
  .actualt {
    position: relative;
    left: 5px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -o-border-radius: 3px;
    border-radius: 3px;
    background: rgba(74, 99, 111, 0);
    padding: 5px;
    font-family: verb,Arial, Helvetica, sans-serif;
    width: 190px;
    height: 0.8em;
    font-size: 0.8rem;
    padding-top: 2px;
    color: #afb7c0;
    align-items: center;
    justify-content: center;
    margin-bottom: 10px;
    top: 0;
  }
  .actualups {
    position: relative;
    left: 35px;
    background: rgba(74, 99, 111, 0);
    padding: 5px;
    font-family: 'verb',Arial, Helvetica, sans-serif;
    width: 140px;
    height: 0.8em;
    font-size: 0.8rem;
    align-items: center;
    justify-content: center;
    top: -30px;
    margin-bottom: -10px;
  }
  actualt34 {
    display: none;
  }
  .actualtlocal {
    position: relative;
    left: 145px;
    background: rgba(74, 99, 111, 0);
    padding: 5px;
    font-family: 'verb',Arial, Helvetica, sans-serif;
    width: 190px;
    height: 0.8em;
    font-size: 0.8rem;
    padding-top: 2px;
    color: #afb7c0;
    align-items: center;
    justify-content: center;
    margin-bottom: 10px;
    top: 0px;
  }
  
  .weather34logosvg {
    position: absolute;
    display: flex;
    right: 40px;
    margin-top: -60px;
    width: 4rem;
  }
  .weather34-image {
    position: absolute;
    display: flex;
    right: 70px;
    margin-top: 20px;
    width: 10rem;
    opacity: 0.9;
  }
  .info2a {
    position: absolute;
    margin-top: 40px;
    font-size: 0.8em;
    margin-left:5px;
    width: 200px;
  }
  
  .moonriset{
    position: absolute;  
    font-size: 0.95em;
    width: 200px;
    margin-top: 10px;
    margin-left:-5px
  }
  
  
  @media screen and (max-width: 720px) {
  
    .moonriset{
    margin-top: 40px;
    margin-left:-45px
  }
  
  }
  </style>
<script src="js/jquery.js"></script>

<div class="weather34darkbrowser" url="Moon Phase Information"></div>
  
<main class="grid">
  <article>  
<?php echo $info;?> Moon Phase Data<br><br>  
<!---simple weather34 svg moonphase -->
<div class="moonphaseposition">
<div class="weather34moonphasesvg">
<svg id="weather34moonsvg"  viewBox="0 0 200 200"  version="June 2020"></svg>
<script type="text/javascript" charset="UTF-8"> 
//moonphase june 2020 based on original by http://www.ben-daglish.net/moon.shtml  
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
         jday = J0 + 29 * phase + Math.floor(F);
        phase++;
    }
    // 29.53059 days per lunar month
    return (thisJD - oldJ) / 29.53059;
    function GetFrac(fr) {	return (fr - Math.floor(fr));}
}
function phase_junk(e){var t,n,a=[];e<=.25?(a=[1,0],t=20-20*e*4):e<=.5?(a=[0,0],t=20*(e-.25)*4):e<=.75?(a=[1,1],
  t=20-20*(e-.5)*4):e<=1?(a=[0,1],t=20*(e-.75)*4):exit;
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
o.setAttribute("height",.12*window.screen.availHeight),
o.setAttribute("width",.12*window.screen.availWidth),
o.appendChild(d),
o.appendChild(s)}
else!function(){
if(void 0===supportsVml.supported){
var e=document.body.appendChild(document.createElement("div"));e.innerHTML='<v:shape id="vml_flag1" adj="1" />';
var t=e.firstChild;t.style.behavior="url(#default#VML)",supportsVml.supported=!t||"object"==typeof t.adj,e.parentNode.removeChild(e)}supportsVml.supported}()}Date.prototype.getJulian=function(){
  //return ((this / 86400000) - (this.getTimezoneOffset() / 1440) + 2440587.5)};
  return ((this / 86400000) - (this.getTimezoneOffset() / 1440) + 2440587.5)};
  phase_junk(moon_day(new Date)); 
</script>
</div></div>

<div class=moonphasetext>  
<?php 
//function phase(){return $this->phase;}
//function illumination(){return $this->illum*100;} 
//function age(){return $this->age;} 
//function distance(){return $this->dist;} 
//function diameter(){return $this->angdia;} 
//function sundistance(){return $this->sundist;} 
//function sundiameter(){return $this->sunangdia;} 
//function new_moon(){return $this->get_phase(0);} 
//function first_quarter(){return $this->get_phase(1);} 
//function full_moon(){return $this->get_phase(2);} 
//function last_quarter(){return $this->get_phase(3);} 
//function next_new_moon(){return $this->get_phase(4);} 
//function next_first_quarter(){return $this->get_phase(5);} 
//function next_full_moon(){return $this->get_phase(6);} 
//function next_last_quarter(){return $this->get_phase(7);} 
?>
Phase:<blue><?php $moon=new MoonPhase();$phases=$moon->phase_name();echo $phases;?></blue><br>
Luminance:<blue><?php $moon=new MoonPhase();$lum=$moon->illumination();echo number_format($lum,1);?></blue>%<br>
Distance:<blue>
<?php 
if ($distanceunit=='km'){$moon=new MoonPhase();$distance=$moon->distance();echo number_format($distance,0);echo '</blue> km';}
if ($distanceunit=='mi'){$moon=new MoonPhase();$distance=$moon->distance();echo number_format($distance*0.621371,0);echo '</blue> miles';}
?><br>
Cycle:<blue><?php $moon = new MoonPhase();$moonage =round($moon->age(),2);echo round($moonage,2)?></blue> Days

  <div class="moonriset">
  <svg class="moon rise up" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="grey" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z"/><polyline points="6 15 12 9 18 15" /></svg> 
Moon Rise: <blue><?php echo $weather['moonrise']," ";?></blue>
  <br>
  <svg class="moon set down" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="grey" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z"/><polyline points="6 9 12 15 18 9" /></svg> 
Moon Set:  &nbsp;<orange><?php echo $weather['moonset']," ";?></orange>
<br>
</article>  
  <article> 
 <moonphaseriseset>
  <?php echo $info;?> <blue>Moon </blue>| <blue>Lunar Event Information</blue><br>
  
<?php echo $info;?>
Next Full Moon: <?php  // homeweatherstation fullmoon info output 18th Aug
$now1 =time();$moon1 = new MoonPhase();
echo "";
if ($now1 < $moon1->full_moon()) 
{echo date('D jS-M-Y', $moon1->full_moon() );}
else echo date('D jS-M-Y', $moon1->next_full_moon() );
?></span><br>
<?php echo $info;?>  Next New Moon:<?php $moon=new MoonPhase();$nextnewmoon=date('D jS-M-Y',$moon->next_new_moon());echo $nextnewmoon;?>
</span>
<br><br />
           <?php 
$lunayear=date('Y');		
 if($lunayear==2020 || $lunayear==2021 || $lunayear==2022 ){  
	echo $info." Total Lunar <blue>Eclipse</blue> 26 May 2021<br>";
	echo $info." Annular Solar <blue>Eclipse</blue> 10 Jun 2021<br>	";
	echo $info." Partial Lunar <blue>Eclipse </blue> 18-19 Nov 2021<br>	";
  echo $info." Total <blue>Eclipse </blue> 4 Dec 2021<br>"; 
	}	
?>	
   </article>  
   
   <article>
   <?php echo $info;?> Next Lunar Event<br><br> 
  <?php if ($lunar_nextevent)  {echo $lunarinfo3 ,$lunar_nextevent ;} ?>  
  </article>  





  <article2>  
  <div class=actualtlocal>Local Time</div>   
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
<div id="weather34clock2"></div>

</article2> 

  <article2>     
  <script>$( document ).ready( function() {
  $('.day').remove();
  var start = new Date(new Date().getTime()+offset);
  current_date(start);
  let days = numDays(start.getMonth(), start.getYear());
  displayDays(start, days);
  let currDay = start.getDate();
  console.log(currDay);
  $('.day:nth-of-type('+currDay+')').css('background', ' rgb(236, 81, 19)').css('box-shadow','none'); 
 
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
  <div class="curr_date"></div>
    <div class="wrapper">
    <ul class="weather34weekdays">
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
 
  
  </article2>
  <article2>  

  <?php if ($meteor_nextevent)  {echo $meteorinfo3 ,"  ",$meteor_nextevent ;} ?>    
  
  <div class="info2a">
  CSS/SVG/PHP scripts were developed by 
  <a href="https://weather34.com/homeweatherstation" target="_blank" title="https://weather34.com" alt="https://weather34.com">weather34.com</a> © 2015-<?php echo date('Y');?>
  <?php echo $weather34version ?>
  </div>
  </article2>
</main>

