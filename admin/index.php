<?php
ob_start();
session_start();
include('connect.php');
include('../lib/kphp.php');
// error_reporting(0);
// include_once('../lib/phplib.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login V15</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css?v">
    <!--===============================================================================================-->
    <script src="../js/sweetalert.min.js"></script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <style>
        body {
            color: #fff;
        }
    </style>
</head>

<body>

    <div class="limiter">

        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
                    <span class="login100-form-title-1">
                        Sign In
                    </span>
                </div>
                <form class="login100-form validate-form" name="adminform" method="POST" action="">
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <span class="label-input100">Username</span>
                        <input value="1t" class="input100" autocomplete="off" type="text" name="adminname" placeholder="Enter username">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
                        <span class="label-input100">Password</span>
                        <input value="1" class="input100" autocomplete="off" type="password" name="adminpass" placeholder="Enter password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="flex-sb-m w-full p-b-30">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="rememberme" checked>
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>

                        <div style="display: none;">
                            <a href="#" class="txt1">
                                Forgot Password?
                            </a>
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <input type="submit" class="login100-form-btn" name="adminlogin" value="Login">
                    </div>
                </form>
            </div>
            <div id="phpid">
                <?php
                $now = time();
                if (isset($_SESSION['expire'])) {
                    if ($now > $_SESSION['expire']) {
                        echo "Your session has expired!";
                        session_destroy();
                    } else {
                        echo "Your session has not expired!";
                        header("Location: addtext.php");
                    }
                }
                if (isset($_POST["adminlogin"])) {
                    $adminname = $_POST['adminname'];
                    $adminpass = $_POST['adminpass'];
                    $bool = false;
                    if (!empty($_POST["rememberme"])) {
                        if (kphp::checklogin($db, $adminname, $adminpass, "admins", "adminname", "adminpass")) {
                            $_SESSION['start'] = time();
                            $_SESSION['expire'] = $_SESSION['start'] + (2 * 365 * 24 * 60 * 60);
                            $_SESSION['adminname'] = $adminname;
                            kphp::swalscript(
                                'Successful',
                                'Page will gonna go to Addtext page in 3 secs. Wohoo!',
                                'success',
                                'YEES!'
                            );
                            header('Refresh:3; addtext.php');
                        } else {
                            $_SESSION['loginStatus'] = false;
                            kphp::swalscript(
                                'Not successful',
                                'Your username or password is wrong. Try again..',
                                'error',
                                'Gotcha'
                            );
                            // kphp::swaljson('
                            // {
                            //     title: "Good job!",
                            //     text: "You clicked the button!",
                            //     icon: "success",
                            // }
                            // ');
                        }
                    } else {
                        $_SESSION['start'] = time();
                        $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
                        $_SESSION['adminname'] = $adminname;
                        $_SESSION['rememberBool'] = false;
                        // header("Location: addtext.php");
                    }
                }


                ?>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>