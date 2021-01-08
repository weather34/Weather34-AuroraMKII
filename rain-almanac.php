<?php include('livedata.php');?>
<div class="almanac-word">Rainfall</div>
<br><br>
<div class="almanac"><div class="almanac-content">
<?php  //month 
echo "<valuetextheading1>Total<deepblue>&nbsp;".date('F')."</deepblue> </valuetextheading1><br>";   
echo "<div class=tempmodulehome0-5c>".$weather["rainmmax"]."<smalltempunit2>".$weather["rain_units"];
?><smalltempunit2></div></div>

<div class="almanac2"><div class="almanac-content">
<?php  //yesterday
echo "<valuetextheading1>Yesterday <deepblue>Total</deepblue></valuetextheading1><br>";
echo "<div class=tempmodulehome0-5c>".$weather["rainydmax"]."<smalltempunit2>".$weather["rain_units"];
?><smalltempunit2></div></div>

<div class="almanac3"><div class="almanac-content">
<?php  //last month
echo "<valuetextheading1>Total <deepblue>Last Month</deepblue></valuetextheading1><br>";
if ($weather['rainlastmonth']=='[rain0total-max@M1]') {
echo "<div class=tempmodulehome0-5c>N/A";}

if ($weather['rainlastmonth']=='[rain0!0total-max@M1]') {
    echo "<div class=tempmodulehome0-5c>N/A";}
else echo "<div class=tempmodulehome0-5c>".$weather['rainlastmonth']."<smalltempunit2>".$weather["rain_units"];

?><smalltempunit2></div></div>

<div class="almanac4"><div class="almanac-content">
<?php  // year
echo "<valuetextheading1>Total<deepblue> ".date('Y')."  </deepblue></valuetextheading1><br>";
echo "<div class=tempmodulehome0-5c>".$weather["rainymax"]."<smalltempunit2>".$weather["rain_units"];
 ?>
</smalltempunit2></div></div>

<div class="almanac5"><div class="almanac-content">
<?php  //last year
echo "<valuetextheading1>Total <deepblue>".date('Y', strtotime('-1 year'))."</deepblue></valuetextheading1><br>";
if ($weather['rainlastyear']=='[rain0total-max@Y1]') {echo "<div class=tempmodulehome0-5c>N/A";}
if ($weather['rainlastyear']=='[rain0!0total-max@Y1]') {echo "<div class=tempmodulehome0-5c>N/A";}
else echo "<div class=tempmodulehome0-5c>".$weather['rainlastyear']."<smalltempunit2>".$weather["rain_units"];
?><smalltempunit2></div></div> 

<div class="almanac6"><div class="almanac-content">
<?php  //all time
// $totalrain=$weather["rainymax"]+ $weather['rainlastyear']; 
echo "<valuetextheading1>Total Since<deepblue>  ".$mbyear."</deepblue></valuetextheading1><br>";
echo "<div class=tempmodulehome0-5c>".$weather['rainalltime']."<smalltempunit2>".$weather["rain_units"];
?><smalltempunit2></div></div>
<div class="weather-tempicon-identity" style="margin-top:38px;margin-left:130px">   
<?php echo "<icon-16-20>".$weather34_rain_icon."</icon-16-20>"; ?></div>