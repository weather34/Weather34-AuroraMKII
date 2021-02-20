<?php include('livedata.php');include
error_reporting(0); 

	####################################################################################################
	#	HOME WEATHER STATION TEMPLATE by BRIAN UNDERDOWN 2015-18                                       #
	#	CREATED FOR HOMEWEATHERSTATION TEMPLATE at https://weather34.com/homeweatherstation/index.html # 
	# 	                                                                                               #
	# 	                                                                                               #
	# 	WEATHER34 EARTHQUAKES LISTING: 7th Feb 2018   	                                               #
	# 	                                                                                               #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################

?>
<?php //current eqlist
$heatindexalert8='<svg id="weather34 heatindex alert" width="7pt" height="7pt" fill="#ff552e" viewBox="0 0 20 20"><path d="M19.64 16.36L11.53 2.3A1.85 1.85 0 0 0 10 1.21 1.85 1.85 0 0 0 8.48 2.3L.36 16.36C-.48 17.81.21 19 1.88 19h16.24c1.67 0 2.36-1.19 1.52-2.64zM11 16H9v-2h2zm0-4H9V6h2z"/></svg><br>';
$stationlocation='This Station';

date_default_timezone_set($TZ);
$json = file_get_contents('jsondata/eqnotification.txt'); 
$data = json_decode($json,true);
// change the variable name to devices which is clearer.
//echo $data['features'][0]['properties']['mag'];
$magnitude = $data['features'][0]['properties']['mag'];
$eqtitle = $data['features'][0]['properties']['flynn_region'];
$depth = $data['features'][0]['properties']['depth'];
$time = $data['features'][0]['properties']['time'];
$lati = $data['features'][0]['properties']['lat'];
$longi = $data['features'][0]['properties']['lon'];
$eventime=date('jS M D H:i',strtotime($time) );
$eqdist= round(distance($lat, $lon, $lati, $longi)) ;

$magnitude1 = $data['features'][1]['properties']['mag'];
$eqtitle1 = $data['features'][1]['properties']['flynn_region'];
$depth1 = $data['features'][1]['properties']['depth'];
$time1 = $data['features'][1]['properties']['time'];
$lati1 = $data['features'][1]['properties']['lat'];
$longi1 = $data['features'][1]['properties']['lon'];
$eventime1=date('jS M D H:i',strtotime($time1) );
$eqdist1= round(distance($lat, $lon, $lati1, $longi1)) ;

$magnitude2 = $data['features'][2]['properties']['mag'];
$eqtitle2 = $data['features'][2]['properties']['flynn_region'];
$depth2 = $data['features'][2]['properties']['depth'];
$time2 = $data['features'][2]['properties']['time'];
$lati2 = $data['features'][2]['properties']['lat'];
$longi2 = $data['features'][2]['properties']['lon'];
$eventime2=date('jS M D H:i',strtotime($time2) );
$eqdist2= round(distance($lat, $lon, $lati2, $longi2)) ;

$magnitude3 = $data['features'][3]['properties']['mag'];
$eqtitle3 = $data['features'][3]['properties']['flynn_region'];
$depth3 = $data['features'][3]['properties']['depth'];
$time3 = $data['features'][3]['properties']['time'];
$lati3 = $data['features'][3]['properties']['lat'];
$longi3 = $data['features'][3]['properties']['lon'];
$eventime3=date('jS M D H:i',strtotime($time3) );
$eqdist3= round(distance($lat, $lon, $lati3, $longi3)) ;

$magnitude4 = $data['features'][4]['properties']['mag'];
$eqtitle4 = $data['features'][4]['properties']['flynn_region'];
$depth4 = $data['features'][4]['properties']['depth'];
$time4 = $data['features'][4]['properties']['time'];
$lati4 = $data['features'][4]['properties']['lat'];
$longi4 = $data['features'][4]['properties']['lon'];
$eventime4=date('jS M D H:i',strtotime($time4) );
$eqdist4= round(distance($lat, $lon, $lati4, $longi4)) ;

