<?php 
//weather34 optional weatherflow addition lightning when used with an extra meteobridge 
include('livedata.php');error_reporting(0);
$strike='<svg width="10pt" height="10pt"  fill="#d87040" viewBox="0 0 1024 1024" version="weather34 strike icon">
<path d="M718.933333 106.666667L469.333333 362.666667l320 106.666666-334.933333 313.6 108.8 59.733334L256 917.333333l57.6-315.733333 61.866667 
108.8L576 512l-320-106.666667L533.333333 106.666667h185.6z" fill="#d87040" />
</svg>';
$lightningalert='<svg id="weather34 lightning alert" width="28pt" height="28pt" fill="#d87040" viewBox="0 0 20 20">
<path d="M19.64 16.36L11.53 2.3A1.85 1.85 0 0 0 10 1.21 1.85 1.85 0 0 0 8.48 2.3L.36 16.36C-.48 17.81.21 19 1.88 19h16.24c1.67 0 2.36-1.19 1.52-2.64zM11 
16H9v-2h2zm0-4H9V6h2z"/></svg>';
$warmalertnotif='<svg  width="14pt" height="14pt" fill="#d35f50" viewBox="0 0 20 20"><path d="M19.64 16.36L11.53 2.3A1.85 1.85 0 0 0 10 1.21 1.85 1.85 0 0 0 8.48 2.3L.36 16.36C-.48 17.81.21 19 1.88 19h16.24c1.67 0 2.36-1.19 1.52-2.64zM11 16H9v-2h2zm0-4H9V6h2z"/></svg>';
$snowalertnotif='<svg  viewBox="0 0 24 24"  width="14pt" height="14pt" fill="#01a4b5" stroke="#01a4b5" stroke-width="0.1"><path d="M21.16,16.13l-2-1.15.89-.24a1,1,0,1,0-.52-1.93l-2.82.76L14,12l2.71-1.57,2.82.76.26,0a1,1,0,0,0,.26-2L19.16,9l2-1.15a1,1,0,0,0-1-1.74L18,7.37l.3-1.11a1,1,0,1,0-1.93-.52l-.82,3L13,10.27V7.14l2.07-2.07a1,1,0,0,0,0-1.41,1,1,0,0,0-1.42,0L13,4.31V2a1,1,0,0,0-2,0V4.47l-.81-.81a1,1,0,0,0-1.42,0,1,1,0,0,0,0,1.41L11,7.3v3L8.43,8.78l-.82-3a1,1,0,1,0-1.93.52L6,7.37,3.84,6.13a1,1,0,0,0-1,1.74L4.84,9,4,9.26a1,1,0,0,0,.26,2l.26,0,2.82-.76L10,12,7.29,13.57l-2.82-.76A1,1,0,1,0,4,14.74l.89.24-2,1.15a1,1,0,0,0,1,1.74L6,16.63l-.3,1.11A1,1,0,0,0,6.39,19a1.15,1.15,0,0,0,.26,0,1,1,0,0,0,1-.74l.82-3L11,13.73v3.13L8.93,18.93a1,1,0,0,0,0,1.41,1,1,0,0,0,.71.3,1,1,0,0,0,.71-.3l.65-.65V22a1,1,0,0,0,2,0V19.53l.81.81a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.41L13,16.7v-3l2.57,1.49.82,3a1,1,0,0,0,1,.74,1.15,1.15,0,0,0,.26,0,1,1,0,0,0,.71-1.23L18,16.63l2.14,1.24a1,1,0,1,0,1-1.74Z"/></svg>';
$rainalertnotif='<svg width="14pt" height="14pt" viewBox="0 0 460 478"><path fill="rgba(77, 175, 189, 1)"  d=" M 171.06 10.38 C 171.29 10.41 171.76 10.48 171.99 10.52 C 225.57 103.02 279.13 195.53 332.76 288.00 C 225.25 288.00 117.74 288.00 10.24 288.00 C 63.88 195.48 117.50 102.94 171.06 10.38 M 151.00 68.81 C 151.06 89.55 150.88 110.30 151.09 131.04 C 153.46 162.21 156.21 193.36 158.53 224.54 C 167.07 224.61 175.62 224.57 184.17 224.57 C 186.64 193.06 189.30 161.57 191.75 130.07 C 191.86 109.67 191.76 89.26 191.80 68.86 C 189.52 66.56 187.24 64.27 184.94 62.00 C 175.89 62.00 166.85 62.00 157.81 62.00 C 155.52 64.25 153.25 66.52 151.00 68.81 M 155.47 231.04 C 153.23 233.34 150.93 235.60 148.68 237.90 C 148.67 248.30 148.67 258.70 148.68 269.10 C 150.92 271.38 153.21 273.62 155.42 275.94 C 166.01 276.08 176.60 275.96 187.20 276.00 C 189.48 273.74 191.75 271.48 194.00 269.19 C 194.00 258.73 194.00 248.27 194.00 237.81 C 191.75 235.52 189.48 233.26 187.20 231.00 C 176.62 231.02 166.05 230.95 155.47 231.04 Z" /><path fill="#ffffff"  d=" M 151.00 68.81 C 153.25 66.52 155.52 64.25 157.81 62.00 C 166.85 62.00 175.89 62.00 184.94 62.00 C 187.24 64.27 189.52 66.56 191.80 68.86 C 191.76 89.26 191.86 109.67 191.75 130.07 C 189.30 161.57 186.64 193.06 184.17 224.57 C 175.62 224.57 167.07 224.61 158.53 224.54 C 156.21 193.36 153.46 162.21 151.09 131.04 C 150.88 110.30 151.06 89.55 151.00 68.81 Z" /><path fill="#ffffff"  d=" M 155.47 231.04 C 166.05 230.95 176.62 231.02 187.20 231.00 C 189.48 233.26 191.75 235.52 194.00 237.81 C 194.00 248.27 194.00 258.73 194.00 269.19 C 191.75 271.48 189.48 273.74 187.20 276.00 C 176.60 275.96 166.01 276.08 155.42 275.94 C 153.21 273.62 150.92 271.38 148.68 269.10 C 148.67 258.70 148.67 248.30 148.68 237.90 C 150.93 235.60 153.23 233.34 155.47 231.04 Z" /></svg>';
$coldalertnotif='<svg  width="14pt" height="14pt" fill="var(--blue)" viewBox="0 0 20 20"><path d="M19.64 16.36L11.53 2.3A1.85 1.85 0 0 0 10 1.21 1.85 1.85 0 0 0 8.48 2.3L.36 16.36C-.48 17.81.21 19 1.88 19h16.24c1.67 0 2.36-1.19 1.52-2.64zM11 16H9v-2h2zm0-4H9V6h2z"/></svg>';
$info='<svg  viewBox="0 0 32 32" width=7 height=7 fill=none stroke=currentColor stroke-linecap=round stroke-linejoin=round stroke-width=6.25%>
<path d="M16 14 L16 23 M16 8 L16 10" /><circle cx=16 cy=16 r=14 /></svg> ';
$lightningalert8='<svg width="8" height="8" fill="#ff552e" viewBox="0 0 20 20"><path d="M19.64 16.36L11.53 2.3A1.85 1.85 0 0 0 10 1.21 1.85 1.85 0 0 0 8.48 2.3L.36 16.36C-.48 17.81.21 19 1.88 19h16.24c1.67 0 2.36-1.19 1.52-2.64zM11 16H9v-2h2zm0-4H9V6h2z"/></svg>';

