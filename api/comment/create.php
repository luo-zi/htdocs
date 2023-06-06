<?php
require_once(dirname(__FILE__)."/../../DAO\commentDAO.php");
$a_id=intval($_POST['a_id']);
$c_text=$_POST['c_text'];
comment_insert($a_id,$c_text);
$res['status']=200;

echo json_encode($res);


?>