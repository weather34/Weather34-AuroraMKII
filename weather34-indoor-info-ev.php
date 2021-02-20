<?php 
	##############################################################
	#	HOME WEATHER STATION TEMPLATE by BRIAN UNDERDOWN 2015-20   
	#   https://weather34.com/homeweatherstation/index.html 		
	# 	                                                                                              
	# 	WEATHER34 INDOOR :November 2020                                                      
	# 	                                                                                              
	#   https://www.weather34.com 	                                                                   
	##############################################################
//original weather34 script original css/svg/php by weather34 2015-2020 clearly marked as original by weather34//
include('livedata.php');header('Content-type: text/html; charset=utf-8');
$fallingsymbolsmallhome='<svg id="falling indoor" width="14" height="14" viewBox="0 0 24 24"><polyline points="23 18 13.5 8.5 8.5 13.5 1 6" fill="none" stroke="#aaa" 
stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
<polyline points="17 18 23 18 23 12" fill="none" stroke="#00adbd" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>';
$risingsymbolsmallhome='<svg id="rising indoor" width="14" height="14" viewBox="0 0 24 24">
<polyline points="23 6 13.5 15.5 8.5 10.5 1 18" fill="none" stroke="#aaa" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
<polyline points="17 6 23 6 23 12" fill="none" stroke="#d87040" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weather Station Indoor Information</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
:root {
  --white: #ffffff;
  --light: #f5f5f5;
  --dark: #07090a;
  --dark-light: hsla(0, 0%, 0%, 0.151);
  --dark-toggle: #35393b;
  --dark-caption: rgba(66, 70, 72, 0.429);
  --black: #000000;
  --deepblue: #00adbd;
  --blue: #00adbd;
  --rainblue: #00adbd;
  --darkred: #703232;
  --deepred: #d35f50;
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
  --font-color: grey;
  --bg-color: hsla(198, 14%, 14%, 0.19);
  --button-bg-color: hsla(198, 14%, 14%, 0.19);
  --button-shadow: inset 5px 5px 20px #0c0b0b,
    inset -5px -5px 20px hsla(198, 14%, 14%, 0.19);
}

@font-face {
  font-family: weathertext2;
  src: url(fonts/verbatim-medium.woff2) format("woff2");
}
@font-face {
  font-family: clock;
  src: url(fonts/clock3-webfont.woff2) format("woff2");
}

