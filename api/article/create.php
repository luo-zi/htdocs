<?php
require_once(dirname(__FILE__)."/../../DAO/articleDAO.php");
$author_id=$_POST['aa_id'];
$a_text=$_POST['a_text'];
$a_info=$_POST['a_info'];
$a_title=$_POST['a_title'];
// $a_text=str_replace("\n","\\\\n",$a_text);
// $a_info=str_replace("\n","\\\\n",$a_info);

article_insert($author_id,$a_title,$a_text,$a_info);

header("location:./../../../blog/articleList.html");


?>