<?php




    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }


    $_SESSION['loggedIn'] = false;

    session_destroy();

    header('Location: ../products.php');