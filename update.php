<?php
require_once 'DB_Functions.php';

$db = new DB_Functions();

if (isset($_GET['User_ID']) && isset($_GET['FirstName']) && isset($_GET['LastName']) && isset($_GET['Email']) && isset($_GET['MobileNumber'])&&isset($_GET['Password'])){
    // receiving the post params
    $User_ID=$_GET['User_ID'];
    $FirstName=$_GET['FirstName'];
    $LastName=$_GET['LastName'];
    $Email=$_GET['Email'];
    $MobileNumber=$_GET['MobileNumber'];
    $Password=$_GET['Password'];
    $res = $db->update_data($User_ID,$FirstName,$LastName,$Email,$MobileNumber,$Password);
    echo $res;
    echo "   finally update value";   
} else {
    return "0";
}
?>