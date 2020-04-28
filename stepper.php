<?php

if (isset($_REQUEST['slide_open'])) {
    $result = exec("python stepper.py");
}

if (isset($_REQUEST['slide_close'])) {
    $result = exec("python stepper.py");
}