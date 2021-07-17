<?php include('../settings.php');
	
	#############################################################
	#	                                                      
    #	CREATED FOR Aurora MKII TEMPLATE 
    #   http://weather34.com/homeweatherstation/index.html  	 	                                                                                               
    # 	built on CanvasJs  	                                                                           	
    #   canvasJs.js is protected by CREATIVE COMMONS LICENCE BY-NC 3.0  	                           
	# 	free for non commercial use and credit must be left in tact .            
	# 	Weather34 Release November 2020                                               
	# 	                                                                                               
	#   http://www.weather34.com 	                                                                
	#############################################################
	
	header('Content-type: text/html; charset=utf-8');
	
	if ($tempunit == 'F') {$unit='F';}	
	if ($tempunit == 'C') {$unit='C';}
	
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
	

	function WEATHER34CHARTCOLORS(weather34value) {
if (weather34value>=-50 && weather34value<=41) {tempcolor='hsla(185, 100%, 37%, 1)';}
else if (weather34value>41 && weather34value<=59) {tempcolor='hsl(74, 60%, 46%)';}
else if (weather34value>59 && weather34value<=68){tempcolor=' hsl(35, 77%, 58%)';}  
else if (weather34value>68 && weather34value<=75.2){tempcolor='#F88D01';} 
else if (weather34value>75.2 && weather34value<=80.6){tempcolor=' hsl(19, 66%, 55%)';}   
else if (weather34value>80.6 && weather34value<=95){tempcolor=' hsl(2, 56%, 55%)';}    
else if (weather34value>95 && weather34value<=140){tempcolor='hsl(4, 40%, 48%)';}  
return tempcolor;}
	



        $(document).ready(function () {
		var dataPoints1 = [];
		var dataPoints2 = [];
		$.ajax({
			type: "GET",
			url: "tempforecast34.php",
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
                    dataPoints1.push({label: rowData[0],y:parseFloat(rowData[1]),color:WEATHER34CHARTCOLORS(parseFloat(rowData[1]))});
					
					
			}
		}
		requestTempCsv();}function requestTempCsv(){}

	function processData2(allText) {
		var allLinesArray = allText.split('\n');
		if(allLinesArray.length>1){
			
			for (var i = 0; i <= allLinesArray.length-1; i++) {
				var rowData = allLinesArray[i].split(',');
				if ( rowData.length >0)
					dataPoints2.push({label: rowData[0],y:parseFloat(rowData[3])});
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
			   //toolTipContent: " x: {x} y: {y} <br/> name: {name}, label:{label} ",
			   shared: true, 
			   valueFormatString: "#",
			   contentFormatter: function ( e ) {
               return "Temperature <span style='font-weight:600'>" +  e.entries[0].dataPoint.y.toFixed(0) +"°<?php echo $tempunit?>";  }
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
		margin: 0,
		lineThickness: 0.5,		
		gridThickness: 0,	
		tickColor: "rgba(40, 45, 52,0)",
		tickLength: 0,			
        includeZero: false,
		gridColor: "hsla(200, 7%, 45%, 0.4)",		
		gridDashType: "dot",			
		interval:10,
		maximum:120,
		labelFontSize: 8,
		labelFontColor:' #aaa',			
		labelFontFamily: "verb",			
		labelFormatter: function ( e ) {
        return e.value .toFixed(0) ;  
         },		
			 
		 
      },
	  
	  legend:{
      fontFamily: "arial",
      fontColor:"#aaa",
  
 },
		
		
		data: [
		{
			indexLabelLineThickness:0, 			
       		indexLabel: "{y}°",
	   		indexLabelFontSize: 8,			
	   		indexLabelFontColor: "#aaa",	
			indexLabelFontFamily: "verb",  
	   		indexLabelMaxWidth: 50,	   		
       		indexLabelWrap: true,
	   		indexLabelPlacement: "outside",     
			markerSize:23,
			markerBorderSize:0,
			type: "column",
			//markerColor: "rgba(68, 166, 181,0.5)",
			//color:"rgba(68, 166, 181, 1.000)",			
			showInLegend:false,			
			lineThickness: 0,
			markerType: "circle",
			name:"Temperature",
			dataPoints: dataPoints1,
			yValueFormatString: "#",
		},
		{
			
		}

		]
		});

		chart.render();
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
	max-width:130px;
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
     background:#FB631D;
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
<div class="modulecaption">Temperature Forecast</div>
<div class="unitscaption"><?php echo "°".$unit?></div>
<div id="chartContainer2" style="height:110px;margin-top:-25px;-webkit-border-radius:10px;border-radius:10px;border:6px solid hsla(212, 12%, 72%,.2);"></div>

</body>
<script src='../weather34charts/canvas-231.js'></script>