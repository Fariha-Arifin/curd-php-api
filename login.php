<?php
require_once 'DB_Functions.php';
$db=new DB_Functions();

//json response array
	$response=array("error"=>FALSE);

  if(isset($_GET['MobileNumber'] )&& isset($_GET['Password'] ))
	  {

//receive post param
	$MobileNumber = $_GET['MobileNumber'];
	$Password = $_GET['Password'];

//get the user 
	$user = $db->getUserByMobileNumberAndPassword($MobileNumber,$Password);
     
	if($user!=false) 
	{
//user is found
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
//user is not found with the credentials

$response["error"]=TRUE;
$response["error_msg"]="Login credentials are Wrong.Please try again!";
echo json_encode($response);
}
  }
else{
//required post params is missing
$response["error"]=TRUE;
$response["error_msg"]="Required parameters MobileNumber or password is missing!";

echo json_encode($response);
}

?>