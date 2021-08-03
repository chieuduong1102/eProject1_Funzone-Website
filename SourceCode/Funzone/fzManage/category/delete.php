<?php
require_once('lib/db_category.php');
require_once('lib/functions.php');

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    //db delete
    delete_category($_POST['c_id']);
    redirect_to('category.php');
} else { // form loaded
    if(!isset($_GET['id'])) {
        redirect_to('category.php');
    }
    $category = $_GET['id'];
    $category = get_category($category);
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
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
    <title>Delete category</title>
    <style>
        .label {
            font-weight: bold;
            font-size: large;
        }
        button{
            width:128px;
        }
    </style>
</head>
<body>
    <div class="container">
    <h1>Delete category's information</h1>
    <h2>Are you sure you want to delete this category?</h2>
    <p><span class="label">Category ID: </span><?php echo $category['c_id']; ?></p>
    <p><span class="label">Name of Category: </span><?php echo $category['name_category']; ?></p>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <input type="hidden" name="c_id" value="<?php echo $category['c_id']; ?>" >
        <button type="submit" name="submit" class="btn btn-danger">Delete</button>
        <a href="category.php"><button type="button" class="btn btn-secondary">Cancel</button></a>
    </form>
    <br><br>
    </div>
</body>
</html>


<?php
db_disconnect($db);
?>
