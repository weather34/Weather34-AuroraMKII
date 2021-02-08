<?php include('livedata.php');
    #######################################################
	#	CREATED FOR Aurora MKII version								   							   
	# https://weather34.com/homeweatherstation/index.html 	
	# Lightning Creates and adds month and year  csv data  
	# 	Release: February 2021		
	# 	                                                                                               
	#   https://www.weather34.com 	                                                                   
	#######################################################
//0 (date-month-0)),
//1 day lightning total)

date_default_timezone_set($TZ);
$date = date_create();
$year=date('Y');
//disable error logging if you get server errors
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);ini_set("display_errors","off");
//create the current month file example folder/file path = weather34charts/2021/July.csv
$weatherchartfilemonth ="weather34charts/".$year."/".date('F')."strikes.csv";
$weather34chartdata = date('j M').",".$weather["lightningmax"]."\r\n";
//$output=$weatherchartfilemonth;
$fp = fopen($weatherchartfilemonth, 'a+'); 
fwrite($fp,$weather34chartdata); 
fclose($fp);

//create the year file example folder/file path = weather34charts/2021.csv
$weatherchartfileyear = "weather34charts/".date('Y')."strikes.csv";
$weather34chartdata1  = date('j M').",".$weather["lightningmax"]."\r\n";
//$output1=$weatherchartfileyear;
$fp1 = fopen($weatherchartfileyear, 'a+'); 
fwrite($fp1,$weather34chartdata1); 
fclose($fp1);
?>