$magnitude5 = $data['features'][5]['properties']['mag'];
$eqtitle5 = $data['features'][5]['properties']['flynn_region'];
$depth5 = $data['features'][5]['properties']['depth'];
$time5 = $data['features'][5]['properties']['time'];
$lati5 = $data['features'][5]['properties']['lat'];
$longi5 = $data['features'][5]['properties']['lon'];
$eventime5=date('jS M D H:i',strtotime($time5) );
$eqdist5= round(distance($lat, $lon, $lati5, $longi5)) ;

$magnitude6 = $data['features'][6]['properties']['mag'];
$eqtitle6 = $data['features'][6]['properties']['flynn_region'];
$depth6 = $data['features'][6]['properties']['depth'];
$time6 = $data['features'][6]['properties']['time'];
$lati6 = $data['features'][6]['properties']['lat'];
$longi6 = $data['features'][6]['properties']['lon'];
$eventime6=date('jS M D H:i',strtotime($time6) );
$eqdist6= round(distance($lat, $lon, $lati6, $longi6)) ;

$magnitude7 = $data['features'][7]['properties']['mag'];
$eqtitle7 = $data['features'][7]['properties']['flynn_region'];
$depth7 = $data['features'][7]['properties']['depth'];
$time7 = $data['features'][7]['properties']['time'];
$lati7 = $data['features'][7]['properties']['lat'];
$longi7 = $data['features'][7]['properties']['lon'];
$eventime7=date('jS M D H:i',strtotime($time7) );
$eqdist7= round(distance($lat, $lon, $lati7, $longi7)) ;

$magnitude8 = $data['features'][8]['properties']['mag'];
$eqtitle8 = $data['features'][8]['properties']['flynn_region'];
$depth8 = $data['features'][8]['properties']['depth'];
$time8 = $data['features'][8]['properties']['time'];
$lati8 = $data['features'][8]['properties']['lat'];
$longi8 = $data['features'][8]['properties']['lon'];
$eventime8=date('jS M D H:i', strtotime($time8) );
$eqdist8= round(distance($lat, $lon, $lati8, $longi8)) ;

$eqalert='<svg id="i-activity" viewBox="0 0 32 32" width="52" height="52" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M4 16 L11 16 14 29 18 3 21 16 28 16" />
</svg>';
$eqalert6='<svg id="i-activity" viewBox="0 0 32 32" width="28" height="28" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
    <path d="M4 16 L11 16 14 29 18 3 21 16 28 16" />
</svg>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weather34 Recent Regional Earthquakes Information </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
@font-face{font-family:weathertext2;src:url(fonts/verbatim-medium.woff2) format("woff2")}
body,html{font-size:13px;font-family:weathertext2,Helvetica,Arial,sans-serif;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}
.grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,2fr));grid-gap:5px;align-items:stretch;color:#f5f7fc}
.grid>article{border:1px solid rgba(245,247,252,.04);
box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:20px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;
background:hsla(233, 12%, 13%,.5);-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}
.grid>article img{max-width:100%}

