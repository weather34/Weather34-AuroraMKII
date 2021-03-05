<?php include('livedata.php');
if ($weather["barometer_units"]=='hPa' || $weather["barometer_units"]=='mb'){$baroformat=2;}
else if ($weather["barometer_units"]=='inHg' || $weather["barometer_units"]=='mmHg'){$baroformat=3;}
if ($weather["barometer_units"]=='hPa' || $weather["barometer_units"]=='mb'){$baroformat2=2;}
else if ($weather["barometer_units"]=='inHg' || $weather["barometer_units"]=='mmHg'){$baroformat2=2;}
$baromdiff = $weather["barometer_24H"];
if ($weather["barometer_units"]=='inHg'){$baromdiff = number_format($weather["barometer_24H"]*0.02953,$baroformat);}
if ($baromdiff<-40){$scale=0.75*62;}
else if ($baromdiff<-30){$scale=0.75*52;}
else if ($baromdiff<-20){$scale=0.75*32;}
else if ($baromdiff<-15){$scale=0.75*25;}
else if ($baromdiff<-10){$scale=0.75*18;}
else if ($baromdiff<-5){$scale=0.75*19;}
else if ($baromdiff<-4){$scale=0.75*22;}
else if ($baromdiff==0){$scale=0.75*28;}
else if ($baromdiff<0){$scale=0.75*25;}
else if ($baromdiff>=30){$scale=0.75*30;}
else if ($baromdiff>=20){$scale=0.75*35;}
else if ($baromdiff>=15){$scale=0.75*47;}
else if ($baromdiff>=10){$scale=0.75*42;}
else if ($baromdiff>=9){$scale=0.75*40;}
else if ($baromdiff>5){$scale=0.75*37;}
else if ($baromdiff>=0){$scale=0.75*32;}

//hpa mb
if ($baromdiff<-40){$scale2=0.75*62;}
else if ($baromdiff<-30){$scale2=0.75*52;}
else if ($baromdiff<-20){$scale2=0.75*32;}
else if ($baromdiff<-15){$scale2=0.75*25;}
else if ($baromdiff<-10){$scale2=0.75*18;}
else if ($baromdiff<-5){$scale2=0.75*24;}
else if ($baromdiff<0){$scale2=0.75*27;}
else if ($baromdiff>=1.5){$scale2=0.75*60;}
else if ($baromdiff>=1){$scale2=0.75*46;}
else if ($baromdiff>=0.8){$scale2=0.75*37;}
else if ($baromdiff>=0.2){$scale2=0.75*34;}
else if ($baromdiff>=0.1){$scale2=0.75*30;}
else if ($baromdiff>=0.0){$scale2=0.75*28;}

$weather24h= $weather["barometer"]-$baromdiff;
//echo $weather24h;
?>
<div class="modulecaption2">Barometric Pressure</div>
<div class="maxwindgauge">
<?php  //Max
echo $max1." ";
echo "<orange>".$weather["barometer_max"]."</orange> ";;echo $maxclock." ".$weather["thb0seapressmaxtime"];
?></div>

<div class="maxbftgauge">
<?php  //Min
echo $min1." ";
echo "<deepblue>".$weather["barometer_min"]."</deepblue> ";;echo $maxclock." ".$weather["thb0seapressmintime"];
?></div>


<div class="button button-dial">               
 <div class="button-dial-top"></div>
<realfeel>Actual Pressure</realfeel>
<div class="button-dial-label">       
<?php // actual barometer value
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
echo "'><uvopacity>";if ($baromdiff>0){echo "+".$baromdiff."";}
else echo $baromdiff;echo "</uvopacity></uvreadings>";
?>  
</div></div>
<div class="weather34i-rairate-bar2">
<div id="raincontainer2">
<div id="weather34rainbeaker2">
<?php 
//mb - hPa
if ($weather["barometer_units"]=='hPa' || $weather["barometer_units"]=='mb'){
if ($baromdiff<-30){echo "<volume>".$weather["barometer_units"]." <br>+10 <br>0 <br>- <br>- <br> </volume>";}
else if ($baromdiff<-20){echo "<volume>".$weather["barometer_units"]." <br>+10 <br>- <br>0 <br>- <br>- <br>-20 </volume>";}
else if ($baromdiff<-15){echo "<volume>".$weather["barometer_units"]." <br>+10 <br>- <br>0 <br>- <br>- </volume>";}
else echo "<volume>".$weather["barometer_units"]."<br>+10 <br>+5 <br>0 <br>-5 <br>-10 </volume>";}
//inHg - mmHg
if ($weather["barometer_units"]=='inHg'  ){
if ($baromdiff<-10){echo "<volume>".$weather["barometer_units"]." <br>-0.2 <br>-0.5 <br>-0.10 <br>-0.15 <br>-0.20 </volume>";}
else echo "<volume>".$weather["barometer_units"]."<br>+1.5 <br>+1 <br>0 <br>-1 <br>-1.5 </volume>";}?>


<div id="weather34rainwater2" style="max-height:73px;height:<?php 
//mb - hPa
if ($weather["barometer_units"]=='hPa' || $weather["barometer_units"]=='mb'){
if ($baromdiff<-10){ echo number_format($baromdiff,$baroformat2)+$scale;}
else echo number_format($baromdiff,$baroformat2)+$scale;}
//inHg - mmHg
if ($weather["barometer_units"]=='inHg'){
if ($baromdiff<-10){ echo number_format($baromdiff,$baroformat2)+23;}
else echo number_format($baromdiff,$baroformat2)+$scale2;}?>
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
//hpa mb
if ($weather["barometer_units"]=='hPa' || $weather["barometer_units"]=='mb')
{
echo "950 <barometerspacinghpa>1050</barometerspacinghpa>";
echo "<smalltempunit2>&nbsp;".$weather["barometer_units"]."</smalltempunit2>";
}
//inHg
if ($weather["barometer_units"]=='inHg'){
	echo "28 <barometerspacinginhg>31</barometerspacinginhg>";
echo "<smalltempunit2>&nbsp;".$weather["barometer_units"]."</smalltempunit2>";
	}
?></smalltempunit2>
<style>
.weather34sunratebar1::before{
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
<div class="weather34sunratebar1" 
style=
"width:<?php 
if ( $meteobridgeapi[10]<960){echo $meteobridgeapi[10]*0.015;}
else if ( $meteobridgeapi[10]<980){echo $meteobridgeapi[10]*0.035;}
else if ( $meteobridgeapi[10]<1010){echo $meteobridgeapi[10]*0.055;}
else if ( $meteobridgeapi[10]<1030){echo $meteobridgeapi[10]*0.075;}
else if ( $meteobridgeapi[10]<1045){echo $meteobridgeapi[10]*0.095;}
else echo $meteobridgeapi[10]*0.12;?>px;background:var(--barometerbar);">
</div></div></div>
<div class=extrainfo><a href='barometer-almanac2.php' data-lity data-title="Almanac Data"><?php echo  $aqilinks?>&nbsp;Extra Info</a></div></div>
<div class="weather-pressureicon-identity">    
<?php //id unit
if ($weather["barometer_trend"]>0 ){echo "<orange>".$weather["barometer_units"]."</orange>";}
else if ($weather["barometer_trend"]==0 ){echo "<green>".$weather["barometer_units"]."</green>";}
else if ($weather["barometer_trend"]<0 ){echo "<blue>".$weather["barometer_units"]."</blue>";}?></div>