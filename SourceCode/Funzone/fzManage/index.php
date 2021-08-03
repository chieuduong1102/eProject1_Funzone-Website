<?php
require_once('admin/lib/functions.php');
require_once('admin/lib/db_admin.php');

	if(!isset($_POST['admin']) || !isset($_POST['pass'])){
		echo "";
	} else {
		$id = $_POST['admin'];
		$adid = get_adminID($id);

		if($_POST['admin'] == $adid['admin'] && md5($_POST['pass']) == $adid['pass'] ){
			$adminid = isset($_POST['admin'])? $_POST['admin']: '';
			$_SESSION['admin'] = $adminid;
			redirect_to('manager.php');
		} else {
			echo '<script type="text/javascript">';
			echo ' alert("ID or Password incorrect! Try again!")';  //not showing an alert box.
			echo '</script>';
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="image/png" href="img/faviconF.ico"/>
	<title>Admin Login</title>
	<link rel="stylesheet" href="../Bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<img class="wave" src="img/wave1.png">
	<div class="container">
		<div class="img">
			<a href="../index.php"><img src="img/logoF.png"></a>
		</div>
		<div class="login-content">
			<form method="post">
				<img src="img/admin.png">
				<h2 class="title">ADMIN MODE</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" name="admin" class="input" pattern="^[a-zA-Z0-9_]{1,30}$">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" name="pass" class="input" pattern="^[a-zA-Z0-9_]{1,30}$">
            	   </div>
            	</div>
            	<input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
