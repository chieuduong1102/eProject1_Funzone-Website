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

function get_all_categories(){
    global $db;

    $sql = "SELECT * FROM `category` ";
    //echo $sql;
    $result = mysqli_query($db, $sql); 
    // For SELECT statements, $result is a set of data
    // return $result;
    return confirm_query_result($result);
}

// !!! CAREFULLY
// insert category
function insert_category($category) {
    global $db;

    $sql = "INSERT INTO `category` ";
    $sql .= "( c_id, name_category, position ) ";
    $sql .= "VALUES (";
    $sql .= "'" . $category['c_id'] . "',"; //be careful of single quotes
    $sql .= "'" . $category['name_category'] . "',"; //be careful of single quotes
    $sql .= "'" . $category['position'] . "' )";//be careful of single quotes
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

// update category
function update_category($category) {
    global $db;

    $sql = "UPDATE `category` SET ";
    $sql .= "c_id = '" . $category['c_id'] . "', ";
    $sql .= "name_category = '" . $category['name_category'] . "', ";
    $sql .= "position = '" . $category['position'] . "' ";
    $sql .= "WHERE c_id = '" . $category['id_goc'] . "' ";
    $sql .= "LIMIT 1 ";
    $result = mysqli_query($db, $sql);

    return confirm_query_result($result);
} 

// delete category
function delete_category($id) {
    global $db;
    $sql = "DELETE FROM `category` ";
    $sql .= "WHERE `c_id`='" . $id . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

?>