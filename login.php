<?php

require 'connection.php';

$username = $_POST['user_name'];
$password = $_POST['password'];

$sql = "select name,email from user where user_name like '".$username."' and password like '".$password."';";

$result = mysqli_query($con, $sql);
$responce = array();

if (mysqli_num_rows($result)>0)
{
	$row = mysqli_fetch_row($result);
	$name = $row[0];
	$email = $row[1];
	$status = "login_success";
	array_push($responce,array("status"=>$status,"name"=>$name,"email"=>$email));
	echo json_encode($responce);
	
}

else
{
	$status = "login_failed";
	$message = "User Not Found....Please try again....";
	array_push($responce,array("status"=>$status,"message"=>$message));
	echo json_encode($responce);
}

mysqli_close($con);

?>