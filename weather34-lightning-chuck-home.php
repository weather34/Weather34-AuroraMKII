<?php  include('livedata.php');
date_default_timezone_set($TZ);

?>
 
 <?php
//weather34 timeago lightning
$lightningseconds = $weather["lightningtimeago"];function convert($lightningseconds){$weather34timeago = "";$days = intval(intval($lightningseconds) / (3600*24));
    $hours = (intval($lightningseconds) / 3600) % 24;$minutes = (intval($lightningseconds) / 60) % 60;$seconds = (intval($lightningseconds)) % 60;
    if($days> 1){$weather34timeago .= "<orange>$days</orange> Days  ";}
    else {if($days>0){$weather34timeago .= "<orange>$days</orange> Day  ";}
    if($hours > 1){$weather34timeago .= "<orange>$hours</orange> hrs  ";}
    else if($hours >0){$weather34timeago .= "<orange>$hours</orange> hr  ";}
    else if($hours <=0){$weather34timeago .= " ";}
    if($minutes > 1){$weather34timeago .= "<orange>$minutes</orange> mins  ";}
    else if($minutes >=0){$weather34timeago .= "<orange>$minutes</orange> min  ";}
    }return $weather34timeago;}
?>

<div class="lightningblock">
<div class="lightningdesc">Lightning Today</div>
<div class="button button-dial-small-lightning">   
<?php //strike
echo "<strikeicon>";echo "Today";
echo "</strikeicon>";?>   
<div class="button-dial-top-small-lightning"></div>
<div class="button-dial-label-small-lightning"><?php echo $weather["lightningmax"];?></div>
</div>

<laststrike>
Last Strike
<?php  //weatherflow air lightning output
if ($lightningseconds <61 ){ echo "<br><color>Just Now</color>";}
else if ($lightningseconds >=61 ){
    
    if ($weather["lightningkm"]=='--') {
        echo "<br>";
    } elseif ($weather["lightningkm"]<500) { echo "<br><orange>".number_format($weather["lightningkm"],0)." km " ;} 
    
    echo "</orange><br>".convert($lightningseconds),"<br>Ago";
}?></laststrike>
</div>



<div class="lightningyear-mod2"> Strikes <?php echo date('Y');?> &nbsp; <orange>
<?php echo $weather["lightningyear"]?></orange>
</div>



<div class="lightningmonth-mod2"> Strikes <?php echo date('F');?> &nbsp;<orange>
<?php echo $weather["lightningmonth"]?></orange>
</div>