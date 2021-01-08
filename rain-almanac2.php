<?php include('livedata.php');?>
<link href="console-dark.css?version=<?php echo filemtime('console-dark.css') ?>" rel="stylesheet prefetch">
<theword>Rainfall </theword>
<div class="almanacouterboxrain">
<br><br>
<div class="almanacchartx">
<monthchart>Current Day Rainfall Chart</monthchart>
<iframe  class="charttempmodule" src="weather34charts/todayrainfallmodulechart2.php" frameborder="0" scrolling="no" width="320px" height="200px"></iframe>  
</div>
<div class="almanacx"><div class="almanac-content">
<?php  //month 
echo "<valuetextheading1>Total<deepblue> ".date('F Y')."</deepblue> </valuetextheading1><br>";   
echo "<div class=almanacareas>".$weather["rainmmax"]."<smalltempunit2>".$weather["rain_units"];
?><smalltempunit2></div></div>

<div class="almanac2x"><div class="almanac-content">
<?php  //yesterday
echo "<valuetextheading1>Yesterday <deepblue>Total</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>".$weather["rainydmax"]."<smalltempunit2>".$weather["rain_units"];
?><smalltempunit2></div></div>

<div class="almanac3x"><div class="almanac-content">
<?php  //last month
echo "<valuetextheading1>Total Last Month <deepblue>".date("M ",strtotime("-1 month"))."</deepblue> </valuetextheading1><br>";
echo "<div class=almanacareas>".$weather['rainlastmonth']."<smalltempunit2>".$weather["rain_units"];
?><smalltempunit2></div></div>

<div class="almanac4x"><div class="almanac-content">
<?php  // year
echo "<valuetextheading1>Total<deepblue> ".date('Y')."  </deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>".$weather["rainymax"]."<smalltempunit2>".$weather["rain_units"];
 ?></smalltempunit2></div></div>

<div class="almanac5x"><div class="almanac-content">
<?php  //last year
echo "<valuetextheading1>Total <deepblue>".date('Y', strtotime('-1 year'))."</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>".$weather['rainlastyear']."<smalltempunit2>".$weather["rain_units"];
?><smalltempunit2></div></div>

<div class="almanac6x"><div class="almanac-content">
<?php  //all time
echo "<valuetextheading1>Recorded since <deepblue>".$mbyear."</deepblue></valuetextheading1><br>";
echo "<div class=tempconverter1><div class=almanacareas>".$weather["rainalltime"]."<smalltempunit2>".$weather["rain_units"];
?><smalltempunit2></div></div></div>
