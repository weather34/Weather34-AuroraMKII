<?php include('livedata.php');?>
<div class="modulecaption2">Dewpoint</div>
<div class="maxwindgauge">
<?php  //Max
echo $maxtodayicon." ";
if(anytoC($weather["dewmax"])<-10){ echo "<icon-minus10>".$weather["dewmax"]."</icon-minus10 >";}
else if(anytoC($weather["dewmax"])<0){ echo "<icon-minus10>".$weather["dewmax"]."</icon-minus10>";}
else if(anytoC($weather["dewmax"])<6){ echo "<icon-0-5>".$weather["dewmax"]."</icon-0-5>";}
else if(anytoC($weather["dewmax"])<10){ echo "<icon-6-10>".$weather["dewmax"]."</icon-6-10>";}
else if(anytoC($weather["dewmax"])<15){ echo "<icon-11-15>".$weather["dewmax"]."</icon-11-15>";}
else if(anytoC($weather["dewmax"])<20){ echo "<icon-16-20>".$weather["dewmax"]."</icon-16-20>";}
else if(anytoC($weather["dewmax"])<25){ echo "<icon-21-25>".$weather["dewmax"]."</icon-21-25>";}
else if(anytoC($weather["dewmax"])<30){ echo "<icon-26-30>".$weather["dewmax"]."</icon-26-30>";}
else if(anytoC($weather["dewmax"])<35){ echo "<icon-31-35>".$weather["dewmax"]."</icon-31-35>";}
else if(anytoC($weather["dewmax"])<40){ echo "<icon-36-40>".$weather["dewmax"]."</icon-36-40>";}
else if(anytoC($weather["dewmax"])<100){ echo "<icon-41-45>".$weather["dewmax"]."</icon-41-45>";}
echo "&deg; ";echo $maxclock." ".$weather["dewmaxtime"];
?></div>

<div class="maxbftgauge">
<?php  //Min
echo $mintodayicon." ";
if(anytoC($weather["dewmin"])<-10){ echo "<icon-minus10>".$weather["dewmin"]."</icon-minus10 >";}
else if(anytoC($weather["dewmin"])<0){ echo "<icon-minus10>".$weather["dewmin"]."</icon-minus10>";}
else if(anytoC($weather["dewmin"])<6){ echo "<icon-0-5>".$weather["dewmin"]."</icon-0-5>";}
else if(anytoC($weather["dewmin"])<10){ echo "<icon-6-10>".$weather["dewmin"]."</icon-6-10>";}
else if(anytoC($weather["dewmin"])<15){ echo "<icon-11-15>".$weather["dewmin"]."</icon-11-15>";}
else if(anytoC($weather["dewmin"])<20){ echo "<icon-16-20>".$weather["dewmin"]."</icon-16-20>";}
else if(anytoC($weather["dewmin"])<25){ echo "<icon-21-25>".$weather["dewmin"]."</icon-21-25>";}
else if(anytoC($weather["dewmin"])<30){ echo "<icon-26-30>".$weather["dewmin"]."</icon-26-30>";}
else if(anytoC($weather["dewmin"])<35){ echo "<icon-31-35>".$weather["dewmin"]."</icon-31-35>";}
else if(anytoC($weather["dewmin"])<40){ echo "<icon-36-40>".$weather["dewmin"]."</icon-36-40>";}
else if(anytoC($weather["dewmin"])<100){ echo "<icon-41-45>".$weather["dewmin"]."</icon-41-45>";}
echo "&deg; ";echo $maxclock." ".$weather["dewmintime"];
?></div>

<div class="button button-dial">
<div class="button-dial-top"></div>
<realfeel>Dewpoint</realfeel>
<div class="button-dial-label" >        
<?php //dewpoint display
if(anytoC($weather["dewpoint"])<-10){ echo "<icon-minus10>".$weather["dewpoint"]."&deg;</icon-minus10 >";}
else if(anytoC($weather["dewpoint"])<0){ echo "<icon-minus10>".$weather["dewpoint"]."&deg;</icon-minus10>";}
else if(anytoC($weather["dewpoint"])<6){ echo "<icon-0-5>".$weather["dewpoint"]."&deg;</icon-0-5>";}
else if(anytoC($weather["dewpoint"])<10){ echo "<icon-6-10>".$weather["dewpoint"]."&deg;</icon-6-10>";}
else if(anytoC($weather["dewpoint"])<15){ echo "<icon-11-15>".$weather["dewpoint"]."&deg;</icon-11-15>";}
else if(anytoC($weather["dewpoint"])<20){ echo "<icon-16-20>".$weather["dewpoint"]."&deg;</icon-16-20>";}
else if(anytoC($weather["dewpoint"])<25){ echo "<icon-21-25>".$weather["dewpoint"]."&deg;</icon-21-25>";}
else if(anytoC($weather["dewpoint"])<30){ echo "<icon-26-30>".$weather["dewpoint"]."&deg;</icon-26-30>";}
else if(anytoC($weather["dewpoint"])<35){ echo "<icon-31-35>".$weather["dewpoint"]."&deg;</icon-31-35>";}
else if(anytoC($weather["dewpoint"])<40){ echo "<icon-36-40>".$weather["dewpoint"]."&deg;</icon-36-40>";}
else if(anytoC($weather["dewpoint"])<100){ echo "<icon-41-45>".$weather["dewpoint"]."&deg;</icon-41-45>";}  
?>
</div></div><div>

