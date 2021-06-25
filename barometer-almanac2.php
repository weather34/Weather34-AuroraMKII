<?php include('livedata.php');?> 
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
echo "".date('Y')." <orange>Max</orange> ".$weather["thb0seapressyearmaxtime"];
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