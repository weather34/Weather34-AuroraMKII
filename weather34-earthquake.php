<?php 
	###############################################################
	#	WEATHER34 Aurora MKII TEMPLATE by BRIAN UNDERDOWN 2015-2021                               
	#	CREATED FOR WEATHER34 Aurora MKII TEMPLATE at 													   		  
	#   https://weather34.com/homeweatherstation/index.html 										    
	# 	WEATHER STATION TEMPLATE 2015-2021                 										       
	# 	     Earthquake Version February 2021				 								               
	#   https://www.weather34.com 	                                                                   
	################################################################

include('livedata.php');header('Content-type: text/html; charset=utf-8');
date_default_timezone_set($TZ);
$json = file_get_contents('jsondata/eqnotification.txt'); 
$data = json_decode($json,true);
//echo $data['features'][0]['properties']['mag'];
$magnitude = $data['features'][0]['properties']['mag'];
$eqtitle = $data['features'][0]['properties']['flynn_region'];
$depth = $data['features'][0]['properties']['depth'];
$time = $data['features'][0]['properties']['time'];
$lati = $data['features'][0]['properties']['lat'];
$longi = $data['features'][0]['properties']['lon'];
$eventime=date('g:ia',strtotime($time) );
$eqdist= round(distance($lat, $lon, $lati, $longi)) ;

$magnitude1 = $data['features'][1]['properties']['mag'];
$eqtitle1 = $data['features'][1]['properties']['flynn_region'];
$depth1 = $data['features'][1]['properties']['depth'];
$time1 = $data['features'][1]['properties']['time'];
$lati1 = $data['features'][1]['properties']['lat'];
$longi1 = $data['features'][1]['properties']['lon'];
$eventime1=date('g:ia',strtotime($time1) );
$eqdist1= round(distance($lat, $lon, $lati1, $longi1)) ;

$magnitude2 = $data['features'][2]['properties']['mag'];
$eqtitle2 = $data['features'][2]['properties']['flynn_region'];
$depth2 = $data['features'][2]['properties']['depth'];
$time2 = $data['features'][2]['properties']['time'];
$lati2 = $data['features'][2]['properties']['lat'];
$longi2 = $data['features'][2]['properties']['lon'];
$eventime2=date('g:ia',strtotime($time2) );
$eqdist2= round(distance($lat, $lon, $lati2, $longi2)) ;

$magnitude3 = $data['features'][3]['properties']['mag'];
$eqtitle3 = $data['features'][3]['properties']['flynn_region'];
$depth3 = $data['features'][3]['properties']['depth'];
$time3 = $data['features'][3]['properties']['time'];
$lati3 = $data['features'][3]['properties']['lat'];
$longi3 = $data['features'][3]['properties']['lon'];
$eventime3=date('g:ia',strtotime($time3) );
$eqdist3= round(distance($lat, $lon, $lati3, $longi3)) ;

$magnitude4 = $data['features'][4]['properties']['mag'];
$eqtitle4 = $data['features'][4]['properties']['flynn_region'];
$depth4 = $data['features'][4]['properties']['depth'];
$time4 = $data['features'][4]['properties']['time'];
$lati4 = $data['features'][4]['properties']['lat'];
$longi4 = $data['features'][4]['properties']['lon'];
$eventime4=date('g:ia',strtotime($time4) );
$eqdist4= round(distance($lat, $lon, $lati4, $longi4)) ;

$magnitude5 = $data['features'][5]['properties']['mag'];
$eqtitle5 = $data['features'][5]['properties']['flynn_region'];
$depth5 = $data['features'][5]['properties']['depth'];
$time5 = $data['features'][5]['properties']['time'];
$lati5 = $data['features'][5]['properties']['lat'];
$longi5 = $data['features'][5]['properties']['lon'];
$eventime5=date('g:ia',strtotime($time5) );
$eqdist5= round(distance($lat, $lon, $lati5, $longi5)) ;

$magnitude6 = $data['features'][6]['properties']['mag'];
$eqtitle6 = $data['features'][6]['properties']['flynn_region'];
$depth6 = $data['features'][6]['properties']['depth'];
$time6 = $data['features'][6]['properties']['time'];
$lati6 = $data['features'][6]['properties']['lat'];
$longi6 = $data['features'][6]['properties']['lon'];
$eventime6=date('g:ia',strtotime($time6) );
$eqdist6= round(distance($lat, $lon, $lati6, $longi6)) ;

