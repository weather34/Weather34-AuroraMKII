<?php include('livedata.php');
$numberformat=1;
if ($weather["wind_units"]=='kts'){$numberformat=0;}
?>
<div class="modulecaption2" >Average Wind Speed</div>

<div class="maxwindgauge">
<?php  //Average Today
echo $max1.' Average Today ';
if($meteobridgeapi[158]>=16.66 ){echo "<red>" .number_format($weather['wind_speed_avgday'],$numberformat)."</red>&nbsp;<smalltempunit2> ".$windunit;}
else if($meteobridgeapi[158]>=11.11 ){echo "<orange>" .number_format($weather['wind_speed_avgday'],$numberformat)."</orange>&nbsp;<smalltempunit2>".$windunit;}
else if($meteobridgeapi[158]>=3 ){echo "<yellow>" .number_format($weather['wind_speed_avgday'],$numberformat)."</yellow>&nbsp;<smalltempunit2>".$windunit;}
else if($meteobridgeapi[158]>=0 ){echo "<green>" .number_format($weather['wind_speed_avgday'],$numberformat)."</green>&nbsp;<smalltempunit2>".$windunit;}
?></div>

<div class="maxbftgauge">
<?php  //BFT Max
echo $max1."  BFT Today Max ";
if($weather["bft-daymax"]>=12){echo "<red>".$weather['bft-daymax']."</red> &nbsp;";echo $beaufort12s;}
else if($weather["bft-daymax"]>=11){echo "<red>".$weather['bft-daymax']."</red> &nbsp;";echo $beaufort11s;}
else if($weather["bft-daymax"]>=10){echo "<red>".$weather['bft-daymax']."</red> &nbsp;";echo $beaufort10s;}
else if($weather["bft-daymax"]>=9){echo "<red>".$weather['bft-daymax']."</red> &nbsp;";echo $beaufort9s;}
else if($weather["bft-daymax"]>=8){echo "<red>".$weather['bft-daymax']."</red> &nbsp;";echo $beaufort8s;}
else if($weather["bft-daymax"]>=7){echo "<red>".$weather['bft-daymax']."</red> &nbsp;";echo $beaufort7s;}
else if($weather["bft-daymax"]>=6){echo "<orange>".$weather['bft-daymax']."</orange> &nbsp;";echo $beaufort6s;}
else if($weather["bft-daymax"]>=5){echo "<orange>".$weather['bft-daymax']."</orange> &nbsp;";echo $beaufort5s;}
else if($weather["bft-daymax"]>=4){echo "<yellow>".$weather['bft-daymax']."</yellow> &nbsp;";echo $beaufort4s;}
else if($weather["bft-daymax"]>=3){echo "<yellow>".$weather['bft-daymax']."</yellow> &nbsp; ";echo $beaufort3s;}
else if($weather["bft-daymax"]>=2){echo "<green>".$weather['bft-daymax']."</green> &nbsp;";echo $beaufort2s;}
else if($weather["bft-daymax"]>=0){echo "<green>".$weather['bft-daymax']."</green> &nbsp;";echo $beaufort1s;}
?></div>


