<meta http-equiv="expires" content="Sun, 01 Jan 2014 00:00:00 GMT"/>
<meta http-equiv="pragma" content="no-cache" />
<?php include_once('wudata.php');

###########################################################
#	WEATHER STATION TEMPLATE by BRIAN UNDERDOWN 2015-2020        		                           
#	CREATED FOR AURORA TEMPLATE 
#   https://weather34.com/homeweatherstation/index.html   	 
# 	FORECAST WU WEATHER FORECAST: November 2020)				                              
#   https://www.weather34.com 	                                                                   
##########################################################

$wuskydayTime3=str_replace("Mon", "Monday", $wuskydayTime3);
$wuskydayTime4=str_replace("Mon", "Monday", $wuskydayTime4);
$wuskydayTime5=str_replace("Mon", "Monday", $wuskydayTime5);
$wuskydayTime6=str_replace("Mon", "Monday", $wuskydayTime6);
$wuskydayTime7=str_replace("Mon", "Monday", $wuskydayTime7);
$wuskydayTime8=str_replace("Mon", "Monday", $wuskydayTime8);
$wuskydayTime9=str_replace("Mon", "Monday", $wuskydayTime9);
$wuskydayTime10=str_replace("Mon", "Monday", $wuskydayTime10);

$wuskydayTime3=str_replace("Tue", "Tuesday", $wuskydayTime3);
$wuskydayTime4=str_replace("Tue", "Tuesday", $wuskydayTime4);
$wuskydayTime5=str_replace("Tue", "Tuesday", $wuskydayTime5);
$wuskydayTime6=str_replace("Tue", "Tuesday", $wuskydayTime6);
$wuskydayTime7=str_replace("Tue", "Tuesday", $wuskydayTime7);
$wuskydayTime8=str_replace("Tue", "Tuesday", $wuskydayTime8);
$wuskydayTime9=str_replace("Tue", "Tuesday", $wuskydayTime9);
$wuskydayTime10=str_replace("Tue", "Tuesday", $wuskydayTime10);

$wuskydayTime3=str_replace("Wed", "Wednesday", $wuskydayTime3);
$wuskydayTime4=str_replace("Wed", "Wednesday", $wuskydayTime4);
$wuskydayTime5=str_replace("Wed", "Wednesday", $wuskydayTime5);
$wuskydayTime6=str_replace("Wed", "Wednesday", $wuskydayTime6);
$wuskydayTime7=str_replace("Wed", "Wednesday", $wuskydayTime7);
$wuskydayTime8=str_replace("Wed", "Wednesday", $wuskydayTime8);
$wuskydayTime9=str_replace("Wed", "Wednesday", $wuskydayTime9);
$wuskydayTime10=str_replace("Wed", "Wednesday", $wuskydayTime10);

$wuskydayTime3=str_replace("Thu", "Thursday", $wuskydayTime3);
$wuskydayTime4=str_replace("Thu", "Thursday", $wuskydayTime4);
$wuskydayTime5=str_replace("Thu", "Thursday", $wuskydayTime5);
$wuskydayTime6=str_replace("Thu", "Thursday", $wuskydayTime6);
$wuskydayTime7=str_replace("Thu", "Thursday", $wuskydayTime7);
$wuskydayTime8=str_replace("Thu", "Thursday", $wuskydayTime8);
$wuskydayTime9=str_replace("Thu", "Thursday", $wuskydayTime9);
$wuskydayTime10=str_replace("Thu", "Thursday", $wuskydayTime10);

$wuskydayTime3=str_replace("Fri", "Friday", $wuskydayTime3);
$wuskydayTime4=str_replace("Fri", "Friday", $wuskydayTime4);
$wuskydayTime5=str_replace("Fri", "Friday", $wuskydayTime5);
$wuskydayTime6=str_replace("Fri", "Friday", $wuskydayTime6);
$wuskydayTime7=str_replace("Fri", "Friday", $wuskydayTime7);
$wuskydayTime8=str_replace("Fri", "Friday", $wuskydayTime8);
$wuskydayTime9=str_replace("Fri", "Friday", $wuskydayTime9);
$wuskydayTime10=str_replace("Fri", "Friday", $wuskydayTime10);

