<?php include('../shared.php');include('../settings.php')?>
<?php 
//start the wu output
$json='../jsondata/wuforecast.txt';
$weather34wuurl=file_get_contents($json);
$parsed_weather34wujson = json_decode($weather34wuurl,false);

{ //weather34 wu null fallback
	if (
	 $parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==0){
	 $wuskydayIcon=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[1];	 
	 $wuskydayTime = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[1];	
	 $wuskydaynight = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[1];	 
	 $wuskydesc = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[1];
	 $wuskydayTempHigh = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[1];
	 $wuskydayTempLow = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[1];	 
	 $wuskydayWindGust = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[1];
	 $wuskydayWinddir = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[1];
	 $wuskydayWinddircardinal = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[1];
	 $wuskydayacumm = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[1];
	 $wuskydayPrecipType = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[1];
	 $wuskydayprecipIntensity = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[1];
	 $wuskydayPrecipProb = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[1];
	 $wuskydayUV = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[1];
	 $wuskydayUVdesc = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[1];	
	 $wuskydaysnow = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[1];
	 $wuskydaysummary = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[1];	 
	 $wuskythunder = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[1];
	 $wuskyhumidity = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[1];} 
	
	 
	 else {
		$wuskydayIcon=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0];	 
		$wuskydayTime = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[0];	 
		$wuskydaynight = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[0];
		$wuskydesc = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[0];
		$wuskydayTempHigh = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[0];
	 $wuskydayTempLow = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[0];	 
	 $wuskydayWindGust = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[0];
	 $wuskydayWinddir = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[0];
	 $wuskydayWinddircardinal = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[0];
	 $wuskydayacumm = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[0];
	 $wuskydayPrecipType = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[0];
	 $wuskydayprecipIntensity = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[0];
	 $wuskydayPrecipProb = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[0];
	 $wuskydayUV = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[0];
	 $wuskydayUVdesc = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[0];	
	 $wuskydaysnow = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[0];
	 $wuskydaysummary = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[0];	 
	 $wuskythunder = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[0];
	 $wuskyheatindex = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[0];
	 $wuskyhumidity = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[0];
	 }
	 //weather34 wu 1st	 
	  if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==0){
		$wuskydayIcon1=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[2];	 
		$wuskydayTime1 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[2];
		$wuskydaynight1 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[2];
		$wuskydesc1 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[2];
		$wuskydayTempHigh1 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[2];	
	 $wuskydayTempLow1 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[2];	 
	 $wuskydayWindGust1 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[2];
	 $wuskydayWinddir1 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[2];
	 $wuskydayWinddircardinal1 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[2];
	 $wuskydayacumm1 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[2];
	 $wuskydayPrecipType1 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[2];
	 $wuskydayprecipIntensity1 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[2];
	 $wuskydayPrecipProb1 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[2];
	 $wuskydayUV1 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[2];
	 $wuskydayUVdesc1 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[2];	
	 $wuskydaysnow1 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[2];
	 $wuskydaysummary1 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[2];	 
	 $wuskythunder1 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[2];		
	 $wuskyheatindex1 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[2]; 
	 $wuskyhumidity1 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[2];
	 }
	  else {	 
		$wuskydayIcon1=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[1];	 
		$wuskydayTime1 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[1];	 
		$wuskydaynight1 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[1];
		$wuskydesc1 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[1];
		$wuskydayTempHigh1 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[1];	
	 $wuskydayTempLow1 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[1];
	 $wuskydayWindGust1 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[1];
	 $wuskydayWinddir1 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[1];
	 $wuskydayWinddircardinal1 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[1];
	 $wuskydayacumm1 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[1];
	 $wuskydayPrecipType1 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[1];
	 $wuskydayprecipIntensity1 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[1];
	 $wuskydayPrecipProb1 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[1];
	 $wuskydayUV1 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[1];
	 $wuskydayUVdesc1 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[1];	
	 $wuskydaysnow1 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[1];
	 $wuskydaysummary1 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[1];	 
	 $wuskythunder1 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[1];
	 $wuskyheatindex1 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[1]; 
	 $wuskyhumidity1 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[1];
	  }
	 //weather34 wu 2nd		 
	 if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==0){
		$wuskydayIcon2=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[3];	 
		$wuskydayTime2 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[3];	 
		$wuskydaynight2 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[3];
		$wuskydesc2 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[3];
		$wuskydayTempHigh2 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[3];		
	 $wuskydayTempLow2 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[3];	 
	 $wuskydayWindGust2 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[3];
	 $wuskydayWinddir2 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[3];
	 $wuskydayWinddircardinal2 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[3];
	 $wuskydayacumm2 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[3];
	 $wuskydayPrecipType2 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[3];
	 $wuskydayprecipIntensity2 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[3];
	 $wuskydayPrecipProb2 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[3];
	 $wuskydayUV2 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[3];
	 $wuskydayUVdesc2 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[3];	
	 $wuskydaysnow2 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[3];
	 $wuskydaysummary2 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[3];	 
	 $wuskythunder2 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[3];	 
	 $wuskyheatindex2 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[3]; 
	 $wuskyhumidity2 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[3];
}
else {
	 
	$wuskydayIcon2=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[2];	 
	$wuskydayTime2 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[2];
	$wuskydaynight2 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[2]; 
	$wuskydesc2 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[2];
	$wuskydayTempHigh2 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[2];		
	 $wuskydayTempLow2 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[2];
	 $wuskydayWindGust2 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[2];
	 $wuskydayWinddir2 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[2];
	 $wuskydayWinddircardinal2 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[2];
	 $wuskydayacumm2 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[2];
	 $wuskydayPrecipType2 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[2];
	 $wuskydayprecipIntensity2 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[2];
	 $wuskydayPrecipProb2 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[2];
	 $wuskydayUV2 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[2];
	 $wuskydayUVdesc2 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[2];	
	 $wuskydaysnow2 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[2];
	 $wuskydaysummary2 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[2];	 
	 $wuskythunder2 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[2];
	 $wuskyheatindex2 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[2];
	 $wuskyhumidity2 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[2];
	  	 }
	 //weather34 wu 3rd
	 if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==0){
		$wuskydayIcon3=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[4];	 
		$wuskydayTime3 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[4];	 
		$wuskydaysummary3 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[4];
		$wuskydaynight3 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[4];	
		$wuskydesc3 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[4]; 
		$wuskydayTempHigh3 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[4];	
	 $wuskydayTempLow3 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[4];
	 $wuskydayWindGust3 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[4];
	 $wuskydayWinddir3 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[4];
	 $wuskydayWinddircardinal3 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[4];
	 $wuskydayacumm3 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[4];
	 $wuskydayPrecipType3 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[4];
	 $wuskydayprecipIntensity3 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[4];
	 $wuskydayPrecipProb3 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[4];
	 $wuskydayUV3 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[4];
	 $wuskydayUVdesc3 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[4];
	 $wuskydaysnow3 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[4];
	 $wuskydaysummary3 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[4];	 
	 $wuskythunder3 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[4];
	 $wuskyheatindex3 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[4];
	 $wuskyhumidity3 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[4];
	 }

	 else {
	 $wuskydayIcon3=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[3];	 
	 $wuskydayTime3 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[3];
	 $wuskydaysummary3 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[3];
	 $wuskydaynight3 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[3];	
	 $wuskydesc3 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[3]; 
	 $wuskydayTempHigh3 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[3];	
	 $wuskydayTempLow3 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[3];
	 $wuskydayWindGust3 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[3];
	 $wuskydayWinddir3 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[3];
	 $wuskydayWinddircardinal3 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[3];
	 $wuskydayacumm3 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[3];
	 $wuskydayPrecipType3 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[3];
	 $wuskydayprecipIntensity3 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[3];
	 $wuskydayPrecipProb3 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[3];
	 $wuskydayUV3 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[3];
	 $wuskydayUVdesc3 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[3];
	 $wuskydaysnow3 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[3];
	 $wuskydaysummary3 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[3];	 
	 $wuskythunder3 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[3];
	 $wuskyheatindex3 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[3]; 
	 $wuskyhumidity3 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[3];	
	}	

	  //weather34 wu 4th
	  if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==0){
		$wuskydayIcon4=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[5];	 
		$wuskydayTime4 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[5];	 
		$wuskydaynight4 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[5];
		$wuskydesc4 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[5];
		$wuskydayTempHigh4 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[5];		
	 $wuskydayTempLow4 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[5];
	 $wuskydayWindGust4 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[5];
	 $wuskydayWinddir4 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[5];
	 $wuskydayWinddircardinal4 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[5];
	 $wuskydayacumm4 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[5];
	 $wuskydayPrecipType4 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[5];
	 $wuskydayprecipIntensity4 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[5];
	 $wuskydayPrecipProb4 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[5];
	 $wuskydayUV4 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[5];
	 $wuskydayUVdesc4 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[5];
	 $wuskydaysnow4 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[5];
	 $wuskydaysummary4 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[5];	
	 $wuskythunder4 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[5];
	 $wuskyheatindex4 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[5]; 
	 $wuskyhumidity4 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[5]; 
	 }
	 
	 else {
		$wuskydayIcon4=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[4];	 
		$wuskydayTime4 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[4];	 
		$wuskydaynight4 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[4];
		$wuskydesc4 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[4];
		$wuskydayTempHigh4 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[4];	
	 $wuskydayTempLow4 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[4];
	 $wuskydayWindGust4 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[4];
	 $wuskydayWinddir4 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[4];
	 $wuskydayWinddircardinal4 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[4];
	 $wuskydayacumm4 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[4];
	 $wuskydayPrecipType4 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[4];
	 $wuskydayprecipIntensity4 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[4];
	 $wuskydayPrecipProb4 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[4];
	 $wuskydayUV4 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[4];
	 $wuskydayUVdesc4 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[4];
	 $wuskydaysnow4 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[4];
	 $wuskydaysummary4 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[4];	
	 $wuskythunder4 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[4];
	 $wuskyheatindex4 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[4];
	 $wuskyhumidity4 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[4];
	 }

	  //weather34 wu 5th
	     if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==0){
	 $wuskydayIcon5=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[6];	 
	 $wuskydayTime5 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[6];		 
	 $wuskydaynight5 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[6];	
	 $wuskydesc5 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[6]; 
	 $wuskydayTempHigh5 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[6];	
	 $wuskydayTempLow5 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[6];
	 $wuskydayWindGust5 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[6];
	 $wuskydayWinddir5 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[6];
	 $wuskydayWinddircardinal5 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[6];
	 $wuskydayacumm5 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[6];
	 $wuskydayPrecipType5 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[6];
	 $wuskydayprecipIntensity5 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[6];
	 $wuskydayPrecipProb5 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[6];
	 $wuskydayUV5 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[6];
	 $wuskydayUVdesc5 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[6];
	 $wuskydaysnow5 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[6];
	 $wuskydaysummary5 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[6];	 
	 $wuskythunder5 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[6];
	 $wuskyheatindex5 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[6];
	 $wuskyhumidity5 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[6];
	 } 	 

	  else {	 
	 $wuskydayIcon5=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[5];	 
	 $wuskydayTime5 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[5];
	 $wuskydaynight5 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[5];	
	 $wuskydesc5 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[5]; 
	 $wuskydayTempHigh5 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[5];	
	 $wuskydayTempLow5 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[5];
	 $wuskydayWindGust5 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[5];
	 $wuskydayWinddir5 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[5];
	 $wuskydayWinddircardinal5 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[5];
	 $wuskydayacumm5 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[5];
	 $wuskydayPrecipType5 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[5];
	 $wuskydayprecipIntensity5 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[5];
	 $wuskydayPrecipProb5 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[5];
	 $wuskydayUV5 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[5];
	 $wuskydayUVdesc5 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[5];
	 $wuskydaysnow5 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[5];
	 $wuskydaysummary5 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[5];	 
	 $wuskythunder5 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[5];
	 $wuskyheatindex5 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[5];
	 $wuskyhumidity5 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[5];
	 }

	  //weather34 wu 6th
	    if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==0){
	 $wuskydayIcon6=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[7];	 
	 $wuskydayTime6 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[7];	 
	 $wuskydaynight6 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[7];
	 $wuskydesc6 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[7];
	 $wuskydayTempHigh6 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[7];		
	 $wuskydayTempLow6 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[7];
	 $wuskydayWindGust6 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[7];
	 $wuskydayWinddir6 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[7];
	 $wuskydayWinddircardinal6 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[7];
	 $wuskydayacumm6 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[7];
	 $wuskydayPrecipType6 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[7];
	 $wuskydayprecipIntensity6 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[7];
	 $wuskydayPrecipProb6 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[7];
	 $wuskydayUV6 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[7];
	 $wuskydayUVdesc6 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[7];
	 $wuskydaysnow6 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[7];
	 $wuskydaysummary6 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[7];	
	 $wuskythunder6 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[7];
	 $wuskyheatindex6 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[7];
	 $wuskyhumidity6 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[7];
	 }	 

	 else{
	  $wuskydayIcon6=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[6];	 
	 $wuskydayTime6 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[6];	
	 $wuskydaynight6 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[6];
	 $wuskydesc6 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[6];
	 $wuskydayTempHigh6 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[6];		
	 $wuskydayTempLow6 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[6];
	 $wuskydayWindGust6 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[6];
	 $wuskydayWinddir6 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[6];
	 $wuskydayWinddircardinal6 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[6];
	 $wuskydayacumm6 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[6];
	 $wuskydayPrecipType6 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[6];
	 $wuskydayprecipIntensity6 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[6];
	 $wuskydayPrecipProb6 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[6];
	 $wuskydayUV6 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[6];
	 $wuskydayUVdesc6 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[6];
	 $wuskydaysnow6 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[6];
	 $wuskydaysummary6 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[6];	
	 $wuskythunder6 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[6];
	 $wuskyheatindex6 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[6];
	 $wuskyhumidity6 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[6];
	 }

	 //weather34 wu 7th
	   if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==0){
	 $wuskydayIcon7=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[8];	 
	 $wuskydayTime7 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[8];
	 $wuskydaynight7 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[8];
	 $wuskydesc7 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[8];
	 $wuskydayTempHigh7 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[8];	
	 $wuskydayTempLow7 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[8];
	 $wuskydayWindGust7 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[8];
	 $wuskydayWinddir7 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[8];
	 $wuskydayWinddircardinal7 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[8];
	 $wuskydayacumm7 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[8];
	 $wuskydayPrecipType7 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[8];
	 $wuskydayprecipIntensity7 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[8];
	 $wuskydayPrecipProb7 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[8];
	 $wuskydayUV7 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[8];
	 $wuskydayUVdesc7 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[8];
	 $wuskydaysnow7 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[8];
	 $wuskydaysummary7 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[8];		
	 $wuskythunder7 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[8];
	 $wuskyheatindex7 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[8];
	 $wuskyhumidity7 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[8];
	 }
	 
	 
	 else
	 {
		$wuskydayIcon7=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[7];	 
		$wuskydayTime7 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[7];
		$wuskydaynight7 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[7];
		$wuskydesc7 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[7];
		$wuskydayTempHigh7 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[7];	
	 $wuskydayTempLow7 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[7];
	 $wuskydayWindGust7 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[7];
	 $wuskydayWinddir7 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[7];
	 $wuskydayWinddircardinal7 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[7];
	 $wuskydayacumm7 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[7];
	 $wuskydayPrecipType7 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[7];
	 $wuskydayprecipIntensity7 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[7];
	 $wuskydayPrecipProb7 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[7];
	 $wuskydayUV7 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[7];
	 $wuskydayUVdesc7 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[7];
	 $wuskydaysnow7 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[7];
	 $wuskydaysummary7 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[7];	 
	 $wuskythunder7 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[7];
	 $wuskyheatindex7 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[7];
	 $wuskyhumidity7 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[7];
	 }
		 
}

 //weather34 wu 8th
 if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==0){
	$wuskydayIcon8=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[9];	 
	$wuskydayTime8 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[9];	 
	$wuskydaysummary8 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[9];	 
	$wuskydaynight8 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[9];
	$wuskydesc8 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[9];
	$wuskydayTempHigh8 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[9];	
	 $wuskydayTempLow8 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[9];
	 $wuskydayWindGust8 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[9];
	 $wuskydayWinddir8 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[9];
	 $wuskydayWinddircardinal8 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[9];
	 $wuskydayacumm8 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[9];
	 $wuskydayPrecipType8 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[9];
	 $wuskydayprecipIntensity8 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[9];
	 $wuskydayPrecipProb8 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[9];
	 $wuskydayUV8 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[9];
	 $wuskydayUVdesc8 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[9];
	 $wuskydaysnow8 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[9];
	 $wuskydaysummary8 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[9];	 	
	 $wuskythunder8 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[9];
	 $wuskyheatindex8 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[9];
	 $wuskyhumidity8 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[8];
	 }
	 
	 
	 else
	 {
		$wuskydayIcon8=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[8];	 
		$wuskydayTime8 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[8];	
		$wuskydaysummary8 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[8];	 
		$wuskydaynight8 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[8];
		$wuskydesc8 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[8];
		$wuskydayTempHigh8 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[8];	
	 $wuskydayTempLow8 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[8];
	 $wuskydayWindGust8 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[8];
	 $wuskydayWinddir8 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[8];
	 $wuskydayWinddircardinal8 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[8];
	 $wuskydayacumm8 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[8];
	 $wuskydayPrecipType8 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[8];
	 $wuskydayprecipIntensity8 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[8];
	 $wuskydayPrecipProb8 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[8];
	 $wuskydayUV8 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[8];
	 $wuskydayUVdesc8 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[8];
	 $wuskydaysnow8 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[8];
	 $wuskydaysummary8 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[8];		 
	 $wuskythunder8 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[8];
	 $wuskyheatindex8= $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[8];
	 $wuskyhumidity8 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[8];
	 }
		 



 //weather34 wu 9th
 if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==0){
	$wuskydayIcon9=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[10];	 
	$wuskydayTime9 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[10];		 
	$wuskydaysummary9 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[10];	 
	$wuskydaynight9 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[10];
	$wuskydesc9 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[10];
	$wuskydayTempHigh9 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[10];		
	 $wuskydayTempLow9 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[10];
	 $wuskydayWindGust9 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[10];
	 $wuskydayWinddir9 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[10];
	 $wuskydayWinddircardinal9 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[10];
	 $wuskydayacumm9 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[10];
	 $wuskydayPrecipType9 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[10];
	 $wuskydayprecipIntensity9 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[10];
	 $wuskydayPrecipProb9 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[10];
	 $wuskydayUV9 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[10];
	 $wuskydayUVdesc9 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[10];
	 $wuskydaysnow9 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[10];
	 $wuskydaysummary9 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[10];	
	 $wuskythunder9 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[10];
	 $wuskyheatindex9 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[10];
	 $wuskyhumidity9 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[10];
	 }
	 
	 
	 else
	 {
		$wuskydayIcon9=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[9];	 
		$wuskydayTime9 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[9];		 
		$wuskydaynight9 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[9];
		$wuskydesc9 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[9];
		$wuskydayTempHigh9 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[9];	
	 $wuskydayTempLow9 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[9];
	 $wuskydayWindGust9 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[9];
	 $wuskydayWinddir9 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[9];
	 $wuskydayWinddircardinal9 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[9];
	 $wuskydayacumm9 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[9];
	 $wuskydayPrecipType9 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[9];
	 $wuskydayprecipIntensity9 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[9];
	 $wuskydayPrecipProb9 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[9];
	 $wuskydayUV9 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[9];
	 $wuskydayUVdesc9 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[9];
	 $wuskydaysnow9 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[9];
	 $wuskydaysummary9 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[9];	 
	 $wuskythunder9 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[9];
	 $wuskyheatindex9 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[9];
	 $wuskyhumidity9 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[9];
	 }
		 



