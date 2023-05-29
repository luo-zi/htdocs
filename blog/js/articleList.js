$(document).ready(function(){
    console.log("some")


    $.get("../api/article/list.php",function(data,status){

        var resArr=JSON.parse(data);
       
        var list=$("#main>main>ul");
        resArr.forEach(element => {
            var li=$('<li style="display: flex; flex-direction: column;"></li>');
           
            li.append($('<h2 class="article-title" style="flex-basis=10%;" ></h2>').text(element.article_title));
            
            var rightArea=$('<div style="display: flex;flex-basis=75%;"></div>')
            rightArea.append($('<span class="article-info" style="flex-basis: 70%"></span>').text("简介:"+element.article_info));
            rightArea.append($("<a>查看文章</a>").attr("href","http://localhost/blog/detail.php?article_id="+element.article_id));
            
            li.append(rightArea);

            list.append(li);
        });
    })
})