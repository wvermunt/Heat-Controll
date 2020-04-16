<?php

$url = 'settings.json'; // path to your JSON file
$data = file_get_contents($url); // put the contents of the file into a variable
$temperatures = json_decode($data); // decode the JSON feed

$dometemp_low = $temperatures[0]->Value;
$dometemp_high = $temperatures[1]->Value;

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
        // get the variables from PHP first
        domeTempLow = "<?php echo $dometemp_low; ?>";
        domeTempHigh = "<?php echo $dometemp_high; ?>";

        domeTemp = 102.3;

        // Load the document
        $(document).ready(
            function () {
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

                function update() {
                    $.get("response.php", function(data) {
                        $("#dometemp_val").html(data);
                        window.setTimeout(update, 5000);
                    });
                }

                update();
            });
    </script>
</head>
<body>
<div id="main_div">
    <!-- <div id="logo" class="container"></div> -->
    <div class="header">Huidige temperatuur</div>
    <div id="dometemp" class="containter container_style ">
        <div id="dometemp_val"></div>
    </div>
    <div class="header">Minimum temperatuur</div>
    <div id="dometemp_low" class="containter container_style">
        <button type="button" id="temp_decrease_low" class="btn btn-primary btn_tmp">-</button>
        <div id="dometemp_low_val">10</div>
        <button type="button" id="temp_increase_low" class="btn btn-primary btn_tmp">+</button>
        <div id="save_btn_low">
            <button type="button" id="save_tmp_low" class="btn btn-success">Opslaan</button>
        </div>
    </div>
    <div class="header">Maximum temperatuur</div>
    <div id="dometemp_high" class="containter container_style">
        <button type="button" id="temp_decrease_high" class="btn btn-primary btn_tmp">-</button>
        <div id="dometemp_high_val">10</div>
        <button type="button" id="temp_increase_high" class="btn btn-primary btn_tmp">+</button>
        <div id="save_btn_high">
            <button type="button" id="save_tmp_high" class="btn btn-success">Opslaan</button>
        </div>
    </div>
    <!--    <div id="nestvideo1" class="header">Live video stream</div>-->
    <!--    <div id="nestvideo2" class="container container_style">-->
    <!--    <iframe type="text/html" style="background-color: white; padding-top: 30px;" frameborder="0" width="480" height="300" src="//video.nest.com/embedded/live/KpSA9Hnhdl?autoplay=1" allowfullscreen></iframe>-->
</div>

</body>
</html>