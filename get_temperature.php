<?php

require_once "functions.php";

if (IsWindows() == true){
    echo 112.15;
} else {
    $act_temp = shell_exec('python get_temperature.py');
    echo $act_temp;
}