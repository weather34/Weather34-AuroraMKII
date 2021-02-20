<?php include 'livedata.php';

####################################################################################################
#    CREATED FOR WEATHER34 AURORA MKII TEMPLATE                                                #
# https://weather34.com/homeweatherstation/index.html                                                #
#                                                                                                    #
#     Release: August 2019                                                                             #
#                                                                                                    #
#   https://www.weather34.com                                                                        #
####################################################################################################

//original weather34 script original svg/php by weather34 2015-2019 clearly marked as original by weather34//

//start the wu output
$json = 'jsondata/wuforecast.txt';
$weather34wuurl = file_get_contents($json);
$parsed_weather34wujson = json_decode($weather34wuurl, false);
$parsed_weather34wujson1 = json_decode($weather34wuurl, true);
{
    //weather34 wu null fallback
    if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0] == null) {
        $wuskydayIcon = $parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[1];
        $wuskydayTime = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[1];
        $wusummary = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[1];
        $wuskydaynight = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[1];
        $wuskythunder = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[1];
        $wuskythunderindex = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[1];
    } else {
        $wuskydayIcon = $parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0];
        $wuskydayTime = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[0];
        $wusummary = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[0];
        $wuskydaynight = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[0];
        $wuskythunder = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[0];
        $wuskyheatindex = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[0];
        $wuskythunderindex = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[0];
    }
    //weather34 wu 1st
    if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0] == null) {
        $wuskydayIcon1 = $parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[2];
        $wuskydayTime1 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[2];
        $wusummary1 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[2];
        $wuskydaynight1 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[2];
        $wuskythunder1 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[2];
        $wuskyheatindex1 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[2];
        $wuskythunderindex1 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[2];

    } else {
        $wuskydayIcon1 = $parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[1];
        $wuskydayTime1 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[1];
        $wusummary1 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[1];
        $wuskydaynight1 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[1];
        $wuskythunder1 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[1];
        $wuskyheatindex1 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[1];
        $wuskythunderindex1 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[1];

    }
    //weather34 wu 2nd
    if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0] == null) {
        $wuskydayIcon2 = $parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[3];
        $wuskydayTime2 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[3];
        $wusummary2 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[3];
        $wuskydaynight2 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[3];
        $wuskythunder2 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[3];
        $wuskyheatindex2 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[3];
        $wuskythunderindex2 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[3];
    } else {

        $wuskydayIcon2 = $parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[2];
        $wuskydayTime2 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[2];
        $wusummary2 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[2];
        $wuskydaynight2 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[2];
        $wuskythunder2 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[2];
        $wuskyheatindex2 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[2];
        $wuskythunderindex2 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[2];
    }
    //weather34 wu 3rd
    if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0] == null) {
        $wuskydayIcon3 = $parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[4];
        $wuskydayTime3 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[4];
        $wusummary3 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[4];
        $wuskydaynight3 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[4];
        $wuskythunder3 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[4];
        $wuskyheatindex3 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[4];
        $wuskythunderindex3 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[4];
    } else {
        $wuskydayIcon3 = $parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[3];
        $wuskydayTime3 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[3];
        $wusummary3 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[3];
        $wuskydaynight3 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[3];
        $wuskythunder3 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[3];
        $wuskyheatindex3 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[3];
        $wuskythunderindex3 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[3];
    }
    //weather34 wu 4th
    if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0] == null) {
        $wuskydayIcon4 = $parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[5];
        $wuskydayTime4 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[5];
        $wusummary4 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[5];
        $wuskydaynight4 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[5];
        $wuskythunder4 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[5];
        $wuskyheatindex4 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[5];
        $wuskythunderindex4 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[5];
    } else {
        $wuskydayIcon4 = $parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[4];
        $wuskydayTime4 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[4];
        $wusummary4 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[4];
        $wuskydaynight4 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[4];
        $wuskythunder4 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[4];
        $wuskyheatindex4 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[4];
        $wuskythunderindex4 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[4];

    }
    //weather34 wu 5th
    if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0] == null) {
        $wuskydayIcon5 = $parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[6];
        $wuskydayTime5 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[6];
        $wusummary5 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[6];
        $wuskydaynight5 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[6];
        $wuskythunder5 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[6];
        $wuskyheatindex5 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[6];
        $wuskythunderindex5 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[6];

    } else {
        $wuskydayIcon5 = $parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[5];
        $wuskydayTime5 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[5];
        $wusummary5 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[5];
        $wuskydaynight5 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[5];
        $wuskythunder5 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[5];
        $wuskyheatindex5 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[5];
        $wuskythunderindex5 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[5];
    }
    //weather34 wu 6th
    if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0] == null) {
        $wuskydayIcon6 = $parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[7];
        $wuskydayTime6 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[7];
        $wusummary6 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[7];
        $wuskydaynight6 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[7];
        $wuskythunder6 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[7];
        $wuskyheatindex6 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[7];
        $wuskythunderindex6 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[7];

    } else {
        $wuskydayIcon6 = $parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[6];
        $wuskydayTime6 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[6];
        $wusummary6 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[6];
        $wuskydaynight6 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[6];
        $wuskythunder6 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[6];
        $wuskyheatindex6 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[6];
        $wuskythunderindex6 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[6];
    }
    //weather34 wu 7th
    if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0] == null) {
        $wuskydayIcon7 = $parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[8];
        $wuskydayTime7 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[8];
        $wusummary7 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[8];
        $wuskydaynight7 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[8];
        $wuskythunder7 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[8];
        $wuskyheatindex7 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[8];
        $wuskythunderindex7 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[8];

    } else { $wuskydayIcon7 = $parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[7];
        $wuskydayTime7 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[7];
        $wusummary7 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[7];
        $wuskydaynight7 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[7];
        $wuskythunder7 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[7];
        $wuskyheatindex7 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[7];
        $wuskythunderindex7 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[7];

    }

    //weather34 wu 8th
    if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0] == null) {
        $wuskydayIcon8 = $parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[9];
        $wuskydayTime8 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[9];
        $wusummary8 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[9];
        $wuskydaynight8 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[9];
        $wuskythunder8 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[9];
        $wuskyheatindex8 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[9];
        $wuskythunderindex8 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[9];

    } else { $wuskydayIcon8 = $parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[8];
        $wuskydayTime8 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[8];
        $wusummary8 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[8];
        $wuskydaynight8 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[8];
        $wuskythunder8 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[8];
        $wuskyheatindex8 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[8];
        $wuskythunderindex8 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[8];
    }

    //weather34 wu 9th
    if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0] == null) {
        $wuskydayIcon9 = $parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[10];
        $wuskydayTime9 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[10];
        $wusummary9 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[10];
        $wuskydaynight9 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[10];
        $wuskythunder9 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[10];
        $wuskyheatindex9 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[10];
        $wuskythunderindex9 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[10];

    } else { $wuskydayIcon9 = $parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[9];
        $wuskydayTime9 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[9];
        $wusummary9 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[9];
        $wuskydaynight9 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[9];
        $wuskythunder9 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[9];
        $wuskyheatindex9 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[9];

    }

