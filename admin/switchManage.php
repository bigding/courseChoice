<!DOCTYPE html>
<html lang="en">
<head>
    <title>入口管理</title>
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
        <li><a href="checkStudentInfo.php"><i class="icon icon-inbox"></i> <span>查看学生信息</span></a></li>
        <li class="active"><a href="switchManage.php"><i class="icon icon-th"></i> <span>入口管理</span></a></li>
    </ul>
</div>
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"><a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a
                href="#" class="current">入口管理</a></div>
        <h1>入口管理</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                        <h5>入口管理</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>入口</th>
                                <th>现在状态</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            require 'mysqlConfig.php';
                            $sql = 'select * from switch';
                            $result = mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    echo "  
                                        <tr class=\"odd gradeX\">
                                            <td>".$row['switchName']."</td>
                                            <td>";
                                    if($row['status'] == 0){
                                        echo "系统关闭
                                        </td>
                                            <td>
                                                <a href=\"opSwitchManage.php?typeid=".$row['typeId']."&operation=1\" class=\"tip-top\" data-original-title=\"开启系统\">
                                                    <i class=\"icon-eye-open\"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        ";
                                    }
                                    else{
                                        echo "系统开启
                                        </td>
                                            <td>
                                                <a href=\"opSwitchManage.php?typeid=".$row['typeId']."&operation=0\" class=\"tip-top\" data-original-title=\"关闭系统\">
                                                    <i class=\"icon-eye-close\"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        ";
                                    }
                                }
                            }
                            else{
                                echo "无开关存在";
                            }

                            ?>
                            <tr class="odd gradeX">
                                <td>选课系统</td>
                                <td>关闭</td>
                                <td>
                                    <a href="opSwitchManage.php?typeid=1&operation=1" class="tip-top" data-original-title="开启系统">
                                        <i class="icon-eye-open"></i>
                                    </a>
                                    <a href="opSwitchManage.php?typeid=1&operation=0" class="tip-top" data-original-title="关闭系统">
                                        <i class="icon-eye-close"></i>
                                    </a>
                                </td>
                            </tr>
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
<script src="../js/matrix.js"></script>
</body>
</html>