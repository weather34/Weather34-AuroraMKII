<?php include('livedata.php');?> 
<link href="weather34-theme.css?version=<?php echo filemtime('weather34-theme.css') ?>" rel="stylesheet prefetch">
<ul class="grid-containeralmcharts">
<li><iframe  class="charttempmodule3"  src="weather34charts/todaysolarmodulechart2.php" frameborder="0" scrolling="no" ></iframe></li>
<li><iframe  class="charttempmodule3"  src="weather34charts/monthsolarmodulechart2.php" frameborder="0" scrolling="no" ></iframe>  </li>
<li><iframe  class="charttempmodule3"  src="weather34charts/yearsolarmodulechart2.php" frameborder="0" scrolling="no" ></iframe>  </li>


<li>
<div style="margin-top:20px;">

<alamanacword style="margin-left:30px;margin-top:-20px;">Solar Radiation History Data</alamanacword>

<div class="alamanacdata">
<?php  //Today Solar
echo "Today <orange>Max</orange> ".$weather["solardmaxtime"];
echo " ".$weather["solardmax"]." W/m&#178; ";
?></div>

<div class="alamanacdata">
<?php  //Yesterday Solar
echo "Yesterday <orange>Max</orange> ".$weather["solarydmaxtime"];
echo " ".$weather["solarydmax"]." W/m&#178; ";
?></div>

<div class="alamanacdata">
<?php  //MONTH Solar
echo "".date('F')." <orange>Max</orange> ".$weather["solarmmaxtime"];
echo " ".$weather["solarmmax"]." W/m&#178; ";
?></div>

<div class="alamanacdata">
<?php  //YEAR Solar
echo "".date('Y')." <orange>Max</orange> ".$weather["solarymaxtime"];
echo " ".$weather["solarymax"]." W/m&#178; ";
?></div>
<div class="alamanacdata">
<?php  //All time Solar
echo "".date('Y')." <orange>Max</orange> ".$weather["solaramaxtime"];
echo " ".$weather["solaramax"]." W/m&#178; ";
?></div>






</div>
</li>
</ul>
</div></div>
<weather34credit>
<a href="https://canvasjs.com" target="_blank" data-title="https://canvasjs.com" >
CanvasJs.com v2.3.1 GA (CC BY-NC 3.0) Non-Commercial-Version</a></weather34credit>
