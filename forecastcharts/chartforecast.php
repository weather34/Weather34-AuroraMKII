<?php include_once('updaterwu.php');include('wudata.php');?>
<!DOCTYPE html><html><head>
<title> Weather34 Forecast <?php echo $stationName?></title>
<meta name="title" content="Weather34 Forecast <?php echo $stationName?>">
<meta name="description" content="Weather34 Forecast <?php echo $stationName?>">
<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=yes">
<meta name="mobile-web-app-capable" content="yes">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">
<meta name="msapplication-TileColor" content="#f8f8f8"> 
<link href="../console-dark.css?version=<?php echo filemtime('../console-dark.css')?>" rel="stylesheet prefetch">
<link rel="preload" href="../fonts/clock3-webfont.woff" as="font" type="font/woff" crossorigin>
<link rel="preload" href="../fonts/verbatim-regular.woff" as="font" type="font/woff" crossorigin>
<link rel="preload" href="../fonts/verbatim-medium.woff" as="font" type="font/woff" crossorigin>
<link rel="preload" href="../fonts/HelveticaNeue-Medium.woff" as="font" type="font/woff" crossorigin>
</head>
<body>
<!-- weather34 grid flex layout -->
<div class="weather34-tablet">
<div class="fade-in">
<div class="container">
<div class="nav-top">   
<div class="weather34-indoor"><?php echo $timeicon?> <div id="weather34clock4"></div>
<div class="desktoplink5" ><?php echo $headerlocation?> Forecast Data For <?php echo $stationName?></div></div>
<div class="online"><?php if(file_exists($livedata)&&time()- filemtime($livedata)>300)echo $wirelessoffline;else echo $wireless?></div>
</div>

  <ul class="grid-container-forecast">
  <li55>
      <?php if ($tempunit == 'F'){;?>    
      <iframe  src="daytempforecast34f.php" frameborder="0" scrolling="no" width="100%" height="100%"></iframe>
      <?php ;}?>    
      <?php if ($tempunit == 'C'){;?>    
      <iframe  src="daytempforecast34.php" frameborder="0" scrolling="no" width="100%" height="100%"></iframe>
      <?php ;}?>    
    </li55>  
    <?php if ($wuskydaysnow>0 || $wuskydaysnow1>0 || $wuskydaysnow2>0 || $wuskydaysnow3>0 || $wuskydaysnow4>0 || $wuskydaysnow5>0 || $wuskydaysnow6>0 || $wuskydaysnow7>0 || $wuskydaysnow8>0)
{echo '<li55><iframe  src="daysnowforecast34.php" frameborder="0" scrolling="no" width="100%" height="100%"></iframe></li55>' ;}    
else if ($wuskythunder>0 || $wuskythunder1>0 || $wuskythunder2>0 || $wuskythunder3>0 || $wuskythunder4>0 || $wuskythunder5>0 || $wuskythunder6>0 || $wuskythunder7>0 || $wuskythunder8>0)
{echo '<li55><iframe  src="daythunderforecast34.php" frameborder="0" scrolling="no" width="100%" height="100%"></iframe></li55> ';}    
else echo '<li55><iframe  src="dayuvforecast34.php" frameborder="0" scrolling="no" width="100%" height="100%"></iframe></li55>';?>    

    <?php if  ($windunit == 'mph') {;?>
    <li55><iframe  src="daywindforecast34mph.php" frameborder="0" scrolling="no" width="100%" height="100%"></iframe></li55>  
    <?php ;}?>
    <?php if  ($windunit == 'km/h') {;?>
    <li55><iframe  src="daywindforecast34.php" frameborder="0" scrolling="no" width="100%" height="100%"></iframe></li55>  
    <?php ;}?>
    <?php if  ($windunit == 'kts') {;?>
    <li55><iframe  src="daywindforecast34kts.php" frameborder="0" scrolling="no" width="100%" height="100%"></iframe></li55>  
    <?php ;}?>
    <?php if  ($windunit == 'm/s') {;?>
    <li55><iframe  src="daywindforecast34ms.php" frameborder="0" scrolling="no" width="100%" height="100%"></iframe></li55>  
    <?php ;}?>
    <li55><iframe  src="daywind-directionforecast34.php" frameborder="0" scrolling="no" width="100%" height="100%"></iframe></li55>  

    <li55><iframe  src="dayrainforecast34.php" frameborder="0" scrolling="no" width="100%" height="100%"></iframe></li55>
    <li55><iframe  src="dayrainchanceforecast34.php" frameborder="0" scrolling="no" width="100%" height="100%"></iframe></li55>  
    
    <li555><iframe  src="outlookwu.php" frameborder="0" scrolling="no" width="100%" height="100%"></iframe></li555>    
    
  </ul>
