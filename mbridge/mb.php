<?php ini_set ('display_errors', 'Off');error_reporting(E_ALL);
	####################################################################################################
	#	CREATED FOR HOMEWEATHERSTATION MB SMART TEMPLATE 											   #
	# https://weather34.com/homeweatherstation/index.html 											   # 
	# 	                                                                                               #
	# 	Release: August 2019						  	                                               #
	# 	                                                                                               #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################
// Original script courtesy of Wim Van der Kuil 29th May 2017 for Original weather34 meteobridge API//
$filename = "MBrealtimeupload.txt";if( isset($_GET['d']) ) {$string=$_GET['d'];file_put_contents($filename, $string);header('Content-Type: text/plain');echo "success";}?>