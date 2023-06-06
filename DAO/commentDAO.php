<?php
require_once(dirname(__FILE__)."/../DButil.php");

$insert_comment="insert into comment (author_id,comment_text) value(:a_id,:c_text)";
$delete_comment_by_id="delete from comment where comment_id=:c_id";
$select_all_comment="select * from comment";

function comment_insert($a_id,$c_text){
    global $dbh,$insert_comment;
    $stmt=$dbh->prepare($insert_comment);
    $stmt->bindParam(":a_id",$a_id);
    $stmt->bindParam(":c_text",$c_text);
    $stmt->execute();
    return true;
}
function comment_delete($c_id){
    global $dbh,$delete_comment_by_id;
    $stmt=$dbh->prepare($delete_comment_by_id);
    $stmt->bindParam(":c_id",$c_id);
    $stmt->execute();
    return true;
}
function comment_select_all(){
    global $dbh,$select_all_comment;
    $stmt=$dbh->prepare($select_all_comment);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}

?>