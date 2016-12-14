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
             location = "addStudent.php"; // 设定跳转的链接地址
        }
        document.getElementById('show').innerHTML = "" + t + "秒后跳转到添加学生页面<br/><a href = 'addStudent.php'>现在跳转</a>"; // 显示倒计时
        t--; // 计数器递减    
    } 
 
</script>
</head>
<body>
    <div>
<?php
$name = HTMLSpecialchars(trim($_POST["name"]));
$password = HTMLSpecialchars(trim($_POST["password"]));
$stuNo = HTMLSpecialchars(trim($_POST["stuNo"]));
$college = HTMLSpecialchars(trim($_POST["college"]));
$major = HTMLSpecialchars(trim($_POST["major"]));
$classNo = HTMLSpecialchars(trim($_POST["classNo"]));
/*验证是否有字段没有被填写就提交了*/

if (!preg_match("/\b\d{13}\b/i", $stuNo) || !preg_match("/\b\d{6}\b/i", $password) || !preg_match("/\b\d{1,2}\b/i", $classNo)) {
    echo "您的数据格式不正确，学号为13位数字，密码为6为数字，班号为两位以内数字，请仔细核对";
}
else{

    require "mysqlConfig.php";
    $sql1 = "select * from student_info where stuNo='$stuNo'";
    $result1 = mysqli_query($conn,$sql1);
    if(mysqli_num_rows($result1) == 1){
        echo "此学生已经存在于数据库，请重新添加";
    }
    else{
        $sql2 = "insert into student_info (name,password,stuNo,college,major,classNo,totalGrade)
            values('$name','$password','$stuNo','$college','$major','$classNo','0')";
        $result2 = mysqli_query($conn,$sql2);
        if(mysqli_affected_rows($conn) == 1){
            echo '添加学生成功';
        }   
        else{
            echo '添加学生失败';
        }
    }
}
?>
    </div>
    <div id='show'></div>
</body>
</html>
