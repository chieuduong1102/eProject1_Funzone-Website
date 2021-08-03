<?php 
require_once('admin/lib/functions.php');
require_once('admin/lib/db_admin.php');
if ($_SESSION['admin'] == ''){
    redirect_to('index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" type="image/png" href="../img/faviconF.ico"/>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FUNZONE MANAGEMENT</title>
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Muli:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Muli:wght@300;700&display=swap" rel="stylesheet">

</head>
<body>
    <?php include('admin/lib/user.php'); ?>
    <div class="container">
    <hr>
        <h1 style="text-align: center; color: #3867d6">FUNZONE MANAGEMENT</h1>
    <hr>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6" style="margin: 30px 0 0 0;">
                <div style="border-radius: 5px; background-color: #ff7675; height: 260px; padding: 30px;">
                <i class="fas fa-cogs" style="font-size: 3rem;"></i> <h1 style="display: inline">Category</h1>
                <hr>
                    <p >NOTE: Experiences, Restaurant, Hotel, Event,...</p>
                    <a href="category/category.php"><button type="button" class="btn btn-outline-danger" style="color: white; width: 100px;">Manage</button></a>
                </div>
            </div>
            
            <div class="col-md-6" style="margin: 30px 0 0 0;">
            <div style="border-radius: 5px; background-color: #a29bfe; height: 260px; padding: 30px;">
            <i class="fas fa-cogs" style="font-size: 3rem;"></i> <h1 style="display: inline">Service</h1>
            <hr>
                    <p >NOTE: Services, Detail,...</p>
                    <a href="service/service.php"><button type="button" class="btn btn-outline-primary" style="color: white; width: 100px;">Manage</button></a>
            </div>
            </div>
        </div>
    </div> 
    <div class="container">
        <div class="row">
            <div class="col-md-6" style="margin: 30px 0 0 0;">
                <div style="border-radius: 5px; background-color: #feca57; height: 260px; padding: 30px;">
                <i class="fas fa-cogs" style="font-size: 3rem;"></i> <h1 style="display: inline">Image</h1>
                <hr>
                    <p >NOTE: Tittle, Description, Detail, Image,...</p>
                    <a href="image/image.php"><button type="button" class="btn btn-outline-warning" style="color: white; width: 100px;">Manage</button></a>
                </div>
            </div>
            <div class="col-md-6" style="margin: 30px 0 0 0;">
            <div style="border-radius: 5px; background-color: #0be881; height: 260px; padding: 30px;">
            <i class="fas fa-cogs" style="font-size: 3rem;"></i> <h1 style="display: inline">Admin</h1>
            <hr>
                    <p >NOTE: Admin information, password,...</p>
                    <a href="admin/admin.php"><button type="button" class="btn btn-outline-success" style="color: white; width: 100px;">Manage</button></a>
            </div>
            </div>
        </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/ulg/popper.min.js"> -->
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>