<?php //trend phrase
echo "<unitindicator>";
//falling
if($weather["dewpoint_trend"]<0){echo '&nbsp;Falling';}
//rising
else if($weather["dewpoint_trend"]>0){echo '&nbsp;Rising';}
//steady
else echo "Steady";echo "</unitindicator>";
?>

<?php //trend
echo "<tempman>";
//falling
if($weather["dewpoint_trend"]<0){
echo '';
echo '&nbsp;'.$fallingsymbolxx.'<blue> '.number_format($weather["dewpoint_trend"],1).'</orange>&deg;';}
//rising
else if($weather["dewpoint_trend"]>0){
echo '';echo '&nbsp;'.$risingsymbolxx.'<orange> + '.number_format($weather["dewpoint_trend"],1).'</orange>&deg;';}
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
<?php 
echo "<uvreadings style='opacity:0.8;background:";
if (anytoc($weather["dewpoint_avgtoday"])>=40 ){echo 'var(--purple)';}
else if (anytoc($weather["dewpoint_avgtoday"])>=30 ){echo 'var(--red)';}
else if (anytoc($weather["dewpoint_avgtoday"])>=25 ){echo 'var(--red)';}
else if (anytoc($weather["dewpoint_avgtoday"])>=20 ){echo 'var(--orange)';}
else if (anytoc($weather["dewpoint_avgtoday"])>=15 ){echo 'var(--yellow)';}
else if (anytoc($weather["dewpoint_avgtoday"])>=10 ){echo 'var(--yellow)';}
else if (anytoc($weather["dewpoint_avgtoday"])>=6 ){echo 'var(--green)';}
else if (anytoc($weather["dewpoint_avgtoday"])>=2 ){echo 'var(--blue)';}
else if (anytoc($weather["dewpoint_avgtoday"])>=0 ){echo 'var(--blue)';}
else if (anytoc($weather["dewpoint_avgtoday"])>=-10 ){echo 'var(--temp-5-10)';}
else if (anytoc($weather["dewpoint_avgtoday"])>=-50 ){echo 'var(--temp-5-10)';}
echo "'>";
echo "<uvopacity>".number_format($weather["dewpoint_avgtoday"],1)."&deg;</uvopacity></uvreadings";  

?>  
</div></div></div>
<div class="weather34i-rairate-bar2">
<div id="raincontainer2">
<div id="weather34rainbeaker2">
<?php //relative scale
//C cloudbase temp
if($weather["temp_units"]=='C'){echo "<volumet>40c <br>35 <br>30 <br>25 <br>20 <br>15 <br>10 <br>5</volumet>";}
//F
if($weather["temp_units"]=='F'){echo "<volumet>104F <br>95 <br>86 <br>77 <br>68 <br>59 <br>50 <br>41</volumet>";}
  ?>
<div id="weather34rainwater2" style="height:
<?php //height 
  if (anytoc($weather["dewpoint_avgtoday"])<='0'){echo 0.05;}
  else if (anytoc($weather["dewpoint_avgtoday"])>=12){echo anytoc($weather["dewpoint_avgtoday"])/8.25;}
  else echo anytoc($weather["dewpoint_avgtoday"])/9.5;?>em;opacity:0.7;background:
<?php // color
if (anytoc($weather["dewpoint_avgtoday"])>=40 ){echo 'var(--purple)';}
else if (anytoc($weather["dewpoint_avgtoday"])>=30 ){echo 'var(--red)';}
else if (anytoc($weather["dewpoint_avgtoday"])>=25 ){echo 'var(--red)';}
else if (anytoc($weather["dewpoint_avgtoday"])>=20 ){echo 'var(--orange)';}
else if (anytoc($weather["dewpoint_avgtoday"])>=15 ){echo 'var(--yellow)';}
else if (anytoc($weather["dewpoint_avgtoday"])>=10 ){echo 'var(--yellow)';}
else if (anytoc($weather["dewpoint_avgtoday"])>=6 ){echo 'var(--green)';}
else if (anytoc($weather["dewpoint_avgtoday"])>=2 ){echo 'var(--blue)';}
else if (anytoc($weather["dewpoint_avgtoday"])>=0 ){echo 'var(--blue)';}
else if (anytoc($weather["dewpoint_avgtoday"])>=-10 ){echo 'var(--temp-5-10)';}
else if (anytoc($weather["dewpoint_avgtoday"])>=-50 ){echo 'var(--deepcold)';}

