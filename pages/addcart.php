<?php
if (!isset($_SESSION)) {
    session_start();
}
$carts = $_SESSION['cart'];

?>
<div class="dropdown">
    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Panier
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <h6> Votre panier contient : </h6>
        <?php foreach ($carts
        as $cart => $quantity): ?>
        <a class="dropdown-item" href="#"><p><?= $quantity ?>
            <strong>x</strong> <?php $products = viewProduct($bdd, $cart) ?> <?= $products['brand'] . ' - ' . $products['name'] . ' à ' . number_format($products['taxe_price'], 2, ',', ' ') ?> €
        </p>
        <?php endforeach; ?></h6></a>
    </div>
</div>





