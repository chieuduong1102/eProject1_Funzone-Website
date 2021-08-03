<?php 
require_once('lib/functions.php');
require_once('lib/db_service.php');
$stt = 0;
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
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <!-- cdn active datatable -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <!-- // -->
    <link rel="shortcut icon" type="image/png" href="../img/faviconF.ico"/>
    <title>Service</title>
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
            vertical-align: top;
        }

        button, input[type=submit], input[type=reset]{
            width: 128px;
        }
    </style>
</head>
<body>
<?php include('lib/user.php'); ?>
    <br><br>
    <div class="container">
    <hr>
        <h2 style="text-align: center; color: #3867d6">SERVICES MANAGEMENT</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../manager.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Service</li>
            </ol>
        </nav>
    <hr>
    </div>
    <div class="container">
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <div class="form-group">
                <label for="" style="margin-right: 105px;">Category_ID: </label>
                <select name="c_id" id="c_id" class="form-control">
                    <?php  
                        $categories = get_all_categories();
                        $count = mysqli_num_rows($categories);
                        for ($i = 0; $i < $count; $i++):
                            $category = mysqli_fetch_assoc($categories);
                    ?>
                        <option value="<?php echo $category['c_id'] ?>"><?php echo $category['c_id'] .' [ '. $category['name_category'] . ' ] ' ?></option>
                    <?php 
                        endfor; 
                        mysqli_free_result($categories);
                    ?>
                </select>
                <label for="" style="margin-right: 105px;">Service_ID: </label>
                <input type="text" class="form-control" name="s_id" id="s_id" required>
                <label for="" style="margin-right: 15px;">Name_Service: </label>
                <input type="text" name="name_service" id="name_service" class="form-control" required>
                <br>
                <label for="" >Detail_Service: </label>
                <textarea name="detail_service" id="detail_service" class="form-control" rows="4" cols="50"></textarea>
                <br>
            </div>
                <input type="submit" class="btn btn-primary" value="Create" >
                <input type="reset" class="btn btn-primary" value="Clear" >
        </form>     
    </div>
    <hr>
    <div class="container-fluid">
        <?php if ($_SERVER["REQUEST_METHOD"] == 'POST'): ?> 
            <?php 
                $service_list = [];
                $service_list['s_id'] = $_POST['s_id'];
                $service_list['c_id'] = $_POST['c_id'];
                $service_list['name_service'] = $_POST['name_service'];
                $service_list['detail_service'] = $_POST['detail_service'];
                $result = insert_service($service_list);
            ?>
            <h4>A item (ID: <?php echo $service_list['s_id'] ?>) will be add:</h4>
            <ul>
            <?php 
                foreach ($_POST as $key => $value) {
                    if ($key == 'submit') continue;
                    if(!empty($value)) echo '<li>', $key.': '.$value, '</li>';
                }        
            ?>
            </ul>
            <a href="service.php" style="text-decoration: none;"><button type="button" class="btn btn-outline-primary" style="width: 100px; margin-left: 20px">OK</button></a>
        <?php endif; ?>
        <br> <br> <br>
        <hr>
        <a href="../manager.php"><button type="button" class="btn btn-outline-primary" style="width: 100px;">< Back</button></a>
        <hr>
    </div>
    <div class="container-fluid">
            <div class="col-md-12">
            <table id="table-serv" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Service_ID</th>
                        <th>Category_ID</th>
                        <th>Name_Service</th>
                        <th>Detail_Service</th>
                        <th>Upload_Image</th>
                        <th>Edit</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                        $services = get_all_services();
                        $count = mysqli_num_rows($services);
                        for ($i = 0; $i < $count; $i++):
                            $service = mysqli_fetch_assoc($services);
                            $stt = $stt+1;
                    ?>
                        <tr>
                            <td><?php echo $stt?></td>
                            <td><?php echo $service['s_id'] ?></td>
                            <td><?php echo $service['c_id'] ?></td>
                            <td><?php echo $service['name_service']; ?></td>
                            <td><?php echo $service['detail_service']; ?></td>
                            <td ><a href="../image/image.php">Upload</a></td>
                            <td ><a href="<?php echo 'edit.php?id='.$service['s_id']; ?>">Edit</a></td>
                            <td><a href="<?php echo 'delete.php?id='.$service['s_id']; ?>">Delete</a></td>
                        </tr>
                    <?php 
                        endfor; 
                        mysqli_free_result($services);
                    ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <hr>
    <script text="javascript">
        $(document).ready( function () {
            $('#table-serv').DataTable();
            document.querySelector("#s_id").value = document.querySelector("#c_id").value + "_";
        } );
        $('#c_id').click( function(){
            document.querySelector("#s_id").value = document.querySelector("#c_id").value + "_";
        });
    </script> 
</body>
</html>