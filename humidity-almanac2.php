<?php include('livedata.php');?> 
<link href="weather34-theme.css?version=<?php echo filemtime('weather34-theme.css') ?>" rel="stylesheet prefetch">
<ul class="grid-containeralmcharts">
<li><iframe  class="charttempmodule3"  src="weather34charts/todayhumiditymodulechart2.php" frameborder="0" scrolling="no" ></iframe></li>

<li><iframe  class="charttempmodule3"  style="margin-top:100px" src="weather34charts/todayindoormodulechart-humidity-large.php" frameborder="0" scrolling="no" ></iframe></li>



<li>
<div style="margin-top:10px;">

<alamanacword>Humidity History Data</alamanacword>



<div class="alamanacdata">
<?php  //yesterday max
echo "Yesterday <orange>Max</orange> ".$weather["humidity_ydmaxtime"];
echo " ".$weather["humidity_ydmax"]."%";
?></div>
<div class="alamanacdata">
<?php  //yesterday min
echo "Yesterday <deepblue>Min</deepblue> ".$weather["humidity_ydmintime"];
echo " ".$weather["humidity_ydmin"]."%";
?></div>



<div class="alamanacdata">
<?php  //month max
echo "".date('F')." <orange>Max</orange> ".$weather["humidity_mmaxtime"];
echo " ".$weather["humidity_mmax"]."%";
?></div>
<div class="alamanacdata">
<?php  //month min
echo "".date('F')." <deepblue>Min</deepblue> ".$weather["humidity_mmintime"];
echo " ".$weather["humidity_mmin"]."%";
?></div>

<div class="alamanacdata">
<?php  //year max
echo "".date('Y')." <orange>Max</orange> ".$weather["humidity_ymaxtime"];
echo " ".$weather["humidity_ymax"]."%";
?></div>
<div class="alamanacdata">
<?php  //year min
echo "".date('Y')."  <deepblue>Min</deepblue> ".$weather["humidity_ymintime"];
echo " ".$weather["humidity_ymin"]."%";
?></div>



</div>
</li>
</ul>
</div></div>
<weather34credit>
<a href="https://canvasjs.com" target="_blank" data-title="https://canvasjs.com" >
CanvasJs.com v2.3.1 GA (CC BY-NC 3.0) Non-Commercial-Version</a></weather34credit>