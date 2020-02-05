<?php
if (isset($_GET['page'])) {
    $nompage = $_GET['page'];
} else {
    $nompage = 'accueil';
}
$route = ['accueil' => './pages/home.php', '404' => './pages/404.php'];
if (isset($route[$nompage])) {
    $nomdufichier = $route[$nompage];
} else {
    $nomdufichier = "./pages/404.php";
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
    $nomdufichier = "./pages/home.php";
}
/*----- Fin logigramme ---- */
include 'config.php';
include 'functions.php';
include "$nomdufichier";
