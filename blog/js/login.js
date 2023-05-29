$(document).ready(function(){
    $("#loginDiv>button").click(function(){
        var uname=$("#username").val();
        var upass=$("#password").val();
        $.get("../api/user/login.php",{username: uname,password: upass},function(data,status){
            var res=JSON.parse(data);
            if(res.status==200){
                // 打印日志, 设置token,跳转登录后界面
                console.log("200 登录成功");
                localStorage.setItem('currentUserID',res.user_id);
                alert("登录成功, 即将跳转到主页~");
                window.location.href="../blog/index.html";
            }else{
                console.log("404 登录失败");
                alert("登录失败");
            }
        })
    })
})