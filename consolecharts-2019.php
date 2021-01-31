<?php include_once('livedata.php');include_once('updater6.php');date_default_timezone_set($TZ);?>
<!DOCTYPE html><html><head>
<title> <?php echo $stationName;?> Console Charts</title>
<meta name="title" content="<?php echo $stationName;?> Console Charts">
<meta name="description" content="Charts for <?php echo $stationName;?>">
<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=yes">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-title" content="Weather34 Console Charts">
<meta name="application-name" content="Weather34 Console Charts">
<link href="console-<?php echo $theme?>.css?version=<?php echo filemtime('console-'.$theme.'.css')?>" rel="stylesheet prefetch">
<link rel="preload" href="fonts/clock3-webfont.woff" as="font" type="font/woff" crossorigin>
<link rel="preload" href="fonts/verbatim-regular.woff" as="font" type="font/woff" crossorigin>
<link rel="preload" href="fonts/verbatim-medium.woff" as="font" type="font/woff" crossorigin>
<link rel="preload" href="fonts/HelveticaNeue-Medium.woff" as="font" type="font/woff" crossorigin>
</head>
<body>
<!-- weather34 NANOSD console flex layout -->
<div class="weather34-tablet">
<div class="container">
<div class="nav-top">   
<div class="weather34-indoor"><?php echo $timeicon?> <div id="weather34clock4"></div>
<div class="desktoplink4"><?php echo $chartcalendar?> 2019 Charts</div></div>
<div class="desktoplink3"><?php echo $headerlocation; echo $stationName?>
<div class="online"><?php if(file_exists($livedata)&&time()- filemtime($livedata)>300)echo $wirelessoffline;else echo $wireless?></div>
</div></div>  
  <ul class="grid-container">
    <li><div id=temperature></div></li>    
    <li><div id=dewpoint></div></li>
    <li><div id=barometer></div></li>

    <li><div id=rain></div></li>
    <li><div id=wind></div></li>    
    <li><div id=gust></div></li>    

    <li2><div id=moon></div></li2> 
    <li2><div id=sun></div></li2> 
    <li2><div id=time-date></div></li2>  
  </ul>
  <div class="nav-bottom">
  <a href="index.php" data-title="Back to Dashboard"><?php echo $adjust?><icontext>Home</icontext></a>  

  <a href="consolecharts.php" data-title="<?php echo strftime("%A" );?> Charts">
  <?php echo $weather34chart2?> 
 <span style="position:relative;top:-8px;font-family:weathertext2;font-size:0.8em;right:3px"><?php echo strftime("%A" );?></span></a>

        <a href="consolecharts-month.php" data-title="<?php echo strftime("%B");?> Charts">
        <?php echo $weather34chart2?> 
       <span style="position:relative;top:-8px;font-family:weathertext2;font-size:0.8em;right:3px"><?php echo strftime("%B");?></span></a>    

        <a href="consolecharts-year.php" data-title="<?php echo strftime("%Y");?> Charts">
        <?php echo $weather34chart2?> 
       <span style="position:relative;top:-8px;font-family:weathertext2;font-size:0.8em;right:3px"><?php echo strftime("%Y");?></span></a>    

       <?php if ($display2020=='yes'){?>
        <a href="consolecharts-2020.php" data-title="2020 Charts">
        <?php echo $weather34chart2?> 
       <span style="position:relative;top:-8px;font-family:weathertext2;font-size:0.8em;right:3px">2020</span></a>
        <?php };?>

        <chartpage>
<?php echo $maxclock." " ;
//last year
$time = strtotime("-1 year", time());
$lastyear = date("Y", $time);
$dayfile=$lastyear;$forecastime=filemtime('weather34charts/'.$dayfile.'.csv');echo strftime("%A %d %B %Y %l:%M",$forecastime);
?></chartpage>
 <weather34-rightfootericonscharts>
  

<a href="consolecharts-2019.php" data-title="Refresh">
<?php echo $weather34refr?></a>
</weather34-rightfootericonscharts>
<div class="weather34-battery"><a  href="info.html" data-lity data-title="Weather34"> <img src="images/weather34-icon-small.png" width="24em" ></a></div></div>
</body></html>