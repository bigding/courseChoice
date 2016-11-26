<?php
session_start();
$_SESSION["pageuser"] = "";
$_SESSION["stuNo"] = "";
$stuNo = $_POST["stuNo"];
$password = $_POST["password"];

/*此处验证学号的正确性并进行处理*/
$stuNo = trim(HTMLSpecialchars($stuNo));
$password = trim(HTMLSpecialchars($password));

require "mysqlConfig.php";
$sql = "select name from student_info WHERE stuNo= '$stuNo' and password = '$password'";
echo $sql . "<br>";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 0) {
    die("不存在此用户，请重新输入信息确认");
} else if (mysqli_num_rows($result) > 1) {
    die("存在多个你的用户信息，请联系管理员修正");
} else {
    while ($row = mysqli_fetch_array($result)) {
        $pageuser = $row["name"];
        $_SESSION["pageuser"] = $row['name'];
        $_SESSION["stuNo"] = $stuNo;
        print_r($_SESSION);
        if ($_SESSION["pageuser"] != '' && $_SESSION["stuNo"] != '') {
            echo "成功登陆";
            echo "<script>
            window.location.href='information.php';
        </script>";
        } else {
            session_destroy();
            echo "登录失败";
        }
    }
}
if($_SESSION["pageuser"] == '' && $_SESSION["stuNo"] == '')
    session_destroy();
?>