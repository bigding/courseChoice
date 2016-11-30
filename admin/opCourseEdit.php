<?php
$courseId = $_POST['id'];
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
$grade = HTMLSpecialchars(trim($_POST["grade"]));
$essential = HTMLSpecialchars(trim($_POST["essential"]));
/*验证是否有字段没有被填写就提交了*/
if ($courseSeqNumber == "" || $teacherName == "" || $grade == "") {
    echo "请填写全部信息再提交";
} else {
    $classRoom = $building . ":" . $which . ":" . $floor . ":" . $room;
    $courseDateTime = $courseDate . ":" . $courseTime;
    require 'mysqlConfig.php';
    /*先判断课程的上课时间和地点与原有的课程是否冲突，如果不冲突再添加到数据库中*/
    $sql1 = "select * from course_info where id = '$courseId'";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1) > 0) {
        echo '上课时间以及地点与现有课程冲突,请重新添加';
    } else {
//                $sql3 = "insert into course_info(courseNo,courseSeqNo,courseTime,courseName,teacherName,classroom,grade,essential) VALUES
//          ('$courseNumber','$courseSeqNumber','$courseDateTime','$courseName','$teacherName','$classRoom','$grade','$essential')";
//                $result3 = mysqli_query($conn, $sql3);

    }
}


?>