<?php 
	########################################################################
	#	Weather34 Aurora  TEMPLATE by BRIAN UNDERDOWN 2015-20                              
	#	TEMPLATE at https://weather34.com/homeweatherstation/index.html  
	                                                                                               
	# 	Moon: 25TH JANUARY 2018  						                                              
	# 	   revised December 2020                                                                    
	#   https://www.weather34.com 	                                                                   
	########################################################################

include('livedata.php');
date_default_timezone_set($TZ);
$lightningseconds = $weather["lightningtimeago"];function convert($lightningseconds){$weather34timeago = "";$days = intval(intval($lightningseconds) / (3600*24));
  $hours = (intval($lightningseconds) / 3600) % 24;$minutes = (intval($lightningseconds) / 60) % 60;
  if($days> 1){$weather34timeago .= "$days <interval>Days </interval>";}
  else {if($days>0){$weather34timeago .= "$days <interval>Day </interval>";}
  if($hours > 1 ){$weather34timeago .= "$hours <interval>Hrs </interval>";}
  else if($hours >0 && $days<1){$weather34timeago .= "$hours <interval>Hr </interval>";}
  else if($hours <=0){$weather34timeago .= " ";}
  if($minutes > 1 && $days<1){$weather34timeago .= "$minutes <interval>Mins </interval>";}
  else if($minutes >=0 && $days<1){$weather34timeago .= "$minutes <interval>Min </interval>";}
  }return $weather34timeago."<interval>Ago</interval>";}
  ?>
  
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Weather34 Lightning Charts</title>
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
      --grid-lines: linear-gradient(hsla(0, 0%, 33%, 0.1) 1px, transparent 1px), linear-gradient(to right, hsla(0, 0%, 33%, 0.1) 1px, transparent 1px);
    --grid-linesbucket: linear-gradient(hsla(0, 0%, 33%, 0.5) 1px, transparent 1px), linear-gradient(to right, hsla(0, 0%, 33%, 0) 1px, transparent 1px);
    --grid-lines2: linear-gradient(hsla(0, 0%, 33%, 0.2) 1px, transparent 1px), linear-gradient(to right, hsla(0, 0%, 33%, 0.2) 1px, transparent 1px);
    --grid-lines3: linear-gradient(hsla(0, 0%, 33%, 0.08) 1px, transparent 1px), linear-gradient(to right, hsla(0, 0%, 33%, 0.08) 1px, transparent 1px);
    --grid-linesrain: linear-gradient(hsla(240, 6%, 77%, 0.14) 1px, transparent 1px), linear-gradient(to right, hsla(240, 6%, 77%, 0.14) 1px, transparent 1px);
    --grid-linescompass: linear-gradient(hsla(0, 0%, 33%, 0.1) 1px, transparent 1px), linear-gradient(to right, hsla(0, 0%, 33%, 0.1) 1px, transparent 1px);
    --grid-lines23: linear-gradient(hsla(0, 0%, 33%, 0.5) 1px, transparent 1px), linear-gradient(to right, hsla(0, 0%, 33%, 0.5) 1px, transparent 1px);
    --grid-lines-sun: linear-gradient(hsla(0, 0%, 33%, 0.1) 1px, transparent 1px), linear-gradient(to right, hsla(0, 0%, 33%, 0.1) 1px, transparent 1px);
    --grid-linesindicators: linear-gradient(hsla(206, 11%, 87%, 0.02) 5px, transparent 2px), linear-gradient(to right, hsla(206, 11%, 87%, 0.02) 5px, transparent 2px);
  }
  
  @font-face {
    font-family: weathertext2;
    src: url(fonts/verbatim-medium.woff) format("woff");
  }
  @font-face {
    font-family: clock;
    src: url(fonts/clock3-webfont.woff) format("woff");
  }
  html,
  body {
    font-size: 13px;
    font-family: "weathertext2", Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    color: var(--body-text-dark);
  }
  .grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-column-gap: 5px;
    grid-row-gap: 5px;
    color: #ccc;
    margin-top: 10px;
  }
  
  .grid > article {   
    padding: 5px;
    font-size: 0.8em;
    border-radius: 4px;
    -webkit-border-radius: 4px;
    background: 0;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    border:2px solid hsla(217, 15%, 17%, .5);   
    height: 185px;
    background:hsla(217, 15%, 17%, .3);
    background-image: var(--grid-lines);
    background-size: 5px 5px;
    color: var(--body-text-dark);
    
  }

  
  .grid > article2 {   
    padding: 5px;
    font-size: 0.8em;
    border-radius: 4px;
    -webkit-border-radius: 4px;
    background: 0;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    border: 1px solid hsla(217, 15%, 17%, .5);     
    height: 185px;  
    background:hsla(217, 15%, 17%, .3);
    background-image: var(--grid-lines);
    background-size: 5px 5px;
  }
  a {
   
    text-decoration: none;
    color: var(--body-text-dark);
    color:#009bb4
  }
  
 
  
  grey{color:#ccc}
  blue {
    color: var(--body-text-dark);
   
  }
  orange {
    color: #d87040;
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
  lblue{color:var(--rainblue);}
  .info2a {
    position: absolute;
    margin-top: 40px;
    font-size: 0.8em;
    margin-left:5px;
    width: 200px;
  }
  
  
  .charttempmodule{position:absolute;margin:0 auto;margin-top:-15px;margin-left:10px;display:flex;justify-content: center;align-items: center;color: var(--body-text-dark);}
  .lightning-text{position:absolute;margin-top:25px;border:2px solid hsla(217, 15%, 17%, .5);padding:5px;border-radius:3px;font-size:12px;display:inline;justify-content: center;align-items: center;width:90px}
  .lightning-textmonth{margin-left:110px;margin-top:25px;position:absolute;border:2px solid hsla(217, 15%, 17%, .5);padding:5px;border-radius:3px;font-size:12px;display:inline;justify-content: center;align-items: center;width:90px}
  .lightning-textyear{margin-left:110px;margin-top:80px;position:absolute;border:2px solid hsla(217, 15%, 17%, .5);padding:5px;border-radius:3px;font-size:12px;display:inline;justify-content: center;align-items: center;width:90px}
  .lightning-textyear2{margin-top:80px;position:absolute;border:2px solid hsla(217, 15%, 17%, .5);padding:5px;border-radius:3px;font-size:12px;display:inline;justify-content: center;align-items: center;width:90px}
  .lightning-textyear3{margin-top:80px;margin-left:110px;position:absolute;border:2px solid hsla(217, 15%, 17%, .5);padding:5px;border-radius:3px;font-size:12px;display:inline;justify-content: center;align-items: center;width:90px}
  .lightning-textyear4{margin-top:80px;margin-left:240px;position:absolute;border:2px solid hsla(217, 15%, 17%, .5);padding:5px;border-radius:3px;font-size:12px;display:inline;justify-content: center;align-items: center;width:90px}
  .lightning-textyear5{margin-top:135px;margin-left:0px;position:absolute;border:2px solid hsla(217, 15%, 17%, .5);padding:5px;border-radius:3px;font-size:12px;display:inline;justify-content: center;align-items: center;width:90px}
  .lightning-timeago{margin-top:135px;margin-left:0px;position:absolute;border:2px solid hsla(217, 15%, 17%, .5);
    padding:5px;border-radius:3px;font-size:12px;display:inline;justify-content: center;align-items: center;width:auto;max-width:200px}
  
  
  .credits{margin-left:40px;position:absolute;padding:5px;font-size:7px;display:inline;justify-content: center;
    align-items: center;color: var(--body-text-dark);opacity: .5;width:max-content}

    .credits2{margin-left:540px;position:absolute;padding:5px;font-size:7px;display:inline;justify-content: center;
    align-items: center;color: var(--body-text-dark);opacity: .5;width:max-content}
date{position:absolute;margin:0 auto;margin-left:10px;display:flex;padding:3px;border-radius: 3px;-webkit-border-radius: 3px;
  justify-content: center;align-items: center;font-size:9px;color:#ccc;background:hsla(217, 15%, 17%, .8);width:max-content}

lword{font-family: "weathertext2", Helvetica, Arial, sans-serif;position:absolute;margin-top:0px;
    margin-left:10%;display:flex;justify-content: center;align-items: center;font-size:16px;color:rgba(82, 92, 97, 0.7)}



  @media screen and (max-width: 640px) {
    .credits,.credits2,.grid > article2 {
    display: none;
  }


}

    </style>  
  
  <main class="grid">




    <article>  
<date>Today</date>
    <iframe  class="charttempmodule" src="weather34charts/todaylightning.php" frameborder="0" scrolling="no" width="45%" height="220px"></iframe>  
  
  </article>  

  <article><div class="lightning-text">
    <?php  //month total
echo "<blue>Todays</blue> Total<br>";   
echo "<orange>".$weather["lightningmax"] ."</orange> strikes";
?></div>
<div class="lightning-textmonth">
    <?php  //month total
echo "<blue>".date('F')."</blue> Total<br>";   
echo "<orange>".$weather["lightningmonth"] ."</orange> strikes";
?></div>
<div class="lightning-textyear">
    <?php  //month total
echo "<blue>".date('Y')." </blue>Total<br>";   
echo "<orange>".$weather["lightningyear"] ."</orange> strikes";
?></div>

<div class="lightning-textyear2">
    <?php  //last years total
echo "<blue>2020</blue> Total<br>";   
echo "<orange>6427</orange> strikes";
?></div>


<div class="lightning-timeago">
<?php  //weatherflow weather34 air lightning output
if ($lightningseconds <120 ){ echo $lightningalert8." <orange>Just Now</orange>";}
else if ($lightningseconds >=61 ){echo "&nbsp; Last Strike &nbsp;<lblue>";
echo convert($lightningseconds);}?></lblue></div>

<lword>Lightning Data</lword>


</article>

  <article>  
  <date><?php echo date('F')?></date>
  <iframe  class="charttempmodule" src="weather34charts/monthlightningmodulechart2.php" frameborder="0" scrolling="no" width="45%" height="220px"></iframe>  
  
  </article>  

  <article>  
  <date><?php echo date('Y')?></date>
  <iframe  class="charttempmodule" src="weather34charts/yearlightningmodulechart2.php" frameborder="0" scrolling="no" width="45%" height="220px"></iframe>  
  
  </article>  


  </main>

  <div class="credits">

Charts compiled with <a class="canvascreditlink" href="https://canvasjs.com" target="_blank" data-title="CanvasJs.com" >CanvasJs.com </a>
<br>v2.3.1 GA (CC BY-NC 3.0) Non-Commercial-Version.</div>

<div class="credits2">
CSS/SVG/PHP Developed by <a class="canvascreditlink" href="https://weather34.com/homeweatherstation" target="_blank" data-title="weather34.com" >weather34.com </div>
  
  