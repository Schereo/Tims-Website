<?php
include_once "header.php"; ?>
<!-- Überschrift -->
<div class="container-fluid banner-heading" role="banner">
    <div class="container">
        <div class="row">
            <a href="../index.php"><div class="col-lg-3 hidden visible-lg"><img src="../bilder/Logo.svg" alt="Logo von Tims Website"/></div></a>
            <div class="text-center col-lg-6">
                <h1>Tim's Blog </h1>
            </div>
        </div>
    </div>
</div>
<!-- Hauptarkikel -->
<script>
$(document).ready(function () {
        $("form").submit(function (event) {
            event.preventDefault();
            var first = $("#signup-first").val();
            var last = $("#signup-last").val();
            var email = $("#signup-email").val();
            var pwd = $("#signup-pwd").val();
            var pwdwd = $("#signup-pwdwd").val();
            var submit = $("#signup-submit").val();
            $.ajax({
              url: "php/db.signup.php",
              type: "POST",
              data: {
                first: "first",
                last: "last",
                email: "email",
                pwd: "pwd",
                pwdwd: "pwdwd",
                submit: "submit",
                captcha: grecaptcha.getResponse()
              },
            })
            .done(function() {
              console.log("success");
            })
            .fail(function() {
              console.log("error");
            })
            .always(function() {
              console.log("complete");
            })
            });
        });
  </script>
<div class="container-fluid banner-maincontent" role="main">
    <div class="container container-margin">
        <div class="row">
            <div class="col-lg-12" align="center">
                <form class="signup-form" action="db.signup.php" method="post">
                    <input type="text" id="signup-first" name="first" placeholder="Vorname"><br><br>
                    <input type="text" id="signup-last" name="last" placeholder="Nachname"><br><br>
                    <input type="email" id="signup-email" name="email" placeholder="E-Mail"><br><br>
                    <input type="password" id="signup-pwd" name="pwd" placeholder="Passwort"><br><br>
                    <input type="password" id="signup-pwdwd" name="pwdwd" placeholder="Passwort wiederholen"><br><br>
                    <div class="g-recaptcha" data-theme="light"  data-sitekey="6LdnTUkUAAAAAIYesQhJJIJbzK9hhiiB2Zzm2jrU"></div><br>
                    <button class="signup-button"  id="signup-submit" type="submit" name="submit">Anmelden</button><br>
                    <p class="form-message"></p>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include_once "footer.php"; ?>
