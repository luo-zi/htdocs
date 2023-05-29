<?php
require_once("/app/DAO/userDAO.php");

$testID=-1;

function testInsert(){
    global $testID;
    $testID=user_insert("1355558a_","825115zZ_");
    return true;
}

function testSelectAll(){
    $res=user_select_all();
    // print_r($res);
    $string="";
    if($res){
        foreach($res[0] as $k=>$v){
            $string.=$k."=>".$v."<br/>";
        }
    }
    return $string;
}

function testSelectByID($user_id){
    $res=user_select_by_ID($user_id);
    return $res;
}

function testDeleteByID($user_id){
    $res=user_delete_by_ID($user_id);
    return $res;
}

function testUpdateByID($user_id,$username,$password){
    $res=user_update_by_ID($user_id,$username,$password);
    return $res;
}
function testUserLogin($username,$password){
    $res=user_login($username,$password);
   return $res;
}
// echo "123";
testInsert();
print_r(testSelectAll());

// $run_res=array(
// testInsert(),
// testSelectAll(),
// testUpdateByID($testID,"1233ljt","82551158zZ"),
// testSelectByID($testID),
// testDeleteByID($testID),
// );

// foreach($run_res as  $k){
//     print_r($k);
//     echo "<br/>";
// }
// print(json_encode(testUserLogin("1355528a_","82551158zZ")));
// echo "<br/>";
// print(json_encode(testUserLogin("1355528a_","82551158")));
// preg_match(, '/user/12345', $matches);
// print_r($matches);
?>