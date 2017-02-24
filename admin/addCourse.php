<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>增加课程</title>
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
                        <form class="form-horizontal" method="post" action="opAddStudent.php" name="basic_validate" id="basic_validate" novalidate="novalidate">
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
                                <label class="control-label">教室</label>
                                <div class="controls">
                                    <select name="buliding">
                                        <option value="一教">一教</option>
                                        <option value="综合楼">综合楼</option>
                                        <option value="二基楼">二基楼</option>
                                    </select>
                                    <select name="which">
                                        <option value="a">a</option>
                                        <option value="b">b</option>
                                        <option value="c">c</option>
                                        <option value="d">d</option>
                                    </select>
                                    <select name="floor">
                                        <option value="1">一楼</option>
                                        <option value="2">二楼</option>
                                        <option value="3">三楼</option>
                                        <option value="4">四楼</option>
                                        <option value="5">五楼</option>
                                        <option value="6">六楼</option>
                                    </select>
                                    <select name = "classroom">
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                        <option value="05">05</option>
                                        <option value="06">06</option>
                                        <option value="07">07</option>
                                        <option value="08">08</option>
                                        <option value="09">09</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="19">19</option>
                                        <option value="20">20</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">上课时间</label>
                                <div class="controls">
                                    <select name="date">
                                        <option value="1">周一</option>
                                        <option value="2">周二</option>
                                        <option value="3">周三</option>
                                        <option value="4">周四</option>
                                        <option value="5">周五</option>
                                        <option value="6">周六</option>
                                        <option value="7">周日</option>、
                                    </select>
                                    <select name="time">
                                        <option value="1">早上1-2节</option>
                                        <option value="2">早上3-4节</option>
                                        <option value="3">下午5-6节</option>
                                        <option value="4">下午7-9节</option>
                                        <option value="5">晚上10-12节</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">学分</label>
                                <div class="controls">
                                    <input type="text" name="grade" id="credit">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">必/选修</label>
                                <div class="controls">
                                    <label>
                                        <input type="radio" name="essential" value="1" checked/>
                                        必修
                                    </label>
                                    <label>
                                        <input type="radio" name="essential" value="0"/>
                                        选修
                                    </label>
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
