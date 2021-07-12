<?php include_once('livedata.php');include_once('updater3.php');include('settings.php');?>
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
<link rel="preload" href="fonts/HelveticaNeue-Medium.woff2" as="font" type="font/woff2" crossorigin>

</head>
<body>
<!-- weather34 NANOSD console flex layout -->
<div class="weather34-tablet">
<div class="container">
<div class="nav-top">   
<div class="weather34-indoor"><?php echo $timeicon?> <div id="weather34clock4"></div>
<div class="desktoplink4"><?php echo $chartcalendar; echo date($dateFormat);?> Charts</div></div>
<div class="desktoplink3"><?php echo $headerlocation; echo $stationName?>

</div></div>
<ul class="grid-containercharts">
    <li><div id=temperature></div></li>
    <li><div id=humidity></div></li>
    <li><div id=gust></div></li>
    

    <li><div id=rain></div></li>
    <li><div id=direction></div></li> 
    <li><div id=barometer></div></li>

    
    <?php if($uvsensor=="yes"){?>
    <li><div id= <?php if ($purpleairhardware=='yes'){echo "airquality";}?>
    wind></div></li>    
    <li><div id=uvindex></div></li>
    <li><div id=solar></div></li>
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

  <a href="consolecharts-month.php" data-title="<?php echo strftime("%B");?> Charts">
        <?php echo $weather34chart2?> 
        <span style="position:relative;top:-8px;font-family:weathertext2;font-size:0.8em;right:3px"><?php echo strftime("%B");?></span></a>

        <a href="consolecharts-year.php" data-title="<?php echo date('Y');?> Charts">
        <?php echo $weather34chart2?> 
        <span style="position:relative;top:-8px;font-family:weathertext2;font-size:0.8em;right:3px"><?php echo date ('Y');?></span></a>    



        <?php if ($display2020=='yes'){?>
        <a href="consolecharts-2020.php" data-title="2020 Charts">
        <?php echo $weather34chart2?> 
       <span style="position:relative;top:-8px;font-family:weathertext2;font-size:0.8em;right:3px">2020</span></a>
        <?php };?>


       
       <chartpage>Last Updated <?php 
       $dayfile=date('Y')."/".date('jMY');$forecastime=filemtime('weather34charts/'.$dayfile.'.csv');echo strftime("%A %d %B %Y %l:%M %p",$forecastime);?>     
      </chartpage>
      
     
<div class="weather34-battery"><a  href="info.html" data-lity data-title="Weather34"> <img src="images/weather34-icon-small.png" width="24em" ></a></div></div>
</body></html>