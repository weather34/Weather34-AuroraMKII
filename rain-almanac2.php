<?php include('livedata.php');?>
<link href="weather34-theme.css?version=<?php echo filemtime('weather34-theme.css') ?>" rel="stylesheet prefetch">
<theword>Rainfall (<blue>Precipitation <?php echo $weather["rain_units"];?></blue>)</theword>

<div class="weather34credit">
<a class="canvascreditlink" href="https://canvasjs.com" target="_blank" data-title="CanvasJs.com" >
Charts compiled with CanvasJs.com <br>v2.3.1 GA (CC BY-NC 3.0) Non-Commercial-Version.</a></div></div>
<div class="almanacouterboxrain">
<br><br>
<div class="almanacchartx">
<monthchart>Current Day Precipitation Chart</monthchart>
<iframe  class="charttempmodule" src="weather34charts/todayrainfallmodulechart2.php" frameborder="0" scrolling="no" width="320px" height="200px"></iframe>  
</div>
<div class="almanacx"><div class="almanac-content">
<?php  //month 
echo "<valuetextheading1>Total<deepblue> ".date('F Y')."</deepblue> </valuetextheading1><br>";   
echo "<div class=almanacareas>".$weather["rainmmax"]."<smalltempunit2>".$weather["rain_units"];
?><smalltempunit2></div></div>

<div class="almanac2x"><div class="almanac-content">
<?php  //yesterday
echo "<valuetextheading1>Yesterday <deepblue>Total</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>".$weather["rainydmax"]."<smalltempunit2>".$weather["rain_units"];
?><smalltempunit2></div></div>

<div class="almanac3x"><div class="almanac-content">
<?php  //last month
echo "<valuetextheading1>Total Last Month <deepblue>".date("M ",strtotime("-1 month"))."</deepblue> </valuetextheading1><br>";
echo "<div class=almanacareas>".$weather['rainlastmonth']."<smalltempunit2>".$weather["rain_units"];
?><smalltempunit2></div></div>

<div class="almanac4x"><div class="almanac-content">
<?php  // year
echo "<valuetextheading1>Total<deepblue> ".date('Y')."  </deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>".$weather["rainymax"]."<smalltempunit2>".$weather["rain_units"];
 ?></smalltempunit2></div></div>

<div class="almanac5x"><div class="almanac-content">
<?php  //last year
echo "<valuetextheading1>Total <deepblue>".date('Y', strtotime('-1 year'))."</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>".$weather['rainlastyear']."<smalltempunit2>".$weather["rain_units"];
?><smalltempunit2></div></div>

<div class="almanac6x"><div class="almanac-content">
<?php  //all time
echo "<valuetextheading1>Recorded since <deepblue>".$mbyear."</deepblue></valuetextheading1><br>";
echo "<div class=tempconverter1><div class=almanacareas>".$weather["rainalltime"]."<smalltempunit2>".$weather["rain_units"];
?><smalltempunit2></div></div></div></div>
