<?php
session_start();
$_SESSION["daUserName"] = "";
$username = $_POST["daUserName"];
$password = $_POST["password"];

/*此处验证学号的正确性并进行处理*/
$userName= trim(HTMLSpecialchars($daUserName));
$password = trim(HTMLSpecialchars($password));

$servername = "localhost";
$databaseName = "coursechoice";

$conn = new mysqli($servername,$username,$password,$databaseName);
if(!$conn){
    die("连接到数据库错误：".mysqli_error($conn));
}
else{
    mysqli_set_charset($conn,"utf8");
    $_SESSION["daUserName"] = $username;
}


if($_SESSION["daUserName"] == '')
    session_destroy();
?>