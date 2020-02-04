<?php
if (isset($_GET['page'])) {
    $nompage = $_GET['page'];
} else {
    $nompage = 'accueil';
}
$route = ['accueil' => './pagesprincipales/accueil.php', '404' => './pagesprincipales/404.php'];
if (isset($route[$nompage])) {
    $nomdufichier = $route[$nompage];
} else {
    $nomdufichier = "./pagesprincipales/404.php";
}
/* ----- Début logigramme ---- */
if (isset($_GET['page'])) {
    $nompage = $_GET['page'];
    if ($nompage == "accueil") {
        $nomdufichier = "./pagesprincipales/accueil.php";
    } else {
        echo "Erreur 404 !";
    }
} else {
    $nomdufichier = "./pagesprincipales/accueil.php";
}
/*----- Fin logigramme ---- */
include $nomdufichier;
include 'layout.php';