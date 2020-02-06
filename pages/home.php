<?php
session_start();

include 'pages/config.php';
include 'pages/functions.php';
include 'pages/header.php';
$new_products = indexProducts($bdd);
//debug($new_products);
?>
<div class="container row mt-4 mx-auto">
    <div class="card-columns">
        <?php foreach ($new_products as $new_product): ?>
            <div class="card col-md-10 shadow">
                <img class="card-img-top" src="images/<?= $new_product['id'] ?>.jpg" alt="Photo non disponible">
                <div class="card-header">
                    <h4 class=" font-weight-normal"><?= $new_product['brand'] ?> </h4> <h6> <i> <?= $new_product['name'] ?></i></h6>
                </div>
                <div class="card-body text-center">
                    <h3 class="card-title pricing-card-title text-center"><?php $prixht = $new_product['price'] ; $tva = $new_product['taxe'] ;
                        $prixttc = ($prixht + ($prixht*$tva)/100); echo number_format($prixttc, 2, ',', ' ')  ; ?> € </h3>
                    <a class="btn btn-secondary" href="index.php?page=product&id=<?= $new_product['id'] ?>" role="button">Voir le
                        détail du produit</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>





