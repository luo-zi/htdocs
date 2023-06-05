<?php
require_once(dirname(__FILE__)."/../../DAO\userDAO.php");
$username=$_GET['username'];
$password=$_GET['password'];
$user_id=user_insert($username,$password);
$res['user_id']=$user_id?$user_id:-1;
$res['status']=$user_id?200:500;
echo json_encode($res);


?>