<?php include('console-settings.php');include('common.php');error_reporting(0);
$strike='<svg width="10pt" height="10pt"  fill="#d87040" viewBox="0 0 1024 1024" version="weather34 strike icon">
<path d="M718.933333 106.666667L469.333333 362.666667l320 106.666666-334.933333 313.6 108.8 59.733334L256 917.333333l57.6-315.733333 61.866667 
108.8L576 512l-320-106.666667L533.333333 106.666667h185.6z" fill="#d87040" />
</svg>';
$lightningalert='<svg id="weather34 lightning alert" width="28pt" height="28pt" fill="#d87040" viewBox="0 0 20 20">
<path d="M19.64 16.36L11.53 2.3A1.85 1.85 0 0 0 10 1.21 1.85 1.85 0 0 0 8.48 2.3L.36 16.36C-.48 17.81.21 19 1.88 19h16.24c1.67 0 2.36-1.19 1.52-2.64zM11 
16H9v-2h2zm0-4H9V6h2z"/></svg>';

$file_live2=file_get_contents($livedata);
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
$lightningseconds = $weather["lightning2timeago"];function convert($lightningseconds){$weather34timeago = "";$days = intval(intval($lightningseconds) / (3600*24));
  $hours = (intval($lightningseconds) / 3600) % 24;$minutes = (intval($lightningseconds) / 60) % 60;
  if($days> 1){$weather34timeago .=  "Extra Info";}
  else if($days> 1){$weather34timeago .= "$days Days ";}
  else {if($days>0){$weather34timeago .= "$days Day ";}
  if($hours > 1 ){$weather34timeago .= "$hours Hours ";}
  else if($hours >24 && $days>0){$weather34timeago .= "";}
  else if($hours >0 && $days<1){$weather34timeago .= "$hours Hour ";}
  else if($hours <=0){$weather34timeago .= " ";}
  if($minutes >0 && $minutes<61 && $days<1){$weather34timeago .= "Ago";}
  else if($minutes >0 && $days<1){$weather34timeago .= "$minutes Mins Ago";}        
  else if($minutes >=0 && $minutes<120 && $days<1){$weather34timeago .= "$minutes Min Ago";}
  }return "<interval>".$weather34timeago."</interval>";}

?>
<div class="sunblock">
<div class="lightningdesc2">Lightning</div>
<div class="button button-dial-small">   
<?php //strike
echo "<strikeicon>";echo "<darkred>".$strike."</darkred>";
echo "</strikeicon>";?>     
<div class="button-dial-top-small"></div>
<div class="button-dial-label-small">   <orange> 
<?php echo number_format($weather["lightningmax"],0);?>
</orange></div></div>

