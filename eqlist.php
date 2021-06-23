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
@font-face{font-family:clock;src:url(fonts/clock3-webfont.woff2) format("woff2"),url(fonts/clock3-webfont.woff) format("woff")}
@font-face{font-family:weathertext3;src:url(fonts/verbatim-regular.woff2) format("woff2"),url(fonts/verbatim-regular.woff) format("woff")}
@font-face{font-family:weathertext2;src:url(fonts/verbatim-medium.woff2) format("woff2"),url(fonts/verbatim-medium.woff) format("woff")}
@font-face{font-family:headingtext;src:url(fonts/HelveticaNeue-Medium.woff2) format("woff2"),url(fonts/HelveticaNeue-Medium.woff) format("woff")}
:root {
    --white: hsl(0, 0%, 100%);
    --light: hsl(0, 0%, 96%);
    --dark: hsl(210, 15%, 8%);
    --dark-popup: hsl(200, 18%, 3%);
    --dark-light: hsla(0, 0%, 0%, 0.251);
    --dark-toggle: hsl(202, 8%, 46%);
    --dark-caption: rgba(66, 70, 72, 0.429);
    --black: hsl(0, 0%, 0%);
    --deepblue: hsla(185, 100%, 37%, 1);
    --deepcold: hsl(205, 69%, 63%);
    --blue: hsla(185, 100%, 37%, 1);
    --rainblue: hsla(185, 100%, 37%, 1);
    --darkred: hsl(0, 38%, 32%);
    --deepred: hsl(0, 38%, 32%);
    --red: hsl(7, 60%, 57%);
    --yellow: hsl(35, 77%, 58%);
    --green: hsl(75, 62%, 43%);
    --orange: hsl(19, 66%, 55%);
    --border-sun: hsla(206, 12%, 27%, .4);
    --dark-sun: rgba(47, 50, 61, 1);
    --barometerbar: rgba(76, 123, 160, 0.5);
    --barometerbar2: rgba(76, 123, 160, 0.9);
    --cloudbasebar: hsl(206, 19%, 39%);
    --black2: hsla(240, 4%, 9%, 0.3);
    --suntext: hsl(212, 23%, 85%);
    --suntext2: rgba(233, 237, 240, 0.8);
    --sunsetdark: hsl(202, 8%, 46%);
    --daylight: hsla(14, 95%, 50%, .8);
    --thecenter: --;
    --compass-shadow-sun: 5px 5px 10px hsla(0, 4%, 5%, .4), -5px -5px 1px hsla(198, 14%, 14%, 0.49);
    --purple: hsl(246, 31%, 62%);
    --silver: hsl(206, 23%, 94%);
    --border-dark: hsl(206, 12%, 27%);
    --border-dark2: hsla(206, 12%, 27%, .4);
    --border-dark-sun: hsla(206, 12%, 27%, .2);
    --blue2: rgba(184, 236, 243, 0.5);
    --yellow2: hsla(35, 77%, 58%, .8);
    --body-text-dark: hsl(212, 12%, 72%);
    --body-text-darkb: hsl(212, 12%, 72%);
    --body-text-light: hsl(0, 0%, 33%);
    --blocks: hsl(227, 22%, 92%);
    --modules: hsl(233, 12%, 13%);
    --blocks-background2: hsla(200, 7%, 45%, 0.7);
    --blocks-background: hsla(200, 8%, 35%, 0.19);
    --temp-5-10: hsl(205, 69%, 63%);
    --temp-0-5: hsla(185, 100%, 37%, 1);
    --temp0-5: hsla(185, 100%, 37%, 1);
    --temp5-10: hsl(74, 60%, 46%);
    --temp10-15: hsl(35, 77%, 58%);
    --temp15-20: hsl(34, 98%, 49%);
    --temp20-25: hsl(19, 66%, 55%);
    --temp25-30: hsl(12, 80%, 52%);
    --temp30-35: hsl(2, 56%, 55%);
    --temp35-40: hsl(4, 40%, 48%);
    --temp40-45: hsl(332, 45%, 53%);
    --temp45-50: hsl(323, 40%, 54%);
    --font-color: hsl(0, 0%, 50%);
    --text-shadow2: 0px 1px 1px hsl(240, 2%, 36%);
    --bg-color: hsla(198, 14%, 14%, 0.19);
    --button-bg-color: hsla(198, 14%, 14%, 0.19);
    --button-shadow: inset 5px 5px 20px #0c0b0b, inset -5px -5px 20px hsla(198, 14%, 14%, 0.19);
    --button-shadowbeaker: inset 2px -2px 10px 0px #0c0b0b, inset 2px -2px 10px 0px hsla(198, 14%, 14%, 0.19);
    --grid-lines: linear-gradient(hsla(0, 0%, 33%, 0.1) 1px, transparent 1px), linear-gradient(to right, hsla(0, 0%, 33%, 0.1) 1px, transparent 1px);
    --grid-linesbucket: linear-gradient(hsla(0, 0%, 33%, 0.5) 1px, transparent 1px), linear-gradient(to right, hsla(0, 0%, 33%, 0) 1px, transparent 1px);
    --grid-lines2: linear-gradient(hsla(0, 0%, 33%, 0.2) 1px, transparent 1px), linear-gradient(to right, hsla(0, 0%, 33%, 0.2) 1px, transparent 1px);
    --grid-lines3: linear-gradient(hsla(0, 0%, 33%, 0.08) 1px, transparent 1px), linear-gradient(to right, hsla(0, 0%, 33%, 0.08) 1px, transparent 1px);
    --grid-linesrain: linear-gradient(hsla(240, 6%, 77%, 0.14) 1px, transparent 1px), linear-gradient(to right, hsla(240, 6%, 77%, 0.14) 1px, transparent 1px);
    --grid-linescompass: linear-gradient(hsla(0, 0%, 33%, 0.1) 1px, transparent 1px), linear-gradient(to right, hsla(0, 0%, 33%, 0.1) 1px, transparent 1px);
    --grid-lines23: linear-gradient(hsla(0, 0%, 33%, 0.5) 1px, transparent 1px), linear-gradient(to right, hsla(0, 0%, 33%, 0.5) 1px, transparent 1px);
    --grid-lines-sun: linear-gradient(hsla(0, 0%, 33%, 0.1) 1px, transparent 1px), linear-gradient(to right, hsla(0, 0%, 33%, 0.1) 1px, transparent 1px);
    --grid-linesindicators: linear-gradient(hsla(206, 11%, 87%, 0.02) 5px, transparent 2px), linear-gradient(to right, hsla(206, 11%, 87%, 0.02) 5px, transparent 2px);
    --therainrategrad: -webkit-linear-gradient(left, #00adbd 0%, #00adbd 30%, #d35f50 90%)
}
body,html{font-size:13px;font-family:weathertext2,Helvetica,Arial,sans-serif;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}
.grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(210px,2fr));grid-gap:5px;align-items:stretch;color:#f5f7fc;
}
.grid>article{border:1px solid hsla(233, 12%, 13%,1);
	border-bottom: 5px solid hsla(233, 12%, 13%,1) ;
box-shadow:2px 2px 6px 0 rgba(0,0,0,.6);padding:20px;font-size:.8em;-webkit-border-radius:4px;border-radius:4px;
background:hsla(233, 12%, 13%,0);-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;}
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
margin-top:-10px
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
.hitempy{position:relative;
background:var(--blocks-background);color:#fff;font-size:12px;width:110px;
padding:1px;-webit-border-radius:2px;border-radius:2px;margin-top:-38px;
margin-left:72px;padding:5px;line-height:10px;font-size:9px;
}
.actualt{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;
	background:var(--blocks-background);padding:5px;font-family:Arial,Helvetica,sans-serif;width:100px;height:.8em;font-size:.8rem;padding-top:2px;color:#aaa;align-items:center;justify-content:center;margin-bottom:10px;top:-15px}.actualw{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:rgba(74,99,111,.1);padding:5px;font-family:Arial,Helvetica,sans-serif;width:100px;height:.8em;font-size:.8rem;padding-top:2px;color:#aaa;border-bottom:2px solid #38383c;align-items:center;justify-content:center;margin-bottom:10px;top:0}.svgimage{background:#009bab;-webit-border-radius:2px;border-radius:2px}orange1{color:#ff832f}
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
 if ($distanceunit=='mi' && $eqdist<=100) { echo "<red>".round($eqdist  * 0.621371) ." Miles from<br> $stationlocation";	}	
else if ($distanceunit=='km' && $eqdist<150) {echo "<red>".round($eqdist) ."</red> Km from<br> $stationlocation";}
else if ($distanceunit=='mi') { echo round($eqdist  * 0.621371) ." Miles from<br> $stationlocation";	} 
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
if ($distanceunit=='mi' && $eqdist1<=100) {echo "<red>".round($eqdist1  * 0.621371) ." Miles from<br> $stationlocation";}	
else if ($distanceunit=='km' && $eqdist1<150) { echo "<red>".round($eqdist1) ."</red> Km from<br> $stationlocation";}
else if ($distanceunit=='mi') { echo round($eqdist1  * 0.621371) ." Miles from<br> $stationlocation";} 
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
if ($distanceunit=='mi' && $eqdist2<=100) { echo "<red>".round($eqdist2  * 0.621371) ." Miles from<br> $stationlocation";}	
else if ($distanceunit=='km' && $eqdist2<150) { echo "<red>".round($eqdist2) ."</red> Km from<br> $stationlocation";}	
else if ($distanceunit=='mi') { echo round($eqdist2  * 0.621371) ." Miles from<br> $stationlocation";} 
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
if ($distanceunit=='mi' && $eqdist3<=100) {echo "<red>".round($eqdist3  * 0.621371) ." Miles from<br> $stationlocation";}	
else if ($distanceunit=='km' && $eqdist3<150) { echo "<red>".round($eqdist3) ."</red> Km from<br> $stationlocation";}	
else if ($distanceunit=='mi') { echo round($eqdist3  * 0.621371) ." Miles from<br> $stationlocation";} 
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
if ($distanceunit=='mi' && $eqdist4<=100) { echo "<red>".round($eqdist4  * 0.621371) ." Miles from<br> $stationlocation";}	
else if ($distanceunit=='km' && $eqdist4<150) { echo "<red>".round($eqdist4) ."</red> Km from<br> $stationlocation";}	
else if ($distanceunit=='mi') { echo round($eqdist4  * 0.621371) ." Miles from<br> $stationlocation";} 
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
if ($distanceunit=='mi' && $eqdist5<=100) { echo "<red>".round($eqdist5  * 0.621371) ." Miles from<br> $stationlocation";}	
else if ($distanceunit=='km' && $eqdist5<150) {	 echo "<red>".round($eqdist5) ."</red> Km from<br> $stationlocation";}		
else if ($distanceunit=='mi') { echo round($eqdist5  * 0.621371) ." Miles from<br> $stationlocation";} 
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
if ($distanceunit=='mi' && $eqdist6<=100) { echo "<red>".round($eqdist6  * 0.621371) ." Miles from<br> $stationlocation";}	
else if ($distanceunit=='km' && $eqdist6<150) {	 echo "<red>".round($eqdist6) ."</red> Km from<br> $stationlocation";}	
else if ($distanceunit=='mi') { echo round($eqdist6  * 0.621371) ." Miles from<br> $stationlocation";}
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
if ($distanceunit=='mi' && $eqdist7<=100) { echo "<red>".round($eqdist7  * 0.621371) ." Miles from<br> $stationlocation";}	
else if ($distanceunit=='km' && $eqdist7<150) { echo "<red>".round($eqdist7) ."</red> Km from<br> $stationlocation";}			
else if ($distanceunit=='mi') {echo round($eqdist7  * 0.621371) ." Miles from<br> $stationlocation";	} 
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
if ($distanceunit=='mi' && $eqdist8<=100) { echo "<red>".round($eqdist8  * 0.621371) ." Miles from<br> $stationlocation";}	
else if ($distanceunit=='km' && $eqdist8<150) { echo "<red>".round($eqdist8) ."</red> Km from<br> $stationlocation";}
else if ($distanceunit=='mi') { echo round($eqdist8  * 0.621371) ." Miles from<br> $stationlocation";} 
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