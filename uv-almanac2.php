<?php include('livedata.php');?>
<link href="weather34-theme.css?version=<?php echo filemtime('weather34-theme.css') ?>" rel="stylesheet prefetch">
<theword>UVINDEX | Solar W/m&#178;</theword>
<div class="almanacouterboxuv">
<div class="almanacchartxuv" >
<iframe  class="charttempmodule" src="weather34charts/todayuvmodulechart2.php" frameborder="0" scrolling="no" width="320px" height="200px"></iframe>  
</div>

<div class="almanacchartxsol">
<iframe  class="charttempmodule" src="weather34charts/todaysolarmodulechart2.php" frameborder="0" scrolling="no" width="320px" height="200px"></iframe>  
</div>

<div class="almanacxuv"><div class="almanac-content">
<?php  //month max
echo "<valuetextheading1>".date('F')." Max <deepblue>".$weather["uvmmaxtime"]."</deepblue></valuetextheading1><br>";   
echo "<div class=almanacareas>".$weather["uvmmax"]	."<smalltempunit2>UVI";
?><smalltempunit2></div></div>

<div class="almanac2xuv"><div class="almanac-content">
<?php  //max year
echo "<valuetextheading1>".date('Y')." Max <deepblue>".$weather["uvymaxtime"]."</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>".$weather["uvymax"]."<smalltempunit2>UVI";
 ?></smalltempunit2></div></div>

<div class="almanac3xuv"><div class="almanac-content">
<?php  //month min
echo "<valuetextheading1>Yesterday Max <deepblue>".$weather["uvydmaxtime"]."</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>".$weather["uvydmax"]."<smalltempunit2>UVI";
?><smalltempunit2></div></div>

<div class="almanac4xuv"><div class="almanac-content">
<?php  //min Year
echo "<valuetextheading1>Record Max <deepblue>".$weather["uvamaxtime"]."</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>".$weather["uvamax"]."<smalltempunit2>UVI";
?><smalltempunit2></div></div>

<br><br>
<div class="almanacxsol"><div class="almanac-content">
<?php  //month max
echo "<valuetextheading1>".date('F')." Max <deepblue>".$weather["solarmmaxtime"]."</deepblue></valuetextheading1><br>";   
echo "<div class=almanacareas>".$weather["solarmmax"]	."<smalltempunit2>W/m&#178;";
?><smalltempunit2></div></div>

<div class="almanac2xsol"><div class="almanac-content">
<?php  //max year
echo "<valuetextheading1>".date('Y')." Max <deepblue>".$weather["solarymaxtime"]."</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>".$weather["solarymax"]."<smalltempunit2>W/m&#178;";
 ?></smalltempunit2></div></div></div>

<div class="almanac3xsol"><div class="almanac-content">
<?php  //yesterday
echo "<valuetextheading1>Yesterday Max <deepblue>".$weather["solarydmaxtime"]."</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>".$weather["solarydmax"]."<smalltempunit2>W/m&#178;";
?><smalltempunit2></div></div>

<div class="almanac4xsol"><div class="almanac-content"> 
<?php  //All time
echo "<valuetextheading1>Record Max <deepblue>".$weather["solaramaxtime"]."</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>".$weather["solaramax"]."<smalltempunit2>W/m&#178;";
?><smalltempunit2></div></div>
</div>
