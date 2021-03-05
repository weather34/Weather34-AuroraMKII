<?php include('livedata.php');?> 
<link href="console-dark.css?version=<?php echo filemtime('console-dark.css') ?>" rel="stylesheet prefetch">
<theword>Temperature (<blue>&deg;<?php echo $weather["temp_units"];?></blue>)</theword>
<extrainfoicon><?php echo $weather34_temp_icon;?></extrainfoicon>
<div class="canvascredit">
<a class="canvascreditlink" href="https://canvasjs.com" target="_blank" data-title="CanvasJs.com" >
Charts compiled with CanvasJs.com <br>v2.3.1 GA (CC BY-NC 3.0) Non-Commercial-Version.</a></div></div>


<div class="weather34credit">
<a class="canvascreditlink" href="https://weather34.com/homeweatherstation" target="_blank" data-title="weather34.com" >
CSS/SVG/PHP developed by weather<blue>34</blue></a></div></div>
<div class="almanacouterboxrain">
<br><br>
<div class="almanacchartx">
<monthchart>Current Day Temperature Chart</monthchart>
<iframe  class="charttempmodule" src="weather34charts/todaytempmodulechart2a.php" frameborder="0" scrolling="no" width="320px" height="200px"></iframe>  
</div>
<div class="almanacx"><div class="almanac-content">
<?php  //month max
echo "<valuetextheading1>".date('F')." Max <deepblue>".$weather["tempmmaxtime"]."</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>";
echo $weather["tempmmax"]."&deg;<smalltempunit2>".$weather["temp_units"];
?><smalltempunit2></div></div>

<div class="almanac2x"><div class="almanac-content">
<?php  //max year
echo "<valuetextheading1>".date('Y')." Max <deepblue>".$weather["tempymaxtime"]."</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>";
echo $weather["tempymax"]."&deg;<smalltempunit2>".$weather["temp_units"];
 ?></smalltempunit2></div></div>
 
<div class="almanac3x"><div class="almanac-content">
<?php  //month min
echo "<valuetextheading1>".date('F')." Min <deepblue>".$weather["tempmmintime"]."</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>";
echo $weather["tempmmin"]."&deg;<smalltempunit2>".$weather["temp_units"];
?><smalltempunit2></div></div>

<div class="almanac4x"><div class="almanac-content">
<?php  //temp min Year
echo "<valuetextheading1>".date('Y')." Min <deepblue>".$weather["tempymintime"]."</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>";
echo $weather["tempymin"]."&deg;<smalltempunit2>".$weather["temp_units"];
?><smalltempunit2></div></div>

<div class="almanac5x"><div class="almanac-content">
<?php  //all time max
echo "<valuetextheading1>Record Max <deepblue>".$weather["tempamaxtime"]."</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>";
echo $weather["tempamax"]."&deg;<smalltempunit2>".$weather["temp_units"];
?><smalltempunit2></div></div>

<div class="almanac6x"><div class="almanac-content">
<?php  //all time min
echo "<valuetextheading1>Record Min <deepblue>".$weather["tempamintime"]."</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>";
echo $weather["tempamin"]."&deg;<smalltempunit2>".$weather["temp_units"];
?><smalltempunit2></div></div>

</div>