<div class="indoortempa-mod2lightning" > 
<valuetextheadingindoor>
<?php // weather34 simple css MONTHLY lightning  scale 
if ($weather["lightningmonth"]>=6000 ){echo "0 100 200 500 1k 2k 4k <red>".$weather["lightningmonth"]."</red>";}
else if ($weather["lightningmonth"]>=6000 ){echo "0 100 200 500 700 2k <red>".$weather["lightningmonth"]."</red>";}
else if ($weather["lightningmonth"]>=5000 ){echo "0 100 200 500 700 2k <red>".$weather["lightningmonth"]."</red>";}
else if ($weather["lightningmonth"]>=4000 ){echo "0 100 200 500 700 2k <red>".$weather["lightningmonth"]."</red>";}
else if ($weather["lightningmonth"]>=3000 ){echo "0 100 200 500 700 1k <red>".$weather["lightningmonth"]."</red>";}
else if ($weather["lightningmonth"]>=2000 ){echo "0 100 200 500 700 1k <red>".$weather["lightningmonth"]."</red>";}
else if ($weather["lightningmonth"]>=1500 ){echo "0 100 200 400 500 1k <red>".$weather["lightningmonth"]."</red>";}
else if ($weather["lightningmonth"]>=1000 ){echo "0 100 200 400 500 900 <red>".$weather["lightningmonth"]."</red>";}
else if ($weather["lightningmonth"]>=900 ){echo "0 100 200 400 500 <orange>".$weather["lightningmonth"]."</orange>";}
else if ($weather["lightningmonth"]>=800 ){echo "0 100 200 400 <orange>".$weather["lightningmonth"]."</orange> 900 ";}
else if ($weather["lightningmonth"]>=700 ){echo "0 100 200 400 <orange>".$weather["lightningmonth"]."</orange> 800 ";}
else if ($weather["lightningmonth"]>=600 ){echo "0 100 200 300 <orange>".$weather["lightningmonth"]."</orange> 700 ";}
else if ($weather["lightningmonth"]>=500 ){echo "0 100 200 300 400 <orange>".$weather["lightningmonth"]."</orange> 600 ";}
else if ($weather["lightningmonth"]>=400){echo "0 100 200 300 <orange>".$weather["lightningmonth"]."</orange> 500 600";}
else if ($weather["lightningmonth"]>=300){echo "0 100 200 <orange>".$weather["lightningmonth"]."</orange> 400 500 600";}
else if ($weather["lightningmonth"]>=200 ){echo "0 100 150 <orange>".$weather["lightningmonth"]."</orange> 300 400 500";}
else if ($weather["lightningmonth"]>=100 ){echo "0 50 <orange>".$weather["lightningmonth"]."</orange> 200 300 400 500 ";}
else if ($weather["lightningmonth"]>=0 ){echo "<orange>".$weather["lightningmonth"]."</orange> 100 200 300 400 500 ";}
echo " <smalltempunit2>[<deepblue>". date('F')."</deepblue>]</smalltempunit2>";
?>
</valuetextheadingindoor>
<div class=sunratebar>
<div class="weather34sunratebar" 
style="width:
<?php 
if ($weather["lightningmonth"]<50){echo $weather["lightningmonth"]/5;}
else if ($weather["lightningmonth"]<100){echo $weather["lightningmonth"]*0.24;}
else if ($weather["lightningmonth"]<500){echo $weather["lightningmonth"]*0.20;}
else if ($weather["lightningmonth"]<600){echo $weather["lightningmonth"]*0.17;}
else if ($weather["lightningmonth"]<700){echo $weather["lightningmonth"]*0.14;}
else if ($weather["lightningmonth"]<800){echo $weather["lightningmonth"]*0.11;}
else if ($weather["lightningmonth"]<900){echo $weather["lightningmonth"]*0.10;}
else if ($weather["lightningmonth"]<1000){echo $weather["lightningmonth"]*0.1099;}
else if ($weather["lightningmonth"]<50000){echo $weather["lightningmonth"]*0.18;}
?>px;
background:
<?php 
if ($weather["lightningmonth"]>=1000 ){echo '#d35f50';}
else if ($weather["lightningmonth"]>=0 ){echo '#d87040';}
?>;">
</div></div></div>

<div class="indoortempa-mod3lightning" > 
<valuetextheadingindoor>
<?php // weather34 simple css Year lightning  scale 
if ($weather["lightningyear"]>=6000 ){echo "0 100 200 1k 2k 3k 4k <red>".$weather["lightningyear"]."</red>";}
else if ($weather["lightningyear"]>=6000 ){echo "0 100 500 1k 2k 3k 4k <red>".$weather["lightningyear"]."</red> ";}
else if ($weather["lightningyear"]>=5000 ){echo "0 100 500 1k 2k 3k 4k <red>".$weather["lightningyear"]."</red> ";}
else if ($weather["lightningyear"]>=4000 ){echo "0 100 500 1k 2k 3k <red>".$weather["lightningyear"]."</red> ";}
else if ($weather["lightningyear"]>=3000 ){echo "0 100 200 500 700 1k <red>".$weather["lightningyear"]."</red> ";}
else if ($weather["lightningyear"]>=2000 ){echo "0 100 200 500 700 1k <red>".$weather["lightningyear"]."</red> ";}
else if ($weather["lightningyear"]>=1000 ){echo "0 100 200 400 600 800 <red>".$weather["lightningyear"]."</red> ";}
else if ($weather["lightningyear"]>=900 ){echo "0 100 200 400 600 <orange>".$weather["lightningyear"]."</orange>";}
else if ($weather["lightningyear"]>=800 ){echo "0 100 200 400 <orange>".$weather["lightningyear"]."</orange>";}
else if ($weather["lightningyear"]>=700 ){echo "0 100 200 400 <orange>".$weather["lightningyear"]."</orange>";}
else if ($weather["lightningyear"]>=600 ){echo "0 100 200 300 <orange>".$weather["lightningyear"]."</orange>";}
else if ($weather["lightningyear"]>=500 ){echo "0 100 200 300 <orange>".$weather["lightningyear"]."</orange>";}
else if ($weather["lightningyear"]>=400){echo "0 50 100 200 300 <orange>".$weather["lightningyear"]."</orange>";}
else if ($weather["lightningyear"]>=300){echo "0 50 100 200 <orange>".$weather["lightningyear"]."</orange> 400 500 ";}
else if ($weather["lightningyear"]>=200 ){echo "0 50 100 <orange>".$weather["lightningyear"]."</orange> 300 400 500 ";}
else if ($weather["lightningyear"]>=100 ){echo "0 50 <orange>".$weather["lightningyear"]."</orange> 200 300 400 500 ";}
else if ($weather["lightningyear"]>=0 ){echo "<orange>".$weather["lightningyear"]."</orange> 100 200 300 400 500 1k+ ";}
echo " <smalltempunit2>Total [<deepblue>".date('Y')."</deepblue>]</smalltempunit2>";
?>
</valuetextheadingindoor>
<div class=sunratebar>
<div class="weather34sunratebar" 
style="width:<?php 
if ($weather["lightningyear"]<50){echo $weather["lightningyear"]/5;}
else if ($weather["lightningyear"]<100){echo $weather["lightningyear"]*0.24;}
else if ($weather["lightningyear"]<500){echo $weather["lightningyear"]*0.20;}
else if ($weather["lightningyear"]<600){echo $weather["lightningyear"]*0.17;}
else if ($weather["lightningyear"]<700){echo $weather["lightningyear"]*0.14;}
else if ($weather["lightningyear"]<800){echo $weather["lightningyear"]*0.11;}
else if ($weather["lightningyear"]<900){echo $weather["lightningyear"]*0.10;}
else if ($weather["lightningyear"]<1000){echo $weather["lightningyear"]*0.11;}
else if ($weather["lightningyear"]<=50000){echo $weather["lightningyear"]*0.18;}
?>px;
background:
<?php 
if ($weather["lightningyear"]>=1000 ){echo '#d35f50';}
else if ($weather["lightningyear"]>=0 ){echo '#d87040';}