$wuskydayTime3=str_replace("Sat", "Saturday", $wuskydayTime3);
$wuskydayTime4=str_replace("Sat", "Saturday", $wuskydayTime4);
$wuskydayTime5=str_replace("Sat", "Saturday", $wuskydayTime5);
$wuskydayTime6=str_replace("Sat", "Saturday", $wuskydayTime6);
$wuskydayTime7=str_replace("Sat", "Saturday", $wuskydayTime7);
$wuskydayTime8=str_replace("Sat", "Saturday", $wuskydayTime8);
$wuskydayTime9=str_replace("Sat", "Saturday", $wuskydayTime9);
$wuskydayTime10=str_replace("Sat", "Saturday", $wuskydayTime10);

$wuskydayTime3=str_replace("Sun", "Sunday", $wuskydayTime3);
$wuskydayTime4=str_replace("Sun", "Sunday", $wuskydayTime4);
$wuskydayTime5=str_replace("Sun", "Sunday", $wuskydayTime5);
$wuskydayTime6=str_replace("Sun", "Sunday", $wuskydayTime6);
$wuskydayTime7=str_replace("Sun", "Sunday", $wuskydayTime7);
$wuskydayTime8=str_replace("Sun", "Sunday", $wuskydayTime8);
$wuskydayTime9=str_replace("Sun", "Sunday", $wuskydayTime9);
$wuskydayTime10=str_replace("Sun", "Sunday", $wuskydayTime10);

$wuskydayTime1=str_replace("TM Night","Tomorrow Night",$wuskydayTime1);
$wuskydayTime2=str_replace("TM Night","Tomorrow Night",$wuskydayTime2);
$wuskydayTime3=str_replace("TM Night","Tomorrow Night",$wuskydayTime3);	
?>

<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8">
  <title>Forecast For <?php echo $stationlocation ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
  @font-face {
    font-family: clock;
    src: url(../fonts/clock3-webfont.woff) format("woff")
}

@font-face {
    font-family: weathertext3;
    src: url(../fonts/verbatim-regular.woff) format("woff")
}

@font-face {
    font-family: weathertext2;
    src: url(../fonts/verbatim-medium.woff) format("woff")
}

@font-face {
    font-family: headingtext;
    src: url(../fonts/HelveticaNeue-Medium.woff) format("woff")
}

