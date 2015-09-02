<?php
    if(!isset($_SESSION['password_session'])){
        header('Location:after_login.php');
    }
    
    if(isset($_POST['btn_cp'])){
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);
        $user_id = $result['user_id'];
        
        if($new_password==$confirm_password){
            $object_admin->change_password($new_password,$user_id);
        }else{
            echo '<span style="color:red">Confirm Password does not match</span>';
        }
    }
?>
<h4 align="center">Modify Password</h4>
<form action="" method="post">
    <table>
         <tr>
            <td>New Password : </td>
            <td><input type="password" name="new_password"></td>
        </tr>
         <tr>
            <td>Confirm Password : </td>
            <td><input type="password" name="confirm_password"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="btn_cp" value="submit"></td>
        </tr>
    </table>
</form>