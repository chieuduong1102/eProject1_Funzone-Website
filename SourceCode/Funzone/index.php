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
    <title>FUNZONE</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Muli:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Muli:wght@300;700&display=swap" rel="stylesheet">
</head>
<body onload="time()">
    <?php include('lib/navbar.php'); ?>
    <!-- marquee -->
    <!-- <hr class="hr-marquee">
    <div class="container-fluid">
        <marquee behavior="scroll" direction="left" scrollamount="15">
            <img src="img/star-marquee.gif" alt="">
            <p style="display: inherit;" class="marquee-text">Welcome to FUNZONE </p>
            <img src="img/star-marquee.gif"alt="">
            
        </marquee>
    </div>
    <hr class="hr-marquee"> -->
    <!-- slide -->

    <div class="container-fluid">
        <div id="slides-img-top" class="carousel slide scroll" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#slides-img-top" data-slide-to="0" class="active"></li>
                <li data-target="#slides-img-top" data-slide-to="1"></li>
                <li data-target="#slides-img-top" data-slide-to="2"></li>
                <li data-target="#slides-img-top" data-slide-to="3"></li>
                <li data-target="#slides-img-top" data-slide-to="4"></li>
            </ul>
            <div class="carousel-inner slide-img">
                <div class="carousel-item active">
                    <img src="img/beach5.jpg" style="width:100%;">
                </div>
                <div class="carousel-item">
                    <img src="img/summersale.jpg" style="width:100%;">
                </div>
                <div class="carousel-item">
                    <img src="img/funzone2.png" style="width:100%">
                </div>
                <div class="carousel-item">
                    <img src="img/nhahang.jpg" style="width:100%">
                </div>
                <div class="carousel-item">
                    <img src="img/hotel.jpg" style="width:100%">
                </div>
            </div>
        </div>
    </div>
    <hr>
    <!-- body-page -->
    <div class="container body-page">
    <br>
    <div class="container">
        <h1 class="h1-fz">FUNZONE</h1>
        <br>
        <h3 id="h3-fz">THE MOST ENTERTAINING THEME PARK</h3>
        <div id="location">
            <a href="map.php"> <i class="fas fa-map-marker-alt"></i> Location</a>
            <p> 285 Doi Can Street, Ba Dinh District, Hanoi</p>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-6"><img src="img/funzone1.jpg" alt="" class="img-fluid img-home"></div>
            <div class="col-md-6">Spanning 214ha in total, FUNZONE is world-class amusement and recreational complex
                that consists of two main areas: Resort and Services, which are connected together with a unique cabe
                car system.
                <br>
                <a href="aboutus.php">SEE MORE</a>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <h1 class="h1-fz">EVENTS</h1>
        <br>
        <div class="row">
            <div class="col-md-4 event-home">
                <div class="img-content-event"><img src="img/tamdunghoatdong.png" class="img-fluid img-home" alt="">
                    <div class="content-event">
                        <a href="events.php">FUNZONE SUSPENDED ITS OPERATION FROM MARCH 31, 2020</a>
                        <p>NOTICE: Due to the impact of the Covid 19 epidemic, implementing the policy of restricting crowds of people in public places, FUNZONE suspended its operation from March 31, 2020. We will be back as soon as possible!</p>
                    </div>
                    <a href="events.php"><div class="arrow-right "><i class="fas fa-angle-right"></i></div></a>
                </div>
            </div>
            <div class="col-md-4 event-home">
                <div class="img-content-event"><img src="img/tet.jpg" class="img-fluid img-home" alt="">
                    <div class="content-event">
                        <a href="events.php">EXPERIENCE THE TRADITIONAL TET AT “THE YEAR OF RAT – HAPPY SPRING” FESTIVAL</a>
                        <p>Lunar New Year – Year of the Rat 2020 is about to come, let FUNZONE leave all the chaos to immerse in the exciting spring atmosphere of the exciting traditional New Year days with activities of national colors! ‼️ SCHEDULE OF ATTRACTIVE CELEBRATING ACTIVITIES OF THE YEAR OF THE RAT 🐭 🌸 Making Chung Cake …</p>
                    </div>
                    <a href="events.php"><div class="arrow-right "><i class="fas fa-angle-right"></i></div></a>
                </div>
            </div>
            <div class="col-md-4 event-home">
                <div class="img-content-event"><img src="img/noel.png" class="img-fluid img-home" alt="">
                    <div class="content-event">
                        <a href="events.php">MERRY CHRISTMAS</a>
                        <p>This Christmas year, FUNZONE has colourful decorative themes young and vibrant with very eye-catching foci. The most attractive thing that the dear customers could experience is the Christmas tree with lively colour bands from over 500,000 led bulbs and its height up to 18,88m, bringing unforgettable experiences to the visitors right after arriving at the FUNZONE park.</p>
                    </div>
                    <a href="events.php"><div class="arrow-right "><i class="fas fa-angle-right"></i></div></a>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <br>
    <div class="container">
        <h1 class="h1-fz">IMAGES</h1>
        <div class="row">
            <div class="col-md-3">
                <img src="img/action1.jpg" class="img-fluid img-home" alt=""> 
            </div>
            <div class="col-md-3">
                <img src="img/action2.jpg" class="img-fluid img-home" alt=""> 
            </div>
            <div class="col-md-3">
                <img src="img/action3.jpg" class="img-fluid img-home" alt=""> 
            </div>
            <div class="col-md-3">
                <img src="img/action5.jpg" class="img-fluid img-home" alt=""> 
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <img src="img/action9.jpg" class="img-fluid img-home" alt=""> 
            </div>

            <div class="col-md-6">
                <img src="img/action12.jpg" class="img-fluid img-home" alt=""> 
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <img src="img/action13.jpg" class="img-fluid img-home" alt=""> 
            </div>
            <div class="col-md-4">
                <img src="img/action11.jpg" class="img-fluid img-home" alt=""> 
            </div>
            <div class="col-md-4">
                <img src="img/action10.jpg" class="img-fluid img-home" alt=""> 
            </div>
        </div>
    </div>
    <hr>
    </div>

    <?php include('lib/footer.php'); ?>
    <script src="js.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/ulg/popper.min.js"> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>