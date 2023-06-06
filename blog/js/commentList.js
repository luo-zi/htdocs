$(document).ready(function(){
    $.get("../api/comment/list.php",function(data,status){
        var resArr=JSON.parse(data);
        var list=$("#main>main>ul");
        resArr.forEach(element => {
            var li=$("<li></li>");
            var Tspan=$("<span></span>").text("评论: "+element.comment_text);
            li.append(Tspan);
            if(localStorage.getItem("currentUserID")==element.author_id){
                var deleteBtn=$("<a>删除</a>").attr("href","http://localhost/api/comment/delete.php?c_id="+element.comment_id);
                li.append(deleteBtn);
            }
            list.append(li);
        });
    });
    $("#addComment").click(function(){
        var text=prompt("创建新的留言");
        $.post("../api/comment/create.php",{"a_id": parseInt(localStorage.getItem("currentUserID")),"c_text": text},function(data,status){
            console.log(JSON.parse(data));
            window.location.reload();
        })
    })

})