<?php include('console-settings.php');error_reporting(0); 
  if (array_key_exists('theme', $_GET) && ($_GET['theme'] == 'light' || $_GET['theme'] == 'light')){SetCookie('theme', $_GET['theme'], time()+15552000);
    $theme = $_GET['theme'];} else if (array_key_exists('theme', $_COOKIE) && ($_COOKIE['theme'] == 'light' || $_COOKIE['theme'] == 'light')) {
    $theme = $_COOKIE['theme'];}
?>