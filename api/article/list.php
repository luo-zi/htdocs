<?php

require_once("D:\\xampp\htdocs\DAO\articleDAO.php");

$res=article_select_all();

echo json_encode($res);


?>