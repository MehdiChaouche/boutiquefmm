<?php
session_start();
include 'config.php';
include 'functions.php';
include 'header.php';

$productquantity = 1;
$id_product = $_GET['id'];
$view_products = viewProduct($bdd, $id_product, $productquantity);
if (isset($_POST['addcart'])) {
    $cart_Create = cartCreate();
    $cart_Add = cartAdd($id_product, $productquantity);
    debug($_SESSION);
}
if (isset($_POST['reset'])) {
    session_destroy();
}
?>


<div class="card mt-3 mx-auto col-md-8 shadow">
    <h3>Quantité : <?php echo $_SESSION['cart'][$id_product] ?></h3>
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