//weather34 wu 10th
if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0]==0){
	$wuskydayIcon10=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[11];	 
	$wuskydayTime10 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[11];	 
	$wuskydaynight10 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[11];
	$wuskydesc10 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[11];
	$wuskydayTempHigh10 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[11];	
	 $wuskydayTempLow10 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[11];
	 $wuskydayWindGust10 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[11];
	 $wuskydayWinddir10 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[11];
	 $wuskydayWinddircardinal10 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[11];
	 $wuskydayacumm10 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[11];
	 $wuskydayPrecipType10 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[11];
	 $wuskydayprecipIntensity10 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[11];
	 $wuskydayPrecipProb10 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[11];
	 $wuskydayUV10 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[11];
	 $wuskydayUVdesc10 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[11];
	 $wuskydaysnow10 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[11];
	 $wuskydaysummary10 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[11];	
	 $wuskythunder10 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[11];
	 $wuskyheatindex10 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[11];
	 $wuskyhumidity10 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[11];
	 }
	 
	 
	 else{
		$wuskydayIcon10=$parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[10];	 
		$wuskydayTime10 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[10];	 
		$wuskydaynight10 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[10];
		$wuskydesc10 = $parsed_weather34wujson->{'daypart'}[0]->{'wxPhraseLong'}[10];	 
		$wuskydayTempHigh10 = $parsed_weather34wujson->{'daypart'}[0]->{'temperature'}[10];	
	 $wuskydayTempLow10 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureWindChill'}[10];
	 $wuskydayWindGust10 = $parsed_weather34wujson->{'daypart'}[0]->{'windSpeed'}[10];
	 $wuskydayWinddir10 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirection'}[10];
	 $wuskydayWinddircardinal10 = $parsed_weather34wujson->{'daypart'}[0]->{'windDirectionCardinal'}[10];
	 $wuskydayacumm10 = $parsed_weather34wujson->{'daypart'}[0]->{'snowRange'}[10];
	 $wuskydayPrecipType10 = $parsed_weather34wujson->{'daypart'}[0]->{'precipType'}[10];
	 $wuskydayprecipIntensity10 = $parsed_weather34wujson->{'daypart'}[0]->{'qpf'}[10];
	 $wuskydayPrecipProb10 = $parsed_weather34wujson->{'daypart'}[0]->{'precipChance'}[10];
	 $wuskydayUV10 = $parsed_weather34wujson->{'daypart'}[0]->{'uvIndex'}[10];
	 $wuskydayUVdesc10 = $parsed_weather34wujson->{'daypart'}[0]->{'uvDescription'}[10];
	 $wuskydaysnow10 = $parsed_weather34wujson->{'daypart'}[0]->{'qpfSnow'}[10];
	 $wuskydaysummary10 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[10];	
	 $wuskythunder10 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[10];
	 $wuskyheatindex10 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[10];
	 $wuskyhumidity10 = $parsed_weather34wujson->{'daypart'}[0]->{'relativeHumidity'}[10];
	 }
	 //wu convert temps-rain
	//metric to F
	if ($tempunit=='F' && $wuapiunit=='m' ){$wuskydayTempHigh=($wuskydayTempHigh*9/5)+32;}	
	// metric to F UK
	if ($tempunit=='F' && $wuapiunit=='h' ){$wuskydayTempHigh=($wuskydayTempHigh*9/5)+32;}	
	// ms non metric Scandinavia 
	if ($tempunit=='F' && $wuapiunit=='s'){$wuskydayTempHigh=($wuskydayTempHigh*9/5)+32;}	
	// non metric to c US
	if ($tempunit=='C' && $wuapiunit=='e' ){$wuskydayTempHigh=($wuskydayTempHigh-32)/1.8;}	
	
	//heatindex
	if ($tempunit=='F' && $wuapiunit=='m' ){$wuskyheatindex=($wuskyheatindex*9/5)+32;}	
	// metric to F UK
	if ($tempunit=='F' && $wuapiunit=='h' ){$wuskyheatindex=($wuskyheatindex*9/5)+32;}	
	// ms non metric Scandinavia 
	if ($tempunit=='F' && $wuapiunit=='s'){$wuskyheatindex=($wuskyheatindex*9/5)+32;}	
	// non metric to c US
	if ($tempunit=='C' && $wuapiunit=='e' ){$wuskyheatindex=($wuskyheatindex-32)/1.8;}	
	
	
	//rain inches to mm
	if ($rainunit=='mm' && $wuapiunit=='e' ){$wuskydayprecipIntensity=$wuskydayprecipIntensity*25.4;}
	//rain mm to inches scandinavia
	if ($rainunit=='in' && $wuapiunit=='s' ){$wuskydayprecipIntensity=round($wuskydayprecipIntensity*0.0393701,3);}
	//rain mm to inches uk
	if ($rainunit=='in' && $wuapiunit=='h' ){$wuskydayprecipIntensity=round($wuskydayprecipIntensity*0.0393701,3);}
	//rain mm to inches metric
	if ($rainunit=='in' && $wuapiunit=='m' ){$wuskydayprecipIntensity=round($wuskydayprecipIntensity*0.0393701,3);}
	
	//wu convert temps-rain period1 
	//metric to F
	if ($tempunit=='F' && $wuapiunit=='m' ){$wuskydayTempHigh1=($wuskydayTempHigh1*9/5)+32;}	
	// metric to F UK
	if ($tempunit=='F' && $wuapiunit=='h' ){$wuskydayTempHigh1=($wuskydayTempHigh1*9/5)+32;}	
	// ms non metric Scandinavia 
	if ($tempunit=='F' && $wuapiunit=='s'){$wuskydayTempHigh1=($wuskydayTempHigh1*9/5)+32;}	
	// non metric to c US
	if ($tempunit=='C' && $wuapiunit=='e' ){$wuskydayTempHigh1=($wuskydayTempHigh1-32)/1.8;}	
	
	//heatindex
	if ($tempunit=='F' && $wuapiunit=='m' ){$wuskyheatindex1=($wuskyheatindex1*9/5)+32;}	
	// metric to F UK
	if ($tempunit=='F' && $wuapiunit=='h' ){$wuskyheatindex1=($wuskyheatindex1*9/5)+32;}	
	// ms non metric Scandinavia 
	if ($tempunit=='F' && $wuapiunit=='s'){$wuskyheatindex1=($wuskyheatindex1*9/5)+32;}	
	// non metric to c US
	if ($tempunit=='C' && $wuapiunit=='e' ){$wuskyheatindex1=($wuskyheatindex1-32)/1.8;}
	
	//rain inches to mm
	if ($rainunit=='mm' && $wuapiunit=='e' ){$wuskydayprecipIntensity1=$wuskydayprecipIntensity1*25.4;}
	//rain mm to inches scandinavia
	if ($rainunit=='in' && $wuapiunit=='s' ){$wuskydayprecipIntensity1=round($wuskydayprecipIntensity1*0.0393701,3);}
	//rain mm to inches uk
	if ($rainunit=='in' && $wuapiunit=='h' ){$wuskydayprecipIntensity1=round($wuskydayprecipIntensity1*0.0393701,3);}
	//rain mm to inches metric
	if ($rainunit=='in' && $wuapiunit=='m' ){$wuskydayprecipIntensity1=round($wuskydayprecipIntensity1*0.0393701,3);}
	
	//wu convert temps-rain period2 
	//metric to F
	if ($tempunit=='F' && $wuapiunit=='m' ){$wuskydayTempHigh2=($wuskydayTempHigh2*9/5)+32;}	
	// metric to F UK
	if ($tempunit=='F' && $wuapiunit=='h' ){$wuskydayTempHigh2=($wuskydayTempHigh2*9/5)+32;}	
	// ms non metric Scandinavia 
	if ($tempunit=='F' && $wuapiunit=='s'){$wuskydayTempHigh2=($wuskydayTempHigh2*9/5)+32;}	
	// non metric to c US
	if ($tempunit=='C' && $wuapiunit=='e' ){$wuskydayTempHigh2=($wuskydayTempHigh2-32)/1.8;}	
	
	//heatindex
	if ($tempunit=='F' && $wuapiunit=='m' ){$wuskyheatindex2=($wuskyheatindex2*9/5)+32;}	
	// metric to F UK
	if ($tempunit=='F' && $wuapiunit=='h' ){$wuskyheatindex2=($wuskyheatindex2*9/5)+32;}	
	// ms non metric Scandinavia 
	if ($tempunit=='F' && $wuapiunit=='s'){$wuskyheatindex2=($wuskyheatindex2*9/5)+32;}	
	// non metric to c US
	if ($tempunit=='C' && $wuapiunit=='e' ){$wuskyheatindex2=($wuskyheatindex2-32)/1.8;}	
	
	//rain inches to mm
	if ($rainunit=='mm' && $wuapiunit=='e' ){$wuskydayprecipIntensity2=$wuskydayprecipIntensity2*25.4;}
	//rain mm to inches scandinavia
	if ($rainunit=='in' && $wuapiunit=='s' ){$wuskydayprecipIntensity2=round($wuskydayprecipIntensity2*0.0393701,3);}
	//rain mm to inches uk
	if ($rainunit=='in' && $wuapiunit=='h' ){$wuskydayprecipIntensity2=round($wuskydayprecipIntensity2*0.0393701,3);}
	//rain mm to inches metric
	if ($rainunit=='in' && $wuapiunit=='m' ){$wuskydayprecipIntensity2=round($wuskydayprecipIntensity2*0.0393701,3);}

	//wu convert temps-rain period3 
	//metric to F
	if ($tempunit=='F' && $wuapiunit=='m' ){$wuskydayTempHigh3=($wuskydayTempHigh3*9/5)+32;}	
	// metric to F UK
	if ($tempunit=='F' && $wuapiunit=='h' ){$wuskydayTempHigh3=($wuskydayTempHigh3*9/5)+32;}	
	// ms non metric Scandinavia 
	if ($tempunit=='F' && $wuapiunit=='s'){$wuskydayTempHigh3=($wuskydayTempHigh3*9/5)+32;}	
	// non metric to c US
	if ($tempunit=='C' && $wuapiunit=='e' ){$wuskydayTempHigh3=($wuskydayTempHigh3-32)/1.8;}	
	
	//heatindex
	if ($tempunit=='F' && $wuapiunit=='m' ){$wuskyheatindex3=($wuskyheatindex3*9/5)+32;}	
	// metric to F UK
	if ($tempunit=='F' && $wuapiunit=='h' ){$wuskyheatindex3=($wuskyheatindex3*9/5)+32;}	
	// ms non metric Scandinavia 
	if ($tempunit=='F' && $wuapiunit=='s'){$wuskyheatindex3=($wuskyheatindex3*9/5)+32;}	
	// non metric to c US
	if ($tempunit=='C' && $wuapiunit=='e' ){$wuskyheatindex3=($wuskyheatindex3-32)/1.8;}	
	
	//rain inches to mm
	if ($rainunit=='mm' && $wuapiunit=='e' ){$wuskydayprecipIntensity3=$wuskydayprecipIntensity3*25.4;}
	//rain mm to inches scandinavia
	if ($rainunit=='in' && $wuapiunit=='s' ){$wuskydayprecipIntensity3=round($wuskydayprecipIntensity3*0.0393701,3);}
	//rain mm to inches uk
	if ($rainunit=='in' && $wuapiunit=='h' ){$wuskydayprecipIntensity3=round($wuskydayprecipIntensity3*0.0393701,3);}
	//rain mm to inches metric
	if ($rainunit=='in' && $wuapiunit=='m' ){$wuskydayprecipIntensity3=round($wuskydayprecipIntensity3*0.0393701,3);}

	//wu convert temps-rain period4 
	//metric to F
	if ($tempunit=='F' && $wuapiunit=='m' ){$wuskydayTempHigh4=($wuskydayTempHigh4*9/5)+32;}	
	// metric to F UK
	if ($tempunit=='F' && $wuapiunit=='h' ){$wuskydayTempHigh4=($wuskydayTempHigh4*9/5)+32;}	
	// ms non metric Scandinavia 
	if ($tempunit=='F' && $wuapiunit=='s'){$wuskydayTempHigh4=($wuskydayTempHigh4*9/5)+32;}	
	// non metric to c US
	if ($tempunit=='C' && $wuapiunit=='e' ){$wuskydayTempHigh4=($wuskydayTempHigh4-32)/1.8;}	
	//heatindex
	if ($tempunit=='F' && $wuapiunit=='m' ){$wuskyheatindex4=($wuskyheatindex4*9/5)+32;}	
	// metric to F UK
	if ($tempunit=='F' && $wuapiunit=='h' ){$wuskyheatindex4=($wuskyheatindex4*9/5)+32;}	
	// ms non metric Scandinavia 
	if ($tempunit=='F' && $wuapiunit=='s'){$wuskyheatindex4=($wuskyheatindex4*9/5)+32;}	
	// non metric to c US
	if ($tempunit=='C' && $wuapiunit=='e' ){$wuskyheatindex4=($wuskyheatindex4-32)/1.8;}	
	
	//rain inches to mm
	if ($rainunit=='mm' && $wuapiunit=='e' ){$wuskydayprecipIntensity4=$wuskydayprecipIntensity4*25.4;}
	//rain mm to inches scandinavia
	if ($rainunit=='in' && $wuapiunit=='s' ){$wuskydayprecipIntensity4=$wuskydayprecipIntensity4*0.0393701;}
	//rain mm to inches uk
	if ($rainunit=='in' && $wuapiunit=='h' ){$wuskydayprecipIntensity4=$wuskydayprecipIntensity4*0.0393701;}
	//rain mm to inches metric
	if ($rainunit=='in' && $wuapiunit=='m' ){$wuskydayprecipIntensity4=$wuskydayprecipIntensity4*0.0393701;}

	//rain inches to mm
	if ($rainunit=='mm' && $wuapiunit=='e' ){$wuskydayprecipIntensity4=$wuskydayprecipIntensity4*25.4;}
	//rain mm to inches scandinavia
	if ($rainunit=='in' && $wuapiunit=='s' ){$wuskydayprecipIntensity4=round($wuskydayprecipIntensity4*0.0393701,3);}
	//rain mm to inches uk
	if ($rainunit=='in' && $wuapiunit=='h' ){$wuskydayprecipIntensity4=round($wuskydayprecipIntensity4*0.0393701,3);}
	//rain mm to inches metric
	if ($rainunit=='in' && $wuapiunit=='m' ){$wuskydayprecipIntensity4=round($wuskydayprecipIntensity4*0.0393701,3);}

	//wu convert temps-rain period5 
	//metric to F
	if ($tempunit=='F' && $wuapiunit=='m' ){$wuskydayTempHigh5=($wuskydayTempHigh5*9/5)+32;}	
	// metric to F UK
	if ($tempunit=='F' && $wuapiunit=='h' ){$wuskydayTempHigh5=($wuskydayTempHigh5*9/5)+32;}	
	// ms non metric Scandinavia 
	if ($tempunit=='F' && $wuapiunit=='s'){$wuskydayTempHigh5=($wuskydayTempHigh5*9/5)+32;}	
	// non metric to c US
	if ($tempunit=='C' && $wuapiunit=='e' ){$wuskydayTempHigh5=($wuskydayTempHigh5-32)/1.8;}
	
	//heatindex
	if ($tempunit=='F' && $wuapiunit=='m' ){$wuskyheatindex5=($wuskyheatindex5*9/5)+32;}	
	// metric to F UK
	if ($tempunit=='F' && $wuapiunit=='h' ){$wuskyheatindex5=($wuskyheatindex5*9/5)+32;}	
	// ms non metric Scandinavia 
	if ($tempunit=='F' && $wuapiunit=='s'){$wuskyheatindex5=($wuskyheatindex5*9/5)+32;}	
	// non metric to c US
	if ($tempunit=='C' && $wuapiunit=='e' ){$wuskyheatindex5=($wuskyheatindex5-32)/1.8;}	
		
	//rain inches to mm
	if ($rainunit=='mm' && $wuapiunit=='e' ){$wuskydayprecipIntensity5=$wuskydayprecipIntensity5*25.4;}
	//rain mm to inches scandinavia
	if ($rainunit=='in' && $wuapiunit=='s' ){$wuskydayprecipIntensity5=round($wuskydayprecipIntensity5*0.0393701,3);}
	//rain mm to inches uk
	if ($rainunit=='in' && $wuapiunit=='h' ){$wuskydayprecipIntensity5=round($wuskydayprecipIntensity5*0.0393701,3);}
	//rain mm to inches metric
	if ($rainunit=='in' && $wuapiunit=='m' ){$wuskydayprecipIntensity5=round($wuskydayprecipIntensity5*0.0393701,3);}

	//wu convert temps-rain period6 
	//metric to F
	if ($tempunit=='F' && $wuapiunit=='m' ){$wuskydayTempHigh6=($wuskydayTempHigh6*9/5)+32;}	
	// metric to F UK
	if ($tempunit=='F' && $wuapiunit=='h' ){$wuskydayTempHigh6=($wuskydayTempHigh6*9/5)+32;}	
	// ms non metric Scandinavia 
	if ($tempunit=='F' && $wuapiunit=='s'){$wuskydayTempHigh6=($wuskydayTempHigh6*9/5)+32;}	
	// non metric to c US
	if ($tempunit=='C' && $wuapiunit=='e' ){$wuskydayTempHigh6=($wuskydayTempHigh6-32)/1.8;}
	
	//heatindex
	if ($tempunit=='F' && $wuapiunit=='m' ){$wuskyheatindex6=($wuskyheatindex6*9/5)+32;}	
	// metric to F UK
	if ($tempunit=='F' && $wuapiunit=='h' ){$wuskyheatindex6=($wuskyheatindex6*9/5)+32;}	
	// ms non metric Scandinavia 
	if ($tempunit=='F' && $wuapiunit=='s'){$wuskyheatindex6=($wuskyheatindex6*9/5)+32;}	
	// non metric to c US
	if ($tempunit=='C' && $wuapiunit=='e' ){$wuskyheatindex6=($wuskyheatindex6-32)/1.8;}	
		
	//rain inches to mm
	if ($rainunit=='mm' && $wuapiunit=='e' ){$wuskydayprecipIntensity6=$wuskydayprecipIntensity6*25.4;}
	//rain mm to inches scandinavia
	if ($rainunit=='in' && $wuapiunit=='s' ){$wuskydayprecipIntensity6=round($wuskydayprecipIntensity6*0.0393701,3);}
	//rain mm to inches uk
	if ($rainunit=='in' && $wuapiunit=='h' ){$wuskydayprecipIntensity6=round($wuskydayprecipIntensity6*0.0393701,3);}
	//rain mm to inches metric
	if ($rainunit=='in' && $wuapiunit=='m' ){$wuskydayprecipIntensity6=round($wuskydayprecipIntensity6*0.0393701,3);}	

	//wu convert temps-rain period7 
	//metric to F
	if ($tempunit=='F' && $wuapiunit=='m' ){$wuskydayTempHigh7=($wuskydayTempHigh7*9/5)+32;}	
	// metric to F UK
	if ($tempunit=='F' && $wuapiunit=='h' ){$wuskydayTempHigh7=($wuskydayTempHigh7*9/5)+32;}	
	// ms non metric Scandinavia 
	if ($tempunit=='F' && $wuapiunit=='s'){$wuskydayTempHigh7=($wuskydayTempHigh7*9/5)+32;}	
	// non metric to c US
	if ($tempunit=='C' && $wuapiunit=='e' ){$wuskydayTempHigh7=($wuskydayTempHigh7-32)/1.8;}	
	
	//heatindex
	if ($tempunit=='F' && $wuapiunit=='m' ){$wuskyheatindex7=($wuskyheatindex7*9/5)+32;}	
	// metric to F UK
	if ($tempunit=='F' && $wuapiunit=='h' ){$wuskyheatindex7=($wuskyheatindex7*9/5)+32;}	
	// ms non metric Scandinavia 
	if ($tempunit=='F' && $wuapiunit=='s'){$wuskyheatindex7=($wuskyheatindex7*9/5)+32;}	
	// non metric to c US
	if ($tempunit=='C' && $wuapiunit=='e' ){$wuskyheatindex7=($wuskyheatindex7-32)/1.8;}	
	
	
	//rain inches to mm
	if ($rainunit=='mm' && $wuapiunit=='e' ){$wuskydayprecipIntensity7=$wuskydayprecipIntensity7*25.4;}
	//rain mm to inches scandinavia
	if ($rainunit=='in' && $wuapiunit=='s' ){$wuskydayprecipIntensity7=round($wuskydayprecipIntensity7*0.0393701,3);}
	//rain mm to inches uk
	if ($rainunit=='in' && $wuapiunit=='h' ){$wuskydayprecipIntensity7=round($wuskydayprecipIntensity7*0.0393701,3);}
	//rain mm to inches metric
	if ($rainunit=='in' && $wuapiunit=='m' ){$wuskydayprecipIntensity7=round($wuskydayprecipIntensity7*0.0393701,3);}	

	//wu convert temps-rain period 8 
	//metric to F
	if ($tempunit=='F' && $wuapiunit=='m' ){$wuskydayTempHigh8=($wuskydayTempHigh8*9/5)+32;}	
	// metric to F UK
	if ($tempunit=='F' && $wuapiunit=='h' ){$wuskydayTempHigh8=($wuskydayTempHigh8*9/5)+32;}	
	// ms non metric Scandinavia 
	if ($tempunit=='F' && $wuapiunit=='s'){$wuskydayTempHigh8=($wuskydayTempHigh8*9/5)+32;}	
	// non metric to c US
	if ($tempunit=='C' && $wuapiunit=='e' ){$wuskydayTempHigh8=($wuskydayTempHigh8-32)/1.8;}	
	
	
	//heatindex
	if ($tempunit=='F' && $wuapiunit=='m' ){$wuskyheatindex8=($wuskyheatindex8*9/5)+32;}	
	// metric to F UK
	if ($tempunit=='F' && $wuapiunit=='h' ){$wuskyheatindex8=($wuskyheatindex8*9/5)+32;}	
	// ms non metric Scandinavia 
	if ($tempunit=='F' && $wuapiunit=='s'){$wuskyheatindex8=($wuskyheatindex8*9/5)+32;}	
	// non metric to c US
	if ($tempunit=='C' && $wuapiunit=='e' ){$wuskyheatindex8=($wuskyheatindex8-32)/1.8;}	
	
	//rain inches to mm
	if ($rainunit=='mm' && $wuapiunit=='e' ){$wuskydayprecipIntensity8=$wuskydayprecipIntensity8*25.4;}
	//rain mm to inches scandinavia
	if ($rainunit=='in' && $wuapiunit=='s' ){$wuskydayprecipIntensity8=round($wuskydayprecipIntensity8*0.0393701,3);}
	//rain mm to inches uk
	if ($rainunit=='in' && $wuapiunit=='h' ){$wuskydayprecipIntensity8=round($wuskydayprecipIntensity8*0.0393701,3);}
	//rain mm to inches metric
	if ($rainunit=='in' && $wuapiunit=='m' ){$wuskydayprecipIntensity8=round($wuskydayprecipIntensity8*0.0393701,3);}	

	//wu convert temps-rain period 9 
	//metric to F
	if ($tempunit=='F' && $wuapiunit=='m' ){$wuskydayTempHigh9=($wuskydayTempHigh9*9/5)+32;}	
	// metric to F UK
	if ($tempunit=='F' && $wuapiunit=='h' ){$wuskydayTempHigh9=($wuskydayTempHigh9*9/5)+32;}	
	// ms non metric Scandinavia 
	if ($tempunit=='F' && $wuapiunit=='s'){$wuskydayTempHigh9=($wuskydayTempHigh9*9/5)+32;}	
	// non metric to c US
	if ($tempunit=='C' && $wuapiunit=='e' ){$wuskydayTempHigh9=($wuskydayTempHigh9-32)/1.8;}	
	//heatindex
	if ($tempunit=='F' && $wuapiunit=='m' ){$wuskyheatindex9=($wuskyheatindex9*9/5)+32;}	
	// metric to F UK
	if ($tempunit=='F' && $wuapiunit=='h' ){$wuskyheatindex9=($wuskyheatindex9*9/5)+32;}	
	// ms non metric Scandinavia 
	if ($tempunit=='F' && $wuapiunit=='s'){$wuskyheatindex9=($wuskyheatindex9*9/5)+32;}	
	// non metric to c US
	if ($tempunit=='C' && $wuapiunit=='e' ){$wuskyheatindex9=($wuskyheatindex9-32)/1.8;}	
	
	//rain inches to mm
	if ($rainunit=='mm' && $wuapiunit=='e' ){$wuskydayprecipIntensity9=$wuskydayprecipIntensity9*25.4;}
	//rain mm to inches scandinavia
	if ($rainunit=='in' && $wuapiunit=='s' ){$wuskydayprecipIntensity9=round($wuskydayprecipIntensity9*0.0393701,3);}	
	//rain mm to inches uk
	if ($rainunit=='in' && $wuapiunit=='h' ){$wuskydayprecipIntensity9=round($wuskydayprecipIntensity9*0.0393701,3);}	
	//rain mm to inches metric
	if ($rainunit=='in' && $wuapiunit=='m' ){$wuskydayprecipIntensity9=round($wuskydayprecipIntensity9*0.0393701,3);}	

	//wu convert temps-rain period 10 
	//metric to F
	if ($tempunit=='F' && $wuapiunit=='m' ){$wuskydayTempHigh10=($wuskydayTempHigh10*9/5)+32;}	
	// metric to F UK
	if ($tempunit=='F' && $wuapiunit=='h' ){$wuskydayTempHigh10=($wuskydayTempHigh10*9/5)+32;}	
	// ms non metric Scandinavia 
	if ($tempunit=='F' && $wuapiunit=='s'){$wuskydayTempHigh10=($wuskydayTempHigh10*9/5)+32;}	
	// non metric to c US
	if ($tempunit=='C' && $wuapiunit=='e' ){$wuskydayTempHigh10=($wuskydayTempHigh10-32)/1.8;}	
	
	//heatindex
	if ($tempunit=='F' && $wuapiunit=='m' ){$wuskyheatindex10=($wuskyheatindex10*9/5)+32;}	
	// metric to F UK
	if ($tempunit=='F' && $wuapiunit=='h' ){$wuskyheatindex10=($wuskyheatindex10*9/5)+32;}	
	// ms non metric Scandinavia 
	if ($tempunit=='F' && $wuapiunit=='s'){$wuskyheatindex10=($wuskyheatindex10*9/5)+32;}	
	// non metric to c US
	if ($tempunit=='C' && $wuapiunit=='e' ){$wuskyheatindex10=($wuskyheatindex10-32)/1.8;}		
	
	//rain inches to mm
	if ($rainunit=='mm' && $wuapiunit=='e' ){$wuskydayprecipIntensity10=$wuskydayprecipIntensity10*25.4;}
	//rain mm to inches scandinavia
	if ($rainunit=='in' && $wuapiunit=='s' ){$wuskydayprecipIntensity10=round($wuskydayprecipIntensity10*0.0393701,3);}	
	//rain mm to inches uk
	if ($rainunit=='in' && $wuapiunit=='h' ){$wuskydayprecipIntensity10=round($wuskydayprecipIntensity10*0.0393701,3);}	
	//rain mm to inches metric
	if ($rainunit=='in' && $wuapiunit=='m' ){$wuskydayprecipIntensity10=round($wuskydayprecipIntensity10*0.0393701,3);}	

	//wu convert temps-rain period 11 
	//metric to F
	if ($tempunit=='F' && $wuapiunit=='m' ){$wuskydayTempHigh11=($wuskydayTempHigh11*9/5)+32;}	
	// metric to F UK
	if ($tempunit=='F' && $wuapiunit=='h' ){$wuskydayTempHigh11=($wuskydayTempHigh11*9/5)+32;}	
	// ms non metric Scandinavia 
	if ($tempunit=='F' && $wuapiunit=='s'){$wuskydayTempHigh11=($wuskydayTempHigh11*9/5)+32;}	
	// non metric to c US
	if ($tempunit=='C' && $wuapiunit=='e' ){$wuskydayTempHigh11=($wuskydayTempHigh11-32)/1.8;}	
	
	//heatindex
	if ($tempunit=='F' && $wuapiunit=='m' ){$wuskyheatindex11=($wuskyheatindex11*9/5)+32;}	
	// metric to F UK
	if ($tempunit=='F' && $wuapiunit=='h' ){$wuskyheatindex11=($wuskyheatindex11*9/5)+32;}	
	// ms non metric Scandinavia 
	if ($tempunit=='F' && $wuapiunit=='s'){$wuskyheatindex11=($wuskyheatindex11*9/5)+32;}	
	// non metric to c US
	if ($tempunit=='C' && $wuapiunit=='e' ){$wuskyheatindex11=($wuskyheatindex11-32)/1.8;}	
	
	//rain inches to mm
	if ($rainunit=='mm' && $wuapiunit=='e' ){$wuskydayprecipIntensity11=$wuskydayprecipIntensity11*25.4;}
	//rain mm to inches scandinavia
	if ($rainunit=='in' && $wuapiunit=='s' ){$wuskydayprecipIntensity11=round($wuskydayprecipIntensity11*0.0393701,3);}	
	//rain mm to inches uk
	if ($rainunit=='in' && $wuapiunit=='h' ){$wuskydayprecipIntensity11=round($wuskydayprecipIntensity11*0.0393701,3);}	
	//rain mm to inches metric
	if ($rainunit=='in' && $wuapiunit=='m' ){$wuskydayprecipIntensity11=round($wuskydayprecipIntensity11*0.0393701,3);}	
	
	// mph to kmh US
