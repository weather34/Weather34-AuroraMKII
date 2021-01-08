<?php include('livedata.php');
$weather["barometer"]=number_format($meteobridgeapi[36]*0.75006157584566,1);
$weather["barometer_max"]=number_format($meteobridgeapi[34]*0.75006157584566,1);
$weather["barometer_min"]=number_format($meteobridgeapi[36]*0.75006157584566,1);
$weather["barometer_trend"]    = number_format($meteobridgeapi[10]*0.75006157584566,1) - number_format($meteobridgeapi[18]*0.75006157584566,1);
$weather["barometer_units"]="mmHG";
$baroformat=3;
$baroformat2=3;


$weather24h= $weather["barometer"]-$baromdiff;
$baromdiff = number_format($weather["barometer_24H"]*0.02953*25,$baroformat);

//echo $weather24h;
?>
<div class="modulecaption2">Barometric Pressure</div>
<div class="maxwindgauge">
<?php  //Max
echo $max1." ";
echo "<orange>".$weather["barometer_max"]."</orange> ";echo $maxclock." ".$weather["thb0seapressmaxtime"];
?></div>

<div class="maxbftgauge">
<?php  //Min
echo $min1." ";
echo "<deepblue>".$weather["barometer_min"]."</deepblue> ";echo $maxclock." ".$weather["thb0seapressmintime"];
?></div>


<div class="button button-dial">               
 <div class="button-dial-top"></div>
<realfeel>Actual Pressure</realfeel>
<div class="button-dial-label">          
<?php // indicator color
echo '<div class="text2b">'.$weather["barometer"].'</div>';
?>
</div></div><div>

<?php //unit
echo "<unitindicator>".$weather["barometer_units"]."</unitindicator>";?>

<?php //trend
echo "<tempman>";
//falling
if($weather["barometer_trend"]<0){echo '';echo '&nbsp;'.$fallingsymbolxx.'<blue> '.number_format($weather["barometer_trend"],$baroformat).'</orange>';}
//rising
else if($weather["barometer_trend"]>0){echo '';echo '&nbsp;'.$risingsymbolxx.'<orange> + '.number_format($weather["barometer_trend"],$baroformat).'</orange>';}
//steady
else echo ''.$steadysymbol.'';
echo "</tempman>";?>
</div></div></div></div></div>


<div class="windgauge">
<div class="second24hourguage">
  <?php echo "<solarheading style='margin-left:-45px;width:70px'>24H Change</solarheading>";?>
<div class="button button-dialrain">               
 <div class="button-dial-toprain"></div>
<div class="button-dial-label"> 
<?php echo "<uvreadings style='color:#fff;opacity:0.7;background:";
if ($baromdiff>0 ){echo 'var(--orange)';}
else if ($baromdiff==0 ){echo 'var(--green)';}
else if ($baromdiff<0 ){echo 'var(--blue)';}
echo "'>";
if ($baromdiff>0){echo "+".$baromdiff."";}
else echo "".$baromdiff."</uvopacity></uvreadings>";
?>  
</div></div>
<div class="weather34i-rairate-bar2">
<div id="raincontainer2">
<div id="weather34rainbeaker2">
<?php 
//mmHg
echo "<volume>".$weather["barometer_units"]." <br>20 <br>10 <br>0 <br>-10 <br>-20 </volume>";?>


<div id="weather34rainwater2" style="max-height:73px;height:<?php 
//inHg - mmHg
if ($baromdiff<0){ echo number_format($baromdiff,$baroformat2)+20;}
else echo number_format($baromdiff,$baroformat2)+22;?>
pt;opacity:0.5;background:0;border-top:2px dashed 
<?php //color
if ($baromdiff>0 ){echo 'var(--orange)';}
else if ($baromdiff==0 ){echo 'var(--green)';}
else if ($baromdiff<0 ){echo 'var(--blue)';}
?>"> 
</div></div></div></div></div></div>

<div class="heatcirclerain1" >
<div class="rainrateextra2" style="width:500px">
<valuetextheading5>
<?php // weather34 simple css scale 

