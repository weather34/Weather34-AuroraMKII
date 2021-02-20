<?php include_once('livedata.php');include_once('updater7.php');date_default_timezone_set($TZ);?>
<!DOCTYPE html><html><head>
<title> <?php echo $stationName;?> Console Charts</title>
<meta name="title" content="<?php echo $stationName;?> Console Charts">
<meta name="description" content="Charts for <?php echo $stationName;?>">
<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=yes">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-title" content="Weather34 Console Charts">
<meta name="application-name" content="Weather34 Console Charts">
<link href="console-<?php echo $theme?>.css?version=<?php echo filemtime('console-'.$theme.'.css')?>" rel="stylesheet prefetch">
<link rel="preload" href="fonts/clock3-webfont.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="fonts/verbatim-regular.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="fonts/verbatim-medium.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="fonts/HelveticaNeue-Medium.woff2" as="font" type="font/woff2" crossorigin>
</head>
<body>
<!-- weather34 NANOSD console flex layout -->
<div class="weather34-tablet">
<div class="fade-in">
<div class="container">
<div class="nav-top">   
<div class="weather34-indoor"><?php echo $timeicon?> <div id="weather34clock4"></div>
<div class="desktoplink4"><?php echo $chartcalendar;?> 2020 Charts</div></div>
<div class="desktoplink3"><?php echo $headerlocation; echo $stationName?>
<div class="online"><?php if(file_exists($livedata)&&time()- filemtime($livedata)>300)echo $wirelessoffline;else echo $wireless?></div>
</div></div>  
  <ul class="grid-container">
    <li><div id=temperature></div></li>    
    <li><div id=dewpoint></div></li> 
    <li><div id=gust></div></li> 
   
    <?php if($purpleairhardware=="yes"){echo "<li><div id=airq></div></li> ";} else echo "<li><div id=wind></div></li>";?>
    <li><div id=rain></div></li>
    <li><div id=barometer></div></li> 

    <?php if($uvsensor=="yes"){?>
    <li><div id=uvindex></div></li>
    <li><div id=solar></div></li>
    <li><div id=theclock></div></li>
    <?php };?>

    <li2><div id=moon></div></li2> 
    <li2><div id=sun></div></li2> 
    <li2><div id=time-date></div></li2>  
  </ul>
  <div class="nav-bottom">
  <a href="index.php" data-title="Back to Dashboard"><?php echo $adjust?><icontext>Home</icontext></a>  

  <a href=<?php if ($theme == 'dark') { echo '?theme=light';} else {echo '?theme=dark';} ?>
    <?php if ($theme == 'dark') { echo 'data-title="Light Mode"';} else {echo 'data-title="Dark Mode"';} ?> >
    <?php //theme
    if ($theme == 'dark') {echo $themeshadelight;} 
    else {echo $themeshadedark;}?></a>


  <a href="consolecharts.php" data-title="<?php echo strftime("%A" );?> Charts">
  <?php echo $weather34chart2?> 
 <span style="position:relative;top:-8px;font-family:weathertext2;font-size:0.8em;right:3px"><?php echo strftime("%A" );?></span></a>

        <a href="consolecharts-month.php" data-title="<?php echo strftime("%B");?> Charts">
        <?php echo $weather34chart2?> 
       <span style="position:relative;top:-8px;font-family:weathertext2;font-size:0.8em;right:3px"><?php echo strftime("%B");?></span></a>    


       <a href="consolecharts-year.php" data-title="<?php echo strftime("%Y");?> Charts">
        <?php echo $weather34chart2?> 
       <span style="position:relative;top:-8px;font-family:weathertext2;font-size:0.8em;right:3px"><?php echo strftime("%Y");?></span></a>    


        <?php if ($display2019=='yes'){?>
        <a href="consolecharts-2019.php" data-title="2019 Charts">
        <?php echo $weather34chart2?> 
       <span style="position:relative;top:-8px;font-family:weathertext2;font-size:0.8em;right:3px">2019</span></a>
        <?php };?>

       <chartpage><?php echo $maxclock ?> <?php 
       $dayfile=date('Y');$forecastime=filemtime('weather34charts/'.$dayfile.'.csv');echo strftime("%A %d %B %Y %l:%M %p",$forecastime);?>     
      </chartpage>

        
      <weather34-rightfootericonscharts>


<a href="consolecharts-year.php" data-title="Refresh">
<?php echo $weather34refr?></a>
</weather34-rightfootericonscharts>
<div class="weather34-battery"><a  href="info.html" data-lity data-title="Weather34"> <img src="images/weather34-icon-small.png" width="24em" ></a></div></div>
</body></html>