if ($windunit=='km/h' && $wuapiunit=='e' ){$wuskydayWindGust=(number_format($wuskydayWindGust,1)*1.60934);}
// mph to kmh UK
if ($windunit=='km/h' && $wuapiunit=='h' ){$wuskydayWindGust=(number_format($wuskydayWindGust,1)*1.60934);}
//mph to ms US
if ($windunit=='m/s' && $wuapiunit=='e' ){$wuskydayWindGust=(number_format($wuskydayWindGust,1)*0.44704);}
//mph to ms uk
if ($windunit=='m/s' && $wuapiunit=='h' ){$wuskydayWindGust=(number_format($wuskydayWindGust,1)*0.44704);}
//kmh to ms
if ($windunit=='m/s' && $wuapiunit=='m' ){$wuskydayWindGust=(number_format($wuskydayWindGust,1)*0.277778);}
//kmh to mph
if ($windunit=='mph' && $wuapiunit=='m' ){$wuskydayWindGust=(number_format($wuskydayWindGust,1)*0.621371);}	

// mph to kmh US 1
if ($windunit=='km/h' && $wuapiunit=='e' ){$wuskydayWindGust1=(number_format($wuskydayWindGust1,1)*1.60934);}
// mph to kmh UK
if ($windunit=='km/h' && $wuapiunit=='h' ){$wuskydayWindGust1=(number_format($wuskydayWindGust1,1)*1.60934);}
//mph to ms US
if ($windunit=='m/s' && $wuapiunit=='e' ){$wuskydayWindGust1=(number_format($wuskydayWindGust1,1)*0.44704);}
//mph to ms uk
if ($windunit=='m/s' && $wuapiunit=='h' ){$wuskydayWindGust1=(number_format($wuskydayWindGust1,1)*0.44704);}
//kmh to ms
if ($windunit=='m/s' && $wuapiunit=='m' ){$wuskydayWindGust1=(number_format($wuskydayWindGust1,1)*0.277778);}
//kmh to mph
if ($windunit=='mph' && $wuapiunit=='m' ){$wuskydayWindGust1=(number_format($wuskydayWindGust1,1)*0.621371);}	

