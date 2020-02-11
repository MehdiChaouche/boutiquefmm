<?php
if (!isset($_SESSION)) {
    session_start();
}
//création du panier 'cart'
include 'config.php';
include 'functions.php';
include 'header.php';

if (!isset($_SESSION['cart'])) {
    createCart();
}

$carts = $_SESSION['cart'];
$sum_taxe_price = 0;
$total_product = 0;
$total_products = 0;
$product_number = 0;


if (isset($_POST['modify_cart'])) {
    foreach ($_POST['item'] as $key => $value) {
        changeProduct($key, $value);
    }
}

if (isset($_POST['delete_product'])) {
    foreach ($_POST['delete_product'] as $key => $value) {
        deleteProduct($key);
    }
}

if (isset($_POST['delete_cart'])) {
    deleteCart();
}
//debug($_POST['delete_product']);

if (isset($_POST['validate_cart'])) {
    // Vérifier le stock
    foreach ($_SESSION['cart'] as $id_product => $quantity) {
        $products = viewProduct($bdd, $id_product);
    }
    if ($products['stock'] >= $quantity) {   // Si le stock est supérieur à la quantité de la commande -> Creer la commande
        $order = createOrder($bdd);
        $id_order = $bdd->lastInsertId();
        foreach ($_SESSION['cart'] as $idproduct => $quantity) {
            $order_lines = createOrderLines($bdd, $id_order, $idproduct, $quantity);
            updateStock($bdd, $idproduct, $quantity);
        }
        header('Location: index.php?page=order&id='.$id_order, true, 302);
        exit;
    } else {
        echo "Le stock est insuffisant pour la commande";
    }
}


?>

<div class="container mx-auto ">
    <div>
        <form method="post">
            <table class="table table-hover table-borderless">
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Produit</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Prix Unitaire (TTC)</th>
                    <th scope="col">Total (TTC)</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody class="align-baseline">
                <?php foreach ($_SESSION['cart'] as $id_product => $quantity): ?>
                    <?php $products = viewProduct($bdd, $id_product) ?>
                    <tr>
                        <td><img src="images/<?= $products['id'] ?>.jpg" alt="Photo non disponible" width="50px"></td>
                        <td scope="row"><?= $products['brand'] . ' - ' . $products['name'] ?></td>
                        <td>
                            <input type="text" name="item[<?= $id_product ?>]" value="<?= $quantity ?>">
                        </td>
                        <td>
                            <?= number_format($products['taxe_price'], 2, ',', '') ?> €
                        </td>
                        <td>
                            Total :
                            <?php $total_product = ($products['taxe_price'] * $quantity) ?>
                            <?= number_format($total_product, 2, ',', ' ') ?> €
                        </td>
                        <td>
                            <button class="btn btn-danger" type="submit" name="delete_product[<?= $id_product ?>]">X
                            </button>
                        </td>
                    </tr>
                    <?php $sum_taxe_price += $total_product ?>
                    <?php $total_products += $quantity ?>
                <?php endforeach; ?>
                </tbody>
            </table>
            <hr>
            <h6><strong>Panier
                    : <?= $total_products . ' articles pour un total de ' . number_format($sum_taxe_price, 2, ',', ' ') ?>
                    €
                    TTC</h6></strong>
            <button class="btn btn-success m-3" type="submit" name="validate_cart">Valider le panier</button>
            <button class="btn btn-primary m-3" type="submit" name="modify_cart">Modifer le panier</button>
            <button class="btn btn-danger m-3" type="submit" name="delete_cart">Supprimer le panier</button>
        </form>
    </div>
</div>

