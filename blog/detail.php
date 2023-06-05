<?php
// require("D:\xampp\htdocs\api\article\show.php")
$a_id=$_GET['a_id'];
$base_url="http://localhost/api/article/show.php?";
$query=http_build_query(array('a_id'=>$a_id));
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$base_url.$query);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$res=curl_exec($ch);
$res=json_decode($res,true);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文章列表</title>
    <link rel="stylesheet" href="css/common.css">
   <script src="./js/jquery-3.7.0.js"></script>
   <link rel="stylesheet" href="css/common.css">
    <script src="./js/articleList.js"></script>

    <style>
        h2{
            background-color: rgba(100,99,160,60);
        }
        li{
            margin-bottom: 2vh;
            list-style:none;
            background-color: rgba(75,75,155,60);
        }
        a{
            color: bisque;
            /* display: inline-block; */
            /* background-color: rgb(229, 216, 122) */
        }
        .article-info{
            line-height: 1.8em;
            text-indent: 2em;
        }
        #article_title{
            text-align: center;
        }
        article{
            margin-top: 5vh;
            width: 90%;
            margin-right: auto;
            margin-left: auto;
        }
        .paragraph{
            text-indent: 2em;
            font-weight: normal;
            font-size: 16px;
        }

        
    </style>

</head>

<body>
    <div id="bigbox">
        <div id="banner">
            <!-- <img src="picture/banner.png" alt=""> -->
        </div>
        <nav>
            <a class="dangqian" href="index.html">首页</a>
            <a href="./articleList.html">短文</a>
            <a href="liuyan.html">留言板</a>
            <a href="l"></a>
            <a href="l"></a>
            <a href="l"></a>
            <a id="userStatus">~尚未登录~</a>
            <a id="loginHref" href="login.html">登录</a>
            <a id="registerHref" href="register.html">注册</a>
        </nav>
        <div id="main" >
            <main>
            <h1 id="article_title"><? echo $res['article_title']; ?> <h1>
            <!-- <p id="athor"> -->
                <? //echo $res['article_author']; ?>
            <!-- </p> -->
            <article>
            <?
           
            foreach (explode("\n",$res['article_text']) as $p) {
                echo '<p class="paragraph">';
                echo $p;
                echo "</p>";
            }

            ?>
             </article>
            </main>
        </div>
       
        <footer>
            <p>
                版权所有©*****
            </p>
        </footer>
    </div>

    <script>$(document).ready(function(){
    var user_id=localStorage.getItem('currentUserID');
    user_id=user_id?user_id:-1;
    if(user_id>0){
        //  获取并设置用户名
        $.get("../api/user/detail.php",{user_id},function(data,status){
            var username=JSON.parse(data).username;
            $("#userStatus").text("~"+username+"你已登录~");
        })
       
        $("#registerHref").hide();
        $("#loginHref").hide();
    }
})</script>
 
</body>

</html>
