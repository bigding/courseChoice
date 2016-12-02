<?php
session_start();
require 'isLogin.php';
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
if ($courseName == "" || $courseNumber == "" || $courseSeqNumber == "" || $teacherName == "" || $grade == "") {
    echo "请填写全部信息再提交";
} else {
    if (!preg_match("/\b\d{9}\b/i", $courseNumber) || !preg_match("/\b\d{2}\b/i", $courseSeqNumber) || !preg_match("/\b\d{1}\b/i", $grade)) {
        echo "课程号为9为数字组成，课序号为2位数字组成，学分为1位数字。请检查错误并修改再提交";
    } else {
        $classRoom = $building . ":" . $which . ":" . $floor . ":" . $room;
        $courseDateTime = $courseDate . ":" . $courseTime;
        require 'mysqlConfig.php';
        /*先判断课程是否冲突，如果不冲突再添加到数据库中*/
        $sql1 = "select * from course_info where classroom='$classRoom' and courseTime='$courseDateTime'";
        $result1 = mysqli_query($conn, $sql1);

        if (mysqli_num_rows($result1) > 0) {
            echo '上课时间以及地点与现有课程冲突,请重新添加';
        } else {
            /*判断插入的课序号与课程名是否和现有的匹配*/
            $sql2 = "select courseName from  course_info where courseNo='$courseNumber'";
            $result2 = mysqli_query($conn, $sql2);
            /*如果课程号已存在，则判断了过后再向数据库中添加数据*/
            if (mysqli_num_rows($result2) > 1) {
                $row = mysqli_fetch_array($result2);
                if ($row['courseName'] != $courseName) {
                    echo "课程号与课程名不匹配,请重新添加";
                } else {
                    $sql3 = "insert into course_info(courseNo,courseSeqNo,courseTime,courseName,teacherName,classroom,grade,essential) VALUES
          ('$courseNumber','$courseSeqNumber','$courseDateTime','$courseName','$teacherName','$classRoom','$grade','$essential')";
                  $result3 = mysqli_query($conn, $sql3);
                    if (mysqli_affected_rows($conn) == 1) {
                        echo "插入数据成功(这是一门已经存在的课程)";
                    } else {
                        die("发生错误：" . mysqli_error($conn));
                    }
                }
            }
            /*如果课程号不存在，则直接插入*/
            else {
                $sql3 = "insert into course_info(courseNo,courseSeqNo,courseTime,courseName,teacherName,classroom,grade,essential) VALUES
          ('$courseNumber','$courseSeqNumber','$courseDateTime','$courseName','$teacherName','$classRoom','$grade','$essential')";
                $result3 = mysqli_query($conn, $sql3);
                if (mysqli_affected_rows($conn) == 1) {
                    echo "插入数据成功(这是一门新的课程)";
                } else {
                    die("发生错误：" . mysqli_error($conn));
                }
            }
        }
    }
}


?>