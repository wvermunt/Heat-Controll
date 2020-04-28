<?php

// Get the json data
$url = 'settings.json'; // path to your JSON file
$data = file_get_contents($url); // put the contents of the file into a variable
$settings = json_decode($data); // decode the JSON feed

$TempLow = $settings[0]->value;
$TempHigh = $settings[1]->value;

//$settings = GetSettings();
//
//function GetSettings() {
//    $res = json_decode("settings.json",false);
//    if (!isset($res->Settings))
//        return $res;
//    $v = $res;
//
//    $stnglist = array();
//    //Place all settings in a array
//    for($i = 0; $i < count($v); $i++)
//    {
//        $stnglist[$v[$i]->Name] = $v[$i]->Value;
//    }
//    return $stnglist;
//}

function IsWindows() {
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN')
        return true;
    else
        return false;
}

// Unused for now
function GetTemperature() {
    if (IsWindows() == true){
        echo 112.15;
    } else {
        $act_temp = shell_exec('python get_temperature.py');
        echo $act_temp;
    }
}