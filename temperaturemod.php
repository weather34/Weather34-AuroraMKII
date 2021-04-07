<?php include('livedata.php');?>
<div class="modulecaption2">Temperature</div>


<div class="maxwindgauge">
<?php  //Max
echo $maxtodayicon." ";
if(anytoC($weather["temp_today_high"])<-10){ echo "<icon-minus10>".$weather["temp_today_high"]."</icon-minus10 >";}
else if(anytoC($weather["temp_today_high"])<0){ echo "<icon-minus10>".$weather["temp_today_high"]."</icon-minus10>";}
else if(anytoC($weather["temp_today_high"])<6){ echo "<icon-0-5>".$weather["temp_today_high"]."</icon-0-5>";}
else if(anytoC($weather["temp_today_high"])<10){ echo "<icon-6-10>".$weather["temp_today_high"]."</icon-6-10>";}
else if(anytoC($weather["temp_today_high"])<15){ echo "<icon-11-15>".$weather["temp_today_high"]."</icon-11-15>";}
else if(anytoC($weather["temp_today_high"])<20){ echo "<icon-16-20>".$weather["temp_today_high"]."</icon-16-20>";}
else if(anytoC($weather["temp_today_high"])<25){ echo "<icon-21-25>".$weather["temp_today_high"]."</icon-21-25>";}
else if(anytoC($weather["temp_today_high"])<30){ echo "<icon-26-30>".$weather["temp_today_high"]."</icon-26-30>";}
else if(anytoC($weather["temp_today_high"])<35){ echo "<icon-31-35>".$weather["temp_today_high"]."</icon-31-35>";}
else if(anytoC($weather["temp_today_high"])<45){ echo "<icon-36-40>".$weather["temp_today_high"]."</icon-36-40>";}
else if(anytoC($weather["temp_today_high"])<100){ echo "<icon-41-45>".$weather["temp_today_high"]."</icon-41-45>";}
echo "&deg; ";echo $maxclock." ".$weather["tempdmaxtime"];
?></div>

<div class="maxbftgauge">
<?php  //Min
echo $mintodayicon." ";
if(anytoC($weather["temp_today_low"])<-10){ echo "<icon-minus10>".$weather["temp_today_low"]."</icon-minus10 >";}
else if(anytoC($weather["temp_today_low"])<0){ echo "<icon-minus10>".$weather["temp_today_low"]."</icon-minus10>";}
else if(anytoC($weather["temp_today_low"])<6){ echo "<icon-0-5>".$weather["temp_today_low"]."</icon-0-5>";}
else if(anytoC($weather["temp_today_low"])<10){ echo "<icon-6-10>".$weather["temp_today_low"]."</icon-6-10>";}
else if(anytoC($weather["temp_today_low"])<15){ echo "<icon-11-15>".$weather["temp_today_low"]."</icon-11-15>";}
else if(anytoC($weather["temp_today_low"])<20){ echo "<icon-16-20>".$weather["temp_today_low"]."</icon-16-20>";}
else if(anytoC($weather["temp_today_low"])<25){ echo "<icon-21-25>".$weather["temp_today_low"]."</icon-21-25>";}
else if(anytoC($weather["temp_today_low"])<30){ echo "<icon-26-30>".$weather["temp_today_low"]."</icon-26-30>";}
else if(anytoC($weather["temp_today_low"])<35){ echo "<icon-31-35>".$weather["temp_today_low"]."</icon-31-35>";}
else if(anytoC($weather["temp_today_low"])<45){ echo "<icon-36-40>".$weather["temp_today_low"]."</icon-36-40>";}
else if(anytoC($weather["temp_today_low"])<100){ echo "<icon-41-45>".$weather["temp_today_low"]."</icon-41-45>";}
echo "&deg; ";echo $maxclock." ".$weather["tempdmintime"];
?></div>

<div class="button button-dial">               
 <div class="button-dial-top"></div>
 <realfeel>Actual Temp</realfeel>
