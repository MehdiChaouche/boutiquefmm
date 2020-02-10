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
    $query = $ma_bdd->query('SELECT id, brand, name, description, weight, stock, SUM(price+(price*taxe)/100) AS taxe_price FROM products WHERE id =' . $id_product);
    $response_viewProduct = $query->fetch(PDO::FETCH_ASSOC);
    return $response_viewProduct;
}

function cartCreate() // On vérifie si le panier existe ou non
{
    $_SESSION['cart'] = array();
}

function cartAdd(int $id_product) // Puis on y ajoute le(s) produit(s)
{
    if (!isset($_SESSION['cart'][$id_product])) {
        $_SESSION['cart'][$id_product] = 1;
    } else {
        $_SESSION['cart'][$id_product] = $_SESSION['cart'][$id_product] + 1;
    }
    return $_SESSION;
}

function cartMod(int $id_product, int $new_product_quantity) // Fonction permettant de modifier le panier
{
    if (isset($_SESSION['cart'][$id_product])) {
        $_SESSION['cart'][$id_product] = $new_product_quantity;
    }
    if ($_SESSION['cart'][$id_product] <= 0) {
        unset($_SESSION['cart'][$id_product]);
        echo "Votre panier est vide.";
    }
    return $_SESSION;
}

function cartDel(int $id_product) // Fonction permettant de supprimer un article du panier
{
    unset($_SESSION['cart'][$id_product]);
    return $_SESSION;
}

function cartOrderValidate(PDO $ma_bdd) // On crée la commande (date de création uniquement)
{
    $ma_bdd->query('INSERT INTO orders (created_at, delivered_at) VALUE (NOW(), NOW())');
}

function cartOrderLineValidate(PDO $ma_bdd, int $id_product, int $quantity, int $lastorderID) // On crée la ligne de commande
{
    $products = viewProduct($ma_bdd, $id_product);
    $sth = $ma_bdd->prepare('INSERT INTO order_lines (brand_name, products_name, price, quantity, weight, tva, orders_id) 
    VALUES (:brand, :name, :price, :quantity, :weight, :tva, :lastorderid)
    ');
    $sth->bindParam(':brand', $products['brand']);
    $sth->bindParam(':name', $products['name']);
    $sth->bindParam(':price', $products['price']);
    $sth->bindParam(':quantity', $quantity);
    $sth->bindParam(':weight', $products['weight']);
    $sth->bindParam(':tva', $products['taxe']);
    $sth->bindParam(':lastorderid', $lastorderID);
    $sth->execute();
    return $sth;
}