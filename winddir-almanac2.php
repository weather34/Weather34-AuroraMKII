<?php include('livedata.php');?>
<link href="console-dark.css?version=<?php echo filemtime('console-dark.css') ?>" rel="stylesheet prefetch">
<theword>Wind Direction </theword>
<extrainfoicon><?php echo $weather34compassicon;?></extrainfoicon>
<div class="canvascredit">
<a class="canvascreditlink" href="https://canvasjs.com" target="_blank" data-title="CanvasJs.com" >
Charts compiled with CanvasJs.com <br>v2.3.1 GA (CC BY-NC 3.0) Non-Commercial-Version.</a></div></div>

<div class="almanacouterboxrain">
<div class="almanacchartxx">
<monthchart style="margin-bottom:-40px;position:absolute;font-size:.7em">Current Day Wind Direction Chart</monthchart>
<iframe  class="charttempmodule" src="weather34charts/todaywinddirectionmodulechart2.php" frameborder="0" scrolling="no" width="320px" height="200px"></iframe>  
</div>
<br><br>
<div class="almanacx"><div class="almanac-content">
<?php  //month max
echo "<valuetextheading1>Average (Today) <deepblue>".date('l')."</deepblue></valuetextheading1><br>";   
echo "<div class=almanacareas>";
if( $weather["wind_direction_avgday"]<=11.25){echo "North";}else if( $weather["wind_direction_avgday"]<=33.75){echo "NNE";}else if( $weather["wind_direction_avgday"]<=56.25){echo "NE";}
else if( $weather["wind_direction_avgday"]<=78.75){echo "ENE";}else if( $weather["wind_direction_avgday"]<=101.25){echo "East";}else if( $weather["wind_direction_avgday"]<=123.75){echo "ESE";}
else if( $weather["wind_direction_avgday"]<=146.25){echo "SE";}else if( $weather["wind_direction_avgday"]<=168.75){echo "SSE";}else if( $weather["wind_direction_avgday"]<=191.25){echo "South";}
else if( $weather["wind_direction_avgday"]<=213.75){echo "SSW";}else if( $weather["wind_direction_avgday"]<=236.25){echo "SW";}else if( $weather["wind_direction_avgday"]<=258.75){echo "WSW";}
else if( $weather["wind_direction_avgday"]<=281.25){echo "West";}else if( $weather["wind_direction_avgday"]<=303.75){echo "WNW";}else if( $weather["wind_direction_avgday"]<=326.25){echo "NW";}
else if( $weather["wind_direction_avgday"]<=348.75){echo "NNW";}else if( $weather["wind_direction_avgday"]<=360){echo "North";}
echo "<smalltempunit2 style='padding-left:5px;font-size:13px;color:var(--blue);'> ".number_format($weather["wind_direction_avgday"],0)."&deg;";
?><smalltempunit2></div></div>

<div class="almanac2x"><div class="almanac-content">
<?php  //max year
echo "<valuetextheading1>Average <deepblue>".date('F')."</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>";
if( $weather["wind_direction_avgmonth"]<=11.25){echo "North";}else if( $weather["wind_direction_avgmonth"]<=33.75){echo "NNE";}else if( $weather["wind_direction_avgmonth"]<=56.25){echo "NE";}
else if( $weather["wind_direction_avgmonth"]<=78.75){echo "ENE";}else if( $weather["wind_direction_avgmonth"]<=101.25){echo "East";}else if( $weather["wind_direction_avgmonth"]<=123.75){echo "ESE";}
else if( $weather["wind_direction_avgmonth"]<=146.25){echo "SE";}else if( $weather["wind_direction_avgmonth"]<=168.75){echo "SSE";}else if( $weather["wind_direction_avgmonth"]<=191.25){echo "South";}
else if( $weather["wind_direction_avgmonth"]<=213.75){echo "SSW";}else if( $weather["wind_direction_avgmonth"]<=236.25){echo "SW";}else if( $weather["wind_direction_avgmonth"]<=258.75){echo "WSW";}
else if( $weather["wind_direction_avgmonth"]<=281.25){echo "West";}else if( $weather["wind_direction_avgmonth"]<=303.75){echo "WNW";}else if( $weather["wind_direction_avgmonth"]<=326.25){echo "NW";}
else if( $weather["wind_direction_avgmonth"]<=348.75){echo "NNW";}else if( $weather["wind_direction_avgmonth"]<=360){echo "North";}
echo "<smalltempunit2 style='padding-left:5px;font-size:13px;color:var(--blue);'> ".number_format($weather["wind_direction_avgmonth"],0)."&deg;";
?><smalltempunit2></div></div>

