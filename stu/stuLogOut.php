<?php
session_start();
session_destroy();
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
<<<<<<< HEAD
             location = "index.html"; // 设定跳转的链接地址
        }
        document.getElementById('show').innerHTML = "" + t + "秒后跳转到登录页面<br/><a href = 'index.html'>现在跳转</a>"; // 显示倒计时
=======
             location = "index.html"; // 设定跳转的链接地址
        }
        document.getElementById('show').innerHTML = "" + t + "秒后跳转到登录页面<br/><a href = 'index.html'>现在跳转</a>"; // 显示倒计时
>>>>>>> 63f680e139178e332f9c17c2b5e27154939aa4e8
        t--; // 计数器递减    
    } 
 
</script>
</head>
<body>
    <div id='show'></div>
</body>
</html>
