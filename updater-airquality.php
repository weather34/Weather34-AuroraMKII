<?php include('settings.php');?>
<script src="js/jquery.js"></script>

<script>

(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#airq").show()}});var c=a("#airq");c.load("today-air-quality-module.php");
var b=setInterval(function(){c.load("today-air-quality-module.php")},1130000)})})(jQuery);

(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#airqmonth").show()}});var c=a("#airqmonth");c.load("monthairqualitymodule.php");
var b=setInterval(function(){c.load("monthairqualitymodule.php")},1130000)})})(jQuery);

(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#airqyear").show()}});var c=a("#airqyear");c.load("yearairqualitymodule.php");
var b=setInterval(function(){c.load("yearairqualitymodule.php")},1130000)})})(jQuery);

(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#pairq").show()}});var c=a("#pairq");c.load("todayairquality.php");
var b=setInterval(function(){c.load("todayairquality.php")},1130000)})})(jQuery);

(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#pairqmonth").show()}});var c=a("#pairqmonth");c.load("monthpurpleairmodule.php");
var b=setInterval(function(){c.load("monthpurpleairmodule.php")},1130000)})})(jQuery);

(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#pairqyear").show()}});var c=a("#pairqyear");c.load("yearpurpleairmodule.php");
var b=setInterval(function(){c.load("yearairpurpleairmodule.php")},1130000)})})(jQuery);


(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#aqp").show()}});var c=a("#aqp");c.load("weather34-airquality.php");var b=setInterval(function(){c.load("weather34-airquality.php")},130000)})})(jQuery);
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#aqd").show()}});var c=a("#aqd");c.load("weather34-purple-air-voc.php");
var b=setInterval(function(){c.load("weather34-purple-air-voc.php")},111300000)})})(jQuery);
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#aql").show()}});var c=a("#aql");c.load("weather34-airquality-davis.php");
var b=setInterval(function(){c.load("weather34-airquality-davis.php")},111300000)})})(jQuery);

(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#moon").show()}});var c=a("#moon");c.load("weather34-dayforecast.php");
var b=setInterval(function(){c.load("weather34-dayforecast.php")},11300000)})})(jQuery);
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#sun").show()}});
var c=a("#sun");c.load("weather34-dayforecast-text.php");var b=setInterval(function(){c.load("weather34-dayforecast-text.php")},111300000)})})(jQuery);
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#time-date").show()}});
var c=a("#time-date");c.load("weather34-info.php");var b=setInterval(function(){c.load("weather34-info.php")},111300000)})})(jQuery); 
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



<script>//weather menu sidebar
//theme/color-scheme
function setTheme(themeName) {
localStorage.setItem('weather34theme', themeName);
 document.documentElement.className = themeName;
        }
        // toggle between light and dark theme
        function toggleTheme() {
        if (localStorage.getItem('weather34theme') === 'theme-dark') {setTheme('theme-light');} else {setTheme('theme-dark');}}
        // set the theme on initial load
        (function () {if (localStorage.getItem('weather34theme') === 'theme-dark') {setTheme('theme-dark');document.getElementById('weather34themeslider');} 
         else {setTheme('theme-light');document.getElementById('weather34themeslider');}})();
</script>
