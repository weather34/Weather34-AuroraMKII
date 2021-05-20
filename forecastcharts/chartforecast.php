<?php header('Content-Type: text/html; charset=utf-8');include_once('updaterwu.php');include('wudata.php');?>
<!DOCTYPE html><html><head>
<title> Weather34 Forecast <?php echo $stationName?></title>
<meta charset="UTF-8">
<meta name="title" content="Weather34 Forecast <?php echo $stationName?>">
<meta name="description" content="Weather34 Forecast <?php echo $stationName?>">
<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=yes">
<meta name="mobile-web-app-capable" content="yes">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">
<meta name="msapplication-TileColor" content="#f8f8f8"> 
<link href="../console-dark.css?version=<?php echo filemtime('../console-dark.css')?>" rel="stylesheet prefetch">
<link rel="preload" href="../fonts/clock3-webfont.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="../fonts/verbatim-regular.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="../fonts/verbatim-medium.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="../fonts/verbatim-bold.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="../fonts/HelveticaNeue-Medium.woff2" as="font" type="font/woff2" crossorigin>
<style>
@font-face {font-family: clock;src: url(../fonts/clock3-webfont.woff2) format("woff2"), url(../fonts/clock3-webfont.woff) format("woff");font-display: swap}
@font-face {font-family: weathertext3; src: url(../fonts/verbatim-regular.woff2) format("woff2"), url(../fonts/verbatim-regular.woff) format("woff");font-display: swap}
@font-face {font-family: weathertext2;src: url(../fonts/verbatim-medium.woff2) format("woff2"), url(../fonts/verbatim-medium.woff) format("woff");font-display: swap}
@font-face {font-family: headingtext;src: url(../fonts/HelveticaNeue-Medium.woff2) format("woff2"), url(../fonts/HelveticaNeue-Medium.woff) format("woff");font-display: swap}
@font-face {font-family: verb;src: url(../fonts/verbatim-bold.woff2) format("woff2"), url(../fonts/verbatim-bold.woff) format("woff");font-display: swap}
body,html{font-family:verb,Helvetica,Arial,sans-serif;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;}
.weather34-aurora a{background:none;}
actualt{position:relative;font-size:11px;left:20px;top:-50px;}
greydesc{display:block;left:-20px;margin-top:-15px;position:relative;font-size:11px;line-height:1;
max-width:max-content;font-family:verb;padding-right:15px}
tempvalue{margin-left:-10px;top:45px;position:absolute;font-size:28px;font-family:verb}
extradata{display:block;left:-90px;top:30px;position:relative;font-size:10px;font-family:verb;width:450px}
iconpos{position:relative;padding-left:5px;left:70px;margin-top:-80px}
img{width:60px}
.weather34-battery a {background:none;width:25px}
.weather34-battery img {background:none;width:25px}
.online{padding-top:5px}
.desktoplink5{color:#99B1C9}
@media screen and (max-width:960px){
actualt{position:relative;font-size:10px;left:20px;top:-55px;}
greydesc{position:relative;top:15px;font-size:10px;margin-left:-35px;max-width:max-content;padding:5px}
tempvalue{position:relative;top:-55px;font-size:22px;margin-left:110px;}
extradata{margin-left:-135px;top:25px;font-size:9px;font-family:verb;width:200px;padding:5px}
iconpos{position:relative;padding-left:0px;;margin-left:0px;top:-10px}
.online{padding-top:5px}
img{width:60px}}
@media screen and (max-width:640px){
.desktoplink5{display:none}
.online{padding-top:12px}
img{width:60px}}
</style>
</head>
<body>
<!-- weather34 grid flex layout -->
<div class="weather34-tablet">
<div class="fade-in">
<div class="container">
<div class="nav-top">   
<div class="weather34-indoor"><?php echo $timeicon?> <div id="weather34clock4"></div>
<div class="desktoplink5" ><?php echo $headerlocation?> Forecast Data For <?php echo $stationName?></div></div>
<div class="online"><?php if(file_exists($livedata)&&time()- filemtime($livedata)>300)echo $wirelessoffline;else echo $wireless?></div>
</div>

  <ul class="grid-container-forecast">  
  <li55>
  <actualt><?php echo $wuskydayTime ?></actualt>
  <iconpos>
  <a href="#" data-title="<?php echo $wuskydesc?>">
  <?php //Icon forecast 		  
	if ($wuskydaynight=='D'){echo '<img src="../wuicons/'.$wuskydayIcon.'.svg?ver=7" ></img>';}
	if ($wuskydaynight=='N'){echo '<img src="../wuicons/nt_'.$wuskydayIcon.'.svg?ver=7" ></img>';}
  ?></a>
  </iconpos>

<tempvalue style="color:
<?php //TEMPERATURE
if($tempunit=='F'){
if($wuskydayTempHigh <=41){echo "hsla(185, 100%, 37%, 1)";}
else if($wuskydayTempHigh>=95){echo "hsl(4, 40%, 48%)";}
else if($wuskydayTempHigh>=80.6){echo "hsl(2, 56%, 55%)";}
else if($wuskydayTempHigh>=75.2){echo "hsl(19, 66%, 55%)";}
else if($wuskydayTempHigh>=68){echo "#F88D01";}
else if($wuskydayTempHigh>=59){echo "hsl(35, 77%, 58%)";}			  
else if($wuskydayTempHigh>41){echo "hsl(74, 60%, 46%)";}}

if($tempunit=='C'){
if($wuskydayTempHigh <=5){echo "hsla(185, 100%, 37%, 1)";}
	else if($wuskydayTempHigh>=35){echo "hsl(4, 40%, 48%)";}
	else if($wuskydayTempHigh>=27){echo "hsl(2, 56%, 55%)";}
	else if($wuskydayTempHigh>=24){echo "hsl(19, 66%, 55%)";}
	else if($wuskydayTempHigh>=20){echo "#F88D01";}
	else if($wuskydayTempHigh>=15){echo "hsl(35, 77%, 58%)";}			  
	else if($wuskydayTempHigh>5){echo "hsl(74, 60%, 46%)";}}?>
	">  
<?php echo number_format($wuskydayTempHigh,0);echo"°";?></tempvalue>



<extradata>
<?php //RAIN
echo "Rain ";if ($wuskydayprecipIntensity>0)echo "<blue>";echo number_format($wuskydayprecipIntensity,2);echo "</blue> ".$rainunit;?><br>
<?php //WIND
if ($wuskydayWinddircardinal=='N'){$wuskydayWinddircardinal='<blue>North</blue>';}
if ($wuskydayWinddircardinal=='NE'){$wuskydayWinddircardinal='<blue>NE</blue>';}
if ($wuskydayWinddircardinal=='ENE'){$wuskydayWinddircardinal='<blue>ENE</blue>';}
if ($wuskydayWinddircardinal=='NNW'){$wuskydayWinddircardinal='<blue>NNW</blue>';}
if ($wuskydayWinddircardinal=='NWN'){$wuskydayWinddircardinal='<blue>NWN</blue>';}
if ($wuskydayWinddircardinal=='NW'){$wuskydayWinddircardinal='<blue>NW</blue>';}
if ($wuskydayWinddircardinal=='E'){$wuskydayWinddircardinal='<yellow>East</yellow>';}
if ($wuskydayWinddircardinal=='SE'){$wuskydayWinddircardinal='<yellow>SE</yellow>';}
if ($wuskydayWinddircardinal=='ESE'){$wuskydayWinddircardinal='<yellow>ESE</yellow>';}
if ($wuskydayWinddircardinal=='SSE'){$wuskydayWinddircardinal='<yellow>SSE</yellow>';}
if ($wuskydayWinddircardinal=='SW'){$wuskydayWinddircardinal='<orange>SW</orange>';}
if ($wuskydayWinddircardinal=='SSW'){$wuskydayWinddircardinal='<orange>SSW</orange>';}
if ($wuskydayWinddircardinal=='S'){$wuskydayWinddircardinal='<orange>South</orange>';}
if ($wuskydayWinddircardinal=='WSW'){$wuskydayWinddircardinal='<red>WSW</red>';}
if ($wuskydayWinddircardinal=='W'){$wuskydayWinddircardinal='<red>West</red>';}
if ($wuskydayWinddircardinal=='WNW'){$wuskydayWinddircardinal='<red>WNW</red>';}
echo "Wind ";
if ($wuskydayWindGust>40)echo "<red>". number_format($wuskydayWindGust,0)."</red>";
else if ($wuskydayWindGust>20)echo "<orange>". number_format($wuskydayWindGust,0)."</orange>";
else if ($wuskydayWindGust>20)echo "<yellow>". number_format($wuskydayWindGust,0)."</yellow>";
else if ($wuskydayWindGust>=0)echo "<green>". number_format($wuskydayWindGust,0)."</green>";
echo " ".$windunit;echo " ".$wuskydayWinddircardinal;?><br>
<?php //UVINDEX
if ($wuskydayUV>0){
echo "UVINDEX ";
if ($wuskydayUV>10)echo "<purple>". number_format($wuskydayUV,0)."</purple><br>";
else if ($wuskydayUV>=8)echo "<red>". number_format($wuskydayUV,0)."</red><br>";
else if ($wuskydayUV>=5)echo "<orange>". number_format($wuskydayUV,0)."</orange><br>";
else if ($wuskydayUV>=3)echo "<yellow'>". number_format($wuskydayUV,0)."</yellow><br>";
else if ($wuskydayUV>0)echo "<green>". number_format($wuskydayUV,0)."</green><br>";}
?>
<?php //HUMIDITY
echo "Humidity ";
if ($wuskyhumidity>=70)echo "<blue>". number_format($wuskyhumidity,0)."</blue>%<br>";
else if ($wuskyhumidity>=60)echo "<yellow>". number_format($wuskyhumidity,0)."</yellow>%<br>";
else if ($wuskyhumidity>=40)echo "<green>". number_format($wuskyhumidity,0)."</green>%<br>";
else if ($wuskyhumidity>=0)echo "<red>". number_format($wuskyhumidity,0)."</red>%<br>";
?>
<?php //SNOW
if ($wuskydaysnow>0)echo "Snow <blue>".$wuskydaysnow." </blue>cm";
?>
<?php //HEAT INDEX
if ($tempunit=="F" && $wuskyheatindex>90)echo "Heat Index <red>".number_format($wuskyheatindex,0)."</red>°<br>";
if ($tempunit=="C" && $wuskyheatindex>28)echo "Heat Index <red>".number_format($wuskyheatindex,0)."</red>°<br>";
?>
<?php //THUNDERSTORM
if ($wuskythunder>=3)echo "Thunderstorm <red>Risk</red>";
else if ($wuskythunder>=2)echo "Thunderstorm <orange>Risk</orange>";
else if ($wuskythunder>0)echo "Thunderstorm <yellow>Risk</yellow>";
?>
</extradata>
<greydesc><?php echo $wuskydaysummary;?></greydesc>
  </li55>

  <li55>
  <actualt><?php echo $wuskydayTime1 ?></actualt>
  <iconpos><a href="#" data-title="<?php echo $wuskydesc1?>">
  <?php //Icon forecast  	    		  			  
	if ($wuskydaynight1=='D'){echo '<img src="../wuicons/'.$wuskydayIcon1.'.svg?ver=7"></img>';}
	if ($wuskydaynight1=='N'){echo '<img src="../wuicons/nt_'.$wuskydayIcon1.'.svg?ver=7"></img>';}
  ?></a></iconpos>

<tempvalue style="color:
<?php //TEMPERATURE
if($tempunit=='F'){
if($wuskydayTempHigh1 <=41){echo "hsla(185, 100%, 37%, 1)";}
else if($wuskydayTempHigh1>=95){echo "hsl(4, 40%, 48%)";}
else if($wuskydayTempHigh1>=80.6){echo "hsl(2, 56%, 55%)";}
else if($wuskydayTempHigh1>=75.2){echo "hsl(19, 66%, 55%)";}
else if($wuskydayTempHigh1>=68){echo "#F88D01";}
else if($wuskydayTempHigh1>=59){echo "hsl(35, 77%, 58%)";}			  
else if($wuskydayTempHigh1>41){echo "hsl(74, 60%, 46%)";}}

if($tempunit=='C'){
if($wuskydayTempHigh1 <=5){echo "hsla(185, 100%, 37%, 1)";}
	else if($wuskydayTempHigh1>=35){echo "hsl(4, 40%, 48%)";}
	else if($wuskydayTempHigh1>=27){echo "hsl(2, 56%, 55%)";}
	else if($wuskydayTempHigh1>=24){echo "hsl(19, 66%, 55%)";}
	else if($wuskydayTempHigh1>=20){echo "#F88D01";}
	else if($wuskydayTempHigh1>=15){echo "hsl(35, 77%, 58%)";}			  
	else if($wuskydayTempHigh1>5){echo "hsl(74, 60%, 46%)";}}?>
	">  
<?php echo number_format($wuskydayTempHigh1,0);echo "°";?></tempvalue>

<extradata>
<?php //RAIN
echo "Rain ";if ($wuskydayprecipIntensity1>0)echo "<blue>";echo number_format($wuskydayprecipIntensity1,2);echo "</blue> ".$rainunit;?><br>
<?php  //WIND
if ($wuskydayWinddircardinal1=='N'){$wuskydayWinddircardinal1='<blue>North</blue>';}
if ($wuskydayWinddircardinal1=='NE'){$wuskydayWinddircardinal1='<blue>NE</blue>';}
if ($wuskydayWinddircardinal1=='ENE'){$wuskydayWinddircardinal1='<blue>ENE</blue>';}
if ($wuskydayWinddircardinal1=='NNW'){$wuskydayWinddircardinal1='<blue>NNW</blue>';}
if ($wuskydayWinddircardinal1=='NWN'){$wuskydayWinddircardinal1='<blue>NWN</blue>';}
if ($wuskydayWinddircardinal1=='NW'){$wuskydayWinddircardinal1='<blue>NW</blue>';}
if ($wuskydayWinddircardinal1=='E'){$wuskydayWinddircardinal1='<yellow>East</yellow>';}
if ($wuskydayWinddircardinal1=='SE'){$wuskydayWinddircardinal1='<yellow>SE</yellow>';}
if ($wuskydayWinddircardinal1=='ESE'){$wuskydayWinddircardinal1='<yellow>ESE</yellow>';}
if ($wuskydayWinddircardinal1=='SSE'){$wuskydayWinddircardinal1='<yellow>SSE</yellow>';}
if ($wuskydayWinddircardinal1=='SW'){$wuskydayWinddircardinal1='<orange>SW</orange>';}
if ($wuskydayWinddircardinal1=='SSW'){$wuskydayWinddircardinal1='<orange>SSW</orange>';} 
if ($wuskydayWinddircardinal1=='S'){$wuskydayWinddircardinal1='<orange>South</orange>';}
if ($wuskydayWinddircardinal1=='WSW'){$wuskydayWinddircardinal1='<red>WSW</red>';}
if ($wuskydayWinddircardinal1=='W'){$wuskydayWinddircardinal1='<red>West</red>';}
if ($wuskydayWinddircardinal1=='WNW'){$wuskydayWinddircardinal1='<red>WNW</red>';}
echo "Wind ";
if ($wuskydayWindGust1>40)echo "<red>". number_format($wuskydayWindGust1,0)."</red>";
else if ($wuskydayWindGust1>20)echo "<orange>". number_format($wuskydayWindGust1,0)."</orange>";
else if ($wuskydayWindGust1>20)echo "<yellow>". number_format($wuskydayWindGust1,0)."</yellow>";
else if ($wuskydayWindGust1>=0)echo "<green>". number_format($wuskydayWindGust1,0)."</green>";
echo " ".$windunit;echo " ".$wuskydayWinddircardinal1;?><br>
<?php //UVINDEX
if ($wuskydayUV1>0){
echo "UVINDEX ";
if ($wuskydayUV>10)echo "<purple>". number_format($wuskydayUV1,0)."</purple><br>";
else if ($wuskydayUV1>=8)echo "<red>". number_format($wuskydayUV1,0)."</red><br>";
else if ($wuskydayUV1>=5)echo "<orange>". number_format($wuskydayUV1,0)."</orange><br>";
else if ($wuskydayUV1>=3)echo "<yellow'>". number_format($wuskydayUV1,0)."</yellow><br>";
else if ($wuskydayUV1>0)echo "<green>". number_format($wuskydayUV1,0)."</green><br>";}
?>
<?php 
//HUMIDITY
echo "Humidity ";
if ($wuskyhumidity1>=70)echo "<blue>". number_format($wuskyhumidity1,0)."</blue>%<br>";
else if ($wuskyhumidity1>=60)echo "<yellow>". number_format($wuskyhumidity1,0)."</yellow>%<br>";
else if ($wuskyhumidity1>=40)echo "<green>". number_format($wuskyhumidity1,0)."</green>%<br>";
else if ($wuskyhumidity1>=0)echo "<red>". number_format($wuskyhumidity1,0)."</red>%<br>";?>
<?php //HEAT INDEX
if ($tempunit=="F" && $wuskyheatindex1>90)echo "Heat Index <red>".number_format($wuskyheatindex1,0)."</red>°<br>";
if ($tempunit=="C" && $wuskyheatindex1>28)echo "Heat Index <red>".number_format($wuskyheatindex1,0)."</red>°<br>";
?>
<?php //SNOW
if ($wuskydaysnow1>0)echo "Snow <blue>".$wuskydaysnow1." </blue>cm";
?>
<?php //THUNDERSTORM
if ($wuskythunder1>=3)echo "Thunderstorm <red>Risk</red>";
else if ($wuskythunder1>=2)echo "Thunderstorm <orange>Risk</orange>";
else if ($wuskythunder1>0)echo "Thunderstorm <yellow>Risk</yellow>";
?>
</extradata>
<greydesc><?php echo $wuskydaysummary1;?></greydesc>
  </li55>

  <li55>
      <?php if ($tempunit == 'F'){;?>    
      <iframe  src="daytempforecast34f.php" frameborder="0" scrolling="no" width="100%" height="100%"></iframe>
      <?php ;}?>    
      <?php if ($tempunit == 'C'){;?>    
      <iframe  src="daytempforecast34.php" frameborder="0" scrolling="no" width="100%" height="100%"></iframe>
      <?php ;}?>    
    </li55> 

    <?php if  ($windunit == 'mph') {;?>
    <li55><iframe  src="daywindforecast34mph.php" frameborder="0" scrolling="no" width="100%" height="100%"></iframe></li55>  
    <?php ;}?>
    <?php if  ($windunit == 'km/h') {;?>
    <li55><iframe  src="daywindforecast34.php" frameborder="0" scrolling="no" width="100%" height="100%"></iframe></li55>  
    <?php ;}?>
    <?php if  ($windunit == 'kts') {;?>
    <li55><iframe  src="daywindforecast34kts.php" frameborder="0" scrolling="no" width="100%" height="100%"></iframe></li55>  
    <?php ;}?>
    <?php if  ($windunit == 'm/s') {;?>
    <li55><iframe  src="daywindforecast34ms.php" frameborder="0" scrolling="no" width="100%" height="100%"></iframe></li55>  
    <?php ;}?>    

    <li55><iframe  src="dayrainforecast34.php" frameborder="0" scrolling="no" width="100%" height="100%"></iframe></li55>

    <?php if ($wuskydaysnow2>0 || $wuskydaysnow3>0 || $wuskydaysnow4>0 || $wuskydaysnow5>0 || $wuskydaysnow6>0 || $wuskydaysnow7>0 || $wuskydaysnow8>0 || $wuskydaysnow9>0 || $wuskydaysnow10>0 )
{echo '<li55><iframe  src="daysnowforecast34.php" frameborder="0" scrolling="no" width="100%" height="100%"></iframe></li55>' ;}    
else if ($wuskythunder2>0 || $wuskythunder3>0 || $wuskythunder4>0 || $wuskythunder5>0 || $wuskythunder6>0 || $wuskythunder7>0 || $wuskythunder8>0 || $wuskythunder9>0 || $wuskythunder10>0)
{echo '<li55><iframe  src="daythunderforecast34.php" frameborder="0" scrolling="no" width="100%" height="100%"></iframe></li55> ';}    
else echo '<li55><iframe  src="dayuvforecast34.php" frameborder="0" scrolling="no" width="100%" height="100%"></iframe></li55>';?>   

    <li555><iframe  src="outlookwu.php" frameborder="0" scrolling="no" width="100%" height="100%"></iframe></li555>        
  </ul>
</div>
<div class="nav-bottom" >
&nbsp; <a href="../index.php" data-title="Back to Dashboard"><?php echo $adjust?><icontext>Home</icontext></a>  
<a href="../outlookwutext.php" data-lity data-title="5 day Forecast Summary"><?php echo $weather34foretxt1?></a>
<a href="chartforecast.php" alt="refresh this dashboard " data-title="Refresh"><?php echo $weather34refr?></a>
<chartpage>Forecast Updated <?php $forecastime=filemtime('../jsondata/wuforecast.txt');echo date('jS M g:i a',$forecastime);?></chartpage>
<weather34-rightfootericonscharts>
<div class="weather34-battery"><a  href="../info.html" data-lity> <img src="../images/weather34-icon-small.png" width="20px" ></a></div>
</div></body></html>

<?php //weather34 clean notifications 
$wuskydayTime3=str_replace("Mon", "Monday", $wuskydayTime3);
$wuskydayTime4=str_replace("Mon", "Monday", $wuskydayTime4);
$wuskydayTime5=str_replace("Mon", "Monday", $wuskydayTime5);
$wuskydayTime6=str_replace("Mon", "Monday", $wuskydayTime6);
$wuskydayTime7=str_replace("Mon", "Monday", $wuskydayTime7);
$wuskydayTime8=str_replace("Mon", "Monday", $wuskydayTime8);
$wuskydayTime9=str_replace("Mon", "Monday", $wuskydayTime9);
$wuskydayTime10=str_replace("Mon", "Monday", $wuskydayTime10);

$wuskydayTime3=str_replace("Tue", "Tuesday", $wuskydayTime3);
$wuskydayTime4=str_replace("Tue", "Tuesday", $wuskydayTime4);
$wuskydayTime5=str_replace("Tue", "Tuesday", $wuskydayTime5);
$wuskydayTime6=str_replace("Tue", "Tuesday", $wuskydayTime6);
$wuskydayTime7=str_replace("Tue", "Tuesday", $wuskydayTime7);
$wuskydayTime8=str_replace("Tue", "Tuesday", $wuskydayTime8);
$wuskydayTime9=str_replace("Tue", "Tuesday", $wuskydayTime9);
$wuskydayTime10=str_replace("Tue", "Tuesday", $wuskydayTime10);

$wuskydayTime3=str_replace("Wed", "Wednesday", $wuskydayTime3);
$wuskydayTime4=str_replace("Wed", "Wednesday", $wuskydayTime4);
$wuskydayTime5=str_replace("Wed", "Wednesday", $wuskydayTime5);
$wuskydayTime6=str_replace("Wed", "Wednesday", $wuskydayTime6);
$wuskydayTime7=str_replace("Wed", "Wednesday", $wuskydayTime7);
$wuskydayTime8=str_replace("Wed", "Wednesday", $wuskydayTime8);
$wuskydayTime9=str_replace("Wed", "Wednesday", $wuskydayTime9);
$wuskydayTime10=str_replace("Wed", "Wednesday", $wuskydayTime10);

$wuskydayTime3=str_replace("Thu", "Thursday", $wuskydayTime3);
$wuskydayTime4=str_replace("Thu", "Thursday", $wuskydayTime4);
$wuskydayTime5=str_replace("Thu", "Thursday", $wuskydayTime5);
$wuskydayTime6=str_replace("Thu", "Thursday", $wuskydayTime6);
$wuskydayTime7=str_replace("Thu", "Thursday", $wuskydayTime7);
$wuskydayTime8=str_replace("Thu", "Thursday", $wuskydayTime8);
$wuskydayTime9=str_replace("Thu", "Thursday", $wuskydayTime9);
$wuskydayTime10=str_replace("Thu", "Thursday", $wuskydayTime10);

$wuskydayTime3=str_replace("Fri", "Friday", $wuskydayTime3);
$wuskydayTime4=str_replace("Fri", "Friday", $wuskydayTime4);
$wuskydayTime5=str_replace("Fri", "Friday", $wuskydayTime5);
$wuskydayTime6=str_replace("Fri", "Friday", $wuskydayTime6);
$wuskydayTime7=str_replace("Fri", "Friday", $wuskydayTime7);
$wuskydayTime8=str_replace("Fri", "Friday", $wuskydayTime8);
$wuskydayTime9=str_replace("Fri", "Friday", $wuskydayTime9);
$wuskydayTime10=str_replace("Fri", "Friday", $wuskydayTime10);

$wuskydayTime3=str_replace("Sat", "Saturday", $wuskydayTime3);
$wuskydayTime4=str_replace("Sat", "Saturday", $wuskydayTime4);
$wuskydayTime5=str_replace("Sat", "Saturday", $wuskydayTime5);
$wuskydayTime6=str_replace("Sat", "Saturday", $wuskydayTime6);
$wuskydayTime7=str_replace("Sat", "Saturday", $wuskydayTime7);
$wuskydayTime8=str_replace("Sat", "Saturday", $wuskydayTime8);
$wuskydayTime9=str_replace("Sat", "Saturday", $wuskydayTime9);
$wuskydayTime10=str_replace("Sat", "Saturday", $wuskydayTime10);

$wuskydayTime3=str_replace("Sun", "Sunday", $wuskydayTime3);
$wuskydayTime4=str_replace("Sun", "Sunday", $wuskydayTime4);
$wuskydayTime5=str_replace("Sun", "Sunday", $wuskydayTime5);
$wuskydayTime6=str_replace("Sun", "Sunday", $wuskydayTime6);
$wuskydayTime7=str_replace("Sun", "Sunday", $wuskydayTime7);
$wuskydayTime8=str_replace("Sun", "Sunday", $wuskydayTime8);
$wuskydayTime9=str_replace("Sun", "Sunday", $wuskydayTime9);
$wuskydayTime10=str_replace("Sun", "Sunday", $wuskydayTime10);

$wuskydayTime1=str_replace("TM Night","Tomorrow Night",$wuskydayTime1);
$wuskydayTime2=str_replace("TM Night","Tomorrow Night",$wuskydayTime2);
$wuskydayTime3=str_replace("TM Night","Tomorrow Night",$wuskydayTime3);	

//snow
if ($wuskydaysnow>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Snow <icon-26-30>".$freezing."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime."</blue><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}
  else if ($wuskydaysnow1>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Snow <icon-26-30>".$freezing."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime1."</blue><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}
  else if ($wuskydaysnow2>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Snow <icon-26-30>".$freezing."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime2."</blue><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}
  else if ($wuskydaysnow3>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Snow <icon-26-30>".$freezing."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime3."</blue><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}
  else if ($wuskydaysnow4>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Snow <icon-26-30>".$freezing."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime4."</blue><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}        
  else if ($wuskydaysnow5>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Snow <icon-26-30>".$freezing."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime5."</blue><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}
  else if ($wuskydaysnow6>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Snow <icon-26-30>".$freezing."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime6."</blue><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}
  else if ($wuskydaysnow7>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
   <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Snow <icon-26-30>".$freezing."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime7."</blue><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}
  else if ($wuskydaysnow8>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Snow <icon-26-30>".$freezing."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime8."</blue><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}
  else if ($wuskydaysnow9>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Snow <icon-26-30>".$freezing."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime9."</blue><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}
   else if ($wuskydaysnow10>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Snow <icon-26-30>".$freezing."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime10."</blue><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}


//thunderstorm
else if ($wuskythunder>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Thunderstorm <icon-26-30>".$lightningalert4."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><orange>".$wuskydayTime."</orange><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}
  else if ($wuskythunder1>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Thunderstorm <icon-26-30>".$lightningalert4."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><orange>".$wuskydayTime1."</orange><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}
  else if ($wuskythunder2>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Thunderstorm <icon-26-30>".$lightningalert4."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><orange>".$wuskydayTime2."</orange><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}
  else if ($wuskythunder3>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Thunderstorm <icon-26-30>".$lightningalert4."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><orange>".$wuskydayTime3."</orange><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}
  else if ($wuskythunder4>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Thunderstorm <icon-26-30>".$lightningalert4."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><orange>".$wuskydayTime4."</orange><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}        
  else if ($wuskythunder5>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Thunderstorm <icon-26-30>".$lightningalert4."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><orange>".$wuskydayTime5."</orange><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}
  else if ($wuskythunder6>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Thunderstorm <icon-26-30>".$lightningalert4."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><orange>".$wuskydayTime6."</orange><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}
  else if ($wuskythunder7>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
   <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Thunderstorm <icon-26-30>".$lightningalert4."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><orange>".$wuskydayTime7."</orange><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}
  else if ($wuskythunder8>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Thunderstorm <icon-26-30>".$lightningalert4."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><orange>".$wuskydayTime8."</orange><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}
  else if ($wuskythunder9>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Thunderstorm <icon-26-30>".$lightningalert4."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><orange>".$wuskydayTime9."</orange><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}
   else if ($wuskythunder10>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Thunderstorm <icon-26-30>".$lightningalert4."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><orange>".$wuskydayTime10."</orange><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}     

//rain
else if ($wuskydayprecipIntensity>0 ){echo "
<div class='weather34alert' id='weather34message'> 
<div class='weather34-notification'> 
<weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
<weather34-alertmessage>Expect Rain <icon-26-30>".$weather34_rain_icon."</icon-26-30></weather34-alertmessage> <br>
<weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime."</blue><weather34-alertunit> </weather34-alertunit>
</weather34-alertvalue></div></div>";}
else if ($wuskydayprecipIntensity1>0 ){echo "
<div class='weather34alert' id='weather34message'> 
<div class='weather34-notification'> 
<weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
<weather34-alertmessage>Expect Rain <icon-26-30>".$weather34_rain_icon."</icon-26-30></weather34-alertmessage> <br>
<weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime1."</blue><weather34-alertunit> </weather34-alertunit>
</weather34-alertvalue></div></div>";}
else if ($wuskydayprecipIntensity2>0 ){echo "
<div class='weather34alert' id='weather34message'> 
<div class='weather34-notification'> 
<weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
<weather34-alertmessage>Expect Rain <icon-26-30>".$weather34_rain_icon."</icon-26-30></weather34-alertmessage> <br>
<weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime2."</blue><weather34-alertunit> </weather34-alertunit>
</weather34-alertvalue></div></div>";}
else if ($wuskydayprecipIntensity3>0 ){echo "
<div class='weather34alert' id='weather34message'> 
<div class='weather34-notification'> 
<weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
<weather34-alertmessage>Expect Rain <icon-26-30>".$weather34_rain_icon."</icon-26-30></weather34-alertmessage> <br>
<weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime3."</blue><weather34-alertunit> </weather34-alertunit>
</weather34-alertvalue></div></div>";}
else if ($wuskydayprecipIntensity4>0 ){echo "
<div class='weather34alert' id='weather34message'> 
<div class='weather34-notification'> 
<weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
<weather34-alertmessage>Expect Rain <icon-26-30>".$weather34_rain_icon."</icon-26-30></weather34-alertmessage> <br>
<weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime4."</blue><weather34-alertunit> </weather34-alertunit>
</weather34-alertvalue></div></div>";}        
else if ($wuskydayprecipIntensity5>0 ){echo "
<div class='weather34alert' id='weather34message'> 
<div class='weather34-notification'> 
<weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
<weather34-alertmessage>Expect Rain <icon-26-30>".$weather34_rain_icon."</icon-26-30></weather34-alertmessage> <br>
<weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime5."</blue><weather34-alertunit> </weather34-alertunit>
</weather34-alertvalue></div></div>";}
else if ($wuskydayprecipIntensity6>0 ){echo "
<div class='weather34alert' id='weather34message'> 
<div class='weather34-notification'> 
<weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
<weather34-alertmessage>Expect Rain <icon-26-30>".$weather34_rain_icon."</icon-26-30></weather34-alertmessage> <br>
<weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime6."</blue><weather34-alertunit> </weather34-alertunit>
</weather34-alertvalue></div></div>";}
else if ($wuskydayprecipIntensity7>0 ){echo "
<div class='weather34alert' id='weather34message'> 
<div class='weather34-notification'> 
 <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
<weather34-alertmessage>Expect Rain <icon-26-30>".$weather34_rain_icon."</icon-26-30></weather34-alertmessage> <br>
<weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime7."</blue><weather34-alertunit> </weather34-alertunit>
</weather34-alertvalue></div></div>";}
else if ($wuskydayprecipIntensity8>0 ){echo "
<div class='weather34alert' id='weather34message'> 
<div class='weather34-notification'> 
<weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
<weather34-alertmessage>Expect Rain <icon-26-30>".$weather34_rain_icon."</icon-26-30></weather34-alertmessage> <br>
<weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime8."</blue><weather34-alertunit> </weather34-alertunit>
</weather34-alertvalue></div></div>";}
else if ($wuskydayprecipIntensity9>0 ){echo "
<div class='weather34alert' id='weather34message'> 
<div class='weather34-notification'> 
<weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
<weather34-alertmessage>Expect Rain <icon-26-30>".$weather34_rain_icon."</icon-26-30></weather34-alertmessage> <br>
<weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime9."</blue><weather34-alertunit> </weather34-alertunit>
</weather34-alertvalue></div></div>";}
 else if ($wuskydayprecipIntensity10>0 ){echo "
<div class='weather34alert' id='weather34message'> 
<div class='weather34-notification'> 
<weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
<weather34-alertmessage>Expect Rain <icon-26-30>".$weather34_rain_icon."</icon-26-30></weather34-alertmessage> <br>
<weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime10."</blue><weather34-alertunit> </weather34-alertunit>
</weather34-alertvalue></div></div>";}     
    //add more if required
?>
<script> //fire the weather34 notification
function closeweather34alert(el) { el.addClass('weather34alert-hide');}
$('.js-messageClose').on('click', function(e) { closeweather34alert($(this).closest('.weather34alert'));});
$(document).ready(function() {  setTimeout(function() { closeweather34alert($('#weather34message')); }, 10000);});
</script>