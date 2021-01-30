<?php ini_set ('display_errors', 'Off');error_reporting(E_ALL);
	####################################################################################################
	#	CREATED FOR WEATHER34 AURORA MKII TEMPLATE 											   		   #
	# https://weather34.com/homeweatherstation/index.html 											   # 
	# 	                                                                                               #
	# 	Release: January 2021 	                                                                       #
	# 	  Lightning via Weatherflow Air                                                                #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################
$filename = "weather34-lightning.txt";if( isset($_GET['d']) ) {$string=$_GET['d'];
file_put_contents($filename, $string);
header('Content-Type: text/plain');
echo "success";}?>