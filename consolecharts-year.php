<?php include_once('livedata.php');include_once('updater5.php');date_default_timezone_set($TZ);?>
<!DOCTYPE html><html><head>
<title> <?php echo $stationName;?> Console Charts</title>
<meta name="title" content="<?php echo $stationName;?> Console Charts">
<meta name="description" content="Charts for <?php echo $stationName;?>">
<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=yes">
<meta name="mobile-web-app-capable" content="yes">
<link href="weather34-theme.css?version=<?php echo filemtime('weather34-theme.css')?>" rel="stylesheet prefetch">
<link rel="preload" href="fonts/clock3-webfont.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="fonts/verbatim-regular.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="fonts/verbatim-medium.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="fonts/verbatim-bold.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="fonts/HelveticaNeue-Medium.woff2" as="font" type="font/woff2" crossorigin>

</head>
<body>
<!-- weather34 NANOSD console flex layout -->
<div class="weather34-tablet">
<div class="container">
<div class="nav-top">   
<div class="weather34-indoor"><?php echo $timeicon?> <div id="weather34clock4"></div>
<div class="desktoplink4"><?php echo $chartcalendar; echo date('Y');?> Charts</div></div>
<div class="desktoplink3"><?php echo $headerlocation; echo $stationName?>
<div class="online"><?php if(file_exists($livedata)&&time()- filemtime($livedata)>300)echo $wirelessoffline;else echo $wireless?></div>
</div></div>  
  <ul class="grid-containercharts">
  <li><div id=temperature></div></li>    
    <li><div id=dewpoint></div></li>
    <li><div id=barometer></div></li>

    <li><div id=rain></div></li>    
    <li><div id=gust></div></li>
    <?php //purple air if no show clock
    if($purpleairhardware=="yes"){echo "<li><div id=airq></div></li> ";} 
    else echo "<li><div id=winddir></div></li>";?>

    <?php //purple air if no show clock
    if($purpleairhardware=="no" && $davisairquality=='yes'){echo "<li><div id=airqd></div></li> ";} 
    ?>


    <?php if($uvsensor=="yes"){?>    
    <li><div id=uvindex></div></li>
    <li><div id=solar></div></li>  
    <?php //purple air if no show clock
    if($purpleairhardware=="yes"){echo "<li><div id=winddir></div></li> ";} 
    else if($purpleairhardware=="no" && $davisairquality=='yes'){echo "";} 
    else echo "<li><div id=theclock></div></li>";?>    
    <?php };?>

    <?php //no uvsensor but davis air quality show clock and sun    
    if($uvsensor=="no" && $davisairquality=='yes'){?>   
    <li><div id=theclock></div></li>  
    <li><div id=moonsun></div></li>         
    <?php };?>


    <?php //no uvsensor but purple air quality show clock and sun    
    if($uvsensor=="no" && $purpleairhardware=="yes"){?>   
    <li><div id=theclock></div></li>  
    <li><div id=moonsun></div></li>         
    <?php };?>

    <li2><div id=moon></div></li2> 
    <li2><div id=sun></div></li2> 
    <li2><div id=time-date></div></li2>  
  </ul>
  <div class="nav-bottom">
  <a href="index.php" data-title="Back to Dashboard"><?php echo $adjust?><icontext>Home</icontext></a>  

  <!-- weather34 theme -->
<div class="weather34switchercharts">
  <a data-title="Switch Theme"><button id="weather34theme-toggle" class="weather34switch" type="button"> <?php echo $themeshadelight;?> 
</button>
</div></a>
<script>
var toggle = document.getElementById("weather34theme-toggle");
var storedTheme = localStorage.getItem('theme');
if (storedTheme)
    document.documentElement.setAttribute('data-theme', storedTheme)
toggle.onclick = function() {var currentTheme = document.documentElement.getAttribute("data-theme");
    var targetTheme = "light";
    if (currentTheme === "light") {targetTheme = "dark";}
    document.documentElement.setAttribute('data-theme', targetTheme)
    localStorage.setItem('theme', targetTheme);
};
</script>
<bottomtoolbarspacecharts></bottomtoolbarspacecharts>


  <a href="consolecharts.php" data-title="<?php echo strftime("%A" );?> Charts">
  <?php echo $weather34chart2?> 
 <span style="position:relative;top:-8px;font-family:weathertext2;font-size:0.8em;right:3px"><?php echo strftime("%A" );?></span></a>

        <a href="consolecharts-month.php" data-title="<?php echo strftime("%B");?> Charts">
        <?php echo $weather34chart2?> 
       <span style="position:relative;top:-8px;font-family:weathertext2;font-size:0.8em;right:3px"><?php echo strftime("%B");?></span></a>  
         
      

        <?php if ($display2020=='yes'){?>
        <a href="consolecharts-2020.php" data-title="2020 Charts">
        <?php echo $weather34chart2?> 
       <span style="position:relative;top:-8px;font-family:weathertext2;font-size:0.8em;right:3px">2020</span></a>
        <?php };?>

        <?php if ($display2019=='yes'){?>
        <a href="consolecharts-2019.php" data-title="2019 Charts">
        <?php echo $weather34chart2?> 
       <span style="position:relative;top:-8px;font-family:weathertext2;font-size:0.8em;right:3px">2019</span></a>
        <?php };?>

       <chartpage>Last Updated <?php 
       $dayfile=date('Y');$forecastime=filemtime('weather34charts/'.$dayfile.'.csv');echo strftime("%A %d %B %Y %l:%M %p",$forecastime);?>     
      </chartpage>

<div class="weather34-battery"><a  href="info.html" data-lity data-title="Weather34"> <img src="images/weather34-icon-small.png" width="24em" ></a></div></div>
</body></html>