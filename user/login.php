<?php
session_start();


    if (isset($_POST['lbtn'])) {

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $email = $_POST['email'];

        $pwd =  $_POST['pwd'];

   
        $conn = mysqli_connect('localhost', 'root', '', 'php_bug_tracking');


        $sql = "SELECT * FROM users WHERE email = '$email' ";

        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);

        if ($num  < 0) {
            header('location: ../index.php?uname_err');
            exit();
        } else {
            while ($row = mysqli_fetch_assoc($result))   {

                $hashedpwd = $row['user_pwd'];

                $hashedPwdCheck  = password_verify($pwd, $hashedpwd);

                if ($hashedPwdCheck == false) {
                    header("Location: ../index.php?login=error");
                    exit();
                } else {

                    $_SESSION['u_id'] = $row['user_id'];
                    header("location: ../index.php");
                    exit();
                }
            }
        }
    }
