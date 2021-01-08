<?php //November 2020 // PHP8
  include('console-settings.php');   include('common.php'); 
//set the units 
$units = ""; 
if (array_key_exists('units', $_COOKIE)) { $units = $_COOKIE['units']; } 
if (array_key_exists('units', $_GET) && ($_GET['units'] == 'us' || $_GET['units'] == 'uk' || $_GET['units'] == 'metric' || $_GET['units'] == 'scandinavia' || $_GET['units'] == 'knots')) 
{ setcookie('units', $_GET['units']); $units = $_GET['units']; } 
if ($units == 'uk') { $windunit = 'mph'; $tempunit = 'C'; $rainunit = 'mm'; $pressureunit = "hPa"; } 
else if ($units == 'scandinavia') { $windunit = 'm/s'; $tempunit = 'C'; $rainunit = 'mm'; $pressureunit = "hPa"; } 
else if ($units == 'metric') { $windunit = 'km/h'; $tempunit = 'C'; $rainunit = 'mm'; $pressureunit = "hPa"; } 
else if ($units == 'us') { $windunit = 'mph'; $tempunit = 'F'; $rainunit = 'in'; $pressureunit = "inHg"; }
else if ($units == 'knots') { $windunit = 'kts'; $tempunit = 'C'; $rainunit = 'mm'; $pressureunit = "hPa"; } ?>