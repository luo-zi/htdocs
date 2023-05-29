<?php
require_once("D:\\xampp\htdocs\DAO\userDAO.php");
$username=$_GET['username'];
$password=$_GET['password'];
$user_id=user_login($username,$password)[0];
$res['user_id']=$user_id;
$res['status']=$user_id?200:404;
echo json_encode($res);


?>