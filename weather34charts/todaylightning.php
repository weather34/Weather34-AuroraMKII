<?php
	

	
	include('preload.php');

	####################################################################################################
    #	CREATED FOR Weather34											 							   #
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


		// today lightning
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
		if(allLinesArray.length>=0){
			
			for (var i = 0; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');
				if ( rowData[2] >-150)	
					dataPoints1.push({label: rowData[1],y:parseFloat(rowData[16])});
					//dataPoints1.push({label: rowData[1],y:parseFloat(rowData[16]),color:WEATHER34CHARTCOLORS(parseFloat(rowData[16]))});
			}
		}
		requestTempCsv();}function requestTempCsv(){}

	function processData2(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>=0){
			
			for (var i = 0; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');
				if ( rowData[2] >-150)	
					dataPoints2.push({label: rowData[1],y:parseFloat(rowData[18])});
					
				
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
			fontColor:' #333',
			fontFamily: "arial",
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
 },
		axisX: {
			gridColor: "rgba(82, 92, 97, 0.39)",		    		
			lineThickness: 1,
			gridThickness: 1,
			gridDashType: "dot",	
			labelFontColor:'<?php echo $ccolor?>',
			labelFontFamily: "Arial",
			labelFontWeight: "bold",
			labelFontSize:7.5,
			interval: 18,
   			intervalType: "hour",
			minimum:-1,
			crosshair: {
			enabled: true,
			snapToDataPoint: true,				
			labelFontSize:7,
			labelBackgroundColor: "#44a6b5",
			labelMaxWidth: 60,
		}
			},
			
		axisY:{
		title: "",
		titleFontColor: "#888",
		titleFontSize: 0,
        titleWrap: false,
		margin: 0,
		interval:10,
		minimum:0,
		lineThickness: 1,		
		gridThickness: 1,		
        includeZero: true,
		gridColor: "rgba(82, 92, 97, 0.39)",		
		gridDashType: "dot",
		labelFontSize: 8,
		labelFontColor:'<?php echo $ccolor?>',
		labelFontFamily: "Arial",
		labelFontWeight: "bold",
		labelFormatter: function ( e ) {
        return e.value .toFixed(0);  
         },		
			 
		 crosshair: {
			enabled: true,
			snapToDataPoint: true,
			color: "#44a6b5",
			labelFontColor: "#fff",
			labelFontSize:8,
			labelBackgroundColor: "#44a6b5",
			labelMaxWidth: 60,
			valueFormatString:"##.##",
		}	
      },
	  
	  legend:{
      fontFamily: "arial",
      fontColor:"#555",
  
 },
		
		
		data: [
		
		{
			//10 min  lightning total
            type: "column",  
            color:"hsl(19, 66%, 55%)",
			connectNullData: true,    
			markerSize:0,
			showInLegend:false,
			legendMarkerType: "circle",
			lineThickness: 1,
			markerType: "circle",
			name:"Lightning Strikes",
			dataPoints: dataPoints1,
			yValueFormatString:"#0.# Strikes",
		}

		]
		});

		setTimeout(function(){
		chart.render();
	},500);
	}
});</script>
<div id="chartContainer2" class="chartb"></div></div>

<div class="modulecaptionchart3"><?php echo date('l')?> Lightning (Strikes)</div> 
</body></html>