.gridfooter{display:grid;grid-template-columns:repeat(auto-fill,minmax(760,1fr));grid-gap:10px;align-items:stretch;color:#f5f7fc}

.grid>footer{border:1px solid rgba(245,247,252,.02);box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding-top:5px;
font-size:.8em;-webkit-border-radius:4px;border-radius:4px;background:0;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}

a{color:#aaa;text-decoration:none}

.weather34darkbrowser{position:relative;background:0;width:97%;height:30px;margin:auto;margin-top:-5px;margin-left:0;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:10px}
.weather34darkbrowser[url]:after{content:attr(url);color:#aaa;font-size:10px;position:absolute;left:0;right:0;top:0;padding:4px 15px;margin:11px 10px 0 auto;border-radius:3px;background:rgba(97,106,114,.3);
height:20px;box-sizing:border-box}
blue{color:#01a4b4}orange{color:#009bb4}green{color:#aaa}red{color:#f37867}red6{color:#d65b4a}value{color:#fff}yellow{color:#cc0}purple{color:#916392}
smalluvunit{font-size:.6rem;font-family:Arial,Helvetica,system}smallmagunit{font-size:.55rem;font-family:Arial,Helvetica,system;font-weight:500}
.magcontainer1{left:70px;top:-40px}

.mag1,.mag1-3,.mag11,.mag4-5,.mag6-8,.mag9-10{font-family:weathertext2,Arial,Helvetica,system;width:4.5rem;
height:2rem;-webkit-border-radius:2px;-moz-border-radius:2px;-o-border-radius:2px;
border-radius:2px;font-size:1.2rem;padding-top:12px;color:#fff;border-bottom:11px solid #38383c;align-items:center;justify-content:center;text-align:center;
}

.magcaution,.magtrend{position:absolute;font-size:1rem}
.mag1-3{background:#9aba2f}
.mag4-5{background:#e6a141}
.mag6-8{background:rgba(255,124,57,.8)}
.mag9-10{background:rgba(211,93,78,.8)}
.mag11{background:rgba(204,135,248,.7)}
.magcaution{margin-left:120px;margin-top:105px;font-family:weathertext2}
.magtrend{margin-left:135px;margin-top:40px;z-index:1;color:#fff}
.almanac{font-size:1.25em;margin-top:30px;color:#38383c;width:12em}metricsblue{color:#44a6b5;
font-family:weathertext2,Helvetica,Arial,sans-serif;background:rgba(86,95,103,.5);-webkit-border-radius:2px;border-radius:2px;align-items:center;justify-content:center;font-size:.9em;left:10px;padding:0 3px 0 3px}.w34convertrain{position:relative;font-size:.5em;top:9px;color:silver;margin-left:5px}
.hitempy{position:relative;background:rgba(61,64,66,.5);color:#fff;font-size:12px;width:110px;padding:1px;-webit-border-radius:2px;border-radius:2px;margin-top:-38px;
margin-left:72px;padding:5px;line-height:10px;font-size:9px}
.actualt{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:rgba(74,99,111,.1);padding:5px;font-family:Arial,Helvetica,sans-serif;width:100px;height:.8em;font-size:.8rem;padding-top:2px;color:#aaa;align-items:center;justify-content:center;margin-bottom:10px;top:-15px}.actualw{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:rgba(74,99,111,.1);padding:5px;font-family:Arial,Helvetica,sans-serif;width:100px;height:.8em;font-size:.8rem;padding-top:2px;color:#aaa;border-bottom:2px solid #38383c;align-items:center;justify-content:center;margin-bottom:10px;top:0}.svgimage{background:#009bab;-webit-border-radius:2px;border-radius:2px}orange1{color:#ff832f}
</style>
<div class="weather34darkbrowser" url=" <?php echo $stationlocation?> Regional Recent Earthquakes "></div>  
<main class="grid">
  <article>  
   <div class=actualt>&nbsp;&nbsp Recent Earthquake </div>        
    <?php 
				if($magnitude>=7){echo "<div class=mag9-10>",number_format($magnitude,1),"";}
				else if($magnitude>=5.8){echo "<div class=mag9-10>",number_format($magnitude,1),"";}
				else if($magnitude>=5){echo "<div class=mag6-8>",number_format($magnitude,1),"";}
				else if($magnitude>=3){echo "<div class=mag4-5>",number_format($magnitude,1),"";}
				else if($magnitude<3){echo "<div class=mag1-3>",number_format($magnitude,1),"";}
				?>
<div></div>
<div class="hitempy">
<?php echo "";for ($i = 0; $i < 1; $i++) {
	// EQ Latest earthquake 	
	if ($eqdist<150)  {echo "<div class='time'><red>*Warning Nearby</red> <span> ".$heatindexalert8."  ".$eventime."</div></span>";	echo $eqtitle;} 
	else if ($magnitude>7)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime ,"</div></span>";echo $eqtitle ;} 	
	else if ($magnitude>5.7) {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime ,"</div></span>";echo $eqtitle ;} 	
	else if ($magnitude>5.2) {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime ,"</div></span>";echo $eqtitle ;} 	
	else if ($magnitude>4) {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime ,"</div></span>";echo $eqtitle ;} 	
	else if ($magnitude>3)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime ,"</div></span>";echo $eqtitle ;} 	
	else if ($magnitude>1)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime ,"</div></span>";echo $eqtitle ;} 
}
?><br>
<?php
 if ($windunit == 'mph' && $eqdist<=100) { echo "<red>".round($eqdist  * 0.621371) ." Miles from<br> $stationlocation";	}	
else if ($windunit == 'km/h' && $eqdist<150) {echo "<red>".round($eqdist) ."</red> Km from<br> $stationlocation";}
else if ($windunit == 'mph') { echo round($eqdist  * 0.621371) ." Miles from<br> $stationlocation";	} 
else { echo $eqdist ." Km from<br> $stationlocation" ;}echo "";?>
</div></smalluvunit></article>  
  
 <article>  
   <div class=actualt>&nbsp;&nbsp Recent Earthquake </div>        
    <?php  //1
				if($magnitude1>=7){echo "<div class=mag9-10>",number_format($magnitude1,1),"";}
				else if($magnitude1>=5.8){echo "<div class=mag9-10>",number_format($magnitude1,1),"";}
				else if($magnitude1>=5){echo "<div class=mag6-8>",number_format($magnitude1,1),"";}
				else if($magnitude1>=3){echo "<div class=mag4-5>",number_format($magnitude1,1),"";}
				else if($magnitude1<3){echo "<div class=mag1-3>",number_format($magnitude1,1),"";}						
				?>
<div></div>
<div class="hitempy">
<?php echo "";for ($i = 0; $i < 1; $i++) {
	// EQ Latest earthquake	
	if ($eqdist1<150)  {echo "<div class='time'><red>*Warning Nearby</red> ".$heatindexalert8." <span> ".$eventime1."</div></span>";echo $eqtitle1;} 
	else if ($magnitude1>7)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime1 ,"</div></span>";echo $eqtitle1 ;} 	
	else if ($magnitude1>5.7) {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime1 ,"</div></span>";echo $eqtitle1 ;} 
	else if ($magnitude1>5.2) {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime1 ,"</div></span>";echo $eqtitle1 ;} 	
	else if ($magnitude1>4)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime1 ,"</div></span>";	echo $eqtitle1 ;} 	
	else if ($magnitude1>3)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime1 ,"</div></span>";echo $eqtitle1 ;} 	
	else if ($magnitude1>1)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime1 ,"</div></span>";echo $eqtitle1 ;} 
?><br>
<?php			
if ($windunit == 'mph' && $eqdist1<=100) {echo "<red>".round($eqdist1  * 0.621371) ." Miles from<br> $stationlocation";}	
else if ($windunit == 'km/h' && $eqdist1<150) { echo "<red>".round($eqdist1) ."</red> Km from<br> $stationlocation";}
else if ($windunit == 'mph') { echo round($eqdist1  * 0.621371) ." Miles from<br> $stationlocation";} 
else { echo $eqdist1 ." Km from<br> $stationlocation" ;	}echo "";?>
</div>
</smalluvunit>
</article>  
  
   <article>  
   <div class=actualt>&nbsp;&nbsp Recent Earthquake </div>        
    <?php //2
				if($magnitude2>=7){echo "<div class=mag9-10>",number_format($magnitude2,1),"";}
				else if($magnitude2>=5.8){echo "<div class=mag9-10>",number_format($magnitude2,1),"";}
				else if($magnitude2>=5){echo "<div class=mag6-8>",number_format($magnitude2,1),"";}
				else if($magnitude2>=3){echo "<div class=mag4-5>",number_format($magnitude2,1),"";}		
				else if($magnitude2<3){echo "<div class=mag1-3>",number_format($magnitude2,1),"";}						
				?>
<div></div>
<div class="hitempy">
<?php
	echo "";for ($i = 0; $i < 1; $i++) {
	// EQ Latest earthquake 	
	if ($eqdist2<150)  {
	echo "<div class='time'><red>*Warning Nearby</red> <span> ".$heatindexalert8."  ".$eventime2."</div></span>";echo $eqtitle2;} 
	else if ($magnitude2>7)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime2,"</div></span>";echo $eqtitle2 ;} 	
	else if ($magnitude2>5.7)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime2,"</div></span>";echo $eqtitle2 ;} 	
	else if ($magnitude2>5.2)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime2,"</div></span>";echo $eqtitle2 ;} 	
	else if ($magnitude2>4)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime2,"</div></span>";echo $eqtitle2 ;} 	
	else if ($magnitude2>3)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime2,"</div></span>";echo $eqtitle2 ;} 	
	else if ($magnitude2>1)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime2,"</div></span>";echo $eqtitle2 ;} 
}?><br>
<?php			
if ($windunit == 'mph' && $eqdist2<=100) { echo "<red>".round($eqdist2  * 0.621371) ." Miles from<br> $stationlocation";}	
else if ($windunit == 'km/h' && $eqdist2<150) { echo "<red>".round($eqdist2) ."</red> Km from<br> $stationlocation";}	
else if ($windunit == 'mph') { echo round($eqdist2  * 0.621371) ." Miles from<br> $stationlocation";} 
else { echo $eqdist2 ." Km from<br> $stationlocation" ;	}echo "";?>
</div>
</smalluvunit>
</article>  
  
   <article>  
   <div class=actualt>&nbsp;&nbsp Recent Earthquake </div>        
    <?php //3
				if($magnitude3>=7){echo "<div class=mag9-10>",number_format($magnitude3,1),"";}
				else if($magnitude3>=5.8){echo "<div class=mag9-10>",number_format($magnitude3,1),"";}
				else if($magnitude3>=5){echo "<div class=mag6-8>",number_format($magnitude3,1),"";}
				else if($magnitude3>=3){echo "<div class=mag4-5>",number_format($magnitude3,1),"";}
				else if($magnitude3<3){echo "<div class=mag1-3>",number_format($magnitude3,1),"";} ?>
