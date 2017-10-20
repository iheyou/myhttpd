<?php
    require_once 'hy_register.php';
//     if (!isset($_POST['submit'])){
//         exit('非法访问！');
//     }
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];
    
    $obj = new hy_register();
    $model = $obj->register($user_name, $user_password);
    echo $model;
?>