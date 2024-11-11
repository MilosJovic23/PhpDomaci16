<?php


    require_once "baza.php";

    if ( !isset($_POST["email"]) || empty($_POST["email"]) ) {
        die("you didnt passed the email address");
    }
    if ( !isset($_POST["password"]) || empty($_POST["password"]) ) {
        die("you didnt passed the password");
    }

    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $registration = false;

    $result = $baza->query("SELECT * FROM korisnici WHERE email = '$email'");

    if( $result->num_rows == 0 ){
        $baza->query("INSERT INTO korisnici (email,sifra) VALUES ('$email','$password')");
        $registration = true;
        echo "your account has been created";
        die('<a href="../index.php">Click here to login</a>');
    } else {
        die("user with this email already exists");
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
    <a href="index.php">Go to login page</a>
</body>
</html>