<div class="button-dial-label" style="font-family:<?php if ($fontweight=="yes"){echo "weathertext2";}else echo "weathertext3";?>;font-size:<?php echo $fontsize?>px;">     
<?php // temperature display
if(anytoC($weather["temp"])<-10){ echo "<icon-minus10>".$weather["temp"]."&deg;</icon-minus10 >";}
else if(anytoC($weather["temp"])<0){ echo "<icon-minus10>".$weather["temp"]."&deg;</icon-minus10>";}
else if(anytoC($weather["temp"])<6){ echo "<icon-0-5>".$weather["temp"]."&deg;</icon-0-5>";}
else if(anytoC($weather["temp"])<10){ echo "<icon-6-10>".$weather["temp"]."&deg;</icon-6-10>";}
else if(anytoC($weather["temp"])<15){ echo "<icon-11-15>".$weather["temp"]."&deg;</icon-11-15>";}
else if(anytoC($weather["temp"])<20){ echo "<icon-16-20>".$weather["temp"]."&deg;</icon-16-20>";}
else if(anytoC($weather["temp"])<25){ echo "<icon-21-25>".$weather["temp"]."&deg;</icon-21-25>";}
else if(anytoC($weather["temp"])<30){ echo "<icon-26-30>".$weather["temp"]."&deg;</icon-26-30>";}
else if(anytoC($weather["temp"])<35){ echo "<icon-31-35>".$weather["temp"]."&deg;</icon-31-35>";}
else if(anytoC($weather["temp"])<45){ echo "<icon-36-40>".$weather["temp"]."&deg;</icon-36-40>";}
else if(anytoC($weather["temp"])<100){ echo "<icon-41-45>".$weather["temp"]."&deg;</icon-41-45>";}    
?>
</div></div><div>

<?php //trend phrase
echo "<unitindicator>";
//falling
if($weather["temp_trend"]<0){echo '&nbsp;Falling';}
//rising
else if($weather["temp_trend"]>0){echo '&nbsp;Rising';}
//steady
else echo "Steady";echo "</unitindicator>";
?>


<?php //trend
echo "<tempman>";
//falling
if($weather["temp_trend"]<0){
echo '';
echo '&nbsp;'.$fallingsymbolxx.'<blue> '.number_format($weather["temp_trend"],1).'</orange>&deg;';}
//rising
else if($weather["temp_trend"]>0){
echo '';echo '&nbsp;'.$risingsymbolxx.'<orange> + '.number_format($weather["temp_trend"],1).'</orange>&deg;';}
//steady
else echo ''.$steadysymbol.'';
echo "</tempman>";?>
</div></div></div></div></div>


<?php 
//windchill less than 0c
if ($meteobridgeapi[24]<0){;?>
<div class="windgauge">
<div class="second24hourguage">
  <?php echo "<solarheading style='margin-left:-45px;width:70px'>Windchill</solarheading>";?>
<div class="button button-dialrain">               
 <div class="button-dial-toprain"></div>
<div class="button-dial-label"> 
<?php echo "<uvreadings style='opacity:0.8;background:";
if ($meteobridgeapi[24]>=2 ){echo 'var(--blue)';}
else if ($meteobridgeapi[24]>=0 ){echo 'var(--blue)';}
else if ($meteobridgeapi[24]>=-10 ){echo 'var(--temp-5-10)';}
else if ($meteobridgeapi[24]>=-50 ){echo 'var(--deepcold)';}
echo "'>";
echo "<uvopacity>".number_format($weather["windchill"],1)."&deg;</uvopacity></uvreadings";
?>  
</div></div></div>
<div class="weather34i-rairate-bar2">
<div id="raincontainer2">
<div id="weather34rainbeaker2">
<?php //relative scale
//C
if($weather["temp_units"]=='C' && $meteobridgeapi[24]<0){
echo "<volumet>40c <br>35 <br>30 <br>25 <br>20 <br>15 <br>10 <br>5</volumet>";}
//F
if($weather["temp_units"]=='F' && $meteobridgeapi[24]<32){
echo "<volumet>104F <br>95 <br>86 <br>77 <br>68 <br>59 <br>50 <br>41</volumet>";}
  ?>
<div id="weather34rainwater2" style="height:
<?php if ($meteobridgeapi[24]<=0){echo 0.05;}else echo $meteobridgeapi[24]/9.5;?>em;opacity:0.7;background:
<?php //solar color
if ($meteobridgeapi[24]>=2 ){echo 'var(--blue)';}
else if ($meteobridgeapi[24]>=0 ){echo 'var(--blue)';}
else if ($meteobridgeapi[24]>=-10 ){echo 'var(--temp-5-10)';}
else if ($meteobridgeapi[24]>=-50 ){echo 'var(--deepcold)';}
?>">   
<?php ;}?>
<?php 
//if ($meteobridgeapi[42]='-'){$meteobridgeapi[42]="0";}
//heat index >30
if ($meteobridgeapi[42]>=30){;?>
<div class="windgauge">
<div class="second24hourguage">
  <?php echo "<solarheading style='margin-left:-45px;width:70px'>Heat Index</solarheading>";?>
<div class="button button-dialrain">               
 <div class="button-dial-toprain"></div>
<div class="button-dial-label"> 
<?php echo "<uvreadings style='opacity:0.8;background:";
if ($meteobridgeapi[42]>=45 ){echo 'var(--purple)';}
else if ($meteobridgeapi[42]>=35 ){echo 'var(--deepred)';}
else if ($meteobridgeapi[42]>=25 ){echo 'var(--red)';}
 
echo "'>";
echo "<uvopacity>".number_format($weather["heat_index"],1)."&deg;</uvopacity></uvreadings";
?>  
</div></div></div>
<div class="weather34i-rairate-bar2">
<div id="raincontainer2">
<div id="weather34rainbeaker2">
<?php //relative scale
  if($weather["temp_units"]=='C'){
  echo "<volumet>40c <br>35 <br>30 <br>25 <br>20 <br>15 <br>10 <br>5</volumet>";}

  if($weather["temp_units"]=='F'){
  echo "<volumet>104F <br>95 <br>86 <br>77 <br>68 <br>59 <br>50 <br>41</volumet>";}
  ?>
<div id="weather34rainwater2" style="height:<?php echo $meteobridgeapi[42]/9.5;?>em;opacity:0.7;background:
<?php //solar color
if ($meteobridgeapi[42]>=45 ){echo 'var(--purple)';}
else if ($meteobridgeapi[42]>=35 ){echo 'var(--deepred)';}
else if ($meteobridgeapi[42]>=25 ){echo 'var(--red)';}
?>">   
<?php ;}?>

