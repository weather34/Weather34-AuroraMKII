<?php include_once('livedata.php');
########################################################
#	CREATED FOR WEATHER34 Aurora MKII TEMPLATE  		              						                
# https://weather34.com/homeweatherstation/index.html 											                        
# 	                                                                                               
# 	Release: December 2020 Version Aurora MKII   
#   Revised: March 2021			  	                                           
########################################################
$weather["wind_direction"]= number_format($weather["wind_direction"],0);
$weather["wind_direction_avg"]= number_format($weather["wind_direction_avg"],0);
$weather["wind_direction_avgday"]= number_format($weather["wind_direction_avgday"],0);
$weather["wind_direction_avgmonth"]= number_format($weather["wind_direction_avgmonth"],0);
if ($windunitatc=='yes'){
$weather["wind_direction"]= str_pad($weather["wind_direction"],3,"0",STR_PAD_LEFT);
$weather["wind_direction_avg"]=str_pad($weather["wind_direction_avg"],3,"0",STR_PAD_LEFT);
$weather["wind_direction_avgmonth"]= str_pad($weather["wind_direction_avgmonth"],3,"0",STR_PAD_LEFT);
$weather["wind_direction_avgday"]= str_pad($weather["wind_direction_avgday"],3,"0",STR_PAD_LEFT);
}
?>

<meta http-equiv="Content-Type: text/html; charset=UTF-8" />
<head>
<style>
.thearrow2 {
        -webkit-transform: rotatez(<?php echo $weather["wind_direction"]+45; ?>deg);
        -moz-transform: rotatez(<?php echo $weather["wind_direction"]+45; ?>deg);
        -o-transform: rotatez(<?php echo $weather["wind_direction"]+45; ?>deg);
        -ms-transform: rotatez(<?php echo $weather["wind_direction"]+45; ?>deg);
        transform: rotatez(<?php echo $weather["wind_direction"]+45; ?>deg);       
    }
    
    .weather-directionicon-identity
    {
        color: 
        <?php 
        if ($weather["wind_direction"]>300){echo "#00adbd";}
        elseif ($weather["wind_direction"]>260){echo "#ec5732";}
        elseif ($weather["wind_direction"]>100){echo "#e6a241";}        
        elseif ($weather["wind_direction"]>=0){echo "#00adbd";}         
        ?>;
    }    

    .thearrow1 {
        -webkit-transform: translate(-50%, 5%) rotatez(<?php echo $weather["wind_direction_avg"]+44; ?>deg);
        -moz-transform: translate(-50%, 5%) rotatez(<?php echo $weather["wind_direction_avg"]+44; ?>deg);
        -o-transform: translate(-50%, 5%) rotatez(<?php echo $weather["wind_direction_avg"]+44; ?>deg);
        -ms-transform: translate(-50%, 5%) rotatez(<?php echo $weather["wind_direction_avg"]+44; ?>deg);
        transform: translate(-50%, 5%) rotatez(<?php echo $weather["wind_direction_avg"]+44; ?>deg);  
    }

.thearrow5 {
        -webkit-transform: translate(-50%, 5%) rotatez(<?php echo $weather['wind_direction_avgday']+44; ?>deg);
        -moz-transform: translate(-50%, 5%) rotatez(<?php echo $weather['wind_direction_avgday']+44; ?>deg);
        -o-transform: translate(-50%, 5%) rotatez(<?php echo $weather['wind_direction_avgday']+44; ?>deg);
        -ms-transform: translate(-50%, 5%) rotatez(<?php echo $weather['wind_direction_avgday']+44; ?>deg);
        transform: translate(-50%, 5%) rotatez(<?php echo $weather['wind_direction_avgday']+44; ?>deg);       
    }

.thearrow6 {
        -webkit-transform: translate(-50%, 5%) rotatez(<?php echo $weather["wind_direction_avgmonth"]+44; ?>deg);
        -moz-transform: translate(-50%, 5%) rotatez(<?php echo $weather["wind_direction_avgmonth"]+44; ?>deg);
        -o-transform: translate(-50%, 5%) rotatez(<?php echo $weather["wind_direction_avgmonth"]+44; ?>deg);
        -ms-transform: translate(-50%, 5%) rotatez(<?php echo $weather["wind_direction_avgmonth"]+44; ?>deg);
        transform: translate(-50%, 5%) rotatez(<?php echo $weather["wind_direction_avgmonth"]+44; ?>deg);        
    }

spancalm {
        position: relative;
        font-family: headingtext;
        font-size: 26px;
    }
windcolor{color:
<?php if ($weather['wind_speed_bft']>=7 ){echo 'var(--red)';}
elseif ($weather['wind_speed_bft']>=5 ){echo 'var(--orange)';}
elseif ($weather['wind_speed_bft']>=3 ){echo 'var(--yellow)';}
elseif ($weather['wind_speed_bft']>=0 ){echo 'var(--green)';}
?>}
    
    </style>

