<?php
session_start();
$_SESSION['sess_user_id_by_sesion'];
if (!isset($_SESSION['sess_user_id_by_sesion'])) {
    header('Location:login.php');
}
require_once './classes/admin.php';
$object_admin = new Admin();

$result = $_SESSION['login_info'];

if (isset($_GET['page'])) {
    $page = $_GET['page'];

    switch ($page) {
        case 'check_password':
            $page = 'check_password.php';
            break;
        case 'change_name':
            $page = 'change_name.php';
            break;
        case 'change_email':
            $page = 'change_email.php';
            break;
        case 'change_password':
            $page = 'change_password.php';
            break;

        default:
            break;
    }
}
?>
<html>
    <head>
        <title>After Login</title>
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
            #logout{
                float: left;
                margin-left: 400px;
            }
        </style>
    </head>
    <body>
        <div id="main_wrapper">
            <h2>After Login Page</h2>

            <div id="logout">
                <a href="after_login.php">Home</a>
                <a href="logout.php">Logout</a>(<?php echo $_SESSION['login_info']['user_second_name']; ?>)
            </div>
            <?php
                if(isset($_SESSION['message'])){
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
            ?>
            <?php
            if (isset($page)) {
                include './pages/' . $page;
            } else {
                include './pages/main_content.php';
            }
            ?>

        </div>
    </body>
</html>
