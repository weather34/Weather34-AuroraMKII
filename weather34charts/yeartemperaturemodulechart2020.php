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
	$conv = 1;
	if ($tempunit == 'F') {$conv= '(1.8) +32';}	
	$interval = 5;
	if ($tempunit == 'F') {$interval= '10';}
	$weatherfile = date('F');	
	
	
	
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
if (weather34value>=-50 && weather34value<=5) {thecolor='hsla(185, 100%, 37%, 1)';}
else if (weather34value>5 && weather34value<=10) {thecolor='hsl(74, 60%, 46%)';}
else if (weather34value>10 && weather34value<=15){thecolor=' hsl(35, 77%, 58%)';}  
else if (weather34value>15 && weather34value<=18){thecolor=' hsla(34, 98%, 49%,.8)';}  
else if (weather34value>18 && weather34value<=20){thecolor=' hsl(34, 98%, 49%)';}    
else if (weather34value>20 && weather34value<=25){thecolor=' hsl(19, 66%, 55%)';}   
else if (weather34value>25 && weather34value<=35){thecolor=' hsl(12, 80%, 52%)';}  
else if (weather34value>35 && weather34value<=50){thecolor=' hsl(2, 56%, 55%)';}             
else {thecolor='hsl(35, 77%, 58%)';}
return thecolor;}

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
				if ( rowData[1] >-100)	
				
				dataPoints1.push({label: rowData[0],y:parseFloat(rowData[1]*<?php echo $conv ;?>),color:WEATHER34CHARTCOLORS(parseFloat(rowData[1]))});
					
					
			}
		}
		requestTempCsv();}function requestTempCsv(){}

	function processData2(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>0){
			
			for (var i = 0; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');	
				if ( rowData[1] >-100)			
				dataPoints2.push({label: rowData[0],y:parseFloat(rowData[2]*<?php echo $conv ;?>)});
				
				
				 
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
		    labelFontSize: 7.5,
			labelFontColor:'<?php echo $ccolor?>',
			lineThickness: 1,
			gridThickness: 1,
			gridDashType: "dot",	
			titleFontFamily: "verb",	
			labelFontFamily: "verb",	
			minimum:-0,	
			interval:60	,
			intervalType:"day",
			xValueType: "dateTime",	
			
			
			},
			
		axisY:{
		margin: 0,
		interval:<?php echo $interval;?>,			
		lineThickness: 1,		
		gridThickness: 1,	
		gridDashType: "dot",	
        includeZero: false,
		gridColor: "rgba(82, 92, 97, 0.39)",
		labelFontSize: 8,
		labelFontColor:'<?php echo $ccolor?>',
		labelFontFamily: "verb",
		
		labelFormatter: function ( e ) {
        return e.value .toFixed(0) + "°" ;  
         },		 
      },
	  
	  legend:{
      fontFamily: "verb",
      fontColor:"#555",
	  margin: 0,
  
 },
		
		
 data: [
	{
			//temp
			type: "column",				
			showInLegend:false,	 
			fillOpacity: .8,		
			name:"Hi Temp",
			dataPoints: dataPoints1,
			yValueFormatString:"##.## <?php echo $tempunit?>°",
		},
		{
			type: "stackedColumn",			
			color:"hsl(201, 79%, 47%)",				
			showInLegend:false,			
			lineThickness: 1,	
			lineColor:"rgba(255, 255, 255,.5)",					
			name:"Lo Temp",
			dataPoints: dataPoints2,
			yValueFormatString:"##.## <?php echo $tempunit?>°",
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

<div class="modulecaptionchart3">Temperature (<?php echo $tempunit ;?>)</div> 

</body></html>