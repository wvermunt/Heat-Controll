<?php

$dometemp = 100;
$dometemp_high = 150;
$dometemp_low = 90;

$url = 'settings.json'; // We're going to keep our settings here
$data = file_get_contents($url); // put the contents of the file into a variable
$temperatures = json_decode($data); // decode the JSON feed

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="icon" type="image/png" sizes="192x192" href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/manifest.json">
    <title>Green Egg Temperature Controller</title>
    <script src="js/jquery-3.5.0.min.js"></script>
    <script>
        // get the variables from PHP first
        //domeTemp = "<?php //echo $dometemp; ?>//";
        //domeTempLow = "<?php //echo $dometemp_low; ?>//";
        //domeTempHigh = "<?php //echo $dometemp_high; ?>//";

        // get the variables from PHP first
        domeTemp = 100;
        domeTempLow = 95;
        domeTempHigh = 115;

        // Load the document
        $(document).ready(
            function() {
                $.getJSON('settings.json', function(data) {
                    // begin accessing JSON data here
                    // console.log(data[0].Name);
                    // console.log(data[0].Value);
                });

                if (domeTemp < domeTempLow)
                    $("#dometemp").addClass("dometemp_low");
                if (domeTemp > domeTempHigh)
                    $("#dometemp").addClass("dometemp_high");
                $("#nestvideo1").hide();
                $("#nestvideo2").hide();

                // Load the temperature values
                $("#dometemp_val").html(domeTemp);
                $("#dometemp_low_val").html(domeTempLow);
                $("#dometemp_high_val").html(domeTempHigh);
                // Click events for the temperature buttons
                $("#temp_increase_low").click(
                    function () {
                        // increase the temperature
                        var count_obj = $("#dometemp_low_val");
                        var count = parseInt(count_obj.html());
                        count = count + 5;
                        count_obj.html(count);
                        domeTempLow = count;
                    });

                $("#temp_decrease_low").click(
                    function () {
                        // decrease the temperature
                        var count_obj = $("#dometemp_low_val");
                        var count = parseInt(count_obj.html());
                        count = count - 5;
                        count_obj.html(count);
                        domeTempLow = count;
                    });

                $("#temp_increase_high").click(
                    function () {
                        // increase the temperature
                        var count_obj = $("#dometemp_high_val");
                        var count = parseInt(count_obj.html());
                        count = count + 5;
                        count_obj.html(count);
                        domeTempHigh = count;
                    });

                $("#temp_decrease_high").click(
                    function () {
                        // decrease the temperature
                        var count_obj = $("#dometemp_high_val");
                        var count = parseInt(count_obj.html());
                        count = count - 5;
                        count_obj.html(count);
                        domeTempHigh = count;
                    });
            });
    </script>
</head>
<body>
<div id="main_div">
    <!-- <div id="logo" class="container"></div> -->
    <div class="header">Huidige temperatuur</div>
    <div id="dometemp" class="containter container_style">
        <div id="dometemp_val">10</div>
    </div>
    <div class="header">Minimum temperatuur</div>
    <div id="dometemp_low" class="containter container_style">
        <button type="button" id="temp_decrease_low" class="btn btn-primary">-</button>
        <div id="dometemp_low_val">10</div>
        <button type="button" id="temp_increase_low" class="btn btn-primary">+</button>
    </div>
    <div class="header">Maximum temperatuur</div>
    <div id="dometemp_high" class="containter container_style">
        <button type="button" id="temp_decrease_high" class="btn btn-primary">-</button>
        <div id="dometemp_high_val">10</div>
        <button type="button" id="temp_increase_high" class="btn btn-primary">+</button>
    </div>
<!--    <div id="nestvideo1" class="header">Live video stream</div>-->
<!--    <div id="nestvideo2" class="container container_style">-->
<!--    <iframe type="text/html" style="background-color: white; padding-top: 30px;" frameborder="0" width="480" height="300" src="//video.nest.com/embedded/live/KpSA9Hnhdl?autoplay=1" allowfullscreen></iframe>-->
</div>

</body>
</html>