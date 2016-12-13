<?php
header("Content-Type: text/html; charset=utf8");
session_start();
$_SESSION["daUserName"] = "";
$username = $_POST["daUserName"];
$password = $_POST["password"];

/*此处验证学号的正确性并进行处理*/
$username = trim(HTMLSpecialchars($username));
$password = trim(HTMLSpecialchars($password));

$servername = "localhost";
$databaseName = "coursechoice";

$conn = mysql_connect($servername, $username, $password, $databaseName);
if (!$conn) {
    die("连接到数据库发生错误");
} else {
    mysqli_set_charset($conn, "utf8");
    $_SESSION["daUserName"] = $username;
 //   echo "链接成功";
    echo mysqli_error($conn);
    echo '
    <script>
        window.location.href = "seeCourse.php";
    </script>
    ';

}

if ($_SESSION["daUserName"] == '')
    session_destroy();
?>
