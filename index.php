<?php
/* ------ Logique -----*/
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if ($page == 'home') {
        $url_page = 'home';
    } elseif ($page == 'login') {
        $url_page = 'login';
    } elseif ($page == 'product') {
        $url_page = 'product';
    } elseif ($page == 'addcart') {
        $url_page = 'addcart';
    } elseif ($page == 'products') {
        $url_page = 'products';
    } elseif ($page == 'cart') {
        $url_page = 'cart';
    } elseif ($page == 'order') {
        $url_page = 'order';
    } else {
        $url_page = '404';
    }
} else {
    $url_page = 'home';
}

/* ------ fin logique -----*/
/* ------ Début execution -----*/
include 'pages/' . $url_page . '.php';
//include 'layout.php';
/* ------ Fin execution -----*/