<div></div>
<div class="hitempy">
<?php
	echo "";for ($i = 0; $i < 1; $i++) {
	// EQ Latest earthquake 	
	if ($eqdist3<150)  {echo "<div class='time'><red>*Warning Nearby</red> <span> ".$heatindexalert8."  ".$eventime3."</div></span>";echo $eqtitle3;} 
	else if ($magnitude3>7)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime3 ,"</div></span>";echo $eqtitle3 ;} 	
	else if ($magnitude3>5.7)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime3 ,"</div></span>";echo $eqtitle3 ;} 	
	else if ($magnitude3>5.2)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime3 ,"</div></span>";echo $eqtitle3 ;} 	
	else if ($magnitude3>4)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime3 ,"</div></span>";echo $eqtitle3 ;} 	
	else if ($magnitude3>3)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime3 ,"</div></span>";	echo $eqtitle3 ;} 	
	else if ($magnitude3>1)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime3 ,"</div></span>";	echo $eqtitle3 ;} }?><br>
<?php			
if ($windunit == 'mph' && $eqdist3<=100) {echo "<red>".round($eqdist3  * 0.621371) ." Miles from<br> $stationlocation";}	
else if ($windunit == 'km/h' && $eqdist3<150) { echo "<red>".round($eqdist3) ."</red> Km from<br> $stationlocation";}	
else if ($windunit == 'mph') { echo round($eqdist3  * 0.621371) ." Miles from<br> $stationlocation";} 
else { echo $eqdist3 ." Km from<br> $stationlocation" ;}echo "";?>
</div>
</smalluvunit>
</article>  

 <article>  
   <div class=actualt>&nbsp;&nbsp Recent Earthquake </div>        
    <?php //4
				if($magnitude4>=7){echo "<div class=mag9-10>",number_format($magnitude4,1),"";}
				else if($magnitude4>=5.8){echo "<div class=mag9-10>",number_format($magnitude4,1),"";}
				else if($magnitude4>=5){echo "<div class=mag6-8>",number_format($magnitude4,1),"";}
				else if($magnitude4>=3){echo "<div class=mag4-5>",number_format($magnitude4,1),"";}
				else if($magnitude4<3){echo "<div class=mag1-3>",number_format($magnitude4,1),"";}						
				?>
