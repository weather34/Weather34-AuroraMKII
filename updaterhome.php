<script src="js/jquery.js"></script>

<script>
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#home").show()}});var c=a("#home");c.load("todayindoormodule-large.php");
var b=setInterval(function(){c.load("todayindoormodule-large.php")},1162000)})})(jQuery);

(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#home-humidity").show()}});var c=a("#home-humidity");c.load("todayindoor-humiditymodule-large.php");
var b=setInterval(function(){c.load("todayindoor-humiditymodule-large.php")},1162000)})})(jQuery);

(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#dayforecast").show()}});var c=a("#dayforecast");c.load("weather34-dayforecast-home.php");
var b=setInterval(function(){c.load("weather34-dayforecast-home.php")},1800000)})})(jQuery);//
(function(a){a(document).ready(function(){a.ajaxSetup({cache:true,success:function(){a("#lightning").show()}});var c=a("#lightning");c.load("weather34-dayforecast-text-home.php");
var b=setInterval(function(){c.load("weather34-dayforecast-text-home.php")},1800000)})})(jQuery);//

</script>



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

