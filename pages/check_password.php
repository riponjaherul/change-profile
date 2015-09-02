<?php
    if(isset($_POST['btn_ck'])){
        $check_password = md5($_POST['check_password']);
        $value =  $_GET['value'];
        if($check_password == $result['user_password']){
            switch ($value) {
            case 'name':
                $_SESSION['name_session'] = session_id();
                header('Location:?page=change_name');
                break;
            case 'email':
                $_SESSION['email_session'] = session_id();
                header('Location:?page=change_email');
                break;
            case 'password':
                $_SESSION['password_session'] = session_id();
                header('Location:?page=change_password');
                break;

            default:
                break;
        }
        }else{
            echo '<span style="color:red">Password does not match</span>';
        }
    }
?>
<form action="" method="post">
    <table>
        <tr>
            <td>Enter Your Password : </td>
            <td><input type="password" name="check_password"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="btn_ck" value="submit"></td>
            <?php  
            
            ?>
        </tr>
    </table>
</form>
