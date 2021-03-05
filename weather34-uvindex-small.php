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
<div class="indoordesc3" style="margin-left:220px;">UVI</div>
<div class="button button-dial-small">      
<div class="button-dial-top-small"></div>
<div class="button-dial-label-small">          
<?php 
if($weather['uv']>=10){ echo "<purple>".$weather['uv']."</purple>";}
else if($weather['uv']>=8){ echo "<red>".$weather['uv']."</red>";}
else if($weather['uv']>=6){ echo "<orange>".$weather['uv']."</orange>";}
else if($weather['uv']>=3){ echo "<yellow>".$weather['uv']."</yellow>";}
else if($weather['uv']>=0){ echo "<green>".$weather['uv']."</green0>";}  
?>  

<?php //feels like man
echo "<uvsmallicon>";
if($weather['uv']>=10){ echo "<purple>".$uvicon2."</purple>";}
else if($weather['uv']>=8){ echo "<red>".$uvicon2."</red>";}
else if($weather['uv']>=6){ echo "<orange>".$uvicon2."</orange>";}
else if($weather['uv']>=3){ echo "<yellow>".$uvicon2."</yellow>";}
else if($weather['uv']>=0){ echo "<green>".$uvicon2."</green0>";}
echo "</uvsmallicon>";?>
</div>
<div class="indoortempa-mod2aqi" > 
<valuetextheadingindoor>
<?php // weather34 simple css solar scale 
if ($weather['solar']>=1000 ){echo "0 200 400 600 800 <red>1k </red>";}
else if ($weather['solar']>=800 ){echo "0 200 400 600 <orange>800</orange> 1k ";}
else if ($weather['solar']>=600 ){echo "0 200 400 <orange>600</orange>  800 1k ";}
else if ($weather['solar']>=400 ){echo "0 200 <yellow>400</yellow> 600 800 1k ";}
else if ($weather['solar']>=200 ){echo "0 <yellow>200</yellow> 400 600 800 1k ";}
else if ($weather['solar']>=0 ){echo "<green>0</green> 200 400  600 800 1k ";}
echo "W/m&#178;";
if ($weather['solar']>=1000){echo "(<red>".number_format($weather['solar'],0)."</red>)";}
else if ($weather['solar']>=600){echo "(<orange>".number_format($weather['solar'],0)."</orange>)";}
else if ($weather['solar']>=200){echo "(<yellow>".number_format($weather['solar'],0)."</yellow>)";}
else if ($weather['solar']>=0){echo "(<green>".number_format($weather['solar'],0)."</green>)";}
?>
</valuetextheadingindoor>
<div class=sunratebar>
<div class="weather34sunratebar" 
style="width:
<?php echo $weather['solar']*0.10;?>px;
background:
<?php 
if ($weather['solar']>=1000 ){echo '#d35f50';}
elseif ($weather['solar']>=800 ){echo '#e64b24';}
elseif ($weather['solar']>=600 ){echo '#d87040';}
elseif ($weather['solar']>=200 ){echo '#e6a241';}
elseif ($weather['solar']>0 ){echo '#9bbc2f';}
?>;">
</div></div></div>




<div class="indoortempa-mod3aqi" > 
<valuetextheadingindoor>
<?php // weather34 simple css lux scale 
if ($weather['lux']>=100000 ){echo "0 20k 40k 60k 80k <red>100k </red>";}
else if ($weather['lux']>=80000 ){echo "0 20k 40k 60k <orange>80k</orange> 100k ";}
else if ($weather['lux']>=60000 ){echo "0  20k 40k <orange>60k</orange> 80k 100k ";}
else if ($weather['lux']>=40000 ){echo "0  20k <yellow>40k</yellow> 60k 80k 100k ";}
else if ($weather['lux']>=20000 ){echo "0 <yellow>20k</yellow> 40k 60k 80k 100k ";}
else if ($weather['lux']>=0 ){echo "<green>0</green> 20k 40k 60k 80k 100k ";}
echo "Lux";
if ($weather['lux']>=100000){echo "(<red>".$weather['lux']."</red>)";}
else if ($weather['lux']>=60000){echo "(<orange>".$weather['lux']."</orange>)";}
else if ($weather['lux']>=20000){echo "(<yellow>".$weather['lux']."</yellow>)";}
else if ($weather['lux']>=0){echo "(<green>".$weather['lux']."</green>)";}
?>
</valuetextheadingindoor>
<div class=sunratebar>
<div class="weather34sunratebar" 
style="width:
<?php echo $weather['lux']/1000;?>px;
background:
<?php 
if ($weather['lux']>=100000 ){echo '#d35f50';}
elseif ($weather['lux']>=80000 ){echo '#e64b24';}
elseif ($weather['lux']>=60000 ){echo '#d87040';}
elseif ($weather['lux']>=20000 ){echo '#e6a241';}
elseif ($weather['lux']>0 ){echo '#9bbc2f';}
?>;">
</div></div></div>