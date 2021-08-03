<?php
    require_once('lib/functions.php');
    require_once('lib/db_home.php');
    $hotel = 'hot1';
    $arr_hotel = get_category($hotel);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="img/faviconF.ico"/>
    <title><?php echo $arr_hotel ['name_category']; ?></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Muli:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Muli:wght@300;700&display=swap" rel="stylesheet">
</head>
<body onload = "time()">
    <?php include('lib/navbar.php'); ?>
    <hr>
    <h1 class="h1-exp">
        <?php
            echo $arr_hotel ['name_category'];
        ?>
    </h1>

    <!-- Breadcrumb -->     
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">
                    <?php 
                        $home = 'ort1_hop'; 
                        $home_id = get_service($home);
                        echo $home_id['name_service'];
                    ?></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php
                        echo $arr_hotel ['name_category'];
                     ?>
                </li>
            </ol>
        </nav>
    </div>
    <hr class="hr-h1">
    <!-- content -->
    <div class="container body-page">
        <br>
        <div class="container ">
            <p style="text-align: justify;">
                &emsp;&emsp;
                <?php
                    $text_hotel = 'hot1_dvt';
                    $arr_hotel = get_service($text_hotel);
                    echo $arr_hotel ['detail_service'];
                ?>
            </p>
        </div>

        <div class="container" style="margin-top:7vh;">
            <div class="row divhotel">
                <div class="col-md-6 " style="text-align: center;">
                    <?php
                        $img_hotel = 'hot1_imgoutside';
                        $arr_hotel = get_image($img_hotel);
                        echo export_img('hotel',$arr_hotel['link_image']);         
                    ?>
                </div>
                <div class="col-md-6 ">
                    <h4>
                        <?php
                            $text_hotel = 'hot1_imgoutside';
                            $arr_hotel = get_image($text_hotel);
                            echo $arr_hotel ['title_image'];        
                        ?>
                    </h4>
                    <p style="text-align: justify;"> 
                        <?php
                            $text_hotel = 'hot1_imgoutside';
                            $arr_hotel = get_image($text_hotel);
                            echo $arr_hotel ['detail_image'];        
                        ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="container" style="margin-top:10vh;">
            <div class="row divhotel">
                <div class="col-md-6 ">
                    <h4>
                        <?php
                            $text_hotel = 'hot1_imgreception';
                            $arr_hotel = get_image($text_hotel);
                            echo $arr_hotel ['title_image'];        
                        ?>
                    </h4>
                    <p style="text-align: justify;"> 
                        <?php
                            $text_hotel = 'hot1_imgreception';
                            $arr_hotel = get_image($text_hotel);
                            echo $arr_hotel ['detail_image'];        
                        ?>
                    </p>
                </div>
                <div class="col-md-6 " style="text-align: center;">
                    <?php
                        $img_hotel = 'hot1_imgreception';
                        $arr_hotel = get_image($img_hotel);
                        echo export_img('hotel',$arr_hotel['link_image']); 
                    ?>
                </div>
            </div>
        </div>
        <div class="container" style="margin-top:7vh;">
            <div class="row divhotel">
                <div class="col-md-6 " style="text-align: center;">
                    <?php
                        $img_hotel = 'hot1_imghall';
                        $arr_hotel = get_image($img_hotel);
                        echo export_img('hotel',$arr_hotel['link_image']);        
                    ?>
                </div>
                <div class="col-md-6 ">
                    <h4>
                        <?php
                            $text_hotel = 'hot1_imghall';
                            $arr_hotel = get_image($text_hotel);
                            echo $arr_hotel ['title_image'];        
                        ?>
                    </h4>
                    <p style="text-align: justify;">
                        <?php
                            $text_hotel = 'hot1_imghall';
                            $arr_hotel = get_image($text_hotel);
                            echo $arr_hotel ['detail_image'];        
                        ?>
                    </p>
                </div>
            </div>
        </div>
        <!-- sileimg1 -->
        <div class="container" style="margin-top:7vh;">
            <div>
                <p class="room-hotel" style="text-align: justify;"> 
                    <?php
                        $text_hotel = 'hot1_img_slide11';
                        $arr_hotel = get_image($text_hotel);
                        echo $arr_hotel ['detail_image'];        
                    ?>
                </p>
            </div>
            <div class="container" style="margin-top:5vh;">
                <div id="slides" class="carousel slide" data-ride="carousel">
                    <ul class="carousel-indicators">
                        <li data-target="#slides" data-slide-to="0" class="active"></li>
                            <?php 
                                $countslide = 0;
                                $img2toend = 'hot1_img_slides';
                                $arr_slides1 = get_img_slide($img2toend);
                                $count = mysqli_num_rows($arr_slides1);
                                for($i = 0; $i < $count; $i++):
                                    $countslide++;
                                    $slide = mysqli_fetch_assoc($arr_slides1);
                            ?>
                        <li data-target="#slides" data-slide-to="<?php echo $countslide; ?>"></li>
                        <?php 
                            endfor;
                            // mysqli_free_result($arr_slides1);
                        ?>
                    </ul>

                    <div class="carousel-inner slide-img">
                        <div class="carousel-item active">
                            <?php
                                $img_economy = 'hot1_img_slide11';
                                $arr_economy = get_image($img_economy);
                                echo export_img('hotel',$arr_economy['link_image']);         
                            ?>
                        </div>
                            <?php 
                                $img2toend = 'hot1_img_slides';
                                $arr_slides1 = get_img_slide($img2toend);
                                $count = mysqli_num_rows($arr_slides1);
                                for($i = 0; $i < $count; $i++):
                                    $slidee = mysqli_fetch_assoc($arr_slides1);
                            ?>
                            <div class="carousel-item">
                                <?php echo export_img('hotel',$slidee['link_image'])?>
                            </div>
                            <?php 
                                endfor;
                                mysqli_free_result($arr_slides1);
                            ?>
                        </div>
                    <p class="dichvu-hotel" style="text-align: center;">
                        <?php
                            $img_economy = 'hot1_img_slide11';
                            $arr_economy = get_image($img_economy);
                            echo $arr_economy ['description_image'];        
                        ?>
                    </p>
                </div>
            </div>       
        </div>
        <!-- slideimg2 -->
        <div class="container" style="margin-top:5vh;">
            <div id="slides2" class="carousel slide" data-ride="carousel">
                <ul class="carousel-indicators">
                    <li data-target="#slides2" data-slide-to="0" class="active"></li>
                        <?php 
                            $countslide = 0;
                            $img2toend = 'hot1_img_slidev';
                            $arr_slides1 = get_img_slide($img2toend);
                            $count = mysqli_num_rows($arr_slides1);
                            for($i = 0; $i < $count; $i++):
                                $countslide++;
                                $slide = mysqli_fetch_assoc($arr_slides1);
                        ?>
                    <li data-target="#slides2" data-slide-to="<?php echo $countslide; ?>"></li>
                    <?php 
                        endfor;
                        // mysqli_free_result($arr_slides1);
                    ?>
                </ul>

                <div class="carousel-inner slide-img">
                    <div class="carousel-item active">
                        <?php
                            $img_vip = 'hot1_img_slide21';
                            $arr_vip = get_image($img_vip);
                            echo export_img('hotel',$arr_vip['link_image']);        
                        ?>
                    </div>
                        <?php 
                            $img2toend = 'hot1_img_slidev';
                            $arr_slides1 = get_img_slide($img2toend);
                            $count = mysqli_num_rows($arr_slides1);
                            for($i = 0; $i < $count; $i++):
                                $slidev = mysqli_fetch_assoc($arr_slides1);
                        ?>
                        <div class="carousel-item">
                            <?php echo export_img('hotel',$slidev['link_image'])?>
                        </div>
                    <?php 
                        endfor;
                        mysqli_free_result($arr_slides1);
                    ?>
                </div>
                <p class="dichvu-hotel" style="text-align: center;">
                    <?php
                        $img_vip = 'hot1_img_slide21';
                        $arr_vip = get_image($img_vip);
                        echo $arr_vip ['description_image'];        
                    ?>
                </p>
            </div>
        </div>

        <?php
            $id = 'hot1_dvt';
            $ser_ht = get_imgs_bySID($id);
            $count = mysqli_num_rows($ser_ht);
            for ($j = 0; $j < $count-7; $j++):
                $imght = mysqli_fetch_assoc($ser_ht);
        ?>
            <div class="container" style="margin-top:7vh;">
            <div class="row divhotel justify-content-center">
                    <div class="col-md-12 " style="text-align: center;">
                        <?php 
                            echo isset($imght['link_image'])? export_img('hotel',$imght['link_image']) : '';
                        ?>
                    </div>
                    <p class="text-des">
                        <?php 
                            echo isset($imght['description_image'])? $imght['description_image'] : '';
                        ?>
                    </p>
                    <p class="text-del">
                        <?php 
                            echo isset($imght['detail_image'])? $imght['detail_image'] : '';
                        ?>
                    </p>
                </div>
            </div>
        <?php 
            endfor; 
        ?>

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