<?php
$dbms="mysql";
$host='localhost';
$dbName="blog";
$user='root';
$pass='';
$dsn="$dbms:host=$host;dbname=$dbName";



try{
    $dbh= new PDO($dsn,$user,$pass);

    
}catch(PDOException $e){
    die("ERROR: ".$e->getMessage()."<br/>");
    echo "123";
}


?>