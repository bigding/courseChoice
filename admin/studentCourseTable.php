<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>查看学生课程信息-单人</title>
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
                href="#" class="current"><?php echo $_GET['stuName']?>的课表</a></div>
        <h1><?php echo $_GET['stuName']?>的课表</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                        <h5><?php echo $_GET['stuName']?>的课表</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <?php
                            $stuNo = $_GET['stuNo'];
                            require  'mysqlConfig.php';

                            $sql1 = "select * from course_info,choice_info where course_info.courseNo = choice_info.courseNo  and course_info.courseSeqNo = choice_info.courseSeqNo  and choice_info.stuNo = '$stuNo'";
                            //                            echo $sql1;
                            $result1 = mysqli_query($conn,$sql1);
                            //                            print_r($result1);
                            if(mysqli_num_rows($result1) == 0){
                                echo "查询课表信息失败，请重新查询";
                            }
                            else{
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
                                $classTime = array("8:15-9:55","10:15-11:50","13:50-16:25","16:45-18:20","19:20-21:50");
                                $classInfo =  array(
                                    array('','','','','','',''),
                                    array('','','','','','',''),
                                    array('','','','','','',''),
                                    array('','','','','','',''),
                                    array('','','','','','','')
                                );
                                while($row1 = mysqli_fetch_array($result1)){
                                    $classroom = implode(explode(':',$row1['classroom']));
                                    $courseName = $row1['courseName'];
                                    $teacherName = $row1['teacherName'];
                                    $courseTime = explode(":",$row1["courseTime"]);
                                    $classInfo[$courseTime[1]-1][$courseTime[0]-1] = $courseName."<br/>".$classroom." ".$teacherName;
                                }
                                for($i = 0; $i < 5; $i++){
                                    echo '<tr class="odd gradeX">';
                                    echo '<td>'.$classTime[$i].'</td>';
                                    for($j = 0; $j < 7; $j++){
                                        echo "<td>".$classInfo[$i][$j]."</td>";
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