if ($weather["barometer"]>=765 ){echo "685 749 764 <greyb>".$weather["barometer"]."</greyb> mmHG";}
else if ($weather["barometer"]>=749 ){echo "685 700 736 <greyb>".$weather["barometer"]."</greyb> mmHG";}
else if ($weather["barometer"]>=685 ){echo "<greyb>".$weather["barometer"]."</greyb> 700 749 765 mmHG";}
    

    if ($weather["barometer_units"]=='inHg'){
        if ($weather["barometer"]>=30.41 ){echo "29.5 1010 30.1 30.2 <greyb>".$weather["barometer"]."</greyb> ";}
        else if ($weather["barometer"]>=30.12 ){echo "29.5 29.8 30.1 <greyb>".$weather["barometer"]."</greyb> 30.4";}
        else if ($weather["barometer"]>=29.82 ){echo "29.5 29.8 <greyb>".$weather["barometer"]."</greyb> 30.2 ";}
        else if ($weather["barometer"]>=29.53 ){echo "29.5 <greyb>".$weather["barometer"]."</greyb> 29.9 30.2 ";}
        else if ($weather["barometer"]>=29.2 ){echo "28.6 28.9 <greyb>".$weather["barometer"]."</greyb> 29.5 29.8";}
        else if ($weather["barometer"]>=28.9 ){echo "28.0 28.3 28.6 <greyb>".$weather["barometer"]."</greyb> 29.2 29.5";}
        else if ($weather["barometer"]>=28.6 ){echo "28.0 28.3 <greyb>".$weather["barometer"]."</greyb> 28.9 29.5 ";}
        else if ($weather["barometer"]>=28.3 ){echo "28.0 <greyb>".$weather["barometer"]."</greyb> 28.9 29.2 29.5";}
        else if ($weather["barometer"]>=28.05 ){echo "27 <greyb>".$weather["barometer"]."</greyb> 28.6 28.9 29.2 29.5";}
            echo "<smalltempunit2>&nbsp;".$weather["barometer_units"]."</smalltempunit2>";
            }
	
?></smalltempunit2>
</valuetextheading5>
<div class=sunratebar>
<div class="weather34sunratebar" 
style=
"width:<?php if ( $meteobridgeapi[10]<1010){echo $meteobridgeapi[10]*0.055;}else echo $meteobridgeapi[10]*0.075;?>px;background:var(--barometerbar);">
</div></div></div>

<div class=extrainfo><a href='barometer-almanacmmHg2.php' data-lity data-title="Almanac Data"><?php echo  $aqilinks?>&nbsp;Extra Info</a></div></div>


<div class="weather-tempicon-identity">    
<?php //id
echo "<icon-zero>".$weather34_pressure_icon."</icon-zero>";?></div>





