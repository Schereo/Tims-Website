<?php
    if($_POST['vorname'] !="" and $_POST['nachname'] !="" and $_POST['email'] =!"" and $_POST['nachricht'] =!"") {
        $empfaenger = "tim.sigl@hotmail.de";
        $betreff = "Anfrage von Tims Website";
        $from = "Von: ";
        $from .= $_POST['name'];
        $from .= " ";
        $from .= $_POST['nachname'];
        $from .= "<";
        $from .= $_POST['email'];
        $from .= ">";
        $text = $_POST['nachricht'];

        mail($empfaenger, $betreff, $text, $from);
    } else{
        echo "Bitte alle Felder ausfüllen";
    }
/**
 * Created by PhpStorm.
 * User: timsi
 * Date: 11.02.2018
 * Time: 15:07
 */