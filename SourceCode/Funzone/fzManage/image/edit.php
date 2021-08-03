<?php 
require_once('lib/db_image.php');
require_once('lib/functions.php');
if(isset($_POST["submit"])){
    if(isset($_FILES['link_image'])&&$_FILES['link_image']["name"]!=null){
        //lấy tên của file:
        $file_name=$_FILES['link_image']["name"];
        //lấy đường dẫn tạm lưu nội dung file:
        $file_tmp =$_FILES['link_image']['tmp_name'];
        //tạo đường dẫn lưu file:
        $sid= substr($_POST['s_id'], 0, 4);
        $folder;
        switch ($sid){
            case 'eve1':
                $folder = 'events/';
            break;
            case 'exp1':
                $folder = 'experience/';
            break;
            case 'res1':
                $folder = 'restaurant/';
            break;
            case 'hot1':
                $folder = 'hotel/';
            break;
            case 'ort1/aboutus';
                $folder = 'aboutus';
            break;
            default:
                $folder = '';
        }
        $path ="../../img/".$folder.$file_name;
        //link_image nội dung file vào đường dẫn vừa tạo:
        move_uploaded_file($file_tmp,$path);
    }
}
if ($_SERVER["REQUEST_METHOD"] == 'POST'){
        // //do update
        $image = [];
        $image['id_goc'] = $_POST['id_goc'];
        $image['i_id'] = $_POST['i_id'];
        $image['s_id'] = $_POST['s_id'];
        $image['title_image'] = $_POST['title_image'];
        $image['detail_image'] = $_POST['detail_image'];
        $image['description_image'] = $_POST['description_image'];
        $image['link_image'] = $_FILES['link_image']['name'];
        update_image($image);
        redirect_to('image.php'); 
} else { // form loaded
    if(!isset($_GET['id'])) {
        redirect_to('image.php');
    }
    $image = $_GET['id']; 
    // id trong GET trùng với ?xx
    $image = get_image($image);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../Bootstrap/css/bootstrap.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/ulg/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<!-- <script src="https://kit.fontawesome.com/a81368914c.js"></script> -->
    <link rel="shortcut icon" type="image/png" href="../img/faviconF.ico"/>
    <title>Edit Image</title>
    <style>
        h1{
            color: #3867d6;
            text-align: center;
        }
        label{
            font-weight: bold;
            float: left;
        }
        button{
            width: 100px;
        }
        .container{
            width: 500px;
        }
    </style>
</head>
<body>
    <div class="container-fluid text-center">
    <h1>Edit Image</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" name="id_goc" value="<?php echo $image['i_id'] ?>" >
            <label for="" style="margin-right: 105px;">Service_ID: </label>
            <select name="s_id" id="s_id" class="form-control">
            <option value="<?php echo $image['s_id'] ?>" seleted><?php echo $image['s_id'] ?></option>
                <?php  
                    $services = get_all_services();
                    $count = mysqli_num_rows($services);
                    for ($i = 0; $i < $count; $i++):
                        $service = mysqli_fetch_assoc($services);
                ?>
                    <option value="<?php echo $service['s_id'] ?>"><?php echo $service['s_id'] ?></option>
                <?php 
                    endfor; 
                    mysqli_free_result($services);
                ?>
            </select>
            <label for="" style="margin-right: 105px;">Image_ID: </label>
            <input type="text" class="form-control" name="i_id" id="i_id" required value="<?php echo $image['i_id']?>">
            <label for="" style="margin-right: 15px;">Title_Image: </label>
            <input type="text" name="title_image" id="title_image" class="form-control" value="<?php echo $image['title_image']?>">
            <br>
            <label for="" >Detail_Image: </label>
            <textarea name="detail_image" id="detail_image" class="form-control" rows="10" cols="50"><?php echo $image['detail_image']?></textarea>
            <br>
            <label for="" style="margin-right: 15px;">Description: </label>
            <input type="text" name="description_image" id="description_image" class="form-control" value="<?php echo $image['description_image']?>">
            <br>
            <label for="" style="margin-right: 15px;">URL: </label>
            <input type="file" name="link_image" id="link_image" class="form-control" value="<?php echo $image['link_image']?>">
            <br>
        </div>
        <br>
        <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
        <button type="reset" name="reset" value="Reset" class="btn btn-primary">Reset</button>
        <a href="image.php"><button type="button" class="btn btn-secondary">Cancel</button></a> 
        </form>      
</body>
</html>

<?php
db_disconnect($db);
?>