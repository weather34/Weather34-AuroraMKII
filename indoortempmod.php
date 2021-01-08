<?php include('livedata.php');?>
<div class="modulecaption2">Indoor &deg;<blue1><?php echo $weather["temp_units"]?></blue1></div>
<div class="button button-dial">     
  <div class="button-dial-top"></div>
  <div class="button-dial-label">
          
        <?php 
          if($weather["temp_units"]=='C' && $weather["temp_indoor"]<-10){ echo "<icon-minus10>".$weather["temp_indoor"]."</icon-minus10 >";}
else if($weather["temp_units"]=='C' && $weather["temp_indoor"]<-5){ echo "<icon-minus5>".$weather["temp_indoor"]."</icon-minus5>";}
else if($weather["temp_units"]=='C' && $weather["temp_indoor"]<0){ echo "<icon-zero>".$weather["temp_indoor"]."</icon-zero>";}
else if($weather["temp_units"]=='C' && $weather["temp_indoor"]<6){ echo "<icon-0-5>".$weather["temp_indoor"]."</icon-0-5>";}
else if($weather["temp_units"]=='C' && $weather["temp_indoor"]<10){ echo "<icon-6-10>".$weather["temp_indoor"]."</icon-6-10>";}
else if($weather["temp_units"]=='C' && $weather["temp_indoor"]<15){ echo "<icon-11-15>".$weather["temp_indoor"]."</icon-11-15>";}
else if($weather["temp_units"]=='C' && $weather["temp_indoor"]<20){ echo "<icon-16-20>".$weather["temp_indoor"]."</icon-16-20>";}
else if($weather["temp_units"]=='C' && $weather["temp_indoor"]<25){ echo "<icon-21-25>".$weather["temp_indoor"]."</icon-21-25>";}
else if($weather["temp_units"]=='C' && $weather["temp_indoor"]<30){ echo "<icon-26-30>".$weather["temp_indoor"]."</icon-26-30>";}
else if($weather["temp_units"]=='C' && $weather["temp_indoor"]<35){ echo "<icon-31-35>".$weather["temp_indoor"]."</icon-31-35>";}
else if($weather["temp_units"]=='C' && $weather["temp_indoor"]<40){ echo "<icon-36-40>".$weather["temp_indoor"]."</icon-36-40>";}
else if($weather["temp_units"]=='C' && $weather["temp_indoor"]<100){ echo "<icon-41-45>".$weather["temp_indoor"]."</icon-41-45>";}
          
if($weather["temp_units"]=='F' && $weather["temp_indoor"]<14){ echo "<icon-minus10>".$weather["temp_indoor"]."</icon-minus10 >";}
else if($weather["temp_units"]=='F' && $weather["temp_indoor"]<23){ echo "<icon-minus5>".$weather["temp_indoor"]."</icon-minus5>";}
else if($weather["temp_units"]=='F' && $weather["temp_indoor"]<32){ echo "<icon-zero>".$weather["temp_indoor"]."</icon-zero>";}
else if($weather["temp_units"]=='F' && $weather["temp_indoor"]<42){ echo "<icon-0-5>".$weather["temp_indoor"]."</icon-0-5>";}
else if($weather["temp_units"]=='F' && $weather["temp_indoor"]<50){ echo "<icon-6-10>".$weather["temp_indoor"]."</icon-6-10>";}
else if($weather["temp_units"]=='F' && $weather["temp_indoor"]<59){ echo "<icon-11-15>".$weather["temp_indoor"]."</icon-11-15>";}
else if($weather["temp_units"]=='F' && $weather["temp_indoor"]<68){ echo "<icon-16-20>".$weather["temp_indoor"]."</icon-16-20>";}
else if($weather["temp_units"]=='F' && $weather["temp_indoor"]<77){ echo "<icon-21-25>".$weather["temp_indoor"]."</icon-21-25>";}
else if($weather["temp_units"]=='F' && $weather["temp_indoor"]<86){ echo "<icon-26-30>".$weather["temp_indoor"]."</icon-26-30>";}
else if($weather["temp_units"]=='F' && $weather["temp_indoor"]<95){ echo "<icon-31-35>".$weather["temp_indoor"]."</icon-31-35>";}
else if($weather["temp_units"]=='F' && $weather["temp_indoor"]<104){ echo "<icon-36-40>".$weather["temp_indoor"]."</icon-36-40>";}
else if($weather["temp_units"]=='F' && $weather["temp_indoor"]<300){ echo "<icon-41-45>".$weather["temp_indoor"]."</icon-41-45>";}   
          ?>
        </div>
      </div>
