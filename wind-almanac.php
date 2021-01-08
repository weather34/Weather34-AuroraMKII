<?php include('livedata.php');?>
<div class="almanac-word">Windspeed</div>
<br><br>
<div class="almanac"><div class="almanac-content">
<?php  //month max
echo "<valuetextheading1>".date('F')." Max <deepblue>".$weather["windmmaxtime"]."</deepblue></valuetextheading1><br>";   
echo "<div class=tempmodulehome0-5c>".$weather["windmmax"]."<smalltempunit2>".$weather["wind_units"];
?><smalltempunit2></div></div>

<div class="almanac2"><div class="almanac-content">
<?php  //max year
echo "<valuetextheading1>".date('Y')." Max <deepblue>".$weather["windymaxtime"]."</deepblue></valuetextheading1><br>";
echo "<div class=tempmodulehome0-5c>".$weather["windymax"]."<smalltempunit2>".$weather["wind_units"];
 ?></smalltempunit2></div></div>

<div class="almanac3"><div class="almanac-content">
<?php  //month min
echo "<valuetextheading1>Yesterday Max <deepblue>".$weather["windydmaxtime"]."</deepblue></valuetextheading1><br>";
echo "<div class=tempmodulehome0-5c>".$weather["windydmax"]."<smalltempunit2>".$weather["wind_units"];
?><smalltempunit2></div></div>

<div class="almanac4"><div class="almanac-content">
<?php  //min Year
echo "<valuetextheading1>All Time Max <deepblue>".$weather["windamaxtime"]."</deepblue></valuetextheading1><br>";
echo "<div class=tempmodulehome0-5c>".$weather["windamax"]."<smalltempunit2>".$weather["wind_units"];
?><smalltempunit2></div></div>

<div class="weather-tempicon-identity" style="margin-top:78px;margin-left:130px">   
<?php echo "<icon-0-5>".$weather34_wind_icon."</icon-0-5>"; ?></div>