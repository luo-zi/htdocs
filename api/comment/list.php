<?php
require_once(dirname(__FILE__)."/../../DAO\commentDAO.php");

$res=comment_select_all();

echo json_encode($res);

?>