</div>
<div class="nav-bottom" >
&nbsp; <a href="../index.php" data-title="Dashboard"> <?php echo $backtohome ?> </a>  

<a href="../outlookwutext.php" data-lity data-title="5 day Forecast Summary"><?php echo $weather34foretxt?></a>

<a href="chartforecast.php" alt="refresh this dashboard " data-title="Refresh"><?php echo $weather34refr?></a>

<chartpage>Forecast Updated <?php $forecastime=filemtime('../jsondata/wuforecast.txt');echo date('jS M g:i a',$forecastime);?></chartpage>
<weather34-rightfootericonscharts>
<div class="weather34-battery"><a  href="../info.html" data-lity data-title="Weather34"> <img src="../images/weather34-icon-small.png" width="24em" ></a></div>
</div></body></html>

<?php //weather34 clean notifications 
$wuskydayTime3=str_replace("Mon", "Monday", $wuskydayTime3);
$wuskydayTime4=str_replace("Mon", "Monday", $wuskydayTime4);
$wuskydayTime5=str_replace("Mon", "Monday", $wuskydayTime5);
$wuskydayTime6=str_replace("Mon", "Monday", $wuskydayTime6);
$wuskydayTime7=str_replace("Mon", "Monday", $wuskydayTime7);
$wuskydayTime8=str_replace("Mon", "Monday", $wuskydayTime8);
$wuskydayTime9=str_replace("Mon", "Monday", $wuskydayTime9);
$wuskydayTime10=str_replace("Mon", "Monday", $wuskydayTime10);

$wuskydayTime3=str_replace("Tue", "Tuesday", $wuskydayTime3);
$wuskydayTime4=str_replace("Tue", "Tuesday", $wuskydayTime4);
$wuskydayTime5=str_replace("Tue", "Tuesday", $wuskydayTime5);
$wuskydayTime6=str_replace("Tue", "Tuesday", $wuskydayTime6);
$wuskydayTime7=str_replace("Tue", "Tuesday", $wuskydayTime7);
$wuskydayTime8=str_replace("Tue", "Tuesday", $wuskydayTime8);
$wuskydayTime9=str_replace("Tue", "Tuesday", $wuskydayTime9);
$wuskydayTime10=str_replace("Tue", "Tuesday", $wuskydayTime10);

$wuskydayTime3=str_replace("Wed", "Wednesday", $wuskydayTime3);
$wuskydayTime4=str_replace("Wed", "Wednesday", $wuskydayTime4);
$wuskydayTime5=str_replace("Wed", "Wednesday", $wuskydayTime5);
$wuskydayTime6=str_replace("Wed", "Wednesday", $wuskydayTime6);
$wuskydayTime7=str_replace("Wed", "Wednesday", $wuskydayTime7);
$wuskydayTime8=str_replace("Wed", "Wednesday", $wuskydayTime8);
$wuskydayTime9=str_replace("Wed", "Wednesday", $wuskydayTime9);
$wuskydayTime10=str_replace("Wed", "Wednesday", $wuskydayTime10);

