<!DOCTYPE html>
<html lang="en">
<head>
    <title>查看课程</title>
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
require "header.php";
?>

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"><a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a
                href="#" class="current">查看课程</a></div>
        <h1>查看课程</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                        <h5>查看课程</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <?php
                            $courseName = HTMLSpecialchars(trim($_POST["courseName"]));
                            $courseNumber = HTMLSpecialchars(trim($_POST["courseNumber"]));
                            $courseSeqNumber = HTMLSpecialchars(trim($_POST["courseSeqNumber"]));
                            $teacherName = HTMLSpecialchars(trim($_POST["teacherName"]));
                            $courseDate = HTMLSpecialchars(trim($_POST["date"]));
                            $courseTime = HTMLSpecialchars(trim($_POST["time"]));

                            $where = "";
                            if ($courseName != "") {
                                if ($where == "" || empty($where)) {
                                    $where = 'courseName = "' . $courseName . '" ';
                                } else {
                                    $where = $where . 'and ' . 'courseName = "' . $courseName . '" ';
                                }
                            }
                            if ($courseNumber != "") {
                                if ($where == "") {
                                    $where = 'courseNo = "' . $courseNumber . '" ';
                                } else {
                                    $where = $where . 'and ' . 'courseNo = "' . $courseNumber . '" ';
                                }

                            }
                            if ($courseSeqNumber != "") {
                                if ($where == "") {
                                    $where = 'courseSeqNo = "' . $courseSeqNo . '" ';
                                } else {
                                    $where = $where . 'and ' . 'courseSeqNo = "' . $courseSeqNo . '" ';
                                }
                            }
                            if ($teacherName != "") {
                                if ($where == "") {
                                    $where = 'teacherName = "' . $teacherName . '" ';
                                } else {
                                    $where = $where . 'and ' . 'teacherName = "' . $teacherName . '" ';
                                }
                            }

                            /*当检索条件（除去时间部分）为空时*/
                            if($where == "" && ($courseDate == 0 && $courseTime == 0)){
                                echo "
                                <tr class=\"gradeX\">
                                    <td>请选择查询条件</td>
                                </tr>
                                ";
                            }
                            /*当检索条件不为空时，还需在其中检测时间这一条件*/
                            else{
                                require "mysqlConfig.php";

                                $sql = "select * from course_info where $where";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) == 0) {
                                    echo "
                                <tr class=\"gradeX\">
                                    <td>没有查询结果</td>
                                </tr>
                                ";
                                } else {
                                    echo "
                                    <thead>
                                    <tr>
                                        <th><input type=\"checkbox\" id=\"title-table-checkbox\" name=\"title-table-checkbox\"/></th>
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
                            ";
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "
                                <tr class=\"gradeX\">
                                    <td><input type=\"checkbox\" /></td>
                                    <td>" . $row['courseName'] . "</td>
                                    <td>" . $row['courseNo'] . "</td>
                                    <td>" . $row['courseSeqNo'] . "</td>
                                    <td>" . $row['teacherName'] . "</td>
                                    <td>" . $row['classroom'] . "</td>
                                    <td>" . $row['courseTime'] . "</td>
                                    <td>" . $row['grade'] . "</td>
                                    <td>" . $row['essential'] . "</td>
                                    <td class=\"taskOptions\">
                                        <a class=\"tip\" href=\"opAddCourse.php?courseNo=".$row['courseNo']."&courseSeqNo=".$row['courseSeqNo']."\" title=\"添加\">
                                            <i class=\"icon-edit\"></i>
                                        </a>
                                    </td>
                                </tr>
                                ";
                                    }
                                    echo "</tbody>";
                                }
                            }

                            ?>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require "footer.php";
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
