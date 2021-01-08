<?php 
  #################################################
	#	CREATED FOR Weather34	Aurora			
	# December 2020 	 	                                                                                               
	# https://www.weather34.com/homeweatherstation/ 	                                                                   
	#################################################
include('livedata.php');date_default_timezone_set($TZ);?>
<div class="modulecaptionb">Indoor</div>
<div class="maxuvindex">
<?php echo $max1 ." Feels Like ";

//c
if($weather["temp_units"]=='C' && $weather["temp_indoor_feel"]<15) {
echo '<blue>'.$weather["temp_indoor_feel"].'</blue>&deg;';}
else if($weather["temp_units"]=='C' && $weather["temp_indoor_feel"]>24) {
echo '<red>'.$weather["temp_indoor_feel"].'</red>&deg;';}
else if($weather["temp_units"]=='C' && $weather["temp_indoor_feel"]>19) {
echo '<orange>'.$weather["temp_indoor_feel"].'</orange>&deg;';}
else if($weather["temp_units"]=='C' && $weather["temp_indoor_feel"]>=15) {
echo '<yellow>'.$weather["temp_indoor_feel"].'</yellow>&deg;';}
//f
if($weather["temp_units"]=='F' && $weather["temp_indoor_feel"]<59) {
echo '<blue>'.$weather["temp_indoor_feel"].'</blue>&deg;';}
else if($weather["temp_units"]=='F' && $weather["temp_indoor_feel"]>75.2) {
echo '<red>'.$weather["temp_indoor_feel"].'</red>&deg;';}
else if($weather["temp_units"]=='F' && $weather["temp_indoor_feel"]>66.2) {
echo '<orange>'.$weather["temp_indoor_feel"].'</orange>&deg;';}
else if($weather["temp_units"]=='F' && $weather["temp_indoor_feel"]>=59) {
echo '<yellow>'.$weather["temp_indoor_feel"].'</yellow>&deg;';}?></div>

<uvheading style='margin-left:-42px'>Temperature</uvheading>
<div class="button button-dialrain">               
 <div class="button-dial-toprain"></div>
<div class="button-dial-label"> 
<?php echo "<uvreadings style='opacity:0.8;background:";
if (anyToC($weather["temp_indoor"])>=30 ){echo '#703232';}
elseif (anyToC($weather["temp_indoor"])>=25 ){echo '#d35f50';}
elseif (anyToC($weather["temp_indoor"])>=20 ){echo '#d87040';}
elseif (anyToC($weather["temp_indoor"])>=18 ){echo '#e6a241';}
elseif (anyToC($weather["temp_indoor"])>=15 ){echo '#9bbc2f';}
elseif (anyToC($weather["temp_indoor"])>0 ){echo '#00adbd';}
echo "'>";
echo "<uvopacity>".number_format($weather["temp_indoor"],1)." <uvunits>".$weather["temp_units"]."</uvunits></uvopacity></uvreadings";
?>  
</div></div></div>

<div class="weather34i-rairate-bar2" >
<div id="raincontainer2">
<div id="weather34rainbeaker2">
  <?php //relative scale
 if($weather["temp_units"]=='F'){echo "<volume>86 <br>77 <br>68 <br>59 <br>50 <br>32 </volume>";}  
 else echo "<volume>30 <br>25 <br>20 <br>15 <br>10 <br>0 </volume>";

  ?>
<div id="weather34rainwater2" style="height:<?php echo $meteobridgeapi[22]*1.6;?>pt;
opacity:0.7;background:
<?php //uv color
if (anyToC($weather["temp_indoor"])>=30 ){echo '#703232';}
elseif (anyToC($weather["temp_indoor"])>=25 ){echo '#d35f50';}
elseif (anyToC($weather["temp_indoor"])>=20 ){echo '#d87040';}
elseif (anyToC($weather["temp_indoor"])>=18 ){echo '#e6a241';}
elseif (anyToC($weather["temp_indoor"])>=15 ){echo '#9bbc2f';}
elseif (anyToC($weather["temp_indoor"])>0 ){echo '#00adbd';}
?>">        
</div></div></div>

<div class="second24hourguage">
  <?php echo "<solarheading style='margin-left:-32px'>Humidity</solarheading>";?>
<div class="button button-dialrain">               
 <div class="button-dial-toprain"></div>
<div class="button-dial-label"> 
<?php echo "<uvreadings style='opacity:0.8;background:";
if ($weather["humidity_indoor"]>=70 ){echo 'var(--blue)';}
elseif ($weather["humidity_indoor"]>=60 ){echo 'var(--yellow)';}
elseif ($weather["humidity_indoor"]>=40 ){echo 'var(--green)';}
elseif ($weather["humidity_indoor"]>=0 ){echo 'var(--red)';}
echo "'>";
echo "<uvopacity>".number_format($weather["humidity_indoor"],0)." <uvunits>%</uvunits></uvopacity></uvreadings";
?>  
</div></div></div>
<div class="weather34i-rairate-bar2">
<div id="raincontainer2">
<div id="weather34rainbeaker2">
  <?php //relative scale
  echo "<volume>100 <br>80 <br>60 <br>40 <br>20 <br>0 </volume>";
  ?>
<div id="weather34rainwater2" style="height:<?php echo $weather["humidity_indoor"]*0.55;?>pt;opacity:0.7;background:
<?php //solar color
if ($weather["humidity_indoor"]>=70 ){echo 'var(--blue)';}
elseif ($weather["humidity_indoor"]>=60 ){echo 'var(--yellow)';}
elseif ($weather["humidity_indoor"]>=40 ){echo 'var(--green)';}
elseif ($weather["humidity_indoor"]>=0 ){echo 'var(--red)';}?>">        
</div></div></div></div></div></div>

<div class="rainratephrases" style="margin-left:-40px">
<valuetextheading5>
<?php 
if($weather["temp_indoor_trend"] >0)echo "Rising&nbsp;".number_format($weather["temp_indoor_trend"],1)."&nbsp;".$risingsymbolsmall;
else if($weather["temp_indoor_trend"]<0)echo "Falling &nbsp;".number_format($weather["temp_indoor_trend"],1)."&nbsp;".$fallingsymbolsmall;
else echo "Steady";?>
</valuetextheading5>
</div>

<div class="rainratephrases" style="margin-left:110px">
<?php 
if($weather["humidity_indoortrend"] >0)echo "Rising&nbsp;".$weather["humidity_indoortrend"]." % &nbsp;".$risingsymbolsmall;
else if($weather["humidity_indoortrend"]<0)echo "Falling &nbsp;".$weather["humidity_indoortrend"]." % &nbsp;".$fallingsymbolsmall;
else echo "Steady";?> </div></div>
