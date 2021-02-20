<?php 
  #######################################################
	#	CREATED FOR WEATHER34 AURORA MKII TEMPLATE    #	                         
	# https://weather34.com/homeweatherstation/index.html #											                        
	# 	                                                  #                                             
	# 	Release: March 2020                 			        #	  	                                               
	# 	  Almanac Console Version                         #                                             
	#   https://www.weather34.com 	                      #                                            
	#######################################################

include_once('livedata.php');include_once('updater-almanac.php');?>
<!DOCTYPE html>
<html><head>
  <title>Almanac History <?php echo $stationName ?></title>
  <meta name="title" content="Almanac History for <?php echo $stationName ?>">
  <meta name="description" content="Almanac History for <?php echo $stationName ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=yes">
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="mask-icon" href="safari-pinned-tab.svg" color="#01a4b4">
<meta name="apple-mobile-web-app-title" content="Almanac History for <?php echo $stationName ?>">
<meta name="mobile-web-app-capable" content="yes">
<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
<link rel="manifest" href="favicon/site.webmanifest">
<link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
<link rel="shortcut icon" href="favicon/favicon.ico">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-config" content="favicon/browserconfig.xml">
<meta name="theme-color" content="#ffffff">
<meta name="apple-mobile-web-app-title" content="Weather34">
<meta name="application-name" content="Weather34 Console">
<link href="console-<?php echo $theme ?>.css?version=<?php echo filemtime('console-'. $theme .'.css') ?>" rel="stylesheet prefetch">
  <link rel="preload" href="fonts/clock3-webfont.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="fonts/verbatim-regular.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="fonts/verbatim-medium.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="fonts/HelveticaNeue-Medium.woff2" as="font" type="font/woff2" crossorigin>  
</head>
<body>
<!-- weather34 NANOSD console flex layout -->
<div class="weather34-tablet">
<div class="container">
<div class="nav-top">   
<div class="weather34-indoor"><?php echo $timeicon?> <div id="weather34clock4"></div>
<div class="desktoplink4"><?php echo $info;?> Almanac <?php echo $mbyear;?>-<?php echo date('Y');?></div>
</div>



</div></div>  

    <ul class="grid-container">
      <li><div id=temperature></div></li>
      <li><div id=humidity></div></li>
      <li><div id=dewpoint></div></li>

      <li><div id=wind></div></li>   
      <li><div id=rain></div></li>
      <li><div id=barometer></div></li>

      <?php if ($uvsensor=='yes'){;?>      
      <li><div id=uvindex></div></li>   
      <li><div id=solar></div></li> 
      <li><div id=clock></div></li> 
      <li3><div id=indoor></div></li3> 
      <?php ;}?>

    <li2><div id=moon></div></li2> 
    <li2><div id=sun></div></li2> 
    <li2><div id=time-date></div></li2>  
    </ul>


<?php if ($uvsensor=='yes'){;?>   
<div class="nav-bottom">
<?php ;}?>
<?php if ($uvsensor=='no'){;?>   
<div class="nav-bottom">
<?php ;}?>
<a href="index.php" data-title="Back to Dashboard"><?php echo $adjust?><icontext>Home</icontext></a>  
  
<a href=<?php if ($theme == 'dark') { echo '?theme=light';} else {echo '?theme=dark';} ?>
    <?php if ($theme == 'dark') { echo 'data-title="Light Mode"';} else {echo 'data-title="Dark Mode"';} ?> >
    <?php //theme
    if ($theme == 'dark') {echo $themeshadelight;} 
    else {echo $themeshadedark;}?></a>

     <?php 
  if ($units=='us') {  // NON METRIC OPTIONS C-MS-KTS   
    echo '<a  href="?units=metric" data-title="Metric Units">
    '.$weather34C.'</a>'; 
    echo '<a href="?units=scandinavia" data-title="MS Units"> 
    '.$weather34MS.'</a>'; 
    echo '<a  href="?units=knots" data-title="Wind Knots">
    '.$weather34KTS.'</a>';     
  }
  else if ($units=='uk'){ // UK OPTIONS F-C-KNOTS
    echo '<a  href="?units=us" data-title="Imperial Units">
    '.$weather34F.'</a>';
     echo '<a  href="?units=metric" data-title="Metric Units">
     '.$weather34C.'</a>';
    echo '<a  href="?units=knots" data-title="Wind Knots">
    '.$weather34KTS.'</a>';     
  }  
  else if ($units=='metric'){ // METRIC OPTIONS F-UK-KTS
    echo '<a  href="?units=us" data-title="Imperial Units">
    '.$weather34F.'</a>';  
     echo '<a href="?units=uk" data-title="UK Units"> 
     '.$weather34UK.'</a>';  
     echo '<a  href="?units=knots" data-title="Wind Knots">
     '.$weather34KTS.'</a>';      
  }  

  else if ($units=='scandinavia'){ // MS OPTIONS F-C-KTS
    echo '<a  href="?units=us" data-title="Imperial Units">
    '.$weather34F.'</a>'; 
    echo '<a  href="?units=metric" data-title="Metric Units">
    '.$weather34C.'</a>';       
    echo '<a  href="?units=knots" data-title="Wind Knots">
    '.$weather34KTS.'</a>';       
  }  
  else if ($units=='knots'){   // KNOTS OPTIONS F-C-UK
    echo '<a  href="?units=us" data-title="Imperial Units">
    '.$weather34F.'</a>';  
    echo '<a  href="?units=metric" data-title="Metric Units">
    '.$weather34C.'</a>'; 
    echo '<a href="?units=uk" data-title="UK Units">     
    '.$weather34UK.'</a>';   
   } 
   
   else if ($units==''){   // default
    echo '<a  href="?units=us" data-title="Imperial Units">
    '.$weather34F.'</a>';  
    echo '<a  href="?units=metric" data-title="Metric Units">
    '.$weather34C.'</a>'; 
    echo '<a href="?units=uk" data-title="UK Units">     
    '.$weather34UK.'</a>';   
   } 
?>

<a href="weather34-mooninfo.php" data-lity data-title="Lunar Info">
<?php echo $weather34moonicon?></a>

<a href="weather34-meteor.php" data-lity data-title="Meteor Showers">
<?php echo $weather34meteoricon?></a>

<a href="consolecharts.php" data-title="Daily Charts">
<?php echo $weather34chart2?></a>



<weather34-rightfootericons>
<?php 
//weather34 smart tv option
if ($smarttv=='yes'){echo '<a class="footericons" href="weather34-tv.php" data-title="Smart TV" >'. $weather34smtv.'</a>';} ?>  
<a  href="weather34-template-legend.php" data-lity data-title="Hardware Info" class="footericons"> <?php echo $weather34hinfo;?></a>


<a href="weather34-almanac.php" data-title="Refresh"> <?php echo $weather34refr?></a>
  </weather34-rightfootericons>
  <div class="weather34-battery">
  <a  href="info.html" data-lity data-title="Weather34"> <img src="images/weather34-icon-small.png" width="24em" ></a></div>  
 </body></html>