</head>
<div class="compassposition">
<div class="weather34compassring"></div>
<div class="weather34compassgrid"></div>
<div class="homeweathercompass1">

<div class="weather34north">N</div>
<div class="weather34-0deg">0&deg;</div>
<div class="weather34-45deg">45&deg;</div>
<div class="weather34-ne">NE</div>

<div class="weather34east">E</div>
<div class="weather34-90deg">90&deg;</div>
<div class="weather34-135deg">135&deg;</div>
<div class="weather34-se">SE</div>

<div class="weather34south">S</div>
<div class="weather34-180deg">180&deg;</div>
<div class="weather34-225deg">225&deg;</div>
<div class="weather34-sw">SW</div>

<div class="weather34west">W</div>
<div class="weather34-270deg">270&deg;</div>
<div class="weather34-315deg">315&deg;</div>
<div class="weather34-nw">NW</div>

<div class="homeweathercompass-line1">
<div class="thearrow6"></div>
<div class="thearrow5"></div>
<div class="thearrow1"></div>
<div class="thearrow2"></div>
<div class="weather34windbezel"> 
<div class="weather34windbezel1">
<div class="circleborder4"></div>
 </div></div></div>

<div class="text1">
<div class="windvalue1" id="windvalue"><windcolor><?php echo $weather["wind_direction"],"&deg;";?></windcolor></div></div>
<div class="windirectiontext1">
<?php if($weather["wind_direction"]<=11.25){echo "Due <windcolor>North<br></windcolor>";}else if($weather["wind_direction"]<=33.75){echo "North North <br><windcolor>East</windcolor>";}else if($weather["wind_direction"]<=56.25){echo "North <windcolor> East<br></windcolor>";}else if($weather["wind_direction"]<=78.75){echo "East North<br><windcolor>East</windcolor>";}else if($weather["wind_direction"]<=101.25){echo "Due <windcolor> East<br></windcolor>";}
else if($weather["wind_direction"]<=123.75){echo "East South<br><windcolor>East</windcolor>";}else if($weather["wind_direction"]<=146.25){echo "South <windcolor> East</windcolor>";}else if($weather["wind_direction"]<=168.75){echo "South South<br><windcolor>East</windcolor>";}else if($weather["wind_direction"]<=191.25){echo "Due <windcolor> South</windcolor>";}else if($weather["wind_direction"]<=213.75){echo "South South<br><windcolor>West</windcolor>";}else if($weather["wind_direction"]<=236.25){echo "South <windcolor> West</windcolor>";}else if($weather["wind_direction"]<=258.75){echo "West South<br><windcolor>West</windcolor>";}else if($weather["wind_direction"]<=281.25){echo "Due <windcolor> West</windcolor>";}else if($weather["wind_direction"]<=303.75){echo "West North<br><windcolor>West</windcolor>";}else if($weather["wind_direction"]<=326.25){echo "North <windcolor> West</windcolor>";}else if($weather["wind_direction"]<=348.75){echo "North North<br><windcolor>West</windcolor>";}else{echo "Due <windcolor> North</windcolor>";}?></div>
</div></div></div></div></div></div>
</div></div></div>


<div class="heatcircledir" ><div class="heatcircle-content"><valuetextheading1>Average 10"</valuetextheading1>
<?php 
echo "<br><div class=tempconverter1><div class=windirectiondata>" .$weather['wind_direction_avg']."&deg; &nbsp;<winddirectionvalueword>";
if( $weather["wind_direction_avg"]<=11.25){echo "North";}
else if( $weather["wind_direction_avg"]<=33.75){echo "NNE";}
else if( $weather["wind_direction_avg"]<=56.25){echo "NE";}
else if( $weather["wind_direction_avg"]<=78.75){echo "ENE";}
else if( $weather["wind_direction_avg"]<=101.25){echo "East";}
else if( $weather["wind_direction_avg"]<=123.75){echo "ESE";}
else if( $weather["wind_direction_avg"]<=146.25){echo "SE";}
else if( $weather["wind_direction_avg"]<=168.75){echo "SSE";}
else if( $weather["wind_direction_avg"]<=191.25){echo "South";}
else if( $weather["wind_direction_avg"]<=213.75){echo "SSW";}
else if( $weather["wind_direction_avg"]<=236.25){echo "SW";}
else if( $weather["wind_direction_avg"]<=258.75){echo "WSW";}
else if( $weather["wind_direction_avg"]<=281.25){echo "West";}
else if( $weather["wind_direction_avg"]<=303.75){echo "WNW";}
else if( $weather["wind_direction_avg"]<=326.25){echo "NW";}
else if( $weather["wind_direction_avg"]<=348.75){echo "NNW";}
else if( $weather["wind_direction_avg"]<=360){echo "North";}
?></winddirectionvalueword><bluecircle></bluecircle></div></div></div>

