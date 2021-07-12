<?php 
  #################################################
	#	CREATED FOR Weather34	Aurora MKII			
	# December 2020 	 	                                                                                               
	# https://www.weather34.com/homeweatherstation/ 	                                                                   
	#################################################
include('livedata.php');date_default_timezone_set($TZ);?>
<div class="modulecaptionb">Precipitation (Rain)</div>

<todaysrain>Today</todaysrain>
<div class="button button-dialrain">                
 <div class="button-dial-toprain"></div> 
<div class="button-dial-label"> 
<?php if ($meteobridgeapi[9]>=35){echo '<raintoday2 style="background:hsla(201, 79%, 47%,.8);color:#fff;">
'.number_format($weather["rain_today"],2)." <smallrainunit34>".$weather["rain_units"]."</smallrainunit34></raintoday2";}
else echo "<raintoday2 style='background:var(--blue);color:#fff;opacity:0.9;'>".number_format($weather["rain_today"],2)." <smallrainunit34>".$weather["rain_units"]."</smallrainunit34></raintoday2";?>  
</div></div></div>

<div class="weather34i-rairate-bar2" >
<div id="raincontainer2">
<div id="weather34rainbeaker2">
  <?php //relative max 50mm/2in scale
  if ($weather["rain_units"]=='mm'){echo "<volumer>mm <br>35 <br>30 <br>25 <br>20 <br>15 <br>10 <br>5</volumer>";}
  if ($weather["rain_units"]=='in'){echo "<volumer>in <br>1.37 <br>1.18 <br>0.99 <br>0.80 <br>0.60 <br>0.30 <br>0.10</volumer>";}
  ?>
<div id="weather34rainwater2" style="height:<?php 
if ($meteobridgeapi[9]>=15){echo $meteobridgeapi[9]/8.25;}
else echo $meteobridgeapi[9]/9.25;?>em;
background:<?php if ($meteobridgeapi[9]>=35){echo 'hsla(201, 79%, 47%,.8)';}?>
">                 
</div></div></div>

<div class="second24hourguage">
  <?php echo "<last24h>Last 24 Hours</last24h>";?>
<div class="button button-dialrain">               
 <div class="button-dial-toprain"></div>
<div class="button-dial-label"> 
<?php 
if ($meteobridgeapi[44]>=35){echo '<raintoday2 style="background:hsla(201, 79%, 47%,.8);color:#fff;">
  '.number_format($weather["rain_24hrs"],2)." <smallrainunit34>".$weather["rain_units"]."</smallrainunit34></raintoday2";}
  else echo "<raintoday2 style='background:var(--blue);color:#fff;opacity:0.9;'>".number_format($weather["rain_24hrs"],2)."
 <smallrainunit34>".$weather["rain_units"]."</smallrainunit34></raintoday2";?>  
</div></div></div>

<div class="weather34i-rairate-bar2">
<div id="raincontainer2">
<div id="weather34rainbeaker2">
  <?php //relative 24 hour 50mm/2in scale
  if ($weather["rain_units"]=='mm'){echo "<volumer>mm <br>35 <br>30 <br>25 <br>20 <br>15 <br>10 <br>5</volumer>";}
  if ($weather["rain_units"]=='in'){echo "<volumer>in <br>1.37 <br>1.18 <br>0.99 <br>0.80 <br>0.60 <br>0.30 <br>0.10</volumer>";}
  ?>
<div id="weather34rainwater2" style="height:<?php echo $meteobridgeapi[44]/8.25;?>em;
background:<?php if ($meteobridgeapi[44]>=35){echo 'hsla(201, 79%, 47%,.8)';}?>
">        
</div></div></div></div></div></div>

<div class="monthrain">
<?php
$raintimeago=$originalDate124;$seconds_ago = (time() - strtotime($raintimeago));
echo $min1." ";
// weather34 sez lets get rainfall hours or minutes ago if within last 8 hours
  if ($weather["rain_lasthour"]<0.01) {echo date('F')." Total <deepblue>".$weather["rain_month"]."</deepblue><smalltrainunit3> ".$weather["rain_units"]."<smalltrainunit3>";}      
  else if ($seconds_ago >= 7200) {echo 'Precipitation &nbsp;<deepblue>'.intval($seconds_ago / 3600) .'</blue>&nbsp;Hours Ago'; }
  else if ($seconds_ago >= 3600) {echo 'Last Tip &nbsp;<deepblue>'.intval($seconds_ago / 3600) .'</deepblue>&nbsp;Hour Ago'; }
  else if ($seconds_ago <=119) {echo 'Last Tip &nbsp;<deepblue>'.intval($seconds_ago / 60) .'</deepblue>&nbsp;Minute Ago'; }    
  else if ($seconds_ago >119) {echo 'Last Tip &nbsp;<deepblue>'.intval($seconds_ago / 60) .'</deepblue>&nbsp;Minutes Ago'; }
?>
</div>

<div class="yearrain">
<?php  //Rainrate with phrases 
if ($meteobridgeapi[8]>'0'){
if ($meteobridgeapi[8]>=100){echo $umbrella. " <rainphrasetext>Torrential";}
else if ($meteobridgeapi[8]>=60){echo  $umbrella." <rainphrasetext>Very Heavy";}
else if ($meteobridgeapi[8]>=40){echo $umbrella. " <rainphrasetext>Heavy";}
else if ($meteobridgeapi[8]>=10){echo $umbrella. " <rainphrasetext>Moderate";}
else if ($meteobridgeapi[8]>=2.5){echo $umbrella. " <rainphrasetext>Steady";}
else if ($meteobridgeapi[8]>0){echo $umbrella. " <rainphrasetext>Precipitation";}
echo "<deepblue> ".$weather["rain_rate"]."</deepblue> <smalltrainunit3> ".$weather["rain_units"]."<smalltrainunit3> p/hr</smalltrainunit3>";
}
else  echo $min1 ." ".date('Y')." Total <deepblue>".$weather["rain_year"]."</deepblue><smalltrainunit3> ".$weather["rain_units"]."<smalltrainunit3>";
?>
</div></div></div></div></div>


<div class="rainrateextra1">
<valuetextheading5>
<?php 
// weather34 simple css rain rate scale 
if ($weather["temp_units"]=='F'){
    if ($weather["rain_rate"]>=3.93){echo "&nbsp;0 0.7 1.5 1.9 2.7 3.1 3.5 <red>".round($weather["rain_rate"],1)."</red> ";}
    else if ($weather["rain_rate"]>=3.54){echo "&nbsp;0 0.7 1.1 1.5 1.9 2.3 2.7 <red>".round($weather["rain_rate"],1)."</red> ";}
    else if ($weather["rain_rate"]>=3.14){echo "&nbsp;0 0.5 0.7 1.1 1.5 1.9 2.3 <red>".round($weather["rain_rate"],1)."</red> ";}
    else if ($weather["rain_rate"]>=2.75){echo "&nbsp;0 0.5 0.7 1.1 1.5 1.9 2.3 <red>".round($weather["rain_rate"],1)."</red> ";}
    else if ($weather["rain_rate"]>=2.36){echo "&nbsp;0 0.5 0.7 1.1 1.5 1.9 <red>".round($weather["rain_rate"],1)."</red> ";}
    else if ($weather["rain_rate"]>=1.96){echo "&nbsp;0 0.5 0.7 1.1 1.5 1.9 <red>".round($weather["rain_rate"],1)."</red> ";}
    else if ($weather["rain_rate"]>=1.57){echo "&nbsp;0 0.3 0.5 0.7 1.1 1.5 <red>".round($weather["rain_rate"],1)."</red> ";}
    else if ($weather["rain_rate"]>=1.1){echo "&nbsp;0 0.3 0.7 1.0 <deepblue>".round($weather["rain_rate"],1)."</deepblue> 1.5 1.9 ";}
    else if ($weather["rain_rate"]>=0.78){echo "&nbsp;0 0.3 0.5 <deepblue>".round($weather["rain_rate"],1)."</deepblue> 1.1 1.5 1.9 ";}
    else if ($weather["rain_rate"]>=0.59){echo "&nbsp;0 0.3 <deepblue>".round($weather["rain_rate"],1)."</deepblue> 0.7 1.1 1.5 1.9";}
    else if ($weather["rain_rate"]>=0.39){echo "&nbsp;0 <deepblue>".round($weather["rain_rate"],1)."</deepblue> 0.5 0.7 1.1 1.5 1.9 ";}
    else if ($weather["rain_rate"]>=0){echo "&nbsp;<deepblue>".round($weather["rain_rate"],1)."</deepblue> 0.5 0.7 1.1 1.5 1.9 ";}}
  //mm
  if ($weather["temp_units"]=='C'){
  if ($weather["rain_rate"]>=100){echo "0 20 30 50 70 80 <red>".round($weather["rain_rate"],1)."</red> ";}
  else if ($weather["rain_rate"]>=90){echo "0 10 20 50 80 <red>".round($weather["rain_rate"],1)."</red> ";}
  else if ($weather["rain_rate"]>=80){echo "0 10 20 30 50 70 <red>".round($weather["rain_rate"],1)."</red> ";}
  else if ($weather["rain_rate"]>=70){echo "0 10 20 30 40 60 <red>".round($weather["rain_rate"],1)."</red> ";}
  else if ($weather["rain_rate"]>=60){echo "0 5 10 20 25 30  50 <red>".round($weather["rain_rate"],1)."</red> ";}
  else if ($weather["rain_rate"]>=50){echo "0 5 10 20 25 30 40 <red>".round($weather["rain_rate"],1)."</red> ";}
  else if ($weather["rain_rate"]>=40){echo "0 5 10 15 20 25 30 <red>".round($weather["rain_rate"],1)."</red> ";}
  else if ($weather["rain_rate"]>=30){echo "0 5 10 15 20 <deepblue>".round($weather["rain_rate"],1)."</deepblue> 40 50 60 ";}
  else if ($weather["rain_rate"]>=20){echo "0 5 10 15 <deepblue>".round($weather["rain_rate"],1)."</deepblue> 40 50 60 ";}
  else if ($weather["rain_rate"]>=15){echo "0 5 10 <deepblue>".round($weather["rain_rate"],1)."</deepblue> 20 30 40 50 ";}
  else if ($weather["rain_rate"]>=10){echo "0 5 <deepblue>".round($weather["rain_rate"],1)."</deepblue> 15 20 30 40 50 ";}
  else if ($weather["rain_rate"]>=5){echo "0 <deepblue>".round($weather["rain_rate"],1)."</deepblue> 10 15 20 25 30 35 ";}
  else if ($weather["rain_rate"]>=0){echo "<deepblue>".round($weather["rain_rate"],1)."</deepblue> 5 10 15 20 25 30 35 ";}}
  echo "<smalltempunit2>p/hr";?></smalltempunit2>

</valuetextheading5>
<div class=sunratebar>
<div class="weather34sunratebar" 
style="width:
<?php echo $meteobridgeapi[8]*2;?>px;
<?php 
if ($weather["rain_units"]=='in' && $weather["rain_rate"]>1.4){echo 'background:var(--therainrategrad);';}
else if ($weather["rain_units"]=='mm' && $weather["rain_rate"]>40){echo 'background:var(--therainrategrad);';}
else echo 'background:var(--blue);'?>">
</div></div>



<div class=extrainfo3><a href='rain-almanac2.php' data-lity data-title="Almanac Data"><?php echo  "Extra Data&nbsp;".$chartlinks?></a></div></div>

<div class="weather-tempicon-identity">
<?php  //Rain icon
if ($weather["rain_lasthour"]<0.01) {echo "<rain>".$weather["rain_units"]."</rain>";}
else if ($seconds_ago <=3600){echo $umbrella;}
else echo "<rain>".$weather["rain_units"]."</rain>";?>
</div></div>

<?php //weather34 clean notifications 
//purple air 
$json  = file_get_contents("jsondata/purpleair.txt");
$array = json_decode( $json, true );for ( $i = 0; $i < sizeof( $array['results'] ); $i++ ) {$array['results'][ $i ]['Stats'] = json_decode( $array['results'][ $i ]['Stats'], true );}
$weather34pm25a    = $array['results'][0]['pm2_5_cf_1'];
$weather34pm25b    = $array['results'][1]['pm2_5_cf_1'];
$aqiweather["aqindex"]      = number_format(pm25_to_aqi(($weather34pm25a + $weather34pm25b ) / 2), 1);

if ($notifications=='yes') {
//offline
if(file_exists($livedata)&&time()- filemtime($livedata)>300){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Weather Station </weather34-alertmessage> <br>
  <weather34-alertvalue><red>Offline</weather34-alertunit>
  </weather34-alertvalue></div></div>";}

//purple air quality +150 high 
else if ($purpleairhardware=='yes' && $aqiweather["aqindex"] >=150){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Air Quality Poor $aqinotify150</weather34-alertmessage> <br>
  <weather34-alertvalue><red>".$aqiweather["aqindex"]."</red><weather34-alertunit>AQI</weather34-alertunit>
  </weather34-alertvalue></div></div>";}

//purple air quality +100 high 
else if ($purpleairhardware=='yes' && $aqiweather["aqindex"]>=100){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Air Quality Poor $aqinotify100</weather34-alertmessage> <br>
  <weather34-alertvalue><orange>".$aqiweather["aqindex"]."</orange><weather34-alertunit>AQI</weather34-alertunit>
  </weather34-alertvalue></div></div>";}

  //davis air quality +150 high 
else if ($davisairquality=='yes' && number_format(pm25_to_aqi($weather["airquality-davispm25"]),1)>=150){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Air Quality Poor $aqinotify150</weather34-alertmessage> <br>
  <weather34-alertvalue><red>".number_format(pm25_to_aqi($weather["airquality-davispm25"]),1)."</red><weather34-alertunit>AQI</weather34-alertunit>
  </weather34-alertvalue></div></div>";}

//davis air quality +100 high 
else if ($davisairquality=='yes' && number_format(pm25_to_aqi($weather["airquality-davispm25"]),1)>=100){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Air Quality Poor $aqinotify100</weather34-alertmessage> <br>
  <weather34-alertvalue><orange>".number_format(pm25_to_aqi($weather["airquality-davispm25"]),1)."</orange><weather34-alertunit>AQI</weather34-alertunit>
  </weather34-alertvalue></div></div>";}

      //temperature rising rapidly 15 minute
      else if ($weather["temp_units"]=='C' && $weather["temp_trend"]>5 ){echo "
        <div class='weather34alert' id='weather34message'> 
        <div class='weather34-notification'> 
        <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
        <weather34-alertmessage>Temp Rising Rapidly <icon-26-30>".$weather34_temp_icon."</icon-26-30></weather34-alertmessage> <br>
        <weather34-alertvalue>+<red>".$weather['temp_trend']."</red><weather34-alertunit>&deg; Last 15 Minutes</weather34-alertunit>
        </weather34-alertvalue></div></div>";}
      
      //temperature rising rapidly F 15 minute
      else if ($weather["temp_units"]=='F' && $weather["temp_trend"]>5 ){echo "
        <div class='weather34alert' id='weather34message'> 
        <div class='weather34-notification'> 
        <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
        <weather34-alertmessage>Temp Rising Rapidly <icon-26-30>".$weather34_temp_icon."</icon-26-30></weather34-alertmessage> <br>
        <weather34-alertvalue>+<red>".$weather['temp_trend']."</red><weather34-alertunit>&deg; Last 15 Minutes</weather34-alertunit>
        </weather34-alertvalue></div></div>";}
      
      
      //temperature falling rapidly 15 minute
      else if ($weather["temp_units"]=='C' && $weather["temp_trend"]<-5 ){echo "
        <div class='weather34alert' id='weather34message'> 
        <div class='weather34-notification'> 
        <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
        <weather34-alertmessage>Temp Falling Rapidly <icon-zero>".$weather34_temp_icon."</icon-zero></weather34-alertmessage> <br>
        <weather34-alertvalue>+<red>".$weather['temp_trend']."</red><weather34-alertunit>&deg;Last 15 Minutes</weather34-alertunit>
        </weather34-alertvalue></div></div>";}
      
      //temperature falling rapidly F 15 minute
      else if ($weather["temp_units"]=='F' && $weather["temp_trend"]<=-5 ){echo "
        <div class='weather34alert' id='weather34message'> 
        <div class='weather34-notification'> 
        <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
        <weather34-alertmessage>Temp Falling Rapidly <icon-zero>".$weather34_temp_icon."</icon-zero></weather34-alertmessage> <br>
        <weather34-alertvalue>+<red>".$weather['temp_trend']."</red><weather34-alertunit>&deg;Last 15 Minutes</weather34-alertunit>
        </weather34-alertvalue></div></div>";}    

//snowfall
else if ($weather["temp_units"]=='C' &&  $weather["rain"]>0 && $weather["temp"]<2){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Caution $snowflakesvg</weather34-alertmessage> <br>
  <weather34-alertvalue><blue>Sleet/Snowfall</weather34-alertunit>
  </weather34-alertvalue></div></div>";}

//snowfall F
else if ($weather["temp_units"]=='F' &&  $weather["rain"]>0 && $weather["temp"]<35){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Caution $snowflakesvg</weather34-alertmessage> <br>
  <weather34-alertvalue><blue>Sleet/Snowfall</weather34-alertunit>
  </weather34-alertvalue></div></div>";}

  //wind chill
else if ($weather["temp_units"]=='C' && $weather["windchill"]<=0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Wind Chill Caution $snowflakesvg</weather34-alertmessage> <br>
  <weather34-alertvalue><blue>".$weather['windchill']."</blue><weather34-alertunit>&deg;".$weather['temp_units']."</weather34-alertunit>
  </weather34-alertvalue></div></div>";}

  //wind chill F 
  else if ($weather["temp_units"]=='F' && $weather["windchill"]<=32 ){echo "
    <div class='weather34alert' id='weather34message'> 
    <div class='weather34-notification'> 
    <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
    <weather34-alertmessage>Windchill Caution $snowflakesvg</weather34-alertmessage> <br>
    <weather34-alertvalue><blue>".$weather['windchill']."</blue><weather34-alertunit>&deg;".$weather['temp_units']."</weather34-alertunit>
    </weather34-alertvalue></div></div>";}


//pressure falling rapidly
  else if ($weather["temp_units"]=='C' && $weather["barometer_trend"]<=-1.2 ){echo "
    <div class='weather34alert' id='weather34message'> 
    <div class='weather34-notification'> 
    <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
    <weather34-alertmessage>Pressure Falling</weather34-alertmessage> <br>
    <weather34-alertvalue><blue> Rapidly </weather34-alertunit>
    </weather34-alertvalue></div></div>";}
    
//pressure falling rapidly inches
else if ($weather["temp_units"]=='F' && $weather["barometer_trend"]<=-0.04 ){echo  "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Pressure Falling</weather34-alertmessage> <br>
  <weather34-alertvalue><blue> Rapidly </weather34-alertunit>
  </weather34-alertvalue></div></div>";}

//freezing dewpoint
else if ($weather["temp_units"]=='C' && $weather["dewpoint"]<=0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Dewpoint Freezing $snowflakesvg</weather34-alertmessage> <br>
  <weather34-alertvalue><blue>".$weather['dewpoint']."</blue><weather34-alertunit>&deg;".$weather['temp_units']."</weather34-alertunit>
  </weather34-alertvalue></div></div>";}

//freezing dewpoint F
else if ($weather["temp_units"]=='F' && $weather["dewpoint"]<=32 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Dewpoint Freezing $snowflakesvg</weather34-alertmessage> <br>
  <weather34-alertvalue><blue>".$weather['dewpoint']."</blue><weather34-alertunit>&deg;".$weather['temp_units']."</weather34-alertunit>
  </weather34-alertvalue></div></div>";}

//feels Cold
  else if ($weather["temp_units"]=='C' && $weather["realfeel"]<0){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Feels Cold $snowflakesvg</weather34-alertmessage> <br>
  <weather34-alertvalue><blue>".$weather["realfeel"]."</blue><weather34-alertunit>&deg;".$weather['temp_units']."</weather34-alertunit>
  </weather34-alertvalue></div></div>";}

 //feels Cold F
else if ($weather["temp_units"]=='F' && $weather["realfeel"]<=32 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Feels Cold $snowflakesvg</weather34-alertmessage> <br>
  <weather34-alertvalue><blue>".$weather["realfeel"]."</blue><weather34-alertunit>&deg;".$weather['temp_units']."</weather34-alertunit>
  </weather34-alertvalue></div></div>";}

//heat index
else if ($weather["temp_units"]=='C' && $weather["heat_index"]>=30 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Heat Index Caution $heatindexwu2</weather34-alertmessage> <br>
  <weather34-alertvalue><red>".$weather['heat_index']."</red><weather34-alertunit>&deg;".$weather['temp_units']."</weather34-alertunit>
  </weather34-alertvalue></div></div>";}  

//heat index F
  else if ($weather["temp_units"]=='F' && $weather["heat_index"]>=92 ){echo "
    <div class='weather34alert' id='weather34message'> 
    <div class='weather34-notification'> 
    <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
    <weather34-alertmessage>Heat Index Caution $heatindexwu2</weather34-alertmessage> <br>
    <weather34-alertvalue><red>".$weather['heat_index']."</red><weather34-alertunit>&deg;".$weather['temp_units']."</weather34-alertunit>
    </weather34-alertvalue></div></div>";}

//low dewpoint
else if ($weather["temp_units"]=='C' && $weather["dewpoint"]<=3 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Dewpoint Feeling Colder $snowflakesvg</weather34-alertmessage> <br>
  <weather34-alertvalue><blue>".$weather['dewpoint']."</blue><weather34-alertunit>&deg;".$weather['temp_units']."</weather34-alertunit>
  </weather34-alertvalue></div></div>";} 
  
//low dewpoint F
else if ($weather["temp_units"]=='F' && $weather["dewpoint"]<=33.8 ){echo "
    <div class='weather34alert' id='weather34message'> 
    <div class='weather34-notification'> 
    <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
    <weather34-alertmessage>Dewpoint Cold $snowflakesvg</weather34-alertmessage> <br>
    <weather34-alertvalue><blue>".$weather['dewpoint']."</blue><weather34-alertunit>&deg;".$weather['temp_units']."</weather34-alertunit>
    </weather34-alertvalue></div></div>";}  

//rain rate mm
else if ($weather["rain_units"]=='mm' && $weather["rain_rate"]>=20){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Heavy Rainfall <img rel='prefetch' src='console/forecasticons/rainvp.svg' width='20px' height='20px'></weather34-alertmessage> <br>
  <weather34-alertvalue><blue>".$weather["rain_rate"]."</blue><weather34-alertunit>mm per h/r</weather34-alertunit>
  </weather34-alertvalue></div></div>";} 
  
//rain rate inches
else if ($weather["rain_units"]=='in' && $weather["rain_rate"]>=0.7){echo "
    <div class='weather34alert' id='weather34message'> 
    <div class='weather34-notification'> 
    <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
    <weather34-alertmessage>Heavy Rainfall <img rel='prefetch' src='console/forecasticons/rainvp.svg' width='20px' height='20px'></weather34-alertmessage> <br>
    <weather34-alertvalue><blue>".$weather["rain_rate"]."</blue><weather34-alertunit>mm per h/r</weather34-alertunit>
    </weather34-alertvalue></div></div>";}  



//temperature high
else if ($weather["temp_units"]=='C' && $weather["temp"]>=32 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Temperature High $heatindexwu2</weather34-alertmessage> <br>
  <weather34-alertvalue><red>".$weather['temp']."</red><weather34-alertunit>&deg;".$weather['temp_units']."</weather34-alertunit>
  </weather34-alertvalue></div></div>";}

//temperature high F
else if ($weather["temp_units"]=='F' && $weather["temp"]>=89.6 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Temperature High $heatindexwu2</weather34-alertmessage> <br>
  <weather34-alertvalue><red>".$weather['temp']."</red><weather34-alertunit>&deg;".$weather['temp_units']."</weather34-alertunit>
  </weather34-alertvalue></div></div>";}


//wind speed +60 kmh
else if ($weather["wind_units"]=='km/h' && $weather["wind_speed_max"]>60){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Caution Strong Gusts <blue>$weather34_wind_icon</blue></weather34-alertmessage> <br>
  <weather34-alertvalue><red>".$weather['wind_speed_max']."</red><weather34-alertunit>".$weather['wind_units']."</weather34-alertunit>
  </weather34-alertvalue></div></div>";}

//wind speed +45 kmh
  else if ($weather["wind_units"]=='km/h' && $weather["wind_speed_max"]>45){echo "
    <div class='weather34alert' id='weather34message'> 
    <div class='weather34-notification'> 
    <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
    <weather34-alertmessage>Caution Gusty Winds <blue>$weather34_wind_icon</blue></weather34-alertmessage> <br>
    <weather34-alertvalue><icon-21-25>".$weather['wind_speed_max']."</icon-21-25><weather34-alertunit>".$weather['wind_units']."</weather34-alertunit>
    </weather34-alertvalue></div></div>";}

    //wind speed +37 mph
else if ($weather["wind_units"]=='mph' && $weather["wind_speed_max"]>37){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Caution Strong Gusts  <blue>$weather34_wind_icon</blue></weather34-alertmessage> <br>
  <weather34-alertvalue><red>".$weather['wind_speed_max']."</red><weather34-alertunit>".$weather['wind_units']."</weather34-alertunit>
  </weather34-alertvalue></div></div>";}

  //wind speed +27 mph
  else if ($weather["wind_units"]=='mph' && $weather["wind_speed_max"]>27.9){echo "
    <div class='weather34alert' id='weather34message'> 
    <div class='weather34-notification'> 
    <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
    <weather34-alertmessage>Caution Gusty Winds <blue>$weather34_wind_icon</blue></weather34-alertmessage> <br>
    <weather34-alertvalue><icon-21-25>".$weather['wind_speed_max']."</icon-21-25><weather34-alertunit>".$weather['wind_units']."</weather34-alertunit>
    </weather34-alertvalue></div></div>";}



//dewpoint high
else if ($weather["temp_units"]=='C' && $weather["dewpoint"]>=20 && $weather["dewpoint_trend"]>0){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Dewpoint Caution $heatindexwu2</weather34-alertmessage> <br>
  <weather34-alertvalue><red>".$weather['dewpoint']."</red><weather34-alertunit>&deg;".$weather['temp_units']."</weather34-alertunit>
  </weather34-alertvalue></div></div>";}

//dewpoint high F
else if ($weather["temp_units"]=='C' && $weather["dewpoint"]>=68 && $weather["dewpoint_trend"]>0){echo "
    <div class='weather34alert' id='weather34message'> 
    <div class='weather34-notification'> 
    <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
    <weather34-alertmessage>Dewpoint High $heatindexwu2</weather34-alertmessage> <br>
    <weather34-alertvalue><red>".$weather['dewpoint']."</red><weather34-alertunit>&deg;".$weather['temp_units']."</weather34-alertunit>
    </weather34-alertvalue></div></div>";}


}
    //add more if required
?>
<script> //fire the weather34 notification
function closeweather34alert(el) { el.addClass('weather34alert-hide');}
$('.js-messageClose').on('click', function(e) { closeweather34alert($(this).closest('.weather34alert'));});
$(document).ready(function() {  setTimeout(function() { closeweather34alert($('#weather34message')); }, 10000);});
</script>