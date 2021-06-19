<?php include_once('livedata.php');include_once('updater-airquality.php');date_default_timezone_set($TZ);?>
<!DOCTYPE html><html><head>
<title> <?php echo $stationName;?> Air Quaity Aurora Charts</title>
<meta name="title" content="<?php echo $stationName;?> Console Charts">
<meta name="description" content="Charts for <?php echo $stationName;?>">
<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=yes">
<meta name="mobile-web-app-capable" content="yes">
<link rel="mask-icon" href="safari-pinned-tab.svg" color="#01a4b4">
<meta name="apple-mobile-web-app-title" content="Weather34 Console Charts">
<meta name="application-name" content="Weather34 Console Charts">
<link rel="manifest" href="site.webmanifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="appicons/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<meta name="msapplication-TileColor" content="#f8f8f8">
<link href="weather34-theme.css?version=<?php echo filemtime('weather34-theme.css')?>" rel="stylesheet prefetch">
<link rel="preload" href="fonts/clock3-webfont.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="fonts/verbatim-regular.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="fonts/verbatim-medium.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="fonts/HelveticaNeue-Medium.woff2" as="font" type="font/woff2" crossorigin>
<style>body{filter:brightness(95%);-webkit-filter:brightness(95%)}</style>
</head>
<body>
<!-- weather34 NANOSD console flex layout -->
<div class="weather34-tablet">
<div class="fade-in">
<div class="container">
<div class="nav-top">   
<div class="weather34-indoor"><?php echo $timeicon?> <div id="weather34clock4"></div>
<div class="desktoplink4"><?php echo $chartcalendar; echo date('Y');?> Air Quality Charts</div></div>
<div class="desktoplink3"><?php echo $headerlocation; echo $stationName?>
<div class="online"><?php if(file_exists($livedata)&&time()- filemtime($livedata)>300)echo $wirelessoffline;else echo $wireless?></div>
</div></div>
  <ul class="grid-container">

  <li2><div id=aqp></div></li2> 
    <li2><div id=aqd></div></li2> 
    <li2 style="margin-bottom:3px;"><div id=aql></div></li2>  

    <li><div id=airq></div></li>
    <li><div id=airqmonth></div></li>
    <li><div id=airqyear></div></li>

<?php if ($purpleairhardware=='yes'){?>

    <li><div id=pairq></div></li>
    <li><div id=pairqmonth></div></li>
    <li><div id=pairqyear></div></li>
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

       

<weather34-rightfootericonscharts>


<a href="air-quality-charts.php" data-title="Refresh">
<?php echo $weather34refr?></a>
</weather34-rightfootericonscharts>
<div class="weather34-battery"><a  href="info.html" data-lity data-title="Weather34"> <img src="images/weather34-icon-small.png" width="24em" ></a></div></div>
</body></html>