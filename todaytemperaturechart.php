<?php 
	####################################################################################################
	#	CREATED FOR WEATHER34 AURORA MKII TEMPLATE 											   #
	# https://weather34.com/homeweatherstation/index.html 											   # 
	# 	                                                                                               #
	# 	Release December 2020					  	                                                   #
	# 	                                                                                               #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################
//original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
include('livedata.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weather34 Today Temperature Charts</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
@font-face{font-family:weathertext2;src:url(css/fonts/verbatim-regular.woff) format("woff"),url(fonts/verbatim-regular.woff2) format("woff2"),url(fonts/verbatim-regular.ttf) format("truetype")}
html,body{font-size:13px;font-family: "weathertext2", Helvetica, Arial, sans-serif;-webkit-font-smoothing: antialiased;	-moz-osx-font-smoothing: grayscale;}
.grid { 
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(400px, 2fr));
  grid-gap: 5px;
  align-items: stretch;
  color:#f5f7fc;
  
  }
.grid > article {
   border: 1px solid rgba(245, 247, 252,.02);
  box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.6);
  padding:5px;
  font-size:0.8em;
  -webkit-border-radius:4px;
  border-radius:4px;
  background:0;-webkit-font-smoothing: antialiased;	-moz-osx-font-smoothing: grayscale;
}

.grid1 { 
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(340px, 2fr));
  grid-gap: 5px;
  align-items: stretch;
  color:#f5f7fc;
  margin-top:5px
  
  }

.grid1 > articlegraph {
   border: 1px solid rgba(245, 247, 252,.02);
  box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.6);
  padding:5px;
  font-size:0.8em;
  -webkit-border-radius:4px;
  border-radius:4px;
  background:0;-webkit-font-smoothing: antialiased;	-moz-osx-font-smoothing: grayscale;
  height:160px  
}

.grid2 { 
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(99%,1fr));
  grid-gap: 5px;
  align-items: stretch;
  color:#f5f7fc;
  margin-top:5px
  
  }

