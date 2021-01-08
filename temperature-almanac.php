<?php include('livedata.php');?> 
<div class="almanac-word">Temperature Records</div>
<br><br>
<div class="almanac"><div class="almanac-content">
<?php  //month max
echo "<valuetextheading1>".date('F')." Max <deepblue>".$weather["tempmmaxtime"]."</deepblue></valuetextheading1><br>";
echo "<div class=tempmodulehome0-5c>";
echo $weather["tempmmax"]."&deg;<smalltempunit2>".$weather["temp_units"];
?><smalltempunit2></div></div>

<div class="almanac2"><div class="almanac-content">
<?php  //max year
echo "<valuetextheading1>".date('Y')." Max <deepblue>".$weather["tempymaxtime"]."</deepblue></valuetextheading1><br>";
echo "<div class=tempmodulehome0-5c>";
echo $weather["tempymax"]."&deg;<smalltempunit2>".$weather["temp_units"];
 ?></smalltempunit2></div></div>
 
<div class="almanac3"><div class="almanac-content">
<?php  //month min
echo "<valuetextheading1>".date('F')." Min <deepblue>".$weather["tempmmintime"]."</deepblue></valuetextheading1><br>";
echo "<div class=tempmodulehome0-5c>";
echo $weather["tempmmin"]."&deg;<smalltempunit2>".$weather["temp_units"];
?><smalltempunit2></div></div>

<div class="almanac4"><div class="almanac-content">
<?php  //temp min Year
echo "<valuetextheading1>".date('Y')." Min <deepblue>".$weather["tempymintime"]."</deepblue></valuetextheading1><br>";
echo "<div class=tempmodulehome0-5c>";
echo $weather["tempymin"]."&deg;<smalltempunit2>".$weather["temp_units"];
?><smalltempunit2></div></div>

<div class="almanac5"><div class="almanac-content">
<?php  //all time max
echo "<valuetextheading1>Record Max <deepblue>".$weather["tempamaxtime"]."</deepblue></valuetextheading1><br>";
echo "<div class=tempmodulehome0-5c>";
echo $weather["tempamax"]."&deg;<smalltempunit2>".$weather["temp_units"];
?><smalltempunit2></div></div>

<div class="almanac6"><div class="almanac-content">
<?php  //all time min
echo "<valuetextheading1>Record Min <deepblue>".$weather["tempamintime"]."</deepblue></valuetextheading1><br>";
echo "<div class=tempmodulehome0-5c>";
echo $weather["tempamin"]."&deg;<smalltempunit2>".$weather["temp_units"];
?><smalltempunit2></div></div>

<div class="weather-tempicon-identity" style="margin-top:38px;margin-left:130px">    
<?php echo "<icon-16-20>".$weather34_temp_icon."</icon-16-20>"; ?></div>