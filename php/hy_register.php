<?php
    require_once 'config_db.php';
    
    class hy_register {
        private $connect;
        public function __construct() {
            global $connect;
            $connect = new mysqli(db_host,db_user,db_password,db_databasename);
            $connect->query("set names 'utf8'");
        }
        
        //用户注册
        public function register($user_name, $user_password) {
            global $connect;
            //检测用户名是否已存在
            $sql_check = "SELECT user_id FROM user_list WHERE user_name= '".$user_name."' LIMIT 1";
            $check_query = $connect->query($sql_check);
            if (mysqli_fetch_array($check_query)){
                return "用户名已存在！";
                exit();
            }
            $sql_insert = "INSERT INTO user_list (user_name, user_password) VALUES "."('".$user_name."','".$user_password."')";
            $result = $connect->query($sql_insert);

            if ($result) {
                return "注册成功！";
            } else {
                return "注册失败！";
            }
        }
        
        //用户登录
        public function log($user_name, $user_password) {
            global $connect;
            $sql_query = "SELECT user_name FROM user_list WHERE user_name='".$user_name."' AND user_password='".$user_password."' LIMIT 1";
            $result = $connect->query($sql_query);
            $check = mysqli_fetch_array($result);
            if ($check) {
                //登录成功
                // session_start();
                // $_SESSION['user_name'] = $user_name;
                // $_SESSION['user_id'] = $result['user_id'];
                
                return $check['user_name'].",登录成功！";
            } else {
                return "登录失败！用户名或密码错误！请重新输入.";
            }
        }
    }
?>