<?php 
require_once('lib/functions.php');
require_once('lib/db_image.php');
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
    <link rel="shortcut icon" type="image/png" href="img/faviconF.ico"/>
    <title>Image</title>
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
        <h2 style="text-align: center; color: #3867d6">IMAGES MANAGEMENT</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../manager.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Image</li>
            </ol>
        </nav>
    <hr>
    </div>
    <div class="container">
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                <label for="" style="margin-right: 105px;">Service_ID: </label>
                <select name="s_id" id="s_id" class="form-control">
                    <?php  
                        $services = get_all_services();
                        $count = mysqli_num_rows($services);
                        for ($i = 0; $i < $count; $i++):
                            $service = mysqli_fetch_assoc($services);
                    ?>
                        <option value="<?php echo $service['s_id'] ?>"><?php echo $service['s_id'] ?></option>
                    <?php 
                        endfor; 
                        mysqli_free_result($services);
                    ?>
                </select>
                <label for="" style="margin-right: 105px;">Image_ID: </label>
                <input type="text" class="form-control" name="i_id" id="i_id" required>
                <label for="" style="margin-right: 15px;">Title_Image: </label>
                <input type="text" name="title_image" id="title_image" class="form-control">
                <br>
                <label for="" >Detail_Image: </label>
                <textarea name="detail_image" id="detail_image" class="form-control" rows="4" cols="50"></textarea>
                <br>
                <label for="" style="margin-right: 15px;">Description: </label>
                <input type="text" name="description_image" id="description_image" class="form-control">
                <br>
                <label for="" style="margin-right: 15px;">URL: </label>
                <input type="file" name="link_image" id="link_image" class="form-control" required>
                <br>
            </div>
                <input type="submit" name="submit" class="btn btn-primary" value="Create" >
                <input type="reset" class="btn btn-primary" value="Clear" >
        </form>     
    </div>
    <?php
		if(isset($_POST["submit"])){
			if(isset($_FILES['link_image'])&&$_FILES['link_image']["name"]!=null){
				//lấy tên của file:
				$file_name=$_FILES['link_image']["name"];
				//lấy đường dẫn tạm lưu nội dung file:
				$file_tmp =$_FILES['link_image']['tmp_name'];
                //tạo đường dẫn lưu file:
                $sid= substr($_POST['s_id'], 0, 4);
                $folder;
                switch ($sid){
                    case 'eve1':
                        $folder = 'events/';
                    break;
                    case 'exp1':
                        $folder = 'experience/';
                    break;
                    case 'res1':
                        $folder = 'restaurant/';
                    break;
                    case 'hot1':
                        $folder = 'hotel/';
                    break;
                    case 'ort1/aboutus';
                        $folder = 'aboutus';
                    break;
                    default:
                        $folder = '';
                }
				$path ="../../img/".$folder.$file_name;
				//link_image nội dung file vào đường dẫn vừa tạo:
				move_uploaded_file($file_tmp,$path);
			}
		}
	?>
    <hr>
    <div class="container-fluid">
        <?php if ($_SERVER["REQUEST_METHOD"] == 'POST'): ?> 
            <?php 
                $image_list = [];
                $image_list['i_id'] = $_POST['i_id'];
                $image_list['s_id'] = $_POST['s_id'];
                $image_list['title_image'] = $_POST['title_image'];
                $image_list['detail_image'] = $_POST['detail_image'];
                $image_list['description_image'] = $_POST['description_image'];
                $image_list['link_image'] = $_FILES['link_image']['name'];
                $result = insert_image($image_list);
            ?>
            <h4>A item (ID: <?php echo $image_list['i_id'] ?>) will be add:</h4>
            <ul>
                <?php 
                    foreach ($_POST as $key => $value) {
                        if ($key == 'submit') continue;
                        if(!empty($value)) echo '<li>', $key.': '.$value, '</li>';
                    }        
                ?>
            </ul>
            <a href="image.php" style="text-decoration: none;"><button type="button" class="btn btn-outline-primary" style="width: 100px; margin-left: 20px">OK</button></a>
        <?php endif; ?>
        <a href="../manager.php"><button type="button" class="btn btn-outline-primary" style="width: 100px;">< Back</button></a>
        <hr>
    </div>
    <div class="container-fluid">
            <div class="col-md-12">
            <table id="table-img" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Image_ID</th>
                        <th>Service_ID</th>
                        <th>Title_Image</th>
                        <th>Detail_Image</th>
                        <th>Description</th>
                        <th>URL</th>
                        <th>Edit</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                        $images = get_all_images();
                        $count = mysqli_num_rows($images);
                        for ($i = 0; $i < $count; $i++):
                            $service = mysqli_fetch_assoc($images);
                            $stt = $stt+1;
                    ?>
                        <tr>
                            <td><?php echo $stt?></td>
                            <td><?php echo $service['i_id'] ?></td>
                            <td><?php echo $service['s_id'] ?></td>
                            <td><?php echo $service['title_image']; ?></td>
                            <td><?php echo $service['detail_image']; ?></td>
                            <td><?php echo $service['description_image']; ?></td>
                            <td><?php echo $service['link_image']; ?></td>
                            <td ><a href="<?php echo 'edit.php?id='.$service['i_id']; ?>">Edit</a></td>
                            <td><a href="<?php echo 'delete.php?id='.$service['i_id']; ?>">Delete</a></td>
                        </tr>
                    <?php 
                        endfor; 
                        mysqli_free_result($images);
                    ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <hr>
    <script text="javascript">
        $(document).ready( function () {
            $('#table-img').DataTable();
            document.querySelector("#i_id").value = document.querySelector("#s_id").value.substring(0,4) + "_img";
        } );
        $('#s_id').click( function(){
            document.querySelector("#i_id").value = document.querySelector("#s_id").value.substring(0,4) + "_img";
        });
    </script> 
</body>
</html>