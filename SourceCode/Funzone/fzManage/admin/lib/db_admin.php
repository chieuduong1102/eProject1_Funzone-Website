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

// select Admin
function get_all_adminID(){
    global $db;
    $sql = "SELECT * FROM `admin` ";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result); // returns an assoc. array
}

function get_adminID($id){
    global $db;
    $sql = "SELECT * FROM `admin` ";
    $sql .= "WHERE admin='" . $id . "'";
    $result = mysqli_query($db, $sql);
    confirm_query_result($result);
    $admin = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $admin; // returns an assoc. array
}

function find_all_admins(){
    global $db;

    $sql = "SELECT * FROM `admin` ";
    //echo $sql;
    $result = mysqli_query($db, $sql); 
    // For SELECT statements, $result is a set of data
    // return $result;
    return confirm_query_result($result);
}

// !!! CAREFULLY
// insert admin
function insert_admin($admin) {
    global $db;

    $sql = "INSERT INTO `admin` ";
    $sql .= "(admin, pass) ";
    $sql .= "VALUES (";
    $sql .= "'" . $admin['admin'] . "',"; //be careful of single quotes
    $sql .= "'" . $admin['pass'] . "' )";//be careful of single quotes
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

// update admin
function update_admin($admin) {
    global $db;

    $sql = "UPDATE `admin` SET ";
    $sql .= "admin = '" . $admin['admin'] . "', ";
    $sql .= "pass='" . $admin['pass'] . "' ";
    $sql .= "WHERE admin = '" . $admin['id_goc'] . "' ";
    $sql .= "LIMIT 1 ";
    $result = mysqli_query($db, $sql);

    return confirm_query_result($result);
} 

// delete admin
function delete_admin($id) {
    global $db;
    $sql = "DELETE FROM `admin` ";
    $sql .= "WHERE `admin`='" . $id . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    return confirm_query_result($result);
}

?>