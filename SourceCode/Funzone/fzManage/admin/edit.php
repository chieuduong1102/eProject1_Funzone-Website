<?php 
require_once('lib/db_admin.php');
require_once('lib/functions.php');

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
        // //do update
        $admin = [];
        $admin['id_goc'] = $_POST['id_goc'];
        $admin['admin'] = $_POST['admin'];
        $admin['pass'] = md5($_POST['pass']);
        update_admin($admin);
      
        redirect_to('admin.php'); 
} else { // form loaded
    if(!isset($_GET['id'])) {
        redirect_to('admin.php');
    }
    $admin = $_GET['id']; 
    // id trong GET trùng với ?xx
    $admin = get_adminID($admin);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../Bootstrap/css/bootstrap.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="../img/faviconF.ico"/>
    <title>Edit Admin</title>
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
    <h1>Edit Admin</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <input type="hidden" name="id_goc" value="<?php echo $admin['admin'] ?>" >
            <label for="name">Admin_ID: </label>
            <input type="text" class="form-control" id="name" name="admin" aria-describedby="emailHelp" required value="<?php echo $admin['admin']?>">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="pass" name="pass" required value="<?php echo $admin['pass']?>" >
        </div>
        <br>
        <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
        <button type="reset" name="reset" value="Reset" class="btn btn-primary">Reset</button>
        <a href="admin.php"><button type="button" class="btn btn-secondary">Cancel</button></a> 
    </form>
    </form>
    <br><br>
    </div>
        
</body>
</html>

<?php
db_disconnect($db);
?>