<div></div>

<div class="hitempy">
<?php
	echo "";for ($i = 0; $i < 1; $i++) {
	// EQ Latest earthquake 	
	if ($eqdist4<150)  {echo "<div class='time'><red>*Warning Nearby</red> <span> ".$heatindexalert8."  ".$eventime4."</div></span>";echo $eqtitle4;} 
	else if ($magnitude4>7)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime4 ,"</div></span>";echo $eqtitle4 ;} 	
	else if ($magnitude4>5.7)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime4 ,"</div></span>";echo $eqtitle4 ;} 	
	else if ($magnitude4>5.2)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime4 ,"</div></span>";echo $eqtitle4 ;} 	
	else if ($magnitude4>4)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime4 ,"</div></span>";echo $eqtitle4 ;} 	
	else if ($magnitude4>3)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime4 ,"</div></span>";echo $eqtitle4 ;} 	
	else if ($magnitude4>1)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime4 ,"</div></span>";echo $eqtitle4 ;} }
?><br>
<?php			
if ($windunit == 'mph' && $eqdist4<=100) { echo "<red>".round($eqdist4  * 0.621371) ." Miles from<br> $stationlocation";}	
else if ($windunit == 'km/h' && $eqdist4<150) { echo "<red>".round($eqdist4) ."</red> Km from<br> $stationlocation";}	
else if ($windunit == 'mph') { echo round($eqdist4  * 0.621371) ." Miles from<br> $stationlocation";} 
else { echo $eqdist4 ." Km from<br> $stationlocation" ;	}echo "";?>
</div>
</smalluvunit>
</article>  
  
 <article>  
   <div class=actualt>&nbsp;&nbsp Recent Earthquake </div>        
    <?php //5
				if($magnitude5>=7){echo "<div class=mag9-10>",number_format($magnitude5,1),"";}
				else if($magnitude5>=5.8){echo "<div class=mag9-10>",number_format($magnitude5,1),"";}
				else if($magnitude5>=5){echo "<div class=mag6-8>",number_format($magnitude5,1),"";}
				else if($magnitude5>=3){echo "<div class=mag4-5>",number_format($magnitude5,1),"";}
				else if($magnitude5<3){echo "<div class=mag1-3>",number_format($magnitude5,1),"";}					
				?>
