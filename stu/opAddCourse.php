<?php
session_start();
require 'isLogin.php';
$courseNo = $_GET['courseNo'];
$courseSeqNo = $_GET['courseSeqNo'];
$pageUserNo = $_SESSION['stuNo'];

//echo $_SESSION['stuNo'];

//echo print_r($_SESSION);

require 'mysqlConfig.php';
$sql1 = "select courseTime,classroom from course_info where courseNo ='$courseNo' and courseSeqNo='$courseSeqNo'";
$result1 = mysqli_query($conn, $sql1);
if (mysqli_num_rows($result1) == 0) {
    echo '系统错误，请联系管理员（数据库当前查询不到指定的课程）';
} else {
    $status = true;
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $courseTime = $row1['courseTime'];
        $classroom = $row1['classroom'];
        $sql2 = "select courseName from course_info,choice_info
                  where course_info.courseNo = choice_info.courseNo and
                  course_info.courseSeqNo = choice_info.courseSeqNo and
                  choice_info.stuNo = '$pageUserNo' and
                  course_info.courseTime = '$courseTime'";
        $result2 = mysqli_query($conn, $sql2);
        if (mysqli_num_rows($result2) > 0) {
            while ($row2 = mysqli_fetch_array($result2)) {
                echo "你现在添加的课程和您已有的课程冲突(" . $row2['courseName'] . ")";
                $status = false;
                break;
            }
        }
        if (!$status)
            break;
    }
    if ($status) {
        $sql3 = "insert into choice_info (courseNo,courseSeqNo,stuNo) 
                values ('$courseNo','$courseSeqNo','$pageUserNo')";
        mysqli_query($conn, $sql3);
        if (mysqli_affected_rows($conn) == 1) {
            echo '添加课程成功<br/>';
        }
        /*查询此学生的总学分信息*/
        $sql4 = "select SUM(grade)
                from course_info
                where grade in(
                            select distinct grade
                            from course_info,choice_info
                            where course_info.courseNo = choice_info.courseNo 
                            and course_info.courseSeqNo = choice_info.courseSeqNo 
                            and choice_info.stuNo = '$pageUserNo'
                            );";
        $result4 = mysqli_query($conn,$sql4);
        $row4 = mysqli_fetch_array($result4);
        /*更新此学生的总学分信息*/
        $sql5 = "update student_info set totalGrade = '.$row4[0].'
                  where stuNo = '$pageUserNo'";
        $result5 = mysqli_query($conn,$sql5);
        if($result5){
            echo "更新学生总学分成功";
        }
    }
}
?>
