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
    src: url(../fonts/clock3-webfont.woff2) format("woff2")
}

@font-face {
    font-family: weathertext3;
    src: url(../fonts/verbatim-regular.woff2) format("woff2")
}

@font-face {
    font-family: weathertext2;
    src: url(../fonts/verbatim-medium.woff2) format("woff2")
}

@font-face {
    font-family: headingtext;
    src: url(../fonts/HelveticaNeue-Medium.woff2) format("woff2")
}
body,html{font-size:12px;font-family:weathertext2,Helvetica,Arial,sans-serif;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}
.grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(145px,1fr));grid-gap:2px;align-items:stretch;color:#f5f7fc}
.grid>article{border:1px solid rgba(245,247,252,.04);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:5px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background: hsla(228, 10%, 10%,.9);}
.grid>article img{max-width:23%}
actualt{font-size:9px}
a{color:#777;text-transform:none;text-decoration:none;color:hsla(185,100%,37%,1)}
.greydesc{color:#c5c5c5;margin-left:35px;margin-top:-22px;position:absolute;font-size:8px;word-wrap:break-word;line-height:.9;max-width:100px}
.tempvalue{color:#c5c5c5;margin-left:110px;margin-top:-42px;position:absolute;font-size:15px}
bluet{color:#01a4b5}
yellowt{color:#e6a141}
oranget{color:#d05f2d}
greent{color:#90b12a}
redt{color:#cd5245}
deepredt{color:hsl(0, 38%, 32%)}
purplet{color:rgba(151,88,190,.8)}
@media screen and (max-width:960px){
.grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(70px,4r));grid-gap:2px;align-items:stretch;color:#f5f7fc}
.grid>article{border:1px solid rgba(245,247,252,.04);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);
padding:3px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;
	background: hsla(228, 10%, 10%,.9);height:38px}
}
</style>

<main class="grid">
  <article>  
   <actualt><?php echo $wuskydayTime ?></actualt>
 <?php //0  detailed forecast  
	echo"<div class=iconpos> ";      		  			  
	if ($wuskydaynight=='D'){echo '<img src="../wuicons/'.$wuskydayIcon.'.svg" class="iconpos"></img></div>';}
	if ($wuskydaynight=='N'){echo '<img src="../wuicons/nt_'.$wuskydayIcon.'.svg" class="iconpos"></img></div>';}
	 //summary of icon
	echo '<div class=greydesc>'. $wuskydesc.'</div>';	
	echo "<div class=tempvalue>"; 				  
	if($tempunit=='F' && $wuskydayTempHigh<=41){echo "<bluet>".number_format($wuskydayTempHigh,0);}
	else if($tempunit=='F' && $wuskydayTempHigh>=95){echo "<deepredt>".number_format($wuskydayTempHigh,0);}	 
	else if($tempunit=='F' && $wuskydayTempHigh>80){echo "<redt>".number_format($wuskydayTempHigh,0);}
	else if($tempunit=='F' && $wuskydayTempHigh>66){echo "<oranget>".number_format($wuskydayTempHigh,0);}
	else if($tempunit=='F' && $wuskydayTempHigh>53){echo "<yellowt>".number_format($wuskydayTempHigh,0);}
	else if($tempunit=='F' && $wuskydayTempHigh>41){echo "<greent>".number_format($wuskydayTempHigh,0);}
	else if($wuskydayTempHigh <=5){echo "<bluet>".number_format($wuskydayTempHigh,0);}
	else if($wuskydayTempHigh>=35){echo "<deepredt>".number_format($wuskydayTempHigh,0);}
	else if($wuskydayTempHigh>=27){echo "<redt>".number_format($wuskydayTempHigh,0);}
	else if($wuskydayTempHigh>=19){echo "<oranget>".number_format($wuskydayTempHigh,0);}
	else if($wuskydayTempHigh>=12){echo "<yellowt>".number_format($wuskydayTempHigh,0);}			  
	else if($wuskydayTempHigh>5){echo "<greent>".number_format($wuskydayTempHigh,0);}
	echo"°";
	 ?>  </div>
</article>  
 <article>  
  <actualt><?php echo $wuskydayTime1 ?></actualt>    

 <?php  //1  detailed forecast  
	//icon        
	echo"<div class=iconpos> ";      		  			  
	if ($wuskydaynight1=='D'){echo '<img src="../wuicons/'.$wuskydayIcon1.'.svg" class="iconpos"></img></div>';}
	if ($wuskydaynight1=='N'){echo '<img src="../wuicons/nt_'.$wuskydayIcon1.'.svg" class="iconpos"></img></div>';}
	 //summary of icon
	 echo '<div class=greydesc>'. $wuskydesc1.'</div>';	
	 echo "<div class=tempvalue>"; 				  
	if($tempunit=='F' && $wuskydayTempHigh1<=41){echo "<bluet>".number_format($wuskydayTempHigh1,0);}
	else if($tempunit=='F' && $wuskydayTempHigh1>=95){echo "<deepredt>".number_format($wuskydayTempHigh1,0);}	 
	else if($tempunit=='F' && $wuskydayTempHigh1>80){echo "<redt>".number_format($wuskydayTempHigh1,0);}
	else if($tempunit=='F' && $wuskydayTempHigh1>66){echo "<oranget>".number_format($wuskydayTempHigh1,0);}
	else if($tempunit=='F' && $wuskydayTempHigh1>53){echo "<yellowt>".number_format($wuskydayTempHigh1,0);}
	else if($tempunit=='F' && $wuskydayTempHigh1>41){echo "<greent>".number_format($wuskydayTempHigh1,0);}
	else if($wuskydayTempHigh1<=5){echo "<bluet>".number_format($wuskydayTempHigh1,0);}
	else if($wuskydayTempHigh1>=35){echo "<deepredt>".number_format($wuskydayTempHigh1,0);}
	else if($wuskydayTempHigh1>=27){echo "<redt>".number_format($wuskydayTempHigh1,0);}
	else if($wuskydayTempHigh1>=19){echo "<oranget>".number_format($wuskydayTempHigh1,0);}
	else if($wuskydayTempHigh1>=12){echo "<yellowt>".number_format($wuskydayTempHigh1,0);}			  
	else if($wuskydayTempHigh1>5){echo "<greent>".number_format($wuskydayTempHigh1,0);}
	echo"°";
	?>  </div>
</article>  
  
   <article>  
    <actualt><?php echo $wuskydayTime2 ?></actualt>   
    

 <?php   //2 detailed forecast 
 	//icon        
	echo"<div class=iconpos> ";      		  			  
	if ($wuskydaynight2=='D'){echo '<img src="../wuicons/'.$wuskydayIcon2.'.svg" class="iconpos"></img></div>';}
	if ($wuskydaynight2=='N'){echo '<img src="../wuicons/nt_'.$wuskydayIcon2.'.svg" class="iconpos"></img></div>';}
	 //summary of icon
	 echo '<div class=greydesc>'. $wuskydesc2.'</div>';	
	 echo "<div class=tempvalue>"; 				  
	 if($tempunit=='F' && $wuskydayTempHigh2<=41){echo "<bluet>".number_format($wuskydayTempHigh2,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh2>=95){echo "<deepredt>".number_format($wuskydayTempHigh2,0);}	 
	 else if($tempunit=='F' && $wuskydayTempHigh2>80){echo "<redt>".number_format($wuskydayTempHigh2,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh2>66){echo "<oranget>".number_format($wuskydayTempHigh2,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh2>53){echo "<yellowt>".number_format($wuskydayTempHigh2,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh2>41){echo "<greent>".number_format($wuskydayTempHigh2,0);}
	 else if($wuskydayTempHigh2<=5){echo "<bluet>".number_format($wuskydayTempHigh2,0);}
	 else if($wuskydayTempHigh2>=35){echo "<deepredt>".number_format($wuskydayTempHigh2,0);}
	 else if($wuskydayTempHigh2>=27){echo "<redt>".number_format($wuskydayTempHigh2,0);}
	 else if($wuskydayTempHigh2>=19){echo "<oranget>".number_format($wuskydayTempHigh2,0);}
	 else if($wuskydayTempHigh2>=12){echo "<yellowt>".number_format($wuskydayTempHigh2,0);}			  
	 else if($wuskydayTempHigh2>5){echo "<greent>".number_format($wuskydayTempHigh2,0);}
	 echo"°";
	 ?>  </div>  		  
				  
</article> 
 <article>  
 <actualt><?php echo $wuskydayTime3 ?></actualt>     
    

 <?php   //3  short forecast 
 
	//icon        
	echo"<div class=iconpos> ";      		  			  
	if ($wuskydaynight3=='D'){echo '<img src="../wuicons/'.$wuskydayIcon3.'.svg" class="iconpos"></img></div>';}
	if ($wuskydaynight3=='N'){echo '<img src="../wuicons/nt_'.$wuskydayIcon3.'.svg" class="iconpos"></img></div>';}
	 //summary of icon
	 echo '<div class=greydesc>'. $wuskydesc3.'</div>';	
	 echo "<div class=tempvalue>"; 				  
	 if($tempunit=='F' && $wuskydayTempHigh3<=41){echo "<bluet>".number_format($wuskydayTempHigh3,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh3>=95){echo "<deepredt>".number_format($wuskydayTempHigh3,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh3>80){echo "<redt>".number_format($wuskydayTempHigh3,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh3>66){echo "<oranget>".number_format($wuskydayTempHigh3,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh3>53){echo "<yellowt>".number_format($wuskydayTempHigh3,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh3>41){echo "<greent>".number_format($wuskydayTempHigh3,0);}
	 else if($wuskydayTempHigh3<=5){echo "<bluet>".number_format($wuskydayTempHigh3,0);}
	 else if($wuskydayTempHigh3>=35){echo "<deepredt>".number_format($wuskydayTempHigh3,0);}
	 else if($wuskydayTempHigh3>=27){echo "<redt>".number_format($wuskydayTempHigh3,0);}
	 else if($wuskydayTempHigh3>=19){echo "<oranget>".number_format($wuskydayTempHigh3,0);}
	 else if($wuskydayTempHigh3>=12){echo "<yellowt>".number_format($wuskydayTempHigh3,0);}			  
	 else if($wuskydayTempHigh3>5){echo "<greent>".number_format($wuskydayTempHigh3,0);}
	 echo"°";
	 ?>  </div>  	  
</article>  
  
 <article>  
     <actualt><?php echo $wuskydayTime4 ?></actualt>    
    
     <?php   //4  short forecast	 
	//icon        
	echo"<div class=iconpos> ";      		  			  
	if ($wuskydaynight4=='D'){echo '<img src="../wuicons/'.$wuskydayIcon4.'.svg" class="iconpos"></img></div>';}
	if ($wuskydaynight4=='N'){echo '<img src="../wuicons/nt_'.$wuskydayIcon4.'.svg" class="iconpos"></img></div>';}
	 //summary of icon
	 echo '<div class=greydesc>'. $wuskydesc4.'</div>';	
	 echo "<div class=tempvalue>"; 				  
	 if($tempunit=='F' && $wuskydayTempHigh4<=41){echo "<bluet>".number_format($wuskydayTempHigh4,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh4>=95){echo "<deepredt>".number_format($wuskydayTempHigh4,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh4>80){echo "<redt>".number_format($wuskydayTempHigh4,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh4>66){echo "<oranget>".number_format($wuskydayTempHigh4,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh4>53){echo "<yellowt>".number_format($wuskydayTempHigh4,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh4>41){echo "<greent>".number_format($wuskydayTempHigh4,0);}
	 else if($wuskydayTempHigh4<=5){echo "<bluet>".number_format($wuskydayTempHigh4,0);}
	 else if($wuskydayTempHigh4>=35){echo "<deepredt>".number_format($wuskydayTempHigh4,0);}
	 else if($wuskydayTempHigh4>=27){echo "<redt>".number_format($wuskydayTempHigh4,0);}
	 else if($wuskydayTempHigh4>=19){echo "<oranget>".number_format($wuskydayTempHigh4,0);}
	 else if($wuskydayTempHigh4>=12){echo "<yellowt>".number_format($wuskydayTempHigh4,0);}			  
	 else if($wuskydayTempHigh4>5){echo "<greent>".number_format($wuskydayTempHigh4,0);}
	 echo"°";
	 ?>  </div>  	  
</article> 
<article>  
     <actualt><?php echo $wuskydayTime5 ?></actualt>       
     <?php   //5 short forecast
	 
	//icon        
	echo"<div class=iconpos> ";      		  			  
	if ($wuskydaynight5=='D'){echo '<img src="../wuicons/'.$wuskydayIcon5.'.svg" class="iconpos"></img></div>';}
	if ($wuskydaynight5=='N'){echo '<img src="../wuicons/nt_'.$wuskydayIcon5.'.svg" class="iconpos"></img></div>';}
	 //summary of icon
	 echo '<div class=greydesc>'. $wuskydesc5.'</div>';	
	 echo "<div class=tempvalue>"; 				  
	 if($tempunit=='F' && $wuskydayTempHigh5<=41){echo "<bluet>".number_format($wuskydayTempHigh5,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh5>=95){echo "<deepredt>".number_format($wuskydayTempHigh5,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh5>80){echo "<redt>".number_format($wuskydayTempHigh5,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh5>66){echo "<oranget>".number_format($wuskydayTempHigh5,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh5>53){echo "<yellowt>".number_format($wuskydayTempHigh5,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh5>41){echo "<greent>".number_format($wuskydayTempHigh5,0);}
	 else if($wuskydayTempHigh5<=5){echo "<bluet>".number_format($wuskydayTempHigh5,0);}
	 else if($wuskydayTempHigh5>=35){echo "<deepredt>".number_format($wuskydayTempHigh5,0);}
	 else if($wuskydayTempHigh5>=27){echo "<redt>".number_format($wuskydayTempHigh5,0);}
	 else if($wuskydayTempHigh5>=19){echo "<oranget>".number_format($wuskydayTempHigh5,0);}
	 else if($wuskydayTempHigh5>=12){echo "<yellowt>".number_format($wuskydayTempHigh5,0);}			  
	 else if($wuskydayTempHigh5>5){echo "<greent>".number_format($wuskydayTempHigh5,0);}
	 echo"°";
	 ?>  </div>  	  
</article> 
  <article>
     <actualt><?php echo $wuskydayTime6 ?></actualt>   
     <?php   //6 short forecast 	 
	   
echo"<div class=iconpos> ";      		  			  
if ($wuskydaynight6=='D'){echo '<img src="../wuicons/'.$wuskydayIcon6.'.svg" class="iconpos"></img></div>';}
if ($wuskydaynight6=='N'){echo '<img src="../wuicons/nt_'.$wuskydayIcon6.'.svg" class="iconpos"></img></div>';}
	 //summary icon
	 echo '<div class=greydesc>'. $wuskydesc6.'</div>';	
	 echo "<div class=tempvalue>"; 				  
	 if($tempunit=='F' && $wuskydayTempHigh6<=41){echo "<bluet>".number_format($wuskydayTempHigh6,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh6>=95){echo "<deepredt>".number_format($wuskydayTempHigh6,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh6>80){echo "<redt>".number_format($wuskydayTempHigh6,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh6>66){echo "<oranget>".number_format($wuskydayTempHigh6,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh6>53){echo "<yellowt>".number_format($wuskydayTempHigh6,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh6>41){echo "<greent>".number_format($wuskydayTempHigh6,0);}
	 else if($wuskydayTempHigh6<=5){echo "<bluet>".number_format($wuskydayTempHigh6,0);}
	 else if($wuskydayTempHigh6>=35){echo "<deepredt>".number_format($wuskydayTempHigh6,0);}
	 else if($wuskydayTempHigh6>=27){echo "<redt>".number_format($wuskydayTempHigh6,0);}
	 else if($wuskydayTempHigh6>=19){echo "<oranget>".number_format($wuskydayTempHigh6,0);}
	 else if($wuskydayTempHigh6>=12){echo "<yellowt>".number_format($wuskydayTempHigh6,0);}			  
	 else if($wuskydayTempHigh6>5){echo "<greent>".number_format($wuskydayTempHigh6,0);}
	 echo"°";
	 ?>  </div>  	  
  </article> 
  <article>
    <actualt><?php echo $wuskydayTime7 ?></actualt>         
     <?php   //7  short forecast  	 
	 
echo"<div class=iconpos> ";      		  			  
if ($wuskydaynight7=='D'){echo '<img src="../wuicons/'.$wuskydayIcon7.'.svg" class="iconpos"></img></div>';}
if ($wuskydaynight7=='N'){echo '<img src="../wuicons/nt_'.$wuskydayIcon7.'.svg" class="iconpos"></img></div>';}
	 //summary icon
	 echo '<div class=greydesc>'. $wuskydesc7.'</div>';	
	 echo "<div class=tempvalue>"; 				  
	 if($tempunit=='F' && $wuskydayTempHigh7<=41){echo "<bluet>".number_format($wuskydayTempHigh7,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh7>=95){echo "<deepredt>".number_format($wuskydayTempHigh7,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh7>80){echo "<redt>".number_format($wuskydayTempHigh7,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh7>66){echo "<oranget>".number_format($wuskydayTempHigh7,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh7>53){echo "<yellowt>".number_format($wuskydayTempHigh7,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh7>41){echo "<greent>".number_format($wuskydayTempHigh7,0);}
	 else if($wuskydayTempHigh7<=5){echo "<bluet>".number_format($wuskydayTempHigh7,0);}
	 else if($wuskydayTempHigh7>=35){echo "<deepredt>".number_format($wuskydayTempHigh7,0);}
	 else if($wuskydayTempHigh7>=27){echo "<redt>".number_format($wuskydayTempHigh7,0);}
	 else if($wuskydayTempHigh7>=19){echo "<oranget>".number_format($wuskydayTempHigh7,0);}
	 else if($wuskydayTempHigh7>=12){echo "<yellowt>".number_format($wuskydayTempHigh7,0);}			  
	 else if($wuskydayTempHigh7>5){echo "<greent>".number_format($wuskydayTempHigh7,0);}
	 echo"°";
	 ?>  </div>  	  
  </article> 
  
  
  
  <article>
    <actualt><?php echo $wuskydayTime8 ?></actualt>         
     <?php   //8  short forecast  	 
	 
echo"<div class=iconpos> ";      		  			  
if ($wuskydaynight8=='D'){echo '<img src="../wuicons/'.$wuskydayIcon8.'.svg" class="iconpos"></img></div>';}
if ($wuskydaynight8=='N'){echo '<img src="../wuicons/nt_'.$wuskydayIcon8.'.svg" class="iconpos"></img></div>';}
	 //summary icon
	 echo '<div class=greydesc>'. $wuskydesc8.'</div>';	
	 echo "<div class=tempvalue>"; 				  
	 if($tempunit=='F' && $wuskydayTempHigh8<=41){echo "<bluet>".number_format($wuskydayTempHigh8,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh8>=95){echo "<deepredt>".number_format($wuskydayTempHigh8,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh8>80){echo "<redt>".number_format($wuskydayTempHigh8,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh8>66){echo "<oranget>".number_format($wuskydayTempHigh8,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh8>53){echo "<yellowt>".number_format($wuskydayTempHigh8,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh8>41){echo "<greent>".number_format($wuskydayTempHigh8,0);}
	 else if($wuskydayTempHigh8<=5){echo "<bluet>".number_format($wuskydayTempHigh8,0);}
	 else if($wuskydayTempHigh8>=35){echo "<deepredt>".number_format($wuskydayTempHigh8,0);}
	 else if($wuskydayTempHigh8>=27){echo "<redt>".number_format($wuskydayTempHigh8,0);}
	 else if($wuskydayTempHigh8>=19){echo "<oranget>".number_format($wuskydayTempHigh8,0);}
	 else if($wuskydayTempHigh8>=12){echo "<yellowt>".number_format($wuskydayTempHigh8,0);}			  
	 else if($wuskydayTempHigh8>5){echo "<greent>".number_format($wuskydayTempHigh8,0);}
	 echo"°";
	 ?>  </div>  	  
  </article> 
  
  
  <article>
    <actualt><?php echo $wuskydayTime9 ?></actualt>         
     <?php   //9  short forecast  	 
	 
echo"<div class=iconpos> ";      		  			  
if ($wuskydaynight9=='D'){echo '<img src="../wuicons/'.$wuskydayIcon9.'.svg" class="iconpos"></img></div>';}
if ($wuskydaynight9=='N'){echo '<img src="../wuicons/nt_'.$wuskydayIcon9.'.svg" class="iconpos"></img></div>';}
	 //summary icon
	 echo '<div class=greydesc>'. $wuskydesc9.'</div>';	
	 echo "<div class=tempvalue>"; 				  
	 if($tempunit=='F' && $tempunit=='F' && $wuskydayTempHigh9<=41){echo "<bluet>".number_format($wuskydayTempHigh9,0);}
	 else if($wuskydayTempHigh9>=95){echo "<deepredt>".number_format($wuskydayTempHigh9,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh9>80){echo "<redt>".number_format($wuskydayTempHigh9,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh9>66){echo "<oranget>".number_format($wuskydayTempHigh9,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh9>53){echo "<yellowt>".number_format($wuskydayTempHigh9,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh9>41){echo "<greent>".number_format($wuskydayTempHigh9,0);}
	 else if($wuskydayTempHigh9<=5){echo "<bluet>".number_format($wuskydayTempHigh9,0);}
	 else if($wuskydayTempHigh9>=35){echo "<deepredt>".number_format($wuskydayTempHigh9,0);}
	 else if($wuskydayTempHigh9>=27){echo "<redt>".number_format($wuskydayTempHigh9,0);}
	 else if($wuskydayTempHigh9>=19){echo "<oranget>".number_format($wuskydayTempHigh9,0);}
	 else if($wuskydayTempHigh9>=12){echo "<yellowt>".number_format($wuskydayTempHigh9,0);}			  
	 else if($wuskydayTempHigh9>5){echo "<greent>".number_format($wuskydayTempHigh9,0);}
	 echo"°";
	 ?>  </div>  	  
  </article> 
  <article>
  <actualt><?php echo $wuskydayTime10 ?></actualt>         
     <?php   //9  short forecast  	 
	 
echo"<div class=iconpos> ";      		  			  
if ($wuskydaynight10=='D'){echo '<img src="../wuicons/'.$wuskydayIcon10.'.svg" class="iconpos"></img></div>';}
if ($wuskydaynight10=='N'){echo '<img src="../wuicons/nt_'.$wuskydayIcon10.'.svg" class="iconpos"></img></div>';}
	 //summary icon
	 echo '<div class=greydesc>'. $wuskydesc10.'</div>';	
	 echo "<div class=tempvalue>"; 				  
	 if($tempunit=='F' && $wuskydayTempHigh10<=41){echo "<bluet>".number_format($wuskydayTempHigh10,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh10>=95){echo "<deepredt>".number_format($wuskydayTempHigh10,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh10>80){echo "<redt>".number_format($wuskydayTempHigh10,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh10>66){echo "<oranget>".number_format($wuskydayTempHigh10,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh10>53){echo "<yellowt>".number_format($wuskydayTempHigh10,0);}
	 else if($tempunit=='F' && $wuskydayTempHigh10>41){echo "<greent>".number_format($wuskydayTempHigh10,0);}
	 else if($wuskydayTempHigh10<=5){echo "<bluet>".number_format($wuskydayTempHigh10,0);}
	 else if($wuskydayTempHigh10>=35){echo "<deepredt>".number_format($wuskydayTempHigh10,0);}
	 else if($wuskydayTempHigh10>=27){echo "<redt>".number_format($wuskydayTempHigh10,0);}
	 else if($wuskydayTempHigh10>=19){echo "<oranget>".number_format($wuskydayTempHigh10,0);}
	 else if($wuskydayTempHigh10>=12){echo "<yellowt>".number_format($wuskydayTempHigh10,0);}			  
	 else if($wuskydayTempHigh10>5){echo "<greent>".number_format($wuskydayTempHigh10,0);}
	 echo"°";
	 ?>  </div>  	  
  </article> 

  <article>
  <span style="font-size:8px;">
  <?php echo $info?> CSS/SVG/PHP <a href="https://weather34.com" title="weather34.com" target="_blank" >weather34.com</a></span> 
  <br>
  <span style="font-size:8px;">
  <?php echo $info?> Forecast <a href="https://www.wunderground.com/weather/api/" title="Weather Underground API" target="_blank">Weather Underground</a></span>
  <br>
  <span style="font-size:8px;">
  <?php echo $info?> Compiled with<a href="https://canvasjs.com" title="https://canvasjs.com" target="_blank"> CanvasJs</a></span>

    </article>  
</main>