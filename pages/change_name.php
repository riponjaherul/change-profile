<?php
    if(!isset($_SESSION['name_session'])){
        header('Location:after_login.php');
    }
    if(isset($_POST['btn_cn'])){
        $user_id = $result['user_id'];
        $object_admin->change_name($_POST,$user_id);
    }
?>
<h4 align="center">Modify Name</h4>
<form action="" method="post">
    <table>
        <tr>
            <td>First Name : </td>
            <td><input type="text" name="new_first_name" value="<?php echo $result['user_first_name']; ?>"></td>
        </tr>
        <tr>
            <td>Second Name : </td>
            <td><input type="text" name="new_second_name" value="<?php echo $result['user_second_name']; ?>"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="btn_cn" value="submit"></td>
            <?php  
            
            ?>
        </tr>
    </table>
</form>