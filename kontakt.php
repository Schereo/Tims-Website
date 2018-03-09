<?php include_once "php/header.php"; ?>

<div class="container-fluid banner-heading" role="banner">
      <div class="container">
            <div class="row">
              <a href="index.php"><div class="col-lg-3"><img src="bilder/Logo.svg" alt="Logo von Tims Website"/></div>
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
            <div class="col-lg-6">
                <p><h2>Impressum</h2>Angaben gemäß § 5 TMG<br>
                    Tim Sigl<br>
                    Krusenweg 26<br>
                    26135 Oldenburg</p>
                    <p><h3>Kontakt:</h3>
                    E-Mail: <a href="mailto:tim.sigl@hotmail.de?subject=Anfrage zu Ihrer Website">tim.sigl@hotmail.de</a><br>
                    Telefon: Auf Anfrage.
                </p>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <p><h2>Kontaktformular</h2>
                        <form method="post" action="php/actions.php">
                            <div class="col-lg-6">
                                Vorname:<br>
                                    <input type="text" name="vorname"><br>
                                Nachname:<br>
                                    <input type="text" name="nachname"><br>
                                E-Mail:<br>
                                    <input type="email" name="email"><br>
                                    <br>
                                    <input type="submit" value="Senden">
                            </div>
                            <div class="col-lg-6">
                                Nachricht:<br>
                                <textarea type="text" rows="6" name="nachricht"></textarea>
                            </div>
                        </form>
                    </p>
                </div>
            </div>
        </div>
      </div>
    </div>
<?php include_once "php/footer.php" ?>