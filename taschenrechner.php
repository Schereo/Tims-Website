<?php include_once "php/header.php"; ?>
<div class="container-fluid banner-heading" role="banner">
    <div class="container">
        <div class="row">
            <a href="index.php"><div class="col-lg-3 hidden-sm hidden-xs"><img src="bilder/Logo.svg" class="img-responsive" alt="Logo von Tims Website"/></div>
            </a>
            <div class="text-center col-lg-6">
                <h1>Tim's Blog </h1>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid banner-maincontent" role="main">
    <div class="container container-margin">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Taschenrechner</h2>
            </div>
        </div>
        <form class="taschenrechner">
             <div class="row" style="margin-top: 15px">
                <div class="col-lg-3 col-lg-offset-3 col-xs-6 text-right">
                    <input type="text" name="num1" placeholder="Zahl 1">
                </div>
                <div class="col-lg-3  col-xs-6">
                    <select name="operator">
                        <option>Operator</option>
                        <option>Addieren</option>
                        <option>Subtrahieren</option>
                        <option>Multiplizieren</option>
                        <option>Dividieren</option>
                        <option>Modulo</option>
                        <option>Exponenzieren</option>
                    </select>
                </div>
             </div>
                <div class="row">
                    <div class="col-lg-3 col-lg-offset-3 col-xs-6 text-right">
                        <input type="text" name="num2" placeholder="Zahl 2">
                    </div>
                    <div class="col-lg-3  col-xs-6">
                        <button class="calc-button" type="submit" name="submit" value="submit">Berechne</button>
                    </div>
                </div>
            </form>
        <div class="row">
            <div class="col-lg-offset-3 col-lg-6 text-center">
                <h3>Die Antwort ist: </h3>
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
            </div>
        </div>
        <div class="row container-margin">
            <div class=" col-lg-offset-1 col-lg-5 ">
                <?php
                highlight_file('php/taschenrechner_var.php');
                ?>
            </div>
            <div class="col-lg-6 hidden-sm hidden-xs">
                <p>Öffnender PHP-Tag.<br>
                Überprüfung, ob "Berechne"angeklickt wurde.<br>
                Antworten werden aus dem Form ausgelesen und auf Floats gefiltert.<br>
                <br>
                <br>
                Über die switch-Anweisung werden die ausgewählte Operation ausgeführt.<br>
                Case: Es wurde kein Operator ausgewählt.<br>
                <br><br>
                Case: Addieren der beiden Variablen.
                <br><br><br>
                Case: Subtrahieren der beiden Variablen.
                <br><br><br><br>
                Case: Multiplizieren der beiden Variablen.
                <br><br><br>
                Case: Dividieren der beiden Variablen.
                <br><br><br>
                Case: Erste Variable modulo zweite Variable.
                <br><br><br>
                Case: Erste Variable hoch der zweiten Variable.
                <br><br><br><br><br>
                PHP-Tag wird geschlossen.
                </p>
            </div>
        </div>
    </div>



<?php include_once "php/footer.php"; ?>