<div>

<?php //unit
echo "<unitindicator>&deg;";echo $weather["temp_units"];echo "</unitindicator>";?>

<?php //feels like man
echo "<tempman>";
//c
if($weather["temp_units"]=='C' && $weather["temp_indoor"]<-10){ echo "<icon-minus10>".$hometemp1."</icon-minus10 >";}
else if($weather["temp_units"]=='C' && $weather["temp_indoor"]<-5){ echo "<icon-minus5>".$hometemp1."</icon-minus5>";}
else if($weather["temp_units"]=='C' && $weather["temp_indoor"]<0){ echo "<icon-zero>".$hometemp1."</icon-zero>";}
else if($weather["temp_units"]=='C' && $weather["temp_indoor"]<6){ echo "<icon-0-5>".$hometemp1."</icon-0-5>";}
else if($weather["temp_units"]=='C' && $weather["temp_indoor"]<10){ echo "<icon-6-10>".$hometemp1."</icon-6-10>";}
else if($weather["temp_units"]=='C' && $weather["temp_indoor"]<15){ echo "<icon-11-15>".$hometemp1."</icon-11-15>";}
else if($weather["temp_units"]=='C' && $weather["temp_indoor"]<20){ echo "<icon-16-20>".$hometemp1."</icon-16-20";}
else if($weather["temp_units"]=='C' && $weather["temp_indoor"]<25){ echo "<icon-21-25>".$hometemp1."</icon-21-25>";}
else if($weather["temp_units"]=='C' && $weather["temp_indoor"]<30){ echo "<icon-26-30>".$hometemp1."</icon-26-30>";}
else if($weather["temp_units"]=='C' && $weather["temp_indoor"]<35){ echo "<icon-31-35>".$hometemp1."</icon-31-35>";}
else if($weather["temp_units"]=='C' && $weather["temp_indoor"]<40){ echo "<icon-36-40>".$hometemp1."</icon-36-40>";}
else if($weather["temp_units"]=='C' && $weather["temp_indoor"]<100){ echo "<icon-41-45>".$hometemp1."</icon-41-45>";}

if($weather["temp_units"]=='F' && $weather["temp_indoor"]<14){ echo "<icon-minus10>".$hometemp1."</icon-minus10 >";}
else if($weather["temp_units"]=='F' && $weather["temp_indoor"]<26){ echo "<icon-minus5>".$hometemp1."</icon-minus5>";}
else if($weather["temp_units"]=='F' && $weather["temp_indoor"]<32){ echo "<icon-zero>".$hometemp1."</icon-zero>";}
else if($weather["temp_units"]=='F' && $weather["temp_indoor"]<42.8){ echo "<icon-0-5>".$hometemp1."</icon-0-5>";}
else if($weather["temp_units"]=='F' && $weather["temp_indoor"]<50){ echo "<icon-6-10>".$hometemp1."</icon-6-10>";}
else if($weather["temp_units"]=='F' && $weather["temp_indoor"]<59){ echo "<icon-11-15>".$hometemp1."</icon-11-15>";}
else if($weather["temp_units"]=='F' && $weather["temp_indoor"]<68){ echo "<icon-16-20>".$hometemp1."</icon-16-20>";}
else if($weather["temp_units"]=='F' && $weather["temp_indoor"]<77){ echo "<icon-21-25>".$hometemp1."</icon-21-25>";}
else if($weather["temp_units"]=='F' && $weather["temp_indoor"]<86){ echo "<icon-26-30>".$hometemp1."</icon-26-30>";}
else if($weather["temp_units"]=='F' && $weather["temp_indoor"]<95){ echo "<icon-31-35>".$hometemp1."</icon-31-35>";}
else if($weather["temp_units"]=='F' && $weather["temp_indoor"]<104){ echo "<icon-36-40>".$hometemp1."</icon-36-40>";}
else if($weather["temp_units"]=='F' && $weather["temp_indoor"]<300){ echo "<icon-41-45>".$hometemp1."</icon-41-45>";}

