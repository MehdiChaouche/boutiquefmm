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

//fonction reprise des infos de commande pour chaque produit pour la créatio nde ligne de commandes
function viewProductOrder(PDO $ma_bdd, int $id_product): array
{
    $query = $ma_bdd->query('SELECT id, brand, name, description, price, taxe, weight FROM products WHERE id =' . $id_product);
    $response_viewProduct = $query->fetch(PDO::FETCH_ASSOC);
    return $response_viewProduct;
}

//Fonction d'insertion des lignes de commande dans la commande
function createOrderLines(PDO $ma_bdd, $id_order, $product_id, $quantity)
{
    //Reprendre les informations de la table produit
    $product = viewProductOrder($ma_bdd, $product_id);
    // creer la ligne
    $query = $ma_bdd->prepare('INSERT INTO order_lines (brand_name, product_name, price, taxe, weight, quantity, orders_id, products_id)
    VALUES (:brand_name, :product_name, :price, :taxe, :weight, :quantity, :orders_id, :products_id)');
    $query->bindParam(':brand_name', $product['brand'], PDO::PARAM_STR);
    $query->bindParam(':product_name', $product['name'], PDO::PARAM_STR);
    $query->bindParam(':price', $product['price'], PDO::PARAM_STR);
    $query->bindParam(':taxe', $product['taxe'], PDO::PARAM_STR);
    $query->bindParam(':weight', $product['weight'], PDO::PARAM_STR);
    $query->bindParam(':quantity', $quantity, PDO::PARAM_INT);
    $query->bindParam(':orders_id', $id_order, PDO::PARAM_INT);
    $query->bindParam(':products_id', $product_id, PDO::PARAM_INT);
    $state = $query->execute();
    return $state;
}

// Fonction pour décrémenter stock
/**
 * @param PDO $ma_bdd
 * @param $id_product
 * @param $quantity
 */
function updateStock(PDO $ma_bdd, $id_product, $quantity)
{
    $ma_bdd->query('UPDATE products SET stock = stock -' . $quantity . ' WHERE products.id =' . $id_product);
}

function viewOrder(PDO $ma_bdd, $id_order)
{
    $query = $ma_bdd->query('SELECT brand_name, product_name, price, taxe, weight, quantity FROM order_lines WHERE orders_id=' . $id_order);
    $response_viewOrder = $query->fetchALL(PDO::FETCH_ASSOC);
    return $response_viewOrder;
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

//Fonction pour récuperer champ "admin" dans la BDD
//function getAdmin(PDO $ma_bdd)
//{
//    $query=$ma_bdd->query('SELECT * FROM customers');
//    return
//}

//Fonction pour aller chercher les infos utilisateurs dans la table "customers"
function getUser(PDO $ma_bdd)
{
    $query = $ma_bdd->query('SELECT mail, password, admin FROM customers');
    return $query;
}

//Fonction signIn pour se connecter en vérifiant les informations utilisateurs $mail === email et $password === password
function signIn(PDO $ma_bdd, $signin_email, $signin_password)
{
    $usersid = getUser($ma_bdd); //récupération des informations utilisateurs
    foreach ($usersid as $userid) {
        if ($userid['mail'] === $signin_email && $userid['password'] === $signin_password) {
            if (!isset($_SESSION['user'])) {
                $_SESSION['user']['email'] = $userid['mail'];
                $_SESSION['user']['admin'] = $userid['admin'];
            } else {
                echo "Vous n'êtes pas un utilisateur enregistré";
            }
        }
    }
}
