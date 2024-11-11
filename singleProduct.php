
<?php



    require_once "modeli/baza.php";

    $id = $_GET["id"];



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
    </head>
    <body>
    <div class="product">
        <h3><?=  $product["ime"]; ?></h3>
        <p><?=  $product["opis"]; ?></p>
        <p>cena: <?=  $product["cena"]; ?> &dollar;</p>
        <p>kolicina: <?=  $product["kolicina"] > 0 ? $product["kolicina"] : "nema na stanju" ; ?> </p>
    </div>
    </body>
</html>