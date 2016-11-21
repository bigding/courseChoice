<?php
$servername = "localhost";
$username = "course";
$password = "123456";
$databaseName = "coursechoice";

$conn = new mysqli($servername,$username,$password,$databaseName);
if(!$conn){
    die("连接到数据库错误：".mysqli_error($conn));
}
?>