<?php include('livedata.php');?>
<div class="modulecaption2">Relative Humidity</div>
<div class="maxwindgauge">
<?php  //Max
echo "<red>".$weather34_humidity_iconwu."</red> ";
if($weather["humidity_max"]>=70){ echo "<blue>".$weather["humidity_max"]."</blue>";}
else if($weather["humidity_max"]>=60){ echo "<icon-11-15>".$weather["humidity_max"]."</icon-11-15>";}
else if($weather["humidity_max"]>=40){ echo "<icon-6-10>".$weather["humidity_max"]."</icon-6-10>";}
else if($weather["humidity_max"]>=0){ echo "<icon-31-35>".$weather["humidity_max"]."</icon-31-35>";}
echo "% ";echo $maxclock." ".$weather["humidity_maxtime"];?></div>

<div class="maxbftgauge">
<?php //Min
echo "<blue>".$weather34_humidity_iconwu."</blue> ";
if($weather["humidity_min"]>=70){ echo "<blue>".$weather["humidity_min"]."</blue>";}
else if($weather["humidity_min"]>=60){ echo "<icon-11-15>".$weather["humidity_min"]."</icon-11-15>";}
else if($weather["humidity_min"]>=40){ echo "<icon-6-10>".$weather["humidity_min"]."</icon-6-10>";}
else if($weather["humidity_min"]>=0){ echo "<icon-31-35>".$weather["humidity_min"]."</icon-31-35>";}
echo "% ";echo $maxclock." ".$weather["humidity_mintime"];?></div>

<div class="button button-dial" >
<div class="button-dial-top" ></div>
<realfeel>
<?php  
//humidity saturation
if ($weather["humidity"]>=90){ echo "High Saturation ";echo $humidityhighalert;}else if ($weather["humidity"]>=70){echo "&nbsp; Saturation";}else if ($weather["humidity"]>=40){echo "Mild Saturation";}else if ($weather["humidity"]<40){echo "Low Saturation ";echo $humiditylowalert;}
?>
</realfeel>
<div class="button-dial-label" style="font-family:<?php if ($fontweight=="yes"){echo "weathertext2";}else echo "weathertext3";?>;font-size:<?php echo $fontsize?>px;">
<?php 
if($weather["humidity"]>=70){ echo "<blue>".$weather["humidity"]."<smallhumidityunit>%</smallhumidityunit></blue>";}
else if($weather["humidity"]>=60){ echo "<icon-11-15>".$weather["humidity"]."<smallhumidityunit>%</smallhumidityunit></icon-11-15>";}
else if($weather["humidity"]>=40){ echo "<icon-6-10>".$weather["humidity"]."<smallhumidityunit>%</smallhumidityunit></icon-6-10>";}
else if($weather["humidity"]>=0){ echo "<icon-31-35>".$weather["humidity"]."<smallhumidityunit>%</smallhumidityunit></icon-26-30>";}
?></div></div><div>
<windunitindicator>RH</windunitindicator>

<?php //feels like man
echo "<tempman>";
//falling
if($weather["humidity_trend"]<0){
echo '';
echo '&nbsp;'.$fallingsymbolxx.'<blue> '.number_format($weather["humidity_trend"],0).'</orange>%';}
//rising
else if($weather["humidity_trend"]>0){
echo '';echo '&nbsp;'.$risingsymbolxx.'<orange> + '.number_format($weather["humidity_trend"],0).'</orange>%';}
//steady
else echo ''.$steadysymbol.'';
echo "</tempman>";?>
</div></div></div></div></div>


<div class="windgauge">
<div class="second24hourguage">
  <?php echo "<solarheading style='margin-left:-45px;width:70px'>Feels Like</solarheading>";?>
<div class="button button-dialrain">               
 <div class="button-dial-toprain"></div>
<div class="button-dial-label"> 
<?php echo "<uvreadings style='opacity:0.8;background:";
if ((anytoc($weather["realfeel"]))>=45 ){echo 'var(--purple)';}
else if ((anytoc($weather["realfeel"]))>=35 ){echo 'var(--deepred)';}
else if ((anytoc($weather["realfeel"]))>=30 ){echo 'var(--red)';}
else if ((anytoc($weather["realfeel"]))>=25 ){echo 'var(--red)';}
else if ((anytoc($weather["realfeel"]))>=20 ){echo 'var(--orange)';}
else if ((anytoc($weather["realfeel"]))>=15 ){echo 'var(--yellow)';}
else if ((anytoc($weather["realfeel"]))>=10 ){echo 'var(--yellow)';}
else if ((anytoc($weather["realfeel"]))>=6 ){echo 'var(--green)';}
else if ((anytoc($weather["realfeel"]))>=2 ){echo 'var(--blue)';}
else if ((anytoc($weather["realfeel"]))>=0 ){echo 'var(--blue)';}
else if ((anytoc($weather["realfeel"]))>=-10 ){echo 'var(--temp-5-10)';}
else if ((anytoc($weather["realfeel"]))>=-50 ){echo 'var(--deepcold)';}
echo "'>";
echo "<uvopacity>".number_format($weather["realfeel"],1)." <uvunits>".$weather["temp_units"]."</uvunits></uvopacity></uvreadings";
?>  
</div></div></div>
<div class="weather34i-rairate-bar2">
<div id="raincontainer2">
<div id="weather34rainbeaker2">
  <?php //relative scale
//C
if($weather["temp_units"]=='C'){echo "<volumet>40c <br>35 <br>30 <br>25 <br>20 <br>15 <br>10 <br>5</volumet>";}
//F
if($weather["temp_units"]=='F'){echo "<volumet>104F <br>95 <br>86 <br>77 <br>68 <br>59 <br>50 <br>41</volumet>";}
  ?>