?>">   
</div></div></div></div></div></div>
<div class="heatcirclerain1" >
<div class="rainrateextra2" style="width:500px">
<valuetextheading5>
<?php // weather34 simple css scale 
//F
if ($weather["temp_units"]=='F'){
if (anytoC($weather["dewpoint"])>=38 ){echo "32 50 59 68 77 86 95 <icon-41-45>".$weather["dewpoint"]."</icon-41-45>";}
else if (anytoC($weather["dewpoint"])>=35 ){echo "32 50 59 68 77 86 91 <icon-36-40>".$weather["dewpoint"]."</icon-36-40>";}
else if (anytoC($weather["dewpoint"])>=30 ){echo "32 50 59 68 77 82 <icon-31-35>".$weather["dewpoint"]."</icon-31-35> 95";}
else if (anytoC($weather["dewpoint"])>=25 ){echo "32 50 59 68 77 <icon-26-30>".$weather["dewpoint"]."</icon-26-30> 86 95";}
else if (anytoC($weather["dewpoint"])>=20 ){echo "32 50 54 59 <icon-21-25>".$weather["dewpoint"]."</icon-21-25> 77 86 95";}
else if (anytoC($weather["dewpoint"])>=15 ){echo "32 50 54 <icon-16-20>".$weather["dewpoint"]."</icon-16-20> 68 77 86 95";}
else if (anytoC($weather["dewpoint"])>=10 ){echo "32 41 <icon-11-15>".$weather["dewpoint"]."</icon-11-15> 59 68 77 86 95";}
else if (anytoC($weather["dewpoint"])>=6 ){echo "32 <icon-6-10>".$weather["dewpoint"]."</icon-6-10> 50 54 59 68 77 86";}
else if (anytoC($weather["dewpoint"])>=0 ){echo "<icon-0-5>".$weather["dewpoint"]."</icon-0-5> 41 50 54 59 68 77 86";}
else if (anytoC($weather["dewpoint"])>=-10 ){echo "<icon-minus10>".$weather["dewpoint"]."</icon-minus10> <blue>32</blue> 41 50 54 59 68 77";}
else if (anytoC($weather["dewpoint"])>=-20 ){echo "<icon-minus10>".$weather["dewpoint"]."</icon-minus10> 14 <blue>32</blue> 41 50 54 59 68";}
else if (anytoC($weather["dewpoint"])>=-30 ){echo "<icon-minus10>".$weather["dewpoint"]."</icon-minus10> -4 14 <blue>32</blue> 41 50 54 59";}
else if (anytoC($weather["dewpoint"])>=-40 ){echo "<icon-minus10>".$weather["dewpoint"]."</icon-minus10> -22 -4 14 <blue>32</blue> 41 50 54";}
else if (anytoC($weather["dewpoint"])>=-50 ){echo "<icon-minus10>".$weather["dewpoint"]."</icon-minus10> -40 -22 -4 14 <blue>32</blue> 41 50";}
}
//C
if ($weather["temp_units"]=='C'){
if (anytoC($weather["dewpoint"])>=38 ){echo "0 5 10 15 20 25 30 35 <icon-41-45>".$weather["dewpoint"]."</icon-41-45>";}
else if (anytoC($weather["dewpoint"])>=35 ){echo "0 5 10 15 20 25 30 34 <icon-36-40>".$weather["dewpoint"]."</icon-36-40>";}
else if (anytoC($weather["dewpoint"])>=30 ){echo "0 5 10 15 20 25 28 <icon-31-35>".$weather["dewpoint"]."</icon-31-35> 40";}
else if (anytoC($weather["dewpoint"])>=25 ){echo "0 5 10 15 18 20 <icon-26-30>".$weather["dewpoint"]."</icon-26-30> 30 35";}
else if (anytoC($weather["dewpoint"])>=20 ){echo "0 5 10 12 15 <icon-21-25>".$weather["dewpoint"]."</icon-21-25> 25 30 35";}
else if (anytoC($weather["dewpoint"])>=15 ){echo "0 5 10 12 <icon-16-20>".$weather["dewpoint"]."</icon-16-20> 20 25 30 35";}
else if (anytoC($weather["dewpoint"])>=10 ){echo "0 5 7 <icon-11-15>".$weather["dewpoint"]."</icon-11-15> 15 20 25 30 35";}
else if (anytoC($weather["dewpoint"])>=6 ){echo "0 5 <icon-6-10>".$weather["dewpoint"]."</icon-6-10> 10 12 15 20 25 30";}
else if (anytoC($weather["dewpoint"])>=0 ){echo "<icon-0-5>".$weather["dewpoint"]."</icon-0-5> 6 10 12 15 20 25 30";}
else if (anytoC($weather["dewpoint"])>=-10 ){echo "<icon-minus10>".$weather["dewpoint"]."</icon-minus10> <blue>0</blue> 5 10 12 15 18 20 25";}
else if (anytoC($weather["dewpoint"])>=-20 ){echo "<icon-minus10>".$weather["dewpoint"]."</icon-minus10> -10 <blue>0</blue> 10 12 15 18 20";}
else if (anytoC($weather["dewpoint"])>=-30 ){echo "<icon-minus10>".$weather["dewpoint"]."</icon-minus10> -20 -10 <blue>0</blue> 10 12 15 18";}
else if (anytoC($weather["dewpoint"])>=-40 ){echo "<icon-minus10>".$weather["dewpoint"]."</icon-minus10> -30 -20 -10 <blue>0</blue> 10 15 18";}
else if (anytoC($weather["dewpoint"])>=-50 ){echo "<icon-minus10>".$weather["dewpoint"]."</icon-minus10> -40 -30 -20 -10 <blue>0</blue> 10 12";}
}
echo "<smalltempunit2>&deg;".$weather["temp_units"];
?></smalltempunit2>
</valuetextheading5>
<div class=sunratebar>
<div class="weather34sunratebar" 
style="width: 
<?php if(anytoC($weather["dewpoint"])>=0){echo anytoC($weather["dewpoint"])*3;}else echo "2";?>px;
background:
<?php //dewpoint color bar
if (anytoC($weather["dewpoint"])>=40 ){echo 'var(--temp45-50)';}
elseif (anytoC($weather["dewpoint"])>=30 ){echo 'var(--temp30-35)';}
elseif (anytoC($weather["dewpoint"])>=25 ){echo 'var(--temp25-30)';}
elseif (anytoC($weather["dewpoint"])>=20 ){echo 'var(--temp20-25)';}
elseif (anytoC($weather["dewpoint"])>=18 ){echo 'var(--temp15-20)';}
elseif (anytoC($weather["dewpoint"])>=15 ){echo 'var(--temp15-20)';}
elseif (anytoC($weather["dewpoint"])>=10 ){echo 'var(--yellow)';}
elseif (anytoC($weather["dewpoint"])>=6 ){echo 'var(--green)';}
elseif (anytoC($weather["dewpoint"])>=0 ){echo 'var(--blue)';}
elseif (anytoC($weather["dewpoint"])>-20 ){echo 'var(--temp-5-10)';}
elseif (anytoC($weather["dewpoint"])>=-50 ){echo 'var(--temp-5-10)';}
?>;">
</div></div></div>

