<?php include('livedata.php');

$weather["barometer"]=number_format($meteobridgeapi[10]*0.75006157584566,1);
$weather["barometer_max"]=number_format($meteobridgeapi[34]*0.75006157584566,1);
$weather["barometer_min"]=number_format($meteobridgeapi[36]*0.75006157584566,1);
    $weather["thb0seapressmmax"]=number_format($meteobridgeapi[139]*0.75006157584566,1);
    $weather["thb0seapressmmin"]=number_format($meteobridgeapi[141]*0.75006157584566,1);
    $weather["thb0seapressymax"]=number_format($meteobridgeapi[143]*0.75006157584566,1);
    $weather["thb0seapressymin"]=number_format($meteobridgeapi[145]*0.75006157584566,1);
    $weather["thb0seapressamax"]=number_format($meteobridgeapi[147]*0.75006157584566,1);
    $weather["thb0seapressamin"]=number_format($meteobridgeapi[149]*0.75006157584566,1);
    if ($weather["barometer_units"]=='hPa'){$weather["barometer_units"]='mmHg';}
    if ($weather["barometer_units"]=='inHg'){$weather["barometer_units"]='mmHg';}     

?>
<link href="console-dark.css?version=<?php echo filemtime('console-dark.css') ?>" rel="stylesheet prefetch">
<theword>Barometric Pressure (<blue><?php echo $weather["barometer_units"];?></blue>)</theword>
<extrainfoicon><?php echo $weather34_pressure_icon;?></extrainfoicon>
<div class="canvascredit">
<a class="canvascreditlink" href="https://canvasjs.com" target="_blank" data-title="CanvasJs.com" >
Charts compiled with CanvasJs.com <br>v2.3.1 GA (CC BY-NC 3.0) Non-Commercial-Version.</a></div></div>


<div class="weather34credit">
<a class="canvascreditlink" href="https://weather34.com/homeweatherstation" target="_blank" data-title="weather34.com" >
CSS/SVG/PHP developed by weather<blue>34</blue></a></div></div>


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