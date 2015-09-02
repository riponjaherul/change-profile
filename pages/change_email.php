<?php
    if(!isset($_SESSION['email_session'])){
        header('Location:after_login.php');
    }
    if(isset($_POST['btn_ce'])){
//        print_r($_POST);
//        exit();
        $user_id = $result['user_id'];
        $object_admin->change_email($_POST,$user_id);
    }
?>
<h4 align="center">Modify Email</h4>
<form action="" method="post">
    <table>
        <tr>
            <td>Email Address : </td>
            <td><input type="text" name="new_email_address" value="<?php echo $result['user_email_address']; ?>"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="btn_ce" value="submit"></td>
        </tr>
    </table>
</form>