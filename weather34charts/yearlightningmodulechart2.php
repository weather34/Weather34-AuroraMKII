<?php
	
    #######################################################
	#	CREATED FOR Aurora MKII version								   							   
	# https://weather34.com/homeweatherstation/index.html 	
	# Lightning year data  
	# 	Release: February 2021		
	# 	                                                                                               
	#   https://www.weather34.com 	                                                                   
	#######################################################
//0 (date-month-0)),
//1 day lightning total)
		
	include('preload.php');
	date_default_timezone_set($TZ);
	$weatherfile = date('F');	
	$conv = 1;	
	$int = 1;	
	
	
    echo '
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>STRIKES YEAR CHART</title>
		
	';	
	?>
    <br>
	<script type="text/javascript">

//color the strikes based on amount
function WEATHER34CHARTCOLORS(strikes) {
if (strikes>=0 && strikes<=1) {strikeslevel='hsl(35, 77%, 58%)';}
else if (strikes>1 && strikes<=30) {strikeslevel='hsl(19, 66%, 55%)';} 
else if (strikes>30 && strikes<=100) {strikeslevel='hsla(19, 66%, 55%,.7)';} 
else if (strikes>100 && strikes<=1000) {strikeslevel='hsl(7, 60%, 57%)';}           
else {strikeslevel='hsla(206, 12%, 27%, .4)';}
return strikeslevel;}

function WEATHER34strikes(weather34Dvalue) {
if (weather34Dvalue>=0 && weather34Dvalue<1) {theD='No Storm';}
else if (weather34Dvalue>=1 && weather34Dvalue<=30) {theD='Weak Storm';}
else if (weather34Dvalue>30 && weather34Dvalue<=200) {theD='Moderate Storm';}
else if (weather34Dvalue>200 && weather34Dvalue<=1000) {theD='Strong Storm ';}
else {theD='No Data !';}
return theD;}

        $(document).ready(function () {
		var dataPoints1 = [];
		var dataPoints2 = [];
		$.ajax({
			type: "GET",
			url: "<?php echo date('Y');?>strikes.csv",
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
				dataPoints1.push({label: rowData[0],y:parseFloat(rowData[1]),color:WEATHER34CHARTCOLORS(parseFloat(rowData[1]))});
					
					
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
				dataPoints2.push({y:WEATHER34strikes(parseFloat(rowData[1]))});
				
				
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
			minimum:-0.5,	
			interval:'auto',	
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
		interval:'auto',		
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
			//strikes
			type: "column",		
			showInLegend:false,
			fillOpacity: .8,
			name:"Strikes",
			dataPoints: dataPoints1,
			yValueFormatString:"##.## Strikes",
		},
		{			
			//strikes phrase
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

<div class="modulecaptionchart3"><?php echo date('Y')?> Lightning (Strikes)</div> 

</body></html>