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
    <title>Events</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Muli:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Muli:wght@300;700&display=swap" rel="stylesheet">
</head>
<body onload = "time()" >
    <?php include('lib/navbar.php'); ?>
    <hr>
    <h1 class="h1-exp">
        <?php 
            $eve1 = 'eve1';
            $arr_eve = get_category($eve1);
            echo $arr_eve['name_category'];
        ?>
    </h1>

    <div class="container">
        <nav class="brc" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php">
                        <?php 
                            $home = 'ort1_hop';
                            $arr_home = get_service($home);
                            echo $arr_home['name_service'];  
                        ?>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php 
                        $eve = 'eve1';
                        $arr_eve = get_category($eve);
                        echo $arr_eve['name_category'];
                    ?>
                </li>
            </ol>
        </nav>
    </div>
    <hr class="hr-h1">

    <div class="container body-page">
        <br>
        <?php 
            $s_id = 'eve1';
            $img_obj = get_imgs_sameSID($s_id);
            $count = mysqli_num_rows($img_obj);
            $col1 = 0;
            $col2 = 10;
            for ($i = 0; $i < $count; $i++):
                $img_arr = mysqli_fetch_assoc($img_obj);
                $i_id = $img_arr['i_id'];
                $url = $img_arr['link_image'];
                $col1++;
                $col2++;
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-4" id="<?php echo $col1; ?>">
                    <?php export_img('events',$url);?>
                </div>
                <div class="col-md-8" id="<?php echo $col2; ?>">
                    <h3>
                    <?php 
                        echo $img_arr['title_image'];
                    ?>
                    </h3>
                    <p class="p-event">
                    <?php 
                        echo $img_arr['detail_image'];
                    ?></p>
                    <a href="#">SEE MORE</a>
                </div>
            </div>
        </div>
        <hr>
        <?php 
            endfor; 
            mysqli_free_result($img_obj);
        ?>
    </div>
    <hr>

    <?php include('lib/footer.php'); ?>
    <script src="js.js"></script>

</body>
</html>