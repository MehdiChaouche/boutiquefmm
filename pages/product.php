<?php
session_start();
include 'config.php';
include 'functions.php';
include 'header.php';

$quantity = 0;
$total_products = 0;
$total_price = 0;

/** Création panier */
if (!isset($_SESSION['cart'])) {
    $cart_Create = cartCreate();
}

$id_product = $_GET['id'];
$view_products = viewProduct($bdd, $id_product);

//** Ajout dans panier */
if (isset($_POST['addcart'])) {
    $cart_Add = cartAdd($id_product);
}

if (isset($_POST['reset'])) {
    session_destroy();
}
?>

<div class="float-right">
    <?php foreach ($_SESSION['cart'] as $cart => $quantity): ?>
        <strong>x</strong>
        <?php $products = viewProduct($bdd, $cart) ?> <?= $quantity . ' - ' . $products['brand'] . ' - ' . $products['name'] . ' à ' . number_format($products['taxe_price'], 2, ',', ' ') ?>
        <?php $total_price += $products['taxe_price'] * $quantity ?>
        <?php $total_products += $quantity ?>
        <br>
    <?php endforeach; ?>
    <span class="badge badge-light"><?php echo $total_products; ?> article(s)<br></span>
    <h6><a href="index.php?page=cart" class="badge badge-warning">Prix total : <?= number_format($total_price, 2, ',', ' ') ?> € TTC </a>
    </h6>
</div>
<div class="card mt-3 mx-auto col-md-8 shadow">
    <div class="row no-gutters">
        <div class="col-md-4">
            <img src="../images/<?= $view_products['id'] ?>.jpg" alt="..." width="100%">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><h3><?= $view_products['brand'] . ' - ' . $view_products['name'] ?></h3></h5>
                <h3 class="card-text"><strong><?= number_format($view_products['taxe_price'], 2, ',', ' ') ?>
                        € </strong><small>TTC</small></h3>
                <hr class="alert-secondary">
                <p class="card-text text-justify"><?= $view_products['description'] ?></p>
            </div>
            <div class="card-body text-center">
                <form method="post">
                    <input type="submit" class="btn btn-secondary" name="addcart" id="addcart"
                           value="Ajouter au panier">
                </form>
            </div>
            <div class="card-body text-center">
                <form method="post">
                    <input type="submit" class="btn btn-primary" name="reset" value="Reset tes ancêtres stp ?">
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>
