<?php include('livedata.php');?>

<div class="modulecaptioncam">Web Cam</div>

<!-- HOMEWEATHER STATION TEMPLATE SIMPLE WEBCAM -add your url as shown below do NOT delete the class='weather34-webcam' !!! -->
<a href="weather34-large-cam.php" data-lity class='webcamlink'><?php echo $webcamicon?></a>

<img src="<?php echo $webcamurl?>?v=<?php echo date('YmdGis');?>>" alt="weathercam" class="weather34-webcam">