echo "</tempman>";?>

</div></div></div></div></div>

<div class="indoorhumidity-mod"> 
<?php //indoor humidity
if($weather["humidity_indoor"]>70) {
echo '<blue>'.$hometemp.'&nbsp;</blue>Humidity&nbsp; <blue>'.$weather["humidity_indoor"].'</blue><smalltempunit2>%</smalltempunit2>';}
else if($weather["humidity_indoor"]>=40) {
echo '<green>'.$hometemp.'&nbsp;</green>Humidity&nbsp; <green>'.$weather["humidity_indoor"].'</green><smalltempunit2>%</smalltempunit2>';}
else if($weather["humidity_indoor"]<40) {
echo '<red>'.$hometemp.'&nbsp;</red>Humidity&nbsp; <red>'.$weather["humidity_indoor"].'</red><smalltempunit2>%</smalltempunit2>';}
if($weather["humidity_indoortrend"] >0)echo "&nbsp;".$risingsymbolsmall;
else if($weather["humidity_indoortrend"]<0)echo "&nbsp;".$fallingsymbolsmall;?>
</div>



<div class="indoorfeels-mod"> 
<?php //indoor feels
//c
if($weather["temp_units"]=='C' && $weather["temp_indoor_feel"]<15) {
echo '<blue>'.$hometemp.'</blue>&nbsp;Feels Like &nbsp;<blue>'.$weather["temp_indoor_feel"].'</blue>&deg;';}
else if($weather["temp_units"]=='C' && $weather["temp_indoor_feel"]>24) {
echo '<red>'.$hometemp.'</red>&nbsp;Feels Like &nbsp;<red>'.$weather["temp_indoor_feel"].'</red>&deg;';}
else if($weather["temp_units"]=='C' && $weather["temp_indoor_feel"]>19) {
echo '<orange>'.$hometemp.'</orange>&nbsp;Feels Like &nbsp;<orange>'.$weather["temp_indoor_feel"].'</orange>&deg;';}
else if($weather["temp_units"]=='C' && $weather["temp_indoor_feel"]>=15) {
echo '<yellow>'.$hometemp.'</yellow>&nbsp;Feels Like &nbsp;<yellow>'.$weather["temp_indoor_feel"].'</yellow>&deg;';}
//f
if($weather["temp_units"]=='F' && $weather["temp_indoor_feel"]<59) {
echo '<blue>'.$hometemp.'</blue>&nbsp;Feels Like &nbsp;<blue>'.$weather["temp_indoor_feel"].'</blue>&deg;';}
else if($weather["temp_units"]=='F' && $weather["temp_indoor_feel"]>75.2) {
echo '<red>'.$hometemp.'</red>&nbsp;Feels Like &nbsp;<red>'.$weather["temp_indoor_feel"].'</red>&deg;';}
else if($weather["temp_units"]=='F' && $weather["temp_indoor_feel"]>66.2) {
echo '<orange>'.$hometemp.'</orange>&nbsp;Feels Like &nbsp;<orange>'.$weather["temp_indoor_feel"].'</orange>&deg;';}
else if($weather["temp_units"]=='F' && $weather["temp_indoor_feel"]>=59) {
echo '<yellow>'.$hometemp.'</yellow>&nbsp;Feels Like &nbsp;<yellow>'.$weather["temp_indoor_feel"].'</yellow>&deg;';}
if($weather["temp_indoor_trend"] >0)echo "&nbsp;".$risingsymbolsmall;
else if($weather["temp_indoor_trend"]<0)echo "&nbsp;".$fallingsymbolsmall;?>
</div>