<?php
session_start();
require 'isLogin.php';
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
             location = "studentCourseTable.php"; // 设定跳转的链接地址
        }
        document.getElementById('show').innerHTML = "" + t + "秒后跳转到课表页面<br/><a href = 'studentCourseTable.php'>现在跳转</a>"; // 显示倒计时
        t--; // 计数器递减    
    } 
 
</script>
</head>
<body>
    <div>
<?php
$courseNo = $_GET['courseNo'];
$courseSeqNo = $_GET['courseSeqNo'];
$stuNo = $_SESSION['stuNo'];

require "mysqlConfig.php";
$sql = "delete from choice_info where courseNo='$courseNo' and courseSeqNo = '$courseSeqNo'and stuNo='$stuNo'";
//echo $sql.'<br/>';
$result = mysqli_query($conn,$sql);
if(mysqli_affected_rows($conn) == 0) {
    echo '删除失败';
}
else{
    echo '删除课程成功';
}
?>
    </div>
    <div id='show'></div>
</body>
</html>
