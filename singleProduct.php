
<?php


    require_once "modeli/baza.php";


    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }


    $id = $_GET["id"];
    $id = $baza -> real_escape_string($id);

    $result = $baza->query("SELECT * FROM proizvodi WHERE id='$id' ") ;

    if (  $result->num_rows == 0 ){
        die("proizvod sa ovim id-em nepostoji");
    } else{
        $product = $result->fetch_assoc();
    }


?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Document</title>
        <link rel="stylesheet" href="css/products.css">
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

        </ul>
    </nav>
    <div class="product">
        <h3><?=  $product["ime"]; ?></h3>
        <p><?=  $product["opis"]; ?></p>
        <p>cena: <?=  $product["cena"]; ?> &dollar;</p>
        <p>kolicina: <?=  $product["kolicina"] > 0 ? $product["kolicina"] : "nema na stanju" ; ?> </p>
        <?php if( isset($_SESSION["loggedIn"])):  ?>
            <form action="korpa.php" method="POST">
                <input type="number" name="kolicina" placeholder="unesite kolicnu proizvoda">
                <input name="id_proizvoda" value="<?= $product['id'] ?>" type="hidden">
                <button class="button">dodaj u korpu</button>
            </form>
        <?php else: ?>
            <a class="button" href="index.php">kliknite da se ulogujete kako biste dodali proizvod u kropu!</a>
        <?php endif; ?>
    </div>
    </body>
</html>