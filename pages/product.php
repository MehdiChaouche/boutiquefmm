<?php
include 'config.php';
include 'functions.php';
include 'header.php';


$id_product = $_GET['id'];
$view_products = viewProduct($bdd, $id_product);
?>


<div class="card mt-3 mx-auto col-md-8 shadow">
    <div class="row no-gutters">
        <div class="col-md-4">
            <img src="../images/<?= $view_products['id'] ?>.jpg" alt="..." width="100%">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><h3><?= $view_products['brand'] . ' - ' . $view_products['name'] ?></h3></h5>
                <h3 class="card-text"><strong><?= number_format($view_products['taxe_price'], 2, ',', ' ') ?>
                        € </strong><small>TTC</small></h3>
                <hr class="alert-secondary">
                <p class="card-text text-justify"><?= $view_products['description'] ?></p>
            </div>
        </div>
    </div>
</div>