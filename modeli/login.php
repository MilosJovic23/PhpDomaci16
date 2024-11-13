<?php



    require_once "baza.php";

    if ( !isset($_POST["email"]) || empty($_POST["email"]) ) {
        die("you didnt passed the email address");
    }
    if ( !isset($_POST["password"]) || empty($_POST["password"]) ) {
        die("you didnt passed the password");
    }

    $_SESSION['loggedIn'] = false;
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = $baza->query("SELECT * FROM korisnici WHERE email = '$email'");



    if( $result->num_rows == 0 ){
        die("account with this email does not exist");
    }   else {

        $user = $result->fetch_assoc();

        if ( password_verify($password, $user['sifra']) ){
            if( session_status() == PHP_SESSION_NONE ){
                session_start();
                $_SESSION['loggedIn'] = true;
            }
           header("Location:../products.php");
        } else {
            echo "wrong password";
            die('<a href="../index.php">Try again</a>');
        }

    }


    ?>

