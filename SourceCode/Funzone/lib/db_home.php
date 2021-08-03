<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "funzone");

function db_connect() {
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    return $connection;
}

/******
 * Open connection to database
 */
$db = db_connect();


function db_disconnect($connection) { //call at the end of each page
    if(isset($connection)) {
      mysqli_close($connection);
    }
}

function confirm_query_result($result){
    global $db;
    if (!$result){
        echo mysqli_error($db);
        db_disconnect($db);
        exit; //terminate php
    } else {
        return $result;
    }
}

function get_category($id){
    global $db;
    $sql = "SELECT * FROM `category` ";
    $sql .= "WHERE c_id='" . $id . "'";
    $result = mysqli_query($db, $sql);
    confirm_query_result($result);
    $category = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $category; // returns an assoc. array
}

function get_more_category($id){
    global $db;

    $sql = "SELECT * FROM `category` ";
    $sql .= "WHERE position > '" . $id . "'";
    //echo $sql;
    $result = mysqli_query($db, $sql); 
    return confirm_query_result($result);
}

function get_all_categories(){
    global $db;

    $sql = "SELECT * FROM `category` ";
    //echo $sql;
    $result = mysqli_query($db, $sql); 
    // For SELECT statements, $result is a set of data
    // return $result;
    return confirm_query_result($result);
}

function get_service($id){
    global $db;
    $sql = "SELECT * FROM `service` ";
    $sql .= "WHERE s_id='" . $id . "'";
    $result = mysqli_query($db, $sql);
    confirm_query_result($result);
    $category = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $category; // returns an assoc. array
}

function get_all_services(){
    global $db;

    $sql = "SELECT * FROM `service` ORDER BY s_id ";
    //echo $sql;
    $result = mysqli_query($db, $sql); 
    // For SELECT statements, $result is a set of data
    // return $result;
    return confirm_query_result($result);
}

function get_all_7ww($id){
    global $db;

    $sql = "SELECT * FROM `service` ";
    $sql .= "WHERE c_id='" . $id . "'";
    //echo $sql;
    $result = mysqli_query($db, $sql); 
    return confirm_query_result($result);
}

function get_image($id){
    global $db;
    $sql = "SELECT * FROM `image` ";
    $sql .= "WHERE i_id='" . $id . "'";
    $result = mysqli_query($db, $sql);
    confirm_query_result($result);
    $category = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $category; // returns an assoc. array
}


function get_img_slide($id){
    
    global $db;
    $sql = "SELECT * FROM image ";
    $sql .= "WHERE i_id " ;
    $sql .= "LIKE '%" .$id ."%';";
    //echo $sql;
    $result = mysqli_query($db, $sql); 
    // For SELECT statements, $result is a set of data
    // return $result;
    return confirm_query_result($result);
}

function get_all_images(){
    global $db;

    $sql = "SELECT * FROM `image` ORDER BY i_id ";
    //echo $sql;
    $result = mysqli_query($db, $sql); 
    // For SELECT statements, $result is a set of data
    // return $result;
    return confirm_query_result($result);
}

function get_imgs_bySID($id){
    global $db;
    $sql = "SELECT * FROM image ";
    $sql .= "WHERE s_id ='" . $id . "' ;" ;
    //echo $sql;
    $result = mysqli_query($db, $sql); 
    // For SELECT statements, $result is a set of data
    // return $result;
    return confirm_query_result($result);
}

function get_imgs_sameIID($id){
    global $db;
    $sql = "SELECT * FROM image ";
    $sql .= "WHERE i_id LIKE'%" . $id . "%' ;" ;
    //echo $sql;
    $result = mysqli_query($db, $sql); 
    // For SELECT statements, $result is a set of data
    // return $result;
    return confirm_query_result($result);
}

function get_imgs_sameSID($id){
    global $db;
    $sql = "SELECT * FROM image ";
    $sql .= "WHERE i_id LIKE'%" . $id . "%' ;" ;
    //echo $sql;
    $result = mysqli_query($db, $sql); 
    // For SELECT statements, $result is a set of data
    // return $result;
    return confirm_query_result($result);
}

function result_search($search){
    global $db;
    $sql = "SELECT * FROM service ";
    $sql .= "WHERE name_service " ;
    $sql .= "LIKE '%" .$search ."%';";
    //echo $sql;
    $result = mysqli_query($db, $sql); 
    // For SELECT statements, $result is a set of data
    // return $result;
    return confirm_query_result($result);
}

function export_img($file, $name_file){
    echo '<img class="img-fluid" src="img/'.$file.'/'.$name_file.'">';
}
?>