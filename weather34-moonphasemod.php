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
?>
<div class="moonblock">
<div class="indoordesc">Moonphase</div>
<div class="button button-dial-small-moon">
<div class="button-dial-top-small-moon"></div>
<div class="weather34moonphasesvg">
<?php // lets rotate for Tony (Beaumaris-Weather) down under
if ($hemisphere==0){echo '<style>.weather34moonphasesvg{-webkit-transform: rotate('.$hemisphere.'deg);transform: rotate('.$hemisphere.'deg);}
</style>';}
if ($hemisphere==180){echo '<style>.weather34moonphasesvg{-webkit-transform: rotate('.$hemisphere.'deg);transform: rotate('.$hemisphere.'deg);margin-left:1px;margin-bottom:29px;}
</style>';}
?>

<svg id="weather34moonsvg2"  style="position:relative; max-width:60px" viewBox="0 0 200 200"  version="1.1"></svg>
<script type="text/javascript" charset="UTF-8"> 
//moonphase revised March 2021 based on original by http://www.ben-daglish.net/moon.shtml  
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
    return (thisJD - oldJ) / 29.530589;
    function GetFrac(fr) {	return (fr - Math.floor(fr));}}
function phase_junk(e){var t,n,a=[];e<=.25?(a=[1,0],t=20-20*e*4):e<=.5?(a=[0,0],t=20*(e-.25)*4):e<=.75?(a=[1,1],t=20-20*(e-.5)*4):e<=1?(a=[0,1],t=20*(e-.75)*4):exit;
var o=document.getElementById("weather34moonsvg2");
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
o.setAttribute("height",.07*window.screen.availHeight),
o.setAttribute("width",.07*window.screen.availWidth),
o.appendChild(d),
o.appendChild(s)}
else!function(){
if(void 0===supportsVml.supported){
var e=document.body.appendChild(document.createElement("div"));e.innerHTML='<v:shape id="vml_flag1" adj="1" />';
var t=e.firstChild;t.style.behavior="url(#default#VML)",supportsVml.supported=!t||"object"==typeof t.adj,e.parentNode.removeChild(e)}supportsVml.supported}()}Date.prototype.getJulian=function(){
  return ((this / 86400000) - (this.getTimezoneOffset() / 1440) +  2440586.7999)};
  phase_junk(moon_day(new Date)),window.onresize=function(){center()},center(); 
</script>
<?php 
// calculate lunar phase (1900 - 2199)
$year = date('Y');$month = date('n');$day = date('j');
if ($month < 3) {$year = $year - 1; 
$month = $month + 12;}
$days_y = 365.25 * $year; 
$days_m = 30.6 * $month;
$weather34julian = $days_y + $days_m + $day - 694039.09;
$weather34julian = $weather34julian / 29.5305882;
$weather34phase = intval($weather34julian);
$weather34julian = $weather34julian - $weather34phase;
$weather34phase = round($weather34julian * 8); 
if ($weather34phase == 8) {$weather34phase = 0;}
$weather34phase_array = array('New Moon', 'Waxing Crescent', 'First Quarter', 'Waxing Gibbous', 'Full Moon', 'Waning Gibbous', 'Third Quarter', 'Waning Crescent');
$weather34lunar_phase = $weather34phase_array[$weather34phase];
?></div></div>

<div class="mooninfo2"><a href='weather34-mooninfo.php' data-lity data-title="Moonphase Information"><?php echo  $aqilinks?>&nbsp; More Info</a></div>


</div> 




<div class="date1"> &nbsp;<?php echo $sunuphalf." ".$risingsymbolxx?> Moonrise: <?php  echo $weather['moonrise'];?></div>
<div class="date2"> &nbsp;<?php echo $sundownhalf." ".$fallingsymbolxx?>  Moonset: <?php echo  $weather['moonset'];?></div>
<div class="phase2"> <?php echo $weather34lunar_phase;?></div>