$magnitude7 = $data['features'][7]['properties']['mag'];
$eqtitle7 = $data['features'][7]['properties']['flynn_region'];
$depth7 = $data['features'][7]['properties']['depth'];
$time7 = $data['features'][7]['properties']['time'];
$lati7 = $data['features'][7]['properties']['lat'];
$longi7 = $data['features'][7]['properties']['lon'];
$eventime7=date('g:ia',strtotime($time7) );
$eqdist7= round(distance($lat, $lon, $lati7, $longi7)) ;

$magnitude8 = $data['features'][8]['properties']['mag'];
$eqtitle8 = $data['features'][8]['properties']['flynn_region'];
$depth8 = $data['features'][8]['properties']['depth'];
$time8 = $data['features'][8]['properties']['time'];
$lati8 = $data['features'][8]['properties']['lat'];
$longi8 = $data['features'][8]['properties']['lon'];
$eventime8=date('g:ia', strtotime($time8) );
$eqdist8= round(distance($lat, $lon, $lati8, $longi8)) ;

//less than 150km
if ($eqdist<150) {$magnitude=$magnitude;$eventime=$eventime;$eqdist=$eqdist;}
else if ($eqdist1<150) {$magnitude=$magnitude1;$eventime=$eventime1;$eqdist=$eqdist1;}
else if ($eqdist2<150) {$magnitude=$magnitude2;$eventime=$eventime2;$eqdist=$eqdist2;}
else if ($eqdist3<150) {$magnitude=$magnitude3;$eventime=$eventime3;$eqdist=$eqdist3;}
else if ($eqdist4<150) {$magnitude=$magnitude4;$eventime=$eventime4;$eqdist=$eqdist4;}
else if ($eqdist5<150) {$magnitude=$magnitude5;$eventime=$eventime5;$eqdist=$eqdist5;}
else if ($eqdist6<150) {$magnitude=$magnitude6;$eventime=$eventime6;$eqdist=$eqdist6;}
else if ($eqdist7<150) {$magnitude=$magnitude7;$eventime=$eventime7;$eqdist=$eqdist7;}
else if ($eqdist8<150) {$magnitude=$magnitude8;	$eventime=$eventime8;$eqdist=$eqdist8;}
//greater than 4
else if ($magnitude>4)  {$magnitude=$magnitude;$eventime=$eventime;$eqdist=$eqdist;}
else if ($magnitude1>4) {$magnitude=$magnitude1;$eventime=$eventime1;$eqdist=$eqdist1;}
else if ($magnitude2>4) {$magnitude=$magnitude2;$eventime=$eventime2;$eqdist=$eqdist2;}
else if ($magnitude3>4) {$magnitude=$magnitude3;$eventime=$eventime3;$eqdist=$eqdist3;}
else if ($magnitude4>4) {$magnitude=$magnitude4;$eventime=$eventime4;$eqdist=$eqdist4;}
else if ($magnitude5>4) {$magnitude=$magnitude5;$eventime=$eventime5;$eqdist=$eqdist5;}
else if ($magnitude6>4) {$magnitude=$magnitude6;$eventime=$eventime6;$eqdist=$eqdist6;}
else if ($magnitude7>4) {$magnitude=$magnitude7;$eventime=$eventime7;$eqdist=$eqdist7;}
else if ($magnitude8>4) {$magnitude=$magnitude8;$eventime=$eventime8;$eqdist=$eqdist8;}

$dist="km";
if ($distanceunit=='mi'){
	$eqdist=round($eqdist* 0.621371,0);
	$eqdist1=round($eqdist1* 0.621371,0);
	$eqdist2=round($eqdist2* 0.621371,0);
	$eqdist3=round($eqdist3* 0.621371,0);
	$eqdist4=round($eqdist4* 0.621371,0);
	$eqdist5=round($eqdist5* 0.621371,0);
	$eqdist6=round($eqdist6* 0.621371,0);
	$eqdist7=round($eqdist7* 0.621371,0);
	$eqdist8=round($eqdist8* 0.621371,0);
	$dist="miles";
}








$magnitude = number_format($magnitude,1);
?>

