<?php
require_once("D:\\xampp\htdocs\DAO\userDAO.php");
$user_id=$_GET['user_id'];

$res=user_select_by_ID($user_id);

echo json_encode($res);



?>