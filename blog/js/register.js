$(document).ready(function(){
    $("#RegisterDiv>button").click(function(){
        var uname=$("#username").val();
        var upass=$("#password").val();
        $.get("../api/user/register.php",{username: uname,password: upass},function(data,status){
            var res=JSON.parse(data);
            if(res.status==200){
                // 打印日志, 设置token,跳转注册后界面
                console.log("200 注册成功");
                localStorage.setItem('currentUserID',res.user_id);
                alert("注册成功, 即将跳转到登录页面~");
                window.location.href="../blog/login.html";
                
            }else{
                console.log("500 注册失败");
                alert("注册失败");
            }
        })
    })
})