<?php
function debug($var)
{
    highlight_string("<?php\n" . var_export($var, true) . ";\n?>");
}

function debugtest($bdd)
{
    $reponse = $bdd->query('SELECT * FROM customers');
    $donnees = $reponse->fetchAll();
    debug($donnees);
}

function indexProducts(PDO $bdd):array // Affiche tous les produits.
{
    $query = $bdd->query('SELECT id, brand, name, description, price FROM products ORDER BY arrival_date');
    $reponse = $query->fetchAll(PDO::FETCH_ASSOC);
    return $reponse;
}

function viewProduct($bdd):array // A compléter.
{
    $query = $bdd->query('SELECT ');
}