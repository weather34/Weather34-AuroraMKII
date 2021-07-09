<?php include('livedata.php');?> 
<link href="weather34-theme.css?version=<?php echo filemtime('weather34-theme.css') ?>" rel="stylesheet prefetch">
<ul class="grid-containeralmcharts">
<li><iframe  class="charttempmodule3"  src="weather34charts/todaytempmodulechart2.php" frameborder="0" scrolling="no" ></iframe></li>
<li><iframe  class="charttempmodule3"  src="weather34charts/monthtemperaturemodulechart2.php" frameborder="0" scrolling="no" ></iframe>  </li>
<li><iframe  class="charttempmodule3"  src="weather34charts/yeartemperaturemodulechart2.php" frameborder="0" scrolling="no" ></iframe>  </li>


<li>
<div style="margin-top:10px;">

<alamanacword>Temperature History Data</alamanacword>

<div class="alamanacdata" >
<?php  //month max
echo "".date('F')." <orange>Max</orange> <almanacgrey> ".$weather["tempmmaxtime"];echo " ";
if(anytoC($weather["tempmmax"])<-10){ echo "<icon-minus10>".$weather["tempmmax"]."</icon-minus10 >";}
else if(anytoC($weather["tempmmax"])<0){ echo "<icon-minus10>".$weather["tempmmax"]."</icon-minus10>";}
else if(anytoC($weather["tempmmax"])<6){ echo "<icon-0-5>".$weather["tempmmax"]."</icon-0-5>";}
else if(anytoC($weather["tempmmax"])<10){ echo "<icon-6-10>".$weather["tempmmax"]."</icon-6-10>";}
else if(anytoC($weather["tempmmax"])<15){ echo "<icon-11-15>".$weather["tempmmax"]."</icon-11-15>";}
else if(anytoC($weather["tempmmax"])<20){ echo "<icon-16-20>".$weather["tempmmax"]."</icon-16-20>";}
else if(anytoC($weather["tempmmax"])<25){ echo "<icon-21-25>".$weather["tempmmax"]."</icon-21-25>";}
else if(anytoC($weather["tempmmax"])<30){ echo "<icon-26-30>".$weather["tempmmax"]."</icon-26-30>";}
else if(anytoC($weather["tempmmax"])<35){ echo "<icon-31-35>".$weather["tempmmax"]."</icon-31-35>";}
else if(anytoC($weather["tempmmax"])<45){ echo "<icon-36-40>".$weather["tempmmax"]."</icon-36-40>";}
else if(anytoC($weather["tempmmax"])<100){ echo "<icon-41-45>".$weather["tempmmax"]."</icon-41-45>";} 
echo "</almanacgrey>&deg;".$weather["temp_units"];

?></div>
<div class="alamanacdata">
<?php  //month min
echo "".date('F')." <deepblue>Min</deepblue><almanacgrey> ".$weather["tempmmintime"];
echo " ";
if(anytoC($weather["tempmmin"])<-10){ echo "<icon-minus10>".$weather["tempmmin"]."</icon-minus10 >";}
else if(anytoC($weather["tempmmin"])<0){ echo "<icon-minus10>".$weather["tempmmin"]."</icon-minus10>";}
else if(anytoC($weather["tempmmin"])<6){ echo "<icon-0-5>".$weather["tempmmin"]."</icon-0-5>";}
else if(anytoC($weather["tempmmin"])<10){ echo "<icon-6-10>".$weather["tempmmin"]."</icon-6-10>";}
else if(anytoC($weather["tempmmin"])<15){ echo "<icon-11-15>".$weather["tempmmin"]."</icon-11-15>";}
else if(anytoC($weather["tempmmin"])<20){ echo "<icon-16-20>".$weather["tempmmin"]."</icon-16-20>";}
else if(anytoC($weather["tempmmin"])<25){ echo "<icon-21-25>".$weather["tempmmin"]."</icon-21-25>";}
else if(anytoC($weather["tempmmin"])<30){ echo "<icon-26-30>".$weather["tempmmin"]."</icon-26-30>";}
else if(anytoC($weather["tempmmin"])<35){ echo "<icon-31-35>".$weather["tempmmin"]."</icon-31-35>";}
else if(anytoC($weather["tempmmin"])<45){ echo "<icon-36-40>".$weather["tempmmin"]."</icon-36-40>";}
else if(anytoC($weather["tempmmin"])<100){ echo "<icon-41-45>".$weather["tempmmin"]."</icon-41-45>";} 
echo "</almanacgrey>&deg;".$weather["temp_units"];


