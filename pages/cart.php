<?php
if (!isset($_SESSION)) {
    session_start();
}
include 'config.php';
include 'functions.php';
include 'header.php';

$carts = $_SESSION['cart'];
$total_price = 0;
$total_product = 0;
$total_products = 0;

?>
    <br>
    <form method="post">
        <p>
            <?php foreach ($_SESSION['cart'] as $id_product => $quantity): ?>
            <?php if (isset($_POST['cart_quantity'])) {
                $quantity = $_POST['cart_quantity'];
            } ?>
            <?php $products = viewProduct($bdd, $id_product) ?>
            <?= $products['brand'] . ' - ' . $products['name'] ?> <strong>x</strong>
            <input type="text" name="cart_quantity" value="<?= $quantity ?>">
            - Total :
            <?php $total_product = ($products['taxe_price'] * $quantity) ?>
            <?= number_format($total_product, 2, ',', ' ') ?> € </p>
        <hr>
        <?php $total_price += $total_product ?>
        <?php $total_products += $quantity ?>
        <?php endforeach; ?>
        <h6><span class="badge badge-warning">Prix total
            : <?= $total_products . ' articles pour un total de ' . number_format($total_price, 2, ',', ' ') ?> €
                TTC </span></h6>

        <button class="btn btn-secondary m-3" type="submit" name="addcart">Modifer le panier</button>
    </form>


<?php
include 'footer.php';