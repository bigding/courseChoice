<html>
<head>
<title>退出登录</title>
<script type="text/javascript">
    var t = 5; // 设定跳转的时间
    setInterval("refer()", 1000); // 启动1秒定时
    function refer(){ 
       if (t == 0) {
             location = "seeCourse.php"; // 设定跳转的链接地址
        }
        document.getElementById('show').innerHTML = "" + t + "秒后跳转到查看课程页面<br/><a href = 'seeCourse.php'>现在跳转</a>"; // 显示倒计时
        t--; // 计数器递减    
    } 
 
</script>
</head>
<body>
    <div>
<?php
session_start();
require 'isLogin.php';
$courseId = $_GET['id'];
require 'mysqlConfig.php';
$sql1 = "select courseNo,courseSeqNo from course_info where id='$courseId'";
$result1 = mysqli_query($conn,$sql1);
if(mysqli_num_rows($result1) == 0 || !$result1){
    echo '删除出错，请重新操作或联系管理员';
}
else{
    $row1 = mysqli_fetch_assoc($result1);
    $sql2 = "delete from choice_info where courseNo = '{$row1['courseNo']}' and courseSeqNo = '{$row1['courseSeqNo']}'";
    $result2 = mysqli_query($conn,$sql2);
    $sql3 = "delete from course_info where id = '$courseId'";
    //echo $sql2.'<br/>'.$sql3;
    $result3 = mysqli_query($conn,$sql3);
    if($result2&&!$result3){
        echo '删除课程信息';
    }
    elseif(!$result2&&$result3){
        echo '删除选课信息';
    }
    elseif(!$result2&&!$result3){
        echo '没有成功删除信息';
    }
    else{
        echo "成功";
    }

}
?>

    </div>
    <div id='show'></div>
</body>
</html>

