<?php include('livedata.php');?>
<link href="weather34-theme.css?version=<?php echo filemtime('weather34-theme.css') ?>" rel="stylesheet prefetch">
<theword>Lightning Strikes </theword>

<div class="canvascredit">
<a class="canvascreditlink" href="https://canvasjs.com" target="_blank" data-title="CanvasJs.com" >
Charts compiled with CanvasJs.com <br>v2.3.1 GA (CC BY-NC 3.0) Non-Commercial-Version.</a></div></div>


<div class="weather34credit">
<a class="canvascreditlink" href="https://weather34.com/homeweatherstation" target="_blank" data-title="weather34.com" >
CSS/SVG/PHP developed by weather<blue>34</blue></a></div></div>

<div class="almanacouterboxrain">
<br><br>
<div class="almanacchartx">
<monthchart style="margin-bottom:-15px;position:absolute;font-size:.7em">Current Day Strikes Chart</monthchart>
<iframe  class="charttempmodule" src="weather34charts/todaylightning.php" frameborder="0" scrolling="no" width="320px" height="200px"></iframe>  
</div>
<br><br>
<div class="almanacx"><div class="almanac-content">
<?php  //month total
echo "<valuetextheading1>".date('F')." <deepblue>Total</deepblue></valuetextheading1><br>";   
echo "<div class=almanacareas>".$weather["lightningmonth"]."<smalltempunit2>strikes";
?><smalltempunit2></div></div>


<div class="almanac2x"><div class="almanac-content">
<?php  //total year previous
echo "<valuetextheading1>2020  <deepblue>Total</deepblue> </valuetextheading1><br>";
echo "<div class=almanacareas>6427<smalltempunit2>strikes";
?></smalltempunit2></div></div>

<div class="almanac3x"><div class="almanac-content">
<?php  //total year current 
echo "<valuetextheading1>".date('Y')." <deepblue>Total</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>".$weather["lightningyear"]."<smalltempunit2>strikes";
?></smalltempunit2></div></div>

<div class="almanac4x"><div class="almanac-content">
<?php  //total year 2nd year
echo "<valuetextheading1>2019   <deepblue>Total</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>N/A<smalltempunit2>strikes";
?><smalltempunit2></div></div>

<div class="almanac5x"><div class="almanac-content">
<?php  //total year current 
echo "<valuetextheading1>2018  <deepblue>Total</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>N/A<smalltempunit2>strikes";
?></smalltempunit2></div></div>

<div class="almanac6x"><div class="almanac-content">
<?php  //total year 2nd year
echo "<valuetextheading1>2017 <deepblue>Total</deepblue></valuetextheading1><br>";
echo "<div class=almanacareas>N/A<smalltempunit2>strikes";
?><smalltempunit2></div></div>
