<?php 
	####################################################################################################
	#	TEMPLATE by BRIAN UNDERDOWN 2015-20                                                              #
	#	CREATED FOR WEATHER34  								                                                           #
	#   https://weather34.com/homeweatherstation/index.html 										                       # 
	# 	                                                                                               #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################
//original weather34 script original css/svg/php by weather34 2015-2020 clearly marked as original by weather34//
include('livedata.php');
include('updaterhome.php');
header('Content-type: text/html; charset=utf-8');
$fallingsymbolsmallhome='<svg id="falling" width="20" height="20" viewBox="0 0 24 24"><polyline points="23 18 13.5 8.5 8.5 13.5 1 6" fill="none" stroke="#aaa" 
stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
<polyline points="17 18 23 18 23 12" fill="none" stroke="#00adbd" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>';
$risingsymbolsmallhome='<svg id="rising" width="20" height="20" viewBox="0 0 24 24">
<polyline points="23 6 13.5 15.5 8.5 10.5 1 18" fill="none" stroke="#aaa" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
<polyline points="17 6 23 6 23 12" fill="none" stroke="#d87040" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></svg>';

$selectunit='<svg class="icon select unit" width="14" height="14" viewBox="0 0 24 24" stroke-width="2" stroke="var(--blue)" fill="none" stroke-linecap="round" stroke-linejoin="round">
<path stroke="none" d="M0 0h24v24H0z"/>
<path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
<circle cx="12" cy="12" r="3" />
</svg>';
$backtohome='<svg width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="var(--blue)" fill="none" stroke-linecap="round" stroke-linejoin="round">
<path stroke="0" d="M0 0h24v24H0z" stroke-width="0"/><rect x="3" y="4" width="18" height="16" rx="3" /><circle cx="9" cy="10" r="2" stroke="#ccc"/>
<line x1="15" y1="8" x2="17" y2="8" stroke="0" stroke-width="0"/><line x1="15" y1="12" x2="17" y2="12" stroke="#777"/>
<line x1="7" y1="16" x2="17" y2="16" stroke="#777"/></svg>';

