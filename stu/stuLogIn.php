<!DOCTYPE html>
<html lang="en">
<head>
    <title>登录处理</title>
    <meta charset="UTF-8"/>
</head>
<body>
<?php
//echo 'hello';
session_start();
$_SESSION["pageuser"] = "";
$_SESSION["stuNo"] = "";
$stuNo = $_POST["stuNo"];
$stuPassword = $_POST["password"];

/*此处验证学号的正确性并进行处理*/
$stuNo = trim(HTMLSpecialchars($stuNo));
$stuPassword = trim(HTMLSpecialchars($stuPassword));
require "mysqlConfig.php";
$sql = "select name from student_info WHERE stuNo= '$stuNo' and password = '$stuPassword'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 0) {
    die("不存在此用户，请重新输入信息确认");
} else if (mysqli_num_rows($result) > 1) {
    die("存在多个你的用户信息，请联系管理员修正");
} else {
    echo 'mn';
    while ($row = mysqli_fetch_array($result)) {
        $pageuser = $row["name"];
        $_SESSION["pageuser"] = $row['name'];
        $_SESSION["stuNo"] = $stuNo;
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
</body>
</html>
