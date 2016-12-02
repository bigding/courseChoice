<?php
session_start();
$_SESSION["daUserName"] = "";
$username = $_POST["daUserName"];
$password = $_POST["password"];

/*此处验证学号的正确性并进行处理*/
$username = trim(HTMLSpecialchars($username));
$password = trim(HTMLSpecialchars($password));

$servername = "123.206.44.141";
$databaseName = "coursechoice";

$conn = new mysqli($servername, $username, $password, $databaseName);
if (!$conn) {
    die("连接到数据库错误：" . mysqli_error($conn));
} else {
    mysqli_set_charset($conn, "utf8");
    $_SESSION["daUserName"] = $username;
    echo "链接成功";
    echo '
    <script>
        window.location.href = "seeCourse.php";
    </script>
    ';

}


if ($_SESSION["daUserName"] == '')
    session_destroy();
?>