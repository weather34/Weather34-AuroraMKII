<?php include('livedata.php');
$weather["barometer"]=number_format($meteobridgeapi[36]*0.75006157584566,1);
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
<?php // indicator color
echo '<div class="text2b">'.$weather["barometer"].'</div>';
?>
</div></div><div>

<?php //unit
echo "<unitindicator>".$weather["barometer_units"]."</unitindicator>";?>

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

if ($weather["barometer"]>=765 ){echo "685 749 764 <greyb>".$weather["barometer"]."</greyb> mmHG";}
else if ($weather["barometer"]>=749 ){echo "685 700 736 <greyb>".$weather["barometer"]."</greyb> mmHG";}
else if ($weather["barometer"]>=685 ){echo "<greyb>".$weather["barometer"]."</greyb> 700 749 765 mmHG";}
    

    if ($weather["barometer_units"]=='inHg'){
        if ($weather["barometer"]>=30.41 ){echo "29.5 1010 30.1 30.2 <greyb>".$weather["barometer"]."</greyb> ";}
        else if ($weather["barometer"]>=30.12 ){echo "29.5 29.8 30.1 <greyb>".$weather["barometer"]."</greyb> 30.4";}
        else if ($weather["barometer"]>=29.82 ){echo "29.5 29.8 <greyb>".$weather["barometer"]."</greyb> 30.2 ";}
        else if ($weather["barometer"]>=29.53 ){echo "29.5 <greyb>".$weather["barometer"]."</greyb> 29.9 30.2 ";}
        else if ($weather["barometer"]>=29.2 ){echo "28.6 28.9 <greyb>".$weather["barometer"]."</greyb> 29.5 29.8";}
        else if ($weather["barometer"]>=28.9 ){echo "28.0 28.3 28.6 <greyb>".$weather["barometer"]."</greyb> 29.2 29.5";}
        else if ($weather["barometer"]>=28.6 ){echo "28.0 28.3 <greyb>".$weather["barometer"]."</greyb> 28.9 29.5 ";}
        else if ($weather["barometer"]>=28.3 ){echo "28.0 <greyb>".$weather["barometer"]."</greyb> 28.9 29.2 29.5";}
        else if ($weather["barometer"]>=28.05 ){echo "27 <greyb>".$weather["barometer"]."</greyb> 28.6 28.9 29.2 29.5";}
            echo "<smalltempunit2>&nbsp;".$weather["barometer_units"]."</smalltempunit2>";
            }
	
?></smalltempunit2>
</valuetextheading5>
<div class=sunratebar>
<div class="weather34sunratebar" 
style=
"width:<?php if ( $meteobridgeapi[10]<1010){echo $meteobridgeapi[10]*0.055;}else echo $meteobridgeapi[10]*0.075;?>px;background:var(--barometerbar);">
</div></div></div>

<div class=extrainfo><a href='barometer-almanacmmHg2.php' data-lity data-title="Almanac Data"><?php echo  $aqilinks?>&nbsp;Extra Info</a></div></div>


<div class="weather-tempicon-identity">    
<?php //id
echo "<icon-zero>".$weather34_pressure_icon."</icon-zero>";?></div>



