<?php
session_start();
include 'pages/config.php';
include 'pages/functions.php';
include 'pages/header.php';

$total_product = 0;
$sum_taxe_price = 0;
$total_products = 0;
$id_order = $_GET['id'];
?>
<div class="container mx-auto mt-3">
    <h2>Commande numéro <?= $id_order ?></h2>
    <hr>
    <?php $view_order = viewOrder($bdd, $id_order); ?>
    <table class="table table-hover table-borderless">
        <thead>
        <tr>
            <th scope="col">Produit</th>
            <th scope="col">Quantité</th>
            <th scope="col">Prix Unit. (HT)</th>
            <th scope="col">TVA unit.</th>
            <th scope="col">Total (TTC)</th>
        </tr>
        </thead>
        <tbody class="align-baseline">
        <?php foreach ($view_order as $order_line): ?>
            <tr>
                <td scope="row"><?= $order_line['brand_name'] . ' - ' . $order_line['product_name'] ?></td>
                <td>
                    <?= $order_line['quantity'] ?>
                </td>
                <td>
                    <?= number_format($order_line['price'], 2, ',', '') ?> €
                </td>
                <td>
                    <?= number_format(($order_line['taxe']*$order_line['price']/100), 1, ',', '') ?> €
                </td>
                <td>
                    Total :
                    <?php $total_product = (($order_line['price'] + ($order_line['taxe']*$order_line['price']/100)) * $order_line['quantity']) ?>
                    <?= number_format($total_product, 2, ',', ' ') ?> €
                </td>
            </tr>
            <?php $sum_taxe_price += $total_product ?>
            <?php $total_products += $order_line['quantity'] ?>
        <?php endforeach; ?>
        </tbody>
    </table>
    <hr>
    <h5 class="text-right"><strong>Panier
            : <?= $total_products . ' articles pour un total de ' . number_format($sum_taxe_price, 2, ',', ' ') ?>
            €
            TTC</h5></strong>
    <hr>
    <h5>Votre commande a été validée. Merci de procéder au payement.</h5>
    <button class="btn btn-success" type="submit" name="add_cart">Payement</button>
</div>
