<?php include('../settings.php');date_default_timezone_set($TZ);

if ($theme=='light'){$ccolor="#597286";}
if ($theme=='dark'){$ccolor="#AFB7C0";}
if ($theme=='light'){$bcolor="hsla(206, 33%, 96%,0)";}
if ($theme=='dark'){$bcolor="#21232C";}
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
    height:149px;
    margin-top:10px;
    -webkit-border-radius:5px;
    border-radius:5px;
    border:4px solid <?php echo $bordercolor?>;
    border-bottom:10px solid <?php echo $bordercolor?>;
    font-family:verb;
    text-rendering: optimizeLegibility !important;
    -webkit-font-smoothing: antialiased !important;
    background: hsl(206, 33%, 96%);
    border-radius: 5px;
    box-shadow: inset -3px -3px 7px #ffffffb0, inset 1px 1px 5px rgba(94, 104, 121, 0.671);
    padding-top:0;
    filter: brightness(100%);
    -webkit-filter: brightness(100%)
}
</style>