<?php 
//start the wu output
$json='jsondata/wuforecast.txt';
$weather34wuurl=file_get_contents($json);
$weather34wuurl=file_get_contents($json);
$parsed_weather34wujson = json_decode($weather34wuurl,false);
{ //weather34 wu null fallback
    if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==null){         
        $wuskydayTime = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[1];         
        $wuskydayWindGust = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[1];        
        $wuskydayprecipIntensity = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[1];
        $wuskydayPrecipType = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[1];
        $wuskydayprecipIntensity = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[1];
        $wuskydayPrecipProb = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[1];        
        $wuskydaysnow = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[1];
        $wuskydaynight = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[1];       
        $wuskythunder = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[1];       
    }       
        else {        
        $wuskydayTime = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[0];	         
        $wuskydayWindGust = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[0];        
        $wuskydayprecipIntensity = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[0];
        $wuskydayPrecipType = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[0];
        $wuskydayprecipIntensity = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[0];
        $wuskydayPrecipProb = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[0];        
        $wuskydaysnow = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[0];        
        $wuskydaynight = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[0];        
        $wuskythunder = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[0];           
        }
        //weather34 wu 1st	 
         if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==null){         
        $wuskydayTime1 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[2];	        
        $wuskydayWindGust1 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[2];        
        $wuskydayprecipIntensity1 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[2];
        $wuskydayPrecipType1 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[2];
        $wuskydayprecipIntensity1 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[2];
        $wuskydayPrecipProb1 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[2];        
        $wuskydaysnow1 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[2];        
        $wuskydaynight1 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[2];       
        $wuskythunder1 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[2];		        
        }
         else {          
        $wuskydayTime1 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[1];	        
        $wuskydayWindGust1 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[1];        
        $wuskydayprecipIntensity1 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[1];
        $wuskydayPrecipType1 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[1];
        $wuskydayprecipIntensity1 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[1];
        $wuskydayPrecipProb1 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[1];
        $wuskydayUV1 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[1];
        $wuskydayUVdesc1 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[1];	
        $wuskydaysnow1 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[1];        
        $wuskydaynight1 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[1];        
        $wuskythunder1 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[1];       
         }
        //weather34 wu 2nd		 
         if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==null){        
        $wuskydayTime2 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[3];	        
        $wuskydayWindGust2 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[3];        
        $wuskydayprecipIntensity2 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[3];
        $wuskydayPrecipType2 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[3];
        $wuskydayprecipIntensity2 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[3];
        $wuskydayPrecipProb2 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[3];        
        $wuskydaysnow2 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[3];        
        $wuskydaynight2 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[3];        
        $wuskythunder2 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[3];	
       }
       
    else {         
        $wuskydayTime2 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[2];	       
        $wuskydayWindGust2 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[2];        
        $wuskydayprecipIntensity2 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[2];
        $wuskydayPrecipType2 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[2];
        $wuskydayprecipIntensity2 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[2];
        $wuskydayPrecipProb2 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[2];       
        $wuskydaysnow2 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[2];
        $wuskydaysummary2 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[2];
        $wuskydaynight2 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[2];         
        $wuskythunder2 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[2];  
        }
        //weather34 wu 3rd
         if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==null){        
        $wuskydayTime3 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[4];	        
        $wuskydayWindGust3 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[4];       
        $wuskydayprecipIntensity3 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[4];
        $wuskydayPrecipType3 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[4];
        $wuskydayprecipIntensity3 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[4];
        $wuskydayPrecipProb3 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[4];        
        $wuskydaysnow3 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[4];       
        $wuskydaynight3 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[4];	        
        $wuskythunder3 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[4];        
        }
        else {        
        $wuskydayTime3 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[3];	        
        $wuskydayWindGust3 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[3];        
        $wuskydayprecipIntensity3 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[3];
        $wuskydayPrecipType3 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[3];
        $wuskydayprecipIntensity3 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[3];
        $wuskydayPrecipProb3 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[3];       
        $wuskydaysnow3 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[3];        
        $wuskydaynight3 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[3];	         
        $wuskythunder3 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[3];
        }
       
         //weather34 wu 4th
         if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==null){         
        $wuskydayTime4 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[5];	        
        $wuskydayWindGust4 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[5];
        $wuskydayprecipIntensity4 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[5];
        $wuskydayPrecipType4 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[5];
        $wuskydayprecipIntensity4 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[5];
        $wuskydayPrecipProb4 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[5];        
        $wuskydaysnow4 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[5];
        $wuskydaysummary4 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[5];
        $wuskydaynight4 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[5];        
        $wuskythunder4 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[5];        
        }
        
        else {         
        $wuskydayTime4 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[4];	        
        $wuskydayWindGust4 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[4];        
        $wuskydayprecipIntensity4 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[4];
        $wuskydayPrecipType4 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[4];
        $wuskydayprecipIntensity4 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[4];
        $wuskydayPrecipProb4 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[4];        
        $wuskydaysnow4 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[4];
        $wuskydaysummary4 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[4];
        $wuskydaynight4 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[4];       
        $wuskythunder4 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[4];  
        }
         //weather34 wu 5th
           if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==null){        	 
        $wuskydayTime5 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[6];	        
        $wuskydayWindGust5 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[6];       
        $wuskydayprecipIntensity5 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[6];
        $wuskydayPrecipType5 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[6];
        $wuskydayprecipIntensity5 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[6];
        $wuskydayPrecipProb5 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[6];        
        $wuskydaysnow5 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[6];        
        $wuskydaynight5 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[6];	       
        $wuskythunder5 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[6];        
        } 	 
         else {	        
        $wuskydayTime5 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[5];	        
        $wuskydayWindGust5 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[5];        
        $wuskydayprecipIntensity5 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[5];
        $wuskydayPrecipType5 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[5];
        $wuskydayprecipIntensity5 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[5];
        $wuskydayPrecipProb5 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[5];        
        $wuskydaysnow5 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[5];
        $wuskydaysummary5 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[5];
        $wuskydaynight5 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[5];	        
        $wuskythunder5 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[5];        
        }
         //weather34 wu 6th
           if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==null){        
        $wuskydayTime6 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[7];	        
        $wuskydayWindGust6 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[7];
        $wuskydayprecipIntensity6 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[7];
        $wuskydayPrecipType6 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[7];
        $wuskydayprecipIntensity6 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[7];
        $wuskydayPrecipProb6 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[7];        
        $wuskydaysnow6 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[7];        
        $wuskydaynight6 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[7];        
        $wuskythunder6 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[7];        
        }	 
        else{         
        $wuskydayTime6 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[6];        
        $wuskydayWindGust6 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[6];        
        $wuskydayprecipIntensity6 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[6];
        $wuskydayPrecipType6 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[6];
        $wuskydayprecipIntensity6 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[6];
        $wuskydayPrecipProb6 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[6];        
        $wuskydaysnow6 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[6];        
        $wuskydaynight6 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[6];     
        $wuskythunder6 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[6];       
        }
        //weather34 wu 7th
          if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==null){       
        $wuskydayTime7 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[8];	        
        $wuskydayWindGust7 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[8];        
        $wuskydayprecipIntensity7 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[8];
        $wuskydayPrecipType7 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[8];
        $wuskydayprecipIntensity7 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[8];
        $wuskydayPrecipProb7 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[8];        
        $wuskydaysnow7 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[8];       
        $wuskydaynight7 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[8];        
        $wuskythunder7 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[8];       
        }        
        
        else{
        $wuskydayTime7 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[7];        
        $wuskydayWindGust7 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[7];        
        $wuskydayprecipIntensity7 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[7];
        $wuskydayPrecipType7 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[7];
        $wuskydayprecipIntensity7 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[7];
        $wuskydayPrecipProb7 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[7];        
        $wuskydaysnow7 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[7];        
        $wuskydaynight7 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[7];        
        $wuskythunder7 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[7];       
        }            
    }
    
    //weather34 wu 8th
          if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==null){         
        $wuskydayTime8 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[9];        
        $wuskydayWindGust8 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[9];       
        $wuskydayprecipIntensity8 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[9];
        $wuskydayPrecipType8 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[9];
        $wuskydayprecipIntensity8 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[9];
        $wuskydayPrecipProb8 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[9];        
        $wuskydaysnow8 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[9];        
        $wuskydaynight8 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[9];        
        $wuskythunder8 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[9];        
        }     
        else{
        $wuskydayTime8 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[8];	        
        $wuskydayWindGust8 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[8];        
        $wuskydayprecipIntensity8 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[8];
        $wuskydayPrecipType8 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[8];
        $wuskydayprecipIntensity8 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[8];
        $wuskydayPrecipProb8 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[8];       
        $wuskydaysnow8 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[8];         
        $wuskydaynight8 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[8];        
        $wuskythunder8 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[8];          
        }
    
    //weather34 wu 9th
          if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==null){       
        $wuskydayTime9 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[10];        
        $wuskydayWindGust9 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[10];        
        $wuskydayprecipIntensity9 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[10];
        $wuskydayPrecipType9 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[10];
        $wuskydayprecipIntensity9 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[10];
        $wuskydayPrecipProb9 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[10];       
        $wuskydaysnow9 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[10];       
        $wuskydaynight9 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[10];       
        $wuskythunder9 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[10];
        }
        else{
        $wuskydayTime9 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[9];	        
        $wuskydayWindGust9 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[9];        
        $wuskydayprecipIntensity9 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[9];
        $wuskydayPrecipType9 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[9];
        $wuskydayprecipIntensity9 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[9];
        $wuskydayPrecipProb9 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[9];       
        $wuskydaysnow9 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[9];        
        $wuskydaynight9 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[9];    
        $wuskydaynight9 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[9];       
        $wuskythunder9 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[9];     
        }    
    
    //weather34 wu 10th
          if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==null){        
        $wuskydayTime10 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[11];	        
        $wuskydayWindGust10 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[11];              
        $wuskydayprecipIntensity10 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[11];
        $wuskydayPrecipType10 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[11];
        $wuskydayprecipIntensity10 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[11];
        $wuskydayPrecipProb10 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[11];        
        $wuskydaysnow10 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[11];       
        $wuskydaynight10 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[11];        
        $wuskythunder10 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[11];
        }        
        else{
        $wuskydayTime10 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[10];	   
        $wuskydayprecipIntensity10 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[10];
        $wuskydayPrecipType10 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[10];
        $wuskydayprecipIntensity10 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[10];
        $wuskydayPrecipProb10 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[10];        
        $wuskydaysnow10 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[10];         
        $wuskydaynight10 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[10];       
        $wuskythunder10 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[10];            
        }
       
       //heatindex
       if ($tempunit=='F' && $wuapiunit=='m' ){$wuskyheatindex=($wuskyheatindex*9/5)+32;}	
       // metric to F UK
       if ($tempunit=='F' && $wuapiunit=='h' ){$wuskyheatindex=($wuskyheatindex*9/5)+32;}	
       // ms non metric Scandinavia 
       if ($tempunit=='F' && $wuapiunit=='s'){$wuskyheatindex=($wuskyheatindex*9/5)+32;}	
       // non metric to c US
       if ($tempunit=='C' && $wuapiunit=='e' ){$wuskyheatindex=($wuskyheatindex-32)/1.8;}	  
       
       //heatindex
       if ($tempunit=='F' && $wuapiunit=='m' ){$wuskyheatindex1=($wuskyheatindex1*9/5)+32;}	
       // metric to F UK
       if ($tempunit=='F' && $wuapiunit=='h' ){$wuskyheatindex1=($wuskyheatindex1*9/5)+32;}	
       // ms non metric Scandinavia 
       if ($tempunit=='F' && $wuapiunit=='s'){$wuskyheatindex1=($wuskyheatindex1*9/5)+32;}	
       // non metric to c US
       if ($tempunit=='C' && $wuapiunit=='e' ){$wuskyheatindex1=($wuskyheatindex1-32)/1.8;}	         
       
       //heatindex
       if ($tempunit=='F' && $wuapiunit=='m' ){$wuskyheatindex3=($wuskyheatindex3*9/5)+32;}	
       // metric to F UK
       if ($tempunit=='F' && $wuapiunit=='h' ){$wuskyheatindex3=($wuskyheatindex3*9/5)+32;}	
       // ms non metric Scandinavia 
       if ($tempunit=='F' && $wuapiunit=='s'){$wuskyheatindex3=($wuskyheatindex3*9/5)+32;}	
       // non metric to c US
       if ($tempunit=='C' && $wuapiunit=='e' ){$wuskyheatindex3=($wuskyheatindex3-32)/1.8;}	          
       
       //rain inches to mm
       if ($rainunit=='mm' && $wuapiunit=='e' ){$wuskydayprecipIntensity11=$wuskydayprecipIntensity11*25.4;}
       //rain mm to inches scandinavia
       if ($rainunit=='in' && $wuapiunit=='s' ){$wuskydayprecipIntensity11=$wuskydayprecipIntensity11*0.0393701;}
       //rain mm to inches uk
       if ($rainunit=='in' && $wuapiunit=='h' ){$wuskydayprecipIntensity11=$wuskydayprecipIntensity11*0.0393701;}
       //rain mm to inches metric
       if ($rainunit=='in' && $wuapiunit=='m' ){$wuskydayprecipIntensity11=$wuskydayprecipIntensity11*0.0393701;}   
       
       // mph to kmh US
    if ($windunit=='km/h' && $wuapiunit=='e' ){$wuskydayWindGust=(number_format($wuskydayWindGust,1)*1.60934);}
    // mph to kmh UK
    if ($windunit=='km/h' && $wuapiunit=='h' ){$wuskydayWindGust=(number_format($wuskydayWindGust,1)*1.60934);}
    //mph to ms US
    if ($windunit=='m/s' && $wuapiunit=='e' ){$wuskydayWindGust=(number_format($wuskydayWindGust,1)*0.44704);}
    //mph to ms uk
    if ($windunit=='m/s' && $wuapiunit=='h' ){$wuskydayWindGust=(number_format($wuskydayWindGust,1)*0.44704);}
    //kmh to ms
    if ($windunit=='m/s' && $wuapiunit=='m' ){$wuskydayWindGust=(number_format($wuskydayWindGust,1)*0.277778);}
    //kmh to mph
    if ($windunit=='mph' && $wuapiunit=='m' ){$wuskydayWindGust=(number_format($wuskydayWindGust,1)*0.621371);}	   
    
    
    // mph to kmh US 1
    if ($windunit=='km/h' && $wuapiunit=='e' ){$wuskydayWindGust1=(number_format($wuskydayWindGust1,1)*1.60934);}
    // mph to kmh UK
    if ($windunit=='km/h' && $wuapiunit=='h' ){$wuskydayWindGust1=(number_format($wuskydayWindGust1,1)*1.60934);}
    //mph to ms US
    if ($windunit=='m/s' && $wuapiunit=='e' ){$wuskydayWindGust1=(number_format($wuskydayWindGust1,1)*0.44704);}
    //mph to ms uk
    if ($windunit=='m/s' && $wuapiunit=='h' ){$wuskydayWindGust1=(number_format($wuskydayWindGust1,1)*0.44704);}
    //kmh to ms
    if ($windunit=='m/s' && $wuapiunit=='m' ){$wuskydayWindGust1=(number_format($wuskydayWindGust1,1)*0.277778);}
    //kmh to mph
    if ($windunit=='mph' && $wuapiunit=='m' ){$wuskydayWindGust1=(number_format($wuskydayWindGust1,1)*0.621371);}	    
    
    
    // mph to kmh US 2
    if ($windunit=='km/h' && $wuapiunit=='e' ){$wuskydayWindGust2=(number_format($wuskydayWindGust2,1)*1.60934);}
    // mph to kmh UK
    if ($windunit=='km/h' && $wuapiunit=='h' ){$wuskydayWindGust2=(number_format($wuskydayWindGust2,1)*1.60934);}
    //mph to ms US
    if ($windunit=='m/s' && $wuapiunit=='e' ){$wuskydayWindGust2=(number_format($wuskydayWindGust2,1)*0.44704);}
    //mph to ms uk
    if ($windunit=='m/s' && $wuapiunit=='h' ){$wuskydayWindGust2=(number_format($wuskydayWindGust2,1)*0.44704);}
    //kmh to ms
    if ($windunit=='m/s' && $wuapiunit=='m' ){$wuskydayWindGust2=(number_format($wuskydayWindGust2,1)*0.277778);}
    //kmh to mph
    if ($windunit=='mph' && $wuapiunit=='m' ){$wuskydayWindGust2=(number_format($wuskydayWindGust2,1)*0.621371);}	
    
    // mph to kmh US 3
    if ($windunit=='km/h' && $wuapiunit=='e' ){$wuskydayWindGust3=(number_format($wuskydayWindGust3,1)*1.60934);}
    // mph to kmh UK
    if ($windunit=='km/h' && $wuapiunit=='h' ){$wuskydayWindGust3=(number_format($wuskydayWindGust3,1)*1.60934);}
    //mph to ms US
    if ($windunit=='m/s' && $wuapiunit=='e' ){$wuskydayWindGust3=(number_format($wuskydayWindGust3,1)*0.44704);}
    //mph to ms uk
    if ($windunit=='m/s' && $wuapiunit=='h' ){$wuskydayWindGust3=(number_format($wuskydayWindGust3,1)*0.44704);}
    //kmh to ms
    if ($windunit=='m/s' && $wuapiunit=='m' ){$wuskydayWindGust3=(number_format($wuskydayWindGust3,1)*0.277778);}
    //kmh to mph
    if ($windunit=='mph' && $wuapiunit=='m' ){$wuskydayWindGust3=(number_format($wuskydayWindGust3,1)*0.621371);}	
    
    
    // mph to kmh US 4
    if ($windunit=='km/h' && $wuapiunit=='e' ){$wuskydayWindGust4=(number_format($wuskydayWindGust4,1)*1.60934);}
    // mph to kmh UK
    if ($windunit=='km/h' && $wuapiunit=='h' ){$wuskydayWindGust4=(number_format($wuskydayWindGust4,1)*1.60934);}
    //mph to ms US
    if ($windunit=='m/s' && $wuapiunit=='e' ){$wuskydayWindGust4=(number_format($wuskydayWindGust4,1)*0.44704);}
    //mph to ms uk
    if ($windunit=='m/s' && $wuapiunit=='h' ){$wuskydayWindGust4=(number_format($wuskydayWindGust4,1)*0.44704);}
    //kmh to ms
    if ($windunit=='m/s' && $wuapiunit=='m' ){$wuskydayWindGust4=(number_format($wuskydayWindGust4,1)*0.277778);}
    //kmh to mph
    if ($windunit=='mph' && $wuapiunit=='m' ){$wuskydayWindGust4=(number_format($wuskydayWindGust4,1)*0.621371);}	   

