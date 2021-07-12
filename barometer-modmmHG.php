<?php include('livedata.php');
$weather["barometer"]=number_format($meteobridgeapi[10]*0.75006157584566,1);
$weather["barometer_max"]=number_format($meteobridgeapi[34]*0.75006157584566,1);
$weather["barometer_min"]=number_format($meteobridgeapi[36]*0.75006157584566,1);
$weather["barometer_trend"]    = number_format($meteobridgeapi[10]*0.75006157584566,1) - number_format($meteobridgeapi[18]*0.75006157584566,1);
$weather["barometer_units"]="mmHG";
$baroformat=1;
$baroformat2=1;


$weather24h= $weather["barometer"]-$baromdiff;
$baromdiff = number_format($weather["barometer_24H"]*0.02953*25,$baroformat);

//echo $weather24h;
?>
<div class="modulecaption2">Barometric Pressure</div>
<div class="maxwindgauge">
<?php  //Max
echo $max1." ";
echo "<orange>".$weather["barometer_max"]."</orange> ";echo $maxclock." ".$weather["thb0seapressmaxtime"];
?></div>

<div class="maxbftgauge">
<?php  //Min
echo $min1." ";
echo "<deepblue>".$weather["barometer_min"]."</deepblue> ";echo $maxclock." ".$weather["thb0seapressmintime"];
?></div>


<div class="button button-dial">               
 <div class="button-dial-top"></div>
<realfeel>Actual Pressure</realfeel>
<div class="button-dial-label">    
<?php // actual barometer value
echo '<div class="text2b">'.$weather["barometer"].'</div>';
?>
</div></div><div>

<?php //trend phrase
echo "<unitindicator>";
//falling
if($weather["barometer_trend"]<0){echo '&nbsp;Falling';}
//rising
else if($weather["barometer_trend"]>0){echo '&nbsp;Rising';}
//steady
else echo "Steady";echo "</unitindicator>";
?>


<?php //trend
echo "<tempman>";
//falling
if($weather["barometer_trend"]<0){echo '';echo '&nbsp;'.$fallingsymbolxx.'<blue> '.number_format($weather["barometer_trend"],$baroformat).'</orange>';}
//rising
else if($weather["barometer_trend"]>0){echo '';echo '&nbsp;'.$risingsymbolxx.'<orange> + '.number_format($weather["barometer_trend"],$baroformat).'</orange>';}
//steady
else echo ''.$steadysymbol.'';
echo "</tempman>";?>
</div></div></div></div></div>


<div class="windgauge">
<div class="second24hourguage">
  <?php echo "<solarheading style='margin-left:-45px;width:70px'>24H Change</solarheading>";?>
<div class="button button-dialrain">               
 <div class="button-dial-toprain"></div>
<div class="button-dial-label"> 
<?php echo "<uvreadings style='color:#fff;opacity:0.7;background:";
if ($baromdiff>0 ){echo 'var(--orange)';}
else if ($baromdiff==0 ){echo 'var(--green)';}
else if ($baromdiff<0 ){echo 'var(--blue)';}
echo "'>";
if ($baromdiff>0){echo "+".$baromdiff."";}
else echo "".$baromdiff."</uvopacity></uvreadings>";
?>  
</div></div>
<div class="weather34i-rairate-bar2">
<div id="raincontainer2">
<div id="weather34rainbeaker2">
<?php 
//mmHg
echo "<volume>".$weather["barometer_units"]." <br>20 <br>10 <br>0 <br>-10 <br>-20 </volume>";?>


<div id="weather34rainwater2" style="max-height:73px;height:<?php 
//inHg - mmHg
if ($baromdiff<0){ echo number_format($baromdiff,$baroformat2)+20;}
else echo number_format($baromdiff,$baroformat2)+22;?>
pt;opacity:0.5;background:0;border-top:2px dashed 
<?php //color
if ($baromdiff>0 ){echo 'var(--orange)';}
else if ($baromdiff==0 ){echo 'var(--green)';}
else if ($baromdiff<0 ){echo 'var(--blue)';}
?>"> 
</div></div></div></div></div></div>

<div class="heatcirclerain1" >
<div class="rainrateextra2" style="width:500px">
<valuetextheading5>
<?php // weather34 simple css scale 
echo "720 <barometerspacinghpa>800</barometerspacinghpa>";
echo "<smalltempunit2>&nbsp;".$weather["barometer_units"]."</smalltempunit2>";

?></smalltempunit2>
<style>
.weather34sunratebar2::before{
position:absolute;
content:"<?php echo $weather["barometer"]?>";
font-size:9px;
padding-left:<?php 
if ( $meteobridgeapi[10]<960){echo $meteobridgeapi[10]*0.02;}
else if ( $meteobridgeapi[10]<980){echo $meteobridgeapi[10]*0.025;}
else if ( $meteobridgeapi[10]<1010){echo $meteobridgeapi[10]*0.045;}
else if ( $meteobridgeapi[10]<1030){echo $meteobridgeapi[10]*0.065;}
else echo $meteobridgeapi[10]*0.070;?>px;
top:0px;
color:var(--barometerbar2);
}	
</style>
</valuetextheading5>
<div class=sunratebar>
<div class="weather34sunratebar2" 
style=
"width:<?php if ( $meteobridgeapi[10]<1010){echo $meteobridgeapi[10]*0.055;}else echo $meteobridgeapi[10]*0.075;?>px;background:var(--barometerbar);">
</div></div></div>

<div class=extrainfo><a href='barometer-almanacmmHg2.php' data-lity data-title="Almanac Data"><?php echo  "Extra Data&nbsp;".$chartlinks?></a></div></div>
<div class="weather-pressureicon-identity" style="font-size:8.5px">    
<?php //id unit
if ($weather["barometer_trend"]>0 ){echo "<orange>".$weather["barometer_units"]."</orange>";}
else if ($weather["barometer_trend"]==0 ){echo "<green>".$weather["barometer_units"]."</green>";}
else if ($weather["barometer_trend"]<0 ){echo "<blue>".$weather["barometer_units"]."</blue>";}?></div>

