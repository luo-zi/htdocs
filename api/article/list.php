<?php

require_once(dirname(__FILE__)."/../../DAO/articleDAO.php");

$res=article_select_all();

echo json_encode($res);


?>