?></div>

<div class="alamanacdata">
<?php  //year max
echo "".date('Y')." <orange>Max</orange><almanacgrey> ".$weather["tempymaxtime"]; 
echo " ";
if(anytoC($weather["tempymax"])<-10){ echo "<icon-minus10>".$weather["tempymax"]."</icon-minus10 >";}
else if(anytoC($weather["tempymax"])<0){ echo "<icon-minus10>".$weather["tempymax"]."</icon-minus10>";}
else if(anytoC($weather["tempymax"])<6){ echo "<icon-0-5>".$weather["tempymax"]."</icon-0-5>";}
else if(anytoC($weather["tempymax"])<10){ echo "<icon-6-10>".$weather["tempymax"]."</icon-6-10>";}
else if(anytoC($weather["tempymax"])<15){ echo "<icon-11-15>".$weather["tempymax"]."</icon-11-15>";}
else if(anytoC($weather["tempymax"])<20){ echo "<icon-16-20>".$weather["tempymax"]."</icon-16-20>";}
else if(anytoC($weather["tempymax"])<25){ echo "<icon-21-25>".$weather["tempymax"]."</icon-21-25>";}
else if(anytoC($weather["tempymax"])<30){ echo "<icon-26-30>".$weather["tempymax"]."</icon-26-30>";}
else if(anytoC($weather["tempymax"])<35){ echo "<icon-31-35>".$weather["tempymax"]."</icon-31-35>";}
else if(anytoC($weather["tempymax"])<45){ echo "<icon-36-40>".$weather["tempymax"]."</icon-36-40>";}
else if(anytoC($weather["tempymax"])<100){ echo "<icon-41-45>".$weather["tempymax"]."</icon-41-45>";} 
echo "</almanacgrey>&deg;".$weather["temp_units"];
?></div>
<div class="alamanacdata">
<?php  //year min
echo "".date('Y')."  <deepblue>Min</deepblue><almanacgrey> ".$weather["tempymintime"];echo " ";
if(anytoC($weather["tempymin"])<-10){ echo "<icon-minus10>".$weather["tempymin"]."</icon-minus10 >";}
else if(anytoC($weather["tempymin"])<0){ echo "<icon-minus10>".$weather["tempymin"]."</icon-minus10>";}
else if(anytoC($weather["tempymin"])<6){ echo "<icon-0-5>".$weather["tempymin"]."</icon-0-5>";}
else if(anytoC($weather["tempymin"])<10){ echo "<icon-6-10>".$weather["tempymin"]."</icon-6-10>";}
else if(anytoC($weather["tempymin"])<15){ echo "<icon-11-15>".$weather["tempymin"]."</icon-11-15>";}
else if(anytoC($weather["tempymin"])<20){ echo "<icon-16-20>".$weather["tempymin"]."</icon-16-20>";}
else if(anytoC($weather["tempymin"])<25){ echo "<icon-21-25>".$weather["tempymin"]."</icon-21-25>";}
else if(anytoC($weather["tempymin"])<30){ echo "<icon-26-30>".$weather["tempymin"]."</icon-26-30>";}
else if(anytoC($weather["tempymin"])<35){ echo "<icon-31-35>".$weather["tempymin"]."</icon-31-35>";}
else if(anytoC($weather["tempymin"])<45){ echo "<icon-36-40>".$weather["tempymin"]."</icon-36-40>";}
else if(anytoC($weather["tempymin"])<100){ echo "<icon-41-45>".$weather["tempymin"]."</icon-41-45>";} 
echo "</almanacgrey>&deg;".$weather["temp_units"];
?></div>

