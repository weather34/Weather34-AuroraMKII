<?php
	
	####################################################################################################
	#	CREATED FOR HOMEWEATHERSTATION MB SMART TEMPLATE 											   #
	# https://weather34.com/homeweatherstation/index.html 											   # 
	# 	                                                                                               #
	# 	built on CanvasJs  	                                                                           #
	#   canvasJs.js is protected by CREATIVE COMMONS LICENCE BY-NC 3.0  	                           #
	# 	free for non commercial use and credit must be left in tact . 	                               #
	# 	                                                                                               #
	# 	Release: July 2019						  	                                                   #
	# 	                                                                                               #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################
	
	
	include('preload.php');
	$conv = 1;		
	if ($tempunit == 'F') {$conv= 0.02953 ;}	
	else if ($tempunit == 'C' && $position8=='barometer-modmmHG.php') {$conv= 0.750062;}
	$int = 5;	
	if ($tempunit == 'F') {$int= 0.5;}		

	if ($weather["barometer_units"] == 'inHg') {$pressureunit= 'inHg';}
	else if ($weather["barometer_units"] == 'hPa') {$pressureunit= 'hPa';}
	else if ($weather["barometer_units"] == 'mb') {$pressureunit='mb';}
	if ($position8=='barometer-modmmHG.php') {$pressureunit= 'mmHG';}
	
    echo '
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>OUTDOOR Barometer CHART</title>	
		<script src=../js/jquery.js></script>
		
	';
	date_default_timezone_set($TZ);
	$weatherfile =date('Y')."/".date('jMY');?>
	
    <br>	
	<script type="text/javascript">
	function WEATHER34CHARTCOLORS(weather34value) {
	if (weather34value>=900 && weather34value<=1000) {thecolor='hsla(185, 100%, 37%, 1)';}
else if (weather34value>1000 && weather34value<=1010) {thecolor='hsl(75, 62%, 43%)';}
else if (weather34value>1010 && weather34value<=1020) {thecolor='hsl(35, 77%, 58%)';}
else if (weather34value>1020 && weather34value<=1030) {thecolor='hsl(19, 66%, 55%)';} 
else if (weather34value>1030 && weather34value<=1040) {thecolor='hsl(12, 80%, 52%)';}    
else if (weather34value>1040 && weather34value<=1060) {thecolor='hsl(2, 56%, 55%)';}            
else {thecolor='hsla(206, 12%, 27%, .4)';}
return thecolor;}
	// today barometer
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
					//dataPoints1.push({label:rowData[1],y:parseFloat(rowData[3] *<?php echo $conv ?>)});		
					dataPoints1.push({label: rowData[1],y:parseFloat(rowData[3]*<?php echo $conv ;?>),color:WEATHER34CHARTCOLORS(parseFloat(rowData[3]))});
					
					}
		}
		requestTempCsv();}function requestTempCsv(){}

		function processData2(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>0){
			
			for (var i = 0; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');
				
					dataPoints2.push({label:rowData[1],y:parseFloat(rowData[3]*<?php echo $conv ?>)});
				
			}
			drawChart(dataPoints1 );
		}
	}

	
	function drawChart( dataPoints1) {
		var chart = new CanvasJS.Chart("chartContainer2", {
		backgroundColor: "rgba(40, 45, 52,0)",
		animationEnabled: false,
		 
		title: {
            text: " ",
			fontSize: 0,
			fontColor:' #aaa',
			fontFamily: "arial",
        },
		toolTip:{
			   fontStyle: "normal",
			   cornerRadius: 4,
			   backgroundColor: "rgba(40, 45, 52,1)",	
			   fontColor: '#fff',	
               borderThickness: 3,	
			   fontSize: 11,	   
			   toolTipContent: " x: {x} y: {y} <br/> name: {name}, label:{label} ",
			   shared: true, 
 },
		axisX: {
			gridColor: "rgba(82, 92, 97, 0.39)",		    		
			lineThickness: 1,
			gridThickness: 1,
			gridDashType: "dot",	
			labelFontColor:' #888',
			labelFontFamily: "Arial",
			labelFontWeight: "bold",
			labelFontSize:7.5,
			interval: 18,
   			intervalType: "hour",
			minimum:0,
			crosshair: {
			enabled: true,
			snapToDataPoint: true,				
			labelFontSize:7,
			labelBackgroundColor: "#44a6b5",
			labelMaxWidth: 60,
			
		}
			
			},
			
		axisY:{
		margin: 0,
		interval:<?php echo $int?>,					
		lineThickness: 1,		
		gridThickness: 1,	
		gridDashType: "dot",	
        includeZero: false,
		gridColor: "rgba(82, 92, 97, 0.39)",
		labelFontSize: 8,
		labelFontColor:' #888',
		labelFontFamily: "Arial",
		labelFontWeight: "bold",
		labelFormatter: function ( e ) {
			return e.value .toFixed(<?php if ($weather["temp_units"]=='F'){echo '1';} else echo '0';?>) ;
         },		 
		crosshair: {
			enabled: true,
			snapToDataPoint: true,
			color: "#555",
			labelFontColor: "#fff",
			labelFontSize:8,
			labelBackgroundColor: "#44a6b5",
			labelMaxWidth: 60,
			valueFormatString: "#",
		}	 
      },
	  
	  legend:{
      fontFamily: "arial",
      fontColor:"#555",
	  margin: 0,
  
 },
		
		
		data: [
		{
			type: "scatter",
			//color:"rgba(68, 166, 181, 1.000)",
			markerSize:2,
			showInLegend:false,
			legendMarkerType: "triangle",
			lineThickness: 0,
			markerType: "circle",			
			dataPoints: dataPoints1,
			name:"Barometer",			
			//yValueFormatString:"#0.# °",
			markerBorderColor: 'red',
			yValueFormatString: "##.## <?php echo $pressureunit ;?>",
		},
		{
			//not using in daily barometer
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