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
	$conv = 1;
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
		<title>OUTDOOR TEMPERATURE DATABASE CHART</title>
		
		
	';
	date_default_timezone_set($TZ);
	$date= date('D jS Y');$weatherfile =date('Y')."/".date('jMY');?>
    <br>
    	<script type="text/javascript">

function WEATHER34CHARTCOLORS(weather34value) {
if (weather34value>=0 && weather34value<=10) {thecolor='hsla(185, 100%, 37%, 1)';}
else if (weather34value>10 && weather34value<=20) {thecolor='hsl(75, 62%, 43%)';}
else if (weather34value>20 && weather34value<=30) {thecolor='hsl(35, 77%, 58%)';}
else if (weather34value>30 && weather34value<=40) {thecolor='hsl(19, 66%, 55%)';} 
else if (weather34value>40 && weather34value<=50) {thecolor='hsl(12, 80%, 52%)';}    
else if (weather34value>50 && weather34value<=200) {thecolor='hsl(2, 56%, 55%)';}            
else {thecolor='hsla(206, 12%, 27%, .4)';}
return thecolor;}


		// today temperature
        $(document).ready(function () {
		var dataPoints1 = [];
		var dataPoints2 = [];
		$.ajax({
			type: "GET",
			url: "<?php echo $weatherfile?>.csv",
			dataType: "text",
			cache:false,
			success: function(data) {processData1(data),processData2(data);}
		});
	
	function processData1(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>0){
			
			for (var i = 0; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');
				if ( rowData[2] >-150)
					//dataPoints1.push({label: rowData[1],y:parseFloat(rowData[6]*<?php echo $conv ?>)});
					dataPoints1.push({label: rowData[1],y:parseFloat(rowData[6]*<?php echo $conv ;?>),color:WEATHER34CHARTCOLORS(parseFloat(rowData[6]*<?php echo $conv ;?>))});
					
			}
		}
		requestTempCsv();}function requestTempCsv(){}

	function processData2(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>0){
			
			for (var i = 0; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');
				if ( rowData[2] >-150)
					dataPoints2.push({label: rowData[1],y:parseFloat(rowData[7]*<?php echo $conv ?>)});
					
				
			}
			drawChart(dataPoints1 , dataPoints2 );
		}
	}

		function drawChart( dataPoints1 , dataPoints2 ) {
		var chart = new CanvasJS.Chart("chartContainer2", {
		 backgroundColor: "<?php echo $bcolor;?>",
		 animationEnabled: false,
		 margin: 0,
		
		title: {
            text: "From 00:00 - <?php echo date('H:i')?>",
			fontSize: 0,
			fontColor:' #777',
			fontFamily: "verb",
			margin: -25,
        },
		zoomEnabled: false,
		//dataPointWidth: 1,
		toolTip:{
			   fontStyle: "normal",
			   cornerRadius: 4,
			   backgroundColor: "rgba(40, 45, 52,1)",	
			   fontColor: '#fff',	
               borderThickness: 3,	
			   fontSize: 11,	   
			   toolTipContent: " x: {x} y: {y} <br/> name: {name}, label:{label} ",
			   shared: true, 
			   fontFamily: "verb", 
 },
		axisX: {
			gridColor: "rgba(82, 92, 97, 0.39)",		    		
			lineThickness: 1,
			gridThickness: 1,
			gridDashType: "dot",	
			labelFontColor:'<?php echo $ccolor?>',
			labelFontFamily: "verb",
			
			labelFontSize:8,
			interval: 18,
   			intervalType: "hour",
			minimum:-0.5,
			crosshair: {
			enabled: true,
			snapToDataPoint: true,				
			labelFontSize:8,
			labelBackgroundColor: "#44a6b5",
			labelMaxWidth: 60,
		}
			
			},
			
		axisY:{
		margin: 0,
		interval:'auto',		
		lineThickness: 1,		
		gridThickness: 1,	
		gridDashType: "dot",	
        includeZero: false,
		gridColor: "rgba(82, 92, 97, 0.39)",
		labelFontSize: 8,
		labelFontColor:'<?php echo $ccolor?>',
		labelFontFamily: "verb",
		
		labelFormatter: function ( e ) {
        return e.value .toFixed(0);  
         },	
		crosshair: {
			enabled: true,
			snapToDataPoint: true,
			color: "#9aba2f",
			labelFontColor: "#fff",
			labelFontSize:9,
			labelBackgroundColor: "RGBA(208,95,45,1.00)",
			labelMaxWidth: 60,
			valueFormatString: "#0.#",
		}	 
      },
	  
	  legend:{
      fontFamily: "verb",
      fontColor:"#555",
	  margin: 0,
  
 },
		
		
		data: [
		{
			//wind speed
			type: "column",		
			showInLegend:false,
			fillOpacity: .8,
			name:"10 Min Max Wind Speed",
			dataPoints: dataPoints1,
			yValueFormatString:"#0.# <?php echo $windunit ;?>",
		}
		
		]
		});

		chart.render();
		
	}
});</script>
<body>
</script>
<div id="chartContainer2" class="chartb"></div></div>



</body></html>