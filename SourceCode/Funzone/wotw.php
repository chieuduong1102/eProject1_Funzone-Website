<?php
    require_once('lib/functions.php');
    require_once('lib/db_home.php');

    if(!isset($_GET['id'])) {
        redirect_to('experience.php');
    }
    $wwid = $_GET['id']; 
    // id trong GET trùng với ?xx
    $ww = get_service($wwid);
    // echo $ww['name_service'];
    $img_ww = get_imgs_bySID($wwid);
    $count = mysqli_num_rows($img_ww);
    // tao 1 array co do dai = count - 1
    // $arr_id = [$count-1];
    for ($i = 0; $i < $count; $i++):
        $arr_id[$i] = mysqli_fetch_assoc($img_ww);
    endfor;
    mysqli_free_result($img_ww);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="img/faviconF.ico"/>
    <title><?php echo $ww['name_service'] ?></title>
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
            $ww = get_service($wwid);
            echo $ww['name_service'];
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
                <li class="breadcrumb-item"><a href="experience.php">
                    <?php  
                        $exp = 'exp1'; 
                        $home_id = get_category($exp);
                        echo $home_id['name_category'];
                    ?></a>  
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php
                        $ww = get_service($wwid);
                        echo $ww['name_service'];
                    ?>
                </li>
            </ol>
        </nav>
    </div>
    <hr class="hr-h1"> 
<!-- content -->
    <div class="container body-page">
        <br>
        <div class="container">
            <div class="row divEx">
                <div class="col-md-6 ">
                    <p style="text-align: justify;">&emsp;
                    <?php 
                        echo isset($ww['detail_service'])? $ww['detail_service'] : '';
                    ?>
                    </p>
                </div>
                <div class="col-md-6 " style="text-align: center;">
                    <?php
                        echo isset($arr_id[0]['link_image'])? export_img('experience',$arr_id[0]['link_image']) : '';
                    ?>
                </div>
            </div>
        </div>

        <?php
            for($j = 1; $j < count($arr_id)-1 ; $j++):
        ?>
            <div class="container" style="margin-top:7vh;">
                <div class="row divEx justify-content-center ">
                    <div class="col-md-12 ">
                        <?php 
                            echo isset($arr_id[$j]['link_image'])? export_img('experience',$arr_id[$j]['link_image']) : '';
                        ?>
                    </div>
                    <p class="text-des">
                        <?php 
                            echo isset($arr_id[$j]['description_image'])? $arr_id[$j]['description_image'] : '';
                        ?>
                    </p>
                    <p class="text-del">
                        <?php 
                            echo isset($arr_id[$j]['detail_image'])? $arr_id[$j]['detail_image'] : '';
                        ?>
                    </p>
                </div>
            </div>
        <?php 
            endfor; 
        ?>
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