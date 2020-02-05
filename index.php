<?php
include 'config.php';
include 'functions.php';
include 'header.php';
$new_products = indexProducts($bdd);
//debug($new_products);
?>


<h1>Asimov Robotics</h1>

<hr>
NAVBAR
<hr>


<?php foreach ($new_products as $new_product): ?>

    <img src="images/<?= $new_product['id'] ?>.jpg" alt="..." width="10%">
    <a href="product.php?id=<?=$new_product['id']?>"><h2><?=$new_product['brand'] .' - '. $new_product['name'] ?></h2></a>
    <p><?= $new_product['description'] ?></p>
<hr>
<?php endforeach; ?>




