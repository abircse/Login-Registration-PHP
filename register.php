<?php

require 'connection.php';

$name = $_POST['name'];
$email = $_POST['email'];
$user_name = $_POST['user_name'];
$password = $_POST['password'];

$sql = "select * from user where email like '".$email."';";

$result = mysqli_query($con, $sql);
$responce = array();

if (mysqli_num_rows($result)>0)
{
	$status = "reg_failed";
	$message = "User Already Exist....Please use another one";
	array_push($responce,array("status"=>$status,"message"=>$message));
	echo json_encode($responce);
	
}
else
{
	$sql = "Insert into user values('".$name."','".$email."','".$user_name."','".$password."');";
	$result = mysqli_query($con, $sql);
	$status = "reg_success";
	$message = "User Registration Successfull, Thank you for Registration, Now you Can login..";
	array_push($responce,array("status"=>$status,"message"=>$message));
	echo json_encode($responce);

} 

mysqli_close($con);

?>