<?php

    require_once "modeli/baza.php";


    $result = $baza->query("SELECT * FROM proizvodi");

    if ($result->num_rows > 0) {
        $products =  $result->fetch_all(MYSQLI_ASSOC);
    }



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
        <main class="productsPage">
            <div class="container">
                <form method="GET" action="modeli/search.php">
                    <input type="text" name="search" placeholder="unesite rec za pretragu" required>
                    <button type="submit" class="button">Pretrazi proizvod</button>
                </form>
            </div>
            <div class="container">
                <form method="GET" action="modeli/addProduct.php">
                    <input type="text" name="ime" placeholder="ime">
                    <input type="text" name="opis" placeholder="opis">
                    <input type="number" name="cena" placeholder="cena">
                    <input type="number" name="kolicina" placeholder="kolicina">
                    <button class="button">dodaj proizvod</button>
                </form>


            </div>
            <div class="container">

                <?php foreach ( $products as $key => $product ): ?>
                    <div class="product">
                        <h3><?=  $product["ime"]; ?></h3>
                        <p><?=  $product["opis"]; ?></p>
                        <p>cena: <?=  $product["cena"]; ?> &dollar;</p>
                        <p>kolicina: <?=  $product["kolicina"] > 0 ? $product["kolicina"] : "nema na stanju" ; ?> </p>
                        <a href="singleProduct.php?id=<?= $product["id"] ?>">pogledaj proizvod</a>
                    </div>
                <?php endforeach; ?>


            </div>

        </main>
    </body>
</html>
