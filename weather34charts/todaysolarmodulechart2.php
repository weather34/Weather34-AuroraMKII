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
    echo '
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>OUTDOOR TEMPERATURE DATABASE CHART</title>	
		<script src=../js/jquery.js></script>
		
		
	';
	
	$date= date('D jS Y');$date= date('D jS Y');$weatherfile =date('Y')."/".date('jMY');?>
    <br>
    	<script type="text/javascript">



function WEATHER34CHARTCOLORS(wm2) {
if (wm2>=0 && wm2<=600) {wm2level='hsl(35, 77%, 58%)';}
else if (wm2>600 && wm2<=800) {wm2level='hsl(19, 66%, 55%)';}
else if (wm2>800){wm2level=' hsl(2, 56%, 55%)';}               
else {wm2level='hsl(35, 77%, 58%)';}
return wm2level;}

function WEATHER34WM2(weather34WMvalue) {
if (weather34WMvalue>=0 && weather34WMvalue<100) {theWM='Low Radiation';}
else if (weather34WMvalue>=100 && weather34WMvalue<=600) {theWM='Moderate Radiation';}
else if (weather34WMvalue>600 && weather34WMvalue<=900) {theWM='Strong Radiation ';}
else if (weather34WMvalue>900 && weather34WMvalue<=1500) {theWM='Very Strong Radiation';} 
else {theWM='No Data !';}
return theWM;}



		// today solar
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
		if(allLinesArray.length>=0){
			
			for (var i = 0; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');			
				if ( rowData[8]>=0)
				//dataPoints1.push({label: rowData[1],y:parseFloat(rowData[8])});
				dataPoints1.push({label: rowData[1],y:parseFloat(rowData[8]),color:WEATHER34CHARTCOLORS(parseFloat(rowData[8]))});
			}
		}
		requestTempCsv();}function requestTempCsv(){}

	function processData2(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>=0){
			
			for (var i = 0; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');
				if ( rowData[8]>=0)
					//dataPoints2.push({label: rowData[1],y:parseFloat(rowData[8])});
					dataPoints2.push({y:WEATHER34WM2(parseFloat(rowData[8]))});
				
			}
			drawChart(dataPoints1 , dataPoints2 );
		}
	}

		function drawChart( dataPoints1 , dataPoints2 ) {
		var chart = new CanvasJS.Chart("chartContainer2", {
            backgroundColor: "rgba(40, 45, 52,.0)",
		 animationEnabled: false,		
		
		title: {
            text: " ",
			fontSize: 0,
			fontColor:' #aaa',
			fontFamily: "arial",
        },
		dataPointWidth: 1,
		toolTip:{
			fontStyle: "normal",
			   cornerRadius: 4,
			   backgroundColor: "rgba(40, 45, 52,1)",	
			   fontColor: '#fff',	
               borderThickness: 3,	
			   fontSize: 11,	
			   content: "{label} {y}" ,     	   
			   //toolTipContent: " x {x} y {y} <br/> name: {name}, label:{label} ",
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
            title: "",
		titleFontColor: "#888",
		titleFontSize: 8,
        titleWrap: false,
		margin: 0,
		lineThickness: 1,				
        includeZero: true,		
		gridThickness: 1,	
		gridDashType: "dot",
		gridColor: "rgba(82, 92, 97, 0.39)",
		labelFontSize: 8,
		labelFontColor:' #888',
		labelFontFamily: "Arial",
		labelFontWeight: "bold",		
		interval: 100,
		labelFormatter: function ( e ) {
        return e.value .toFixed(0);  
         },		 
		 crosshair: {
			enabled: true,
			snapToDataPoint: true,
			color: "#ff832f",
			labelFontColor: "#F8F8F8",
			labelFontSize:8,
			labelBackgroundColor: "#ff832f",
			labelMaxWidth: 60,
			valueFormatString:"##.##",
		}	
      },
	  
	  legend:{
      fontFamily: "arial",
      fontColor:"#555",
  
 },
		
		
		data: [
		{
			type: "column",
			
			markerSize:0,
			showInLegend:false,
			legendMarkerType: "circle",
			lineThickness: 1,
			markerType: "none",
			name:"Solar Radiation",
			dataPoints: dataPoints1,
			yValueFormatString: "##.## W/m2",
			
		}
		,
		{			
			//solar phrase
			type: "scatter",
			//color:"rgba(68, 166, 181, 1.000)",
			markerSize:0,
			showInLegend:false,
			legendMarkerType: "triangle",
			lineThickness: 0,
			markerType: "circle",
			name:"",
			dataPoints: dataPoints2,
			yValueFormatString:theWM,
			markerBorderColor: 'rgba(68, 166, 181, 1.000)', 
		}
		]
		});

		chart.render();
	}
});</script>
<body>
<div id="chartContainer2" class="chartb"></div></div>
</body></html>