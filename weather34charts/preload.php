<?php include('../settings.php');date_default_timezone_set($TZ);
$theme="dark";
if ($theme=='light'){$ccolor="#3D464D";}
if ($theme=='dark'){$ccolor="#aec0d1";}

if ($theme=='light'){$bordertextcolor="#3D464D";}
if ($theme=='dark'){$bordertextcolor="#3D464D";}

if ($theme=='light'){$bcolor="#f8f8f8";}
if ($theme=='dark'){$bcolor="#111";}

if ($theme=='light'){$bordercolor="#aec0d1";}
if ($theme=='dark'){$bordercolor="#aec0d1";}
?>
<script rel="preload" src='canvas-231.js' as="script"></script>
<script rel="preload" src=../js/jquery.js></script>
<link rel="preload" href="fonts/verbatim-bold.woff" as="font" type="font/woff" crossorigin>
<style>
@font-face {font-family: weathertext3;src: url(fonts/verbatim-bold.woff) format("woff");}
@font-face {font-family: weathertext2;src: url(fonts/verbatim-bold.woff) format("woff");}
@font-face {font-family: verb;src: url(fonts/verbatim-bold.woff) format("woff");}
body{filter: brightness(100%);
    text-shadow: none;
    -webkit-filter: brightness(100%);}
.chartb{
    z-index:150;
    height:140px;
    margin-top:6px;
    -webkit-border-radius:5px;
    border-radius:5px;
    border:4px solid <?php echo $bordercolor?>;
    border-bottom:19px solid <?php echo $bordercolor?>;
    font-family:verb;
    text-rendering: optimizeLegibility !important;
    -webkit-font-smoothing: antialiased !important;    
    border-radius: 5px;
    box-shadow: none;
    padding-top:0;      
    background-color: #111;
    filter: brightness(105%);
    text-shadow: none;
    -webkit-filter: brightness(105%);
   
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
    background: #111;
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
    color:<?php echo $bordertextcolor?>;
    background:0 0;
    padding-left: 4px;
    padding-right: 4px;    
    
}
</style>