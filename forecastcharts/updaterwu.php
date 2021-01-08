<?php include('../settings.php');?>
<script src="../js/jquery.js"></script>

<script type="text/javascript">
var clockID;var yourTimeZoneFrom='<?php echo $UTC?>';var d=new Date();
var weekdays=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
var months=["January","Febuary","March","April","May","June","July","August","September","October","November","December"];
var tzDifference=yourTimeZoneFrom*60+d.getTimezoneOffset();var offset=tzDifference*60*1000;function UpdateClock(){var e=new Date(new Date().getTime()+offset);var c=e.getHours();var a=e.getMinutes();var g=e.getSeconds();var f=e.getFullYear();var h=months[e.getMonth()];var b=e.getDate();var b=e.getDate();
var suffix = "";switch(b) {case 1: case 21: case 31: suffix = 'st'; break;case 2: case 22: suffix = 'nd'; break;case 3: case 23: suffix = 'rd'; break;default: suffix = 'th';}
var i=weekdays[e.getDay()];if(a<10){a="0"+a}if(g<10){g="0"+g}if(c<10){c="0"+c}
document.getElementById("weather34clock4").innerHTML="<div class='thedate3'> "+i+" "+h+" "+b+suffix+" "+f+" </div><div class='clock3'><time> "+c+":"+a+":"+g}
function StartClock(){clockID=setInterval(UpdateClock,500)}function KillClock(){clearTimeout(clockID)}window.onload=function(){StartClock()}(jQuery);</script></time>
</div></div>
