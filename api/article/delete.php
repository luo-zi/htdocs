<?php
require_once(dirname(__FILE__)."/../../DAO/articleDAO.php");
$a_id=$_GET['a_id'];
article_delete_by_ID($a_id);

header("location:./../../../blog/articleList.html");

?>