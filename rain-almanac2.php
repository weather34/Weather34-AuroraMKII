<?php include('livedata.php');?> 
<link href="weather34-theme.css?version=<?php echo filemtime('weather34-theme.css') ?>" rel="stylesheet prefetch">
<ul class="grid-containeralmcharts">
<li><iframe  class="charttempmodule3"  src="weather34charts/todayrainfallmodulechart2.php" frameborder="0" scrolling="no" ></iframe></li>
<li><iframe  class="charttempmodule3"  src="weather34charts/monthrainfallmodulechart2.php" frameborder="0" scrolling="no" ></iframe>  </li>
<li><iframe  class="charttempmodule3"  src="weather34charts/yearrainfallmodulechart2.php" frameborder="0" scrolling="no" ></iframe>  </li>


<li>
<div style="margin-top:10px;">

<alamanacword>Rainfall History Data</alamanacword>



<div class="alamanacdata">
<?php  //yesterday
echo "<deepblue>Yesterday</deepblue>";
echo " ".$weather["rainydmax"]."".$weather["rain_units"];
?></div>
<br>
<div class="alamanacdata">
<?php  //month 
echo "".date('F')." <blue>Total</blue>";
echo " ".$weather["rainmmax"]."".$weather["rain_units"];
?></div>
<br>
<div class="alamanacdata">
<?php  //LAST month 
echo "".date("M ",strtotime("-1 month"))." <blue>Total</blue>";
echo " ".$weather['rainlastmonth']."".$weather["rain_units"];
?></div>
<br>

<div class="alamanacdata">
<?php  //Year  
echo "".date('Y')." <blue>Total</blue>";
echo " ".$weather["rainymax"]."".$weather["rain_units"];
?></div>
<br>

<div class="alamanacdata">
<?php  //Last Year  
echo "".date('Y', strtotime('-1 year'))." <blue>Total</blue>";
echo " ".$weather['rainlastyear']."".$weather["rain_units"];
?></div>


<div class="alamanacdata">
<?php  //All Time  
echo "Since ".$mbyear." <blue>Total</blue>";
echo " ".$weather['rainalltime']."".$weather["rain_units"];
?></div>



</div>
</li>
</ul>
</div></div>
<weather34credit>
<a href="https://canvasjs.com" target="_blank" data-title="https://canvasjs.com" >
CanvasJs.com v2.3.1 GA (CC BY-NC 3.0) Non-Commercial-Version</a></weather34credit>