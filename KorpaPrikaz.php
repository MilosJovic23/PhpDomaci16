

<?php

    require_once "modeli/baza.php";


    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }


    $idKorisnika = $baza -> real_escape_string($_SESSION['user_id']) ;

    $rezultat = $baza->query("SELECT * FROM narudzbine WHERE id_korisnika = '$idKorisnika'");


    $narudzbine = $rezultat->fetch_all(MYSQLI_ASSOC);


?>




<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/products.css">
        <title>Document</title>
    </head>
    <body>
        <nav class="navContainer">
            <ul class="navigation">
                <a href="products.php"><li>Glavna</li></a>
                <?php if( isset($_SESSION["loggedIn"])):  ?>
                    <a href="modeli/logout.php"><li>logout</li></a>
                <?php else: ?>
                    <a href="index.php"><li>login</li></a>
                <?php endif; ?>
                <a href="KorpaPrikaz.php"><li>Korpa</li></a>
            </ul>

        </nav>
        <div>
            <?php if( $rezultat->num_rows == 0 ): ?>
                <p>korpa je prazna</p>
            <?php else: ?>

            <?php foreach($narudzbine as $narudzbina): ?>
                <p>cena:<?= $narudzbina["cena"]; ?></p>
                <p>kolicina:<?= $narudzbina["kolicina"]; ?></p>
            <?php endforeach; ?>

            <?php endif; ?>
        </div>
    </body>
</html>