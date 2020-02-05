<?php

include 'functions.php';

$titre = 'Produit';

$nompage = $_GET['page'];

$showproducts = indexProducts($bdd);


foreach ($showproducts as $showproduct) {
    echo $showproduct['name'];
    echo $showproduct['description'];
}


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content=$meta>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="boutiquefmm.css">

    <title> <?php echo $titre ?> </title>

</head>

<header class="bg-warning">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 text-center h1 ">
                <H1>Boutique FMM</H1>
            </div>
        </div>
    </div>
</header>

<main class="maincv">
    <nav class="nav">
        <ul>
            <li><a href="accueil.php">Accueil</a></li>
        </ul>
    </nav>
    <div class="titre">
        <h2>Une sublime montre connectée</h2>
        <img src="montre.jpg" alt="montre connectée" id="photomontre">
    </div>
    <div class="info">
        <p>Une subime montre connectée, à la poche de l'utilisateur bien entendu !</a></p>
    </div>

</main>

<footer class="bg-warning">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="row">
                    <p class="col-4 text-center"><a href="mailto:contact@le-campus-numerique.fr"
                                                    class="text-dark"><img src="mail.png" width="30" height="30"
                                                                           title="mail"
                                                                           alt="mail"><br>
                            contact@le-campus-numerique.fr</a>
                    </p>
                    <p class="col-4 text-center"><img src="adresse.png" alt="lieu" width="30" height="30"/><br>
                        33 Grande Rue,26000 valence</p>
                    <p class="col-4 text-center"><img src="tel.png" alt="tel" width="30" height="30"><br>
                        04
                        75 78 61 33</p>
                </div>
            </div>
        </div>
    </div>

</footer>