$wuskydayTime3=str_replace("Thu", "Thursday", $wuskydayTime3);
$wuskydayTime4=str_replace("Thu", "Thursday", $wuskydayTime4);
$wuskydayTime5=str_replace("Thu", "Thursday", $wuskydayTime5);
$wuskydayTime6=str_replace("Thu", "Thursday", $wuskydayTime6);
$wuskydayTime7=str_replace("Thu", "Thursday", $wuskydayTime7);
$wuskydayTime8=str_replace("Thu", "Thursday", $wuskydayTime8);
$wuskydayTime9=str_replace("Thu", "Thursday", $wuskydayTime9);
$wuskydayTime10=str_replace("Thu", "Thursday", $wuskydayTime10);

$wuskydayTime3=str_replace("Fri", "Friday", $wuskydayTime3);
$wuskydayTime4=str_replace("Fri", "Friday", $wuskydayTime4);
$wuskydayTime5=str_replace("Fri", "Friday", $wuskydayTime5);
$wuskydayTime6=str_replace("Fri", "Friday", $wuskydayTime6);
$wuskydayTime7=str_replace("Fri", "Friday", $wuskydayTime7);
$wuskydayTime8=str_replace("Fri", "Friday", $wuskydayTime8);
$wuskydayTime9=str_replace("Fri", "Friday", $wuskydayTime9);
$wuskydayTime10=str_replace("Fri", "Friday", $wuskydayTime10);

$wuskydayTime3=str_replace("Sat", "Saturday", $wuskydayTime3);
$wuskydayTime4=str_replace("Sat", "Saturday", $wuskydayTime4);
$wuskydayTime5=str_replace("Sat", "Saturday", $wuskydayTime5);
$wuskydayTime6=str_replace("Sat", "Saturday", $wuskydayTime6);
$wuskydayTime7=str_replace("Sat", "Saturday", $wuskydayTime7);
$wuskydayTime8=str_replace("Sat", "Saturday", $wuskydayTime8);
$wuskydayTime9=str_replace("Sat", "Saturday", $wuskydayTime9);
$wuskydayTime10=str_replace("Sat", "Saturday", $wuskydayTime10);

$wuskydayTime3=str_replace("Sun", "Sunday", $wuskydayTime3);
$wuskydayTime4=str_replace("Sun", "Sunday", $wuskydayTime4);
$wuskydayTime5=str_replace("Sun", "Sunday", $wuskydayTime5);
$wuskydayTime6=str_replace("Sun", "Sunday", $wuskydayTime6);
$wuskydayTime7=str_replace("Sun", "Sunday", $wuskydayTime7);
$wuskydayTime8=str_replace("Sun", "Sunday", $wuskydayTime8);
$wuskydayTime9=str_replace("Sun", "Sunday", $wuskydayTime9);
$wuskydayTime10=str_replace("Sun", "Sunday", $wuskydayTime10);

$wuskydayTime1=str_replace("TM Night","Tomorrow Night",$wuskydayTime1);
$wuskydayTime2=str_replace("TM Night","Tomorrow Night",$wuskydayTime2);
$wuskydayTime3=str_replace("TM Night","Tomorrow Night",$wuskydayTime3);	

