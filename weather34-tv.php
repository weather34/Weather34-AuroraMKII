<?php 
  ####################################################################################################
	#	CREATED FOR WEATHER34 AURORA MKII TEMPLATE 											                           #
	# https://weather34.com/homeweatherstation/index.html 											                       # 
	# 	                                                                                               #
	# 	Release: Feb 2020 TV Vesion  			         #
	# 	  Console Version                                                                              #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################
include_once('livedata.php');include_once('updater2.php');
?>

<!DOCTYPE html><html><head>
<title><?php echo $stationName;?> </title>
<meta name="title" content="<?php echo $stationName;?>">
<meta name="description" content="Providing current weather conditions for <?php echo $stationName?>">
<meta name="viewport" content="width=1280, initial-scale=0.75">
<meta name="mobile-web-app-capable" content="yes">
<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
<link rel="manifest" href="favicon/site.webmanifest">
<link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
<link rel="shortcut icon" href="favicon.ico">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-config" content="favicon/browserconfig.xml">
<meta name="theme-color" content="#ffffff">
<meta name="apple-mobile-web-app-title" content="Weather34">
<meta name="application-name" content="Weather34">
<link href="weather34-theme.css?version=<?php echo filemtime('weather34-theme.css')?>" rel="stylesheet prefetch">
<link rel="preload" href="fonts/clock3-webfont.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="fonts/verbatim-regular.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="fonts/verbatim-medium.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="fonts/HelveticaNeue-Medium.woff2" as="font" type="font/woff2" crossorigin>
</head>
<body>
<!-- weather34 console flex layout -->
<div class="weather34-tablet">
<div class="container">
<div class="nav-top"> 
<div class="weather34-indoor">
<?php echo $timeicon?> <div id="weather34clock4"></div>
<div class="sunriset-set">
<?php echo $headerlocation?> <?php echo $stationName?></div>
</div>

<div class="desktoplink3"><div id=data-updated></div></div>

</div>
<ul class="grid-container">
    <li><div id=position1></div></li>
    <li><div id=position2></div></li>
    <li><div id=position3></div></li>
    <li><div id=position4></div></li>
    <li><div id=position5></div></li>
    <li><div id=position6></div></li>
    <li><div id=position7></div></li>
    <li><div id=position8></div></li>
    <li><div id=position9></div></li>
    <li2><div id=position10></div></li2> 
    <li2><div id=position11></div></li2> 
    <li2><div id=position12></div></li2>  
    <li3><div id=position13></div></li3>
  </ul>

  <div class="nav-bottom">  
<div class="weather34-menuside"><div class="weather34-header-menu">
 <?php //include custom weather34 menu file 
 include('weather34-sidemenu.php');?>
 </div></div>
 <div class="weather34-open-menu"><button><?php echo $adjust ?> <icontext>Menu</icontext></button></div>
 <div class="weather34switcher">
