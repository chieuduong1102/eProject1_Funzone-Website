<?php
require_once('lib/functions.php');
require_once('lib/db_admin.php');
    // echo "Login Successfully!";
    $stt = 0;
    if ($_SESSION['admin'] == ''){
        redirect_to('../index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <!-- cdn active datatable -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <!-- // -->
    <link rel="shortcut icon" type="image/png" href="../../img/faviconF.ico"/>
    <title>Admin</title>
    <style>
        table{
            width: 100%;
            border-collapse: collapse;
        }
        table tr th {
            border-top: solid 1px black;
            background-color: #70a1ff;
            padding-left: 5px;
        }

        button, input[type=submit], input[type=reset]{
            width: 128px;
        }
    </style>
</head>
<body>
    <?php include('../admin/lib/user.php'); ?>
    <br><br>
    <div class="container">
    <hr>
        <h2 style="text-align: center; color: #3867d6">ADMIN MANAGEMENT</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../manager.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Admin</li>
            </ol>
        </nav>
    <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4" id="list-ad">
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                <label for="newad" style="font-weight: bold;">Admin_ID:</label>
                <input type="text" name="newad" value="" pattern="^[a-zA-Z0-9_]{1,30}$" required>
                <br>
                <label for="newpass" style="margin-right: 3px; font-weight: bold;" >Password: </label>
                <input type="password" name="newpass" value="" pattern="^[a-zA-Z0-9_]{1,30}$" required>
                <br>
                <br>
                <input type="submit" class="btn btn-primary" value="Create" >
                <input type="reset" class="btn btn-primary" value="Clear" >
            </form>
            </div>
            <div class="col-md-8" >
                <table id="table-admin" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Admin_ID</th>
                            <th>Password</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php  
                    $admins = get_all_adminID();
                    $count = mysqli_num_rows($admins);
                    for ($i = 0; $i < $count; $i++):
                        $admin = mysqli_fetch_assoc($admins);
                        $stt = $stt+1;
                        //alternative: mysqli_fetch_row($book_set) returns indexed array
                    ?>
                        <tr>
                            <td><?php echo $stt?></td>
                            <td><?php echo $admin['admin']; ?></td>
                            <td><?php echo $admin['pass']; ?></td>
                            <td ><a href="<?php echo 'edit.php?id='.$admin['admin']; ?>">Edit</a></td>
                            <td><a href="<?php echo 'delete.php?id='.$admin['admin']; ?>">Delete</a></td>
                        </tr>
                    <?php 
                    endfor; 
                    mysqli_free_result($admins);
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
    </div>
    <div class="container">
    <?php if ($_SERVER["REQUEST_METHOD"] == 'POST'): ?> 
        <?php 
            $admin_list = [];
            $admin_list['admin'] = $_POST['newad'];
            $admin_list['pass'] = md5($_POST['newpass']) ;
            // sha1($_POST['newpass']);
            $result = insert_admin($admin_list);
        ?>
        <h4>A admin (ID: <?php echo $admin_list['admin'] ?>) will be add:</h4>
        <ul>
        <?php 
            foreach ($_POST as $key => $value) {
                if ($key == 'submit') continue;
                if(!empty($value)) echo '<li>', $key.': '.$value, '</li>';
            }        
        ?>
        </ul>

        <a href="admin.php" style="text-decoration: none;"><button type="button" class="btn btn-outline-primary" style="width: 100px; margin-left: 20px">OK</button></a>
    <?php endif; ?>
    <hr>
    <a href="../manager.php"><button type="button" class="btn btn-outline-primary" style="width: 128px;">< Back</button></a>
    <hr>
    </div>
    
    <script text="javascript">
        $(document).ready( function () {
            $('#table-admin').DataTable();
        } );
    </script>
</body>
</html>