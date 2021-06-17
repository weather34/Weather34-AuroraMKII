<?php include('settings.php');?>
<script src="js/jquery.js"></script>

<script>
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#wind").show()}});var c=a("#wind");c.load("monthavgwindspeedmodule.php");var b=setInterval(function(){c.load("monthavgwindspeedmodule.php")},1130000)})})(jQuery);
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#gust").show()}});var c=a("#gust");c.load("monthwindspeedmodule.php");var b=setInterval(function(){c.load("monthwindspeedmodule.php")},1130000)})})(jQuery);
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#airq").show()}});var c=a("#airq");c.load("monthpurpleairmodule.php");var b=setInterval(function(){c.load("monthpurpleairmodule.php")},1130000)})})(jQuery);
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#airqd").show()}});var c=a("#airqd");c.load("monthairqualitymodule.php");var b=setInterval(function(){c.load("monthairqulaitymodule.php")},1130000)})})(jQuery);

(function(a){a(document).ready(function(){a.ajaxSetup({cache:false,success:function(){a("#temperature").show()}});var c=a("#temperature");c.load("monthtemperaturemodule.php");var b=setInterval(function(){c.load("monthtemperaturemodule.php")},1130000)})})(jQuery);
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#dewpoint").show()}});var c=a("#dewpoint");c.load("monthdewpointmodule.php");var b=setInterval(function(){c.load("monthdewpointmodule.php")},1130000)})})(jQuery);

(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#rain").show()}});var c=a("#rain");c.load("monthrainfallmodule.php");var b=setInterval(function(){c.load("monthrainfallmodule.php")},1130000)})})(jQuery);
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#barometer").show()}});var c=a("#barometer");c.load("monthbarometermodule.php");var b=setInterval(function(){c.load("monthbarometermodule.php")},11300000 )})})(jQuery);

(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#uvindex").show()}});var c=a("#uvindex");c.load("monthuvindexmodule.php");var b=setInterval(function(){c.load("monthuvindexmodule.php")},11300000 )})})(jQuery);
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#solar").show()}});var c=a("#solar");c.load("monthsolarmodule.php");var b=setInterval(function(){c.load("monthsolarmodule.php")},11300000 )})})(jQuery);
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#winddir").show()}});var c=a("#winddir");c.load("monthwinddirmodule.php");var b=setInterval(function(){c.load("monthwinddirmodule.php")},11300000 )})})(jQuery);
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#theclock").show()}});var c=a("#theclock");c.load("weather34-clockphone.php");var b=setInterval(function(){c.load("weather34-clockphone.php")},11300000 )})})(jQuery);
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#moonsun").show()}});var c=a("#moonsun");c.load("weather34-sun-moon.php");var b=setInterval(function(){c.load("weather34-sun-moon.php")},11300000)})})(jQuery);



(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#moon").show()}});var c=a("#moon");c.load("weather34-dayforecast.php");var b=setInterval(function(){c.load("weather34-dayforecast.php")},130000)})})(jQuery);
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#sun").show()}});var c=a("#sun");c.load("weather34-dayforecast-text.php");var b=setInterval(function(){c.load("weather34-dayforecast-text.php")},111300000)})})(jQuery);
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#time-date").show()}});var c=a("#time-date");c.load("weather34-info.php");var b=setInterval(function(){c.load("weather34-info.php")},111300000)})})(jQuery);</script>

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
var h=months[e.getMonth()];
var b=e.getDate();
<?php if($clockformat=='12') {echo "if(e.getHours()<12){amorpm=' am'}else{amorpm=' pm'}";} else {echo "amorpm='';";}?>
// add the weather34 date prefix
var suffix = "";switch(b) {case 1: case 21: case 31: suffix = 'st'; break;case 2: case 22: suffix = 'nd'; break;case 3: case 23: suffix = 'rd'; break;default: suffix = 'th';}
var i=weekdays[e.getDay()];if(a<10){a="0"+a}if(g<10){g="0"+g}if(c<10){c="0"+c}
//weather34 option to use 24/12 hour format
var c=e.getHours()
<?php if ($clockformat == '12') { echo '% 12 || 12';} else { echo '% 24 || 00';}?>;
document.getElementById("weather34clock4").innerHTML="<div class='clock3'><time> "+c+":"+a+":"+g+
"<?php if($clockformat=='12') {echo "".date('a')."";} else {echo "";}?>"}
function StartClock(){clockID=setInterval(UpdateClock,500)}
function KillClock(){clearTimeout(clockID)}window.onload=function(){StartClock()}(jQuery);</script></time>
</div></div>


<script> //weather34 theme switcher
function setTheme(themeName) {localStorage.setItem('weather34theme', themeName);  document.documentElement.className = themeName;}
function toggleTheme() {if (localStorage.getItem('weather34theme') === 'theme-dark') {setTheme('theme-light');} else {setTheme('theme-dark');}}
(function () {if (localStorage.getItem('weather34theme') === 'theme-dark') {setTheme('theme-dark');document.getElementById('weather34themeslider').checked = true;
} else {setTheme('theme-light');document.getElementById('weather34themeslider').checked = false; }
})();        
</script>