//weather34 wu 10th
    if ($parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[0] == null) {
        $wuskydayIcon10 = $parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[11];
        $wuskydayTime10 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[11];
        $wusummary10 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[11];
        $wuskydaynight10 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[11];
        $wuskythunder10 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[11];
        $wuskyheatindex10 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[11];
        $wuskythunderindex10 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[11];
    } else { $wuskydayIcon10 = $parsed_weather34wujson->{'daypart'}[0]->{'iconCode'}[10];
        $wuskydayTime10 = $parsed_weather34wujson->{'daypart'}[0]->{'daypartName'}[10];
        $wusummary10 = $parsed_weather34wujson->{'daypart'}[0]->{'narrative'}[10];
        $wuskydaynight10 = $parsed_weather34wujson->{'daypart'}[0]->{'dayOrNight'}[10];
        $wuskythunder10 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[10];
        $wuskyheatindex10 = $parsed_weather34wujson->{'daypart'}[0]->{'temperatureHeatIndex'}[10];
        $wuskythunderindex10 = $parsed_weather34wujson->{'daypart'}[0]->{'thunderIndex'}[10];

    }

    //heatindex
    if ($tempunit == 'F' && $wuapiunit == 'm') {$wuskyheatindex = ($wuskyheatindex * 9 / 5) + 32;}
    // metric to F UK
    if ($tempunit == 'F' && $wuapiunit == 'h') {$wuskyheatindex = ($wuskyheatindex * 9 / 5) + 32;}
    // ms non metric Scandinavia
    if ($tempunit == 'F' && $wuapiunit == 's') {$wuskyheatindex = ($wuskyheatindex * 9 / 5) + 32;}
    // non metric to c US
    if ($tempunit == 'C' && $wuapiunit == 'e') {$wuskyheatindex = ($wuskyheatindex - 32) / 1.8;}

    //heatindex
    if ($tempunit == 'F' && $wuapiunit == 'm') {$wuskyheatindex1 = ($wuskyheatindex1 * 9 / 5) + 32;}
    // metric to F UK
    if ($tempunit == 'F' && $wuapiunit == 'h') {$wuskyheatindex1 = ($wuskyheatindex1 * 9 / 5) + 32;}
    // ms non metric Scandinavia
    if ($tempunit == 'F' && $wuapiunit == 's') {$wuskyheatindex1 = ($wuskyheatindex1 * 9 / 5) + 32;}
    // non metric to c US
    if ($tempunit == 'C' && $wuapiunit == 'e') {$wuskyheatindex1 = ($wuskyheatindex1 - 32) / 1.8;}

    //heatindex
    if ($tempunit == 'F' && $wuapiunit == 'm') {$wuskyheatindex2 = ($wuskyheatindex2 * 9 / 5) + 32;}
    // metric to F UK
    if ($tempunit == 'F' && $wuapiunit == 'h') {$wuskyheatindex2 = ($wuskyheatindex2 * 9 / 5) + 32;}
    // ms non metric Scandinavia
    if ($tempunit == 'F' && $wuapiunit == 's') {$wuskyheatindex2 = ($wuskyheatindex2 * 9 / 5) + 32;}
    // non metric to c US
    if ($tempunit == 'C' && $wuapiunit == 'e') {$wuskyheatindex2 = ($wuskyheatindex2 - 32) / 1.8;}

    //heatindex
    if ($tempunit == 'F' && $wuapiunit == 'm') {$wuskyheatindex3 = ($wuskyheatindex3 * 9 / 5) + 32;}
    // metric to F UK
    if ($tempunit == 'F' && $wuapiunit == 'h') {$wuskyheatindex3 = ($wuskyheatindex3 * 9 / 5) + 32;}
    // ms non metric Scandinavia
    if ($tempunit == 'F' && $wuapiunit == 's') {$wuskyheatindex3 = ($wuskyheatindex3 * 9 / 5) + 32;}
    // non metric to c US
    if ($tempunit == 'C' && $wuapiunit == 'e') {$wuskyheatindex3 = ($wuskyheatindex3 - 32) / 1.8;}

    //heatindex
    if ($tempunit == 'F' && $wuapiunit == 'm') {$wuskyheatindex4 = ($wuskyheatindex4 * 9 / 5) + 32;}
    // metric to F UK
    if ($tempunit == 'F' && $wuapiunit == 'h') {$wuskyheatindex4 = ($wuskyheatindex4 * 9 / 5) + 32;}
    // ms non metric Scandinavia
    if ($tempunit == 'F' && $wuapiunit == 's') {$wuskyheatindex4 = ($wuskyheatindex4 * 9 / 5) + 32;}
    // non metric to c US
    if ($tempunit == 'C' && $wuapiunit == 'e') {$wuskyheatindex4 = ($wuskyheatindex4 - 32) / 1.8;}

    //heatindex
    if ($tempunit == 'F' && $wuapiunit == 'm') {$wuskyheatindex5 = ($wuskyheatindex5 * 9 / 5) + 32;}
    // metric to F UK
    if ($tempunit == 'F' && $wuapiunit == 'h') {$wuskyheatindex5 = ($wuskyheatindex5 * 9 / 5) + 32;}
    // ms non metric Scandinavia
    if ($tempunit == 'F' && $wuapiunit == 's') {$wuskyheatindex5 = ($wuskyheatindex5 * 9 / 5) + 32;}
    // non metric to c US
    if ($tempunit == 'C' && $wuapiunit == 'e') {$wuskyheatindex5 = ($wuskyheatindex5 - 32) / 1.8;}

    //heatindex
    if ($tempunit == 'F' && $wuapiunit == 'm') {$wuskyheatindex6 = ($wuskyheatindex6 * 9 / 5) + 32;}
    // metric to F UK
    if ($tempunit == 'F' && $wuapiunit == 'h') {$wuskyheatindex6 = ($wuskyheatindex6 * 9 / 5) + 32;}
    // ms non metric Scandinavia
    if ($tempunit == 'F' && $wuapiunit == 's') {$wuskyheatindex6 = ($wuskyheatindex6 * 9 / 5) + 32;}
    // non metric to c US
    if ($tempunit == 'C' && $wuapiunit == 'e') {$wuskyheatindex6 = ($wuskyheatindex6 - 32) / 1.8;}

    //heatindex
    if ($tempunit == 'F' && $wuapiunit == 'm') {$wuskyheatindex7 = ($wuskyheatindex7 * 9 / 5) + 32;}
    // metric to F UK
    if ($tempunit == 'F' && $wuapiunit == 'h') {$wuskyheatindex7 = ($wuskyheatindex7 * 9 / 5) + 32;}
    // ms non metric Scandinavia
    if ($tempunit == 'F' && $wuapiunit == 's') {$wuskyheatindex7 = ($wuskyheatindex7 * 9 / 5) + 32;}
    // non metric to c US
    if ($tempunit == 'C' && $wuapiunit == 'e') {$wuskyheatindex7 = ($wuskyheatindex7 - 32) / 1.8;}

    //heatindex
    if ($tempunit == 'F' && $wuapiunit == 'm') {$wuskyheatindex8 = ($wuskyheatindex8 * 9 / 5) + 32;}
    // metric to F UK
    if ($tempunit == 'F' && $wuapiunit == 'h') {$wuskyheatindex8 = ($wuskyheatindex8 * 9 / 5) + 32;}
    // ms non metric Scandinavia
    if ($tempunit == 'F' && $wuapiunit == 's') {$wuskyheatindex8 = ($wuskyheatindex8 * 9 / 5) + 32;}
    // non metric to c US
    if ($tempunit == 'C' && $wuapiunit == 'e') {$wuskyheatindex8 = ($wuskyheatindex8 - 32) / 1.8;}

    //heatindex
    if ($tempunit == 'F' && $wuapiunit == 'm') {$wuskyheatindex9 = ($wuskyheatindex9 * 9 / 5) + 32;}
    // metric to F UK
    if ($tempunit == 'F' && $wuapiunit == 'h') {$wuskyheatindex9 = ($wuskyheatindex9 * 9 / 5) + 32;}
    // ms non metric Scandinavia
    if ($tempunit == 'F' && $wuapiunit == 's') {$wuskyheatindex9 = ($wuskyheatindex9 * 9 / 5) + 32;}
    // non metric to c US
    if ($tempunit == 'C' && $wuapiunit == 'e') {$wuskyheatindex9 = ($wuskyheatindex9 - 32) / 1.8;}

    //heatindex
    if ($tempunit == 'F' && $wuapiunit == 'm') {$wuskyheatindex10 = ($wuskyheatindex10 * 9 / 5) + 32;}
    // metric to F UK
    if ($tempunit == 'F' && $wuapiunit == 'h') {$wuskyheatindex10 = ($wuskyheatindex10 * 9 / 5) + 32;}
    // ms non metric Scandinavia
    if ($tempunit == 'F' && $wuapiunit == 's') {$wuskyheatindex10 = ($wuskyheatindex10 * 9 / 5) + 32;}
    // non metric to c US
    if ($tempunit == 'C' && $wuapiunit == 'e') {$wuskyheatindex10 = ($wuskyheatindex10 - 32) / 1.8;}

    //heatindex
    if ($tempunit == 'F' && $wuapiunit == 'm') {$wuskyheatindex11 = ($wuskyheatindex11 * 9 / 5) + 32;}
    // metric to F UK
    if ($tempunit == 'F' && $wuapiunit == 'h') {$wuskyheatindex11 = ($wuskyheatindex11 * 9 / 5) + 32;}
    // ms non metric Scandinavia
    if ($tempunit == 'F' && $wuapiunit == 's') {$wuskyheatindex11 = ($wuskyheatindex11 * 9 / 5) + 32;}
    // non metric to c US
    if ($tempunit == 'C' && $wuapiunit == 'e') {$wuskyheatindex11 = ($wuskyheatindex11 - 32) / 1.8;}

} //end weather34 weather underground summary forecast stuff
?>
<script src="js/jquery.js"></script>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weather34 Weather Underground Summary Forecast For <?php echo $stationName ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
@font-face{font-family:weathertext2;src:url(fonts/verbatim-regular.woff2) format("woff2"),url(fonts/verbatim-regular.woff) format("woff"),url(fonts/verbatim-regular.ttf) format("truetype")}
html,body{font-size:13px;font-family: "weathertext2", Helvetica, Arial, sans-serif;-webkit-font-smoothing: antialiased;	-moz-osx-font-smoothing: grayscale;}
.grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
  grid-gap: 3px;
  align-items: stretch;
  color:#f5f7fc
  }
