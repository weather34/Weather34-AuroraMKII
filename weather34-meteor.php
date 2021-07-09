<?php include('settings.php');include('livedata.php');
	####################################################################################################
	#	HOME WEATHER STATION MB SMART TEMPLATE by BRIAN UNDERDOWN 2015-19                              #
	#	CREATED FOR HOMEWEATHERSTATION TEMPLATE at https://weather34.com/homeweatherstation/index.html # 
	# 	                                                                                               #
	# 	                                                                                               #
	# 	WEATHER34 Meteor Shower: 25TH JANUARY 2018  	                                               #
	# 	   revised September 2019                                                                      #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################
  date_default_timezone_set($TZ);
  // meteor shower alternative by betejuice cumulus forum
  $meteor_default="<grey>No Major</grey><br>Meteor Shower<br><grey>Currently Visible</grey>";
  $meteor_events[]=array("event_start"=>mktime(0, 0, 0, 1, 3),"event_title"=>"Quadrantids Meteor","event_end"=>mktime(23, 59, 59, 1, 4),);
  $meteor_events[]=array("event_start"=>mktime(0, 0, 0, 1, 5),"event_title"=>"Quadrantids Meteor","event_end"=>mktime(23, 59, 59, 1, 12),);
  $meteor_events[]=array("event_start"=>mktime(0, 0, 0, 12, 28,2020),"event_title"=>"Quadrantids Meteor Visible","event_end"=>mktime(23, 59, 59, 1, 2,2021),);
  $meteor_events[]=array("event_start"=>mktime(0, 0, 0, 12, 28,2021),"event_title"=>"Quadrantids Meteor","event_end"=>mktime(23, 59, 59, 1, 2,2022),);
  $meteor_events[]=array("event_start"=>mktime(0, 0, 0, 12, 28,2022),"event_title"=>"Quadrantids Meteor","event_end"=>mktime(23, 59, 59, 1, 2,2023),);
  $meteor_events[]=array("event_start"=>mktime(0, 0, 0, 12, 28,2023),"event_title"=>"Quadrantids Meteor","event_end"=>mktime(23, 59, 59, 1, 2,2024),);
  $meteor_events[]=array("event_start"=>mktime(0, 0, 0, 12, 28,2024),"event_title"=>"Quadrantids Meteor","event_end"=>mktime(23, 59, 59, 1, 2,2025),);
  $meteor_events[]=array("event_start"=>mktime(0, 0, 0, 4, 18),"event_title"=>"Lyrids Meteor Visible","event_end"=>mktime(20, 59, 59, 4, 20),);
  $meteor_events[]=array("event_start"=>mktime(0, 0, 0, 4, 21),"event_title"=>"Lyrids Meteor Visible<br><peak>Currently Visible <br>Peak Viewing Period</peak>","event_end"=>mktime(23, 59, 59, 4, 22),);
  $meteor_events[]=array("event_start"=>mktime(0, 0, 0, 5, 5),"event_title"=>"ETA Aquarids Visible<br><peak>Currently Visible <br>Peak Viewing Period</peak>","event_end"=>mktime(23, 59, 59, 5, 6),);
  $meteor_events[]=array("event_start"=>mktime(0, 0, 0, 7, 20),"event_title"=>"Delta Aquarids","event_end"=>mktime(23, 59, 59, 7, 28),);
  $meteor_events[]=array("event_start"=>mktime(0, 0, 0, 7, 29),"event_title"=>"Delta Aquarids<br><peak>Currently Visible <br>Peak Viewing Period</peak>","event_end"=>mktime(23, 59, 59, 7, 30),);
  $meteor_events[]=array("event_start"=>mktime(0, 0, 0, 8, 1),"event_title"=>"Perseids Meteor <br><peak>".$info."Currently Visible ","event_end"=>mktime(23, 59, 59, 8, 10),);
  $meteor_events[]=array("event_start"=>mktime(0, 0, 0, 8, 11),"event_title"=>"Perseids Meteor <br><peak>".$info." For Next Two Days Peak Viewing Period</peak>","event_end"=>mktime(23, 59, 59, 8, 13),);
  $meteor_events[]=array("event_start"=>mktime(0, 0, 0, 8, 14),"event_title"=>"Perseids Meteor <br><peak>".$info."Currently Visible","event_end"=>mktime(23, 59, 59, 8, 26),);
  $meteor_events[]=array("event_start"=>mktime(0, 0, 0, 10, 6),"event_title"=>"Draconids Visible<br><peak>Currently Visible <br>Peak Viewing Period</peak>","event_end"=>mktime(23, 59, 59, 10, 7),);
  $meteor_events[]=array("event_start"=>mktime(0, 0, 0, 10, 20),"event_title"=>"Orionids Meteor Visible <br><peak>Currently Visible <br>Peak Viewing Period</peak>","event_end"=>mktime(23, 59, 59, 10, 21),);
  $meteor_events[]=array("event_start"=>mktime(0, 0, 0, 11, 4),"event_title"=>"South Taurids Visible<br><peak>Currently Visible <br>Peak Viewing Period</peak>","event_end"=>mktime(23, 59, 59, 11, 5),);
  $meteor_events[]=array("event_start"=>mktime(0, 0, 0, 11, 11),"event_title"=>"North Taurids Visible<br><peak>Currently Visible <br>Peak Viewing Period</peak>","event_end"=>mktime(23, 59, 59, 11, 13),);
  $meteor_events[]=array("event_start"=>mktime(0, 0, 0, 11, 14),"event_title"=>"Leonids Meteor <br><peak>Currently Visible <br>Start Of Viewing Period</peak>","event_end"=>mktime(23, 59, 59, 11, 16),);
  $meteor_events[]=array("event_start"=>mktime(0, 0, 0, 11, 17),"event_title"=>"Leonids Meteor <br><peak>Currently Visible <br><peak>Currently Visible <br>Peak Viewing Period</peak>","event_end"=>mktime(23, 59, 59, 11, 18),);
  $meteor_events[]=array("event_start"=>mktime(0, 0, 0, 11, 19),"event_title"=>"Leonids Meteor Shower<br><peak>Currently Visible <br>Nearing End Of Viewing Period</peak>","event_end"=>mktime(23, 59, 59, 11, 29),);
  $meteor_events[]=array("event_start"=>mktime(0, 0, 0, 11, 30),"event_title"=>"Geminids Meteor <br><peak>Currently Visible <br>Start Of Viewing Period</peak>","event_end"=>mktime(23, 59, 59, 12, 12),);
  $meteor_events[]=array("event_start"=>mktime(0, 0, 0, 12, 13),"event_title"=>"Geminids Meteor Visible <br><peak>Currently Visible <br>Peak Viewing Period</peak>","event_end"=>mktime(23, 59, 59, 12, 14),);
  $meteor_events[]=array("event_start"=>mktime(0, 0, 0, 12, 17),"event_title"=>"Ursids Meteor Visible","event_end"=>mktime(23, 59, 59, 12, 20),);
  $meteor_events[]=array("event_start"=>mktime(0, 0, 0, 12, 21),"event_title"=>"Ursids Meteor Visible<br><peak>Currently Visible <br>Peak Viewing Period</peak>","event_end"=>mktime(23, 59, 59, 12, 22),);
  $meteor_events[]=array("event_start"=>mktime(0, 0, 0, 12, 23),"event_title"=>"Ursids Meteor Visible","event_end"=>mktime(23, 59, 59, 12, 25),);
