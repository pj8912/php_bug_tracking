<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="contaniner">


        <div class="card card-body col-md-4 m-auto col-xs-6 mt-5">

            <h4 class="text-center">Bug tracker</h4>

            <p class="mt-1 p-3 h5">Sign Up</p>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                <div class="mb-2">
                    <input type="text" class="form-control" placeholder="Name" name="name" id="">

                </div>
                <div class="mb-2">
                    <input type="email" class="form-control" placeholder="Email Address" name="email" id="">

                </div>
                <div class="mb-2">
                    <input type="text" class="form-control" placeholder="mobile" name="mobile" id="">

                </div>
                <div class="mb-2">
                    <input type="password" class="form-control" placeholder="Password" name="pwd" id="">

                </div>
                <div class="d-grid gap-2">
                    <button type="submit" name="sbtn" class="btn btn-success ">
                        Sign Up
                    </button>
                </div>


            </form>
        </div>
    </div>

    <?php
    require '../Database/Database.php';
    require '../models/User.php';


    if (isset($_POST['sbtn'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $pwd = $_POST['pwd'];

        if (!ctype_alpha($name)) {
            header("Location: ../index.php?error=" . $name);
            exit();
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../index.php?error=empty");
            exit();
        } else {
            $conn = mysqli_connect('localhost', 'root', '', 'php_bug_tracking');
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);

            // $db = new Database();
            // $db  = $db->connect();

            // $u = new User($db);
            // $u->email = $email;
            // $result = $u->checkIfUserAlreadyExist();
            $num = mysqli_num_rows($result);
            if ($num > 0) {
                header('location: ../index.php?user_exists');
                exit();
            } else {
                $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                // $u->user_name = $name;
                // $u->user_mobile = $mobile;
                // $u->user_pwd = $hashedPwd;
                $sql = "INSERT INTO users(user_name, user_mobile, email, user_pwd) VALUES('$name', '$mobile', '$email', '$hashedPwd')";
                $result = mysqli_query($conn, $sql);
                if($result){

                    header('location: ../index.php');
                    exit();
                }
                else{
                    die('FUCK');
                }
            }
        }
    }

    ?>
</body>

</html>