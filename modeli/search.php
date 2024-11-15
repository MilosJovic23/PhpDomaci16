<?php



    require_once "baza.php";


    $searchTerm = $_GET["search"];

    $searchTerm = $baza->real_escape_string($searchTerm);


    $result = $baza->query("SELECT * FROM proizvodi WHERE ime LIKE '%$searchTerm%' OR opis LIKE '%$searchTerm%'");


    if( $result->num_rows > 0 ){
        $searchResult = $result->fetch_all(MYSQLI_ASSOC);
    }
    else {
        die("nismo pronasli porizvod sa unetom pretragom");
    }


    echo '<a href="../products.php">Go to products page</a>';

?>


<!doctype html>
<html lang="en">
<head>
    <title>Homework 5</title>
</head>
<body>
<div>

    <table>
        <thead>
        <tr>
            <th>ime</th>
            <th>opis</th>
            <th>cena</th>
            <th>kolicina</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ( $searchResult as $key => $product ): ?>
            <tr>
                <td><?= $product["ime"];  ?></td>
                <td><?= $product["opis"];  ?></td>
                <td><?= $product["cena"];  ?></td>
                <td><?= $product["kolicina"];  ?></td>
            </tr>
        <?php endforeach; ?>


        </tbody>
    </table>
</div>
</body>
</html>