.grid > article {
 border: 1px solid rgba(245, 247, 252,.02);
  box-shadow: 2px 2px 6px 0px  rgba(0,0,0,0.6);
  padding:15px;
  padding-top:5px;
  font-size:0.8em;
  -webkit-border-radius:3px;
  border-radius:3px;
  background:0;
  -webkit-font-smoothing: antialiased;	-moz-osx-font-smoothing: grayscale;
  height:75px;
  background:hsla(233, 12%, 13%,.5);
}
.grid > article img {
  max-width: 90%;
}
.grid > article rainsnow{
	vertical-align:bottom;float:right}

.grid > article actualt{vertical-align:top;-webkit-border-radius:2px;border-radius:2px;background:rgba(86, 95, 103,.2);font-family:Arial, Helvetica, sans-serif;padding:1px 3px 1px 3px;width:10rem;font-size:0.8rem;color:#c0c0c0;align-items:center;justify-content:left;margin-bottom:10px;top:-15px;display:flex}
.grid > article tempicon{vertical-align:top;float:right;font-size:0;margin-top:-25px;margin-right:20px}

.grid > article .summarytext{font-size:.9em;color:#aaa;margin-bottom:0px;height:50px;line-height:10px;font-family:Arial, Helvetica, sans-serif}

.grid > article .alertdesc{position:relative;color:#f8f8f8;bottom:-15px;right:15px;font-size:0.75rem;}

  a{color:#aaa;text-decoration:none}
.weather34darkbrowser{position:relative;background:0;width:96%;height:30px;margin:auto;margin-top:-5px;margin-left:0px;border-top-left-radius:5px;border-top-right-radius:5px;padding-top:10px;}
.weather34darkbrowser[url]:after{content:attr(url);color:#aaa;font-size:10px;position:absolute;left:0;right:0;top:0;padding:4px 15px;margin:11px 10px 0 auto;border-radius:3px;background:rgba(97, 106, 114, 0.3);height:20px;box-sizing:border-box}
 blue{color:#01a4b4}orange{color:#ff832f}green{color:#84a927}red{color:#f37867}red6{color:#d65b4a}value{color:#fff}yellow{color:#e7963b}purple{color:#916392}
smalluvunit{font-size:.6rem;font-family:Arial,Helvetica,system;}
.hitempy{position:relative;background:rgba(61, 64, 66, 0.5);color:#fff;font-size:12px;width:110px;padding:1px;-webit-border-radius:2px;border-radius:2px;margin-top:-44px;margin-left:72px;padding:2px;line-height:10px;font-size:9px}.svgimage{background:rgba(0, 155, 171, 1.000);-webit-border-radius:2px;border-radius:2px;}
orange1{color:#aaa;}
.greydesc{color:#c5c5c5;margin-left:40px;margin-top:-20px;position:absolute;font-size:0.85em}
.summarydesc{position:relative;color:#f8f8f8;margin-left:5px;margin-top:-5px;font-size:0.72rem;width:100%;height:38px;max-height:38px}
.none{float:none;margin-top:10px;position:absolute}
spantemp{font-size:0.75em;color:#fff;font-family:weathertext2;}.tempicon{position:relative;font-family:weathertext2;margin-top:4px;margin-left:125px}.uvforecast{font-size:0.8rem;color:#c0c0c0;font-family:Arial,Helvetica;line-height:auto;margin-top:-15px;margin-bottom:5px}.storm{font-size:0.8rem;color:#c0c0c0;font-family:Arial,Helvetica;line-height:auto;margin-top:5px;margin-bottom:2px}
.iconpos{margin-left:60%;margin-top:-12px;}
bluer{color:#fff;border-radius:2px;padding:0 2px 0 2px;align-items:center;justify-content:center;background:rgba(0, 155, 180, .6)}
bluet,blueu{background:#01a4b5}yellowt,yellowu{background:#e6a141}oranget,orangeu{background:#d05f2d}greent{background:#90b12a}greenu{background:#565f67}redt,redu{background:#cd5245}purplet,purpleu{background:rgba(151, 88, 190,.8)}bluet,yellowt,oranget,greent,redt,purplet{-webkit-border-radius:2px;border-radius:2px;padding:2px;height:.9rem}
blueu,yellowu,orangeu,greenu,redu,purpleu{color:#fff;border-radius:2px;padding:0 3px 0 3px;align-items:center;justify-content:center;}
summary{font-size:.85em;color:#aaa;display:none}blue1{color:#009bb4}value{font-size:.95em;color:#aaa}valuer{color:#aaa;font-size:.9em;}
thunder{font-size:.9em;color:#aaa}wind{color:#bbb;font-size:.9em}canvas,img,iframe,svg{image-rendering:auto;}
.mbsmartlogo{position:relative;float:right;top:12px;}
</style>
<?php $forecastime = filemtime ('jsondata/wuforecast.txt');?>
<div class="weather34darkbrowser" url="Weather Underground Forecast For <?php echo $stationName ?>
<?php echo '&nbsp;';
echo "Forecast updated &nbsp;".date( $timeformat, $forecastime);?>
  ">
</div>  
<main class="grid">
  <article>
   <actualt><?php echo $wuskydayTime ?></actualt>
 <?php //0  forecast
//summary
echo '<div class=greydesc>' . $wuskydesc . '</div>';
echo "<div class=iconpos> ";
if ($wuskydaynight == 'D') {echo '<img src="wuicons/' . $wuskydayIcon . '.svg" width="30" class="iconpos"></img></div>';}
if ($wuskydaynight == 'N') {echo '<img src="wuicons/nt_' . $wuskydayIcon . '.svg" width="30" class="iconpos"></img></div>';}
echo '<div class=summarydesc>' . $wusummary . '</div>';
//thunder
echo '<div class=alertdesc>';

if ($tempunit == 'F' && $wuskydaynight == "D" && $wuskyheatindex > 80.6) {
    echo '<rainsnow>' . $lightningalert4 . ' <thunder>Heat Index <orange1>' . $wuskyheatindex . '</orange1>°<spantemp>' . $tempunit . '</spantemp></thunder></grey></value></div>';} else if ($tempunit == 'C' && $wuskydaynight == "D" && $wuskyheatindex > 29) {
    echo '<rainsnow>' . $lightningalert4 . ' <thunder>Heat Index <orange1>' . $wuskyheatindex . '</orange1>°<spantemp>' . $tempunit . '</spantemp></thunder></grey></value></div>';} else {
    echo "";
}
?>
</article>
 <article>
  <actualt><?php echo $wuskydayTime1 ?></actualt>
  <?php //1  forecast
//summary
echo '<div class=greydesc>' . $wuskydesc1 . '</div>';
echo "<div class=iconpos> ";
if ($wuskydaynight1 == 'D') {echo '<img src="wuicons/' . $wuskydayIcon1 . '.svg" width="30" class="iconpos"></img></div>';}
if ($wuskydaynight1 == 'N') {echo '<img src="wuicons/nt_' . $wuskydayIcon1 . '.svg" width="30" class="iconpos"></img></div>';}
echo '<div class=summarydesc>' . $wusummary1 . '</div>';
//thunder
echo '<div class=alertdesc>';

if ($tempunit == 'F' && $wuskydaynight1 == "D" && $wuskyheatindex1 > 80.6) {
    echo '<rainsnow>' . $lightningalert4 . ' <thunder>Heat Index <orange1>' . $wuskyheatindex1 . '</orange1>°<spantemp>' . $tempunit . '</spantemp></thunder></grey></value></div>';} else if ($tempunit == 'C' && $wuskydaynight1 == "D" && $wuskyheatindex1 > 29) {
    echo '<rainsnow>' . $lightningalert4 . ' <thunder>Heat Index <orange1>' . $wuskyheatindex1 . '</orange1>°<spantemp>' . $tempunit . '</spantemp></thunder></grey></value></div>';} else {
    echo "";
}
?>
</article>

   <article>
    <actualt><?php echo $wuskydayTime2 ?></actualt>
    <?php //2  forecast
//summary
echo '<div class=greydesc>' . $wuskydesc2 . '</div>';
echo "<div class=iconpos> ";
if ($wuskydaynight2 == 'D') {echo '<img src="wuicons/' . $wuskydayIcon2 . '.svg" width="30" class="iconpos"></img></div>';}
if ($wuskydaynight2 == 'N') {echo '<img src="wuicons/nt_' . $wuskydayIcon2 . '.svg" width="30" class="iconpos"></img></div>';}
echo '<div class=summarydesc>' . $wusummary2 . '</div>';
//thunder
echo '<div class=alertdesc>';
if ($tempunit == 'F' && $wuskydaynight2 == "D" && $wuskyheatindex2 > 80.6) {
    echo '<rainsnow>' . $lightningalert4 . ' <thunder>Heat Index <orange1>' . $wuskyheatindex2 . '</orange1>°<spantemp>' . $tempunit . '</spantemp></thunder></grey></value></div>';} else if ($tempunit == 'C' && $wuskydaynight2 == "D" && $wuskyheatindex2 > 29) {
    echo '<rainsnow>' . $lightningalert4 . ' <thunder>Heat Index <orange1>' . $wuskyheatindex2 . '</orange1>°<spantemp>' . $tempunit . '</spantemp></thunder></grey></value></div>';} else {
    echo "";
}
?>

</article>
 <article>
 <actualt><?php echo $wuskydayTime3 ?></actualt>
   <?php //3  forecast
//summary
echo '<div class=greydesc>' . $wuskydesc3 . '</div>';
echo "<div class=iconpos> ";
if ($wuskydaynight3 == 'D') {echo '<img src="wuicons/' . $wuskydayIcon3 . '.svg" width="30" class="iconpos"></img></div>';}
if ($wuskydaynight3 == 'N') {echo '<img src="wuicons/nt_' . $wuskydayIcon3 . '.svg" width="30" class="iconpos"></img></div>';}
echo '<div class=summarydesc>' . $wusummary3 . '</div>';
//thunder
echo '<div class=alertdesc>';
if ($tempunit == 'F' && $wuskydaynight3 == "D" && $wuskyheatindex3 > 80.6) {
    echo '<rainsnow>' . $lightningalert4 . ' <thunder>Heat Index <orange1>' . $wuskyheatindex3 . '</orange1>°<spantemp>' . $tempunit . '</spantemp></thunder></grey></value></div>';} else if ($tempunit == 'C' && $wuskydaynight3 == "D" && $wuskyheatindex3 > 29) {
    echo '<rainsnow>' . $lightningalert4 . ' <thunder>Heat Index <orange1>' . $wuskyheatindex3 . '</orange1>°<spantemp>' . $tempunit . '</spantemp></thunder></grey></value></div>';} else {
    echo "";
}
?>

</article>

 <article>
     <actualt><?php echo $wuskydayTime4 ?></actualt>
    <?php //4  forecast
//summary
echo '<div class=greydesc>' . $wuskydesc4 . '</div>';
echo "<div class=iconpos> ";
if ($wuskydaynight4 == 'D') {echo '<img src="wuicons/' . $wuskydayIcon4 . '.svg" width="30" class="iconpos"></img></div>';}
if ($wuskydaynight4 == 'N') {echo '<img src="wuicons/nt_' . $wuskydayIcon4 . '.svg" width="30" class="iconpos"></img></div>';}
echo '<div class=summarydesc>' . $wusummary4 . '</div>';
//thunder
echo '<div class=alertdesc>';
if ($tempunit == 'F' && $wuskydaynight4 == "D" && $wuskyheatindex4 > 80.6) {
    echo '<rainsnow>' . $lightningalert4 . ' <thunder>Heat Index <orange1>' . $wuskyheatindex4 . '</orange1>°<spantemp>' . $tempunit . '</spantemp></thunder></grey></value></div>';} else if ($tempunit == 'C' && $wuskydaynight4 == "D" && $wuskyheatindex4 > 29) {
    echo '<rainsnow>' . $lightningalert4 . ' <thunder>Heat Index <orange1>' . $wuskyheatindex4 . '</orange1>°<spantemp>' . $tempunit . '</spantemp></thunder></grey></value></div>';} else {
    echo "";
}
?>
</article>

<article>
     <actualt><?php echo $wuskydayTime5 ?></actualt>
     <?php //5  forecast
//summary
echo '<div class=greydesc>' . $wuskydesc5 . '</div>';
echo "<div class=iconpos> ";
if ($wuskydaynight5 == 'D') {echo '<img src="wuicons/' . $wuskydayIcon5 . '.svg" width="30" class="iconpos"></img></div>';}
if ($wuskydaynight5 == 'N') {echo '<img src="wuicons/nt_' . $wuskydayIcon5 . '.svg" width="30" class="iconpos"></img></div>';}
echo '<div class=summarydesc>' . $wusummary5 . '</div>';
//thunder
echo '<div class=alertdesc>';
if ($tempunit == 'F' && $wuskydaynight5 == "D" && $wuskyheatindex5 > 80.6) {
    echo '<rainsnow>' . $lightningalert4 . ' <thunder>Heat Index <orange1>' . $wuskyheatindex5 . '</orange1>°<spantemp>' . $tempunit . '</spantemp></thunder></grey></value></div>';} else if ($tempunit == 'C' && $wuskydaynight5 == "D" && $wuskyheatindex5 > 29) {
    echo '<rainsnow>' . $lightningalert4 . ' <thunder>Heat Index <orange1>' . $wuskyheatindex5 . '</orange1>°<spantemp>' . $tempunit . '</spantemp></thunder></grey></value></div>';} else {
    echo "";
}
?>
</article>

  <article>
     <actualt><?php echo $wuskydayTime6 ?></actualt>
     <?php //6  forecast
//summary
echo '<div class=greydesc>' . $wuskydesc6 . '</div>';
echo "<div class=iconpos> ";
if ($wuskydaynight6 == 'D') {echo '<img src="wuicons/' . $wuskydayIcon6 . '.svg" width="30" class="iconpos"></img></div>';}
if ($wuskydaynight6 == 'N') {echo '<img src="wuicons/nt_' . $wuskydayIcon6 . '.svg" width="30" class="iconpos"></img></div>';}
echo '<div class=summarydesc>' . $wusummary6 . '</div>';
//thunder
echo '<div class=alertdesc>';
if ($tempunit == 'F' && $wuskydaynight6 == "D" && $wuskyheatindex6 > 80.6) {
    echo '<rainsnow>' . $lightningalert4 . ' <thunder>Heat Index <orange1>' . $wuskyheatindex6 . '</orange1>°<spantemp>' . $tempunit . '</spantemp></thunder></grey></value></div>';} else if ($tempunit == 'C' && $wuskydaynight6 == "D" && $wuskyheatindex6 > 29) {
    echo '<rainsnow>' . $lightningalert4 . ' <thunder>Heat Index <orange1>' . $wuskyheatindex6 . '</orange1>°<spantemp>' . $tempunit . '</spantemp></thunder></grey></value></div>';} else {
    echo "";
}
?>
  </article>

  <article>
    <actualt><?php echo $wuskydayTime7 ?></actualt>
     <?php //7  forecast
//summary
echo '<div class=greydesc>' . $wuskydesc7 . '</div>';
echo "<div class=iconpos> ";
if ($wuskydaynight7 == 'D') {echo '<img src="wuicons/' . $wuskydayIcon7 . '.svg" width="30" class="iconpos"></img></div>';}
if ($wuskydaynight7 == 'N') {echo '<img src="wuicons/nt_' . $wuskydayIcon7 . '.svg" width="30" class="iconpos"></img></div>';}
echo '<div class=summarydesc>' . $wusummary7 . '</div>';
//thunder
echo '<div class=alertdesc>';
if ($tempunit == 'F' && $wuskydaynight7 == "D" && $wuskyheatindex7 > 80.6) {
    echo '<rainsnow>' . $lightningalert4 . ' <thunder>Heat Index <orange1>' . $wuskyheatindex7 . '</orange1>°<spantemp>' . $tempunit . '</spantemp></thunder></grey></value></div>';} else if ($tempunit == 'C' && $wuskydaynight7 == "D" && $wuskyheatindex7 > 29) {
    echo '<rainsnow>' . $lightningalert4 . ' <thunder>Heat Index <orange1>' . $wuskyheatindex7 . '</orange1>°<spantemp>' . $tempunit . '</spantemp></thunder></grey></value></div>';} else {
    echo "";
}
?>
  </article>



  <article>
    <actualt><?php echo $wuskydayTime8 ?></actualt>
     <?php //8  forecast
//summary
echo '<div class=greydesc>' . $wuskydesc8 . '</div>';
echo "<div class=iconpos> ";
if ($wuskydaynight8 == 'D') {echo '<img src="wuicons/' . $wuskydayIcon8 . '.svg" width="30" class="iconpos"></img></div>';}
if ($wuskydaynight8 == 'N') {echo '<img src="wuicons/nt_' . $wuskydayIcon8 . '.svg" width="30" class="iconpos"></img></div>';}
echo '<div class=summarydesc>' . $wusummary8 . '</div>';
//thunder
echo '<div class=alertdesc>';
if ($tempunit == 'F' && $wuskydaynight8 == "D" && $wuskyheatindex8 > 80.6) {
    echo '<rainsnow>' . $lightningalert4 . ' <thunder>Heat Index <orange1>' . $wuskyheatindex8 . '</orange1>°<spantemp>' . $tempunit . '</spantemp></thunder></grey></value></div>';} else if ($tempunit == 'C' && $wuskydaynight8 == "D" && $wuskyheatindex8 > 29) {
    echo '<rainsnow>' . $lightningalert4 . ' <thunder>Heat Index <orange1>' . $wuskyheatindex8 . '</orange1>°<spantemp>' . $tempunit . '</spantemp></thunder></grey></value></div>';} else {
    echo "";
}
?>


  </article>


  <article>
    <actualt><?php echo $wuskydayTime9 ?></actualt>
     <?php //9  forecast
//summary
echo '<div class=greydesc>' . $wuskydesc9 . '</div>';
echo "<div class=iconpos> ";
if ($wuskydaynight9 == 'D') {echo '<img src="wuicons/' . $wuskydayIcon9 . '.svg" width="30" class="iconpos"></img></div>';}
if ($wuskydaynight9 == 'N') {echo '<img src="wuicons/nt_' . $wuskydayIcon9 . '.svg" width="30" class="iconpos"></img></div>';}
echo '<div class=summarydesc>' . $wusummary9 . '</div>';
//thunder
echo '<div class=alertdesc>';
if ($tempunit == 'F' && $wuskydaynight9 == "D" && $wuskyheatindex9 > 80.6) {
    echo '<rainsnow>' . $lightningalert4 . ' <thunder>Heat Index <orange1>' . $wuskyheatindex9 . '</orange1>°<spantemp>' . $tempunit . '</spantemp></thunder></grey></value></div>';} else if ($tempunit == 'C' && $wuskydaynight9 == "D" && $wuskyheatindex9 > 29) {
    echo '<rainsnow>' . $lightningalert4 . ' <thunder>Heat Index <orange1>' . $wuskyheatindex9 . '</orange1>°<spantemp>' . $tempunit . '</spantemp></thunder></grey></value></div>';} else {
    echo "";
}
?>
  </article>
  <article>
  <actualt><?php echo $wuskydayTime10 ?></actualt>
     <?php //10  forecast
//summary
echo '<div class=greydesc>' . $wuskydesc10 . '</div>';
echo "<div class=iconpos> ";
if ($wuskydaynight10 == 'D') {echo '<img src="wuicons/' . $wuskydayIcon10 . '.svg" width="30" class="iconpos"></img></div>';}
if ($wuskydaynight10 == 'N') {echo '<img src="wuicons/nt_' . $wuskydayIcon10 . '.svg" width="30" class="iconpos"></img></div>';}
echo '<div class=summarydesc>' . $wusummary10 . '</div>';
//thunder
echo '<div class=alertdesc>';
if ($tempunit == 'F' && $wuskydaynight10 == "D" && $wuskyheatindex10 > 80.6) {
    echo '<rainsnow>' . $lightningalert4 . ' <thunder>Heat Index <orange1>' . $wuskyheatindex10 . '</orange1>°<spantemp>' . $tempunit . '</spantemp></thunder></grey></value></div>';} else if ($tempunit == 'C' && $wuskydaynight10 == "D" && $wuskyheatindex10 > 29) {
    echo '<rainsnow>' . $lightningalert4 . ' <thunder>Heat Index <orange1>' . $wuskyheatindex10 . '</orange1>°<spantemp>' . $tempunit . '</spantemp></thunder></grey></value></div>';} else {
    echo "";
}
?>
  </article>




  <!-- copyright needs to be kept please be ethical--->
  <article>
    <span style="font-size:8px;">
  <?php echo $info ?> SVG/PHP scripts were developed by <a href="https://weather34.com" title="weather34.com" target="_blank" style="font-size:8px;">weather34.com</a>  for use in the weather34 template &copy; 2015-<?php echo date('Y'); ?></span> <br>
  <span style="font-size:8px;">
  <?php echo $info ?> Data Forecast provided by <a href="https://www.wunderground.com/weather/api/" title="Weather Underground API" target="_blank">Weather Underground</a></span>
  <a href="https://weather34.com/homeweatherstation/" title="weather34.com" target="_blank">
  <img src="favicon/weather34-logo.svg" width="25px" class="weather34-image" alt="weather34 template page" title="weather34 template page" style="float:right;padding-top:20px"></a>
   </article>
</main>