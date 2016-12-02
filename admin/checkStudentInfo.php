<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>查看学生课程信息-总览</title>
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
    <link rel="stylesheet" href="../css/seeCouese.css">
</head>
<body>

<?php
require 'isLogin.php';
require "header.php";
?>
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"><a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a
                href="#" class="current">查看学生课程信息</a></div>
        <h1>查看学生课程信息</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                        <h5>查看学生选课信息</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>姓名</th>
                                <th>学号</th>
                                <th>学院</th>
                                <th>专业</th>
                                <th>班级</th>
                                <th>本学期学分</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            require 'mysqlConfig.php';
                            $sql = "select * from student_info";
                            $result = mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result) == 0){
                                echo "
                                    <tr class=\"gradeX\">
                                        <td>没有数据被查询到</td>
                                    </tr>
                                ";
                            }
                            else{
                                while($row = mysqli_fetch_assoc($result)){
                                    echo '
                                        <tr class="gradeX">
                                            <td>'.$row["name"].'</td>
                                            <td>'.$row["stuNo"].'</td>
                                            <td>'.$row["college"].'</td>
                                            <td>'.$row["major"].'</td>
                                            <td>'.$row["classNo"].'</td>
                                            <td>'.$row["totalGrade"].'</td>
                                            <td class="taskOptions">
                                                <a class="tip" href="studentCourseTable.php?stuNo='.$row['stuNo'].'&stuName='.$row['name'].'" title="查看详情">
                                                    <i class="icon-search"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    ';
                                }
                            }
                            ?>
<!--                            <tr class="gradeX">-->
<!--                                <td>大定</td>-->
<!--                                <td>1110222</td>-->
<!--                                <td>计算机学院</td>-->
<!--                                <td>计算机科学与技术</td>-->
<!--                                <td>3</td>-->
<!--                                <td>24</td>-->
<!--                                <td class="taskOptions">-->
<!--                                    <a class="tip" href="#" title="查看详情">-->
<!--                                        <i class="icon-search"></i>-->
<!--                                    </a>-->
<!--                                </td>-->
<!--                            </tr>-->
                            </tbody>
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
