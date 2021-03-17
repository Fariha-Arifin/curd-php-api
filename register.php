<?php
require_once 'DB_Functions.php';
$db = new DB_Functions();

//json response array
$response=array("error" => FALSE);

if(isset($_GET['FirstName']) && isset($_GET['LastName']) && isset($_GET['Email']) && isset($_GET['MobileNumber'])&&isset($_GET['Password'])){

//receiving   the post params
	$FirstName=$_GET['FirstName'];
	$LastName=$_GET['LastName'];
	$Email=$_GET['Email'];
	$MobileNumber=$_GET['MobileNumber'];
	$Password=$_GET['Password'];

//check if user is already existed with the same phone number

	if($db->isUserExisted($MobileNumber)){
        //user already existed
	
$response["error"] = TRUE;
$response["error_msg"] = "User already existed with".$MobileNumber;
echo json_encode($response);
}

else{


//create a new user
$user=$db->storeUser($FirstName,$LastName,$Email,$MobileNumber,$Password);
if($user){

	$response["error"] = FALSE;
	$response["user_info"]["User_ID"]= $user["User_ID"];
	$response["user_info"]["FirstName"]= $user["FirstName"];
	$response["user_info"]["LastName"]= $user["LastName"];
	$response["user_info"]["Email"]= $user["Email"];
	$response["user_info"]["MobileNumber"]= $user["MobileNumber"];
	$response["user_info"]["Password"]= $user["Password"];
	
echo json_encode($response);

}
else{
//user failed to store

	$response["error"]=TRUE;
	$response["error_msg"]="Unknown error occured in registration!";
	echo json_encode($response);
    }

    }
  }
else{
	$response["error"]=TRUE;
	$response["error_msg"]="Required parameters(FirstName,LastName,Email,MobileNumber,Password)is missing";
	echo json_encode($response);
}


?>