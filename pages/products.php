<?php
session_start();
include 'pages/config.php';
include 'pages/functions.php';
include 'pages/header.php';
$all_products = allProducts($bdd);

if (!isset($_SESSION['cart'])) {
    $create_cart = createCart();
}

?>
<div class="container row mt-4 mx-auto">
    <div class="card-columns">
        <?php foreach ($all_products as $all_product): ?>
            <div class="card col-md-10 shadow">
                <img class="card-img-top" src="images/<?= $all_product['id'] ?>.jpg" alt="Photo non disponible">
                <div class="card-header">
                    <h4 class=" font-weight-normal"><?= $all_product['brand'] ?> </h4> <h6> <i> <?= $all_product['name'] ?></i></h6>
                </div>
                <div class="card-body text-center">
                    <h3 class="card-title pricing-card-title text-center"><?php $prixht = $all_product['price'] ; $tva = $all_product['taxe'] ;
                    $prixttc = ($prixht + ($prixht*$tva)/100); echo number_format($prixttc, 2, ',', ' ') ; ?> €
                    </h3>
                    <a class="btn btn-primary" href="index.php?page=product&id=<?= $all_product['id'] ?>" role="button">Détail</a>
                    <a class="btn btn-warning" name="add_cart" role="button">Ajouter</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>




