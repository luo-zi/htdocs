<?php


require_once(dirname(__FILE__)."/../../DAO/articleDAO.php");
$a_id=$_GET['a_id'];

$res=article_select_by_id($a_id);

echo json_encode($res);

?>