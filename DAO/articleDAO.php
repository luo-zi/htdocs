<?php
require_once("D:\\xampp\htdocs\DButil.php");

$insert_article="insert into article(article_author_id,article_title,article_text,article_info) values(:aa_id,:a_title,:a_text,:a_info)";

$delete_by_ID_article="delete from article where article_id=:a_id";

$update_by_ID_article="update article set article_text=:a_text,article_title=:a_title, article_info=:a_info where article_id=:a_id";

$select_all_article="select * from article";

$select_by_ID_article="select * from article where article_id=:a_id";
$select_by_author_ID_article="select * from article where article_author_id=:aa_id";


// insert : aa_id, a_title, a_text, a_info
// delete : a_id
// update : a_text,a_title, a_id, a_info
// select by id : a_id
// select by author id: aa_id

function article_select_by_author_id($author_id){
    global $dbh,$select_by_author_ID_article;
   $stmt=$dbh->prepare($select_by_author_ID_article);
    $stmt->bindParam(":aa_id",$author_id);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}

function article_select_by_id($article_id){
    global $dbh,$select_by_ID_article;
   $stmt=$dbh->prepare($select_by_ID_article);
    $stmt->bindParam(":a_id",$article_id);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetch();
}

function article_select_all(){
    global $dbh,$select_all_article;
    $stmt=$dbh->prepare($select_all_article);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}

function article_update_by_ID($article_text,$article_title,$article_id,$article_info){
    global $dbh,$update_by_ID_article;
    $stmt->$dbh->prepare($update_by_ID_article);
    $stmt->bindParam(":a_text",$article_text);
    $stmt->bindParam(":a_title",$article_title);
    $stmt->bindParam(":a_id",$article_id);
    $stmt->bindParam(":a_info",$article_info);
    return $stmt->execute();
}

function article_delete_by_ID($article_id){
    global $dbh,$delete_by_ID_article;
    $stmt=$dbh->prepare($delete_by_ID_article);
    $stmt->bindParam(":a_id",$article_id);
    return  $stmt->execute();
}


function article_insert($author_id,$article_title,$article_text,$article_info){
    global $dbh,$insert_article;
    $stmt=$dbh->prepare($insert_article);
    $stmt->bindParam(":aa_id",$author_id);
    $stmt->bindParam(":a_title",$article_title);
    $stmt->bindParam(":a_text",$article_text);
    $stmt->bindParam(":a_text",$article_text);
    $stmt->bindParam(":a_info",$article_info);
    $stmt->execute();
    return $dbh->lastInsertId();
}

?>