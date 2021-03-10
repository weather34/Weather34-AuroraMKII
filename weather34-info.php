<?php 
	####################################################################################################
	#	HOME WEATHER STATION TEMPLATE by BRIAN UNDERDOWN 2015-2016-2017                                #
	#	CREATED FOR HOMEWEATHERSTATION TEMPLATE at 													   #
	#   https://weather34.com/homeweatherstation/index.html 										   # 
	# 	WEATHER STATION TEMPLATE 2015-2017                 										       #
	# 	     MB SMART Version Revised September 2019 								                   #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################
//original weather34 script original css/svg/php by weather34 2015-2019 clearly marked as original by weather34//
include('livedata.php');header('Content-type: text/html; charset=utf-8');	?>
<div class="sunblock">

<div class="button button-dial-small">      
<div class="button-dial-top-small"></div>
<div class="button-dial-label-small">   
<infoicon>    
<?php 
echo 'Info'
?>  </infoicon>
</div>


<div class="info-1"> 
CSS/SVG/PHP scripts were developed by <a href="https://weather34.com/homeweatherstation" target="_blank" title="weather34 info page" alt="weather34 info page" class="info2a">
weather34.com</a> © 2015-<?php echo date('Y');?>.
</div>

<div class="info-2"> 
Data Charts compiled with <a href="https://canvasjs.com/" target="_blank" title="https://canvasjs.com/" alt="https://canvasjs.com/" class="info2a">CanvasJs.com</a> 
v2.3.1 GA (CC BY-NC 3.0) Non-Commercial-Version. <br>
<info2b>* © 2015-<?php echo date('Y');?> weather<blue>34</blue> Aurora MKII</info2b>
</div>