<?php 
	####################################################################################################
	#	HOME WEATHER STATION TEMPLATE by BRIAN UNDERDOWN 2015-20                                         #
	#	CREATED FOR HOMEWEATHERSTATION STANDALONE       	 										                           #
	#   https://weather34.com/homeweatherstation/index.html 										                       # 
	# 	                                                                                               #
	# 	                                                                                               #
	# 	WEATHER34 HARDWARE: 02 April 2020                                                  			       #
	# 	                                                                                               #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################
//original weather34 script original css/svg/php by weather34 2015-2020 clearly marked as original by weather34//
include('livedata.php'); 
$weather34fullscreen2='<svg  width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="#00adbd" stroke-linecap="round" stroke-linejoin="round" id="weather34 fullscreen">
  <path stroke="none" d="M0 0h24v24H0z"/><polyline points="16 4 20 4 20 8" /><line x1="14" y1="10" x2="20" y2="4" /><polyline points="8 20 4 20 4 16" /><line x1="4" y1="20" x2="10" y2="14" />
</svg> ';
$davisvp2install= new \DateTime($installed);$now = new \DateTime;
$weather34EN='<svg version="weather34 english language" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="#fff" fill="none" stroke-linecap="round" stroke-linejoin="round">
<g><path stroke="#555" d="M0 0h24v24H0z"/></g><text x="2.5" y="17" font-size="10px" stroke-width="0" fill="#ccc" >EN</text></svg>';
$webcamicon2='
<svg width="18pt" height="18pt"  viewBox="0 0 1024 1024" version="weather34 webcam icon">
<path d="M778.666667 938.666667h-533.333334c-23.466667 0-38.4-25.6-27.733333-46.933334L277.333333 789.333333h469.333334l57.6 102.4c12.8 21.333333-2.133333 46.933333-25.6 
46.933334z" fill="#455A64" />
<path d="M512 490.666667m-384 0a384 384 0 1 0 768 0 384 384 0 1 0-768 0Z" fill="#78909C" />
<path d="M512 746.666667c-140.8 0-256-115.2-256-256s115.2-256 256-256 256 115.2 256 256-115.2 256-256 256z" fill="#455A64" />
<path d="M512 490.666667m-192 0a192 192 0 1 0 384 0 192 192 0 1 0-384 0Z" fill="#ec5732" />
<path d="M614.4 426.666667c-25.6-29.866667-64-46.933333-102.4-46.933334s-76.8 17.066667-102.4 46.933334c-10.666667 10.666667-8.533333 27.733333 2.133333 38.4s27.733333 
8.533333 38.4-2.133334c32-36.266667 91.733333-36.266667 123.733334 0 6.4 6.4 12.8 8.533333 21.333333 8.533334 6.4 0 12.8-2.133333 19.2-6.4 8.533333-8.533333 10.666667-27.733333 
0-38.4z" fill="#90CAF9" />
</svg>';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weather Station Hardware Information</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
:root{
  --white:#ffffff;
  --light:#f5f5f5;
  --dark:#07090a;--dark-light:hsla(0, 0%, 0%, 0.251);
  --dark-toggle:#35393b;--dark-caption:rgba(66, 70, 72, 0.429);--black:#000000;--deepblue:#00adbd;--blue:#00adbd;--rainblue:#00adbd;--darkred:#703232;--deepred:#703232;--red:#d35f50;--yellow:#e6a241;--green:#90b22a;--orange:rgb(236, 81, 19);--purple:#8680bc;--silver:#ecf0f3;--border-dark:#3d464d;--body-text-dark:#afb7c0;--body-text-light:#545454;--blocks:#e6e8ef;--modules:#1e1f26;--blocks-background:rgba(82, 92, 97, 0.19);--temp-5-10:#7face6;--temp-0-5:#00adbd;--temp0-5:#00adbd;--temp5-10:#9bbc2f;--temp10-15:#e6a241;--temp15-20:#f78d03;--temp20-25:#d87040;--temp25-30:#e64b24;--temp30-35:#cc504c;--temp35-40:hsl(4, 40%, 48%);--temp40-45:#be5285;--temp45-50:#b95c95;--font-color:grey;--bg-color:hsla(198, 14%, 14%, 0.19);--button-bg-color:hsla(198, 14%, 14%, 0.19);--button-shadow:inset 5px 5px 20px #0c0b0b,inset -5px -5px 20px hsla(198, 14%, 14%, 0.19)}
@font-face{
font-family:weathertext2;src:url(fonts/verbatim-regular.woff) format("woff")}
@font-face{
font-family:clock;src:url(fonts/clock3-webfont.woff) format("woff")}

body,html{font-size:13px;font-family:Helvetica,Arial,sans-serif;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}
icont{font-weight:600}
.grid{display:grid;grid-template-columns:repeat(3,1fr);grid-column-gap:5px;grid-row-gap:5px;color:#f5f7fc;margin-top:5px;}

.grid>article{border:1px solid rgba(97,106,114,.3);padding:5px;font-size:.8em;border-radius:4px;-webkit-border-radius:4px;background:0;
  -webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale; border: 1px solid hsla(217, 15%, 17%, .5);
    border-bottom: 5px solid hsla(217, 15%, 17%, .5);max-width:280px}

grey{color:#ccc}
.grid2{display:grid;grid-template-columns:repeat(3,1fr);grid-column-gap:5px;grid-row-gap:5px;color:#f5f7fc;overflow:hidden;margin-top:5px;}
.grid2>article{border:1px solid rgba(97,106,114,.3);padding:5px;font-size:.8em;border-radius:4px;-webkit-border-radius:4px;
background:0;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale; border: 1px solid hsla(217, 15%, 17%, .5);
    border-bottom: 5px solid hsla(217, 15%, 17%, .5);height:130px}

.gridfooter{display:grid;grid-template-columns:repeat(1,1fr);grid-column-gap:5px;grid-row-gap:5px;color:#f5f7fc;overflow:hidden;margin-top:5px}
.gridfooter>article{border:1px solid rgba(97,106,114,.3);padding:5px;font-size:.8em;border-radius:4px;-webkit-border-radius:4px;background:0;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}
a{color:#aaa;text-decoration:none;font-size:1em}
.weather34darkbrowser{position:relative;background:0;width:97%;height:30px;margin:auto;margin-top:-5px;margin-left:0;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:10px}
.weather34darkbrowser[url]:after{content:attr(url);color:#aaa;font-size:10px;position:absolute;left:0;right:0;top:0;padding:4px 15px;margin:11px 10px 0 auto;border-radius:3px;background:rgba(97,106,114,.3);height:20px;box-sizing:border-box}
blue{color:#01a4b4}
orange{color:#009bb4}
orange1{position:relative;color:#009bb4;margin:0 auto;text-align:center;margin-left:5%;font-size:1.1rem}
green{color:#aaa}
red{color:#f37867}
red6{color:#d65b4a}
value{color:#fff}
yellow{color:#cc0}
purple{color:#916392}
.actualt{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:rgba(74,99,111,0);padding:5px;font-family:Arial,Helvetica,sans-serif;width:190px;height:.8em;font-size:.8rem;padding-top:2px;color:#aaa;align-items:center;justify-content:center;margin-bottom:10px;top:0}
.actualups{position:relative;left:35px;background:rgba(74,99,111,0);padding:5px;font-family:Arial,Helvetica,sans-serif;width:140px;height:.8em;font-size:.8rem;align-items:center;justify-content:center;top:-30px;margin-bottom:-10px}
actualt34{display:none}
.actualtlocal{position:relative;
  left:165px;
  background:rgba(74,99,111,0);
  padding:5px;font-family:Arial,Helvetica,sans-serif;
  width:190px;height:.8em;
  font-size:.8rem;padding-top:2px;color:#aaa;
  align-items:center;justify-content:center;margin-bottom:10px;
  top:0px}

.hardwareimage{position:relative;display:flex;margin:0 auto;margin-top:-30px;margin-left:120px}
.hardwareimagenano{position:relative;display:flex;margin:0 auto;margin-top:0px;margin-left:155px}
.ups{position:relative;display:flex;margin:0 auto;margin-top:5px;margin-left:0}
.stationhardware{position:absolute;display:flex;margin-left:127px;margin-top:0px}
.stationhardware2{position:absolute;display:flex;margin-left:145px;margin-top:-30px}
.davislogo{position:absolute;display:flex;margin-left:20px;margin-top:5px}
.weather34logosvg{position:absolute;display:flex;right:40px;margin-top:-60px;width:4rem}
.weather34-image{position:absolute;display:flex;right:70px;margin-top:20px;width:10rem;opacity:.9}
icontext{vertical-align:top;position:relative;top:8px;color:#aaa}
icontext2{vertical-align:top;position:relative;top:0;color:#aaa}
icontext3{vertical-align:top;position:relative;top:4px;color:#aaa}
icontextrefresh{position:relative;top:8px;color:#aaa}
.theme-icon{position:relative;display:inline-block}
@media screen and (max-width:720px){
.weather34logosvg{display:none}
.grid{display:grid;grid-template-columns:repeat(1,1fr);grid-column-gap:5px;grid-row-gap:5px;color:#f5f7fc;overflow:hidden;margin-top:5px}
.grid2{display:grid;grid-template-columns:repeat(3,1fr);grid-column-gap:5px;grid-row-gap:5px;color:#f5f7fc;overflow:hidden;margin-top:5px}
}
@media screen and (max-width:640px){
.weather34logosvg{display:none}
.grid{display:grid;grid-template-columns:repeat(1,1fr);grid-column-gap:5px;grid-row-gap:5px;color:#f5f7fc;overflow:hidden;margin-top:5px}
.grid2{display:grid;grid-template-columns:repeat(1,1fr);grid-column-gap:5px;grid-row-gap:5px;color:#f5f7fc;overflow:hidden;margin-top:5px}
}
::-webkit-scrollbar{width:10px}
::-webkit-scrollbar-track{background:#333}
::-webkit-scrollbar-thumb{background:#009bb4}
::-webkit-scrollbar-thumb:hover{background:#d87040}

.weather34-container-clock{width:120px;height:120px;position:relative;top:-50px;left:-0px}
.weather34-large-clock{width:130px;height:130px;border-radius:50%;background:hsla(214,29%,91%,.1);position:absolute;top:50px;left:50px;box-shadow:var(--button-shadow);transform:rotate(var(--rotation));border:4px solid hsla(204,31%,21%,.2);-webkit-transform:rotate(var(--rotation));-moz-transform:rotate(var(--rotation));-ms-transform:rotate(var(--rotation));-o-transform:rotate(var(--rotation))}
.weather34-small-clock{width:100px;height:100px;border-radius:50%;background-color:rgba(0,0,0,.4);position:absolute;top:15px;left:15px;box-shadow:var(--button-shadow);background-image:linear-gradient(hsla(0,0%,33%,.3) 1px,transparent 1px),linear-gradient(to right,hsla(0,0%,33%,.3) 1px,transparent 1px);background-size:5px 5px}
.circle{background-color:var(--blue);width:10px;height:10px;border-radius:50%;position:absolute;left:45px;top:40px;z-index:1}
.hour-indicator{width:0;height:25px;background-color:#b7c5d3;border-radius:5px;position:absolute}
.twelve{top:0;left:60px}
.twelve::after{content:"12";font-size:12px;color:hsla(214,29%,91%,.8);font-family:weathertext2}
.three{right:10px;top:53px;}
.three::after{content:"3";font-size:12px;color:hsla(214,29%,91%,.8);font-family:weathertext2}
.weather34brand{left:42px;bottom:15px}
.weather34brand::after{content:"weather34";font-size:9px;color:hsla(214,29%,91%,.8);font-family:weathertext2}
.six{left:62px;bottom:-10px}
.six::after{content:"6";font-size:12px;color:hsla(214,29%,91%,.8);font-family:weathertext2}
.nine{left:5px;top:53px;height:3px;width:0}
.nine::after{content:"9";font-size:12px;color:hsla(214,29%,91%,.8);font-family:weathertext2}
.hand{--rotation:0;height:50px;width:5px;border-radius:2px;position:absolute;left:63px;top:10px;transform-origin:bottom;transform:rotate(calc(var(--rotation) * 1deg))}
.hour{background-color:#888989;height:35px;top:25px}
.minute{background-color:#ec5113;width:4px}
.second{background-color:var(--blue);width:1px}


.clock34{box-shadow:var(--button-shadow);
background-color:#1d2124;
display:flex;
font-family:clock;
border-radius:3px;
-webkit-border-radius:3px;
-moz-border-radius:3px;
-ms-border-radius:3px;
-o-border-radius:3px;
left:0px;
text-align:center;
position:relative;color:hsla(214,29%,91%,.6);
font-size:1rem;
text-transform:none;
padding:4px;
padding-top:6px;
top:-147px;
font-family:clock;
z-index:20;
width:5.5em;
background-image:linear-gradient(hsla(0,0%,33%,.1) 1px,transparent 1px),linear-gradient(to right,hsla(0,0%,33%,.1) 1px,transparent 1px);
background-size:5px 5px;
justify-content:center;align-items:center;
}

.gridcal{display:grid;grid-template-columns:repeat(7,minmax(14px,1fr));
  grid-gap:.75em;color:hsla(214,29%,91%,.6);}
.day{background:hsla(214,29%,91%,.1);display:flex;justify-content:center;align-items:center;border-radius:2px;color:#fff;
-webkit-border-radius:2px;-moz-border-radius:2px;-ms-border-radius:2px;-o-border-radius:2px;height:14px;font-family:weathertext2}
.wrapper{width:calc(240px + 1.12em);margin:auto;margin-top:0px;margin-left:0;font-family:weathertext2;overflow:hidden;padding:7px;padding-right:10px;
background-image:linear-gradient(hsla(0,0%,33%,.1) 1px,transparent 1px),linear-gradient(to right,hsla(0,0%,33%,.1) 1px,transparent 1px);background-size:2px 2px;border-radius:5px}
.days{display:grid;grid-template-columns:repeat(7,30px);grid-gap:.75em;}
.curr_date{color:hsla(214,29%,91%,.8)}
.weather34weekdays{position:relative;text-transform:uppercase;font-size:.8rem;display:grid;grid-template-columns:repeat(7,30px);grid-gap:.75em;list-style:none;left:-36px;top:-10px;margin-bottom:-5px}
.weather34weekdays todayorange{color:#fff;background:var(--orange);border-radius:2px;-webkit-border-radius:2px;-moz-border-radius:2px;-ms-border-radius:2px;-o-border-radius:2px;line-height:14px;padding:0 2px 0 2px}
grey{color:#ccc}


</style>
<script src="js/jquery.js"></script>
<div class="weather34darkbrowser" url="Template | Hardware Info"></div>
<main class="grid2">
<article>  
<?php //meteobridge uptime
$nanosduptime = $meteobridgeapi[81];
function convert($nanosduptime){$weather34nanotimeago = "";
$months1 = intval(intval($nanosduptime) / (3600*730));
$days1 = intval(intval($nanosduptime) / (3600*24));
$hours1 = (intval($nanosduptime) / 3600) % 24;
$minutes1 = (intval($nanosduptime) / 60) % 60;
if($months1> 1){$weather34nanotimeago .= "$months1 Months ";}
else if($days1> 28){$weather34nanotimeago .= "$months1 Month ";}
else if($days1> 1){$weather34nanotimeago .= "$days1 Days" ;}
else {if($days1>0){$weather34nanotimeago .= "$days1 Day" ;}
if($hours1 > 1){$weather34nanotimeago .= "$hours1 hrs ";}
else if($hours1 >=0){$weather34nanotimeago .= "$hours1 hr ";}
if($minutes1 > 1){$weather34nanotimeago .= "$minutes1 mins ";}
else if($minutes1 >=0){$weather34nanotimeago .= "$minutes1 min ";}}
return $weather34nanotimeago;}?>

<div class=actualt>Interface Weatherstation</div> 
    <?php echo $info?> <?php echo 'Meteobridge Interface'?> <blue><?php echo $mbplatform?></blue><br>
    <?php echo $info?> <?php echo 'Interface Uptime'?>: <blue><?php echo convert($nanosduptime)?></blue><br>
    <?php echo $info?> Firmware:<?php echo "<orange>",$weather["swversion"];echo "-",$weather["build"]?></orange><br>

<?php 
if($mbplatform=='Nano' OR $mbplatform=='NanoSD'){echo '<img src="images/nano.svg" width="50px" class="hardwareimagenano" alt="Meteobridge NANOSD" title="Meteobridge NANOSD">';}
else if($mbplatform=='Pro Red' OR $mbplatform=='Pro Black'){echo '<img src="images/MeteobridgePRO.svg" width="80px" class="hardwareimagenano" alt="Meteobridge Pro" title="Meteobridge Pro">';}
else if($mbplatform=='TPlink'){echo '<img src="images/TPLINK.svg" width="80px" class="hardwareimagenano" alt="Meteobridge TP-Link" title="Meteobridge TP-Link">';}
    ?>      
    <br><br><br>
 </span></div>  
     
</article> 

<article>  
<?php 
if($brand=='yes'){?>
<article>  
<div class=actualt>Davis Vantage&#8482; Weatherstation</div> 
<?php echo $info?> Davis <blue><?php echo $model?></blue><br> 

<?php $dateinstall=$installed;echo $info?> Installed : 
  
<?php //weather34 hardware time ago since installed
$previousDate = $installed;$startdate = new DateTime($previousDate);$endDate   = new DateTime('now');$weather34_hardware_timeago  = $endDate->diff($startdate);   
if ($weather34_hardware_timeago->format('%y')<1){    echo $weather34_hardware_timeago->format('');}
if ($weather34_hardware_timeago->format('%y')==1){    echo $weather34_hardware_timeago->format('<blue> %y </blue>Year');}
if ($weather34_hardware_timeago->format('%y')>=2){    echo $weather34_hardware_timeago->format('<blue> %y </blue>Years');}

if ($weather34_hardware_timeago->format('%m')<1){    echo $weather34_hardware_timeago->format('');}
if ($weather34_hardware_timeago->format('%m')==1){    echo $weather34_hardware_timeago->format('<blue> %m </blue></blue>Month');}
if ($weather34_hardware_timeago->format('%m')>=2){    echo $weather34_hardware_timeago->format('<blue> %m </blue></blue>Months');}

if ($weather34_hardware_timeago->format('%d')<1){    echo $weather34_hardware_timeago->format('');}
if ($weather34_hardware_timeago->format('%d')==1){    echo $weather34_hardware_timeago->format(' <blue> %d </blue>Day');}
if ($weather34_hardware_timeago->format('%d')>=2){    echo $weather34_hardware_timeago->format('<blue> %d </blue>Days');}
//else if ($weather34_hardware_timeago->format('%y')<=1){ echo $weather34_hardware_timeago->format('%m months %d days');}
//else if ($weather34_hardware_timeago->format('%y')>1) { echo $weather34_hardware_timeago->format('%y years %m months %d days');}
echo " Ago";
?><br>
<?php 
$timestamp = strtotime($installed);
$new_date_format = date('jS M Y', $timestamp);
echo $info?> Operational Since :<blue><?php echo"<orange>", $new_date_format;echo "</orange>";?></blue><br>   
<?php
if ($model=='Vantage Pro2 Plus' or $model=='Vantage Pro2') {
    echo '<img src="images/weather34-davis-vp2.svg" width="120px" class="stationhardware" alt="Davis Vantage Pro2" title="Davis Vantage Pro2">';
} elseif ($model=='Envoy' or $model=='Envoy 8X') {
    echo '<img src="images/designedfordavisenvoy8x.svg" width="120px" class="stationhardware2" alt="Davis Envoy 8X" title="Davis Envoy 8X">';
} elseif ($model=='Vantage Pro1') {
    echo '<img src="images/weather34-davis-vp2.svg" width="120px" class="stationhardware" alt="Davis Vantage Pro1" title="Davis Vantage Pro1">';
} elseif ($model=='Vantage Vue') {
    echo '<img src="images/davisvue.svg" width="120px" class="stationhardware" alt="Davis Vantage Vue" title="Davis Vantage Vue">';
} ?> 
</article> 

<?php ;}
else {echo $weather34F;echo " <icontext>Fahrenheit with Wind MPH</icontext><br>";
echo $weather34C;echo" <icontext>Celsius with Wind KM/H</icontext><br>";
echo $weather34UK;echo "<icontext>Celsius with Wind MPH</icontext><br>";
echo $weather34MS;echo " <icontext>Celsius with Wind M/S</icontext><br>";
echo $weather34KTS;echo " <icontext>Celsius with Wind KTS</icontext>";
}?>
</span></div>
 </article> 

<article>  
<?php 
if($brand=='yes'){?>
<article>    
<div class=actualt>Weatherstation Battery</div> 
&nbsp;&nbsp;
<div style="display:inline-block;margin-left:0px;margin-top:-0px">
<svg id="weather34 power plug" width="23pt" version="1.1" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
<g><g transform="translate(0.000000,511.000000) scale(0.100000,-0.100000)"><path fill="#3e4a57" d="M4482.4,4879.1c-850.3-87.4-1743.2-444.1-2440-970.8c-255.1-193.7-666.1-595.2-866.9-845.6C266.1,1919.5-90.5,452.7,197.6-976.4C469.3-2325.1,1307.8-3506.1,2503-4217.1c394.5-233.8,956.6-467.7,1124.3-467.7c269.3,2.4,510.2,281.1,463,538.5c-37.8,210.2-139.4,307.1-451.2,427.5c-569.2,222-999.1,496-1403,899.9C1650.3-2240,1298.3-1604.7,1130.6-829.9c-337.8,1570.7,323.6,3210,1662.9,4112.3c1993.6,1344,4707.5,611.8,5765.7-1554.2c689.7-1414.9,472.4-3115.5-550.3-4298.9C7560.1-3088,6759.4-3574.6,6353.1-3574.6c-522,0-843.3,571.6-895.2,1594.4l-14.2,283.4l210.2,40.2c326,61.4,566.9,191.3,812.5,441.7c151.2,151.2,224.4,248,288.2,380.3C6905.8-530,6915.2-452,6915.2,495.2v843.3H5002H3088.8V495.2c0-944.8,9.4-1025.1,155.9-1320.4c203.1-413.3,581.1-708.6,1046.4-819.6l207.9-49.6l14.2-321.2c61.4-1313.3,529.1-2154.2,1351.1-2425.8c264.6-87.4,689.7-92.1,968.4-11.8c503.1,144.1,1247.2,600,1677,1032.2c1443.2,1438.5,1807,3748.5,883.4,5595.6C8471.8,4017,6525.5,5087,4482.4,4879.1z"/>
<path fill="#2f9dac" d="M3851.7,2944.6c-40.1-23.6-87.4-66.1-99.2-92.1c-16.5-28.3-26-262.2-26-625.9v-581.1H4069h342.5v585.8c0,640.1-2.4,654.3-141.7,725.1C4170.6,3008.4,3943.8,3001.3,3851.7,2944.6z"/>
<path fill="#2f9dac" d="M5717.7,2944.6c-40.2-23.6-87.4-66.1-99.2-92.1c-16.5-28.3-26-262.2-26-625.9v-581.1H5935h342.5v585.8c0,640.1-2.4,654.3-141.7,725.1C6036.6,3008.4,5809.8,3001.3,5717.7,2944.6z"/></g></g></svg>

&nbsp;5V DC <blue>Weatherstation</blue></div>
<br><br>
<div style="position:absolute;display:inline-block;margin-left:10px;margin-top:0px">
<?php if ($weather['outdoorbattery']==0){echo '
<svg width="18pt"  viewBox="0 0 434 631" version="1.1" id="weather34 good battery">
<path fill="#e2e2e3" stroke="#e2e2e3" stroke-width="0.09375" opacity="1.00" d=" M 146.63 57.58 C 148.60 54.45 152.30 52.71 155.97 52.99 C 196.35 53.03 236.72 52.97 277.10 53.02 C 281.99 52.91 286.50 57.01 286.91 61.87 C 287.10 64.24 286.99 66.62 287.00 69.00 C 239.67 69.00 192.33 69.00 145.00 69.00 C 145.13 65.19 144.34 60.93 146.63 57.58 Z" />
<path fill="#01a4b4" stroke="#01a4b4" stroke-width="0.09375" opacity="1.00" d=" M 84.40 70.36 C 88.78 68.93 93.47 69.59 97.99 69.04 C 113.65 68.94 129.33 69.03 145.00 69.00 C 192.33 69.00 239.67 69.00 287.00 69.00 C 305.02 69.19 323.06 68.54 341.06 69.48 C 348.50 69.92 354.95 75.62 357.59 82.38 C 358.22 89.15 357.27 96.00 358.12 102.76 C 358.77 115.83 358.23 128.93 358.40 142.01 C 358.32 153.25 358.58 164.48 358.26 175.71 C 262.77 175.69 167.28 175.61 71.79 175.75 C 71.30 151.10 71.80 126.43 71.54 101.76 C 71.71 95.52 72.45 89.31 72.29 83.05 C 73.92 77.19 78.78 72.50 84.40 70.36 M 214.43 96.43 C 214.41 103.07 214.44 109.71 214.42 116.36 C 207.76 116.40 201.11 116.30 194.46 116.42 C 194.49 119.91 194.49 123.41 194.51 126.90 C 201.15 126.89 207.78 126.88 214.42 126.90 C 214.43 133.57 214.44 140.24 214.41 146.91 C 217.73 146.96 221.05 146.96 224.37 146.96 C 224.37 140.31 224.43 133.67 224.33 127.02 C 230.94 126.76 237.56 126.95 244.17 126.89 C 244.26 123.36 244.18 119.84 244.09 116.31 C 237.54 116.43 231.00 116.31 224.46 116.40 C 224.31 109.76 224.39 103.12 224.41 96.48 C 221.08 96.42 217.76 96.41 214.43 96.43 Z" />
<path fill="#e2e2e3" stroke="#e2e2e3" stroke-width="0.09375" opacity="1.00" d=" M 214.43 96.43 C 217.76 96.41 221.08 96.42 224.41 96.48 C 224.39 103.12 224.31 109.76 224.46 116.40 C 231.00 116.31 237.54 116.43 244.09 116.31 C 244.18 119.84 244.26 123.36 244.17 126.89 C 237.56 126.95 230.94 126.76 224.33 127.02 C 224.43 133.67 224.37 140.31 224.37 146.96 C 221.05 146.96 217.73 146.96 214.41 146.91 C 214.44 140.24 214.43 133.57 214.42 126.90 C 207.78 126.88 201.15 126.89 194.51 126.90 C 194.49 123.41 194.49 119.91 194.46 116.42 C 201.11 116.30 207.76 116.40 214.42 116.36 C 214.44 109.71 214.41 103.07 214.43 96.43 Z" />
<path fill="#393c44" stroke="#393c44" stroke-width="0.09375" opacity="1.00" d=" M 70.99 182.06 C 71.90 155.31 70.94 128.52 71.54 101.76 C 71.80 126.43 71.30 151.10 71.79 175.75 C 167.28 175.61 262.77 175.69 358.26 175.71 C 358.58 164.48 358.32 153.25 358.40 142.01 C 358.23 128.93 358.77 115.83 358.12 102.76 C 358.37 103.80 358.54 104.85 358.62 105.91 C 358.83 131.62 358.24 157.34 359.01 183.03 C 359.00 305.71 358.98 428.38 359.03 551.06 C 359.11 552.34 358.81 553.52 358.12 554.62 C 357.84 561.93 358.07 569.25 358.00 576.58 C 356.48 579.20 354.00 581.10 352.60 583.80 C 351.40 584.28 350.21 584.79 349.02 585.28 C 349.01 585.69 348.98 586.53 348.97 586.95 C 347.85 587.00 346.73 587.07 345.61 587.15 C 343.34 588.58 340.55 587.86 338.03 588.02 C 256.03 587.98 174.02 588.00 92.02 588.01 C 89.15 587.82 86.04 588.62 83.39 587.20 C 82.91 587.13 81.95 586.98 81.47 586.91 C 80.25 585.65 78.89 584.54 77.43 583.57 C 75.78 581.11 73.54 579.11 72.00 576.57 C 71.90 571.39 72.21 566.19 71.89 561.03 C 71.70 560.62 71.31 559.80 71.12 559.38 C 70.83 433.62 71.10 307.84 70.99 182.06 M 218.04 230.81 C 216.20 225.84 211.36 222.57 206.15 222.18 C 200.18 221.82 193.37 221.34 188.39 225.29 C 183.62 229.36 182.53 236.02 182.06 241.94 C 181.81 250.76 181.61 260.53 187.02 268.02 C 190.78 272.86 197.36 273.23 202.99 273.03 C 202.99 269.40 202.99 265.76 203.00 262.13 C 199.39 261.88 194.70 261.88 192.72 258.23 C 189.91 252.73 190.06 246.11 191.15 240.17 C 193.19 232.20 203.97 231.28 210.03 235.02 C 215.18 239.21 213.89 246.49 214.00 252.34 C 216.83 252.34 219.67 252.34 222.51 252.36 C 222.91 246.82 221.28 240.63 224.75 235.77 C 227.79 231.09 234.25 230.83 239.20 231.78 C 244.19 232.94 246.63 238.11 246.89 242.84 C 247.11 248.38 247.65 254.56 244.42 259.42 C 241.67 263.41 236.38 263.45 232.04 263.50 C 231.99 267.24 231.99 270.98 232.04 274.72 C 238.61 274.88 246.46 274.47 250.69 268.65 C 255.94 260.88 255.74 250.97 255.49 241.98 C 254.91 235.86 253.93 229.14 249.58 224.46 C 244.72 219.58 237.24 219.72 230.87 220.23 C 224.87 220.64 219.55 224.96 218.04 230.81 M 187.75 291.72 C 182.69 297.10 182.01 305.00 181.97 312.04 C 181.89 319.97 182.43 328.85 187.90 335.12 C 192.16 339.92 199.06 339.79 204.94 339.72 C 205.03 335.98 205.01 332.24 204.93 328.50 C 201.21 328.52 196.81 328.93 193.98 326.01 C 191.10 322.79 190.53 318.20 190.50 314.05 C 190.49 309.93 190.38 305.31 193.09 301.92 C 195.94 298.59 200.86 298.05 204.94 298.81 C 208.60 299.44 210.40 303.04 212.04 305.97 C 215.71 313.10 218.80 320.51 222.40 327.68 C 224.55 332.11 227.27 336.88 232.20 338.61 C 239.42 340.92 247.13 339.71 254.57 339.96 C 254.56 322.36 254.46 304.76 254.63 287.16 C 251.75 287.11 248.88 287.10 246.01 287.10 C 246.00 301.08 246.01 315.07 246.01 329.06 C 240.99 329.08 234.71 328.96 231.79 324.11 C 226.30 314.64 223.40 303.83 217.27 294.69 C 214.84 291.03 211.11 288.00 206.61 287.54 C 200.20 286.94 192.73 287.00 187.75 291.72 M 183.07 356.41 C 183.25 360.80 182.39 365.40 183.47 369.67 C 188.07 376.36 192.68 383.07 197.51 389.60 C 200.47 390.16 202.91 387.52 205.55 386.52 C 205.56 385.49 205.57 384.47 205.59 383.45 C 201.81 378.08 197.97 372.76 194.11 367.45 C 214.25 367.54 234.39 367.44 254.52 367.50 C 254.55 363.81 254.54 360.12 254.56 356.44 C 230.73 356.45 206.90 356.50 183.07 356.41 M 228.02 403.34 C 224.66 403.86 222.10 406.27 220.47 409.12 C 218.22 404.76 213.84 401.62 208.83 401.61 C 202.77 401.52 196.20 400.74 190.66 403.75 C 185.32 406.74 183.02 413.13 183.00 418.98 C 183.01 431.55 182.99 444.12 183.03 456.69 C 206.87 456.65 230.72 456.66 254.57 456.68 C 254.54 452.93 254.54 449.18 254.57 445.44 C 244.89 445.47 235.22 445.44 225.55 445.45 C 225.66 437.65 225.32 429.83 225.69 422.04 C 225.83 417.62 229.92 414.77 233.95 414.15 C 240.78 412.96 247.77 413.08 254.60 411.85 C 254.52 407.89 254.53 403.92 254.56 399.96 C 245.80 401.71 236.79 401.66 228.02 403.34 M 237.97 472.35 C 237.63 475.84 239.94 478.62 241.35 481.59 C 245.40 489.41 247.70 498.89 244.42 507.40 C 242.47 512.48 236.98 514.92 232.00 515.99 C 223.14 517.66 213.92 517.71 205.08 515.90 C 200.55 514.94 195.81 512.68 193.73 508.30 C 190.22 501.01 191.45 492.54 193.81 485.10 C 194.91 481.14 197.27 477.45 197.03 473.21 C 193.83 472.26 190.65 471.23 187.48 470.17 C 182.59 481.70 180.88 494.50 182.50 506.92 C 183.32 512.27 185.25 517.79 189.61 521.29 C 196.88 527.37 206.81 528.40 215.94 528.64 C 225.83 528.72 236.47 528.58 245.15 523.17 C 249.62 520.55 252.85 516.13 254.12 511.12 C 257.81 496.61 254.89 480.63 246.28 468.38 C 243.50 469.68 240.76 471.07 237.97 472.35 Z" />
<path fill="#e2e2e3" stroke="#e2e2e3" stroke-width="0.09375" opacity="1.00" d=" M 218.04 230.81 C 219.55 224.96 224.87 220.64 230.87 220.23 C 237.24 219.72 244.72 219.58 249.58 224.46 C 253.93 229.14 254.91 235.86 255.49 241.98 C 255.74 250.97 255.94 260.88 250.69 268.65 C 246.46 274.47 238.61 274.88 232.04 274.72 C 231.99 270.98 231.99 267.24 232.04 263.50 C 236.38 263.45 241.67 263.41 244.42 259.42 C 247.65 254.56 247.11 248.38 246.89 242.84 C 246.63 238.11 244.19 232.94 239.20 231.78 C 234.25 230.83 227.79 231.09 224.75 235.77 C 221.28 240.63 222.91 246.82 222.51 252.36 C 219.67 252.34 216.83 252.34 214.00 252.34 C 213.89 246.49 215.18 239.21 210.03 235.02 C 203.97 231.28 193.19 232.20 191.15 240.17 C 190.06 246.11 189.91 252.73 192.72 258.23 C 194.70 261.88 199.39 261.88 203.00 262.13 C 202.99 265.76 202.99 269.40 202.99 273.03 C 197.36 273.23 190.78 272.86 187.02 268.02 C 181.61 260.53 181.81 250.76 182.06 241.94 C 182.53 236.02 183.62 229.36 188.39 225.29 C 193.37 221.34 200.18 221.82 206.15 222.18 C 211.36 222.57 216.20 225.84 218.04 230.81 Z" />
<path fill="#e2e2e3" stroke="#e2e2e3" stroke-width="0.09375" opacity="1.00" d=" M 187.75 291.72 C 192.73 287.00 200.20 286.94 206.61 287.54 C 211.11 288.00 214.84 291.03 217.27 294.69 C 223.40 303.83 226.30 314.64 231.79 324.11 C 234.71 328.96 240.99 329.08 246.01 329.06 C 246.01 315.07 246.00 301.08 246.01 287.10 C 248.88 287.10 251.75 287.11 254.63 287.16 C 254.46 304.76 254.56 322.36 254.57 339.96 C 247.13 339.71 239.42 340.92 232.20 338.61 C 227.27 336.88 224.55 332.11 222.40 327.68 C 218.80 320.51 215.71 313.10 212.04 305.97 C 210.40 303.04 208.60 299.44 204.94 298.81 C 200.86 298.05 195.94 298.59 193.09 301.92 C 190.38 305.31 190.49 309.93 190.50 314.05 C 190.53 318.20 191.10 322.79 193.98 326.01 C 196.81 328.93 201.21 328.52 204.93 328.50 C 205.01 332.24 205.03 335.98 204.94 339.72 C 199.06 339.79 192.16 339.92 187.90 335.12 C 182.43 328.85 181.89 319.97 181.97 312.04 C 182.01 305.00 182.69 297.10 187.75 291.72 Z" />
<path fill="#e2e2e3" stroke="#e2e2e3" stroke-width="0.09375" opacity="1.00" d=" M 183.07 356.41 C 206.90 356.50 230.73 356.45 254.56 356.44 C 254.54 360.12 254.55 363.81 254.52 367.50 C 234.39 367.44 214.25 367.54 194.11 367.45 C 197.97 372.76 201.81 378.08 205.59 383.45 C 205.57 384.47 205.56 385.49 205.55 386.52 C 202.91 387.52 200.47 390.16 197.51 389.60 C 192.68 383.07 188.07 376.36 183.47 369.67 C 182.39 365.40 183.25 360.80 183.07 356.41 Z" />
<path fill="#e2e2e3" stroke="#e2e2e3" stroke-width="0.09375" opacity="1.00" d=" M 228.02 403.34 C 236.79 401.66 245.80 401.71 254.56 399.96 C 254.53 403.92 254.52 407.89 254.60 411.85 C 247.77 413.08 240.78 412.96 233.95 414.15 C 229.92 414.77 225.83 417.62 225.69 422.04 C 225.32 429.83 225.66 437.65 225.55 445.45 C 235.22 445.44 244.89 445.47 254.57 445.44 C 254.54 449.18 254.54 452.93 254.57 456.68 C 230.72 456.66 206.87 456.65 183.03 456.69 C 182.99 444.12 183.01 431.55 183.00 418.98 C 183.02 413.13 185.32 406.74 190.66 403.75 C 196.20 400.74 202.77 401.52 208.83 401.61 C 213.84 401.62 218.22 404.76 220.47 409.12 C 222.10 406.27 224.66 403.86 228.02 403.34 M 192.57 423.04 C 192.48 430.51 192.59 437.98 192.54 445.45 C 200.37 445.45 208.19 445.46 216.01 445.45 C 215.96 437.95 216.09 430.45 215.97 422.95 C 215.85 418.94 213.87 414.45 209.74 413.20 C 206.53 412.48 203.16 412.64 199.91 412.99 C 195.23 413.73 192.57 418.62 192.57 423.04 Z" />
<path fill="#393c44" stroke="#393c44" stroke-width="0.09375" opacity="1.00" d=" M 192.57 423.04 C 192.57 418.62 195.23 413.73 199.91 412.99 C 203.16 412.64 206.53 412.48 209.74 413.20 C 213.87 414.45 215.85 418.94 215.97 422.95 C 216.09 430.45 215.96 437.95 216.01 445.45 C 208.19 445.46 200.37 445.45 192.54 445.45 C 192.59 437.98 192.48 430.51 192.57 423.04 Z" />
<path fill="#e2e2e3" stroke="#e2e2e3" stroke-width="0.09375" opacity="1.00" d=" M 237.97 472.35 C 240.76 471.07 243.50 469.68 246.28 468.38 C 254.89 480.63 257.81 496.61 254.12 511.12 C 252.85 516.13 249.62 520.55 245.15 523.17 C 236.47 528.58 225.83 528.72 215.94 528.64 C 206.81 528.40 196.88 527.37 189.61 521.29 C 185.25 517.79 183.32 512.27 182.50 506.92 C 180.88 494.50 182.59 481.70 187.48 470.17 C 190.65 471.23 193.83 472.26 197.03 473.21 C 197.27 477.45 194.91 481.14 193.81 485.10 C 191.45 492.54 190.22 501.01 193.73 508.30 C 195.81 512.68 200.55 514.94 205.08 515.90 C 213.92 517.71 223.14 517.66 232.00 515.99 C 236.98 514.92 242.47 512.48 244.42 507.40 C 247.70 498.89 245.40 489.41 241.35 481.59 C 239.94 478.62 237.63 475.84 237.97 472.35 Z" />
</svg>';
echo "&nbsp;ISS Battery <blue>Good</blue>";}
else {echo '<br><br>
<svg id="weather34 low battery" width="18pt" viewBox="0 0 408 591" version="1.1">
<path fill="#e4e6e9" stroke="#e4e6e9" stroke-width="0.09375" opacity="1.00" d=" M 136.61 48.60 C 138.57 45.48 142.26 43.74 145.91 44.00 C 185.97 44.00 226.03 44.00 266.09 44.00 C 269.96 43.72 273.89 45.71 275.74 49.17 C 277.62 52.45 276.87 56.37 276.97 59.96 C 229.66 59.82 182.34 59.82 135.03 59.96 C 135.11 56.17 134.37 51.95 136.61 48.60 Z" />
<path fill="#d65b4a" stroke="#d65b4a" stroke-width="0.09375" opacity="1.00" d=" M 62.07 72.18 C 64.95 67.09 69.33 62.35 74.99 60.36 C 76.98 60.17 78.97 60.03 80.96 60.00 C 98.98 59.97 117.01 60.05 135.03 59.96 C 182.34 59.82 229.66 59.82 276.97 59.96 C 296.12 60.25 315.30 59.58 334.44 60.30 C 339.19 61.52 343.13 65.13 345.89 69.10 C 346.72 70.33 348.17 71.37 347.99 73.03 C 348.26 81.02 347.35 89.09 348.82 97.01 C 348.95 120.26 348.80 143.53 348.89 166.79 C 252.96 166.73 157.04 166.72 61.11 166.79 C 61.17 143.53 61.13 120.26 61.13 97.00 C 61.21 93.14 60.58 89.22 61.41 85.40 C 62.55 81.08 61.70 76.58 62.07 72.18 Z" />
<path fill="#393c44" stroke="#393c44" stroke-width="0.09375" opacity="1.00" d=" M 61.11 166.79 C 157.04 166.72 252.96 166.73 348.89 166.79 C 349.16 290.86 348.89 414.94 349.03 539.02 C 349.21 543.06 347.79 546.94 347.97 550.98 C 347.78 556.53 348.45 562.14 347.71 567.65 C 344.48 573.35 339.00 578.91 332.00 578.99 C 247.00 579.01 161.99 578.99 76.99 579.00 C 71.14 579.14 67.21 574.27 63.81 570.20 C 60.82 566.84 62.33 562.05 62.02 558.00 C 62.36 553.61 60.83 549.39 60.97 545.02 C 61.11 418.94 60.83 292.86 61.11 166.79 M 79.80 201.00 C 80.67 202.50 81.55 204.00 82.51 205.45 C 106.16 239.48 129.71 273.58 153.32 307.64 C 164.78 324.46 176.72 340.96 187.92 357.95 C 163.07 394.35 137.72 430.42 112.70 466.70 C 101.48 483.15 89.74 499.25 78.85 515.92 C 90.15 515.99 101.46 516.21 112.74 515.81 C 142.88 472.56 172.73 429.11 202.77 385.80 C 203.36 384.88 204.12 384.17 205.05 383.66 C 206.46 383.66 207.20 385.07 208.01 386.01 C 237.15 428.83 266.51 471.52 295.64 514.34 C 296.90 516.62 299.83 515.84 301.98 516.05 C 312.09 515.88 322.21 516.18 332.32 515.89 C 330.01 511.61 326.99 507.78 324.25 503.78 C 290.93 455.48 257.34 407.37 224.14 359.00 C 259.97 307.28 296.20 255.82 332.16 204.18 C 332.84 203.12 333.48 202.05 334.13 200.97 C 322.84 200.75 311.52 200.54 300.24 201.06 C 270.06 244.63 240.01 288.29 209.93 331.91 C 209.21 333.26 207.87 333.76 206.43 333.87 C 177.93 292.27 149.53 250.59 121.04 208.97 C 119.24 206.40 117.73 203.62 115.59 201.31 C 112.82 200.44 109.85 200.84 107.00 200.76 C 97.93 200.96 88.86 200.51 79.80 201.00 Z" />
<path fill="#d65b4a" stroke="#d65b4a" stroke-width="0.09375" opacity="1.00" d=" M 79.80 201.00 C 88.86 200.51 97.93 200.96 107.00 200.76 C 109.85 200.84 112.82 200.44 115.59 201.31 C 117.73 203.62 119.24 206.40 121.04 208.97 C 149.53 250.59 177.93 292.27 206.43 333.87 C 207.87 333.76 209.21 333.26 209.93 331.91 C 240.01 288.29 270.06 244.63 300.24 201.06 C 311.52 200.54 322.84 200.75 334.13 200.97 C 333.48 202.05 332.84 203.12 332.16 204.18 C 296.20 255.82 259.97 307.28 224.14 359.00 C 257.34 407.37 290.93 455.48 324.25 503.78 C 326.99 507.78 330.01 511.61 332.32 515.89 C 322.21 516.18 312.09 515.88 301.98 516.05 C 299.83 515.84 296.90 516.62 295.64 514.34 C 266.51 471.52 237.15 428.83 208.01 386.01 C 207.20 385.07 206.46 383.66 205.05 383.66 C 204.12 384.17 203.36 384.88 202.77 385.80 C 172.73 429.11 142.88 472.56 112.74 515.81 C 101.46 516.21 90.15 515.99 78.85 515.92 C 89.74 499.25 101.48 483.15 112.70 466.70 C 137.72 430.42 163.07 394.35 187.92 357.95 C 176.72 340.96 164.78 324.46 153.32 307.64 C 129.71 273.58 106.16 239.48 82.51 205.45 C 81.55 204.00 80.67 202.50 79.80 201.00 Z" />
</svg>';echo "&nbsp;ISS Battery<orange> Replace</orange>";}?>
</div> 
<br><br>
</article>
<?php ;}
else {
echo $weather34chart2;echo " <icontext>Day/Month/Year Charts</icontext><br>";
echo $weather34alm;echo" <icontext>Almanac Data</icontext><br>";
echo $weather34refr;echo "<icontext>Refresh</icontext><br>";
echo $wireless;echo " <icontext>Data Online</icontext><br>";
echo $wirelessoffline;echo " <icontext>Data Offline</icontext>";
}?>
 </article> 
</main>
<main class="grid">
<article>  
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
</article> 

<article>     
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
 
  
  </article>
  <article>
  
  <img src="images/weather34-app-icon.svg" width="140px" class="weather34-image" alt="weather34 logo" title="weather34 logo">



  </article>

</main>

<main class="grid">
  <article >  
<div class="info-1"> 
<?php echo $info?> Meteobridge Firmware Update Check 
<a href="https://www.meteobridge.com/wiki/index.php/Forum" target="_blank" title="https://www.meteobridge.com/wiki/index.php/Forum" alt="https://www.meteobridge.com/wiki/index.php/Forum" class="info2a">
Here</a>
</div>

<div class="info-2"> 
<?php echo $info?> Meteobridge Info Page 
<a href="https://www.meteobridge.com/wiki/index.php/Home" target="_blank" title="https://www.meteobridge.com/wiki/index.php/Home" alt="https://www.meteobridge.com/wiki/index.php/Home" class="info2a">Here</a> 

</div>
  
  </article>

  <article >  
<div class="info-1"> 
<?php echo $info?> Weather<blue>34</blue> Template Website
<a href="https://weather34.com/homeweatherstation" target="_blank" title="https://weather34.com" alt="https://weather34.com" class="info2a">
Here</a> 
</div>

<div class="info-2"> 
<?php echo $info?> Weather<blue>34</blue> Template Guide
<a href="https://weather34.com/homeweatherstation/weather34-standalone.html" target="_blank" title="https://weather34.com/homeweatherstation/weather34-standalone.html" alt="https://weather34.com/homeweatherstation/weather34-standalone.html" class="info2a">Here</a> 

</div>

  
  
  
  </article>


  <article >  
<div class="info-1"> 
CSS/SVG/PHP scripts were developed by <a href="https://weather34.com/homeweatherstation" target="_blank" title="https://weather34.com" alt="https://weather34.com" class="info2a">weather34.com</a> © 2015-<?php echo date('Y');?>
</div>
  </article>
</main>