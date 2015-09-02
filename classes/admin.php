<?php

require_once 'database.php';

class Admin {

    public function __construct() {
        $object_db = new Database();
    }

    public function check_login($value) {
//        echo '<pre>';
//        print_r($_POST);
//        exit();
        $email_address = $value['user_email_address'];
        $password = md5($value['user_password']);

        $sql = "SELECT user_id,user_first_name,user_second_name,user_email_address,user_password FROM tbl_user
                WHERE user_email_address = '$email_address' AND user_password = '$password' ";
        $query_result = mysql_query($sql);
        $result = mysql_fetch_assoc($query_result);
        if ($result == NULL) {
            $_SESSION['message'] = '<span style="color:red;">Invalid user name and password</span>';
        } else {
            $_SESSION['sess_user_id_by_sesion'] = session_id();
            $_SESSION['login_info'] = $result;
            header('Location:after_login.php');
        }
    }

    function change_password($new_password, $user_id) {
//        echo $new_password . '<br>';
//        echo $user_id;
//        exit();
        $sql = "UPDATE tbl_user
                SET `user_password` = '$new_password'
                WHERE `user_id` = '$user_id'";
        mysql_query($sql);
        session_destroy();
        session_start();
        $_SESSION['message'] = '<span style="color:green;">Update Password Successfully</span>';
        header('Location:index.php');
    }
    function change_name($data,$user_id){
        $sql = "UPDATE tbl_user
                SET `user_first_name` = '$data[new_first_name]',user_second_name = '$data[new_second_name]'
                WHERE `user_id` = '$user_id'";
        mysql_query($sql);
        
        $sql1 = "SELECT user_first_name,user_second_name 
                FROM tbl_user
                WHERE `user_id` = '$user_id'";
        $query_result = mysql_query($sql1);
        $result = mysql_fetch_assoc($query_result);
        $_SESSION['login_info']['user_first_name'] = $result['user_first_name'];
        $_SESSION['login_info']['user_second_name'] = $result['user_second_name'];
//        exit();
        unset($_SESSION['name_session']);
        $_SESSION['message'] = '<span style="color:green;">Update Name Successfully</span>';
        header('Location:after_login.php');
    }
    function change_email($data,$user_id){
        $sql = "UPDATE tbl_user
                SET `user_email_address` = '$data[new_email_address]'
                WHERE `user_id` = '$user_id'";
        mysql_query($sql);
        
        $sql1 = "SELECT user_email_address
                FROM tbl_user
                WHERE `user_id` = '$user_id'";
        $query_result = mysql_query($sql1);
        $result = mysql_fetch_assoc($query_result);
        $_SESSION['login_info']['user_email_address'] = $result['user_email_address'];
//        exit();
        unset($_SESSION['name_session']);
        $_SESSION['message'] = '<span style="color:green;">Update Email Successfully</span>';
        header('Location:after_login.php');
    }

}
