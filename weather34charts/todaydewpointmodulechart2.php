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
	if ($tempunit == 'F') {$conv= '(1.8) +32';}	
	else $conv = 1;	
	$max = 50;
	if ($tempunit  == 'F') {$max= '120';}	

	$int= '0';
	if ($tempunit  == 'F') {$int= '5';} 


	
	
    echo '
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>OUTDOOR Dewpoint CHART</title>	
		<script src=../js/jquery.js></script>
		
		
	';
	date_default_timezone_set($TZ);
	$date= date('D jS Y');$weatherfile =date('Y')."/".date('jMY');?>
    <br>
    	<script type="text/javascript">

function WEATHER34CHARTCOLORS(weather34value) {
if (weather34value>=-50 && weather34value<=-10) {thecolor='hsl(216, 88%, 61%)';}
else if (weather34value>-10 && weather34value<=0) {thecolor='hsl(202, 86%, 60%)';}
else if (weather34value>0 && weather34value<=5) {thecolor='hsla(185, 100%, 37%, 1)';}
else if (weather34value>5 && weather34value<=10) {thecolor='hsl(74, 60%, 46%)';}
else if (weather34value>10 && weather34value<=15){thecolor=' hsl(35, 77%, 58%)';}  
else if (weather34value>15 && weather34value<=18){thecolor=' hsla(34, 98%, 49%,.8)';}  
else if (weather34value>18 && weather34value<=20){thecolor=' hsl(34, 98%, 49%)';}    
else if (weather34value>20 && weather34value<=25){thecolor=' hsl(19, 66%, 55%)';}   
else if (weather34value>25 && weather34value<=35){thecolor=' hsl(12, 80%, 52%)';}  
else if (weather34value>35 && weather34value<=50){thecolor=' hsl(2, 56%, 55%)';}             
else {thecolor='hsl(35, 77%, 58%)';}
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
					dataPoints1.push({label: rowData[1],y:parseFloat(rowData[9]*<?php echo $conv ;?>),color:WEATHER34CHARTCOLORS(parseFloat(rowData[9]))});
			}
		}
		requestTempCsv();}function requestTempCsv(){}

	function processData2(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>0){
			
			for (var i = 0; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');
				if ( rowData[2] >-150)
					//dataPoints2.push({label: rowData[1],y:parseFloat(rowData[15])});
					dataPoints2.push({label: rowData[1],y:parseFloat(rowData[9]*<?php echo $conv ;?>),color:WEATHER34CHARTCOLORS(parseFloat(rowData[9]))});
				
			}
			drawChart(dataPoints1 , dataPoints2 );
		}
	}

		function drawChart( dataPoints1 , dataPoints2 ) {
		var chart = new CanvasJS.Chart("chartContainer2", {
			backgroundColor: "rgba(40, 45, 52,0)",
		 animationEnabled: false,
		 margin: 0,
		
		title: {
            text: "From 00:00 - <?php echo date('H:i')?>",
			fontSize: 0,
			fontColor:' #777',
			fontFamily: "arial",
			margin: -25,
        },
		zoomEnabled: false,		
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
			minimum:-0.5,
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
		interval:<?php echo $int ;?>,			
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
        return e.value .toFixed(0) + "°" ;  
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
      fontFamily: "arial",
      fontColor:"#555",
	  margin: 0,
  
 },
		
		
		data: [
		
		{
			
			type: "column",	
			markerSize:1,
			showInLegend:false,
			legendMarkerType: "circle",
			lineThickness: 1,
			markerType: "circle",
			name:"Dewpoint",
			dataPoints: dataPoints1,
			yValueFormatString: "#0.# °",
			
		}

		
		

		]
		});
		

		chart.render();
	}
});</script>
<body>

<div id="chartContainer2" class="chartb"></div></div>



</body></html>