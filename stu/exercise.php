<?php
session_start();
$_SESSION["view"] = 1;
if(isset($_SESSION['view'])){
    echo "设置成功";
}
elseif(isset($_SESSION['view'])){
    echo "设置失败";
}
?>
