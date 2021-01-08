<?php include('livedata.php');?>
<div class="modulecaptionb">UV-INDEX</div>
<div class="button button-dial">               
 <div class="button-dial-top"></div>
<realfeel>
<?php 
if ($weather['uv']>=10) {echo "Extreme Risk";}
else if ($weather['uv']>=8) {echo "Very High Risk";}
else if ($weather['uv']>=6) {echo "High Risk";}
else if ($weather['uv']>=3) {echo "Moderate Risk";}
else if ($weather['uv']>0) {echo "Low Risk";}
else if ($weather['uv']==0) {echo "No Risk";}?>
</realfeel>
<div class="button-dial-label">          
<?php 
//UVINDEX COLOR
if ($weather['uv']>=10) {echo "<purple>".$weather['uv']."</purple>";}
else if ($weather['uv']>=8) {echo "<red>".$weather['uv']."</red>";}
else if ($weather['uv']>=5) {echo "<orange>".$weather['uv']."</orange>";}
else if ($weather['uv']>=3) {echo "<yellow>".$weather['uv']."</yellow>";}
else if ($weather['uv']>0) {echo "<green>".$weather['uv']."</green>";}
else if ($weather['uv']==0) {echo "<white>".number_format($weather['uv'],0)."</white>";}
?>
</div></div><div>
<unitindicator>UVI</unitindicator>
<windindicator>Actual</windindicator>
</div></div></div></div></div>


<div class="heatcircle"><div class="heatcircle-content">
<?php  // max Year UV
echo "<valuetextheading1>Max UV <deepblue>".$weather["uvymaxtime"]."</deepblue></valuetextheading1><br>";
echo "<div class=tempmodulehome0-5c>";
echo $weather["uvymax"];?>
<smalltempunit2>&nbsp;UVI<smalltempunit2></div></div>

<div class="heatcircle2"><div class="heatcircle-content">
<?php  // min year
echo "<valuetextheading1>Max Wm/2 <deepblue>".$weather["solarymaxtime"]."</deepblue></valuetextheading1><br>";
echo "<div class=tempmodulehome0-5c>";
echo $weather["solarymax"];?>
<smalltempunit2>&nbsp;Wm/2</smalltempunit2></div></div>

<div class="heatcircleindoor"><div class="heatcircle-content">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Solar  | Lux</valuetextheading1>
<?php // month min max
echo "<div class=tempmodulehomemaxmin>";
if ($weather["solar"]>=800) {echo "<red>".$weather["solar"]."</red>";}
else if ($weather["solar"]>=500) {echo "<orange>".$weather["solar"]."</orange>";}
else if ($weather["solar"]>0) {echo "<yellow>".$weather["solar"]."</yellow>";}
else if ($weather["solar"]==0) {echo "<white>".number_format($weather["solar"],0)."</white>";}

echo "<smalltempunit2>&nbsp;Wm/2</smalltempunit2>&nbsp;| &nbsp;  ";
$weather['lux1']=$weather['lux']/1000;
if ($weather['lux1']>=10000) {echo "<red>".number_format($weather['lux1'],0)."</red>";}
else if ($weather['lux1']>=40000) {echo "<orange>".number_format($weather['lux1'],0)."</orange>";}
else if ($weather['lux1']>0) {echo "<yellow>".number_format($weather['lux1'],0)."</yellow>";}
else if ($weather['lux1']==0) {echo "<white>".number_format($weather['lux1'],0)."</white>";}



;?>
<smalltempunit2>&nbsp;k</smalltempunit2>



</div></div>
</div></div>

<div class="maxtemp2">
<?php echo $max1 ." UVI ";
if ($weather["uvdmax"]>=10) {echo "<purple>".$weather["uvdmax"]."</purple>";}
else if ($weather["uvdmax"]>=8) {echo "<red>".$weather["uvdmax"]."</red>";}
else if ($weather["uvdmax"]>=5) {echo "<orange>".$weather["uvdmax"]."</orange>";}
else if ($weather["uvdmax"]>=3) {echo "<yellow>".$weather["uvdmax"]."</yellow>";}
else if ($weather["uvdmax"]>0) {echo "<green>".$weather["uvdmax"]."</green>";}
else if ($weather["uvdmax"]==0) {echo "<white>".number_format($weather["uvdmax"],0)."</white>";}
echo " ".$maxclock." ".$weather["uvdmaxtime"];?></div>

