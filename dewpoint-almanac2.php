<?php include('livedata.php');?> 
<link href="console-dark.css?version=<?php echo filemtime('console-dark.css') ?>" rel="stylesheet prefetch">
<theword>Dewpoint </theword>
<div class="almanacouterboxrain">
<br><br>
<div class="almanacchartx">
<monthchart>Current Day Temp | Dewpoint Chart</monthchart>
<iframe  class="charttempmodule" src="weather34charts/todaytempmodulechart2.php" frameborder="0" scrolling="no" width="320px" height="200px"></iframe>  
</div>
<div class="almanacx"><div class="almanac-content">
<?php  //month max
echo "<valuetextheading1>".date('F')." Max <deepblue>".$weather["dewmmaxtime"]."</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>";
echo $weather["dewmmax"]."&deg;<smalltempunit2>".$weather["temp_units"];
?><smalltempunit2></div></div>

<div class="almanac2x"><div class="almanac-content">
<?php  //max year
echo "<valuetextheading1>".date('Y')." Max <deepblue>".$weather["dewymaxtime"]."</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>";
echo $weather["dewymax"]."&deg;<smalltempunit2>".$weather["temp_units"];
 ?></smalltempunit2></div></div>
 
<div class="almanac3x"><div class="almanac-content">
<?php  //month min
echo "<valuetextheading1>".date('F')." Min <deepblue>".$weather["dewmmintime"]."</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>";
echo $weather["dewmmin"]."&deg;<smalltempunit2>".$weather["temp_units"];
?><smalltempunit2></div></div>

<div class="almanac4x"><div class="almanac-content">
<?php  //temp min Year
echo "<valuetextheading1>".date('Y')." Min <deepblue>".$weather["dewymintime"]."</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>";
echo $weather["dewymin"]."&deg;<smalltempunit2>".$weather["temp_units"];
?><smalltempunit2></div></div>

<div class="almanac5x"><div class="almanac-content">
<?php  //all time max
echo "<valuetextheading1>Record Max <deepblue>".$weather["dewamaxtime"]."</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>";
echo $weather["dewamax"]."&deg;<smalltempunit2>".$weather["temp_units"];
?><smalltempunit2></div></div>

<div class="almanac6x"><div class="almanac-content">
<?php  //all time min
echo "<valuetextheading1>Record Min <deepblue>".$weather["dewamintime"]."</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>";
echo $weather["dewamin"]."&deg;<smalltempunit2>".$weather["temp_units"];
?><smalltempunit2></div></div></div>