echo '<div class=wuaheadforetop><a href="outlookwu.php" data-lity data-title="5 day Forecast" class="forecastlink">';
if ($wuskythunder>0 )  {echo 'Forecast &nbsp;<orange>Thunder</orange>&nbsp;'.$wuskydayTime.'&nbsp;'.$lightningalert8;} 
else if ($wuskythunder1>0 )  {echo ' Forecast&nbsp;<orange>Thunder</orange>&nbsp; '.$wuskydayTime1. '&nbsp;'.$lightningalert8;} 
else if ($wuskythunder2>0 )  {echo ' Forecast&nbsp;<orange>Thunder</orange>&nbsp; '.$wuskydayTime2. '&nbsp;'.$lightningalert8;} 
else if ($wuskythunder3>0 )  {echo ' Forecast&nbsp;<orange>Thunder</orange>&nbsp; '.$wuskydayTime3. '&nbsp;'.$lightningalert8;} 
else if ($wuskythunder4>0 )  {echo ' Forecast&nbsp;<orange>Thunder</orange>&nbsp; '.$wuskydayTime4. '&nbsp;'.$lightningalert8;} 
else if ($wuskythunder5>0 )  {echo ' Forecast&nbsp;<orange>Thunder</orange>&nbsp; '.$wuskydayTime5. '&nbsp;'.$lightningalert8;} 
else if ($wuskythunder6>0 )  {echo ' Forecast&nbsp;<orange>Thunder</orange>&nbsp; '.$wuskydayTime6. '&nbsp;'.$lightningalert8;} 
else if ($wuskythunder7>0 )  {echo ' Forecast&nbsp;<orange>Thunder</orange>&nbsp; '.$wuskydayTime7. '&nbsp;'.$lightningalert8;} 
else if ($wuskythunder8>0 )  {echo ' Forecast&nbsp;<orange>Thunder</orange>&nbsp; '.$wuskydayTime8. '&nbsp;'.$lightningalert8;} 
else if ($wuskythunder9>0 )  {echo ' Forecast&nbsp;<orange>Thunder</orange>&nbsp; '.$wuskydayTime9. '&nbsp;'.$lightningalert8;} 
else if ($wuskythunder10>0 )  {echo ' Forecast&nbsp;<orange>Thunder</orange>&nbsp; '.$wuskydayTime10. '&nbsp;'.$lightningalert8;}   
//snowfall wu
else if ($wuskysnow>0 )  {echo ' Forecast &nbsp;<deepblue>Snow</deepblue>&nbsp; '.$wuskydayTime. '&nbsp;'.$freezing.'';}
else if ($wuskysnow1>0 )  {echo ' Forecast &nbsp;<deepblue>Snow</deepblue>&nbsp; '.$wuskydayTime1. '&nbsp;'.$freezing.'';}
else if ($wuskysnow2>0 )  {echo ' Forecast &nbsp;<deepblue>Snow</deepblue>&nbsp; '.$wuskydayTime2. '&nbsp;'.$freezing.'';}
else if ($wuskysnow3>0 )  {echo ' Forecast &nbsp;<deepblue>Snow</deepblue>&nbsp; '.$wuskydayTime3. '&nbsp;'.$freezing.'';}
else if ($wuskysnow4>0 )  {echo ' Forecast &nbsp;<deepblue>Snow</deepblue>&nbsp; '.$wuskydayTime4. '&nbsp;'.$freezing.'';}
else if ($wuskysnow5>0 )  {echo ' Forecast &nbsp;<deepblue>Snow</deepblue>&nbsp; '.$wuskydayTime5. '&nbsp;'.$freezing.'';}
else if ($wuskysnow6>0 )  {echo ' Forecast &nbsp;<deepblue>Snow</deepblue>&nbsp; '.$wuskydayTime6. '&nbsp;'.$freezing.'';}
else if ($wuskysnow7>0 )  {echo ' Forecast &nbsp;<deepblue>Snow</deepblue>&nbsp;'.$wuskydayTime7. '&nbsp;'.$freezing.'';}
else if ($wuskysnow8>0 )  {echo ' Forecast &nbsp;<deepblue>Snow</deepblue>&nbsp; '.$wuskydayTime8. '&nbsp;'.$freezing.'';}
else if ($wuskysnow9>0 )  {echo ' Forecast &nbsp;<deepblue>Snow</deepblue>&nbsp; '.$wuskydayTime9. '&nbsp;'.$freezing.'';}
else if ($wuskysnow10>0 )  {echo ' Forecast &nbsp;<deepblue>Snow</deepblue>&nbsp; '.$wuskydayTime10. '&nbsp;'.$freezing.'';}

