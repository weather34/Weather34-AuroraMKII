<?php include('livedata.php');?> 
<link href="weather34-theme.css?version=<?php echo filemtime('weather34-theme.css') ?>" rel="stylesheet prefetch">
<ul class="grid-containeralmcharts">
<li><iframe  class="charttempmodule3"  src="weather34charts/todaywindspeedmodulechart2.php" frameborder="0" scrolling="no" ></iframe></li>
<li><iframe  class="charttempmodule3"  src="weather34charts/monthwindspeedmodulechart2.php" frameborder="0" scrolling="no" ></iframe>  </li>
<li><iframe  class="charttempmodule3"  src="weather34charts/yearwindspeedmodulechart2.php" frameborder="0" scrolling="no" ></iframe>  </li>


<li>
<div style="margin-top:10px;">

<alamanacword>Wind Speed History Data</alamanacword>

<div class="alamanacdata">
<?php  //yesterday max
echo "Yesterday <orange>Max</orange> ".$weather["windydmaxtime"];
echo " ".$weather["windydmax"]." ".$weather["wind_units"] ;
?></div>

<div class="alamanacdata">
<?php  //month max
echo "".date('F')." <orange>Max</orange> ".$weather["windmmaxtime"];
echo " ".$weather["windmmax"]." ".$weather["wind_units"] ;
?></div>

<div class="alamanacdata">
<?php  //year max
echo "".date('Y')." <orange>Max</orange> ".$weather["windymaxtime"];
echo " ".$weather["windymax"]." ".$weather["wind_units"] ;
?></div>

<div class="alamanacdata">
<?php  //alltime max
echo "All Time <orange>Max</orange> ".$weather["windamaxtime"];
echo " ".$weather["windamax"]." ".$weather["wind_units"] ;
?></div>



</div>
</li>
</ul>
</div></div>
<weather34credit>
<a href="https://canvasjs.com" target="_blank" data-title="https://canvasjs.com" >
CanvasJs.com v2.3.1 GA (CC BY-NC 3.0) Non-Commercial-Version</a></weather34credit>