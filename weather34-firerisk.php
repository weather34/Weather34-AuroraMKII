<?php  include('livedata.php');
date_default_timezone_set($TZ);
    ####################################################################################################
    #	CREATED FOR HOMEWEATHERSTATION MB SMART TEMPLATE 											   #
    # https://weather34.com/homeweatherstation/index.html 											   #
    # 	                                                                                               #
    # 	Revised: April 2020	
    # Based on idea by Josep	using the Chandler Burning Index                                       #
    # 	                                                                                               #
    #   https://www.weather34.com 	                                                                   #
    ####################################################################################################

//firerisk CBI 
if ($weather["temp_units"]=='F') {$weather["temp"] = ($weather ["temp"] - 32) * 0.5556;}
$firerisk = number_format((((110 - 1.373 * $weather["humidity"] ) - 0.54 * (10.20 - $weather["temp"] )) * (124 * pow(10,(-0.0142 * $weather["humidity"] ))))/60,0);		
 ?>
<div class="sunblock">
<div class="indoordesc5">Firerisk CBI</div>
<div class="button button-dial-small">   
<?php //CBI
echo "<strikeicon>CBI</strikeicon>";?>     
<div class="button-dial-top-small"></div>
<div class="button-dial-label-small">   <orange> 
<?php //firerisk value
			if ($firerisk>=97.5){ echo "<red>"  .$firerisk."</red>";}
			else if ($firerisk>=90){ echo "<orange>"  .$firerisk."</orange>";}
			else if ($firerisk>=75){ echo "<yellow>"  .$firerisk."</yellow>";}
            else if ($firerisk>=50){ echo "<blue>"  .$firerisk."</blue>";}
            else if ($firerisk>=0){ echo "<green>"  .$firerisk."</green>";}
			else echo "<green>0</green>";
?>
</orange></div></div>
<div class="fireriskicondesc" ><br>
<?php
//risk
if ($firerisk>=97.5){echo 'Caution Required<br>Extreme Risk' .$aqalert;}
else if ($firerisk>=90){echo 'Caution Required<br>Very High Risk' .$aqalert;}
else if ($firerisk>=75){echo 'Caution Required<br>High Risk'.$aqalert;}
else if ($firerisk>=50){echo 'Caution<br>Moderate Risk'."<blue>&nbsp;&nbsp;&nbsp;".$weather34OK."</blue>";}
else if ($firerisk>=0){echo 'No Cautions <br>Low Risk'. "<green>&nbsp;&nbsp;&nbsp;".$weather34OK."</green>";}
else echo "No Cautions <br>Low Risk <green>&nbsp;&nbsp;&nbsp;".$weather34OK."</green>";
?></div></div></div></div>