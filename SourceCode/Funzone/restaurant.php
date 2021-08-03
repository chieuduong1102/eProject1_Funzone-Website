<?php
    require_once('lib/functions.php');
    require_once('lib/db_home.php');
    $res = 'res1';
    $arr_res = get_category($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="img/faviconF.ico"/>
    <title><?php echo $arr_res['name_category']; ?></title>
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
            echo $arr_res['name_category'];
        ?>
    </h1>

    <!-- Breadcrumb -->     
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">
                <?php $home = 'ort1_hop'; 
                      $home_id = get_service($home);
                      echo $home_id['name_service'];
                ?></a></li>
              <li class="breadcrumb-item active" aria-current="page">
                  <?php
                    echo $arr_res['name_category'];
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
                    $text_res = 'res1_dvt';
                    $arr_res = get_service($text_res);
                    echo $arr_res['detail_service'];
                ?>
            </p>
        </div>

        <div class="container" style="margin-top:7vh;">
            <div class="row divres">
                <div class="col-md-6 " style="text-align: center;">
                    <?php
                        $img_res = 'res1_imgoutside';
                        $arr_res = get_image($img_res);
                        echo export_img('restaurant',$arr_res['link_image']);         
                    ?>
                </div>
                <div class="col-md-6 ">
                    <h4>
                        <?php
                            $text_res = 'hot1_imgoutside';
                            $arr_res = get_image($text_res);
                            echo $arr_res ['title_image'];        
                        ?>
                    </h4>
                    <p style="text-align: justify;">
                        <?php
                            $text_res = 'hot1_imgoutside';
                            $arr_res = get_image($text_res);
                            echo $arr_res ['detail_image'];        
                        ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="container" style="margin-top:10vh;">
            <div class="row divres">
                <div class="col-md-6 ">
                    <h4>
                        <?php
                            $text_res = 'res1_imginside';
                            $arr_res = get_image($text_res);
                            echo $arr_res ['title_image'];        
                        ?>
                    </h4>
                    <p style="text-align: justify;">
                        <?php
                            $text_res = 'res1_imginside';
                            $arr_res = get_image($text_res);
                            echo $arr_res ['detail_image'];        
                        ?>
                    </p>
                </div>
                <div class="col-md-6 " style="text-align: center;">
                    <?php
                        $img_res = 'res1_imginside';
                        $arr_res = get_image($img_res);
                        echo export_img('restaurant',$arr_res['link_image']); 
                    ?>
                </div>
            </div>
        </div>
        
        <?php
            $id = 'res1_dvt';
            $ser_ht = get_imgs_bySID($id);
            $count = mysqli_num_rows($ser_ht);
            for ($j = 0; $j < $count; $j++):
                $imgres = mysqli_fetch_assoc($ser_ht);
        ?>
            <div class="container" style="margin-top:7vh;">
            <div class="row divres justify-content-center">
                    <div class="col-md-12 " style="text-align: center;">
                        <?php 
                            echo isset($imgres['link_image'])? export_img('restaurant',$imgres['link_image']) : '';
                        ?>
                    </div>
                    <p class="text-des">
                        <?php 
                            echo isset($imgres['description_image'])? $imgres['description_image'] : '';
                        ?>
                    </p>
                    <p class="text-del">
                        <?php 
                            echo isset($imgres['detail_image'])? $imgres['detail_image'] : '';
                        ?>
                    </p>
                </div>
            </div>
        <?php 
            endfor; 
        ?>
    </div>
    <hr>
    <div class="container">
        <a href="menu/menu.html"><h3 class="h3-menu">MENU</h3></a>
        <div class="row">
            <div class="col-md-4">
                <img src="img/restaurant/restaurant_menu.jpg" alt="" class="img-fluid">
            </div>
            <div class="col-md-8">
                <p class="text-menu">We have many tradition food that you want to try. Check it out!</p>
                <a href="menu/menu.html">SEE MORE</a>
            </div>
        </div>
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