<?php 
//month average if no windchill<0 or heatindex<30
if ($meteobridgeapi[42]<30 && $meteobridgeapi[24]>=0){;?>
<div class="windgauge">
<div class="second24hourguage">
  <?php echo "<solarheading style='margin-left:-45px;width:70px'>Average Today</solarheading>";?>
<div class="button button-dialrain">               
 <div class="button-dial-toprain"></div>
<div class="button-dial-label"> 
<?php echo "<uvreadings style='opacity:0.8;background:";
if ($meteobridgeapi[152]>=45 ){echo 'var(--purple)';}
else if ($meteobridgeapi[152]>=35 ){echo 'var(--deepred)';}
else if ($meteobridgeapi[152]>=25 ){echo 'var(--red)';}
else if ($meteobridgeapi[152]>=20 ){echo 'var(--orange)';}
else if ($meteobridgeapi[152]>=15 ){echo 'var(--yellow)';}
else if ($meteobridgeapi[152]>=10 ){echo 'var(--yellow)';}
else if ($meteobridgeapi[152]>=6 ){echo 'var(--green)';}
else if ($meteobridgeapi[152]>=2 ){echo 'var(--blue)';}
else if ($meteobridgeapi[152]>=0 ){echo 'var(--blue)';}
else if ($meteobridgeapi[152]>=-10 ){echo 'var(--temp-5-10)';}
else if ($meteobridgeapi[152]>=-50 ){echo 'var(--deepcold)';}
echo "'>";
echo "<uvopacity>".number_format($weather["temp_avgtoday"],1)."&deg;</uvopacity></uvreadings";
?>  
</div></div></div>
<div class="weather34i-rairate-bar2">
<div id="raincontainer2">
<div id="weather34rainbeaker2">
<?php //relative scale
//C
if($weather["temp_units"]=='C'){
echo "<volumet>40c <br>35 <br>30 <br>25 <br>20 <br>15 <br>10 <br>5</volumet>";}
//F
if($weather["temp_units"]=='F'){
echo "<volumet>104F <br>95 <br>86 <br>77 <br>68 <br>59 <br>50 <br>41</volumet>";}
  ?>
<div id="weather34rainwater2" style="height:<?php if ($meteobridgeapi[152]<=0){echo 0.05;}else echo $meteobridgeapi[152]/9.5;?>em;opacity:0.7;background:
<?php //color
if ($meteobridgeapi[152]>=45 ){echo 'var(--purple)';}
else if ($meteobridgeapi[152]>=35 ){echo 'var(--deepred)';}
else if ($meteobridgeapi[152]>=25 ){echo 'var(--red)';}
else if ($meteobridgeapi[152]>=20 ){echo 'var(--orange)';}
else if ($meteobridgeapi[152]>=15 ){echo 'var(--yellow)';}
else if ($meteobridgeapi[152]>=10 ){echo 'var(--yellow)';}
else if ($meteobridgeapi[152]>=6 ){echo 'var(--green)';}
else if ($meteobridgeapi[152]>=2 ){echo 'var(--blue)';}
else if ($meteobridgeapi[152]>=0 ){echo 'var(--blue)';}
else if ($meteobridgeapi[152]>=-10 ){echo 'var(--temp-5-10)';}
else if ($meteobridgeapi[152]>=-50 ){echo 'var(--deepcold)';}
?>">   
<?php ;}?>

