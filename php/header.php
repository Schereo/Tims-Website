<?php session_start(); ?>

<!DOCTYPE html>
<html lang="de">
<head>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400|Roboto:300,400,500,700" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tims Homepage</title>
    <meta name="description" content="Mein persönlicher Blog - Mein Leben, dies das und jenes">
    <!-- Bootstrap -->
    <!--<link href="https://timsigl.de/css/bootstrap.css" rel="stylesheet">-->
    <link href="css/main.css" rel="stylesheet">
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-102517358-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-102517358-2');
    </script>
    <script src="https://timsigl.de/js/jquery-3.3.1.min.js"></script>
    <script>$(document).ready(function () {
            $("form").submit(function (event) {
                event.preventDefault();
                var first = $("#signup-first").val();
                var last = $("#signup-last").val();
                var email = $("#signup-email").val();
                var pwd = $("#signup-pwd").val();
                var pwdwd = $("#signup-pwdwd").val();
                var submit = $("#signup-submit").val();
                $(".form-message").load("db.signup.php", {
                    first: first,
                    last: last,
                    email: email,
                    pwd: pwd,
                    pwdwd: pwdwd,
                    submit: submit
                });
            });
        });</script>

    <!-- Google reCAPTCHA -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<!-- Navigation-->
<nav class="wrapper no-gap" style="justify-content: end;" role="navigation">
    <div class="align-center">
      <a href="https://timsigl.de/index.php"><img src="https://timsigl.de/bilder/Logo.svg" alt="Tim's Homepage Logo"/></a>
    </div>
    <div class="justify-left">
      <a href="index.php">HOME</a>
    </div>
    <div class="justify-left">
      <a href="kontakt.php">KONTAKT</a>
    </div>
    <div class="col-8 justify-right">
      <form class="login-form" action="http://timsigl.de/php/login.php" method="post">
        <input  type="text" name="email" placeholder="Benutzername/E-Mail">
        <input type="password" name="pwd" placeholder="Passwort">
        <button class="login-button" type="submit" name="submit">Login</button>
        <a href="http://timsigl.de/php/signup.php"><button class="login-button" type="button">Neu Anmelden</button></a>
      </form>
    </div>
  </div>
</nav>
