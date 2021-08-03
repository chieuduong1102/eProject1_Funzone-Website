<?php
    require_once('lib/functions.php');
    require_once('lib/db_home.php');
    if(!isset($_POST['search'])) {
        redirect_to('index.php');
    }
    $search = $_POST['search'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="img/faviconF.ico"/>
    <title>Result's Search</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Muli:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Muli:wght@300;700&display=swap" rel="stylesheet">
</head>
<body onload = "time()">
    <?php include('lib/navbar.php'); ?>
    <hr>
    <div class="container body-page">
    <br>
    <div class="container">
        <?php
            $res = result_search($search);
            $count = mysqli_num_rows($res);
            echo '<p style="text-align: center">Have '.$count. ' results.</p> <br>' ;
            if($count == 0){
                echo '<p style=" text-align: center; color: #b2bec3; height: 51vh;">There were no matches</p>';
            } else {
                for($i = 0; $i<$count; $i++){
                    $row = mysqli_fetch_assoc($res);
                    $sid = $row['s_id'];
                    $img_arr = get_imgs_bySID($sid);
                    $count_img = mysqli_num_rows($img_arr);
                    for($j=0; $j < $count_img; $j++){
                        $img = mysqli_fetch_assoc($img_arr);
                    }
                    $dis = '<div class="row">';
                    $dis .= '<div class="col-md-4" >';
                    $dis .=  '<img class="img-fluid" src="img/search/'. $img['link_image']. '">' ;
                    $dis .= '</div>';
                    $dis .= '<div class="col-md-8">';
                    $dis .= '<h3>';
                    $dis .= $row['name_service'];
                    $dis .= '</h3>';
                    $dis .= '<p class="p-event" style="text-align: justify;">';
                    $dis .= $row['detail_service'];
                    $dis .= '<br>';
                    $dis .= '<a href="wotw.php?id='. $row['s_id'] .'">SEE MORE</a>';
                    $dis .= '</p>';
                    $dis .= '</div>';
                    $dis .= '</div>';
                    $dis .= '<hr>';
                    echo $dis;
                }
            }   
        ?>
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