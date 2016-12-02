<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>选择课程</title>
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
                href="#" class="current">选择课程</a></div>
        <h1>选择课程</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>选择课程</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="searchCourse.php" name="basic_validate"
                              id="basic_validate" novalidate="novalidate">
                            <div class="control-group">
                                <label class="control-label">课程名</label>
                                <div class="controls">
                                    <input type="text" name="courseName" id="courseName">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">课程号</label>
                                <div class="controls">
                                    <input type="text" name="courseNumber" id="courseNumber">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">课序号</label>
                                <div class="controls">
                                    <input type="text" name="courseSeqNumber" id="courseSeqNumber">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">教师姓名</label>
                                <div class="controls">
                                    <input type="text" name="teacherName" id="teacherName">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">上课时间</label>
                                <div class="controls">
                                    <select name="date">
                                        <option value="0">无要求</option>
                                        <option value="1">周一</option>
                                        <option value="2">周二</option>
                                        <option value="3">周三</option>
                                        <option value="4">周四</option>
                                        <option value="5">周五</option>
                                        <option value="6">周六</option>
                                        <option value="7">周日</option>
                                    </select>
                                    <select name="time">
                                        <option value="0">无要求</option>
                                        <option value="1">早上1-2节</option>
                                        <option value="2">早上3-4节</option>
                                        <option value="3">下午5-6节</option>
                                        <option value="4">下午7-9节</option>
                                        <option value="5">晚上10-12节</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="submit" value="搜索" class="btn btn-success">
                            </div>
                        </form>
                    </div>
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
<script src="../js/jquery.validate.js"></script>
<script src="../js/matrix.js"></script>
</body>

</html>