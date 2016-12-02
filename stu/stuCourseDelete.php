<?php
session_start();
require 'isLogin.php';
$courseNo = $_GET['courseNo'];
$courseSeqNo = $_GET['courseSeqNo'];
$stuNo = $_SESSION['stuNo'];

require "mysqlConfig.php";
$sql = "delete from choice_info where courseNo='$courseNo' and courseSeqNo = '$courseSeqNo'and stuNo='$stuNo'";
//echo $sql.'<br/>';
$result = mysqli_query($conn,$sql);
if(mysqli_affected_rows($conn) == 0) {
    echo '删除失败';
}
else{
    echo '删除课程成功';
}
?>
