<?php include('livedata.php');?>
<div class="almanac-word">UV Index</div>
<br><br>
<div class="almanac"><div class="almanac-content">
<?php  //month max
echo "<valuetextheading1>".date('F')." Max <deepblue>".$weather["uvmmaxtime"]."</deepblue></valuetextheading1><br>";   
echo "<div class=tempmodulehome0-5c>".$weather["uvmmax"]	."<smalltempunit2>UVI";
?><smalltempunit2></div></div>

<div class="almanac2"><div class="almanac-content">
<?php  //max year
echo "<valuetextheading1>".date('Y')." Max <deepblue>".$weather["uvymaxtime"]."</deepblue></valuetextheading1><br>";
echo "<div class=tempmodulehome0-5c>".$weather["uvymax"]."<smalltempunit2>UVI";
 ?></smalltempunit2></div></div>

<div class="almanac3"><div class="almanac-content">
<?php  //month min
echo "<valuetextheading1>Yesterday Max <deepblue>".$weather["uvydmaxtime"]."</deepblue></valuetextheading1><br>";
echo "<div class=tempmodulehome0-5c>".$weather["uvydmax"]."<smalltempunit2>UVI";
?><smalltempunit2></div></div>

<div class="almanac4"><div class="almanac-content">
<?php  //min Year
echo "<valuetextheading1>All Time Max <deepblue>".$weather["uvamaxtime"]."</deepblue></valuetextheading1><br>";
echo "<div class=tempmodulehome0-5c>".$weather["uvamax"]."<smalltempunit2>";
?><smalltempunit2></div></div>

<div class="weather-tempicon-identity" style="margin-top:65px;height:1.77em;margin-left:125px">  
<?php echo "<icon-16-20>".$uvicon."</icon-16-20>"; ?></div>