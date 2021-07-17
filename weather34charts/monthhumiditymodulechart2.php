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
	$weatherfile = date('F');	
	
	
    echo '
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>OUTDOOR Humidity Month Chart</title>
		<style>@font-face {font-family: verb;src: url(fonts/verbatim-bold.woff2) format("woff2"), url(fonts/verbatim-bold.woff) format("woff");font-display: swap}</style>
		
		';	

	?> 
    <br>
    <script type="text/javascript">

function WEATHER34CHARTCOLORS(weather34value) {
if (weather34value>=0 && weather34value<40) {thecolor='#d35f50';}
else if (weather34value>=40 && weather34value<=60) {thecolor='hsl(74, 60%, 46%)';}
else if (weather34value>60 && weather34value<80){thecolor=' hsl(35, 77%, 58%)';} 
else if (weather34value>=80 && weather34value<=90){thecolor='hsla(201, 79%, 47%,.8)';}  
else if (weather34value>90 && weather34value<=100){thecolor='hsl(201, 79%, 47%)';}  
else {thecolor='hsl(35, 77%, 58%)';}
return thecolor;}



        $(document).ready(function () {
		var dataPoints1 = [];
		var dataPoints2 = [];
		$.ajax({
			type: "GET",
			url: "<?php echo date('Y');?>/<?php echo $weatherfile;?>.csv",
			dataType: "text",
			cache:false,
			success: function(data) {processData1(data),processData2(data);}
		});
	
	function processData1(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>0){
			
			for (var i = 0; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');	
				if ( rowData[16] >0)			
				//dataPoints1.push({label:rowData[0],y:parseFloat(rowData[11])});
				dataPoints1.push({label: rowData[0],y:parseFloat(rowData[16]),color:WEATHER34CHARTCOLORS(parseFloat(rowData[16]))});
					
					
			}
		}
		requestTempCsv();}function requestTempCsv(){}

	function processData2(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>0){
			
			for (var i = 0; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');
				if ( rowData[17] >0)
				dataPoints2.push({label: rowData[0],y:parseFloat(rowData[17]),color:WEATHER34CHARTCOLORS(parseFloat(rowData[17]))});
								
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
			fontFamily: "arial",
        },
		//dataPointWidth: 1,
		toolTip:{
			fontStyle: "normal",
			   cornerRadius: 4,
			   backgroundColor: "#393F4D",	
			   fontColor:"#C3CED8",	
               borderThickness: 3,	
			   fontSize: 11,	   
			   toolTipContent: " x: {x} y: {y} <br/> name: {name}, label:{label} ",
			   shared: true, 
			   fontFamily: "verb", 
 },
		axisX: {
			gridColor: "rgba(82, 92, 97, 0.39)",
		    labelFontSize: 8,
			labelFontColor:'<?php echo $ccolor?>',
			lineThickness: 1,
			gridThickness: 1,
			gridDashType: "dot",	
			titleFontFamily: "verb",	
			labelFontFamily: "verb",	
			minimum:-0.5,	
			interval:5,		
			intervalType:"day",
			xValueType: "dateTime",	
			
			
			
			},
			
		axisY:{
		margin: 0,
		interval: 10,			
		lineThickness: 1,		
		gridThickness: 1,	
		gridDashType: "dot",
		maximum:100,	
        includeZero: true,
		gridColor: "rgba(82, 92, 97, 0.39)",
		labelFontSize: 8,
		labelFontColor:' #C3CED8',
		labelFontFamily: "verb",
		labelFormatter: function ( e ) {
			return e.value .toFixed(0) + "%" ;  
         },		 
		 
      },
	  
	  legend:{
      fontFamily: "arial",
      fontColor:"#555",
	  margin: 0,
  
 },
		
		
 data: [
		{
			
			type: "column",		
			showInLegend:false,
			fillOpacity: .8,	
			name:"Hi Humidity",
			dataPoints: dataPoints1,
			yValueFormatString: "# '%'",
		},
		{
			
			type: "stackedColumn",			
			color:"hsl(201, 79%, 47%)",				
			showInLegend:false,			
			lineThickness: 2,	
			lineColor:"rgba(255, 255, 255,.5)",	
			yValueFormatString:"##.##°",
			markerType: "none",
			name:"Lo Humidity",
			dataPoints: dataPoints2,
			yValueFormatString: "# '%'",
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

<div class="modulecaptionchart3">Humidity (RH) <?php echo date('F');?></div> 

</body></html>