<?php

require "connection.php"
$user_name = $_POST["user_name"];
$password = $_POST["password"];

$sql = "select name,email from usertable where user_name like '".$user_name."' and password like '".$password."';";

$result = mysqli_query($con, $sql);
$responce = array();

if (mysqli_num_rows($result)>0)
{
	$row = mysqli_fetch_row($result);
	$name = $row[1];
	$email = $row[2];
	$status = "login_success";
	echo json_encode($responce);
	
}

else
{
	$status = "login_failed";
	$message = "User Not Found....Please try again....";
	echo json_encode($responce);
}

mysqli_close($con);

?>