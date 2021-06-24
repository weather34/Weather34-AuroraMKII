<?php include('livedata.php');?> 
<link href="weather34-theme.css?version=<?php echo filemtime('weather34-theme.css') ?>" rel="stylesheet prefetch">
<ul class="grid-containeralmcharts">
<li><iframe  class="charttempmodule3"  src="weather34charts/todaywinddirectionmodulechart2.php" frameborder="0" scrolling="no" ></iframe></li>
<li><iframe  class="charttempmodule3"  src="weather34charts/monthwinddirectionmodulechart2.php" frameborder="0" scrolling="no" ></iframe>  </li>
<li><iframe  class="charttempmodule3"  src="weather34charts/yearwinddirectionmodulechart2.php" frameborder="0" scrolling="no" ></iframe>  </li>


<li> 
<div style="margin-top:-20px;">

<alamanacword style="margin-left:30px;margin-top:-20px;">Wind Direction History Data</alamanacword>

<div class="alamanacdata">
<?php  //todays avg
echo "Todays <blue>Average Direction</blue>";
echo " ".$weather['wind_direction_avgday']."&deg; " ;

if( $weather["wind_direction_avgday"]<=11.25){echo "North";}else if( $weather["wind_direction_avgday"]<=33.75){echo "NNE";}else if( $weather["wind_direction_avgday"]<=56.25){echo "NE";}
else if( $weather["wind_direction_avgday"]<=78.75){echo "ENE";}else if( $weather["wind_direction_avgday"]<=101.25){echo "East";}else if( $weather["wind_direction_avgday"]<=123.75){echo "ESE";}
else if( $weather["wind_direction_avgday"]<=146.25){echo "SE";}else if( $weather["wind_direction_avgday"]<=168.75){echo "SSE";}else if( $weather["wind_direction_avgday"]<=191.25){echo "South";}
else if( $weather["wind_direction_avgday"]<=213.75){echo "SSW";}else if( $weather["wind_direction_avgday"]<=236.25){echo "SW";}else if( $weather["wind_direction_avgday"]<=258.75){echo "WSW";}
else if( $weather["wind_direction_avgday"]<=281.25){echo "West";}else if( $weather["wind_direction_avgday"]<=303.75){echo "WNW";}else if( $weather["wind_direction_avgday"]<=326.25){echo "NW";}
else if( $weather["wind_direction_avgday"]<=348.75){echo "NNW";}else if( $weather["wind_direction_avgday"]<=360){echo "North";}
?></div>

<div class="alamanacdata">
<?php  //yesterdays avg
echo "Yesterday <blue>Average Direction</blue>";
echo " ".$weather['wind_direction_ydayavg']."&deg; " ;

if( $weather["wind_direction_ydayavg"]<=11.25){echo "North";}else if( $weather["wind_direction_ydayavg"]<=33.75){echo "NNE";}else if( $weather["wind_direction_ydayavg"]<=56.25){echo "NE";}
else if( $weather["wind_direction_ydayavg"]<=78.75){echo "ENE";}else if( $weather["wind_direction_ydayavg"]<=101.25){echo "East";}else if( $weather["wind_direction_ydayavg"]<=123.75){echo "ESE";}
else if( $weather["wind_direction_ydayavg"]<=146.25){echo "SE";}else if( $weather["wind_direction_ydayavg"]<=168.75){echo "SSE";}else if( $weather["wind_direction_ydayavg"]<=191.25){echo "South";}
else if( $weather["wind_direction_ydayavg"]<=213.75){echo "SSW";}else if( $weather["wind_direction_ydayavg"]<=236.25){echo "SW";}else if( $weather["wind_direction_ydayavg"]<=258.75){echo "WSW";}
else if( $weather["wind_direction_ydayavg"]<=281.25){echo "West";}else if( $weather["wind_direction_ydayavg"]<=303.75){echo "WNW";}else if( $weather["wind_direction_ydayavg"]<=326.25){echo "NW";}
else if( $weather["wind_direction_ydayavg"]<=348.75){echo "NNW";}else if( $weather["wind_direction_ydayavg"]<=360){echo "North";}
?></div>

<div class="alamanacdata">
<?php  //month avg
echo date('F')." <blue>Average Direction</blue>";
echo " ".$weather['wind_direction_avgmonth']."&deg; " ;

if( $weather["wind_direction_avgmonth"]<=11.25){echo "North";}else if( $weather["wind_direction_avgmonth"]<=33.75){echo "NNE";}else if( $weather["wind_direction_avgmonth"]<=56.25){echo "NE";}
else if( $weather["wind_direction_avgmonth"]<=78.75){echo "ENE";}else if( $weather["wind_direction_avgmonth"]<=101.25){echo "East";}else if( $weather["wind_direction_avgmonth"]<=123.75){echo "ESE";}
else if( $weather["wind_direction_avgmonth"]<=146.25){echo "SE";}else if( $weather["wind_direction_avgmonth"]<=168.75){echo "SSE";}else if( $weather["wind_direction_avgmonth"]<=191.25){echo "South";}
else if( $weather["wind_direction_avgmonth"]<=213.75){echo "SSW";}else if( $weather["wind_direction_avgmonth"]<=236.25){echo "SW";}else if( $weather["wind_direction_avgmonth"]<=258.75){echo "WSW";}
else if( $weather["wind_direction_avgmonth"]<=281.25){echo "West";}else if( $weather["wind_direction_avgmonth"]<=303.75){echo "WNW";}else if( $weather["wind_direction_avgmonth"]<=326.25){echo "NW";}
else if( $weather["wind_direction_avgmonth"]<=348.75){echo "NNW";}else if( $weather["wind_direction_avgmonth"]<=360){echo "North";}
?></div>

<div class="alamanacdata">
<?php  //month avg
echo date('Y')." <blue>Average Direction</blue>";
echo " ".$weather['wind_direction_avgyear']."&deg; " ;

if( $weather["wind_direction_avgyear"]<=11.25){echo "North";}else if( $weather["wind_direction_avgyear"]<=33.75){echo "NNE";}else if( $weather["wind_direction_avgyear"]<=56.25){echo "NE";}
else if( $weather["wind_direction_avgyear"]<=78.75){echo "ENE";}else if( $weather["wind_direction_avgyear"]<=101.25){echo "East";}else if( $weather["wind_direction_avgyear"]<=123.75){echo "ESE";}
else if( $weather["wind_direction_avgyear"]<=146.25){echo "SE";}else if( $weather["wind_direction_avgyear"]<=168.75){echo "SSE";}else if( $weather["wind_direction_avgyear"]<=191.25){echo "South";}
else if( $weather["wind_direction_avgyear"]<=213.75){echo "SSW";}else if( $weather["wind_direction_avgyear"]<=236.25){echo "SW";}else if( $weather["wind_direction_avgyear"]<=258.75){echo "WSW";}
else if( $weather["wind_direction_avgyear"]<=281.25){echo "West";}else if( $weather["wind_direction_avgyear"]<=303.75){echo "WNW";}else if( $weather["wind_direction_avgyear"]<=326.25){echo "NW";}
else if( $weather["wind_direction_avgyear"]<=348.75){echo "NNW";}else if( $weather["wind_direction_avgyear"]<=360){echo "North";}
?></div>



</div>
</li>
</ul>
</div></div>
<weather34credit>
<a href="https://canvasjs.com" target="_blank" data-title="https://canvasjs.com" >
CanvasJs.com v2.3.1 GA (CC BY-NC 3.0) Non-Commercial-Version</a></weather34credit>
