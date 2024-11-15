<?php


    require_once  "modeli/baza.php";

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if ( !isset($_POST["id_proizvoda"]) || empty($_POST["id_proizvoda"]) ) {
        die("morate uneti id proizvoda");
    }
    if ( !isset($_POST["kolicina"]) || empty($_POST["kolicina"]) ) {
        die("niste prosledli kolicinu");
    }




    $kolicina = $_POST["kolicina"];
    $idProizvoda = $_POST["id_proizvoda"];
    $idKorisnika = $_SESSION["user_id"];

    $kolicina = $baza->real_escape_string($kolicina);
    $idProizvoda = $baza->real_escape_string($idProizvoda);
    $idKorisnika = $baza->real_escape_string($idKorisnika);


    $rezultat = $baza->query("SELECT cena FROM proizvodi WHERE id = '$idProizvoda'");

    if ( $rezultat->num_rows == 0 ) {
        die("ne postoji proizvod sa tim id-em");
    }
    else{
        $proizvod = $rezultat->fetch_assoc();
        $cena = $proizvod["cena"];
    }

    $ukupnaCena = $cena * $kolicina;
    $ukupnaCena = $baza->real_escape_string($ukupnaCena);

    $baza->query("INSERT INTO narudzbine (id_proizvoda,id_korisnika,cena,kolicina) VALUES ('$idProizvoda','$idKorisnika','$ukupnaCena','$kolicina')");



?>