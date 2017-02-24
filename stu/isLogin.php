<?php
if(isset($_SESSION['stuNo'])&&isset($_SESSION['pageuser'])){
    $isLogin = true;
}
else{
    $isLogin = false;
}
if(!$isLogin){
    echo "
    <script>
        window.alert('请先登录');
        window.location.href = 'index.html';
    </script>
    ";
    die();
}
?>
