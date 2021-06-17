<?php include('livedata.php');?>
<link href="weather34-theme.css?version=<?php echo filemtime('weather34-theme.css') ?>" rel="stylesheet prefetch">
<theword>Lightning Strikes </theword>
<extrainfoicon><orange><?php echo $weather34_lightningdata;?></orange></extrainfoicon>
<div class="canvascredit">
<a class="canvascreditlink" href="https://canvasjs.com" target="_blank" data-title="CanvasJs.com" >
Charts compiled with CanvasJs.com <br>v2.3.1 GA (CC BY-NC 3.0) Non-Commercial-Version.</a></div></div>

<div class="almanacouterboxrain">
<br><br>
<div class="almanacchartx">
<monthchart style="margin-bottom:-15px;position:absolute;font-size:.7em">Current Day Strikes </monthchart>
<iframe  class="charttempmodule" src="weather34charts/todaylightning.php" frameborder="0" scrolling="no" width="320px" height="200px"></iframe>  
</div>

<div class="almanacchartx">
<monthchart style="margin-bottom:-15px;position:absolute;font-size:.7em"><?php echo date('F')?> Strikes</monthchart>
<iframe  class="charttempmodule" src="weather34charts/monthlightningmodulechart2.php" frameborder="0" scrolling="no" width="320px" height="200px"></iframe>  
</div>

<div class="almanacchartx">
<monthchart style="margin-bottom:-15px;position:absolute;font-size:.7em"><?php echo date('Y')?> Strikes</monthchart>
<iframe  class="charttempmodule" src="weather34charts/yearlightningmodulechart2.php" frameborder="0" scrolling="no" width="320px" height="200px"></iframe>  
</div>
<br><br>
</div>
