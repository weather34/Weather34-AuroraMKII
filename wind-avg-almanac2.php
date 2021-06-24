<?php include('livedata.php');?> 
<link href="weather34-theme.css?version=<?php echo filemtime('weather34-theme.css') ?>" rel="stylesheet prefetch">
<ul class="grid-containeralmcharts">
<li><iframe  class="charttempmodule3"  src="weather34charts/todaywindaveragemodulechart2.php" frameborder="0" scrolling="no" ></iframe></li>
<li><iframe  class="charttempmodule3"  src="weather34charts/monthavgwindspeedmodulechart2.php" frameborder="0" scrolling="no" ></iframe>  </li>
<li><iframe  class="charttempmodule3"  src="weather34charts/yearavgwindspeedmodulechart2.php" frameborder="0" scrolling="no" ></iframe>  </li>


<li>
<div style="margin-top:-20px;">

<alamanacword style="margin-left:30px;margin-top:-20px;">Wind Speed Average History Data</alamanacword>

<div class="alamanacdata">
<?php  //todays avg
echo "Todays <blue>Average</blue>";
echo " ".$weather['wind_speed_avgday']." ".$weather["wind_units"] ;
?></div>


<div class="alamanacdata">
<?php  //yesterday avg
echo "Yesterday <blue>Average</blue>";
echo " ".$weather['wind_speed_ydavg']." ".$weather["wind_units"] ;
?></div>






</div>
</li>
</ul>
</div></div>
<weather34credit>
<a href="https://canvasjs.com" target="_blank" data-title="https://canvasjs.com" >
CanvasJs.com v2.3.1 GA (CC BY-NC 3.0) Non-Commercial-Version</a></weather34credit>
