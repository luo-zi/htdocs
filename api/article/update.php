<?php
require_once(dirname(__FILE__)."/../../DAO/articleDAO.php");
$a_id=$_POST['a_id'];
$a_title=$_POST['a_title'];
$a_info=$_POST['a_info'];
$a_text=$_POST['a_text'];

// $a_text=str_replace("\n","\\\\n",$a_text);
// $a_info=str_replace("\n","\\\\n",$a_info);

article_update_by_ID($a_id,$a_text,$a_title,$a_info);

$res=json_encode(array('status'=>200));

header("location:./../../../blog/articleList.html");




?>