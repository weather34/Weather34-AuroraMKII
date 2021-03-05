<?php include('livedata.php');?>
<link href="console-dark.css?version=<?php echo filemtime('console-dark.css') ?>" rel="stylesheet prefetch">
<theword>Humidity (<blue>Relative Humidity</blue>)</theword>
<extrainfoicon><?php echo $weather34_humidity_icon;?></extrainfoicon>
<div class="canvascredit">
<a class="canvascreditlink" href="https://canvasjs.com" target="_blank" data-title="CanvasJs.com" >
Charts compiled with CanvasJs.com <br>v2.3.1 GA (CC BY-NC 3.0) Non-Commercial-Version.</a></div></div>


<div class="weather34credit">
<a class="canvascreditlink" href="https://weather34.com/homeweatherstation" target="_blank" data-title="weather34.com" >
CSS/SVG/PHP developed by weather<blue>34</blue></a></div></div>


<div class="almanacouterboxrain">
<br><br>
<div class="almanacchartx">
<monthchart>Current Day Humidity Chart</monthchart>
<iframe  class="charttempmodule" src="weather34charts/todayhumiditymodulechart2.php" frameborder="0" scrolling="no" width="320px" height="200px"></iframe>  
</div>
<div class="almanacx"><div class="almanac-content">
<?php  //month max
echo "<valuetextheading1>".date('F')." Max <deepblue>".$weather["humidity_mmaxtime"]."</deepblue></valuetextheading1><br>";   
echo "<div class=almanacareas>".$weather["humidity_mmax"]."<smalltempunit2>%";
?><smalltempunit2></div></div>

<div class="almanac2x"><div class="almanac-content">
<?php  //max year
echo "<valuetextheading1>".date('Y')." Max <deepblue>".$weather["humidity_ymaxtime"]."</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>".$weather["humidity_ymax"]."<smalltempunit2>%";
 ?></smalltempunit2></div></div>

<div class="almanac3x"><div class="almanac-content">
<?php  //month min
echo "<valuetextheading1>".date('F')." Min <deepblue>".$weather["humidity_mmintime"]."</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>".$weather["humidity_mmin"]."<smalltempunit2>%";
?><smalltempunit2></div></div>

<div class="almanac4x"><div class="almanac-content">
<?php  //min Year
echo "<valuetextheading1>".date('Y')." Min <deepblue>".$weather["humidity_ymintime"]."</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>".$weather["humidity_ymin"]."<smalltempunit2>%";
?><smalltempunit2></div></div>

<div class="almanac5x"><div class="almanac-content">
<?php  //month min
echo "<valuetextheading1>Record Max <deepblue>24th Oct 2018</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>100<smalltempunit2>%";
?><smalltempunit2></div></div>

<div class="almanac6x"><div class="almanac-content">
<?php  //min Year
echo "<valuetextheading1>Record Min <deepblue> 10th Apr 2020</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>11<smalltempunit2>%";
?><smalltempunit2></div></div>
</div>