<?php include('livedata.php');?>
<link href="weather34-theme.css?version=<?php echo filemtime('weather34-theme.css') ?>" rel="stylesheet prefetch">
<theword>Average Wind Speed (<blue><?php echo $weather["wind_units"];?></blue>)</theword>

<div class="weather34credit">
<a class="canvascreditlink" href="https://canvasjs.com" target="_blank" data-title="CanvasJs.com" >
Charts compiled with CanvasJs.com <br>v2.3.1 GA (CC BY-NC 3.0) Non-Commercial-Version.</a></div></div>
<div class="almanacouterboxrain">
<br><br>
<div class="almanacchartx">
<monthchart>Current Day Avg Wind Speed Chart</monthchart>
<iframe  class="charttempmodule" src="weather34charts/todaywindspeedmodulechart2avg.php" frameborder="0" scrolling="no" width="320px" height="200px"></iframe>  
</div>
<div class="almanacx"><div class="almanac-content">
<?php  //month max
echo "<valuetextheading1> Average Today <deepblue>".date('l')."</deepblue></valuetextheading1><br>";   
echo "<div class=almanacareas>".$weather['wind_speed_avgday']."<smalltempunit2>".$weather["wind_units"];
?><smalltempunit2></div></div>

<div class="almanac2x"><div class="almanac-content">
<?php  //max year
echo "<valuetextheading1>".date('Y')." Max <deepblue>".$weather["windymaxtime"]."</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>".$weather["windymax"]."<smalltempunit2>".$weather["wind_units"];
?></smalltempunit2></div></div>

<div class="almanac3x"><div class="almanac-content">
<?php  //month min
echo "<valuetextheading1>Average <deepblue>Yesterday </deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>".$weather['wind_speed_ydavg']."<smalltempunit2>".$weather["wind_units"];
?><smalltempunit2></div></div>

<div class="almanac4x"><div class="almanac-content">
<?php  //min Year
echo "<valuetextheading1>Record Max <deepblue>".$weather["windamaxtime"]."</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>".$weather["windamax"]."<smalltempunit2>".$weather["wind_units"];
?><smalltempunit2></div></div>
