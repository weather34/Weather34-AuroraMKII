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



function WEATHER34CHARTCOLORS(uv) {
if (uv>=0 && uv<3) {uvlevel=' hsl(75, 62%, 43%)';}
else if (uv>=3 && uv<=5) {uvlevel='hsl(35, 77%, 58%)';}
else if (uv>5 && uv<=7) {uvlevel='hsl(19, 66%, 55%)';} 
else if (uv>7 && uv<=10) {uvlevel='hsl(7, 60%, 57%)';} 
else if (uv>10 ) {uvlevel='hsl(246, 31%, 62%)';}                
else {uvlevel='hsla(206, 12%, 27%, .4)';}
return uvlevel;}

function WEATHER34UVI(weather34Dvalue) {
if (weather34Dvalue>=0 && weather34Dvalue<3) {theD='No Risk';}
else if (weather34Dvalue>=3 && weather34Dvalue<=5) {theD='Moderate Risk';}
else if (weather34Dvalue>5 && weather34Dvalue<=7) {theD='Moderately High ';}
else if (weather34Dvalue>7 && weather34Dvalue<=10) {theD='High Risk';}  
else if (weather34Dvalue>10  && weather34Dvalue<=11) {theD='Very High Risk';}
else if (weather34Dvalue>12 ) {theD='Extreme Risk';}
else {theD='No Data !';}
return theD;}



		// today uv
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
				if ( rowData[5] >=0)
				//dataPoints1.push({label: rowData[1],y:parseFloat(rowData[5])});
				dataPoints1.push({label: rowData[1],y:parseFloat(rowData[5]),color:WEATHER34CHARTCOLORS(parseFloat(rowData[5]))});
			}
		}
		requestTempCsv();}function requestTempCsv(){}

	function processData2(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>=0){
			
			for (var i = 0; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');
				if ( rowData[5] >=0)	
					//dataPoints2.push({label: rowData[1],y:parseFloat(rowData[5])});
					dataPoints2.push({y:WEATHER34UVI(parseFloat(rowData[5]))});
				
			}
			drawChart(dataPoints1 , dataPoints2 );
		}
	}

		function drawChart( dataPoints1 , dataPoints2 ) {
		var chart = new CanvasJS.Chart("chartContainer2", {
            backgroundColor: "<?php echo $bcolor;?>",
		 animationEnabled: false,		
		
		title: {
            text: " ",
			fontSize: 0,
			fontColor:' #aaa',
			fontFamily: "verb",
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
		labelFontColor:'<?php echo $ccolor?>',
		labelFontFamily: "verb",
				
		interval: 1,
		labelFormatter: function ( e ) {
        return e.value .toFixed(0);  
         },		 
		 crosshair: {
			enabled: true,
			snapToDataPoint: true,
			color: "#aaa",
			labelFontColor: "#F8F8F8",
			labelFontSize:0,
			labelBackgroundColor: "#ff832f",
			labelMaxWidth: 60,
			valueFormatString:"#.#",
		}	
      },
	  
	  legend:{
      fontFamily: "verb",
      fontColor:"#555",
  
 },
		
		
		data: [
		{
			type: "column",
			color:"#d35d4e",
			markerSize:0,
			showInLegend:false,
			legendMarkerType: "circle",
			lineThickness: 1,
			markerType: "none",
			name:"UV INDEX",
			dataPoints: dataPoints1,
			yValueFormatString: "#.# UVI",
			
		},
		{			
			//UV phrase
			type: "scatter",
			//color:"rgba(68, 166, 181, 1.000)",
			markerSize:0,
			showInLegend:false,
			legendMarkerType: "triangle",
			lineThickness: 0,
			markerType: "circle",
			name:"",
			dataPoints: dataPoints2,
			yValueFormatString:theD,
			markerBorderColor: 'rgba(68, 166, 181, 1.000)', 
		}

		]
		});

		setTimeout(function(){
		chart.render();
	},500);
	}
});</script>
<body>
<div id="chartContainer2" class="chartb"></div></div>

<div class="modulecaptionchart3">UVINDEX (UVI) <?php echo date('l F jS')?></div> 
</body></html>