$meteorNow=time();
$meteorOP=false;
foreach ($meteor_events as $meteor_check) {if ($meteor_check["event_start"]<=$meteorNow&&$meteorNow<=$meteor_check["event_end"]) {
  $meteorOP=true;$meteor_default=$meteor_check["event_title"];}};
//end meteor
//weather34 next meteor event original idea betejuice of cumulus forum..
$meteor_nextevent="No Meteor Shower<br>";
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 12, 18,23),"event_title"=>"Meteor Shower<br> <orange1>Quadrantids</orange1><div class=date><br>Active Dec 28th-Jan 12th
<br><green>Estimated ZHR: </green><orange>120 <br> Peaks <orange>Jan 3rd-4th</orange></div></div>","event_end"=>mktime(23, 59, 59, 1, 2,24),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 12, 18,22),"event_title"=>"Meteor Shower<br> <orange1>Quadrantids</orange1><div class=date><br>Active Dec 28th-Jan 12th
<br><green>Estimated ZHR: </green><orange>120 <br> Peaks <orange>Jan 3rd-4th</orange></div></div>","event_end"=>mktime(23, 59, 59, 1, 2,23),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 12, 18,21),"event_title"=>"Meteor Shower<br> <orange1>Quadrantids</orange1><div class=date><br>Active Dec 28th-Jan 12th
<br><green>Estimated ZHR: </green><orange>120 <br> Peaks <orange>Jan 3rd-4th</orange></div></div>","event_end"=>mktime(23, 59, 59, 1, 2,22),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 12, 18,20),"event_title"=>"Meteor Shower<br> <orange1>Quadrantids</orange1><div class=date><br>Active Dec 28th-Jan 12th
<br><green>Estimated ZHR: </green><orange>120 <br> Peaks <orange>Jan 3rd-4th</orange></div></div>","event_end"=>mktime(23, 59, 59, 1, 2,21),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 12, 24),"event_title"=>"Meteor Shower<br> <orange1>Quadrantids</orange1><div class=date><br>Active Dec 28th-Jan 12th
<br><green>Estimated ZHR: </green><orange>120 <br>Peaks <orange>Jan 3rd-4th</orange></div></div>","event_end"=>mktime(23, 59, 59, 1, 2),);
$meteor_eventsnext[]=array("event_start"=>mktime(0, 0, 0, 1, 3),"event_title"=>"Meteor Shower<br> <orange1>Quadrantids</orange1><div class=date><br>Peak Viewing Now<br><div class=date>
<br><green>Estimated ZHR: </green><orange>120</div></div>","event_end"=>mktime(23, 59, 59, 1, 4),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 1, 2),"event_title"=>"Meteor Shower<br> <orange1>&nbsp; &nbsp;Lyrids</orange1><div class=date><br>Active Apr 18th-Apr 25th<br>
<green>Estimated ZHR: </green><orange>18</orange><br>Peaks <orange>Apr 23rd</orange></div></div>","event_end"=>mktime(23, 59, 59, 4, 20),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 4, 20),"event_title"=>"Meteor Shower<br> <orange1>Lyrids</orange1> <div class=date><br>Peak Viewing Now<br>
<green>Estimated ZHR: </green><orange>18</orange><br>Peaks <orange>Apr 23rd</orange></div></div>","event_end"=>mktime(23, 59, 59, 4, 22),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 4, 22),"event_title"=>"Meteor Shower<br> <orange1>&nbsp; &nbsp;ETA Aquarids </orange1><br><div class=date><br>Active Apr 24th-May 19th
<br><green>Estimated ZHR: </green><orange>55 </orange><br> Peaks <orange>May 6th</orange></div></div>","event_end"=>mktime(23, 59, 59, 5, 6),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 5, 6),"event_title"=>"Meteor Shower<br> <orange1>&nbsp; &nbsp;Delta Aquarids</orange1><div class=date><br>Active Jul 21st-Aug 23rd<br><green>Estimated ZHR: </green><orange>16</orange><br> Peaks <orange>Jul 28th</orange></div></div>","event_end"=>mktime(23, 59, 59, 7, 27),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 7, 27),"event_title"=>"Meteor Shower<br> <orange1> &nbsp; &nbsp;Perseids</orange1><div class=date><br>Active Jul 13th-Aug 26th<br>
<green>Estimated ZHR: </green><orange>100</orange><br> Peaks <orange>Aug 11th-13th</orange></div>","event_end"=>mktime(23, 59, 59, 8, 10),);
$meteor_eventsnext[]=array("event_start"=>mktime(0, 0, 0, 8, 11),"event_title"=>"Meteor Shower<br><orange1> &nbsp; &nbsp;Perseids</orange1> <br><div class=date><br>
<green>Estimated ZHR: </green><orange>100</orange><br> Peaks <orange>Aug 11th-13th</orange></div></div>","event_end"=>mktime(23, 59, 59, 8, 13),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 8, 13),"event_title"=>"Meteor Shower<br> <orange1> &nbsp; &nbsp;Draconids</orange1><div class=date><br>Active October 6th-10th<br>
<green>Estimated ZHR: </green><orange>5</orange><br> Peaks <orange>Oct 9th</orange></div></div>","event_end"=>mktime(23, 59, 59, 10, 7),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 10, 7),"event_title"=>"Meteor Shower<br> <orange1> &nbsp; &nbsp;Orionids</orange1><div class=date><br>Active Oct 21st-Oct 22nd<br>
<green>Estimated ZHR: </green><orange>25</orange><br> Peaks <orange>Oct 22nd</orange></div></div>","event_end"=>mktime(23, 59, 59, 10, 21),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 10, 21),"event_title"=>"Meteor Shower<br> <orange1> &nbsp; &nbsp;South Taurids</orange1><div class=date><br>Active Nov 4th- Nov 5th<br><green>Estimated ZHR: </green><orange>5</orange><br> Peaks <orange>Nov 5th</orange></div></div>","event_end"=>mktime(23, 59, 59, 11, 5),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 11, 5),"event_title"=>"Meteor Shower<br> <orange1> &nbsp; &nbsp;North Taurids</orange1><div class=date><br>Active Nov 11th<br>
<green>Estimated ZHR: </green><orange>5</orange><br> Peaks <orange>Nov 12-13th</orange></div></div>","event_end"=>mktime(23, 59, 59, 11, 12),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 11, 12),"event_title"=>"Meteor Shower<br> <orange1> &nbsp; &nbsp;Leonids</orange1><div class=date><br>Active Nov 5th-Dec 3rd<br>
<green>Estimated ZHR: </green><orange>15</orange><br> Peaks <orange>Nov 18th</orange></div></div>","event_end"=>mktime(23, 59, 59, 11, 18),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 11, 18),"event_title"=>"Meteor Shower<br> <orange1> &nbsp; &nbsp;Geminids</orange1><div class=date><br>Active Nov 30th-Dec 17th<br>
<green>Estimated ZHR: </green><orange>120</orange><br> Peaks <orange>Dec 14th</orange></div></div>","event_end"=>mktime(23, 59, 59, 12, 14),);
$meteor_eventsnext[]=array("event_start"=>mktime(23, 59, 59, 12, 14),"event_title"=>"Meteor Shower<br> <orange1> &nbsp; &nbsp;Ursids</orange1><div class=date><br>Active Dec 17th-Dec 24th<br>
<green>Estimated ZHR: </green><orange>5-10</orange><br> Peaks <orange>Dec 23rd</orange></div></div>","event_end"=>mktime(23, 59, 59, 12, 18),);

$meteorNext=time();$meteorOP=false;
foreach ($meteor_eventsnext as $meteor_check) {if ($meteor_check["event_start"]<=$meteorNext&&$meteorNext<=$meteor_check["event_end"]) {$meteorOP=true;$meteor_nextevent=$meteor_check["event_title"];}};
//end meteor nevt event
$meteorinfo3="<svg width='22px' height='22px' viewBox='0 0 16 16'><path fill='#aaa' d='M0 0l14.527 13.615s.274.382-.081.764c-.355.382-.82.055-.82.055L0 0zm4.315 1.364l11.277 10.368s.274.382-.081.764c-.355.382-.82.055-.82.055L4.315 1.364zm-3.032 2.92l11.278 10.368s.273.382-.082.764c-.355.382-.819.054-.819.054L1.283 4.284zm6.679-1.747l7.88 7.244s.19.267-.058.534-.572.038-.572.038l-7.25-7.816zm-5.68 5.13l7.88 7.244s.19.266-.058.533-.572.038-.572.038l-7.25-7.815zm9.406-3.438l3.597 3.285s.094.125-.029.25c-.122.125-.283.018-.283.018L11.688 4.23zm-7.592 7.04l3.597 3.285s.095.125-.028.25-.283.018-.283.018l-3.286-3.553z'/></svg>";

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weather34 Meteor Shower<br>s</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  
<style>
:root {
  --white: #ffffff;
  --light: #f5f5f5;
  --dark: #07090a;
  --dark-light: hsla(0, 0%, 0%, 0.251);
  --dark-toggle: #35393b;
  --dark-caption: rgba(66, 70, 72, 0.429);
  --black: #000000;
  --deepblue: #00adbd;
  --blue: #00adbd;
  --rainblue: #00adbd;
  --darkred: #703232;
  --deepred: #703232;
  --red: #d35f50;
  --yellow: #e6a241;
  --green: #90b22a;
  --orange: rgb(236, 81, 19);
  --purple: #8680bc;
  --silver: #ecf0f3;
  --border-dark: #3d464d;
  --body-text-dark: #afb7c0;
  --body-text-light: #545454;
  --blocks: #e6e8ef;
  --modules: #1e1f26;
  --blocks-background: rgba(82, 92, 97, 0.19);
  --temp-5-10: #7face6;
  --temp-0-5: #00adbd;
  --temp0-5: #00adbd;
  --temp5-10: #9bbc2f;
  --temp10-15: #e6a241;
  --temp15-20: #f78d03;
  --temp20-25: #d87040;
  --temp25-30: #e64b24;
  --temp30-35: #cc504c;
  --temp35-40: hsl(4, 40%, 48%);
  --temp40-45: #be5285;
  --temp45-50: #b95c95;
  --font-color: grey;
  --bg-color: hsla(198, 14%, 14%, 0.19);
  --button-bg-color: hsla(198, 14%, 14%, 0.19);
  --button-shadow: inset 5px 5px 20px #0c0b0b,
    inset -5px -5px 20px hsla(198, 14%, 14%, 0.19);
}

@font-face {
  font-family: weathertext2;
  src: url(fonts/verbatim-regular.woff2) format("woff2");
}
@font-face {
  font-family: clock;
  src: url(fonts/clock3-webfont.woff2) format("woff2");
}

@font-face {
  font-family: verb;
  src: url(fonts/verbatim-bold.woff2) format("woff2");
}
html,
body {
  font-size: 13px;
  font-family: "verb", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
.grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-column-gap: 5px;
  grid-row-gap: 5px;
  color: #f5f7fc;
  margin-top: 5px;
}

.grid > article {
 
  padding: 5px;
  font-size: 0.8em;
  border-radius: 4px;
  -webkit-border-radius: 4px;
  background: 0;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  border: 1px solid hsla(217, 15%, 17%, .5);
    border-bottom: 15px solid hsla(217, 15%, 17%, .5);
  height: 150px;
  
}

.grid > article2 {
 
  padding: 5px;
  font-size: 0.8em;
  border-radius: 4px;
  -webkit-border-radius: 4px;
  background: 0;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;  
  height: 175px;  
  border: 1px solid hsla(217, 15%, 17%, .5);
    border-bottom: 15px solid hsla(217, 15%, 17%, .5);
}

.grid2 {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-column-gap: 5px;
  grid-row-gap: 5px;
  color: #f5f7fc;
  overflow: hidden;
  margin-top: 5px;
}
.grid2 > article {
 
  padding: 5px;
  font-size: 0.8em;
  border-radius: 4px;
  -webkit-border-radius: 4px;
  background: 0;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  max-height: 120px;
  background: rgba(66, 70, 72, 0.229);
}
 
  a{color:#aaa;text-decoration:none} 
.weather34darkbrowser{position:relative;background:0;width:50%;height:30px;margin:auto;margin-top:-5px;margin-left:0px;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:10px;
 }
.weather34darkbrowser[url]:after{content:attr(url);color:#aaa;font-size:10px;position:absolute;left:0;right:0;top:0;padding:4px 15px;margin:11px 10px 0 auto;border-radius:3px;  
height:20px;box-sizing:border-box;
background:hsla(233, 12%, 13%,.5);
} 
 blue{color:#01a4b4}orange{color:#009bb4}grey{color:#ccc}
 orange1{position:relative;color:#009bb4;margin:0 auto;text-align:center;margin-left:5%;font-size:1.1rem}
 green{color:#aaa}red{color:#f37867}red6{color:#d65b4a}value{color:#fff}yellow{color:#CC0}purple{color:#916392}
 meteotextshowertext{font-size:.8rem;color:#009bb4}
 meteorsvgicon{color:#f5f7fc}  
.moonphasetext{font-size:1rem;color:#f5f7fc;position:absolute;display:inline;left:140px;top:80px}
moonphaseriseset{font-size:.9rem;}
credit{position:relative;font-size:.8em;top:10%;line-height:.9}
.actualt{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:rgba(74, 99, 111, 0.1);
padding:5px;font-family:weathertext;width:100px;height:0.8em;font-size:0.8rem;padding-top:2px;color:#aaa;
align-items:center;justify-content:center;margin-bottom:10px;top:0;line-height:.9}
.actualw{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:rgba(74, 99, 111, 0.1);
padding:5px;font-family:weathertext;width:100px;height:0.8em;font-size:0.8rem;padding-top:2px;color:#aaa;border-bottom:2px solid rgba(56,56,60,1);
align-items:center;justify-content:center;margin-bottom:10px;top:0}
peak{color:silver;font-size:.8rem}

.date{margin-top:90px;width:200px}

.mbsmartlogo {
  position: relative;
  float: right;
  left: 10px;
  top: 70px;
}
small {
  font-size: 8px;
}
large {
  position: relative;
  top: -5px;
  left: 55px;
  font-size: 11px;
  width: 80px;
}
.date {
  position: relative;
  top: -85px;
  left: 50px;
  font-size: 11px;
  width: 200px;
}
.weather34moonsvgmoon {
  fill: rgba(245, 247, 252, 0.2);
  stroke: rgba(230, 232, 239, 0.1);
  stroke-width: 0;
}
.weather34moonsvgmoonback {
  fill: hsl(206, 12%, 27%);
  stroke: rgba(230, 232, 239, 0.1);
  stroke-width: 0;
}
.weather34moonphasesvg {
  position: relative;
  display: flex;
  max-width: 130px;
}
.moonphaseposition {
  position: relative;
  margin-left: 0px;
  top: 15px;
  display: flex;
  max-width: 90px;
  width: 90px;
  height: 90px;
}
.weather34-container-clock {
  width: 120px;
  height: 120px;
  position: relative;
  top: -50px;
  left: -5px;
}
.weather34-large-clock {
  width: 130px;
  height: 130px;
  border-radius: 50%;
  background: hsla(214, 29%, 91%, 0.1);
  position: absolute;
  top: 50px;
  left: 50px;
  box-shadow: var(--button-shadow);
  transform: rotate(var(--rotation));
  border: 4px solid hsla(204, 31%, 21%, 0.2);
  -webkit-transform: rotate(var(--rotation));
  -moz-transform: rotate(var(--rotation));
  -ms-transform: rotate(var(--rotation));
  -o-transform: rotate(var(--rotation));
}
.weather34-small-clock {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  background-color: rgba(0, 0, 0, 0.4);
  position: absolute;
  top: 15px;
  left: 15px;
  box-shadow: var(--button-shadow);
  background-image: linear-gradient(hsla(0, 0%, 33%, 0.3) 1px, transparent 1px),
    linear-gradient(to right, hsla(0, 0%, 33%, 0.3) 1px, transparent 1px);
  background-size: 5px 5px;
}
.circle {
  background-color: var(--blue);
  width: 10px;
  height: 10px;
  border-radius: 50%;
  position: absolute;
  left: 45px;
  top: 40px;
  z-index: 1;
}
.hour-indicator {
  width: 0;
  height: 25px;
  background-color: #b7c5d3;
  border-radius: 5px;
  position: absolute;
}
.twelve {
  top: 0;
  left: 60px;
}
.twelve::after {
  content: "12";
  font-size: 12px;
  color: hsla(214, 29%, 91%, 0.8);
  font-family: weathertext2;
}
.three {
  right: 11px;
  top: 53px;
}
.three::after {
  content: "3";
  font-size: 12px;
  color: hsla(214, 29%, 91%, 0.8);
  font-family: weathertext2;
}
.weather34brand {
  left: 42px;
  bottom: 15px;
}
.weather34brand::after {
  content: "weather34";
  font-size: 9px;
  color: hsla(214, 29%, 91%, 0.8);
  font-family: weathertext2;
}
.six {
  left: 62px;
  bottom: -10px;
}
.six::after {
  content: "6";
  font-size: 12px;
  color: hsla(214, 29%, 91%, 0.8);
  font-family: weathertext2;
}
.nine {
  left: 5px;
  top: 53px;
  height: 3px;
  width: 0;
}
.nine::after {
  content: "9";
  font-size: 12px;
  color: hsla(214, 29%, 91%, 0.8);
  font-family: weathertext2;
}
.hand {
  --rotation: 0;
  height: 50px;
  width: 5px;
  border-radius: 2px;
  position: absolute;
  left: 63px;
  top: 10px;
  transform-origin: bottom;
  transform: rotate(calc(var(--rotation) * 1deg));
}
.hour {
  background-color: #888989;
  height: 35px;
  top: 25px;
}
.minute {
  background-color: #ec5113;
  width: 4px;
}
.second {
  background-color: var(--blue);
  width: 1px;
}
.clock34 {
  box-shadow: var(--button-shadow);
  background-color: #1d2124;
  display: flex;
  font-family: clock;
  border-radius: 3px;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  -ms-border-radius: 3px;
  -o-border-radius: 3px;
  left: 0px;
  text-align: center;
  position: relative;
  color: hsla(214, 29%, 91%, 0.6);
  font-size: 1rem;
  text-transform: none;
  padding: 4px;
  padding-top: 6px;
  top: -147px;
  font-family: clock;
  z-index: 20;
  width: 5.5em;
  background-image: linear-gradient(hsla(0, 0%, 33%, 0.1) 1px, transparent 1px),
    linear-gradient(to right, hsla(0, 0%, 33%, 0.1) 1px, transparent 1px);
  background-size: 5px 5px;
  justify-content: center;
  align-items: center;
}
.gridcal{display:grid;grid-template-columns:repeat(7,minmax(14px,1fr));
  grid-gap:.75em;color:hsla(214,29%,91%,.6);}
.day{background:hsla(214,29%,91%,.1);display:flex;justify-content:center;align-items:center;border-radius:2px;color:#fff;
-webkit-border-radius:2px;-moz-border-radius:2px;-ms-border-radius:2px;-o-border-radius:2px;height:14px;font-family:weathertext2}
.wrapper{width:calc(240px + 1.12em);margin:auto;margin-top:0px;margin-left:0;font-family:weathertext2;overflow:hidden;padding:7px;padding-right:10px;
background-image:linear-gradient(hsla(0,0%,33%,.1) 1px,transparent 1px),linear-gradient(to right,hsla(0,0%,33%,.1) 1px,transparent 1px);background-size:2px 2px;border-radius:5px}
.days{display:grid;grid-template-columns:repeat(7,30px);grid-gap:.75em;}
.curr_date{color:hsla(214,29%,91%,.8)}
.weather34weekdays{position:relative;text-transform:uppercase;font-size:.8rem;display:grid;grid-template-columns:repeat(7,30px);grid-gap:.75em;list-style:none;left:-36px;top:-10px;margin-bottom:-5px}
.weather34weekdays todayorange{color:#fff;background:var(--orange);border-radius:2px;-webkit-border-radius:2px;-moz-border-radius:2px;-ms-border-radius:2px;-o-border-radius:2px;line-height:14px;padding:0 2px 0 2px}
grey{color:#ccc}
blue {
  color: #01a4b4;
}
orange {
  color: #009bb4;
}
orange1 {
  position: relative;
  color: #009bb4;
  margin: 0 auto;
  text-align: center;
  margin-left: 5%;
  font-size: 1.1rem;
}
green {
  color: #aaa;
}

green1 {
  color: #aaa;font-size: 0.9rem;
  margin:0 auto;line-height:1
}
red {
  color: #f37867;
}
red6 {
  color: #d65b4a;
}
value {
  color: #fff;
}
yellow {
  color: #cc0;
}
purple {
  color: #916392;
}
.actualt {
  position: relative;
  left: 5px;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  -o-border-radius: 3px;
  border-radius: 3px;
  background: rgba(74, 99, 111, 0);
  padding: 5px;
  font-family: Arial, Helvetica, sans-serif;
  width: 190px;
  height: 0.8em;
  font-size: 0.8rem;
  padding-top: 2px;
  color: #aaa;
  align-items: center;
  justify-content: center;
  margin-bottom: 10px;
  top: 0;
}
.actualups {
  position: relative;
  left: 35px;
  background: rgba(74, 99, 111, 0);
  padding: 5px;
  font-family: Arial, Helvetica, sans-serif;
  width: 140px;
  height: 0.8em;
  font-size: 0.8rem;
  align-items: center;
  justify-content: center;
  top: -30px;
  margin-bottom: -10px;
}
actualt34 {
  display: none;
}
.actualtlocal {
  position: relative;
  left: 155px;
  background: rgba(74, 99, 111, 0);
  padding: 5px;
  font-family: Arial, Helvetica, sans-serif;
  width: 190px;
  height: 0.8em;
  font-size: 0.8rem;
  padding-top: 2px;
  color: #aaa;
  align-items: center;
  justify-content: center;
  margin-bottom: 10px;
  top: 0px;
}

.weather34logosvg {
  position: absolute;
  display: flex;
  right: 40px;
  margin-top: -60px;
  width: 4rem;
}
.weather34-image {
  position: absolute;
  display: flex;
  right: 70px;
  margin-top: 20px;
  width: 8rem;
  opacity: 0.9;
}
.info2a {
  position: absolute;
  margin-top: 140px;
  font-size: 0.8em;
  width: 200px;
}

.moonriset{
  position: absolute;
  margin-top: 70px;
  font-size: 0.8em;
  width: 200px;
}

@media screen and (max-width:640px){
  .grid,.grid2{display:grid;
    grid-template-columns:repeat(2,1fr);}}

</style>
<script src="js/jquery.js"></script>




<div class="weather34darkbrowser" url="<?php echo date('Y')?> Meteor Showers "></div> 
  
<main class="grid">
  <article>       
<meteotextshowertext>
<?php if ($meteor_default)  {	echo "<meteorsvgicon>".$meteorinfo3."</meteorsvgicon> ".$meteor_default;}
echo "<br><grey>".date('l jS F Y') ;
?></meteotextshowertext><br><br>
       
</article>  
  
  <article>
  <?php if ($meteor_nextevent)  {echo $meteorinfo3 ," Next ",$meteor_nextevent ;} ?>    
  </article> 
  
  <article>  
   <?php echo $info ;?> <orange>Guide to</orange> <green><?php echo date('Y');?> Major Meteor Showers<br></green> <br>
       <?php echo $meteorinfo;?> <green>Quadrantids</green> Dec 28-Jan 12<br>
       <?php echo $meteorinfo;?> <green>Lyrids</green> Apr 18-Apr 25<br>
       <?php echo $meteorinfo;?> <green>Perseids</green> Jul 13-Aug 26<br>
       <?php echo $meteorinfo;?> <green>Leonids</green> Nov 05-Dec 03<br>
       <?php echo $meteorinfo;?> <green>Geminids</green> Nov 30-Dec 17<br>
       <?php echo $meteorinfo;?> <green>Ursids</green> Dec 17-Dec 24<br>        
   </article> 
   

  <article2>  
  <div class=actualtlocal>Local Time</div>   
    <div class="weather34-container-clock">
        <div class="weather34-large-clock">
            <div class="hour-indicator twelve"></div>
            <div class="hour-indicator three"></div>
            <div class="hour-indicator six"></div>
            <div class="hour-indicator weather34brand"></div>
            <div class="hour-indicator nine"></div>
            <div class="weather34-small-clock">
            <div class="circle"></div>
            </div>
            <div class="hand hour" id="hour"></div>
            <div class="hand minute" id="minute"></div>
            <div class="hand second" id="second"></div>
        </div>
    </div>
    <script>
// Based on Dribbble design adapted by weather34 with time based on your settings 
// https://dribbble.com/shots/8200836-Skeuomorph-Clock-App
var secondHand = document.getElementById("second");
var minuteHand = document.getElementById("minute");
var hourHand = document.getElementById("hour");
var offset=<?php echo $UTC;?>;
setInterval(setClock, 1000);
function setClock() {  
  var e=new Date(new Date().getTime()+offset);
  var c=e.getHours();
  var a=e.getMinutes();
  var g=e.getSeconds();
  var f=e.getFullYear();
  var h=e.getMonth();
  var b=e.getDate();
  var b=e.getDate();
  var secondsRatio = e.getSeconds() / 60;
  var minutesRatio = (secondsRatio + e.getMinutes()) / 60;
  var hoursRatio = (minutesRatio + e.getHours()) / 12;
    setRotation(secondHand, secondsRatio);
    setRotation(minuteHand, minutesRatio);
    setRotation(hourHand, hoursRatio);}
function setRotation(element, rotationRatio) {
    element.style.setProperty('--rotation', rotationRatio * 360)
}
setClock();
  </script>



<script type="text/javascript">
var clockID;var yourTimeZoneFrom='<?php echo $UTC?>';var d=new Date();
var weekdays=[];
var months=[];
//calculte the weather34 date-time UTC
var tzDifference=yourTimeZoneFrom*60+d.getTimezoneOffset();
var offset=tzDifference*60*1000;
function UpdateClock(){
var e=new Date(new Date().getTime()+offset);
var a=e.getMinutes();
var g=e.getSeconds();
var f=e.getFullYear();
var h=e.getMonth();
var b=e.getDate();
<?php if($clockformat=='12') {echo "if(e.getHours()<12){amorpm=' am'}else{amorpm=' pm'}";} else {echo "amorpm='';";}?>
// add the weather34 date prefix
var suffix = "";switch(b) {case 1: case 21: case 31: suffix = 'st'; break;case 2: case 22: suffix = 'nd'; break;case 3: case 23: suffix = 'rd'; break;default: suffix = 'th';}
var i=weekdays[e.getDay()];if(a<10){a="0"+a}if(g<10){g="0"+g}if(c<10){c="0"+c}
//weather34 option to use 24/12 hour format
var c=e.getHours()
<?php if ($clockformat == '12') { echo '% 12 || 12';} else { echo '% 24 || 00';}?>;
document.getElementById("weather34clock2").innerHTML="<div class='clock34'>"+c+":"+a+":"+g+
"<?php if($clockformat=='12') {echo "&nbsp;".date('a')."";} else {echo "&nbsp;";}?>"}
function StartClock(){clockID=setInterval(UpdateClock,500)}
function KillClock(){clearTimeout(clockID)}window.onload=function(){StartClock()}(jQuery);</script>
</div></div>
<div id="weather34clock2"></div>

</article2> 

  <article2>     
  <script>$( document ).ready( function() {
  $('.day').remove();
  var start = new Date(new Date().getTime()+offset);
  current_date(start);
  let days = numDays(start.getMonth(), start.getYear());
  displayDays(start, days);
  let currDay = start.getDate();
  console.log(currDay);
  $('.day:nth-of-type('+currDay+')').css('background', ' rgb(236, 81, 19)').css('box-shadow','none'); 
 
});
var d = new Date(new Date().getTime()+offset);
var weekday = new Array(7);
weekday[0] = "Sunday";
weekday[1] = "Monday";
weekday[2] = "Tuesday";
weekday[3] = "Wednesday";
weekday[4] = "Thursday";
weekday[5] = "Friday";
weekday[6] = "Saturday";
var n = weekday[d.getDay()];
// Formatting current date
function current_date(curr_date) {
  var string = weekday[d.getDay()]+ " " + currMonth(curr_date) + ", " + curr_date.getDate() + ", " + curr_date.getFullYear();
  $(".curr_date").text(string);
}
function currMonth(date) {
  var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
  return months[date.getMonth()];
}

function currDay(date) {
  var months = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
  return months[date.getDay()];
}
// input month and year, return number of days in month
function numDays(month, year) {
  if (month == 1) {
    if(leapYear(year)) {
      return 29;
    } else {
      return 28;
    }
  }
  if(month == 0 || month == 2 || month == 4 || month == 6 || month == 7 || month == 9 || month == 11) {
    return 31;
  } else {
    return 30;
  }
}
// input - year, returns true if leap year, otherwise - false
function leapYear(year) {
  if(year % 4 == 0) {
      if(year % 100 == 0) {
        if(year % 400 == 0) {
          return true;
        } else {
          return false;
        }  
      } else {
        return true;
      }
  } else {
    return false;
  } 
}

function setMonth(start, dir) {
  var newDate = start.setMonth(start.getMonth() + dir);
  return newDate;
}

function displayDays(date, days) {
  for(i = 0; i < days; i++) {
    $("<div></div>")
      .addClass("day")
      .text(i+1)
      .appendTo($('.days'));
  }
  
  $('.day:first-of-type').addClass("day_1");
  // day_1 is ... day of the week
  var day_1 = new Date(date.getFullYear(), date.getMonth(), 1);
  var start_col = day_1.getDay() + 1;

  $('.day:first-of-type').css('grid-column-start', start_col.toString());
  $('h1').text(currMonth(date) + " " + date.getFullYear());
}
</script>
  <div class="curr_date"></div>
    <div class="wrapper">
    <ul class="weather34weekdays">
        <?php $datecolor=date('D');?>
 				<li><?php if ($datecolor=='Sun'){echo '<todayorange>Sun</todayorange>';}else echo 'Sun';?></li>
 				<li><?php if ($datecolor=='Mon'){echo '<todayorange>Mon</todayorange>';}else echo 'Mon';?></li>
 				<li><?php if ($datecolor=='Tue'){echo '<todayorange>Tue</todayorange>';}else echo 'Tue';?></li>
 				<li><?php if ($datecolor=='Wed'){echo '<todayorange>Wed</todayorange>';}else echo 'Wed';?></li>
 				<li><?php if ($datecolor=='Thu'){echo '<todayorange>Thu</todayorange>';}else echo 'Thu';?></li>
 				<li>&nbsp;<?php if ($datecolor=='Fri'){echo '<todayorange>Fri</todayorange>';}else echo 'Fri';?></li>
 				<li><?php if ($datecolor=='Sat'){echo '<todayorange>Sat</todayorange>';}else echo 'Sat';?></li>
 			</ul>  
    <div class="gridcal">  
        
      <div class="days">
        <div class="day day_1">1</div>
        <div class="day">2</div>
        <div class="day">3</div>
        <div class="day">4</div>
        <div class="day">5</div>
        <div class="day">6</div>
        <div class="day">7</div>
        <div class="day">8</div>
        <div class="day">9</div>
        <div class="day">10</div>
        <div class="day">11</div>
        <div class="day">12</div>
        <div class="day">13</div>
        <div class="day">14</div>
        <div class="day">15</div>
        <div class="day">16</div>
        <div class="day">17</div>
        <div class="day">18</div>
        <div class="day">19</div>
        <div class="day">20</div>
        <div class="day">21</div>
        <div class="day">22</div>
        <div class="day">23</div>
        <div class="day">24</div>
        <div class="day">25</div>
        <div class="day">26</div>
        <div class="day">27</div>
        <div class="day">28</div>
        <div class="day">29</div>
        </div> 
      </div>      
    </div>
 
  
  </article2>
  
</main>

