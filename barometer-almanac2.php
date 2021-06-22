<?php include('livedata.php');?>
<link href="weather34-theme.css?version=<?php echo filemtime('weather34-theme.css') ?>" rel="stylesheet prefetch">
<theword>Barometric Pressure (<blue><?php echo $weather["barometer_units"];?></blue>)</theword>


<div class="weather34credit">
<a class="canvascreditlink" href="https://canvasjs.com" target="_blank" data-title="CanvasJs.com" >
Charts compiled with CanvasJs.com <br>v2.3.1 GA (CC BY-NC 3.0) Non-Commercial-Version.</a></div></div>

<div class="almanacouterboxrain">
<br><br>
<div class="almanacchartx">
<monthchart>Current Day Barometer Chart</monthchart>
<iframe  class="charttempmodule" src="weather34charts/todaybarometermodulechart2.php" frameborder="0" scrolling="no" width="320px" height="200px"></iframe>  
</div>
<div class="almanacx"><div class="almanac-content">
<?php  //month max
echo "<valuetextheading1>".date('F')." Max <deepblue>".$weather["thb0seapressmonthmaxtime"]."</deepblue></valuetextheading1><br>";   
echo "<div class=almanacareas>".$weather["thb0seapressmmax"]."<smalltempunit2>".$weather["barometer_units"] ;
?><smalltempunit2></div></div>

<div class="almanac2x"><div class="almanac-content">
<?php  //max year
echo "<valuetextheading1>".date('Y')." Max <deepblue>".$weather["thb0seapressyearmaxtime"]."</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>".$weather["thb0seapressymax"]."<smalltempunit2>".$weather["barometer_units"] ;
 ?></smalltempunit2></div></div>

<div class="almanac3x"><div class="almanac-content">
<?php  //month min
echo "<valuetextheading1>".date('F')." Min <deepblue>".$weather["thb0seapressmonthmintime"]."</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>".$weather["thb0seapressmmin"]."<smalltempunit2>".$weather["barometer_units"] ;
?><smalltempunit2></div></div>

<div class="almanac4x"><div class="almanac-content">
<?php  //min Year
echo "<valuetextheading1>".date('Y')." Min <deepblue>".$weather["thb0seapressyearmintime"]."</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>".$weather["thb0seapressymin"]."<smalltempunit2>".$weather["barometer_units"] ;
?><smalltempunit2></div></div>

<div class="almanac5x"><div class="almanac-content">
<?php  //alltime max
echo "<valuetextheading1>Record Max <deepblue>".$weather["thb0seapressamaxtime"]."</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>".$weather["thb0seapressamax"]."<smalltempunit2>".$weather["barometer_units"] ;
?><smalltempunit2></div></div>

<div class="almanac6x"><div class="almanac-content">
<?php  //alltime min
echo "<valuetextheading1>Record Min <deepblue>".$weather["thb0seapressamintime"]."</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>".$weather["thb0seapressamin"]."<smalltempunit2>".$weather["barometer_units"] ;
?><smalltempunit2></div></div></div>
