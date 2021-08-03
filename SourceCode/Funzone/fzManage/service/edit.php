<?php 
require_once('lib/db_service.php');
require_once('lib/functions.php');

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
        // //do update
        $service = [];
        $service['id_goc'] = $_POST['id_goc'];
        $service['s_id'] = $_POST['s_id'];
        $service['c_id'] = $_POST['c_id'];
        $service['name_service'] = $_POST['name_service'];
        $service['detail_service'] = $_POST['detail_service'];
        update_service($service);
        redirect_to('service.php'); 
} else { // form loaded
    if(!isset($_GET['id'])) {
        redirect_to('service.php');
    }
    $service = $_GET['id']; 
    // id trong GET trùng với ?xx
    $service = get_service($service);
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
    <title>Edit c_id</title>
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
    <h1>Edit Service</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <input type="hidden" name="id_goc" value="<?php echo $service['s_id'] ?>" >
            <label for="" style="margin-right: 105px;">Category_ID: </label>
            <select name="c_id" id="c_id" class="form-control">
            <option value="<?php echo $service['c_id'] ?>" seleted><?php echo $service['c_id'] ?></option>
                <?php  
                    $categories = get_all_categories();
                    $count = mysqli_num_rows($categories);
                    for ($i = 0; $i < $count; $i++):
                        $category = mysqli_fetch_assoc($categories);
                ?>
                    <option value="<?php echo $category['c_id'] ?>"><?php echo $category['c_id'] ?></option>
                <?php 
                    endfor; 
                    mysqli_free_result($categories);
                ?>
            </select>
            <label for="" style="margin-right: 105px;">Service_ID: </label>
            <input type="text" class="form-control" name="s_id" id="s_id" required value="<?php echo $service['s_id']?>">
            <label for="" style="margin-right: 15px;">Name_Service: </label>
            <input type="text" name="name_service" id="name_service" class="form-control" value="<?php echo $service['name_service']?>">
            <br>
            <label for="" >Detail_Service: </label>
            <textarea name="detail_service" id="detail_service" class="form-control" rows="10" cols="50"><?php echo $service['detail_service']?></textarea>
            <br>
        </div>
        <br>
        <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
        <button type="reset" name="reset" value="Reset" class="btn btn-primary">Reset</button>
        <a href="service.php"><button type="button" class="btn btn-secondary">Cancel</button></a> 
        </form>     

</body>
</html>

<?php
db_disconnect($db);
?>