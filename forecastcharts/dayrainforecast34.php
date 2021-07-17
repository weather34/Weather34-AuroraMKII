<?php include('../settings.php');
	#############################################################
	#	                                                      
    #	CREATED FOR Aurora TEMPLATE 
    #   http://weather34.com/homeweatherstation/index.html  	 	                                                                                               
    # 	built on CanvasJs  	                                                                           	
    #   canvasJs.js is protected by CREATIVE COMMONS LICENCE BY-NC 3.0  	                           
	# 	free for non commercial use and credit must be left in tact .            
	# 	Weather34 Release November 2020                                               
	# 	                                                                                               
	#   https://www.weather34.com 	                                                                
	#############################################################
	
	header('Content-type: text/html; charset=utf-8');	
    if ($rainunit == "in") {$unit='in';}
	if ($rainunit == "mm") {$unit='mm';}	
	if ($rainunit == "in") {$interval='1';}
	if ($rainunit == "mm") {$interval='5';}	
	$conv= '1';
    echo '
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Forecast Chart Temp</title>
		<script src=../js/jquery.js></script>
		<style>@font-face {font-family: verb;src: url(../fonts/verbatim-bold.woff2) format("woff2"), url(../fonts/verbatim-bold.woff) format("woff");font-display: swap}</style>
	';	
	?>
    <br>
    <script type="text/javascript">

function WEATHER34CHARTCOLORS(rain) {
if (rain>=0 && rain<=20) {rainlevel='hsla(185, 100%, 37%, .8)';}
else if (rain>20){rainlevel='hsla(185, 100%, 37%, 1)';}                
else {rainlevel='hsla(185, 100%, 37%, 1)';}
return rainlevel;}




        $(document).ready(function () {
		var dataPoints1 = [];
		var dataPoints2 = [];
		$.ajax({
			type: "GET",
			url: "rainforecast34.php",
			dataType: "text",
			cache:false,
			success: function(data) {processData1(data),processData2(data);}
		});
	
	function processData1(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>0){
			
			for (var i = 0; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');
				if ( rowData.length >1)
					//dataPoints1.push({label:rowData[0],y:parseFloat(rowData[1])});	
                    dataPoints1.push({label: rowData[0],y:parseFloat(rowData[1]*<?php echo $conv?>),color:WEATHER34CHARTCOLORS(parseFloat(rowData[1]))});
					
					
			}
		}
		requestTempCsv();}function requestTempCsv(){}

	function processData2(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>1){
			
			for (var i = 0; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');
				if ( rowData.length >0)
					dataPoints2.push({label: rowData[0],y:parseFloat(rowData[3]*1.60934)});
					//parseFloat(rowData[13])});
				
			}
			drawChart(dataPoints1 );
		}
	}

	
	function drawChart( dataPoints1 , dataPoints2 ) {
		var chart = new CanvasJS.Chart("chartContainer2", {
			backgroundColor: " hsla(228, 10%, 10%,0)",
		 animationEnabled: false,
		 margin: 0,
		 
		title: {
            text: " ",
			fontSize: 0,
			fontColor:' #aaa',
			fontFamily: "arial",
        }, 
		
		
		toolTip:{
			fontStyle: "normal",
			   cornerRadius: 4,
			   backgroundColor: "#393F4D",	
			   fontColor:"#C3CED8",			
			   fontSize: 11,
			   borderThickness: 3,	   
			   toolTipContent: " x: {x} y: {y} <br/> name: {name}, label:{label} ",
			   shared: true, 
			   valueFormatString: "#",
			   contentFormatter: function ( e ) {
               return "Accumulation <span style='font-weight:600'>" +  e.entries[0].dataPoint.y +" <?php echo $rainunit?>";  
   }  

 },
 axisX: {
			gridColor: "hsla(200, 7%, 45%, 0.4)",	
			gridDashType: "dot",
		    labelFontSize: 7,
			labelFontColor:' #aaa',
			lineThickness: 1,
			gridThickness: 0,				
			labelFontFamily: "verb",							
			interval:1,
			labelAngle: 0,			
			
			
			},
			
		axisY:{
		title: "",
		titleFontColor: "#aaa",
		titleFontSize: 0,
        titleWrap: false,
		margin: 5,
		lineThickness: 0.5,		
		gridThickness: 0,	
		tickColor: "rgba(40, 45, 52,0)",
		tickLength: 0,	
        includeZero: false,
		gridColor: "hsla(200, 7%, 45%, 0.4)",	
		gridDashType: "dot",
		minimum:0,
		interval:<?php echo $interval?>,		
		labelFontSize: 8,
		labelFontColor:' #aaa',			
		labelFontFamily: "verb",			
		labelFormatter: function ( e ) {return e.value .toFixed(0);},		
		 
		 
      },
	  
	  legend:{
      fontFamily: "arial",
      fontColor:"#aaa",
  
 },
		
		
		data: [
		{
			//Lightning Strikes
			type: "column",
			indexLabelLineThickness: 0, 
			indexLabelLineThickness: 0,       
       		indexLabel: "{y}",
	   		indexLabelFontSize: 8,
	   		indexLabelFontColor: "#aaa",	 
			indexLabelFontFamily: "verb", 
	   		indexLabelMaxWidth: 100,	   		
       		indexLabelWrap: true,
	   		indexLabelPlacement: "outside",     			
			markerSize:0,
			showInLegend:false,
			legendMarkerType: "circle",
			lineThickness: 0,
			markerType: "none",
			name:"Rainfall",
			dataPoints: dataPoints1,
			yValueFormatString: "#.#",
		},
		{
			
		}

		]
		});

		setTimeout(function(){
		chart.render();
	},500);
	}
});

      </script>
<style>		  
  .modulecaption {
    display: flex;
    position: relative;
    left: 40px;
    top: 0;
    color: #fff;    
	font-family: Arial;
	width:auto;
	max-width:160px;
	 background: #1994D7;
	top:112px;
	line-height:1.1;	
	z-index: 9999;
    font-size: 10px;
    padding: 0px 3px 0px 3px;    
    align-items: center;
    justify-content: center;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -ms-border-radius: 3px;
	-o-border-radius: 3px;
	
}
.unitscaption
{display: flex;position:absolute;width:30px;
     background: #FB631D;
	margin-top:101px;
	float:right;
    line-height:1.1;    
	color: #fff;
    font-family: Arial;    
    font-size: 10px;
    padding: 0px 3px 0px 3px; 
    align-items: center;
    justify-content: center;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    -ms-border-radius: 3px;
    -o-border-radius: 3px;
    flex-grow: 0;
    flex-shrink: 1;
    flex-basis: auto
}</style>

<body>
<div class="modulecaption" >Rainfall Accumulation Forecast </div>
<div class="unitscaption" ><?php echo $unit ;?></div>
<div id="chartContainer2" style="height:110px;margin-top:-25px;-webkit-border-radius:10px;border-radius:10px;border:6px solid hsla(212, 12%, 72%,.2);"></div>
</body>
<script src='../weather34charts/canvas-231.js'></script>