@font-face {
    font-family: verb;
    src: url(../fonts/verbatim-bold.woff2) format("woff2"), url(../fonts/verbatim-bold.woff) format("woff")
}
body,html{font-size:12px;font-family:verb,Helvetica,Arial,sans-serif;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}
.grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(160px,4fr));grid-gap:2px;align-items:stretch;color:#f5f7fc}
.grid>article{border:1px solid rgba(245,247,252,.04);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:3px;font-size:.8em;
-webkit-border-radius:4px;border-radius:4px;background: hsla(228, 10%, 10%,1);}
.grid>article img{max-width:20%}
actualt{font-size:8px}
a{color:#777;text-transform:none;text-decoration:none;color:#f8f8f8}
.greydesc{color:#fff;margin-left:45px;margin-top:-20px;position:absolute;font-size:8px;word-wrap:break-word;line-height:.9;max-width:100px;font-family:verb}
.tempvalue{color:#fff;margin-left:130px;margin-top:-38px;position:absolute;font-size:15px;font-family:verb}
.rainvalue{color:#fff;margin-left:0px;margin-top:8px;position:absolute;font-size:8px;font-family:verb;width:max-content}

.iconpos{position:relative;padding-left:5px;}
@media screen and (max-width:800px){
.grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(140px,1fr));grid-gap:2px;align-items:stretch;color:#f5f7fc}
.grid>article{border:1px solid rgba(245,247,252,.04);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);
padding:3px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;
	background: hsla(228, 10%, 10%,.9);height:38px}
	.tempvalue{color:#fff;margin-left:100px;margin-top:-36px;position:absolute;font-size:15px;font-family:verb}	
.rainvalue{color:#fff;margin-left:-12px;margin-top:12px;position:absolute;font-size:8px;font-family:verb;width:max-content}
.greydesc{color:#fff;margin-left:40px;margin-top:-17px;position:absolute;font-size:8px;word-wrap:break-word;line-height:.9;max-width:100px;font-family:verb}
	}
img{
	filter:contrast(180%);
	-webkit-filter:contrast(180%);
	-moz-filter:contrast(140%);
	-o-filter:contrast(140%);
	-ms-filter:contrast(140%);		
}


[data-title]:hover:after {
    opacity: 1;
    transition: all .1s ease .5s;
    visibility: visible
}

[data-title]:after {	
	display:flex;
    content: attr(data-title);
    background-color: #3D464D;
    color: #fff;
    font-size: 9px;
    position: absolute;
    padding: 3px;
    padding-bottom: 3px;        
    opacity: 0;
    z-index: 99999;
    visibility: hidden;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -ms-border-radius: 3px;
    -o-border-radius: 3px;
	top:-30px;
	left:-12px;
	width:165px;
	height:max-content;	
	word-wrap:break-word;
	overflow: visible;
	font-family:headingtext,system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Ubuntu,Roboto,Cantarell,Noto Sans,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol','Noto Color Emoji';

}

[data-title] {
    position: relative;
    left: -5px;
	
	
}
</style>


<main class="grid">
  
  
<article style="background:<?php 
  	if($tempunit=='F'){
		if($wuskydayTempHigh2 <=41){echo "hsla(185, 100%, 37%, 1)";}
		else if($wuskydayTempHigh2>=95){echo "hsl(4, 40%, 48%)";}
		else if($wuskydayTempHigh2>=80.6){echo "hsl(2, 56%, 55%)";}
		else if($wuskydayTempHigh2>=75.2){echo "hsl(19, 66%, 55%)";}
		else if($wuskydayTempHigh2>=68){echo "#F88D01";}
		else if($wuskydayTempHigh2>=59){echo "hsl(35, 77%, 58%)";}			  
		else if($wuskydayTempHigh2>41){echo "hsl(74, 60%, 46%)";}}
		
		if($tempunit=='C'){
		if($wuskydayTempHigh2 <=5){echo "hsla(185, 100%, 37%, 1)";}
			else if($wuskydayTempHigh2>=35){echo "hsl(4, 40%, 48%)";}
			else if($wuskydayTempHigh2>=27){echo "hsl(2, 56%, 55%)";}
			else if($wuskydayTempHigh2>=24){echo "hsl(19, 66%, 55%)";}
			else if($wuskydayTempHigh2>=20){echo "#F88D01";}
			else if($wuskydayTempHigh2>=15){echo "hsl(35, 77%, 58%)";}			  
			else if($wuskydayTempHigh2>5){echo "hsl(74, 60%, 46%)";}}?>
	">  
   <actualt ><?php echo $wuskydayTime2 ?></actualt>

   <a href='#' data-title="<?php echo $wuskydaysummary2?>">
 <?php //0  detailed forecast  
	echo"<div class=iconpos> ";  
	echo "<a href='#' data-title='$wuskydaysummary2'>";     		  			  
	if ($wuskydaynight2=='D'){echo '<img src="../wuicons/'.$wuskydayIcon2.'.svg?ver=5" class="iconpos"></img></div>';}
	if ($wuskydaynight2=='N'){echo '<img src="../wuicons/nt_'.$wuskydayIcon2.'.svg?ver=5" class="iconpos"></img></div>';}
	echo "</a>";
	 //summary of icon
	echo '<div class=greydesc>'. $wuskydesc2.'</div>';	
	echo "<div class=tempvalue>"; echo number_format($wuskydayTempHigh2,0);echo"°";
	echo "<div class=rainvalue>"; 
	if ($wuskydayacumm2>0){echo number_format($wuskydayacumm2,1);echo " cm";}
	else if ($wuskydayprecipIntensity2>0){echo number_format($wuskydayprecipIntensity2,2);echo " ".$rainunit;}
	else if ($wuskydayUV2>0){echo " UVI ".number_format($wuskydayUV2,0);}
	else echo "<span style='margin-left:-20px'>Humidity ".$wuskyhumidity2."%</span>";
	 ?>  </div>
</article> 

<article style="background:<?php 
  if($tempunit=='F'){
	if($wuskydayTempHigh3 <=41){echo "hsla(185, 100%, 37%, 1)";}
	else if($wuskydayTempHigh3>=95){echo "hsl(4, 40%, 48%)";}
	else if($wuskydayTempHigh3>=80.6){echo "hsl(2, 56%, 55%)";}
	else if($wuskydayTempHigh3>=75.2){echo "hsl(19, 66%, 55%)";}
	else if($wuskydayTempHigh3>=68){echo "#F88D01";}
	else if($wuskydayTempHigh3>=59){echo "hsl(35, 77%, 58%)";}			  
	else if($wuskydayTempHigh3>41){echo "hsl(74, 60%, 46%)";}}
	
	if($tempunit=='C'){
	if($wuskydayTempHigh3 <=5){echo "hsla(185, 100%, 37%, 1)";}
		else if($wuskydayTempHigh3>=35){echo "hsl(4, 40%, 48%)";}
		else if($wuskydayTempHigh3>=27){echo "hsl(2, 56%, 55%)";}
		else if($wuskydayTempHigh3>=24){echo "hsl(19, 66%, 55%)";}
		else if($wuskydayTempHigh3>=20){echo "#F88D01";}
		else if($wuskydayTempHigh3>=15){echo "hsl(35, 77%, 58%)";}			  
		else if($wuskydayTempHigh3>5){echo "hsl(74, 60%, 46%)";}}?>
	">  
   <actualt ><?php echo $wuskydayTime3 ?></actualt>

   
 <?php //0  detailed forecast  
	echo"<div class=iconpos> ";  
	echo "<a href='#' data-title='$wuskydaysummary3'>";    		  			  
	if ($wuskydaynight3=='D'){echo '<img src="../wuicons/'.$wuskydayIcon3.'.svg?ver=5" class="iconpos"></img></div>';}
	if ($wuskydaynight3=='N'){echo '<img src="../wuicons/nt_'.$wuskydayIcon3.'.svg?ver=5" class="iconpos"></img></div>';}
	echo "</a>";
	 //summary of icon
	echo '<div class=greydesc>'. $wuskydesc3.'</div>';	
	
	echo "<div class=tempvalue>"; echo number_format($wuskydayTempHigh3,0);echo"°";
	echo "<div class=rainvalue>"; 
	if ($wuskydayacumm3>0){echo number_format($wuskydayacumm3,1);echo " cm";}
	else if ($wuskydayprecipIntensity3>0){echo number_format($wuskydayprecipIntensity3,2);echo " ".$rainunit;}
	else if ($wuskydayUV3>0){echo " UVI ".number_format($wuskydayUV3,0);}
	else echo "<span style='margin-left:-20px'>Humidity ".$wuskyhumidity3."%</span>";
	 ?>  </div>
</article> 
  
<article style="background:<?php 
  	if($tempunit=='F'){
		if($wuskydayTempHigh4 <=41){echo "hsla(185, 100%, 37%, 1)";}
		else if($wuskydayTempHigh4>=95){echo "hsl(4, 40%, 48%)";}
		else if($wuskydayTempHigh4>=80.6){echo "hsl(2, 56%, 55%)";}
		else if($wuskydayTempHigh4>=75.2){echo "hsl(19, 66%, 55%)";}
		else if($wuskydayTempHigh4>=68){echo "#F88D01";}
		else if($wuskydayTempHigh4>=59){echo "hsl(35, 77%, 58%)";}			  
		else if($wuskydayTempHigh4>41){echo "hsl(74, 60%, 46%)";}}
		
		if($tempunit=='C'){
		if($wuskydayTempHigh4 <=5){echo "hsla(185, 100%, 37%, 1)";}
			else if($wuskydayTempHigh4>=35){echo "hsl(4, 40%, 48%)";}
			else if($wuskydayTempHigh4>=27){echo "hsl(2, 56%, 55%)";}
			else if($wuskydayTempHigh4>=24){echo "hsl(19, 66%, 55%)";}
			else if($wuskydayTempHigh4>=20){echo "#F88D01";}
			else if($wuskydayTempHigh4>=15){echo "hsl(35, 77%, 58%)";}			  
			else if($wuskydayTempHigh4>5){echo "hsl(74, 60%, 46%)";}}?>
	">  
   <actualt ><?php echo $wuskydayTime4 ?></actualt>
 <?php //0  detailed forecast  
	echo"<div class=iconpos> ";  
	echo "<a href='#' data-title='$wuskydaysummary4'>";        		  			  
	if ($wuskydaynight4=='D'){echo '<img src="../wuicons/'.$wuskydayIcon4.'.svg?ver=5" class="iconpos"></img></div>';}
	if ($wuskydaynight4=='N'){echo '<img src="../wuicons/nt_'.$wuskydayIcon4.'.svg?ver=5" class="iconpos"></img></div>';}
	echo "</a>";
	 //summary of icon
	echo '<div class=greydesc>'. $wuskydesc4.'</div>';	
	echo "<div class=tempvalue>"; echo number_format($wuskydayTempHigh4,0);echo"°";
	echo "<div class=rainvalue>"; 
	if ($wuskydayacumm4>0){echo number_format($wuskydayacumm4,1);echo " cm";}
	else if ($wuskydayprecipIntensity4>0){echo number_format($wuskydayprecipIntensity4,2);echo " ".$rainunit;}
	else if ($wuskydayUV4>0){echo " UVI ".number_format($wuskydayUV4,0);}
	else echo "<span style='margin-left:-20px'>Humidity ".$wuskyhumidity4."%</span>";
	 ?>  </div>
</article> 
<article style="background:<?php 
  	if($tempunit=='F'){
		if($wuskydayTempHigh5 <=41){echo "hsla(185, 100%, 37%, 1)";}
		else if($wuskydayTempHigh5>=95){echo "hsl(4, 40%, 48%)";}
		else if($wuskydayTempHigh5>=80.6){echo "hsl(2, 56%, 55%)";}
		else if($wuskydayTempHigh5>=75.2){echo "hsl(19, 66%, 55%)";}
		else if($wuskydayTempHigh5>=68){echo "#F88D01";}
		else if($wuskydayTempHigh5>=59){echo "hsl(35, 77%, 58%)";}			  
		else if($wuskydayTempHigh5>41){echo "hsl(74, 60%, 46%)";}}
		
		if($tempunit=='C'){
		if($wuskydayTempHigh5 <=5){echo "hsla(185, 100%, 37%, 1)";}
			else if($wuskydayTempHigh5>=35){echo "hsl(4, 40%, 48%)";}
			else if($wuskydayTempHigh5>=27){echo "hsl(2, 56%, 55%)";}
			else if($wuskydayTempHigh5>=24){echo "hsl(19, 66%, 55%)";}
			else if($wuskydayTempHigh5>=20){echo "#F88D01";}
			else if($wuskydayTempHigh5>=15){echo "hsl(35, 77%, 58%)";}			  
			else if($wuskydayTempHigh5>5){echo "hsl(74, 60%, 46%)";}}?>
	">  
   <actualt ><?php echo $wuskydayTime5 ?></actualt>
 <?php //0  detailed forecast  
	echo"<div class=iconpos> ";   
	echo "<a href='#' data-title='$wuskydaysummary5'>";       		  			  
	if ($wuskydaynight5=='D'){echo '<img src="../wuicons/'.$wuskydayIcon5.'.svg?ver=5" class="iconpos"></img></div>';}
	if ($wuskydaynight5=='N'){echo '<img src="../wuicons/nt_'.$wuskydayIcon5.'.svg?ver=5" class="iconpos"></img></div>';}
	echo "</a>";
	 //summary of icon
	echo '<div class=greydesc>'. $wuskydesc5.'</div>';	
	echo "<div class=tempvalue>"; echo number_format($wuskydayTempHigh5,0);echo"°";
	echo "<div class=rainvalue>"; 
	if ($wuskydayacumm5>0){echo number_format($wuskydayacumm5,1);echo " cm";}
	else if ($wuskydayprecipIntensity5>0){echo number_format($wuskydayprecipIntensity5,2);echo " ".$rainunit;}
	else if ($wuskydayUV5>0){echo " UVI ".number_format($wuskydayUV5,0);}
	else echo "<span style='margin-left:-20px'>Humidity ".$wuskyhumidity5."%</span>";
	 ?>  </div>
</article> 
<article style="background:<?php 
  	if($tempunit=='F'){
		if($wuskydayTempHigh6 <=41){echo "hsla(185, 100%, 37%, 1)";}
		else if($wuskydayTempHigh6>=95){echo "hsl(4, 40%, 48%)";}
		else if($wuskydayTempHigh6>=80.6){echo "hsl(2, 56%, 55%)";}
		else if($wuskydayTempHigh6>=75.2){echo "hsl(19, 66%, 55%)";}
		else if($wuskydayTempHigh6>=68){echo "#F88D01";}
		else if($wuskydayTempHigh6>=59){echo "hsl(35, 77%, 58%)";}			  
		else if($wuskydayTempHigh6>41){echo "hsl(74, 60%, 46%)";}}
		
		if($tempunit=='C'){
		if($wuskydayTempHigh6 <=5){echo "hsla(185, 100%, 37%, 1)";}
			else if($wuskydayTempHigh6>=35){echo "hsl(4, 40%, 48%)";}
			else if($wuskydayTempHigh6>=27){echo "hsl(2, 56%, 55%)";}
			else if($wuskydayTempHigh6>=24){echo "hsl(19, 66%, 55%)";}
			else if($wuskydayTempHigh6>=20){echo "#F88D01";}
			else if($wuskydayTempHigh6>=15){echo "hsl(35, 77%, 58%)";}			  
			else if($wuskydayTempHigh6>5){echo "hsl(74, 60%, 46%)";}}?>
	">  
   <actualt ><?php echo $wuskydayTime6 ?></actualt>
 <?php //0  detailed forecast  
	echo"<div class=iconpos> ";    
	echo "<a href='#' data-title='$wuskydaysummary6'>";      		  			  
	if ($wuskydaynight6=='D'){echo '<img src="../wuicons/'.$wuskydayIcon6.'.svg?ver=5" class="iconpos"></img></div>';}
	if ($wuskydaynight6=='N'){echo '<img src="../wuicons/nt_'.$wuskydayIcon6.'.svg?ver=5" class="iconpos"></img></div>';}
	echo "</a>";
	 //summary of icon
	echo '<div class=greydesc>'. $wuskydesc6.'</div>';	
	echo "<div class=tempvalue>"; echo number_format($wuskydayTempHigh6,0);echo"°";
	echo "<div class=rainvalue>"; 
	if ($wuskydayacumm6>0){echo number_format($wuskydayacumm6,1);echo " cm";}
	else if ($wuskydayprecipIntensity6>0){echo number_format($wuskydayprecipIntensity6,2);echo " ".$rainunit;}
	else if ($wuskydayUV6>0){echo " UVI ".number_format($wuskydayUV6,0);}
	else echo "<span style='margin-left:-20px'>Humidity ".$wuskyhumidity6."%</span>";
	 ?>  </div>
</article> 


<article style="background:<?php 
  	if($tempunit=='F'){
		if($wuskydayTempHigh7 <=41){echo "hsla(185, 100%, 37%, 1)";}
		else if($wuskydayTempHigh7>=95){echo "hsl(4, 40%, 48%)";}
		else if($wuskydayTempHigh7>=80.6){echo "hsl(2, 56%, 55%)";}
		else if($wuskydayTempHigh7>=75.2){echo "hsl(19, 66%, 55%)";}
		else if($wuskydayTempHigh7>=68){echo "#F88D01";}
		else if($wuskydayTempHigh7>=59){echo "hsl(35, 77%, 58%)";}			  
		else if($wuskydayTempHigh7>41){echo "hsl(74, 60%, 46%)";}}
		
		if($tempunit=='C'){
		if($wuskydayTempHigh7 <=5){echo "hsla(185, 100%, 37%, 1)";}
			else if($wuskydayTempHigh7>=35){echo "hsl(4, 40%, 48%)";}
			else if($wuskydayTempHigh7>=27){echo "hsl(2, 56%, 55%)";}
			else if($wuskydayTempHigh7>=24){echo "hsl(19, 66%, 55%)";}
			else if($wuskydayTempHigh7>=20){echo "#F88D01";}
			else if($wuskydayTempHigh7>=15){echo "hsl(35, 77%, 58%)";}			  
			else if($wuskydayTempHigh7>5){echo "hsl(74, 60%, 46%)";}}?>
	">  
   <actualt ><?php echo $wuskydayTime7 ?></actualt>
 <?php //0  detailed forecast  
	echo"<div class=iconpos> ";   
	echo "<a href='#' data-title='$wuskydaysummary7'>";       		  			  
	if ($wuskydaynight7=='D'){echo '<img src="../wuicons/'.$wuskydayIcon7.'.svg?ver=5" class="iconpos"></img></div>';}
	if ($wuskydaynight7=='N'){echo '<img src="../wuicons/nt_'.$wuskydayIcon7.'.svg?ver=5" class="iconpos"></img></div>';}
	echo "</a>";
	 //summary of icon
	echo '<div class=greydesc>'. $wuskydesc7.'</div>';	
	echo "<div class=tempvalue>"; echo number_format($wuskydayTempHigh7,0);echo"°";
	echo "<div class=rainvalue>"; 
	if ($wuskydayacumm7>0){echo number_format($wuskydayacumm7,1);echo " cm";}
	else if ($wuskydayprecipIntensity7>0){echo number_format($wuskydayprecipIntensity7,2);echo " ".$rainunit;}
	else if ($wuskydayUV7>0){echo " UVI ".number_format($wuskydayUV7,0);}
	else echo "<span style='margin-left:-20px'>Humidity ".$wuskyhumidity7."%</span>";
	 ?>  </div>
</article> 
  
  
  
<article style="background:<?php 
  	if($tempunit=='F'){
		if($wuskydayTempHigh8 <=41){echo "hsla(185, 100%, 37%, 1)";}
		else if($wuskydayTempHigh8>=95){echo "hsl(4, 40%, 48%)";}
		else if($wuskydayTempHigh8>=80.6){echo "hsl(2, 56%, 55%)";}
		else if($wuskydayTempHigh8>=75.2){echo "hsl(19, 66%, 55%)";}
		else if($wuskydayTempHigh8>=68){echo "#F88D01";}
		else if($wuskydayTempHigh8>=59){echo "hsl(35, 77%, 58%)";}			  
		else if($wuskydayTempHigh8>41){echo "hsl(74, 60%, 46%)";}}
		
		if($tempunit=='C'){
		if($wuskydayTempHigh8 <=5){echo "hsla(185, 100%, 37%, 1)";}
			else if($wuskydayTempHigh8>=35){echo "hsl(4, 40%, 48%)";}
			else if($wuskydayTempHigh8>=27){echo "hsl(2, 56%, 55%)";}
			else if($wuskydayTempHigh8>=24){echo "hsl(19, 66%, 55%)";}
			else if($wuskydayTempHigh8>=20){echo "#F88D01";}
			else if($wuskydayTempHigh8>=15){echo "hsl(35, 77%, 58%)";}			  
			else if($wuskydayTempHigh8>5){echo "hsl(74, 60%, 46%)";}}?>
	">  
   <actualt ><?php echo $wuskydayTime8 ?></actualt>
 <?php //0  detailed forecast  
	echo"<div class=iconpos> ";  
	echo "<a href='#' data-title='$wuskydaysummary8'>";        		  			  
	if ($wuskydaynight8=='D'){echo '<img src="../wuicons/'.$wuskydayIcon8.'.svg?ver=5" class="iconpos"></img></div>';}
	if ($wuskydaynight8=='N'){echo '<img src="../wuicons/nt_'.$wuskydayIcon8.'.svg?ver=5" class="iconpos"></img></div>';}
	echo "</a>";
	 //summary of icon
	echo '<div class=greydesc>'. $wuskydesc8.'</div>';	
	echo "<div class=tempvalue>"; echo number_format($wuskydayTempHigh8,0);echo"°";
	echo "<div class=rainvalue>"; 
	if ($wuskydayacumm8>0){echo number_format($wuskydayacumm8,1);echo " cm";}
	else if ($wuskydayprecipIntensity8>0){echo number_format($wuskydayprecipIntensity8,2);echo " ".$rainunit;}
	else if ($wuskydayUV8>0){echo " UVI ".number_format($wuskydayUV8,0);}
	else echo "<span style='margin-left:-20px'>Humidity ".$wuskyhumidity8."%</span>";
	 ?>  </div>
</article> 
  
  
<article style="background:<?php 
  	if($tempunit=='F'){
		if($wuskydayTempHigh9 <=41){echo "hsla(185, 100%, 37%, 1)";}
		else if($wuskydayTempHigh9>=95){echo "hsl(4, 40%, 48%)";}
		else if($wuskydayTempHigh9>=80.6){echo "hsl(2, 56%, 55%)";}
		else if($wuskydayTempHigh9>=75.2){echo "hsl(19, 66%, 55%)";}
		else if($wuskydayTempHigh9>=68){echo "#F88D01";}
		else if($wuskydayTempHigh9>=59){echo "hsl(35, 77%, 58%)";}			  
		else if($wuskydayTempHigh9>41){echo "hsl(74, 60%, 46%)";}}
		
		if($tempunit=='C'){
		if($wuskydayTempHigh9 <=5){echo "hsla(185, 100%, 37%, 1)";}
			else if($wuskydayTempHigh9>=35){echo "hsl(4, 40%, 48%)";}
			else if($wuskydayTempHigh9>=27){echo "hsl(2, 56%, 55%)";}
			else if($wuskydayTempHigh9>=24){echo "hsl(19, 66%, 55%)";}
			else if($wuskydayTempHigh9>=20){echo "#F88D01";}
			else if($wuskydayTempHigh9>=15){echo "hsl(35, 77%, 58%)";}			  
			else if($wuskydayTempHigh9>5){echo "hsl(74, 60%, 46%)";}}?>
	">  
   <actualt ><?php echo $wuskydayTime9 ?></actualt>
 <?php //0  detailed forecast  
	echo"<div class=iconpos> ";  
	echo "<a href='#' data-title='$wuskydaysummary9'>";        		  			  
	if ($wuskydaynight9=='D'){echo '<img src="../wuicons/'.$wuskydayIcon9.'.svg?ver=5" class="iconpos"></img></div>';}
	if ($wuskydaynight9=='N'){echo '<img src="../wuicons/nt_'.$wuskydayIcon9.'.svg?ver=5" class="iconpos"></img></div>';}
	echo "</a>";
	 //summary of icon
	echo '<div class=greydesc>'. $wuskydesc9.'</div>';	
	echo "<div class=tempvalue>"; echo number_format($wuskydayTempHigh9,0);echo"°";
	echo "<div class=rainvalue>"; 
	if ($wuskydayacumm9>0){echo number_format($wuskydayacumm9,1);echo " cm";}
	else if ($wuskydayprecipIntensity9>0){echo number_format($wuskydayprecipIntensity9,2);echo " ".$rainunit;}
	else if ($wuskydayUV9>0){echo " UVI ".number_format($wuskydayUV9,0);}
	else echo "<span style='margin-left:-20px'>Humidity ".$wuskyhumidity9."%</span>";
	 ?>  </div>
</article> 
<article style="background:<?php 
  	if($tempunit=='F'){
		if($wuskydayTempHigh10 <=41){echo "hsla(185, 100%, 37%, 1)";}
		else if($wuskydayTempHigh10>=95){echo "hsl(4, 40%, 48%)";}
		else if($wuskydayTempHigh10>=80.6){echo "hsl(2, 56%, 55%)";}
		else if($wuskydayTempHigh10>=75.2){echo "hsl(19, 66%, 55%)";}
		else if($wuskydayTempHigh10>=68){echo "#F88D01";}
		else if($wuskydayTempHigh10>=59){echo "hsl(35, 77%, 58%)";}			  
		else if($wuskydayTempHigh10>41){echo "hsl(74, 60%, 46%)";}}
		
		if($tempunit=='C'){
		if($wuskydayTempHigh10 <=5){echo "hsla(185, 100%, 37%, 1)";}
			else if($wuskydayTempHigh10>=35){echo "hsl(4, 40%, 48%)";}
			else if($wuskydayTempHigh10>=27){echo "hsl(2, 56%, 55%)";}
			else if($wuskydayTempHigh10>=24){echo "hsl(19, 66%, 55%)";}
			else if($wuskydayTempHigh10>=20){echo "#F88D01";}
			else if($wuskydayTempHigh10>=15){echo "hsl(35, 77%, 58%)";}			  
			else if($wuskydayTempHigh10>5){echo "hsl(74, 60%, 46%)";}}?>
	">  
   <actualt ><?php echo $wuskydayTime10 ?></actualt>
 <?php //0  detailed forecast  
	echo"<div class=iconpos> ";     
	echo "<a href='#' data-title='$wuskydaysummary10'>";     		  			  
	if ($wuskydaynight10=='D'){echo '<img src="../wuicons/'.$wuskydayIcon10.'.svg?ver=5" class="iconpos"></img></div>';}
	if ($wuskydaynight10=='N'){echo '<img src="../wuicons/nt_'.$wuskydayIcon10.'.svg?ver=5" class="iconpos"></img></div>';}
	echo "</a>";
	//summary of icon
	echo '<div class=greydesc>'. $wuskydesc10.'</div>';	
	echo "<div class=tempvalue>"; echo number_format($wuskydayTempHigh10,0);echo"°";
	echo "<div class=rainvalue>"; 
	if ($wuskydayacumm10>0){echo number_format($wuskydayacumm10,1);echo " cm";}
	else if ($wuskydayprecipIntensity10>0){echo number_format($wuskydayprecipIntensity10,2);echo " ".$rainunit;}
	else if ($wuskydayUV10>0){echo " UVI ".number_format($wuskydayUV10,0);}
	else echo "<span style='margin-left:-20px'>Humidity ".$wuskyhumidity10."%</span>";
	 ?>  </div>
</article> 

  <article style="background:rgba(76, 123, 160, 1);">
  <span style="font-size:8px;display:inline-block">
  <?php echo $info?> CSS/SVG/PHP <a href="https://weather34.com/homeweatherstation/" title="weather34.com" target="_blank" >weather34.com</a></span> 
  <span style="font-size:8px;display:inline-block">
  <?php echo $info?> Forecast <a href="https://www.wunderground.com/weather/api/" title="Weather Underground API" target="_blank">Weather Underground</a></span>
  <span style="font-size:8px;display:inline-block">
  <?php echo $info?> Compiled with<a href="https://canvasjs.com" title="https://canvasjs.com" target="_blank"> CanvasJs</a></span>

    </article>  
</main>