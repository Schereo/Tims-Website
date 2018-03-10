<?php
include_once 'db.php';

if(isset($_POST['submit'])) {
    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $pwdwd = mysqli_real_escape_string($conn, $_POST['pwdwd']);

    //Error variables
    $errorConnect = false;
    $errorRecaptcha = false;
    $errorFirst = false;
    $errorLast = false;
    $errorEmail = false;
    $errorPwd = false;
    $errorPwdwd = false;
    $errorInCharFirst = false;
    $errorInCharLast = false;
    $errorPwdMatch = false;
    $errorInEmail = false;
    $errorEmailTaken = false;

    // verify reCAPTCHA
    $secretkey = '6LdnTUkUAAAAAD2Er7-PJNHQlc59nFO33mn6skp_';
    $response = $_POST['captcha'];
    $url = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretkey.'&response='.$response);
    $recaptchaResponse = json_decode($url, TRUE);


    //Error handlers

    //No connection to database
    if (!$conn) {
        $errorConnect = true;
        echo "<span class='form-error'>Es konnte keine Verbindung zur Datenbank aufgebaut werden!</span>";
    }


    //reCAPTCHA unsuccessful
    elseif(!$recaptchaResponse['success'] == 1){
        $errorRecaptcha = true;
        echo "<span class='form-error'>Der reCAPTCHA ist ungültig!</span>";
        print_r($recaptchaResponse);
        print_r($response);
    }

    //Check for empty fields
    elseif(empty($first)) {
        $errorFirst = true;
        echo "<span class='form-error'>Du musst einen Vornamen angeben!</span>";
    }
    elseif(empty($last)){
        $errorLast = true;
        echo "<span class='form-error'>Du musst einen Nachnamen angeben!</span>";
    }
    elseif(empty($email)){
        $errorEmail = true;
        echo "<span class='form-error'>Du musst eine E-Mail Adresse angeben!</span>";
    }
    elseif(empty($pwd)){
        $errorPwd = true;
        echo "<span class='form-error'>Du musst ein Passwort angeben!</span>";
    }
    elseif(empty($pwdwd)){
        $errorPwdwd = true;
        echo "<span class='form-error'>Du musst das Passwort wiederholt angeben!</span>";
    }

    //Check for invalid characters
    elseif(!preg_match("/^[a-zA-ZäüöÄÜÖ]+$/i", $first)){
        $errorInCharFirst = true;
        echo "<span class='form-error'>Du hast ungültige Buchstaben im Vornamen!</span>";
    }
    elseif(!preg_match("/^[a-zA-ZäüöÄÜÖ]+$/i", $last)){
        $errorInCharLast = true;
        echo "<span class='form-error'>Du hast ungültige Buchstaben im Nachnamen!</span>";
    }

    //Check if pwd matches pwdwd
    elseif ($pwd != $pwdwd) {
        $errorPwdMatch = true;
        echo "<span class='form-error'>Die Passwörter stimmen nicht überein!</span>";
    }

    //Check for valid email
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorInEmail = true;
        echo "<span class='form-error'>Du hast keine gültige E-Mail Adresse angegeben!</span>";
    }

    //Get email from database
    $sql = "SELECT * FROM users WHERE user_email ='$email'";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    //Check if email is already in database
    if ($resultCheck > 0) {
        $errorEmailTaken = true;
        echo "<span class='form-error'>Die E-Mail Adresse ist bereits registriert!</span>";


    //Hashing the password
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    //Add user to database
    $sql = "INSERT INTO users (user_first, user_last, user_email, user_pwd) VALUES ('$first', '$last', '$email', '$hashedPwd');";
    mysqli_query($conn, $sql);
    header("Location: signup.html.php?signup=success");
    }
}
?>

<script language="JavaScript">

    $('#signup-first, #signup-last, #signup-email, #signup-pwd, #signup-pwdwd').removeClass('input-error');
    var errorConnect = '<?php echo $errorConnect; ?>';
    var errorRecaptcha = '<?php echo $errorRecaptcha; ?>';
    var errorFirst = '<?php echo $errorFirst; ?>';
    var errorLast = '<?php echo $errorLast; ?>';
    var errorEmail = '<?php echo $errorEmail; ?>//';
    var errorPwd = '<?php echo $errorPwd; ?>//';
    var errorPwdwd = '<?php echo $errorPwdwd; ?>//';
    var errorInCharFirst = '<?php echo $errorInCharFirst; ?>//';
    var errorInCharLast = '<?php echo $errorInCharLast; ?>//';
    var errorPwdMatch = '<?php echo $errorPwdMatch; ?>//';
    var errorInEmail = '<?php echo $errorInEmail; ?>//';
    var errorEmailTaken= '<?php echo $errorEmailTaken; ?>//';

    if(errorFirst){
        $("#signup-first").addClass('input-error');
    }
    if(errorLast){
        $("#signup-last").addClass('input-error');
    }
    if(errorEmail){
        $("#signup-email").addClass('input-error');
    }
    if(errorPwd){
        $("#signup-pwd").addClass('input-error');
    }
    if(errorPwdwd){
        $("#signup-pwdwd").addClass('input-error');
    }
    if(errorInCharFirst){
        $("#signup-first").addClass('input-error');
    }
    if(errorInCharLast){
        $("#signup-last").addClass('input-error');
    }
    if(errorPwdMatch){
        $("#signup-pwd, #signup-pwdwd").addClass('input-error');
    }
    if (errorInEmail || errorEmailTaken) {
        $("#signup-email").addClass('input-error');
    }



</script>
