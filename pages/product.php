<?php
session_start();
//création du panier 'cart'

include 'config.php';
include 'functions.php';
include 'header.php';

$id_product = $_GET['id'];
$view_products = viewProduct($bdd, $id_product);
//debug($view_products);

/*$_SESSION['cart'] = array(
    "id_session" => $id_product,
    "marque_article" => $view_products['brand']
);

var_dump($_SESSION);*/
if (!isset($_SESSION['cart'])) {
    $create_cart = createCart();
}

if(!isset($_POST['add_cart'])) {
$add_cart = addProduct($id_product, 1);
}
debug($_SESSION['cart']);
?>




<h2>Panier :</h2>

<?php /*if (isset($add_product)): */?><!--
    Id produit : <?/*= $add_product['cart']['id_product'] */?> </br>
    Prix : <?/*= number_format($add_product['cart']['price'], 2, ',', ' ') */?>

--><?php /*endif; */?>

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
            </div>
            <form method="post">
                <button class="btn btn-secondary m-3" type="submit" name="add_cart">Ajouter au panier</button>
            </form>
        </div>
    </div>
</div>