?>
 
 <?php //weather34 timeago lightning
// calculate the strike time ago
$lightningseconds = $weather["lightningtimeago"];
function convert($lightningseconds){$weather34timeago = "";
$days = intval(intval($lightningseconds) / (3600*24));
$hours = (intval($lightningseconds) / 3600) % 24;
$minutes = (intval($lightningseconds) / 60) % 60;
if($days>= 1){$weather34timeago .=  "Extra Info";}
else if($days> 1){$weather34timeago .= "$days Days ";}
else {if($days>0){$weather34timeago .= "$days Day ";}
if($hours > 1 ){$weather34timeago .= "$hours Hrs ";}
else if($hours >=24 && $days>0){$weather34timeago .= "";}
else if($hours >0 && $days<1){$weather34timeago .= "$hours Hr ";}
else if($hours <=0){$weather34timeago .= " ";}
if($minutes >0 && $minutes<61 && $days<1){$weather34timeago .= "$minutes Mins Ago";}         
else if($minutes >0 && $minutes<59 && $days<1){$weather34timeago .= "$minutes Min Ago";}
}return "<interval>".$weather34timeago."</interval>";}
?>
<div class="sunblock">
<div class="lightningdesc2">Lightning</div>
<div class="button button-dial-small">   
<?php //strike
echo "<strikeicon>Today</strikeicon>";?>     
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
echo " <smalltempunit2>[<deepblue>". date('M')."</deepblue>]</smalltempunit2>";
?>
</valuetextheadingindoor>
<div class=sunratebar>
<div class="weather34sunratebar" 
style="width:
<?php 
if ($weather["lightningmonth"]<50){echo $weather["lightningmonth"]/5;}
else if ($weather["lightningmonth"]<100){echo $weather["lightningmonth"]*0.24;}
else if ($weather["lightningmonth"]<500){echo $weather["lightningmonth"]*0.25;}
else if ($weather["lightningmonth"]<600){echo $weather["lightningmonth"]*0.17;}
else if ($weather["lightningmonth"]<700){echo $weather["lightningmonth"]*0.14;}
else if ($weather["lightningmonth"]<800){echo $weather["lightningmonth"]*0.11;}
else if ($weather["lightningmonth"]<900){echo $weather["lightningmonth"]*0.10;}
else if ($weather["lightningmonth"]<1000){echo $weather["lightningmonth"]*0.1099;}
else if ($weather["lightningmonth"]<50000){echo $weather["lightningmonth"]*0.18;}
?>px;
background:
<?php 
if ($weather["lightningmonth"]>=2000 ){echo '#d35f50';}
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
else if ($weather["lightningyear"]<500){echo $weather["lightningyear"]*0.25;}
else if ($weather["lightningyear"]<600){echo $weather["lightningyear"]*0.17;}
else if ($weather["lightningyear"]<700){echo $weather["lightningyear"]*0.14;}
else if ($weather["lightningyear"]<800){echo $weather["lightningyear"]*0.11;}
else if ($weather["lightningyear"]<900){echo $weather["lightningyear"]*0.10;}
else if ($weather["lightningyear"]<1000){echo $weather["lightningyear"]*0.11;}
else if ($weather["lightningyear"]<=50000){echo $weather["lightningyear"]*0.18;}
?>px;
background:
<?php 
if ($weather["lightningyear"]>=2000 ){echo '#d35f50';}
else if ($weather["lightningyear"]>=0 ){echo '#d87040';}
?>;">
</div></div></div>


