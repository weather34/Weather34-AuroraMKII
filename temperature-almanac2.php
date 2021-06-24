<?php include('livedata.php');?> 
<link href="weather34-theme.css?version=<?php echo filemtime('weather34-theme.css') ?>" rel="stylesheet prefetch">
<ul class="grid-containeralmcharts">
<li><iframe  class="charttempmodule3"  src="weather34charts/todaytempmodulechart2.php" frameborder="0" scrolling="no" ></iframe></li>
<li><iframe  class="charttempmodule3"  src="weather34charts/monthtemperaturemodulechart2.php" frameborder="0" scrolling="no" ></iframe>  </li>
<li><iframe  class="charttempmodule3"  src="weather34charts/yeartemperaturemodulechart2.php" frameborder="0" scrolling="no" ></iframe>  </li>


<li>
<div style="margin-top:10px;">

<alamanacword>Temperature History Data</alamanacword>

<div class="alamanacdata">
<?php  //month max
echo "".date('F')." <orange>Max</orange> ".$weather["tempmmaxtime"];
echo " ".$weather["tempmmax"]."&deg;".$weather["temp_units"];
?></div>
<div class="alamanacdata">
<?php  //month min
echo "".date('F')." <deepblue>Min</deepblue> ".$weather["tempmmintime"];
echo " ".$weather["tempmmin"]."&deg;".$weather["temp_units"];
?></div>

<div class="alamanacdata">
<?php  //year max
echo "".date('Y')." <orange>Max</orange> ".$weather["tempymaxtime"];
echo " ".$weather["tempymax"]."&deg;".$weather["temp_units"];
?></div>
<div class="alamanacdata">
<?php  //year min
echo "".date('Y')."  <deepblue>Min</deepblue> ".$weather["tempymintime"];
echo " ".$weather["tempymin"]."&deg;".$weather["temp_units"];
?></div>

<div class="alamanacdata">
<?php  //alltime max
echo "Alltime <orange>Max</orange> ".$weather["tempamaxtime"];
echo " ".$weather["tempamax"]."&deg;".$weather["temp_units"];
?></div>

<div class="alamanacdata">
<?php  //alltime min
echo "Alltime <deepblue>Min</deepblue> ".$weather["tempamintime"];
echo " ".$weather["tempamin"]."&deg;".$weather["temp_units"];
?></div>



</div>
</li>
</ul>
</div></div>
<weather34credit>
<a href="https://canvasjs.com" target="_blank" data-title="https://canvasjs.com" >
CanvasJs.com v2.3.1 GA (CC BY-NC 3.0) Non-Commercial-Version</a></weather34credit>