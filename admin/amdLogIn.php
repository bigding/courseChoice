<?php
$userId = $_POST["userid"];
$password = $_POST["password"];

/*此处验证学号的正确性并进行处理*/
$userId = trim(HTMLSpecialchars($userId));
$password= trim(HTMLSpecialchars($password));

require "mysqlConfig.php";
$sql = "select * from student_info WHERE stuNo= {$userId} and password = {$password}";
echo $sql."<br>";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) == 0){
    die("不存在此用户，请重新输入信息确认");
}
else if(mysqli_num_rows($result) > 1){
    die("存在多个你的用户信息，请联系管理员修正");
}
else{
    while ($row = mysqli_fetch_array($result)){
        $pageuser = $row["name"];
    }
    session_start();
    $_SESSION["pageuser"] = $pageuser;
    echo"成功登陆";
    echo "<script>
            window.location.href='seeCourse.php'
        </script>";
}
?>
