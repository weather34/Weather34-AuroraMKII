<?php include('livedata.php');error_reporting(0);?>
<style>body{background:rgba(30, 31, 35, 1.000);}
.webcamlarge{
-webkit-border-radius:4px;	-moz-border-radius:4px;	-o-border-radius:4px;	-ms-border-radius:4px;border-radius:4px;border:solid RGBA(84, 85, 86, 1.00) 2px;max-width:167vh;height:80vh;display:block;margin-left:auto;margin-right:auto;}
.videoWeatherCamLarge{-webkit-border-radius:4px;	-moz-border-radius:4px;	-o-border-radius:4px;	-ms-border-radius:4px;border-radius:4px;border:solid RGBA(84, 85, 86, 1.00) 2px;width:167vh;height:80vh;display:block;margin-left:auto;margin-right:auto;}
 a{color:#aaa;text-decoration:none} 
.weather34darkbrowser{position:relative;background:0;width:96%;height:30px;margin:auto;margin-top:-5px;margin-left:0px;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:10px;}
.weather34darkbrowser[url]:after{content:attr(url);color:#aaa;font-size:12px;position:absolute;left:0;right:0;top:0;padding:4px 15px;margin:11px 10px 0 auto;border-radius:3px;background:rgba(97, 106, 114, 0.3);height:20px;box-sizing:border-box;font-family:Arial, Helvetica, sans-serif}
.weather34-webcam-iframe {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  width:100%;
  height: 500px;
  overflow: hidden;  
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
.weather34-webcam-iframe::-webkit-scrollbar {
  display: none;
}
::-webkit-scrollbar {
    display: none
}
::-webkit-scrollbar-track {
    background: var(--border-dark)
}
::-webkit-scrollbar-thumb {
    background-color: var(--blue)
}
</style>
</head>
<body>
   
<!-- Aurora MKII TEMPLATE SIMPLE WEBCAM -add your url as shown below do NOT delete the class='webcam large' !!! -->
    <iframe class="weather34-webcam-iframe" allowfullscreen webkitallowfullscreen mozallowfullscreen src="<?php echo $webcamurl?>" frameborder="0" style='overflow-y: hidden;'></iframe>
</span>

