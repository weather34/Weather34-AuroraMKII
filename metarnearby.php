<?php include('metar34get.php');
	####################################################################################################
	#	CREATED FOR HOMEWEATHERSTATION MB SMART TEMPLATE 											   #
	# https://weather34.com/homeweatherstation/index.html 											   # 
	# 	                                                                                               #
	# 	Updated Release: August 2019						  	                                       #
	# 	                                                                                               #
	#   https://www.weather34.com 	                                                                   #
	####################################################################################################
//weather34 original metarnearby script 2018-2019 checkwx attribution must be in tact//
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Nearby Metar</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
:root {
    --white: hsl(0, 0%, 100%);
    --light: hsl(0, 0%, 96%);
    --dark: hsl(210, 15%, 8%);
    --dark-popup: hsl(200, 18%, 3%);
    --dark-light: hsla(0, 0%, 0%, 0.251);
    --dark-toggle: hsl(202, 8%, 46%);
    --dark-caption: rgba(66, 70, 72, 0.429);
    --black: hsl(0, 0%, 0%);
    --deepblue: hsla(185, 100%, 37%, 1);
    --deepcold: hsl(216, 88%, 61%);
    --blue: hsla(185, 100%, 37%, 1);
    --rainblue: hsla(185, 100%, 37%, 1);
    --darkred: hsl(0, 38%, 32%);
    --deepred: hsl(0, 38%, 32%);
    --red: hsl(7, 60%, 57%);
    --yellow: hsl(35, 77%, 58%);
    --green: hsl(75, 62%, 43%);
    --orange: hsl(19, 66%, 55%);
    --border-sun: hsla(206, 12%, 27%, .4);
    --dark-sun: rgba(47, 50, 61, 1);
    --black2: hsla(240, 4%, 9%, 0.3);
    --suntext: hsl(212, 23%, 85%);
    --suntext2: rgba(233, 237, 240, 0.8);
    --sunsetdark: hsl(202, 8%, 46%);
    --daylight: hsla(14, 95%, 50%, .8);
    --thecenter: --;
    --compass-shadow-sun: 5px 5px 10px hsla(0, 4%, 5%, .4), -5px -5px 1px hsla(198, 14%, 14%, 0.49);
    --purple: hsl(246, 31%, 62%);
    --silver: hsl(206, 23%, 94%);
    --border-dark: hsl(206, 12%, 27%);
    --border-dark2: hsla(206, 12%, 27%, .4);
    --border-dark-sun: hsla(206, 12%, 27%, .2);
    --blue2: rgba(184, 236, 243, 0.5);
    --yellow2: hsla(35, 77%, 58%, .8);
    --body-text-dark: hsl(212, 12%, 72%);
    --body-text-light: hsl(0, 0%, 33%);
    --blocks: hsl(227, 22%, 92%);
    --modules: hsl(233, 12%, 13%);
    --blocks-background2: hsla(200, 7%, 45%, 0.7);
    --blocks-background: hsla(200, 8%, 35%, 0.19);
    --temp-5-10: hsl(214, 67%, 70%);
    --temp-0-5: hsla(185, 100%, 37%, 1);
    --temp0-5: hsla(185, 100%, 37%, 1);
    --temp5-10: hsl(74, 60%, 46%);
    --temp10-15: hsl(35, 77%, 58%);
    --temp15-20: hsl(34, 98%, 49%);
    --temp20-25: hsl(19, 66%, 55%);
    --temp25-30: hsl(12, 80%, 52%);
    --temp30-35: hsl(2, 56%, 55%);
    --temp35-40: hsl(4, 40%, 48%);
    --temp40-45: hsl(332, 45%, 53%);
    --temp45-50: hsl(323, 40%, 54%);
    --font-color: hsl(0, 0%, 50%);
    --text-shadow2: 0px 1px 1px hsl(240, 2%, 36%);
    --bg-color: hsla(198, 14%, 14%, 0.19);
    --button-bg-color: hsla(198, 14%, 14%, 0.19);
    --button-shadow: inset 5px 5px 20px #0c0b0b, inset -5px -5px 20px hsla(198, 14%, 14%, 0.19);
    --grid-lines: linear-gradient(hsla(0, 0%, 33%, 0.1) 1px, transparent 1px), linear-gradient(to right, hsla(0, 0%, 33%, 0.1) 1px, transparent 1px);
    --grid-lines2: linear-gradient(hsla(0, 0%, 33%, 0.2) 1px, transparent 1px), linear-gradient(to right, hsla(0, 0%, 33%, 0.2) 1px, transparent 1px);
    --grid-lines3: linear-gradient(hsla(0, 0%, 33%, 0.08) 1px, transparent 1px), linear-gradient(to right, hsla(0, 0%, 33%, 0.08) 1px, transparent 1px);
    --grid-linescompass: linear-gradient(hsla(0, 0%, 33%, 0.3) 1px, transparent 1px), linear-gradient(to right, hsla(0, 0%, 33%, 0.3) 1px, transparent 1px);
    --grid-lines23: linear-gradient(hsla(0, 0%, 33%, 0.5) 1px, transparent 1px), linear-gradient(to right, hsla(0, 0%, 33%, 0.5) 1px, transparent 1px);
    --grid-lines-sun: linear-gradient(hsla(0, 0%, 33%, 0.1) 1px, transparent 1px), linear-gradient(to right, hsla(0, 0%, 33%, 0.1) 1px, transparent 1px);
    --grid-linesindicators: linear-gradient(hsla(206, 11%, 87%, 0.02) 5px, transparent 2px), linear-gradient(to right, hsla(206, 11%, 87%, 0.02) 5px, transparent 2px);
    --therainrategrad: -webkit-linear-gradient(left, #00adbd 0%, #00adbd 30%, #d35f50 90%)
}
@font-face{font-family:weathertext2;src:url(fonts/verbatim-medium.woff) format("woff")}
@font-face{font-family:weathertext3;src:url(fonts/verbatim-medium.woff) format("woff")}
html,body{font-size:13px;font-family: "weathertext2", Helvetica, Arial, sans-serif;-webkit-font-smoothing: antialiased;	-moz-osx-font-smoothing: grayscale;}
.grid { 
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(155px, 2fr));
  grid-gap: 5px;
  align-items: stretch;
  color:#f5f7fc;  
  }
