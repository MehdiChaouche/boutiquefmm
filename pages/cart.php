<?php
if (!isset($_SESSION)) {
    session_start();
}
include 'config.php';
include 'functions.php';
include 'header.php';

if (isset($_POST['modcart'])) {
    foreach ($_POST['item'] as $key => $value) {
        cartMod($key, $value);
    }
}

if (isset($_POST['deletecart'])) {
    foreach ($_POST['deletecart'] as $key => $value) {
        cartDel($key);
    }
}

if (isset($_POST['validcart'])) {
    $orderCreate = cartOrderValidate($bdd);
    $lastorderID = $bdd->lastInsertId();
    foreach ($_SESSION['cart'] as $id_product => $quantity) {
        $cartOrderLineValidate = cartOrderLineValidate($bdd, $id_product, $quantity, $lastorderID);
        debug($cartOrderLineValidate);
        debug($quantity);
        debug($id_product);
        debug($lastorderID);
        debug($orderCreate);
    }
}

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
            <input type="text" name="item[<?= $id_product ?>]" value="<?= $quantity ?>">
            - Total :
            <?php $total_product = ($products['taxe_price'] * $quantity) ?>
            <?= number_format($total_product, 2, ',', ' ') ?> €
            <button class="btn btn-secondary" type="submit" name="deletecart[<?= $id_product ?>]">Suppr.</button>
        </p>
        <hr>
        <?php $total_price += $total_product ?>
        <?php $total_products += $quantity ?>
        <?php endforeach; ?>
        <h6><span class="badge badge-warning">Prix total
            : <?= $total_products . ' articles pour un total de ' . number_format($total_price, 2, ',', ' ') ?> €
                TTC </span></h6>

        <button class="btn btn-secondary m-3" type="submit" name="modcart">Modifer le panier</button>
        <button class="btn btn-secondary m-3" type="submit" name="validcart">Valider le panier</button>
    </form>


<?php
include 'footer.php';