<?php

require_once "functions.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Green Egg Temperature Controller</title>
    <script src="js/jquery-3.5.0.min.js"></script>
    <script>

        var domeTempLow = "<?php print $TempLow?>";
        var domeTempHigh = "<?php print $TempHigh?>";

        // Load the document
        $(document).ready(
            // Let's get the temperature from the probe and refresh the data every 10 seconds
            function update(domeTemp) {
                $.ajax({
                    type: 'GET',
                    url: 'get_temperature.php',
                    timeout: 2000,
                    success: function(data) {
                        $("#dometemp_val").html(data);
                        window.setTimeout(update, 5000);
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        $("#dometemp_err").html('Probleem met uitlezen temperatuur sensor..');
                        window.setTimeout(update, 10000);
                    }
                });

                console.log(domeTemp);
                if (domeTemp < domeTempLow)
                    $("#dometemp").addClass("dometemp_low");
                if (domeTemp > domeTempHigh)
                    $("#dometemp").addClass("dometemp_high");
                $("#nestvideo1").hide();
                $("#nestvideo2").hide();
                $("#save_btn_low").hide();
                $("#save_btn_high").hide();

                // Load the temperature values
                $("#dometemp_val").html(domeTemp);
                $("#dometemp_low_val").html(domeTempLow);
                $("#dometemp_high_val").html(domeTempHigh);
                // Click events for the temperature buttons
                $("#temp_increase_low").click(
                    function () {
                        // Show the save button
                        $("#save_btn_low").show();
                        // increase the temperature
                        var count_obj = $("#dometemp_low_val");
                        var count = parseInt(count_obj.html());
                        count = count + 5;
                        count_obj.html(count);
                        domeTempLow = count;
                    });

                $("#save_tmp_low").click(
                    function () {
                        // Show some elements when the temp is too hot or too cold.
                        // var data = {
                        //     "Name": "Wim",
                        //     "Value": "Yo"
                        // }
                        //
                        // // step 2: convert data structure to JSON
                        // $.ajax({
                        //     type : "POST",
                        //     url : "save_json.php",
                        //     data : {
                        //         json : JSON.stringify(data)
                        //     }
                        // });
                        // $.post("save_json.php", {json : JSON.stringify(data)});
                    });

                $("#save_tmp_high").click(
                    function () {
                        // Show some elements when the temp is too hot or too cold.
                        // var data = {
                        //     "Name": "Frans",
                        //     "Value": "Yodelahitie"
                        // }
                        //
                        // // step 2: convert data structure to JSON
                        // $.ajax({
                        //     type : "POST",
                        //     url : "save_json.php",
                        //     data : {
                        //         json : JSON.stringify(data)
                        //     }
                        // });
                        // $.post("save_json.php", {json : JSON.stringify(data)});
                    });

                $("#temp_decrease_low").click(
                    function () {
                        // Show the save button
                        $("#save_btn_low").show();
                        // decrease the temperature
                        var count_obj = $("#dometemp_low_val");
                        var count = parseInt(count_obj.html());
                        count = count - 5;
                        count_obj.html(count);
                        domeTempLow = count;
                    });

                $("#temp_increase_high").click(
                    function () {
                        // Show the save button
                        $("#save_btn_high").show();
                        // increase the temperature
                        var count_obj = $("#dometemp_high_val");
                        var count = parseInt(count_obj.html());
                        count = count + 5;
                        count_obj.html(count);
                        domeTempHigh = count;
                    });

                $("#temp_decrease_high").click(
                    function () {
                        // Show the save button
                        $("#save_btn_high").show();
                        // decrease the temperature
                        var count_obj = $("#dometemp_high_val");
                        var count = parseInt(count_obj.html());
                        count = count - 5;
                        count_obj.html(count);
                        domeTempHigh = count;
                    });
                $("#slide_open").click(
                    function () {
                        $.get("stepper.php?slide_open");
                    });
                $("#slide_close").click(
                    function () {
                        $.get("stepper.php?slide_open");
                    });
            });
    </script>
</head>
<body>
<div id="main_div">
    <div id="navbar">
        <div id="login">Login</div>
    </div>
    <div id="temp_val"></div>
    <div class="header" id="top_container">Huidige temperatuur</div>
    <div id="dometemp" class="containter container_style">
        <div id="dometemp_val"></div>
    </div>
    <div class="header">Luchttoevoer onder</div>
    <div class="containter container_style">
        <button type="button" id="slide_close" class="btn btn-primary btn_slide">Dicht</button>
        <button type="button" id="slide_open" class="btn btn-primary btn_slide">Open</button>
    </div>
    <div class="header">Minimum temperatuur</div>
    <div id="dometemp_low" class="containter container_style">
        <button type="button" id="temp_decrease_low" class="btn btn-primary btn_tmp">-</button>
        <div id="dometemp_low_val"></div>
        <button type="button" id="temp_increase_low" class="btn btn-primary btn_tmp">+</button>
        <div id="save_btn_low">
            <button type="button" id="save_tmp_low" class="btn btn-success">Opslaan</button>
        </div>
    </div>
    <div class="header">Maximum temperatuur</div>
    <div id="dometemp_high" class="containter container_style">
        <button type="button" id="temp_decrease_high" class="btn btn-primary btn_tmp">-</button>
        <div id="dometemp_high_val"></div>
        <button type="button" id="temp_increase_high" class="btn btn-primary btn_tmp">+</button>
        <div id="save_btn_high">
            <button type="button" id="save_tmp_high" class="btn btn-success">Opslaan</button>
        </div>
    </div>
    <div id="password_panel" style="display: none">
        <div id="password_panel_content">

        </div>
    </div>
    <!--    <div id="nestvideo1" class="header">Live video stream</div>-->
    <!--    <div id="nestvideo2" class="container container_style">-->
    <!--    <iframe type="text/html" style="background-color: white; padding-top: 30px;" frameborder="0" width="480" height="300" src="//video.nest.com/embedded/live/KpSA9Hnhdl?autoplay=1" allowfullscreen></iframe>-->
</div>

</body>
</html>