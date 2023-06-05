<?php
require_once(dirname(__FILE__)."/../../DAO\userDAO.php");
$user_id=$_GET['user_id'];

$res=user_select_by_ID($user_id);

echo json_encode($res);



?>