<?php include('livedata.php');?>
<div class="almanac-word">Humidity</div>
<br><br>
<div class="almanac"><div class="almanac-content">
<?php  //month max
echo "<valuetextheading1>".date('F')." Max <deepblue>".$weather["humidity_mmaxtime"]."</deepblue></valuetextheading1><br>";   
echo "<div class=tempmodulehome0-5c>".$weather["humidity_mmax"]."<smalltempunit2>%";
?><smalltempunit2></div></div>

<div class="almanac2"><div class="almanac-content">
<?php  //max year
echo "<valuetextheading1>".date('Y')." Max <deepblue>".$weather["humidity_ymaxtime"]."</deepblue></valuetextheading1><br>";
echo "<div class=tempmodulehome0-5c>".$weather["humidity_ymax"]."<smalltempunit2>%";
 ?></smalltempunit2></div></div>

<div class="almanac3"><div class="almanac-content">
<?php  //month min
echo "<valuetextheading1>".date('F')." Min <deepblue>".$weather["humidity_mmintime"]."</deepblue></valuetextheading1><br>";
echo "<div class=tempmodulehome0-5c>".$weather["humidity_mmin"]."<smalltempunit2>%";
?><smalltempunit2></div></div>

<div class="almanac4"><div class="almanac-content">
<?php  //min Year
echo "<valuetextheading1>".date('Y')." Min <deepblue>".$weather["humidity_ymintime"]."</deepblue></valuetextheading1><br>";
echo "<div class=tempmodulehome0-5c>".$weather["humidity_ymin"]."<smalltempunit2>%";
?><smalltempunit2></div></div>

<div class="almanac5"><div class="almanac-content">
<?php  // max
echo "<valuetextheading1>Yesterday Max <deepblue>".$weather["humidity_ydmaxtime"]."</deepblue></valuetextheading1><br>";
echo "<div class=tempmodulehome0-5c>".$weather["humidity_ydmax"]."<smalltempunit2>%";
?><smalltempunit2></div></div>

<div class="almanac6"><div class="almanac-content">
<?php  //min
echo "<valuetextheading1>Yesterday Min <deepblue>".$weather["humidity_ydmintime"]."</deepblue></valuetextheading1><br>";
echo "<div class=tempmodulehome0-5c>".$weather["humidity_ydmin"]."<smalltempunit2>%";
?><smalltempunit2></div></div>

<div class="weather-tempicon-identity" style="margin-top:38px;margin-left:130px">   
<?php echo "<icon-0-5>".$weather34_humidity_icon."</icon-0-5>"; ?></div>