<div class="almanac3x"><div class="almanac-content">
<?php  //yestedaay average
echo "<valuetextheading1>Average <deepblue>Yesterday</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>";
if( $weather["wind_direction_ydayavg"]<=11.25){echo "North";}else if( $weather["wind_direction_ydayavg"]<=33.75){echo "NNE";}else if( $weather["wind_direction_ydayavg"]<=56.25){echo "NE";}
else if( $weather["wind_direction_ydayavg"]<=78.75){echo "ENE";}else if( $weather["wind_direction_ydayavg"]<=101.25){echo "East";}else if( $weather["wind_direction_ydayavg"]<=123.75){echo "ESE";}
else if( $weather["wind_direction_ydayavg"]<=146.25){echo "SE";}else if( $weather["wind_direction_ydayavg"]<=168.75){echo "SSE";}else if( $weather["wind_direction_ydayavg"]<=191.25){echo "South";}
else if( $weather["wind_direction_ydayavg"]<=213.75){echo "SSW";}else if( $weather["wind_direction_ydayavg"]<=236.25){echo "SW";}else if( $weather["wind_direction_ydayavg"]<=258.75){echo "WSW";}
else if( $weather["wind_direction_ydayavg"]<=281.25){echo "West";}else if( $weather["wind_direction_ydayavg"]<=303.75){echo "WNW";}else if( $weather["wind_direction_ydayavg"]<=326.25){echo "NW";}
else if( $weather["wind_direction_ydayavg"]<=348.75){echo "NNW";}else if( $weather["wind_direction_ydayavg"]<=360){echo "North";}
echo "<smalltempunit2 style='padding-left:5px;font-size:13px;color:var(--blue);'> ".number_format($weather["wind_direction_ydayavg"],0)."&deg;";
?><smalltempunit2></div></div>


<div class="almanac4x"><div class="almanac-content">
<?php  //min Year
echo "<valuetextheading1>Average <deepblue>".date('Y')."</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>";
if( $weather["wind_direction_avgyear"]<=11.25){echo "North";}else if( $weather["wind_direction_avgyear"]<=33.75){echo "NNE";}else if( $weather["wind_direction_avgyear"]<=56.25){echo "NE";}
else if( $weather["wind_direction_avgyear"]<=78.75){echo "ENE";}else if( $weather["wind_direction_avgyear"]<=101.25){echo "East";}else if( $weather["wind_direction_avgyear"]<=123.75){echo "ESE";}
else if( $weather["wind_direction_avgyear"]<=146.25){echo "SE";}else if( $weather["wind_direction_avgyear"]<=168.75){echo "SSE";}else if( $weather["wind_direction_avgyear"]<=191.25){echo "South";}
else if( $weather["wind_direction_avgyear"]<=213.75){echo "SSW";}else if( $weather["wind_direction_avgyear"]<=236.25){echo "SW";}else if( $weather["wind_direction_avgyear"]<=258.75){echo "WSW";}
else if( $weather["wind_direction_avgyear"]<=281.25){echo "West";}else if( $weather["wind_direction_avgyear"]<=303.75){echo "WNW";}else if( $weather["wind_direction_avgyear"]<=326.25){echo "NW";}
else if( $weather["wind_direction_avgyear"]<=348.75){echo "NNW";}else if( $weather["wind_direction_avgyear"]<=360){echo "North";}
echo "<smalltempunit2 style='padding-left:5px;font-size:13px;color:var(--blue);'> ".number_format($weather["wind_direction_avgyear"],0)."&deg;";
?><smalltempunit2></div></div>