//snow
if ($wuskydaysnow>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Snow <icon-26-30>".$freezing."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime."</blue><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}
  else if ($wuskydaysnow1>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Snow <icon-26-30>".$freezing."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime1."</blue><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}
  else if ($wuskydaysnow2>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Snow <icon-26-30>".$freezing."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime2."</blue><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}
  else if ($wuskydaysnow3>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Snow <icon-26-30>".$freezing."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime3."</blue><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}
  else if ($wuskydaysnow4>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Snow <icon-26-30>".$freezing."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime4."</blue><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}        
  else if ($wuskydaysnow5>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Snow <icon-26-30>".$freezing."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime5."</blue><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}
  else if ($wuskydaysnow6>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Snow <icon-26-30>".$freezing."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime6."</blue><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}
  else if ($wuskydaysnow7>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
   <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Snow <icon-26-30>".$freezing."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime7."</blue><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}
  else if ($wuskydaysnow8>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Snow <icon-26-30>".$freezing."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime8."</blue><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}
  else if ($wuskydaysnow9>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Snow <icon-26-30>".$freezing."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime9."</blue><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}
   else if ($wuskydaysnow10>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Snow <icon-26-30>".$freezing."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime10."</blue><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}


//thunderstorm
else if ($wuskythunder>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Thunderstorm <icon-26-30>".$lightningalert4."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><orange>".$wuskydayTime."</orange><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}
  else if ($wuskythunder1>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Thunderstorm <icon-26-30>".$lightningalert4."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><orange>".$wuskydayTime1."</orange><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}
  else if ($wuskythunder2>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Thunderstorm <icon-26-30>".$lightningalert4."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><orange>".$wuskydayTime2."</orange><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}
  else if ($wuskythunder3>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Thunderstorm <icon-26-30>".$lightningalert4."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><orange>".$wuskydayTime3."</orange><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}
  else if ($wuskythunder4>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Thunderstorm <icon-26-30>".$lightningalert4."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><orange>".$wuskydayTime4."</orange><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}        
  else if ($wuskythunder5>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Thunderstorm <icon-26-30>".$lightningalert4."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><orange>".$wuskydayTime5."</orange><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}
  else if ($wuskythunder6>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Thunderstorm <icon-26-30>".$lightningalert4."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><orange>".$wuskydayTime6."</orange><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}
  else if ($wuskythunder7>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
   <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Thunderstorm <icon-26-30>".$lightningalert4."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><orange>".$wuskydayTime7."</orange><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}
  else if ($wuskythunder8>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Thunderstorm <icon-26-30>".$lightningalert4."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><orange>".$wuskydayTime8."</orange><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}
  else if ($wuskythunder9>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Thunderstorm <icon-26-30>".$lightningalert4."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><orange>".$wuskydayTime9."</orange><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}
   else if ($wuskythunder10>0 ){echo "
  <div class='weather34alert' id='weather34message'> 
  <div class='weather34-notification'> 
  <weather34-alertheader><h2>Awareness $warmalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
  <weather34-alertmessage>Expect Thunderstorm <icon-26-30>".$lightningalert4."</icon-26-30></weather34-alertmessage> <br>
  <weather34-alertvalue style='font-size:0.9em'><orange>".$wuskydayTime10."</orange><weather34-alertunit> </weather34-alertunit>
  </weather34-alertvalue></div></div>";}     

//rain
else if ($wuskydayprecipIntensity>0 ){echo "
<div class='weather34alert' id='weather34message'> 
<div class='weather34-notification'> 
<weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
<weather34-alertmessage>Expect Rain <icon-26-30>".$weather34_rain_icon."</icon-26-30></weather34-alertmessage> <br>
<weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime."</blue><weather34-alertunit> </weather34-alertunit>
</weather34-alertvalue></div></div>";}
else if ($wuskydayprecipIntensity1>0 ){echo "
<div class='weather34alert' id='weather34message'> 
<div class='weather34-notification'> 
<weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
<weather34-alertmessage>Expect Rain <icon-26-30>".$weather34_rain_icon."</icon-26-30></weather34-alertmessage> <br>
<weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime1."</blue><weather34-alertunit> </weather34-alertunit>
</weather34-alertvalue></div></div>";}
else if ($wuskydayprecipIntensity2>0 ){echo "
<div class='weather34alert' id='weather34message'> 
<div class='weather34-notification'> 
<weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
<weather34-alertmessage>Expect Rain <icon-26-30>".$weather34_rain_icon."</icon-26-30></weather34-alertmessage> <br>
<weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime2."</blue><weather34-alertunit> </weather34-alertunit>
</weather34-alertvalue></div></div>";}
else if ($wuskydayprecipIntensity3>0 ){echo "
<div class='weather34alert' id='weather34message'> 
<div class='weather34-notification'> 
<weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
<weather34-alertmessage>Expect Rain <icon-26-30>".$weather34_rain_icon."</icon-26-30></weather34-alertmessage> <br>
<weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime3."</blue><weather34-alertunit> </weather34-alertunit>
</weather34-alertvalue></div></div>";}
else if ($wuskydayprecipIntensity4>0 ){echo "
<div class='weather34alert' id='weather34message'> 
<div class='weather34-notification'> 
<weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
<weather34-alertmessage>Expect Rain <icon-26-30>".$weather34_rain_icon."</icon-26-30></weather34-alertmessage> <br>
<weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime4."</blue><weather34-alertunit> </weather34-alertunit>
</weather34-alertvalue></div></div>";}        
else if ($wuskydayprecipIntensity5>0 ){echo "
<div class='weather34alert' id='weather34message'> 
<div class='weather34-notification'> 
<weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
<weather34-alertmessage>Expect Rain <icon-26-30>".$weather34_rain_icon."</icon-26-30></weather34-alertmessage> <br>
<weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime5."</blue><weather34-alertunit> </weather34-alertunit>
</weather34-alertvalue></div></div>";}
else if ($wuskydayprecipIntensity6>0 ){echo "
<div class='weather34alert' id='weather34message'> 
<div class='weather34-notification'> 
<weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
<weather34-alertmessage>Expect Rain <icon-26-30>".$weather34_rain_icon."</icon-26-30></weather34-alertmessage> <br>
<weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime6."</blue><weather34-alertunit> </weather34-alertunit>
</weather34-alertvalue></div></div>";}
else if ($wuskydayprecipIntensity7>0 ){echo "
<div class='weather34alert' id='weather34message'> 
<div class='weather34-notification'> 
 <weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
<weather34-alertmessage>Expect Rain <icon-26-30>".$weather34_rain_icon."</icon-26-30></weather34-alertmessage> <br>
<weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime7."</blue><weather34-alertunit> </weather34-alertunit>
</weather34-alertvalue></div></div>";}
else if ($wuskydayprecipIntensity8>0 ){echo "
<div class='weather34alert' id='weather34message'> 
<div class='weather34-notification'> 
<weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
<weather34-alertmessage>Expect Rain <icon-26-30>".$weather34_rain_icon."</icon-26-30></weather34-alertmessage> <br>
<weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime8."</blue><weather34-alertunit> </weather34-alertunit>
</weather34-alertvalue></div></div>";}
else if ($wuskydayprecipIntensity9>0 ){echo "
<div class='weather34alert' id='weather34message'> 
<div class='weather34-notification'> 
<weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
<weather34-alertmessage>Expect Rain <icon-26-30>".$weather34_rain_icon."</icon-26-30></weather34-alertmessage> <br>
<weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime9."</blue><weather34-alertunit> </weather34-alertunit>
</weather34-alertvalue></div></div>";}
 else if ($wuskydayprecipIntensity10>0 ){echo "
<div class='weather34alert' id='weather34message'> 
<div class='weather34-notification'> 
<weather34-alertheader><h2>Awareness $coldalertnotif</h2> <span class='weather34-timestamp'>".$maxclock." ". date('H:i')."</span> </weather34-alertheader>  
<weather34-alertmessage>Expect Rain <icon-26-30>".$weather34_rain_icon."</icon-26-30></weather34-alertmessage> <br>
<weather34-alertvalue style='font-size:0.9em'><blue>".$wuskydayTime10."</blue><weather34-alertunit> </weather34-alertunit>
</weather34-alertvalue></div></div>";}     
    //add more if required
?>
<script> //fire the weather34 notification
function closeweather34alert(el) { el.addClass('weather34alert-hide');}
$('.js-messageClose').on('click', function(e) { closeweather34alert($(this).closest('.weather34alert'));});
$(document).ready(function() {  setTimeout(function() { closeweather34alert($('#weather34message')); }, 10000);});
</script>