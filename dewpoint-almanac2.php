<?php include('livedata.php');?> 
<link href="weather34-theme.css?version=<?php echo filemtime('weather34-theme.css') ?>" rel="stylesheet prefetch">
<ul class="grid-containeralmcharts">
<li><iframe  class="charttempmodule3"  src="weather34charts/todaydewpointmodulechart2.php" frameborder="0" scrolling="no" ></iframe></li>
<li><iframe  class="charttempmodule3"  src="weather34charts/monthdewpointmodulechart2.php" frameborder="0" scrolling="no" ></iframe>  </li>
<li><iframe  class="charttempmodule3"  src="weather34charts/yeardewpointmodulechart2.php" frameborder="0" scrolling="no" ></iframe>  </li>


<li>
<div style="margin-top:10px;">

<alamanacword>Dewpoint History Data</alamanacword>

<div class="alamanacdata">
<?php  //month max
echo "".date('F')." <orange>Max</orange> <almanacgrey> ".$weather["dewmmaxtime"];echo " ";
if(anytoC($weather["dewmmax"])<-10){ echo "<icon-minus10>".$weather["dewmmax"]."</icon-minus10 >";}
else if(anytoC($weather["dewmmax"])<0){ echo "<icon-minus10>".$weather["dewmmax"]."</icon-minus10>";}
else if(anytoC($weather["dewmmax"])<6){ echo "<icon-0-5>".$weather["dewmmax"]."</icon-0-5>";}
else if(anytoC($weather["dewmmax"])<10){ echo "<icon-6-10>".$weather["dewmmax"]."</icon-6-10>";}
else if(anytoC($weather["dewmmax"])<15){ echo "<icon-11-15>".$weather["dewmmax"]."</icon-11-15>";}
else if(anytoC($weather["dewmmax"])<20){ echo "<icon-16-20>".$weather["dewmmax"]."</icon-16-20>";}
else if(anytoC($weather["dewmmax"])<25){ echo "<icon-21-25>".$weather["dewmmax"]."</icon-21-25>";}
else if(anytoC($weather["dewmmax"])<30){ echo "<icon-26-30>".$weather["dewmmax"]."</icon-26-30>";}
else if(anytoC($weather["dewmmax"])<35){ echo "<icon-31-35>".$weather["dewmmax"]."</icon-31-35>";}
else if(anytoC($weather["dewmmax"])<45){ echo "<icon-36-40>".$weather["dewmmax"]."</icon-36-40>";}
else if(anytoC($weather["dewmmax"])<100){ echo "<icon-41-45>".$weather["dewmmax"]."</icon-41-45>";} 
echo "</almanacgrey>&deg;".$weather["temp_units"];

?></div>
<div class="alamanacdata">
<?php  //month min
echo "".date('F')." <deepblue>Min</deepblue><almanacgrey> ".$weather["dewmmintime"];
echo " ";
if(anytoC($weather["dewmmin"])<-10){ echo "<icon-minus10>".$weather["dewmmin"]."</icon-minus10 >";}
else if(anytoC($weather["dewmmin"])<0){ echo "<icon-minus10>".$weather["dewmmin"]."</icon-minus10>";}
else if(anytoC($weather["dewmmin"])<6){ echo "<icon-0-5>".$weather["dewmmin"]."</icon-0-5>";}
else if(anytoC($weather["dewmmin"])<10){ echo "<icon-6-10>".$weather["dewmmin"]."</icon-6-10>";}
else if(anytoC($weather["dewmmin"])<15){ echo "<icon-11-15>".$weather["dewmmin"]."</icon-11-15>";}
else if(anytoC($weather["dewmmin"])<20){ echo "<icon-16-20>".$weather["dewmmin"]."</icon-16-20>";}
else if(anytoC($weather["dewmmin"])<25){ echo "<icon-21-25>".$weather["dewmmin"]."</icon-21-25>";}
else if(anytoC($weather["dewmmin"])<30){ echo "<icon-26-30>".$weather["dewmmin"]."</icon-26-30>";}
else if(anytoC($weather["dewmmin"])<35){ echo "<icon-31-35>".$weather["dewmmin"]."</icon-31-35>";}
else if(anytoC($weather["dewmmin"])<45){ echo "<icon-36-40>".$weather["dewmmin"]."</icon-36-40>";}
else if(anytoC($weather["dewmmin"])<100){ echo "<icon-41-45>".$weather["dewmmin"]."</icon-41-45>";} 
echo "</almanacgrey>&deg;".$weather["temp_units"];


