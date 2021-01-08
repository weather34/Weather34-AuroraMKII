<?php  include('livedata.php');
date_default_timezone_set($TZ);
//HEATINDEX WEATHER34
?> 
<div class="sunblock">
<div class="lightningdesc">Heatindex &deg;<?php echo $weather["temp_units"]?></div>
<div class="button button-dial-small">   


<div class="button-dial-top-small"></div>
<div class="button-dial-label-small"><?php 
if ($weather["temp_units"]=='C' &&  $weather["heat_index"]<28){echo 'N/A';}
else if ($weather["temp_units"]=='F' &&  $weather["heat_index"]<82.4){echo 'N/A';}
else echo "<red>".number_format($weather["heat_index"],0);?></red>&deg;</div>
</div>
<laststrike>
Current Heat Index
</laststrike>
</div>



<div class="lightningmonth-mod2" style="width:140px;"> <?php echo date('Y')?> Max <?php echo $heatindindexmaxtime2;?> &nbsp;<orange>
<?php 

if ($weather["temp_units"]=='C' &&  $weather["heat_indexymax"]<28){echo '<orange>&nbsp; N/A</orange>';}
else if ($weather["temp_units"]=='F' &&  $weather["heat_indexymax"]<82.4){echo '<orange>&nbsp; N/A</orange>';}
else echo $weather["heat_indexymax"];?></orange> &deg;<?php echo $weather["temp_units"]?>
</div>