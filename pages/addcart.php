<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['cart'])) {
    createCart();
}
$carts = $_SESSION['cart'];
$sum_taxe_price = 0;
?>
<div class="btn-group">
    <a type="button" class="btn btn-secondary" href="../index.php?page=cart">Détail du panier</a>
    <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <div class="dropdown-menu">
        <h6> Votre panier contient : </h6>
        <?php foreach ($carts as $cart => $quantity): ?>
        <a class="dropdown-item"><p>
                <?php $products = viewProduct($bdd, $cart) ?>
                <img src="images/<?= $products['id'] ?>.jpg" alt="Photo non disponible" width="50px">
                <?= $products['brand'] . ' - ' . $products['name'] . ' - ' . $quantity . '
                <strong>x</strong> ' . number_format($products['taxe_price'], 2, ',', ' ') ?>
                €
            </p>
            <?php $sum_taxe_price += $products['taxe_price'] ?>
            <?php endforeach; ?></h6></a>
        <div class="dropdown-divider"></div>
        <h6>Total panier : <?= number_format($sum_taxe_price, 2, ',', ' ') ?> € TTC </h6>
    </div>
</div>




