<?php
session_start();
session_destroy();
/*
if (isset($_SESSION["daUserName"])){
    echo "退出登录失败";
    echo $_SESSION["daUserName"];
    die();
}*/
?>
<html>
<head>
<title>退出登录</title>
<meta meta="charset" content="utf-8"/>
<script type="text/javascript">
    var t = 5; // 设定跳转的时间
    setInterval("refer()", 1000); // 启动1秒定时
    function refer(){ 
       if (t == 0) {
             location = "admLogIn.html"; // 设定跳转的链接地址
        }
        document.getElementById('show').innerHTML = "" + t + "秒后跳转到登录页面<br/><a href = 'admLogIn.html'>现在跳转</a>"; // 显示倒计时
        t--; // 计数器递减    
    } 
 
</script>
</head>
<body>
    <div id='show'></div>
</body>
</html>
