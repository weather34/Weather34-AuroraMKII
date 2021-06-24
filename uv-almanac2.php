<?php include('livedata.php');?> 
<link href="weather34-theme.css?version=<?php echo filemtime('weather34-theme.css') ?>" rel="stylesheet prefetch">
<ul class="grid-containeralmcharts">
<li><iframe  class="charttempmodule3"  src="weather34charts/todayuvmodulechart2.php" frameborder="0" scrolling="no" ></iframe></li>
<li><iframe  class="charttempmodule3"  src="weather34charts/monthuvindexmodulechart2.php" frameborder="0" scrolling="no" ></iframe>  </li>
<li><iframe  class="charttempmodule3"  src="weather34charts/yearuvindexmodulechart2.php" frameborder="0" scrolling="no" ></iframe>  </li>


<li>
<div style="margin-top:20px;">

<alamanacword style="margin-left:30px;margin-top:-20px;">UVINDEX History Data</alamanacword>

<div class="alamanacdata">
<?php  //Today UV
echo "Today <orange>Max</orange> ".$weather["uvdmaxtime"];
echo " ".$weather["uvdmax"]." UVI ";
?></div>

<div class="alamanacdata">
<?php  //Yesterday UV
echo "Yesterday <orange>Max</orange> ".$weather["uvydmaxtime"];
echo " ".$weather["uvydmax"]." UVI ";
?></div>

<div class="alamanacdata">
<?php  //MONTH UV
echo "".date('F')." <orange>Max</orange> ".$weather["uvmmaxtime"];
echo " ".$weather["uvmmax"]." UVI ";
?></div>

<div class="alamanacdata">
<?php  //YEAR UV
echo "".date('Y')." <orange>Max</orange> ".$weather["uvymaxtime"];
echo " ".$weather["uvymax"]." UVI ";
?></div>

<div class="alamanacdata">
<?php  //ALL TIME UV
echo "All Time <orange>Max</orange> 28th Jul 2019";
echo " 10.4 UVI ";
?></div>

</weather34credit>

</div>
</li>
</ul>
</div></div>
<weather34credit>
<a href="https://canvasjs.com" target="_blank" data-title="https://canvasjs.com" >
CanvasJs.com v2.3.1 GA (CC BY-NC 3.0) Non-Commercial-Version</a></weather34credit>


<span style="position:absolute;margin-left:200px;">
<a href='solar-almanac2.php' data-lity data-title="Solar Almanac"> <?php echo $solarpanelicon2?> Solar Radiation Data </a></span>

