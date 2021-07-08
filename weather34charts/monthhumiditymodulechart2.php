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
		<title>OUTDOOR Humidity Month Chart</title>';	 
	?> 
    <br>
    <script type="text/javascript">

function WEATHER34CHARTCOLORS(weather34value) {
if (weather34value>=0 && weather34value<=35) {thecolor='#d35f50';}
else if (weather34value>35 && weather34value<=40) {thecolor='#ec5732';}
else if (weather34value>40 && weather34value<70){thecolor=' #e6a141';} 
else if (weather34value>=70 && weather34value<=90){thecolor='#00adbd';}  
else if (weather34value>90 && weather34value<=100){thecolor=' hsla(185, 100%, 37%, .7)';}  
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
				if ( rowData[1] >0)			
				//dataPoints1.push({label:rowData[0],y:parseFloat(rowData[11])});
				dataPoints1.push({label: rowData[0],y:parseFloat(rowData[8]),color:WEATHER34CHARTCOLORS(parseFloat(rowData[8]))});
					
					
			}
		}
		requestTempCsv();}function requestTempCsv(){}

	function processData2(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>0){
			
			for (var i = 0; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');
				if ( rowData[1] >-100)
				dataPoints2.push({label: rowData[0],y:parseFloat(rowData[13]),color:WEATHER34CHARTCOLORS(parseFloat(rowData[13]))});
								
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
			dataPoints: dataPoints2,
			yValueFormatString: "# '%'",
		},
		{
			
			type: "area",			
			color:"hsla(185, 100%, 37%, 0.7)",				
			showInLegend:false,			
			lineThickness: 2,	
			lineColor:"rgba(255, 255, 255,.5)",	
			yValueFormatString:"##.##°",
			markerType: "none",
			name:"Lo Humidity",
			dataPoints: dataPoints1,
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