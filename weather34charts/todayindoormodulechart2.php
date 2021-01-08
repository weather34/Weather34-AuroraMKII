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
	if ($tempunit=='C') {$conv= '1';}
	else if ($tempunit=='F' ) {$conv= '(1.8) +32';}	
	
    echo '
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>INDOOR | HUMIDITY TEMPERATURE DATABASE CHART</title>	
		<script src=../js/jquery.js></script>
		
		
	';
	
	$date= date('D jS Y');$weatherfile =date('Y')."/".date('jMY');?>
    <br>
    	<script type="text/javascript">
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
					dataPoints1.push({label: rowData[1],y:parseFloat(rowData[12]*<?php echo $conv ?>)});
			}
		}
		requestTempCsv();}function requestTempCsv(){}

	function processData2(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>0){
			
			for (var i = 0; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');
				if ( rowData[2] >-150)	
					dataPoints2.push({label: rowData[1],y:parseFloat(rowData[13])});
			}
			drawChart(dataPoints1 , dataPoints2 );
		}
	}

		function drawChart( dataPoints1 , dataPoints2 ) {
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
		title: "",		
		titleFontSize: 7,
        titleWrap: false,
		margin: 3,
		interval:1,
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
         return e.value .toFixed(0) + "<?php echo "°".$tempunit ;?>";
         },		 
		crosshair: {
			enabled: true,
			snapToDataPoint: true,
			color: "#d05f2d",
			labelFontColor: "#fff",
			labelFontSize:8,
			labelBackgroundColor: "#d05f2d",
			labelMaxWidth: 60,
			valueFormatString: "#0.#<?php echo "°";?>",
		}	 
      },
	  
	  
	   axisY2:{
		title: "",
		titleFontColor: "#aaa",
		titleFontSize: 8,
        titleWrap: false,
		margin: 3,
		interval:10,
		//maximum:100,
		lineThickness: 1,		
		gridThickness: 1,	
		gridDashType: "dot",	
        includeZero: false,
		gridColor: "rgba(82, 92, 97, 0.39)",
		labelFontSize: 8,
		labelFontColor:' #aaa',
		titleFontFamily: "arial",
		labelFontFamily: "arial",
		labelFormatter: function ( e ) {
         return e.value .toFixed(0) + "%" ;  
		},
		crosshair: {
			enabled: true,
			snapToDataPoint: true,
			color: "#3b9cac",
			labelFontColor: "#fff",
			labelFontSize:7,
			labelBackgroundColor: "#3b9cac",
			valueFormatString: "#'%'",
		}	 
      },
	  
	  legend:{
      fontFamily: "arial",
      fontColor:"#aaa",
  	  fontSize: 0,
 },
		
		
		
		
		data: [
		{
			
			type: "spline",
			color:"#ff742c",
			markerSize:0,
			showInLegend:false,			
			lineThickness: 1,
			markerType: "circle",
			name:"Temperature",
			dataPoints: dataPoints1,
			yValueFormatString: "#0.#<?php echo "°".$tempunit ;?>",
			
		},
		{
			
			
		}

		]
		});

		chart.render();
	}
});


  </script>
<div id="chartContainer2" class="chartb"></div></div>


</body></html>