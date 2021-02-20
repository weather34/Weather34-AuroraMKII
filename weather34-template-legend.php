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
@font-face{font-family:weathertext2;src:url(fonts/verbatim-regular.woff2) format("woff2")}
@font-face{font-family:weathertext3;src:url(fonts/verbatim-medium.woff2) format("woff2")}
@font-face{font-family:clock;src:url(fonts/clock3-webfont.woff2) format("woff2")}

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
yellow1{color:hsl(35, 77%, 58%)}
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
.hardwareimagerpi{position:relative;display:flex;margin:0 auto;margin-top:-10px;margin-left:135px}
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
green1{color:hsl(75, 62%, 43%)}
h2{font-size:1.15em;font-family:weathertext3;opacity:0.7;font-weight:normal}

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
else if($mbplatform=='RPI'){echo '<img src="images/weather34-mb-rpi.svg" width="100px" class="hardwareimagerpi" alt="Meteobridge RPI" title="Meteobridge RPI">';}
 
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
<div class=actualt>Additional Info</div> 
&nbsp;&nbsp;

<?php 
if ($davisairquality=='yes' && $purpleairhardware=='yes'){echo '<img src="aqi/Airlink34.svg" style="width:100px;margin-top:10px;"><img src="images/PurpleAir.svg" style="width:100px;margin-top:10px;">';}
else if ($davisairquality=='yes'){echo '<img src="aqi/Airlink34.svg" style="width:100px;margin-top:10px;">';}
else if ($purpleairhardware=='yes'){echo '<img src="images/PurpleAir.svg" style="width:100px;margin-top:10px;">';}
else if ($luftdatenhardware=='yes'){echo '<img src="images/weather34-nova.svg" style="width:60px;margin-top:5px;margin-bottom:-10px">';}
$weather34updatefile=$livedata;
if(file_exists($livedata)&&time()- filemtime($livedata)>300){echo "<center style='font-size:1.5em;'><br> Station Data is <red>Offline</red>
  ".$warmalertnotif."</center>";}
else echo "<center style='font-size:1.5em;'><br> Station Data is <green1>Online</green1></center>" ?>
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
  
  <center>
  <br>
  <br>
  <h2>Weather<blue>34</blue> Template
  <br>Version <blue><?php echo $weather34version?></blue>
  <br>
Release Date <blue>  <?php echo $weather34versiondate?></blue>
<br>
PHP Version <blue><?php echo phpversion()?></blue>
<br>
CSS file size <?php $filename ="console-".$theme.".css";echo '<blue>'.filesize($filename) . ' kb</blue>';?>

<br>
<?php
$end_time = microtime(TRUE);
$time_taken =($end_time - $start_time)*1000;
$time_taken = round($time_taken,5); 
echo 'Loaded in '.$time_taken.' seconds.';
?>

</h2>
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