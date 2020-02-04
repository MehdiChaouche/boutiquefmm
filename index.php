<?php
include 'config.php';
include 'functions.php';
include 'header.php';
include 'footer.php' ;

$new_products = newProducts(boutiquefmm) ;
?>

    <h1>Site boutique</h1>

<?php

foreach ($new_products as $new_product) {
    echo '<a href="product.php?id=' . $new_product['id'] . ' "><h2>' . $new_product['name'] . '  </h2></a>';
    echo '<p>' . $new_product['description'] . '</p>';
}