<div class="alamanacdata">
<?php  //alltime max
echo "Alltime <orange>Max</orange><almanacgrey> ".$weather["tempamaxtime"];echo " ";
if(anytoC($weather["tempamax"])<-10){ echo "<icon-minus10>".$weather["tempamax"]."</icon-minus10 >";}
else if(anytoC($weather["tempamax"])<0){ echo "<icon-minus10>".$weather["tempamax"]."</icon-minus10>";}
else if(anytoC($weather["tempamax"])<6){ echo "<icon-0-5>".$weather["tempamax"]."</icon-0-5>";}
else if(anytoC($weather["tempamax"])<10){ echo "<icon-6-10>".$weather["tempamax"]."</icon-6-10>";}
else if(anytoC($weather["tempamax"])<15){ echo "<icon-11-15>".$weather["tempamax"]."</icon-11-15>";}
else if(anytoC($weather["tempamax"])<20){ echo "<icon-16-20>".$weather["tempamax"]."</icon-16-20>";}
else if(anytoC($weather["tempamax"])<25){ echo "<icon-21-25>".$weather["tempamax"]."</icon-21-25>";}
else if(anytoC($weather["tempamax"])<30){ echo "<icon-26-30>".$weather["tempamax"]."</icon-26-30>";}
else if(anytoC($weather["tempamax"])<35){ echo "<icon-31-35>".$weather["tempamax"]."</icon-31-35>";}
else if(anytoC($weather["tempamax"])<45){ echo "<icon-36-40>".$weather["tempamax"]."</icon-36-40>";}
else if(anytoC($weather["tempamax"])<100){ echo "<icon-41-45>".$weather["tempamax"]."</icon-41-45>";} 
echo "</almanacgrey>&deg;".$weather["temp_units"];
?></div>

<div class="alamanacdata">
<?php  //alltime min
echo "Alltime <deepblue>Min</deepblue><almanacgrey> ".$weather["tempamintime"];echo " ";
if(anytoC($weather["tempamin"])<-10){ echo "<icon-minus10>".$weather["tempamin"]."</icon-minus10 >";}
else if(anytoC($weather["tempamin"])<0){ echo "<icon-minus10>".$weather["tempamin"]."</icon-minus10>";}
else if(anytoC($weather["tempamin"])<6){ echo "<icon-0-5>".$weather["tempamin"]."</icon-0-5>";}
else if(anytoC($weather["tempamin"])<10){ echo "<icon-6-10>".$weather["tempamin"]."</icon-6-10>";}
else if(anytoC($weather["tempamin"])<15){ echo "<icon-11-15>".$weather["tempamin"]."</icon-11-15>";}
else if(anytoC($weather["tempamin"])<20){ echo "<icon-16-20>".$weather["tempamin"]."</icon-16-20>";}
else if(anytoC($weather["tempamin"])<25){ echo "<icon-21-25>".$weather["tempamin"]."</icon-21-25>";}
else if(anytoC($weather["tempamin"])<30){ echo "<icon-26-30>".$weather["tempamin"]."</icon-26-30>";}
else if(anytoC($weather["tempamin"])<35){ echo "<icon-31-35>".$weather["tempamin"]."</icon-31-35>";}
else if(anytoC($weather["tempamin"])<45){ echo "<icon-36-40>".$weather["tempamin"]."</icon-36-40>";}
else if(anytoC($weather["tempamin"])<100){ echo "<icon-41-45>".$weather["tempamin"]."</icon-41-45>";} 
echo "</almanacgrey>&deg;".$weather["temp_units"];
?></div>


</div>
</li>
</ul>
</div></div>
<weather34credit>
<a href="https://canvasjs.com" target="_blank" data-title="https://canvasjs.com" >
CanvasJs.com v2.3.1 GA (CC BY-NC 3.0) Non-Commercial-Version</a></weather34credit>