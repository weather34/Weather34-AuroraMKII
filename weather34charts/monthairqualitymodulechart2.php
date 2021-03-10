<?php
	
	######################################################################
	#	CREATED FOR Weather34 Aurora									   
	# https://weather34.com/homeweatherstation/index.html 											    
	# 	                                                                                               
	# 	built on CanvasJs  	                                                                           
	#   canvasJs.js is protected by CREATIVE COMMONS LICENCE BY-NC 3.0  	                           
	# 	free for non commercial use and credit must be left in tact . 	                               
	# 	                                                                                               
	# 	Release: November 2020 	Air Quality		  	                         
	# 	                                                                                               
	#   https://www.weather34.com 	                                                                   
	##################################################################
		
	include('preload.php');
	date_default_timezone_set($TZ);
	$weatherfile = date('F');		
	$int = 1;	
	
	
    echo '
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>OUTDOOR SOLAR MONTH CHART</title>	
		<script src=../js/jquery.js></script>
		
	';	
	?>
    <br>
	<script type="text/javascript">


function WEATHER34CHARTCOLORS(aq) {
if (aq>=0 && aq<=50) {AQIlevel=' hsl(75, 62%, 43%)';}
else if (aq>50 && aq<=100) {AQIlevel='hsl(35, 77%, 58%)';}
else if (aq>100 && aq<=150) {AQIlevel='hsl(19, 66%, 55%)';} 
else if (aq>150 && aq<=200) {AQIlevel='hsl(7, 60%, 57%)';} 
else if (aq>200 && aq<=300) {AQIlevel='hsl(0, 38%, 32%)';}
else if (aq>300) {AQIlevel='hsl(246, 31%, 62%)';}                
else {AQIlevel='hsla(206, 12%, 27%, .4)';}
return AQIlevel;
        }

		function WEATHER34AQI(weather34Dvalue) {
if (weather34Dvalue>=0 && weather34Dvalue<50) {theD='No Risk';}
else if (weather34Dvalue>50 && weather34Dvalue<100) {theD='Moderate Risk';}
else if (weather34Dvalue>=100 && weather34Dvalue<=150) {theD='Moderate to High Risk';}
else if (weather34Dvalue>150 && weather34Dvalue<=200) {theD='High Risk';}  
else if (weather34Dvalue>200 && weather34Dvalue<=300) {theD='Very High Risk';}
else if (weather34Dvalue>300&& weather34Dvalue<=100) {theD='Extreme Conditions';}
else {theD='No Data !';}
return theD;}

        $(document).ready(function () {
		var dataPoints1 = [];
		var dataPoints2 = [];
		$.ajax({
			type: "GET",
			url: "<?php echo date('Y')?>/<?php echo $weatherfile;?>.csv",
			dataType: "text",
			cache:false,
			success: function(data) {processData1(data),processData2(data);}
		});
	
	function processData1(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>0){
			
			for (var i = 0; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');	
				if ( rowData[14] >=0)			
				//dataPoints1.push({label:rowData[0],y:parseFloat(rowData[13])});
				dataPoints1.push({label: rowData[0],y:parseFloat(rowData[14]),color:WEATHER34CHARTCOLORS(parseFloat(rowData[14]))});	
					
			}
		}
		requestTempCsv();}function requestTempCsv(){}

	function processData2(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>0){
			
			for (var i = 0; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');
				if ( rowData[14] >=0)
				//dataPoints2.push({label: rowData[0],y:parseFloat(rowData[14]),color:WEATHER34CHARTCOLORS(parseFloat(rowData[14]))});
				dataPoints2.push({y:WEATHER34AQI(parseFloat(rowData[14]))});
			}
			drawChart(dataPoints1,dataPoints2 );
		}
	}

	
	function drawChart( dataPoints1,dataPoints2) {
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
			   content: "{label} {y}" ,     	   
			   //toolTipContent: " x {x} y {y} <br/> name: {name}, label:{label} ",
			   shared: true, 
			   fontFamily: "weathertext2",
			   fontFamily: "weathertext2", 
 },

		axisX: {
			gridColor: "rgba(82, 92, 97, 0.39)",		    		
			lineThickness: 1,
			gridThickness: 1,
			gridDashType: "dot",	
			labelFontColor:'#597286',
			labelFontFamily: "weathertext2",			
			labelFontSize:8,
			interval: 18,
   			intervalType:5,
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
		minimum:0,	
		gridThickness: 1,	
		gridDashType: "dot",
		gridColor: "rgba(82, 92, 97, 0.39)",
		labelFontSize: 8,
		labelFontColor:'#597286',
		labelFontFamily: "weathertext2",				
		interval: "auto",
		labelFormatter: function ( e ) {
        return e.value .toFixed(0); 
	     },		 
		 crosshair: {
			enabled: true,
			snapToDataPoint: true,
			color: "#aaa",
			labelFontColor: "#F8F8F8",
			labelFontSize:0,
			labelBackgroundColor: "<?php echo $tempcolor?>",
			labelMaxWidth: 60,
			valueFormatString:"##.##",
		}	
      },
	  
	  legend:{
      fontFamily: "weathertext2",
      fontColor:"#555",
  
 },
		
		
		data: [
		{
			type: "column",			
			markerSize:0,
			showInLegend:false,
			legendMarkerType: "circle",
			lineThickness: 5,
			markerType: "none",
			name:"AQI",
			dataPoints: dataPoints1,
			yValueFormatString: "##.## AQI",
			
		}
		,
		{			
			//aqi phrase
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

		chart.render();
	}
});</script>
<div id="chartContainer2" class="chartb"></div></div>


</body></html>