// mph to kmh US 2
if ($windunit=='km/h' && $wuapiunit=='e' ){$wuskydayWindGust2=(number_format($wuskydayWindGust2,1)*1.60934);}
// mph to kmh UK
if ($windunit=='km/h' && $wuapiunit=='h' ){$wuskydayWindGust2=(number_format($wuskydayWindGust2,1)*1.60934);}
//mph to ms US
if ($windunit=='m/s' && $wuapiunit=='e' ){$wuskydayWindGust2=(number_format($wuskydayWindGust2,1)*0.44704);}
//mph to ms uk
if ($windunit=='m/s' && $wuapiunit=='h' ){$wuskydayWindGust2=(number_format($wuskydayWindGust2,1)*0.44704);}
//kmh to ms
if ($windunit=='m/s' && $wuapiunit=='m' ){$wuskydayWindGust2=(number_format($wuskydayWindGust2,1)*0.277778);}
//kmh to mph
if ($windunit=='mph' && $wuapiunit=='m' ){$wuskydayWindGust2=(number_format($wuskydayWindGust2,1)*0.621371);}	

// mph to kmh US 3
if ($windunit=='km/h' && $wuapiunit=='e' ){$wuskydayWindGust3=(number_format($wuskydayWindGust3,1)*1.60934);}
// mph to kmh UK
if ($windunit=='km/h' && $wuapiunit=='h' ){$wuskydayWindGust3=(number_format($wuskydayWindGust3,1)*1.60934);}
//mph to ms US
if ($windunit=='m/s' && $wuapiunit=='e' ){$wuskydayWindGust3=(number_format($wuskydayWindGust3,1)*0.44704);}
//mph to ms uk
if ($windunit=='m/s' && $wuapiunit=='h' ){$wuskydayWindGust3=(number_format($wuskydayWindGust3,1)*0.44704);}
//kmh to ms
if ($windunit=='m/s' && $wuapiunit=='m' ){$wuskydayWindGust3=(number_format($wuskydayWindGust3,1)*0.277778);}
//kmh to mph
if ($windunit=='mph' && $wuapiunit=='m' ){$wuskydayWindGust3=(number_format($wuskydayWindGust3,1)*0.621371);}	

