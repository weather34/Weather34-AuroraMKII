<?php include('../settings.php');
	#############################################################
	#	                                                      
    #	CREATED FOR Aurora TEMPLATE 
    #   http://weather34.com/homeweatherstation/index.html  	 	                                                                                               
    # 	built on CanvasJs  	                                                                           	
    #   canvasJs.js is protected by CREATIVE COMMONS LICENCE BY-NC 3.0  	                           
	# 	free for non commercial use and credit must be left in tact .            
	# 	Weather34 Release November 2020                                               
	# 	                                                                                               
	#   https://www.weather34.com 	                                                                
	#############################################################
	
	header('Content-type: text/html; charset=utf-8');	
    if ($windunit == 'mph') {$unit='mph';}
	if ($windunit == 'm/s') {$unit='m/s';}
	if ($windunit == 'km/h') {$unit='kmh';} 
	if ($windunit == 'kts') {$unit='kts';}
    echo '
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Forecast Chart Temp</title>
		<script src=../js/jquery.js></script>
	';	
	?>
    <br>
    <script type="text/javascript">

function WEATHER34CHARTCOLORS(weather34value) { 
if (weather34value>=0 && weather34value<=90) {thecolor='hsla(185, 100%, 37%, 1)';}
else if (weather34value>90 && weather34value<=180) {thecolor='hsl(35, 77%, 58%)';}
else if (weather34value>180 && weather34value<=300) {thecolor='hsla(2, 56%, 55%,1)';}
else if (weather34value>300 && weather34value<=360) {thecolor='hsla(185, 100%, 37%, 1)';}           
else {thecolor='#00adbd';}
return thecolor;}




        $(document).ready(function () {
		var dataPoints1 = [];
		var dataPoints2 = [];
		$.ajax({
			type: "GET",
			url: "wind-directionforecast34.php",
			dataType: "text",
			cache:false,
			success: function(data) {processData1(data),processData2(data);}
		});
	
	function processData1(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>0){
			
			for (var i = 0; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');
				if ( rowData[1]>0)
					//dataPoints1.push({label:rowData[0],y:parseFloat(rowData[1])});	
                    //dataPoints1.push({label: rowData[0],y:parseFloat(rowData[1]),color:WEATHER34CHARTCOLORS(parseFloat(rowData[1]))});
					dataPoints1.push({y:(rowData[2]),color:WEATHER34CHARTCOLORS(rowData[1])});
					
					
			}
		}
		requestTempCsv();}function requestTempCsv(){}

		function processData2(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>0){
			
			for (var i = 0; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');
				if ( rowData[1]>0)
				//dataPoints2.push({label:rowData[0],y:parseFloat(rowData[1])});
				dataPoints2.push({label: rowData[0],y:parseFloat(rowData[1]),color:WEATHER34CHARTCOLORS(parseFloat(rowData[1]))});
				
			}
			drawChart(dataPoints1,dataPoints2 );
		}
	}

	
	function drawChart( dataPoints1 , dataPoints2 ) {
        var yLabels = ["N","NE","E","SE","S","SW","W","NW","N" ];
var yLabelCounter=0;	
		var chart = new CanvasJS.Chart("chartContainer2", {
		 backgroundColor: " hsla(228, 10%, 10%,0)",
		 animationEnabled: false,
		 margin: 0,
		 
		title: {
            text: " ",
			fontSize: 0,
			fontColor:' #555',
			fontFamily: "arial",
        },
		toolTip:{
			   fontStyle: "normal",
			   cornerRadius: 4,
			   backgroundColor: "rgba(40, 45, 52,1)",	
			   fontColor: '#fff',	
               borderThickness: 3,	
			   labelWidth: 150,  
			   fontSize: 11,	
			   //content: "<hr/> {y} {label}" ,   
			   content: "{name} <span style='color:#fff;font-weight:600'>{y}" , 	   
			   //toolTipContent: " x {x} y {y} <br/> name: {name}, label:{label} ",
			   shared: true,},
 axisX: {
	gridColor: "hsla(200, 7%, 45%, 0.4)",		
			gridDashType: "dot",
		    labelFontSize: 8,
			labelFontColor:' #aaa',
			lineThickness: 1,
			gridThickness: 0,				
			labelFontFamily: "Helvetica",	
			labelFontWeight: "bold",			
			interval:1,
			labelAngle: 0,			
			crosshair: {
			thickness: 50,
			lineDashType: "solid" ,
			enabled: true,
			snapToDataPoint: true,			
			labelFontColor: "#fff",
			labelFontSize:0,
			labelBackgroundColor: "#cf5129",			
			color:'hsla(185, 100%, 37%, .1)',
		}
			
			},
			
            axisY: {
		title: "",		
        titleWrap: false,
		margin: 0,
		minimum:0,
		maximum:360,
		lineThickness: 0.5,	
		tickColor: "rgba(40, 45, 52,0)",
		tickLength: 0,				
        includeZero: true,		
		gridThickness: 0,	
		gridDashType: "dot",
		gridColor: "hsla(200, 7%, 45%, 0.4)",	
		labelFontSize: 8,
		labelFontColor:' #aaa',
		labelFontFamily: "Helvetica",	
		labelFontWeight: "bold",				
		interval: 45,
  	labelFormatter: function ( e ) {
      var yCats = yLabels[yLabelCounter++];
      if(yLabelCounter === yLabels.length)
        yLabelCounter = 0;
      return yCats;
    } ,	
		crosshair: {
			enabled: true,
			labelMaxWidth: 50,  
			labelWrap: true,
			snapToDataPoint: true,
			color: "#ff832f",
			labelFontColor: "#F8F8F8",
			labelFontSize:8,
			labelBackgroundColor: "hsla(185, 100%, 37%, 1)",
		}		 
		 
      },
	  
	  legend:{
      fontFamily: "arial",
      fontColor:"#555",
  
 },
		
		
		data: [
		{
			
			//wind Direction Cardinal			
			name:"Direction",
			dataPoints: dataPoints1,
			
		},
		{
			//wind Direction
			indexLabelLineThickness:0,       
       		indexLabel: "{y}",
	   		indexLabelFontSize: 9,
	   		indexLabelFontColor: "#fff",	  
	   		indexLabelMaxWidth: 50,
	   		indexLabelFontWeight: "bold",
       		indexLabelWrap: true,
	   		indexLabelPlacement: "auto",     
			markerSize:23,
			type: "scatter",
			//markerColor: "rgba(68, 166, 181,0.5)",
			//color:"rgba(68, 166, 181, 1.000)",			
			showInLegend:false,			
			lineThickness: 0,
			markerType: "circle",
			name:"Bearing",
			dataPoints: dataPoints2,
			yValueFormatString:"#°",
			markerBorderColor: 'rgba(68, 166, 181,0)',
		}

		]
		});

		setTimeout(function(){
		chart.render();
	},500);
	}
});

      </script>