?>;">
</div></div></div>

<?php
//lightning
if($distanceunit=='km' && $weather["lightningtimeago"]>1 && $weather["lightningtimeago"]<=60){echo "
  <div class='weather34alert' id='weather34message3'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Alert $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Lightning  $strike</weather34-alertmessage>  <br>
  <weather34-alertvalue><red>".number_format($weather["lightning2km"],0)."</red><weather34-alertunit>km</weather34-alertunit>
  </weather34-alertvalue>  </p></div> </div>";}

  else if($distanceunit=='mi' && $weather["lightningtimeago"]>1 && $weather["lightningtimeago"]<=60){echo "
    <div class='weather34alert' id='weather34message3'> 
    <div class='weather34-notification'> 
    <weather34-alertheader><h2>Alert $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
    <weather34-alertmessage>Lightning  $strike</weather34-alertmessage>  <br>
    <weather34-alertvalue><red>".number_format($weather["lightning2km"]*0.621371,0)."</red><weather34-alertunit>mi</weather34-alertunit>
    </weather34-alertvalue>  </p></div> </div>";}



  else if($distanceunit=='km' && $weather["lightningtimeago"]>1 && $weather["lightningtimeago"]<=580){echo "
        <div class='weather34alert' id='weather34message3'> 
        <div class='weather34-notification'> 
        <weather34-alertheader><h2>Alert $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
        <weather34-alertmessage>Lightning  $strike<orange>". number_format($weather["lightningkm"],0)." km </orange></weather34-alertmessage>  <br>        
        <weather34-alertvalue><red>".gmdate("i",$weather["lightningtimeago"])."</red><weather34-alertunit>Minutes Ago</weather34-alertunit>
        </weather34-alertvalue>  </p></div> </div>";}
      
      
      
      else if($distanceunit=='mi' && $weather["lightningtimeago"]>1 && $weather["lightningtimeago"]<=580){echo "
        <div class='weather34alert' id='weather34message3'> 
        <div class='weather34-notification'> 
        <weather34-alertheader><h2>Alert $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
        <weather34-alertmessage>Lightning  $strike<orange>". number_format($weather["lightningkm"]*0.621371,0)." mi </orange></weather34-alertmessage>  <br>        
        <weather34-alertvalue><red>".gmdate("i",$weather["lightningtimeago"])."</red><weather34-alertunit>Minutes Ago</weather34-alertunit>
        </weather34-alertvalue>  </p></div> </div>";}
      
      
      
    ?> 

<script> //fire the weather34 notification
function closeweather34alert(el) { el.addClass('weather34alert-hide');}
$('.js-messageClose').on('click', function(e) { closeweather34alert($(this).closest('.weather34alert'));});
$(document).ready(function() {  setTimeout(function() { closeweather34alert($('#weather34message3')); }, 10000);});
</script>