// mph to kmh US 4
if ($windunit=='km/h' && $wuapiunit=='e' ){$wuskydayWindGust4=(number_format($wuskydayWindGust4,1)*1.60934);}
// mph to kmh UK
if ($windunit=='km/h' && $wuapiunit=='h' ){$wuskydayWindGust4=(number_format($wuskydayWindGust4,1)*1.60934);}
//mph to ms US
if ($windunit=='m/s' && $wuapiunit=='e' ){$wuskydayWindGust4=(number_format($wuskydayWindGust4,1)*0.44704);}
//mph to ms uk
if ($windunit=='m/s' && $wuapiunit=='h' ){$wuskydayWindGust4=(number_format($wuskydayWindGust4,1)*0.44704);}
//kmh to ms
if ($windunit=='m/s' && $wuapiunit=='m' ){$wuskydayWindGust4=(number_format($wuskydayWindGust4,1)*0.277778);}
//kmh to mph
if ($windunit=='mph' && $wuapiunit=='m' ){$wuskydayWindGust4=(number_format($wuskydayWindGust4,1)*0.621371);}	

// mph to kmh US 5
if ($windunit=='km/h' && $wuapiunit=='e' ){$wuskydayWindGust5=(number_format($wuskydayWindGust5,1)*1.60934);}
// mph to kmh UK
if ($windunit=='km/h' && $wuapiunit=='h' ){$wuskydayWindGust5=(number_format($wuskydayWindGust5,1)*1.60934);}
//mph to ms US
if ($windunit=='m/s' && $wuapiunit=='e' ){$wuskydayWindGust5=(number_format($wuskydayWindGust5,1)*0.44704);}
//mph to ms uk
if ($windunit=='m/s' && $wuapiunit=='h' ){$wuskydayWindGust5=(number_format($wuskydayWindGust5,1)*0.44704);}
//kmh to ms
if ($windunit=='m/s' && $wuapiunit=='m' ){$wuskydayWindGust5=(number_format($wuskydayWindGust5,1)*0.277778);}
//kmh to mph
if ($windunit=='mph' && $wuapiunit=='m' ){$wuskydayWindGust5=(number_format($wuskydayWindGust5,1)*0.621371);}	
	