$aqiweather["temp"]     = $weather["temp_indoor"];
$aqiweather["indoorfeels"]     = $weather["temp_indoor_feel"];
$aqiweather["indoorfeelsphrase"]     = $weather["temp_indoor_feel"] - $weather["temp_indoor"];
$aqiweather["humidity"]     = $weather["humidity_indoor"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
<title>Weather34 EV/Indoor Information</title>
<meta http-equiv="refresh" content="300">
<meta name="title" content="Weather34 EV/Indoor Information">
<meta name="description" content="Weather34 EV/Indoor Information">
<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=yes">
<meta name="apple-mobile-web-app-title" content="Weather34 Console">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-title" content="Weather34">
<meta name="application-name" content="Weather34 EV/Indoor Information">
<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="192x192" href="favicon/android-chrome-192x192.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
<link rel="manifest" href="favicon/site.webmanifest">
<link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-TileImage" content="favicon/mstile-144x144.png">
<meta name="theme-color" content="#ffffff">
<link href="dark-indoor.css?version=<?php echo filemtime('dark-indoor.css') ?>" rel="stylesheet prefetch">
<script src="js/jquery.js"></script>
<main class="gridtopbar">
<bar>

<dashboardicon>
<a  href="index.php" data-title="Dashboard"><?php echo $backtohome?></a>
</dashboardicon>

<selectunit>
<?php 
  if ($units=='us') {  // METRIC OPTION
    echo $selectunit; echo '<a  href="?units=metric" data-title="Metric Units"> &deg;C</a>';}  
  else if ($units=='metric'){ // OPTION F
    echo $selectunit; echo '<a  href="?units=us" data-title="Imperial Units"> &deg;F</a>';} 
    else if ($units==''){ // OPTION F
      echo $selectunit; echo '<a  href="?units=us" data-title="Imperial Units"> &deg;F</a>';}      
?>
</selectunit>
</bar>
</main>
<main class="grid">
<article> 

<div class=actualt>Indoor Temperature </div> 
<div class="button button-dial-small">   
   <div class="button-dial-top-small"></div>
<div class="button-dial-label-small"> 
<?php //pa temp
if($weather["temp_units"]=='C' && $aqiweather["temp"] >=30){ echo "<deepred>".$aqiweather["temp"] ."</deepred>";}
else if($weather["temp_units"]=='C' && $aqiweather["temp"] >=25){ echo "<red>".$aqiweather["temp"] ."</red>";}
else if($weather["temp_units"]=='C' && $aqiweather["temp"] >=20){ echo "<orange>".$aqiweather["temp"] ."</orange>";}
else if($weather["temp_units"]=='C' && $aqiweather["temp"] >=15){ echo "<yellow>".$aqiweather["temp"] ."</yellow>";}
else if($weather["temp_units"]=='C' && $aqiweather["temp"] >=10){ echo "<green>".$aqiweather["temp"] ."</green>";}
else if($weather["temp_units"]=='C' && $aqiweather["temp"] >-50){ echo "<blue>".$aqiweather["temp"] ."</blue>";}
//f
if($weather["temp_units"]=='F' && $aqiweather["temp"] >=86){ echo "<deepred>".$aqiweather["temp"] ."</deepred>";}
else if($weather["temp_units"]=='F' && $aqiweather["temp"] >=77){ echo "<red>".$aqiweather["temp"] ."</red>";}
else if($weather["temp_units"]=='F' && $aqiweather["temp"] >=68){ echo "<orange>".$aqiweather["temp"] ."</orange>";}
else if($weather["temp_units"]=='F' && $aqiweather["temp"] >=59){ echo "<yellow>".$aqiweather["temp"] ."</yellow>";}
else if($weather["temp_units"]=='F' && $aqiweather["temp"] >=50){ echo "<green>".$aqiweather["temp"] ."</green>";}
else if($weather["temp_units"]=='F' && $aqiweather["temp"] >-50){ echo "<blue>".$aqiweather["temp"] ."</blue>";}
echo "<pm25>&deg;";?>
</pm25></div> 

</div> 
<trend>
<?php 

if($weather["temp_indoor_trend"] >0)echo "&nbsp;".number_format($weather["temp_indoor_trend"],1)."&deg;&nbsp;" .$risingsymbolsmallhome;
else if($weather["temp_indoor_trend"]<0)echo "&nbsp;".number_format($weather["temp_indoor_trend"],1)."&deg;&nbsp;" .$fallingsymbolsmallhome;
?></trend>

<unit>
<?php echo "&deg;".$weather["temp_units"]?>
</unit>
</div>

</article>



<article>
<div class=actualt>Indoor Humidity</div> 
<div class="button button-dial-small">   
<div class="button-dial-top-small"></div>
<div class="button-dial-label-small"> 
<?php 
if($aqiweather["humidity"] >=70){ echo "<blue>".$aqiweather["humidity"] ."</blue>";}
else if($aqiweather["humidity"]  >=40){ echo "<yellow>".$aqiweather["humidity"] ."</yellow>";}
else if($aqiweather["humidity"]  >=0){ echo "<red>".$aqiweather["humidity"] ."</red>";}
echo "<pm25>%</pm25>";
?>
</div> 
</div> 
<trend>
<?php 

if($weather["humidity_indoortrend"] >0)echo "&nbsp;".$weather["humidity_indoortrend"]."<pm25>%</pm25>&nbsp;" .$risingsymbolsmallhome;
else if($weather["humidity_indoortrend"]<0)echo "&nbsp;".$weather["humidity_indoortrend"]."<pm25>%</pm25>&nbsp;" .$fallingsymbolsmallhome;
?></trend>
<unit>RH</unit>

<div class="humidityfeel">
<?php //PA Humidity
if($aqiweather["humidity"] >=70){ echo "<blue>Discomfort</blue>";}
else if($aqiweather["humidity"]  >=40){ echo "<yellow>Comfortable</yellow>";}
else if($aqiweather["humidity"]  >=0){ echo "<red>Dry</red>";}
?>
</div>


</article>


<article> 
<div class=actualt>Indoor Feelslike</div> 
<div class="button button-dial-small">   
   <div class="button-dial-top-small"></div>
<div class="button-dial-label-small"> 
<?php //pa temp
if($weather["temp_units"]=='C' && $aqiweather["temp"] >=30){ echo "<deepred>".$aqiweather["indoorfeels"] ."</deepred>";}
else if($weather["temp_units"]=='C' && $aqiweather["indoorfeels"] >=25){ echo "<red>".$aqiweather["indoorfeels"] ."</red>";}
else if($weather["temp_units"]=='C' && $aqiweather["indoorfeels"] >=20){ echo "<orange>".$aqiweather["indoorfeels"] ."</orange>";}
else if($weather["temp_units"]=='C' && $aqiweather["indoorfeels"] >=15){ echo "<yellow>".$aqiweather["indoorfeels"] ."</yellow>";}
else if($weather["temp_units"]=='C' && $aqiweather["indoorfeels"] >=10){ echo "<green>".$aqiweather["indoorfeels"] ."</green>";}
else if($weather["temp_units"]=='C' && $aqiweather["indoorfeels"] >-50){ echo "<blue>".$aqiweather["indoorfeels"] ."</blue>";}
//f
if($weather["temp_units"]=='F' && $aqiweather["indoorfeels"] >=86){ echo "<deepred>".$aqiweather["indoorfeels"] ."</deepred>";}
else if($weather["temp_units"]=='F' && $aqiweather["indoorfeels"] >=77){ echo "<red>".$aqiweather["indoorfeels"] ."</red>";}
else if($weather["temp_units"]=='F' && $aqiweather["indoorfeels"] >=68){ echo "<orange>".$aqiweather["indoorfeels"] ."</orange>";}
else if($weather["temp_units"]=='F' && $aqiweather["indoorfeels"] >=59){ echo "<yellow>".$aqiweather["indoorfeels"] ."</yellow>";}
else if($weather["temp_units"]=='F' && $aqiweather["indoorfeels"] >=50){ echo "<green>".$aqiweather["indoorfeels"] ."</green>";}
else if($weather["temp_units"]=='F' && $aqiweather["indoorfeels"] >-50){ echo "<blue>".$aqiweather["indoorfeels"] ."</blue>";}
echo "<pm25>&deg;";?>
</pm25></div> 

</div> 
<trend>
<?php 
//indoor temp trend
str_replace("-","",$aqiweather["indoorfeelsphrase"]);
if($aqiweather["indoorfeelsphrase"] >0)echo "&nbsp;".number_format(str_replace("+","",$aqiweather["indoorfeelsphrase"]),1)."&deg;&nbsp;<span><orange>Warm</orange></span> ";
else if($aqiweather["indoorfeelsphrase"] <0)echo "&nbsp;".number_format(str_replace("-","",$aqiweather["indoorfeelsphrase"]),1)."&deg;<span>&nbsp;<blue>Cooler</blue></span>";
?>
</trend>
<unit>
<?php echo "&deg;".$weather["temp_units"]?>
</unit>

</div>
</article>
</main>

<main class="gridgraph2">

<articlegraph>
  <div id="home"></div>
</articlegraph>

<articlegraph>
  <div id="home-humidity"></div>
</articlegraph>
</main>

<main class="grid">

<article2>  
  <div class=actualtlocal></div>   
    <div class="weather34-container-clock">
        <div class="weather34-large-clock">
            <div class="hour-indicator twelve"></div>
            <div class="hour-indicator three"></div>
            <div class="hour-indicator six"></div>
            <div class="hour-indicator weather34brand"></div>
            <div class="hour-indicator nine"></div>
            <div class="weather34-small-clock">
            <div class="circle"></div>
            </div>
            <div class="hand hour" id="hour"></div>
            <div class="hand minute" id="minute"></div>
            <div class="hand second" id="second"></div>
        </div>
    </div>
<script>
// Based on Dribbble design adapted by weather34 with time based on your settings 
// https://dribbble.com/shots/8200836-Skeuomorph-Clock-App
var secondHand = document.getElementById("second");
var minuteHand = document.getElementById("minute");
var hourHand = document.getElementById("hour");
var offset=<?php echo $UTC;?>;
setInterval(setClock, 1000);
function setClock() {
  var e=new Date(new Date().getTime()+offset);
  var c=e.getHours();
  var a=e.getMinutes();
  var g=e.getSeconds();
  var f=e.getFullYear();
  var h=e.getMonth();
  var b=e.getDate();
  var b=e.getDate();
  var secondsRatio = e.getSeconds() / 60;
  var minutesRatio = (secondsRatio + e.getMinutes()) / 60;
  var hoursRatio = (minutesRatio + e.getHours()) / 12;
    setRotation(secondHand, secondsRatio);
    setRotation(minuteHand, minutesRatio);
    setRotation(hourHand, hoursRatio);}
function setRotation(element, rotationRatio) {
    element.style.setProperty('--rotation', rotationRatio * 360)
}
setClock();
  </script>


<script type="text/javascript">
var clockID;var yourTimeZoneFrom='<?php echo $UTC?>';var d=new Date();
var weekdays=[];
var months=[];
//calculte the weather34 date-time UTC
var tzDifference=yourTimeZoneFrom*60+d.getTimezoneOffset();
var offset=tzDifference*60*1000;
function UpdateClock(){
var e=new Date(new Date().getTime()+offset);
var a=e.getMinutes();
var g=e.getSeconds();
var f=e.getFullYear();
var h=e.getMonth();
var b=e.getDate();
<?php if($clockformat=='12') {echo "if(e.getHours()<12){amorpm=' am'}else{amorpm=' pm'}";} else {echo "amorpm='';";}?>
// add the weather34 date prefix
var suffix = "";switch(b) {case 1: case 21: case 31: suffix = 'st'; break;case 2: case 22: suffix = 'nd'; break;case 3: case 23: suffix = 'rd'; break;default: suffix = 'th';}
var i=weekdays[e.getDay()];if(a<10){a="0"+a}if(g<10){g="0"+g}if(c<10){c="0"+c}
//weather34 option to use 24/12 hour format
var c=e.getHours()
<?php if ($clockformat == '12') { echo '% 12 || 12';} else { echo '% 24 || 00';}?>;
document.getElementById("weather34clock2").innerHTML="<div class='clock34'>"+c+":"+a+":"+g+
"<?php if($clockformat=='12') {echo "&nbsp;".date('a')."";} else {echo "&nbsp;";}?>"}
function StartClock(){clockID=setInterval(UpdateClock,500)}
function KillClock(){clearTimeout(clockID)}window.onload=function(){StartClock()}(jQuery);</script>
</div></div>
<div id="weather34clock2"></div>

</article2> 

  <article2>     
  <script>$( document ).ready( function() {
  $('.day').remove();
  var start = new Date(new Date().getTime()+offset);
  current_date(start);
  let days = numDays(start.getMonth(), start.getYear());
  displayDays(start, days);
  let currDay = start.getDate();
  console.log(currDay);
  $('.day:nth-of-type('+currDay+')').css('background', ' rgb(236, 81, 19)').css('box-shadow','none'); 
 
});
var d = new Date(new Date().getTime()+offset);
var weekday = new Array(7);
weekday[0] = "Sunday";
weekday[1] = "Monday";
weekday[2] = "Tuesday";
weekday[3] = "Wednesday";
weekday[4] = "Thursday";
weekday[5] = "Friday";
weekday[6] = "Saturday";
var n = weekday[d.getDay()];
// Formatting current date
function current_date(curr_date) {
  var string = weekday[d.getDay()]+ " " + currMonth(curr_date) + " " + curr_date.getDate() + "";
  $(".curr_date").text(string);
}
function currMonth(date) {
  var months = ['January', 'Febuary', 'March', 'April', 'May',
  'June', 'July', 'August', 'September', 'October',
  'November', 'December'];
  return months[date.getMonth()];
}

function currDay(date) {
  var months = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
  return months[date.getDay()];
}
// input month and year, return number of days in month
function numDays(month, year) {
  if (month == 1) {
    if(leapYear(year)) {
      return 29;
    } else {
      return 28;
    }
  }
  if(month == 0 || month == 2 || month == 4 || month == 6 || month == 7 || month == 9 || month == 11) {
    return 31;
  } else {
    return 30;
  }
}
// input - year, returns true if leap year, otherwise - false
function leapYear(year) {
  if(year % 4 == 0) {
      if(year % 100 == 0) {
        if(year % 400 == 0) {
          return true;
        } else {
          return false;
        }  
      } else {
        return true;
      }
  } else {
    return false;
  } 
}

function setMonth(start, dir) {
  var newDate = start.setMonth(start.getMonth() + dir);
  return newDate;
}

function displayDays(date, days) {
  for(i = 0; i < days; i++) {
    $("<div></div>")
      .addClass("day")
      .text(i+1)
      .appendTo($('.days'));
  }
  
  $('.day:first-of-type').addClass("day_1");
  // day_1 is ... day of the week
  var day_1 = new Date(date.getFullYear(), date.getMonth(), 1);
  var start_col = day_1.getDay() + 1;

  $('.day:first-of-type').css('grid-column-start', start_col.toString());
  $('h1').text(currMonth(date) + " " + date.getFullYear());
}
</script>
  <div class="curr_date"></div>
    <div class="wrapper">
    <ul class="weather34weekdays">
        <?php $datecolor=date('D');?>
        <li><?php if ($datecolor=='Sun'){echo '<todayorange>Sun</todayorange>';}else echo 'Sun';?></li>
 				<li><?php if ($datecolor=='Mon'){echo '<todayorange>Mon</todayorange>';}else echo 'Mon';?></li>
 				<li><?php if ($datecolor=='Tue'){echo '<todayorange>Tue</todayorange>';}else echo 'Tue';?></li>
 				<li><?php if ($datecolor=='Wed'){echo '<todayorange>Wed</todayorange>';}else echo 'Wed';?></li>
 				<li><?php if ($datecolor=='Thu'){echo '<todayorange>Thu</todayorange>';}else echo 'Thu';?></li>
 				<li>&nbsp;<?php if ($datecolor=='Fri'){echo '<todayorange>Fri</todayorange>';}else echo 'Fri';?></li>
 				<li><?php if ($datecolor=='Sat'){echo '<todayorange>Sat</todayorange>';}else echo 'Sat';?></li>
 			</ul>  
    <div class="gridcal">  
        
      <div class="days">
        <div class="day day_1">1</div>
        <div class="day">2</div>
        <div class="day">3</div>
        <div class="day">4</div>
        <div class="day">5</div>
        <div class="day">6</div>
        <div class="day">7</div>
        <div class="day">8</div>
        <div class="day">9</div>
        <div class="day">10</div>
        <div class="day">11</div>
        <div class="day">12</div>
        <div class="day">13</div>
        <div class="day">14</div>
        <div class="day">15</div>
        <div class="day">16</div>
        <div class="day">17</div>
        <div class="day">18</div>
        <div class="day">19</div>
        <div class="day">20</div>
        <div class="day">21</div>
        <div class="day">22</div>
        <div class="day">23</div>
        <div class="day">24</div>
        <div class="day">25</div>
        <div class="day">26</div>
        <div class="day">27</div>
        <div class="day">28</div>
        <div class="day">29</div>
        </div> 
      </div>      
    </div>    
  </article2>

  
<article3> <br> 
      <div id=dayforecast></div></li2>        
 <br>
      <div id=lightning></div></li2>        
</article3> 

</main>
<main class="gridfooter">
<article> 
<version><?php echo "Weather<blue>34</blue> ".$weather34version ;?></version>
</article> 
</main>
</html>