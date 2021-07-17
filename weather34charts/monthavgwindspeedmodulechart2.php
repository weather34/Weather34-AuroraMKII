<?php
	
	####################################################################################################
	#	CREATED FOR WEATHER34 AURORA MKII TEMPLATE 											   #
	# https://weather34.com/homeweatherstation/index.html 											   # 
	# 	                                                                                               #
	# 	built on CanvasJs  	                                                                           #
	#   canvasJs.js is protected by CREATIVE COMMONS LICENCE BY-NC 3.0  	                           #
	# 	free for non commercial use and credit must be left in tact . 	                               #
	# 	                                                                                               #
	# 	Release December 2020					  	                                                   #
	# 	                                                                                               #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################
	
	
	include('preload.php');
	date_default_timezone_set($TZ);
	$weatherfile = date('F');
	$conv = 1;
	if ($windunit == 'mph') {$conv= '2.23694';}
	if ($windunit == 'm/s') {$conv= '1';}
	if ($windunit =='kts') {$conv= '1.94384';}
	if ($windunit =='km/h'){$conv= '3.5999916767997';}

		if ($windunit == 'mph') { $unit= 'mph';}
		if ($windunit =='m/s') { $unit= 'm/s';}
		if ($windunit =='km/h'){$unit= 'kmh';}
		if ($windunit =='kts') {$unit= 'kts';}
	
    echo '
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>OUTDOOR CHART</title>
		<style>@font-face {font-family: verb;src: url(fonts/verbatim-bold.woff2) format("woff2"), url(fonts/verbatim-bold.woff) format("woff");font-display: swap}</style>
		
	';	
	?>
    <br>
    <script type="text/javascript">

function WEATHER34CHARTCOLORS(weather34value) {
if (weather34value>=0 && weather34value<=10) {thecolor='hsl(201, 79%, 47%)';}
else if (weather34value>10 && weather34value<=20) {thecolor='hsl(75, 62%, 43%)';}
else if (weather34value>20 && weather34value<=30) {thecolor='hsl(35, 77%, 58%)';}
else if (weather34value>30 && weather34value<=40) {thecolor='hsl(19, 66%, 55%)';} 
else if (weather34value>40 && weather34value<=50) {thecolor='hsl(12, 80%, 52%)';}    
else if (weather34value>50 && weather34value<=200) {thecolor='hsl(2, 56%, 55%)';}            
else {thecolor='hsla(206, 12%, 27%, .4)';}
return thecolor;}

        $(document).ready(function () {
		var dataPoints1 = [];
		var dataPoints2 = [];
		$.ajax({
			type: "GET",
			url: "<?php echo date('Y');?>/<?php echo $weatherfile;?>.csv",
			dataType: "text",
			cache:false,
			success: function(data) {processData1(data),processData2(data);}
		});
	
	function processData1(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>0){
			
			for (var i = 0; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');
				if ( rowData[1] >-100)
					//dataPoints1.push({label:rowData[0],y:parseFloat(rowData[7]*<?php echo $conv ?>)});
					dataPoints1.push({label: rowData[0],y:parseFloat(rowData[7]*<?php echo $conv ;?>),color:WEATHER34CHARTCOLORS(parseFloat(rowData[7]*<?php echo $conv ;?>))});
				
					
					
			}
		}
		requestTempCsv();}function requestTempCsv(){}

	function processData2(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>0){
			
			for (var i = 0; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');
				if ( rowData[1] >-100)
					dataPoints2.push({label: rowData[0],y:parseFloat(rowData[7]*<?php echo $conv ?>)});
					//parseFloat(rowData[13])});
				
			}
			drawChart(dataPoints1,dataPoints2 );
		}
	}

	
	function drawChart( dataPoints1) {
		var chart = new CanvasJS.Chart("chartContainer2", {
		backgroundColor: "<?php echo $bcolor;?>",
		animationEnabled: false,
		 
		title: {
            text: " ",
			fontSize: 0,
			fontColor:' #aaa',
			fontFamily: "verb",
        },
		toolTip:{
			   fontStyle: "normal",
			   cornerRadius: 4,
			   backgroundColor: "#393F4D",	
			   fontColor:"#C3CED8",	
               borderThickness: 3,	
			   fontSize: 11,	   
			   toolTipContent: " x: {x} y: {y} <br/> name: {name}, label:{label} ",
			   shared: true, 
			   fontFamily: "verb", 
 },
		axisX: {
			gridColor: "rgba(82, 92, 97, 0.39)",
		    labelFontSize: 8,
			labelFontColor:'<?php echo $ccolor?>',
			lineThickness: 1,
			gridThickness: 1,
			gridDashType: "dot",	
			titleFontFamily: "verb",	
			labelFontFamily: "verb",	
			minimum:-0.5,	
			interval:5,	
			intervalType:"day",
			xValueType: "dateTime",	
			
			
			},
			
		axisY:{
		margin: 0,
		interval: 5,			
		lineThickness: 1,		
		gridThickness: 1,	
		gridDashType: "dot",	
        includeZero: false,
		gridColor: "rgba(82, 92, 97, 0.39)",
		labelFontSize: 8,
		labelFontColor:'<?php echo $ccolor?>',
		labelFontFamily: "verb",
			 
      },
	  
	  legend:{
      fontFamily: "verb",
      fontColor:"#555",
	  margin: 0,
  
 },
		
		
 data: [
		{
			type: "column",		
			showInLegend:false,
			fillOpacity: .8,
			name:"Avg Wind Speed ",
			dataPoints: dataPoints1,
			yValueFormatString:"## <?php echo $windunit;?>",
		},
		{
			// not used
			
		}

		]
		});

		setTimeout(function(){
		chart.render();
	},500);
		
	}
});</script>
<body>
</script>
<div id="chartContainer2" class="chartb"></div></div>


<div class="modulecaptionchart3">Average Wind Speed (<?php echo $windunit ;?>) <?php echo date('F')?></div> 

</body></html>