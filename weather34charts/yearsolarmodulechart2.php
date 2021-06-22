<?php
	
	####################################################################################################
	#	CREATED FOR WEATHER34 AURORA MKII TEMPLATE 											   #
	# https://weather34.com/homeweatherstation/index.html 											   # 
	# 	                                                                                               #
	# 	built on CanvasJs  	                                                                           #
	#   canvasJs.js is protected by CREATIVE COMMONS LICENCE BY-NC 3.0  	                           #
	# 	free for non commercial use and credit must be left in tact . 	                               #
	# 	                                                                                               #
	# 	Release: September 2020 	Solar		  	                                           #
	# 	                                                                                               #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################
		
	include('preload.php');	
	$conv = 1;	
	$int = 1;	
	
	
    echo '
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>OUTDOOR Solar Year CHART</title>
		
	';	
	?>
    <br>
	<script type="text/javascript">
function WEATHER34CHARTCOLORS(wm2) {
if (wm2>=0 && wm2<=600) {wm2level='hsl(35, 77%, 58%)';}
else if (wm2>600 && wm2<=800) {wm2level='hsl(19, 66%, 55%)';}
else if (wm2>800){wm2level=' hsl(2, 56%, 55%)';}               
else {wm2level='hsl(35, 77%, 58%)';}
return wm2level;}

function WEATHER34WM2(weather34WMvalue) {
if (weather34WMvalue>=0 && weather34WMvalue<100) {theWM='Low Radiation';}
else if (weather34WMvalue>=100 && weather34WMvalue<=600) {theWM='Moderate Radiation';}
else if (weather34WMvalue>600 && weather34WMvalue<=900) {theWM='Strong Radiation ';}
else if (weather34WMvalue>900 && weather34WMvalue<=1500) {theWM='Very Strong Radiation';} 
else {theWM='No Data !';}
return theWM;}


        $(document).ready(function () {
		var dataPoints1 = [];
		var dataPoints2 = [];
		$.ajax({
			type: "GET",
			url: "<?php echo date('Y');?>.csv",
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
				//dataPoints1.push({label:rowData[0],y:parseFloat(rowData[11])});
				dataPoints1.push({label: rowData[0],y:parseFloat(rowData[12]),color:WEATHER34CHARTCOLORS(parseFloat(rowData[12]))});
				
					
					
			}
		}
		requestTempCsv();}function requestTempCsv(){}

	function processData2(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>0){
			
			for (var i = 0; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');
				if ( rowData[1] >-100)
				//dataPoints2.push({label: rowData[0],y:parseFloat(rowData[12])});
				//dataPoints2.push({label: rowData[0],y:parseFloat(rowData[12]),color:WEATHER34CHARTCOLORS(parseFloat(rowData[12]))});
				dataPoints2.push({y:WEATHER34WM2(parseFloat(rowData[12]))});
				
			}
			drawChart(dataPoints1,dataPoints2 );
		}
	}

	
	function drawChart(dataPoints1,dataPoints2) {
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
			interval:45,	
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
		interval:100,			
		lineThickness: 1,		
		gridThickness: 1,	
		gridDashType: "dot",	
        includeZero: true,
		gridColor: "rgba(82, 92, 97, 0.39)",
		labelFontSize: 8,
		labelFontColor:'<?php echo $ccolor?>',
		labelFontFamily: "verb",
		
		labelFormatter: function ( e ) {
            return e.value .toFixed(0) ;
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
			//Solar
			type: "column",			
			markerSize:0,
			showInLegend:false,
			legendMarkerType: "circle",
			lineThickness: 1,
			markerType: "none",
			name:"Solar",
			dataPoints: dataPoints1,
			yValueFormatString:"##.## W/m2",
		},
		{			
			//solar phrase
			type: "scatter",
			//color:"rgba(68, 166, 181, 1.000)",
			markerSize:0,
			showInLegend:false,
			legendMarkerType: "triangle",
			lineThickness: 0,
			markerType: "circle",
			name:"",
			dataPoints: dataPoints2,
			yValueFormatString:theWM,
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

<div class="modulecaptionchart3">Solar Radiation (W/m2)</div> 

</body></html>