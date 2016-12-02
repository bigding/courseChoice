<?php
session_start();
require 'isLogin.php';
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
    if (!$result1) {
        echo "修改课程失败（查询原有课程信息出错）";
    } else {
//        echo '=.='.$courseId."<br/>";
        $row1 = mysqli_fetch_assoc($result1);
        /*判断上课时间和地点是不是改变了，如果改变了的话，先查询现在的课程时间和地点是不是和已有的课程冲突了*/
        if ($row1["classroom"] != $classRoom || $row1["courseTime"] != $courseDateTime) {
            $sql2 = "select * from course_info where courseTime = '$courseDateTime' and classroom = '$classRoom'";
//            echo $sql2."<br/>";
            $result2 = mysqli_query($conn, $sql2);
            if (mysqli_num_rows($result2) > 0) {
                echo "上课时间以及地点与现有课程冲突,请重新修改";
            } else {
                $sql3 = "update course_info set courseTime = '$courseDateTime',classroom='$classRoom',teacherName = '$teacherName',
                          grade = '$grade',essential = '$essential' where id = '$courseId'";
                $result3 = mysqli_query($conn, $sql3);
                if (mysqli_affected_rows($conn) == 1) {
                    echo '更新数据成功';
                }
            }
        } /*当课程地点和时间没有更改时*/
        else {
//            echo "hello<br/>";
            $sql3 = "";
            if ($row1['teacherName'] != $teacherName) {
                $sql3 = "update course_info set teacherName = '$teacherName";
            }
            if ($row1['grade'] != $grade) {
                if ($sql3 == "") {
                    $sql3 = "update course_info set grade = '$grade'";
                } else {
                    $sql3 = $sql3. ",grade = '$grade'";
                }
            }
            if ($row1['essential'] != $essential) {
                if ($sql3 == "") {
                    $sql3 = "update course_info set grade = '$essential'";
                } else {
                    $sql3 = $sql3. ",essential  = '$essential'";
                }
            }
            if ($sql3 == "") {
                echo "没有更新课程信息，请再次提交修改信息";
            } else {
                $sql3 = $sql3." where id='$courseId'";
//                echo $sql3;
                $result3 = mysqli_query($conn, $sql3);
                if (mysqli_affected_rows($conn) == 1) {
                    echo '更新数据成功';
                }
            }
        }
    }
}


?>