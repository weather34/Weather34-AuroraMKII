<?php include('livedata.php');?> 
<link href="weather34-theme.css?version=<?php echo filemtime('weather34-theme.css') ?>" rel="stylesheet prefetch">
<ul class="grid-containeralmcharts">
<li><iframe  class="charttempmodule3"  src="weather34charts/todaydewpointmodulechart2.php" frameborder="0" scrolling="no" ></iframe></li>
<li><iframe  class="charttempmodule3"  src="weather34charts/monthdewpointmodulechart2.php" frameborder="0" scrolling="no" ></iframe>  </li>
<li><iframe  class="charttempmodule3"  src="weather34charts/yeardewpointmodulechart2.php" frameborder="0" scrolling="no" ></iframe>  </li>


<li>
<div style="margin-top:10px;">

<alamanacword>Dewpoint History Data</alamanacword>

<div class="alamanacdata">
<?php  //month max
echo "".date('F')." <orange>Max</orange> ".$weather["dewmmaxtime"];
echo " ".$weather["dewmmax"]."&deg;".$weather["temp_units"];
?></div>
<div class="alamanacdata">
<?php  //month min
echo "".date('F')." <deepblue>Min</deepblue> ".$weather["dewmmintime"];
echo " ".$weather["dewmmin"]."&deg;".$weather["temp_units"];
?></div>

<div class="alamanacdata">
<?php  //year max
echo "".date('Y')." <orange>Max</orange> ".$weather["dewymaxtime"];
echo " ".$weather["dewymax"]."&deg;".$weather["temp_units"];
?></div>
<div class="alamanacdata">
<?php  //year min
echo "".date('Y')."  <deepblue>Min</deepblue> ".$weather["dewymintime"];
echo " ".$weather["dewymin"]."&deg;".$weather["temp_units"];
?></div>

<div class="alamanacdata">
<?php  //alltime max
echo "Alltime <orange>Max</orange> ".$weather["dewamaxtime"];
echo " ".$weather["dewamax"]."&deg;".$weather["temp_units"];
?></div>

<div class="alamanacdata">
<?php  //alltime min
echo "Alltime <deepblue>Min</deepblue> ".$weather["dewamintime"];
echo " ".$weather["dewamin"]."&deg;".$weather["temp_units"];
?></div>



</div>
</li>
</ul>
</div></div>
<weather34credit>
<a href="https://canvasjs.com" target="_blank" data-title="https://canvasjs.com" >
CanvasJs.com v2.3.1 GA (CC BY-NC 3.0) Non-Commercial-Version</a></weather34credit>