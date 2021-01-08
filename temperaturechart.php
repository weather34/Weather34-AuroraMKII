<?php 
//original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
include('livedata.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weather34 Temperature Charts</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
@font-face{font-family:weathertext2;src:url(css/fonts/verbatim-regular.woff) format("woff"),url(fonts/verbatim-regular.woff2) format("woff2"),url(fonts/verbatim-regular.ttf) format("truetype")}
html,body{font-size:13px;font-family: "weathertext2", Helvetica, Arial, sans-serif;-webkit-font-smoothing: antialiased;	-moz-osx-font-smoothing: grayscale;}
.grid { 
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(180px, 2fr));
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
  grid-template-columns: repeat(auto-fill, minmax(99%, 1fr));
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
padding:5px;font-family:Arial, Helvetica, sans-serif;width:130px;height:0.8em;font-size:0.8rem;padding-top:2px;color:#aaa;
align-items:center;justify-content:center;margin-bottom:5px;top:0;text-transform:capitalize}
.actual{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;
padding:5px;font-family:Arial, Helvetica, sans-serif;width:95%;height:0.8em;font-size:0.8rem;padding-top:2px;color:#aaa;
align-items:center;justify-content:center;margin-bottom:10px;top:0}

.actualg{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:rgba(74, 99, 111, 0.1);
padding:5px;font-family:Arial, Helvetica, sans-serif;width:300px;height:0.8em;font-size:0.8rem;padding-top:2px;color:#aaa;
align-items:center;justify-content:center;margin-bottom:10px;top:0;text-transform:capitalize}
.actualg temp{background:rgba(208, 95, 45, 1.000);padding:2px;-webkit-border-radius:3px;border-radius:3px;color:#fff;margin-right:5px}
.actualg feel{background:rgba(211, 93, 78, 1.000);padding:2px;-webkit-border-radius:3px;border-radius:3px;color:#fff;margin-left:5px}
.actualg dewpoint{background:rgba(6, 162, 177, 1.000);padding:2px;-webkit-border-radius:3px;border-radius:3px;color:#fff}
.actualg wetbulb{background:rgba(241, 107, 79, .8);padding:2px;-webkit-border-radius:3px;border-radius:3px;color:#fff;margin-left:5px}
.mbsmartlogo{position:relative;float:right;top:-15px;}
</style>
<div class="weather34darkbrowser" url="Temperature <?php echo "&deg;",$weather["temp_units"]?>"></div>
  <main class="grid1">
  
   <articlegraph> 
  <div class=actualg><?php echo 'Temperature'." ".strftime('%B',time());?> 
  
  <temp style="background:<?php 
if($tempunit=='F'){
if ($weather['tempmmax']<=41 ){echo '#4ba0ad';}
 else if ($weather['tempmmax']<50 ){echo '#9bbc2f';}
 else if ($weather['tempmmax']<59 ){echo'#e6a141';}
 else if ($weather['tempmmax']<77 ){echo'#ec5732';}
 else if ($weather['tempmmax']<150 ){echo'#d35f50';}}
if ($tempunit=='C') {
if ($weather['tempymax']<=5) {    echo '#4ba0ad';} 
 elseif ($weather['tempmmax']<10) {echo '#9bbc2f';} 
 elseif ($weather['tempmmax']<15) {echo'#e6a141';} 
 elseif ($weather['tempmmax']<25) {echo'#ec5732';} 
 elseif ($weather['tempmmax']<50) {echo'#d35f50';}
 }?>">
  
  <?php echo "Max ",$weather["tempmmax"]." &deg;" ?> 
  </temp><dewpoint><?php echo "Min ",$weather["tempmmin"]." &deg;" ?> </dewpoint></div>   
   
  <iframe  src="weather34charts/monthlytemperaturesmall.php" frameborder="0" scrolling="no" width="100%"></iframe>
   
  </articlegraph> 
  
  <articlegraph> 
  <div class=actualg><?php echo date('Y')." Temperature";?>
  <temp
  style="background:<?php 
if($tempunit=='F'){
if ($weather['tempymax']<=41 ){echo '#4ba0ad';}
 else if ($weather['tempymax']<50 ){echo '#9bbc2f';}
 else if ($weather['tempymax']<59 ){echo'#e6a141';}
 else if ($weather['tempymax']<77 ){echo'#ec5732';}
 else if ($weather['tempymax']<150 ){echo'#d35f50';}}
if ($tempunit=='C') {
if ($weather['tempymax']<=5) {    echo '#4ba0ad';} 
 elseif ($weather['tempymax']<10) {echo '#9bbc2f';} 
 elseif ($weather['tempymax']<15) {echo'#e6a141';} 
 elseif ($weather['tempymax']<25) {echo'#ec5732';} 
 elseif ($weather['tempymax']<50) {echo'#d35f50';}
 }?>">
  
  <?php echo "Max ",$weather["tempymax"]." &deg;" ?> </temp><dewpoint><?php echo "Min ",$weather["tempymin"]." &deg;" ?> </dewpoint>
  
  </div>   
  <iframe  src="weather34charts/yearlytemperaturesmall.php" frameborder="0" scrolling="no" width="100%"></iframe>
   
  </articlegraph> 
  
 
  
  
 <articlegraph style="height:20px">  
  <div class="lotemp">
  <?php echo $info?> 
<a href="https://canvasjs.com" title="https://canvasjs.com" target="_blank" style="font-size:8px;"> Charts <?php echo $creditschart ;?> </a></span>
 
  <?php echo $info?> <a href="https://weather34.com" title="weather34.com" target="_blank" style="font-size:8px;">CSS/SVG/PHP scripts were developed by weather34.com &copy; 2015-<?php echo date('Y');?>
  </a></div>
    <div class="mbsmartlogo"><img src="img/weather34-mbsmart-logo.svg" alt="weather34 mb-smart" title="weather34 mb-smart" width="30px"></div>
  </articlegraph> 
  
</main>