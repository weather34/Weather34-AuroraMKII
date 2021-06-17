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
<realfeel>&nbsp;&nbsp;Wetbulb <?php //wetbulb
if($weather["temp_units"]=='C'){
if ($weather['wetbulb']>=45 ){echo "<purple>". $weather['wetbulb']."</purple>";}
else if ($weather['wetbulb']>=35 ){echo '<deepred>'. $weather['wetbulb']."</deepred>";}
else if ($weather['wetbulb']>=25 ){echo '<red>'. $weather['wetbulb']."</red>";}
else if ($weather['wetbulb']>=20 ){echo '<orange>'. $weather['wetbulb']."</orange>";}
else if ($weather['wetbulb']>=10 ){echo '<yellow>'. $weather['wetbulb']."</yellow>";}
else if ($weather['wetbulb']>=6 ){echo '<green>'. $weather['wetbulb']."</green>";}
else if ($weather['wetbulb']>=0 ){echo '<blue>'. $weather['wetbulb']."</blue>";}
else if ($weather['wetbulb']>=-50 ){echo '<icon-minus10>'. $weather['wetbulb']."</icon-minus10>";}}
if($weather["temp_units"]=='F'){
if ($weather['wetbulb']>=113 ){echo "<purple>". $weather['wetbulb']."</purple>";}
else if ($weather['wetbulb']>=95 ){echo '<deepred>'. $weather['wetbulb']."</deepred>";}
else if ($weather['wetbulb']>=77 ){echo '<red>'. $weather['wetbulb']."</red>";}
else if ($weather['wetbulb']>=68 ){echo '<orange>'. $weather['wetbulb']."</orange>";}
else if ($weather['wetbulb']>=50 ){echo '<yellow>'. $weather['wetbulb']."</yellow>";}
else if ($weather['wetbulb']>=42.8 ){echo '<green>'. $weather['wetbulb']."</green>";}
else if ($weather['wetbulb']>=32 ){echo '<blue>'. $weather['wetbulb']."</blue>";}
else if ($weather['wetbulb']>=-58 ){echo '<icon-minus10>'. $weather['wetbulb']."</icon-minus10>";}}
?>&deg;</realfeel>
<div class="button-dial-label" >  
<?php 
if($weather["humidity"]>=70){ echo "<blue>".$weather["humidity"]."<smallhumidityunit>%</smallhumidityunit></blue>";}
else if($weather["humidity"]>=60){ echo "<icon-11-15>".$weather["humidity"]."<smallhumidityunit>%</smallhumidityunit></icon-11-15>";}
else if($weather["humidity"]>=40){ echo "<icon-6-10>".$weather["humidity"]."<smallhumidityunit>%</smallhumidityunit></icon-6-10>";}
else if($weather["humidity"]>=0){ echo "<icon-31-35>".$weather["humidity"]."<smallhumidityunit>%</smallhumidityunit></icon-26-30>";}
?></div></div><div>


<?php //trend phrase
echo "<unitindicator>";
//falling
if($weather["humidity_trend"]<0){echo '&nbsp;Falling';}
//rising
else if($weather["humidity_trend"]>0){echo '&nbsp;Rising';}
//steady
else echo "Steady";echo "</unitindicator>";
?>


<?php //trend
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
  <?php echo "<solarheading style='margin-left:-45px;width:70px'>Average Today</solarheading>";?>
<div class="button button-dialrain">               
 <div class="button-dial-toprain"></div>
<div class="button-dial-label"> 
<?php //day average humidity
echo "<uvreadings style='opacity:0.8;background:";
if ($weather["humidity_davg"]>=70 ){echo 'var(--temp0-5)';}
else if ($weather["humidity_davg"]>=60 ){echo 'var(--temp10-15)';}
elseif ($weather["humidity_davg"]>=40 ){echo 'var(--temp5-10)';}
elseif ($weather["humidity_davg"]>=0 ){echo 'var(--red)';}
echo "'>";
echo "<uvopacity>".number_format($weather["humidity_davg"],0)."<humidityunit>%</humidityunit></uvopacity></uvreadings";
?>  
</div></div></div>
<div class="weather34i-rairate-bar2">
<div id="raincontainer2">
<div id="weather34rainbeaker2"> 
  <?php //relative scale
echo "<volumet>100% <br> <br>75 <br> <br>50 <br> <br>25 <br></volumet>";
  ?>
<div id="weather34rainwater2" style="height:<?php //height
if (number_format($weather["humidity_davg"],1)<=0){echo 0.05;}

else if (number_format($weather["humidity_davg"],0)<=80){echo $weather["humidity_davg"]/22.5;}
else if (number_format($weather["humidity_davg"],0)<=90){echo $weather["humidity_davg"]/22.25;}
else if (number_format($weather["humidity_davg"],0)<=100){echo $weather["humidity_davg"]/22.5;}
else echo $weather["humidity_davg"]/19;?>em;opacity:0.7;background:
<?php //color
if ($weather["humidity_davg"]>=70 ){echo 'var(--temp0-5)';}
else if ($weather["humidity_davg"]>=60 ){echo 'var(--temp10-15)';}
elseif ($weather["humidity_davg"]>=40 ){echo 'var(--temp5-10)';}
elseif ($weather["humidity_davg"]>=0 ){echo 'var(--red)';}
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
if ($weather["humidity"]>=70){ echo "<blue>RH</blue>";}
else if ($weather["humidity"]>=60){ echo "<yellow>RH</yellow>";}
else if ($weather["humidity"]>=40){ echo "<green>RH</green>";}
else if ($weather["humidity"]>=0){ echo "<red>RH</red>";}
?></div>