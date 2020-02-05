<?php
if (isset($_GET['page'])) {
    $nompage = $_GET['page'];
} else {
    $nompage = 'accueil';
}
$route = ['accueil' => './pagesprincipales/home.php', '404' => './pagesprincipales/404.php'];
if (isset($route[$nompage])) {
    $nomdufichier = $route[$nompage];
} else {
    $nomdufichier = "./pagesprincipales/404.php";
}
/* ----- Début logigramme ---- */
if (isset($_GET['page'])) {
    $nompage = $_GET['page'];
    if ($nompage == "accueil") {
        $nomdufichier = "./pagesprincipales/home.php";
    } else {
        echo "Erreur 404 !";
    }
} else {
    $nomdufichier = "./pagesprincipales/home.php";
}
/*----- Fin logigramme ---- */
include 'config.php';
include 'functions.php';
include "$nomdufichier";
