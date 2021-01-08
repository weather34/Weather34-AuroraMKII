<?php 
	####################################################################################################
	#	HOME WEATHER STATION TEMPLATE by BRIAN UNDERDOWN 2015-2016-2017                                #
	#	CREATED FOR HOMEWEATHERSTATION TEMPLATE at 													   #
	#   https://weather34.com/homeweatherstation/index.html 										   # 
	# 	WEATHER STATION TEMPLATE 2015-2017                 										       #
	# 	     MB SMART Version Revised September 2019 								                   #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################
//original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
include('livedata.php');header('Content-type: text/html; charset=utf-8');	?>
<div class="sunblock">
<div class="indoordesc2">Indoor</div>
<div class="button button-dial-small">      
<div class="button-dial-top-small"></div>
<div class="button-dial-label-small">          
<?php 
if ($weather["temp_units"]=='C'){
if($weather["temp_indoor"]<15) {
	echo '<blue>'.$weather["temp_indoor"].'</blue>';}
	else if($weather["temp_indoor"]>26) {echo '<red>'.$weather["temp_indoor"].'</red>';}
	else if($weather["temp_indoor"]>19) {echo '<orange>'.$weather["temp_indoor"].'</orange>';}
	else if($weather["temp_indoor"]>=18) {echo '<yellow>'.$weather["temp_indoor"].'</yellow>';}
	else if($weather["temp_indoor"]>=15) {echo '<green>'.$weather["temp_indoor"].'</green>';}
	echo '<grey>&deg;</grey>';}

	else if ($weather["temp_units"]=='F'){
		if($weather["temp_indoor"]<59) {echo '<blue>'.$weather["temp_indoor"].'</blue>';}
		else if($weather["temp_indoor"]>78) {echo '<red>'.$weather["temp_indoor"].'</red>';}
		else if($weather["temp_indoor"]>66) {echo '<orange>'.$weather["temp_indoor"].'</orange>';}
		else if($weather["temp_indoor"]>64) {echo '<yellow>'.$weather["temp_indoor"].'</yellow>';}
		else if($weather["temp_indoor"]>=59) {echo '<green>'.$weather["temp_indoor"].'</green>';}
	echo '<grey>&deg;</grey>';}

?>  
<indoorpm>
<?php if ($weather["humidity_indoor"]>=70 ){echo '<blue>'.$weather["humidity_indoor"]."</blue>";}
elseif ($weather["humidity_indoor"]>=60 ){echo '<yellow>'.$weather["humidity_indoor"]."</yellow>";}
elseif ($weather["humidity_indoor"]>40 ){echo '<green>'.$weather["humidity_indoor"]."</green>";}
elseif ($weather["humidity_indoor"]>0 ){echo '<red>'.$weather["humidity_indoor"]."</red>";}
echo "%";
?>
</indoorpm></div></div>

<div class="indoortempa-mod2a"> 
<valuetextheadingindoor>
<?php // weather34 simple css indoor temp scale 
if ($weather["temp_units"]=='C'){
if ($weather["temp_indoor"]>=35 ){echo "0 5 10 15 20 25 30 <red>".$weather["temp_indoor"]."</red>+ ";}
else if ($weather["temp_indoor"]>=30 ){echo "0 5 10 15 20 25 <red>".$weather["temp_indoor"]."</red> 35+ ";}
else if ($weather["temp_indoor"]>=25 ){echo "0 5 10 15 20 <red>".$weather["temp_indoor"]."</red> 30 35+ ";}
else if ($weather["temp_indoor"]>=22 ){echo "0 5 10 15 <orange>".$weather["temp_indoor"]."</orange> 25 30 35+ ";}
else if ($weather["temp_indoor"]>=20 ){echo "0 5 10 15 <orange>".$weather["temp_indoor"]."</orange> 25 30 35+ ";}
else if ($weather["temp_indoor"]>=18){echo "0 5 10 15 <yellow>".$weather["temp_indoor"]."</yellow> 20 25 30+ ";}
else if ($weather["temp_indoor"]>=15 ){echo "0 5 10 <green>".$weather["temp_indoor"]."</green> 20 25 30 35+ ";}
else if ($weather["temp_indoor"]>=10 ){echo "0 5<blue>".$weather["temp_indoor"]."</blue> 15 20 25 30 35+ ";}
else if ($weather["temp_indoor"]>=5 ){echo "0 <blue>".$weather["temp_indoor"]."</blue> 10 15 20 25 30 35+ ";}
else if ($weather["temp_indoor"]>=0 ){echo "<blue>".$weather["temp_indoor"]."</blue> 5 10 15 20 25 30 35+ ";}}