</div></div></div></div></div></div>


<div class="heatcirclerain1" >
<div class="rainrateextra2" style="width:500px">
<valuetextheading5>
<?php // weather34 simple css scale 
//F
if ($weather["temp_units"]=='F'){
if (anytoC($weather["temp"])>=45 ){echo "32 50 59 68 77 86 95 <icon-41-45>".$weather["temp"]."</icon-41-45>";}
else if (anytoC($weather["temp"])>=35 ){echo "32 50 59 68 77 86 91 <icon-36-40>".$weather["temp"]."</icon-36-40>";}
else if (anytoC($weather["temp"])>=30 ){echo "32 50 59 68 77 82 <icon-31-35>".$weather["temp"]."</icon-31-35>";}
else if (anytoC($weather["temp"])>=25 ){echo "32 50 59 68 77 <icon-26-30>".$weather["temp"]."</icon-26-30> 86";}
else if (anytoC($weather["temp"])>=20 ){echo "32 50 54 59 <icon-21-25>".$weather["temp"]."</icon-21-25> 77 86";}
else if (anytoC($weather["temp"])>=15 ){echo "32 50 54 <icon-16-20>".$weather["temp"]."</icon-16-20> 68 77 86";}
else if (anytoC($weather["temp"])>=10 ){echo "32 41 <icon-11-15>".$weather["temp"]."</icon-11-15> 59 68 77 86";}
else if (anytoC($weather["temp"])>=6 ){echo "32 <icon-6-10>".$weather["temp"]."</icon-6-10> 50 54 59 68";}
else if (anytoC($weather["temp"])>=0 ){echo "<icon-0-5>".$weather["temp"]."</icon-0-5> 41 50 54 59 68";}
else if (anytoC($weather["temp"])>=-10 ){echo "<icon-minus10>".$weather["temp"]."</icon-minus10> <blue>32</blue> 41 50 54 59 68";}
else if (anytoC($weather["temp"])>=-20 ){echo "<icon-minus10>".$weather["temp"]."</icon-minus10> 14 <blue>32</blue> 41 50 54 59 68";}
else if (anytoC($weather["temp"])>=-30 ){echo "<icon-minus10>".$weather["temp"]."</icon-minus10> -4 14 <blue>32</blue> 41 50 54 59";}
else if (anytoC($weather["temp"])>=-40 ){echo "<icon-minus10>".$weather["temp"]."</icon-minus10> -22 -4 14 <blue>32</blue> 41 50 54";}
else if (anytoC($weather["temp"])>=-50 ){echo "<icon-minus10>".$weather["temp"]."</icon-minus10> -40 -22 -4 14 <blue>32</blue> 41 50";}
}
//C
//C
if ($weather["temp_units"]=='C'){
  if (anytoC($weather["temp"])>=45 ){echo "0 5 10 15 20 25 30 35 <icon-41-45>".$weather["temp"]."</icon-41-45>";}
  else if (anytoC($weather["temp"])>=35 ){echo "0 5 10 15 20 25 30 34 <icon-36-40>".$weather["temp"]."</icon-36-40>";}
  else if (anytoC($weather["temp"])>=30 ){echo "0 5 10 15 20 25 28 <icon-31-35>".$weather["temp"]."</icon-31-35>";}
  else if (anytoC($weather["temp"])>=25 ){echo "0 5 10 15 18 20 <icon-26-30>".$weather["temp"]."</icon-26-30> 30";}
  else if (anytoC($weather["temp"])>=20 ){echo "0 5 10 12 15 <icon-21-25>".$weather["temp"]."</icon-21-25> 25 30";}
  else if (anytoC($weather["temp"])>=15 ){echo "0 5 10 12 <icon-16-20>".$weather["temp"]."</icon-16-20> 20 25 30";}
  else if (anytoC($weather["temp"])>=10 ){echo "0 5 7 <icon-11-15>".$weather["temp"]."</icon-11-15> 15 20 25 30";}
  else if (anytoC($weather["temp"])>=6 ){echo "0 5 <icon-6-10>".$weather["temp"]."</icon-6-10> 10 12 15 20 25 30";}
  else if (anytoC($weather["temp"])>=0 ){echo "<icon-0-5>".$weather["temp"]."</icon-0-5> 6 10 12 15 20 25 30";}
  else if (anytoC($weather["temp"])>=-10 ){echo "<icon-minus10>".$weather["temp"]."</icon-minus10> <blue>0</blue> 5 10 12 15 18 20 25";}
  else if (anytoC($weather["temp"])>=-20 ){echo "<icon-minus10>".$weather["temp"]."</icon-minus10> -10 <blue>0</blue> 10 12 15 18 20";}
  else if (anytoC($weather["temp"])>=-30 ){echo "<icon-minus10>".$weather["temp"]."</icon-minus10> -20 -10 <blue>0</blue> 10 12 15 18";}
  else if (anytoC($weather["temp"])>=-40 ){echo "<icon-minus10>".$weather["temp"]."</icon-minus10> -30 -20 -10 <blue>0</blue> 10 15 18";}
  else if (anytoC($weather["temp"])>=-50 ){echo "<icon-minus10>".$weather["temp"]."</icon-minus10> -40 -30 -20 -10 <blue>0</blue> 10 12";}
}
echo "<smalltempunit2>&deg;".$weather["temp_units"];
?></smalltempunit2>
</valuetextheading5>
<div class=sunratebar>
<div class="weather34sunratebar" 
style="width: 
<?php if(anytoC($weather["temp"])>=0){echo anytoC($weather["temp"])*3;}else echo "2";?>px;
background:
<?php // indicator color
if (anytoC($weather["temp"])>=45 ){echo 'var(--temp45-50)';}
elseif (anytoC($weather["temp"])>=35 ){echo 'var(--deepred)';}
elseif (anytoC($weather["temp"])>=30 ){echo 'var(--temp30-35)';}
elseif (anytoC($weather["temp"])>=25 ){echo 'var(--temp25-30)';}
elseif (anytoc($weather["temp"])>=20 ){echo 'var(--temp20-25)';}
elseif (anytoc($weather["temp"])>=18 ){echo 'var(--temp15-20)';}
elseif (anytoc($weather["temp"])>=15 ){echo 'var(--temp15-20)';}
elseif (anytoc($weather["temp"])>=10 ){echo 'var(--yellow)';}
elseif (anytoc($weather["temp"])>=6 ){echo 'var(--green)';}
elseif (anytoc($weather["temp"])>=0 ){echo 'var(--blue)';}
elseif (anytoc($weather["temp"])>=-10 ){echo 'var(--temp-5-10)';}
elseif (anytoc($weather["temp"])>-20 ){echo 'var(--temp-5-10)';}
elseif (anytoc($weather["temp"])>=-50 ){echo 'var(--deepcold)';}
?>;">
</div></div></div>

