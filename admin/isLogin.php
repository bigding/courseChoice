<?php
if(isset($_SESSION['daUserName'])){
    $isLogin = true;
}
else{
    $isLogin = false;
}
if(!$isLogin){
    echo "
    <script>
        window.alert('请先登录');
        window.location.href = 'admLogIn.html';
    </script>
    ";
    die();
}
?>