<style>		  
  .modulecaption {
    display: flex;
    position: relative;
    left: 100px;
    top: 0;
    color: #fff;    
	font-family: Arial;
	width:auto;
	max-width:120px;
	 background: hsl(225, 3%, 27%);
	top:112px;
	line-height:1.1;	
	z-index: 9999;
    font-size: 10px;
    padding: 0px 3px 0px 3px;    
    align-items: center;
    justify-content: center;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -ms-border-radius: 3px;
	-o-border-radius: 3px;
	
}
.unitscaption
{display: flex;position:absolute;width:30px;
     background: hsl(225, 3%, 27%);
	margin-top:101px;
	width:90px;
	float:right;
    line-height:1.1;    
	color: #fff;
    font-family: Arial;    
    font-size: 10px;
    padding: 0px 3px 0px 3px; 
    align-items: center;
    justify-content: center;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -ms-border-radius: 3px;
    -o-border-radius: 3px;
    flex-grow: 0;
    flex-shrink: 1;
    flex-basis: auto
}</style>


<body>
<div class="modulecaption">Wind Direction Forecast </div>
<div class="unitscaption">Bearing 0°- 360°</div>

<div id="chartContainer2" style="height:110px;margin-top:-25px;-webkit-border-radius:10px;border-radius:10px;border:6px solid hsla(212, 12%, 72%,.2);"></div>

</body>
<script src='../weather34charts/canvasJs.js'></script>