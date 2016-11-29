<?php
$courseId = $_GET['id'];
require 'mysqlConfig.php';
$sql = "delete from course_info where id = '$courseId'";
$result = mysqli_query($conn,$sql);
if($result){
    echo '删除课程成功';
}
?>
