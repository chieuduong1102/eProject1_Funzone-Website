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
    <title>About us</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Muli:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Muli:wght@300;700&display=swap" rel="stylesheet">
</head>
<body onload = "time()">
    <?php include('lib/navbar.php'); ?>
    <hr>
    <!-- Breadcrumb -->    
    <h1 class="h1-exp">
        <?php
            $aboutus = 'ort1_abu';
            $arr_about = get_service($aboutus);
            echo $arr_about ['name_service'];
        ?>
    </h1>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php">
                        <?php 
                            $home = 'ort1_hop'; 
                            $home_id = get_service($home);
                            echo $home_id['name_service'];
                        ?>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php
                        $aboutus = 'ort1_abu';
                        $arr_about = get_service($aboutus);
                        echo $arr_about ['name_service'];
                    ?>
                </li>
            </ol>
        </nav>
    </div>
    <hr class="hr-h1"> 
    <!-- body-page -->
    <div class="container body-page">
        <br>
        <div class="container">
            <h3>
                <?php
                    $aboutus = 'abu1_imgtongquat';
                    $arr_about = get_image($aboutus);
                    echo $arr_about ['title_image'];
                ?>
            </h3>
            <div class="row divAbout">
                <div class="col-md-12 " style="text-align: center;">
                    <?php
                        $aboutus = 'abu1_imgtongquat';
                        $arr_about = get_image($aboutus);
                        $url = $arr_about ['link_image'];
                        export_img('aboutus',$url);
                    ?>
                </div>
            </div>
        </div>
        <div class="container">
            <p class="text-about" style="text-align: justify;">&emsp;&emsp;
                <?php
                    $aboutus = 'abu1_imgtongquat';
                    $arr_about = get_image($aboutus);
                    echo $arr_about ['detail_image'];
                ?>
            </p>
            <br>
            <h4>
                <?php
                    $aboutus = 'abu1_imgbanan';
                    $arr_about = get_image($aboutus);
                    echo $arr_about ['title_image'];
                ?>
            </h4>
            <div class="container" style="margin-top:7vh;">
                <div class="row divAbout">
                    <div class="col-md-12 " style="text-align: center;">
                        <?php
                            $aboutus = 'abu1_imgbanan';
                            $arr_about = get_image($aboutus);
                            $url = $arr_about ['link_image'];
                            export_img('aboutus',$url);
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <h4> 
                <?php
                    $aboutus = 'abu1_imgnhahang';
                    $arr_about = get_image($aboutus);
                    echo $arr_about ['title_image'];
                ?>
            </h4>
            <div class="container" style="margin-top:7vh;margin-bottom :3vh;">
                <div class="row divAbout">
                    <div class="col-md-12 " style="text-align: center;">
                        <?php
                            $aboutus = 'abu1_imgnhahang';
                            $arr_about = get_image($aboutus);
                            $url = $arr_about ['link_image'];
                            export_img('aboutus',$url);
                        ?>
                    </div>
                </div>
            </div>
            <p>&emsp;&emsp; 
                <?php
                    $aboutus = 'abu1_imgnhahang';
                    $arr_about = get_image($aboutus);
                    echo $arr_about ['detail_image'];
                ?>
            </p>
            <h4>
                <?php   
                    $aboutus = 'abu1_imghotel';
                    $arr_about = get_image($aboutus);
                    echo $arr_about ['title_image'];
                ?>
            </h4>
            <div class="container" style="margin-top:5vh;margin-bottom :3vh;">
                <div class="row divAbout">
                    <div class="col-md-12 " style="text-align: center;">
                        <?php
                            $aboutus = 'abu1_imghotel';
                            $arr_about = get_image($aboutus);
                            $url = $arr_about ['link_image'];
                            export_img('aboutus',$url);
                        ?>
                    </div>
                </div>
            </div>
            <p>&emsp;&emsp; 
                <?php
                    $aboutus = 'abu1_imghotel';
                    $arr_about = get_image($aboutus);
                    echo $arr_about ['detail_image'];
                ?>
            </p>
            <h1>Price</h1>
        </div>
        <br>
    </div>
    <hr>
    <!-- footer -->
    <?php include('lib/footer.php'); ?>
    <script src="js.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/ulg/popper.min.js"> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>