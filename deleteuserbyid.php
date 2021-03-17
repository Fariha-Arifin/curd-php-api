<?php
require_once 'DB_Functions.php';
$db = new DB_Functions();

if (isset($_GET['User_ID'])) {
    $User_ID = $_GET['User_ID'];
    $res = $db->delete_data($User_ID);
    echo $res;
    echo " finally deleted value.";   
} else {
    return "0";
}
?>