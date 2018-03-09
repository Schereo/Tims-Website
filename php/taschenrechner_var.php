<?php
if(isset($_GET['submit'])){
    $result1 = $_GET['num1'].FILTER_SANITIZE_NUMBER_FLOAT;
    $result2 = $_GET['num2'].FILTER_SANITIZE_NUMBER_FLOAT;
    $operator = $_GET['operator'];
    switch ($operator){
        case "Operator":
            echo "Du musst einen Operator auswählen!";
            break;
        case "Addieren":
            echo $result1." + ".$result2." = ".$result1 + $result2;
            break;
        case "Subtrahieren":
            echo $result1." - ".$result2." = ".$result1 - $result2;
            break;
        case "Multiplizieren":
            echo $result1." * ".$result2." = ".$result1 * $result2;
            break;
        case "Dividieren":
            echo $result1." / ".$result2." = ".$result1 / $result2;
            break;
        case "Modulo":
            echo $result1." % ".$result2." = ".$result1 % $result2;
            break;
        case "Exponenzieren":
            echo $result1." ^ ".$result2." = ".$result1 ** $result2;
            break;
    }
}
?>