<div class="button button-dial">       
<div class="button-dial-top"></div>
<realfeel>
<?php  
echo '10" Max ';
if($meteobridgeapi[40]>=16.66){echo "<icon-26-30>" .number_format($weather["wind_speed_max"],$formatdecimal)."</icon-26-30>&nbsp;";}
else if($meteobridgeapi[40]>=12.5 ){echo "<icon-21-25>" .number_format($weather["wind_speed_max"],$formatdecimal)."</icon-21-25>&nbsp;";}
else if($meteobridgeapi[40]>=2.77 ){echo "<icon-11-15>" .number_format($weather["wind_speed_max"],$formatdecimal)."</icon-11-15>&nbsp;";}
else if($meteobridgeapi[40]>=1.3 ){echo "<icon-6-10>" .number_format($weather["wind_speed_max"],$formatdecimal)."</icon-6-10>&nbsp;";}
else if($meteobridgeapi[40]>=0 ){echo "<green>" .number_format($weather["wind_speed_max"],$formatdecimal)."</green>&nbsp;";}     
?>
</realfeel>
<div class="button-dial-label" style="font-family:<?php if ($fontweight=="yes"){echo "weathertext2";}else echo "weathertext3";?>;font-size:<?php echo $fontsize?>px;">      
<?php 
if($meteobridgeapi[17]>=16.66){ echo "<icon-31-35>".number_format($weather["wind_speed"],$numberformat)."</icon-31-35>";}   
else if($meteobridgeapi[17]>=12.5){ echo "<icon-21-25>".number_format($weather["wind_speed"],$numberformat)."</icon-21-25>";}          
else if($meteobridgeapi[17]>=2.77){ echo "<icon-11-15>".number_format($weather["wind_speed"],$numberformat)."</icon-11-15>";}     
else if($meteobridgeapi[17]>=1.3){ echo "<icon-6-10>".number_format($weather["wind_speed"],$numberformat)."</icon-6-10>";}
else if($meteobridgeapi[17]>=0){ echo "<green>".number_format($weather["wind_speed"],$numberformat)."</green>";}                     
?></div></div><div>

<?php //unit
echo "<windunitindicator>";echo $weather["wind_units"];echo "</windunitindicator>";?>
<?php //man walking-running
echo "<windindicator>Average</windindicator>";?>
</div></div></div></div></div>

<div class="windgauge">
<div class="second24hourguage">
<?php echo "<solarheading style='margin-left:-32px'>Beaufort</solarheading>";?>
<div class="button button-dialrain">               
 <div class="button-dial-toprain"></div>
<div class="button-dial-label"> 
<?php echo "<uvreadings style='opacity:0.8;background:";
if ($weather['wind_speed_bft']>=7 ){echo 'var(--red)';}
elseif ($weather['wind_speed_bft']>=5 ){echo 'var(--orange)';}
elseif ($weather['wind_speed_bft']>=3 ){echo 'var(--yellow)';}
elseif ($weather['wind_speed_bft']>=0 ){echo 'var(--green)';}
echo "'>";
echo "<uvopacity>".number_format($weather['wind_speed_bft'],0)." <uvunits>BFT</uvunits></uvopacity></uvreadings";
?>  
</div></div></div>
<div class="weather34i-rairate-bar2">
<div id="raincontainer2">
<div id="weather34rainbeaker2">
  <?php //relative 24 hour 50mm/2in scale
  echo "<volumeb>12BFT <br>10 <br>8 <br>6 <br>4 <br>2 </volumeb>";
  ?>
<div id="weather34rainwater2" style="height:<?php if ($weather['wind_speed_bft']>3){echo $weather['wind_speed_bft']*4.15;}else echo $weather['wind_speed_bft']*4.08;
?>pt;opacity:0.7;background:
<?php //solar color
if ($weather['wind_speed_bft']>=7 ){echo 'var(--red)';}
elseif ($weather['wind_speed_bft']>=5 ){echo 'var(--orange)';}
elseif ($weather['wind_speed_bft']>=3 ){echo 'var(--yellow)';}
elseif ($weather['wind_speed_bft']>=0 ){echo 'var(--green)';}?>">        
</div></div></div></div></div></div>