if ($weather["temp_units"]=='F'){
if ($weather["temp_indoor"]>=95 ){echo "32 41 50 59 68 77 86 <red>".$weather["temp_indoor"]."</red>+ ";}
else if ($weather["temp_indoor"]>=86 ){echo "32 41 50 59 68 77 <red>".$weather["temp_indoor"]."</red> 95+ ";}
else if ($weather["temp_indoor"]>=77 ){echo "32 41 50 59 68 <red>".$weather["temp_indoor"]."</red> 86 95+ ";}
else if ($weather["temp_indoor"]>=71.6 ){echo "32 41 50 59 <orange>".$weather["temp_indoor"]."</orange> 77 86 95+ ";}
else if ($weather["temp_indoor"]>=68 ){echo "32 41 50 59 <orange>".$weather["temp_indoor"]."</orange> 77 86 95+ ";}
else if ($weather["temp_indoor"]>=64){echo "32 41 50 59 <yellow>".$weather["temp_indoor"]."</yellow> 68 77 86+ ";}
else if ($weather["temp_indoor"]>=59 ){echo "32 41 50 <green>".$weather["temp_indoor"]."</green> 68 77 86 95+ ";}
else if ($weather["temp_indoor"]>=50 ){echo "32 41 <blue>".$weather["temp_indoor"]."</blue>59 68 77 86 95+ ";}
else if ($weather["temp_indoor"]>=41 ){echo "32 <blue>".$weather["temp_indoor"]."</blue> 50 59 68 77 86 95+ ";}
else if ($weather["temp_indoor"]>=32 ){echo "<blue>".$weather["temp_indoor"]."</blue> 41 50 59 68 77 86 95+ ";}}
echo "&deg;".$weather["temp_units"];
if($weather["temp_indoor_trend"] >0)echo "&nbsp;".$risingsymbolsmall;
  else if($weather["temp_indoor_trend"]<0)echo "&nbsp;".$fallingsymbolsmall;
?>
</valuetextheadingindoor>
<div class=sunratebar>
<div class="weather34sunratebar" 
style="width:
<?php 
if ($weather["temp_units"]=='C'){
echo $weather["temp_indoor"]*2.5;}

else if ($weather["temp_units"]=='F'){
	echo $weather["temp_indoor"]*1;}
?>px;
background:
<?php 
if ($weather["temp_units"]=='C'){
if ($weather["temp_indoor"]>=30 ){echo '#703232';}
elseif ($weather["temp_indoor"]>=25 ){echo '#d35f50';}
elseif ($weather["temp_indoor"]>=20 ){echo '#d87040';}
elseif ($weather["temp_indoor"]>18 ){echo '#e6a241';}
elseif ($weather["temp_indoor"]>15 ){echo '#9bbc2f';}
elseif ($weather["temp_indoor"]>0 ){echo '#00adbd';}}

else if ($weather["temp_units"]=='F'){
	if ($weather["temp_indoor"]>=86 ){echo '#703232';}
	elseif ($weather["temp_indoor"]>=77 ){echo '#d35f50';}
	elseif ($weather["temp_indoor"]>=68 ){echo '#d87040';}
	elseif ($weather["temp_indoor"]>64 ){echo '#e6a241';}
	elseif ($weather["temp_indoor"]>59 ){echo '#9bbc2f';}
	elseif ($weather["temp_indoor"]>32 ){echo '#00adbd';}}
?>;">
</div></div></div>

<div class="indoortempa-mod3a"> 
<valuetextheadingindoor>
<?php // weather34 simple css indoor humidity scale 
if ($weather["humidity_indoor"]>=70 ){echo "0 10 20 30 40 50 60 <blue>".$weather["humidity_indoor"]."</blue> 100 % ";}
else if ($weather["humidity_indoor"]>=60 ){echo "0 10 20 30 40 50 <yellow>".$weather["humidity_indoor"]."</yellow> 70 100 % ";}
else if ($weather["humidity_indoor"]>=50 ){echo "0 10 20 30 40 <green>".$weather["humidity_indoor"]."</green> 60 70 100 % ";}
else if ($weather["humidity_indoor"]>=40 ){echo "0 10 20 30 <green>".$weather["humidity_indoor"]."</green> 50 60 70 100 % ";}
else if ($weather["humidity_indoor"]>=30 ){echo "0 10 20 <red>".$weather["humidity_indoor"]."</red> 40 50 60 70 100 % ";}
else if ($weather["humidity_indoor"]>=20 ){echo "0 10 <red>".$weather["humidity_indoor"]."</red> 30 40 50 60 70 100 % ";}
else if ($weather["humidity_indoor"]>=10 ){echo "0 <red>".$weather["humidity_indoor"]."</red> 20 30 40 50 60 70 100 % ";}
else if ($weather["humidity_indoor"]>=0 ){echo "<red>".$weather["humidity_indoor"]."</red> 10 20 30 40 50 60 70 100 % ";}
if($weather["humidity_indoortrend"] >0)echo " ".$risingsymbolsmall;
  else if($weather["humidity_indoortrend"]<0)echo " ".$fallingsymbolsmall;
?>
</valuetextheadingindoor>
<div class=sunratebar>
<div class="weather34sunratebar" 
style="width:
<?php echo $weather["humidity_indoor"]*1.4;?>px;
background:
<?php 
if ($weather["humidity_indoor"]>=70 ){echo '#00adbd';}
elseif ($weather["humidity_indoor"]>=60 ){echo '#e6a241';}
elseif ($weather["humidity_indoor"]>=50 ){echo '#90b22a';}
elseif ($weather["humidity_indoor"]>40 ){echo '#90b22a';}
elseif ($weather["humidity_indoor"]>0 ){echo '#d35f50';}
?>;">
</div></div></div>