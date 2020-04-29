<?php

require_once "functions.php";

if (IsWindows() == true){
    echo intval(112);
} else {
    $act_temp = shell_exec('python get_temperature.py');
    echo intval($act_temp);
}