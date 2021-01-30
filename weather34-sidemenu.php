<?php 
########################################################
#	CREATED FOR WEATHER34 Aurora TEMPLATE  		              						                
# https://weather34.com/homeweatherstation/index.html 											                        
# 	                                                                                               
# 	Release: December 2020				  	                                           
########################################################


// original default weather34 menu 
// weather34 side menu you can build your menu to use other links in this file 
// example if you wish to use a pop up always include the string "data-lity" without the commas
// like this <a href="weather34-large-cam.php" data-lity data-title="Webcam"> Webcam </a>
// if you want a tool tip just include the data-title="Webcam" Webcam used for example 
// to use icons use the php echo $nameoficon all icons are SVG !! dont use crappy gif,jpg,png feel free to ask if you need icons to be made 
// to suit your links . Weather34 does not scrape data or pull iframe data from other sites by default it is left to you .scraping is unethical if 
// service not provided or can impact you website if iframe scraped data is unavailable. in short wont scrape dont scrape..
// weather34 is happy to answer any questions if you get stuck..
// you can build your own menu and share with the meteobridge community a new option will appear to choose which custom menu to use
// by default this menu is dispalyed.
?>

<button>X</button></div> 
<div class="weather34-top-menu">
  
<a href="console-setup.php" target="_blank" data-title="Dashboard Setup">&nbsp;<?php echo $weather34settingsicon?>&nbsp;Dashboard Admin &nbsp;
<?php if($password==''){echo $weather34unlocked;}else echo $weather34locked; ?></a><br>

<?php //air quality indoor options if yes
if ($indooricon == "yes" && $davisairquality == "yes" && $davisairqualitylocation=="indoor") {
echo '<a  href="weather34-ev-air.php"  data-title="Indoor Enviroment">';echo $hometempmenu.'&nbsp;Indoor Air Quality</a><br>';}
else if ($indooricon == "yes" && $luftdatenhardware == "yes" && $lufdatenairqualitylocation=="indoor") {
echo '<a  href="weather34-ev-air-luftdaten.php"  data-title="Indoor Enviroment">';echo $hometempmenu.'&nbsp;Luftdaten Air Quality</a><br>';}
else if ($indooricon == "yes"){echo '<a  href="weather34-ev.php"  data-title="Indoor Enviroment">'; 
echo $hometempmenu.'&nbsp;Indoor Data</a><br>';}
?>

<?php //air quality CHART OPTION if yes
if ($davisairquality == "yes" && $purpleairhardware=="yes") {
echo '<a  href="air-quality-charts.php"  data-title="Air Quality">';
echo $weather34aqi2;echo "&nbsp;Air Quality Data</a><br>";}?>


<?php //air quality CHART OPTION if yes
if ($position10 == "weather34-lightning-chuck.php" OR  $position11 == "weather34-lightning-chuck.php" OR $position12 == "weather34-lightning-chuck.php" ) {
echo '<a href="lightning-almanac2.php" data-lity data-title="Lightning Almanac">';
echo $weather34_lightningdata;echo "&nbsp;Lightning Data</a><br>";}?>


<?php //Windy Radar with units switching 
echo '<a data-lity data-title="Windy Radar" 
<iframe width="100%" frameborder="0" style="border:0;" 
src="https://embed.windy.com/embed2.html?lat='.$lat.'&lon='.$lon.'&detailLat='.$lat.'&detailLon='.$lon.'
&width=650&height=450&zoom=8&level=surface&overlay=wind&product=ecmwf&menu=&message=false&marker=true&calendar=now&pressure=&type=map&location=coordinates&detail=&metricWind='.$weather["wind_units"].'&metricTemp=%C2%B0'.$weather["temp_units"].'&radarRange=-1" frameborder="0"></iframe>';
echo $weather34windyradar.'&nbsp;Windy Radar</a><br>';?>

<?php //Rainviwer Radar
echo '<a data-lity data-title="Rain Radar" 
<iframe src="https://www.rainviewer.com/map.html?loc='.$lat.','.$lon.',8&oFa=0&oC=0&oU=0&oCS=1&oF=0&oAP=0&rmt=4&c=1&o=83&lm=1&th=0&sm=1&sn=1" 
width="100%" frameborder="0" style="border:0;" allowfullscreen></iframe> ';
echo $weather34_rainradar.'&nbsp;Rain Radar</a><br>';?>

<?php //metar option if yes
if ($metar=='yes'){echo '<a href="metarnearby.php" data-lity data-title="Local Airport">'.$metarlocal.' &nbsp;Local Airport </a><br>';}?>

<?php //webcam option if yes
if ($webcamdevice == "yes") { echo '<a href="weather34-large-cam.php" data-lity data-title="Webcam">';echo $webcamicon2.'&nbsp;Webcam</a><br>';}?>
<?php //weather34 smart tv option if yes
if ($smarttv=='yes'){echo '<a href="weather34-tv.php" data-title="Smart TV">'. $weather34smtv.'&nbsp;Smart TV</a><br>';} ?>

<?php echo '<a href="weather34-mooninfo.php" data-lity data-title="Lunar Info">'.$weather34moonicon?>&nbsp;Moonphase Info</a><br>
<?php echo '<a href="weather34-meteor.php" data-lity data-title="Meteor Showers">'.$weather34meteoricon?>&nbsp;MeteorShower Info</a><br>

<a  href="weather34-template-legend.php" data-lity data-title="Hardware Info"> <?php echo $weather34hinfo;?>&nbsp; Hardware Info</a><br>

<?php //email contact form with anti-spam question
if ($displayemail== "yes"){?>
<a href="contact/contactform.htm" data-lity data-title="Contact"><?php echo $weather34mail?>&nbsp;Get in Touch</a><br>
<?php ;}?>
