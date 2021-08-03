<?php
require_once('lib/db_admin.php');
require_once('lib/functions.php');

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    //db delete
    delete_admin($_POST['admin']);
    redirect_to('admin.php');
} else { // form loaded
    if(!isset($_GET['id'])) {
        redirect_to('admin.php');
    }
    $admin = $_GET['id'];
    $admin = get_adminID($admin);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../../Bootstrap/css/bootstrap.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="../img/faviconF.ico"/>
    <title>Delete admin</title>
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
    <h1>Delete Admin's information</h1>
    <h2>Are you sure you want to delete this admin?</h2>
    <p><span class="label">Admin ID: </span><?php echo $admin['admin']; ?></p>
    <p><span class="label">Password: </span><?php echo $admin['pass']; ?></p>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <input type="hidden" name="admin" value="<?php echo $admin['admin']; ?>" >
        <button type="submit" name="submit" class="btn btn-danger">Delete</button>
        <a href="admin.php"><button type="button" class="btn btn-secondary">Cancel</button></a>
    </form>
    <br><br>
    </div>
</body>
</html>

<?php
db_disconnect($db);
?>
