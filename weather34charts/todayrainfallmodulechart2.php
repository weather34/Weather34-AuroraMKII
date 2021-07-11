<?php
	
	####################################################################################################
	#	CREATED FOR WEATHER34 AURORA MKII TEMPLATE 											   #
	# https://weather34.com/homeweatherstation/index.html 											   # 
	# 	                                                                                               #
	# 	built on CanvasJs  	                                                                           #
	#   canvasJs.js is protected by CREATIVE COMMONS LICENCE BY-NC 3.0  	                           #
	# 	free for non commercial use and credit must be left in tact . 	                               #
	# 	                                                                                               #
	# 	Release December 2020	Revised December 2019                                                  #
	# 	                                                                                               #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################
	
	include('preload.php');	
    $file_live=file_get_contents("../mbridge/MBrealtimeupload.txt");
	$meteobridgeapi=explode(" ",$file_live);
	$weather["rain_today"] = $meteobridgeapi[9];
    //CONVERT
	$conv = 1;if ($tempunit == 'F') {$conv= 0.0393701;}		
	$conv = 1;if ($rainunit == "in") {$conv= 0.0393701;}else $conv = 1;	
	if ($rainunit == "in") {$interval= 0.5;}
	else $interval= 5;
	if ($rainunit == "in") {$unit='in';}
	if ($rainunit == "mm") {$unit='mm';}	
	
	
	
//interval Y
$raininterval= $weather["rain_today"];
if ($raininterval>=40 && $rainunit == 'mm'){$raininterval=10;}
else if ($raininterval>=20 && $rainunit == 'mm'){$raininterval=5;}
else if ($raininterval>=10 && $rainunit == 'mm'){$raininterval=2;}
else if ($raininterval>1 && $rainunit == 'mm'){$raininterval=2;}
else if ($raininterval>=0 && $rainunit == 'mm'){$raininterval=1;}
//Inches
if ($raininterval>=1 && $rainunit == 'in'){$raininterval=2;}
else if ($raininterval>=0.5 && $rainunit == 'in'){$raininterval=2.5;}
else if ($raininterval>=0 && $rainunit == 'in'){$raininterval=1;}
	
    echo '
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>OUTDOOR RAINFALL DATABASE CHART</title>
		
		
	';
	date_default_timezone_set($TZ);
	$date= date('D jS Y');$weatherfile = date('Y')."/".date('jMY');?>
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
			
			for (var i = 1; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');	
				if ( rowData[2] >-150)				
					dataPoints1.push({label: rowData[1],y:parseFloat(rowData[4]*<?php echo $conv ?>)});
			}
		}
		requestTempCsv();}function requestTempCsv(){}

	function processData2(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>0){
			
			for (var i = 1; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');		
				if ( rowData[2] >-150)		
					dataPoints2.push({label: rowData[1],y:parseFloat(rowData[10]*<?php echo $conv ?>)});
				
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
   			intervalType: "hour",
			minimum:-0.5,
			
			
			},
			
		axisY:{			
		title: "",
		titleFontColor: "#555",
		titleFontSize: 0,
        titleWrap: false,
		margin: 3,
		lineThickness: 1,			
		minimum:0,		
		interval: <?php echo $raininterval;?>,
		gridThickness: 1,	
		gridDashType: "dot",	
        includeZero:true,		
		gridColor: "rgba(82, 92, 97, 0.39)",
		labelFontSize: 8,
		labelFontColor:'<?php echo $ccolor?>',
		labelFontFamily: "verb",
		
		labelFormatter: function ( e ) {
        return e.value .toFixed(<?php if ($unit == 'mm'){echo '0';} else echo '1';?>) + " <?php echo $unit ;?> " ;  
         },		 
		 	
      },
	  
	  legend:{
      fontFamily: "verb",
      fontColor:"#555",
  
 },
		
		
		data: [
		{
			//type: "spline",
			type: "column",
			color:"hsl(201, 79%, 47%)",
			markerSize:0,
			showInLegend:false,
			legendMarkerType: "circle",
			lineThickness: 0,
			markerType: "circle",
			name:" Rainfall Accumulation <?php echo $unit ;?>",
			dataPoints: dataPoints1,
			yValueFormatString: "##.## <?php echo $unit;?>",
			
		},
		{
			
			
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

<div class="modulecaptionchart3">Rainfall (<?php echo $unit ;?>) <?php echo date('l F jS')?></div> 
</body></html>