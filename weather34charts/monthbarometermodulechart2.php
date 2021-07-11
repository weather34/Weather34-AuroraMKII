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
	date_default_timezone_set($TZ);
	$weatherfile = date('F');	
	
	$conv = 1;		
	$int = 5;	
	if ($tempunit == 'F') {$conv= 0.02953 ;}	
	else if ($tempunit == 'C' && $position8=='barometer-modmmHG.php') {$conv= 0.750062;}
		$int = 5;	
	if ($tempunit == 'F') {$int= 1;}		

	if ($pressureunit == 'inHg') {$pressureunit= 'inHg';}
	else if ($pressureunit == 'hPa') {$pressureunit= 'hPa';}
	else if ($pressureunit == 'mb') {$pressureunit='mb';}
	if ($position8=='barometer-modmmHG.php') {$pressureunit= 'mmHG';}
	
	
    echo '
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>OUTDOOR Barometer CHART</title>	
		
	';	
	?>
    <br>
	<script type="text/javascript">

function WEATHER34CHARTCOLORS(weather34value) {
if (weather34value>=900 && weather34value<=1000) {thecolor='hsla(185, 100%, 37%, 1)';}
else if (weather34value>1000 && weather34value<=1010) {thecolor='hsl(75, 62%, 43%)';}
else if (weather34value>1010 && weather34value<=1020) {thecolor='hsl(35, 77%, 58%)';}
else if (weather34value>1020 && weather34value<=1030) {thecolor='hsl(19, 66%, 55%)';} 
else if (weather34value>1030 && weather34value<=1040) {thecolor='hsl(12, 80%, 52%)';}    
else if (weather34value>1040 && weather34value<=1060) {thecolor='hsl(2, 56%, 55%)';}            
else {thecolor='hsla(206, 12%, 27%, .4)';}
return thecolor;}


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
					//dataPoints1.push({label:rowData[0],y:parseFloat(rowData[9]*<?php echo $conv ?>)});
					if ( rowData[9] >20)		
				//dataPoints1.push({label:rowData[0],y:parseFloat(rowData[9]*<?php echo $conv ?>)});			
				dataPoints1.push({label: rowData[0],y:parseFloat(rowData[9]*<?php echo $conv ;?>),color:WEATHER34CHARTCOLORS(parseFloat(rowData[9]))});	
					
			}
		}
		requestTempCsv();}function requestTempCsv(){}

	function processData2(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>0){
			
			for (var i = 0; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');
				if ( rowData[10] >20)	
				dataPoints2.push({label: rowData[0],y:parseFloat(rowData[10]*<?php echo $conv ?>)});
					
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
		interval:<?php echo $int?>,			
		lineThickness: 1,		
		gridThickness: 1,	
		gridDashType: "dot",	
        includeZero: false,
		gridColor: "rgba(82, 92, 97, 0.39)",
		labelFontSize: 8,
		labelFontColor:'<?php echo $ccolor?>',
		labelFontFamily: "verb",		
		labelFormatter: function ( e ) {
        return e.value .toFixed(<?php if ($tempunit=='F'){echo '1';} else echo '0';?>) ;
         },		 
      },
	  
	  legend:{
      fontFamily: "verb",
      fontColor:"#555",
	  margin: 0,
  
 },
		
		
 data: [
		{
			//Barometer
			type: "column",		
			showInLegend:false,
			fillOpacity: .8,
			name:"Hi Barometer",
			dataPoints: dataPoints1,
			yValueFormatString:"##.## <?php echo $pressureunit ;?>",
		},
		{
			type: "stackedColumn",			
			color:"hsl(201, 79%, 47%)",				
			showInLegend:false,			
			lineThickness: 2,	
			lineColor:"rgba(255, 255, 255,.5)",			
			name:"Lo Barometer",
			dataPoints: dataPoints2,
			markerType: "none",
			yValueFormatString:"##.## <?php echo $pressureunit ;?>",
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


<div class="modulecaptionchart3">Barometer (<?php echo $pressureunit ;?>) <?php echo date('F')?></div> 

</body></html>