<a data-title="Switch Theme">
<label id="weather34theme" class="weather34switch">
<input type="checkbox" onchange="toggleTheme()" id="weather34themeslider" >
<span class="weather34themeslider round"></span></label></div></a>
<bottomtoolbarspace></bottomtoolbarspace>

     <?php 
  if ($units=='us') {  // NON METRIC OPTIONS C-KTS-MS-UK  
    echo '<a  href="?units=metric" data-title="Metric Units">
    '.$weather34C.'</a>'; 

    if ($displaymsicon=='yes'){ 
    echo '<a href="?units=scandinavia" data-title="MS Units"> 
    '.$weather34MS.'</a>'; }

    if ($displayukicon=='yes'){ 
      echo '<a href="?units=uk" data-title="UK Units"> 
      '.$weather34UK.'</a>'; } 

    if ($displayktsicon=='yes'){ 
    echo '<a  href="?units=knots" data-title="Wind Knots">
    '.$weather34KTS.'</a>';  }   
  }
  else if ($units=='uk'){ // UK OPTIONS F-C-KNOTS
    echo '<a  href="?units=us" data-title="Imperial Units">
    '.$weather34F.'</a>';
     echo '<a  href="?units=metric" data-title="Metric Units">
     '.$weather34C.'</a>';
     if ($displayktsicon=='yes'){ 
    echo '<a  href="?units=knots" data-title="Wind Knots">
    '.$weather34KTS.'</a>';   }  
  }  
  else if ($units=='metric'){ // METRIC OPTIONS F-UK-KTS
    echo '<a  href="?units=us" data-title="Imperial Units">
    '.$weather34F.'</a>';  
    if ($displayukicon=='yes'){ 
     echo '<a href="?units=uk" data-title="UK Units"> 
     '.$weather34UK.'</a>'; } 
     if ($displayktsicon=='yes'){ 
     echo '<a  href="?units=knots" data-title="Wind Knots">
     '.$weather34KTS.'</a>'; }    
  }  

  else if ($units=='scandinavia'){ // MS OPTIONS F-C-KTS
    echo '<a  href="?units=us" data-title="Imperial Units">
    '.$weather34F.'</a>'; 
    echo '<a  href="?units=metric" data-title="Metric Units">
    '.$weather34C.'</a>';  
  if ($displayktsicon=='yes'){     
    echo '<a  href="?units=knots" data-title="Wind Knots">
    '.$weather34KTS.'</a>'; }      
  }  
  else if ($units=='knots'){   // KNOTS OPTIONS F-C-UK
    echo '<a  href="?units=us" data-title="Imperial Units">
    '.$weather34F.'</a>';  
    echo '<a  href="?units=metric" data-title="Metric Units">
    '.$weather34C.'</a>'; 
    if ($displayukicon=='yes'){ 
    echo '<a href="?units=uk" data-title="UK Units">     
    '.$weather34UK.'</a>';  } 
   } 
   
   else if ($units==''){   // default
    echo '<a  href="?units=us" data-title="Imperial Units">
    '.$weather34F.'</a>';  
    echo '<a  href="?units=metric" data-title="Metric Units">
    '.$weather34C.'</a>'; 
    if ($displayukicon=='yes'){ 
    echo '<a href="?units=uk" data-title="UK Units">     
    '.$weather34UK.'</a>'; }  
   } 
?>

<a href="outlookwu.php" data-lity data-title="5 day Forecast">
<icon-forecast><?php echo $weather34fore?></icon-forecast></a> 

<a class="footericons" href="outlookwutext.php" data-lity  data-title="Summary Forecast">
<?php echo $weather34foretxt?></a>

<a href="consolecharts.php" data-title="Daily Charts">
<?php echo $weather34chart2?></a>

<a href="weather34-almanac.php" data-title="Almanac">
<?php echo $weather34alm?></a>

<?php if ($indooricon == "yes") {?> 
<a  href="weather34-ev.php"  data-title="Indoor Enviroment"> <?php echo $hometempmenu;?></a>
<?php };?>

<weather34-rightfootericons>
<?php if ($webcamdevice == "yes") {?>
  <a href="weather34-large-cam.php" data-lity data-title="Webcam"><?php echo $webcamicon2?></a>
<?php };?>

<?php if ($purpleairhardware == "yes") {?>
  <a href="weather34-aqi-info.php" data-lity data-title="Air Quality"><?php echo $weather34pa?></a>
<?php };?>

<?php if ($luftdatenhardware=='yes') {?>
  <a href="weather34-aqi-info-luftdaten.php" data-lity data-title="Air Quality"><?php echo $weather34aqi?></a>
<?php };?>
<a  href="weather34-template-legend.php" data-lity data-title="Hardware Info" class="footericons"> <?php echo $weather34hinfo;?></a>
</portraitmode>
<a href="index.php" data-title="Desktop Version"> <?php echo $weather34desktop?></a>

<?php if ($brand=='yes') {?>
<div class="weather34-battery">
  <a  href="info.html" data-lity data-title="Weather34"> <img src="images/weather34-icon-small.png" width="24em" ></a></div>  
  
<?php };?></div> 

<?php //if notifications is yes weather34 rain/snow/thunder awareness every 15 minutes 
if ($notifications=='yes') {?><div id=forecastalert></div><?php ;}?>

<script>//weather menu sidebar
$(function() {var box = $('.weather34-menuside');var button = $('.weather34-open-menu, .weather34-header-menu');button.on('click', function(){box.toggleClass('weather34-highlight');});});</script> 
</html></body>
