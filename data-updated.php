<?php include('livedata.php');?>
<onlinetime>
<?php //weather34 simple php data updated
echo "Updated " ." : ";
$weather34updatefile=$livedata;
if(file_exists($livedata)&&time()- filemtime($livedata)>300){echo "<orange> Offline </orange>";}
else 
echo get_modified_line($weather34updatefile);
    function get_modified_line($weather34updatefile=null) {
    if (!$weather34updatefile) {$date_modified = filemtime($weather34updatefile);}    
    else {$date_modified = filemtime($weather34updatefile); }
    $time_difference = time() - $date_modified;
    return "" . time_ago($time_difference) . "";}
    function time_ago($diff) {   
    $timedata34 = array('Second', 'Minute', 'Hour', 'Day', 'Week', 'Month', 'Year');
    $limits34 = array(1, 59.5, 3570, 84600, 561600, 2520225, 30242700);
    $weather34intervals     = array(1, 60,  3600, 86400, 604800, 2629800, 31557600);    
    $threshold_size = count($limits34);
    $weather34start = 0; while (++$weather34start < $threshold_size && $diff >= $limits34[$weather34start]);
    --$weather34start;$weather34_rounded = round($diff / $weather34intervals[$weather34start]);
    $plural = ($weather34_rounded == 1) ? '' : 's';
    if ($weather34intervals[$weather34start]<60){
        echo "<span><green>".$weather34_rounded . '</green></span> ' . $timedata34[$weather34start] . $plural;}    
        else  if ($weather34intervals[$weather34start]>=60){
        echo "<span><yellow>".$weather34_rounded . '</yellow></span> ' . $timedata34[$weather34start] . $plural;} 
        }
    if(file_exists($livedata)&&time()- filemtime($livedata)<300) {echo " Ago";}    
?>
</onlinetime>
<div class="onlineupdated">
<?php 
if(file_exists($livedata)&&time()- filemtime($livedata)>300)echo $wirelessoffline;
else echo $wireless?><?php echo $weather34timeago?>
</div>
