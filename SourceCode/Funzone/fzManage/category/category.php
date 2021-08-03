<?php 
require_once('lib/functions.php');
require_once('lib/db_category.php');
if ($_SESSION['admin'] == ''){
    redirect_to('../index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <link rel="shortcut icon" type="image/png" href="img/faviconF.ico"/> 
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
    <link rel="shortcut icon" type="image/png" href="../img/faviconF.ico"/>
    <title>Category</title>
    <style>
        label{
            font-weight: bold;
        }
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
            width: 162px;
        }
    </style>
</head>
<body>
<?php include('lib/user.php'); ?>
    <br><br>
    <div class="container">
    <hr>
        <h2 style="text-align: center; color: #3867d6">CATEGORY MANAGEMENT</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../manager.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Category</li>
            </ol>
        </nav>
    <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                <label for="" style="margin-right: 46px;">Category_ID: </label>
                <input type="text" name="c_id" id="c_id" placeholder="Ex: abc1" required >
                <br>
                <label for="" >Name of Category: </label>
                <input type="text" name="name_category" id="name_category" required>
                <br>
                <label for="" style="margin-right: 77px;">Position: </label>
                <input type="text" name="position" id="position" required>
                <br><br>
                <input type="submit" class="btn btn-primary" value="Create" >
                <input type="reset" class="btn btn-primary" value="Clear" >
            </form>
            </div>

            <div class="col-md-8">
            <table id="table-cat" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Position</th>
                        <th>Category_ID</th>
                        <th>Category</th>
                        <th>Edit</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                        $categories = get_all_categories();
                        $count = mysqli_num_rows($categories);
                        for ($i = 0; $i < $count; $i++):
                            $category = mysqli_fetch_assoc($categories);
                    ?>
                        <tr>
                            <td><?php echo $category['position']; ?></td>
                            <td><?php echo $category['c_id'] ?></td>
                            <td><?php echo $category['name_category']; ?></td>
                            <td ><a href="<?php echo 'edit.php?id='.$category['c_id']; ?>">Edit</a></td>
                            <td><a href="<?php echo 'delete.php?id='.$category['c_id']; ?>">Delete</a></td>
                        </tr>
                    <?php 
                        endfor; 
                        mysqli_free_result($categories);
                    ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <div class="container">
        <?php if ($_SERVER["REQUEST_METHOD"] == 'POST'): ?> 
            <?php 
                $category_list = [];
                $category_list['c_id'] = $_POST['c_id'];
                $category_list['name_category'] = $_POST['name_category'];
                $category_list['position'] = $_POST['position'];
                $result = insert_category($category_list);
            ?>
            <h4>A item (ID: <?php echo $category_list['c_id'] ?>) will be add:</h4>
            <ul>
            <?php 
                foreach ($_POST as $key => $value) {
                    if ($key == 'submit') continue;
                    if(!empty($value)) echo '<li>', $key.': '.$value, '</li>';
                }        
            ?>
            </ul>
            <a href="category.php" style="text-decoration: none;"><button type="button" class="btn btn-outline-primary" style="width: 100px; margin-left: 20px">OK</button></a>
        <?php endif; ?>
        <hr>
        <a href="../manager.php"><button type="button" class="btn btn-outline-primary" style="width: 100px;">< Back</button></a>
        <hr>
    </div>
    <script text="javascript">
        $(document).ready( function () {
            $('#table-cat').DataTable();
        } );
    </script> 
</body>
</html>