<div class="heatcirclerain1" >
<div class="rainrateextra2">
<valuetextheading5>
<?php //  weather34 simple css wind speed scale 
$weather['wind_speed']=number_format($weather['wind_speed'],$numberformat);
if ($weather["wind_units"]=="km/h"){
if ($meteobridgeapi[17]>=16.66){echo "0&nbsp;10&nbsp;20&nbsp;30&nbsp;40&nbsp;50&nbsp;55&nbsp;<icon-31-35>".$weather['wind_speed']."+</icon-31-35>&nbsp";}
else if ($meteobridgeapi[17]>=13.88){echo "0&nbsp;10&nbsp;20&nbsp;30&nbsp;40&nbsp;<icon-26-30>".$weather['wind_speed']."</icon-26-30>&nbsp;60+&nbsp";}
else if ($meteobridgeapi[17]>=12.5){echo "0&nbsp;10&nbsp;20&nbsp;30&nbsp;<icon-21-25>".$weather['wind_speed']."</icon-21-25>&nbsp;50&nbsp;60+&nbsp";}
else if ($meteobridgeapi[17]>=11.11){echo "0&nbsp;10&nbsp;20&nbsp;30&nbsp;<icon-11-15>".$weather['wind_speed']."</icon-11-15>&nbsp;50&nbsp;60+&nbsp";}
else if ($meteobridgeapi[17]>=8.33){echo "0&nbsp;10&nbsp;20&nbsp;<icon-11-15>".$weather['wind_speed']."</icon-11-15>&nbsp;40&nbsp;50&nbsp;60+&nbsp";}
else if ($meteobridgeapi[17]>=5.5){echo "0&nbsp;10&nbsp;<icon-11-15>".$weather['wind_speed']."</icon-11-15>&nbsp;30&nbsp;40&nbsp;50&nbsp;60+&nbsp";}
else if ($meteobridgeapi[17]>=2.77){echo "0&nbsp;<icon-11-15>".$weather['wind_speed']."</icon-11-15>&nbsp;20&nbsp;30&nbsp;40&nbsp;50&nbsp;60+&nbsp";}
else if ($meteobridgeapi[17]>=1.3){echo " 0&nbsp;<icon-6-10>".$weather['wind_speed']."</icon-6-10>&nbsp;10&nbsp;20&nbsp;30&nbsp;40&nbsp;50&nbsp;60+";}
else if ($meteobridgeapi[17]>=0){echo "<green>".$weather['wind_speed']."</green>&nbsp;5&nbsp;10&nbsp;20&nbsp;30&nbsp;40&nbsp;50&nbsp;60+";}}
//mph
if ($weather["wind_units"]=="mph"){
if ($meteobridgeapi[17]>=16.66){echo "0&nbsp;12&nbsp;18&nbsp;24&nbsp;27&nbsp;31&nbsp;37&nbsp;<icon-31-35>".$weather['wind_speed']."+</icon-31-35>&nbsp";}
else if ($meteobridgeapi[17]>=13.88){echo "0&nbsp;6&nbsp;12&nbsp;18&nbsp;37&nbsp;<icon-21-25>".$weather['wind_speed']."</icon-26-30>&nbsp;37&nbsp40+";}
else if ($meteobridgeapi[17]>=12.5){echo "0&nbsp;6&nbsp;12&nbsp;18&nbsp;<icon-21-25>".$weather['wind_speed']."</icon-21-25>&nbsp;31&nbsp;37+&nbsp";}
else if ($meteobridgeapi[17]>=11.11){echo "0&nbsp;6&nbsp;12&nbsp;18&nbsp;<icon-11-15>".$weather['wind_speed']."</icon-11-15>&nbsp;27&nbsp;31&nbsp37+";}
else if ($meteobridgeapi[17]>=8.33){echo "0&nbsp;4&nbsp;6&nbsp;<icon-11-15>".$weather['wind_speed']."</icon-11-15>&nbsp;24&nbsp;27&nbsp;31&nbsp37+";}
else if ($meteobridgeapi[17]>=5.5){echo "0&nbsp;4&nbsp;<icon-11-15>".$weather['wind_speed']."</icon-11-15>&nbsp;18&nbsp;24&nbsp;27&nbsp;31&nbsp37+";}
else if ($meteobridgeapi[17]>=2.77){echo "0&nbsp;<icon-11-15>".$weather['wind_speed']."</icon-11-15>&nbsp;15&nbsp;18&nbsp;24&nbsp;37&nbsp;31&nbsp37+";}
else if ($meteobridgeapi[17]>=1.3){echo "0&nbsp;<icon-6-10>".$weather['wind_speed']."</icon-6-10>&nbsp;6&nbsp;12&nbsp;18&nbsp;24&nbsp;31&nbsp;37+&nbsp";}
else if ($meteobridgeapi[17]>=0){echo "<green>".$weather['wind_speed']."</green>&nbsp;4&nbsp;6&nbsp;12&nbsp;18&nbsp;24&nbsp;31&nbsp;37+&nbsp";}
}
//kts          
if ($weather["wind_units"]=="kts" && $weather['wind_speed']>=26.99){echo "0&nbsp;5&nbsp;12&nbsp;16&nbsp;20&nbsp;26&nbsp;32&nbsp;&nbsp;<red>".number_format($weather["wind_speed"],0)."</red>&nbsp&nbsp&nbsp";}
else if ($weather["wind_units"]=="kts" && $weather['wind_speed']>=24.29){echo "0&nbsp;5&nbsp;12&nbsp;16&nbsp;20&nbsp;26&nbsp;<red>".number_format($weather["wind_speed"],0)."</red>&nbsp;50+&nbsp";}
else if ($weather["wind_units"]=="kts" && $weather['wind_speed']>=21.59){echo "0&nbsp;5&nbsp;12&nbsp;16&nbsp;20&nbsp;<orange>".number_format($weather["wind_speed"],0)."</orange>&nbsp;32&nbsp;50+&nbsp";}
else if ($weather["wind_units"]=="kts" && $weather['wind_speed']>=16.19){echo "0&nbsp;5&nbsp;12&nbsp;16&nbsp;<orange>".number_format($weather["wind_speed"],0)."</orange>&nbsp;26&nbsp;32&nbsp;50+&nbsp";}
else if ($weather["wind_units"]=="kts" && $weather['wind_speed']>=10.79){echo "0&nbsp;5&nbsp;12&nbsp;<yellow>".number_format($weather["wind_speed"],0)."</yellow>&nbsp;20&nbsp;26&nbsp;32&nbsp;50+&nbsp";}
else if ($weather["wind_units"]=="kts" && $weather['wind_speed']>=5.39){echo "0&nbsp;5&nbsp;<yellow>".number_format($weather["wind_speed"],0)."</yellow>&nbsp;16&nbsp;20&nbsp;26&nbsp;32&nbsp;50&nbsp";}
else if ($weather["wind_units"]=="kts" && $weather['wind_speed']>=2.69){echo "0&nbsp;<green>".number_format($weather["wind_speed"],0)."</green>&nbsp;12&nbsp;16&nbsp;20&nbsp;26&nbsp;32&nbsp;50+&nbsp";}
else if ($weather["wind_units"]=="kts" && $weather['wind_speed']>=0){echo "<green>".number_format($weather["wind_speed"],0)."</green>&nbsp;5&nbsp;12&nbsp;16&nbsp;20&nbsp;26&nbsp;32&nbsp;50+";}
//ms
if ($weather["wind_units"]=="m/s" && $weather['wind_speed']>=16.66){echo  "0&nbsp;&nbsp;2&nbsp;&nbsp;6&nbsp;&nbsp;8&nbsp;&nbsp;11&nbsp;&nbsp;14&nbsp;&nbsp;<red>".$weather['wind_speed']."</red>&nbsp;&nbsp;&nbsp;";}
else if ($weather["wind_units"]=="m/s" && $weather['wind_speed']>=13.88){echo  "0&nbsp;&nbsp;2&nbsp;&nbsp;6&nbsp;&nbsp;8&nbsp;&nbsp;11&nbsp;&nbsp;<red>14</red>&nbsp;&nbsp;".$weather['wind_speed']."+&nbsp;&nbsp;&nbsp;";}
else if ($weather["wind_units"]=="m/s" && $weather['wind_speed']>=12.49){echo  "0&nbsp;&nbsp;2&nbsp;&nbsp;6&nbsp;&nbsp;8&nbsp;&nbsp;<orange>".$weather['wind_speed']."</orange>&nbsp;&nbsp;14&nbsp;&nbsp;16+&nbsp;&nbsp;&nbsp;";}
else if ($weather["wind_units"]=="m/s" && $weather['wind_speed']>=8){echo  "0&nbsp;&nbsp;2&nbsp;&nbsp;6&nbsp;&nbsp;<yellow>".$weather['wind_speed']."</yellow>&nbsp;&nbsp;11&nbsp;&nbsp;14&nbsp;&nbsp;16+&nbsp;&nbsp;&nbsp;";}
else if ($weather["wind_units"]=="m/s" && $weather['wind_speed']>=6){echo  "0&nbsp;&nbsp;2&nbsp;&nbsp;<yellow>".$weather['wind_speed']."</yellow>&nbsp;&nbsp;8&nbsp;&nbsp;11&nbsp;&nbsp;14&nbsp;&nbsp;16+&nbsp;&nbsp;&nbsp;";}
else if ($weather["wind_units"]=="m/s" && $weather['wind_speed']>=2.77){echo  "0&nbsp;&nbsp;<yellow>".$weather['wind_speed']."</yellow>&nbsp;&nbsp;6&nbsp;&nbsp;8&nbsp;&nbsp;11&nbsp;&nbsp;14&nbsp;&nbsp;16+&nbsp;&nbsp;&nbsp;";}
else if ($weather["wind_units"]=="m/s" && $weather['wind_speed']>=1.38){echo  "<green>".$weather['wind_speed']."</green>&nbsp;&nbsp;2&nbsp;&nbsp;6&nbsp;&nbsp;8&nbsp;&nbsp;11&nbsp;&nbsp;14&nbsp;&nbsp;16+&nbsp;&nbsp;&nbsp;";}
else if ($weather["wind_units"]=="m/s" && $weather['wind_speed']>=0){echo  "<green>".$weather['wind_speed']."</green>&nbsp;&nbsp;2&nbsp;&nbsp;6&nbsp;&nbsp;8&nbsp;&nbsp;11&nbsp;&nbsp;14&nbsp;&nbsp;16+&nbsp;&nbsp;&nbsp;";}