<div class="sunblock">
<div class="indoordescdeprem">Earthquake Regional</div>
<div class="button button-dial-small">      
<div class="button-dial-top-small"></div>
<div class="button-dial-label-small">          
<?php 
	if($magnitude>6) {echo '<red>'.$magnitude.'</red>';}	
	else if($magnitude>=5) {echo '<orange>'.$magnitude.'</orange>';}	
	else if($magnitude>=3) {echo '<yellow>'.$magnitude.'</yellow>';}
	else if($magnitude>=0) {echo '<green>'.$magnitude.'</green>';};
?>  
<indoorpm style='margin-left:-12px;font-size:7.5px;text-transform:lowercase'><?php echo $eventime?></indoorpm></div></div>

<div class="indoortempa-mod2a"> 
<valuetextheadingindoor>
<?php // weather34 simple css indoor temp scale magnitude
if ($magnitude>=6 ){echo "0 1 2 3 4 5 <red>".$magnitude."</red> 7 8+ ";}
else if ($magnitude>=5 ){echo "0 1 2 3 4 <orange>".$magnitude."</orange> 6 7 8+ ";}
else if ($magnitude>=4){echo "0 1 2 3  <yellow>".$magnitude."</yellow> 5 6 7 8+ ";}
else if ($magnitude>=3){echo "0 1 2 <yellow>".$magnitude."</yellow> 4 5 6 7 8+ ";}
else if ($magnitude>=2){echo "0 1 <green>".$magnitude."</green> 3 4 5 6 7 8+ ";}
else if ($magnitude>=1){echo "0 <green>".$magnitude."</green> 2 3 4 5 6 7 8+ ";}
else if ($magnitude>=0){echo "0 1 2 3 4 5 6 7 8+";}
echo "<span style='font-size:7px;text-transform:capatilize;'>Mag</span>";
?>
</valuetextheadingindoor>


<div class=sunratebar>
<div class="weather34sunratebarbottom" 
style="width:
<?php echo $magnitude*8.5;?>px;
background:
<?php 
if ($magnitude>=6 ){echo '#d35f50';}
elseif ($magnitude>=5 ){echo 'hsl(19, 66%, 55%)';}
elseif ($magnitude>=3 ){echo '#e6a241';}
elseif ($magnitude>=0){echo '#9bbc2f';}
?>;"></div></div></div>

<div class="indoortempa-mod3a"> 
<valuetextheadingindoor> 
<?php // weather34 simple css scale distance
if ($eqdist<=100){echo "*<depremspacing1>1500</depremspacing1>";}
else if ($eqdist>900){echo "0<depremspacing1></depremspacing1>";}
else if ($eqdist>100){echo "0<depremspacing1>1500</depremspacing1>";}
echo"<depremspacing>Epicenter Distance from Station</depremspacing>";
?>
<style>
.weather34sunratebarbottom2::before{
content:"<?php 
if ($distanceunit=="mi"){echo $eqdist. "mi";}
else if ($distanceunit=="km"){echo $eqdist. "km";}?>";

padding-left:<?php 
if ( $eqdist<100){echo $eqdist/8;}
else if ( $eqdist<500){echo $eqdist/12;}
else if ( $eqdist<1000){echo $eqdist/12;}
else if ( $eqdist<1500){echo $eqdist/12;}
else echo $eqdist/12;?>px;
color:<?php if ($eqdist>=500 ){echo 'var(--green)';}
else if ($eqdist>=400 ){echo 'var(--yellow)';}
elseif ($eqdist>=200 ){echo 'var(--orange)';}
elseif ($eqdist>=0 ){echo 'var(--red)';}?>;}
</style>
</valuetextheadingindoor>
<div class=sunratebar style="margin-top:-2px">
<div class="weather34sunratebarbottom2" 
style="width:
<?php if ( $eqdist<100){echo $eqdist/10.5;}
else if ( $eqdist<200){echo $eqdist/10.5;}
else if ( $eqdist<500){echo $eqdist/11;}
else if ( $eqdist<1000){echo $eqdist/11;}
else if ( $eqdist<1500){echo $eqdist/11;}
else echo $eqdist/11;?>px;
background:
<?php 
if ($eqdist>=500 ){echo 'var(--green)';}
else if ($eqdist>=400 ){echo 'var(--yellow)';}
elseif ($eqdist>=200 ){echo 'var(--orange)';}
elseif ($eqdist>=0 ){echo 'var(--red)';}?>
;">
</div></div></div>

<div class=mooninfo2><a href='eqlist.php' data-lity data-title="Regional Data"><?php echo  $aqilinks?>&nbsp;Extra Info</a></div></div>
</div></div>