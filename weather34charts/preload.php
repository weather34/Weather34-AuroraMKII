<?php include('../settings.php');date_default_timezone_set($TZ);
?><script rel="preload" src='canvasJs.js' as="script"></script>
<link rel="preload" href="fonts/verbatim-regular.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="fonts/verbatim-medium.woff2" as="font" type="font/woff2" crossorigin>
<style>
 @font-face {font-family: weathertext3;src: url(fonts/verbatim-regular.woff2) format("woff2"),url(fonts/verbatim-regular.woff) format("woff");}
 @font-face {font-family: weathertext2;src: url(fonts/verbatim-medium.woff2) format("woff2"),url(fonts/verbatim-medium.woff) format("woff");}
.chartb{height:150px;margin-top:10px;-webkit-border-radius:10px;border-radius:10px;border:6px solid hsla(212, 12%, 72%,.2);font-family:weathertext2}
</style>