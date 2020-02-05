<?php
include 'config.php';
include 'functions.php';
include 'header.php';

$id_product = $_GET['id'];
debug($_GET);
debug($id_product);
$view_products = viewProducts($bdd, $id_product);
debug($view_products);
?>


<h1></h1>
