<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>我的课表</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="../css/uniform.css"/>
    <link rel="stylesheet" href="../css/select2.css"/>
    <link rel="stylesheet" href="../css/matrix-style.css"/>
    <link rel="stylesheet" href="../css/matrix-media.css"/>
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/seeCouese.css">
</head>
<body>
<?php
require 'isLogin.php';
require "header.php";
?>
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"><a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a
                href="#" class="current">我的课表</a></div>
        <h1>我的课表</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-th"></i> </span>
                        <h5>我的课表</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <?php
                            $stuNo = $_SESSION['stuNo'];
                            require 'mysqlConfig.php';

                            $sql1 = "select * from course_info,choice_info where course_info.courseNo = choice_info.courseNo  and course_info.courseSeqNo = choice_info.courseSeqNo  and choice_info.stuNo = '$stuNo'";
                            //                            echo $sql1;
                            $result1 = mysqli_query($conn, $sql1);
//                                                        print_r($result1);
                            if (!$result1) {
                                echo "查询课表信息失败，请重新查询";
                            } else {
                                echo "
                                <thead>
                                    <tr>
                                        <th>上课时间</th>
                                        <th>周一</th>
                                        <th>周二</th>
                                        <th>周三</th>
                                        <th>周四</th>
                                        <th>周五</th>
                                        <th>周六</th>
                                        <th>周日</th>
                                    </tr>
                                </thead>
                                <tbody>
                                ";
                                $classTime = array("8:15-9:55", "10:15-11:50", "13:50-16:25", "16:45-18:20", "19:20-21:50");
                                $classInfo = array(
                                    array('', '', '', '', '', '', ''),
                                    array('', '', '', '', '', '', ''),
                                    array('', '', '', '', '', '', ''),
                                    array('', '', '', '', '', '', ''),
                                    array('', '', '', '', '', '', '')
                                );
                                while ($row1 = mysqli_fetch_array($result1)) {
                                    $classroom = implode(explode(':', $row1['classroom']));
                                    $courseName = $row1['courseName'];
                                    $teacherName = $row1['teacherName'];
                                    $courseTime = explode(":", $row1["courseTime"]);
                                    $classInfo[$courseTime[1] - 1][$courseTime[0] - 1] = $courseName . "<br/>" . $classroom . " " . $teacherName;
                                }
                                for ($i = 0; $i < 5; $i++) {
                                    echo '<tr class="odd gradeX">';
                                    echo '<td>' . $classTime[$i] . '</td>';
                                    for ($j = 0; $j < 7; $j++) {
                                        echo "<td>" . $classInfo[$i][$j] . "</td>";
                                    }
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                            }

                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                        <h5>详细课程信息</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th><input type="checkbox" id="title-table-checkbox" name="title-table-checkbox"/></th>
                                <th>课程名</th>
                                <th>课程号</th>
                                <th>课序号</th>
                                <th>教师姓名</th>
                                <th>教室</th>
                                <th>上课时间</th>
                                <th>学分</th>
                                <th>必/选修</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $sql2 = "select course_info.* from course_info,choice_info where course_info.courseNo = choice_info.courseNo  and course_info.courseSeqNo = choice_info.courseSeqNo  and choice_info.stuNo = '$stuNo'";
//                            echo $sql2."<br/>";
//                            $sql = 'select course_info.* from course_info order by courseName,courseNo,courseSeqNo';
                            $result2 = mysqli_query($conn, $sql2);
                            if (mysqli_num_rows($result2) == 0) {
                                echo "
                                <tr class=\"gradeX\">
                                    <td>没有查询结果</td>
                                </tr>
                                ";
                            } else {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    $roomTmp = explode(":",$row2["classroom"]);
                                    $room = implode($roomTmp);

                                    $classTimeTmp = explode(":",$row2["courseTime"]);
                                    $week = array("星期一","星期二","星期三","星期四","星期五","星期六","星期日");
                                    $timeBlock = array("8:15-9:55","10:15-11:50","13:50-16:25","16:45-18:20","19:20-21:50");
                                    $classTime = $week[$classTimeTmp[0] - 1]." ".$timeBlock[$classTimeTmp[1]-1];
                                    $essential = array("选修","必修");
                                    echo "
                                    <tr class=\"gradeX\">
                                        <td><input type=\"checkbox\" /></td>
                                        <td>" . $row2['courseName'] . "</td>
                                        <td>" . $row2['courseNo'] . "</td>
                                        <td>" . $row2['courseSeqNo'] . "</td>
                                        <td>" . $row2['teacherName'] . "</td>
                                        <td>" . $room. "</td>
                                        <td>" . $classTime . "</td>
                                        <td>" . $row2['grade'] . "</td>
                                        <td>" . $essential[$row2['essential']] . "</td>
                                        <td class=\"taskOptions\">
                                            <a class=\"tip\" href=\"stuCourseDelete.php?courseNo=".$row2['courseNo']."&courseSeqNo=".$row2['courseSeqNo']."\" title=\"添加\">
                                                <i class=\"icon-trash\"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    ";
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require 'footer.php';
?>
<!--end-Footer-part-->
<script src="../js/jquery.min.js"></script>
<script src="../js/jquery.ui.custom.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.uniform.js"></script>
<script src="../js/select2.min.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/matrix.js"></script>
<script src="../js/matrix.tables.js"></script>
</body>
</html>