.grid2 > footer {
   border: 1px solid rgba(245, 247, 252,.02);
  box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.6);
  padding-top:5px;
  padding-right:5px;
  padding-left:5px;
  font-size:0.8em;
  -webkit-border-radius:4px;
  border-radius:4px;
  background:0;-webkit-font-smoothing: antialiased;	-moz-osx-font-smoothing: grayscale;
  height:15px ; 
 
}

 a{color:#aaa;text-decoration:none} 
.weather34darkbrowser{position:relative;background:0;width:96%;height:30px;margin:auto;margin-top:-5px;margin-left:0px;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:10px;}
.weather34darkbrowser[url]:after{content:attr(url);color:#aaa;font-size:10px;position:absolute;left:0;right:0;top:0;padding:4px 15px;margin:11px 10px 0 auto;border-radius:3px;background:rgba(97, 106, 114, 0.3);height:20px;box-sizing:border-box}
 blue{color:#01a4b4}orange{color:#009bb4}orange1{position:relative;color:#009bb4;margin:0 auto;text-align:center;margin-left:5%;font-size:1.1rem}green{color:#aaa}red{color:#f37867}red6{color:#d65b4a}value{color:#fff}yellow{color:#CC0}purple{color:#916392}
blue{color:rgba(0, 154, 171, 1.000)}
.temperaturecontainer1{position:absolute;left:20px;margin-top:-5px;margin-bottom:20px;}.temperaturecontainer2{position:absolute;left:20px;margin-top:60px}
.lotemp{color:#aaa;font-size:0.65rem;}
smalluvunit{font-size:.7rem;font-family:weathertext2,Arial,Helvetica,system;}
.w34convertrain{position:relative;font-size:.5em;top:10px;color:#c0c0c0;margin-left:5px}
.hitempy{position:relative;background:rgba(61, 64, 66, 0.5);color:#aaa;width:90px;padding:1px;-webit-border-radius:2px;border-radius:2px;
margin-top:-20px;margin-left:92px;padding-left:3px;line-height:11px;font-size:9px}
.actualt{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:rgba(74, 99, 111, 0.1);
padding:5px;font-family:Arial, Helvetica, sans-serif;width:360px;height:0.8em;font-size:0.8rem;padding-top:2px;color:#aaa;
align-items:center;justify-content:center;margin-bottom:10px;top:0;text-transform:capitalize}
.actualt temp{background:rgba(208, 95, 45, 1.000);padding:2px;-webkit-border-radius:3px;border-radius:3px;color:#fff;margin-right:5px}
.actualt feel{background:rgba(211, 93, 78, 1.000);padding:2px;-webkit-border-radius:3px;border-radius:3px;color:#fff;margin-left:5px}
.actualt dewpoint{background:rgba(6, 162, 177, 1.000);padding:2px;-webkit-border-radius:3px;border-radius:3px;color:#fff}
.actualt wetbulb{background:rgba(241, 107, 79, .8);padding:2px;-webkit-border-radius:3px;border-radius:3px;color:#fff;margin-left:5px}
.actual{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;
padding:5px;font-family:Arial, Helvetica, sans-serif;width:95%;height:0.8em;font-size:0.8rem;padding-top:2px;color:#aaa;
align-items:center;justify-content:center;margin-bottom:10px;top:0}
.mbsmartlogo{position:relative;float:right;top:-15px;}
</style>
<div class="weather34darkbrowser" url="Temperature Today<?php echo "&deg;",$weather["temp_units"]?>"></div>
  <main class="grid1">
  
  <articlegraph> 
  <div class=actualt>
  <temp style="background:<?php 
if($tempunit=='F'){
if ($weather['temp_today_high']<=41 ){echo '#4ba0ad';}
 else if ($weather['temp_today_high']<50 ){echo '#9bbc2f';}
 else if ($weather['temp_today_high']<59 ){echo'#e6a141';}
 else if ($weather['temp_today_high']<77 ){echo'#ec5732';}
 else if ($weather['temp_today_high']<150 ){echo'#d35f50';}}
if ($tempunit=='C') {
if ($weather['temp_today_high']<=5) {    echo '#4ba0ad';} 
 elseif ($weather['temp_today_high']<10) {echo '#9bbc2f';} 
 elseif ($weather['temp_today_high']<15) {echo'#e6a141';} 
 elseif ($weather['temp_today_high']<25) {echo'#ec5732';} 
 elseif ($weather['temp_today_high']<50) {echo'#d35f50';}
 }?>"> 
<?php echo "Max ",$weather["temp_today_high"]."&deg;"?> </temp> 
  
  
  <dewpoint><?php echo "Min ",$weather["temp_today_low"]."&deg;"?> </dewpoint>
  
  
  <feel style="background:<?php 
 if ($weather['realfeel']<=5 ){echo '#4ba0ad';}
 else if ($weather['realfeel']<10 ){echo '#9bbc2f';}
 else if ($weather['realfeel']<15 ){echo'#e6a141';}
 else if ($weather['realfeel']<25 ){echo'#ec5732';}
 else if ($weather['realfeel']<50 ){echo'#d35f50';}?>">
Feels Like
  
  
  
  
  </feel>     
  </div>  
  <iframe  src="weather34charts/todaytempmedium.php" frameborder="0" scrolling="no" width="100%"></iframe>
   
  </articlegraph> 
  <articlegraph> 
  <div class=actualt>
  <temp style="background:<?php 
if($tempunit=='F'){
if ($weather['dewmax']<=41 ){echo '#4ba0ad';}
 else if ($weather['dewmax']<50 ){echo '#9bbc2f';}
 else if ($weather['dewmax']<59 ){echo'#e6a141';}
 else if ($weather['dewmax']<77 ){echo'#ec5732';}
 else if ($weather['dewmax']<150 ){echo'#d35f50';}}
if ($tempunit=='C') {
if ($weather['dewmax']<=5) {    echo '#4ba0ad';} 
 elseif ($weather['dewmax']<10) {echo '#9bbc2f';} 
 elseif ($weather['dewmax']<15) {echo'#e6a141';} 
 elseif ($weather['dewmax']<25) {echo'#ec5732';} 
 elseif ($weather['dewmax']<50) {echo'#d35f50';}
 }?>"> 
  Dewpoint<?php echo "Max ",$weather["dewmax"]."&deg;"?> </temp> 


  <dewpoint>Dewpoint<?php echo "Min ",$weather["dewmin"]."&deg;"?> </dewpoint>  


  </span></blue></div>  
  <iframe  src="weather34charts/todaydewmedium.php" frameborder="0" scrolling="no" width="100%"></iframe>   
  </articlegraph> 
  
    
  <articlegraph> 
  <div class=actualt></span>
  
  <temp>Humidity <?php echo "Max ",$weather["humidity_max"]."%"?> </temp> 
  <dewpoint>Humidity <?php echo "Min ",$weather["humidity_min"]."%"?> </dewpoint> 
  
  </div>  
  <iframe  src="weather34charts/todayhumiditymedium.php" frameborder="0" scrolling="no" width="100%"></iframe>
   
  </articlegraph> 
  
   <articlegraph> 
  <div class=actualt><dewpoint>Cloudbase</dewpoint> ft</smalluvunit></span></div>  
  <iframe  src="weather34charts/todaycloudbasemedium.php" frameborder="0" scrolling="no" width="100%"></iframe>
   
  </articlegraph> 
  </main>
  <main class="grid2">
  <footer style="height:20px;"> 
  <div class="lotemp">
  <?php echo $info?> 
<a href="https://canvasjs.com" title="https://canvasjs.com" target="_blank" style="font-size:8px;"> Charts <?php echo $creditschart ;?> </a></span>&nbsp;
  
  <?php echo $info?> <a href="https://weather34.com" title="weather34.com" target="_blank" style="font-size:8px;">CSS/SVG/PHP scripts were developed by weather34.com  2015-<?php echo date('Y');?>
  </a></div>
   <div class="mbsmartlogo"><img src="img/weather34-mbsmart-logo.svg" alt="weather34 mb-smart" title="weather34 mb-smart" width="20px"></div>
  </footer> 
  
</main>