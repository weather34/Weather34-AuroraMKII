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
<link href="weather34-theme.css?version=<?php echo filemtime('weather34-theme.css') ?>" rel="stylesheet prefetch">
<ul class="grid-containeralmcharts">
<li><iframe  class="charttempmodule3"  src="weather34charts/todaybarometermodulechart2.php" frameborder="0" scrolling="no" ></iframe></li>
<li><iframe  class="charttempmodule3"  src="weather34charts/monthbarometermodulechart2.php" frameborder="0" scrolling="no" ></iframe>  </li>
<li><iframe  class="charttempmodule3"  src="weather34charts/yearbarometermodulechart2.php" frameborder="0" scrolling="no" ></iframe>  </li>
<li>
<div style="margin-top:10px;">
<alamanacword>Barometer History Data</alamanacword>

<div class="alamanacdata">
<?php  //month max
echo "".date('F')." <orange>Max</orange> ".$weather["thb0seapressmonthmaxtime"];
echo " ".$weather["thb0seapressmmax"]."".$weather["barometer_units"] ;
?></div>
<div class="alamanacdata">
<?php  //month min
echo "".date('F')." <deepblue>Min</deepblue> ".$weather["thb0seapressmonthmintime"];
echo " ".$weather["thb0seapressmmin"]."".$weather["barometer_units"] ;
?></div>

<div class="alamanacdata">
<?php  //year max
echo "".date('F')." <orange>Max</orange> ".$weather["thb0seapressyearmaxtime"];
echo " ".$weather["thb0seapressymax"]."".$weather["barometer_units"] ;
?></div>
<div class="alamanacdata">
<?php  //year min
echo "".date('Y')."  <deepblue>Min</deepblue> ".$weather["thb0seapressyearmintime"];
echo " ".$weather["thb0seapressymin"]."".$weather["barometer_units"] ;
?></div>

<div class="alamanacdata">
<?php  //alltime max
echo "Alltime <orange>Max</orange> ".$weather["thb0seapressamaxtime"];
echo " ".$weather["thb0seapressamax"]."".$weather["barometer_units"] ;
?></div>

<div class="alamanacdata">
<?php  //alltime min
echo "Alltime <deepblue>Min</deepblue> ".$weather["thb0seapressamintime"];
echo " ".$weather["thb0seapressamin"]."".$weather["barometer_units"] ;
?></div>



</div>
</li>
</ul>
</div></div>
<weather34credit>
<a href="https://canvasjs.com" target="_blank" data-title="https://canvasjs.com" >
CanvasJs.com v2.3.1 GA (CC BY-NC 3.0) Non-Commercial-Version</a></weather34credit>