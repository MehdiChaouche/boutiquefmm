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
    $query = $ma_bdd->query('SELECT id, brand, name, description, price, taxe, weight, stock FROM products ORDER BY brand');
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
    $query = $ma_bdd->query('SELECT id, brand, name, price, taxe, weight FROM products WHERE id =' . $id_product);
    $response_viewProduct = $query->fetchALL(PDO::FETCH_ASSOC);
    return $response_viewProduct;
}

//Fonction pour créer un panier vide -> création du tableau $_SESSION['car']
/**
 * @return mixed
 */
function createCart()
{
    $_SESSION['cart'] = array();
    return $_SESSION;
}

//Fonction ajout UN(1) produit avec en paramètres id_product & quantity
function addOneProduct($id_product)
{
    if (!isset($_SESSION['cart'][$id_product])) {
        $_SESSION['cart'][$id_product] = 1;
    } else {
        $_SESSION['cart'][$id_product] = $_SESSION['cart'][$id_product] + 1;
    }
    return $_SESSION;
}


//Fonction ajout de produit avec en paramètres id_product & quantity
/**
 * @param $id_product
 * @param $product_quantity
 * @return mixed
 */
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
/**
 * @param $id_product
 * @param $new_product_quantity
 * @return mixed
 */
function changeProduct($id_product, $new_product_quantity)
{
    if (isset($_SESSION['cart'][$id_product])) {
        $_SESSION['cart'][$id_product] = $new_product_quantity;
    }
    if ($_SESSION['cart'][$id_product] == 0) {
        unset($_SESSION['cart'][$id_product]);
    }
    return $_SESSION;
}

//Fonction de suppression d'article
/**
 * @param $id_product
 * @return mixed
 */
function deleteProduct($id_product)
{
    unset($_SESSION['cart'][$id_product]);
    return $_SESSION;
}

//Fonction de suppression du panier !!!
/**
 *
 */
function deleteCart()
{
    unset($_SESSION['cart']);
}


//Fonction de création de commande
function createOrder(PDO $ma_bdd)
{
    $query = $ma_bdd->query('INSERT INTO orders (created_at) VALUES (NOW())');
    return $query;
}

//Fonction d'insertion des lignes de commande dans la commande

/**
 * @param PDO $ma_bdd
 * @param $id_order
 * @param $id_product
 * @param $quantity
 * @return bool
 */
function createOrderLines(PDO $ma_bdd, $id_order, $id_product, $quantity)
{
    //Reprendre les informations de la table produit
    $product = viewCartProducts($ma_bdd, $id_product);
    // creer la ligne
    $query = $ma_bdd->prepare('INSERT INTO order_lines (brand_name, product_name, price, taxe, weight, quantity, order_id, product_id)
    VALUES (:brand_name, :product_name, :price, :taxe, :weight, :quantity, :id_order, :id_product)');
    $query->bindParam(':brand_name', $product['brand'], PDO::PARAM_STR);
    $query->bindParam(':product_name', $product['name'], PDO::PARAM_STR);
    $query->bindParam(':price', $product['price'], PDO::PARAM_STR);
    $query->bindParam(':taxe', $product['taxe'], PDO::PARAM_STR);
    $query->bindParam(':weight', $product['weight'], PDO::PARAM_STR);
    $query->bindParam(':quantity', $quantity, PDO::PARAM_INT);
    $query->bindParam(':id_order', $id_order, PDO::PARAM_INT);
    $query->bindParam(':id_product', $id_product, PDO::PARAM_INT);
    $state = $query->execute();

    // Decrementer stock
    return $state;
}

//Fonction ajout de produit avec en paramètres id_product & quantity
/**
 * @param PDO $ma_bdd
 * @param $id_product
 * @return mixed
 */
function getStock(PDO $ma_bdd, $id_product)
{
    $query = $ma_bdd->query('SELECT id, stock FROM products WHERE id =' . $id_product);
    $response_getStock = $query->fetch(PDO::FETCH_ASSOC);
    return $response_getStock;
}

function getStocks(PDO $ma_bdd, $id_product)
{
    $query = $ma_bdd->query('SELECT id, stock FROM products WHERE id =' . $id_product);
    $response_getStocks = $query->fetchAll(PDO::FETCH_ASSOC);
    return $response_getStocks;
}