// mph to kmh US 6
if ($windunit=='km/h' && $wuapiunit=='e' ){$wuskydayWindGust6=(number_format($wuskydayWindGust6,1)*1.60934);}
// mph to kmh UK
if ($windunit=='km/h' && $wuapiunit=='h' ){$wuskydayWindGust6=(number_format($wuskydayWindGust6,1)*1.60934);}
//mph to ms US
if ($windunit=='m/s' && $wuapiunit=='e' ){$wuskydayWindGust6=(number_format($wuskydayWindGust6,1)*0.44704);}
//mph to ms uk
if ($windunit=='m/s' && $wuapiunit=='h' ){$wuskydayWindGust6=(number_format($wuskydayWindGust6,1)*0.44704);}
//kmh to ms
if ($windunit=='m/s' && $wuapiunit=='m' ){$wuskydayWindGust6=(number_format($wuskydayWindGust6,1)*0.277778);}
//kmh to mph
if ($windunit=='mph' && $wuapiunit=='m' ){$wuskydayWindGust6=(number_format($wuskydayWindGust6,1)*0.621371);}	
	

// mph to kmh US 7
if ($windunit=='km/h' && $wuapiunit=='e' ){$wuskydayWindGust7=(number_format($wuskydayWindGust7,1)*1.60934);}
// mph to kmh UK
if ($windunit=='km/h' && $wuapiunit=='h' ){$wuskydayWindGust7=(number_format($wuskydayWindGust7,1)*1.60934);}
//mph to ms US
if ($windunit=='m/s' && $wuapiunit=='e' ){$wuskydayWindGust7=(number_format($wuskydayWindGust7,1)*0.44704);}
//mph to ms uk
if ($windunit=='m/s' && $wuapiunit=='h' ){$wuskydayWindGust7=(number_format($wuskydayWindGust7,1)*0.44704);}
//kmh to ms
if ($windunit=='m/s' && $wuapiunit=='m' ){$wuskydayWindGust7=(number_format($wuskydayWindGust7,1)*0.277778);}
//kmh to mph
if ($windunit=='mph' && $wuapiunit=='m' ){$wuskydayWindGust7=(number_format($wuskydayWindGust7,1)*0.621371);}	


