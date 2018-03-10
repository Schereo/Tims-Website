$(document).ready(function () {
        $('form').submit(function (event) {
            event.preventDefault();
            var first = $('#signup-first').val();
            var last = $('signup-last').val();
            var email = $('#signup-email').val();
            var pwd = $('#signup-pwd').val();
            var pwdwd = $('#signup-pwdwd').val();
            var submit = $('#signup-submit').val();
            $.ajax({
              url: 'php/db.signup.php',
              type: 'POST',
              data: {
                first: "first",
                last: 'last',
                email: 'email',
                pwd: 'pwd',
                pwdwd: 'pwdwd',
                submit: 'submit',
                captcha: grecaptcha.getResponse(),
              },
            });
          });
});
