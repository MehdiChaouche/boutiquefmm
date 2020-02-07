<?php
/**
 * @param $var
 */
function debug($var)
{
    highlight_string("<?php\n\n" . var_export($var, true) . ";\n?>");
}

/** FONCTION indexProducts qui affiche l'ensemble des produits sur l'index avec la marque, le nom, la description et le prix
 * @param PDO $ma_bdd
 * @return array
 */
function indexProducts(PDO $ma_bdd): array
{
    $query = $ma_bdd->query('SELECT id, brand, name, description, price FROM products ORDER BY arrival_date');
    $response_indexProducts = $query->fetchAll(PDO::FETCH_ASSOC);
    return $response_indexProducts;
}


/** FONCTION viewProduct qui affiche un produit en fonction de son id
 * @param PDO $ma_bdd
 * @param int $id_product
 * @return array;
 */
function viewProduct(PDO $ma_bdd, int $id_product): array
{
    $query = $ma_bdd->query('SELECT id, brand, name, description, SUM(price+(price*taxe)/100) AS taxe_price FROM products WHERE id =' . $id_product);
    $response_viewProduct = $query->fetch(PDO::FETCH_ASSOC);
    return $response_viewProduct;
}

function cartCreate() // On vérifie si le panier existe ou non
{
    $_SESSION['cart'] = array();
}

function cartAdd($id_product)
{
    if (!isset($_SESSION['cart'][$id_product])) {
        $_SESSION['cart'][$id_product] = 1;
    } else {
        $_SESSION['cart'][$id_product] = $_SESSION['cart'][$id_product] + 1;
    }
    return $_SESSION;
}

function cartMod($quantity)
{
    if (isset($_POST['cart_quantity'])) {
        $quantity = $_POST['cart_quantity'];
    }
}