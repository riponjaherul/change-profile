<?php

class Database {
    public function __construct() {
        $hostname = 'localhost';
        $username = 'root';
//        exit();
        $password = '';
        $db_name = 'db_login';
        
        $conn = mysql_connect($hostname,$username,$password);
        
        if($conn){
            mysql_select_db($db_name);
//            echo 'db connect';
        }else{
            die('database not connect '.  mysql_error());
        }
        
    }
}
