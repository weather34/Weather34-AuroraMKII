<?php 
	####################################################################################################
	#	HOME WEATHER STATION TEMPLATE by BRIAN UNDERDOWN 2015-2017-2018-2019-2020                      #
	#	CREATED FOR HOMEWEATHERSTATION TEMPLATE at 													   #
	#   https://weather34.com/homeweatherstation/index.html 										   # 											  
	# 	     Standalone Version Revised September 2020								                   #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################
//original weather34 script original css/svg/php by weather34 2015-2020 clearly marked as original by weather34//
include('livedata.php');header('Content-type: text/html; charset=utf-8');error_reporting(0); date_default_timezone_set($TZ);?>
<?php 
//start the wu output
$json='jsondata/wuforecast.txt';
$weather34wuurl=file_get_contents($json);
$parsed_weather34wujson = json_decode($weather34wuurl,false);
{
	//weather34 wu null fallback
	 if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==null){
	 $wuskydayIcon=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[1];	 
	 $wuskydayTime = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[1];	
	 $wusummary = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[1];
	 $wuskydaynight = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[1];	
	 $wuskythunder = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[1];	
	 $wuskythunderindex = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[1];	  
	}
	 
	 else {
	 $wuskydayIcon=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0];	 
	 $wuskydayTime = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[0];	
	 $wusummary = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[0];	
	 $wuskydaynight = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[0];
	 $wuskythunder = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[0];
	 $wuskyheatindex = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[0];
	 $wuskythunderindex = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[0];	 
	 }
	 //weather34 wu 1st	 
	  if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==null){
	 $wuskydayIcon1=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[2];	 
	 $wuskydayTime1 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[2];	
	 $wusummary1 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[2];	
	 $wuskydaynight1 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[2];
	 $wuskythunder1 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[2];		
	 $wuskyheatindex1 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[2]; 
	 $wuskythunderindex1 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[2];	 
	 
	 }
	  else {	 
	 $wuskydayIcon1=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[1];	 
	 $wuskydayTime1 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[1];	
	 $wusummary1 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[1];
	 $wuskydaynight1 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[1];	
	 $wuskythunder1 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[1];		
	 $wuskyheatindex1 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[1]; 
	 $wuskythunderindex1 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[1];	 
	 
	
	  }
	 //weather34 wu 2nd		 
	  if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==null){
	 $wuskydayIcon2=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[3];	 
	 $wuskydayTime2 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[3];	
	 $wusummary2 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[3];
	 $wuskydaynight2 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[3];	
	 $wuskythunder2 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[3];		
	 $wuskyheatindex2 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[3]; 
	 $wuskythunderindex2 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[3];	 
}
else {
	 
	 $wuskydayIcon2=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[2];	 
	 $wuskydayTime2 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[2];	
	 $wusummary2 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[2];
	 $wuskydaynight2 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[2];	
	 $wuskythunder2 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[2];		
	 $wuskyheatindex2 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[2]; 
	 $wuskythunderindex2 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[2];	 
	 }
	 //weather34 wu 3rd
	  if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==null){
	 $wuskydayIcon3=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[4];	 
	 $wuskydayTime3 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[4];	
	 $wusummary3 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[4];	
	 $wuskydaynight3 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[4];
	 $wuskythunder3 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[4];		
	 $wuskyheatindex3 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[4]; 
	 $wuskythunderindex3 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[4];	 
	 }
	 else {
	 $wuskydayIcon3=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[3];	 
	 $wuskydayTime3 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[3];	
	 $wusummary3 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[3];	
	 $wuskydaynight3 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[3];
	 $wuskythunder3 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[3];		
	 $wuskyheatindex3 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[3]; 
	 $wuskythunderindex3 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[3];	 
	 	}	 
	 
	 
	  
}//end weather34 weather underground summary forecast stuff
?>
<div class="sunblock"> 
    <?php //summary	
	echo '<div class=wudesc>';echo 'Forecast ';echo $wuskydayTime1."</div>";
	 echo "<div class=wuftextdesc>".$wusummary1.'</div>';
	 echo"<div class=wuftexticon> ";      		  			  
	 if ($wuskydaynight1=='D'){echo '<img src="wuicons/'.$wuskydayIcon1.'.svg" width="30" class="iconpos"></img></div>';}
	 if ($wuskydaynight1=='N'){echo '<img src="wuicons/nt_'.$wuskydayIcon1.'.svg" width="30" class="iconpos"></img></div>';}	
	 //thunder	
	 
	 ?>  </div>