
            <table>
                <tr>
                    <td>Name : </td>
                    <td>
                        <?php echo $_SESSION['login_info']['user_first_name'].' '.$_SESSION['login_info']['user_second_name']; ?>
                        <a href="?page=check_password&value=name">Change</a>
                    </td>
                </tr>
                <tr>
                    <td>Email Address : </td>
                    <td>
                        <?php echo $_SESSION['login_info']['user_email_address']; ?>
                        <a href="?page=check_password&value=email">Change</a>
                    </td>
                </tr>
                <tr>
                    <td><a href="?page=check_password&value=password">Change Password</a></td>
                </tr>
            </table>