echo "<smalltempunit2>&nbsp;".$weather["wind_units"];?></smalltempunit2>
</valuetextheading5>
<div class=sunratebar>
<div class="weather34sunratebar" 
style="width:<?php echo ($meteobridgeapi[17])*5;?>px;
background:<?php 
if ($meteobridgeapi[17]>=16.66 ){echo '#cc504c';}
elseif ($meteobridgeapi[17]>=12.5 ){echo '#d87040';}
elseif ($meteobridgeapi[17]>=2.77 ){echo '#e6a241';}
elseif ($meteobridgeapi[17]>=0){echo '#9bbc2f';}
?>;">
</div></div></div>

<div class=extrainfo><a href='wind-avg-almanac2.php' data-lity data-title="Almanac Data"><?php echo  $aqilinks?>&nbsp;Extra Info</a></div></div>


<div class="weather-icon-identity-wind"><?php 
if ($weather['wind_speed_bft']>=12) {echo " &nbsp; $beaufort12";}
else if ($weather['wind_speed_bft']>=11){echo " &nbsp; $beaufort11";}
else if ($weather['wind_speed_bft']>=10){echo " &nbsp;$beaufort10";}
else if ($weather['wind_speed_bft']>=9) {echo " &nbsp;$beaufort9";}
else if ($weather['wind_speed_bft']>=8) {echo " &nbsp;$beaufort8";}    
else if ($weather['wind_speed_bft']>=7) {echo " &nbsp;$beaufort7";}
else if ($weather['wind_speed_bft']>=6) {echo " &nbsp;$beaufort6";}
else if ($weather['wind_speed_bft']>=5) {echo " &nbsp;$beaufort5";} 
else if ($weather['wind_speed_bft']>=4) {echo " &nbsp;$beaufort4";}        
else if ($weather['wind_speed_bft']>=3) {echo " &nbsp;$beaufort3";}
else if ($weather['wind_speed_bft']>=2) {echo " &nbsp;$beaufort2";}
else if ($weather['wind_speed_bft']>=1) {echo " &nbsp;$beaufort1";} 
else if ($weather['wind_speed_bft']>=0) {echo " &nbsp;$beaufort0";}  
?></div></div></div>