<div class="heatcircle-content" style="margin-top:5px;"><div class="heatcircle-content"><valuetextheading1>Average Today</valuetextheading1>
<?php 
echo "<br><div class=windirectiondata>" .$weather['wind_direction_avgday']."&deg; &nbsp;<winddirectionvalueword>";
if( $weather['wind_direction_avgday']<=11.25){echo "North";}else if( $weather['wind_direction_avgday']<=33.75){echo "NNE";}else if( $weather['wind_direction_avgday']<=56.25){echo "NE";}
else if( $weather['wind_direction_avgday']<=78.75){echo "ENE";}else if( $weather['wind_direction_avgday']<=101.25){echo "East";}else if( $weather['wind_direction_avgday']<=123.75){echo "ESE";}
else if( $weather['wind_direction_avgday']<=146.25){echo "SE";}else if( $weather['wind_direction_avgday']<=168.75){echo "SSE";}else if( $weather['wind_direction_avgday']<=191.25){echo "South";}
else if( $weather['wind_direction_avgday']<=213.75){echo "SSW";}else if( $weather['wind_direction_avgday']<=236.25){echo "SW";}else if( $weather['wind_direction_avgday']<=258.75){echo "WSW";}
else if( $weather['wind_direction_avgday']<=281.25){echo "West";}else if( $weather['wind_direction_avgday']<=303.75){echo "WNW";}else if( $weather['wind_direction_avgday']<=326.25){echo "NW";}
else if( $weather['wind_direction_avgday']<=348.75){echo "NNW";}else if( $weather['wind_direction_avgday']<=360){echo "North";}
?></winddirectionvalueword><yellowcircle></yellowcircle></div></div></div>

<div class="heatcircle-content" style="margin-top:5px;"><div class="heatcircle-content"><valuetextheading1>Average <?php echo date('F')?></valuetextheading1>
<?php 
echo "<br><div class=windirectiondata>" .$weather['wind_direction_avgmonth']."&deg; &nbsp;<winddirectionvalueword>";
if( $weather['wind_direction_avgmonth']<=11.25){echo "North";}else if( $weather['wind_direction_avgmonth']<=33.75){echo "NNE";}else if( $weather['wind_direction_avgmonth']<=56.25){echo "NE";}
else if( $weather['wind_direction_avgmonth']<=78.75){echo "ENE";}else if( $weather['wind_direction_avgmonth']<=101.25){echo "East";}else if( $weather['wind_direction_avgmonth']<=123.75){echo "ESE";}
else if( $weather['wind_direction_avgmonth']<=146.25){echo "SE";}else if( $weather['wind_direction_avgmonth']<=168.75){echo "SSE";}else if( $weather['wind_direction_avgmonth']<=191.25){echo "South";}
else if( $weather['wind_direction_avgmonth']<=213.75){echo "SSW";}else if($weather['wind_direction_avgmonth']<=236.25){echo "SW";}else if( $weather['wind_direction_avgmonth']<=258.75){echo "WSW";}
else if( $weather['wind_direction_avgmonth']<=281.25){echo "West";}else if( $weather['wind_direction_avgmonth']<=303.75){echo "WNW";}else if( $weather['wind_direction_avgmonth']<=326.25){echo "NW";}
else if( $weather['wind_direction_avgmonth']<=348.75){echo "NNW";}else if( $weather['wind_direction_avgmonth']<=360){echo "North";}
?></winddirectionvalueword> <greencircle></greencircle>
</div></div>

<div class=extrainfo4 ><a href='winddir-almanac2.php' data-lity data-title="Almanac Data"><?php echo  "Extra Data&nbsp;".$chartlinks?></a></div>

<div class="weather-directionicon-identity">
<windcolor>
<?php if( $weather['wind_direction']<=11.25){echo "North";}else if( $weather['wind_direction']<=33.75){echo "NNE";}else if( $weather['wind_direction']<=56.25){echo "NE";}
else if( $weather['wind_direction']<=78.75){echo "ENE";}else if( $weather['wind_direction']<=101.25){echo "East";}else if( $weather['wind_direction']<=123.75){echo "ESE";}
else if( $weather['wind_direction']<=146.25){echo "SE";}else if( $weather['wind_direction']<=168.75){echo "SSE";}else if( $weather['wind_direction']<=191.25){echo "South";}
else if( $weather['wind_direction']<=213.75){echo "SSW";}else if($weather['wind_direction']<=236.25){echo "SW";}else if( $weather['wind_direction']<=258.75){echo "WSW";}
else if( $weather['wind_direction']<=281.25){echo "West";}else if( $weather['wind_direction']<=303.75){echo "WNW";}else if( $weather['wind_direction']<=326.25){echo "NW";}
else if( $weather['wind_direction']<=348.75){echo "NNW";}else if( $weather['wind_direction']<=360){echo "North";}
?></windcolor>
</div></div></div></div>
<div class="modulecaptiondirection">Wind Direction</div>
