<?php include('settings.php');?>

<script src="js/jquery.js"></script>

<script>
(function(a){a(document).ready(function(){a.ajaxSetup({cache:false,success:function(){a("#temperature").show()}});var c=a("#temperature");c.load("todaytempmodule.php");var b=setInterval(function(){c.load("todaytempmodule.php")},130000)})})(jQuery);
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#barometer").show()}});var c=a("#barometer");c.load("todaybarometermodule.php");var b=setInterval(function(){c.load("todaybarometermodule.php")},1300000 )})})(jQuery);
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#humidity").show()}});var c=a("#humidity");c.load("todayhumiditymodule.php");var b=setInterval(function(){c.load("todayhumiditymodule.php")},130000)})})(jQuery);

(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#wind").show()}});var c=a("#wind");c.load("todaywindavgmodule.php");var b=setInterval(function(){c.load("todaywindavgmodule.php")},130000)})})(jQuery);
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#gust").show()}});var c=a("#gust");c.load("todaywindspeedmodule.php");var b=setInterval(function(){c.load("todaywindspeedmodule.php")},130000)})})(jQuery);
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#direction").show()}});var c=a("#direction");c.load("todaywinddirmodule.php");var b=setInterval(function(){c.load("todaywinddirmodule.php")},130000)})})(jQuery);

(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#rain").show()}});var c=a("#rain");c.load("todayrainfallmodule.php");var b=setInterval(function(){c.load("todayrainfallmodule.php")},130000)})})(jQuery);

(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#airquality").show()}});var c=a("#airquality");c.load("todayairquality.php");var b=setInterval(function(){c.load("todayairquality.php")},130000)})})(jQuery);
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#uvindex").show()}});var c=a("#uvindex");c.load("todayuvindexmodule.php");var b=setInterval(function(){c.load("todayuvindexmodule.php")},130000)})})(jQuery);
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#solar").show()}});var c=a("#solar");c.load("todaysolarmodule.php");var b=setInterval(function(){c.load("todaysolarmodule.php")},130000)})})(jQuery);

(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#indoor").show()}});var c=a("#indoor");c.load("todayindoormodule.php");
var b=setInterval(function(){c.load("todayindoormodule.php")},130000)})})(jQuery);
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#clock").show()}});var c=a("#clock");c.load("weather34-clockphone.php");
var b=setInterval(function(){c.load("weather34-clockphone.php")},130000)})})(jQuery);
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#sunmoon").show()}});var c=a("#sunmoon");c.load("weather34-sun-moon.php");
var b=setInterval(function(){c.load("weather34-sun-moon.php")},130000)})})(jQuery);

(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#moon").show()}});var c=a("#moon");c.load("weather34-dayforecast.php");var b=setInterval(function(){c.load("weather34-dayforecast.php")},130000)})})(jQuery);
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#sun").show()}});var c=a("#sun");c.load("weather34-dayforecast-text.php");var b=setInterval(function(){c.load("weather34-dayforecast-text.php")},111300000)})})(jQuery);
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#time-date").show()}});var c=a("#time-date");c.load("weather34-info.php");var b=setInterval(function(){c.load("weather34-info.php")},111300000)})})(jQuery);
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