body,
html {
  font-size: 13px;
  font-family: Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
icont {
  font-weight: 600;
  color: #aaa;
}
.grid {
  display: grid;
  grid-template-columns: repeat(1, 1fr);
  grid-column-gap: 5px;
  grid-row-gap: 5px;
  color: #f5f7fc;
  margin-top: -10px;
  color: #aaa;
}
.grid > article {
  border: 1px solid rgba(97, 106, 114, 0.3);
  padding: 5px;
  font-size: 0.7em;
  border-radius: 4px;
  -webkit-border-radius: 4px;
  background: 0;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  background:var(--dark-light);
  color: #aaa;
  
}


.theaqiwarning{display:-webkit-box;display:-ms-flexbox;display:flex;width:8rem;height:8.5rem;
    color:var(--body-text-dark);overflow:hidden;font-family:weathertext2;
    line-height:1;border:1px solid hsla(206,12%,27%,.3);border-width:thin;font-size:10px;
    -webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;text-align:center;
    margin-left:-43px;z-index:auto;position:absolute;margin-top:-65px;border-radius:3px;-webkit-border-radius:3px;-moz-border-radius:3px;-ms-border-radius:3px;-o-border-radius:3px;padding:3px}
    .theaqiwarning>blue1{color:var(--blue);font-size:1em;position:absolute;top:5px}
    .theaqiwarning>grey1{color:var(--body-text-dark);font-size:1em;position:absolute;top:5px}


.grid > article2 {
  border: 0px solid rgba(97, 106, 114, 0.3);
  padding: 5px;
  font-size: 0.8em;
  border-radius: 4px;
  -webkit-border-radius: 4px;
  background: 0;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  background:var(--dark-light);
  color: #aaa;
  width:100%;
  height:156px
}
.grid2 {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-column-gap: 5px;
  grid-row-gap: 5px;
  color: #aaa;
  overflow: hidden;
  margin-top: 5px;
}
.grid2 > article {
  border: 1px solid rgba(97, 106, 114, 0.3);
  padding: 5px;
  font-size: 0.8em;
  border-radius: 4px;
  -webkit-border-radius: 4px;
  background: 0;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  background:var(--dark-light);
  height: 145px;
}



.grid2a {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  grid-column-gap: 5px;
  grid-row-gap: 5px;
  color: #aaa;
  overflow: hidden;
  margin-top: 0px;
}
.grid2a > article {
  border: 1px solid rgba(97, 106, 114, 0.3);
  padding: 5px;
  font-size: 0.8em;
  border-radius: 4px;
  -webkit-border-radius: 4px;
  background: 0;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  background:var(--dark-light);
  height: 145px;
}
desc{position:absolute;font-size:8.5px;margin-left:300px;margin-top:24px;}


.gridfooter {
  display: grid;
  grid-template-columns: repeat(1, 1fr);
  grid-column-gap: 5px;
  grid-row-gap: 5px;
  color: #aaa;
  overflow: hidden;
  margin-top: 5px;
}
.gridfooter > article {
  border: 1px solid rgba(97, 106, 114, 0.3);
  padding: 5px;
  font-size: 0.8em;
  border-radius: 4px;
  -webkit-border-radius: 4px;
  background: 0;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #aaa;
}
a {
  color: #aaa;
  text-decoration: none;
  font-size: 1em;
  color: #aaa;
}
.weather34darkbrowser {
  position: relative;
  background: 0;
  width: 97%;
  height: 30px;
  margin: auto;
  margin-top: -5px;
  margin-left: 0;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
  padding-top: 10px;
}
.weather34darkbrowser[url]:after {
  content: attr(url);
  color: #aaa;
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
.actualt {
  position: relative;
  left: 5px;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  -o-border-radius: 3px;
  border-radius: 3px;
  background: rgba(74, 99, 111, 0);
  padding: 5px;
  font-family: Arial, Helvetica, sans-serif;
  width: 190px;
  height: 0.8em;
  font-size: 0.8rem;
  padding-top: 2px;
  color: #aaa;
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
  font-family: Arial, Helvetica, sans-serif;
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
  left: 165px;
  background: rgba(74, 99, 111, 0);
  padding: 5px;
  font-family: Arial, Helvetica, sans-serif;
  width: 190px;
  height: 0.8em;
  font-size: 0.8rem;
  padding-top: 2px;
  color: #aaa;
  align-items: center;
  justify-content: center;
  margin-bottom: 10px;
  top: 0px;
}
.hardwareimage {
  position: relative;
  display: flex;
  margin: 0 auto;
  margin-top: -30px;
  margin-left: 120px;
}
.hardwareimagenano {
  position: relative;
  display: flex;
  margin: 0 auto;
  margin-top: -20px;
  margin-left: 150px;
}
.ups {
  position: relative;
  display: flex;
  margin: 0 auto;
  margin-top: 5px;
  margin-left: 0;
}
.stationhardware {
  position: absolute;
  display: flex;
  margin-left: 120px;
  margin-top: -20px;
}
.stationhardware2 {
  position: absolute;
  display: flex;
  margin-left: 140px;
  margin-top: -50px;
}
.davislogo {
  position: absolute;
  display: flex;
  margin-left: 20px;
  margin-top: 5px;
}
.weather34logosvg {
  position: absolute;
  display: flex;
  right: 40px;
  margin-top: -70px;
  width: 3rem;
}
.weather34-image {
  position: absolute;
  display: flex;
  right: 70px;
  margin-top: 20px;
  width: 8rem;
  opacity: 0.9;
}
icontext {
  vertical-align: top;
  position: relative;
  top: 8px;
  color: #aaa;
}
icontext2 {
  vertical-align: top;
  position: relative;
  top: 0;
  color: #aaa;
}
icontext3 {
  vertical-align: top;
  position: relative;
  top: 4px;
  color: #aaa;
}
icontextrefresh {
  position: relative;
  top: 8px;
  color: #aaa;
}
.theme-icon {
  position: relative;
  display: inline-block;
}
.charttempmodule{margin-top:-40px;}
@media screen and (max-width: 720px) {
  .weather34logosvg {
    display: none;
  }
  .grid {
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    grid-column-gap: 5px;
    grid-row-gap: 5px;
    color: #f5f7fc;
    overflow: hidden;
    margin-top: 5px;
  }
  .grid2 {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-column-gap: 5px;
    grid-row-gap: 5px;
    color: #f5f7fc;
    overflow: hidden;
    margin-top: 5px;
  }
}
@media screen and (max-width: 640px) {
  .weather34logosvg {
    display: none;
  }
  .grid {
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    grid-column-gap: 5px;
    grid-row-gap: 5px;
    color: #f5f7fc;
    overflow: hidden;
    margin-top: 5px;
  }
  .grid2 {
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    grid-column-gap: 5px;
    grid-row-gap: 5px;
    color: #f5f7fc;
    overflow: hidden;
    margin-top: 5px;
  }
}
::-webkit-scrollbar {
  width: 10px;
}
::-webkit-scrollbar-track {
  background: #333;
}
::-webkit-scrollbar-thumb {
  background: #009bb4;
}
::-webkit-scrollbar-thumb:hover {
  background: #d87040;
}

.button-dial-small {
  border-radius: 50%;
  display: flex;
  position: relative;
  height: 100px;
  margin: 0px;
  left: 5px;
  align-items: center;
  justify-content: center;
  width: 100px;
  font-family: weathertext2;
  margin-top: -5px;
  color: grey;
  border: 8px solid rgba(110, 116, 121, 0.2);
}
.button-dial-top-small {
  border-radius: 50%;
  width: 99px;
  height: 99px;
  position: absolute;
  display: flex;
  left: 0px;
  text-align: center;
  background: hsla(214, 29%, 91%, 0);
  box-shadow: var(--button-shadow);
  background-image: linear-gradient(hsla(0, 0%, 33%, 0.2) 1px, transparent 1px),
    linear-gradient(to right, hsla(0, 0%, 33%, 0.2) 1px, transparent 1px);
  background-size: 5px 5px;
}
.button-dial-label-small {
  font-size: 26px;
  position: relative;
  z-index: 990;
  color: grey;
  left: 0;
  top: 0;

}
blue {
  color: var(--blue);
}
orange {
  color: var(--orange);
}
green {
  color: var(--green);
}
red {
  color: var(--red);
}
deepred {
  color: var(--deepred);
}
yellow {
  color: var(--yellow);
}
purple {
  color: var(--purple);
}
.aqicon {
  position: relative;
  top: -50px;
  left: 170px;
}
.humidityfeel {
  position: relative;
  top: -5px;
  left: 170px;
  font-size: 12px;
}
pm25 {
  font-size: 8px;
  color: #aaa;
  vertical-align: text-top;
}
[data-title]:hover:after {
  opacity: 1;
  transition: all 0.1s ease 0.5s;
  visibility: visible;
}

[data-title]:after {
  content: attr(data-title);
  background-color: var(--blue);
  color: #ffffff;
  font-size: 1.2em;
  position: absolute;
  padding: 5px 5px 5px 5px;
  bottom: 2.6em;
  left: 0;
  white-space: nowrap;
  opacity: 0;
  z-index: 99999;
  visibility: hidden;
  border-radius: 3px;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  -ms-border-radius: 3px;
  -o-border-radius: 3px;
}

[data-title] {
  position: relative;
}
trend {
    display:flex;
  position: absolute;
  font-size: 12px;
  color: #aaa;  
  margin-top: 0px;
  font-family: weathertext2;
}
trend span {
  font-size: 0.8em;
}
.average24{position:absolute;font-size:10px;font-family:weathertext2;top:30px;display:flex;width:auto;text-align:center;max-width:100px;margin-left:0px}

</style>
<script src="js/jquery.js"></script>
<div class="weather34darkbrowser" url="Indoor Salon Information"></div>
<main class="grid2">

<article>  
<div class=actualt>Indoor Temperature</div> 
   <div class="button button-dial-small">   
   <div class="button-dial-top-small"></div>
<div class="button-dial-label-small">
<?php // indoor temp
if(anytoC($weather["temp_indoor"]) >=30){ echo "<deepred>".$weather["temp_indoor"] ."</deepred>";}
else if(anytoC($weather["temp_indoor"]) >=25){ echo "<red>".$weather["temp_indoor"] ."</red>";}
else if(anytoC($weather["temp_indoor"]) >=20){ echo "<orange>".$weather["temp_indoor"] ."</orange>";}
else if(anytoC($weather["temp_indoor"]) >=15){ echo "<yellow>".$weather["temp_indoor"] ."</yellow>";}
else if(anytoC($weather["temp_indoor"]) >=10){ echo "<green>".$weather["temp_indoor"] ."</green>";}
else if(anytoC($weather["temp_indoor"]) >-50){ echo "<blue>".$weather["temp_indoor"] ."</blue>";}
echo "<pm25>&deg;".$weather["temp_units"]."</pm25><trend>";


if($weather["temp_indoor_trend"] >0)echo "&nbsp;".number_format($weather["temp_indoor_trend"],1)."&deg;&nbsp;" .$risingsymbolsmallhome;
else if($weather["temp_indoor_trend"]<0)echo "&nbsp;".number_format($weather["temp_indoor_trend"],1)."&deg;&nbsp;" .$fallingsymbolsmallhome;
echo"</trend></div>";
?>
</div> </div> 
<div class="aqicon">
<div class=theaqiwarning><grey1>Temperature Info</grey1><br>
<?php //aqi description
if (anytoC($weather["temp_indoor"]) >=30){echo 'Very hot cooling required very unhealthy.';}
else if (anytoC($weather["temp_indoor"]) >=25){echo 'Very warm some ventilation or cooling required during warmer months .';}
else if (anytoC($weather["temp_indoor"]) >=19){echo 'Comfortable no concerns enjoy the comfortable conditions.';}
else if (anytoC($weather["temp_indoor"]) >=15){echo 'Somewhat cool possible heating required during autumn/winter months.';}
else if (anytoC($weather["temp_indoor"]) >=10){echo 'Cold may cause damp conditions causing poor health during winter months do not reside here for long periods.' ;}
else if (anytoC($weather["temp_indoor"]) >=-50){echo 'Very Cold requires considerable heating do not reside here for long periods.';}
?>
</div></div>
</article> 


<article>  
<div class=actualt>Indoor Humidity</div> 
   <div class="button button-dial-small">   
   <div class="button-dial-top-small"></div>
<div class="button-dial-label-small"> 
<?php //indoor Humidity

if($weather["humidity_indoor"]>=70){ echo "<blue>".number_format($weather["humidity_indoor"],0)."</blue>";}
else if($weather["humidity_indoor"] >=50){ echo "<yellow>".number_format($weather["humidity_indoor"],0)."</yellow>";}
else if($weather["humidity_indoor"] >=40){ echo "<green>".number_format($weather["humidity_indoor"],0)."</green>";}
else if($weather["humidity_indoor"] >=0){ echo "<red>".number_format($weather["humidity_indoor"],0)."</red>";}
echo "<pm25>%</pm25><trend>";
if($weather["humidity_indoortrend"] >0)echo "&nbsp;".$weather["humidity_indoortrend"]."<pm25>%</pm25>&nbsp;" .$risingsymbolsmallhome;
else if($weather["humidity_indoortrend"]<0)echo "&nbsp;".$weather["humidity_indoortrend"]."<pm25>%</pm25>&nbsp;" .$fallingsymbolsmallhome;
?></trend>
</div> </div>

<div class="aqicon">
<div class=theaqiwarning><grey1>Humidity Info</grey1><br><?php //aqi description
if ($weather["humidity_indoor"] >=70){echo 'Very damp and uncomfortable for those with health concerns.';}
else if ($weather["humidity_indoor"] >=50){echo 'Comfortable but beware of rising humidity in warmer months.';}
else if ($weather["humidity_indoor"] >=40){echo 'Comfortable no concerns.';}
else if ($weather["humidity_indoor"] >=0){echo 'Becoming Dry or Dry beware of dust and coldness long term dry humidity can cause dry skin irritation. ';}

?>
</div></div>

</article> 

<article>  
<div class=actualt>Indoor Air Quality</div> 
<div class="button button-dial-small">   
   <div class="button-dial-top-small"></div>
<div class="button-dial-label-small"> 
<?php //pm10
$aqiweather["aqi"]     =  anyToC($weather['temp_indoor']) + anyToC($weather['temp_indoor_feel']) + $weather['humidity_indoor'];
$aqiweather["aqi"]=$aqiweather["aqi"]*0.02;$aqiweather["aqi"]     = number_format(pm25_to_aqi($aqiweather["aqi"]), 1); 
if($aqiweather["aqi"]>=250.4){ echo "<purple>".number_format($aqiweather["aqi"],1)."</purple>";}
else if($aqiweather["aqi"] >=199.9){ echo "<deepred>".number_format($aqiweather["aqi"],1)."</deepred>";}
else if($aqiweather["aqi"] >=55.4){ echo "<red>".number_format($aqiweather["aqi"],1)."</red>";}
else if($aqiweather["aqi"] >=35.4){ echo "<orange>".number_format($aqiweather["aqi"],1)."</orange>";}
else if($aqiweather["aqi"] >=12){ echo "<yellow>".number_format($aqiweather["aqi"],1)."</yellow>";}
else if($aqiweather["aqi"] >=0){ echo "<green>".number_format($aqiweather["aqi"],1)."</green>";}
echo "<pm25>AQI</pm25><trend> &nbsp;PM2.5</trend> ";?>
</div> </div> 
<div class="aqicon">
<div class=theaqiwarning><grey1>Health Info</grey1><br>
<?php
if ($aqiweather["aqi"] >=300){echo 'Very dangerous hazordous conditions,wear a mask to protect yourself.';}
else if ($aqiweather["aqi"] >=250){echo 'Healthy people will commonly show symptoms. People with respiratory or heart diseases will be affected.';}
else if ($aqiweather["aqi"] >=200){echo 'Healthy people will commonly show symptoms. People with respiratory or heart diseases will be affected';}
else if ($aqiweather["aqi"] >=150){echo 'Sensitive individuals will experience more serious conditions.';}
else if ($aqiweather["aqi"] >=100){echo 'Healthy people may experience slight irritations and sensitive individuals could be affected.';}
else if ($aqiweather["aqi"] >=50){echo 'May cause minor breathing discomfort to sensitive people.';}
else if ($aqiweather["aqi"] >=0){echo "No health implications enjoy the clean air.";};
?>
</div></div>
</article> 
</main>

<main class="grid2a">
<article2> <desc>Temperature</desc>
<iframe  src="weather34charts/todayindoormodulechart-large.php" frameborder="0" scrolling="no" width="380px" height="200px"></iframe>  
</article2>

<article2> <desc>Humidity</desc>
<iframe   src="weather34charts/todayindoor-humidity-modulechart-large.php" frameborder="0" scrolling="no" width="380px" height="200px"></iframe>  
</article2>
</main>

<main class="grid">
  <article >  
<div class="info-1"> 
CSS/SVG/PHP scripts were developed by <a href="https://weather34.com/homeweatherstation" target="_blank" data-title="weather34.com" class="info2a">weather34.com</a> © 2015-<?php echo date('Y');?>..
Data Charts compiled with <a href="https://canvasjs.com/" target="_blank" title="https://canvasjs.com/" alt="https://canvasjs.com/" class="info2a">CanvasJs.com</a> v2.3.1 GA (CC BY-NC 3.0) Non-Commercial-Version. 
</div>
  </article>
</main>