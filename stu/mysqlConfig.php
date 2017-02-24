<?php
$servername = "123.206.44.141";
$username = "root";
$password = "LZ4fZHossCgP";
$databaseName = "coursechoice";

$conn = new mysqli($servername,$username,$password,$databaseName);
if(!$conn){
    die("连接到数据库错误：".mysqli_error($conn));
}else{
   echo "连接到数据库成功";
}
mysqli_set_charset($conn,"utf8")
?>
