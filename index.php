<?php
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/manifest.json">
    <title>Green Egg Temperature Controller</title>
    <script src="js/jquery-3.5.0.min.js"></script>
    <script>
        var dometemp = 100;
        var domelow = 95;
        var domehigh = 115;
        $(document).ready(
            function() {
                if (dometemp < domelow)
                    $("#dometemp").addClass("dometemp_low");
                if (dometemp > domehigh)
                    $("#dometemp").addClass("dometemp_high");
                // $("#nestvideo1").hide();
                // $("#nestvideo2").hide();
            });
    </script>
</head>
<body>
<div id="main_div">
    <!-- <div id="logo" class="container"></div> -->
    <div class="header">Huidige temperatuur</div>
    <div id="dometemp" class="containter container_style">102.8</div>
    <div class="header">Minimum temperatuur</div>
    <div id="dometemp_low" class="containter container_style">95</div>
    <div class="header">Maximum temperatuur</div>
    <div id="dometemp_high" class="containter container_style">115</div>
    <div id="nestvideo1" class="header">Live video stream</div>
    <div id="nestvideo2" class="container container_style">
    <iframe type="text/html" style="background-color: white; padding-top: 30px;" frameborder="0" width="480" height="300" src="//video.nest.com/embedded/live/KpSA9Hnhdl?autoplay=1" allowfullscreen></iframe>
    </div>

</body>
</html>