<div class=extrainfo><a href='temperature-almanac2.php' data-lity data-title="Almanac Data"><?php echo  $aqilinks?>&nbsp;Extra Info</a></div></div>


<div class="weather-tempicon-identity">    
<?php //temperature id icon
if(anytoC($weather["temp"])<0){ echo "<icon-minus10>&deg;".$weather["temp_units"]."</icon-minus10>";}
else if(anytoC($weather["temp"])<6){ echo "<icon-0-5>&deg;".$weather["temp_units"]."</icon-0-5>";}
else if(anytoC($weather["temp"])<10){ echo "<icon-6-10>&deg;".$weather["temp_units"]."</icon-6-10>";}
else if(anytoC($weather["temp"])<15){ echo "<icon-11-15>&deg;".$weather["temp_units"]."</icon-11-15>";}
else if(anytoC($weather["temp"])<20){ echo "<icon-16-20>&deg;".$weather["temp_units"]."</icon-16-20>";}
else if(anytoC($weather["temp"])<25){ echo "<icon-21-25>&deg;".$weather["temp_units"]."</icon-21-25>";}
else if(anytoC($weather["temp"])<30){ echo "<icon-26-30>&deg;".$weather["temp_units"]."</icon-26-30>";}
else if(anytoC($weather["temp"])<35){ echo "<icon-31-35>&deg;".$weather["temp_units"]."</icon-31-35>";}
else if(anytoC($weather["temp"])<45){ echo "<icon-36-40>&deg;".$weather["temp_units"]."</icon-36-40>";}
else if(anytoC($weather["temp"])<100){ echo "<icon-41-45>&deg;".$weather["temp_units"]."</icon-41-45>";}
 ?>
</div>