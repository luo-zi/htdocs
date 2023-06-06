$(document).ready(function(){
    // console.log("some")


    $.get("../api/article/list.php",function(data,status){

        var resArr=JSON.parse(data);
       
        var list=$("#main>main>ul");
        resArr.forEach(element => {
            var li=$('<li style="display: flex; flex-direction: column;"></li>');
           
            li.append($('<h2 class="article-title" style="flex-basis=10%;" ></h2>').text(element.article_title));
            
            var rightArea=$('<div style="display: flex;flex-basis=75%;"></div>')
            rightArea.append($('<span class="article-info" style="flex-basis: 70%"></span>').text("简介:"+element.article_info));
            rightArea.append($("<a style='margin-right: 1em';>查看</a>").attr("href","http://localhost/blog/detail.php?a_id="+element.article_id));
            console.log("++"+element.article_author_id);
            console.log("--"+localStorage.getItem("currentUserID"));
            if(localStorage.getItem("currentUserID")==element.article_author_id){
                rightArea.append($("<a style='margin-right: 1em;'>删除</a>").attr("href","http://localhost/api/article/delete.php?a_id="+element.article_id));
                rightArea.append($("<a>修改</a>").attr("href","http://localhost/blog/addOrUpdateArticle.php?mode=update&a_id="+element.article_id));
            }
            li.append(rightArea);

            list.append(li);
        });
    });
    $("#addArticle").click(function(){
        window.location.href="http://localhost/blog/addOrUpdateArticle.php?mode=add&aa_id="+localStorage.getItem("currentUserID");
    })
})