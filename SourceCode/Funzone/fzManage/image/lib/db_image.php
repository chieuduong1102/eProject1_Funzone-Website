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

    $sql = "SELECT * FROM `service` ";
    //echo $sql;
    $result = mysqli_query($db, $sql); 
    // For SELECT statements, $result is a set of data
    // return $result;
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

function get_all_images(){
    global $db;

    $sql = "SELECT * FROM `image` ";
    //echo $sql;
    $result = mysqli_query($db, $sql); 
    // For SELECT statements, $result is a set of data
    // return $result;
    return confirm_query_result($result);
}

// !!! CAREFULLY

function insert_image($image) {
    global $db;

    $sql = "INSERT INTO `image` ";
    $sql .= "( i_id, s_id, title_image, detail_image, description_image, link_image ) ";
    $sql .= "VALUES (";
    $sql .= "'" . $image['i_id'] . "',"; //be careful of single quotes
    $sql .= "'" . $image['s_id'] . "',"; //be careful of single quotes
    $sql .= "'" . $image['title_image'] . "',"; //be careful of single quotes
    $sql .= "'" . $image['detail_image'] . "',"; //be careful of single quotes
    $sql .= "'" . $image['description_image'] . "',"; //be careful of single quotes
    $sql .= "'" . $image['link_image'] . "' )";//be careful of single quotes
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

// update 
function update_image($image) {
    global $db;

    $sql = "UPDATE `image` SET ";
    $sql .= "i_id = '" . $image['i_id'] . "', ";
    $sql .= "s_id='" . $image['s_id'] . "', ";
    $sql .= "title_image='" . $image['title_image'] . "', ";
    $sql .= "detail_image='" . $image['detail_image'] . "', ";
    $sql .= "description_image='" . $image['description_image'] . "', ";
    $sql .= "link_image='" . $image['link_image'] . "' ";
    $sql .= "WHERE i_id = '" . $image['id_goc'] . "' ";
    $sql .= "LIMIT 1 ";
    $result = mysqli_query($db, $sql);

    return confirm_query_result($result);
} 

// delete 
function delete_image($id) {
    global $db;
    $sql = "DELETE FROM `image` ";
    $sql .= "WHERE `i_id`='" . $id . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}


?>