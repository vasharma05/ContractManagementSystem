<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="Bootstrap/css/bootstrap-grid.min.css" type="text/css" rel="stylesheet">
    <link href="css/login.css" type="text/css" rel="stylesheet">


    <?php

            session_start();
            if(isset($_SESSION["login_error"])){ ?>
                <script>
                    alert("<?php echo $_SESSION["login_error"]; ?>");
                </script>
            <?php 
                unset($_SESSION["login_error"]);
            }
    ?>
</head>
<body>
    <div class="container">
        <img src="img/tcil.png" width="150px" height="150px">
    </div>
    <section class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-md-4 align-self-center container box">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <h2 class="login-heading">
                                LOGIN
                        </h2>
                        <hr>
                        <form action="php/login.php" method="POST">
                            <div class="row">
                                <p class="col-md-4 input-head">Employee No</p>
                                <input class="col-md-6 offset-md-2 align-self-center" type="text" name="username" placeholder="Username">
                            </div>
                            <div class="row">
                                <p class="col-md-4 input-head">Password</p>    
                                <input class="col-md-6 offset-md-2 align-self-center" type="password" name="password" placeholder="Password">
                            </div>
                            <div class="row">
                                <input class="col-md-8 offset-md-2" style="margin-top: 16px;" type="submit">
                            </div>
                        </form>
                        <hr>
                        <a href="signUp.html" class="forgot-pass">Register yourself</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