//rainfall wu
else if ($wuskydayPrecipProb>30 )  {echo ' Forecast &nbsp;<deepblue>Rain</deepblue>&nbsp; '.$wuskydayTime. '&nbsp; '.$rainfallalert8.'&nbsp;<blue>'.$wuskydayPrecipProb.'</blue>% Chance';}
else if ($wuskydayPrecipProb1>30 )  {echo ' Forecast &nbsp;<deepblue>Rain</deepblue>&nbsp; '.$wuskydayTime1.'&nbsp;'.$rainfallalert8.'&nbsp;<blue>'.$wuskydayPrecipProb1.'</blue>% Chance';}
else if ($wuskydayprecipIntensity>0 )  {echo ' Forecast &nbsp;<deepblue>Rain</deepblue>&nbsp; '.$wuskydayTime. '&nbsp; '.$rainfallalert8.'&nbsp;<blue>'.$wuskydayPrecipProb.'</blue>% Chance';}
else if ($wuskydayprecipIntensity1>0 )  {echo ' Forecast &nbsp;<deepblue>Rain</deepblue>&nbsp; '.$wuskydayTime1.'&nbsp;'.$rainfallalert8.'&nbsp;<blue>'.$wuskydayPrecipProb1.'</blue>% Chance';}
else if ($wuskydayprecipIntensity2>0 )  {echo ' Forecast &nbsp;<deepblue>Rain</deepblue>&nbsp; '.$wuskydayTime2.'&nbsp;'.$rainfallalert8.'';}
else if ($wuskydayprecipIntensity3>0 )  {echo ' Forecast &nbsp;<deepblue>Rain</deepblue>&nbsp; '.$wuskydayTime3. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskydayprecipIntensity4>0 )  {echo ' Forecast &nbsp;<deepblue>Rain</deepblue>&nbsp; '.$wuskydayTime4. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskydayprecipIntensity5>0 )  {echo ' Forecast &nbsp;<deepblue>Rain</deepblue>&nbsp; '.$wuskydayTime5. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskydayprecipIntensity6>0 )  {echo ' Forecast &nbsp;<deepblue>Rain</deepblue>&nbsp; '.$wuskydayTime6. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskydayprecipIntensity7>0 )  {echo ' Forecast &nbsp;<deepblue>Rain</deepblue>&nbsp; '.$wuskydayTime7. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskydayprecipIntensity8>0 )  {echo ' Forecast &nbsp;<deepblue>Rain</deepblue>&nbsp; '.$wuskydayTime8. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskydayprecipIntensity9>0 )  {echo ' Forecast &nbsp;<deepblue>Rain</deepblue>&nbsp; '.$wuskydayTime9. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskydayprecipIntensity10>0 )  {echo ' Forecast &nbsp;<deepblue>Rain</deepblue>&nbsp; '.$wuskydayTime10. '&nbsp;'.$rainfallalert8.'';}


