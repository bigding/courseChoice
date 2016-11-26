<?php
$name = $_POST['username'];
$password = $_POST['password'];
if($name == '' || $password == ""){
    echo "请输入完整的登录信息再提交";
}
else{
    require "mysqlConfig.php";
    $sql = "select name,stuNo from student_info where name = '$name' and password = '$password'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 1){
        echo "数据库中存在多个你的用户名和密码，请联系管理员处理";
    }
    else if(mysqli_num_rows($result) == 0){
        echo "登录信息不正确,请填写了正确的信息再登录";
    }
    else{
        session_start();
        $_SESSION['name'] = $name;
        echo "登录成功";
    }
}
?>
