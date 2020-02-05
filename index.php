<?php

include 'config.php';
include 'functions.php';

if (isset($_GET['page'])) {
    $nompage = $_GET['page'];

} else {
    $nompage = 'home';
}

$route = ['home' => 'home.php', '404' => '404.php'];

if (isset($route[$nompage])) {
    $nomdufichier = $route[$nompage];

} else {
    $nomdufichier = "404.php";
}


/* ----- Début logigramme ---- */

if (isset($_GET['page'])) {
    $nompage = $_GET['page'];

    if ($nompage == "home") {
        $nomdufichier = "home.php";

    } else {
        $nomdufichier = "404.php";
    }

} else {
    $nomdufichier = "home.php";
}

/*----- Fin logigramme ---- */

include $nomdufichier;