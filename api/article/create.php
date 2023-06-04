<?php
require_once("D:\\xampp\htdocs\DAO\articleDAO.php");
$author_id=$_POST['aa_id'];
$a_text=$_POST['a_text'];
$a_info=$_POST['a_info'];
$a_title=$_POST['a_title'];
$a_text=str_replace("\n","\\\\n",$a_text);

article_insert($author_id,$a_title,$a_text,$a_info);

echo "create article Successfully";


?>