<div class=extrainfo><a href='dewpoint-almanac2.php' data-lity data-title="Almanac Data"><?php echo  "Extra Data&nbsp;".$chartlinks?></a></div></div>


<div class="weather-tempicon-identity">    
<?php //dewpoint id icon
if(anytoC($weather["dewpoint"])<0){ echo "<icon-minus10>&deg;".$weather["temp_units"]."<icon-minus10>";}
else if(anytoC($weather["dewpoint"])<6){ echo "<icon-0-5>&deg;".$weather["temp_units"]."</icon-0-5>";}
else if(anytoC($weather["dewpoint"])<10){ echo "<icon-6-10>&deg;".$weather["temp_units"]."</icon-6-10>";}
else if(anytoC($weather["dewpoint"])<15){ echo "<icon-11-15>&deg;".$weather["temp_units"]."</icon-11-15>";}
else if(anytoC($weather["dewpoint"])<20){ echo "<icon-16-20>&deg;".$weather["temp_units"]."</icon-16-20>";}
else if(anytoC($weather["dewpoint"])<25){ echo "<icon-21-25>&deg;".$weather["temp_units"]."</icon-21-25>";}
else if(anytoC($weather["dewpoint"])<30){ echo "<icon-26-30>&deg;".$weather["temp_units"]."</icon-26-30>";}
else if(anytoC($weather["dewpoint"])<35){ echo "<icon-31-35>&deg;".$weather["temp_units"]."</icon-31-35>";}
else if(anytoC($weather["dewpoint"])<40){ echo "<icon-36-40>&deg;".$weather["temp_units"]."</icon-36-40>";}
else if(anytoC($weather["dewpoint"])<100){ echo "<icon-41-45>&deg;".$weather["temp_units"]."</icon-41-45>";}
 ?></div>