<div></div>

<div class="hitempy">
<?php
	echo "";for ($i = 0; $i < 1; $i++) {
	// EQ Latest earthquake 	
	if ($eqdist5<150)  {echo "<div class='time'><red>*Warning Nearby</red> <span> ".$heatindexalert8."  ".$eventime5."</div></span>";echo $eqtitle5;} 
	else if ($magnitude5>7)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime5 ,"</div></span>";	echo $eqtitle ;} 	
	else if ($magnitude5>5.7)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime5 ,"</div></span>";echo $eqtitle5 ;} 	
	else if ($magnitude5>5.2)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime5 ,"</div></span>";echo $eqtitle5 ;} 	
	else if ($magnitude5>4)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime5 ,"</div></span>";	echo $eqtitle5 ;} 	
	else if ($magnitude5>3)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime5 ,"</div></span>";	echo $eqtitle5 ;} 	
	else if ($magnitude5>1)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime5 ,"</div></span>";	echo $eqtitle5 ;} 
}
?><br>
<?php			
if ($windunit == 'mph' && $eqdist5<=100) { echo "<red>".round($eqdist5  * 0.621371) ." Miles from<br> $stationlocation";}	
else if ($windunit == 'km/h' && $eqdist5<150) {	 echo "<red>".round($eqdist5) ."</red> Km from<br> $stationlocation";}		
else if ($windunit == 'mph') { echo round($eqdist5  * 0.621371) ." Miles from<br> $stationlocation";} 
else { echo $eqdist5 ." Km from<br> $stationlocation" ;	}echo "";?>
</div>
</smalluvunit>
</article>

