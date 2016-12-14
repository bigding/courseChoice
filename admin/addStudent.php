<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>增加学生</title>
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
                href="#" class="current">添加课程</a></div>
        <h1>添加学生</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                        <h5>添加学生</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="opAddStudent.php" name="basic_validate" id="basic_validate" novalidate="novalidate">
                            <div class="control-group">
                                <label class="control-label">姓名</label>
                                <div class="controls">
                                    <input type="text" name="name" id="name">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">学号</label>
                                <div class="controls">
                                    <input type="text" name="stuNo" id="stuNo">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">密码</label>
                                <div class="controls">
                                    <input type="text" name="password" id="password">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">学院</label>
                                <div class="controls">
                                    <input type="text" name="college" id="college">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">专业</label>
                                <div class="controls">
                                    <input type="text" name="major" id="major">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">班级</label>
                                <div class="controls">
                                    <input type="text" name="classNo" id="classNo">
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="submit" value="提交" class="btn btn-success">
                            </div>
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
