<!DOCTYPE html>
<html lang="en">
<head>
    <title>修改课程</title>
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
require "header.php";
?>
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"><a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a
                href="#" class="current">添加课程</a></div>
        <h1>添加课程</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>添加课程</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="opCourseEdit.php" name="basic_validate" id="basic_validate" novalidate="novalidate">
                            <?php
                            $courseId = $_GET['id'];
                            echo '
                            <input type = "text" value="'.$courseId.'" name="id" class="hidden"/>
                            ';
                            require 'mysqlConfig.php';
                            $sql1 = "select * from course_info where id = '$courseId'";
                            $result1 = mysqli_query($conn,$sql1);
                            if(!$result1){
                                echo "获取课程信息出错，请重新编辑课程";
                            }
                            else{
                                $row = mysqli_fetch_assoc($result1);

                                echo '
                                    <div class="control-group">
                                        <label class="control-label">课程名</label>
                                        <div class="controls">
                                            <input type="text" name="courseName" id="courseName" value = "'.$row["courseName"].'" readonly>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">课程号</label>
                                        <div class="controls">
                                            <input type="text" name="courseNumber" id="courseNumber" value="'.$row["courseNo"].'" readonly>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">课序号</label>
                                        <div class="controls">
                                            <input type="text" name="courseSeqNumber" id="courseSeqNumber" value = "'.$row["courseSeqNo"].'"  readonly>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">教师姓名</label>
                                        <div class="controls">
                                            <input type="text" name="teacherName" id="teacherName" value="'.$row["teacherName"].'">
                                        </div>
                                    </div>
                                ';

                                $classroom = explode(':',$row['classroom']);
                                echo '
                                    <div class="control-group">
                                    <label class="control-label">教室</label>
                                    <div class="controls">
                                        <select name="buliding">';
                                if($classroom[0] == "一教"){
                                    echo '
                                            <option value="一教" selected>一教</option>
                                            <option value="综合楼">综合楼</option>
                                            <option value="二基楼">二基楼</option>';
                                }
                                if($classroom[0] == "综合楼"){
                                    echo '
                                            <option value="一教" >一教</option>
                                            <option value="综合楼" selected>综合楼</option>
                                            <option value="二基楼">二基楼</option>';
                                }
                                if($classroom[0] == "二基楼"){
                                    echo '
                                            <option value="一教">一教</option>
                                            <option value="综合楼">综合楼</option>
                                            <option value="二基楼" selected>二基楼</option>';
                                }

                                echo '
                                        </select>
                                        <select name="which">';

                                $which = array("a","b","c","d");
                                foreach ($which as $option){
                                    if($option == $classroom[1]){
                                        echo '<option value="'.$option.'" selected>'.$option.'</option>';
                                    }
                                    else{
                                        echo '<option value="'.$option.'">'.$option.'</option>';
                                    }
                                }

                                echo '  </select>
                                        <select name="floor">';
                                $floor = array(1,2,3,4,5,6);
                                $floor_name = array("一楼","二楼","三楼","四楼","五楼","六楼");
                                foreach ($floor as $option){
                                    if($option != $classroom[2]){
                                        echo '<option value="'.$option.'">'.$floor_name[$option-1].'</option>';
                                    }
                                    else{
                                        echo '<option value="'.$option.'" selected>'.$floor_name[$option-1].'</option>';
                                    }
                                }

                                echo '  </select>
                                        <select name = "classroom">';
                                $roomNo = array('01','02','03','04','05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24');
                                foreach ($roomNo as $item) {
                                    if($item != $classroom[3]){
                                        echo '<option value="'.$item.'">'.$item.'</option>';
                                    }
                                    else{
                                        echo '<option value="'.$item.'" selected>'.$item.'</option>';
                                    }
                                }
                                echo'        </select>
                                    </div>
                                </div>
                                ';

                                /*现在选中的是星期几*/
                                echo '                            
                                    <div class="control-group">
                                        <label class="control-label">上课时间</label>
                                        <div class="controls">
                                            <select name="date">';
                                $courseTime = explode(':',$row['courseTime']);
                                $weekday = array(1,2,3,4,5,6,7);
                                $weekdayName = array("周一","周二","周三","周四","周五","周六","周日");
                                foreach ($weekday as $item) {
                                    if($item != $courseTime[0]){
                                        echo '<option value="'.$item.'">'.$weekdayName[$item - 1].'</option>';
                                    }
                                    else{
                                        echo '<option value="'.$item.'" selected>'.$weekdayName[$item - 1].'</option>';
                                    }
                                }
                                echo '                                    
                                    </select>
                                    <select name="time">';
                                $classOrder = array(1,2,3,4,5);
                                $classOrderName = array("早上1-2节","早上3-4节","下午5-6节","下午7-9节","晚上10-12节");
                                foreach ($classOrder as $item) {
                                    if($item != $courseTime[1]){
                                        echo '<option value="'.$item.'">'.$classOrderName[$item-1].'</option>';
                                    }
                                    else{
                                        echo '<option value="'.$item.'" selected>'.$classOrderName[$item-1].'</option>';
                                    }
                                }
                                echo '
                                            </select>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">学分</label>
                                        <div class="controls">
                                            <input type="text" name="grade" id="credit" value="'.$row["grade"].'">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">必/选修</label>
                                        <div class="controls">';
                                if($row['essential'] == 0){
                                    echo ' 
                                        <label>
                                            <input type="radio" name="essential" value="1"/>
                                            必修
                                        </label>
                                        <label>
                                            <input type="radio" name="essential" value="0" checked/>
                                            选修
                                        </label>
                                    ';
                                }
                                else{
                                    echo ' 
                                        <label>
                                            <input type="radio" name="essential" value="1" checked/>
                                            必修
                                        </label>
                                        <label>
                                            <input type="radio" name="essential" value="0"/>
                                            选修
                                        </label>
                                    ';
                                }
                                echo '
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <input type="submit" value="Validate" class="btn btn-success">
                                </div>';
                            }
                            ?>
                        </form>
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
<script src="../js/jquery.validate.js"></script>
<script src="../js/matrix.js"></script>
</body>
</html>