<article>  
   <div class=actualt>&nbsp;&nbsp Recent Earthquake </div>        
    <?php //6
				if($magnitude6>=7){echo "<div class=mag9-10>",number_format($magnitude6,1),"";}
				else if($magnitude6>=5.8){echo "<div class=mag9-10>",number_format($magnitude6,1),"";}
				else if($magnitude6>=5){echo "<div class=mag6-8>",number_format($magnitude6,1),"";}
				else if($magnitude6>=3){echo "<div class=mag4-5>",number_format($magnitude6,1),"";}		
				else if($magnitude6<3){echo "<div class=mag1-3>",number_format($magnitude6,1),"";}						
				?>
<div></div>

<div class="hitempy">
<?php
	echo "";for ($i = 0; $i < 1; $i++) {
	// EQ Latest earthquake 	
	if ($eqdist6<150)  {echo "<div class='time'><red>*Warning Nearby</red> <span> ".$heatindexalert8."  ".$eventime6."</div></span>";echo $eqtitle6;} 
	else if ($magnitude6>7)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime6 ,"</div></span>";echo $eqtitle6 ;} 	
	else if ($magnitude6>5.7)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime6 ,"</div></span>";echo $eqtitle6 ;} 	
	else if ($magnitude6>5.2)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime6 ,"</div></span>";echo $eqtitle6 ;} 	
	else if ($magnitude6>4)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime6 ,"</div></span>";	echo $eqtitle6 ;} 
	else if ($magnitude6>3)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime6 ,"</div></span>";	echo $eqtitle6 ;} 	
	else if ($magnitude6>1)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime6 ,"</div></span>";	echo $eqtitle6 ;} }
?><br>
<?php
if ($windunit == 'mph' && $eqdist6<=100) { echo "<red>".round($eqdist6  * 0.621371) ." Miles from<br> $stationlocation";}	
else if ($windunit == 'km/h' && $eqdist6<150) {	 echo "<red>".round($eqdist6) ."</red> Km from<br> $stationlocation";}	
else if ($windunit == 'mph') { echo round($eqdist6  * 0.621371) ." Miles from<br> $stationlocation";}
else { echo $eqdist6 ." Km from<br> $stationlocation" ;	}echo "";?>
</div>
</smalluvunit>
</article>  

<article>  
   <div class=actualt>&nbsp;&nbsp Recent Earthquake </div>        
    <?php //7
				if($magnitude7>=7){echo "<div class=mag9-10>",number_format($magnitude7,1),"";}
				else if($magnitude7>=5.8){echo "<div class=mag9-10>",number_format($magnitude7,1),"";}
				else if($magnitude7>=5){echo "<div class=mag6-8>",number_format($magnitude7,1),"";}
				else if($magnitude7>=3){echo "<div class=mag4-5>",number_format($magnitude7,1),"";}
				else if($magnitude7<3){echo "<div class=mag1-3>",number_format($magnitude7,1),"";}						
				?>
<div></div>

<div class="hitempy">
<?php	echo "";for ($i = 0; $i < 1; $i++) {
	// EQ Latest earthquake 	
	if ($eqdist7<150)  {echo "<div class='time'><red>*Warning Nearby</red> <span> ".$heatindexalert8."  ".$eventime7."</div></span>";echo $eqtitle7;	} 
	else if ($magnitude7>7)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime7 ,"</div></span>";echo $eqtitle7 ;} 	
	else if ($magnitude7>5.7)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime7 ,"</div></span>";echo $eqtitle7 ;} 	
	else if ($magnitude7>5.2)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime7 ,"</div></span>";echo $eqtitle7 ;} 	
	else if ($magnitude7>4)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime7 ,"</div></span>";echo $eqtitle7 ;} 	
	else if ($magnitude7>3)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime7 ,"</div></span>";echo $eqtitle7 ;} 	
	else if ($magnitude7>1)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime7 ,"</div></span>";	echo $eqtitle7 ;} }
