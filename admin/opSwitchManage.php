<?php
$typeid = $_GET['typeid'];  /*此处为数据库中type的值*/
$operate = $_GET['operation'];  /*此处operation的值为1时是开启，为0时是关闭*/

require "mysqlConfig.php";
$sql = "select * from switch where typeId = $typeid";
//echo $sql." ".$typeid." ".$operate;
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) == 1){
    while($row = mysqli_fetch_assoc($result)){
        if($row["status"] == 0 && $operate == 1){
            $result1 = mysqli_query($conn,"update switch set status = 1 where typeId = $typeid");
            if(mysqli_affected_rows($conn) == 1){
                echo "开启".$row['switchName']."成功";
            }
        }
        else if($row["status"] == 1 && $operate == 0){
            $result1 = mysqli_query($conn,"update switch set status = 0 where typeId = $typeid");
            if(mysqli_affected_rows($conn) == 1){
                echo "关闭".$row['switchName']."成功";
            }
        }
        else{
            echo "你发送了错误的请求，请重新发送";
        }
    }
}
else{
    echo "未查询到结果";
}
?>
