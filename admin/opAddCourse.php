<?php
$courseName = HTMLSpecialchars(trim($_POST["courseName"]));
$courseNumber = HTMLSpecialchars(trim($_POST["courseNumber"]));
$courseSeqNumber = HTMLSpecialchars(trim($_POST["courseSeqNumber"]));
$teacherName = HTMLSpecialchars(trim($_POST["teacherName"]));
$building = HTMLSpecialchars(trim($_POST["buliding"]));
$which = HTMLSpecialchars(trim($_POST["which"]));
$floor = HTMLSpecialchars(trim($_POST["floor"]));
$room = HTMLSpecialchars(trim($_POST["classroom"]));
$courseDate = HTMLSpecialchars(trim($_POST["date"]));
$courseTime = HTMLSpecialchars(trim($_POST["time"]));
$grade= HTMLSpecialchars(trim($_POST["grade"]));
$essential = HTMLSpecialchars(trim($_POST["essential"]));

$classRoom = $building.":".$which.":".$floor.":".$room;
$courseDateTime = $courseDate.":".$courseTime;
require  'mysqlConfig.php';
/*先判断课程是否冲突，如果不冲突再添加到数据库中*/
$sql1 = "select * from course_info where classroom='$classRoom' and courseTime='$courseDateTime'";
$result1 = mysqli_query($conn,$sql1);
echo mysqli_num_rows($result1)."<br/>".$sql1."<br/>";
if(mysqli_num_rows($result1) > 0){
    echo '上课时间以及地点与现有课程冲突,请重新选择';
}
else{
    $sql2 = "insert into course_info(courseNo,courseSeqNo,courseTime,courseName,teacherName,classroom,grade,essential) VALUES
          ('$courseNumber','$courseSeqNumber','$courseDateTime','$courseName','$teacherName','$classRoom','$grade','$essential')";

    echo $sql2.'<br>';
    $result2 = mysqli_query($conn,$sql2);
    if(mysqli_affected_rows($conn) == 1){
        echo "插入数据成功";
    }
    else{
        die("发生错误：".mysqli_error($conn));
    }
}
?>