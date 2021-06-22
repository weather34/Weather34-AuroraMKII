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
		<title>OUTDOOR WIND Direction day CHART</title>
		
	';
	date_default_timezone_set($TZ);
	$date= date('D jS Y');$weatherfile =date('Y')."/".date('jMY');?>
    <br>
    	<script type="text/javascript">

function WEATHER34CHARTCOLORS(weather34value) {
if (weather34value>=0 && weather34value<=90) {thecolor='hsla(185, 100%, 37%, 1)';}
else if (weather34value>90 && weather34value<=180) {thecolor='hsla(19, 66%, 55%,1)';}
else if (weather34value>180 && weather34value<=300) {thecolor='hsla(2, 56%, 55%,1)';}
else if (weather34value>300 && weather34value<=360) {thecolor='hsla(185, 100%, 37%, 1)';}           
else {thecolor='#00adbd';}
return thecolor;}

function WEATHER34DIRECTION(weather34Dvalue) {
if (weather34Dvalue>=0 && weather34Dvalue<=12) {theD='North';}
else if (weather34Dvalue>12 && weather34Dvalue<=34) {theD='NNE';}
else if (weather34Dvalue>34 && weather34Dvalue<=57) {theD='North East';}
else if (weather34Dvalue>57 && weather34Dvalue<=79) {theD='ENE';}  
else if (weather34Dvalue>79 && weather34Dvalue<=102) {theD='East';}
else if (weather34Dvalue>102 && weather34Dvalue<=124) {theD='ESE';}
else if (weather34Dvalue>124 && weather34Dvalue<=147) {theD='South East';} 
else if (weather34Dvalue>147 && weather34Dvalue<=169) {theD='SSE';}
else if (weather34Dvalue>169 && weather34Dvalue<=192) {theD='South';}
else if (weather34Dvalue>192 && weather34Dvalue<=214) {theD='SSW';} 
else if (weather34Dvalue>214 && weather34Dvalue<=237) {theD='South West';}
else if (weather34Dvalue>237&& weather34Dvalue<=259) {theD='WSW';}
else if (weather34Dvalue>259 && weather34Dvalue<=282) {theD='West';} 
else if (weather34Dvalue>282 && weather34Dvalue<=304) {theD='WNW';}
else if (weather34Dvalue>304 && weather34Dvalue<=327) {theD='North West';}
else if (weather34Dvalue>327 && weather34Dvalue<=349) {theD='NNW';} 
else {theD='North';}
return theD;}


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
					//dataPoints1.push({label: rowData[1],y:parseFloat(rowData[11])});
					dataPoints1.push({label:rowData[1],y:parseFloat(rowData[11]),color:WEATHER34CHARTCOLORS(parseFloat(rowData[11]))});
					
					
			}
		}
		requestTempCsv();}function requestTempCsv(){}

	function processData2(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>0){
			
			for (var i = 0; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');
				if ( rowData[2] >-150)
					//dataPoints2.push({label: rowData[1],y:parseFloat(rowData[11])});
					dataPoints2.push({y:WEATHER34DIRECTION(parseFloat(rowData[11]))});
					//parseFloat(rowData[13])});
				
			}
			drawChart(dataPoints1 , dataPoints2 );
		}
	}

	
function drawChart( dataPoints1 , dataPoints2 ) {
var yLabels = ["North","NE","East","SE","South","SW","West","NW","North" ];
var yLabelCounter=0;		
var chart = new CanvasJS.Chart("chartContainer2", {
		 backgroundColor: "<?php echo $bcolor;?>",
		 animationEnabled: false,
		 margin: 0,
		 
		title: {
            text: " ",
			fontSize: 0,
			fontColor:' #555',
			fontFamily: "verb",
        },
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
			minimum:0,
			crosshair: {
			enabled: true,
			snapToDataPoint: true,				
			labelFontSize:8,
			labelBackgroundColor: "#44a6b5",
			labelMaxWidth: 60,
		}			
		},
			
		axisY: {
		title: "",
		titleFontColor: "#888",
		titleFontSize: 8,
        titleWrap: false,
		margin: 0,
		minimum:0,
		maximum:360,
		lineThickness: 1,				
        includeZero: true,		
		gridThickness: 1,	
		gridDashType: "dot",
		gridColor: "rgba(82, 92, 97, 0.39)",
		labelFontSize: 9,
		labelFontColor:'<?php echo $ccolor?>',
		labelFontFamily: "verb",
						
		interval: 45,
  	labelFormatter: function ( e ) {
      var yCats = yLabels[yLabelCounter++];
      if(yLabelCounter === yLabels.length)
        yLabelCounter = 0;
      return yCats;
    } ,
			 
	crosshair: {
			 shared:true,
			enabled: true,
			snapToDataPoint: true,
			color: "#aaa",
			labelFontColor: "#F8F8F8",
			labelFontSize:0,
			labelBackgroundColor: "#44a6b5",
			labelMaxWidth: 60,
			valueFormatString:theD,
		}	
      },
	  
	  legend:{
      fontFamily: "verb",
      fontColor:"#555",
  
 },
		
		
 data: [
		{
			//wind direction
			type: "scatter",
			//color:"rgba(68, 166, 181, 1.000)",
			markerSize:2,
			showInLegend:false,
			legendMarkerType: "triangle",
			lineThickness: 1,
			markerType: "circle",
			name:"",
			dataPoints: dataPoints1,
			yValueFormatString:"#0.#° ",
			markerBorderColor: 'rgba(68, 166, 181, 1.000)', 
		},

		{
			//wind direction cardinal
			type: "scatter",
			//color:"rgba(68, 166, 181, 1.000)",
			markerSize:0,
			showInLegend:false,
			legendMarkerType: "triangle",
			lineThickness: 0,
			markerType: "circle",
			name:"",
			dataPoints: dataPoints2,
			yValueFormatString:"#0.#° " +theD,
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
<div class="modulecaptionchart3">Wind Direction</div> 
</body></html>