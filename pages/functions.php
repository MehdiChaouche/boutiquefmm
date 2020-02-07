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
    $query = $ma_bdd->query('SELECT id, brand, name, description, price, taxe FROM products ORDER BY arrival_date LIMIT 6');
    $response_indexProducts = $query->fetchAll(PDO::FETCH_ASSOC);
    return $response_indexProducts;
}


function allProducts(PDO $ma_bdd): array
{
    $query = $ma_bdd->query('SELECT id, brand, name, description, price, taxe FROM products ORDER BY brand');
    $response_allProducts = $query->fetchAll(PDO::FETCH_ASSOC);
    return $response_allProducts;
}


/** FONCTION viewProduct qui affiche un produit en fonction de son id
 * @param PDO $ma_bdd
 * @param int $id_product
 * @return array
 */
function viewProduct(PDO $ma_bdd, int $id_product): array
{
    $query = $ma_bdd->query('SELECT id, brand, name, description, SUM(price+(price*taxe)/100) AS taxe_price, stock FROM products WHERE id =' . $id_product);
    $response_viewProduct = $query->fetch(PDO::FETCH_ASSOC);
    return $response_viewProduct;
}

/** FONCTION viewProduct qui affiche un produit en fonction de son id
 * @param PDO $ma_bdd
 * @param int $id_product
 * @return array
 */
function viewCartProducts(PDO $ma_bdd, int $id_product): array
{
    $query = $ma_bdd->query('SELECT id, brand, name, description, SUM(price+(price*taxe)/100) AS taxe_price FROM products WHERE id =' . $id_product);
    $response_viewProduct = $query->fetchALL(PDO::FETCH_ASSOC);
    return $response_viewProduct;
}

//Fonction pour créer un panier vide -> création du tableau $_SESSION['car']
/**
 * @param $id_product
 * @param $quantity
 * @return mixed
 */
function createCart()
{

    $_SESSION['cart'] = array();
    return $_SESSION;
}

//Fonction ajout de produit avec en paramètres id_product & quantity
function addProduct($id_product, $product_quantity)
{
    if (!isset($_SESSION['cart'][$id_product])) {
        $_SESSION['cart'][$id_product] = $product_quantity;
    } else {
        $_SESSION['cart'][$id_product] = $_SESSION['cart'][$id_product] + $product_quantity;
    }
    return $_SESSION;
}

//Fonction changeProduct() changement de produit avec en paramètre id_prodcut et quantity
function changeProduct($id_product, $new_product_quantity)
{
    if (isset($_SESSION['cart'][$id_product])) {
        $_SESSION['cart'][$id_product] = $new_product_quantity;
    }
    return $_SESSION;
}

//Fonction ajout de produit avec en paramètres id_product & quantity
function getStock(PDO $ma_bdd, $id_product)
{
    $query = $ma_bdd->query('SELECT id, stock FROM products WHERE id =' . $id_product);
    $response_getStock = $query->fetch(PDO::FETCH_ASSOC);
    return $response_getStock;
}




