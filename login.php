<?php
session_start();
include "connection.php";
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Librarian Login</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="./images/Reading_32px.png">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">


<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a href="index.html">
                    <img class="align-content" src="./images/Reading_48px.png" alt="">
                </a>
            </div>
            <div class="login-form">
                <form action="" method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="username">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="checkbox">


                        <label class="pull-right" >
                            <div class="g-recaptcha" data-sitekey="6LcAx5gUAAAAAKJXleEmDzfLqfV8Ypmuu0LSVwcK"></div>
                        </label>

                    </div>
                    <input type="submit" name="submit1" value="Sign In" class="btn btn-success btn-flat m-b-30 m-t-30">
                    <div class="social-login-content">
                        <div class="social-button">

                            <?php

                            if(isset($_POST["submit1"]))
                            {





                                $count = 0;
                                $res = mysqli_query($link, "select * from librarian_registration where username='$_POST[username]' and password='$_POST[password]'");
                                $count=mysqli_num_rows($res);

                                if ($count == 0)
                                {
                                    ?>
                                    <div class="alert alert-danger " align="center">
                                        <strong style="...">Invalid</strong> Username Or Password.
                                    </div>
                                <?php
                                }


                                else
                                {
                                $_SESSION["librarian"] = $_POST["username"];
                                ?>
                                    <script type="text/javascript">
                                        window.location = "demo.php"
                                    </script>
                                    <?php
                                }
                            }
                            ?> <?php


                                ?>


                        </div>
                    </div>
                    <div class="register-link m-t-15 text-center">

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>






</body>
</html>
