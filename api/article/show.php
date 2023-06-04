<?php


require_once("D:\\xampp\htdocs\DAO\articleDAO.php");
$a_id=$_GET['a_id'];

$res=article_select_by_id($a_id);

echo json_encode($res);

?>