<div class="thelaststrike"><?php echo $aqilinks?>
<a href="weather34-lightning-charts.php" data-lity data-title="Lightning Almanac">
<?php  //weatherflow weather34 air lightning output
if ($lightningseconds <120 ){ echo $lightningalert8." <orange>Just Now</orange>";}
else if ($lightningseconds >=61 ){
echo convert($lightningseconds);}?></a></div>

<?php
//lightning notifications
if($distanceunit=='km' && $weather["lightningtimeago"]>1 && $weather["lightningtimeago"]<=60){echo "
  <div class='weather34alert' id='weather34message2'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2 style='margin-bottom:0px;text-transform:capitalize'>Awareness $warmalertnotif</h2> 
  <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <center><weather34-alertmessage>Lightning  $strike</weather34-alertmessage>  
  <weather34-alertvalue><red>".number_format($weather["lightningkm"],0)."</red><weather34-alertunit>km</weather34-alertunit>
  </weather34-alertvalue> </center> </div> </div>";}

  else if($distanceunit=='mi' && $weather["lightningtimeago"]>1 && $weather["lightningtimeago"]<=60){echo "
    <div class='weather34alert' id='weather34message2'> 
    <div class='weather34-notification'> 
    <weather34-alertheader><h2 style='margin-bottom:0px;text-transform:capitalize'>Awareness $warmalertnotif</h2> 
    <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
    <center><weather34-alertmessage>Lightning  $strike</weather34-alertmessage> 
    <weather34-alertvalue><red>".number_format($weather["lightningkm"]*0.621371,0)."</red><weather34-alertunit>mi</weather34-alertunit>
    </weather34-alertvalue> </center></div> </div>";}


  else if($distanceunit=='km' && $weather["lightningtimeago"]>1 && $weather["lightningtimeago"]<=580){echo "
        <div class='weather34alert' id='weather34message2'> 
        <div class='weather34-notification'> 
        <weather34-alertheader><h2 style='margin-bottom:0px;text-transform:capitalize'>Awareness $warmalertnotif</h2> 
        <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
        <center><weather34-alertmessage>Lightning  $strike<orange>". number_format($weather["lightningkm"],0)." km </orange></weather34-alertmessage> 
       <weather34-alertvalue><red>".gmdate("i",$weather["lightningtimeago"])."</red>
        <weather34-alertunit >Minutes Ago</weather34-alertunit>
        </weather34-alertvalue></center>  
        </div> </div>";}   
      
      
  else if($distanceunit=='mi' && $weather["lightningtimeago"]>1 && $weather["lightningtimeago"]<=580){echo "
        <div class='weather34alert' id='weather34message2'> 
        <div class='weather34-notification'> 
        <weather34-alertheader><h2 style='margin-bottom:0px;text-transform:capitalize'>Awareness $warmalertnotif</h2> 
        <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader> 
        <center><weather34-alertmessage>Lightning  $strike<orange>". number_format($weather["lightningkm"]*0.621371,0)." mi </orange></weather34-alertmessage> 
        <weather34-alertvalue><red>".gmdate("i",$weather["lightningtimeago"])."</red><weather34-alertunit style='text-transform:none;margin-left:3px;'>Minutes Ago</weather34-alertunit>
        </weather34-alertvalue> </center> 
        </div> </div>";}       
      
    ?> 

<script> //fire the weather34 notification
function closeweather34alert(el) { el.addClass('weather34alert-hide');}
$('.js-messageClose').on('click', function(e) { closeweather34alert($(this).closest('.weather34alert2'));});
$(document).ready(function() {  setTimeout(function() { closeweather34alert($('#weather34message2')); }, 10000);});
</script>
