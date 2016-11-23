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

<!--Header-part-->
<div id="header">
    <h1><a href="dashboard.html">courseChoice</a></h1>
</div>
<!--close-Header-part-->

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li class="dropdown" id="profile-messages"><a title="" href="#" data-toggle="dropdown"
                                                      data-target="#profile-messages" class="dropdown-toggle"><i
                class="icon icon-user"></i> <span class="text">Welcome User</span><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
                <li class="divider"></li>
                <li><a href="seeCourse.php"><i class="icon-key"></i> Log Out</a></li>
            </ul>
        </li>
        <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages"
                                                   class="dropdown-toggle"><i class="icon icon-envelope"></i> <span
                class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
                <li class="divider"></li>
                <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
                <li class="divider"></li>
                <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
                <li class="divider"></li>
                <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
            </ul>
        </li>
        <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
        <li class=""><a title="" href="seeCourse.php"><i class="icon icon-share-alt"></i> <span
                class="text">Logout</span></a></li>
    </ul>
</div>

<!--start-top-serch-->
<div id="search">
    <input type="text" placeholder="Search here..."/>
    <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->

<!--sidebar-menu-->

<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-th"></i>Tables</a>
    <ul>
        <li><a href="seeCourse.php"><i class="icon icon-home"></i> <span>查看课程</span></a></li>
        <li><a href="addCourse.html"><i class="icon icon-signal"></i> <span>添加课程</span></a></li>
        <li class="active"><a href="checkStudentInfo.php"><i class="icon icon-inbox"></i> <span>查看学生信息</span></a></li>
        <li><a href="switchManage.php"><i class="icon icon-th"></i> <span>入口管理</span></a></li>
    </ul>
</div>
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
                                                <a class="tip" href="#" title="查看详情">
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
<!--Footer-part-->
<div class="row-fluid">
    <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in/">Themedesigner.in</a>
    </div>
</div>
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
