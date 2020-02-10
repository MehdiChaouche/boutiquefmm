<?php
if(!isset($_SESSION)) {
    session_start();
}
//création du panier 'cart'
include 'config.php';
include 'functions.php';
include 'header.php';
$quantity = 1;
$id_product_get = $_GET['id'];
$view_products = viewProduct($bdd, $id_product_get);
//$product_stock = getStock($bdd, $id_product_get);

if (!isset($_SESSION['cart'])) {
    $create_cart = createCart();
}

if (isset($_POST['add_cart'])) {
    $add_cart = addProduct($id_product_get, intval($_POST['cart_quantity']));
    header('Location: index.php?page=cart', true, 302);
    exit;
}
//debug($_SESSION['cart']);
?>

<div class="card mt-3 mx-auto col-md-8 shadow">
    <div class="row no-gutters">
        <div class="col-md-4">
            <img src="../images/<?= $view_products['id'] ?>.jpg" alt="..." width="100%">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h3 class="card-title"><?= $view_products['brand'] . ' - ' . $view_products['name'] ?></h3>
                <h3 class="card-text"><strong><?= number_format($view_products['taxe_price'], 2, ',', ' ') ?>
                        € </strong><small>TTC</small></h3>
                <hr class="alert-secondary">
                <p class="card-text text-justify"><?= $view_products['description'] ?></p>
                <p class="text-right">Il reste <?= $view_products['stock'] ?> produits en stock.</p>
                <form method="post">
                <div>Quantité : <input type="text" name="cart_quantity" value=""></div>
                    <button class="btn btn-secondary m-3" type="submit" name="add_cart">Ajouter au panier</button>
                </form>
            </div>
        </div>
    </div>
</div>