<div class="mintemp2">
<?php echo $max1 ." W/m2 ";
if ($weather["solardmax"]>=800) {echo "<red>".$weather["solardmax"]."</red>";}
else if ($weather["solardmax"]>=500) {echo "<orange>".$weather["solardmax"]."</orange>";}
else if ($weather["solardmax"]>0) {echo "<yellow>".$weather["solardmax"]."</yellow>";}
else if ($weather["solardmax"]==0) {echo "<white>".number_format($weather["solardmax"],0)."</white>";}
echo " ".$maxclock." ".$weather["solardmaxtime"];?></div>

<div class="heatcircleuv" style="position:relative"><div class="heatcircle-content-temp" >
<div class="rainrateextra">
<valuetextheading5>
<?php 
// weather34 simple css uv scale 
$weather['uv']=number_format($weather['uv'],1);
if ($weather['uv']>=11 ){echo "0  1  2  3  4  5  6  7  8  9  10 <purple>".$weather['uv']."</purple> <smalltempunit2>&nbsp;UVI</smalltempunit2>";}
else if ($weather['uv']>=10 ){echo "0  1  2  3  4  5  6  7  8  9  <purple>".$weather['uv']."</purple> 11 <smalltempunit2>&nbsp;UVI</smalltempunit2>";}
else if ($weather['uv']>=9 ){echo "0  1  2  3  4  5  6  7  8   <red>".$weather['uv']."</red> 10 11 <smalltempunit2>&nbsp;UVI</smalltempunit2>";}
else if ($weather['uv']>=8 ){echo "0  1  2  3  4  5  6  7  <red>".$weather['uv']."</red>  9 10 11 <smalltempunit2>&nbsp;UVI</smalltempunit2>";}
else if ($weather['uv']>=7 ){echo "0  1  2  3  4  5  6  <orange>".$weather['uv']."</orange>  8  9 10 11 <smalltempunit2>&nbsp;UVI</smalltempunit2>";}
else if ($weather['uv']>=6 ){echo "0  1  2  3  4  5  <orange>".$weather['uv']."</orange>  7  8  9 10 11 <smalltempunit2>&nbsp;UVI</smalltempunit2>";}
else if ($weather['uv']>=5 ){echo "0  1  2  3  4  <orange>".$weather['uv']."</orange>  6  7  8  9 10 11 <smalltempunit2>&nbsp;UVI</smalltempunit2>";}
else if ($weather['uv']>=4 ){echo "0  1  2  3  <yellow>".$weather['uv']."</yellow>  5  6  7  8  9 10 11 <smalltempunit2>&nbsp;UVI</smalltempunit2>";}
else if ($weather['uv']>=3 ){echo "0  1  2  <yellow>".$weather['uv']."</yellow>  4  5  6  7  8  9 10 11 <smalltempunit2>&nbsp;UVI</smalltempunit2>";}
else if ($weather['uv']>=2 ){echo "0  1  <green>".$weather['uv']."</green>  3  4  5  6  7  8  9  10 11 <smalltempunit2>&nbsp;UVI</smalltempunit2>";}
else if ($weather['uv']>=1 ){echo "0  <green>".$weather['uv']."</green>  2  3  4  5  6  7  8  9  10 11 <smalltempunit2>&nbsp;UVI</smalltempunit2>";}
else if ($weather['uv']>0 ){echo "<green>".$weather['uv']."</green>  1  2  3  4  5  6  7  8  9  10 11 <smalltempunit2>&nbsp;UVI</smalltempunit2>";}
else if ($weather['uv']==0 ){echo number_format($weather['uv'],0)." 1  2  3  4  5  6  7  8  9  10 11 <smalltempunit2>&nbsp;UVI</smalltempunit2>";}
?></smalltempunit2>
</valuetextheading5>
<div class=sunratebar>
<div class="weather34sunratebar" 
style="width:<?php echo $weather['uv']*9.35?>px;
background:
<?php //uv color
if ($weather['uv']>=10 ){echo 'var(--purple)';}
elseif ($weather['uv']>=8 ){echo 'var(--red)';}
elseif ($weather['uv']>=5 ){echo 'var(--orange)';}
elseif ($weather['uv']>=3 ){echo 'var(--yellow)';}
elseif ($weather['uv']>0 ){echo 'var(--green)';}
?>;">
</div></div></div></div></div></div>

<div class="weather-tempicon-identity">    
<?php //uv id icon
if ($weather["solar"]>0){echo "<orange>".$weather34_sun_icon."</orange>"; }
else if ($weather["solar"]<=0){echo "<grey>".$weather34_sun_icon."</grey>"; }
?>
</div>