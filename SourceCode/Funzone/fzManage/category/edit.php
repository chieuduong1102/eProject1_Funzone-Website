<?php 
require_once('lib/db_category.php');
require_once('lib/functions.php');

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
        // //do update
        $category = [];
        $category['id_goc'] = $_POST['id_goc'];
        $category['c_id'] = $_POST['c_id'];
        $category['name_category'] = $_POST['name_category'];
        $category['position'] = $_POST['position'];
        update_category($category);
        redirect_to('category.php'); 
} else { // form loaded
    if(!isset($_GET['id'])) {
        redirect_to('category.php');
    }
    $category = $_GET['id']; 
    // id trong GET trùng với ?xx
    $category = get_category($category);
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
    <div class="container text-center">
    <h1>Edit Category</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <input type="hidden" class="form-control" name="id_goc" value="<?php echo $category['c_id'] ?>" >
            <label for="name">Category_ID: </label>
            <input type="text" class="form-control" id="name" name="c_id" placeholder="Ex: abc1"  required value="<?php echo $category['c_id']?>">
            <br>
            <label for="">Name_Category:</label>
            <input type="text" class="form-control" id="name_category" name="name_category" required value="<?php echo $category['name_category']?>" >
            <br>
            <label for="">Position:</label>
            <input type="text" class="form-control" id="position" name="position" required value="<?php echo $category['position']?>" >

        <br>
        <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
        <button type="reset" name="reset" value="Reset" class="btn btn-primary">Reset</button>
        <a href="category.php"><button type="button" class="btn btn-secondary">Cancel</button></a> 
    </form>
    </div>
</body>
</html>

<?php
db_disconnect($db);
?>