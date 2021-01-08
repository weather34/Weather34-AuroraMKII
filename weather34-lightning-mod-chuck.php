<?php  include('console-settings.php');include('common.php');error_reporting(0);
$strike='<svg width="10pt" height="10pt"  fill="#d87040" viewBox="0 0 1024 1024" version="weather34 strike icon">
<path d="M718.933333 106.666667L469.333333 362.666667l320 106.666666-334.933333 313.6 108.8 59.733334L256 917.333333l57.6-315.733333 61.866667 
108.8L576 512l-320-106.666667L533.333333 106.666667h185.6z" fill="#d87040" />
</svg>';

 $file_live2=file_get_contents('mbridge2/MBrealtimeupload.txt');
    $weather34lightning=explode(" ", $file_live2);    
    //weather34 sensor lightning
    $weather["lightning"]          = $weather34lightning[76];
    $weather["lightningkm"]        = $weather34lightning[75];
    $weather["lightningmi"]        = $weather34lightning[75];
	$weather["lightningmax"]       = $weather34lightning[77];
	$weather["lightningmaxdist"]   = $weather34lightning[75];
	$weather["lightningtimeago"]   = $weather34lightning[76];
	$weather["lightningmonth"]     = $weather34lightning[78];
	$weather["lightningyear"]      = $weather34lightning[79];
?>
 
 <?php //weather34 timeago lightning
$lightningseconds = $weather["lightningtimeago"];function convert($lightningseconds){$weather34timeago = "";$days = intval(intval($lightningseconds) / (3600*24));
    $hours = (intval($lightningseconds) / 3600) % 24;$minutes = (intval($lightningseconds) / 60) % 60;$seconds = (intval($lightningseconds)) % 60;
    if($days> 1){$weather34timeago .= "$days Days ";}
    else {if($days>0){$weather34timeago .= "$days Day ";}
    if($hours > 1){$weather34timeago .= "$hours hrs ";}
    else if($hours >=0){$weather34timeago .= "$hours hr";}
    if($minutes > 1){$weather34timeago .= "$minutes mins ";}
    else if($minutes >=0){$weather34timeago .= "$minutes min ";}
    }return "<br>".$weather34timeago;}

?>

<div class="modulecaption2">Lightning Today</div>
<div class="button button-dial">     
<div class="button-dial-top"></div>
<realfeel>Today</realfeel>
<div class="button-dial-label"><orange><?php echo $weather["lightningmax"];?></orange></div>

<div class="weather-simsek-identity"><?php echo $strike?></div></div>

<div class="heatcircle"><div class="heatcircle-content">
<?php  //year
echo "<valuetextheading1>&nbsp;&nbsp;Strikes ".date('Y')." </valuetextheading1><br>";
echo "<div class=tempmodulehome0-5c ><orange>".$weather["lightningyear"]."</orange> &nbsp;";
?><smalltempunit2></div></div>

<div class="heatcircle2"><div class="heatcircle-content">
<?php  //month
echo "<valuetextheading1>&nbsp;&nbsp;Strikes ".date('F')." </valuetextheading1><br>";
echo "<div class=tempmodulehome0-5c ><orange>".$weather["lightningmonth"]."</orange> &nbsp;";
?><smalltempunit2></div></div>

<div class=thetrendgap>
<div class=thetrendboxlightning>
Last Strike
<?php  //weatherflow weather34 air lightning output
if ($lightningseconds <61 ){ echo "&nbsp;<orange> Just Now</orange>";}
else if ($lightningseconds >=61 ){    
if ($distanceunit=="mi" &&  $weather["lightningkm"]=='--') { echo "&nbsp;";} 
elseif ($distanceunit=="mi" &&  $weather["lightningkm"]<500) { echo " &nbsp;".number_format($weather["lightningkm"]*0.621371,0)." &nbsp;mi " ;}  

if ($distanceunit=="km" && $weather["lightning2km"]=='--') { echo "&nbsp;";} 
elseif ($distanceunit=="km" &&  $weather["lightningkm"]<500) { echo " &nbsp;".number_format($weather["lightningkm"],0)." &nbsp;km " ;}     
echo convert($lightningseconds);}
?></div></div>