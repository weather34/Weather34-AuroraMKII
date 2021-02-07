<?php 
	########################################################################
	#	Weather34 Aurora  TEMPLATE by BRIAN UNDERDOWN 2015-20                              
	#	TEMPLATE at https://weather34.com/homeweatherstation/index.html  
	                                                                                               
	# 	Moon: 25TH JANUARY 2018  						                                              
	# 	   revised December 2020                                                                    
	#   https://www.weather34.com 	                                                                   
	########################################################################

include('livedata.php');
  ?>
  
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Weather34 MB-SMART Moon Phase Information</title>
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
    src: url(fonts/verbatim-regular.woff) format("woff");
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
  }
  .grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-column-gap: 5px;
    grid-row-gap: 5px;
    color: #f5f7fc;
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
    border: 1px solid hsla(217, 15%, 17%, .5);    
    height: 185px;
    background:hsla(217, 15%, 17%, .3);
    background-image: var(--grid-lines);
    background-size: 5px 5px;
    
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
    color: #aaa;
    text-decoration: none;
  }
  
 
  
  grey{color:#ccc}
  blue {
    color: #01a4b4;
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
  
  .info2a {
    position: absolute;
    margin-top: 40px;
    font-size: 0.8em;
    margin-left:5px;
    width: 200px;
  }
  
  
  .charttempmodule{position:absolute;margin:0 auto;margin-top:-15px;margin-left:10px;display:flex;justify-content: center;align-items: center;}
  .lightning-text{position:absolute;border:1px solid hsla(217, 15%, 17%, 1);
    padding:10px;border-radius:3px;font-size:12px;display:inline;justify-content: center;align-items: center;width:90px}
  .lightning-textmonth{margin-left:120px;position:absolute;border:1px solid hsla(217, 15%, 17%, .5);padding:10px;border-radius:3px;font-size:12px;display:inline;justify-content: center;align-items: center;width:90px}
  .lightning-textyear{margin-left:240px;position:absolute;border:1px solid hsla(217, 15%, 17%, .5);padding:10px;border-radius:3px;font-size:12px;display:inline;justify-content: center;align-items: center;width:90px}
  .lightning-textyear2{margin-top:60px;position:absolute;border:1px solid hsla(217, 15%, 17%, .5);padding:10px;border-radius:3px;font-size:12px;display:inline;justify-content: center;align-items: center;width:90px}
  .credits{margin-top:5px;margin-left:40px;position:absolute;padding:5px;font-size:7px;display:inline;justify-content: center;
    align-items: center;width:200px}

    .credits2{margin-top:5px;margin-left:640px;position:absolute;padding:5px;font-size:7px;display:inline;justify-content: center;
    align-items: center;width:120px;color:#aaa;}
date{position:absolute;margin:0 auto;margin-left:10px;display:flex;justify-content: center;align-items: center;font-size:9px;color:#ccc}

lword{font-family: "weathertext2", Helvetica, Arial, sans-serif;position:absolute;margin-top:120px;
    margin-left:10%;display:flex;justify-content: center;align-items: center;font-size:30px;color:rgba(82, 92, 97, 0.19)}



  @media screen and (max-width: 640px) {
    .credits,.credits2,.grid > article2 {
    display: none;
  }


}

    </style>  
  
  <main class="grid">
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
    <?php  //month total
echo "<blue>2020</blue> Total<br>";   
echo "<orange>6427</orange> strikes";
?></div>
<lword>Lightning Data</lword>


</article>



    <article>  
<date>Today</date>
    <iframe  class="charttempmodule" src="weather34charts/todaylightning.php" frameborder="0" scrolling="no" width="45%" height="220px"></iframe>  
  
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
<a class="canvascreditlink" href="https://canvasjs.com" target="_blank" data-title="CanvasJs.com" >
Charts compiled with CanvasJs.com <br>v2.3.1 GA (CC BY-NC 3.0) Non-Commercial-Version.</a></div>

<div class="credits2">
CSS/SVG/PHP Developed by weather34.com </div>
  
  