//rainfall wu
else if ($wuskyrain>0 )  {echo ' Forecast &nbsp;<deepblue>Rain</deepblue>&nbsp; '.$wuskydayTime. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain1>0 )  {echo ' Forecast &nbsp;<deepblue>Rain</deepblue>&nbsp; '.$wuskydayTime1.'&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain2>0 )  {echo ' Forecast &nbsp;<deepblue>Rain</deepblue>&nbsp; '.$wuskydayTime2.'&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain3>0 )  {echo ' Forecast &nbsp;<deepblue>Rain</deepblue>&nbsp; '.$wuskydayTime3. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain4>0 )  {echo ' Forecast &nbsp;<deepblue>Rain</deepblue>&nbsp; '.$wuskydayTime4. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain5>0 )  {echo ' Forecast &nbsp;<deepblue>Rain</deepblue>&nbsp; '.$wuskydayTime5. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain6>0 )  {echo ' Forecast &nbsp;<deepblue>Rain</deepblue>&nbsp; '.$wuskydayTime6. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain7>0 )  {echo ' Forecast &nbsp;<deepblue>Rain</deepblue>&nbsp; '.$wuskydayTime7. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain8>0 )  {echo ' Forecast &nbsp;<deepblue>Rain</deepblue>&nbsp; '.$wuskydayTime8. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain9>0 )  {echo ' Forecast &nbsp;<deepblue>Rain</deepblue>&nbsp; '.$wuskydayTime9. '&nbsp;'.$rainfallalert8.'';}
else if ($wuskyrain10>0 )  {echo ' Forecast &nbsp;<deepblue>Rain</deepblue>&nbsp; '.$wuskydayTime10. '&nbsp;'.$rainfallalert8.'';}
//heat index wu
else if ($wuskyheatindex>=30 && $wuskydayTime='Today')  {echo "Forecast &nbsp;<red>High</red>&nbsp";echo ' Heat Index&nbsp; '.$wuskydayTime. '&nbsp;'.$heatindexwu2.'';}
else if ($wuskyheatindex1>=30 && $wuskydayTime1='Tomorrow')  {echo "Forecast &nbsp;<red>High</red>&nbsp";echo ' Heat Index&nbsp; '.$wuskydayTime1. '&nbsp;'.$heatindexwu2.'';}
else if ($wuskyheatindex2 >=30 && $wuskydayTime2='Tomorrow'  )  {echo "Forecast &nbsp;<red>High</red>&nbsp";echo ' Heat Index&nbsp; '.$wuskydayTime2. '&nbsp;'.$heatindexwu2.'';}
//tonight/tomorrow wind
else if ($wuskydayWindGust>35 ){  echo "Forecast &nbsp; Strong Winds&nbsp;", $wuskydayTime."&nbsp;".$lightningalert8;}
else if ($wuskydayWindGust1>35 ){  echo "Forecast &nbsp; Strong Winds&nbsp;", $wuskydayTime1."&nbsp;".$lightningalert8;}
else if ($wuskydayWindGust2>35 ){  echo "Forecast &nbsp;Strong Winds&nbsp;", $wuskydayTime2."&nbsp;".$lightningalert8;}
else if ($wuskydayWindGust3>35 ){  echo "Forecast &nbsp;Strong Winds&nbsp;", $wuskydayTime3."&nbsp;".$lightningalert8;}
else if ($wuskydayWindGust4>35 ){  echo "Forecast &nbsp;Strong Winds&nbsp;", $wuskydayTime4."&nbsp;".$lightningalert8;}
?></a></div></div></div>