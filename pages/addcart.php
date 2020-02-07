<?php
if (!isset($_SESSION)) {
    session_start();
}
$carts = $_SESSION['cart'];
$sum_taxe_price = 0;
?>
<div class="dropdown">
    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
        Panier
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <h6> Votre panier contient : </h6>
        <?php foreach ($carts as $cart => $quantity): ?>
        <a class="dropdown-item"><p><?= $quantity ?>
                <strong>x</strong> <?php $products = viewProduct($bdd, $cart) ?> <?= $products['brand'] . ' - ' . $products['name'] . ' à ' . number_format($products['taxe_price'], 2, ',', ' ') ?>
                €
            </p>
            <?php $sum_taxe_price += $products['taxe_price'] ?>
            <?php endforeach; ?></h6></a>
        <h6>Total panier : <?= number_format($sum_taxe_price, 2, ',', ' ') ?> € TTC </h6>
    </div>
</div>




