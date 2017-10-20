<?php
    //登录
    require_once ('hy_register.php');
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];
    session_start();
    $_SESSION['U_name'] = $user_name;
    // echo $_SESSION['U_name'];
    $obj = new hy_register();
    $model = $obj->log($user_name, $user_password);
    if ($model) {
        echo $model;
    }
?>