?></div>

<div class="alamanacdata">
<?php  //year max
echo "".date('Y')." <orange>Max</orange><almanacgrey> ".$weather["dewymaxtime"]; 
echo " ";
if(anytoC($weather["dewymax"])<-10){ echo "<icon-minus10>".$weather["dewymax"]."</icon-minus10 >";}
else if(anytoC($weather["dewymax"])<0){ echo "<icon-minus10>".$weather["dewymax"]."</icon-minus10>";}
else if(anytoC($weather["dewymax"])<6){ echo "<icon-0-5>".$weather["dewymax"]."</icon-0-5>";}
else if(anytoC($weather["dewymax"])<10){ echo "<icon-6-10>".$weather["dewymax"]."</icon-6-10>";}
else if(anytoC($weather["dewymax"])<15){ echo "<icon-11-15>".$weather["dewymax"]."</icon-11-15>";}
else if(anytoC($weather["dewymax"])<20){ echo "<icon-16-20>".$weather["dewymax"]."</icon-16-20>";}
else if(anytoC($weather["dewymax"])<25){ echo "<icon-21-25>".$weather["dewymax"]."</icon-21-25>";}
else if(anytoC($weather["dewymax"])<30){ echo "<icon-26-30>".$weather["dewymax"]."</icon-26-30>";}
else if(anytoC($weather["dewymax"])<35){ echo "<icon-31-35>".$weather["dewymax"]."</icon-31-35>";}
else if(anytoC($weather["dewymax"])<45){ echo "<icon-36-40>".$weather["dewymax"]."</icon-36-40>";}
else if(anytoC($weather["dewymax"])<100){ echo "<icon-41-45>".$weather["dewymax"]."</icon-41-45>";} 
echo "</almanacgrey>&deg;".$weather["temp_units"];
?></div>
<div class="alamanacdata">
<?php  //year min
echo "".date('Y')."  <deepblue>Min</deepblue><almanacgrey> ".$weather["dewymintime"];echo " ";
if(anytoC($weather["dewymin"])<-10){ echo "<icon-minus10>".$weather["dewymin"]."</icon-minus10 >";}
else if(anytoC($weather["dewymin"])<0){ echo "<icon-minus10>".$weather["dewymin"]."</icon-minus10>";}
else if(anytoC($weather["dewymin"])<6){ echo "<icon-0-5>".$weather["dewymin"]."</icon-0-5>";}
else if(anytoC($weather["dewymin"])<10){ echo "<icon-6-10>".$weather["dewymin"]."</icon-6-10>";}
else if(anytoC($weather["dewymin"])<15){ echo "<icon-11-15>".$weather["dewymin"]."</icon-11-15>";}
else if(anytoC($weather["dewymin"])<20){ echo "<icon-16-20>".$weather["dewymin"]."</icon-16-20>";}
else if(anytoC($weather["dewymin"])<25){ echo "<icon-21-25>".$weather["dewymin"]."</icon-21-25>";}
else if(anytoC($weather["dewymin"])<30){ echo "<icon-26-30>".$weather["dewymin"]."</icon-26-30>";}
else if(anytoC($weather["dewymin"])<35){ echo "<icon-31-35>".$weather["dewymin"]."</icon-31-35>";}
else if(anytoC($weather["dewymin"])<45){ echo "<icon-36-40>".$weather["dewymin"]."</icon-36-40>";}
else if(anytoC($weather["dewymin"])<100){ echo "<icon-41-45>".$weather["dewymin"]."</icon-41-45>";} 
echo "</almanacgrey>&deg;".$weather["temp_units"];
?></div>

