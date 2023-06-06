<?php
require_once(dirname(__FILE__)."/../../DAO\commentDAO.php");
$c_id=$_GET['c_id'];
comment_delete($c_id);

header("location:./../../../blog/commentList.html");

?>