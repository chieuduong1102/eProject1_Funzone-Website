<?php
    require_once('lib/functions.php');
    require_once('lib/db_home.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="img/faviconF.ico"/>
    <title>Map</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Muli:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Muli:wght@300;700&display=swap" rel="stylesheet">
</head>
<body onload = "time()">
    <?php include('lib/navbar.php'); ?>
    <hr>
    <!-- breadcrumb -->
    <h1 class="h1-exp">MAP</h1>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Map</li>
            </ol>
        </nav>
    </div>
    <hr class="hr-h1">
    <div class="container body-page">
        <br>
        <!-- MAP -->
        <div class="container">
            <div class="row justify-content-center">
                <!--The div element for the map -->
                <div class="mapouter">
                    <div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas"
                            src="https://maps.google.com/maps?ll=21.037811,105.809581&q=285 Đội Cấn&t=&z=14&ie=UTF8&iwloc=&output=embed"
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div>
                </div>

            </div>
        </div>
        <hr>
        <div class="container">
            <h3>FUNZONE</h3>
            <h4>THE MOST ENTERTAINING THEME PARK</h4>
            <i class="fas fa-map-marker-alt"></i> Location
            <p> 285 Doi Can Street, Ba Dinh District, Hanoi</p>
        </div>
        <br>
    </div>
    <hr>
    <?php include('lib/footer.php'); ?>
    <script src="js.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/ulg/popper.min.js"> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>