.grid > article {
  border: 1px solid rgba(245, 247, 252,.02);
  box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.6);
  padding:10px;
  font-size:0.8em;
  -webkit-border-radius:4px;
  border-radius:4px;
  background:hsla(200, 8%, 35%, 0.19);-webkit-font-smoothing: antialiased;	-moz-osx-font-smoothing: grayscale;
  border-bottom: 10px solid rgba(245, 247, 252,.02);
  max-height:155px;
}
.grid > article img {
  max-width: 100%;
}

  
  a{color:#aaa;text-decoration:none} 
.weather34darkbrowser{position:relative;background:0;width:96%;height:30px;margin:auto;margin-top:-5px;margin-left:0px;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:10px;}
.weather34darkbrowser[url]:after{content:attr(url);color:#aaa;font-size:10px;position:absolute;left:0;right:0;top:0;padding:4px 15px;margin:11px 10px 0 auto;border-radius:3px;background:rgba(97, 106, 114, 0.3);height:20px;box-sizing:border-box}
 blue{color:#01a4b4}orange{color:#009bb4}orange1{position:relative;color:#009bb4;margin:0 auto;text-align:center;margin-left:5%;font-size:1.1rem}green{color:#aaa}red{color:#f37867}red6{color:#d65b4a}value{color:#fff}yellow{color:#CC0}purple{color:#916392}

.text1{font-family:weathertext2,Arial;font-size:24px;margin-left:3px;}
.windvalue1{font-family:weathertext2,Arial;font-size:24px;margin-left:3px;}
.windseparator{color:rgba(57,61,64,1)}
.text1,.windvalue1{color:#aaa}
.directiontext{
	font-family:weathertext3;
	display:flex;
	font-size:1em;
	position:absolute;
	text-align:center;
	align-items:center;
	justify-content:center;vertical-align: middle;
  top:52%;width:10rem;left:10%;color:var(--body-text-dark)}
  
  .directiontextvalue{
	font-family:weathertext3;
	display:flex;
	font-size:1.75em;
	position:absolute;
	text-align:center;
	align-items:center;
	justify-content:center;vertical-align: middle;
  top:39%;width:10rem;left:10%;
color:#eee}

.directiontext span{color:rgba(0, 155, 180, 1.000)}
text1{z-index:10;text-align:center;margin:5px 0 auto}
.metar34compass1{position:relative;width:165px;height:165px;margin:0 auto;z-index:1;text-align:center;align-items:center;justify-content:center;
margin-bottom:-30px;margin-top:-17px}
.metar34compass1>.metar34compass-line1{
  right:25px;
  clip-path:polygon(100%0,100%100%,100%100%,0100%,00);
  -webkit-clip-path:polygon(100%0,100%100%,100%100%,0100%,00);
  -ms-clip-path:polygon(100%0,100%100%,100%100%,0100%,00);	
position:absolute;
z-index:1;
left:24px;
top:25px;
bottom:25px;	
border-radius: 50%;
  -webkit-border-radius: 50%;
   -moz-border-radius: 50%;
  -ms-border-radius: 50%;
	-o-border-radius: 50%;
border: 10px solid hsla(217, 15%, 17%, 1);	
box-shadow: var(--button-shadow)
	}
	.weather34compassgrid {
    position: absolute;
    width: 95px;
    height: 95px;
    margin: 0 auto;
    border-radius: 50%;
    margin-left: 35px;
    margin-top: 35px;
    background-image: var(--grid-linescompass);
    background-size: 5px 5px;
    box-shadow: var(--button-shadow)
}

.weather34compassring {
    position: absolute;
    width: 115px;
    height: 115px;
    margin: 0 auto;
    border: 10px solid hsla(217, 15%, 17%, .5);
    border-radius: 50%;
    margin-left: 15px;
    margin-top: 15px;
    box-shadow: var(--button-shadow)
}


.circleborder4 {
  position:relative;
    left: 5px;
    top:5px;
    border-radius: 100%;
    width: 100px;
    height: 100px;    
    background-image: var(--grid-lines23);
    background-size: 5px 5px;
    box-shadow: var(--button-shadow);
    background: var(--border-dark);
    border: 0;
    opacity: .2
}

	
.thearrow2{transform:rotate(<?php echo $metar34windir;?>deg);-webkit-transform:rotate(<?php echo $metar34windir;?>deg);-moz-transform:rotate(<?php echo $metar34windir;?>deg);-o-transform:rotate(<?php echo $metar34windir;?>deg);-ms-transform:rotate(<?php echo $metar34windir;?>deg);transform:rotate(<?php echo $metar34windir;?>deg);position:absolute;z-index:200;top:0;left:50%;margin-left:-5px;width:10px;height:50%;-webkit-transform-origin:50% 100%;-moz-transform-origin:50% 100%;-o-transform-origin:50% 100%;-ms-transform-origin:50% 100%;transform-origin:50% 100%;-webkit-transition-duration:3s;-moz-transition-duration:3s;-o-transition-duration:3s;-ms-transition-duration:3s;transition-duration:3s}.thearrow2:after{content:'';position:absolute;left:50%;top:0;height:10px;width:10px;background-color:NONE;width:0;height:0;border-style:solid;border-width:14px 9px 0 9px;border-color:RGBA(255,121,58,1.00) transparent transparent transparent;-webkit-transform:translate(-50%,-50%);-moz-transform:translate(-50%,-50%);-o-transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%);-webkit-transition-duration:3s;-moz-transition-duration:3s;-o-transition-duration:3s;-ms-transition-duration:3s;transition-duration:3s}.thearrow2:before{content:'';width:3px;height:3px;position:absolute;z-index:9;left:2px;top:-5px;border:1px solid RGBA(255,255,255,0.8);-webkit-border-radius:100%;-moz-border-radius:100%;-o-border-radius:100%;-ms-border-radius:100%;border-radius:100%}
spancalm{position:relative;font-family:weathertext2,Arial;font-size:16px;}


.weather34-0deg,
.weather34-135deg,
.weather34-180deg,
.weather34-225deg,
.weather34-270deg,
.weather34-315deg,
.weather34-45deg,
.weather34-90deg
{
    position: absolute;
    font-size: 8px;
    margin-top: 24px;
    margin-left: 96px;
    font-family: weathertext2;
    z-index:10;
    color:#aaa
}

.weather34-0deg {
    margin-top: 25px;
    margin-left: 76px
}

.weather34-45deg {
    margin-top: 40px;
    margin-left: 113px;
    transform: rotate(45deg);
    -webkit-transform: rotate(45deg);
    -moz-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    -o-transform: rotate(45deg)
}

.weather34-90deg {
    margin-top: 81px;
    margin-left: 127.5px;
    transform: rotate(90deg);
    -webkit-transform: rotate(90deg);
    -moz-transform: rotate(90deg);
    -ms-transform: rotate(90deg);
    -o-transform: rotate(90deg)
}

.weather34-135deg {
    margin-top: 115px;
    margin-left: 110px;
    transform: rotate(-45deg);
    -webkit-transform: rotate(-45deg);
    -moz-transform: rotate(-45deg);
    -ms-transform: rotate(-45deg);
    -o-transform: rotate(-45deg)
}

.weather34-180deg {
    margin-top: 130px;
    margin-left: 74px
}

.weather34-225deg {
    margin-top: 117px;
    margin-left: 36px;
    transform: rotate(49deg);
    -webkit-transform: rotate(49deg);
    
}

.weather34-270deg {
    margin-top: 77px;
    margin-left: 20px;
    transform: rotate(-90deg);
    -webkit-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    -o-transform: rotate(-90deg)
}

.weather34-315deg {
    margin-top: 40px;
    margin-left: 35px;
    transform: rotate(-46deg);
    -webkit-transform: rotate(-46deg);
    
}
.weather34north,
.weather34east,
.weather34south,
.weather34west {
    position: absolute;
    font-size: 8px;
    margin-top: 85px;
    margin-left: 143px;    
    color:#aaa
}

.weather34south {
    margin-top: 140px;
    margin-left: 79px;
    
}

.weather34west {
    margin-top: 79.5px;
    margin-left: 16px;
    
}

.weather34north {
    margin-top: 15px;
    margin-left: 77px;

}

.weather34east {
    margin-top: 79px;
    margin-left: 142px
}
.metartempcontainer1{left:75px;top:0}
.metartempcontainer2{left:10px;top:90px;position:absolute}
.metartempcontainer3{left:85px;top:125px;position:absolute}
.metartempcontainer4{left:85px;top:76px;position:absolute}
.metartempcontainer5{left:85px;top:142px;position:absolute}

.metarwindcontainer1{margin-top:0;margin-left:5px;position:relative}
/*kts*/
.metarwindcontainer2{margin-top:6px;margin-left:0px;position:relative}
/*mph*/
.metarwindcontainer3{margin-top:-133px;margin-left:85px;position:relative}
/*ms*/
.metarwindcontainer4{margin-top:6px;margin-left:85px;position:relative}
.metarwindcontainer5{margin-top:-50px;margin-left:5px;position:relative}

.metartemptoday0,.metartemptoday5,.metartemptoday10,.metartemptoday20,.metartemptoday25,.metartemptoday30{
font-family:weathertext2,Arial,Helvetica,system;width:5rem;height:2.5rem;
border-radius:3px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;display:flex;border:1px solid hsla(217, 15%, 17%, 1);
font-size:1.25rem;padding-top:0;color:#fff;border-bottom:12px solid hsla(217, 15%, 17%, 1);align-items:center;justify-content:center;
border-radius:3px;margin-bottom:21px;
  background-size: 2px 2px;
  background-image: var(--grid-lines2);
  background-size: 2px 2px;
  box-shadow: var(--button-shadow);
}


.metartemptoday0{color:rgba(68, 166, 181, 1.000)}
.metartemptoday5{color:rgba(144, 177, 42, 1.000)}
.metartemptoday10{color:rgba(230, 161, 65, 1.000)}
.metartemptoday20{color:rgba(255, 124, 57, 1.000)}
.metartemptoday25{color:rgba(255, 124, 57, 0.7)}
.metartemptoday30{color:rgba(211, 93, 78, 1.000)}
.metardewcontainer1{left:70px;margin-top:10px}
.metardewtoday0,.metardewtoday5,.metardewtoday10,.metardewtoday20,.metardewtoday25,.metardewtoday30{font-family:weathertext2,Arial,Helvetica,system;width:5rem;height:2.5rem;
border-radius:3px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;display:flex;border:1px solid hsla(217, 15%, 17%, 1);
font-size:1.25rem;padding-top:0;color:#fff;border-bottom:12px solid hsla(217, 15%, 17%, 1);align-items:center;justify-content:center;
border-radius:3px;margin-bottom:21px;
background-size: 2px 2px;
  background-image: var(--grid-lines2);
  background-size: 2px 2px;
  box-shadow: var(--button-shadow);}

.metardewtoday0{color:rgba(68, 166, 181, 1.000)}
.metardewtoday5{color:rgba(144, 177, 42, 1.000)}
.metardewtoday10{color:rgba(230, 161, 65, 1.000)}
.metardewtoday20{color:rgba(255, 124, 57, 1.000)}
.metardewtoday25{color:rgba(255, 124, 57, 0.7)}
.metardewtoday30{color:rgba(211, 93, 78, 1.000)}

.metarhumcontainer1{position:relative;top:-100px;font-size:.7rem;z-index:1;color:#fff;margin-left:92px;display:inline-block;}
.metarhumcontainer2{left:70px;margin-top:10px}
.metarhumtoday0-35,.metarhumtoday35-70,.metarhumtoday70-85,.metarhumtoday85-100{
  font-family:weathertext2,Arial,Helvetica,system;width:5rem;height:2.5rem;
border-radius:3px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;display:flex;border:1px solid hsla(217, 15%, 17%, 1);
font-size:1.25rem;padding-top:0;color:#fff;border-bottom:12px solid hsla(217, 15%, 17%, 1);align-items:center;justify-content:center;
border-radius:3px;margin-bottom:21px;
background-size: 2px 2px;
  background-image: var(--grid-lines2);
  background-size: 2px 2px;
  box-shadow: var(--button-shadow);
}
.metarhumtoday0-35{color:rgba(211, 93, 78, 1.000)}
.metarhumtoday35-70{color:rgba(230, 161, 65, 1.000)}
.metarhumtoday70-85{color:rgba(230, 161, 65, 1.000)}
.metarhumtoday85-100{color:rgba(68, 166, 181, 1.000)}

.humword,.dewword,.tword{display:flex;position:absolute;margin-top:-33px;font-size:.7rem;z-index:1;color:#eee}
.tword{position:relative;left:-17px}
.humword,.dewword{margin-left:10px}.tword{margin-left:20px}
.dewword{margin-left:8px}.tword{margin-left:20px}
.tword2{position:absolute;margin-top:-32px;font-size:.65rem;z-index:1;color:#fff}
.dewword2{position:absolute;margin-top:33px;font-size:.65rem;z-index:1;color:#fff;margin-left:75px}
.tword2{margin-left:70px}
.maxword{position:absolute;margin-top:-32px;font-size:.65rem;z-index:1;color:#fff}
.maxword{margin-left:10px}
.windword{position:absolute;margin-top:32px;font-size:.65rem;z-index:1;color:#fff;margin-left:7px}

.metarwindtoday0,.metarwindtoday5,.metarwindtoday10,.metarwindtoday20,.metarwindtoday25,.metarwindtoday30{font-family:weathertext2,Arial,Helvetica,system;width:5rem;height:2.5rem;
border-radius:3px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;display:flex;border:1px solid hsla(217, 15%, 17%, 1);
font-size:1.25rem;padding-top:0;color:#fff;border-bottom:12px solid hsla(217, 15%, 17%, 1);align-items:center;justify-content:center;
border-radius:3px;margin-bottom:21px; 
background-size: 2px 2px;
  background-image: var(--grid-lines2);
  background-size: 2px 2px;
  box-shadow: var(--button-shadow);}

.metarwindtodaykts0,.metarwindtodaykts5,.metarwindtodaykts10,.metarwindtodaykts20,.metarwindtodaykts25,.metarwindtodaykts30{font-family:weathertext2,Arial,Helvetica,system;width:5rem;height:2.5rem;
border-radius:3px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;display:flex;border:1px solid hsla(217, 15%, 17%, 1);
font-size:1.25rem;padding-top:0;color:#fff;border-bottom:12px solid hsla(217, 15%, 17%, 1);align-items:center;justify-content:center;
border-radius:3px;margin-bottom:21px; background-size: 2px 2px;
  background-image: var(--grid-lines2);
  background-size: 2px 2px;
  box-shadow: var(--button-shadow);}

.actualt{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:rgba(74, 99, 111, 0.1);
padding:5px;font-family:Arial, Helvetica, sans-serif;width:150px;height:0.8em;font-size:0.8rem;padding-top:2px;color:#aaa;
align-items:center;justify-content:center;margin-bottom:10px;top:0}

.actualw{position:relative;left:5px;-webkit-border-radius:3px;-moz-border-radius:3px;-o-border-radius:3px;border-radius:3px;background:rgba(74, 99, 111, 0.1);
padding:5px;font-family:Arial, Helvetica, sans-serif;width:150px;height:0.8em;font-size:0.8rem;padding-top:2px;color:#aaa;
align-items:center;justify-content:center;margin-bottom:10px;top:0}
.metarwindtodaykts0{color:rgba(68, 166, 181, 1.000)}
.metarwindtodaykts5{color:rgba(144, 177, 42, 1.000)}
.metarwindtodaykts10{color:rgba(230, 161, 65, 1.000)}
.metarwindtodaykts20{color:rgba(255, 124, 57, 1.000)}
.metarwindtodaykts25{color:rgba(255, 124, 57, 0.7)}
.metarwindtodaykts30{color:rgba(211, 93, 78, 1.000)}

.metarwindtoday0{color:rgba(68, 166, 181, 1.000)}
.metarwindtoday5{color:rgba(144, 177, 42, 1.000)}
.metarwindtoday10{color:rgba(230, 161, 65, 1.000)}
.metarwindtoday20{color:rgba(255, 124, 57, 1.000)}
.metarwindtoday25{color:rgba(255, 124, 57, 0.7)}
.metarwindtoday30{color:rgba(211, 93, 78, 1.000)}

smalluvunit{font-size:.7rem;font-family:weathertext2,Arial,Helvetica,system;color:#aaa;margin-top:-5px}
valuecalm{font-size:.8em;font-family:weathertext2;}
stationid{font-size:1.4em;font-family:weathertext2;color:#009bb4}
.hitemp,.lotemp{font-size:9px;}
.iconcondition{float:left;}
.icontext{position:absolute;float:left;margin-top:40px;text-align:left;}
.pressure{position:absolute;float:left;margin-top:30px;text-align:left;}
.mbsmartlogo{position:relative;float:right;top:0px;}
</style>
<div class="weather34darkbrowser" url="Weather Conditions Report from <?php echo $metar34stationname;?>"> </div>
  
<main class="grid">

 <article>
  <div class=actualt>&nbsp;&nbsp Current Conditions </div>
  <div class="iconcondition"><?php echo "<img rel='prefetch' src='wuicons/icons/".$sky_icon."' width='60px'>";?></div>
  <div class="icontext"><?php  echo $sky_desc; ?> </div>
<br><br>
<div class="pressure">


<br>
<blue>Pressure</blue> <br>
<?php
if ($pressureunit == 'mb' || $pressureunit == 'hPa') {
	echo $metar34pressuremb ," (".$pressureunit.")";
} else {
	echo $metar34pressurehg ," (inHG)";
}
?> - 
<?php
if ($pressureunit == 'mb' || $pressureunit == 'hPa') {
	echo $metar34pressurehg ," (inHG)";
} else {
	echo $metar34pressuremb ," (mb)";
}
?>
<blue><br>Visibility</blue> <br>
<?php
if ($distanceunit == 'mi') {
	echo $metar34vismiles  ," (miles)";
} else {
	echo $metar34viskm ," (km)";
}
?> - 
<?php
if ($distanceunit =='mi') {
	echo $metar34viskm  ," (km)";
} else {
	echo $metar34vismiles ," (miles)";
}
?>


</div>
  </article> 
  
  



  <article>       
<div class=actualt>&nbsp;&nbsp Temperature </div>   

 <div class="metartempcontainer1"><?php
 if ($tempunit == 'C') {
	if ($metar34temperaturec >30) {echo '<div class=metartemptoday30>'.$metar34temperaturec."<smalluvunit> &nbsp;&deg;C";}
	else if ($metar34temperaturec >25) {echo '<div class=metartemptoday25>'.$metar34temperaturec."<smalluvunit> &nbsp;&deg;C";}
	else if ($metar34temperaturec >20) {echo '<div class=metartemptoday20>'.$metar34temperaturec."<smalluvunit> &nbsp;&deg;C";}
	else if ($metar34temperaturec >10) {echo '<div class=metartemptoday10>'.$metar34temperaturec."<smalluvunit> &nbsp;&deg;C";}
	else if ($metar34temperaturec >5) {echo '<div class=metartemptoday5>'.$metar34temperaturec."<smalluvunit> &nbsp;&deg;C";}
	else if ($metar34temperaturec >-50) {echo '<div class=metartemptoday0>'.$metar34temperaturec."<smalluvunit> &nbsp;&deg;C";}
	else if ($metar34temperaturec =='') {echo '<div class=metartemptoday0>'.$metar34temperaturec."<smalluvunit> N/A";}
 } else {
	 if ($metar34temperaturef >86) {echo '<div class=metartemptoday30>'.$metar34temperaturef."<smalluvunit> &nbsp;&deg;F";}
	else if ($metar34temperaturef >77) {echo '<div class=metartemptoday25>'.$metar34temperaturef."<smalluvunit> &nbsp;&deg;F";}
	else if ($metar34temperaturef >68) {echo '<div class=metartemptoday20>'.$metar34temperaturef."<smalluvunit> &nbsp;&deg;F";}
	else if ($metar34temperaturef >50) {echo '<div class=metartemptoday10>'.$metar34temperaturef."<smalluvunit> &nbsp;&deg;F";}
	else if ($metar34temperaturef >41) {echo '<div class=metartemptoday5>'.$metar34temperaturef."<smalluvunit> &nbsp;&deg;F";}
	else if ($metar34temperaturef >-50) {echo '<div class=metartemptoday0>'.$metar34temperaturef."<smalluvunit> &nbsp;&deg;F";}
	else if ($metar34temperaturef =='') {echo '<div class=metartemptoday0>'.$metar34temperaturef."<smalluvunit> N/A";}
 }
?></smalluvunit></div></div>
<div class="tword">Temperature</div>
</div>






	 
<div class="lotemp">

<div class="metardewcontainer1"><?php
if ($tempunit == 'C') {
	if ($metar34dewpointc >30) {echo '<div class=metardewtoday30>'.$metar34dewpointc."<smalluvunit> &nbsp;&deg;C";}
	else if ($metar34dewpointc >25) {echo '<div class=metardewtoday25>'.$metar34dewpointc."<smalluvunit> &nbsp;&deg;C";}
	else if ($metar34dewpointc >20) {echo '<div class=metardewtoday20>'.$metar34dewpointc."<smalluvunit> &nbsp;&deg;C";}
	else if ($metar34dewpointc >10) {echo '<div class=metardewtoday10>'.$metar34dewpointc."<smalluvunit> &nbsp;&deg;C";}
	else if ($metar34dewpointc >5) {echo '<div class=metardewtoday5>'.$metar34dewpointc."<smalluvunit> &nbsp;&deg;C";}
	else if ($metar34dewpointc >-50) {echo '<div class=metardewtoday0>'.$metar34dewpointc."<smalluvunit> &nbsp;&deg;C";}
	else if ($metar34dewpointc=='') {echo '<div class=metartemptoday0>'.$metar34dewpointc."<smalluvunit> N/A";}
} else {
	if ($metar34dewpointf>86) {echo '<div class=metartemptoday30>'.$metar34dewpointf."<smalluvunit> &nbsp;&deg;F";}
	else if ($metar34dewpointf>77) {echo '<div class=metartemptoday25>'.$metar34dewpointf."<smalluvunit> &nbsp;&deg;F";}
	else if ($metar34dewpointf>68) {echo '<div class=metartemptoday20>'.$metar34dewpointf."<smalluvunit> &nbsp;&deg;F";}
	else if ($metar34dewpointf>50) {echo '<div class=metartemptoday10>'.$metar34dewpointf."<smalluvunit> &nbsp;&deg;F";}
	else if ($metar34dewpointf>41) {echo '<div class=metartemptoday5>'.$metar34dewpointf."<smalluvunit> &nbsp;&deg;F";}
	else if ($metar34dewpointf>-50) {echo '<div class=metartemptoday0>'.$metar34dewpointf."<smalluvunit> &nbsp;&deg;F";}
	else if ($metar34dewpointf=='') {echo '<div class=metartemptoday0>'.$metar34dewpointf."<smalluvunit> N/A";}
}
?></smalluvunit></div></div> 
 <div class="dewword">Dewpoint</div>

 <div class="metarhumcontainer1"><?php 
if ($metar34humidity >85) {echo '<div class=metarhumtoday85-100>'.$metar34humidity ."<smalluvunit> &nbsp;%";}
else if ($metar34humidity >70) {echo '<div class=metarhumtoday70-85>'.$metar34humidity ."<smalluvunit> &nbsp;%";}
else if ($metar34humidity  >35) {echo '<div class=metarhumtoday35-70>'.$metar34humidity ."<smalluvunit> &nbsp;%";}
else if ($metar34humidity >=0) {echo '<div class=metarhumtoday0-35>'.$metar34humidity ."<smalluvunit> &nbsp;%";}
else if ($metar34humidity=='') {echo '<div class=metarhumtoday0-35><smalluvunit> N/A';}
?></smalluvunit></div><div class="humword">&nbsp;Humidity</div></div> 
</div>  
</article>    
   
  <article>
  <div class=actualw>&nbsp;&nbsp Wind Speed</div>   
   <?php
//set windspeed variables
if ($windunit == 'km/h') {
	$metarwind1 = 'kmh';
	$metarwind2 = 'kts';
	$metarwind3 = 'mph';
	$metarwind4 = 'ms';
} else if ($windunit == 'mph') {
	$metarwind1 = 'mph';
	$metarwind2 = 'kts';
	$metarwind3 = 'kmh';
	$metarwind4 = 'ms';
} else if ($windunit == 'kts') {
	$metarwind1 = 'kts';
	$metarwind2 = 'mph';
	$metarwind3 = 'kmh';
	$metarwind4 = 'ms';
} else {
	$metarwind1 = 'ms';
	$metarwind2 = 'mph';
	$metarwind3 = 'kmh';
	$metarwind4 = 'kts';
}
	if ($metar34windspeedkmh >=50) {$metarkmh = '<div class=metarwindtoday30>'.$metar34windspeedkmh."<smalluvunit> &nbsp;km/h";}
	else if ($metar34windspeedkmh >=40) {$metarkmh = '<div class=metarwindtoday25>'.$metar34windspeedkmh."<smalluvunit>&nbsp; km/h";}
	else if ($metar34windspeedkmh >=30) {$metarkmh = '<div class=metarwindtoday20>'.$metar34windspeedkmh."<smalluvunit>&nbsp; km/h";}
	else if ($metar34windspeedkmh >0) {$metarkmh = '<div class=metarwindtoday10>'.$metar34windspeedkmh."<smalluvunit>&nbsp; km/h";}
	else {$metarkmh = '<div class=metarwindtoday10>'.'0'."<smalluvunit>&nbsp; km/h";}
	if ($metar34windspeedmph >=31.06) {$metarmph = '<div class=metarwindtoday30>'.$metar34windspeedmph."<smalluvunit> &nbsp;mph";}
	else if ($metar34windspeedmph >=24.85) {$metarmph = '<div class=metarwindtoday25>'.$metar34windspeedmph."<smalluvunit> &nbsp;mph";}
	else if ($metar34windspeedmph >=18.6) {$metarmph = '<div class=metarwindtoday20>'.$metar34windspeedmph."<smalluvunit> &nbsp;mph";}
	else if ($metar34windspeedmph >0) {$metarmph = '<div class=metarwindtoday10>'.$metar34windspeedmph."<smalluvunit> &nbsp;mph";}
	else {$metarmph = '<div class=metarwindtoday10>'.'0'."<smalluvunit> &nbsp;mph";}
	if ($metar34windspeedkts >=26.9) {$metarkts = '<div class=metarwindtoday30>'.$metar34windspeedkts."<smalluvunit> &nbsp;kts";}
	else if ($metar34windspeedkts >=21.5) {$metarkts = '<div class=metarwindtoday25>'.$metar34windspeedkts."<smalluvunit> &nbsp;kts";}
	else if ($metar34windspeedkts >=16.19) {$metarkts = '<div class=metarwindtoday20>'.$metar34windspeedkts."<smalluvunit> &nbsp;kts";}
	else if ($metar34windspeedkts >0) {$metarkts = '<div class=metarwindtoday10>'.$metar34windspeedkts."<smalluvunit> &nbsp;kts";}
	else {$metarkts = '<div class=metarwindtoday10>'.'0'."<smalluvunit> &nbsp;kts";}
	if ($metar34windspeedms >=13.8) {$metarms = '<div class=metarwindtoday30>'.$metar34windspeedms."<smalluvunit> &nbsp;m/s";}
	else if ($metar34windspeedms >=11.1) {$metarms = '<div class=metarwindtoday25>'.$metar34windspeedms."<smalluvunit> &nbsp;m/s";}
	else if ($metar34windspeedms >=8.3) {$metarms = '<div class=metarwindtoday20>'.$metar34windspeedms."<smalluvunit> &nbsp;m/s";}
	else if ($metar34windspeedms >0) {$metarms = '<div class=metarwindtoday10>'.$metar34windspeedms."<smalluvunit> &nbsp;m/s";}
	else {$metarms = '<div class=metarwindtoday10>'.'0'."<smalluvunit> &nbsp;m/s";}
$metarspot1 = 'metar'.$metarwind1;
$metarspot2 = 'metar'.$metarwind2;
$metarspot3 = 'metar'.$metarwind3;
$metarspot4 = 'metar'.$metarwind4;
?></div></div></div></div></smalluvunit>

<div class="metarwindcontainer1">
<?php
//wind1 kph
echo $$metarspot1;
?>
</div>
<div class="metarwindcontainer2">
<?php 
//wind2 mph
echo $$metarspot2;
?></smalluvunit></div>
</div>
<div class="metarwindcontainer3">
<?php 
//wind3 kts
echo $$metarspot3;
?></smalluvunit></div>
</div>
<div class="metarwindcontainer4">
<?php 
//wind4 ms
echo $$metarspot4;
?></smalluvunit></div>
</div>
</div>
</article>


<article>
<div class=actualw>&nbsp;&nbsp Wind Direction</div> 
</div>
</div> 
<div class="metar34compass1">
<div class="weather34compassring"></div>
<div class="weather34compassgrid"></div>
<div class="weather34north">N</div>
<div class="weather34-0deg">0&deg;</div>
<div class="weather34-45deg">45&deg;</div>

<div class="weather34east">E</div>
<div class="weather34-90deg">90&deg;</div>
<div class="weather34-135deg">135&deg;</div>

<div class="weather34south">S</div>
<div class="weather34-180deg">180&deg;</div>
<div class="weather34-225deg">225&deg;</div>

<div class="weather34west">W</div>
<div class="weather34-270deg">270&deg;</div>
<div class="weather34-315deg">315&deg;</div>

<div class=directiontextvalue>
<?php 
if( $metar34windir==0){echo "Calm";}else echo "&nbsp". $metar34windir,"&deg;";?></div>
<br>
<div class=directiontext>
<?php 
if($metar34windir<=11.25){echo "Due North";}
else if($metar34windir<=33.75){echo "North North <br>East";}
else if($metar34windir<=56.25){echo "North East";}
else if($metar34windir<=78.75){echo "East North<br>East";}
else if($metar34windir<=101.25){echo "Due East";}
else if($metar34windir<=123.75){echo "East South<br>East";}
else if($metar34windir<=146.25){echo "South East";}
else if($metar34windir<=168.75){echo "South South<br>East";}
else if($metar34windir<=191.25){echo "Due South";}
else if($metar34windir<=213.75){echo "South South<br>West";}
else if($metar34windir<=236.25){echo "South West";}
else if($metar34windir<=258.75){echo "West South<br>West";}
else if($metar34windir<=281.25){echo "Due West";}
else if($metar34windir<=303.75){echo "West North<br>West";}
else if($metar34windir<=326.25){echo "North West";}
else if($metar34windir<=348.75){echo "North North<br>West";}
else{echo "Due North";}?></div>

<div class="metar34compass-line1"> 
<div class="thearrow2"></div>
<div class="circleborder4"></div>
</div></div></div>
  </article> 
 
  <article>
  <div class=actualt>&nbsp;&nbsp Airport Data </div>   
  <stationid><?php echo $metar34stationid ; ?></stationid><br>
  <?php echo $metar34stationname;?>
  
 <div class="lotemp">
<?php //metar raw
echo "Metar :" .$metar34raw."";?>
</div>
<div class="hitemp">
<?php //update timestamp
date_default_timezone_set($tz);$date = $metar34time;$date=str_replace('@', ' ', $date);
$date=str_replace('Z', ' ', $date);$date1 = strtotime($date) + 60*60*$UTC;echo date('D jS F H:i a ',$date1);
?> </div></div>

  </article> 
  
  <article>
  <div class=actualt>&nbsp;&nbsp Raw Metar Info</div>  
  <div class="lotemp">
  <?php echo $info?> Raw METAR is the most common format in the world for the transmission of observational weather data. It is highly standardized through the International Civil Aviation Organization (ICAO), which allows it to be understood throughout most of the world.</span></div>
  </article> 
  
  <article>
  <div class=actualt>&nbsp;&nbsp API  Info</div>  
  <div class="lotemp">
  <?php echo $info?> Data Provided by </span><a href="https://www.checkwx.com/weather/<?php echo $icao1;?>" title="https://www.checkwx.com/weather/<?php echo $icao1;?>" target="_blank" ><br><img src=images/checkwx.svg width=130px alt="https://www.checkwx.com/weather/<?php echo $icao1;?>"></a></span>
  <br>Aviation Weather providing METAR, TAF, AIRMET, SIGMET and OUTLOOK Weather Reports
</div>
  </article> 
  
  
  <article>
  <div class=actualt>&nbsp;&nbsp &copy; Info</div>  
  <div class="lotemp">
  <?php echo $info?> CSS/SVG/PHP scripts were developed by <a href="https://weather34.com" title="weather34.com" target="_blank" style="font-size:9px;">weather34.com</a>  for use in the weather34 template &copy; 2015-<?php echo date('Y');?>
  <br><br>
  <?php echo $info?> Guide Info provided  by <a href="https://en.wikipedia.org/wiki/METAR" title="https://en.wikipedia.org/wiki/METAR" target="_blank" style="font-size:9px;">Metar-Wikipedia </a>  
  </div>
  <div class="mbsmartlogo"><img src="images/weather34-app-icon.svg" alt="weather34 mb-smart" title="weather34 mb-smart" width="30px"></div>
  </article> 
   
</main>