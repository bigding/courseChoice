<?php
$courseNo = $_GET['courseNo'];
$courseSeqNo = $_GET['courseSeqNo'];
$pageUserNo = $_SESSION['stuNo'];

echo $_SESSION['stuNo'];

require 'mysqlConfig.php';
$sql1 = "select courseTime,classroom from course_info where courseNo ='$courseNo' and courseSeqNo='$courseSeqNo'";
$result1 = mysqli_query($conn,$sql1);
if(mysqli_num_rows($result1) == 0){
    echo '系统错误，请联系管理员（数据库当前查询不到指定的课程）';
}
else {
    $status = true;
    while ($row1 = mysqli_fetch_assoc($result1)){
        $courseTime = $row1['courseTime'];
        $classroom = $row1['classroom'];
        $sql2 = "select courseName from course_info 
                  where choice_info.courseNo = course_info.courseNo and
                  choice_info.courseSeqNo = course_info.courseSeqNo and
                  choice_info.stuNo = '$pageUserNo' and
                  course_info.courseTime = '$courseTime' and 
                  course_info.classroom = '$classroom'";
        echo $sql2."<br/>";
        $result2 = mysqli_query($conn,$sql2);
        if(mysqli_num_rows($result2) > 0){
            while($row2 = $result2){
                echo "你先添加的课程和您已有的课程冲突(".$row2['courseName'].")";
                $status = false;
                break;
            }
        }
        if(!$status)
            break;
    }
    if($status){
       $sql3 = "insert into choice_info (courseNo,courseSeqNo,stuNo) 
                values ('$courseNo','$courseSeqNo','$pageUserNo')";
        if(mysqli_affected_rows($conn) == 1){
            echo '添加课程成功';
        }
    }
}
?>