// mph to kmh US 8
if ($windunit=='km/h' && $wuapiunit=='e' ){$wuskydayWindGust8=(number_format($wuskydayWindGust8,1)*1.60934);}
// mph to kmh UK
if ($windunit=='km/h' && $wuapiunit=='h' ){$wuskydayWindGust8=(number_format($wuskydayWindGust8,1)*1.60934);}
//mph to ms US
if ($windunit=='m/s' && $wuapiunit=='e' ){$wuskydayWindGust8=(number_format($wuskydayWindGust8,1)*0.44704);}
//mph to ms uk
if ($windunit=='m/s' && $wuapiunit=='h' ){$wuskydayWindGust8=(number_format($wuskydayWindGust8,1)*0.44704);}
//kmh to ms
if ($windunit=='m/s' && $wuapiunit=='m' ){$wuskydayWindGust8=(number_format($wuskydayWindGust8,1)*0.277778);}
//kmh to mph
if ($windunit=='mph' && $wuapiunit=='m' ){$wuskydayWindGust8=(number_format($wuskydayWindGust8,1)*0.621371);}


// mph to kmh US 9
if ($windunit=='km/h' && $wuapiunit=='e' ){$wuskydayWindGust9=(number_format($wuskydayWindGust9,1)*1.60934);}
// mph to kmh UK
if ($windunit=='km/h' && $wuapiunit=='h' ){$wuskydayWindGust9=(number_format($wuskydayWindGust9,1)*1.60934);}
//mph to ms US
if ($windunit=='m/s' && $wuapiunit=='e' ){$wuskydayWindGust9=(number_format($wuskydayWindGust9,1)*0.44704);}
//mph to ms uk
if ($windunit=='m/s' && $wuapiunit=='h' ){$wuskydayWindGust9=(number_format($wuskydayWindGust9,1)*0.44704);}
//kmh to ms
if ($windunit=='m/s' && $wuapiunit=='m' ){$wuskydayWindGust9=(number_format($wuskydayWindGust9,1)*0.277778);}
//kmh to mph
if ($windunit=='mph' && $wuapiunit=='m' ){$wuskydayWindGust9=(number_format($wuskydayWindGust9,1)*0.621371);}	


// mph to kmh US 10
if ($windunit=='km/h' && $wuapiunit=='e' ){$wuskydayWindGust10=(number_format($wuskydayWindGust10,1)*1.60934);}
// mph to kmh UK
if ($windunit=='km/h' && $wuapiunit=='h' ){$wuskydayWindGust10=(number_format($wuskydayWindGust10,1)*1.60934);}
//mph to ms US
if ($windunit=='m/s' && $wuapiunit=='e' ){$wuskydayWindGust10=(number_format($wuskydayWindGust10,1)*0.44704);}
//mph to ms uk
if ($windunit=='m/s' && $wuapiunit=='h' ){$wuskydayWindGust10=(number_format($wuskydayWindGust10,1)*0.44704);}
//kmh to ms
if ($windunit=='m/s' && $wuapiunit=='m' ){$wuskydayWindGust10=(number_format($wuskydayWindGust10,1)*0.277778);}
//kmh to mph
if ($windunit=='mph' && $wuapiunit=='m' ){$wuskydayWindGust10=(number_format($wuskydayWindGust10,1)*0.621371);}	


// mph to kmh US 11
if ($windunit=='km/h' && $wuapiunit=='e' ){$wuskydayWindGust11=(number_format($wuskydayWindGust11,1)*1.60934);}
// mph to kmh UK
if ($windunit=='km/h' && $wuapiunit=='h' ){$wuskydayWindGust11=(number_format($wuskydayWindGust11,1)*1.60934);}
//mph to ms US
if ($windunit=='m/s' && $wuapiunit=='e' ){$wuskydayWindGust11=(number_format($wuskydayWindGust11,1)*0.44704);}
//mph to ms uk
if ($windunit=='m/s' && $wuapiunit=='h' ){$wuskydayWindGust11=(number_format($wuskydayWindGust11,1)*0.44704);}
//kmh to ms
if ($windunit=='m/s' && $wuapiunit=='m' ){$wuskydayWindGust11=(number_format($wuskydayWindGust11,1)*0.277778);}
//kmh to mph
if ($windunit=='mph' && $wuapiunit=='m' ){$wuskydayWindGust11=(number_format($wuskydayWindGust11,1)*0.621371);}	
	
// Display replaced string
$wuskydayTime2=str_replace("night", "Night", $wuskydayTime2);
$wuskydayTime3=str_replace("night", "Night", $wuskydayTime3);
$wuskydayTime4=str_replace("night", "Night", $wuskydayTime4);
$wuskydayTime5=str_replace("night", "Night", $wuskydayTime5);
$wuskydayTime6=str_replace("night", "Night", $wuskydayTime6);
$wuskydayTime7=str_replace("night", "Night", $wuskydayTime7);
$wuskydayTime8=str_replace("night", "Night", $wuskydayTime8);
$wuskydayTime9=str_replace("night", "Night", $wuskydayTime9);
$wuskydayTime10=str_replace("night", "Night", $wuskydayTime10);

$wuskydayTime3=str_replace("Monday", "Mon", $wuskydayTime3);
$wuskydayTime4=str_replace("Monday", "Mon", $wuskydayTime4);
$wuskydayTime5=str_replace("Monday", "Mon", $wuskydayTime5);
$wuskydayTime6=str_replace("Monday", "Mon", $wuskydayTime6);
$wuskydayTime7=str_replace("Monday", "Mon", $wuskydayTime7);
$wuskydayTime8=str_replace("Monday", "Mon", $wuskydayTime8);
$wuskydayTime9=str_replace("Monday", "Mon", $wuskydayTime9);
$wuskydayTime10=str_replace("Monday", "Mon", $wuskydayTime10);

$wuskydayTime3=str_replace("Tuesday", "Tue", $wuskydayTime3);
$wuskydayTime4=str_replace("Tuesday", "Tue", $wuskydayTime4);
$wuskydayTime5=str_replace("Tuesday", "Tue", $wuskydayTime5);
$wuskydayTime6=str_replace("Tuesday", "Tue", $wuskydayTime6);
$wuskydayTime7=str_replace("Tuesday", "Tue", $wuskydayTime7);
$wuskydayTime8=str_replace("Tuesday", "Tue", $wuskydayTime8);
$wuskydayTime9=str_replace("Tuesday", "Tue", $wuskydayTime9);
$wuskydayTime10=str_replace("Tuesday", "Tue", $wuskydayTime10);