?><br>
<?php			
if ($windunit == 'mph' && $eqdist7<=100) { echo "<red>".round($eqdist7  * 0.621371) ." Miles from<br> $stationlocation";}	
else if ($windunit == 'km/h' && $eqdist7<150) { echo "<red>".round($eqdist7) ."</red> Km from<br> $stationlocation";}			
else if ($windunit == 'mph') {echo round($eqdist7  * 0.621371) ." Miles from<br> $stationlocation";	} 
else { echo $eqdist7 ." Km from<br> $stationlocation" ;}echo "";?>
</div>
</smalluvunit>
</article>  

<article>  
   <div class=actualt>&nbsp;&nbsp Recent Earthquake </div>        
    <?php //7
				if($magnitude8>=7){echo "<div class=mag9-10>",number_format($magnitude8,1),"";}
				else if($magnitude8>=5.8){echo "<div class=mag9-10>",number_format($magnitude8,1),"";}
				else if($magnitude8>=5){echo "<div class=mag6-8>",number_format($magnitude8,1),"";}
				else if($magnitude8>=3){echo "<div class=mag4-5>",number_format($magnitude8,1),"";}
				else if($magnitude8<3){echo "<div class=mag1-3>",number_format($magnitude8,1),"";}						
				?>
<div></div>

<div class="hitempy">
<?php echo "";for ($i = 0; $i < 1; $i++) {
	// EQ Latest earthquake 	
	if ($eqdist8<150)  {echo "<div class='time'><red>*Warning Nearby</red> ".$heatindexalert8." <span> ".$eventime8."</div></span>";echo $eqtitle8;	} 
	else if ($magnitude8>7)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime8 ,"</div></span>";	echo $eqtitle8 ;} 	
	else if ($magnitude8>5.7)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime8 ,"</div></span>";echo $eqtitle8 ;} 	
	else if ($magnitude8>5.2)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime8 ,"</div></span>";echo $eqtitle8 ;} 	
	else if ($magnitude8>4)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime8 ,"</div></span>";echo $eqtitle8 ;} 	
	else if ($magnitude8>3)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime8 ,"</div></span>";echo $eqtitle8 ;} 	
	else if ($magnitude8>1)  {echo "<div class='time'><orange1>*Regional <br></orange1><span>",$eventime8 ,"</div></span>";	echo $eqtitle8 ;}}
?><br>
<?php			
if ($windunit == 'mph' && $eqdist8<=100) { echo "<red>".round($eqdist8  * 0.621371) ." Miles from<br> $stationlocation";}	
else if ($windunit == 'km/h' && $eqdist8<150) { echo "<red>".round($eqdist8) ."</red> Km from<br> $stationlocation";}
else if ($windunit == 'mph') { echo round($eqdist8  * 0.621371) ." Miles from<br> $stationlocation";} 
else {echo $eqdist8 ." Km from<br> $stationlocation" ;}	echo "";}
	?>
</div></smalluvunit></article>  
  
  <article style="height:14px;width:760px;padding:0;padding-left:5px;padding-top:3px">  
   <span style="font-size:8px;">  
  <?php echo $info?> CSS/SVG/PHP scripts were developed by <a href="https://weather34.com" title="weather34.com" target="_blank" style="font-size:9px;">weather34.com</a>  for use in the weather34 template &copy; 2015-<?php echo date('Y');?>
 &nbsp;
 
  <?php echo $info?>  
<a href="https://www.seismicportal.eu/" title="https://www.seismicportal.eu/" target="_blank">Data Provided by © <?php echo date('Y');?> https://www.seismicportal.eu/</a></span>
  </article> </main></head></html>