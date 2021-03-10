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
	if ($tempunit == 'F') {$conv= 0.02953 ;}	
	else if ($tempunit == 'C' && $position8=='barometer-modmmHG.php') {$conv= 0.750062;}
	$int = 5;	
	if ($tempunit == 'F') {$int= 0.75;}		

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
	?>
    <br>
	<script type="text/javascript">
        $(document).ready(function () {
		var dataPoints1 = [];
		var dataPoints2 = [];
		$.ajax({
			type: "GET",
			url: "2020.csv",
			dataType: "text",
			cache:false,
			success: function(data) {processData1(data),processData2(data);}
		});
	
	function processData1(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>0){
			
			for (var i = 0; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');
				if ( rowData[9] >-100)		
					dataPoints1.push({label:rowData[0],y:parseFloat(rowData[9]*<?php echo $conv ?>)});
					
					
			}
		}
		requestTempCsv();}function requestTempCsv(){}

	function processData2(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>0){
			
			for (var i = 0; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');
				if ( rowData[10] >-100)
				dataPoints2.push({label: rowData[0],y:parseFloat(rowData[10]*<?php echo $conv ?>)});
					
				
			}
			drawChart(dataPoints1,dataPoints2 );
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
			fontFamily: "weathertext2",
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
			   fontFamily: "weathertext2", 
 },
		axisX: {
			gridColor: "rgba(82, 92, 97, 0.39)",
		    labelFontSize: 7.5,
			labelFontColor:'#597286',
			lineThickness: 1,
			gridThickness: 1,
			gridDashType: "dot",	
			titleFontFamily: "weathertext2",	
			labelFontFamily: "weathertext2",	
			minimum:-1,	
			interval:45	,
			intervalType:"day",
			xValueType: "dateTime",	
			crosshair: {
			enabled: true,
			snapToDataPoint: true,
			color: "#009bab",
			labelFontColor: "#F8F8F8",
			labelFontSize:10,
			labelBackgroundColor: "#009bab",
			
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
		labelFontColor:'#597286',
		labelFontFamily: "weathertext2",
		
		labelFormatter: function ( e ) {
			return e.value .toFixed(<?php if ($weather["temp_units"]=='F'){echo '1';} else echo '0';?>) ;
         },		 
		crosshair: {
			enabled: true,
			snapToDataPoint: true,
			color: "#44a6b5",
			labelFontColor: "#fff",
			labelFontSize:8,
			labelBackgroundColor: "#44a6b5",
			labelMaxWidth: 60,
			valueFormatString: "#",
		}	 
      },
	  
	  legend:{
      fontFamily: "weathertext2",
      fontColor:"#555",
	  margin: 0,
  
 },
		
		
 data: [
		{
			//Barometer
			type: "spline",
			color:"#d85026",
			markerSize:0,
			showInLegend:false,
			legendMarkerType: "circle",
			lineThickness: 1,
			markerType: "none",
			name:"Hi Barometer",
			dataPoints: dataPoints1,
			yValueFormatString:"##.## <?php echo $pressureunit ;?>",
		},
		{
			// not used
			type: "spline",			
			color:"#00A4B4",
			markerSize:0,
			showInLegend:false,
			legendMarkerType: "circle",
			lineThickness: 0,
			markerType: "none",
			name:"Lo Barometer",
			dataPoints: dataPoints2,
			yValueFormatString:"##.## <?php echo $pressureunit ;?>",
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