$wuskydayTime3=str_replace("Wednesday", "Wed", $wuskydayTime3);
$wuskydayTime4=str_replace("Wednesday", "Wed", $wuskydayTime4);
$wuskydayTime5=str_replace("Wednesday", "Wed", $wuskydayTime5);
$wuskydayTime6=str_replace("Wednesday", "Wed", $wuskydayTime6);
$wuskydayTime7=str_replace("Wednesday", "Wed", $wuskydayTime7);
$wuskydayTime8=str_replace("Wednesday", "Wed", $wuskydayTime8);
$wuskydayTime9=str_replace("Wednesday", "Wed", $wuskydayTime9);
$wuskydayTime10=str_replace("Wednesday", "Wed", $wuskydayTime10);

$wuskydayTime3=str_replace("Thursday", "Thu", $wuskydayTime3);
$wuskydayTime4=str_replace("Thursday", "Thu", $wuskydayTime4);
$wuskydayTime5=str_replace("Thursday", "Thu", $wuskydayTime5);
$wuskydayTime6=str_replace("Thursday", "Thu", $wuskydayTime6);
$wuskydayTime7=str_replace("Thursday", "Thu", $wuskydayTime7);
$wuskydayTime8=str_replace("Thursday", "Thu", $wuskydayTime8);
$wuskydayTime9=str_replace("Thursday", "Thu", $wuskydayTime9);
$wuskydayTime10=str_replace("Thursday", "Thu", $wuskydayTime10);

$wuskydayTime3=str_replace("Friday", "Fri", $wuskydayTime3);
$wuskydayTime4=str_replace("Friday", "Fri", $wuskydayTime4);
$wuskydayTime5=str_replace("Friday", "Fri", $wuskydayTime5);
$wuskydayTime6=str_replace("Friday", "Fri", $wuskydayTime6);
$wuskydayTime7=str_replace("Friday", "Fri", $wuskydayTime7);
$wuskydayTime8=str_replace("Friday", "Fri", $wuskydayTime8);
$wuskydayTime9=str_replace("Friday", "Fri", $wuskydayTime9);
$wuskydayTime10=str_replace("Friday", "Fri", $wuskydayTime10);

$wuskydayTime3=str_replace("Saturday", "Sat", $wuskydayTime3);
$wuskydayTime4=str_replace("Saturday", "Sat", $wuskydayTime4);
$wuskydayTime5=str_replace("Saturday", "Sat", $wuskydayTime5);
$wuskydayTime6=str_replace("Saturday", "Sat", $wuskydayTime6);
$wuskydayTime7=str_replace("Saturday", "Sat", $wuskydayTime7);
$wuskydayTime8=str_replace("Saturday", "Sat", $wuskydayTime8);
$wuskydayTime9=str_replace("Saturday", "Sat", $wuskydayTime9);
$wuskydayTime10=str_replace("Saturday", "Sat", $wuskydayTime10);

$wuskydayTime3=str_replace("Sunday", "Sun", $wuskydayTime3);
$wuskydayTime4=str_replace("Sunday", "Sun", $wuskydayTime4);
$wuskydayTime5=str_replace("Sunday", "Sun", $wuskydayTime5);
$wuskydayTime6=str_replace("Sunday", "Sun", $wuskydayTime6);
$wuskydayTime7=str_replace("Sunday", "Sun", $wuskydayTime7);
$wuskydayTime8=str_replace("Sunday", "Sun", $wuskydayTime8);
$wuskydayTime9=str_replace("Sunday", "Sun", $wuskydayTime9);
$wuskydayTime10=str_replace("Sunday", "Sun", $wuskydayTime10);

$wuskydayTime1=str_replace("Tomorrow Night", "TM Night", $wuskydayTime1);
$wuskydayTime2=str_replace("Tomorrow Night", "TM Night", $wuskydayTime2);
$wuskydayTime3=str_replace("Tomorrow Night", "TM Night", $wuskydayTime3);

//celsius zero fix...
if ($wuskydayTempHigh==0){$wuskydayTempHigh=0.2;}
if ($wuskydayTempHigh1==0){$wuskydayTempHigh1=0.2;}
if ($wuskydayTempHigh2==0){$wuskydayTempHigh2=0.2;}
if ($wuskydayTempHigh3==0){$wuskydayTempHigh3=0.2;}
if ($wuskydayTempHigh4==0){$wuskydayTempHigh4=0.2;}
if ($wuskydayTempHigh5==0){$wuskydayTempHigh5=0.2;}
if ($wuskydayTempHigh6==0){$wuskydayTempHigh6=0.2;}
if ($wuskydayTempHigh7==0){$wuskydayTempHigh7=0.2;}
if ($wuskydayTempHigh8==0){$wuskydayTempHigh8=0.2;}

//kmh wind gust ...
if ($wuskydayWindGust>=30){$wuskydayWindGust=$wuskydayWindGust*1.60934;}
if ($wuskydayWindGust1>=30){$wuskydayWindGust1=$wuskydayWindGust1*1.60934;}
if ($wuskydayWindGust2>=30){$wuskydayWindGust2=$wuskydayWindGust2*1.60934;}
if ($wuskydayWindGust3>=30){$wuskydayWindGust3=$wuskydayWindGust3*1.60934;}
if ($wuskydayWindGust4>=30){$wuskydayWindGust4=$wuskydayWindGust4*1.60934;}
if ($wuskydayWindGust5>=30){$wuskydayWindGust5=$wuskydayWindGust5*1.60934;}
if ($wuskydayWindGust6>=30){$wuskydayWindGust6=$wuskydayWindGust6*1.60934;}
if ($wuskydayWindGust7>=30){$wuskydayWindGust7=$wuskydayWindGust7*1.60934;}
if ($wuskydayWindGust8>=30){$wuskydayWindGust8=$wuskydayWindGust8*1.60934;}

 $wuskydaysummary=str_replace('Âº','°',$wuskydaysummary);
 $wuskydaysummary1=str_replace('Âº','°',$wuskydaysummary1);
 $wuskydaysummary2=str_replace('Âº','°',$wuskydaysummary2);
 $wuskydaysummary3=str_replace('Âº','°',$wuskydaysummary3);
 $wuskydaysummary4=str_replace('Âº','°',$wuskydaysummary4);
 $wuskydaysummary5=str_replace('Âº','°',$wuskydaysummary5);
 $wuskydaysummary6=str_replace('Âº','°',$wuskydaysummary6);
 $wuskydaysummary7=str_replace('Âº','°',$wuskydaysummary7);
 $wuskydaysummary8=str_replace('Âº','°',$wuskydaysummary8);
 $wuskydaysummary9=str_replace('Âº','°',$wuskydaysummary9);
 $wuskydaysummary10=str_replace('Âº','°',$wuskydaysummary10);

 $wuskydaysummary=str_replace('ºC','°C',$wuskydaysummary);
$wuskydaysummary1=str_replace('ºC','°C',$wuskydaysummary1);
$wuskydaysummary=str_replace('ºF','°F',$wuskydaysummary);
$wuskydaysummary1=str_replace('ºF','°F',$wuskydaysummary1);


 $wuskydayTempHigh=str_replace('ÂºC','',$wuskydayTempHigh);
 $wuskydayTempHigh1=str_replace('ÂºC','',$wuskydayTempHigh1);
 $wuskydayTempHigh2=str_replace('ÂºC','',$wuskydayTempHigh2);
 $wuskydayTempHigh3=str_replace('ÂºC','',$wuskydayTempHigh3);
 $wuskydayTempHigh4=str_replace('ÂºC','',$wuskydayTempHigh4);
 $wuskydayTempHigh5=str_replace('ÂºC','',$wuskydayTempHigh5);
 $wuskydayTempHigh6=str_replace('ÂºC','',$wuskydayTempHigh6);
 $wuskydayTempHigh7=str_replace('ÂºC','',$wuskydayTempHigh7);
 $wuskydayTempHigh8=str_replace('ÂºC','',$wuskydayTempHigh8);
 $wuskydayTempHigh9=str_replace('ÂºC','',$wuskydayTempHigh9);
 $wuskydayTempHigh10=str_replace('ÂºC','',$wuskydayTempHigh10);

 $wuskydayTempHigh=str_replace('ÂºF','',$wuskydayTempHigh);
 $wuskydayTempHigh1=str_replace('ÂºF','',$wuskydayTempHigh1);
 $wuskydayTempHigh2=str_replace('ÂºF','',$wuskydayTempHigh2);
 $wuskydayTempHigh3=str_replace('ÂºF','',$wuskydayTempHigh3);
 $wuskydayTempHigh4=str_replace('ÂºF','',$wuskydayTempHigh4);
 $wuskydayTempHigh5=str_replace('ÂºF','',$wuskydayTempHigh5);
 $wuskydayTempHigh6=str_replace('ÂºF','',$wuskydayTempHigh6);
 $wuskydayTempHigh7=str_replace('ÂºF','',$wuskydayTempHigh7);
 $wuskydayTempHigh8=str_replace('ÂºF','',$wuskydayTempHigh8);
 $wuskydayTempHigh9=str_replace('ÂºF','',$wuskydayTempHigh9);
 $wuskydayTempHigh10=str_replace('ÂºF','',$wuskydayTempHigh10);

?>
