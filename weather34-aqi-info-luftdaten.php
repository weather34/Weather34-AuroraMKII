<?php 
    #########################################################
    #	CREATED FOR Weather34                               										  
    # https://weather34.com/homeweatherstation/index.html 
    # 	Revised: October 2020   				  	            
    # 	                                          
    #   https://www.weather34.com 	                                                                  
    ########################################################
//original weather34 script original css/svg/php by weather34 2015-2020 clearly marked as original by weather34//
include('livedata.php'); 
if ($clockformat=='12'){$timeformat= "g:ia";}
else if ($clockformat=='24'){$timeformat= "H:i";}
$info='<svg  width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
<path path stroke="none" d="M0 0h24v24H0z" /><circle cx="12" cy="12" r="9" stroke="currentColor"/><line x1="12" y1="8" x2="12.01" y2="8" stroke="var(--blue)"/>
<polyline points="11 12 12 12 12 16 13 16" stroke="var(--blue)"/></svg>';

//luftdaten air quality	
$url = 'jsondata/luftdaten.txt'; // luftdaten JSON file
$data = file_get_contents($url); // put the contents of the file into a variable
$weather34luftdaten = json_decode($data,true); // decode the JSON feed
foreach ($weather34luftdaten as $weather34luftdatenaqi) {}
$aqiweather["aqi10"]= $weather34luftdatenaqi['sensordatavalues'][0]['value'];
$aqiweather["aqi25"]=$weather34luftdatenaqi['sensordatavalues'][1]['value'];
$aqiweather["temp"]     = $weather["temp"] ;
$aqiweather["humidity"] = $weather["humidity"] ;
$aqiweather["aqi-type-1"]= $weather34luftdatenaqi['sensordatavalues'][0]['value_type'];
$aqiweather["aqi-type"]=$weather34luftdatenaqi['sensordatavalues'][1]['value_type'];
$aqiweather["aqi-hardware-name"]=$weather34luftdatenaqi['sensor']['sensor_type']['name'];
$aqiweather["aqi-hardware"]=$weather34luftdatenaqi['sensor']['sensor_type']['manufacturer'];
$aqiweather["label"]= $luftdatenID;
if ($aqiweather["aqi-type"]=="P1"){$aqiweather["aqi-type"]="PM 10";}
if ($aqiweather["aqi-type"]=="P2"){$aqiweather["aqi-type"]="PM 2.5";}
if ($aqiweather["aqi-type-1"]=="P2"){$aqiweather["aqi-type-1"]="PM 2.5";}
if ($aqiweather["aqi-type-1"]=="P1"){$aqiweather["aqi-type-1"]="PM 10";}
//$aqiweather["aqi"]= number_format(pm25_to_aqi($aqiweather["aqi"]), 1);
//$aqiweather["aqi2"]= number_format(pm25_to_aqi($aqiweather["aqi2"]), 1);
$aqiweather["aqindex"]= number_format(pm25_to_aqi($aqiweather["aqi25"]), 1);
$a=""; if ($aqiweather["aqi25"]==$a) {$aqiweather["aqi25"] = "N/A" ;}
if ($aqiweather["aqi10"]==$a) {$aqiweather["aqi10"] = "N/A" ;}
$aqiweather["updatedtime"]=$weather34luftdatenaqi['timestamp'];
$aqitime=$weather34luftdatenaqi['timestamp'];
//weather34 convert the UTC to local for Luftdaten timestamp 
$weather34aqitime = strtotime($aqitime .' UTC');
$weather34localtime = date($timeformat,$weather34aqitime);
$aqiupdatetime= $weather34localtime;
if ($aqiweather["aqindex"] >= 401) { $aqicaution=' Health alert.Everyone may experience more serious health effects';} 
     else if ($aqiweather["aqindex"] >= 301) {$aqicaution='Health alert.Everyone may experience more serious health effects';} 
     else if ($aqiweather["aqindex"] >= 201) {$aqicaution='Health warnings of emergency conditions.The entire population is more likely to be affected. ';} 
     else if ($aqiweather["aqindex"] >= 151) {$aqicaution='Everyone may begin to experience health effects members of sensitive groups may experience more serious health effects.';} 
     else if ($aqiweather["aqindex"] >= 101) {$aqicaution='Members of sensitive groups may experience health effects.The general public is not likely to be affected.';} 
     else if ($aqiweather["aqindex"] >= 51) {$aqicaution='Air quality is acceptable. However for some pollutants there may be a moderate health concern for a very small number of people.';} 
     else if ($aqiweather["aqindex"] >= 0) {$aqicaution='Air quality is considered satisfactory air pollution poses little or no risk.';} 

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>AIR Quality Station Hardware Information</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
:root{
  --white:#ffffff;
  --light:#f5f5f5;
  --dark:#07090a;
  --dark-light:hsla(0, 0%, 0%, 0.251);
  --dark-toggle:#35393b;
  --dark-caption:rgba(66, 70, 72, 0.429);
  --black:#000000;
  --deepblue:#00adbd;
  --blue:#00adbd;
  --rainblue:#00adbd;
  --darkred:#703232;
  --deepred:#d35f50;
  --red:#d35f50;
  --yellow: #e6a241;
  --green:#90b22a;
  --orange:rgb(236, 81, 19);
  --purple:#8680bc;
  --silver:#ecf0f3;
  --border-dark:#3d464d;
  --body-text-dark:#afb7c0;
  --body-text-light:#545454;
  --blocks:#e6e8ef;
  --modules:#1e1f26;
  --blocks-background:rgba(82, 92, 97, 0.19);
  --font-color:grey;
  --bg-color:hsla(198, 14%, 14%, 0.19);
  --button-bg-color:hsla(198, 14%, 14%, 0.19);
  --button-shadow:inset 5px 5px 20px #0c0b0b,inset -5px -5px 20px hsla(198, 14%, 14%, 0.19)}

@font-face{
font-family:weathertext2;src:url(fonts/verbatim-medium.woff) format("woff")}
@font-face{
font-family:clock;src:url(fonts/clock3-webfont.woff) format("woff")}

body,html{font-size:13px;font-family:Helvetica,Arial,sans-serif;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}
icont{font-weight:600;color:#aaa;}

.grid{display:grid;
  grid-template-columns:repeat(3,1fr);
  grid-column-gap:5px;grid-row-gap:5px;color:#f5f7fc;margin-top:5px;color:#aaa;}
.grid>article{border:1px solid rgba(97,106,114,.3);padding:5px;font-size:.7em;border-radius:4px;-webkit-border-radius:4px;background:0;
  -webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;background:rgba(66, 70, 72, 0.1);color:#aaa;width:230px;height:48px;}


.grid2{display:grid;grid-template-columns:repeat(3,1fr);grid-column-gap:5px;grid-row-gap:5px;color:#aaa;overflow:hidden;margin-top:5px;}
.grid2>article{border:1px solid rgba(97,106,114,.3);padding:5px;font-size:.8em;border-radius:4px;-webkit-border-radius:4px;
background:0;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;background:rgba(66, 70, 72, 0.1);height:145px}


.grid3{display:grid;
  grid-template-columns:repeat(1,1fr);
  grid-column-gap:5px;grid-row-gap:2px;color:#f5f7fc;margin-top:10px;color:#aaa;}
.grid3>article{border:0px solid rgba(97,106,114,.3);padding:5px;font-size:.8em;border-radius:4px;-webkit-border-radius:4px;background:0;
  -webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;background:0;color:#aaa;
  height:152px}


  .theaqiwarning{display:-webkit-box;display:-ms-flexbox;display:flex;width:8rem;height:8.5rem;
    color:var(--body-text-dark);overflow:hidden;font-family:weathertext2;
    line-height:1;border:1px solid hsla(206,12%,27%,.3);border-width:thin;font-size:10px;
    -webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;text-align:center;
    margin-left:-43px;z-index:auto;position:absolute;margin-top:-65px;border-radius:3px;-webkit-border-radius:3px;-moz-border-radius:3px;-ms-border-radius:3px;-o-border-radius:3px;padding:3px}
    .theaqiwarning>blue1{color:var(--blue);font-size:0.8em;position:absolute;top:5px}
     .charttempmodule{margin-top:-45px}

.gridfooter{display:grid;grid-template-columns:repeat(1,1fr);grid-column-gap:5px;grid-row-gap:5px;color:#aaa;overflow:hidden;margin-top:5px}
.gridfooter>article{border:1px solid rgba(97,106,114,.3);padding:5px;font-size:.8em;border-radius:4px;-webkit-border-radius:4px;background:0;-webkit-font-smoothing:antialiased;
-moz-osx-font-smoothing:grayscale;color:#aaa;}
a{color:#aaa;text-decoration:none;font-size:1em;color:#aaa;}
.weather34darkbrowser{position:relative;background:0;width:97%;height:30px;margin:auto;margin-top:-5px;margin-left:0;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:10px}
.weather34darkbrowser[url]:after{content:attr(url);color:#aaa;font-size:10px;position:absolute;left:0;right:0;top:0;padding:4px 15px;margin:11px 10px 0 auto;border-radius:3px;background:rgba(97,106,114,.3);height:20px;box-sizing:border-box}
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
.hardwareimagenano{position:relative;display:flex;margin:0 auto;margin-top:-20px;margin-left:150px}
.ups{position:relative;display:flex;margin:0 auto;margin-top:5px;margin-left:0}
.stationhardware{position:absolute;display:flex;margin-left:120px;margin-top:-20px}
.stationhardware2{position:absolute;display:flex;margin-left:140px;margin-top:-50px}
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

.button-dial-small {
  border-radius: 50%;
  display: flex;
  position:relative;
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
  left:0px;
  text-align: center; 
  background:hsla(214,29%,91%,.0); 
  box-shadow:var(--button-shadow);  
  background-image:linear-gradient(hsla(0,0%,33%,.5) 1px,transparent 1px),linear-gradient(to right,hsla(0,0%,33%,.5) 1px,transparent 1px);
  background-size:5px 5px 
  
}
.button-dial-label-small {
  font-size: 26px;
  position: relative;
  z-index: 10;
  color: grey;
  left:0;top: 0;
  
}
blue{color:var(--blue)}
orange{color:var(--orange)}
green{color:var(--green)}
red{color:var(--red)}
deepred{color:var(--deepred)}
yellow{color:var(--yellow)}
purple{color:var(--purple)}
.aqicon{position:relative;top:-50px;left:170px;}
.humidityfeel{position:relative;top:-10px;left:195px;font-size:12px}
pm25{font-size:8px;color:#aaa;vertical-align: text-top;}
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

</style>
<script src="js/jquery.js"></script>
<div class="weather34darkbrowser" url="Luftdaten Air Quality Sensor Data"></div>
<main class="grid2">
<article>  
<div class=actualt>Air Quality Index (EPA Standard)</div> 
   <div class="button button-dial-small">   
   <div class="button-dial-top-small"></div>
<div class="button-dial-label-small"> 
<?php 
if($aqiweather["aqindex"]>=300){ echo "<purple>".$aqiweather["aqindex"]."</purple>";}
else if($aqiweather["aqindex"] >=250){ echo "<deepred>".$aqiweather["aqindex"]."</deepred>";}
else if($aqiweather["aqindex"] >=150){ echo "<red>".$aqiweather["aqindex"]."</red>";}
else if($aqiweather["aqindex"] >=100){ echo "<orange>".$aqiweather["aqindex"]."</orange>";}
else if($aqiweather["aqindex"] >=50){ echo "<yellow>".$aqiweather["aqindex"]."</yellow>";}
else if($aqiweather["aqindex"] >=0){ echo "<green>".$aqiweather["aqindex"]."</green>";}
?>
</div> </div> </div>

<div class="aqicon"><div class=theaqiwarning><blue1>Health Advice</blue1><br><?php echo $aqicaution?></div></div>
</article> 

<article>  
<div class=actualt>Air Quality <?php echo $aqiweather["aqi-type"]?></div> 
   <div class="button button-dial-small">   
   <div class="button-dial-top-small"></div>
<div class="button-dial-label-small"> 
<?php //pm2.5
if($aqiweather["aqi25"]>=250.4){ echo "<purple>".number_format($aqiweather["aqi25"],0)."</purple>";}
else if($aqiweather["aqi25"] >=199.9){ echo "<deepred>".number_format($aqiweather["aqi25"],0)."</deepred>";}
else if($aqiweather["aqi25"] >=55.4){ echo "<red>".number_format($aqiweather["aqi25"],1)."</red>";}
else if($aqiweather["aqi25"] >35.4){ echo "<orange>".number_format($aqiweather["aqi25"],1)."</orange>";}
else if($aqiweather["aqi25"] >12){ echo "<yellow>".number_format($aqiweather["aqi25"],1)."</yellow>";}
else if($aqiweather["aqi25"] >=0){ echo "<green>".number_format($aqiweather["aqi25"],1)."</green>";}
?>
</div> </div> </div>

<div class="aqicon">
<div class=theaqiwarning><blue1>PM2.5 Particle Info</blue1><br>
PM2.5 is a greater threat to your health .High levels causes severe respiratory problems.
</div></div>

</article> 

</article> 

<article>  
<div class=actualt>Air Quality <?php echo $aqiweather["aqi-type-1"]?></div> 
<div class="button button-dial-small">   
   <div class="button-dial-top-small"></div>
<div class="button-dial-label-small"> 
<?php //pm10
if($aqiweather["aqi10"]>=250.4){ echo "<purple>".number_format($aqiweather["aqi10"],0)."</purple>";}
else if($aqiweather["aqi10"] >=199.9){ echo "<deepred>".number_format($aqiweather["aqi10"],0)."</deepred>";}
else if($aqiweather["aqi10"] >=55.4){ echo "<red>".number_format($aqiweather["aqi10"],1)."</red>";}
else if($aqiweather["aqi10"] >35.4){ echo "<orange>".number_format($aqiweather["aqi10"],1)."</orange>";}
else if($aqiweather["aqi10"] >12){ echo "<yellow>".number_format($aqiweather["aqi10"],1)."</yellow>";}
else if($aqiweather["aqi10"] >=0){ echo "<green>".number_format($aqiweather["aqi10"],1)."</green>";}
?>
</div> </div> </div>

<div class="aqicon">
<div class=theaqiwarning><blue1>PM10 Particle Info</blue1><br>
PM10 particles these can get deep into your lungs causing respiratory problems,lung disease.
</div></div>

</article> 

</main>
<main class="grid3">
<article> 
<iframe  class="charttempmodule" src="weather34charts/todayairqualitychart-luftdaten.php" frameborder="0" scrolling="no" width="749px" height="200px"></iframe>  
</article>
</main>
<main class="grid">
<article>
Air Quality Station:<?php echo $aqiweather["label"] ?>  <br>Last Updated:<blue><?php echo $aqiupdatetime ?></blue>
</article>

<article>
Luftdaten Network: <a href="https://maps.sensor.community/#2/0.0/0.0" target="_blank" data-title="Luftdaten Network Map"> Map</a><br> 
Luftdaten Sensors: <a href="https://sensor.community/en/sensors/" target="_blank" data-title="Sensor Projects"> Sensor Projects</a>
</article>
  
<article >  
<div class="info-2"> 
CSS/SVG/PHP scripts were developed by <a href="https://weather34.com/homeweatherstation" target="_blank" data-title="weather34.com" class="info2a">weather34.com</a> © 2015-<?php echo date('Y');?>..
Data Charts compiled with <a href="https://canvasjs.com/" target="_blank" title="https://canvasjs.com/" alt="https://canvasjs.com/" class="info2a">CanvasJs.com</a> v2.3.1 GA (CC BY-NC 3.0) Non-Commercial-Version. 
</div>
  </article>
</main>