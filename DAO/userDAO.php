<?php
require_once(dirname(__FILE__)."/../DButil.php");

// 添加用户
$insert_user="insert into User (username,password) values(:username,:password)";

// 查找所有用户
$select_all_sql="select * from User";

// 根据用户名查找用户
$select_by_username="select * from User where username=:username";

// 根据ID查找用户`
$select_by_ID="select username from User where user_id=:user_id";

// 根据ID 删除用户
$delete_by_ID="delete from User where user_id=:user_id";

// 根据ID 更新用户名和密码
$update_by_ID="update User set username=:username,password=:password where user_id=:user_id";

// 用户登录
$user_login="select user_id from User where username=:username and password=:password";

function valid_user($username,$password){
    if(preg_match('/^[A-Za-z0-9_\x{4e00}-\x{9fa5}]+$/u',$username) 
    and
    preg_match('/^[a-zA-Z\d_]{8,}$/',$password) //一大一小一数一符号 6+
    ){ 
        return true;
    }else{
        return false;
    }
}
    function user_insert($username,$password){
        global $dbh,$insert_user;
        if(valid_user($username,$password)){
            $stmt=$dbh->prepare($insert_user);
            $stmt->bindParam(":username",$username);
            $stmt->bindParam(":password",$password);
            $stmt->execute();
            return $dbh->lastInsertId();
        }
        return false;
    }
function user_select_all(){
    global $dbh,$select_all_sql;
    $stmt=$dbh->prepare($select_all_sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}
function user_select_by_ID($user_id){
    global $dbh,$select_by_ID;
    $stmt=$dbh->prepare($select_by_ID);
    $stmt->bindParam(":user_id",$user_id);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetch();
}
function user_delete_by_ID($user_id){
    global $dbh,$delete_by_ID;
    $stmt=$dbh->prepare($delete_by_ID);
    $stmt->bindParam(":user_id",$user_id);
    return $stmt->execute();
}
function user_update_by_ID($user_id,$username,$password){
    global $dbh,$update_by_ID;
    $stmt=$dbh->prepare($update_by_ID);
    $stmt->bindParam(":user_id",$user_id);
    $stmt->bindParam(":username",$username);
    $stmt->bindParam(":password",$password);
    return $stmt->execute();
}
function user_login($username,$password){
    global $dbh,$user_login;
    $stmt=$dbh->prepare($user_login);
    $stmt->bindParam(":username",$username);
    $stmt->bindParam(":password",$password);
    $stmt->execute();
    return $stmt->fetch();
}
?>