<?php
session_start();
if(isset($_SESSION['sess_user_id_by_sesion'])){
         header('Location:after_login.php');
     }
   require_once './classes/admin.php';
   $object_admin = new Admin();
   
   if(isset($_POST['btn'])){
       $object_admin->check_login($_POST);
   }
?>
<html>
    <head>
        <title>Login</title>
        <style type="text/css">
            body{
                background-color: #ffffff;
                color: #000000;
            }
            #main_wrapper{
                float: left;
                height: 400px;
                width: 600px;
                background-color: #cccccc;
                margin-left: 350px;
                margin-top: 100px;
            }
            #main_wrapper h2{
                text-align: center;
            }
            #main_wrapper table{
                margin-top: 50px;
                font-size: 20px;
            }
        </style>
    </head>
    <body>
        <div id="main_wrapper">
            <h2>Login Page</h2>
            <form method="post" action="">
                <table align="center">
                   <?php
                        if(isset($_SESSION['message'])){
                            echo $_SESSION['message'];
                            unset($_SESSION['message']);
                        }
                   ?>
                    <tr>
                        <td>Email : &nbsp;&nbsp;</td>
                        <td><input type="email" name="user_email_address" required></td>
                    </tr>
                    <tr>
                        <td>Password : &nbsp;&nbsp;</td>
                        <td><input type="password" name="user_password" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="btn" value="login"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><a href="">Forget Password</a></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><a href="">Create Account</a></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>