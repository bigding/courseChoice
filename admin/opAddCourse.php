<?php
$courseName = HTMLSpecialchars(trim($_POST["courseName"]));
$courseNumber = HTMLSpecialchars(trim($_POST["courseNumber"]));
$courseSeqNumber = HTMLSpecialchars(trim($_POST["courseSeqNumber"]));
$teacherName = HTMLSpecialchars(trim($_POST["teacherName"]));
$classRoom = HTMLSpecialchars(trim($_POST["buliding"])).HTMLSpecialchars(trim($_POST["which"])).HTMLSpecialchars(trim($_POST["floor"])).HTMLSpecialchars(trim($_POST["classroom"]));
$courseDate = HTMLSpecialchars(trim($_POST["date"]));
$courseTime = HTMLSpecialchars(trim($_POST["time"]));
$grade= HTMLSpecialchars(trim($_POST["grade"]));
$essential = HTMLSpecialchars(trim($_POST["essential"]));

$courseDateTime = $courseDate.":".$courseTime;
require  'mysqlConfig.php';
$sql = "insert into course_info(courseNo,courseSeqNo,courseTime,courseName,teacherName,classroom,grade,essential) VALUES
          ('$courseNumber','$courseSeqNumber','$courseDateTime','$courseName','$teacherName','$classRoom','$grade','$essential')";

echo $sql.'<br>';
$result = mysqli_query($conn,$sql);
if(mysqli_affected_rows($conn) == 1){
    echo "插入数据成功";
}
else{
    die("发生错误：".mysqli_error($conn));
}
?>