<div id="weather34rainwater2" style="height:<?php //height
if (number_format((anytoc($weather["realfeel"])),1)<0){echo 0.05;}
else echo number_format((anytoc($weather["realfeel"])),1)/9.5;?>
em;opacity:0.7;background:
<?php //color
if ((anytoc($weather["realfeel"]))>=45 ){echo 'var(--purple)';}
else if ((anytoc($weather["realfeel"]))>=35 ){echo 'var(--deepred)';}
else if ((anytoc($weather["realfeel"]))>=30 ){echo 'var(--red)';}
else if ((anytoc($weather["realfeel"]))>=25 ){echo 'var(--red)';}
else if ((anytoc($weather["realfeel"]))>=20 ){echo 'var(--orange)';}
else if ((anytoc($weather["realfeel"]))>=15 ){echo 'var(--yellow)';}
else if ((anytoc($weather["realfeel"]))>=10 ){echo 'var(--yellow)';}
else if ((anytoc($weather["realfeel"]))>=6 ){echo 'var(--green)';}
else if ((anytoc($weather["realfeel"]))>=2 ){echo 'var(--blue)';}
else if ((anytoc($weather["realfeel"]))>=0 ){echo 'var(--blue)';}
else if ((anytoc($weather["realfeel"]))>=-10 ){echo 'var(--temp-5-10)';}
else if ((anytoc($weather["realfeel"]))>=-50 ){echo 'var(--deepcold)';}
?>"> 
</div></div></div></div></div></div>

<div class="heatcirclerain1" >
<div class="rainrateextra2" style="width:500px">
<valuetextheading5>
<?php // weather34 simple css scale 
if ($weather["humidity"]>=99 ){echo "0 10 20 40 60 70 80 90 <blue>".round($weather["humidity"],0)."</blue>";}
else if ($weather["humidity"]>=90 ){echo "0 10 20 40 50 60 70 80 <blue>".round($weather["humidity"],0)."</blue>";}
else if ($weather["humidity"]>=80 ){echo "0 10 20 40 50 60 70 <blue>".round($weather["humidity"],0)."</blue> 100";}
else if ($weather["humidity"]>=70 ){echo "0 10 20 40 50 60 <blue>".round($weather["humidity"],0)."</blue> 80 100";}
else if ($weather["humidity"]>=60 ){echo "0 10 20 40 50 <icon-11-15>".round($weather["humidity"],0)."</icon-11-15> 70 80 100";}
else if ($weather["humidity"]>=50 ){echo "0 10 20 30 40 <icon-6-10>".round($weather["humidity"],0)."</icon-6-10> 60 80 100";}
else if ($weather["humidity"]>=40 ){echo "0 10 20 30 <icon-6-10>".round($weather["humidity"],0)."</icon-6-10> 50 60 80 100";}
else if ($weather["humidity"]>=30 ){echo "0 10 20 <icon-31-35>".round($weather["humidity"],0)."</icon-31-35> 40 50 60 80 100";}
else if ($weather["humidity"]>=20 ){echo "0 10 <icon-31-35>".round($weather["humidity"],0)."</icon-31-35> 30 40 50 60 80 100 ";}
else if ($weather["humidity"]>10 ){echo "0 <icon-31-35>".round($weather["humidity"],0)."</icon-31-35> 20 30 40 50 60 80 100";}
else if ($weather["humidity"]>0 ){echo "<icon-31-35>".round($weather["humidity"],0)."</icon-31-35> 10 20 30 40 50 60 80 100";}
echo "%";
?></smalltempunit2>
</valuetextheading5>
<div class=sunratebar>
<div class="weather34sunratebar" style="width:
<?php 
if ($weather["humidity"]>=95) {echo 120;}
else if ($weather["humidity"]>=90) {echo 110;}
else if ($weather["humidity"]>=80) {echo 100;}
else if ($weather["humidity"]>=70) {echo 85;}
else if ($weather["humidity"]>=60) {echo 70;}
else if ($weather["humidity"]>=50) {echo 65;}
else if ($weather["humidity"]>=40) {echo 60;}
else if ($weather["humidity"]>=30) {echo 40;}
else if ($weather["humidity"]>=20) {echo 25;}
else if ($weather["humidity"]>=10) {echo 15;}
else if ($weather["humidity"]>=0) {echo 5;} 
?>px;
background:
<?php 
if ($weather["humidity"]>=70 ){echo 'var(--temp0-5)';}
else if ($weather["humidity"]>=60 ){echo 'var(--temp10-15)';}
elseif ($weather["humidity"]>=40 ){echo 'var(--temp5-10)';}
elseif ($weather["humidity"]>=0 ){echo 'var(--red)';}?>;">
</div></div></div>

<div class=extrainfo><a href='humidity-almanac2.php' data-lity data-title="Almanac Data"><?php echo  $aqilinks?>&nbsp;Extra Info</a></div></div>

<div class="weather-tempicon-identity">    
<?php //humidity id
if ($weather["humidity"]>=70){ echo "<blue>".$weather34_humidity_icon."</blue>";}
else if ($weather["humidity"]>=60){ echo "<yellow>".$weather34_humidity_icon."</yellow>";}
else if ($weather["humidity"]>=40){ echo "<green>".$weather34_humidity_icon."</green>";}
else if ($weather["humidity"]>=0){ echo "<red>".$weather34_humidity_icon."</red>";}
?></div>