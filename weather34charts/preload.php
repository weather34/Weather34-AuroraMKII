<?php include('../console-settings.php');date_default_timezone_set($TZ);


if ($theme=='light'){$ccolor="#333";}
if ($theme=='dark'){$ccolor="rgb(250,250,250)";}
if ($theme=='light'){$bcolor="rgba(250,250,250,1)";}
if ($theme=='dark'){$bcolor="#19191A";}
if ($theme=='light'){$bordercolor="#DEE3F0";}
if ($theme=='dark'){$bordercolor="#3D464D";}
?>
<script rel="preload" src='canvasJs.js?ver=5' as="script"></script>
<script rel="preload" src=../js/jquery.js></script>
<link rel="preload" href="fonts/verbatim-bold.woff" as="font" type="font/woff" crossorigin>
<style>
@font-face {font-family: weathertext3;src: url(fonts/verbatim-bold.woff) format("woff");}
@font-face {font-family: weathertext2;src: url(fonts/verbatim-bold.woff) format("woff");}
@font-face {font-family: verb;src: url(fonts/verbatim-bold.woff) format("woff");}
.chartb{
    z-index:150;
    height:140px;
    margin-top:5px;
    -webkit-border-radius:5px;
    border-radius:5px;
    border:4px solid <?php echo $bordercolor?>;
    border-bottom:20px solid <?php echo $bordercolor?>;
    font-family:verb;
    text-rendering: optimizeLegibility !important;
    -webkit-font-smoothing: antialiased !important;
    background: <?php echo $bcolor?>;
    border-radius: 5px;
    box-shadow: none;
    padding-top:0;   
}

.chartc{
    z-index:150;
    height:149px;    
    margin-top:0px;
    -webkit-border-radius:5px;
    border-radius:5px;
    border:0;
    font-family:verb;
    text-rendering: optimizeLegibility !important;
    -webkit-font-smoothing: antialiased !important;
    background: transparent;
    border-radius: 5px;
    box-shadow: 0;
    padding-top:0
}

.modulecaptionchart,
.modulecaptionchart2,
.modulecaptionchart3 {
    position:absolute;
    left: 3%;
    top: -15px;
    width: max-content;
    font-family: verb;
    font-size: 8px;
    display: flex;
    position: relative;
    color:<?php echo $ccolor?>;
    background:0 0;
    padding-left: 4px;
    padding-right: 4px;
    -webkit-border-top-right-radius: 4px;
    -moz-border-radius-topright: 4px;
    border-top-right-radius: 4px;    
    z-index:9999
}
</style>