<div class="alamanacdata">
<?php  //alltime max
echo "Alltime <orange>Max</orange><almanacgrey> ".$weather["dewamaxtime"];echo " ";
if(anytoC($weather["dewamax"])<-10){ echo "<icon-minus10>".$weather["dewamax"]."</icon-minus10 >";}
else if(anytoC($weather["dewamax"])<0){ echo "<icon-minus10>".$weather["dewamax"]."</icon-minus10>";}
else if(anytoC($weather["dewamax"])<6){ echo "<icon-0-5>".$weather["dewamax"]."</icon-0-5>";}
else if(anytoC($weather["dewamax"])<10){ echo "<icon-6-10>".$weather["dewamax"]."</icon-6-10>";}
else if(anytoC($weather["dewamax"])<15){ echo "<icon-11-15>".$weather["dewamax"]."</icon-11-15>";}
else if(anytoC($weather["dewamax"])<20){ echo "<icon-16-20>".$weather["dewamax"]."</icon-16-20>";}
else if(anytoC($weather["dewamax"])<25){ echo "<icon-21-25>".$weather["dewamax"]."</icon-21-25>";}
else if(anytoC($weather["dewamax"])<30){ echo "<icon-26-30>".$weather["dewamax"]."</icon-26-30>";}
else if(anytoC($weather["dewamax"])<35){ echo "<icon-31-35>".$weather["dewamax"]."</icon-31-35>";}
else if(anytoC($weather["dewamax"])<45){ echo "<icon-36-40>".$weather["dewamax"]."</icon-36-40>";}
else if(anytoC($weather["dewamax"])<100){ echo "<icon-41-45>".$weather["dewamax"]."</icon-41-45>";} 
echo "</almanacgrey>&deg;".$weather["temp_units"];
?></div>

<div class="alamanacdata">
<?php  //alltime min
echo "Alltime <deepblue>Min</deepblue><almanacgrey> ".$weather["dewamintime"];echo " ";
if(anytoC($weather["dewamin"])<-10){ echo "<icon-minus10>".$weather["dewamin"]."</icon-minus10 >";}
else if(anytoC($weather["dewamin"])<0){ echo "<icon-minus10>".$weather["dewamin"]."</icon-minus10>";}
else if(anytoC($weather["dewamin"])<6){ echo "<icon-0-5>".$weather["dewamin"]."</icon-0-5>";}
else if(anytoC($weather["dewamin"])<10){ echo "<icon-6-10>".$weather["dewamin"]."</icon-6-10>";}
else if(anytoC($weather["dewamin"])<15){ echo "<icon-11-15>".$weather["dewamin"]."</icon-11-15>";}
else if(anytoC($weather["dewamin"])<20){ echo "<icon-16-20>".$weather["dewamin"]."</icon-16-20>";}
else if(anytoC($weather["dewamin"])<25){ echo "<icon-21-25>".$weather["dewamin"]."</icon-21-25>";}
else if(anytoC($weather["dewamin"])<30){ echo "<icon-26-30>".$weather["dewamin"]."</icon-26-30>";}
else if(anytoC($weather["dewamin"])<35){ echo "<icon-31-35>".$weather["dewamin"]."</icon-31-35>";}
else if(anytoC($weather["dewamin"])<45){ echo "<icon-36-40>".$weather["dewamin"]."</icon-36-40>";}
else if(anytoC($weather["dewamin"])<100){ echo "<icon-41-45>".$weather["dewamin"]."</icon-41-45>";} 
echo "</almanacgrey>&deg;".$weather["temp_units"];
?></div>



</div>
</li>
</ul>
</div></div>
<weather34credit>
<a href="https://canvasjs.com" target="_blank" data-title="https://canvasjs.com" >
CanvasJs.com v2.3.1 GA (CC BY-NC 3.0) Non-Commercial-Version</a></weather34credit>