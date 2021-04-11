<?php
	
	####################################################################################################
	#	CREATED FOR WEATHER34 AURORA MKII TEMPLATE 											   #
	# https://weather34.com/homeweatherstation/index.html 											   # 
	# 	                                                                                               #
	# 	built on CanvasJs  	                                                                           #
	#   canvasJs.js is protected by CREATIVE COMMONS LICENCE BY-NC 3.0  	                           #
	# 	free for non commercial use and credit must be left in tact . 	                               #
	# 	                                                                                               #
	# 	Release: September 2020 	UVINDEX 			  	                                           #
	# 	                                                                                               #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################
		
	include('preload.php');
	$weatherfile = date('F');	
	$conv = 1;	
	$int = 1;	
	
	
    echo '
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>OUTDOOR UVINDEX YEAR CHART</title>
		
	';	
	?>
    <br>
	<script type="text/javascript">

function WEATHER34CHARTCOLORS(uv) {
if (uv>=0 && uv<=3) {uvlevel=' hsl(75, 62%, 43%)';}
else if (uv>3 && uv<=5) {uvlevel='hsl(35, 77%, 58%)';}
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
				if ( rowData[11] >0)			
				//dataPoints1.push({label:rowData[0],y:parseFloat(rowData[11])});
				dataPoints1.push({label: rowData[0],y:parseFloat(rowData[11]),color:WEATHER34CHARTCOLORS(parseFloat(rowData[11]))});
					
					
			}
		}
		requestTempCsv();}function requestTempCsv(){}

	function processData2(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>0){
			
			for (var i = 0; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');
				if ( rowData[12] >0)
				//dataPoints2.push({label: rowData[0],y:parseFloat(rowData[12])});
				dataPoints2.push({y:WEATHER34UVI(parseFloat(rowData[11]))});
				
			}
			drawChart(dataPoints1,dataPoints2 );
		}
	}

	
	function drawChart( dataPoints1) {
		var chart = new CanvasJS.Chart("chartContainer2", {
		backgroundColor: "<?php echo $bcolor;?>",
		animationEnabled: false,
		 
		title: {
            text: " ",
			fontSize: 0,
			fontColor:' #aaa',
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
		    labelFontSize: 7.5,
			labelFontColor:'<?php echo $ccolor?>',
			lineThickness: 1,
			gridThickness: 1,
			gridDashType: "dot",	
			titleFontFamily: "verb",	
			labelFontFamily: "verb",	
			minimum:-1,	
			interval:60,	
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
		interval:1,			
		lineThickness: 1,		
		gridThickness: 1,	
		gridDashType: "dot",	
        includeZero: true,
		gridColor: "rgba(82, 92, 97, 0.39)",
		labelFontSize: 8,
		labelFontColor:'<?php echo $ccolor?>',
		labelFontFamily: "verb",
		
		labelFormatter: function ( e ) {
            return e.value .toFixed(<?php if ($weather["temp_units"]=='F'){echo '0';} else echo '0';?>) ;
         },	
			 
		crosshair: {
			enabled: true,
			snapToDataPoint: true,
			color: "#aaa",
			labelFontColor: "#fff",
			labelFontSize:0,
			labelBackgroundColor: "#44a6b5",
			labelMaxWidth: 60,
			valueFormatString: "#",
		}	 
      },
	  
	  legend:{
      fontFamily: "verb",
      fontColor:"#555",
	  margin: 0,
  
 },
		
		
 data: [
		{
			//UV
			type: "column",
			color:"#d85026",
			markerSize:0,
			showInLegend:false,
			legendMarkerType: "circle",
			lineThickness: 1,
			markerType: "none",
			name:"UVINDEX",
			dataPoints: dataPoints1,
			yValueFormatString:"##.## UVI",
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
</script>
<div id="chartContainer2" class="chartb"></div></div>



</body></html>