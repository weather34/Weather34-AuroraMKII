<?php 
	########################################################
	#	CREATED FOR WEATHER34 Aurora TEMPLATE  		              						                
	# https://weather34.com/homeweatherstation/index.html 											                        
	# 	                                                                                               
	# 	Release: December 2020 Version Aurora MKII 				  	                                           
	########################################################
include_once('livedata.php');include_once('updater2.php');?>
<!DOCTYPE html><html><head>
<title><?php echo $stationName;?> </title>
<meta name="title" content="<?php echo $stationName;?>">
<meta name="description" content="Providing current weather conditions for <?php echo $stationName?>">
<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=yes">
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
<link href="console-<?php echo $theme?>.css?version=<?php echo filemtime('console-'.$theme.'.css')?>" rel="stylesheet prefetch">
<link rel="preload" href="fonts/clock3-webfont.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="fonts/verbatim-regular.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="fonts/verbatim-medium.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="fonts/HelveticaNeue-Medium.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="fonts/verbatim-bold.woff2" as="font" type="font/woff2" crossorigin> 

</head>
<body>
<!-- weather34 Aurora MKII flex layout -->
<div class="weather34-tablet">
<div class="container">
<div class="nav-top"> 
<div class="weather34-indoor">
<?php echo $timeicon?><div id="weather34clock4"></div>
<div class="sunriset-set"><?php echo $headerlocation?> <?php echo $stationName?></div></div>
<div class="desktoplink2"><div id=data-updated></div></div></div>

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

 <div class="weather34-open-menu"><button><?php echo $adjust ?> <icontext>Menu</icontext></button></div><bottomtoolbarspace></bottomtoolbarspace>

  <a href=<?php if ($theme == 'dark') { echo '?theme=light';} else {echo '?theme=dark';} ?>
    <?php if ($theme == 'dark') { echo 'data-title="Light Mode"';} else {echo 'data-title="Dark Mode"';} ?> >
    <?php //aurora dark or light theme
    if ($theme == 'dark') {echo $themeshadelight;} 
    else {echo $themeshadedark;}?></a>

     <?php 
  if ($units=='us') {  // NON METRIC OPTIONS C-KTS-MS-UK  
    echo '<a  href="?units=metric" data-title="Metric Units" >
    '.$weather34C.'</a>'; 

    if ($displaymsicon=='yes'){ 
    echo '<a href="?units=scandinavia" data-title="MS Units"> 
    '.$weather34MS.'</a>'; }

    if ($displayukicon=='yes'){ 
      echo '<a href="?units=uk" data-title="UK Units"> 
      '.$weather34UK.'</a>'; }     
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
  }  
  else if ($units=='knots'){   // KNOTS OPTIONS F-C-UK
    echo '<a  href="?units=us" data-title="Imperial Units">
    '.$weather34F.'</a>';  
    echo '<a  href="?units=metric" data-title="Metric Units">
    '.$weather34C.'</a>'; 
      } 
   
   else if ($units==''){   // default
    echo '<a  href="?units=us" data-title="Imperial Units">
    '.$weather34F.'</a>';  
    echo '<a  href="?units=metric" data-title="Metric Units">
    '.$weather34C.'</a>';   
   } 
?>

<a href="forecastcharts/chartforecast.php" data-title="5 day Forecast" ><icon-forecast><?php echo $weather34fore?></icon-forecast></a> 
<a class="footericons" href="outlookwutext.php" data-lity  data-title="Summary Forecast"><?php echo $weather34foretxt?></a>
<a href="consolecharts.php" data-title="Daily Charts"><?php echo $weather34chart2?></a>
<a href="weather34-almanac.php" data-title="Almanac"><?php echo $weather34alm?></a>
<a href="index.php" data-title="Refresh" class="showicon2"><?php echo $weather34refr?></a>

<weather34-rightfootericons>

<a href="index.php" data-title="Refresh"> <?php echo $weather34refr?></a>
<aurora>Aurora MKII <?php echo $weather["stationtype"]?></aurora>
<div class="weather34-aurora" ><a  href="info.html" data-lity data-title="Weather34"> <img src="images/weather34-logo-small.svg" width="23px" height="23px" ></a></div>
</weather34-rightfootericons>
</div>
<?php //if notifications is yes weather34 rain/snow/thunder awareness every 15 minutes 
if ($notifications=='yes') {?><div id=forecastalert></div><?php ;}?>
</body>
<script>//weather menu sidebar
$(function() {var box = $('.weather34-menuside');var button = $('.weather34-open-menu, .weather34-header-menu');button.on('click', function(){box.toggleClass('weather34-highlight');});});</script> 
</html>