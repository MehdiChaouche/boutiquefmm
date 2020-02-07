<?php
if (!isset($_SESSION)) {
    session_start();
}
//création du panier 'cart'
include 'config.php';
include 'functions.php';
include 'header.php';

$carts = $_SESSION['cart'];
$sum_taxe_price = 0;
$total_product = 0;
$total_products = 0;

?>

<h1>Panier</h1>
<form method="post">
    <p>
        <?php foreach ($_SESSION['cart'] as $id_product => $quantity): ?>
        <?php $products = viewProduct($bdd, $id_product) ?>
        <?= $products['brand'] . ' - ' . $products['name'] ?> <strong>x</strong>
        <input type="text" name="cart_quantity" value="<?= $quantity ?>">
        - Total :
        <?php $total_product = ($products['taxe_price'] * $quantity) ?>
        <?= number_format($total_product, 2, ',', ' ') ?> € </p>
    <hr>
    <?php $sum_taxe_price += $total_product ?>
    <?php $total_products += $quantity ?>
    <?php endforeach; ?>
    <h6>Total panier
        : <?= $total_products . ' articles pour un total de ' . number_format($sum_taxe_price, 2, ',', ' ') ?> €
        TTC </h6>

    <button class="btn btn-secondary m-3" type="submit" name="add_cart">Modifer le panier</button>
</form>
<?php
//if (isset($_POST)) {
//$quantity = changeProduct(, intval($_POST['cart_quantity']));
//}else {
//    $quantity = $quantity;
//}
?>

