<script src="js/jquery.js"></script>

<script>
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#home").show()}});var c=a("#home");c.load("todayindoormodule-large.php");
var b=setInterval(function(){c.load("todayindoormodule-large.php")},1162000)})})(jQuery);

(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#home-humidity").show()}});var c=a("#home-humidity");c.load("todayindoor-humiditymodule-large.php");
var b=setInterval(function(){c.load("todayindoor-humiditymodule-large.php")},1162000)})})(jQuery);

(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#dayforecast").show()}});var c=a("#dayforecast");c.load("weather34-airquality-home.php");
var b=setInterval(function(){c.load("weather34-airquality-home.php")},1162000)})})(jQuery);//

(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#lightning").show()}});var c=a("#lightning");c.load("weather34-lightning-chuck-home.php");
var b=setInterval(function(){c.load("weather34-lightning-chuck-home.php")},1800000)})})(jQuery);//
</script>

