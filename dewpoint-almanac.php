<?php include('livedata.php');?>
<div class="almanac-word">Dewpoint</div>
<br><br>
<div class="almanac"><div class="almanac-content">
<?php  //month max
echo "<valuetextheading1>".date('F')." Max <deepblue>".$weather["dewmmaxtime"]."</deepblue></valuetextheading1><br>";
echo "<div class=tempmodulehome0-5c>";
echo $weather["dewmmax"]."&deg;<smalltempunit2>".$weather["temp_units"];
?><smalltempunit2></div></div>

<div class="almanac2"><div class="almanac-content">
<?php  //max year
echo "<valuetextheading1>".date('Y')." Max <deepblue>".$weather["dewymaxtime"]."</deepblue></valuetextheading1><br>";
echo "<div class=tempmodulehome0-5c>";
echo $weather["dewymax"]."&deg;<smalltempunit2>".$weather["temp_units"];
?></smalltempunit2></div></div>

<div class="almanac3"><div class="almanac-content">
<?php  //month min
echo "<valuetextheading1>".date('F')." Min <deepblue>".$weather["tempmmintime"]."</deepblue></valuetextheading1><br>";
echo "<div class=tempmodulehome0-5c>";
echo $weather["dewmmin"]."&deg;<smalltempunit2>".$weather["temp_units"];
?><smalltempunit2></div></div>

<div class="almanac4"><div class="almanac-content">
<?php  //temp min Year
echo "<valuetextheading1>".date('Y')." Min <deepblue>".$weather["tempymintime"]."</deepblue></valuetextheading1><br>";
echo "<div class=tempmodulehome0-5c>";
echo $weather["dewymin"]."&deg;<smalltempunit2>".$weather["temp_units"];
?><smalltempunit2></div></div>


<div class="almanac5"><div class="almanac-content">
<?php  //all time max
echo "<valuetextheading1>All Time Max <deepblue>".$weather["dewamaxtime"]."</deepblue></valuetextheading1><br>";
echo "<div class=tempmodulehome0-5c>";
echo $weather["dewamax"]."&deg;<smalltempunit2>".$weather["temp_units"];
?><smalltempunit2></div></div>

<div class="almanac6"><div class="almanac-content">
<?php  //all time min
echo "<valuetextheading1>All Time Min <deepblue>".$weather["dewamintime"]."</deepblue></valuetextheading1><br>";
echo "<div class=tempmodulehome0-5c>";
echo $weather["dewamin"]."&deg;<smalltempunit2>".$weather["temp_units"];
?><smalltempunit2></div></div>

<div class="weather-tempicon-identity" style="margin-top:38px;margin-left:130px">   
<?php echo "<icon-16-20>".$weather34_temp_icon."</icon-16-20>"; ?></div>