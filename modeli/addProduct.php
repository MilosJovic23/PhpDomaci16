<?php


    require_once "baza.php";



    if ( !isset( $_GET["ime"]) || empty( $_GET["ime"] ) ) {
        die("niste prosledili ime");
    }
    if ( !isset( $_GET["opis"]) || empty( $_GET["opis"] ) ) {
        die("niste prosledili opis");
    }
    if ( !isset( $_GET["cena"]) || empty( $_GET["cena"] ) ) {
        die("niste prosledili cenu");
    }


    if ( !isset( $_GET["kolicina"]) || empty( $_GET["kolicina"] ) ) {
        die("niste prosledili kolicinu");
    }



    $ime = $_GET["ime"];
    $opis = $_GET["opis"];
    $cena = $_GET["cena"];

    $kolicina = $_GET["kolicina"];


    var_dump($_GET);

    $baza->query("INSERT INTO proizvodi(ime,opis,cena,kolicina) VALUES('$ime','$opis','$cena','$kolicina')");
    echo "uspesno ste dodali proizvod";
    die('<a href="../products.php">Go to products page</a>');



?>