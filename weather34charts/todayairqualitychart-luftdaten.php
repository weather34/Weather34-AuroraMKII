<?php

	include('preload.php');

	    ####################################################################################################
    #	CREATED FOR WEATHER34 AURORA MKII TEMPLATE 											   #
    # https://weather34.com/homeweatherstation/index.html 											   #
    # 	                                                                                               #
    # 	Revised: October 2020					  	                                                   #
    # 	                                                                                               #
    #   https://www.weather34.com 	                                                                   #
    ####################################################################################################


   
    echo '
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>OUTDOOR AQI CHART</title>
		
	';
	date_default_timezone_set($TZ);
    $date= date('D jS Y');
    $weatherfile =date('Y')."/".date('jMY');?>
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
return AQIlevel;}

		// today aq
        $(document).ready(function () {
		var dataPoints1 = [];
		var dataPoints2 = [];
		$.ajax({
			type: "GET",
			url: "<?php echo $weatherfile?>airquality-luftdaten.csv",
			dataType: "text",
			cache:false,
			success: function(data) {processData1(data),processData2(data);}
		});
	
	function processData1(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>=0){
			
			for (var i = 0; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');
				if ( rowData[2]>=0)
					//dataPoints1.push({label: rowData[1],y:parseFloat(rowData[2])});
					dataPoints1.push({label: rowData[1],y:parseFloat(rowData[2]),color:WEATHER34CHARTCOLORS(parseFloat(rowData[2]))});
			}
		}
		requestTempCsv();}function requestTempCsv(){}

	function processData2(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>=0){
			
			for (var i = 0; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');
				if ( rowData[2]>=0)
					dataPoints2.push({label: rowData[1],y:parseFloat(rowData[2])});
				
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
		dataPointWidth: 2,
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
		gridThickness: 1,	
		gridDashType: "dot",
		gridColor: "rgba(82, 92, 97, 0.39)",
		labelFontSize: 8,
		labelFontColor:'<?php echo $ccolor?>',
		labelFontFamily: "verb",
				
		interval: "auto",
		labelFormatter: function ( e ) {
        return e.value .toFixed(0) +" AQI";           },		 
		 crosshair: {
			enabled: true,
			snapToDataPoint: true,
			color: "#ff832f",
			labelFontColor: "#F8F8F8",
			labelFontSize:8,
			labelBackgroundColor: "rgba(68, 166, 181, 1.000)",
			labelMaxWidth: 60,
			valueFormatString:"##.##",
		}	
      },
	  
	  legend:{
      fontFamily: "verb",
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
		]
		});

		setTimeout(function(){
		chart.render();
	},500);
	}
});</script>
<div id="chartContainer2" class="chartb"></div></div>

<div class="modulecaptionchart3">Air Quality (Luftdaten)</div> 

</body></html>