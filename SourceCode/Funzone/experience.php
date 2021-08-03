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
    <title>Experience</title>
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
    <h1 class="h1-exp">EXPERIENCE</h1>
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Experience</li>
            </ol>
        </nav>
    </div>
    <hr class="hr-h1">
    <!-- content -->
    <div class="container body-page">
        <br>
        <div class="container">
            <h5 style="text-align: justify;">&emsp;
                At FUNZONE, the visitors can enjoy the new lots of natural wonders of the world. They were built exactly the same structure as the original with smaller size. The recommendation is you should take half of a day for visiting all of them.  </h5>
            <hr>
            <div class="row">
                <?php
                    $id_7ww = 'exp1_imgz';
                    $imgww_arr = get_imgs_sameIID($id_7ww);
                    $count = mysqli_num_rows($imgww_arr);
                    for ($i = 0; $i < $count; $i++):
                        $imgww = mysqli_fetch_assoc($imgww_arr);
                        $url = $imgww['link_image'];
                ?>
                <div class="col-md-4 text-center exp-square">
                    <br>
                    <h4 class="h4-exp"><?php echo $imgww['title_image']; ?></h4>
                    <a href="<?php echo 'wotw.php?id='.$imgww['s_id']; ?>" ><?php export_img('',$url);?>
                    </a>
                    <div class="overlay"></div>
                </div>
                <?php 
                endfor; 
                mysqli_free_result($imgww_arr);
            ?>
        </div>
        <br>
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