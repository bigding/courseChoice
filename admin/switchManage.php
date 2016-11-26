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
<?php
    require "header.php";
?>
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
<script src="../js/matrix.js"></script>
</body>
</html>
