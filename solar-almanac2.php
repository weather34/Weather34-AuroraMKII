<?php include('livedata.php');?>
<link href="console-dark.css?version=<?php echo filemtime('console-dark.css') ?>" rel="stylesheet prefetch">
<theword>Solar W/m&#178;</theword>
<extrainfoiconuv><?php echo $solarpanelicon?></extrainfoiconuv>
<div class="canvascredit">
<a class="canvascreditlink" href="https://canvasjs.com" target="_blank" data-title="CanvasJs.com" >
Charts compiled with CanvasJs.com <br>v2.3.1 GA (CC BY-NC 3.0) Non-Commercial-Version.</a></div></div>


<div class="weather34credit">
<a class="canvascreditlink" href="https://weather34.com/homeweatherstation" target="_blank" data-title="weather34.com" >
CSS/SVG/PHP developed by weather<blue>34</blue></a></div></div>
<div class="almanacouterboxrain">
<div class="almanacchartxuv" ><br><br>
<monthchart style="margin-top:40px">Current Day Solar Radiation Chart</monthchart>
<iframe  class="charttempmodule" src="weather34charts/todaysolarmodulechart2.php" frameborder="0" scrolling="no" width="320px" height="200px"></iframe>  
</div>

<div class="almanacxuv"><div class="almanac-content">
<?php  //month max
echo "<valuetextheading1>".date('F')." Max <deepblue>".$weather["solarmmaxtime"]."</deepblue></valuetextheading1><br>";   
echo "<div class=almanacareas>".$weather["solarmmax"]	."<smalltempunit2>W/m&#178;";
?><smalltempunit2></div></div>

<div class="almanac2xuv"><div class="almanac-content">
<?php  //max year
echo "<valuetextheading1>".date('Y')." Max <deepblue>".$weather["solarymaxtime"]."</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>".$weather["solarymax"]."<smalltempunit2>W/m&#178;";
 ?></smalltempunit2></div></div>

<div class="almanac3xuv"><div class="almanac-content">
<?php  //yesterday
echo "<valuetextheading1>Yesterday Max <deepblue>".$weather["solarydmaxtime"]."</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>".$weather["solarydmax"]."<smalltempunit2>W/m&#178;";
?><smalltempunit2></div></div>

<div class="almanac4xuv"><div class="almanac-content">
<?php  //All time
echo "<valuetextheading1>Record Max <deepblue>".$weather["solaramaxtime"]."</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>".$weather["solaramax"]."<smalltempunit2>W/m&#178;";
?><smalltempunit2></div></div>

<br><br>
</div>
