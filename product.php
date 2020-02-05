<?php
include 'config.php';
include 'functions.php';
include 'header.php';

$id_product = $_GET['id'];
$view_products = viewProduct($bdd, $id_product);
?>

<h1>Asimov Robotics</h1>

<hr>
NAVBAR
<hr>

<h3><?= $view_products['brand'] . ' - ' . $view_products['name'] ?></h3>

<img src="images/<?= $view_products['id'] ?>.jpg" alt="..." width="20%">

<p><?= $view_products['description'] ?></p>

<h3>Prix : <?= $view_products['taxe_price'] ?> € </h3>
