<?php  include('livedata.php');
date_default_timezone_set($TZ);
//WINDCHILL WEATHER34
?> 
<div class="sunblock">
<div class="lightningdesc">Windchill &deg;<?php echo $weather["temp_units"]?></div>
<div class="button button-dial-small">  
<div class="button-dial-top-small"></div>
<div class="button-dial-label-small"><?php 

if ($weather["temp_units"]=='C' &&  $weather["windchill"]>2){echo "<grey>N/A</grey>";}
else if ($weather["temp_units"]=='F' &&  $weather["windchill"]>34){echo "<grey>N/A</grey>";}
else echo "<deepblue>".$weather["windchill"]."</deepblue><grey>&deg;</grey>";?></div>
</div>
<laststrike>
Current Wind Chill
</laststrike>
</div>

<div class="lightningmonth-mod2" style="width:140px;"> <?php echo date('Y')?> Min <?php echo $windchillmintime2;?> 
<?php 
if ($weather["temp_units"]=='C' &&  $weather["windchillymin"]>2){echo 'N/A';}
else if ($weather["temp_units"]=='F' &&  $weather["windchillymin"]>34){echo 'N/A';}
else echo "<deepblue>&nbsp;".$weather["windchillymin"];?></deepblue> &deg;<?php echo $weather["temp_units"]?>
</div>